<?php

namespace Base;

use \Discounts as ChildDiscounts;
use \DiscountsQuery as ChildDiscountsQuery;
use \MapPersonaStore as ChildMapPersonaStore;
use \MapPersonaStoreQuery as ChildMapPersonaStoreQuery;
use \PointAcquisition as ChildPointAcquisition;
use \PointAcquisitionQuery as ChildPointAcquisitionQuery;
use \PointUse as ChildPointUse;
use \PointUseQuery as ChildPointUseQuery;
use \Reward as ChildReward;
use \RewardQuery as ChildRewardQuery;
use \Store as ChildStore;
use \StoreCategory as ChildStoreCategory;
use \StoreCategoryQuery as ChildStoreCategoryQuery;
use \StoreQuery as ChildStoreQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\StoreTableMap;
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
 * Base class that represents a row from the 'store' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Store implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\StoreTableMap';


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
     * The value for the store_id field.
     * @var        int
     */
    protected $store_id;

    /**
     * The value for the store_name field.
     * @var        string
     */
    protected $store_name;

    /**
     * The value for the store_category_id field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $store_category_id;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the is_major field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_major;

    /**
     * The value for the allocation field.
     * Note: this column has a database default value of: 10
     * @var        int
     */
    protected $allocation;

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
     * @var        ChildStoreCategory
     */
    protected $aStoreCategory;

    /**
     * @var        ObjectCollection|ChildDiscounts[] Collection to store aggregation of ChildDiscounts objects.
     */
    protected $collDiscountss;
    protected $collDiscountssPartial;

    /**
     * @var        ObjectCollection|ChildMapPersonaStore[] Collection to store aggregation of ChildMapPersonaStore objects.
     */
    protected $collMapPersonaStores;
    protected $collMapPersonaStoresPartial;

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
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDiscounts[]
     */
    protected $discountssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMapPersonaStore[]
     */
    protected $mapPersonaStoresScheduledForDeletion = null;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->store_category_id = 1;
        $this->is_major = 0;
        $this->allocation = 10;
    }

    /**
     * Initializes internal state of Base\Store object.
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
     * Compares this with another <code>Store</code> instance.  If
     * <code>obj</code> is an instance of <code>Store</code>, delegates to
     * <code>equals(Store)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Store The current object, for fluid interface
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
     * Get the [store_id] column value.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->store_id;
    }

    /**
     * Get the [store_name] column value.
     *
     * @return string
     */
    public function getStoreName()
    {
        return $this->store_name;
    }

    /**
     * Get the [store_category_id] column value.
     *
     * @return int
     */
    public function getStoreCategoryId()
    {
        return $this->store_category_id;
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
     * Get the [is_major] column value.
     *
     * @return int
     */
    public function getIsMajor()
    {
        return $this->is_major;
    }

    /**
     * Get the [allocation] column value.
     *
     * @return int
     */
    public function getAllocation()
    {
        return $this->allocation;
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
     * Set the value of [store_id] column.
     *
     * @param  int $v new value
     * @return $this|\Store The current object (for fluent API support)
     */
    public function setStoreId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->store_id !== $v) {
            $this->store_id = $v;
            $this->modifiedColumns[StoreTableMap::COL_STORE_ID] = true;
        }

        return $this;
    } // setStoreId()

    /**
     * Set the value of [store_name] column.
     *
     * @param  string $v new value
     * @return $this|\Store The current object (for fluent API support)
     */
    public function setStoreName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->store_name !== $v) {
            $this->store_name = $v;
            $this->modifiedColumns[StoreTableMap::COL_STORE_NAME] = true;
        }

        return $this;
    } // setStoreName()

    /**
     * Set the value of [store_category_id] column.
     *
     * @param  int $v new value
     * @return $this|\Store The current object (for fluent API support)
     */
    public function setStoreCategoryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->store_category_id !== $v) {
            $this->store_category_id = $v;
            $this->modifiedColumns[StoreTableMap::COL_STORE_CATEGORY_ID] = true;
        }

        if ($this->aStoreCategory !== null && $this->aStoreCategory->getStoreCategoryId() !== $v) {
            $this->aStoreCategory = null;
        }

        return $this;
    } // setStoreCategoryId()

    /**
     * Set the value of [description] column.
     *
     * @param  string $v new value
     * @return $this|\Store The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[StoreTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [is_major] column.
     *
     * @param  int $v new value
     * @return $this|\Store The current object (for fluent API support)
     */
    public function setIsMajor($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->is_major !== $v) {
            $this->is_major = $v;
            $this->modifiedColumns[StoreTableMap::COL_IS_MAJOR] = true;
        }

        return $this;
    } // setIsMajor()

    /**
     * Set the value of [allocation] column.
     *
     * @param  int $v new value
     * @return $this|\Store The current object (for fluent API support)
     */
    public function setAllocation($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->allocation !== $v) {
            $this->allocation = $v;
            $this->modifiedColumns[StoreTableMap::COL_ALLOCATION] = true;
        }

        return $this;
    } // setAllocation()

    /**
     * Sets the value of [update_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Store The current object (for fluent API support)
     */
    public function setUpdateTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_time !== null || $dt !== null) {
            if ($dt !== $this->update_time) {
                $this->update_time = $dt;
                $this->modifiedColumns[StoreTableMap::COL_UPDATE_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateTime()

    /**
     * Set the value of [update_user] column.
     *
     * @param  string $v new value
     * @return $this|\Store The current object (for fluent API support)
     */
    public function setUpdateUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->update_user !== $v) {
            $this->update_user = $v;
            $this->modifiedColumns[StoreTableMap::COL_UPDATE_USER] = true;
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
            if ($this->store_category_id !== 1) {
                return false;
            }

            if ($this->is_major !== 0) {
                return false;
            }

            if ($this->allocation !== 10) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : StoreTableMap::translateFieldName('StoreId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->store_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : StoreTableMap::translateFieldName('StoreName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->store_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : StoreTableMap::translateFieldName('StoreCategoryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->store_category_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : StoreTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : StoreTableMap::translateFieldName('IsMajor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_major = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : StoreTableMap::translateFieldName('Allocation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->allocation = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : StoreTableMap::translateFieldName('UpdateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : StoreTableMap::translateFieldName('UpdateUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->update_user = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = StoreTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Store'), 0, $e);
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
        if ($this->aStoreCategory !== null && $this->store_category_id !== $this->aStoreCategory->getStoreCategoryId()) {
            $this->aStoreCategory = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(StoreTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildStoreQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aStoreCategory = null;
            $this->collDiscountss = null;

            $this->collMapPersonaStores = null;

            $this->collPointAcquisitions = null;

            $this->collPointUses = null;

            $this->collRewards = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Store::setDeleted()
     * @see Store::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(StoreTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildStoreQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(StoreTableMap::DATABASE_NAME);
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
                StoreTableMap::addInstanceToPool($this);
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

            if ($this->aStoreCategory !== null) {
                if ($this->aStoreCategory->isModified() || $this->aStoreCategory->isNew()) {
                    $affectedRows += $this->aStoreCategory->save($con);
                }
                $this->setStoreCategory($this->aStoreCategory);
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

            if ($this->discountssScheduledForDeletion !== null) {
                if (!$this->discountssScheduledForDeletion->isEmpty()) {
                    \DiscountsQuery::create()
                        ->filterByPrimaryKeys($this->discountssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->discountssScheduledForDeletion = null;
                }
            }

            if ($this->collDiscountss !== null) {
                foreach ($this->collDiscountss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mapPersonaStoresScheduledForDeletion !== null) {
                if (!$this->mapPersonaStoresScheduledForDeletion->isEmpty()) {
                    \MapPersonaStoreQuery::create()
                        ->filterByPrimaryKeys($this->mapPersonaStoresScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mapPersonaStoresScheduledForDeletion = null;
                }
            }

            if ($this->collMapPersonaStores !== null) {
                foreach ($this->collMapPersonaStores as $referrerFK) {
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
                    foreach ($this->rewardsScheduledForDeletion as $reward) {
                        // need to save related object because we set the relation to null
                        $reward->save($con);
                    }
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

        $this->modifiedColumns[StoreTableMap::COL_STORE_ID] = true;
        if (null !== $this->store_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . StoreTableMap::COL_STORE_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(StoreTableMap::COL_STORE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'store_id';
        }
        if ($this->isColumnModified(StoreTableMap::COL_STORE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'store_name';
        }
        if ($this->isColumnModified(StoreTableMap::COL_STORE_CATEGORY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'store_category_id';
        }
        if ($this->isColumnModified(StoreTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(StoreTableMap::COL_IS_MAJOR)) {
            $modifiedColumns[':p' . $index++]  = 'is_major';
        }
        if ($this->isColumnModified(StoreTableMap::COL_ALLOCATION)) {
            $modifiedColumns[':p' . $index++]  = 'allocation';
        }
        if ($this->isColumnModified(StoreTableMap::COL_UPDATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'update_time';
        }
        if ($this->isColumnModified(StoreTableMap::COL_UPDATE_USER)) {
            $modifiedColumns[':p' . $index++]  = 'update_user';
        }

        $sql = sprintf(
            'INSERT INTO store (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'store_id':
                        $stmt->bindValue($identifier, $this->store_id, PDO::PARAM_INT);
                        break;
                    case 'store_name':
                        $stmt->bindValue($identifier, $this->store_name, PDO::PARAM_STR);
                        break;
                    case 'store_category_id':
                        $stmt->bindValue($identifier, $this->store_category_id, PDO::PARAM_INT);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'is_major':
                        $stmt->bindValue($identifier, $this->is_major, PDO::PARAM_INT);
                        break;
                    case 'allocation':
                        $stmt->bindValue($identifier, $this->allocation, PDO::PARAM_INT);
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
        $this->setStoreId($pk);

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
        $pos = StoreTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getStoreId();
                break;
            case 1:
                return $this->getStoreName();
                break;
            case 2:
                return $this->getStoreCategoryId();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getIsMajor();
                break;
            case 5:
                return $this->getAllocation();
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

        if (isset($alreadyDumpedObjects['Store'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Store'][$this->hashCode()] = true;
        $keys = StoreTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getStoreId(),
            $keys[1] => $this->getStoreName(),
            $keys[2] => $this->getStoreCategoryId(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getIsMajor(),
            $keys[5] => $this->getAllocation(),
            $keys[6] => $this->getUpdateTime(),
            $keys[7] => $this->getUpdateUser(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aStoreCategory) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'storeCategory';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'store_category';
                        break;
                    default:
                        $key = 'StoreCategory';
                }

                $result[$key] = $this->aStoreCategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDiscountss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'discountss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'discountss';
                        break;
                    default:
                        $key = 'Discountss';
                }

                $result[$key] = $this->collDiscountss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMapPersonaStores) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'mapPersonaStores';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'map_persona_stores';
                        break;
                    default:
                        $key = 'MapPersonaStores';
                }

                $result[$key] = $this->collMapPersonaStores->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Store
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = StoreTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Store
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setStoreId($value);
                break;
            case 1:
                $this->setStoreName($value);
                break;
            case 2:
                $this->setStoreCategoryId($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setIsMajor($value);
                break;
            case 5:
                $this->setAllocation($value);
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
        $keys = StoreTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setStoreId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setStoreName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setStoreCategoryId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescription($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIsMajor($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setAllocation($arr[$keys[5]]);
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
     * @return $this|\Store The current object, for fluid interface
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
        $criteria = new Criteria(StoreTableMap::DATABASE_NAME);

        if ($this->isColumnModified(StoreTableMap::COL_STORE_ID)) {
            $criteria->add(StoreTableMap::COL_STORE_ID, $this->store_id);
        }
        if ($this->isColumnModified(StoreTableMap::COL_STORE_NAME)) {
            $criteria->add(StoreTableMap::COL_STORE_NAME, $this->store_name);
        }
        if ($this->isColumnModified(StoreTableMap::COL_STORE_CATEGORY_ID)) {
            $criteria->add(StoreTableMap::COL_STORE_CATEGORY_ID, $this->store_category_id);
        }
        if ($this->isColumnModified(StoreTableMap::COL_DESCRIPTION)) {
            $criteria->add(StoreTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(StoreTableMap::COL_IS_MAJOR)) {
            $criteria->add(StoreTableMap::COL_IS_MAJOR, $this->is_major);
        }
        if ($this->isColumnModified(StoreTableMap::COL_ALLOCATION)) {
            $criteria->add(StoreTableMap::COL_ALLOCATION, $this->allocation);
        }
        if ($this->isColumnModified(StoreTableMap::COL_UPDATE_TIME)) {
            $criteria->add(StoreTableMap::COL_UPDATE_TIME, $this->update_time);
        }
        if ($this->isColumnModified(StoreTableMap::COL_UPDATE_USER)) {
            $criteria->add(StoreTableMap::COL_UPDATE_USER, $this->update_user);
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
        $criteria = ChildStoreQuery::create();
        $criteria->add(StoreTableMap::COL_STORE_ID, $this->store_id);

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
        $validPk = null !== $this->getStoreId();

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
        return $this->getStoreId();
    }

    /**
     * Generic method to set the primary key (store_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setStoreId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getStoreId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Store (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setStoreName($this->getStoreName());
        $copyObj->setStoreCategoryId($this->getStoreCategoryId());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setIsMajor($this->getIsMajor());
        $copyObj->setAllocation($this->getAllocation());
        $copyObj->setUpdateTime($this->getUpdateTime());
        $copyObj->setUpdateUser($this->getUpdateUser());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getDiscountss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiscounts($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMapPersonaStores() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMapPersonaStore($relObj->copy($deepCopy));
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

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setStoreId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Store Clone of current object.
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
     * Declares an association between this object and a ChildStoreCategory object.
     *
     * @param  ChildStoreCategory $v
     * @return $this|\Store The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStoreCategory(ChildStoreCategory $v = null)
    {
        if ($v === null) {
            $this->setStoreCategoryId(1);
        } else {
            $this->setStoreCategoryId($v->getStoreCategoryId());
        }

        $this->aStoreCategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildStoreCategory object, it will not be re-added.
        if ($v !== null) {
            $v->addStore($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildStoreCategory object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildStoreCategory The associated ChildStoreCategory object.
     * @throws PropelException
     */
    public function getStoreCategory(ConnectionInterface $con = null)
    {
        if ($this->aStoreCategory === null && ($this->store_category_id !== null)) {
            $this->aStoreCategory = ChildStoreCategoryQuery::create()->findPk($this->store_category_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStoreCategory->addStores($this);
             */
        }

        return $this->aStoreCategory;
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
        if ('Discounts' == $relationName) {
            return $this->initDiscountss();
        }
        if ('MapPersonaStore' == $relationName) {
            return $this->initMapPersonaStores();
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
    }

    /**
     * Clears out the collDiscountss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDiscountss()
     */
    public function clearDiscountss()
    {
        $this->collDiscountss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDiscountss collection loaded partially.
     */
    public function resetPartialDiscountss($v = true)
    {
        $this->collDiscountssPartial = $v;
    }

    /**
     * Initializes the collDiscountss collection.
     *
     * By default this just sets the collDiscountss collection to an empty array (like clearcollDiscountss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiscountss($overrideExisting = true)
    {
        if (null !== $this->collDiscountss && !$overrideExisting) {
            return;
        }
        $this->collDiscountss = new ObjectCollection();
        $this->collDiscountss->setModel('\Discounts');
    }

    /**
     * Gets an array of ChildDiscounts objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildStore is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDiscounts[] List of ChildDiscounts objects
     * @throws PropelException
     */
    public function getDiscountss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountssPartial && !$this->isNew();
        if (null === $this->collDiscountss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiscountss) {
                // return empty collection
                $this->initDiscountss();
            } else {
                $collDiscountss = ChildDiscountsQuery::create(null, $criteria)
                    ->filterByStore($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDiscountssPartial && count($collDiscountss)) {
                        $this->initDiscountss(false);

                        foreach ($collDiscountss as $obj) {
                            if (false == $this->collDiscountss->contains($obj)) {
                                $this->collDiscountss->append($obj);
                            }
                        }

                        $this->collDiscountssPartial = true;
                    }

                    return $collDiscountss;
                }

                if ($partial && $this->collDiscountss) {
                    foreach ($this->collDiscountss as $obj) {
                        if ($obj->isNew()) {
                            $collDiscountss[] = $obj;
                        }
                    }
                }

                $this->collDiscountss = $collDiscountss;
                $this->collDiscountssPartial = false;
            }
        }

        return $this->collDiscountss;
    }

    /**
     * Sets a collection of ChildDiscounts objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $discountss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function setDiscountss(Collection $discountss, ConnectionInterface $con = null)
    {
        /** @var ChildDiscounts[] $discountssToDelete */
        $discountssToDelete = $this->getDiscountss(new Criteria(), $con)->diff($discountss);


        $this->discountssScheduledForDeletion = $discountssToDelete;

        foreach ($discountssToDelete as $discountsRemoved) {
            $discountsRemoved->setStore(null);
        }

        $this->collDiscountss = null;
        foreach ($discountss as $discounts) {
            $this->addDiscounts($discounts);
        }

        $this->collDiscountss = $discountss;
        $this->collDiscountssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Discounts objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Discounts objects.
     * @throws PropelException
     */
    public function countDiscountss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountssPartial && !$this->isNew();
        if (null === $this->collDiscountss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiscountss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDiscountss());
            }

            $query = ChildDiscountsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collDiscountss);
    }

    /**
     * Method called to associate a ChildDiscounts object to this object
     * through the ChildDiscounts foreign key attribute.
     *
     * @param  ChildDiscounts $l ChildDiscounts
     * @return $this|\Store The current object (for fluent API support)
     */
    public function addDiscounts(ChildDiscounts $l)
    {
        if ($this->collDiscountss === null) {
            $this->initDiscountss();
            $this->collDiscountssPartial = true;
        }

        if (!$this->collDiscountss->contains($l)) {
            $this->doAddDiscounts($l);
        }

        return $this;
    }

    /**
     * @param ChildDiscounts $discounts The ChildDiscounts object to add.
     */
    protected function doAddDiscounts(ChildDiscounts $discounts)
    {
        $this->collDiscountss[]= $discounts;
        $discounts->setStore($this);
    }

    /**
     * @param  ChildDiscounts $discounts The ChildDiscounts object to remove.
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function removeDiscounts(ChildDiscounts $discounts)
    {
        if ($this->getDiscountss()->contains($discounts)) {
            $pos = $this->collDiscountss->search($discounts);
            $this->collDiscountss->remove($pos);
            if (null === $this->discountssScheduledForDeletion) {
                $this->discountssScheduledForDeletion = clone $this->collDiscountss;
                $this->discountssScheduledForDeletion->clear();
            }
            $this->discountssScheduledForDeletion[]= clone $discounts;
            $discounts->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related Discountss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDiscounts[] List of ChildDiscounts objects
     */
    public function getDiscountssJoinCreditCard(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDiscountsQuery::create(null, $criteria);
        $query->joinWith('CreditCard', $joinBehavior);

        return $this->getDiscountss($query, $con);
    }

    /**
     * Clears out the collMapPersonaStores collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMapPersonaStores()
     */
    public function clearMapPersonaStores()
    {
        $this->collMapPersonaStores = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMapPersonaStores collection loaded partially.
     */
    public function resetPartialMapPersonaStores($v = true)
    {
        $this->collMapPersonaStoresPartial = $v;
    }

    /**
     * Initializes the collMapPersonaStores collection.
     *
     * By default this just sets the collMapPersonaStores collection to an empty array (like clearcollMapPersonaStores());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMapPersonaStores($overrideExisting = true)
    {
        if (null !== $this->collMapPersonaStores && !$overrideExisting) {
            return;
        }
        $this->collMapPersonaStores = new ObjectCollection();
        $this->collMapPersonaStores->setModel('\MapPersonaStore');
    }

    /**
     * Gets an array of ChildMapPersonaStore objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildStore is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMapPersonaStore[] List of ChildMapPersonaStore objects
     * @throws PropelException
     */
    public function getMapPersonaStores(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMapPersonaStoresPartial && !$this->isNew();
        if (null === $this->collMapPersonaStores || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMapPersonaStores) {
                // return empty collection
                $this->initMapPersonaStores();
            } else {
                $collMapPersonaStores = ChildMapPersonaStoreQuery::create(null, $criteria)
                    ->filterByStore($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMapPersonaStoresPartial && count($collMapPersonaStores)) {
                        $this->initMapPersonaStores(false);

                        foreach ($collMapPersonaStores as $obj) {
                            if (false == $this->collMapPersonaStores->contains($obj)) {
                                $this->collMapPersonaStores->append($obj);
                            }
                        }

                        $this->collMapPersonaStoresPartial = true;
                    }

                    return $collMapPersonaStores;
                }

                if ($partial && $this->collMapPersonaStores) {
                    foreach ($this->collMapPersonaStores as $obj) {
                        if ($obj->isNew()) {
                            $collMapPersonaStores[] = $obj;
                        }
                    }
                }

                $this->collMapPersonaStores = $collMapPersonaStores;
                $this->collMapPersonaStoresPartial = false;
            }
        }

        return $this->collMapPersonaStores;
    }

    /**
     * Sets a collection of ChildMapPersonaStore objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $mapPersonaStores A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function setMapPersonaStores(Collection $mapPersonaStores, ConnectionInterface $con = null)
    {
        /** @var ChildMapPersonaStore[] $mapPersonaStoresToDelete */
        $mapPersonaStoresToDelete = $this->getMapPersonaStores(new Criteria(), $con)->diff($mapPersonaStores);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->mapPersonaStoresScheduledForDeletion = clone $mapPersonaStoresToDelete;

        foreach ($mapPersonaStoresToDelete as $mapPersonaStoreRemoved) {
            $mapPersonaStoreRemoved->setStore(null);
        }

        $this->collMapPersonaStores = null;
        foreach ($mapPersonaStores as $mapPersonaStore) {
            $this->addMapPersonaStore($mapPersonaStore);
        }

        $this->collMapPersonaStores = $mapPersonaStores;
        $this->collMapPersonaStoresPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MapPersonaStore objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MapPersonaStore objects.
     * @throws PropelException
     */
    public function countMapPersonaStores(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMapPersonaStoresPartial && !$this->isNew();
        if (null === $this->collMapPersonaStores || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMapPersonaStores) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMapPersonaStores());
            }

            $query = ChildMapPersonaStoreQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collMapPersonaStores);
    }

    /**
     * Method called to associate a ChildMapPersonaStore object to this object
     * through the ChildMapPersonaStore foreign key attribute.
     *
     * @param  ChildMapPersonaStore $l ChildMapPersonaStore
     * @return $this|\Store The current object (for fluent API support)
     */
    public function addMapPersonaStore(ChildMapPersonaStore $l)
    {
        if ($this->collMapPersonaStores === null) {
            $this->initMapPersonaStores();
            $this->collMapPersonaStoresPartial = true;
        }

        if (!$this->collMapPersonaStores->contains($l)) {
            $this->doAddMapPersonaStore($l);
        }

        return $this;
    }

    /**
     * @param ChildMapPersonaStore $mapPersonaStore The ChildMapPersonaStore object to add.
     */
    protected function doAddMapPersonaStore(ChildMapPersonaStore $mapPersonaStore)
    {
        $this->collMapPersonaStores[]= $mapPersonaStore;
        $mapPersonaStore->setStore($this);
    }

    /**
     * @param  ChildMapPersonaStore $mapPersonaStore The ChildMapPersonaStore object to remove.
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function removeMapPersonaStore(ChildMapPersonaStore $mapPersonaStore)
    {
        if ($this->getMapPersonaStores()->contains($mapPersonaStore)) {
            $pos = $this->collMapPersonaStores->search($mapPersonaStore);
            $this->collMapPersonaStores->remove($pos);
            if (null === $this->mapPersonaStoresScheduledForDeletion) {
                $this->mapPersonaStoresScheduledForDeletion = clone $this->collMapPersonaStores;
                $this->mapPersonaStoresScheduledForDeletion->clear();
            }
            $this->mapPersonaStoresScheduledForDeletion[]= clone $mapPersonaStore;
            $mapPersonaStore->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related MapPersonaStores from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMapPersonaStore[] List of ChildMapPersonaStore objects
     */
    public function getMapPersonaStoresJoinPersona(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMapPersonaStoreQuery::create(null, $criteria);
        $query->joinWith('Persona', $joinBehavior);

        return $this->getMapPersonaStores($query, $con);
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
     * If this ChildStore is new, it will return
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
                    ->filterByStore($this)
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
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function setPointAcquisitions(Collection $pointAcquisitions, ConnectionInterface $con = null)
    {
        /** @var ChildPointAcquisition[] $pointAcquisitionsToDelete */
        $pointAcquisitionsToDelete = $this->getPointAcquisitions(new Criteria(), $con)->diff($pointAcquisitions);


        $this->pointAcquisitionsScheduledForDeletion = $pointAcquisitionsToDelete;

        foreach ($pointAcquisitionsToDelete as $pointAcquisitionRemoved) {
            $pointAcquisitionRemoved->setStore(null);
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
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collPointAcquisitions);
    }

    /**
     * Method called to associate a ChildPointAcquisition object to this object
     * through the ChildPointAcquisition foreign key attribute.
     *
     * @param  ChildPointAcquisition $l ChildPointAcquisition
     * @return $this|\Store The current object (for fluent API support)
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
        $pointAcquisition->setStore($this);
    }

    /**
     * @param  ChildPointAcquisition $pointAcquisition The ChildPointAcquisition object to remove.
     * @return $this|ChildStore The current object (for fluent API support)
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
            $pointAcquisition->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related PointAcquisitions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPointAcquisition[] List of ChildPointAcquisition objects
     */
    public function getPointAcquisitionsJoinPointSystem(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPointAcquisitionQuery::create(null, $criteria);
        $query->joinWith('PointSystem', $joinBehavior);

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
     * If this ChildStore is new, it will return
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
                    ->filterByStore($this)
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
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function setPointUses(Collection $pointUses, ConnectionInterface $con = null)
    {
        /** @var ChildPointUse[] $pointUsesToDelete */
        $pointUsesToDelete = $this->getPointUses(new Criteria(), $con)->diff($pointUses);


        $this->pointUsesScheduledForDeletion = $pointUsesToDelete;

        foreach ($pointUsesToDelete as $pointUseRemoved) {
            $pointUseRemoved->setStore(null);
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
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collPointUses);
    }

    /**
     * Method called to associate a ChildPointUse object to this object
     * through the ChildPointUse foreign key attribute.
     *
     * @param  ChildPointUse $l ChildPointUse
     * @return $this|\Store The current object (for fluent API support)
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
        $pointUse->setStore($this);
    }

    /**
     * @param  ChildPointUse $pointUse The ChildPointUse object to remove.
     * @return $this|ChildStore The current object (for fluent API support)
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
            $pointUse->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related PointUses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPointUse[] List of ChildPointUse objects
     */
    public function getPointUsesJoinPointSystem(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPointUseQuery::create(null, $criteria);
        $query->joinWith('PointSystem', $joinBehavior);

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
     * If this ChildStore is new, it will return
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
                    ->filterByStore($this)
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
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function setRewards(Collection $rewards, ConnectionInterface $con = null)
    {
        /** @var ChildReward[] $rewardsToDelete */
        $rewardsToDelete = $this->getRewards(new Criteria(), $con)->diff($rewards);


        $this->rewardsScheduledForDeletion = $rewardsToDelete;

        foreach ($rewardsToDelete as $rewardRemoved) {
            $rewardRemoved->setStore(null);
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
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collRewards);
    }

    /**
     * Method called to associate a ChildReward object to this object
     * through the ChildReward foreign key attribute.
     *
     * @param  ChildReward $l ChildReward
     * @return $this|\Store The current object (for fluent API support)
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
        $reward->setStore($this);
    }

    /**
     * @param  ChildReward $reward The ChildReward object to remove.
     * @return $this|ChildStore The current object (for fluent API support)
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
            $this->rewardsScheduledForDeletion[]= $reward;
            $reward->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related Rewards from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
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
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related Rewards from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildReward[] List of ChildReward objects
     */
    public function getRewardsJoinPointSystem(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildRewardQuery::create(null, $criteria);
        $query->joinWith('PointSystem', $joinBehavior);

        return $this->getRewards($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related Rewards from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
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
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related Rewards from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aStoreCategory) {
            $this->aStoreCategory->removeStore($this);
        }
        $this->store_id = null;
        $this->store_name = null;
        $this->store_category_id = null;
        $this->description = null;
        $this->is_major = null;
        $this->allocation = null;
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
            if ($this->collDiscountss) {
                foreach ($this->collDiscountss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMapPersonaStores) {
                foreach ($this->collMapPersonaStores as $o) {
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
        } // if ($deep)

        $this->collDiscountss = null;
        $this->collMapPersonaStores = null;
        $this->collPointAcquisitions = null;
        $this->collPointUses = null;
        $this->collRewards = null;
        $this->aStoreCategory = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(StoreTableMap::DEFAULT_STRING_FORMAT);
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
