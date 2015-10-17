<?php

namespace Map;

use \FeesHistory;
use \FeesHistoryQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'fees_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FeesHistoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.FeesHistoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'fees_history';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\FeesHistory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'FeesHistory';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the fee_id field
     */
    const COL_FEE_ID = 'fees_history.fee_id';

    /**
     * the column name for the fee_type field
     */
    const COL_FEE_TYPE = 'fees_history.fee_type';

    /**
     * the column name for the fee_amount field
     */
    const COL_FEE_AMOUNT = 'fees_history.fee_amount';

    /**
     * the column name for the yearly_occurrence field
     */
    const COL_YEARLY_OCCURRENCE = 'fees_history.yearly_occurrence';

    /**
     * the column name for the start_year field
     */
    const COL_START_YEAR = 'fees_history.start_year';

    /**
     * the column name for the end_year field
     */
    const COL_END_YEAR = 'fees_history.end_year';

    /**
     * the column name for the credit_card_id field
     */
    const COL_CREDIT_CARD_ID = 'fees_history.credit_card_id';

    /**
     * the column name for the time_beg field
     */
    const COL_TIME_BEG = 'fees_history.time_beg';

    /**
     * the column name for the time_end field
     */
    const COL_TIME_END = 'fees_history.time_end';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'fees_history.update_user';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('FeeId', 'FeeType', 'FeeAmount', 'YearlyOccurrence', 'StartYear', 'EndYear', 'CreditCardId', 'TimeBeg', 'TimeEnd', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('feeId', 'feeType', 'feeAmount', 'yearlyOccurrence', 'startYear', 'endYear', 'creditCardId', 'timeBeg', 'timeEnd', 'updateUser', ),
        self::TYPE_COLNAME       => array(FeesHistoryTableMap::COL_FEE_ID, FeesHistoryTableMap::COL_FEE_TYPE, FeesHistoryTableMap::COL_FEE_AMOUNT, FeesHistoryTableMap::COL_YEARLY_OCCURRENCE, FeesHistoryTableMap::COL_START_YEAR, FeesHistoryTableMap::COL_END_YEAR, FeesHistoryTableMap::COL_CREDIT_CARD_ID, FeesHistoryTableMap::COL_TIME_BEG, FeesHistoryTableMap::COL_TIME_END, FeesHistoryTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('fee_id', 'fee_type', 'fee_amount', 'yearly_occurrence', 'start_year', 'end_year', 'credit_card_id', 'time_beg', 'time_end', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FeeId' => 0, 'FeeType' => 1, 'FeeAmount' => 2, 'YearlyOccurrence' => 3, 'StartYear' => 4, 'EndYear' => 5, 'CreditCardId' => 6, 'TimeBeg' => 7, 'TimeEnd' => 8, 'UpdateUser' => 9, ),
        self::TYPE_CAMELNAME     => array('feeId' => 0, 'feeType' => 1, 'feeAmount' => 2, 'yearlyOccurrence' => 3, 'startYear' => 4, 'endYear' => 5, 'creditCardId' => 6, 'timeBeg' => 7, 'timeEnd' => 8, 'updateUser' => 9, ),
        self::TYPE_COLNAME       => array(FeesHistoryTableMap::COL_FEE_ID => 0, FeesHistoryTableMap::COL_FEE_TYPE => 1, FeesHistoryTableMap::COL_FEE_AMOUNT => 2, FeesHistoryTableMap::COL_YEARLY_OCCURRENCE => 3, FeesHistoryTableMap::COL_START_YEAR => 4, FeesHistoryTableMap::COL_END_YEAR => 5, FeesHistoryTableMap::COL_CREDIT_CARD_ID => 6, FeesHistoryTableMap::COL_TIME_BEG => 7, FeesHistoryTableMap::COL_TIME_END => 8, FeesHistoryTableMap::COL_UPDATE_USER => 9, ),
        self::TYPE_FIELDNAME     => array('fee_id' => 0, 'fee_type' => 1, 'fee_amount' => 2, 'yearly_occurrence' => 3, 'start_year' => 4, 'end_year' => 5, 'credit_card_id' => 6, 'time_beg' => 7, 'time_end' => 8, 'update_user' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('fees_history');
        $this->setPhpName('FeesHistory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\FeesHistory');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('fee_id', 'FeeId', 'INTEGER', true, null, null);
        $this->addColumn('fee_type', 'FeeType', 'INTEGER', true, null, null);
        $this->addColumn('fee_amount', 'FeeAmount', 'INTEGER', true, null, null);
        $this->addColumn('yearly_occurrence', 'YearlyOccurrence', 'INTEGER', false, null, null);
        $this->addColumn('start_year', 'StartYear', 'INTEGER', false, null, null);
        $this->addColumn('end_year', 'EndYear', 'INTEGER', false, null, null);
        $this->addColumn('credit_card_id', 'CreditCardId', 'INTEGER', true, null, null);
        $this->addPrimaryKey('time_beg', 'TimeBeg', 'TIMESTAMP', true, null, null);
        $this->addColumn('time_end', 'TimeEnd', 'TIMESTAMP', false, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \FeesHistory $obj A \FeesHistory object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getFeeId(), (string) $obj->getTimeBeg()));
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \FeesHistory object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \FeesHistory) {
                $key = serialize(array((string) $value->getFeeId(), (string) $value->getTimeBeg()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \FeesHistory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeeId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeeId', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)]));
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('FeeId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 7 + $offset
                : self::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? FeesHistoryTableMap::CLASS_DEFAULT : FeesHistoryTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (FeesHistory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FeesHistoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FeesHistoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FeesHistoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FeesHistoryTableMap::OM_CLASS;
            /** @var FeesHistory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FeesHistoryTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = FeesHistoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FeesHistoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var FeesHistory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FeesHistoryTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_FEE_ID);
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_FEE_TYPE);
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_FEE_AMOUNT);
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_YEARLY_OCCURRENCE);
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_START_YEAR);
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_END_YEAR);
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_CREDIT_CARD_ID);
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_TIME_BEG);
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_TIME_END);
            $criteria->addSelectColumn(FeesHistoryTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.fee_id');
            $criteria->addSelectColumn($alias . '.fee_type');
            $criteria->addSelectColumn($alias . '.fee_amount');
            $criteria->addSelectColumn($alias . '.yearly_occurrence');
            $criteria->addSelectColumn($alias . '.start_year');
            $criteria->addSelectColumn($alias . '.end_year');
            $criteria->addSelectColumn($alias . '.credit_card_id');
            $criteria->addSelectColumn($alias . '.time_beg');
            $criteria->addSelectColumn($alias . '.time_end');
            $criteria->addSelectColumn($alias . '.update_user');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(FeesHistoryTableMap::DATABASE_NAME)->getTable(FeesHistoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FeesHistoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FeesHistoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FeesHistoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a FeesHistory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or FeesHistory object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FeesHistoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \FeesHistory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FeesHistoryTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(FeesHistoryTableMap::COL_FEE_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(FeesHistoryTableMap::COL_TIME_BEG, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = FeesHistoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FeesHistoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FeesHistoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the fees_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FeesHistoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a FeesHistory or Criteria object.
     *
     * @param mixed               $criteria Criteria or FeesHistory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FeesHistoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from FeesHistory object
        }


        // Set the correct dbName
        $query = FeesHistoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FeesHistoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FeesHistoryTableMap::buildTableMap();
