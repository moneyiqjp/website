<?php

namespace Base;

use \CardFeatureType as ChildCardFeatureType;
use \CardFeatureTypeQuery as ChildCardFeatureTypeQuery;
use \CardFeaturesQuery as ChildCardFeaturesQuery;
use \CreditCard as ChildCreditCard;
use \CreditCardQuery as ChildCreditCardQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\CardFeaturesTableMap;
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
 * Base class that represents a row from the 'card_features' table.
 *
 * 
 *
* @package    propel.generator..Base
*/
abstract class CardFeatures implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CardFeaturesTableMap';


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
     * The value for the feature_id field.
     * @var        int
     */
    protected $feature_id;

    /**
     * The value for the feature_type_id field.
     * @var        int
     */
    protected $feature_type_id;

    /**
     * The value for the credit_card_id field.
     * @var        int
     */
    protected $credit_card_id;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the issuing_fee field.
     * @var        int
     */
    protected $issuing_fee;

    /**
     * The value for the ongoing_fee field.
     * @var        int
     */
    protected $ongoing_fee;

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
     * @var        ChildCreditCard
     */
    protected $aCreditCard;

    /**
     * @var        ChildCardFeatureType
     */
    protected $aCardFeatureType;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\CardFeatures object.
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
     * Compares this with another <code>CardFeatures</code> instance.  If
     * <code>obj</code> is an instance of <code>CardFeatures</code>, delegates to
     * <code>equals(CardFeatures)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|CardFeatures The current object, for fluid interface
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
     * Get the [feature_id] column value.
     * 
     * @return int
     */
    public function getFeatureId()
    {
        return $this->feature_id;
    }

    /**
     * Get the [feature_type_id] column value.
     * 
     * @return int
     */
    public function getFeatureTypeId()
    {
        return $this->feature_type_id;
    }

    /**
     * Get the [credit_card_id] column value.
     * 
     * @return int
     */
    public function getCreditCardId()
    {
        return $this->credit_card_id;
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
     * Get the [issuing_fee] column value.
     * 
     * @return int
     */
    public function getIssuingFee()
    {
        return $this->issuing_fee;
    }

    /**
     * Get the [ongoing_fee] column value.
     * 
     * @return int
     */
    public function getOngoingFee()
    {
        return $this->ongoing_fee;
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
     * Set the value of [feature_id] column.
     * 
     * @param  int $v new value
     * @return $this|\CardFeatures The current object (for fluent API support)
     */
    public function setFeatureId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->feature_id !== $v) {
            $this->feature_id = $v;
            $this->modifiedColumns[CardFeaturesTableMap::COL_FEATURE_ID] = true;
        }

        return $this;
    } // setFeatureId()

    /**
     * Set the value of [feature_type_id] column.
     * 
     * @param  int $v new value
     * @return $this|\CardFeatures The current object (for fluent API support)
     */
    public function setFeatureTypeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->feature_type_id !== $v) {
            $this->feature_type_id = $v;
            $this->modifiedColumns[CardFeaturesTableMap::COL_FEATURE_TYPE_ID] = true;
        }

        if ($this->aCardFeatureType !== null && $this->aCardFeatureType->getFeatureTypeId() !== $v) {
            $this->aCardFeatureType = null;
        }

        return $this;
    } // setFeatureTypeId()

    /**
     * Set the value of [credit_card_id] column.
     * 
     * @param  int $v new value
     * @return $this|\CardFeatures The current object (for fluent API support)
     */
    public function setCreditCardId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->credit_card_id !== $v) {
            $this->credit_card_id = $v;
            $this->modifiedColumns[CardFeaturesTableMap::COL_CREDIT_CARD_ID] = true;
        }

        if ($this->aCreditCard !== null && $this->aCreditCard->getCreditCardId() !== $v) {
            $this->aCreditCard = null;
        }

        return $this;
    } // setCreditCardId()

    /**
     * Set the value of [description] column.
     * 
     * @param  string $v new value
     * @return $this|\CardFeatures The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[CardFeaturesTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [issuing_fee] column.
     * 
     * @param  int $v new value
     * @return $this|\CardFeatures The current object (for fluent API support)
     */
    public function setIssuingFee($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->issuing_fee !== $v) {
            $this->issuing_fee = $v;
            $this->modifiedColumns[CardFeaturesTableMap::COL_ISSUING_FEE] = true;
        }

        return $this;
    } // setIssuingFee()

    /**
     * Set the value of [ongoing_fee] column.
     * 
     * @param  int $v new value
     * @return $this|\CardFeatures The current object (for fluent API support)
     */
    public function setOngoingFee($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ongoing_fee !== $v) {
            $this->ongoing_fee = $v;
            $this->modifiedColumns[CardFeaturesTableMap::COL_ONGOING_FEE] = true;
        }

        return $this;
    } // setOngoingFee()

    /**
     * Sets the value of [update_time] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\CardFeatures The current object (for fluent API support)
     */
    public function setUpdateTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_time !== null || $dt !== null) {
            if ($dt !== $this->update_time) {
                $this->update_time = $dt;
                $this->modifiedColumns[CardFeaturesTableMap::COL_UPDATE_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateTime()

    /**
     * Set the value of [update_user] column.
     * 
     * @param  string $v new value
     * @return $this|\CardFeatures The current object (for fluent API support)
     */
    public function setUpdateUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->update_user !== $v) {
            $this->update_user = $v;
            $this->modifiedColumns[CardFeaturesTableMap::COL_UPDATE_USER] = true;
        }

        return $this;
    } // setUpdateUser()

    /**
     * Set the value of [reference] column.
     * 
     * @param  string $v new value
     * @return $this|\CardFeatures The current object (for fluent API support)
     */
    public function setReference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reference !== $v) {
            $this->reference = $v;
            $this->modifiedColumns[CardFeaturesTableMap::COL_REFERENCE] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CardFeaturesTableMap::translateFieldName('FeatureId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->feature_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CardFeaturesTableMap::translateFieldName('FeatureTypeId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->feature_type_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CardFeaturesTableMap::translateFieldName('CreditCardId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->credit_card_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CardFeaturesTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CardFeaturesTableMap::translateFieldName('IssuingFee', TableMap::TYPE_PHPNAME, $indexType)];
            $this->issuing_fee = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CardFeaturesTableMap::translateFieldName('OngoingFee', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ongoing_fee = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CardFeaturesTableMap::translateFieldName('UpdateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CardFeaturesTableMap::translateFieldName('UpdateUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->update_user = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CardFeaturesTableMap::translateFieldName('Reference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reference = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = CardFeaturesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CardFeatures'), 0, $e);
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
        if ($this->aCardFeatureType !== null && $this->feature_type_id !== $this->aCardFeatureType->getFeatureTypeId()) {
            $this->aCardFeatureType = null;
        }
        if ($this->aCreditCard !== null && $this->credit_card_id !== $this->aCreditCard->getCreditCardId()) {
            $this->aCreditCard = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(CardFeaturesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCardFeaturesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCreditCard = null;
            $this->aCardFeatureType = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see CardFeatures::setDeleted()
     * @see CardFeatures::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeaturesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCardFeaturesQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeaturesTableMap::DATABASE_NAME);
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
                CardFeaturesTableMap::addInstanceToPool($this);
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

            if ($this->aCreditCard !== null) {
                if ($this->aCreditCard->isModified() || $this->aCreditCard->isNew()) {
                    $affectedRows += $this->aCreditCard->save($con);
                }
                $this->setCreditCard($this->aCreditCard);
            }

            if ($this->aCardFeatureType !== null) {
                if ($this->aCardFeatureType->isModified() || $this->aCardFeatureType->isNew()) {
                    $affectedRows += $this->aCardFeatureType->save($con);
                }
                $this->setCardFeatureType($this->aCardFeatureType);
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

        $this->modifiedColumns[CardFeaturesTableMap::COL_FEATURE_ID] = true;
        if (null !== $this->feature_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CardFeaturesTableMap::COL_FEATURE_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CardFeaturesTableMap::COL_FEATURE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'feature_id';
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_FEATURE_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'feature_type_id';
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_CREDIT_CARD_ID)) {
            $modifiedColumns[':p' . $index++]  = 'credit_card_id';
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_ISSUING_FEE)) {
            $modifiedColumns[':p' . $index++]  = 'issuing_fee';
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_ONGOING_FEE)) {
            $modifiedColumns[':p' . $index++]  = 'ongoing_fee';
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_UPDATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'update_time';
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_UPDATE_USER)) {
            $modifiedColumns[':p' . $index++]  = 'update_user';
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'reference';
        }

        $sql = sprintf(
            'INSERT INTO card_features (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'feature_id':                        
                        $stmt->bindValue($identifier, $this->feature_id, PDO::PARAM_INT);
                        break;
                    case 'feature_type_id':                        
                        $stmt->bindValue($identifier, $this->feature_type_id, PDO::PARAM_INT);
                        break;
                    case 'credit_card_id':                        
                        $stmt->bindValue($identifier, $this->credit_card_id, PDO::PARAM_INT);
                        break;
                    case 'description':                        
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'issuing_fee':                        
                        $stmt->bindValue($identifier, $this->issuing_fee, PDO::PARAM_INT);
                        break;
                    case 'ongoing_fee':                        
                        $stmt->bindValue($identifier, $this->ongoing_fee, PDO::PARAM_INT);
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
        $this->setFeatureId($pk);

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
        $pos = CardFeaturesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getFeatureId();
                break;
            case 1:
                return $this->getFeatureTypeId();
                break;
            case 2:
                return $this->getCreditCardId();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getIssuingFee();
                break;
            case 5:
                return $this->getOngoingFee();
                break;
            case 6:
                return $this->getUpdateTime();
                break;
            case 7:
                return $this->getUpdateUser();
                break;
            case 8:
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

        if (isset($alreadyDumpedObjects['CardFeatures'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CardFeatures'][$this->hashCode()] = true;
        $keys = CardFeaturesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getFeatureId(),
            $keys[1] => $this->getFeatureTypeId(),
            $keys[2] => $this->getCreditCardId(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getIssuingFee(),
            $keys[5] => $this->getOngoingFee(),
            $keys[6] => $this->getUpdateTime(),
            $keys[7] => $this->getUpdateUser(),
            $keys[8] => $this->getReference(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aCreditCard) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'creditCard';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'credit_card';
                        break;
                    default:
                        $key = 'CreditCard';
                }
        
                $result[$key] = $this->aCreditCard->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCardFeatureType) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cardFeatureType';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'card_feature_type';
                        break;
                    default:
                        $key = 'CardFeatureType';
                }
        
                $result[$key] = $this->aCardFeatureType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\CardFeatures
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CardFeaturesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CardFeatures
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setFeatureId($value);
                break;
            case 1:
                $this->setFeatureTypeId($value);
                break;
            case 2:
                $this->setCreditCardId($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setIssuingFee($value);
                break;
            case 5:
                $this->setOngoingFee($value);
                break;
            case 6:
                $this->setUpdateTime($value);
                break;
            case 7:
                $this->setUpdateUser($value);
                break;
            case 8:
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
        $keys = CardFeaturesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setFeatureId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFeatureTypeId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCreditCardId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescription($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIssuingFee($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setOngoingFee($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setUpdateTime($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setUpdateUser($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setReference($arr[$keys[8]]);
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
     * @return $this|\CardFeatures The current object, for fluid interface
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
        $criteria = new Criteria(CardFeaturesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CardFeaturesTableMap::COL_FEATURE_ID)) {
            $criteria->add(CardFeaturesTableMap::COL_FEATURE_ID, $this->feature_id);
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_FEATURE_TYPE_ID)) {
            $criteria->add(CardFeaturesTableMap::COL_FEATURE_TYPE_ID, $this->feature_type_id);
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_CREDIT_CARD_ID)) {
            $criteria->add(CardFeaturesTableMap::COL_CREDIT_CARD_ID, $this->credit_card_id);
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_DESCRIPTION)) {
            $criteria->add(CardFeaturesTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_ISSUING_FEE)) {
            $criteria->add(CardFeaturesTableMap::COL_ISSUING_FEE, $this->issuing_fee);
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_ONGOING_FEE)) {
            $criteria->add(CardFeaturesTableMap::COL_ONGOING_FEE, $this->ongoing_fee);
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_UPDATE_TIME)) {
            $criteria->add(CardFeaturesTableMap::COL_UPDATE_TIME, $this->update_time);
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_UPDATE_USER)) {
            $criteria->add(CardFeaturesTableMap::COL_UPDATE_USER, $this->update_user);
        }
        if ($this->isColumnModified(CardFeaturesTableMap::COL_REFERENCE)) {
            $criteria->add(CardFeaturesTableMap::COL_REFERENCE, $this->reference);
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
        $criteria = ChildCardFeaturesQuery::create();
        $criteria->add(CardFeaturesTableMap::COL_FEATURE_ID, $this->feature_id);

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
        $validPk = null !== $this->getFeatureId();

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
        return $this->getFeatureId();
    }

    /**
     * Generic method to set the primary key (feature_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setFeatureId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getFeatureId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CardFeatures (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFeatureTypeId($this->getFeatureTypeId());
        $copyObj->setCreditCardId($this->getCreditCardId());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setIssuingFee($this->getIssuingFee());
        $copyObj->setOngoingFee($this->getOngoingFee());
        $copyObj->setUpdateTime($this->getUpdateTime());
        $copyObj->setUpdateUser($this->getUpdateUser());
        $copyObj->setReference($this->getReference());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setFeatureId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \CardFeatures Clone of current object.
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
     * Declares an association between this object and a ChildCreditCard object.
     *
     * @param  ChildCreditCard $v
     * @return $this|\CardFeatures The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCreditCard(ChildCreditCard $v = null)
    {
        if ($v === null) {
            $this->setCreditCardId(NULL);
        } else {
            $this->setCreditCardId($v->getCreditCardId());
        }

        $this->aCreditCard = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCreditCard object, it will not be re-added.
        if ($v !== null) {
            $v->addCardFeatures($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCreditCard object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCreditCard The associated ChildCreditCard object.
     * @throws PropelException
     */
    public function getCreditCard(ConnectionInterface $con = null)
    {
        if ($this->aCreditCard === null && ($this->credit_card_id !== null)) {
            $this->aCreditCard = ChildCreditCardQuery::create()->findPk($this->credit_card_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCreditCard->addCardFeaturess($this);
             */
        }

        return $this->aCreditCard;
    }

    /**
     * Declares an association between this object and a ChildCardFeatureType object.
     *
     * @param  ChildCardFeatureType $v
     * @return $this|\CardFeatures The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCardFeatureType(ChildCardFeatureType $v = null)
    {
        if ($v === null) {
            $this->setFeatureTypeId(NULL);
        } else {
            $this->setFeatureTypeId($v->getFeatureTypeId());
        }

        $this->aCardFeatureType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCardFeatureType object, it will not be re-added.
        if ($v !== null) {
            $v->addCardFeatures($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCardFeatureType object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCardFeatureType The associated ChildCardFeatureType object.
     * @throws PropelException
     */
    public function getCardFeatureType(ConnectionInterface $con = null)
    {
        if ($this->aCardFeatureType === null && ($this->feature_type_id !== null)) {
            $this->aCardFeatureType = ChildCardFeatureTypeQuery::create()->findPk($this->feature_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCardFeatureType->addCardFeaturess($this);
             */
        }

        return $this->aCardFeatureType;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCreditCard) {
            $this->aCreditCard->removeCardFeatures($this);
        }
        if (null !== $this->aCardFeatureType) {
            $this->aCardFeatureType->removeCardFeatures($this);
        }
        $this->feature_id = null;
        $this->feature_type_id = null;
        $this->credit_card_id = null;
        $this->description = null;
        $this->issuing_fee = null;
        $this->ongoing_fee = null;
        $this->update_time = null;
        $this->update_user = null;
        $this->reference = null;
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
        } // if ($deep)

        $this->aCreditCard = null;
        $this->aCardFeatureType = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CardFeaturesTableMap::DEFAULT_STRING_FORMAT);
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
