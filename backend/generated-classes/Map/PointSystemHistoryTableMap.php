<?php

namespace Map;

use \PointSystemHistory;
use \PointSystemHistoryQuery;
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
 * This class defines the structure of the 'point_system_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PointSystemHistoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PointSystemHistoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'point_system_history';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\PointSystemHistory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'PointSystemHistory';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the point_system_id field
     */
    const COL_POINT_SYSTEM_ID = 'point_system_history.point_system_id';

    /**
     * the column name for the point_system_name field
     */
    const COL_POINT_SYSTEM_NAME = 'point_system_history.point_system_name';

    /**
     * the column name for the points_per_yen field
     */
    const COL_POINTS_PER_YEN = 'point_system_history.points_per_yen';

    /**
     * the column name for the credit_card_id field
     */
    const COL_CREDIT_CARD_ID = 'point_system_history.credit_card_id';

    /**
     * the column name for the store_id field
     */
    const COL_STORE_ID = 'point_system_history.store_id';

    /**
     * the column name for the time_beg field
     */
    const COL_TIME_BEG = 'point_system_history.time_beg';

    /**
     * the column name for the time_end field
     */
    const COL_TIME_END = 'point_system_history.time_end';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'point_system_history.update_user';

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
        self::TYPE_PHPNAME       => array('PointSystemId', 'PointSystemName', 'PointsPerYen', 'CreditCardId', 'StoreId', 'TimeBeg', 'TimeEnd', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('pointSystemId', 'pointSystemName', 'pointsPerYen', 'creditCardId', 'storeId', 'timeBeg', 'timeEnd', 'updateUser', ),
        self::TYPE_COLNAME       => array(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID, PointSystemHistoryTableMap::COL_POINT_SYSTEM_NAME, PointSystemHistoryTableMap::COL_POINTS_PER_YEN, PointSystemHistoryTableMap::COL_CREDIT_CARD_ID, PointSystemHistoryTableMap::COL_STORE_ID, PointSystemHistoryTableMap::COL_TIME_BEG, PointSystemHistoryTableMap::COL_TIME_END, PointSystemHistoryTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('point_system_id', 'point_system_name', 'points_per_yen', 'credit_card_id', 'store_id', 'time_beg', 'time_end', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PointSystemId' => 0, 'PointSystemName' => 1, 'PointsPerYen' => 2, 'CreditCardId' => 3, 'StoreId' => 4, 'TimeBeg' => 5, 'TimeEnd' => 6, 'UpdateUser' => 7, ),
        self::TYPE_CAMELNAME     => array('pointSystemId' => 0, 'pointSystemName' => 1, 'pointsPerYen' => 2, 'creditCardId' => 3, 'storeId' => 4, 'timeBeg' => 5, 'timeEnd' => 6, 'updateUser' => 7, ),
        self::TYPE_COLNAME       => array(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID => 0, PointSystemHistoryTableMap::COL_POINT_SYSTEM_NAME => 1, PointSystemHistoryTableMap::COL_POINTS_PER_YEN => 2, PointSystemHistoryTableMap::COL_CREDIT_CARD_ID => 3, PointSystemHistoryTableMap::COL_STORE_ID => 4, PointSystemHistoryTableMap::COL_TIME_BEG => 5, PointSystemHistoryTableMap::COL_TIME_END => 6, PointSystemHistoryTableMap::COL_UPDATE_USER => 7, ),
        self::TYPE_FIELDNAME     => array('point_system_id' => 0, 'point_system_name' => 1, 'points_per_yen' => 2, 'credit_card_id' => 3, 'store_id' => 4, 'time_beg' => 5, 'time_end' => 6, 'update_user' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('point_system_history');
        $this->setPhpName('PointSystemHistory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\PointSystemHistory');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('point_system_id', 'PointSystemId', 'INTEGER', true, null, null);
        $this->addColumn('point_system_name', 'PointSystemName', 'VARCHAR', true, 255, null);
        $this->addColumn('points_per_yen', 'PointsPerYen', 'DOUBLE', true, 15, null);
        $this->addColumn('credit_card_id', 'CreditCardId', 'INTEGER', true, null, null);
        $this->addColumn('store_id', 'StoreId', 'INTEGER', true, null, null);
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
     * @param \PointSystemHistory $obj A \PointSystemHistory object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getPointSystemId(), (string) $obj->getTimeBeg()));
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
     * @param mixed $value A \PointSystemHistory object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \PointSystemHistory) {
                $key = serialize(array((string) $value->getPointSystemId(), (string) $value->getTimeBeg()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \PointSystemHistory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PointSystemId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PointSystemId', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)]));
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
                : self::translateFieldName('PointSystemId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 5 + $offset
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
        return $withPrefix ? PointSystemHistoryTableMap::CLASS_DEFAULT : PointSystemHistoryTableMap::OM_CLASS;
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
     * @return array           (PointSystemHistory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PointSystemHistoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PointSystemHistoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PointSystemHistoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PointSystemHistoryTableMap::OM_CLASS;
            /** @var PointSystemHistory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PointSystemHistoryTableMap::addInstanceToPool($obj, $key);
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
            $key = PointSystemHistoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PointSystemHistoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PointSystemHistory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PointSystemHistoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID);
            $criteria->addSelectColumn(PointSystemHistoryTableMap::COL_POINT_SYSTEM_NAME);
            $criteria->addSelectColumn(PointSystemHistoryTableMap::COL_POINTS_PER_YEN);
            $criteria->addSelectColumn(PointSystemHistoryTableMap::COL_CREDIT_CARD_ID);
            $criteria->addSelectColumn(PointSystemHistoryTableMap::COL_STORE_ID);
            $criteria->addSelectColumn(PointSystemHistoryTableMap::COL_TIME_BEG);
            $criteria->addSelectColumn(PointSystemHistoryTableMap::COL_TIME_END);
            $criteria->addSelectColumn(PointSystemHistoryTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.point_system_id');
            $criteria->addSelectColumn($alias . '.point_system_name');
            $criteria->addSelectColumn($alias . '.points_per_yen');
            $criteria->addSelectColumn($alias . '.credit_card_id');
            $criteria->addSelectColumn($alias . '.store_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(PointSystemHistoryTableMap::DATABASE_NAME)->getTable(PointSystemHistoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PointSystemHistoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PointSystemHistoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PointSystemHistoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a PointSystemHistory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PointSystemHistory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PointSystemHistoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \PointSystemHistory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PointSystemHistoryTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(PointSystemHistoryTableMap::COL_TIME_BEG, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = PointSystemHistoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PointSystemHistoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PointSystemHistoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the point_system_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PointSystemHistoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PointSystemHistory or Criteria object.
     *
     * @param mixed               $criteria Criteria or PointSystemHistory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PointSystemHistoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PointSystemHistory object
        }


        // Set the correct dbName
        $query = PointSystemHistoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PointSystemHistoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PointSystemHistoryTableMap::buildTableMap();
