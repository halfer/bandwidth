<?php

/**
 * DownloadFile form.
 *
 * @package    bandwidth
 * @subpackage form
 * @author     Your name here
 */
class DownloadFileForm extends BaseDownloadFileForm
{
	private $uploadsPath = null;
	
	public function __construct($object = null, $uploadsPath = '')
	{
		$this->uploadsPath = $uploadsPath;
		parent::__construct($object);
	}

	public function configure()
	{
		// File upload
		$this->setWidget('path', new sfWidgetFormInputFile());
		$this->setValidator('path', new sfValidatorFile(array('required' => false)));
		
		// These are all set by the server, and the user is not permitted to reset them
		unset($this->widgetSchema['created_at']);
		unset($this->validatorSchema['created_at']);
		unset($this->widgetSchema['checked_at']);
		unset($this->validatorSchema['checked_at']);
		unset($this->widgetSchema['size']);
		unset($this->validatorSchema['size']);

		// @todo Not implemented yet, but in the future an admin user will be able
		// to choose which folder to upload to
		unset($this->widgetSchema['folder']);
		unset($this->validatorSchema['folder']);
		
		// @todo Better widget required for the File Group List - tickbox array?
	}

	public function save($con = null, $filePath = null, $fileSize = null)
	{
		// If a path is specified, assume a file has been uploaded
		if (!is_null(($filePath)))
		{
			$fileObj = $this->getObject();
			if ($fileObj)
			{
				$fileObj->setPath($filePath);
				$fileObj->setSize($fileSize);
				$fileObj->setCheckedAt(time());
			}
		}

		return parent::save($con);
	}

	public function processValues($values)
	{
		// Only activate this if the form has been informed of an upload path...
		if ($this->uploadsPath)
		{
			// ... and only if an upload is actually taking place
			if (array_key_exists('path', $values) && $values['path'])
			{
				// Make the saved path relative
				$path = $values['path'];
				$values['path'] = str_replace($this->uploadsPath . '/', '', $path->getSavedName());
			}
		}
		return parent::processValues($values);
	}
}
