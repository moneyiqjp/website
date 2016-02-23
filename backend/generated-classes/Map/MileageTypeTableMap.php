<?php

namespace Map;

use \MileageType;
use \MileageTypeQuery;
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
 * This class defines the structure of the 'mileage_type' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MileageTypeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MileageTypeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'mileage_type';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MileageType';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MileageType';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the mileage_type_id field
     */
    const COL_MILEAGE_TYPE_ID = 'mileage_type.mileage_type_id';

    /**
     * the column name for the round_trip field
     */
    const COL_ROUND_TRIP = 'mileage_type.round_trip';

    /**
     * the column name for the season_id field
     */
    const COL_SEASON_ID = 'mileage_type.season_id';

    /**
     * the column name for the class field
     */
    const COL_CLASS = 'mileage_type.class';

    /**
     * the column name for the ticket_type field
     */
    const COL_TICKET_TYPE = 'mileage_type.ticket_type';

    /**
     * the column name for the display field
     */
    const COL_DISPLAY = 'mileage_type.display';

    /**
     * the column name for the trip_length field
     */
    const COL_TRIP_LENGTH = 'mileage_type.trip_length';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'mileage_type.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'mileage_type.update_user';

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
        self::TYPE_PHPNAME       => array('MileageTypeId', 'RoundTrip', 'SeasonId', 'Class', 'TicketType', 'Display', 'TripLength', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('mileageTypeId', 'roundTrip', 'seasonId', 'class', 'ticketType', 'display', 'tripLength', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(MileageTypeTableMap::COL_MILEAGE_TYPE_ID, MileageTypeTableMap::COL_ROUND_TRIP, MileageTypeTableMap::COL_SEASON_ID, MileageTypeTableMap::COL_CLASS, MileageTypeTableMap::COL_TICKET_TYPE, MileageTypeTableMap::COL_DISPLAY, MileageTypeTableMap::COL_TRIP_LENGTH, MileageTypeTableMap::COL_UPDATE_TIME, MileageTypeTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('mileage_type_id', 'round_trip', 'season_id', 'class', 'ticket_type', 'display', 'trip_length', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('MileageTypeId' => 0, 'RoundTrip' => 1, 'SeasonId' => 2, 'Class' => 3, 'TicketType' => 4, 'Display' => 5, 'TripLength' => 6, 'UpdateTime' => 7, 'UpdateUser' => 8, ),
        self::TYPE_CAMELNAME     => array('mileageTypeId' => 0, 'roundTrip' => 1, 'seasonId' => 2, 'class' => 3, 'ticketType' => 4, 'display' => 5, 'tripLength' => 6, 'updateTime' => 7, 'updateUser' => 8, ),
        self::TYPE_COLNAME       => array(MileageTypeTableMap::COL_MILEAGE_TYPE_ID => 0, MileageTypeTableMap::COL_ROUND_TRIP => 1, MileageTypeTableMap::COL_SEASON_ID => 2, MileageTypeTableMap::COL_CLASS => 3, MileageTypeTableMap::COL_TICKET_TYPE => 4, MileageTypeTableMap::COL_DISPLAY => 5, MileageTypeTableMap::COL_TRIP_LENGTH => 6, MileageTypeTableMap::COL_UPDATE_TIME => 7, MileageTypeTableMap::COL_UPDATE_USER => 8, ),
        self::TYPE_FIELDNAME     => array('mileage_type_id' => 0, 'round_trip' => 1, 'season_id' => 2, 'class' => 3, 'ticket_type' => 4, 'display' => 5, 'trip_length' => 6, 'update_time' => 7, 'update_user' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('mileage_type');
        $this->setPhpName('MileageType');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MileageType');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('mileage_type_id', 'MileageTypeId', 'INTEGER', true, null, null);
        $this->addColumn('round_trip', 'RoundTrip', 'TINYINT', true, null, 0);
        $this->addForeignKey('season_id', 'SeasonId', 'INTEGER', 'season', 'season_id', true, null, null);
        $this->addColumn('class', 'Class', 'VARCHAR', false, 255, null);
        $this->addColumn('ticket_type', 'TicketType', 'VARCHAR', false, 255, null);
        $this->addColumn('display', 'Display', 'VARCHAR', false, 255, null);
        $this->addColumn('trip_length', 'TripLength', 'INTEGER', true, null, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Season', '\\Season', RelationMap::MANY_TO_ONE, array('season_id' => 'season_id', ), null, null);
        $this->addRelation('FlightCost', '\\FlightCost', RelationMap::ONE_TO_MANY, array('mileage_type_id' => 'mileage_type_id', ), null, null, 'FlightCosts');
        $this->addRelation('Mileage', '\\Mileage', RelationMap::ONE_TO_MANY, array('mileage_type_id' => 'mileage_type_id', ), null, null, 'Mileages');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MileageTypeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MileageTypeId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('MileageTypeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? MileageTypeTableMap::CLASS_DEFAULT : MileageTypeTableMap::OM_CLASS;
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
     * @return array           (MileageType object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MileageTypeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MileageTypeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MileageTypeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MileageTypeTableMap::OM_CLASS;
            /** @var MileageType $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MileageTypeTableMap::addInstanceToPool($obj, $key);
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
            $key = MileageTypeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MileageTypeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MileageType $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MileageTypeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MileageTypeTableMap::COL_MILEAGE_TYPE_ID);
            $criteria->addSelectColumn(MileageTypeTableMap::COL_ROUND_TRIP);
            $criteria->addSelectColumn(MileageTypeTableMap::COL_SEASON_ID);
            $criteria->addSelectColumn(MileageTypeTableMap::COL_CLASS);
            $criteria->addSelectColumn(MileageTypeTableMap::COL_TICKET_TYPE);
            $criteria->addSelectColumn(MileageTypeTableMap::COL_DISPLAY);
            $criteria->addSelectColumn(MileageTypeTableMap::COL_TRIP_LENGTH);
            $criteria->addSelectColumn(MileageTypeTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(MileageTypeTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.mileage_type_id');
            $criteria->addSelectColumn($alias . '.round_trip');
            $criteria->addSelectColumn($alias . '.season_id');
            $criteria->addSelectColumn($alias . '.class');
            $criteria->addSelectColumn($alias . '.ticket_type');
            $criteria->addSelectColumn($alias . '.display');
            $criteria->addSelectColumn($alias . '.trip_length');
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
        return Propel::getServiceContainer()->getDatabaseMap(MileageTypeTableMap::DATABASE_NAME)->getTable(MileageTypeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MileageTypeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MileageTypeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MileageTypeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MileageType or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MileageType object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MileageTypeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MileageType) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MileageTypeTableMap::DATABASE_NAME);
            $criteria->add(MileageTypeTableMap::COL_MILEAGE_TYPE_ID, (array) $values, Criteria::IN);
        }

        $query = MileageTypeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MileageTypeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MileageTypeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the mileage_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MileageTypeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MileageType or Criteria object.
     *
     * @param mixed               $criteria Criteria or MileageType object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MileageTypeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MileageType object
        }

        if ($criteria->containsKey(MileageTypeTableMap::COL_MILEAGE_TYPE_ID) && $criteria->keyContainsValue(MileageTypeTableMap::COL_MILEAGE_TYPE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MileageTypeTableMap::COL_MILEAGE_TYPE_ID.')');
        }


        // Set the correct dbName
        $query = MileageTypeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MileageTypeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MileageTypeTableMap::buildTableMap();
