<?php


/**
 * Base class that represents a query for the 'download_group' table.
 *
 * 
 *
 * @method     DownloadGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     DownloadGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     DownloadGroupQuery orderByRateLimit($order = Criteria::ASC) Order by the rate_limit column
 * @method     DownloadGroupQuery orderByCountLimit($order = Criteria::ASC) Order by the count_limit column
 * @method     DownloadGroupQuery orderByBandwidthLimit($order = Criteria::ASC) Order by the bandwidth_limit column
 * @method     DownloadGroupQuery orderByConcurrentLimit($order = Criteria::ASC) Order by the concurrent_limit column
 * @method     DownloadGroupQuery orderByConcurrentLimitPerIp($order = Criteria::ASC) Order by the concurrent_limit_per_ip column
 * @method     DownloadGroupQuery orderByValidFrom($order = Criteria::ASC) Order by the valid_from column
 * @method     DownloadGroupQuery orderByValidTo($order = Criteria::ASC) Order by the valid_to column
 * @method     DownloadGroupQuery orderByIsUseLanding($order = Criteria::ASC) Order by the is_use_landing column
 * @method     DownloadGroupQuery orderByIsUseCaptcha($order = Criteria::ASC) Order by the is_use_captcha column
 * @method     DownloadGroupQuery orderBySystemGroupType($order = Criteria::ASC) Order by the system_group_type column
 * @method     DownloadGroupQuery orderByIsEnabled($order = Criteria::ASC) Order by the is_enabled column
 *
 * @method     DownloadGroupQuery groupById() Group by the id column
 * @method     DownloadGroupQuery groupByName() Group by the name column
 * @method     DownloadGroupQuery groupByRateLimit() Group by the rate_limit column
 * @method     DownloadGroupQuery groupByCountLimit() Group by the count_limit column
 * @method     DownloadGroupQuery groupByBandwidthLimit() Group by the bandwidth_limit column
 * @method     DownloadGroupQuery groupByConcurrentLimit() Group by the concurrent_limit column
 * @method     DownloadGroupQuery groupByConcurrentLimitPerIp() Group by the concurrent_limit_per_ip column
 * @method     DownloadGroupQuery groupByValidFrom() Group by the valid_from column
 * @method     DownloadGroupQuery groupByValidTo() Group by the valid_to column
 * @method     DownloadGroupQuery groupByIsUseLanding() Group by the is_use_landing column
 * @method     DownloadGroupQuery groupByIsUseCaptcha() Group by the is_use_captcha column
 * @method     DownloadGroupQuery groupBySystemGroupType() Group by the system_group_type column
 * @method     DownloadGroupQuery groupByIsEnabled() Group by the is_enabled column
 *
 * @method     DownloadGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DownloadGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DownloadGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DownloadGroupQuery leftJoinFileGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the FileGroup relation
 * @method     DownloadGroupQuery rightJoinFileGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FileGroup relation
 * @method     DownloadGroupQuery innerJoinFileGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the FileGroup relation
 *
 * @method     DownloadGroup findOne(PropelPDO $con = null) Return the first DownloadGroup matching the query
 * @method     DownloadGroup findOneOrCreate(PropelPDO $con = null) Return the first DownloadGroup matching the query, or a new DownloadGroup object populated from the query conditions when no match is found
 *
 * @method     DownloadGroup findOneById(int $id) Return the first DownloadGroup filtered by the id column
 * @method     DownloadGroup findOneByName(string $name) Return the first DownloadGroup filtered by the name column
 * @method     DownloadGroup findOneByRateLimit(int $rate_limit) Return the first DownloadGroup filtered by the rate_limit column
 * @method     DownloadGroup findOneByCountLimit(int $count_limit) Return the first DownloadGroup filtered by the count_limit column
 * @method     DownloadGroup findOneByBandwidthLimit(int $bandwidth_limit) Return the first DownloadGroup filtered by the bandwidth_limit column
 * @method     DownloadGroup findOneByConcurrentLimit(int $concurrent_limit) Return the first DownloadGroup filtered by the concurrent_limit column
 * @method     DownloadGroup findOneByConcurrentLimitPerIp(int $concurrent_limit_per_ip) Return the first DownloadGroup filtered by the concurrent_limit_per_ip column
 * @method     DownloadGroup findOneByValidFrom(string $valid_from) Return the first DownloadGroup filtered by the valid_from column
 * @method     DownloadGroup findOneByValidTo(string $valid_to) Return the first DownloadGroup filtered by the valid_to column
 * @method     DownloadGroup findOneByIsUseLanding(boolean $is_use_landing) Return the first DownloadGroup filtered by the is_use_landing column
 * @method     DownloadGroup findOneByIsUseCaptcha(boolean $is_use_captcha) Return the first DownloadGroup filtered by the is_use_captcha column
 * @method     DownloadGroup findOneBySystemGroupType(int $system_group_type) Return the first DownloadGroup filtered by the system_group_type column
 * @method     DownloadGroup findOneByIsEnabled(boolean $is_enabled) Return the first DownloadGroup filtered by the is_enabled column
 *
 * @method     array findById(int $id) Return DownloadGroup objects filtered by the id column
 * @method     array findByName(string $name) Return DownloadGroup objects filtered by the name column
 * @method     array findByRateLimit(int $rate_limit) Return DownloadGroup objects filtered by the rate_limit column
 * @method     array findByCountLimit(int $count_limit) Return DownloadGroup objects filtered by the count_limit column
 * @method     array findByBandwidthLimit(int $bandwidth_limit) Return DownloadGroup objects filtered by the bandwidth_limit column
 * @method     array findByConcurrentLimit(int $concurrent_limit) Return DownloadGroup objects filtered by the concurrent_limit column
 * @method     array findByConcurrentLimitPerIp(int $concurrent_limit_per_ip) Return DownloadGroup objects filtered by the concurrent_limit_per_ip column
 * @method     array findByValidFrom(string $valid_from) Return DownloadGroup objects filtered by the valid_from column
 * @method     array findByValidTo(string $valid_to) Return DownloadGroup objects filtered by the valid_to column
 * @method     array findByIsUseLanding(boolean $is_use_landing) Return DownloadGroup objects filtered by the is_use_landing column
 * @method     array findByIsUseCaptcha(boolean $is_use_captcha) Return DownloadGroup objects filtered by the is_use_captcha column
 * @method     array findBySystemGroupType(int $system_group_type) Return DownloadGroup objects filtered by the system_group_type column
 * @method     array findByIsEnabled(boolean $is_enabled) Return DownloadGroup objects filtered by the is_enabled column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDownloadGroupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseDownloadGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'DownloadGroup', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DownloadGroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DownloadGroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DownloadGroupQuery) {
			return $criteria;
		}
		$query = new DownloadGroupQuery();
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
	 * @return    DownloadGroup|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = DownloadGroupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(DownloadGroupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(DownloadGroupPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DownloadGroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
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
		return $this->addUsingAlias(DownloadGroupPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the rate_limit column
	 * 
	 * @param     int|array $rateLimit The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByRateLimit($rateLimit = null, $comparison = null)
	{
		if (is_array($rateLimit)) {
			$useMinMax = false;
			if (isset($rateLimit['min'])) {
				$this->addUsingAlias(DownloadGroupPeer::RATE_LIMIT, $rateLimit['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rateLimit['max'])) {
				$this->addUsingAlias(DownloadGroupPeer::RATE_LIMIT, $rateLimit['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadGroupPeer::RATE_LIMIT, $rateLimit, $comparison);
	}

	/**
	 * Filter the query on the count_limit column
	 * 
	 * @param     int|array $countLimit The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByCountLimit($countLimit = null, $comparison = null)
	{
		if (is_array($countLimit)) {
			$useMinMax = false;
			if (isset($countLimit['min'])) {
				$this->addUsingAlias(DownloadGroupPeer::COUNT_LIMIT, $countLimit['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($countLimit['max'])) {
				$this->addUsingAlias(DownloadGroupPeer::COUNT_LIMIT, $countLimit['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadGroupPeer::COUNT_LIMIT, $countLimit, $comparison);
	}

	/**
	 * Filter the query on the bandwidth_limit column
	 * 
	 * @param     int|array $bandwidthLimit The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByBandwidthLimit($bandwidthLimit = null, $comparison = null)
	{
		if (is_array($bandwidthLimit)) {
			$useMinMax = false;
			if (isset($bandwidthLimit['min'])) {
				$this->addUsingAlias(DownloadGroupPeer::BANDWIDTH_LIMIT, $bandwidthLimit['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($bandwidthLimit['max'])) {
				$this->addUsingAlias(DownloadGroupPeer::BANDWIDTH_LIMIT, $bandwidthLimit['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadGroupPeer::BANDWIDTH_LIMIT, $bandwidthLimit, $comparison);
	}

	/**
	 * Filter the query on the concurrent_limit column
	 * 
	 * @param     int|array $concurrentLimit The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByConcurrentLimit($concurrentLimit = null, $comparison = null)
	{
		if (is_array($concurrentLimit)) {
			$useMinMax = false;
			if (isset($concurrentLimit['min'])) {
				$this->addUsingAlias(DownloadGroupPeer::CONCURRENT_LIMIT, $concurrentLimit['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($concurrentLimit['max'])) {
				$this->addUsingAlias(DownloadGroupPeer::CONCURRENT_LIMIT, $concurrentLimit['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadGroupPeer::CONCURRENT_LIMIT, $concurrentLimit, $comparison);
	}

	/**
	 * Filter the query on the concurrent_limit_per_ip column
	 * 
	 * @param     int|array $concurrentLimitPerIp The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByConcurrentLimitPerIp($concurrentLimitPerIp = null, $comparison = null)
	{
		if (is_array($concurrentLimitPerIp)) {
			$useMinMax = false;
			if (isset($concurrentLimitPerIp['min'])) {
				$this->addUsingAlias(DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP, $concurrentLimitPerIp['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($concurrentLimitPerIp['max'])) {
				$this->addUsingAlias(DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP, $concurrentLimitPerIp['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP, $concurrentLimitPerIp, $comparison);
	}

	/**
	 * Filter the query on the valid_from column
	 * 
	 * @param     string|array $validFrom The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByValidFrom($validFrom = null, $comparison = null)
	{
		if (is_array($validFrom)) {
			$useMinMax = false;
			if (isset($validFrom['min'])) {
				$this->addUsingAlias(DownloadGroupPeer::VALID_FROM, $validFrom['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($validFrom['max'])) {
				$this->addUsingAlias(DownloadGroupPeer::VALID_FROM, $validFrom['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadGroupPeer::VALID_FROM, $validFrom, $comparison);
	}

	/**
	 * Filter the query on the valid_to column
	 * 
	 * @param     string|array $validTo The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByValidTo($validTo = null, $comparison = null)
	{
		if (is_array($validTo)) {
			$useMinMax = false;
			if (isset($validTo['min'])) {
				$this->addUsingAlias(DownloadGroupPeer::VALID_TO, $validTo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($validTo['max'])) {
				$this->addUsingAlias(DownloadGroupPeer::VALID_TO, $validTo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadGroupPeer::VALID_TO, $validTo, $comparison);
	}

	/**
	 * Filter the query on the is_use_landing column
	 * 
	 * @param     boolean|string $isUseLanding The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByIsUseLanding($isUseLanding = null, $comparison = null)
	{
		if (is_string($isUseLanding)) {
			$is_use_landing = in_array(strtolower($isUseLanding), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(DownloadGroupPeer::IS_USE_LANDING, $isUseLanding, $comparison);
	}

	/**
	 * Filter the query on the is_use_captcha column
	 * 
	 * @param     boolean|string $isUseCaptcha The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByIsUseCaptcha($isUseCaptcha = null, $comparison = null)
	{
		if (is_string($isUseCaptcha)) {
			$is_use_captcha = in_array(strtolower($isUseCaptcha), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(DownloadGroupPeer::IS_USE_CAPTCHA, $isUseCaptcha, $comparison);
	}

	/**
	 * Filter the query on the system_group_type column
	 * 
	 * @param     int|array $systemGroupType The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterBySystemGroupType($systemGroupType = null, $comparison = null)
	{
		if (is_array($systemGroupType)) {
			$useMinMax = false;
			if (isset($systemGroupType['min'])) {
				$this->addUsingAlias(DownloadGroupPeer::SYSTEM_GROUP_TYPE, $systemGroupType['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($systemGroupType['max'])) {
				$this->addUsingAlias(DownloadGroupPeer::SYSTEM_GROUP_TYPE, $systemGroupType['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DownloadGroupPeer::SYSTEM_GROUP_TYPE, $systemGroupType, $comparison);
	}

	/**
	 * Filter the query on the is_enabled column
	 * 
	 * @param     boolean|string $isEnabled The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByIsEnabled($isEnabled = null, $comparison = null)
	{
		if (is_string($isEnabled)) {
			$is_enabled = in_array(strtolower($isEnabled), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(DownloadGroupPeer::IS_ENABLED, $isEnabled, $comparison);
	}

	/**
	 * Filter the query by a related FileGroup object
	 *
	 * @param     FileGroup $fileGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function filterByFileGroup($fileGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(DownloadGroupPeer::ID, $fileGroup->getDownloadGroupId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the FileGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     DownloadGroup $downloadGroup Object to remove from the list of results
	 *
	 * @return    DownloadGroupQuery The current query, for fluid interface
	 */
	public function prune($downloadGroup = null)
	{
		if ($downloadGroup) {
			$this->addUsingAlias(DownloadGroupPeer::ID, $downloadGroup->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseDownloadGroupQuery
