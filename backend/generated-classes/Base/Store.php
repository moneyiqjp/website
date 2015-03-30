<?php

namespace Base;

use \Discounts as ChildDiscounts;
use \DiscountsQuery as ChildDiscountsQuery;
use \PointSystem as ChildPointSystem;
use \PointSystemQuery as ChildPointSystemQuery;
use \PointUsage as ChildPointUsage;
use \PointUsageQuery as ChildPointUsageQuery;
use \Store as ChildStore;
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
     * The value for the category field.
     * @var        string
     */
    protected $category;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

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
     * @var        ObjectCollection|ChildDiscounts[] Collection to store aggregation of ChildDiscounts objects.
     */
    protected $collDiscountss;
    protected $collDiscountssPartial;

    /**
     * @var        ObjectCollection|ChildPointSystem[] Collection to store aggregation of ChildPointSystem objects.
     */
    protected $collPointSystems;
    protected $collPointSystemsPartial;

    /**
     * @var        ObjectCollection|ChildPointUsage[] Collection to store aggregation of ChildPointUsage objects.
     */
    protected $collPointUsages;
    protected $collPointUsagesPartial;

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
     * @var ObjectCollection|ChildPointSystem[]
     */
    protected $pointSystemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPointUsage[]
     */
    protected $pointUsagesScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Store object.
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
     * Get the [category] column value.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
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
     * Set the value of [category] column.
     *
     * @param  string $v new value
     * @return $this|\Store The current object (for fluent API support)
     */
    public function setCategory($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->category !== $v) {
            $this->category = $v;
            $this->modifiedColumns[StoreTableMap::COL_CATEGORY] = true;
        }

        return $this;
    } // setCategory()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : StoreTableMap::translateFieldName('Category', TableMap::TYPE_PHPNAME, $indexType)];
            $this->category = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : StoreTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : StoreTableMap::translateFieldName('UpdateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : StoreTableMap::translateFieldName('UpdateUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->update_user = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = StoreTableMap::NUM_HYDRATE_COLUMNS.

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

            $this->collDiscountss = null;

            $this->collPointSystems = null;

            $this->collPointUsages = null;

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

            if ($this->pointSystemsScheduledForDeletion !== null) {
                if (!$this->pointSystemsScheduledForDeletion->isEmpty()) {
                    \PointSystemQuery::create()
                        ->filterByPrimaryKeys($this->pointSystemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pointSystemsScheduledForDeletion = null;
                }
            }

            if ($this->collPointSystems !== null) {
                foreach ($this->collPointSystems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pointUsagesScheduledForDeletion !== null) {
                if (!$this->pointUsagesScheduledForDeletion->isEmpty()) {
                    \PointUsageQuery::create()
                        ->filterByPrimaryKeys($this->pointUsagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pointUsagesScheduledForDeletion = null;
                }
            }

            if ($this->collPointUsages !== null) {
                foreach ($this->collPointUsages as $referrerFK) {
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
        if ($this->isColumnModified(StoreTableMap::COL_CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = 'category';
        }
        if ($this->isColumnModified(StoreTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
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
                    case 'category':
                        $stmt->bindValue($identifier, $this->category, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
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
                return $this->getCategory();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getUpdateTime();
                break;
            case 5:
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
            $keys[2] => $this->getCategory(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getUpdateTime(),
            $keys[5] => $this->getUpdateUser(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
            if (null !== $this->collPointSystems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'pointSystems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'point_systems';
                        break;
                    default:
                        $key = 'PointSystems';
                }

                $result[$key] = $this->collPointSystems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPointUsages) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'pointUsages';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'point_usages';
                        break;
                    default:
                        $key = 'PointUsages';
                }

                $result[$key] = $this->collPointUsages->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
                $this->setCategory($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setUpdateTime($value);
                break;
            case 5:
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
            $this->setCategory($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescription($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUpdateTime($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setUpdateUser($arr[$keys[5]]);
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
        if ($this->isColumnModified(StoreTableMap::COL_CATEGORY)) {
            $criteria->add(StoreTableMap::COL_CATEGORY, $this->category);
        }
        if ($this->isColumnModified(StoreTableMap::COL_DESCRIPTION)) {
            $criteria->add(StoreTableMap::COL_DESCRIPTION, $this->description);
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
        $copyObj->setCategory($this->getCategory());
        $copyObj->setDescription($this->getDescription());
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

            foreach ($this->getPointSystems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPointSystem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPointUsages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPointUsage($relObj->copy($deepCopy));
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
        if ('PointSystem' == $relationName) {
            return $this->initPointSystems();
        }
        if ('PointUsage' == $relationName) {
            return $this->initPointUsages();
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
     * Clears out the collPointSystems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPointSystems()
     */
    public function clearPointSystems()
    {
        $this->collPointSystems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPointSystems collection loaded partially.
     */
    public function resetPartialPointSystems($v = true)
    {
        $this->collPointSystemsPartial = $v;
    }

    /**
     * Initializes the collPointSystems collection.
     *
     * By default this just sets the collPointSystems collection to an empty array (like clearcollPointSystems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPointSystems($overrideExisting = true)
    {
        if (null !== $this->collPointSystems && !$overrideExisting) {
            return;
        }
        $this->collPointSystems = new ObjectCollection();
        $this->collPointSystems->setModel('\PointSystem');
    }

    /**
     * Gets an array of ChildPointSystem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildStore is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPointSystem[] List of ChildPointSystem objects
     * @throws PropelException
     */
    public function getPointSystems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPointSystemsPartial && !$this->isNew();
        if (null === $this->collPointSystems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPointSystems) {
                // return empty collection
                $this->initPointSystems();
            } else {
                $collPointSystems = ChildPointSystemQuery::create(null, $criteria)
                    ->filterByStore($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPointSystemsPartial && count($collPointSystems)) {
                        $this->initPointSystems(false);

                        foreach ($collPointSystems as $obj) {
                            if (false == $this->collPointSystems->contains($obj)) {
                                $this->collPointSystems->append($obj);
                            }
                        }

                        $this->collPointSystemsPartial = true;
                    }

                    return $collPointSystems;
                }

                if ($partial && $this->collPointSystems) {
                    foreach ($this->collPointSystems as $obj) {
                        if ($obj->isNew()) {
                            $collPointSystems[] = $obj;
                        }
                    }
                }

                $this->collPointSystems = $collPointSystems;
                $this->collPointSystemsPartial = false;
            }
        }

        return $this->collPointSystems;
    }

    /**
     * Sets a collection of ChildPointSystem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $pointSystems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function setPointSystems(Collection $pointSystems, ConnectionInterface $con = null)
    {
        /** @var ChildPointSystem[] $pointSystemsToDelete */
        $pointSystemsToDelete = $this->getPointSystems(new Criteria(), $con)->diff($pointSystems);


        $this->pointSystemsScheduledForDeletion = $pointSystemsToDelete;

        foreach ($pointSystemsToDelete as $pointSystemRemoved) {
            $pointSystemRemoved->setStore(null);
        }

        $this->collPointSystems = null;
        foreach ($pointSystems as $pointSystem) {
            $this->addPointSystem($pointSystem);
        }

        $this->collPointSystems = $pointSystems;
        $this->collPointSystemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PointSystem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PointSystem objects.
     * @throws PropelException
     */
    public function countPointSystems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPointSystemsPartial && !$this->isNew();
        if (null === $this->collPointSystems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPointSystems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPointSystems());
            }

            $query = ChildPointSystemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collPointSystems);
    }

    /**
     * Method called to associate a ChildPointSystem object to this object
     * through the ChildPointSystem foreign key attribute.
     *
     * @param  ChildPointSystem $l ChildPointSystem
     * @return $this|\Store The current object (for fluent API support)
     */
    public function addPointSystem(ChildPointSystem $l)
    {
        if ($this->collPointSystems === null) {
            $this->initPointSystems();
            $this->collPointSystemsPartial = true;
        }

        if (!$this->collPointSystems->contains($l)) {
            $this->doAddPointSystem($l);
        }

        return $this;
    }

    /**
     * @param ChildPointSystem $pointSystem The ChildPointSystem object to add.
     */
    protected function doAddPointSystem(ChildPointSystem $pointSystem)
    {
        $this->collPointSystems[]= $pointSystem;
        $pointSystem->setStore($this);
    }

    /**
     * @param  ChildPointSystem $pointSystem The ChildPointSystem object to remove.
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function removePointSystem(ChildPointSystem $pointSystem)
    {
        if ($this->getPointSystems()->contains($pointSystem)) {
            $pos = $this->collPointSystems->search($pointSystem);
            $this->collPointSystems->remove($pos);
            if (null === $this->pointSystemsScheduledForDeletion) {
                $this->pointSystemsScheduledForDeletion = clone $this->collPointSystems;
                $this->pointSystemsScheduledForDeletion->clear();
            }
            $this->pointSystemsScheduledForDeletion[]= clone $pointSystem;
            $pointSystem->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related PointSystems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPointSystem[] List of ChildPointSystem objects
     */
    public function getPointSystemsJoinCreditCard(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPointSystemQuery::create(null, $criteria);
        $query->joinWith('CreditCard', $joinBehavior);

        return $this->getPointSystems($query, $con);
    }

    /**
     * Clears out the collPointUsages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPointUsages()
     */
    public function clearPointUsages()
    {
        $this->collPointUsages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPointUsages collection loaded partially.
     */
    public function resetPartialPointUsages($v = true)
    {
        $this->collPointUsagesPartial = $v;
    }

    /**
     * Initializes the collPointUsages collection.
     *
     * By default this just sets the collPointUsages collection to an empty array (like clearcollPointUsages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPointUsages($overrideExisting = true)
    {
        if (null !== $this->collPointUsages && !$overrideExisting) {
            return;
        }
        $this->collPointUsages = new ObjectCollection();
        $this->collPointUsages->setModel('\PointUsage');
    }

    /**
     * Gets an array of ChildPointUsage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildStore is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPointUsage[] List of ChildPointUsage objects
     * @throws PropelException
     */
    public function getPointUsages(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPointUsagesPartial && !$this->isNew();
        if (null === $this->collPointUsages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPointUsages) {
                // return empty collection
                $this->initPointUsages();
            } else {
                $collPointUsages = ChildPointUsageQuery::create(null, $criteria)
                    ->filterByStore($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPointUsagesPartial && count($collPointUsages)) {
                        $this->initPointUsages(false);

                        foreach ($collPointUsages as $obj) {
                            if (false == $this->collPointUsages->contains($obj)) {
                                $this->collPointUsages->append($obj);
                            }
                        }

                        $this->collPointUsagesPartial = true;
                    }

                    return $collPointUsages;
                }

                if ($partial && $this->collPointUsages) {
                    foreach ($this->collPointUsages as $obj) {
                        if ($obj->isNew()) {
                            $collPointUsages[] = $obj;
                        }
                    }
                }

                $this->collPointUsages = $collPointUsages;
                $this->collPointUsagesPartial = false;
            }
        }

        return $this->collPointUsages;
    }

    /**
     * Sets a collection of ChildPointUsage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $pointUsages A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function setPointUsages(Collection $pointUsages, ConnectionInterface $con = null)
    {
        /** @var ChildPointUsage[] $pointUsagesToDelete */
        $pointUsagesToDelete = $this->getPointUsages(new Criteria(), $con)->diff($pointUsages);


        $this->pointUsagesScheduledForDeletion = $pointUsagesToDelete;

        foreach ($pointUsagesToDelete as $pointUsageRemoved) {
            $pointUsageRemoved->setStore(null);
        }

        $this->collPointUsages = null;
        foreach ($pointUsages as $pointUsage) {
            $this->addPointUsage($pointUsage);
        }

        $this->collPointUsages = $pointUsages;
        $this->collPointUsagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PointUsage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PointUsage objects.
     * @throws PropelException
     */
    public function countPointUsages(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPointUsagesPartial && !$this->isNew();
        if (null === $this->collPointUsages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPointUsages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPointUsages());
            }

            $query = ChildPointUsageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collPointUsages);
    }

    /**
     * Method called to associate a ChildPointUsage object to this object
     * through the ChildPointUsage foreign key attribute.
     *
     * @param  ChildPointUsage $l ChildPointUsage
     * @return $this|\Store The current object (for fluent API support)
     */
    public function addPointUsage(ChildPointUsage $l)
    {
        if ($this->collPointUsages === null) {
            $this->initPointUsages();
            $this->collPointUsagesPartial = true;
        }

        if (!$this->collPointUsages->contains($l)) {
            $this->doAddPointUsage($l);
        }

        return $this;
    }

    /**
     * @param ChildPointUsage $pointUsage The ChildPointUsage object to add.
     */
    protected function doAddPointUsage(ChildPointUsage $pointUsage)
    {
        $this->collPointUsages[]= $pointUsage;
        $pointUsage->setStore($this);
    }

    /**
     * @param  ChildPointUsage $pointUsage The ChildPointUsage object to remove.
     * @return $this|ChildStore The current object (for fluent API support)
     */
    public function removePointUsage(ChildPointUsage $pointUsage)
    {
        if ($this->getPointUsages()->contains($pointUsage)) {
            $pos = $this->collPointUsages->search($pointUsage);
            $this->collPointUsages->remove($pos);
            if (null === $this->pointUsagesScheduledForDeletion) {
                $this->pointUsagesScheduledForDeletion = clone $this->collPointUsages;
                $this->pointUsagesScheduledForDeletion->clear();
            }
            $this->pointUsagesScheduledForDeletion[]= clone $pointUsage;
            $pointUsage->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Store is new, it will return
     * an empty collection; or if this Store has previously
     * been saved, it will retrieve related PointUsages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Store.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPointUsage[] List of ChildPointUsage objects
     */
    public function getPointUsagesJoinCreditCard(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPointUsageQuery::create(null, $criteria);
        $query->joinWith('CreditCard', $joinBehavior);

        return $this->getPointUsages($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->store_id = null;
        $this->store_name = null;
        $this->category = null;
        $this->description = null;
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
            if ($this->collDiscountss) {
                foreach ($this->collDiscountss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPointSystems) {
                foreach ($this->collPointSystems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPointUsages) {
                foreach ($this->collPointUsages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collDiscountss = null;
        $this->collPointSystems = null;
        $this->collPointUsages = null;
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