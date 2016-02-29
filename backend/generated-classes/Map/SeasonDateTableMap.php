<?php

namespace Map;

use \SeasonDate;
use \SeasonDateQuery;
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
 * This class defines the structure of the 'season_date' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SeasonDateTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SeasonDateTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'season_date';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\SeasonDate';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'SeasonDate';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the season_date_id field
     */
    const COL_SEASON_DATE_ID = 'season_date.season_date_id';

    /**
     * the column name for the zone_id field
     */
    const COL_ZONE_ID = 'season_date.zone_id';

    /**
     * the column name for the from_date field
     */
    const COL_FROM_DATE = 'season_date.from_date';

    /**
     * the column name for the to_date field
     */
    const COL_TO_DATE = 'season_date.to_date';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'season_date.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'season_date.update_user';

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
        self::TYPE_PHPNAME       => array('SeasonDateId', 'ZoneId', 'FromDate', 'ToDate', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('seasonDateId', 'zoneId', 'fromDate', 'toDate', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(SeasonDateTableMap::COL_SEASON_DATE_ID, SeasonDateTableMap::COL_ZONE_ID, SeasonDateTableMap::COL_FROM_DATE, SeasonDateTableMap::COL_TO_DATE, SeasonDateTableMap::COL_UPDATE_TIME, SeasonDateTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('season_date_id', 'zone_id', 'from_date', 'to_date', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('SeasonDateId' => 0, 'ZoneId' => 1, 'FromDate' => 2, 'ToDate' => 3, 'UpdateTime' => 4, 'UpdateUser' => 5, ),
        self::TYPE_CAMELNAME     => array('seasonDateId' => 0, 'zoneId' => 1, 'fromDate' => 2, 'toDate' => 3, 'updateTime' => 4, 'updateUser' => 5, ),
        self::TYPE_COLNAME       => array(SeasonDateTableMap::COL_SEASON_DATE_ID => 0, SeasonDateTableMap::COL_ZONE_ID => 1, SeasonDateTableMap::COL_FROM_DATE => 2, SeasonDateTableMap::COL_TO_DATE => 3, SeasonDateTableMap::COL_UPDATE_TIME => 4, SeasonDateTableMap::COL_UPDATE_USER => 5, ),
        self::TYPE_FIELDNAME     => array('season_date_id' => 0, 'zone_id' => 1, 'from_date' => 2, 'to_date' => 3, 'update_time' => 4, 'update_user' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('season_date');
        $this->setPhpName('SeasonDate');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\SeasonDate');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('season_date_id', 'SeasonDateId', 'INTEGER', true, null, null);
        $this->addForeignKey('zone_id', 'ZoneId', 'INTEGER', 'zone', 'zone_id', true, null, null);
        $this->addColumn('from_date', 'FromDate', 'DATE', false, null, null);
        $this->addColumn('to_date', 'ToDate', 'DATE', false, null, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Zone', '\\Zone', RelationMap::MANY_TO_ONE, array('zone_id' => 'zone_id', ), null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SeasonDateId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SeasonDateId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('SeasonDateId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SeasonDateTableMap::CLASS_DEFAULT : SeasonDateTableMap::OM_CLASS;
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
     * @return array           (SeasonDate object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SeasonDateTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SeasonDateTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SeasonDateTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SeasonDateTableMap::OM_CLASS;
            /** @var SeasonDate $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SeasonDateTableMap::addInstanceToPool($obj, $key);
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
            $key = SeasonDateTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SeasonDateTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SeasonDate $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SeasonDateTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SeasonDateTableMap::COL_SEASON_DATE_ID);
            $criteria->addSelectColumn(SeasonDateTableMap::COL_ZONE_ID);
            $criteria->addSelectColumn(SeasonDateTableMap::COL_FROM_DATE);
            $criteria->addSelectColumn(SeasonDateTableMap::COL_TO_DATE);
            $criteria->addSelectColumn(SeasonDateTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(SeasonDateTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.season_date_id');
            $criteria->addSelectColumn($alias . '.zone_id');
            $criteria->addSelectColumn($alias . '.from_date');
            $criteria->addSelectColumn($alias . '.to_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(SeasonDateTableMap::DATABASE_NAME)->getTable(SeasonDateTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SeasonDateTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SeasonDateTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SeasonDateTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SeasonDate or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SeasonDate object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonDateTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \SeasonDate) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SeasonDateTableMap::DATABASE_NAME);
            $criteria->add(SeasonDateTableMap::COL_SEASON_DATE_ID, (array) $values, Criteria::IN);
        }

        $query = SeasonDateQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SeasonDateTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SeasonDateTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the season_date table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SeasonDateQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SeasonDate or Criteria object.
     *
     * @param mixed               $criteria Criteria or SeasonDate object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonDateTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SeasonDate object
        }

        if ($criteria->containsKey(SeasonDateTableMap::COL_SEASON_DATE_ID) && $criteria->keyContainsValue(SeasonDateTableMap::COL_SEASON_DATE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SeasonDateTableMap::COL_SEASON_DATE_ID.')');
        }


        // Set the correct dbName
        $query = SeasonDateQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SeasonDateTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SeasonDateTableMap::buildTableMap();
