<?php


/**
 * Base class that represents a row from the 'download_file' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDownloadFile extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'DownloadFilePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        DownloadFilePeer
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
	 * The value for the path field.
	 * @var        string
	 */
	protected $path;

	/**
	 * The value for the original_uri field.
	 * @var        string
	 */
	protected $original_uri;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the checked_at field.
	 * @var        string
	 */
	protected $checked_at;

	/**
	 * The value for the size field.
	 * @var        int
	 */
	protected $size;

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
	 * @var        array DownloadLog[] Collection to store aggregation of DownloadLog objects.
	 */
	protected $collDownloadLogs;

	/**
	 * @var        array UploadQueue[] Collection to store aggregation of UploadQueue objects.
	 */
	protected $collUploadQueues;

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
	 * Initializes internal state of BaseDownloadFile object.
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
	 * Get the [path] column value.
	 * 
	 * @return     string
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * Get the [original_uri] column value.
	 * 
	 * @return     string
	 */
	public function getOriginalUri()
	{
		return $this->original_uri;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->created_at);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
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
	 * Get the [optionally formatted] temporal [checked_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCheckedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->checked_at === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->checked_at);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->checked_at, true), $x);
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
	 * Get the [size] column value.
	 * 
	 * @return     int
	 */
	public function getSize()
	{
		return $this->size;
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
	 * @return     DownloadFile The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DownloadFilePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     DownloadFile The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DownloadFilePeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [path] column.
	 * 
	 * @param      string $v new value
	 * @return     DownloadFile The current object (for fluent API support)
	 */
	public function setPath($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->path !== $v) {
			$this->path = $v;
			$this->modifiedColumns[] = DownloadFilePeer::PATH;
		}

		return $this;
	} // setPath()

	/**
	 * Set the value of [original_uri] column.
	 * 
	 * @param      string $v new value
	 * @return     DownloadFile The current object (for fluent API support)
	 */
	public function setOriginalUri($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->original_uri !== $v) {
			$this->original_uri = $v;
			$this->modifiedColumns[] = DownloadFilePeer::ORIGINAL_URI;
		}

		return $this;
	} // setOriginalUri()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     DownloadFile The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
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

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d\\TH:i:sO') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d\\TH:i:sO') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d\\TH:i:sO') : null);
				$this->modifiedColumns[] = DownloadFilePeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [checked_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     DownloadFile The current object (for fluent API support)
	 */
	public function setCheckedAt($v)
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

		if ( $this->checked_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->checked_at !== null && $tmpDt = new DateTime($this->checked_at)) ? $tmpDt->format('Y-m-d\\TH:i:sO') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d\\TH:i:sO') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->checked_at = ($dt ? $dt->format('Y-m-d\\TH:i:sO') : null);
				$this->modifiedColumns[] = DownloadFilePeer::CHECKED_AT;
			}
		} // if either are not null

		return $this;
	} // setCheckedAt()

	/**
	 * Set the value of [size] column.
	 * 
	 * @param      int $v new value
	 * @return     DownloadFile The current object (for fluent API support)
	 */
	public function setSize($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->size !== $v) {
			$this->size = $v;
			$this->modifiedColumns[] = DownloadFilePeer::SIZE;
		}

		return $this;
	} // setSize()

	/**
	 * Set the value of [is_enabled] column.
	 * 
	 * @param      boolean $v new value
	 * @return     DownloadFile The current object (for fluent API support)
	 */
	public function setIsEnabled($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_enabled !== $v || $this->isNew()) {
			$this->is_enabled = $v;
			$this->modifiedColumns[] = DownloadFilePeer::IS_ENABLED;
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
			$this->path = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->original_uri = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->created_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->checked_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->size = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->is_enabled = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = DownloadFilePeer::NUM_COLUMNS - DownloadFilePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating DownloadFile object", $e);
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
			$con = Propel::getConnection(DownloadFilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = DownloadFilePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collFileGroups = null;

			$this->collDownloadLogs = null;

			$this->collUploadQueues = null;

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
			$con = Propel::getConnection(DownloadFilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseDownloadFile:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				DownloadFileQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseDownloadFile:delete:post') as $callable)
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
			$con = Propel::getConnection(DownloadFilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseDownloadFile:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(DownloadFilePeer::CREATED_AT))
				{
				  $this->setCreatedAt(time());
				}

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
				foreach (sfMixer::getCallables('BaseDownloadFile:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				DownloadFilePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = DownloadFilePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(DownloadFilePeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.DownloadFilePeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = DownloadFilePeer::doUpdate($this, $con);
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

			if ($this->collDownloadLogs !== null) {
				foreach ($this->collDownloadLogs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUploadQueues !== null) {
				foreach ($this->collUploadQueues as $referrerFK) {
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


			if (($retval = DownloadFilePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFileGroups !== null) {
					foreach ($this->collFileGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDownloadLogs !== null) {
					foreach ($this->collDownloadLogs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUploadQueues !== null) {
					foreach ($this->collUploadQueues as $referrerFK) {
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
		$pos = DownloadFilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPath();
				break;
			case 3:
				return $this->getOriginalUri();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getCheckedAt();
				break;
			case 6:
				return $this->getSize();
				break;
			case 7:
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
		$keys = DownloadFilePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getPath(),
			$keys[3] => $this->getOriginalUri(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getCheckedAt(),
			$keys[6] => $this->getSize(),
			$keys[7] => $this->getIsEnabled(),
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
		$pos = DownloadFilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPath($value);
				break;
			case 3:
				$this->setOriginalUri($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setCheckedAt($value);
				break;
			case 6:
				$this->setSize($value);
				break;
			case 7:
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
		$keys = DownloadFilePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPath($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOriginalUri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCheckedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSize($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsEnabled($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(DownloadFilePeer::DATABASE_NAME);

		if ($this->isColumnModified(DownloadFilePeer::ID)) $criteria->add(DownloadFilePeer::ID, $this->id);
		if ($this->isColumnModified(DownloadFilePeer::NAME)) $criteria->add(DownloadFilePeer::NAME, $this->name);
		if ($this->isColumnModified(DownloadFilePeer::PATH)) $criteria->add(DownloadFilePeer::PATH, $this->path);
		if ($this->isColumnModified(DownloadFilePeer::ORIGINAL_URI)) $criteria->add(DownloadFilePeer::ORIGINAL_URI, $this->original_uri);
		if ($this->isColumnModified(DownloadFilePeer::CREATED_AT)) $criteria->add(DownloadFilePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(DownloadFilePeer::CHECKED_AT)) $criteria->add(DownloadFilePeer::CHECKED_AT, $this->checked_at);
		if ($this->isColumnModified(DownloadFilePeer::SIZE)) $criteria->add(DownloadFilePeer::SIZE, $this->size);
		if ($this->isColumnModified(DownloadFilePeer::IS_ENABLED)) $criteria->add(DownloadFilePeer::IS_ENABLED, $this->is_enabled);

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
		$criteria = new Criteria(DownloadFilePeer::DATABASE_NAME);
		$criteria->add(DownloadFilePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of DownloadFile (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setPath($this->path);
		$copyObj->setOriginalUri($this->original_uri);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setCheckedAt($this->checked_at);
		$copyObj->setSize($this->size);
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

			foreach ($this->getDownloadLogs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addDownloadLog($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUploadQueues() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUploadQueue($relObj->copy($deepCopy));
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
	 * @return     DownloadFile Clone of current object.
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
	 * @return     DownloadFilePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DownloadFilePeer();
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
	 * If this DownloadFile is new, it will return
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
					->filterByDownloadFile($this)
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
					->filterByDownloadFile($this)
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
			$l->setDownloadFile($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this DownloadFile is new, it will return
	 * an empty collection; or if this DownloadFile has previously
	 * been saved, it will retrieve related FileGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in DownloadFile.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array FileGroup[] List of FileGroup objects
	 */
	public function getFileGroupsJoinDownloadGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = FileGroupQuery::create(null, $criteria);
		$query->joinWith('DownloadGroup', $join_behavior);

		return $this->getFileGroups($query, $con);
	}

	/**
	 * Clears out the collDownloadLogs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addDownloadLogs()
	 */
	public function clearDownloadLogs()
	{
		$this->collDownloadLogs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collDownloadLogs collection.
	 *
	 * By default this just sets the collDownloadLogs collection to an empty array (like clearcollDownloadLogs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initDownloadLogs()
	{
		$this->collDownloadLogs = new PropelObjectCollection();
		$this->collDownloadLogs->setModel('DownloadLog');
	}

	/**
	 * Gets an array of DownloadLog objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this DownloadFile is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array DownloadLog[] List of DownloadLog objects
	 * @throws     PropelException
	 */
	public function getDownloadLogs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collDownloadLogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collDownloadLogs) {
				// return empty collection
				$this->initDownloadLogs();
			} else {
				$collDownloadLogs = DownloadLogQuery::create(null, $criteria)
					->filterByDownloadFile($this)
					->find($con);
				if (null !== $criteria) {
					return $collDownloadLogs;
				}
				$this->collDownloadLogs = $collDownloadLogs;
			}
		}
		return $this->collDownloadLogs;
	}

	/**
	 * Returns the number of related DownloadLog objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related DownloadLog objects.
	 * @throws     PropelException
	 */
	public function countDownloadLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collDownloadLogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collDownloadLogs) {
				return 0;
			} else {
				$query = DownloadLogQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByDownloadFile($this)
					->count($con);
			}
		} else {
			return count($this->collDownloadLogs);
		}
	}

	/**
	 * Method called to associate a DownloadLog object to this object
	 * through the DownloadLog foreign key attribute.
	 *
	 * @param      DownloadLog $l DownloadLog
	 * @return     void
	 * @throws     PropelException
	 */
	public function addDownloadLog(DownloadLog $l)
	{
		if ($this->collDownloadLogs === null) {
			$this->initDownloadLogs();
		}
		if (!$this->collDownloadLogs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collDownloadLogs[]= $l;
			$l->setDownloadFile($this);
		}
	}

	/**
	 * Clears out the collUploadQueues collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUploadQueues()
	 */
	public function clearUploadQueues()
	{
		$this->collUploadQueues = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUploadQueues collection.
	 *
	 * By default this just sets the collUploadQueues collection to an empty array (like clearcollUploadQueues());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUploadQueues()
	{
		$this->collUploadQueues = new PropelObjectCollection();
		$this->collUploadQueues->setModel('UploadQueue');
	}

	/**
	 * Gets an array of UploadQueue objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this DownloadFile is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UploadQueue[] List of UploadQueue objects
	 * @throws     PropelException
	 */
	public function getUploadQueues($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUploadQueues || null !== $criteria) {
			if ($this->isNew() && null === $this->collUploadQueues) {
				// return empty collection
				$this->initUploadQueues();
			} else {
				$collUploadQueues = UploadQueueQuery::create(null, $criteria)
					->filterByDownloadFile($this)
					->find($con);
				if (null !== $criteria) {
					return $collUploadQueues;
				}
				$this->collUploadQueues = $collUploadQueues;
			}
		}
		return $this->collUploadQueues;
	}

	/**
	 * Returns the number of related UploadQueue objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UploadQueue objects.
	 * @throws     PropelException
	 */
	public function countUploadQueues(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUploadQueues || null !== $criteria) {
			if ($this->isNew() && null === $this->collUploadQueues) {
				return 0;
			} else {
				$query = UploadQueueQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByDownloadFile($this)
					->count($con);
			}
		} else {
			return count($this->collUploadQueues);
		}
	}

	/**
	 * Method called to associate a UploadQueue object to this object
	 * through the UploadQueue foreign key attribute.
	 *
	 * @param      UploadQueue $l UploadQueue
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUploadQueue(UploadQueue $l)
	{
		if ($this->collUploadQueues === null) {
			$this->initUploadQueues();
		}
		if (!$this->collUploadQueues->contains($l)) { // only add it if the **same** object is not already associated
			$this->collUploadQueues[]= $l;
			$l->setDownloadFile($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this DownloadFile is new, it will return
	 * an empty collection; or if this DownloadFile has previously
	 * been saved, it will retrieve related UploadQueues from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in DownloadFile.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UploadQueue[] List of UploadQueue objects
	 */
	public function getUploadQueuesJoinsfGuardUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UploadQueueQuery::create(null, $criteria);
		$query->joinWith('sfGuardUser', $join_behavior);

		return $this->getUploadQueues($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->path = null;
		$this->original_uri = null;
		$this->created_at = null;
		$this->checked_at = null;
		$this->size = null;
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
			if ($this->collDownloadLogs) {
				foreach ((array) $this->collDownloadLogs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUploadQueues) {
				foreach ((array) $this->collUploadQueues as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collFileGroups = null;
		$this->collDownloadLogs = null;
		$this->collUploadQueues = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseDownloadFile:' . $name))
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

} // BaseDownloadFile
