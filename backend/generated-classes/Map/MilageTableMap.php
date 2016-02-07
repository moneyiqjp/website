<?php

namespace Map;

use \Milage;
use \MilageQuery;
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
 * This class defines the structure of the 'milage' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MilageTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MilageTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'milage';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Milage';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Milage';

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
     * the column name for the milage_id field
     */
    const COL_MILAGE_ID = 'milage.milage_id';

    /**
     * the column name for the store_id field
     */
    const COL_STORE_ID = 'milage.store_id';

    /**
     * the column name for the trip_id field
     */
    const COL_TRIP_ID = 'milage.trip_id';

    /**
     * the column name for the required_miles field
     */
    const COL_REQUIRED_MILES = 'milage.required_miles';

    /**
     * the column name for the value_in_yen field
     */
    const COL_VALUE_IN_YEN = 'milage.value_in_yen';

    /**
     * the column name for the display field
     */
    const COL_DISPLAY = 'milage.display';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'milage.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'milage.update_user';

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
        self::TYPE_PHPNAME       => array('MilageId', 'StoreId', 'TripId', 'RequiredMiles', 'ValueInYen', 'Display', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('milageId', 'storeId', 'tripId', 'requiredMiles', 'valueInYen', 'display', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(MilageTableMap::COL_MILAGE_ID, MilageTableMap::COL_STORE_ID, MilageTableMap::COL_TRIP_ID, MilageTableMap::COL_REQUIRED_MILES, MilageTableMap::COL_VALUE_IN_YEN, MilageTableMap::COL_DISPLAY, MilageTableMap::COL_UPDATE_TIME, MilageTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('milage_id', 'store_id', 'trip_id', 'required_miles', 'value_in_yen', 'display', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('MilageId' => 0, 'StoreId' => 1, 'TripId' => 2, 'RequiredMiles' => 3, 'ValueInYen' => 4, 'Display' => 5, 'UpdateTime' => 6, 'UpdateUser' => 7, ),
        self::TYPE_CAMELNAME     => array('milageId' => 0, 'storeId' => 1, 'tripId' => 2, 'requiredMiles' => 3, 'valueInYen' => 4, 'display' => 5, 'updateTime' => 6, 'updateUser' => 7, ),
        self::TYPE_COLNAME       => array(MilageTableMap::COL_MILAGE_ID => 0, MilageTableMap::COL_STORE_ID => 1, MilageTableMap::COL_TRIP_ID => 2, MilageTableMap::COL_REQUIRED_MILES => 3, MilageTableMap::COL_VALUE_IN_YEN => 4, MilageTableMap::COL_DISPLAY => 5, MilageTableMap::COL_UPDATE_TIME => 6, MilageTableMap::COL_UPDATE_USER => 7, ),
        self::TYPE_FIELDNAME     => array('milage_id' => 0, 'store_id' => 1, 'trip_id' => 2, 'required_miles' => 3, 'value_in_yen' => 4, 'display' => 5, 'update_time' => 6, 'update_user' => 7, ),
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
        $this->setName('milage');
        $this->setPhpName('Milage');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Milage');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('milage_id', 'MilageId', 'INTEGER', true, null, null);
        $this->addForeignKey('store_id', 'StoreId', 'INTEGER', 'store', 'store_id', true, null, null);
        $this->addForeignKey('trip_id', 'TripId', 'INTEGER', 'trip', 'trip_id', true, null, null);
        $this->addColumn('required_miles', 'RequiredMiles', 'INTEGER', true, null, null);
        $this->addColumn('value_in_yen', 'ValueInYen', 'INTEGER', true, null, null);
        $this->addColumn('display', 'Display', 'VARCHAR', false, 255, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Store', '\\Store', RelationMap::MANY_TO_ONE, array('store_id' => 'store_id', ), null, null);
        $this->addRelation('Trip', '\\Trip', RelationMap::MANY_TO_ONE, array('trip_id' => 'trip_id', ), null, null);
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MilageId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MilageId', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('MilageId', TableMap::TYPE_PHPNAME, $indexType)
        ];
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
        return $withPrefix ? MilageTableMap::CLASS_DEFAULT : MilageTableMap::OM_CLASS;
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
     * @return array           (Milage object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MilageTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MilageTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MilageTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MilageTableMap::OM_CLASS;
            /** @var Milage $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MilageTableMap::addInstanceToPool($obj, $key);
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
            $key = MilageTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MilageTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Milage $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MilageTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MilageTableMap::COL_MILAGE_ID);
            $criteria->addSelectColumn(MilageTableMap::COL_STORE_ID);
            $criteria->addSelectColumn(MilageTableMap::COL_TRIP_ID);
            $criteria->addSelectColumn(MilageTableMap::COL_REQUIRED_MILES);
            $criteria->addSelectColumn(MilageTableMap::COL_VALUE_IN_YEN);
            $criteria->addSelectColumn(MilageTableMap::COL_DISPLAY);
            $criteria->addSelectColumn(MilageTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(MilageTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.milage_id');
            $criteria->addSelectColumn($alias . '.store_id');
            $criteria->addSelectColumn($alias . '.trip_id');
            $criteria->addSelectColumn($alias . '.required_miles');
            $criteria->addSelectColumn($alias . '.value_in_yen');
            $criteria->addSelectColumn($alias . '.display');
            $criteria->addSelectColumn($alias . '.update_time');
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
        return Propel::getServiceContainer()->getDatabaseMap(MilageTableMap::DATABASE_NAME)->getTable(MilageTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MilageTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MilageTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MilageTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Milage or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Milage object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MilageTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Milage) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MilageTableMap::DATABASE_NAME);
            $criteria->add(MilageTableMap::COL_MILAGE_ID, (array) $values, Criteria::IN);
        }

        $query = MilageQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MilageTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MilageTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the milage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MilageQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Milage or Criteria object.
     *
     * @param mixed               $criteria Criteria or Milage object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MilageTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Milage object
        }

        if ($criteria->containsKey(MilageTableMap::COL_MILAGE_ID) && $criteria->keyContainsValue(MilageTableMap::COL_MILAGE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MilageTableMap::COL_MILAGE_ID.')');
        }


        // Set the correct dbName
        $query = MilageQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MilageTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MilageTableMap::buildTableMap();
