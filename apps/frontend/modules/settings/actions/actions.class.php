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
		$c->add(DownloadGroupPeer::IS_ENABLED, true);
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
				filterByIsEnabled(true)->
				filterByPrimaryKey($this->groupId)->
				findOne();
			$this->forward404Unless($this->downloadGroup);
		}
		
		$this->errors = $request->getAttribute('errors', array());
	}

	public function executeGroupSave(sfWebRequest $request)
	{
		// Get the download group loaded
		$this->executeGroup($request);
		
		if ($request->getMethod() == sfRequest::POST)
		{
			// Replace empty lines with nulls
			$params = $request->getParameter('group');
			foreach ($params as $field => $value)
			{
				if (!$value)
				{
					$params[$field] = null;
				}
			}
			
			// Do save here
			$this->downloadGroup->fromArray($params, BasePeer::TYPE_FIELDNAME);
			$this->downloadGroup->save();
			
//			print_r($this->downloadGroup->toArray());
//			echo "<hr/>";
//			print_r($this->downloadGroup->getValidationFailures());
//			exit();
			
			$groupId = 1;
			$this->redirect('@group?groupId=' . $groupId);
		}		
	}

	public function validateGroupSave()
	{
		if ($this->getRequest()->getMethod() != sfRequest::POST)
		{
			return true;
		}

		$values = $this->getRequest()->getParameter('group');
		$errors = array();
		
		if (!$values['name'])
		{
			$errors['name'] = 'A group must have a name';
		}
		
		// @todo Read this from the db
		if (strlen($values['name']) > 64)
		{
			$errors['name'] = 'Group names must not be longer than 64 characters';
		}
		
		$this->getRequest()->setAttribute('errors', $errors);
		
		return !$errors;
	}

	public function handleError() {
		$this->forward($this->getModuleName(), 'group');
	}
}
