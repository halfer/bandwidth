<?php


/**
 * Base class that represents a query for the 'download_file' table.
 *
 * 
 *
 * @method     DownloadFileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     DownloadFileQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     DownloadFileQuery orderByFolder($order = Criteria::ASC) Order by the folder column
 * @method     DownloadFileQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     DownloadFileQuery orderByOriginalUri($order = Criteria::ASC) Order by the original_uri column
 * @method     DownloadFileQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     DownloadFileQuery orderByCheckedAt($order = Criteria::ASC) Order by the checked_at column
 * @method     DownloadFileQuery orderBySize($order = Criteria::ASC) Order by the size column
 * @method     DownloadFileQuery orderByIsEnabled($order = Criteria::ASC) Order by the is_enabled column
 *
 * @method     DownloadFileQuery groupById() Group by the id column
 * @method     DownloadFileQuery groupByName() Group by the name column
 * @method     DownloadFileQuery groupByFolder() Group by the folder column
 * @method     DownloadFileQuery groupByPath() Group by the path column
 * @method     DownloadFileQuery groupByOriginalUri() Group by the original_uri column
 * @method     DownloadFileQuery groupByCreatedAt() Group by the created_at column
 * @method     DownloadFileQuery groupByCheckedAt() Group by the checked_at column
 * @method     DownloadFileQuery groupBySize() Group by the size column
 * @method     DownloadFileQuery groupByIsEnabled() Group by the is_enabled column
 *
 * @method     DownloadFileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DownloadFileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DownloadFileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DownloadFileQuery leftJoinFileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the FileGroup relation
 * @method     DownloadFileQuery rightJoinFileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FileGroup relation
 * @method     DownloadFileQuery innerJoinFileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the FileGroup relation
 *
 * @method     DownloadFileQuery leftJoinDownloadLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the DownloadLog relation
 * @method     DownloadFileQuery rightJoinDownloadLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DownloadLog relation
 * @method     DownloadFileQuery innerJoinDownloadLog($relationAlias = null) Adds a INNER JOIN clause to the query using the DownloadLog relation
 *
 * @method     DownloadFileQuery leftJoinUploadQueue($relationAlias = null) Adds a LEFT JOIN clause to the query using the UploadQueue relation
 * @method     DownloadFileQuery rightJoinUploadQueue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UploadQueue relation
 * @method     DownloadFileQuery innerJoinUploadQueue($relationAlias = null) Adds a INNER JOIN clause to the query using the UploadQueue relation
 *
 * @method     DownloadFile findOne(PropelPDO $con = null) Return the first DownloadFile matching the query
 * @method     DownloadFile findOneOrCreate(PropelPDO $con = null) Return the first DownloadFile matching the query, or a new DownloadFile object populated from the query conditions when no match is found
 *
 * @method     DownloadFile findOneById(int $id) Return the first DownloadFile filtered by the id column
 * @method     DownloadFile findOneByName(string $name) Return the first DownloadFile filtered by the name column
 * @method     DownloadFile findOneByFolder(string $folder) Return the first DownloadFile filtered by the folder column
 * @method     DownloadFile findOneByPath(string $path) Return the first DownloadFile filtered by the path column
 * @method     DownloadFile findOneByOriginalUri(string $original_uri) Return the first DownloadFile filtered by the original_uri column
 * @method     DownloadFile findOneByCreatedAt(string $created_at) Return the first DownloadFile filtered by the created_at column
 * @method     DownloadFile findOneByCheckedAt(string $checked_at) Return the first DownloadFile filtered by the checked_at column
 * @method     DownloadFile findOneBySize(int $size) Return the first DownloadFile filtered by the size column
 * @method     DownloadFile findOneByIsEnabled(boolean $is_enabled) Return the first DownloadFile filtered by the is_enabled column
 *
 * @method     array findById(int $id) Return DownloadFile objects filtered by the id column
 * @method     array findByName(string $name) Return DownloadFile objects filtered by the name column
 * @method     array findByFolder(string $folder) Return DownloadFile objects filtered by the folder column
 * @method     array findByPath(string $path) Return DownloadFile objects filtered by the path column
 * @method     array findByOriginalUri(string $original_uri) Return DownloadFile objects filtered by the original_uri column
 * @method     array findByCreatedAt(string $created_at) Return DownloadFile objects filtered by the created_at column
 * @method     array findByCheckedAt(string $checked_at) Return DownloadFile objects filtered by the checked_at column
 * @method     array findBySize(int $size) Return DownloadFile objects filtered by the size column
 * @method     array findByIsEnabled(boolean $is_enabled) Return DownloadFile objects filtered by the is_enabled column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDownloadFileQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseDownloadFileQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'DownloadFile', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DownloadFileQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DownloadFileQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DownloadFileQuery) {
			return $criteria;
		}
		$query = new DownloadFileQuery();
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
	 * @return    DownloadFile|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = DownloadFilePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(DownloadFilePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(DownloadFilePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DownloadFilePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DownloadFilePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the folder column
	 * 
	 * @param     string $folder The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByFolder($folder = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($folder)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $folder)) {
				$folder = str_replace('*', '%', $folder);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DownloadFilePeer::FOLDER, $folder, $comparison);
	}

	/**
	 * Filter the query on the path column
	 * 
	 * @param     string $path The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
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
		return $this->addUsingAlias(DownloadFilePeer::PATH, $path, $comparison);
	}

	/**
	 * Filter the query on the original_uri column
	 * 
	 * @param     string $originalUri The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByOriginalUri($originalUri = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($originalUri)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $originalUri)) {
				$originalUri = str_replace('*', '%', $originalUri);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DownloadFilePeer::ORIGINAL_URI, $originalUri, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(DownloadFilePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(DownloadFilePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadFilePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the checked_at column
	 * 
	 * @param     string|array $checkedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByCheckedAt($checkedAt = null, $comparison = null)
	{
		if (is_array($checkedAt)) {
			$useMinMax = false;
			if (isset($checkedAt['min'])) {
				$this->addUsingAlias(DownloadFilePeer::CHECKED_AT, $checkedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($checkedAt['max'])) {
				$this->addUsingAlias(DownloadFilePeer::CHECKED_AT, $checkedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadFilePeer::CHECKED_AT, $checkedAt, $comparison);
	}

	/**
	 * Filter the query on the size column
	 * 
	 * @param     int|array $size The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterBySize($size = null, $comparison = null)
	{
		if (is_array($size)) {
			$useMinMax = false;
			if (isset($size['min'])) {
				$this->addUsingAlias(DownloadFilePeer::SIZE, $size['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($size['max'])) {
				$this->addUsingAlias(DownloadFilePeer::SIZE, $size['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadFilePeer::SIZE, $size, $comparison);
	}

	/**
	 * Filter the query on the is_enabled column
	 * 
	 * @param     boolean|string $isEnabled The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByIsEnabled($isEnabled = null, $comparison = null)
	{
		if (is_string($isEnabled)) {
			$is_enabled = in_array(strtolower($isEnabled), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(DownloadFilePeer::IS_ENABLED, $isEnabled, $comparison);
	}

	/**
	 * Filter the query by a related FileGroup object
	 *
	 * @param     FileGroup $fileGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByFileGroup($fileGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(DownloadFilePeer::ID, $fileGroup->getDownloadFileId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the FileGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function joinFileGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('FileGroup');
		
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
			$this->addJoinObject($join, 'FileGroup');
		}
		
		return $this;
	}

	/**
	 * Use the FileGroup relation FileGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FileGroupQuery A secondary query class using the current class as primary query
	 */
	public function useFileGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinFileGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'FileGroup', 'FileGroupQuery');
	}

	/**
	 * Filter the query by a related DownloadLog object
	 *
	 * @param     DownloadLog $downloadLog  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByDownloadLog($downloadLog, $comparison = null)
	{
		return $this
			->addUsingAlias(DownloadFilePeer::ID, $downloadLog->getDownloadFileId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the DownloadLog relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function joinDownloadLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('DownloadLog');
		
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
			$this->addJoinObject($join, 'DownloadLog');
		}
		
		return $this;
	}

	/**
	 * Use the DownloadLog relation DownloadLog object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DownloadLogQuery A secondary query class using the current class as primary query
	 */
	public function useDownloadLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDownloadLog($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'DownloadLog', 'DownloadLogQuery');
	}

	/**
	 * Filter the query by a related UploadQueue object
	 *
	 * @param     UploadQueue $uploadQueue  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function filterByUploadQueue($uploadQueue, $comparison = null)
	{
		return $this
			->addUsingAlias(DownloadFilePeer::ID, $uploadQueue->getFileId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UploadQueue relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function joinUploadQueue($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UploadQueue');
		
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
			$this->addJoinObject($join, 'UploadQueue');
		}
		
		return $this;
	}

	/**
	 * Use the UploadQueue relation UploadQueue object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UploadQueueQuery A secondary query class using the current class as primary query
	 */
	public function useUploadQueueQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUploadQueue($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UploadQueue', 'UploadQueueQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     DownloadFile $downloadFile Object to remove from the list of results
	 *
	 * @return    DownloadFileQuery The current query, for fluid interface
	 */
	public function prune($downloadFile = null)
	{
		if ($downloadFile) {
			$this->addUsingAlias(DownloadFilePeer::ID, $downloadFile->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseDownloadFileQuery
