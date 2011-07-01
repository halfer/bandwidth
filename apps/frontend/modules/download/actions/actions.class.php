<?php

/**
 * download actions.
 *
 * @package    bandwidth
 * @subpackage download
 */
class downloadActions extends sfActions
{
	const ERROR_COUNT = 'count';
	const ERROR_BANDWIDTH = 'bandwidth';

	public function preExecute() {
		parent::preExecute();

		// @todo Discover what happens if this is run in safe mode - is it disallowed?
		set_time_limit ( 0 );

		// Prevents corruption that occurs with legacy settings (see php.net/fread notes)
		if ((boolean) ini_get('magic_quotes_runtime'))
		{
			ini_set('magic_quotes_runtime', 0);
		}

		// Prevent user aborting the download from stopping us logging stuff afterwards
		ignore_user_abort(true);
	}

	/**
	 * Downloads a file
	 *
	 * @todo If there are no bandwidth/rate settings, create & redirect to symlink to let Apache download the file
	 * @todo New setting: "Allow Apache to download the file even if bandwidth may be exceeded"
	 * @todo After new setting is added, use Apache even if a bandwidth limit is in place
	 * 
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		// @todo Ensure there are no hacks in this filename
		$relativePath = $request->getParameter('filename');

		// Calculate absolute pathname
		$localFile = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR .
			'files' . DIRECTORY_SEPARATOR .
			$relativePath;
		
		// Get path and leafname string components
		$slashPos = strrpos($relativePath, '/');
		if ($slashPos === false)
		{
			$path = '';
			$leafname = $relativePath;
		}
		else
		{
			$path = substr($relativePath, 0, $slashPos);
			$leafname = substr($relativePath, $slashPos + 1);
		}

		// Get file row from database (@todo make proper error page)
		$downloadFile = DownloadFileQuery::create()->
			filterByName($leafname)->
			filterByPath($path)->
			findOne();
		$this->forward404Unless($downloadFile, 'File not found');

		// Check the file is readable (@todo also email admin here, as this is a fault)
		$this->forward404Unless(is_readable($localFile), 'File not available');

		// Get all the associated groups to determine how to treat the download
		$groups = $downloadFile->getGroups();

		$ipAddress = $_SERVER['REMOTE_ADDR'];

		// Check we've not exceeded any group count limits
		if (!$downloadFile->isWithinGroupCountLimits()) {
			$this->forward($this->getModuleName(), 'countError');
		}

		// Check we've not exceeded any group b/w limits
		if (!$downloadFile->isWithinGroupBandwidthLimits())
		{
			$this->forward($this->getModuleName(), 'bandwidthError');
		}
		
		if (!$downloadFile->isWithinGroupConcurrencyLimits($ipAddress))
		{
			$this->forward($this->getModuleName(), 'concurrencyError');
		}

		// Set up the bandwidth limiter if required
		if ($rate = DownloadGroupPeer::getMinRateLimit($groups))
		{
			$this->setupThrottler($rate);
		}

		// @todo The headers are going to need more options (view inline as well)
		$headers = $this->getDownloadHeaders($leafname, filesize($localFile));

		// @todo Does PHP have a way for us to count bytes sent to the buffer?
		$bytesOut = 0;
		foreach ($headers as $header) {
			header($header);
			$bytesOut += strlen($header);
		}
		flush();

		// Log data here
		$downloadLog = new DownloadLog();
		$downloadLog->setDownloadFile($downloadFile);
		$downloadLog->setStartedAt(time());
		$downloadLog->setIp($ipAddress);
		$downloadLog->setByteCount($bytesOut);
		$downloadLog->save();

		// Set up timer to periodically log that we're currently downloading
		$logFrequency = 4;			// (@todo This needs to be an admin setting)
		$now = time();

		// Send file to browser (@todo support partial/resume headers)
		$file = fopen($localFile, "r");
		$blockSize = 1024 * 4;		// (@todo This needs to be an admin setting)
		$connectionAborted = false;
		while (!feof($file) && !$connectionAborted)
		{
			$data = fread($file, $blockSize);
			print $data;
			$bytesOut += strlen($data);
			$connectionAborted = connection_aborted();

			// If the user is still downloading, then periodically log an access time
			if (!$connectionAborted)
			{
				if ((time() - $now) > $logFrequency)
				{
					$downloadLog->setAccessedAt($now = time());
					$downloadLog->setByteCount($bytesOut);
					$downloadLog->save();
					$now = time();
				}
			}
		}
		fclose($file);

		// Update a few items before exiting
		$downloadLog->setByteCount($bytesOut);
		$downloadLog->setIsAborted($connectionAborted);
		$downloadLog->setAccessedAt(time());
		$downloadLog->save();

		return sfView::NONE;
	}

	/**
	 * Turns on the throttling system at the specified rate of bytes/sec
	 * 
	 * @todo Offer burst setting to admin user (i.e. an initial rate before standard rate)
	 * 
	 * @param integer $rate Bytes per second
	 */
	protected function setupThrottler($rate)
	{
		include_once sfConfig::get('sf_lib_dir') . DIRECTORY_SEPARATOR . 'Throttle.class.php';
		
		$config = new ThrottleConfig();
		$config->burstTimeout = 0;					// Turn off burst timeout
		$config->burstLimit = $rate;				// Set burst and standard rates to the same
		$config->rateLimit = $config->burstLimit;

		$throttler = new Throttle($config);
	}

	/**
	 * Headers suitable for force-downloading a file
	 * 
	 * @param string $leafname
	 * @param integer $fileSize
	 * @return array
	 */
	protected function getDownloadHeaders($leafname, $fileSize)
	{
		return array(
			"Content-type: application/force-download",
			"Content-Disposition: attachment; filename=\"{$leafname}\"",
			"Content-Length: $fileSize",
		);
	}

	/**
	 * Headers suitable for viewing a file inline
	 * 
	 * @param string $leafname
	 * @param integer $fileSize
	 * @return array
	 */
	protected function getViewInlineHeaders($leafname, $fileSize)
	{
		// @todo This needs to be completed
		return array(
		);
	}
}
