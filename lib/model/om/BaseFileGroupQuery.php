<?php


/**
 * Base class that represents a query for the 'file_group' table.
 *
 * 
 *
 * @method     FileGroupQuery orderByDownloadFileId($order = Criteria::ASC) Order by the download_file_id column
 * @method     FileGroupQuery orderByDownloadGroupId($order = Criteria::ASC) Order by the download_group_id column
 *
 * @method     FileGroupQuery groupByDownloadFileId() Group by the download_file_id column
 * @method     FileGroupQuery groupByDownloadGroupId() Group by the download_group_id column
 *
 * @method     FileGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FileGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FileGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FileGroupQuery leftJoinDownloadFile($relationAlias = null) Adds a LEFT JOIN clause to the query using the DownloadFile relation
 * @method     FileGroupQuery rightJoinDownloadFile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DownloadFile relation
 * @method     FileGroupQuery innerJoinDownloadFile($relationAlias = null) Adds a INNER JOIN clause to the query using the DownloadFile relation
 *
 * @method     FileGroupQuery leftJoinDownloadGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the DownloadGroup relation
 * @method     FileGroupQuery rightJoinDownloadGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DownloadGroup relation
 * @method     FileGroupQuery innerJoinDownloadGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the DownloadGroup relation
 *
 * @method     FileGroup findOne(PropelPDO $con = null) Return the first FileGroup matching the query
 * @method     FileGroup findOneOrCreate(PropelPDO $con = null) Return the first FileGroup matching the query, or a new FileGroup object populated from the query conditions when no match is found
 *
 * @method     FileGroup findOneByDownloadFileId(int $download_file_id) Return the first FileGroup filtered by the download_file_id column
 * @method     FileGroup findOneByDownloadGroupId(int $download_group_id) Return the first FileGroup filtered by the download_group_id column
 *
 * @method     array findByDownloadFileId(int $download_file_id) Return FileGroup objects filtered by the download_file_id column
 * @method     array findByDownloadGroupId(int $download_group_id) Return FileGroup objects filtered by the download_group_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseFileGroupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseFileGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'FileGroup', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FileGroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FileGroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FileGroupQuery) {
			return $criteria;
		}
		$query = new FileGroupQuery();
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
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$download_file_id, $download_group_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    FileGroup|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = FileGroupPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    FileGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(FileGroupPeer::DOWNLOAD_FILE_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(FileGroupPeer::DOWNLOAD_GROUP_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FileGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(FileGroupPeer::DOWNLOAD_FILE_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(FileGroupPeer::DOWNLOAD_GROUP_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the download_file_id column
	 * 
	 * @param     int|array $downloadFileId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FileGroupQuery The current query, for fluid interface
	 */
	public function filterByDownloadFileId($downloadFileId = null, $comparison = null)
	{
		if (is_array($downloadFileId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FileGroupPeer::DOWNLOAD_FILE_ID, $downloadFileId, $comparison);
	}

	/**
	 * Filter the query on the download_group_id column
	 * 
	 * @param     int|array $downloadGroupId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FileGroupQuery The current query, for fluid interface
	 */
	public function filterByDownloadGroupId($downloadGroupId = null, $comparison = null)
	{
		if (is_array($downloadGroupId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FileGroupPeer::DOWNLOAD_GROUP_ID, $downloadGroupId, $comparison);
	}

	/**
	 * Filter the query by a related DownloadFile object
	 *
	 * @param     DownloadFile $downloadFile  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FileGroupQuery The current query, for fluid interface
	 */
	public function filterByDownloadFile($downloadFile, $comparison = null)
	{
		return $this
			->addUsingAlias(FileGroupPeer::DOWNLOAD_FILE_ID, $downloadFile->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the DownloadFile relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FileGroupQuery The current query, for fluid interface
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
	 * Filter the query by a related DownloadGroup object
	 *
	 * @param     DownloadGroup $downloadGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FileGroupQuery The current query, for fluid interface
	 */
	public function filterByDownloadGroup($downloadGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(FileGroupPeer::DOWNLOAD_GROUP_ID, $downloadGroup->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the DownloadGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FileGroupQuery The current query, for fluid interface
	 */
	public function joinDownloadGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('DownloadGroup');
		
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
			$this->addJoinObject($join, 'DownloadGroup');
		}
		
		return $this;
	}

	/**
	 * Use the DownloadGroup relation DownloadGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DownloadGroupQuery A secondary query class using the current class as primary query
	 */
	public function useDownloadGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDownloadGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'DownloadGroup', 'DownloadGroupQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     FileGroup $fileGroup Object to remove from the list of results
	 *
	 * @return    FileGroupQuery The current query, for fluid interface
	 */
	public function prune($fileGroup = null)
	{
		if ($fileGroup) {
			$this->addCond('pruneCond0', $this->getAliasedColName(FileGroupPeer::DOWNLOAD_FILE_ID), $fileGroup->getDownloadFileId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(FileGroupPeer::DOWNLOAD_GROUP_ID), $fileGroup->getDownloadGroupId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseFileGroupQuery
