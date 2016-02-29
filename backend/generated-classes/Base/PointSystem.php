<?php

namespace Base;

use \CardPointSystem as ChildCardPointSystem;
use \CardPointSystemQuery as ChildCardPointSystemQuery;
use \FlightCost as ChildFlightCost;
use \FlightCostQuery as ChildFlightCostQuery;
use \Mileage as ChildMileage;
use \MileageQuery as ChildMileageQuery;
use \PointAcquisition as ChildPointAcquisition;
use \PointAcquisitionQuery as ChildPointAcquisitionQuery;
use \PointSystem as ChildPointSystem;
use \PointSystemQuery as ChildPointSystemQuery;
use \PointUse as ChildPointUse;
use \PointUseQuery as ChildPointUseQuery;
use \Reward as ChildReward;
use \RewardQuery as ChildRewardQuery;
use \Season as ChildSeason;
use \SeasonQuery as ChildSeasonQuery;
use \Zone as ChildZone;
use \ZoneQuery as ChildZoneQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\PointSystemTableMap;
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
 * Base class that represents a row from the 'point_system' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class PointSystem implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PointSystemTableMap';


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
     * The value for the point_system_id field.
     * @var        int
     */
    protected $point_system_id;

    /**
     * The value for the point_system_name field.
     * @var        string
     */
    protected $point_system_name;

    /**
     * The value for the default_points_per_yen field.
     * Note: this column has a database default value of: '0.010000'
     * @var        string
     */
    protected $default_points_per_yen;

    /**
     * The value for the default_yen_per_point field.
     * Note: this column has a database default value of: '1.000000'
     * @var        string
     */
    protected $default_yen_per_point;

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
     * The value for the reference field.
     * @var        string
     */
    protected $reference;

    /**
     * @var        ObjectCollection|ChildCardPointSystem[] Collection to store aggregation of ChildCardPointSystem objects.
     */
    protected $collCardPointSystems;
    protected $collCardPointSystemsPartial;

    /**
     * @var        ObjectCollection|ChildFlightCost[] Collection to store aggregation of ChildFlightCost objects.
     */
    protected $collFlightCosts;
    protected $collFlightCostsPartial;

    /**
     * @var        ObjectCollection|ChildMileage[] Collection to store aggregation of ChildMileage objects.
     */
    protected $collMileages;
    protected $collMileagesPartial;

    /**
     * @var        ObjectCollection|ChildPointAcquisition[] Collection to store aggregation of ChildPointAcquisition objects.
     */
    protected $collPointAcquisitions;
    protected $collPointAcquisitionsPartial;

    /**
     * @var        ObjectCollection|ChildPointUse[] Collection to store aggregation of ChildPointUse objects.
     */
    protected $collPointUses;
    protected $collPointUsesPartial;

    /**
     * @var        ObjectCollection|ChildReward[] Collection to store aggregation of ChildReward objects.
     */
    protected $collRewards;
    protected $collRewardsPartial;

    /**
     * @var        ObjectCollection|ChildSeason[] Collection to store aggregation of ChildSeason objects.
     */
    protected $collSeasons;
    protected $collSeasonsPartial;

    /**
     * @var        ObjectCollection|ChildZone[] Collection to store aggregation of ChildZone objects.
     */
    protected $collZones;
    protected $collZonesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCardPointSystem[]
     */
    protected $cardPointSystemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFlightCost[]
     */
    protected $flightCostsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMileage[]
     */
    protected $mileagesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPointAcquisition[]
     */
    protected $pointAcquisitionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPointUse[]
     */
    protected $pointUsesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildReward[]
     */
    protected $rewardsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSeason[]
     */
    protected $seasonsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildZone[]
     */
    protected $zonesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->default_points_per_yen = '0.010000';
        $this->default_yen_per_point = '1.000000';
    }

    /**
     * Initializes internal state of Base\PointSystem object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
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
     * Compares this with another <code>PointSystem</code> instance.  If
     * <code>obj</code> is an instance of <code>PointSystem</code>, delegates to
     * <code>equals(PointSystem)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|PointSystem The current object, for fluid interface
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
     * Get the [point_system_id] column value.
     *
     * @return int
     */
    public function getPointSystemId()
    {
        return $this->point_system_id;
    }

    /**
     * Get the [point_system_name] column value.
     *
     * @return string
     */
    public function getPointSystemName()
    {
        return $this->point_system_name;
    }

    /**
     * Get the [default_points_per_yen] column value.
     *
     * @return string
     */
    public function getDefaultPointsPerYen()
    {
        return $this->default_points_per_yen;
    }

    /**
     * Get the [default_yen_per_point] column value.
     *
     * @return string
     */
    public function getDefaultYenPerPoint()
    {
        return $this->default_yen_per_point;
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
     * Get the [reference] column value.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of [point_system_id] column.
     *
     * @param  int $v new value
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function setPointSystemId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->point_system_id !== $v) {
            $this->point_system_id = $v;
            $this->modifiedColumns[PointSystemTableMap::COL_POINT_SYSTEM_ID] = true;
        }

        return $this;
    } // setPointSystemId()

    /**
     * Set the value of [point_system_name] column.
     *
     * @param  string $v new value
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function setPointSystemName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->point_system_name !== $v) {
            $this->point_system_name = $v;
            $this->modifiedColumns[PointSystemTableMap::COL_POINT_SYSTEM_NAME] = true;
        }

        return $this;
    } // setPointSystemName()

    /**
     * Set the value of [default_points_per_yen] column.
     *
     * @param  string $v new value
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function setDefaultPointsPerYen($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->default_points_per_yen !== $v) {
            $this->default_points_per_yen = $v;
            $this->modifiedColumns[PointSystemTableMap::COL_DEFAULT_POINTS_PER_YEN] = true;
        }

        return $this;
    } // setDefaultPointsPerYen()

    /**
     * Set the value of [default_yen_per_point] column.
     *
     * @param  string $v new value
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function setDefaultYenPerPoint($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->default_yen_per_point !== $v) {
            $this->default_yen_per_point = $v;
            $this->modifiedColumns[PointSystemTableMap::COL_DEFAULT_YEN_PER_POINT] = true;
        }

        return $this;
    } // setDefaultYenPerPoint()

    /**
     * Sets the value of [update_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function setUpdateTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_time !== null || $dt !== null) {
            if ($dt !== $this->update_time) {
                $this->update_time = $dt;
                $this->modifiedColumns[PointSystemTableMap::COL_UPDATE_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateTime()

    /**
     * Set the value of [update_user] column.
     *
     * @param  string $v new value
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function setUpdateUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->update_user !== $v) {
            $this->update_user = $v;
            $this->modifiedColumns[PointSystemTableMap::COL_UPDATE_USER] = true;
        }

        return $this;
    } // setUpdateUser()

    /**
     * Set the value of [reference] column.
     *
     * @param  string $v new value
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function setReference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reference !== $v) {
            $this->reference = $v;
            $this->modifiedColumns[PointSystemTableMap::COL_REFERENCE] = true;
        }

        return $this;
    } // setReference()

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
            if ($this->default_points_per_yen !== '0.010000') {
                return false;
            }

            if ($this->default_yen_per_point !== '1.000000') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PointSystemTableMap::translateFieldName('PointSystemId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->point_system_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PointSystemTableMap::translateFieldName('PointSystemName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->point_system_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PointSystemTableMap::translateFieldName('DefaultPointsPerYen', TableMap::TYPE_PHPNAME, $indexType)];
            $this->default_points_per_yen = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PointSystemTableMap::translateFieldName('DefaultYenPerPoint', TableMap::TYPE_PHPNAME, $indexType)];
            $this->default_yen_per_point = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PointSystemTableMap::translateFieldName('UpdateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PointSystemTableMap::translateFieldName('UpdateUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->update_user = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PointSystemTableMap::translateFieldName('Reference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reference = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = PointSystemTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\PointSystem'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(PointSystemTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPointSystemQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCardPointSystems = null;

            $this->collFlightCosts = null;

            $this->collMileages = null;

            $this->collPointAcquisitions = null;

            $this->collPointUses = null;

            $this->collRewards = null;

            $this->collSeasons = null;

            $this->collZones = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see PointSystem::setDeleted()
     * @see PointSystem::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PointSystemTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPointSystemQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PointSystemTableMap::DATABASE_NAME);
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
                PointSystemTableMap::addInstanceToPool($this);
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

            if ($this->cardPointSystemsScheduledForDeletion !== null) {
                if (!$this->cardPointSystemsScheduledForDeletion->isEmpty()) {
                    \CardPointSystemQuery::create()
                        ->filterByPrimaryKeys($this->cardPointSystemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cardPointSystemsScheduledForDeletion = null;
                }
            }

            if ($this->collCardPointSystems !== null) {
                foreach ($this->collCardPointSystems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->flightCostsScheduledForDeletion !== null) {
                if (!$this->flightCostsScheduledForDeletion->isEmpty()) {
                    \FlightCostQuery::create()
                        ->filterByPrimaryKeys($this->flightCostsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->flightCostsScheduledForDeletion = null;
                }
            }

            if ($this->collFlightCosts !== null) {
                foreach ($this->collFlightCosts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mileagesScheduledForDeletion !== null) {
                if (!$this->mileagesScheduledForDeletion->isEmpty()) {
                    \MileageQuery::create()
                        ->filterByPrimaryKeys($this->mileagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mileagesScheduledForDeletion = null;
                }
            }

            if ($this->collMileages !== null) {
                foreach ($this->collMileages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pointAcquisitionsScheduledForDeletion !== null) {
                if (!$this->pointAcquisitionsScheduledForDeletion->isEmpty()) {
                    \PointAcquisitionQuery::create()
                        ->filterByPrimaryKeys($this->pointAcquisitionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pointAcquisitionsScheduledForDeletion = null;
                }
            }

            if ($this->collPointAcquisitions !== null) {
                foreach ($this->collPointAcquisitions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pointUsesScheduledForDeletion !== null) {
                if (!$this->pointUsesScheduledForDeletion->isEmpty()) {
                    \PointUseQuery::create()
                        ->filterByPrimaryKeys($this->pointUsesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pointUsesScheduledForDeletion = null;
                }
            }

            if ($this->collPointUses !== null) {
                foreach ($this->collPointUses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rewardsScheduledForDeletion !== null) {
                if (!$this->rewardsScheduledForDeletion->isEmpty()) {
                    \RewardQuery::create()
                        ->filterByPrimaryKeys($this->rewardsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rewardsScheduledForDeletion = null;
                }
            }

            if ($this->collRewards !== null) {
                foreach ($this->collRewards as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->seasonsScheduledForDeletion !== null) {
                if (!$this->seasonsScheduledForDeletion->isEmpty()) {
                    \SeasonQuery::create()
                        ->filterByPrimaryKeys($this->seasonsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->seasonsScheduledForDeletion = null;
                }
            }

            if ($this->collSeasons !== null) {
                foreach ($this->collSeasons as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->zonesScheduledForDeletion !== null) {
                if (!$this->zonesScheduledForDeletion->isEmpty()) {
                    \ZoneQuery::create()
                        ->filterByPrimaryKeys($this->zonesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->zonesScheduledForDeletion = null;
                }
            }

            if ($this->collZones !== null) {
                foreach ($this->collZones as $referrerFK) {
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

        $this->modifiedColumns[PointSystemTableMap::COL_POINT_SYSTEM_ID] = true;
        if (null !== $this->point_system_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PointSystemTableMap::COL_POINT_SYSTEM_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PointSystemTableMap::COL_POINT_SYSTEM_ID)) {
            $modifiedColumns[':p' . $index++]  = 'point_system_id';
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_POINT_SYSTEM_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'point_system_name';
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_DEFAULT_POINTS_PER_YEN)) {
            $modifiedColumns[':p' . $index++]  = 'default_points_per_yen';
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_DEFAULT_YEN_PER_POINT)) {
            $modifiedColumns[':p' . $index++]  = 'default_yen_per_point';
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_UPDATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'update_time';
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_UPDATE_USER)) {
            $modifiedColumns[':p' . $index++]  = 'update_user';
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'reference';
        }

        $sql = sprintf(
            'INSERT INTO point_system (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'point_system_id':
                        $stmt->bindValue($identifier, $this->point_system_id, PDO::PARAM_INT);
                        break;
                    case 'point_system_name':
                        $stmt->bindValue($identifier, $this->point_system_name, PDO::PARAM_STR);
                        break;
                    case 'default_points_per_yen':
                        $stmt->bindValue($identifier, $this->default_points_per_yen, PDO::PARAM_STR);
                        break;
                    case 'default_yen_per_point':
                        $stmt->bindValue($identifier, $this->default_yen_per_point, PDO::PARAM_STR);
                        break;
                    case 'update_time':
                        $stmt->bindValue($identifier, $this->update_time ? $this->update_time->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'update_user':
                        $stmt->bindValue($identifier, $this->update_user, PDO::PARAM_STR);
                        break;
                    case 'reference':
                        $stmt->bindValue($identifier, $this->reference, PDO::PARAM_STR);
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
        $this->setPointSystemId($pk);

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
        $pos = PointSystemTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPointSystemId();
                break;
            case 1:
                return $this->getPointSystemName();
                break;
            case 2:
                return $this->getDefaultPointsPerYen();
                break;
            case 3:
                return $this->getDefaultYenPerPoint();
                break;
            case 4:
                return $this->getUpdateTime();
                break;
            case 5:
                return $this->getUpdateUser();
                break;
            case 6:
                return $this->getReference();
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

        if (isset($alreadyDumpedObjects['PointSystem'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PointSystem'][$this->hashCode()] = true;
        $keys = PointSystemTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPointSystemId(),
            $keys[1] => $this->getPointSystemName(),
            $keys[2] => $this->getDefaultPointsPerYen(),
            $keys[3] => $this->getDefaultYenPerPoint(),
            $keys[4] => $this->getUpdateTime(),
            $keys[5] => $this->getUpdateUser(),
            $keys[6] => $this->getReference(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collCardPointSystems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cardPointSystems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'card_point_systems';
                        break;
                    default:
                        $key = 'CardPointSystems';
                }

                $result[$key] = $this->collCardPointSystems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFlightCosts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'flightCosts';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'flight_costs';
                        break;
                    default:
                        $key = 'FlightCosts';
                }

                $result[$key] = $this->collFlightCosts->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMileages) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'mileages';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'mileages';
                        break;
                    default:
                        $key = 'Mileages';
                }

                $result[$key] = $this->collMileages->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPointAcquisitions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'pointAcquisitions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'point_acquisitions';
                        break;
                    default:
                        $key = 'PointAcquisitions';
                }

                $result[$key] = $this->collPointAcquisitions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPointUses) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'pointUses';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'point_uses';
                        break;
                    default:
                        $key = 'PointUses';
                }

                $result[$key] = $this->collPointUses->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRewards) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'rewards';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'rewards';
                        break;
                    default:
                        $key = 'Rewards';
                }

                $result[$key] = $this->collRewards->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSeasons) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'seasons';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'seasons';
                        break;
                    default:
                        $key = 'Seasons';
                }

                $result[$key] = $this->collSeasons->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collZones) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'zones';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'zones';
                        break;
                    default:
                        $key = 'Zones';
                }

                $result[$key] = $this->collZones->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\PointSystem
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PointSystemTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\PointSystem
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPointSystemId($value);
                break;
            case 1:
                $this->setPointSystemName($value);
                break;
            case 2:
                $this->setDefaultPointsPerYen($value);
                break;
            case 3:
                $this->setDefaultYenPerPoint($value);
                break;
            case 4:
                $this->setUpdateTime($value);
                break;
            case 5:
                $this->setUpdateUser($value);
                break;
            case 6:
                $this->setReference($value);
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
        $keys = PointSystemTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPointSystemId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setPointSystemName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDefaultPointsPerYen($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDefaultYenPerPoint($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUpdateTime($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setUpdateUser($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setReference($arr[$keys[6]]);
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
     * @return $this|\PointSystem The current object, for fluid interface
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
        $criteria = new Criteria(PointSystemTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PointSystemTableMap::COL_POINT_SYSTEM_ID)) {
            $criteria->add(PointSystemTableMap::COL_POINT_SYSTEM_ID, $this->point_system_id);
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_POINT_SYSTEM_NAME)) {
            $criteria->add(PointSystemTableMap::COL_POINT_SYSTEM_NAME, $this->point_system_name);
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_DEFAULT_POINTS_PER_YEN)) {
            $criteria->add(PointSystemTableMap::COL_DEFAULT_POINTS_PER_YEN, $this->default_points_per_yen);
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_DEFAULT_YEN_PER_POINT)) {
            $criteria->add(PointSystemTableMap::COL_DEFAULT_YEN_PER_POINT, $this->default_yen_per_point);
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_UPDATE_TIME)) {
            $criteria->add(PointSystemTableMap::COL_UPDATE_TIME, $this->update_time);
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_UPDATE_USER)) {
            $criteria->add(PointSystemTableMap::COL_UPDATE_USER, $this->update_user);
        }
        if ($this->isColumnModified(PointSystemTableMap::COL_REFERENCE)) {
            $criteria->add(PointSystemTableMap::COL_REFERENCE, $this->reference);
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
        $criteria = ChildPointSystemQuery::create();
        $criteria->add(PointSystemTableMap::COL_POINT_SYSTEM_ID, $this->point_system_id);

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
        $validPk = null !== $this->getPointSystemId();

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
        return $this->getPointSystemId();
    }

    /**
     * Generic method to set the primary key (point_system_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPointSystemId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPointSystemId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \PointSystem (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPointSystemName($this->getPointSystemName());
        $copyObj->setDefaultPointsPerYen($this->getDefaultPointsPerYen());
        $copyObj->setDefaultYenPerPoint($this->getDefaultYenPerPoint());
        $copyObj->setUpdateTime($this->getUpdateTime());
        $copyObj->setUpdateUser($this->getUpdateUser());
        $copyObj->setReference($this->getReference());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCardPointSystems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCardPointSystem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFlightCosts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFlightCost($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMileages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMileage($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPointAcquisitions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPointAcquisition($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPointUses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPointUse($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRewards() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addReward($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSeasons() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSeason($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getZones() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addZone($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPointSystemId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \PointSystem Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('CardPointSystem' == $relationName) {
            return $this->initCardPointSystems();
        }
        if ('FlightCost' == $relationName) {
            return $this->initFlightCosts();
        }
        if ('Mileage' == $relationName) {
            return $this->initMileages();
        }
        if ('PointAcquisition' == $relationName) {
            return $this->initPointAcquisitions();
        }
        if ('PointUse' == $relationName) {
            return $this->initPointUses();
        }
        if ('Reward' == $relationName) {
            return $this->initRewards();
        }
        if ('Season' == $relationName) {
            return $this->initSeasons();
        }
        if ('Zone' == $relationName) {
            return $this->initZones();
        }
    }

    /**
     * Clears out the collCardPointSystems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCardPointSystems()
     */
    public function clearCardPointSystems()
    {
        $this->collCardPointSystems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCardPointSystems collection loaded partially.
     */
    public function resetPartialCardPointSystems($v = true)
    {
        $this->collCardPointSystemsPartial = $v;
    }

    /**
     * Initializes the collCardPointSystems collection.
     *
     * By default this just sets the collCardPointSystems collection to an empty array (like clearcollCardPointSystems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCardPointSystems($overrideExisting = true)
    {
        if (null !== $this->collCardPointSystems && !$overrideExisting) {
            return;
        }
        $this->collCardPointSystems = new ObjectCollection();
        $this->collCardPointSystems->setModel('\CardPointSystem');
    }

    /**
     * Gets an array of ChildCardPointSystem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPointSystem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCardPointSystem[] List of ChildCardPointSystem objects
     * @throws PropelException
     */
    public function getCardPointSystems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCardPointSystemsPartial && !$this->isNew();
        if (null === $this->collCardPointSystems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCardPointSystems) {
                // return empty collection
                $this->initCardPointSystems();
            } else {
                $collCardPointSystems = ChildCardPointSystemQuery::create(null, $criteria)
                    ->filterByPointSystem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCardPointSystemsPartial && count($collCardPointSystems)) {
                        $this->initCardPointSystems(false);

                        foreach ($collCardPointSystems as $obj) {
                            if (false == $this->collCardPointSystems->contains($obj)) {
                                $this->collCardPointSystems->append($obj);
                            }
                        }

                        $this->collCardPointSystemsPartial = true;
                    }

                    return $collCardPointSystems;
                }

                if ($partial && $this->collCardPointSystems) {
                    foreach ($this->collCardPointSystems as $obj) {
                        if ($obj->isNew()) {
                            $collCardPointSystems[] = $obj;
                        }
                    }
                }

                $this->collCardPointSystems = $collCardPointSystems;
                $this->collCardPointSystemsPartial = false;
            }
        }

        return $this->collCardPointSystems;
    }

    /**
     * Sets a collection of ChildCardPointSystem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $cardPointSystems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function setCardPointSystems(Collection $cardPointSystems, ConnectionInterface $con = null)
    {
        /** @var ChildCardPointSystem[] $cardPointSystemsToDelete */
        $cardPointSystemsToDelete = $this->getCardPointSystems(new Criteria(), $con)->diff($cardPointSystems);


        $this->cardPointSystemsScheduledForDeletion = $cardPointSystemsToDelete;

        foreach ($cardPointSystemsToDelete as $cardPointSystemRemoved) {
            $cardPointSystemRemoved->setPointSystem(null);
        }

        $this->collCardPointSystems = null;
        foreach ($cardPointSystems as $cardPointSystem) {
            $this->addCardPointSystem($cardPointSystem);
        }

        $this->collCardPointSystems = $cardPointSystems;
        $this->collCardPointSystemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CardPointSystem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CardPointSystem objects.
     * @throws PropelException
     */
    public function countCardPointSystems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCardPointSystemsPartial && !$this->isNew();
        if (null === $this->collCardPointSystems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCardPointSystems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCardPointSystems());
            }

            $query = ChildCardPointSystemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPointSystem($this)
                ->count($con);
        }

        return count($this->collCardPointSystems);
    }

    /**
     * Method called to associate a ChildCardPointSystem object to this object
     * through the ChildCardPointSystem foreign key attribute.
     *
     * @param  ChildCardPointSystem $l ChildCardPointSystem
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function addCardPointSystem(ChildCardPointSystem $l)
    {
        if ($this->collCardPointSystems === null) {
            $this->initCardPointSystems();
            $this->collCardPointSystemsPartial = true;
        }

        if (!$this->collCardPointSystems->contains($l)) {
            $this->doAddCardPointSystem($l);
        }

        return $this;
    }

    /**
     * @param ChildCardPointSystem $cardPointSystem The ChildCardPointSystem object to add.
     */
    protected function doAddCardPointSystem(ChildCardPointSystem $cardPointSystem)
    {
        $this->collCardPointSystems[]= $cardPointSystem;
        $cardPointSystem->setPointSystem($this);
    }

    /**
     * @param  ChildCardPointSystem $cardPointSystem The ChildCardPointSystem object to remove.
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function removeCardPointSystem(ChildCardPointSystem $cardPointSystem)
    {
        if ($this->getCardPointSystems()->contains($cardPointSystem)) {
            $pos = $this->collCardPointSystems->search($cardPointSystem);
            $this->collCardPointSystems->remove($pos);
            if (null === $this->cardPointSystemsScheduledForDeletion) {
                $this->cardPointSystemsScheduledForDeletion = clone $this->collCardPointSystems;
                $this->cardPointSystemsScheduledForDeletion->clear();
            }
            $this->cardPointSystemsScheduledForDeletion[]= clone $cardPointSystem;
            $cardPointSystem->setPointSystem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related CardPointSystems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCardPointSystem[] List of ChildCardPointSystem objects
     */
    public function getCardPointSystemsJoinCreditCard(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCardPointSystemQuery::create(null, $criteria);
        $query->joinWith('CreditCard', $joinBehavior);

        return $this->getCardPointSystems($query, $con);
    }

    /**
     * Clears out the collFlightCosts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFlightCosts()
     */
    public function clearFlightCosts()
    {
        $this->collFlightCosts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collFlightCosts collection loaded partially.
     */
    public function resetPartialFlightCosts($v = true)
    {
        $this->collFlightCostsPartial = $v;
    }

    /**
     * Initializes the collFlightCosts collection.
     *
     * By default this just sets the collFlightCosts collection to an empty array (like clearcollFlightCosts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFlightCosts($overrideExisting = true)
    {
        if (null !== $this->collFlightCosts && !$overrideExisting) {
            return;
        }
        $this->collFlightCosts = new ObjectCollection();
        $this->collFlightCosts->setModel('\FlightCost');
    }

    /**
     * Gets an array of ChildFlightCost objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPointSystem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildFlightCost[] List of ChildFlightCost objects
     * @throws PropelException
     */
    public function getFlightCosts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFlightCostsPartial && !$this->isNew();
        if (null === $this->collFlightCosts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFlightCosts) {
                // return empty collection
                $this->initFlightCosts();
            } else {
                $collFlightCosts = ChildFlightCostQuery::create(null, $criteria)
                    ->filterByPointSystem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collFlightCostsPartial && count($collFlightCosts)) {
                        $this->initFlightCosts(false);

                        foreach ($collFlightCosts as $obj) {
                            if (false == $this->collFlightCosts->contains($obj)) {
                                $this->collFlightCosts->append($obj);
                            }
                        }

                        $this->collFlightCostsPartial = true;
                    }

                    return $collFlightCosts;
                }

                if ($partial && $this->collFlightCosts) {
                    foreach ($this->collFlightCosts as $obj) {
                        if ($obj->isNew()) {
                            $collFlightCosts[] = $obj;
                        }
                    }
                }

                $this->collFlightCosts = $collFlightCosts;
                $this->collFlightCostsPartial = false;
            }
        }

        return $this->collFlightCosts;
    }

    /**
     * Sets a collection of ChildFlightCost objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $flightCosts A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function setFlightCosts(Collection $flightCosts, ConnectionInterface $con = null)
    {
        /** @var ChildFlightCost[] $flightCostsToDelete */
        $flightCostsToDelete = $this->getFlightCosts(new Criteria(), $con)->diff($flightCosts);


        $this->flightCostsScheduledForDeletion = $flightCostsToDelete;

        foreach ($flightCostsToDelete as $flightCostRemoved) {
            $flightCostRemoved->setPointSystem(null);
        }

        $this->collFlightCosts = null;
        foreach ($flightCosts as $flightCost) {
            $this->addFlightCost($flightCost);
        }

        $this->collFlightCosts = $flightCosts;
        $this->collFlightCostsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related FlightCost objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related FlightCost objects.
     * @throws PropelException
     */
    public function countFlightCosts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFlightCostsPartial && !$this->isNew();
        if (null === $this->collFlightCosts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFlightCosts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getFlightCosts());
            }

            $query = ChildFlightCostQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPointSystem($this)
                ->count($con);
        }

        return count($this->collFlightCosts);
    }

    /**
     * Method called to associate a ChildFlightCost object to this object
     * through the ChildFlightCost foreign key attribute.
     *
     * @param  ChildFlightCost $l ChildFlightCost
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function addFlightCost(ChildFlightCost $l)
    {
        if ($this->collFlightCosts === null) {
            $this->initFlightCosts();
            $this->collFlightCostsPartial = true;
        }

        if (!$this->collFlightCosts->contains($l)) {
            $this->doAddFlightCost($l);
        }

        return $this;
    }

    /**
     * @param ChildFlightCost $flightCost The ChildFlightCost object to add.
     */
    protected function doAddFlightCost(ChildFlightCost $flightCost)
    {
        $this->collFlightCosts[]= $flightCost;
        $flightCost->setPointSystem($this);
    }

    /**
     * @param  ChildFlightCost $flightCost The ChildFlightCost object to remove.
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function removeFlightCost(ChildFlightCost $flightCost)
    {
        if ($this->getFlightCosts()->contains($flightCost)) {
            $pos = $this->collFlightCosts->search($flightCost);
            $this->collFlightCosts->remove($pos);
            if (null === $this->flightCostsScheduledForDeletion) {
                $this->flightCostsScheduledForDeletion = clone $this->collFlightCosts;
                $this->flightCostsScheduledForDeletion->clear();
            }
            $this->flightCostsScheduledForDeletion[]= clone $flightCost;
            $flightCost->setPointSystem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related FlightCosts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFlightCost[] List of ChildFlightCost objects
     */
    public function getFlightCostsJoinMileageType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFlightCostQuery::create(null, $criteria);
        $query->joinWith('MileageType', $joinBehavior);

        return $this->getFlightCosts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related FlightCosts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFlightCost[] List of ChildFlightCost objects
     */
    public function getFlightCostsJoinTrip(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFlightCostQuery::create(null, $criteria);
        $query->joinWith('Trip', $joinBehavior);

        return $this->getFlightCosts($query, $con);
    }

    /**
     * Clears out the collMileages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMileages()
     */
    public function clearMileages()
    {
        $this->collMileages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMileages collection loaded partially.
     */
    public function resetPartialMileages($v = true)
    {
        $this->collMileagesPartial = $v;
    }

    /**
     * Initializes the collMileages collection.
     *
     * By default this just sets the collMileages collection to an empty array (like clearcollMileages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMileages($overrideExisting = true)
    {
        if (null !== $this->collMileages && !$overrideExisting) {
            return;
        }
        $this->collMileages = new ObjectCollection();
        $this->collMileages->setModel('\Mileage');
    }

    /**
     * Gets an array of ChildMileage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPointSystem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMileage[] List of ChildMileage objects
     * @throws PropelException
     */
    public function getMileages(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMileagesPartial && !$this->isNew();
        if (null === $this->collMileages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMileages) {
                // return empty collection
                $this->initMileages();
            } else {
                $collMileages = ChildMileageQuery::create(null, $criteria)
                    ->filterByPointSystem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMileagesPartial && count($collMileages)) {
                        $this->initMileages(false);

                        foreach ($collMileages as $obj) {
                            if (false == $this->collMileages->contains($obj)) {
                                $this->collMileages->append($obj);
                            }
                        }

                        $this->collMileagesPartial = true;
                    }

                    return $collMileages;
                }

                if ($partial && $this->collMileages) {
                    foreach ($this->collMileages as $obj) {
                        if ($obj->isNew()) {
                            $collMileages[] = $obj;
                        }
                    }
                }

                $this->collMileages = $collMileages;
                $this->collMileagesPartial = false;
            }
        }

        return $this->collMileages;
    }

    /**
     * Sets a collection of ChildMileage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $mileages A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function setMileages(Collection $mileages, ConnectionInterface $con = null)
    {
        /** @var ChildMileage[] $mileagesToDelete */
        $mileagesToDelete = $this->getMileages(new Criteria(), $con)->diff($mileages);


        $this->mileagesScheduledForDeletion = $mileagesToDelete;

        foreach ($mileagesToDelete as $mileageRemoved) {
            $mileageRemoved->setPointSystem(null);
        }

        $this->collMileages = null;
        foreach ($mileages as $mileage) {
            $this->addMileage($mileage);
        }

        $this->collMileages = $mileages;
        $this->collMileagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mileage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Mileage objects.
     * @throws PropelException
     */
    public function countMileages(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMileagesPartial && !$this->isNew();
        if (null === $this->collMileages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMileages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMileages());
            }

            $query = ChildMileageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPointSystem($this)
                ->count($con);
        }

        return count($this->collMileages);
    }

    /**
     * Method called to associate a ChildMileage object to this object
     * through the ChildMileage foreign key attribute.
     *
     * @param  ChildMileage $l ChildMileage
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function addMileage(ChildMileage $l)
    {
        if ($this->collMileages === null) {
            $this->initMileages();
            $this->collMileagesPartial = true;
        }

        if (!$this->collMileages->contains($l)) {
            $this->doAddMileage($l);
        }

        return $this;
    }

    /**
     * @param ChildMileage $mileage The ChildMileage object to add.
     */
    protected function doAddMileage(ChildMileage $mileage)
    {
        $this->collMileages[]= $mileage;
        $mileage->setPointSystem($this);
    }

    /**
     * @param  ChildMileage $mileage The ChildMileage object to remove.
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function removeMileage(ChildMileage $mileage)
    {
        if ($this->getMileages()->contains($mileage)) {
            $pos = $this->collMileages->search($mileage);
            $this->collMileages->remove($pos);
            if (null === $this->mileagesScheduledForDeletion) {
                $this->mileagesScheduledForDeletion = clone $this->collMileages;
                $this->mileagesScheduledForDeletion->clear();
            }
            $this->mileagesScheduledForDeletion[]= clone $mileage;
            $mileage->setPointSystem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related Mileages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMileage[] List of ChildMileage objects
     */
    public function getMileagesJoinStore(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMileageQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getMileages($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related Mileages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMileage[] List of ChildMileage objects
     */
    public function getMileagesJoinTrip(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMileageQuery::create(null, $criteria);
        $query->joinWith('Trip', $joinBehavior);

        return $this->getMileages($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related Mileages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMileage[] List of ChildMileage objects
     */
    public function getMileagesJoinMileageType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMileageQuery::create(null, $criteria);
        $query->joinWith('MileageType', $joinBehavior);

        return $this->getMileages($query, $con);
    }

    /**
     * Clears out the collPointAcquisitions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPointAcquisitions()
     */
    public function clearPointAcquisitions()
    {
        $this->collPointAcquisitions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPointAcquisitions collection loaded partially.
     */
    public function resetPartialPointAcquisitions($v = true)
    {
        $this->collPointAcquisitionsPartial = $v;
    }

    /**
     * Initializes the collPointAcquisitions collection.
     *
     * By default this just sets the collPointAcquisitions collection to an empty array (like clearcollPointAcquisitions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPointAcquisitions($overrideExisting = true)
    {
        if (null !== $this->collPointAcquisitions && !$overrideExisting) {
            return;
        }
        $this->collPointAcquisitions = new ObjectCollection();
        $this->collPointAcquisitions->setModel('\PointAcquisition');
    }

    /**
     * Gets an array of ChildPointAcquisition objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPointSystem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPointAcquisition[] List of ChildPointAcquisition objects
     * @throws PropelException
     */
    public function getPointAcquisitions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPointAcquisitionsPartial && !$this->isNew();
        if (null === $this->collPointAcquisitions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPointAcquisitions) {
                // return empty collection
                $this->initPointAcquisitions();
            } else {
                $collPointAcquisitions = ChildPointAcquisitionQuery::create(null, $criteria)
                    ->filterByPointSystem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPointAcquisitionsPartial && count($collPointAcquisitions)) {
                        $this->initPointAcquisitions(false);

                        foreach ($collPointAcquisitions as $obj) {
                            if (false == $this->collPointAcquisitions->contains($obj)) {
                                $this->collPointAcquisitions->append($obj);
                            }
                        }

                        $this->collPointAcquisitionsPartial = true;
                    }

                    return $collPointAcquisitions;
                }

                if ($partial && $this->collPointAcquisitions) {
                    foreach ($this->collPointAcquisitions as $obj) {
                        if ($obj->isNew()) {
                            $collPointAcquisitions[] = $obj;
                        }
                    }
                }

                $this->collPointAcquisitions = $collPointAcquisitions;
                $this->collPointAcquisitionsPartial = false;
            }
        }

        return $this->collPointAcquisitions;
    }

    /**
     * Sets a collection of ChildPointAcquisition objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $pointAcquisitions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function setPointAcquisitions(Collection $pointAcquisitions, ConnectionInterface $con = null)
    {
        /** @var ChildPointAcquisition[] $pointAcquisitionsToDelete */
        $pointAcquisitionsToDelete = $this->getPointAcquisitions(new Criteria(), $con)->diff($pointAcquisitions);


        $this->pointAcquisitionsScheduledForDeletion = $pointAcquisitionsToDelete;

        foreach ($pointAcquisitionsToDelete as $pointAcquisitionRemoved) {
            $pointAcquisitionRemoved->setPointSystem(null);
        }

        $this->collPointAcquisitions = null;
        foreach ($pointAcquisitions as $pointAcquisition) {
            $this->addPointAcquisition($pointAcquisition);
        }

        $this->collPointAcquisitions = $pointAcquisitions;
        $this->collPointAcquisitionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PointAcquisition objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PointAcquisition objects.
     * @throws PropelException
     */
    public function countPointAcquisitions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPointAcquisitionsPartial && !$this->isNew();
        if (null === $this->collPointAcquisitions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPointAcquisitions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPointAcquisitions());
            }

            $query = ChildPointAcquisitionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPointSystem($this)
                ->count($con);
        }

        return count($this->collPointAcquisitions);
    }

    /**
     * Method called to associate a ChildPointAcquisition object to this object
     * through the ChildPointAcquisition foreign key attribute.
     *
     * @param  ChildPointAcquisition $l ChildPointAcquisition
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function addPointAcquisition(ChildPointAcquisition $l)
    {
        if ($this->collPointAcquisitions === null) {
            $this->initPointAcquisitions();
            $this->collPointAcquisitionsPartial = true;
        }

        if (!$this->collPointAcquisitions->contains($l)) {
            $this->doAddPointAcquisition($l);
        }

        return $this;
    }

    /**
     * @param ChildPointAcquisition $pointAcquisition The ChildPointAcquisition object to add.
     */
    protected function doAddPointAcquisition(ChildPointAcquisition $pointAcquisition)
    {
        $this->collPointAcquisitions[]= $pointAcquisition;
        $pointAcquisition->setPointSystem($this);
    }

    /**
     * @param  ChildPointAcquisition $pointAcquisition The ChildPointAcquisition object to remove.
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function removePointAcquisition(ChildPointAcquisition $pointAcquisition)
    {
        if ($this->getPointAcquisitions()->contains($pointAcquisition)) {
            $pos = $this->collPointAcquisitions->search($pointAcquisition);
            $this->collPointAcquisitions->remove($pos);
            if (null === $this->pointAcquisitionsScheduledForDeletion) {
                $this->pointAcquisitionsScheduledForDeletion = clone $this->collPointAcquisitions;
                $this->pointAcquisitionsScheduledForDeletion->clear();
            }
            $this->pointAcquisitionsScheduledForDeletion[]= clone $pointAcquisition;
            $pointAcquisition->setPointSystem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related PointAcquisitions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPointAcquisition[] List of ChildPointAcquisition objects
     */
    public function getPointAcquisitionsJoinStore(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPointAcquisitionQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getPointAcquisitions($query, $con);
    }

    /**
     * Clears out the collPointUses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPointUses()
     */
    public function clearPointUses()
    {
        $this->collPointUses = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPointUses collection loaded partially.
     */
    public function resetPartialPointUses($v = true)
    {
        $this->collPointUsesPartial = $v;
    }

    /**
     * Initializes the collPointUses collection.
     *
     * By default this just sets the collPointUses collection to an empty array (like clearcollPointUses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPointUses($overrideExisting = true)
    {
        if (null !== $this->collPointUses && !$overrideExisting) {
            return;
        }
        $this->collPointUses = new ObjectCollection();
        $this->collPointUses->setModel('\PointUse');
    }

    /**
     * Gets an array of ChildPointUse objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPointSystem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPointUse[] List of ChildPointUse objects
     * @throws PropelException
     */
    public function getPointUses(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPointUsesPartial && !$this->isNew();
        if (null === $this->collPointUses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPointUses) {
                // return empty collection
                $this->initPointUses();
            } else {
                $collPointUses = ChildPointUseQuery::create(null, $criteria)
                    ->filterByPointSystem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPointUsesPartial && count($collPointUses)) {
                        $this->initPointUses(false);

                        foreach ($collPointUses as $obj) {
                            if (false == $this->collPointUses->contains($obj)) {
                                $this->collPointUses->append($obj);
                            }
                        }

                        $this->collPointUsesPartial = true;
                    }

                    return $collPointUses;
                }

                if ($partial && $this->collPointUses) {
                    foreach ($this->collPointUses as $obj) {
                        if ($obj->isNew()) {
                            $collPointUses[] = $obj;
                        }
                    }
                }

                $this->collPointUses = $collPointUses;
                $this->collPointUsesPartial = false;
            }
        }

        return $this->collPointUses;
    }

    /**
     * Sets a collection of ChildPointUse objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $pointUses A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function setPointUses(Collection $pointUses, ConnectionInterface $con = null)
    {
        /** @var ChildPointUse[] $pointUsesToDelete */
        $pointUsesToDelete = $this->getPointUses(new Criteria(), $con)->diff($pointUses);


        $this->pointUsesScheduledForDeletion = $pointUsesToDelete;

        foreach ($pointUsesToDelete as $pointUseRemoved) {
            $pointUseRemoved->setPointSystem(null);
        }

        $this->collPointUses = null;
        foreach ($pointUses as $pointUse) {
            $this->addPointUse($pointUse);
        }

        $this->collPointUses = $pointUses;
        $this->collPointUsesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PointUse objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PointUse objects.
     * @throws PropelException
     */
    public function countPointUses(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPointUsesPartial && !$this->isNew();
        if (null === $this->collPointUses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPointUses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPointUses());
            }

            $query = ChildPointUseQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPointSystem($this)
                ->count($con);
        }

        return count($this->collPointUses);
    }

    /**
     * Method called to associate a ChildPointUse object to this object
     * through the ChildPointUse foreign key attribute.
     *
     * @param  ChildPointUse $l ChildPointUse
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function addPointUse(ChildPointUse $l)
    {
        if ($this->collPointUses === null) {
            $this->initPointUses();
            $this->collPointUsesPartial = true;
        }

        if (!$this->collPointUses->contains($l)) {
            $this->doAddPointUse($l);
        }

        return $this;
    }

    /**
     * @param ChildPointUse $pointUse The ChildPointUse object to add.
     */
    protected function doAddPointUse(ChildPointUse $pointUse)
    {
        $this->collPointUses[]= $pointUse;
        $pointUse->setPointSystem($this);
    }

    /**
     * @param  ChildPointUse $pointUse The ChildPointUse object to remove.
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function removePointUse(ChildPointUse $pointUse)
    {
        if ($this->getPointUses()->contains($pointUse)) {
            $pos = $this->collPointUses->search($pointUse);
            $this->collPointUses->remove($pos);
            if (null === $this->pointUsesScheduledForDeletion) {
                $this->pointUsesScheduledForDeletion = clone $this->collPointUses;
                $this->pointUsesScheduledForDeletion->clear();
            }
            $this->pointUsesScheduledForDeletion[]= clone $pointUse;
            $pointUse->setPointSystem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related PointUses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPointUse[] List of ChildPointUse objects
     */
    public function getPointUsesJoinStore(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPointUseQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getPointUses($query, $con);
    }

    /**
     * Clears out the collRewards collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRewards()
     */
    public function clearRewards()
    {
        $this->collRewards = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collRewards collection loaded partially.
     */
    public function resetPartialRewards($v = true)
    {
        $this->collRewardsPartial = $v;
    }

    /**
     * Initializes the collRewards collection.
     *
     * By default this just sets the collRewards collection to an empty array (like clearcollRewards());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRewards($overrideExisting = true)
    {
        if (null !== $this->collRewards && !$overrideExisting) {
            return;
        }
        $this->collRewards = new ObjectCollection();
        $this->collRewards->setModel('\Reward');
    }

    /**
     * Gets an array of ChildReward objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPointSystem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildReward[] List of ChildReward objects
     * @throws PropelException
     */
    public function getRewards(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collRewardsPartial && !$this->isNew();
        if (null === $this->collRewards || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRewards) {
                // return empty collection
                $this->initRewards();
            } else {
                $collRewards = ChildRewardQuery::create(null, $criteria)
                    ->filterByPointSystem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collRewardsPartial && count($collRewards)) {
                        $this->initRewards(false);

                        foreach ($collRewards as $obj) {
                            if (false == $this->collRewards->contains($obj)) {
                                $this->collRewards->append($obj);
                            }
                        }

                        $this->collRewardsPartial = true;
                    }

                    return $collRewards;
                }

                if ($partial && $this->collRewards) {
                    foreach ($this->collRewards as $obj) {
                        if ($obj->isNew()) {
                            $collRewards[] = $obj;
                        }
                    }
                }

                $this->collRewards = $collRewards;
                $this->collRewardsPartial = false;
            }
        }

        return $this->collRewards;
    }

    /**
     * Sets a collection of ChildReward objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $rewards A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function setRewards(Collection $rewards, ConnectionInterface $con = null)
    {
        /** @var ChildReward[] $rewardsToDelete */
        $rewardsToDelete = $this->getRewards(new Criteria(), $con)->diff($rewards);


        $this->rewardsScheduledForDeletion = $rewardsToDelete;

        foreach ($rewardsToDelete as $rewardRemoved) {
            $rewardRemoved->setPointSystem(null);
        }

        $this->collRewards = null;
        foreach ($rewards as $reward) {
            $this->addReward($reward);
        }

        $this->collRewards = $rewards;
        $this->collRewardsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Reward objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Reward objects.
     * @throws PropelException
     */
    public function countRewards(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collRewardsPartial && !$this->isNew();
        if (null === $this->collRewards || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRewards) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRewards());
            }

            $query = ChildRewardQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPointSystem($this)
                ->count($con);
        }

        return count($this->collRewards);
    }

    /**
     * Method called to associate a ChildReward object to this object
     * through the ChildReward foreign key attribute.
     *
     * @param  ChildReward $l ChildReward
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function addReward(ChildReward $l)
    {
        if ($this->collRewards === null) {
            $this->initRewards();
            $this->collRewardsPartial = true;
        }

        if (!$this->collRewards->contains($l)) {
            $this->doAddReward($l);
        }

        return $this;
    }

    /**
     * @param ChildReward $reward The ChildReward object to add.
     */
    protected function doAddReward(ChildReward $reward)
    {
        $this->collRewards[]= $reward;
        $reward->setPointSystem($this);
    }

    /**
     * @param  ChildReward $reward The ChildReward object to remove.
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function removeReward(ChildReward $reward)
    {
        if ($this->getRewards()->contains($reward)) {
            $pos = $this->collRewards->search($reward);
            $this->collRewards->remove($pos);
            if (null === $this->rewardsScheduledForDeletion) {
                $this->rewardsScheduledForDeletion = clone $this->collRewards;
                $this->rewardsScheduledForDeletion->clear();
            }
            $this->rewardsScheduledForDeletion[]= clone $reward;
            $reward->setPointSystem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related Rewards from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildReward[] List of ChildReward objects
     */
    public function getRewardsJoinRewardCategory(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildRewardQuery::create(null, $criteria);
        $query->joinWith('RewardCategory', $joinBehavior);

        return $this->getRewards($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related Rewards from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildReward[] List of ChildReward objects
     */
    public function getRewardsJoinRewardType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildRewardQuery::create(null, $criteria);
        $query->joinWith('RewardType', $joinBehavior);

        return $this->getRewards($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related Rewards from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildReward[] List of ChildReward objects
     */
    public function getRewardsJoinStore(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildRewardQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getRewards($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related Rewards from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildReward[] List of ChildReward objects
     */
    public function getRewardsJoinUnit(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildRewardQuery::create(null, $criteria);
        $query->joinWith('Unit', $joinBehavior);

        return $this->getRewards($query, $con);
    }

    /**
     * Clears out the collSeasons collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSeasons()
     */
    public function clearSeasons()
    {
        $this->collSeasons = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSeasons collection loaded partially.
     */
    public function resetPartialSeasons($v = true)
    {
        $this->collSeasonsPartial = $v;
    }

    /**
     * Initializes the collSeasons collection.
     *
     * By default this just sets the collSeasons collection to an empty array (like clearcollSeasons());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSeasons($overrideExisting = true)
    {
        if (null !== $this->collSeasons && !$overrideExisting) {
            return;
        }
        $this->collSeasons = new ObjectCollection();
        $this->collSeasons->setModel('\Season');
    }

    /**
     * Gets an array of ChildSeason objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPointSystem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSeason[] List of ChildSeason objects
     * @throws PropelException
     */
    public function getSeasons(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSeasonsPartial && !$this->isNew();
        if (null === $this->collSeasons || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSeasons) {
                // return empty collection
                $this->initSeasons();
            } else {
                $collSeasons = ChildSeasonQuery::create(null, $criteria)
                    ->filterByPointSystem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSeasonsPartial && count($collSeasons)) {
                        $this->initSeasons(false);

                        foreach ($collSeasons as $obj) {
                            if (false == $this->collSeasons->contains($obj)) {
                                $this->collSeasons->append($obj);
                            }
                        }

                        $this->collSeasonsPartial = true;
                    }

                    return $collSeasons;
                }

                if ($partial && $this->collSeasons) {
                    foreach ($this->collSeasons as $obj) {
                        if ($obj->isNew()) {
                            $collSeasons[] = $obj;
                        }
                    }
                }

                $this->collSeasons = $collSeasons;
                $this->collSeasonsPartial = false;
            }
        }

        return $this->collSeasons;
    }

    /**
     * Sets a collection of ChildSeason objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $seasons A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function setSeasons(Collection $seasons, ConnectionInterface $con = null)
    {
        /** @var ChildSeason[] $seasonsToDelete */
        $seasonsToDelete = $this->getSeasons(new Criteria(), $con)->diff($seasons);


        $this->seasonsScheduledForDeletion = $seasonsToDelete;

        foreach ($seasonsToDelete as $seasonRemoved) {
            $seasonRemoved->setPointSystem(null);
        }

        $this->collSeasons = null;
        foreach ($seasons as $season) {
            $this->addSeason($season);
        }

        $this->collSeasons = $seasons;
        $this->collSeasonsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Season objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Season objects.
     * @throws PropelException
     */
    public function countSeasons(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSeasonsPartial && !$this->isNew();
        if (null === $this->collSeasons || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSeasons) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSeasons());
            }

            $query = ChildSeasonQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPointSystem($this)
                ->count($con);
        }

        return count($this->collSeasons);
    }

    /**
     * Method called to associate a ChildSeason object to this object
     * through the ChildSeason foreign key attribute.
     *
     * @param  ChildSeason $l ChildSeason
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function addSeason(ChildSeason $l)
    {
        if ($this->collSeasons === null) {
            $this->initSeasons();
            $this->collSeasonsPartial = true;
        }

        if (!$this->collSeasons->contains($l)) {
            $this->doAddSeason($l);
        }

        return $this;
    }

    /**
     * @param ChildSeason $season The ChildSeason object to add.
     */
    protected function doAddSeason(ChildSeason $season)
    {
        $this->collSeasons[]= $season;
        $season->setPointSystem($this);
    }

    /**
     * @param  ChildSeason $season The ChildSeason object to remove.
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function removeSeason(ChildSeason $season)
    {
        if ($this->getSeasons()->contains($season)) {
            $pos = $this->collSeasons->search($season);
            $this->collSeasons->remove($pos);
            if (null === $this->seasonsScheduledForDeletion) {
                $this->seasonsScheduledForDeletion = clone $this->collSeasons;
                $this->seasonsScheduledForDeletion->clear();
            }
            $this->seasonsScheduledForDeletion[]= clone $season;
            $season->setPointSystem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PointSystem is new, it will return
     * an empty collection; or if this PointSystem has previously
     * been saved, it will retrieve related Seasons from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PointSystem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSeason[] List of ChildSeason objects
     */
    public function getSeasonsJoinSeasonType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSeasonQuery::create(null, $criteria);
        $query->joinWith('SeasonType', $joinBehavior);

        return $this->getSeasons($query, $con);
    }

    /**
     * Clears out the collZones collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addZones()
     */
    public function clearZones()
    {
        $this->collZones = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collZones collection loaded partially.
     */
    public function resetPartialZones($v = true)
    {
        $this->collZonesPartial = $v;
    }

    /**
     * Initializes the collZones collection.
     *
     * By default this just sets the collZones collection to an empty array (like clearcollZones());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initZones($overrideExisting = true)
    {
        if (null !== $this->collZones && !$overrideExisting) {
            return;
        }
        $this->collZones = new ObjectCollection();
        $this->collZones->setModel('\Zone');
    }

    /**
     * Gets an array of ChildZone objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPointSystem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildZone[] List of ChildZone objects
     * @throws PropelException
     */
    public function getZones(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collZonesPartial && !$this->isNew();
        if (null === $this->collZones || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collZones) {
                // return empty collection
                $this->initZones();
            } else {
                $collZones = ChildZoneQuery::create(null, $criteria)
                    ->filterByPointSystem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collZonesPartial && count($collZones)) {
                        $this->initZones(false);

                        foreach ($collZones as $obj) {
                            if (false == $this->collZones->contains($obj)) {
                                $this->collZones->append($obj);
                            }
                        }

                        $this->collZonesPartial = true;
                    }

                    return $collZones;
                }

                if ($partial && $this->collZones) {
                    foreach ($this->collZones as $obj) {
                        if ($obj->isNew()) {
                            $collZones[] = $obj;
                        }
                    }
                }

                $this->collZones = $collZones;
                $this->collZonesPartial = false;
            }
        }

        return $this->collZones;
    }

    /**
     * Sets a collection of ChildZone objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $zones A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function setZones(Collection $zones, ConnectionInterface $con = null)
    {
        /** @var ChildZone[] $zonesToDelete */
        $zonesToDelete = $this->getZones(new Criteria(), $con)->diff($zones);


        $this->zonesScheduledForDeletion = $zonesToDelete;

        foreach ($zonesToDelete as $zoneRemoved) {
            $zoneRemoved->setPointSystem(null);
        }

        $this->collZones = null;
        foreach ($zones as $zone) {
            $this->addZone($zone);
        }

        $this->collZones = $zones;
        $this->collZonesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Zone objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Zone objects.
     * @throws PropelException
     */
    public function countZones(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collZonesPartial && !$this->isNew();
        if (null === $this->collZones || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collZones) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getZones());
            }

            $query = ChildZoneQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPointSystem($this)
                ->count($con);
        }

        return count($this->collZones);
    }

    /**
     * Method called to associate a ChildZone object to this object
     * through the ChildZone foreign key attribute.
     *
     * @param  ChildZone $l ChildZone
     * @return $this|\PointSystem The current object (for fluent API support)
     */
    public function addZone(ChildZone $l)
    {
        if ($this->collZones === null) {
            $this->initZones();
            $this->collZonesPartial = true;
        }

        if (!$this->collZones->contains($l)) {
            $this->doAddZone($l);
        }

        return $this;
    }

    /**
     * @param ChildZone $zone The ChildZone object to add.
     */
    protected function doAddZone(ChildZone $zone)
    {
        $this->collZones[]= $zone;
        $zone->setPointSystem($this);
    }

    /**
     * @param  ChildZone $zone The ChildZone object to remove.
     * @return $this|ChildPointSystem The current object (for fluent API support)
     */
    public function removeZone(ChildZone $zone)
    {
        if ($this->getZones()->contains($zone)) {
            $pos = $this->collZones->search($zone);
            $this->collZones->remove($pos);
            if (null === $this->zonesScheduledForDeletion) {
                $this->zonesScheduledForDeletion = clone $this->collZones;
                $this->zonesScheduledForDeletion->clear();
            }
            $this->zonesScheduledForDeletion[]= clone $zone;
            $zone->setPointSystem(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->point_system_id = null;
        $this->point_system_name = null;
        $this->default_points_per_yen = null;
        $this->default_yen_per_point = null;
        $this->update_time = null;
        $this->update_user = null;
        $this->reference = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
            if ($this->collCardPointSystems) {
                foreach ($this->collCardPointSystems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFlightCosts) {
                foreach ($this->collFlightCosts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMileages) {
                foreach ($this->collMileages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPointAcquisitions) {
                foreach ($this->collPointAcquisitions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPointUses) {
                foreach ($this->collPointUses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRewards) {
                foreach ($this->collRewards as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSeasons) {
                foreach ($this->collSeasons as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collZones) {
                foreach ($this->collZones as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCardPointSystems = null;
        $this->collFlightCosts = null;
        $this->collMileages = null;
        $this->collPointAcquisitions = null;
        $this->collPointUses = null;
        $this->collRewards = null;
        $this->collSeasons = null;
        $this->collZones = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PointSystemTableMap::DEFAULT_STRING_FORMAT);
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
