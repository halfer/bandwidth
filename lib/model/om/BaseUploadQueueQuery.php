<?php


/**
 * Base class that represents a query for the 'upload_queue' table.
 *
 * 
 *
 * @method     UploadQueueQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UploadQueueQuery orderByOwnerId($order = Criteria::ASC) Order by the owner_id column
 * @method     UploadQueueQuery orderByFileId($order = Criteria::ASC) Order by the file_id column
 * @method     UploadQueueQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     UploadQueueQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     UploadQueueQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     UploadQueueQuery orderByProcessedAt($order = Criteria::ASC) Order by the processed_at column
 * @method     UploadQueueQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     UploadQueueQuery orderByReport($order = Criteria::ASC) Order by the report column
 *
 * @method     UploadQueueQuery groupById() Group by the id column
 * @method     UploadQueueQuery groupByOwnerId() Group by the owner_id column
 * @method     UploadQueueQuery groupByFileId() Group by the file_id column
 * @method     UploadQueueQuery groupByUrl() Group by the url column
 * @method     UploadQueueQuery groupByPath() Group by the path column
 * @method     UploadQueueQuery groupByCreatedAt() Group by the created_at column
 * @method     UploadQueueQuery groupByProcessedAt() Group by the processed_at column
 * @method     UploadQueueQuery groupByStatus() Group by the status column
 * @method     UploadQueueQuery groupByReport() Group by the report column
 *
 * @method     UploadQueueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UploadQueueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UploadQueueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UploadQueueQuery leftJoinsfGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUser relation
 * @method     UploadQueueQuery rightJoinsfGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUser relation
 * @method     UploadQueueQuery innerJoinsfGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUser relation
 *
 * @method     UploadQueueQuery leftJoinDownloadFile($relationAlias = null) Adds a LEFT JOIN clause to the query using the DownloadFile relation
 * @method     UploadQueueQuery rightJoinDownloadFile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DownloadFile relation
 * @method     UploadQueueQuery innerJoinDownloadFile($relationAlias = null) Adds a INNER JOIN clause to the query using the DownloadFile relation
 *
 * @method     UploadQueue findOne(PropelPDO $con = null) Return the first UploadQueue matching the query
 * @method     UploadQueue findOneOrCreate(PropelPDO $con = null) Return the first UploadQueue matching the query, or a new UploadQueue object populated from the query conditions when no match is found
 *
 * @method     UploadQueue findOneById(int $id) Return the first UploadQueue filtered by the id column
 * @method     UploadQueue findOneByOwnerId(int $owner_id) Return the first UploadQueue filtered by the owner_id column
 * @method     UploadQueue findOneByFileId(int $file_id) Return the first UploadQueue filtered by the file_id column
 * @method     UploadQueue findOneByUrl(string $url) Return the first UploadQueue filtered by the url column
 * @method     UploadQueue findOneByPath(string $path) Return the first UploadQueue filtered by the path column
 * @method     UploadQueue findOneByCreatedAt(string $created_at) Return the first UploadQueue filtered by the created_at column
 * @method     UploadQueue findOneByProcessedAt(string $processed_at) Return the first UploadQueue filtered by the processed_at column
 * @method     UploadQueue findOneByStatus(int $status) Return the first UploadQueue filtered by the status column
 * @method     UploadQueue findOneByReport(string $report) Return the first UploadQueue filtered by the report column
 *
 * @method     array findById(int $id) Return UploadQueue objects filtered by the id column
 * @method     array findByOwnerId(int $owner_id) Return UploadQueue objects filtered by the owner_id column
 * @method     array findByFileId(int $file_id) Return UploadQueue objects filtered by the file_id column
 * @method     array findByUrl(string $url) Return UploadQueue objects filtered by the url column
 * @method     array findByPath(string $path) Return UploadQueue objects filtered by the path column
 * @method     array findByCreatedAt(string $created_at) Return UploadQueue objects filtered by the created_at column
 * @method     array findByProcessedAt(string $processed_at) Return UploadQueue objects filtered by the processed_at column
 * @method     array findByStatus(int $status) Return UploadQueue objects filtered by the status column
 * @method     array findByReport(string $report) Return UploadQueue objects filtered by the report column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseUploadQueueQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUploadQueueQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'UploadQueue', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UploadQueueQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UploadQueueQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UploadQueueQuery) {
			return $criteria;
		}
		$query = new UploadQueueQuery();
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
	 * @return    UploadQueue|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UploadQueuePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UploadQueuePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UploadQueuePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UploadQueuePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the owner_id column
	 * 
	 * @param     int|array $ownerId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByOwnerId($ownerId = null, $comparison = null)
	{
		if (is_array($ownerId)) {
			$useMinMax = false;
			if (isset($ownerId['min'])) {
				$this->addUsingAlias(UploadQueuePeer::OWNER_ID, $ownerId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ownerId['max'])) {
				$this->addUsingAlias(UploadQueuePeer::OWNER_ID, $ownerId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UploadQueuePeer::OWNER_ID, $ownerId, $comparison);
	}

	/**
	 * Filter the query on the file_id column
	 * 
	 * @param     int|array $fileId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByFileId($fileId = null, $comparison = null)
	{
		if (is_array($fileId)) {
			$useMinMax = false;
			if (isset($fileId['min'])) {
				$this->addUsingAlias(UploadQueuePeer::FILE_ID, $fileId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fileId['max'])) {
				$this->addUsingAlias(UploadQueuePeer::FILE_ID, $fileId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UploadQueuePeer::FILE_ID, $fileId, $comparison);
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($url)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $url)) {
				$url = str_replace('*', '%', $url);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UploadQueuePeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the path column
	 * 
	 * @param     string $path The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByPath($path = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($path)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $path)) {
				$path = str_replace('*', '%', $path);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UploadQueuePeer::PATH, $path, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(UploadQueuePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(UploadQueuePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UploadQueuePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the processed_at column
	 * 
	 * @param     string|array $processedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByProcessedAt($processedAt = null, $comparison = null)
	{
		if (is_array($processedAt)) {
			$useMinMax = false;
			if (isset($processedAt['min'])) {
				$this->addUsingAlias(UploadQueuePeer::PROCESSED_AT, $processedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($processedAt['max'])) {
				$this->addUsingAlias(UploadQueuePeer::PROCESSED_AT, $processedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UploadQueuePeer::PROCESSED_AT, $processedAt, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(UploadQueuePeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(UploadQueuePeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UploadQueuePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the report column
	 * 
	 * @param     string $report The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByReport($report = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($report)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $report)) {
				$report = str_replace('*', '%', $report);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UploadQueuePeer::REPORT, $report, $comparison);
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUser($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(UploadQueuePeer::OWNER_ID, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function joinsfGuardUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUser');
		
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
			$this->addJoinObject($join, 'sfGuardUser');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUser relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinsfGuardUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUser', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related DownloadFile object
	 *
	 * @param     DownloadFile $downloadFile  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function filterByDownloadFile($downloadFile, $comparison = null)
	{
		return $this
			->addUsingAlias(UploadQueuePeer::FILE_ID, $downloadFile->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the DownloadFile relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function joinDownloadFile($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useDownloadFileQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinDownloadFile($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'DownloadFile', 'DownloadFileQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     UploadQueue $uploadQueue Object to remove from the list of results
	 *
	 * @return    UploadQueueQuery The current query, for fluid interface
	 */
	public function prune($uploadQueue = null)
	{
		if ($uploadQueue) {
			$this->addUsingAlias(UploadQueuePeer::ID, $uploadQueue->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseUploadQueueQuery
