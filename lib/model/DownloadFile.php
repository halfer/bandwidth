<?php

/**
 * Skeleton subclass for representing a row from the 'download_file' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sun Jun 19 18:55:17 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class DownloadFile extends BaseDownloadFile
{
	/**
	 * Sets the created datestamp for new objects
	 * 
	 * @param PropelPDO $con 
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isNew())
		{
			$this->setCreatedAt(time());
		}

		parent::save($con);
	}
	
	/**
	 * Returns the associated group object, or failing that a default one
	 * 
	 * @todo Do we need to cache the result here, or does Propel already do that for us?
	 * 
	 * @return array Array of DownloadGroup objects
	 */
	public function getGroups()
	{
		// Use (array) to avoid PropelCollection thingy
		$groups = (array) DownloadGroupQuery::create()->
			joinFileGroup()->
			where('FileGroup.DownloadFileId = ?', $this->getId())->
			find();
		
		if (!$groups)
		{
			$groups = array(
				DownloadGroupQuery::create()->
					filterBySystemGroupType(DownloadGroupPeer::TYPE_FILE_DEFAULT)->
					findOne()
			);
		}
		
		// @todo Make this a NoGroupException so it can be detected properly
		if (!$groups)
		{
			throw new Exception('This file has no group');
		}
		
		return $groups;
	}

	/**
	 * Lists the bandwidth for each group against the limit, and returns false if a limit is exceeded
	 *
	 * Basic query:
	 *  
	 * SELECT group.id, SUM(log.byte_count), group.bandwidth_limit
	 * FROM group
	 * INNER JOIN filegroup
	 * LEFT JOIN log
	 * WHERE filegroup.file_id = this.id
	 *		AND group.bandwidth_limit IS NOT NULL
	 * GROUP BY group.id, group.bandwidth_limit
	 * 
	 * @return boolean 
	 */
	public function isWithinGroupBandwidthLimits()
	{
		// See if we have any reset limits to respect
		$groups = $this->getGroups();
		$hasResets = $this->groupsContainReset($groups);

		// This is how to select group(s) and their limits
		$c = new Criteria();
		$c->
			clearSelectColumns()->
			addSelectColumn(DownloadGroupPeer::ID)->
			addSelectColumn('SUM(' . DownloadLogPeer::BYTE_COUNT . ') AS bandwidth_usage')->
			addSelectColumn(DownloadGroupPeer::BANDWIDTH_LIMIT)->
			addJoin(DownloadGroupPeer::ID, FileGroupPeer::DOWNLOAD_GROUP_ID, Criteria::INNER_JOIN)->
			addJoin(FileGroupPeer::DOWNLOAD_FILE_ID, DownloadLogPeer::DOWNLOAD_FILE_ID, Criteria::LEFT_JOIN)->
			add(FileGroupPeer::DOWNLOAD_FILE_ID, $this->getId())->
			add(DownloadGroupPeer::BANDWIDTH_LIMIT, null, Criteria::ISNOTNULL)->
			addGroupByColumn(DownloadGroupPeer::ID)->
			addGroupByColumn(DownloadGroupPeer::BANDWIDTH_LIMIT);

		// If we have to consider resets, we have to break SUM statements down by group,
		// since different time criteria are required for each block
		if ($hasResets)
		{
			// One statement per group
			$rows = $this->getSeperateGroupResults($c, $groups);
		}
		else
		{
			// Just use the predefined Criteria across all groups (one statement)
			$stmt = DownloadFilePeer::doSelectStmt($c);
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		
		$isPermit = true;
		while (($row = next($rows)) && $isPermit)
		{
			$isPermit = ($row['bandwidth_usage'] < $row['bandwidth_limit']);

			// @todo This needs to be turned off for the live environment
			if (!$isPermit)
			{
				$message = 'Exceeded bandwidth limit imposed by group #' . $row['id'] .
					' (used ' . $row['bandwidth_usage'] . ', limit ' . $row['bandwidth_limit'] . ')';
				sfContext::getInstance()->getLogger()->warning($message);
			}
		}
		
		return $isPermit;
	}

	/**
	 * Returns true if at least one of the supplied groups have reset settings
	 * 
	 * @param array $groups
	 * @return boolean
	 */
	protected function groupsContainReset(array $groups)
	{
		$hasResets = false;

		foreach ($groups as $group)
		{
			if ($group->getResetFrequency())
			{
				$hasResets = true;
				break;
			}
		}

		return $hasResets;
	}

	protected function getSeperateGroupResults(Criteria $criteria, array $groups)
	{
		$rows = array();
		foreach ($groups as $group)
		{
			// Clone the predefined criteria
			/* @var $c2 Criteria */
			$extraC = clone $criteria;

			// Note that we are working on a per-group basis
			$extraC->add(DownloadGroupPeer::ID, $group->getId());

			// Set time limits on logs if they apply
			if ($frequency = $group->getResetFrequency())
			{
				list($timeStart, $timeEnd) = BandwidthUtils::getTimestampRange($frequency);
				if ($offset = $group->getResetOffset())
				{
					$timeStart += $offset;
					$timeEnd += $offset;
				}

				// LAST_ACCESSED_AT includes a few more logs than STARTED_AT, to be cautious
				$cTime = $extraC->getNewCriterion(
					DownloadLogPeer::LAST_ACCESSED_AT, $timeStart, Criteria::GREATER_EQUAL
				);
				$cTime->addAnd(
					$extraC->getNewCriterion(
						DownloadLogPeer::LAST_ACCESSED_AT, $timeEnd, Criteria::LESS_EQUAL
					)
				);
				$extraC->add($cTime);
			}

			$stmt = DownloadFilePeer::doSelectStmt($extraC);
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$rows[] = $row;
			}
		}

		return $rows;
	}

	/**
	 * Lists the count usage for each group against the limit, and returns false if a limit is exceeded
	 * 
	 * Strategy same as isWithinGroupBandwidthLimits. Note that this query includes downloads that
	 * have not yet finished.
	 * 
	 * @todo Could this be merged into isWithinGroupBandwidthLimits, for optimisation?
	 * @return boolean 
	 */
	public function isWithinGroupCountLimits()
	{
		// See if we have any reset limits to respect
		$groups = $this->getGroups();
		$hasResets = $this->groupsContainReset($groups);

		// Standard criteria to run over these logs
		$c = new Criteria();
		$c->
			clearSelectColumns()->
			addSelectColumn(DownloadGroupPeer::ID)->
			addSelectColumn('COUNT(*) AS count_usage')->
			addSelectColumn(DownloadGroupPeer::COUNT_LIMIT)->
			addJoin(DownloadGroupPeer::ID, FileGroupPeer::DOWNLOAD_GROUP_ID, Criteria::INNER_JOIN)->
			addJoin(FileGroupPeer::DOWNLOAD_FILE_ID, DownloadLogPeer::DOWNLOAD_FILE_ID, Criteria::LEFT_JOIN)->
			add(FileGroupPeer::DOWNLOAD_FILE_ID, $this->getId())->
			add(DownloadGroupPeer::COUNT_LIMIT, null, Criteria::ISNOTNULL)->
			addGroupByColumn(DownloadGroupPeer::ID)->
			addGroupByColumn(DownloadGroupPeer::COUNT_LIMIT);
		
		// If we have to consider resets, we have to break COUNT statements down by group,
		// since different time criteria are required for each block
		if ($hasResets)
		{
			// One statement per group
			$rows = $this->getSeperateGroupResults($c, $groups);
		}
		else
		{
			$stmt = DownloadFilePeer::doSelectStmt($c);
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		$isPermit = true;
		while (($row = next($rows)) && $isPermit)
		{
			$isPermit = ($row['count_usage'] < $row['count_limit']);

			// @todo This needs to be turned off for the live environment
			if (!$isPermit)
			{
				$message = 'Exceeded count limit imposed by group #' . $row['id'] .
					' (used ' . $row['count_usage'] . ', limit ' . $row['count_limit'] . ')';
				sfContext::getInstance()->getLogger()->warning($message);
			}
		}
		
		return $isPermit;
	}

	/**
	 * Lists the number of concurrent connections per group, and returns false if a limit is exceeded
	 * 
	 * @param string $ipAddress Optionally limit the call to this IP
	 * @return boolean 
	 */
	public function isWithinGroupConcurrencyLimits($ipAddress = null)
	{
		$c = new Criteria();
		$c->
			clearSelectColumns()->
			addSelectColumn(DownloadGroupPeer::ID)->
			addSelectColumn('COUNT(*) AS count_concurrent')->
			addSelectColumn('COUNT(' . DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP . ') AS count_concurrent_per_ip')->
			addSelectColumn(DownloadGroupPeer::CONCURRENT_LIMIT)->
			addSelectColumn(DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP)->
			addJoin(DownloadLogPeer::DOWNLOAD_FILE_ID, FileGroupPeer::DOWNLOAD_FILE_ID)->
			addJoin(FileGroupPeer::DOWNLOAD_GROUP_ID, DownloadGroupPeer::ID)->
			add(DownloadLogPeer::DOWNLOAD_FILE_ID, $this->getId())->
			addGroupByColumn(DownloadGroupPeer::ID)->
			addGroupByColumn(DownloadGroupPeer::CONCURRENT_LIMIT)->
			addGroupByColumn(DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP);
		
		# Only include items where user is still connected
		$c->add(DownloadLogPeer::IS_ABORTED, null, Criteria::ISNULL);
		
		# Only list rows if one of the concurrent limits is live
		$critA = $c->getNewCriterion(DownloadGroupPeer::CONCURRENT_LIMIT, null, Criteria::ISNOTNULL);
		$critB = $c->getNewCriterion(DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP, null, Criteria::ISNOTNULL);
		$critB->addAnd($c->getNewCriterion(DownloadLogPeer::IP, $ipAddress));
		$critA->addOr($critB);
		$c->add($critA);
		$stmt = DownloadFilePeer::doSelectStmt($c);
		
		$isPermit = true;
		while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) && $isPermit)
		{
			// These need to be less than, not less than/equal - since this download would
			// take that last slot
			$isPermitAny = ($row['count_concurrent'] < $row['concurrent_limit']);
			$isPermitIP = ($row['count_concurrent_per_ip'] < $row['concurrent_limit_per_ip']);
			$isPermit = $isPermitAny && $isPermitIP;

			// @todo This needs to be turned off for the live environment
			if (!$isPermit)
			{
				if ($isPermitAny)
				{
					$message = 'Exceeded concurrency limit imposed by group #' . $row['id'] .
						' (used ' . $row['count_concurrent'] . ', limit ' .
						$row['concurrent_limit'] . ')';
				}
				else
				{
					$message = 'Exceeded concurrency limit by IP imposed by group #' . $row['id'] .
						' (used ' . $row['count_concurrent_by_ip'] . ', limit ' .
						$row['concurrent_limit_by_ip'] . ')';
				}
				sfContext::getInstance()->getLogger()->warning($message);
			}
		}
		
		return $isPermit;
	}

	public function getBandwidthUsage()
	{
		$c = new Criteria();
		$c->
			clearSelectColumns()->
			addSelectColumn('SUM(' . DownloadLogPeer::BYTE_COUNT . ') AS bandwidth_usage')->
			add(DownloadLogPeer::DOWNLOAD_FILE_ID, $this->getId());
		$stmt = DownloadFilePeer::doSelectStmt($c);

		$usage = 0;
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$usage = $row['bandwidth_usage'];
		}
		
		return $usage ? $usage : 0;
	}

	public function getCountUsage()
	{
		$c = new Criteria();
		$c->
			clearSelectColumns()->
			addSelectColumn('COUNT(*) AS count_usage')->
			add(DownloadLogPeer::DOWNLOAD_FILE_ID, $this->getId());
		$stmt = DownloadFilePeer::doSelectStmt($c);

		$usage = 0;
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$usage = $row['count_usage'];
		}
		
		return $usage;		
	}
}
