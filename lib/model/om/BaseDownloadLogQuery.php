<?php


/**
 * Base class that represents a query for the 'download_log' table.
 *
 * 
 *
 * @method     DownloadLogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     DownloadLogQuery orderByDownloadFileId($order = Criteria::ASC) Order by the download_file_id column
 * @method     DownloadLogQuery orderByStartedAt($order = Criteria::ASC) Order by the started_at column
 * @method     DownloadLogQuery orderByAccessedAt($order = Criteria::ASC) Order by the last_accessed_at column
 * @method     DownloadLogQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     DownloadLogQuery orderByByteCount($order = Criteria::ASC) Order by the byte_count column
 * @method     DownloadLogQuery orderByIsAborted($order = Criteria::ASC) Order by the is_aborted column
 *
 * @method     DownloadLogQuery groupById() Group by the id column
 * @method     DownloadLogQuery groupByDownloadFileId() Group by the download_file_id column
 * @method     DownloadLogQuery groupByStartedAt() Group by the started_at column
 * @method     DownloadLogQuery groupByAccessedAt() Group by the last_accessed_at column
 * @method     DownloadLogQuery groupByIp() Group by the ip column
 * @method     DownloadLogQuery groupByByteCount() Group by the byte_count column
 * @method     DownloadLogQuery groupByIsAborted() Group by the is_aborted column
 *
 * @method     DownloadLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DownloadLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DownloadLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DownloadLogQuery leftJoinDownloadFile($relationAlias = null) Adds a LEFT JOIN clause to the query using the DownloadFile relation
 * @method     DownloadLogQuery rightJoinDownloadFile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DownloadFile relation
 * @method     DownloadLogQuery innerJoinDownloadFile($relationAlias = null) Adds a INNER JOIN clause to the query using the DownloadFile relation
 *
 * @method     DownloadLog findOne(PropelPDO $con = null) Return the first DownloadLog matching the query
 * @method     DownloadLog findOneOrCreate(PropelPDO $con = null) Return the first DownloadLog matching the query, or a new DownloadLog object populated from the query conditions when no match is found
 *
 * @method     DownloadLog findOneById(int $id) Return the first DownloadLog filtered by the id column
 * @method     DownloadLog findOneByDownloadFileId(int $download_file_id) Return the first DownloadLog filtered by the download_file_id column
 * @method     DownloadLog findOneByStartedAt(string $started_at) Return the first DownloadLog filtered by the started_at column
 * @method     DownloadLog findOneByAccessedAt(string $last_accessed_at) Return the first DownloadLog filtered by the last_accessed_at column
 * @method     DownloadLog findOneByIp(string $ip) Return the first DownloadLog filtered by the ip column
 * @method     DownloadLog findOneByByteCount(int $byte_count) Return the first DownloadLog filtered by the byte_count column
 * @method     DownloadLog findOneByIsAborted(boolean $is_aborted) Return the first DownloadLog filtered by the is_aborted column
 *
 * @method     array findById(int $id) Return DownloadLog objects filtered by the id column
 * @method     array findByDownloadFileId(int $download_file_id) Return DownloadLog objects filtered by the download_file_id column
 * @method     array findByStartedAt(string $started_at) Return DownloadLog objects filtered by the started_at column
 * @method     array findByAccessedAt(string $last_accessed_at) Return DownloadLog objects filtered by the last_accessed_at column
 * @method     array findByIp(string $ip) Return DownloadLog objects filtered by the ip column
 * @method     array findByByteCount(int $byte_count) Return DownloadLog objects filtered by the byte_count column
 * @method     array findByIsAborted(boolean $is_aborted) Return DownloadLog objects filtered by the is_aborted column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDownloadLogQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseDownloadLogQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'DownloadLog', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DownloadLogQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DownloadLogQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DownloadLogQuery) {
			return $criteria;
		}
		$query = new DownloadLogQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    DownloadLog|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = DownloadLogPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(DownloadLogPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(DownloadLogPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DownloadLogPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the download_file_id column
	 * 
	 * @param     int|array $downloadFileId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterByDownloadFileId($downloadFileId = null, $comparison = null)
	{
		if (is_array($downloadFileId)) {
			$useMinMax = false;
			if (isset($downloadFileId['min'])) {
				$this->addUsingAlias(DownloadLogPeer::DOWNLOAD_FILE_ID, $downloadFileId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($downloadFileId['max'])) {
				$this->addUsingAlias(DownloadLogPeer::DOWNLOAD_FILE_ID, $downloadFileId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadLogPeer::DOWNLOAD_FILE_ID, $downloadFileId, $comparison);
	}

	/**
	 * Filter the query on the started_at column
	 * 
	 * @param     string|array $startedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterByStartedAt($startedAt = null, $comparison = null)
	{
		if (is_array($startedAt)) {
			$useMinMax = false;
			if (isset($startedAt['min'])) {
				$this->addUsingAlias(DownloadLogPeer::STARTED_AT, $startedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startedAt['max'])) {
				$this->addUsingAlias(DownloadLogPeer::STARTED_AT, $startedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadLogPeer::STARTED_AT, $startedAt, $comparison);
	}

	/**
	 * Filter the query on the last_accessed_at column
	 * 
	 * @param     string|array $accessedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterByAccessedAt($accessedAt = null, $comparison = null)
	{
		if (is_array($accessedAt)) {
			$useMinMax = false;
			if (isset($accessedAt['min'])) {
				$this->addUsingAlias(DownloadLogPeer::LAST_ACCESSED_AT, $accessedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($accessedAt['max'])) {
				$this->addUsingAlias(DownloadLogPeer::LAST_ACCESSED_AT, $accessedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadLogPeer::LAST_ACCESSED_AT, $accessedAt, $comparison);
	}

	/**
	 * Filter the query on the ip column
	 * 
	 * @param     string $ip The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterByIp($ip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ip)) {
				$ip = str_replace('*', '%', $ip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DownloadLogPeer::IP, $ip, $comparison);
	}

	/**
	 * Filter the query on the byte_count column
	 * 
	 * @param     int|array $byteCount The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterByByteCount($byteCount = null, $comparison = null)
	{
		if (is_array($byteCount)) {
			$useMinMax = false;
			if (isset($byteCount['min'])) {
				$this->addUsingAlias(DownloadLogPeer::BYTE_COUNT, $byteCount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($byteCount['max'])) {
				$this->addUsingAlias(DownloadLogPeer::BYTE_COUNT, $byteCount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadLogPeer::BYTE_COUNT, $byteCount, $comparison);
	}

	/**
	 * Filter the query on the is_aborted column
	 * 
	 * @param     boolean|string $isAborted The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterByIsAborted($isAborted = null, $comparison = null)
	{
		if (is_string($isAborted)) {
			$is_aborted = in_array(strtolower($isAborted), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(DownloadLogPeer::IS_ABORTED, $isAborted, $comparison);
	}

	/**
	 * Filter the query by a related DownloadFile object
	 *
	 * @param     DownloadFile $downloadFile  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function filterByDownloadFile($downloadFile, $comparison = null)
	{
		return $this
			->addUsingAlias(DownloadLogPeer::DOWNLOAD_FILE_ID, $downloadFile->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the DownloadFile relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function joinDownloadFile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('DownloadFile');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'DownloadFile');
		}
		
		return $this;
	}

	/**
	 * Use the DownloadFile relation DownloadFile object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DownloadFileQuery A secondary query class using the current class as primary query
	 */
	public function useDownloadFileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDownloadFile($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'DownloadFile', 'DownloadFileQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     DownloadLog $downloadLog Object to remove from the list of results
	 *
	 * @return    DownloadLogQuery The current query, for fluid interface
	 */
	public function prune($downloadLog = null)
	{
		if ($downloadLog) {
			$this->addUsingAlias(DownloadLogPeer::ID, $downloadLog->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseDownloadLogQuery
