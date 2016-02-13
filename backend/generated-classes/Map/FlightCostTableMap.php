<?php

namespace Map;

use \FlightCost;
use \FlightCostQuery;
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
 * This class defines the structure of the 'flight_cost' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FlightCostTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.FlightCostTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'flight_cost';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\FlightCost';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'FlightCost';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the flight_cost_id field
     */
    const COL_FLIGHT_COST_ID = 'flight_cost.flight_cost_id';

    /**
     * the column name for the retrieval_date field
     */
    const COL_RETRIEVAL_DATE = 'flight_cost.retrieval_date';

    /**
     * the column name for the point_system_id field
     */
    const COL_POINT_SYSTEM_ID = 'flight_cost.point_system_id';

    /**
     * the column name for the mileage_type_id field
     */
    const COL_MILEAGE_TYPE_ID = 'flight_cost.mileage_type_id';

    /**
     * the column name for the trip_id field
     */
    const COL_TRIP_ID = 'flight_cost.trip_id';

    /**
     * the column name for the fare_type field
     */
    const COL_FARE_TYPE = 'flight_cost.fare_type';

    /**
     * the column name for the depart_date field
     */
    const COL_DEPART_DATE = 'flight_cost.depart_date';

    /**
     * the column name for the depart_flight_no field
     */
    const COL_DEPART_FLIGHT_NO = 'flight_cost.depart_flight_no';

    /**
     * the column name for the return_date field
     */
    const COL_RETURN_DATE = 'flight_cost.return_date';

    /**
     * the column name for the return_flight_no field
     */
    const COL_RETURN_FLIGHT_NO = 'flight_cost.return_flight_no';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'flight_cost.price';

    /**
     * the column name for the reference field
     */
    const COL_REFERENCE = 'flight_cost.reference';

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
        self::TYPE_PHPNAME       => array('FlightCostId', 'RetrievalDate', 'PointSystemId', 'MileageTypeId', 'TripId', 'FareType', 'DepartDate', 'DepartFlightNo', 'ReturnDate', 'ReturnFlightNo', 'Price', 'Reference', ),
        self::TYPE_CAMELNAME     => array('flightCostId', 'retrievalDate', 'pointSystemId', 'mileageTypeId', 'tripId', 'fareType', 'departDate', 'departFlightNo', 'returnDate', 'returnFlightNo', 'price', 'reference', ),
        self::TYPE_COLNAME       => array(FlightCostTableMap::COL_FLIGHT_COST_ID, FlightCostTableMap::COL_RETRIEVAL_DATE, FlightCostTableMap::COL_POINT_SYSTEM_ID, FlightCostTableMap::COL_MILEAGE_TYPE_ID, FlightCostTableMap::COL_TRIP_ID, FlightCostTableMap::COL_FARE_TYPE, FlightCostTableMap::COL_DEPART_DATE, FlightCostTableMap::COL_DEPART_FLIGHT_NO, FlightCostTableMap::COL_RETURN_DATE, FlightCostTableMap::COL_RETURN_FLIGHT_NO, FlightCostTableMap::COL_PRICE, FlightCostTableMap::COL_REFERENCE, ),
        self::TYPE_FIELDNAME     => array('flight_cost_id', 'retrieval_date', 'point_system_id', 'mileage_type_id', 'trip_id', 'fare_type', 'depart_date', 'depart_flight_no', 'return_date', 'return_flight_no', 'price', 'reference', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FlightCostId' => 0, 'RetrievalDate' => 1, 'PointSystemId' => 2, 'MileageTypeId' => 3, 'TripId' => 4, 'FareType' => 5, 'DepartDate' => 6, 'DepartFlightNo' => 7, 'ReturnDate' => 8, 'ReturnFlightNo' => 9, 'Price' => 10, 'Reference' => 11, ),
        self::TYPE_CAMELNAME     => array('flightCostId' => 0, 'retrievalDate' => 1, 'pointSystemId' => 2, 'mileageTypeId' => 3, 'tripId' => 4, 'fareType' => 5, 'departDate' => 6, 'departFlightNo' => 7, 'returnDate' => 8, 'returnFlightNo' => 9, 'price' => 10, 'reference' => 11, ),
        self::TYPE_COLNAME       => array(FlightCostTableMap::COL_FLIGHT_COST_ID => 0, FlightCostTableMap::COL_RETRIEVAL_DATE => 1, FlightCostTableMap::COL_POINT_SYSTEM_ID => 2, FlightCostTableMap::COL_MILEAGE_TYPE_ID => 3, FlightCostTableMap::COL_TRIP_ID => 4, FlightCostTableMap::COL_FARE_TYPE => 5, FlightCostTableMap::COL_DEPART_DATE => 6, FlightCostTableMap::COL_DEPART_FLIGHT_NO => 7, FlightCostTableMap::COL_RETURN_DATE => 8, FlightCostTableMap::COL_RETURN_FLIGHT_NO => 9, FlightCostTableMap::COL_PRICE => 10, FlightCostTableMap::COL_REFERENCE => 11, ),
        self::TYPE_FIELDNAME     => array('flight_cost_id' => 0, 'retrieval_date' => 1, 'point_system_id' => 2, 'mileage_type_id' => 3, 'trip_id' => 4, 'fare_type' => 5, 'depart_date' => 6, 'depart_flight_no' => 7, 'return_date' => 8, 'return_flight_no' => 9, 'price' => 10, 'reference' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('flight_cost');
        $this->setPhpName('FlightCost');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\FlightCost');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('flight_cost_id', 'FlightCostId', 'INTEGER', true, null, null);
        $this->addColumn('retrieval_date', 'RetrievalDate', 'DATE', true, null, null);
        $this->addForeignKey('point_system_id', 'PointSystemId', 'INTEGER', 'point_system', 'point_system_id', true, null, null);
        $this->addForeignKey('mileage_type_id', 'MileageTypeId', 'INTEGER', 'mileage_type', 'mileage_type_id', true, null, null);
        $this->addForeignKey('trip_id', 'TripId', 'INTEGER', 'trip', 'trip_id', true, null, null);
        $this->addColumn('fare_type', 'FareType', 'VARCHAR', false, 100, null);
        $this->addColumn('depart_date', 'DepartDate', 'DATE', false, null, null);
        $this->addColumn('depart_flight_no', 'DepartFlightNo', 'VARCHAR', false, 50, null);
        $this->addColumn('return_date', 'ReturnDate', 'DATE', false, null, null);
        $this->addColumn('return_flight_no', 'ReturnFlightNo', 'VARCHAR', false, 50, null);
        $this->addColumn('price', 'Price', 'INTEGER', true, 15, null);
        $this->addColumn('reference', 'Reference', 'VARCHAR', false, 250, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MileageType', '\\MileageType', RelationMap::MANY_TO_ONE, array('mileage_type_id' => 'mileage_type_id', ), null, null);
        $this->addRelation('Trip', '\\Trip', RelationMap::MANY_TO_ONE, array('trip_id' => 'trip_id', ), null, null);
        $this->addRelation('PointSystem', '\\PointSystem', RelationMap::MANY_TO_ONE, array('point_system_id' => 'point_system_id', ), null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FlightCostId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FlightCostId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('FlightCostId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? FlightCostTableMap::CLASS_DEFAULT : FlightCostTableMap::OM_CLASS;
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
     * @return array           (FlightCost object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FlightCostTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FlightCostTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FlightCostTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FlightCostTableMap::OM_CLASS;
            /** @var FlightCost $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FlightCostTableMap::addInstanceToPool($obj, $key);
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
            $key = FlightCostTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FlightCostTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var FlightCost $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FlightCostTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FlightCostTableMap::COL_FLIGHT_COST_ID);
            $criteria->addSelectColumn(FlightCostTableMap::COL_RETRIEVAL_DATE);
            $criteria->addSelectColumn(FlightCostTableMap::COL_POINT_SYSTEM_ID);
            $criteria->addSelectColumn(FlightCostTableMap::COL_MILEAGE_TYPE_ID);
            $criteria->addSelectColumn(FlightCostTableMap::COL_TRIP_ID);
            $criteria->addSelectColumn(FlightCostTableMap::COL_FARE_TYPE);
            $criteria->addSelectColumn(FlightCostTableMap::COL_DEPART_DATE);
            $criteria->addSelectColumn(FlightCostTableMap::COL_DEPART_FLIGHT_NO);
            $criteria->addSelectColumn(FlightCostTableMap::COL_RETURN_DATE);
            $criteria->addSelectColumn(FlightCostTableMap::COL_RETURN_FLIGHT_NO);
            $criteria->addSelectColumn(FlightCostTableMap::COL_PRICE);
            $criteria->addSelectColumn(FlightCostTableMap::COL_REFERENCE);
        } else {
            $criteria->addSelectColumn($alias . '.flight_cost_id');
            $criteria->addSelectColumn($alias . '.retrieval_date');
            $criteria->addSelectColumn($alias . '.point_system_id');
            $criteria->addSelectColumn($alias . '.mileage_type_id');
            $criteria->addSelectColumn($alias . '.trip_id');
            $criteria->addSelectColumn($alias . '.fare_type');
            $criteria->addSelectColumn($alias . '.depart_date');
            $criteria->addSelectColumn($alias . '.depart_flight_no');
            $criteria->addSelectColumn($alias . '.return_date');
            $criteria->addSelectColumn($alias . '.return_flight_no');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.reference');
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
        return Propel::getServiceContainer()->getDatabaseMap(FlightCostTableMap::DATABASE_NAME)->getTable(FlightCostTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FlightCostTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FlightCostTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FlightCostTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a FlightCost or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or FlightCost object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FlightCostTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \FlightCost) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FlightCostTableMap::DATABASE_NAME);
            $criteria->add(FlightCostTableMap::COL_FLIGHT_COST_ID, (array) $values, Criteria::IN);
        }

        $query = FlightCostQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FlightCostTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FlightCostTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the flight_cost table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FlightCostQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a FlightCost or Criteria object.
     *
     * @param mixed               $criteria Criteria or FlightCost object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FlightCostTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from FlightCost object
        }

        if ($criteria->containsKey(FlightCostTableMap::COL_FLIGHT_COST_ID) && $criteria->keyContainsValue(FlightCostTableMap::COL_FLIGHT_COST_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FlightCostTableMap::COL_FLIGHT_COST_ID.')');
        }


        // Set the correct dbName
        $query = FlightCostQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FlightCostTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FlightCostTableMap::buildTableMap();
