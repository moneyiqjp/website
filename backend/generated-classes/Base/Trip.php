<?php

namespace Base;

use \City as ChildCity;
use \CityQuery as ChildCityQuery;
use \Milage as ChildMilage;
use \MilageQuery as ChildMilageQuery;
use \Trip as ChildTrip;
use \TripQuery as ChildTripQuery;
use \Unit as ChildUnit;
use \UnitQuery as ChildUnitQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\TripTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'trip' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Trip implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TripTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the trip_id field.
     * @var        int
     */
    protected $trip_id;

    /**
     * The value for the from_city_id field.
     * @var        int
     */
    protected $from_city_id;

    /**
     * The value for the to_city_id field.
     * @var        int
     */
    protected $to_city_id;

    /**
     * The value for the distance field.
     * @var        int
     */
    protected $distance;

    /**
     * The value for the unit_id field.
     * @var        int
     */
    protected $unit_id;

    /**
     * The value for the display field.
     * @var        string
     */
    protected $display;

    /**
     * The value for the update_time field.
     * @var        \DateTime
     */
    protected $update_time;

    /**
     * The value for the update_user field.
     * @var        string
     */
    protected $update_user;

    /**
     * @var        ChildUnit
     */
    protected $aUnit;

    /**
     * @var        ChildCity
     */
    protected $aCityRelatedByFromCityId;

    /**
     * @var        ChildCity
     */
    protected $aCityRelatedByToCityId;

    /**
     * @var        ObjectCollection|ChildMilage[] Collection to store aggregation of ChildMilage objects.
     */
    protected $collMilages;
    protected $collMilagesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMilage[]
     */
    protected $milagesScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Trip object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Trip</code> instance.  If
     * <code>obj</code> is an instance of <code>Trip</code>, delegates to
     * <code>equals(Trip)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Trip The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [trip_id] column value.
     *
     * @return int
     */
    public function getTripId()
    {
        return $this->trip_id;
    }

    /**
     * Get the [from_city_id] column value.
     *
     * @return int
     */
    public function getFromCityId()
    {
        return $this->from_city_id;
    }

    /**
     * Get the [to_city_id] column value.
     *
     * @return int
     */
    public function getToCityId()
    {
        return $this->to_city_id;
    }

    /**
     * Get the [distance] column value.
     *
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Get the [unit_id] column value.
     *
     * @return int
     */
    public function getUnitId()
    {
        return $this->unit_id;
    }

    /**
     * Get the [display] column value.
     *
     * @return string
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Get the [optionally formatted] temporal [update_time] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdateTime($format = NULL)
    {
        if ($format === null) {
            return $this->update_time;
        } else {
            return $this->update_time instanceof \DateTime ? $this->update_time->format($format) : null;
        }
    }

    /**
     * Get the [update_user] column value.
     *
     * @return string
     */
    public function getUpdateUser()
    {
        return $this->update_user;
    }

    /**
     * Set the value of [trip_id] column.
     *
     * @param  int $v new value
     * @return $this|\Trip The current object (for fluent API support)
     */
    public function setTripId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trip_id !== $v) {
            $this->trip_id = $v;
            $this->modifiedColumns[TripTableMap::COL_TRIP_ID] = true;
        }

        return $this;
    } // setTripId()

    /**
     * Set the value of [from_city_id] column.
     *
     * @param  int $v new value
     * @return $this|\Trip The current object (for fluent API support)
     */
    public function setFromCityId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->from_city_id !== $v) {
            $this->from_city_id = $v;
            $this->modifiedColumns[TripTableMap::COL_FROM_CITY_ID] = true;
        }

        if ($this->aCityRelatedByFromCityId !== null && $this->aCityRelatedByFromCityId->getCityId() !== $v) {
            $this->aCityRelatedByFromCityId = null;
        }

        return $this;
    } // setFromCityId()

    /**
     * Set the value of [to_city_id] column.
     *
     * @param  int $v new value
     * @return $this|\Trip The current object (for fluent API support)
     */
    public function setToCityId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->to_city_id !== $v) {
            $this->to_city_id = $v;
            $this->modifiedColumns[TripTableMap::COL_TO_CITY_ID] = true;
        }

        if ($this->aCityRelatedByToCityId !== null && $this->aCityRelatedByToCityId->getCityId() !== $v) {
            $this->aCityRelatedByToCityId = null;
        }

        return $this;
    } // setToCityId()

    /**
     * Set the value of [distance] column.
     *
     * @param  int $v new value
     * @return $this|\Trip The current object (for fluent API support)
     */
    public function setDistance($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->distance !== $v) {
            $this->distance = $v;
            $this->modifiedColumns[TripTableMap::COL_DISTANCE] = true;
        }

        return $this;
    } // setDistance()

    /**
     * Set the value of [unit_id] column.
     *
     * @param  int $v new value
     * @return $this|\Trip The current object (for fluent API support)
     */
    public function setUnitId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->unit_id !== $v) {
            $this->unit_id = $v;
            $this->modifiedColumns[TripTableMap::COL_UNIT_ID] = true;
        }

        if ($this->aUnit !== null && $this->aUnit->getUnitId() !== $v) {
            $this->aUnit = null;
        }

        return $this;
    } // setUnitId()

    /**
     * Set the value of [display] column.
     *
     * @param  string $v new value
     * @return $this|\Trip The current object (for fluent API support)
     */
    public function setDisplay($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display !== $v) {
            $this->display = $v;
            $this->modifiedColumns[TripTableMap::COL_DISPLAY] = true;
        }

        return $this;
    } // setDisplay()

    /**
     * Sets the value of [update_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Trip The current object (for fluent API support)
     */
    public function setUpdateTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_time !== null || $dt !== null) {
            if ($dt !== $this->update_time) {
                $this->update_time = $dt;
                $this->modifiedColumns[TripTableMap::COL_UPDATE_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateTime()

    /**
     * Set the value of [update_user] column.
     *
     * @param  string $v new value
     * @return $this|\Trip The current object (for fluent API support)
     */
    public function setUpdateUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->update_user !== $v) {
            $this->update_user = $v;
            $this->modifiedColumns[TripTableMap::COL_UPDATE_USER] = true;
        }

        return $this;
    } // setUpdateUser()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
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
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TripTableMap::translateFieldName('TripId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trip_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TripTableMap::translateFieldName('FromCityId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->from_city_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TripTableMap::translateFieldName('ToCityId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->to_city_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TripTableMap::translateFieldName('Distance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->distance = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TripTableMap::translateFieldName('UnitId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unit_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TripTableMap::translateFieldName('Display', TableMap::TYPE_PHPNAME, $indexType)];
            $this->display = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TripTableMap::translateFieldName('UpdateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TripTableMap::translateFieldName('UpdateUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->update_user = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = TripTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Trip'), 0, $e);
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
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aCityRelatedByFromCityId !== null && $this->from_city_id !== $this->aCityRelatedByFromCityId->getCityId()) {
            $this->aCityRelatedByFromCityId = null;
        }
        if ($this->aCityRelatedByToCityId !== null && $this->to_city_id !== $this->aCityRelatedByToCityId->getCityId()) {
            $this->aCityRelatedByToCityId = null;
        }
        if ($this->aUnit !== null && $this->unit_id !== $this->aUnit->getUnitId()) {
            $this->aUnit = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TripTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTripQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUnit = null;
            $this->aCityRelatedByFromCityId = null;
            $this->aCityRelatedByToCityId = null;
            $this->collMilages = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Trip::setDeleted()
     * @see Trip::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TripTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTripQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TripTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
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
                TripTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUnit !== null) {
                if ($this->aUnit->isModified() || $this->aUnit->isNew()) {
                    $affectedRows += $this->aUnit->save($con);
                }
                $this->setUnit($this->aUnit);
            }

            if ($this->aCityRelatedByFromCityId !== null) {
                if ($this->aCityRelatedByFromCityId->isModified() || $this->aCityRelatedByFromCityId->isNew()) {
                    $affectedRows += $this->aCityRelatedByFromCityId->save($con);
                }
                $this->setCityRelatedByFromCityId($this->aCityRelatedByFromCityId);
            }

            if ($this->aCityRelatedByToCityId !== null) {
                if ($this->aCityRelatedByToCityId->isModified() || $this->aCityRelatedByToCityId->isNew()) {
                    $affectedRows += $this->aCityRelatedByToCityId->save($con);
                }
                $this->setCityRelatedByToCityId($this->aCityRelatedByToCityId);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->milagesScheduledForDeletion !== null) {
                if (!$this->milagesScheduledForDeletion->isEmpty()) {
                    \MilageQuery::create()
                        ->filterByPrimaryKeys($this->milagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->milagesScheduledForDeletion = null;
                }
            }

            if ($this->collMilages !== null) {
                foreach ($this->collMilages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[TripTableMap::COL_TRIP_ID] = true;
        if (null !== $this->trip_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TripTableMap::COL_TRIP_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TripTableMap::COL_TRIP_ID)) {
            $modifiedColumns[':p' . $index++]  = 'trip_id';
        }
        if ($this->isColumnModified(TripTableMap::COL_FROM_CITY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'from_city_id';
        }
        if ($this->isColumnModified(TripTableMap::COL_TO_CITY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'to_city_id';
        }
        if ($this->isColumnModified(TripTableMap::COL_DISTANCE)) {
            $modifiedColumns[':p' . $index++]  = 'distance';
        }
        if ($this->isColumnModified(TripTableMap::COL_UNIT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'unit_id';
        }
        if ($this->isColumnModified(TripTableMap::COL_DISPLAY)) {
            $modifiedColumns[':p' . $index++]  = 'display';
        }
        if ($this->isColumnModified(TripTableMap::COL_UPDATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'update_time';
        }
        if ($this->isColumnModified(TripTableMap::COL_UPDATE_USER)) {
            $modifiedColumns[':p' . $index++]  = 'update_user';
        }

        $sql = sprintf(
            'INSERT INTO trip (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'trip_id':
                        $stmt->bindValue($identifier, $this->trip_id, PDO::PARAM_INT);
                        break;
                    case 'from_city_id':
                        $stmt->bindValue($identifier, $this->from_city_id, PDO::PARAM_INT);
                        break;
                    case 'to_city_id':
                        $stmt->bindValue($identifier, $this->to_city_id, PDO::PARAM_INT);
                        break;
                    case 'distance':
                        $stmt->bindValue($identifier, $this->distance, PDO::PARAM_INT);
                        break;
                    case 'unit_id':
                        $stmt->bindValue($identifier, $this->unit_id, PDO::PARAM_INT);
                        break;
                    case 'display':
                        $stmt->bindValue($identifier, $this->display, PDO::PARAM_STR);
                        break;
                    case 'update_time':
                        $stmt->bindValue($identifier, $this->update_time ? $this->update_time->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'update_user':
                        $stmt->bindValue($identifier, $this->update_user, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setTripId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TripTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getTripId();
                break;
            case 1:
                return $this->getFromCityId();
                break;
            case 2:
                return $this->getToCityId();
                break;
            case 3:
                return $this->getDistance();
                break;
            case 4:
                return $this->getUnitId();
                break;
            case 5:
                return $this->getDisplay();
                break;
            case 6:
                return $this->getUpdateTime();
                break;
            case 7:
                return $this->getUpdateUser();
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
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Trip'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Trip'][$this->hashCode()] = true;
        $keys = TripTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTripId(),
            $keys[1] => $this->getFromCityId(),
            $keys[2] => $this->getToCityId(),
            $keys[3] => $this->getDistance(),
            $keys[4] => $this->getUnitId(),
            $keys[5] => $this->getDisplay(),
            $keys[6] => $this->getUpdateTime(),
            $keys[7] => $this->getUpdateUser(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUnit) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'unit';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'unit';
                        break;
                    default:
                        $key = 'Unit';
                }

                $result[$key] = $this->aUnit->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCityRelatedByFromCityId) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'city';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'city';
                        break;
                    default:
                        $key = 'City';
                }

                $result[$key] = $this->aCityRelatedByFromCityId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCityRelatedByToCityId) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'city';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'city';
                        break;
                    default:
                        $key = 'City';
                }

                $result[$key] = $this->aCityRelatedByToCityId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMilages) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'milages';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'milages';
                        break;
                    default:
                        $key = 'Milages';
                }

                $result[$key] = $this->collMilages->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Trip
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TripTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Trip
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setTripId($value);
                break;
            case 1:
                $this->setFromCityId($value);
                break;
            case 2:
                $this->setToCityId($value);
                break;
            case 3:
                $this->setDistance($value);
                break;
            case 4:
                $this->setUnitId($value);
                break;
            case 5:
                $this->setDisplay($value);
                break;
            case 6:
                $this->setUpdateTime($value);
                break;
            case 7:
                $this->setUpdateUser($value);
                break;
        } // switch()

        return $this;
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
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = TripTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setTripId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFromCityId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setToCityId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDistance($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUnitId($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDisplay($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setUpdateTime($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setUpdateUser($arr[$keys[7]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Trip The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TripTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TripTableMap::COL_TRIP_ID)) {
            $criteria->add(TripTableMap::COL_TRIP_ID, $this->trip_id);
        }
        if ($this->isColumnModified(TripTableMap::COL_FROM_CITY_ID)) {
            $criteria->add(TripTableMap::COL_FROM_CITY_ID, $this->from_city_id);
        }
        if ($this->isColumnModified(TripTableMap::COL_TO_CITY_ID)) {
            $criteria->add(TripTableMap::COL_TO_CITY_ID, $this->to_city_id);
        }
        if ($this->isColumnModified(TripTableMap::COL_DISTANCE)) {
            $criteria->add(TripTableMap::COL_DISTANCE, $this->distance);
        }
        if ($this->isColumnModified(TripTableMap::COL_UNIT_ID)) {
            $criteria->add(TripTableMap::COL_UNIT_ID, $this->unit_id);
        }
        if ($this->isColumnModified(TripTableMap::COL_DISPLAY)) {
            $criteria->add(TripTableMap::COL_DISPLAY, $this->display);
        }
        if ($this->isColumnModified(TripTableMap::COL_UPDATE_TIME)) {
            $criteria->add(TripTableMap::COL_UPDATE_TIME, $this->update_time);
        }
        if ($this->isColumnModified(TripTableMap::COL_UPDATE_USER)) {
            $criteria->add(TripTableMap::COL_UPDATE_USER, $this->update_user);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildTripQuery::create();
        $criteria->add(TripTableMap::COL_TRIP_ID, $this->trip_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getTripId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getTripId();
    }

    /**
     * Generic method to set the primary key (trip_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTripId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getTripId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Trip (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFromCityId($this->getFromCityId());
        $copyObj->setToCityId($this->getToCityId());
        $copyObj->setDistance($this->getDistance());
        $copyObj->setUnitId($this->getUnitId());
        $copyObj->setDisplay($this->getDisplay());
        $copyObj->setUpdateTime($this->getUpdateTime());
        $copyObj->setUpdateUser($this->getUpdateUser());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getMilages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMilage($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTripId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Trip Clone of current object.
     * @throws PropelException
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
     * Declares an association between this object and a ChildUnit object.
     *
     * @param  ChildUnit $v
     * @return $this|\Trip The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUnit(ChildUnit $v = null)
    {
        if ($v === null) {
            $this->setUnitId(NULL);
        } else {
            $this->setUnitId($v->getUnitId());
        }

        $this->aUnit = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUnit object, it will not be re-added.
        if ($v !== null) {
            $v->addTrip($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUnit object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUnit The associated ChildUnit object.
     * @throws PropelException
     */
    public function getUnit(ConnectionInterface $con = null)
    {
        if ($this->aUnit === null && ($this->unit_id !== null)) {
            $this->aUnit = ChildUnitQuery::create()->findPk($this->unit_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUnit->addTrips($this);
             */
        }

        return $this->aUnit;
    }

    /**
     * Declares an association between this object and a ChildCity object.
     *
     * @param  ChildCity $v
     * @return $this|\Trip The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCityRelatedByFromCityId(ChildCity $v = null)
    {
        if ($v === null) {
            $this->setFromCityId(NULL);
        } else {
            $this->setFromCityId($v->getCityId());
        }

        $this->aCityRelatedByFromCityId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCity object, it will not be re-added.
        if ($v !== null) {
            $v->addTripRelatedByFromCityId($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCity object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCity The associated ChildCity object.
     * @throws PropelException
     */
    public function getCityRelatedByFromCityId(ConnectionInterface $con = null)
    {
        if ($this->aCityRelatedByFromCityId === null && ($this->from_city_id !== null)) {
            $this->aCityRelatedByFromCityId = ChildCityQuery::create()->findPk($this->from_city_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCityRelatedByFromCityId->addTripsRelatedByFromCityId($this);
             */
        }

        return $this->aCityRelatedByFromCityId;
    }

    /**
     * Declares an association between this object and a ChildCity object.
     *
     * @param  ChildCity $v
     * @return $this|\Trip The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCityRelatedByToCityId(ChildCity $v = null)
    {
        if ($v === null) {
            $this->setToCityId(NULL);
        } else {
            $this->setToCityId($v->getCityId());
        }

        $this->aCityRelatedByToCityId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCity object, it will not be re-added.
        if ($v !== null) {
            $v->addTripRelatedByToCityId($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCity object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCity The associated ChildCity object.
     * @throws PropelException
     */
    public function getCityRelatedByToCityId(ConnectionInterface $con = null)
    {
        if ($this->aCityRelatedByToCityId === null && ($this->to_city_id !== null)) {
            $this->aCityRelatedByToCityId = ChildCityQuery::create()->findPk($this->to_city_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCityRelatedByToCityId->addTripsRelatedByToCityId($this);
             */
        }

        return $this->aCityRelatedByToCityId;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Milage' == $relationName) {
            return $this->initMilages();
        }
    }

    /**
     * Clears out the collMilages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMilages()
     */
    public function clearMilages()
    {
        $this->collMilages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMilages collection loaded partially.
     */
    public function resetPartialMilages($v = true)
    {
        $this->collMilagesPartial = $v;
    }

    /**
     * Initializes the collMilages collection.
     *
     * By default this just sets the collMilages collection to an empty array (like clearcollMilages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMilages($overrideExisting = true)
    {
        if (null !== $this->collMilages && !$overrideExisting) {
            return;
        }
        $this->collMilages = new ObjectCollection();
        $this->collMilages->setModel('\Milage');
    }

    /**
     * Gets an array of ChildMilage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTrip is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMilage[] List of ChildMilage objects
     * @throws PropelException
     */
    public function getMilages(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMilagesPartial && !$this->isNew();
        if (null === $this->collMilages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMilages) {
                // return empty collection
                $this->initMilages();
            } else {
                $collMilages = ChildMilageQuery::create(null, $criteria)
                    ->filterByTrip($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMilagesPartial && count($collMilages)) {
                        $this->initMilages(false);

                        foreach ($collMilages as $obj) {
                            if (false == $this->collMilages->contains($obj)) {
                                $this->collMilages->append($obj);
                            }
                        }

                        $this->collMilagesPartial = true;
                    }

                    return $collMilages;
                }

                if ($partial && $this->collMilages) {
                    foreach ($this->collMilages as $obj) {
                        if ($obj->isNew()) {
                            $collMilages[] = $obj;
                        }
                    }
                }

                $this->collMilages = $collMilages;
                $this->collMilagesPartial = false;
            }
        }

        return $this->collMilages;
    }

    /**
     * Sets a collection of ChildMilage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $milages A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTrip The current object (for fluent API support)
     */
    public function setMilages(Collection $milages, ConnectionInterface $con = null)
    {
        /** @var ChildMilage[] $milagesToDelete */
        $milagesToDelete = $this->getMilages(new Criteria(), $con)->diff($milages);


        $this->milagesScheduledForDeletion = $milagesToDelete;

        foreach ($milagesToDelete as $milageRemoved) {
            $milageRemoved->setTrip(null);
        }

        $this->collMilages = null;
        foreach ($milages as $milage) {
            $this->addMilage($milage);
        }

        $this->collMilages = $milages;
        $this->collMilagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Milage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Milage objects.
     * @throws PropelException
     */
    public function countMilages(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMilagesPartial && !$this->isNew();
        if (null === $this->collMilages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMilages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMilages());
            }

            $query = ChildMilageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTrip($this)
                ->count($con);
        }

        return count($this->collMilages);
    }

    /**
     * Method called to associate a ChildMilage object to this object
     * through the ChildMilage foreign key attribute.
     *
     * @param  ChildMilage $l ChildMilage
     * @return $this|\Trip The current object (for fluent API support)
     */
    public function addMilage(ChildMilage $l)
    {
        if ($this->collMilages === null) {
            $this->initMilages();
            $this->collMilagesPartial = true;
        }

        if (!$this->collMilages->contains($l)) {
            $this->doAddMilage($l);
        }

        return $this;
    }

    /**
     * @param ChildMilage $milage The ChildMilage object to add.
     */
    protected function doAddMilage(ChildMilage $milage)
    {
        $this->collMilages[]= $milage;
        $milage->setTrip($this);
    }

    /**
     * @param  ChildMilage $milage The ChildMilage object to remove.
     * @return $this|ChildTrip The current object (for fluent API support)
     */
    public function removeMilage(ChildMilage $milage)
    {
        if ($this->getMilages()->contains($milage)) {
            $pos = $this->collMilages->search($milage);
            $this->collMilages->remove($pos);
            if (null === $this->milagesScheduledForDeletion) {
                $this->milagesScheduledForDeletion = clone $this->collMilages;
                $this->milagesScheduledForDeletion->clear();
            }
            $this->milagesScheduledForDeletion[]= clone $milage;
            $milage->setTrip(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Trip is new, it will return
     * an empty collection; or if this Trip has previously
     * been saved, it will retrieve related Milages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Trip.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMilage[] List of ChildMilage objects
     */
    public function getMilagesJoinStore(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMilageQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getMilages($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aUnit) {
            $this->aUnit->removeTrip($this);
        }
        if (null !== $this->aCityRelatedByFromCityId) {
            $this->aCityRelatedByFromCityId->removeTripRelatedByFromCityId($this);
        }
        if (null !== $this->aCityRelatedByToCityId) {
            $this->aCityRelatedByToCityId->removeTripRelatedByToCityId($this);
        }
        $this->trip_id = null;
        $this->from_city_id = null;
        $this->to_city_id = null;
        $this->distance = null;
        $this->unit_id = null;
        $this->display = null;
        $this->update_time = null;
        $this->update_user = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collMilages) {
                foreach ($this->collMilages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collMilages = null;
        $this->aUnit = null;
        $this->aCityRelatedByFromCityId = null;
        $this->aCityRelatedByToCityId = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TripTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
