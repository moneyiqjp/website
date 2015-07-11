<?php

namespace Base;

use \PointSystem as ChildPointSystem;
use \PointSystemQuery as ChildPointSystemQuery;
use \RewardCategory as ChildRewardCategory;
use \RewardCategoryQuery as ChildRewardCategoryQuery;
use \RewardQuery as ChildRewardQuery;
use \RewardType as ChildRewardType;
use \RewardTypeQuery as ChildRewardTypeQuery;
use \Unit as ChildUnit;
use \UnitQuery as ChildUnitQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\RewardTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'reward' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Reward implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\RewardTableMap';


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
     * The value for the reward_id field.
     * @var        int
     */
    protected $reward_id;

    /**
     * The value for the point_system_id field.
     * @var        int
     */
    protected $point_system_id;

    /**
     * The value for the reward_category_id field.
     * @var        int
     */
    protected $reward_category_id;

    /**
     * The value for the reward_type_id field.
     * @var        int
     */
    protected $reward_type_id;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the icon field.
     * @var        string
     */
    protected $icon;

    /**
     * The value for the yen_per_point field.
     * @var        string
     */
    protected $yen_per_point;

    /**
     * The value for the price_per_unit field.
     * @var        int
     */
    protected $price_per_unit;

    /**
     * The value for the min_points field.
     * @var        int
     */
    protected $min_points;

    /**
     * The value for the max_points field.
     * @var        int
     */
    protected $max_points;

    /**
     * The value for the required_points field.
     * @var        int
     */
    protected $required_points;

    /**
     * The value for the max_period field.
     * @var        string
     */
    protected $max_period;

    /**
     * The value for the point_multiplier field.
     * Note: this column has a database default value of: '1.00000000'
     * @var        string
     */
    protected $point_multiplier;

    /**
     * The value for the unit_id field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $unit_id;

    /**
     * The value for the reference field.
     * @var        string
     */
    protected $reference;

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
     * @var        ChildRewardCategory
     */
    protected $aRewardCategory;

    /**
     * @var        ChildPointSystem
     */
    protected $aPointSystem;

    /**
     * @var        ChildRewardType
     */
    protected $aRewardType;

    /**
     * @var        ChildUnit
     */
    protected $aUnit;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->point_multiplier = '1.00000000';
        $this->unit_id = 1;
    }

    /**
     * Initializes internal state of Base\Reward object.
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
     * Compares this with another <code>Reward</code> instance.  If
     * <code>obj</code> is an instance of <code>Reward</code>, delegates to
     * <code>equals(Reward)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Reward The current object, for fluid interface
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
     * Get the [reward_id] column value.
     *
     * @return int
     */
    public function getRewardId()
    {
        return $this->reward_id;
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
     * Get the [reward_category_id] column value.
     *
     * @return int
     */
    public function getRewardCategoryId()
    {
        return $this->reward_category_id;
    }

    /**
     * Get the [reward_type_id] column value.
     *
     * @return int
     */
    public function getRewardTypeId()
    {
        return $this->reward_type_id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [icon] column value.
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Get the [yen_per_point] column value.
     *
     * @return string
     */
    public function getYenPerPoint()
    {
        return $this->yen_per_point;
    }

    /**
     * Get the [price_per_unit] column value.
     *
     * @return int
     */
    public function getPricePerUnit()
    {
        return $this->price_per_unit;
    }

    /**
     * Get the [min_points] column value.
     *
     * @return int
     */
    public function getMinPoints()
    {
        return $this->min_points;
    }

    /**
     * Get the [max_points] column value.
     *
     * @return int
     */
    public function getMaxPoints()
    {
        return $this->max_points;
    }

    /**
     * Get the [required_points] column value.
     *
     * @return int
     */
    public function getRequiredPoints()
    {
        return $this->required_points;
    }

    /**
     * Get the [max_period] column value.
     *
     * @return string
     */
    public function getMaxPeriod()
    {
        return $this->max_period;
    }

    /**
     * Get the [point_multiplier] column value.
     *
     * @return string
     */
    public function getPointMultiplier()
    {
        return $this->point_multiplier;
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
     * Get the [reference] column value.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
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
     * Set the value of [reward_id] column.
     *
     * @param  int $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setRewardId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reward_id !== $v) {
            $this->reward_id = $v;
            $this->modifiedColumns[RewardTableMap::COL_REWARD_ID] = true;
        }

        return $this;
    } // setRewardId()

    /**
     * Set the value of [point_system_id] column.
     *
     * @param  int $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setPointSystemId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->point_system_id !== $v) {
            $this->point_system_id = $v;
            $this->modifiedColumns[RewardTableMap::COL_POINT_SYSTEM_ID] = true;
        }

        if ($this->aPointSystem !== null && $this->aPointSystem->getPointSystemId() !== $v) {
            $this->aPointSystem = null;
        }

        return $this;
    } // setPointSystemId()

    /**
     * Set the value of [reward_category_id] column.
     *
     * @param  int $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setRewardCategoryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reward_category_id !== $v) {
            $this->reward_category_id = $v;
            $this->modifiedColumns[RewardTableMap::COL_REWARD_CATEGORY_ID] = true;
        }

        if ($this->aRewardCategory !== null && $this->aRewardCategory->getRewardCategoryId() !== $v) {
            $this->aRewardCategory = null;
        }

        return $this;
    } // setRewardCategoryId()

    /**
     * Set the value of [reward_type_id] column.
     *
     * @param  int $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setRewardTypeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reward_type_id !== $v) {
            $this->reward_type_id = $v;
            $this->modifiedColumns[RewardTableMap::COL_REWARD_TYPE_ID] = true;
        }

        if ($this->aRewardType !== null && $this->aRewardType->getRewardTypeId() !== $v) {
            $this->aRewardType = null;
        }

        return $this;
    } // setRewardTypeId()

    /**
     * Set the value of [title] column.
     *
     * @param  string $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[RewardTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [description] column.
     *
     * @param  string $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[RewardTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [icon] column.
     *
     * @param  string $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setIcon($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->icon !== $v) {
            $this->icon = $v;
            $this->modifiedColumns[RewardTableMap::COL_ICON] = true;
        }

        return $this;
    } // setIcon()

    /**
     * Set the value of [yen_per_point] column.
     *
     * @param  string $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setYenPerPoint($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->yen_per_point !== $v) {
            $this->yen_per_point = $v;
            $this->modifiedColumns[RewardTableMap::COL_YEN_PER_POINT] = true;
        }

        return $this;
    } // setYenPerPoint()

    /**
     * Set the value of [price_per_unit] column.
     *
     * @param  int $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setPricePerUnit($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->price_per_unit !== $v) {
            $this->price_per_unit = $v;
            $this->modifiedColumns[RewardTableMap::COL_PRICE_PER_UNIT] = true;
        }

        return $this;
    } // setPricePerUnit()

    /**
     * Set the value of [min_points] column.
     *
     * @param  int $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setMinPoints($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->min_points !== $v) {
            $this->min_points = $v;
            $this->modifiedColumns[RewardTableMap::COL_MIN_POINTS] = true;
        }

        return $this;
    } // setMinPoints()

    /**
     * Set the value of [max_points] column.
     *
     * @param  int $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setMaxPoints($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->max_points !== $v) {
            $this->max_points = $v;
            $this->modifiedColumns[RewardTableMap::COL_MAX_POINTS] = true;
        }

        return $this;
    } // setMaxPoints()

    /**
     * Set the value of [required_points] column.
     *
     * @param  int $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setRequiredPoints($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->required_points !== $v) {
            $this->required_points = $v;
            $this->modifiedColumns[RewardTableMap::COL_REQUIRED_POINTS] = true;
        }

        return $this;
    } // setRequiredPoints()

    /**
     * Set the value of [max_period] column.
     *
     * @param  string $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setMaxPeriod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->max_period !== $v) {
            $this->max_period = $v;
            $this->modifiedColumns[RewardTableMap::COL_MAX_PERIOD] = true;
        }

        return $this;
    } // setMaxPeriod()

    /**
     * Set the value of [point_multiplier] column.
     *
     * @param  string $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setPointMultiplier($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->point_multiplier !== $v) {
            $this->point_multiplier = $v;
            $this->modifiedColumns[RewardTableMap::COL_POINT_MULTIPLIER] = true;
        }

        return $this;
    } // setPointMultiplier()

    /**
     * Set the value of [unit_id] column.
     *
     * @param  int $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setUnitId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->unit_id !== $v) {
            $this->unit_id = $v;
            $this->modifiedColumns[RewardTableMap::COL_UNIT_ID] = true;
        }

        if ($this->aUnit !== null && $this->aUnit->getUnitId() !== $v) {
            $this->aUnit = null;
        }

        return $this;
    } // setUnitId()

    /**
     * Set the value of [reference] column.
     *
     * @param  string $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setReference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reference !== $v) {
            $this->reference = $v;
            $this->modifiedColumns[RewardTableMap::COL_REFERENCE] = true;
        }

        return $this;
    } // setReference()

    /**
     * Sets the value of [update_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setUpdateTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_time !== null || $dt !== null) {
            if ($dt !== $this->update_time) {
                $this->update_time = $dt;
                $this->modifiedColumns[RewardTableMap::COL_UPDATE_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateTime()

    /**
     * Set the value of [update_user] column.
     *
     * @param  string $v new value
     * @return $this|\Reward The current object (for fluent API support)
     */
    public function setUpdateUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->update_user !== $v) {
            $this->update_user = $v;
            $this->modifiedColumns[RewardTableMap::COL_UPDATE_USER] = true;
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
            if ($this->point_multiplier !== '1.00000000') {
                return false;
            }

            if ($this->unit_id !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : RewardTableMap::translateFieldName('RewardId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reward_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : RewardTableMap::translateFieldName('PointSystemId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->point_system_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : RewardTableMap::translateFieldName('RewardCategoryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reward_category_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : RewardTableMap::translateFieldName('RewardTypeId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reward_type_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : RewardTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : RewardTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : RewardTableMap::translateFieldName('Icon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->icon = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : RewardTableMap::translateFieldName('YenPerPoint', TableMap::TYPE_PHPNAME, $indexType)];
            $this->yen_per_point = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : RewardTableMap::translateFieldName('PricePerUnit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price_per_unit = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : RewardTableMap::translateFieldName('MinPoints', TableMap::TYPE_PHPNAME, $indexType)];
            $this->min_points = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : RewardTableMap::translateFieldName('MaxPoints', TableMap::TYPE_PHPNAME, $indexType)];
            $this->max_points = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : RewardTableMap::translateFieldName('RequiredPoints', TableMap::TYPE_PHPNAME, $indexType)];
            $this->required_points = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : RewardTableMap::translateFieldName('MaxPeriod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->max_period = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : RewardTableMap::translateFieldName('PointMultiplier', TableMap::TYPE_PHPNAME, $indexType)];
            $this->point_multiplier = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : RewardTableMap::translateFieldName('UnitId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unit_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : RewardTableMap::translateFieldName('Reference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reference = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : RewardTableMap::translateFieldName('UpdateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : RewardTableMap::translateFieldName('UpdateUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->update_user = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 18; // 18 = RewardTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Reward'), 0, $e);
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
        if ($this->aPointSystem !== null && $this->point_system_id !== $this->aPointSystem->getPointSystemId()) {
            $this->aPointSystem = null;
        }
        if ($this->aRewardCategory !== null && $this->reward_category_id !== $this->aRewardCategory->getRewardCategoryId()) {
            $this->aRewardCategory = null;
        }
        if ($this->aRewardType !== null && $this->reward_type_id !== $this->aRewardType->getRewardTypeId()) {
            $this->aRewardType = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(RewardTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildRewardQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRewardCategory = null;
            $this->aPointSystem = null;
            $this->aRewardType = null;
            $this->aUnit = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Reward::setDeleted()
     * @see Reward::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildRewardQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTableMap::DATABASE_NAME);
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
                RewardTableMap::addInstanceToPool($this);
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

            if ($this->aRewardCategory !== null) {
                if ($this->aRewardCategory->isModified() || $this->aRewardCategory->isNew()) {
                    $affectedRows += $this->aRewardCategory->save($con);
                }
                $this->setRewardCategory($this->aRewardCategory);
            }

            if ($this->aPointSystem !== null) {
                if ($this->aPointSystem->isModified() || $this->aPointSystem->isNew()) {
                    $affectedRows += $this->aPointSystem->save($con);
                }
                $this->setPointSystem($this->aPointSystem);
            }

            if ($this->aRewardType !== null) {
                if ($this->aRewardType->isModified() || $this->aRewardType->isNew()) {
                    $affectedRows += $this->aRewardType->save($con);
                }
                $this->setRewardType($this->aRewardType);
            }

            if ($this->aUnit !== null) {
                if ($this->aUnit->isModified() || $this->aUnit->isNew()) {
                    $affectedRows += $this->aUnit->save($con);
                }
                $this->setUnit($this->aUnit);
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

        $this->modifiedColumns[RewardTableMap::COL_REWARD_ID] = true;
        if (null !== $this->reward_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RewardTableMap::COL_REWARD_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RewardTableMap::COL_REWARD_ID)) {
            $modifiedColumns[':p' . $index++]  = 'reward_id';
        }
        if ($this->isColumnModified(RewardTableMap::COL_POINT_SYSTEM_ID)) {
            $modifiedColumns[':p' . $index++]  = 'point_system_id';
        }
        if ($this->isColumnModified(RewardTableMap::COL_REWARD_CATEGORY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'reward_category_id';
        }
        if ($this->isColumnModified(RewardTableMap::COL_REWARD_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'reward_type_id';
        }
        if ($this->isColumnModified(RewardTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(RewardTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(RewardTableMap::COL_ICON)) {
            $modifiedColumns[':p' . $index++]  = 'icon';
        }
        if ($this->isColumnModified(RewardTableMap::COL_YEN_PER_POINT)) {
            $modifiedColumns[':p' . $index++]  = 'yen_per_point';
        }
        if ($this->isColumnModified(RewardTableMap::COL_PRICE_PER_UNIT)) {
            $modifiedColumns[':p' . $index++]  = 'price_per_unit';
        }
        if ($this->isColumnModified(RewardTableMap::COL_MIN_POINTS)) {
            $modifiedColumns[':p' . $index++]  = 'min_points';
        }
        if ($this->isColumnModified(RewardTableMap::COL_MAX_POINTS)) {
            $modifiedColumns[':p' . $index++]  = 'max_points';
        }
        if ($this->isColumnModified(RewardTableMap::COL_REQUIRED_POINTS)) {
            $modifiedColumns[':p' . $index++]  = 'required_points';
        }
        if ($this->isColumnModified(RewardTableMap::COL_MAX_PERIOD)) {
            $modifiedColumns[':p' . $index++]  = 'max_period';
        }
        if ($this->isColumnModified(RewardTableMap::COL_POINT_MULTIPLIER)) {
            $modifiedColumns[':p' . $index++]  = 'point_multiplier';
        }
        if ($this->isColumnModified(RewardTableMap::COL_UNIT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'unit_id';
        }
        if ($this->isColumnModified(RewardTableMap::COL_REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'reference';
        }
        if ($this->isColumnModified(RewardTableMap::COL_UPDATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'update_time';
        }
        if ($this->isColumnModified(RewardTableMap::COL_UPDATE_USER)) {
            $modifiedColumns[':p' . $index++]  = 'update_user';
        }

        $sql = sprintf(
            'INSERT INTO reward (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'reward_id':
                        $stmt->bindValue($identifier, $this->reward_id, PDO::PARAM_INT);
                        break;
                    case 'point_system_id':
                        $stmt->bindValue($identifier, $this->point_system_id, PDO::PARAM_INT);
                        break;
                    case 'reward_category_id':
                        $stmt->bindValue($identifier, $this->reward_category_id, PDO::PARAM_INT);
                        break;
                    case 'reward_type_id':
                        $stmt->bindValue($identifier, $this->reward_type_id, PDO::PARAM_INT);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'icon':
                        $stmt->bindValue($identifier, $this->icon, PDO::PARAM_STR);
                        break;
                    case 'yen_per_point':
                        $stmt->bindValue($identifier, $this->yen_per_point, PDO::PARAM_STR);
                        break;
                    case 'price_per_unit':
                        $stmt->bindValue($identifier, $this->price_per_unit, PDO::PARAM_INT);
                        break;
                    case 'min_points':
                        $stmt->bindValue($identifier, $this->min_points, PDO::PARAM_INT);
                        break;
                    case 'max_points':
                        $stmt->bindValue($identifier, $this->max_points, PDO::PARAM_INT);
                        break;
                    case 'required_points':
                        $stmt->bindValue($identifier, $this->required_points, PDO::PARAM_INT);
                        break;
                    case 'max_period':
                        $stmt->bindValue($identifier, $this->max_period, PDO::PARAM_STR);
                        break;
                    case 'point_multiplier':
                        $stmt->bindValue($identifier, $this->point_multiplier, PDO::PARAM_STR);
                        break;
                    case 'unit_id':
                        $stmt->bindValue($identifier, $this->unit_id, PDO::PARAM_INT);
                        break;
                    case 'reference':
                        $stmt->bindValue($identifier, $this->reference, PDO::PARAM_STR);
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
        $this->setRewardId($pk);

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
        $pos = RewardTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRewardId();
                break;
            case 1:
                return $this->getPointSystemId();
                break;
            case 2:
                return $this->getRewardCategoryId();
                break;
            case 3:
                return $this->getRewardTypeId();
                break;
            case 4:
                return $this->getTitle();
                break;
            case 5:
                return $this->getDescription();
                break;
            case 6:
                return $this->getIcon();
                break;
            case 7:
                return $this->getYenPerPoint();
                break;
            case 8:
                return $this->getPricePerUnit();
                break;
            case 9:
                return $this->getMinPoints();
                break;
            case 10:
                return $this->getMaxPoints();
                break;
            case 11:
                return $this->getRequiredPoints();
                break;
            case 12:
                return $this->getMaxPeriod();
                break;
            case 13:
                return $this->getPointMultiplier();
                break;
            case 14:
                return $this->getUnitId();
                break;
            case 15:
                return $this->getReference();
                break;
            case 16:
                return $this->getUpdateTime();
                break;
            case 17:
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

        if (isset($alreadyDumpedObjects['Reward'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Reward'][$this->hashCode()] = true;
        $keys = RewardTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRewardId(),
            $keys[1] => $this->getPointSystemId(),
            $keys[2] => $this->getRewardCategoryId(),
            $keys[3] => $this->getRewardTypeId(),
            $keys[4] => $this->getTitle(),
            $keys[5] => $this->getDescription(),
            $keys[6] => $this->getIcon(),
            $keys[7] => $this->getYenPerPoint(),
            $keys[8] => $this->getPricePerUnit(),
            $keys[9] => $this->getMinPoints(),
            $keys[10] => $this->getMaxPoints(),
            $keys[11] => $this->getRequiredPoints(),
            $keys[12] => $this->getMaxPeriod(),
            $keys[13] => $this->getPointMultiplier(),
            $keys[14] => $this->getUnitId(),
            $keys[15] => $this->getReference(),
            $keys[16] => $this->getUpdateTime(),
            $keys[17] => $this->getUpdateUser(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aRewardCategory) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'rewardCategory';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'reward_category';
                        break;
                    default:
                        $key = 'RewardCategory';
                }

                $result[$key] = $this->aRewardCategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPointSystem) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'pointSystem';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'point_system';
                        break;
                    default:
                        $key = 'PointSystem';
                }

                $result[$key] = $this->aPointSystem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRewardType) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'rewardType';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'reward_type';
                        break;
                    default:
                        $key = 'RewardType';
                }

                $result[$key] = $this->aRewardType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
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
     * @return $this|\Reward
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = RewardTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Reward
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setRewardId($value);
                break;
            case 1:
                $this->setPointSystemId($value);
                break;
            case 2:
                $this->setRewardCategoryId($value);
                break;
            case 3:
                $this->setRewardTypeId($value);
                break;
            case 4:
                $this->setTitle($value);
                break;
            case 5:
                $this->setDescription($value);
                break;
            case 6:
                $this->setIcon($value);
                break;
            case 7:
                $this->setYenPerPoint($value);
                break;
            case 8:
                $this->setPricePerUnit($value);
                break;
            case 9:
                $this->setMinPoints($value);
                break;
            case 10:
                $this->setMaxPoints($value);
                break;
            case 11:
                $this->setRequiredPoints($value);
                break;
            case 12:
                $this->setMaxPeriod($value);
                break;
            case 13:
                $this->setPointMultiplier($value);
                break;
            case 14:
                $this->setUnitId($value);
                break;
            case 15:
                $this->setReference($value);
                break;
            case 16:
                $this->setUpdateTime($value);
                break;
            case 17:
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
        $keys = RewardTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setRewardId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setPointSystemId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setRewardCategoryId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setRewardTypeId($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTitle($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDescription($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setIcon($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setYenPerPoint($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPricePerUnit($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setMinPoints($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setMaxPoints($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setRequiredPoints($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setMaxPeriod($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setPointMultiplier($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setUnitId($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setReference($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setUpdateTime($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setUpdateUser($arr[$keys[17]]);
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
     * @return $this|\Reward The current object, for fluid interface
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
        $criteria = new Criteria(RewardTableMap::DATABASE_NAME);

        if ($this->isColumnModified(RewardTableMap::COL_REWARD_ID)) {
            $criteria->add(RewardTableMap::COL_REWARD_ID, $this->reward_id);
        }
        if ($this->isColumnModified(RewardTableMap::COL_POINT_SYSTEM_ID)) {
            $criteria->add(RewardTableMap::COL_POINT_SYSTEM_ID, $this->point_system_id);
        }
        if ($this->isColumnModified(RewardTableMap::COL_REWARD_CATEGORY_ID)) {
            $criteria->add(RewardTableMap::COL_REWARD_CATEGORY_ID, $this->reward_category_id);
        }
        if ($this->isColumnModified(RewardTableMap::COL_REWARD_TYPE_ID)) {
            $criteria->add(RewardTableMap::COL_REWARD_TYPE_ID, $this->reward_type_id);
        }
        if ($this->isColumnModified(RewardTableMap::COL_TITLE)) {
            $criteria->add(RewardTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(RewardTableMap::COL_DESCRIPTION)) {
            $criteria->add(RewardTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(RewardTableMap::COL_ICON)) {
            $criteria->add(RewardTableMap::COL_ICON, $this->icon);
        }
        if ($this->isColumnModified(RewardTableMap::COL_YEN_PER_POINT)) {
            $criteria->add(RewardTableMap::COL_YEN_PER_POINT, $this->yen_per_point);
        }
        if ($this->isColumnModified(RewardTableMap::COL_PRICE_PER_UNIT)) {
            $criteria->add(RewardTableMap::COL_PRICE_PER_UNIT, $this->price_per_unit);
        }
        if ($this->isColumnModified(RewardTableMap::COL_MIN_POINTS)) {
            $criteria->add(RewardTableMap::COL_MIN_POINTS, $this->min_points);
        }
        if ($this->isColumnModified(RewardTableMap::COL_MAX_POINTS)) {
            $criteria->add(RewardTableMap::COL_MAX_POINTS, $this->max_points);
        }
        if ($this->isColumnModified(RewardTableMap::COL_REQUIRED_POINTS)) {
            $criteria->add(RewardTableMap::COL_REQUIRED_POINTS, $this->required_points);
        }
        if ($this->isColumnModified(RewardTableMap::COL_MAX_PERIOD)) {
            $criteria->add(RewardTableMap::COL_MAX_PERIOD, $this->max_period);
        }
        if ($this->isColumnModified(RewardTableMap::COL_POINT_MULTIPLIER)) {
            $criteria->add(RewardTableMap::COL_POINT_MULTIPLIER, $this->point_multiplier);
        }
        if ($this->isColumnModified(RewardTableMap::COL_UNIT_ID)) {
            $criteria->add(RewardTableMap::COL_UNIT_ID, $this->unit_id);
        }
        if ($this->isColumnModified(RewardTableMap::COL_REFERENCE)) {
            $criteria->add(RewardTableMap::COL_REFERENCE, $this->reference);
        }
        if ($this->isColumnModified(RewardTableMap::COL_UPDATE_TIME)) {
            $criteria->add(RewardTableMap::COL_UPDATE_TIME, $this->update_time);
        }
        if ($this->isColumnModified(RewardTableMap::COL_UPDATE_USER)) {
            $criteria->add(RewardTableMap::COL_UPDATE_USER, $this->update_user);
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
        $criteria = ChildRewardQuery::create();
        $criteria->add(RewardTableMap::COL_REWARD_ID, $this->reward_id);

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
        $validPk = null !== $this->getRewardId();

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
        return $this->getRewardId();
    }

    /**
     * Generic method to set the primary key (reward_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRewardId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getRewardId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Reward (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPointSystemId($this->getPointSystemId());
        $copyObj->setRewardCategoryId($this->getRewardCategoryId());
        $copyObj->setRewardTypeId($this->getRewardTypeId());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setIcon($this->getIcon());
        $copyObj->setYenPerPoint($this->getYenPerPoint());
        $copyObj->setPricePerUnit($this->getPricePerUnit());
        $copyObj->setMinPoints($this->getMinPoints());
        $copyObj->setMaxPoints($this->getMaxPoints());
        $copyObj->setRequiredPoints($this->getRequiredPoints());
        $copyObj->setMaxPeriod($this->getMaxPeriod());
        $copyObj->setPointMultiplier($this->getPointMultiplier());
        $copyObj->setUnitId($this->getUnitId());
        $copyObj->setReference($this->getReference());
        $copyObj->setUpdateTime($this->getUpdateTime());
        $copyObj->setUpdateUser($this->getUpdateUser());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setRewardId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Reward Clone of current object.
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
     * Declares an association between this object and a ChildRewardCategory object.
     *
     * @param  ChildRewardCategory $v
     * @return $this|\Reward The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRewardCategory(ChildRewardCategory $v = null)
    {
        if ($v === null) {
            $this->setRewardCategoryId(NULL);
        } else {
            $this->setRewardCategoryId($v->getRewardCategoryId());
        }

        $this->aRewardCategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildRewardCategory object, it will not be re-added.
        if ($v !== null) {
            $v->addReward($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildRewardCategory object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildRewardCategory The associated ChildRewardCategory object.
     * @throws PropelException
     */
    public function getRewardCategory(ConnectionInterface $con = null)
    {
        if ($this->aRewardCategory === null && ($this->reward_category_id !== null)) {
            $this->aRewardCategory = ChildRewardCategoryQuery::create()->findPk($this->reward_category_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRewardCategory->addRewards($this);
             */
        }

        return $this->aRewardCategory;
    }

    /**
     * Declares an association between this object and a ChildPointSystem object.
     *
     * @param  ChildPointSystem $v
     * @return $this|\Reward The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPointSystem(ChildPointSystem $v = null)
    {
        if ($v === null) {
            $this->setPointSystemId(NULL);
        } else {
            $this->setPointSystemId($v->getPointSystemId());
        }

        $this->aPointSystem = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPointSystem object, it will not be re-added.
        if ($v !== null) {
            $v->addReward($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPointSystem object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPointSystem The associated ChildPointSystem object.
     * @throws PropelException
     */
    public function getPointSystem(ConnectionInterface $con = null)
    {
        if ($this->aPointSystem === null && ($this->point_system_id !== null)) {
            $this->aPointSystem = ChildPointSystemQuery::create()->findPk($this->point_system_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPointSystem->addRewards($this);
             */
        }

        return $this->aPointSystem;
    }

    /**
     * Declares an association between this object and a ChildRewardType object.
     *
     * @param  ChildRewardType $v
     * @return $this|\Reward The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRewardType(ChildRewardType $v = null)
    {
        if ($v === null) {
            $this->setRewardTypeId(NULL);
        } else {
            $this->setRewardTypeId($v->getRewardTypeId());
        }

        $this->aRewardType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildRewardType object, it will not be re-added.
        if ($v !== null) {
            $v->addReward($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildRewardType object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildRewardType The associated ChildRewardType object.
     * @throws PropelException
     */
    public function getRewardType(ConnectionInterface $con = null)
    {
        if ($this->aRewardType === null && ($this->reward_type_id !== null)) {
            $this->aRewardType = ChildRewardTypeQuery::create()->findPk($this->reward_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRewardType->addRewards($this);
             */
        }

        return $this->aRewardType;
    }

    /**
     * Declares an association between this object and a ChildUnit object.
     *
     * @param  ChildUnit $v
     * @return $this|\Reward The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUnit(ChildUnit $v = null)
    {
        if ($v === null) {
            $this->setUnitId(1);
        } else {
            $this->setUnitId($v->getUnitId());
        }

        $this->aUnit = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUnit object, it will not be re-added.
        if ($v !== null) {
            $v->addReward($this);
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
                $this->aUnit->addRewards($this);
             */
        }

        return $this->aUnit;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aRewardCategory) {
            $this->aRewardCategory->removeReward($this);
        }
        if (null !== $this->aPointSystem) {
            $this->aPointSystem->removeReward($this);
        }
        if (null !== $this->aRewardType) {
            $this->aRewardType->removeReward($this);
        }
        if (null !== $this->aUnit) {
            $this->aUnit->removeReward($this);
        }
        $this->reward_id = null;
        $this->point_system_id = null;
        $this->reward_category_id = null;
        $this->reward_type_id = null;
        $this->title = null;
        $this->description = null;
        $this->icon = null;
        $this->yen_per_point = null;
        $this->price_per_unit = null;
        $this->min_points = null;
        $this->max_points = null;
        $this->required_points = null;
        $this->max_period = null;
        $this->point_multiplier = null;
        $this->unit_id = null;
        $this->reference = null;
        $this->update_time = null;
        $this->update_user = null;
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
        } // if ($deep)

        $this->aRewardCategory = null;
        $this->aPointSystem = null;
        $this->aRewardType = null;
        $this->aUnit = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RewardTableMap::DEFAULT_STRING_FORMAT);
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
