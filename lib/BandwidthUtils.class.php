<?php
class BandwidthUtils
{
	/**
	 * Returns boolean depending on whether the 'time parts' array supplied is ok
	 * 
	 * @param array $parts
	 * @param boolean $parts 
	 */
	public static function validateTimeParts(array $parts)
	{
		$ok = true;
		foreach ($parts as $key => $subValue)
		{
			if ($subValue)
			{
				if (!is_numeric($subValue) || (strpos($subValue, '.') !== false))
				{
					$ok = false;
					break;
				}
			}
		}

		return $ok;
	}

	/**
	 * Converts a time parts array to an int number of seconds
	 * 
	 * @param array $parts
	 * @return integer Number of seconds 
	 */
	public static function getTimestampFromTimeParts(array $parts)
	{
		$totalSec = 0;

		$totalSec += $parts['seconds'] + 0;
		$totalSec += $parts['minutes'] * 60;
		$totalSec += $parts['hours'] * 60 * 60;
		$totalSec += $parts['days'] * 60 * 60 * 24;
		$totalSec += $parts['weeks'] * 60 * 60 * 24 * 7;
		
		return $totalSec;
	}

	public static function getTimestampRange($frequency)
	{
		$now = time();
		$timeStart = ( (int) ($now / $frequency)) * $frequency;
		$timeEnd = $timeStart + $frequency;

		return array($timeStart, $timeEnd);
	}

}
