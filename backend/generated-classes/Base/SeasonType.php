<?php

namespace Base;

use \MileageType as ChildMileageType;
use \MileageTypeQuery as ChildMileageTypeQuery;
use \Season as ChildSeason;
use \SeasonQuery as ChildSeasonQuery;
use \SeasonType as ChildSeasonType;
use \SeasonTypeQuery as ChildSeasonTypeQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\SeasonTypeTableMap;
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
 * Base class that represents a row from the 'season_type' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class SeasonType implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\SeasonTypeTableMap';


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
     * The value for the season_type_id field.
     * @var        int
     */
    protected $season_type_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

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
     * @var        ObjectCollection|ChildMileageType[] Collection to store aggregation of ChildMileageType objects.
     */
    protected $collMileageTypes;
    protected $collMileageTypesPartial;

    /**
     * @var        ObjectCollection|ChildSeason[] Collection to store aggregation of ChildSeason objects.
     */
    protected $collSeasons;
    protected $collSeasonsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMileageType[]
     */
    protected $mileageTypesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSeason[]
     */
    protected $seasonsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\SeasonType object.
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
     * Compares this with another <code>SeasonType</code> instance.  If
     * <code>obj</code> is an instance of <code>SeasonType</code>, delegates to
     * <code>equals(SeasonType)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SeasonType The current object, for fluid interface
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
     * Get the [season_type_id] column value.
     *
     * @return int
     */
    public function getSeasonTypeId()
    {
        return $this->season_type_id;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Set the value of [season_type_id] column.
     *
     * @param  int $v new value
     * @return $this|\SeasonType The current object (for fluent API support)
     */
    public function setSeasonTypeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->season_type_id !== $v) {
            $this->season_type_id = $v;
            $this->modifiedColumns[SeasonTypeTableMap::COL_SEASON_TYPE_ID] = true;
        }

        return $this;
    } // setSeasonTypeId()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return $this|\SeasonType The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SeasonTypeTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [display] column.
     *
     * @param  string $v new value
     * @return $this|\SeasonType The current object (for fluent API support)
     */
    public function setDisplay($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display !== $v) {
            $this->display = $v;
            $this->modifiedColumns[SeasonTypeTableMap::COL_DISPLAY] = true;
        }

        return $this;
    } // setDisplay()

    /**
     * Sets the value of [update_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\SeasonType The current object (for fluent API support)
     */
    public function setUpdateTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_time !== null || $dt !== null) {
            if ($dt !== $this->update_time) {
                $this->update_time = $dt;
                $this->modifiedColumns[SeasonTypeTableMap::COL_UPDATE_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateTime()

    /**
     * Set the value of [update_user] column.
     *
     * @param  string $v new value
     * @return $this|\SeasonType The current object (for fluent API support)
     */
    public function setUpdateUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->update_user !== $v) {
            $this->update_user = $v;
            $this->modifiedColumns[SeasonTypeTableMap::COL_UPDATE_USER] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SeasonTypeTableMap::translateFieldName('SeasonTypeId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->season_type_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SeasonTypeTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SeasonTypeTableMap::translateFieldName('Display', TableMap::TYPE_PHPNAME, $indexType)];
            $this->display = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SeasonTypeTableMap::translateFieldName('UpdateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SeasonTypeTableMap::translateFieldName('UpdateUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->update_user = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = SeasonTypeTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\SeasonType'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SeasonTypeTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSeasonTypeQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collMileageTypes = null;

            $this->collSeasons = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SeasonType::setDeleted()
     * @see SeasonType::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonTypeTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSeasonTypeQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonTypeTableMap::DATABASE_NAME);
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
                SeasonTypeTableMap::addInstanceToPool($this);
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

            if ($this->mileageTypesScheduledForDeletion !== null) {
                if (!$this->mileageTypesScheduledForDeletion->isEmpty()) {
                    foreach ($this->mileageTypesScheduledForDeletion as $mileageType) {
                        // need to save related object because we set the relation to null
                        $mileageType->save($con);
                    }
                    $this->mileageTypesScheduledForDeletion = null;
                }
            }

            if ($this->collMileageTypes !== null) {
                foreach ($this->collMileageTypes as $referrerFK) {
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

        $this->modifiedColumns[SeasonTypeTableMap::COL_SEASON_TYPE_ID] = true;
        if (null !== $this->season_type_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SeasonTypeTableMap::COL_SEASON_TYPE_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SeasonTypeTableMap::COL_SEASON_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'season_type_id';
        }
        if ($this->isColumnModified(SeasonTypeTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(SeasonTypeTableMap::COL_DISPLAY)) {
            $modifiedColumns[':p' . $index++]  = 'display';
        }
        if ($this->isColumnModified(SeasonTypeTableMap::COL_UPDATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'update_time';
        }
        if ($this->isColumnModified(SeasonTypeTableMap::COL_UPDATE_USER)) {
            $modifiedColumns[':p' . $index++]  = 'update_user';
        }

        $sql = sprintf(
            'INSERT INTO season_type (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'season_type_id':
                        $stmt->bindValue($identifier, $this->season_type_id, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
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
        $this->setSeasonTypeId($pk);

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
        $pos = SeasonTypeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getSeasonTypeId();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getDisplay();
                break;
            case 3:
                return $this->getUpdateTime();
                break;
            case 4:
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

        if (isset($alreadyDumpedObjects['SeasonType'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SeasonType'][$this->hashCode()] = true;
        $keys = SeasonTypeTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSeasonTypeId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getDisplay(),
            $keys[3] => $this->getUpdateTime(),
            $keys[4] => $this->getUpdateUser(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collMileageTypes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'mileageTypes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'mileage_types';
                        break;
                    default:
                        $key = 'MileageTypes';
                }

                $result[$key] = $this->collMileageTypes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\SeasonType
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SeasonTypeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\SeasonType
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSeasonTypeId($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setDisplay($value);
                break;
            case 3:
                $this->setUpdateTime($value);
                break;
            case 4:
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
        $keys = SeasonTypeTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSeasonTypeId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDisplay($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setUpdateTime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUpdateUser($arr[$keys[4]]);
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
     * @return $this|\SeasonType The current object, for fluid interface
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
        $criteria = new Criteria(SeasonTypeTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SeasonTypeTableMap::COL_SEASON_TYPE_ID)) {
            $criteria->add(SeasonTypeTableMap::COL_SEASON_TYPE_ID, $this->season_type_id);
        }
        if ($this->isColumnModified(SeasonTypeTableMap::COL_NAME)) {
            $criteria->add(SeasonTypeTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SeasonTypeTableMap::COL_DISPLAY)) {
            $criteria->add(SeasonTypeTableMap::COL_DISPLAY, $this->display);
        }
        if ($this->isColumnModified(SeasonTypeTableMap::COL_UPDATE_TIME)) {
            $criteria->add(SeasonTypeTableMap::COL_UPDATE_TIME, $this->update_time);
        }
        if ($this->isColumnModified(SeasonTypeTableMap::COL_UPDATE_USER)) {
            $criteria->add(SeasonTypeTableMap::COL_UPDATE_USER, $this->update_user);
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
        $criteria = ChildSeasonTypeQuery::create();
        $criteria->add(SeasonTypeTableMap::COL_SEASON_TYPE_ID, $this->season_type_id);

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
        $validPk = null !== $this->getSeasonTypeId();

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
        return $this->getSeasonTypeId();
    }

    /**
     * Generic method to set the primary key (season_type_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setSeasonTypeId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getSeasonTypeId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \SeasonType (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setDisplay($this->getDisplay());
        $copyObj->setUpdateTime($this->getUpdateTime());
        $copyObj->setUpdateUser($this->getUpdateUser());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getMileageTypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMileageType($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSeasons() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSeason($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setSeasonTypeId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \SeasonType Clone of current object.
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
        if ('MileageType' == $relationName) {
            return $this->initMileageTypes();
        }
        if ('Season' == $relationName) {
            return $this->initSeasons();
        }
    }

    /**
     * Clears out the collMileageTypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMileageTypes()
     */
    public function clearMileageTypes()
    {
        $this->collMileageTypes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMileageTypes collection loaded partially.
     */
    public function resetPartialMileageTypes($v = true)
    {
        $this->collMileageTypesPartial = $v;
    }

    /**
     * Initializes the collMileageTypes collection.
     *
     * By default this just sets the collMileageTypes collection to an empty array (like clearcollMileageTypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMileageTypes($overrideExisting = true)
    {
        if (null !== $this->collMileageTypes && !$overrideExisting) {
            return;
        }
        $this->collMileageTypes = new ObjectCollection();
        $this->collMileageTypes->setModel('\MileageType');
    }

    /**
     * Gets an array of ChildMileageType objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSeasonType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMileageType[] List of ChildMileageType objects
     * @throws PropelException
     */
    public function getMileageTypes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMileageTypesPartial && !$this->isNew();
        if (null === $this->collMileageTypes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMileageTypes) {
                // return empty collection
                $this->initMileageTypes();
            } else {
                $collMileageTypes = ChildMileageTypeQuery::create(null, $criteria)
                    ->filterBySeasonType($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMileageTypesPartial && count($collMileageTypes)) {
                        $this->initMileageTypes(false);

                        foreach ($collMileageTypes as $obj) {
                            if (false == $this->collMileageTypes->contains($obj)) {
                                $this->collMileageTypes->append($obj);
                            }
                        }

                        $this->collMileageTypesPartial = true;
                    }

                    return $collMileageTypes;
                }

                if ($partial && $this->collMileageTypes) {
                    foreach ($this->collMileageTypes as $obj) {
                        if ($obj->isNew()) {
                            $collMileageTypes[] = $obj;
                        }
                    }
                }

                $this->collMileageTypes = $collMileageTypes;
                $this->collMileageTypesPartial = false;
            }
        }

        return $this->collMileageTypes;
    }

    /**
     * Sets a collection of ChildMileageType objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $mileageTypes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSeasonType The current object (for fluent API support)
     */
    public function setMileageTypes(Collection $mileageTypes, ConnectionInterface $con = null)
    {
        /** @var ChildMileageType[] $mileageTypesToDelete */
        $mileageTypesToDelete = $this->getMileageTypes(new Criteria(), $con)->diff($mileageTypes);


        $this->mileageTypesScheduledForDeletion = $mileageTypesToDelete;

        foreach ($mileageTypesToDelete as $mileageTypeRemoved) {
            $mileageTypeRemoved->setSeasonType(null);
        }

        $this->collMileageTypes = null;
        foreach ($mileageTypes as $mileageType) {
            $this->addMileageType($mileageType);
        }

        $this->collMileageTypes = $mileageTypes;
        $this->collMileageTypesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MileageType objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MileageType objects.
     * @throws PropelException
     */
    public function countMileageTypes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMileageTypesPartial && !$this->isNew();
        if (null === $this->collMileageTypes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMileageTypes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMileageTypes());
            }

            $query = ChildMileageTypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySeasonType($this)
                ->count($con);
        }

        return count($this->collMileageTypes);
    }

    /**
     * Method called to associate a ChildMileageType object to this object
     * through the ChildMileageType foreign key attribute.
     *
     * @param  ChildMileageType $l ChildMileageType
     * @return $this|\SeasonType The current object (for fluent API support)
     */
    public function addMileageType(ChildMileageType $l)
    {
        if ($this->collMileageTypes === null) {
            $this->initMileageTypes();
            $this->collMileageTypesPartial = true;
        }

        if (!$this->collMileageTypes->contains($l)) {
            $this->doAddMileageType($l);
        }

        return $this;
    }

    /**
     * @param ChildMileageType $mileageType The ChildMileageType object to add.
     */
    protected function doAddMileageType(ChildMileageType $mileageType)
    {
        $this->collMileageTypes[]= $mileageType;
        $mileageType->setSeasonType($this);
    }

    /**
     * @param  ChildMileageType $mileageType The ChildMileageType object to remove.
     * @return $this|ChildSeasonType The current object (for fluent API support)
     */
    public function removeMileageType(ChildMileageType $mileageType)
    {
        if ($this->getMileageTypes()->contains($mileageType)) {
            $pos = $this->collMileageTypes->search($mileageType);
            $this->collMileageTypes->remove($pos);
            if (null === $this->mileageTypesScheduledForDeletion) {
                $this->mileageTypesScheduledForDeletion = clone $this->collMileageTypes;
                $this->mileageTypesScheduledForDeletion->clear();
            }
            $this->mileageTypesScheduledForDeletion[]= $mileageType;
            $mileageType->setSeasonType(null);
        }

        return $this;
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
     * If this ChildSeasonType is new, it will return
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
                    ->filterBySeasonType($this)
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
     * @return $this|ChildSeasonType The current object (for fluent API support)
     */
    public function setSeasons(Collection $seasons, ConnectionInterface $con = null)
    {
        /** @var ChildSeason[] $seasonsToDelete */
        $seasonsToDelete = $this->getSeasons(new Criteria(), $con)->diff($seasons);


        $this->seasonsScheduledForDeletion = $seasonsToDelete;

        foreach ($seasonsToDelete as $seasonRemoved) {
            $seasonRemoved->setSeasonType(null);
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
                ->filterBySeasonType($this)
                ->count($con);
        }

        return count($this->collSeasons);
    }

    /**
     * Method called to associate a ChildSeason object to this object
     * through the ChildSeason foreign key attribute.
     *
     * @param  ChildSeason $l ChildSeason
     * @return $this|\SeasonType The current object (for fluent API support)
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
        $season->setSeasonType($this);
    }

    /**
     * @param  ChildSeason $season The ChildSeason object to remove.
     * @return $this|ChildSeasonType The current object (for fluent API support)
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
            $season->setSeasonType(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SeasonType is new, it will return
     * an empty collection; or if this SeasonType has previously
     * been saved, it will retrieve related Seasons from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SeasonType.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSeason[] List of ChildSeason objects
     */
    public function getSeasonsJoinPointSystem(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSeasonQuery::create(null, $criteria);
        $query->joinWith('PointSystem', $joinBehavior);

        return $this->getSeasons($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->season_type_id = null;
        $this->name = null;
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
            if ($this->collMileageTypes) {
                foreach ($this->collMileageTypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSeasons) {
                foreach ($this->collSeasons as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collMileageTypes = null;
        $this->collSeasons = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SeasonTypeTableMap::DEFAULT_STRING_FORMAT);
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
