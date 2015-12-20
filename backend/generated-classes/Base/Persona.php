<?php

namespace Base;

use \MapPersonaFeatureConstraint as ChildMapPersonaFeatureConstraint;
use \MapPersonaFeatureConstraintQuery as ChildMapPersonaFeatureConstraintQuery;
use \MapPersonaScene as ChildMapPersonaScene;
use \MapPersonaSceneQuery as ChildMapPersonaSceneQuery;
use \MapPersonaStore as ChildMapPersonaStore;
use \MapPersonaStoreQuery as ChildMapPersonaStoreQuery;
use \Persona as ChildPersona;
use \PersonaQuery as ChildPersonaQuery;
use \PersonaRestriction as ChildPersonaRestriction;
use \PersonaRestrictionQuery as ChildPersonaRestrictionQuery;
use \RewardCategory as ChildRewardCategory;
use \RewardCategoryQuery as ChildRewardCategoryQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\PersonaTableMap;
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
 * Base class that represents a row from the 'persona' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Persona implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PersonaTableMap';


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
     * The value for the persona_id field.
     * @var        int
     */
    protected $persona_id;

    /**
     * The value for the identifier field.
     * @var        string
     */
    protected $identifier;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the default_spend field.
     * Note: this column has a database default value of: 100000
     * @var        int
     */
    protected $default_spend;

    /**
     * The value for the sorting field.
     * @var        string
     */
    protected $sorting;

    /**
     * The value for the reward_category_id field.
     * @var        int
     */
    protected $reward_category_id;

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
     * @var        ObjectCollection|ChildMapPersonaFeatureConstraint[] Collection to store aggregation of ChildMapPersonaFeatureConstraint objects.
     */
    protected $collMapPersonaFeatureConstraints;
    protected $collMapPersonaFeatureConstraintsPartial;

    /**
     * @var        ObjectCollection|ChildMapPersonaScene[] Collection to store aggregation of ChildMapPersonaScene objects.
     */
    protected $collMapPersonaScenes;
    protected $collMapPersonaScenesPartial;

    /**
     * @var        ObjectCollection|ChildMapPersonaStore[] Collection to store aggregation of ChildMapPersonaStore objects.
     */
    protected $collMapPersonaStores;
    protected $collMapPersonaStoresPartial;

    /**
     * @var        ObjectCollection|ChildPersonaRestriction[] Collection to store aggregation of ChildPersonaRestriction objects.
     */
    protected $collPersonaRestrictions;
    protected $collPersonaRestrictionsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMapPersonaFeatureConstraint[]
     */
    protected $mapPersonaFeatureConstraintsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMapPersonaScene[]
     */
    protected $mapPersonaScenesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMapPersonaStore[]
     */
    protected $mapPersonaStoresScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPersonaRestriction[]
     */
    protected $personaRestrictionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->default_spend = 100000;
    }

    /**
     * Initializes internal state of Base\Persona object.
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
     * Compares this with another <code>Persona</code> instance.  If
     * <code>obj</code> is an instance of <code>Persona</code>, delegates to
     * <code>equals(Persona)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Persona The current object, for fluid interface
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
     * Get the [persona_id] column value.
     *
     * @return int
     */
    public function getPersonaId()
    {
        return $this->persona_id;
    }

    /**
     * Get the [identifier] column value.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
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
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [default_spend] column value.
     *
     * @return int
     */
    public function getDefaultSpend()
    {
        return $this->default_spend;
    }

    /**
     * Get the [sorting] column value.
     *
     * @return string
     */
    public function getSorting()
    {
        return $this->sorting;
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
     * Set the value of [persona_id] column.
     *
     * @param  int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersonaId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->persona_id !== $v) {
            $this->persona_id = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERSONA_ID] = true;
        }

        return $this;
    } // setPersonaId()

    /**
     * Set the value of [identifier] column.
     *
     * @param  string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setIdentifier($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->identifier !== $v) {
            $this->identifier = $v;
            $this->modifiedColumns[PersonaTableMap::COL_IDENTIFIER] = true;
        }

        return $this;
    } // setIdentifier()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[PersonaTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param  string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[PersonaTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [default_spend] column.
     *
     * @param  int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setDefaultSpend($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->default_spend !== $v) {
            $this->default_spend = $v;
            $this->modifiedColumns[PersonaTableMap::COL_DEFAULT_SPEND] = true;
        }

        return $this;
    } // setDefaultSpend()

    /**
     * Set the value of [sorting] column.
     *
     * @param  string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setSorting($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sorting !== $v) {
            $this->sorting = $v;
            $this->modifiedColumns[PersonaTableMap::COL_SORTING] = true;
        }

        return $this;
    } // setSorting()

    /**
     * Set the value of [reward_category_id] column.
     *
     * @param  int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setRewardCategoryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reward_category_id !== $v) {
            $this->reward_category_id = $v;
            $this->modifiedColumns[PersonaTableMap::COL_REWARD_CATEGORY_ID] = true;
        }

        if ($this->aRewardCategory !== null && $this->aRewardCategory->getRewardCategoryId() !== $v) {
            $this->aRewardCategory = null;
        }

        return $this;
    } // setRewardCategoryId()

    /**
     * Sets the value of [update_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setUpdateTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_time !== null || $dt !== null) {
            if ($dt !== $this->update_time) {
                $this->update_time = $dt;
                $this->modifiedColumns[PersonaTableMap::COL_UPDATE_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateTime()

    /**
     * Set the value of [update_user] column.
     *
     * @param  string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setUpdateUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->update_user !== $v) {
            $this->update_user = $v;
            $this->modifiedColumns[PersonaTableMap::COL_UPDATE_USER] = true;
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
            if ($this->default_spend !== 100000) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PersonaTableMap::translateFieldName('PersonaId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->persona_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PersonaTableMap::translateFieldName('Identifier', TableMap::TYPE_PHPNAME, $indexType)];
            $this->identifier = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PersonaTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PersonaTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PersonaTableMap::translateFieldName('DefaultSpend', TableMap::TYPE_PHPNAME, $indexType)];
            $this->default_spend = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PersonaTableMap::translateFieldName('Sorting', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sorting = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PersonaTableMap::translateFieldName('RewardCategoryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reward_category_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PersonaTableMap::translateFieldName('UpdateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PersonaTableMap::translateFieldName('UpdateUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->update_user = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = PersonaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Persona'), 0, $e);
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
        if ($this->aRewardCategory !== null && $this->reward_category_id !== $this->aRewardCategory->getRewardCategoryId()) {
            $this->aRewardCategory = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(PersonaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPersonaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRewardCategory = null;
            $this->collMapPersonaFeatureConstraints = null;

            $this->collMapPersonaScenes = null;

            $this->collMapPersonaStores = null;

            $this->collPersonaRestrictions = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Persona::setDeleted()
     * @see Persona::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPersonaQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
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
                PersonaTableMap::addInstanceToPool($this);
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

            if ($this->mapPersonaFeatureConstraintsScheduledForDeletion !== null) {
                if (!$this->mapPersonaFeatureConstraintsScheduledForDeletion->isEmpty()) {
                    \MapPersonaFeatureConstraintQuery::create()
                        ->filterByPrimaryKeys($this->mapPersonaFeatureConstraintsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mapPersonaFeatureConstraintsScheduledForDeletion = null;
                }
            }

            if ($this->collMapPersonaFeatureConstraints !== null) {
                foreach ($this->collMapPersonaFeatureConstraints as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mapPersonaScenesScheduledForDeletion !== null) {
                if (!$this->mapPersonaScenesScheduledForDeletion->isEmpty()) {
                    \MapPersonaSceneQuery::create()
                        ->filterByPrimaryKeys($this->mapPersonaScenesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mapPersonaScenesScheduledForDeletion = null;
                }
            }

            if ($this->collMapPersonaScenes !== null) {
                foreach ($this->collMapPersonaScenes as $referrerFK) {
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

            if ($this->personaRestrictionsScheduledForDeletion !== null) {
                if (!$this->personaRestrictionsScheduledForDeletion->isEmpty()) {
                    \PersonaRestrictionQuery::create()
                        ->filterByPrimaryKeys($this->personaRestrictionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->personaRestrictionsScheduledForDeletion = null;
                }
            }

            if ($this->collPersonaRestrictions !== null) {
                foreach ($this->collPersonaRestrictions as $referrerFK) {
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

        $this->modifiedColumns[PersonaTableMap::COL_PERSONA_ID] = true;
        if (null !== $this->persona_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PersonaTableMap::COL_PERSONA_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PersonaTableMap::COL_PERSONA_ID)) {
            $modifiedColumns[':p' . $index++]  = 'persona_id';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_IDENTIFIER)) {
            $modifiedColumns[':p' . $index++]  = 'identifier';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_DEFAULT_SPEND)) {
            $modifiedColumns[':p' . $index++]  = 'default_spend';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_SORTING)) {
            $modifiedColumns[':p' . $index++]  = 'sorting';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_REWARD_CATEGORY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'reward_category_id';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_UPDATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'update_time';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_UPDATE_USER)) {
            $modifiedColumns[':p' . $index++]  = 'update_user';
        }

        $sql = sprintf(
            'INSERT INTO persona (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'persona_id':
                        $stmt->bindValue($identifier, $this->persona_id, PDO::PARAM_INT);
                        break;
                    case 'identifier':
                        $stmt->bindValue($identifier, $this->identifier, PDO::PARAM_STR);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'default_spend':
                        $stmt->bindValue($identifier, $this->default_spend, PDO::PARAM_INT);
                        break;
                    case 'sorting':
                        $stmt->bindValue($identifier, $this->sorting, PDO::PARAM_STR);
                        break;
                    case 'reward_category_id':
                        $stmt->bindValue($identifier, $this->reward_category_id, PDO::PARAM_INT);
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
        $this->setPersonaId($pk);

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
        $pos = PersonaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPersonaId();
                break;
            case 1:
                return $this->getIdentifier();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getDefaultSpend();
                break;
            case 5:
                return $this->getSorting();
                break;
            case 6:
                return $this->getRewardCategoryId();
                break;
            case 7:
                return $this->getUpdateTime();
                break;
            case 8:
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

        if (isset($alreadyDumpedObjects['Persona'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Persona'][$this->hashCode()] = true;
        $keys = PersonaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPersonaId(),
            $keys[1] => $this->getIdentifier(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getDefaultSpend(),
            $keys[5] => $this->getSorting(),
            $keys[6] => $this->getRewardCategoryId(),
            $keys[7] => $this->getUpdateTime(),
            $keys[8] => $this->getUpdateUser(),
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
            if (null !== $this->collMapPersonaFeatureConstraints) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'mapPersonaFeatureConstraints';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'map_persona_feature_constraints';
                        break;
                    default:
                        $key = 'MapPersonaFeatureConstraints';
                }

                $result[$key] = $this->collMapPersonaFeatureConstraints->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMapPersonaScenes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'mapPersonaScenes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'map_persona_scenes';
                        break;
                    default:
                        $key = 'MapPersonaScenes';
                }

                $result[$key] = $this->collMapPersonaScenes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collPersonaRestrictions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'personaRestrictions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'persona_restrictions';
                        break;
                    default:
                        $key = 'PersonaRestrictions';
                }

                $result[$key] = $this->collPersonaRestrictions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Persona
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PersonaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Persona
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPersonaId($value);
                break;
            case 1:
                $this->setIdentifier($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setDefaultSpend($value);
                break;
            case 5:
                $this->setSorting($value);
                break;
            case 6:
                $this->setRewardCategoryId($value);
                break;
            case 7:
                $this->setUpdateTime($value);
                break;
            case 8:
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
        $keys = PersonaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPersonaId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdentifier($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setName($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescription($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDefaultSpend($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSorting($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRewardCategoryId($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setUpdateTime($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setUpdateUser($arr[$keys[8]]);
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
     * @return $this|\Persona The current object, for fluid interface
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
        $criteria = new Criteria(PersonaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PersonaTableMap::COL_PERSONA_ID)) {
            $criteria->add(PersonaTableMap::COL_PERSONA_ID, $this->persona_id);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_IDENTIFIER)) {
            $criteria->add(PersonaTableMap::COL_IDENTIFIER, $this->identifier);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_NAME)) {
            $criteria->add(PersonaTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_DESCRIPTION)) {
            $criteria->add(PersonaTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_DEFAULT_SPEND)) {
            $criteria->add(PersonaTableMap::COL_DEFAULT_SPEND, $this->default_spend);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_SORTING)) {
            $criteria->add(PersonaTableMap::COL_SORTING, $this->sorting);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_REWARD_CATEGORY_ID)) {
            $criteria->add(PersonaTableMap::COL_REWARD_CATEGORY_ID, $this->reward_category_id);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_UPDATE_TIME)) {
            $criteria->add(PersonaTableMap::COL_UPDATE_TIME, $this->update_time);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_UPDATE_USER)) {
            $criteria->add(PersonaTableMap::COL_UPDATE_USER, $this->update_user);
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
        $criteria = ChildPersonaQuery::create();
        $criteria->add(PersonaTableMap::COL_PERSONA_ID, $this->persona_id);

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
        $validPk = null !== $this->getPersonaId();

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
        return $this->getPersonaId();
    }

    /**
     * Generic method to set the primary key (persona_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPersonaId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPersonaId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Persona (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdentifier($this->getIdentifier());
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setDefaultSpend($this->getDefaultSpend());
        $copyObj->setSorting($this->getSorting());
        $copyObj->setRewardCategoryId($this->getRewardCategoryId());
        $copyObj->setUpdateTime($this->getUpdateTime());
        $copyObj->setUpdateUser($this->getUpdateUser());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getMapPersonaFeatureConstraints() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMapPersonaFeatureConstraint($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMapPersonaScenes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMapPersonaScene($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMapPersonaStores() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMapPersonaStore($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonaRestrictions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonaRestriction($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPersonaId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Persona Clone of current object.
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
     * @return $this|\Persona The current object (for fluent API support)
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
            $v->addPersona($this);
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
                $this->aRewardCategory->addPersonas($this);
             */
        }

        return $this->aRewardCategory;
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
        if ('MapPersonaFeatureConstraint' == $relationName) {
            return $this->initMapPersonaFeatureConstraints();
        }
        if ('MapPersonaScene' == $relationName) {
            return $this->initMapPersonaScenes();
        }
        if ('MapPersonaStore' == $relationName) {
            return $this->initMapPersonaStores();
        }
        if ('PersonaRestriction' == $relationName) {
            return $this->initPersonaRestrictions();
        }
    }

    /**
     * Clears out the collMapPersonaFeatureConstraints collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMapPersonaFeatureConstraints()
     */
    public function clearMapPersonaFeatureConstraints()
    {
        $this->collMapPersonaFeatureConstraints = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMapPersonaFeatureConstraints collection loaded partially.
     */
    public function resetPartialMapPersonaFeatureConstraints($v = true)
    {
        $this->collMapPersonaFeatureConstraintsPartial = $v;
    }

    /**
     * Initializes the collMapPersonaFeatureConstraints collection.
     *
     * By default this just sets the collMapPersonaFeatureConstraints collection to an empty array (like clearcollMapPersonaFeatureConstraints());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMapPersonaFeatureConstraints($overrideExisting = true)
    {
        if (null !== $this->collMapPersonaFeatureConstraints && !$overrideExisting) {
            return;
        }
        $this->collMapPersonaFeatureConstraints = new ObjectCollection();
        $this->collMapPersonaFeatureConstraints->setModel('\MapPersonaFeatureConstraint');
    }

    /**
     * Gets an array of ChildMapPersonaFeatureConstraint objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersona is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMapPersonaFeatureConstraint[] List of ChildMapPersonaFeatureConstraint objects
     * @throws PropelException
     */
    public function getMapPersonaFeatureConstraints(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMapPersonaFeatureConstraintsPartial && !$this->isNew();
        if (null === $this->collMapPersonaFeatureConstraints || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMapPersonaFeatureConstraints) {
                // return empty collection
                $this->initMapPersonaFeatureConstraints();
            } else {
                $collMapPersonaFeatureConstraints = ChildMapPersonaFeatureConstraintQuery::create(null, $criteria)
                    ->filterByPersona($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMapPersonaFeatureConstraintsPartial && count($collMapPersonaFeatureConstraints)) {
                        $this->initMapPersonaFeatureConstraints(false);

                        foreach ($collMapPersonaFeatureConstraints as $obj) {
                            if (false == $this->collMapPersonaFeatureConstraints->contains($obj)) {
                                $this->collMapPersonaFeatureConstraints->append($obj);
                            }
                        }

                        $this->collMapPersonaFeatureConstraintsPartial = true;
                    }

                    return $collMapPersonaFeatureConstraints;
                }

                if ($partial && $this->collMapPersonaFeatureConstraints) {
                    foreach ($this->collMapPersonaFeatureConstraints as $obj) {
                        if ($obj->isNew()) {
                            $collMapPersonaFeatureConstraints[] = $obj;
                        }
                    }
                }

                $this->collMapPersonaFeatureConstraints = $collMapPersonaFeatureConstraints;
                $this->collMapPersonaFeatureConstraintsPartial = false;
            }
        }

        return $this->collMapPersonaFeatureConstraints;
    }

    /**
     * Sets a collection of ChildMapPersonaFeatureConstraint objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $mapPersonaFeatureConstraints A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersona The current object (for fluent API support)
     */
    public function setMapPersonaFeatureConstraints(Collection $mapPersonaFeatureConstraints, ConnectionInterface $con = null)
    {
        /** @var ChildMapPersonaFeatureConstraint[] $mapPersonaFeatureConstraintsToDelete */
        $mapPersonaFeatureConstraintsToDelete = $this->getMapPersonaFeatureConstraints(new Criteria(), $con)->diff($mapPersonaFeatureConstraints);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->mapPersonaFeatureConstraintsScheduledForDeletion = clone $mapPersonaFeatureConstraintsToDelete;

        foreach ($mapPersonaFeatureConstraintsToDelete as $mapPersonaFeatureConstraintRemoved) {
            $mapPersonaFeatureConstraintRemoved->setPersona(null);
        }

        $this->collMapPersonaFeatureConstraints = null;
        foreach ($mapPersonaFeatureConstraints as $mapPersonaFeatureConstraint) {
            $this->addMapPersonaFeatureConstraint($mapPersonaFeatureConstraint);
        }

        $this->collMapPersonaFeatureConstraints = $mapPersonaFeatureConstraints;
        $this->collMapPersonaFeatureConstraintsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MapPersonaFeatureConstraint objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MapPersonaFeatureConstraint objects.
     * @throws PropelException
     */
    public function countMapPersonaFeatureConstraints(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMapPersonaFeatureConstraintsPartial && !$this->isNew();
        if (null === $this->collMapPersonaFeatureConstraints || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMapPersonaFeatureConstraints) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMapPersonaFeatureConstraints());
            }

            $query = ChildMapPersonaFeatureConstraintQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collMapPersonaFeatureConstraints);
    }

    /**
     * Method called to associate a ChildMapPersonaFeatureConstraint object to this object
     * through the ChildMapPersonaFeatureConstraint foreign key attribute.
     *
     * @param  ChildMapPersonaFeatureConstraint $l ChildMapPersonaFeatureConstraint
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function addMapPersonaFeatureConstraint(ChildMapPersonaFeatureConstraint $l)
    {
        if ($this->collMapPersonaFeatureConstraints === null) {
            $this->initMapPersonaFeatureConstraints();
            $this->collMapPersonaFeatureConstraintsPartial = true;
        }

        if (!$this->collMapPersonaFeatureConstraints->contains($l)) {
            $this->doAddMapPersonaFeatureConstraint($l);
        }

        return $this;
    }

    /**
     * @param ChildMapPersonaFeatureConstraint $mapPersonaFeatureConstraint The ChildMapPersonaFeatureConstraint object to add.
     */
    protected function doAddMapPersonaFeatureConstraint(ChildMapPersonaFeatureConstraint $mapPersonaFeatureConstraint)
    {
        $this->collMapPersonaFeatureConstraints[]= $mapPersonaFeatureConstraint;
        $mapPersonaFeatureConstraint->setPersona($this);
    }

    /**
     * @param  ChildMapPersonaFeatureConstraint $mapPersonaFeatureConstraint The ChildMapPersonaFeatureConstraint object to remove.
     * @return $this|ChildPersona The current object (for fluent API support)
     */
    public function removeMapPersonaFeatureConstraint(ChildMapPersonaFeatureConstraint $mapPersonaFeatureConstraint)
    {
        if ($this->getMapPersonaFeatureConstraints()->contains($mapPersonaFeatureConstraint)) {
            $pos = $this->collMapPersonaFeatureConstraints->search($mapPersonaFeatureConstraint);
            $this->collMapPersonaFeatureConstraints->remove($pos);
            if (null === $this->mapPersonaFeatureConstraintsScheduledForDeletion) {
                $this->mapPersonaFeatureConstraintsScheduledForDeletion = clone $this->collMapPersonaFeatureConstraints;
                $this->mapPersonaFeatureConstraintsScheduledForDeletion->clear();
            }
            $this->mapPersonaFeatureConstraintsScheduledForDeletion[]= clone $mapPersonaFeatureConstraint;
            $mapPersonaFeatureConstraint->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related MapPersonaFeatureConstraints from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMapPersonaFeatureConstraint[] List of ChildMapPersonaFeatureConstraint objects
     */
    public function getMapPersonaFeatureConstraintsJoinCardFeatureType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMapPersonaFeatureConstraintQuery::create(null, $criteria);
        $query->joinWith('CardFeatureType', $joinBehavior);

        return $this->getMapPersonaFeatureConstraints($query, $con);
    }

    /**
     * Clears out the collMapPersonaScenes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMapPersonaScenes()
     */
    public function clearMapPersonaScenes()
    {
        $this->collMapPersonaScenes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMapPersonaScenes collection loaded partially.
     */
    public function resetPartialMapPersonaScenes($v = true)
    {
        $this->collMapPersonaScenesPartial = $v;
    }

    /**
     * Initializes the collMapPersonaScenes collection.
     *
     * By default this just sets the collMapPersonaScenes collection to an empty array (like clearcollMapPersonaScenes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMapPersonaScenes($overrideExisting = true)
    {
        if (null !== $this->collMapPersonaScenes && !$overrideExisting) {
            return;
        }
        $this->collMapPersonaScenes = new ObjectCollection();
        $this->collMapPersonaScenes->setModel('\MapPersonaScene');
    }

    /**
     * Gets an array of ChildMapPersonaScene objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersona is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMapPersonaScene[] List of ChildMapPersonaScene objects
     * @throws PropelException
     */
    public function getMapPersonaScenes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMapPersonaScenesPartial && !$this->isNew();
        if (null === $this->collMapPersonaScenes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMapPersonaScenes) {
                // return empty collection
                $this->initMapPersonaScenes();
            } else {
                $collMapPersonaScenes = ChildMapPersonaSceneQuery::create(null, $criteria)
                    ->filterByPersona($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMapPersonaScenesPartial && count($collMapPersonaScenes)) {
                        $this->initMapPersonaScenes(false);

                        foreach ($collMapPersonaScenes as $obj) {
                            if (false == $this->collMapPersonaScenes->contains($obj)) {
                                $this->collMapPersonaScenes->append($obj);
                            }
                        }

                        $this->collMapPersonaScenesPartial = true;
                    }

                    return $collMapPersonaScenes;
                }

                if ($partial && $this->collMapPersonaScenes) {
                    foreach ($this->collMapPersonaScenes as $obj) {
                        if ($obj->isNew()) {
                            $collMapPersonaScenes[] = $obj;
                        }
                    }
                }

                $this->collMapPersonaScenes = $collMapPersonaScenes;
                $this->collMapPersonaScenesPartial = false;
            }
        }

        return $this->collMapPersonaScenes;
    }

    /**
     * Sets a collection of ChildMapPersonaScene objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $mapPersonaScenes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersona The current object (for fluent API support)
     */
    public function setMapPersonaScenes(Collection $mapPersonaScenes, ConnectionInterface $con = null)
    {
        /** @var ChildMapPersonaScene[] $mapPersonaScenesToDelete */
        $mapPersonaScenesToDelete = $this->getMapPersonaScenes(new Criteria(), $con)->diff($mapPersonaScenes);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->mapPersonaScenesScheduledForDeletion = clone $mapPersonaScenesToDelete;

        foreach ($mapPersonaScenesToDelete as $mapPersonaSceneRemoved) {
            $mapPersonaSceneRemoved->setPersona(null);
        }

        $this->collMapPersonaScenes = null;
        foreach ($mapPersonaScenes as $mapPersonaScene) {
            $this->addMapPersonaScene($mapPersonaScene);
        }

        $this->collMapPersonaScenes = $mapPersonaScenes;
        $this->collMapPersonaScenesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MapPersonaScene objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MapPersonaScene objects.
     * @throws PropelException
     */
    public function countMapPersonaScenes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMapPersonaScenesPartial && !$this->isNew();
        if (null === $this->collMapPersonaScenes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMapPersonaScenes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMapPersonaScenes());
            }

            $query = ChildMapPersonaSceneQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collMapPersonaScenes);
    }

    /**
     * Method called to associate a ChildMapPersonaScene object to this object
     * through the ChildMapPersonaScene foreign key attribute.
     *
     * @param  ChildMapPersonaScene $l ChildMapPersonaScene
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function addMapPersonaScene(ChildMapPersonaScene $l)
    {
        if ($this->collMapPersonaScenes === null) {
            $this->initMapPersonaScenes();
            $this->collMapPersonaScenesPartial = true;
        }

        if (!$this->collMapPersonaScenes->contains($l)) {
            $this->doAddMapPersonaScene($l);
        }

        return $this;
    }

    /**
     * @param ChildMapPersonaScene $mapPersonaScene The ChildMapPersonaScene object to add.
     */
    protected function doAddMapPersonaScene(ChildMapPersonaScene $mapPersonaScene)
    {
        $this->collMapPersonaScenes[]= $mapPersonaScene;
        $mapPersonaScene->setPersona($this);
    }

    /**
     * @param  ChildMapPersonaScene $mapPersonaScene The ChildMapPersonaScene object to remove.
     * @return $this|ChildPersona The current object (for fluent API support)
     */
    public function removeMapPersonaScene(ChildMapPersonaScene $mapPersonaScene)
    {
        if ($this->getMapPersonaScenes()->contains($mapPersonaScene)) {
            $pos = $this->collMapPersonaScenes->search($mapPersonaScene);
            $this->collMapPersonaScenes->remove($pos);
            if (null === $this->mapPersonaScenesScheduledForDeletion) {
                $this->mapPersonaScenesScheduledForDeletion = clone $this->collMapPersonaScenes;
                $this->mapPersonaScenesScheduledForDeletion->clear();
            }
            $this->mapPersonaScenesScheduledForDeletion[]= clone $mapPersonaScene;
            $mapPersonaScene->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related MapPersonaScenes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMapPersonaScene[] List of ChildMapPersonaScene objects
     */
    public function getMapPersonaScenesJoinScene(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMapPersonaSceneQuery::create(null, $criteria);
        $query->joinWith('Scene', $joinBehavior);

        return $this->getMapPersonaScenes($query, $con);
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
     * If this ChildPersona is new, it will return
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
                    ->filterByPersona($this)
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
     * @return $this|ChildPersona The current object (for fluent API support)
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
            $mapPersonaStoreRemoved->setPersona(null);
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
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collMapPersonaStores);
    }

    /**
     * Method called to associate a ChildMapPersonaStore object to this object
     * through the ChildMapPersonaStore foreign key attribute.
     *
     * @param  ChildMapPersonaStore $l ChildMapPersonaStore
     * @return $this|\Persona The current object (for fluent API support)
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
        $mapPersonaStore->setPersona($this);
    }

    /**
     * @param  ChildMapPersonaStore $mapPersonaStore The ChildMapPersonaStore object to remove.
     * @return $this|ChildPersona The current object (for fluent API support)
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
            $mapPersonaStore->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related MapPersonaStores from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMapPersonaStore[] List of ChildMapPersonaStore objects
     */
    public function getMapPersonaStoresJoinStore(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMapPersonaStoreQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getMapPersonaStores($query, $con);
    }

    /**
     * Clears out the collPersonaRestrictions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPersonaRestrictions()
     */
    public function clearPersonaRestrictions()
    {
        $this->collPersonaRestrictions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPersonaRestrictions collection loaded partially.
     */
    public function resetPartialPersonaRestrictions($v = true)
    {
        $this->collPersonaRestrictionsPartial = $v;
    }

    /**
     * Initializes the collPersonaRestrictions collection.
     *
     * By default this just sets the collPersonaRestrictions collection to an empty array (like clearcollPersonaRestrictions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonaRestrictions($overrideExisting = true)
    {
        if (null !== $this->collPersonaRestrictions && !$overrideExisting) {
            return;
        }
        $this->collPersonaRestrictions = new ObjectCollection();
        $this->collPersonaRestrictions->setModel('\PersonaRestriction');
    }

    /**
     * Gets an array of ChildPersonaRestriction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersona is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPersonaRestriction[] List of ChildPersonaRestriction objects
     * @throws PropelException
     */
    public function getPersonaRestrictions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPersonaRestrictionsPartial && !$this->isNew();
        if (null === $this->collPersonaRestrictions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonaRestrictions) {
                // return empty collection
                $this->initPersonaRestrictions();
            } else {
                $collPersonaRestrictions = ChildPersonaRestrictionQuery::create(null, $criteria)
                    ->filterByPersona($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPersonaRestrictionsPartial && count($collPersonaRestrictions)) {
                        $this->initPersonaRestrictions(false);

                        foreach ($collPersonaRestrictions as $obj) {
                            if (false == $this->collPersonaRestrictions->contains($obj)) {
                                $this->collPersonaRestrictions->append($obj);
                            }
                        }

                        $this->collPersonaRestrictionsPartial = true;
                    }

                    return $collPersonaRestrictions;
                }

                if ($partial && $this->collPersonaRestrictions) {
                    foreach ($this->collPersonaRestrictions as $obj) {
                        if ($obj->isNew()) {
                            $collPersonaRestrictions[] = $obj;
                        }
                    }
                }

                $this->collPersonaRestrictions = $collPersonaRestrictions;
                $this->collPersonaRestrictionsPartial = false;
            }
        }

        return $this->collPersonaRestrictions;
    }

    /**
     * Sets a collection of ChildPersonaRestriction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $personaRestrictions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersona The current object (for fluent API support)
     */
    public function setPersonaRestrictions(Collection $personaRestrictions, ConnectionInterface $con = null)
    {
        /** @var ChildPersonaRestriction[] $personaRestrictionsToDelete */
        $personaRestrictionsToDelete = $this->getPersonaRestrictions(new Criteria(), $con)->diff($personaRestrictions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->personaRestrictionsScheduledForDeletion = clone $personaRestrictionsToDelete;

        foreach ($personaRestrictionsToDelete as $personaRestrictionRemoved) {
            $personaRestrictionRemoved->setPersona(null);
        }

        $this->collPersonaRestrictions = null;
        foreach ($personaRestrictions as $personaRestriction) {
            $this->addPersonaRestriction($personaRestriction);
        }

        $this->collPersonaRestrictions = $personaRestrictions;
        $this->collPersonaRestrictionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PersonaRestriction objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PersonaRestriction objects.
     * @throws PropelException
     */
    public function countPersonaRestrictions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPersonaRestrictionsPartial && !$this->isNew();
        if (null === $this->collPersonaRestrictions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonaRestrictions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPersonaRestrictions());
            }

            $query = ChildPersonaRestrictionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collPersonaRestrictions);
    }

    /**
     * Method called to associate a ChildPersonaRestriction object to this object
     * through the ChildPersonaRestriction foreign key attribute.
     *
     * @param  ChildPersonaRestriction $l ChildPersonaRestriction
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function addPersonaRestriction(ChildPersonaRestriction $l)
    {
        if ($this->collPersonaRestrictions === null) {
            $this->initPersonaRestrictions();
            $this->collPersonaRestrictionsPartial = true;
        }

        if (!$this->collPersonaRestrictions->contains($l)) {
            $this->doAddPersonaRestriction($l);
        }

        return $this;
    }

    /**
     * @param ChildPersonaRestriction $personaRestriction The ChildPersonaRestriction object to add.
     */
    protected function doAddPersonaRestriction(ChildPersonaRestriction $personaRestriction)
    {
        $this->collPersonaRestrictions[]= $personaRestriction;
        $personaRestriction->setPersona($this);
    }

    /**
     * @param  ChildPersonaRestriction $personaRestriction The ChildPersonaRestriction object to remove.
     * @return $this|ChildPersona The current object (for fluent API support)
     */
    public function removePersonaRestriction(ChildPersonaRestriction $personaRestriction)
    {
        if ($this->getPersonaRestrictions()->contains($personaRestriction)) {
            $pos = $this->collPersonaRestrictions->search($personaRestriction);
            $this->collPersonaRestrictions->remove($pos);
            if (null === $this->personaRestrictionsScheduledForDeletion) {
                $this->personaRestrictionsScheduledForDeletion = clone $this->collPersonaRestrictions;
                $this->personaRestrictionsScheduledForDeletion->clear();
            }
            $this->personaRestrictionsScheduledForDeletion[]= clone $personaRestriction;
            $personaRestriction->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related PersonaRestrictions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPersonaRestriction[] List of ChildPersonaRestriction objects
     */
    public function getPersonaRestrictionsJoinRestrictionType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPersonaRestrictionQuery::create(null, $criteria);
        $query->joinWith('RestrictionType', $joinBehavior);

        return $this->getPersonaRestrictions($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aRewardCategory) {
            $this->aRewardCategory->removePersona($this);
        }
        $this->persona_id = null;
        $this->identifier = null;
        $this->name = null;
        $this->description = null;
        $this->default_spend = null;
        $this->sorting = null;
        $this->reward_category_id = null;
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
            if ($this->collMapPersonaFeatureConstraints) {
                foreach ($this->collMapPersonaFeatureConstraints as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMapPersonaScenes) {
                foreach ($this->collMapPersonaScenes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMapPersonaStores) {
                foreach ($this->collMapPersonaStores as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonaRestrictions) {
                foreach ($this->collPersonaRestrictions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collMapPersonaFeatureConstraints = null;
        $this->collMapPersonaScenes = null;
        $this->collMapPersonaStores = null;
        $this->collPersonaRestrictions = null;
        $this->aRewardCategory = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PersonaTableMap::DEFAULT_STRING_FORMAT);
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
