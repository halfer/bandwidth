<?php


/**
 * Skeleton subclass for performing query and update operations on the 'download_group' table.
 *
 * NOTES:
 * 
 * Group (1) applies a 10 file limit.
 * Group (2) applies a 20 file limit.
 *
 * File A member of (1)
 * File B member of (2)
 * File C member of (1,2)
 *
 * When downloading C, we get download limits of (10, 20).
 *
 * S1: One strategy would be just to take the lowest of these figures i.e. apply the 10 file limit.
 *
 * S2: The other would be to count all downloads for (1) and ensure they don't exceed 10, and count all downloads for (2) and ensure they don't exceed 20. To illustrate, let us say we make these downloads:
 * 
 * File A <-- download 5 times
 * File B <-- download 10 times
 * 
 * If we use strategy S1 then group (1) gets 5 downloads and group (2) gets 10 downloads. We take the max of this figure (10) and the min of the group limits(10,20) and disallow a download of File C, since that would be an 11th download.
 * 
 * Strategy S2:
 * 
 * (1) has 5 downloads, 10 limit
 * (2) has 10 downloads, 20 limit
 * Neither has been exceeded so permit File C to be downloaded.
 * 
 * SELECT group.id, SUM(log.byte_count), group.bandwidth_limit
 * FROM log
 * JOIN file
 * JOIN filegroup
 * JOIN group
 * WHERE file.id = x AND group.bandwidth_limit IS NOT NULL
 * GROUP BY group.id, group.bandwidth_limit
 *
 * @package    lib.model
 */
class DownloadGroupPeer extends BaseDownloadGroupPeer
{
	const TYPE_FILE_DEFAULT = 1;
	const TYPE_GROUP_DEFAULT = 2;

	/**
	 * Gets the lowest rate limit for all of the specified groups
	 */
	public static function getMinRateLimit(array $groups)
	{
		$rateLimit = null;
		/* @var $group DownloadGroup */
		foreach ($groups as $group)
		{
			$thisRateLimit = $group->getRateLimit();
			if (!is_null($thisRateLimit))
			{
				if (is_null($rateLimit) || ($thisRateLimit < $rateLimit))
				{
					$rateLimit = $thisRateLimit;
				}
			}
		}
		
		return $rateLimit;
	}

	/**
	 *
	 * @deprecated
	 * @param array $groups
	 * @return integer 
	 */
	public static function getMinCountLimit(array $groups)
	{
		$countLimit = null;
		/* @var $group DownloadGroup */
			foreach ($groups as $group)
		{
			$thisCountLimit = $group->getCountLimit();
			if (!is_null($thisCountLimit))
			{
				if (is_null($countLimit) || ($thisCountLimit < $countLimit))
				{
					$countLimit = $thisCountLimit;
				}
			}
		}
		
		return $countLimit;		
	}

	/**
	 * 
	 * @deprecated
	 * @param array $groups
	 * @return type 
	 */
	public static function getCountUsage(array $groups)
	{
		$usage = 0;
		/* @var $group DownloadGroup */
		foreach ($groups as $group)
		{
			$usage += $group->getCountUsage();
		}
		
		return $usage;
	}
}