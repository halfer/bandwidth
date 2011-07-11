<?php

/**
 * groups actions.
 *
 * @package    bandwidth
 * @subpackage groups
 * @author     Your name here
 */
class groupsActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		// Set up pager
		$this->pager = new sfPropelPager('DownloadGroup');
		$this->pager->setCriteria(new Criteria());
		$this->pager->setMaxPerPage(15);
		$this->pager->setPage($request->getParameter('page'));
		$this->pager->init();
	}

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DownloadGroupForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DownloadGroupForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $DownloadGroup = DownloadGroupQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($DownloadGroup, sprintf('Object DownloadGroup does not exist (%s).', $request->getParameter('id')));
    $this->form = new DownloadGroupForm($DownloadGroup);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $DownloadGroup = DownloadGroupQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($DownloadGroup, sprintf('Object DownloadGroup does not exist (%s).', $request->getParameter('id')));
    $this->form = new DownloadGroupForm($DownloadGroup);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $DownloadGroup = DownloadGroupQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($DownloadGroup, sprintf('Object DownloadGroup does not exist (%s).', $request->getParameter('id')));
    $DownloadGroup->delete();

    $this->redirect('@groups');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $DownloadGroup = $form->save();

      $this->redirect('@groups_edit?id='.$DownloadGroup->getId());
    }
  }

	public function executeGetFrequency(sfWebRequest $request)
	{
		// Turn off the debugging toolbar
		sfConfig::set('sf_web_debug', false);
		
		$params = $request->getParameter('download_group');

		$result = '';
		if (isset($params['reset_frequency']))
		{
			$parts = $params['reset_frequency'];
			$valid = BandwidthUtils::validateTimeParts($parts);
			if ($valid)
			{
				$frequency = BandwidthUtils::getTimestampFromTimeParts($parts);
				$now = time();
				$timeStart = ( (int) ($now / $frequency)) * $frequency;
				$timeEnd = $timeStart + $frequency;
				
				$result = array(
					'result' => 
						'<em>' .
						date('r', $timeStart) .
						'</em> to <em>' .
						date('r', $timeEnd) .
						'</em>',
					'error' => null,
				);
			}
			else
			{
				$result = array(
					'error' => 'Invalid time spec',
				);
			}
		}

		$json = json_encode(
			$result
		);

		return $this->renderText($json);
	}
}
