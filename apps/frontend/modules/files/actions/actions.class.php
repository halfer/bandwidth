<?php

/**
 * files actions.
 *
 * @package    bandwidth
 * @subpackage files
 * @author     Your name here
 */
class filesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->DownloadFiles = DownloadFileQuery::create()->find();
  }

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new DownloadFileForm(null, $this->getUploadsPath());
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new DownloadFileForm(null, $this->getUploadsPath());

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

  public function executeEdit(sfWebRequest $request)
  {
    $DownloadFile = DownloadFileQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($DownloadFile, sprintf('Object DownloadFile does not exist (%s).', $request->getParameter('id')));
    $this->form = new DownloadFileForm($DownloadFile);
  }

	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$DownloadFile = DownloadFileQuery::create()->findPk($request->getParameter('id'));
		$this->forward404Unless($DownloadFile, sprintf('Object DownloadFile does not exist (%s).', $request->getParameter('id')));

		$this->form = new DownloadFileForm($DownloadFile, $this->getUploadsPath());
		$this->processForm($request, $this->form);
		$this->setTemplate('edit');
	}

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $DownloadFile = DownloadFileQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($DownloadFile, sprintf('Object DownloadFile does not exist (%s).', $request->getParameter('id')));
    $DownloadFile->delete();

    $this->redirect('files/index');
  }

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			// Move uploaded file to correct location, if it was supplied
			/* @var $file sfValidatedFile */
			$file = $form->getValue('path');
			if ($file)
			{
				$filename = sha1(time() . $file->getOriginalName());
				$extension = $file->getExtension($file->getOriginalExtension());
				$file->save($this->getUploadsPath() . '/' . $filename . $extension);

				// We're only interested in the relative path, so reset that
				$DownloadFile = $form->save(null, $filename . $extension, $file->getSize());
			}
			else
			{
				$DownloadFile = $form->save();
			}

			$this->redirect('files/edit?id='.$DownloadFile->getId());
		}
	}

	protected function getUploadsPath()
	{
		// @todo The root files folder needs to be settable in a settings panel
		return sfConfig::get('sf_root_dir') . '/files';
	}
}
