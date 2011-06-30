<?php


/**
 * Skeleton subclass for representing a row from the 'download_group' table.
 *
 * @package    lib.model
 */
class DownloadGroup extends BaseDownloadGroup
{
	/**
	 * Counts the usages across the group
	 * 
	 * @return int Number of partial and full downloads
	 */
	public function getCountUsage()
	{
		return DownloadLogQuery::create()->
			joinDownloadFile()->
			addJoin(DownloadFilePeer::ID, FileGroupPeer::DOWNLOAD_FILE_ID, Criteria::INNER_JOIN)->
			add(FileGroupPeer::DOWNLOAD_GROUP_ID, $this->getId())->
			count();
	}

	public function getBandwidthUsage()
	{
		return DownloadLogQuery::create()->
			joinDownloadFile()->
			addJoin(DownloadFilePeer::ID, FileGroupPeer::DOWNLOAD_FILE_ID, Criteria::INNER_JOIN)->
			add(FileGroupPeer::DOWNLOAD_GROUP_ID, $this->getId())->
			clearSelectColumns()->
			addSelectColumn('SUM(' . DownloadLogPeer::BYTE_COUNT . ')')->
			addGroupByColumn(DownloadLogPeer::BYTE_COUNT);
	}
}