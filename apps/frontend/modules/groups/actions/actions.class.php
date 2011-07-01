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
    $this->DownloadGroups = DownloadGroupQuery::create()->find();
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

    $this->redirect('groups/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $DownloadGroup = $form->save();

      $this->redirect('groups/edit?id='.$DownloadGroup->getId());
    }
  }
}
