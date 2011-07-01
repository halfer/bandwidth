<?php

/**
 * settings actions.
 *
 * @package    bandwidth
 * @subpackage settings
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class settingsActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$c = new Criteria();
		$c->addDescendingOrderByColumn(DownloadLogPeer::LAST_ACCESSED_AT);

		// Set up pager
		$this->pager = new sfPropelPager('DownloadLog');
		$this->pager->setCriteria($c);
		
		$this->page = 1;
		$this->sort = 'default';
	}

	public function executeAdd(sfWebRequest $request)
	{
	}
	
	public function executeFiles(sfWebRequest $request)
	{
		// Criteria to select live files
		$c = new Criteria();
		$c->add(DownloadFilePeer::IS_ENABLED, true);

		// Set up pager
		$this->pager = new sfPropelPager('DownloadFile');
		$this->pager->setCriteria($c);
	}

	public function executeFile(sfWebRequest $request)
	{
		
	}

	public function executeGroups(sfWebRequest $request)
	{
		// Null-named groups are for files with their own private settings
		$c = new Criteria();
		$c->add(DownloadGroupPeer::NAME, null, Criteria::ISNOTNULL);

		// Set up pager
		$this->pager = new sfPropelPager('DownloadGroup');
		$this->pager->setCriteria($c);
	}
	
	public function executeGroup(sfWebRequest $request)
	{
		$this->groupId = $request->getParameter('groupId');
		if ($this->groupId == 'new')
		{
			$this->downloadGroup = new DownloadGroup();
			$this->downloadGroup->setName('(New group)');
		}
		else
		{
			$this->downloadGroup = DownloadGroupQuery::create()->
				filterByPrimaryKey($this->groupId)->
				findOne();
			$this->forward404Unless($this->downloadGroup);
		}
		
		$this->form = new DownloadGroupForm($this->downloadGroup);
		
		if ($request->getMethod() == sfRequest::POST)
		{
			$this->form->bind($request->getParameter('download_group'));
			if ($this->form->isValid())
			{
				$this->form->save();
				$groupId = $request->getParameter('groupId');
				$this->redirect('@group?groupId=' . $groupId);
			}
		}
	}

	public function handleError() {
		$this->forward($this->getModuleName(), 'group');
	}
}
