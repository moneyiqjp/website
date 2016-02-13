<?php

namespace Map;

use \Season;
use \SeasonQuery;
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
 * This class defines the structure of the 'season' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SeasonTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SeasonTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'season';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Season';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Season';

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
     * the column name for the season_id field
     */
    const COL_SEASON_ID = 'season.season_id';

    /**
     * the column name for the point_system_id field
     */
    const COL_POINT_SYSTEM_ID = 'season.point_system_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'season.name';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'season.type';

    /**
     * the column name for the from field
     */
    const COL_FROM = 'season.from';

    /**
     * the column name for the to field
     */
    const COL_TO = 'season.to';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'season.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'season.update_user';

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
        self::TYPE_PHPNAME       => array('SeasonId', 'PointSystemId', 'Name', 'Type', 'From', 'To', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('seasonId', 'pointSystemId', 'name', 'type', 'from', 'to', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(SeasonTableMap::COL_SEASON_ID, SeasonTableMap::COL_POINT_SYSTEM_ID, SeasonTableMap::COL_NAME, SeasonTableMap::COL_TYPE, SeasonTableMap::COL_FROM, SeasonTableMap::COL_TO, SeasonTableMap::COL_UPDATE_TIME, SeasonTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('season_id', 'point_system_id', 'name', 'type', 'from', 'to', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('SeasonId' => 0, 'PointSystemId' => 1, 'Name' => 2, 'Type' => 3, 'From' => 4, 'To' => 5, 'UpdateTime' => 6, 'UpdateUser' => 7, ),
        self::TYPE_CAMELNAME     => array('seasonId' => 0, 'pointSystemId' => 1, 'name' => 2, 'type' => 3, 'from' => 4, 'to' => 5, 'updateTime' => 6, 'updateUser' => 7, ),
        self::TYPE_COLNAME       => array(SeasonTableMap::COL_SEASON_ID => 0, SeasonTableMap::COL_POINT_SYSTEM_ID => 1, SeasonTableMap::COL_NAME => 2, SeasonTableMap::COL_TYPE => 3, SeasonTableMap::COL_FROM => 4, SeasonTableMap::COL_TO => 5, SeasonTableMap::COL_UPDATE_TIME => 6, SeasonTableMap::COL_UPDATE_USER => 7, ),
        self::TYPE_FIELDNAME     => array('season_id' => 0, 'point_system_id' => 1, 'name' => 2, 'type' => 3, 'from' => 4, 'to' => 5, 'update_time' => 6, 'update_user' => 7, ),
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
        $this->setName('season');
        $this->setPhpName('Season');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Season');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('season_id', 'SeasonId', 'INTEGER', true, null, null);
        $this->addForeignKey('point_system_id', 'PointSystemId', 'INTEGER', 'point_system', 'point_system_id', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 100, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 100, null);
        $this->addColumn('from', 'From', 'DATE', false, null, null);
        $this->addColumn('to', 'To', 'DATE', false, null, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PointSystem', '\\PointSystem', RelationMap::MANY_TO_ONE, array('point_system_id' => 'point_system_id', ), null, null);
        $this->addRelation('MileageType', '\\MileageType', RelationMap::ONE_TO_MANY, array('season_id' => 'season_id', ), null, null, 'MileageTypes');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SeasonId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SeasonId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('SeasonId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SeasonTableMap::CLASS_DEFAULT : SeasonTableMap::OM_CLASS;
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
     * @return array           (Season object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SeasonTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SeasonTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SeasonTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SeasonTableMap::OM_CLASS;
            /** @var Season $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SeasonTableMap::addInstanceToPool($obj, $key);
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
            $key = SeasonTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SeasonTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Season $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SeasonTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SeasonTableMap::COL_SEASON_ID);
            $criteria->addSelectColumn(SeasonTableMap::COL_POINT_SYSTEM_ID);
            $criteria->addSelectColumn(SeasonTableMap::COL_NAME);
            $criteria->addSelectColumn(SeasonTableMap::COL_TYPE);
            $criteria->addSelectColumn(SeasonTableMap::COL_FROM);
            $criteria->addSelectColumn(SeasonTableMap::COL_TO);
            $criteria->addSelectColumn(SeasonTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(SeasonTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.season_id');
            $criteria->addSelectColumn($alias . '.point_system_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.from');
            $criteria->addSelectColumn($alias . '.to');
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
        return Propel::getServiceContainer()->getDatabaseMap(SeasonTableMap::DATABASE_NAME)->getTable(SeasonTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SeasonTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SeasonTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SeasonTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Season or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Season object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Season) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SeasonTableMap::DATABASE_NAME);
            $criteria->add(SeasonTableMap::COL_SEASON_ID, (array) $values, Criteria::IN);
        }

        $query = SeasonQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SeasonTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SeasonTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the season table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SeasonQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Season or Criteria object.
     *
     * @param mixed               $criteria Criteria or Season object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Season object
        }

        if ($criteria->containsKey(SeasonTableMap::COL_SEASON_ID) && $criteria->keyContainsValue(SeasonTableMap::COL_SEASON_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SeasonTableMap::COL_SEASON_ID.')');
        }


        // Set the correct dbName
        $query = SeasonQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SeasonTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SeasonTableMap::buildTableMap();
