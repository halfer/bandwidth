<?php


/**
 * Base class that represents a row from the 'download_group' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDownloadGroup extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'DownloadGroupPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        DownloadGroupPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the rate_limit field.
	 * @var        int
	 */
	protected $rate_limit;

	/**
	 * The value for the count_limit field.
	 * @var        int
	 */
	protected $count_limit;

	/**
	 * The value for the bandwidth_limit field.
	 * @var        int
	 */
	protected $bandwidth_limit;

	/**
	 * The value for the concurrent_limit field.
	 * @var        int
	 */
	protected $concurrent_limit;

	/**
	 * The value for the concurrent_limit_per_ip field.
	 * @var        int
	 */
	protected $concurrent_limit_per_ip;

	/**
	 * The value for the valid_from field.
	 * @var        string
	 */
	protected $valid_from;

	/**
	 * The value for the valid_to field.
	 * @var        string
	 */
	protected $valid_to;

	/**
	 * The value for the is_use_landing field.
	 * @var        boolean
	 */
	protected $is_use_landing;

	/**
	 * The value for the is_use_captcha field.
	 * @var        boolean
	 */
	protected $is_use_captcha;

	/**
	 * The value for the system_group_type field.
	 * @var        int
	 */
	protected $system_group_type;

	/**
	 * The value for the reset_frequency field.
	 * @var        int
	 */
	protected $reset_frequency;

	/**
	 * The value for the reset_offset field.
	 * @var        int
	 */
	protected $reset_offset;

	/**
	 * The value for the is_enabled field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $is_enabled;

	/**
	 * @var        array FileGroup[] Collection to store aggregation of FileGroup objects.
	 */
	protected $collFileGroups;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->is_enabled = true;
	}

	/**
	 * Initializes internal state of BaseDownloadGroup object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [rate_limit] column value.
	 * 
	 * @return     int
	 */
	public function getRateLimit()
	{
		return $this->rate_limit;
	}

	/**
	 * Get the [count_limit] column value.
	 * 
	 * @return     int
	 */
	public function getCountLimit()
	{
		return $this->count_limit;
	}

	/**
	 * Get the [bandwidth_limit] column value.
	 * 
	 * @return     int
	 */
	public function getBandwidthLimit()
	{
		return $this->bandwidth_limit;
	}

	/**
	 * Get the [concurrent_limit] column value.
	 * 
	 * @return     int
	 */
	public function getConcurrentLimit()
	{
		return $this->concurrent_limit;
	}

	/**
	 * Get the [concurrent_limit_per_ip] column value.
	 * 
	 * @return     int
	 */
	public function getConcurrentLimitPerIp()
	{
		return $this->concurrent_limit_per_ip;
	}

	/**
	 * Get the [optionally formatted] temporal [valid_from] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getValidFrom($format = 'Y-m-d')
	{
		if ($this->valid_from === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->valid_from);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->valid_from, true), $x);
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [valid_to] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getValidTo($format = 'Y-m-d')
	{
		if ($this->valid_to === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->valid_to);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->valid_to, true), $x);
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [is_use_landing] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsUseLanding()
	{
		return $this->is_use_landing;
	}

	/**
	 * Get the [is_use_captcha] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsUseCaptcha()
	{
		return $this->is_use_captcha;
	}

	/**
	 * Get the [system_group_type] column value.
	 * 
	 * @return     int
	 */
	public function getSystemGroupType()
	{
		return $this->system_group_type;
	}

	/**
	 * Get the [reset_frequency] column value.
	 * 
	 * @return     int
	 */
	public function getResetFrequency()
	{
		return $this->reset_frequency;
	}

	/**
	 * Get the [reset_offset] column value.
	 * 
	 * @return     int
	 */
	public function getResetOffset()
	{
		return $this->reset_offset;
	}

	/**
	 * Get the [is_enabled] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsEnabled()
	{
		return $this->is_enabled;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [rate_limit] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setRateLimit($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rate_limit !== $v) {
			$this->rate_limit = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::RATE_LIMIT;
		}

		return $this;
	} // setRateLimit()

	/**
	 * Set the value of [count_limit] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setCountLimit($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->count_limit !== $v) {
			$this->count_limit = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::COUNT_LIMIT;
		}

		return $this;
	} // setCountLimit()

	/**
	 * Set the value of [bandwidth_limit] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setBandwidthLimit($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->bandwidth_limit !== $v) {
			$this->bandwidth_limit = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::BANDWIDTH_LIMIT;
		}

		return $this;
	} // setBandwidthLimit()

	/**
	 * Set the value of [concurrent_limit] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setConcurrentLimit($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->concurrent_limit !== $v) {
			$this->concurrent_limit = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::CONCURRENT_LIMIT;
		}

		return $this;
	} // setConcurrentLimit()

	/**
	 * Set the value of [concurrent_limit_per_ip] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setConcurrentLimitPerIp($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->concurrent_limit_per_ip !== $v) {
			$this->concurrent_limit_per_ip = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP;
		}

		return $this;
	} // setConcurrentLimitPerIp()

	/**
	 * Sets the value of [valid_from] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setValidFrom($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->valid_from !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->valid_from !== null && $tmpDt = new DateTime($this->valid_from)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->valid_from = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = DownloadGroupPeer::VALID_FROM;
			}
		} // if either are not null

		return $this;
	} // setValidFrom()

	/**
	 * Sets the value of [valid_to] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setValidTo($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->valid_to !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->valid_to !== null && $tmpDt = new DateTime($this->valid_to)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->valid_to = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = DownloadGroupPeer::VALID_TO;
			}
		} // if either are not null

		return $this;
	} // setValidTo()

	/**
	 * Set the value of [is_use_landing] column.
	 * 
	 * @param      boolean $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setIsUseLanding($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_use_landing !== $v) {
			$this->is_use_landing = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::IS_USE_LANDING;
		}

		return $this;
	} // setIsUseLanding()

	/**
	 * Set the value of [is_use_captcha] column.
	 * 
	 * @param      boolean $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setIsUseCaptcha($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_use_captcha !== $v) {
			$this->is_use_captcha = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::IS_USE_CAPTCHA;
		}

		return $this;
	} // setIsUseCaptcha()

	/**
	 * Set the value of [system_group_type] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setSystemGroupType($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->system_group_type !== $v) {
			$this->system_group_type = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::SYSTEM_GROUP_TYPE;
		}

		return $this;
	} // setSystemGroupType()

	/**
	 * Set the value of [reset_frequency] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setResetFrequency($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->reset_frequency !== $v) {
			$this->reset_frequency = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::RESET_FREQUENCY;
		}

		return $this;
	} // setResetFrequency()

	/**
	 * Set the value of [reset_offset] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setResetOffset($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->reset_offset !== $v) {
			$this->reset_offset = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::RESET_OFFSET;
		}

		return $this;
	} // setResetOffset()

	/**
	 * Set the value of [is_enabled] column.
	 * 
	 * @param      boolean $v new value
	 * @return     DownloadGroup The current object (for fluent API support)
	 */
	public function setIsEnabled($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_enabled !== $v || $this->isNew()) {
			$this->is_enabled = $v;
			$this->modifiedColumns[] = DownloadGroupPeer::IS_ENABLED;
		}

		return $this;
	} // setIsEnabled()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->is_enabled !== true) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->rate_limit = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->count_limit = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->bandwidth_limit = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->concurrent_limit = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->concurrent_limit_per_ip = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->valid_from = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->valid_to = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->is_use_landing = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->is_use_captcha = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
			$this->system_group_type = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->reset_frequency = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->reset_offset = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->is_enabled = ($row[$startcol + 14] !== null) ? (boolean) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 15; // 15 = DownloadGroupPeer::NUM_COLUMNS - DownloadGroupPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating DownloadGroup object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DownloadGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = DownloadGroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collFileGroups = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DownloadGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseDownloadGroup:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				DownloadGroupQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseDownloadGroup:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DownloadGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseDownloadGroup:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseDownloadGroup:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				DownloadGroupPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DownloadGroupPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(DownloadGroupPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.DownloadGroupPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = DownloadGroupPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collFileGroups !== null) {
				foreach ($this->collFileGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = DownloadGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFileGroups !== null) {
					foreach ($this->collFileGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DownloadGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getRateLimit();
				break;
			case 3:
				return $this->getCountLimit();
				break;
			case 4:
				return $this->getBandwidthLimit();
				break;
			case 5:
				return $this->getConcurrentLimit();
				break;
			case 6:
				return $this->getConcurrentLimitPerIp();
				break;
			case 7:
				return $this->getValidFrom();
				break;
			case 8:
				return $this->getValidTo();
				break;
			case 9:
				return $this->getIsUseLanding();
				break;
			case 10:
				return $this->getIsUseCaptcha();
				break;
			case 11:
				return $this->getSystemGroupType();
				break;
			case 12:
				return $this->getResetFrequency();
				break;
			case 13:
				return $this->getResetOffset();
				break;
			case 14:
				return $this->getIsEnabled();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DownloadGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getRateLimit(),
			$keys[3] => $this->getCountLimit(),
			$keys[4] => $this->getBandwidthLimit(),
			$keys[5] => $this->getConcurrentLimit(),
			$keys[6] => $this->getConcurrentLimitPerIp(),
			$keys[7] => $this->getValidFrom(),
			$keys[8] => $this->getValidTo(),
			$keys[9] => $this->getIsUseLanding(),
			$keys[10] => $this->getIsUseCaptcha(),
			$keys[11] => $this->getSystemGroupType(),
			$keys[12] => $this->getResetFrequency(),
			$keys[13] => $this->getResetOffset(),
			$keys[14] => $this->getIsEnabled(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DownloadGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setRateLimit($value);
				break;
			case 3:
				$this->setCountLimit($value);
				break;
			case 4:
				$this->setBandwidthLimit($value);
				break;
			case 5:
				$this->setConcurrentLimit($value);
				break;
			case 6:
				$this->setConcurrentLimitPerIp($value);
				break;
			case 7:
				$this->setValidFrom($value);
				break;
			case 8:
				$this->setValidTo($value);
				break;
			case 9:
				$this->setIsUseLanding($value);
				break;
			case 10:
				$this->setIsUseCaptcha($value);
				break;
			case 11:
				$this->setSystemGroupType($value);
				break;
			case 12:
				$this->setResetFrequency($value);
				break;
			case 13:
				$this->setResetOffset($value);
				break;
			case 14:
				$this->setIsEnabled($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DownloadGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRateLimit($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCountLimit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBandwidthLimit($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setConcurrentLimit($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setConcurrentLimitPerIp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setValidFrom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setValidTo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIsUseLanding($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIsUseCaptcha($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSystemGroupType($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setResetFrequency($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setResetOffset($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setIsEnabled($arr[$keys[14]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(DownloadGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(DownloadGroupPeer::ID)) $criteria->add(DownloadGroupPeer::ID, $this->id);
		if ($this->isColumnModified(DownloadGroupPeer::NAME)) $criteria->add(DownloadGroupPeer::NAME, $this->name);
		if ($this->isColumnModified(DownloadGroupPeer::RATE_LIMIT)) $criteria->add(DownloadGroupPeer::RATE_LIMIT, $this->rate_limit);
		if ($this->isColumnModified(DownloadGroupPeer::COUNT_LIMIT)) $criteria->add(DownloadGroupPeer::COUNT_LIMIT, $this->count_limit);
		if ($this->isColumnModified(DownloadGroupPeer::BANDWIDTH_LIMIT)) $criteria->add(DownloadGroupPeer::BANDWIDTH_LIMIT, $this->bandwidth_limit);
		if ($this->isColumnModified(DownloadGroupPeer::CONCURRENT_LIMIT)) $criteria->add(DownloadGroupPeer::CONCURRENT_LIMIT, $this->concurrent_limit);
		if ($this->isColumnModified(DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP)) $criteria->add(DownloadGroupPeer::CONCURRENT_LIMIT_PER_IP, $this->concurrent_limit_per_ip);
		if ($this->isColumnModified(DownloadGroupPeer::VALID_FROM)) $criteria->add(DownloadGroupPeer::VALID_FROM, $this->valid_from);
		if ($this->isColumnModified(DownloadGroupPeer::VALID_TO)) $criteria->add(DownloadGroupPeer::VALID_TO, $this->valid_to);
		if ($this->isColumnModified(DownloadGroupPeer::IS_USE_LANDING)) $criteria->add(DownloadGroupPeer::IS_USE_LANDING, $this->is_use_landing);
		if ($this->isColumnModified(DownloadGroupPeer::IS_USE_CAPTCHA)) $criteria->add(DownloadGroupPeer::IS_USE_CAPTCHA, $this->is_use_captcha);
		if ($this->isColumnModified(DownloadGroupPeer::SYSTEM_GROUP_TYPE)) $criteria->add(DownloadGroupPeer::SYSTEM_GROUP_TYPE, $this->system_group_type);
		if ($this->isColumnModified(DownloadGroupPeer::RESET_FREQUENCY)) $criteria->add(DownloadGroupPeer::RESET_FREQUENCY, $this->reset_frequency);
		if ($this->isColumnModified(DownloadGroupPeer::RESET_OFFSET)) $criteria->add(DownloadGroupPeer::RESET_OFFSET, $this->reset_offset);
		if ($this->isColumnModified(DownloadGroupPeer::IS_ENABLED)) $criteria->add(DownloadGroupPeer::IS_ENABLED, $this->is_enabled);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DownloadGroupPeer::DATABASE_NAME);
		$criteria->add(DownloadGroupPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of DownloadGroup (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setRateLimit($this->rate_limit);
		$copyObj->setCountLimit($this->count_limit);
		$copyObj->setBandwidthLimit($this->bandwidth_limit);
		$copyObj->setConcurrentLimit($this->concurrent_limit);
		$copyObj->setConcurrentLimitPerIp($this->concurrent_limit_per_ip);
		$copyObj->setValidFrom($this->valid_from);
		$copyObj->setValidTo($this->valid_to);
		$copyObj->setIsUseLanding($this->is_use_landing);
		$copyObj->setIsUseCaptcha($this->is_use_captcha);
		$copyObj->setSystemGroupType($this->system_group_type);
		$copyObj->setResetFrequency($this->reset_frequency);
		$copyObj->setResetOffset($this->reset_offset);
		$copyObj->setIsEnabled($this->is_enabled);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getFileGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addFileGroup($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     DownloadGroup Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     DownloadGroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DownloadGroupPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collFileGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addFileGroups()
	 */
	public function clearFileGroups()
	{
		$this->collFileGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collFileGroups collection.
	 *
	 * By default this just sets the collFileGroups collection to an empty array (like clearcollFileGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initFileGroups()
	{
		$this->collFileGroups = new PropelObjectCollection();
		$this->collFileGroups->setModel('FileGroup');
	}

	/**
	 * Gets an array of FileGroup objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this DownloadGroup is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array FileGroup[] List of FileGroup objects
	 * @throws     PropelException
	 */
	public function getFileGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collFileGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collFileGroups) {
				// return empty collection
				$this->initFileGroups();
			} else {
				$collFileGroups = FileGroupQuery::create(null, $criteria)
					->filterByDownloadGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collFileGroups;
				}
				$this->collFileGroups = $collFileGroups;
			}
		}
		return $this->collFileGroups;
	}

	/**
	 * Returns the number of related FileGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related FileGroup objects.
	 * @throws     PropelException
	 */
	public function countFileGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collFileGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collFileGroups) {
				return 0;
			} else {
				$query = FileGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByDownloadGroup($this)
					->count($con);
			}
		} else {
			return count($this->collFileGroups);
		}
	}

	/**
	 * Method called to associate a FileGroup object to this object
	 * through the FileGroup foreign key attribute.
	 *
	 * @param      FileGroup $l FileGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addFileGroup(FileGroup $l)
	{
		if ($this->collFileGroups === null) {
			$this->initFileGroups();
		}
		if (!$this->collFileGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->collFileGroups[]= $l;
			$l->setDownloadGroup($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this DownloadGroup is new, it will return
	 * an empty collection; or if this DownloadGroup has previously
	 * been saved, it will retrieve related FileGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in DownloadGroup.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array FileGroup[] List of FileGroup objects
	 */
	public function getFileGroupsJoinDownloadFile($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = FileGroupQuery::create(null, $criteria);
		$query->joinWith('DownloadFile', $join_behavior);

		return $this->getFileGroups($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->rate_limit = null;
		$this->count_limit = null;
		$this->bandwidth_limit = null;
		$this->concurrent_limit = null;
		$this->concurrent_limit_per_ip = null;
		$this->valid_from = null;
		$this->valid_to = null;
		$this->is_use_landing = null;
		$this->is_use_captcha = null;
		$this->system_group_type = null;
		$this->reset_frequency = null;
		$this->reset_offset = null;
		$this->is_enabled = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collFileGroups) {
				foreach ((array) $this->collFileGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collFileGroups = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseDownloadGroup:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseDownloadGroup
