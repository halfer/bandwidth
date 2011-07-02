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
    $this->form = new DownloadFileForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DownloadFileForm();

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
    $this->form = new DownloadFileForm($DownloadFile);

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
      $DownloadFile = $form->save();

      $this->redirect('files/edit?id='.$DownloadFile->getId());
    }
  }
}
