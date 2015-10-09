<?php

namespace Map;

use \RewardHistory;
use \RewardHistoryQuery;
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
 * This class defines the structure of the 'reward_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RewardHistoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RewardHistoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'reward_history';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\RewardHistory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'RewardHistory';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the reward_id field
     */
    const COL_REWARD_ID = 'reward_history.reward_id';

    /**
     * the column name for the point_system_id field
     */
    const COL_POINT_SYSTEM_ID = 'reward_history.point_system_id';

    /**
     * the column name for the reward_category_id field
     */
    const COL_REWARD_CATEGORY_ID = 'reward_history.reward_category_id';

    /**
     * the column name for the reward_type_id field
     */
    const COL_REWARD_TYPE_ID = 'reward_history.reward_type_id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'reward_history.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'reward_history.description';

    /**
     * the column name for the icon field
     */
    const COL_ICON = 'reward_history.icon';

    /**
     * the column name for the yen_per_point field
     */
    const COL_YEN_PER_POINT = 'reward_history.yen_per_point';

    /**
     * the column name for the price_per_unit field
     */
    const COL_PRICE_PER_UNIT = 'reward_history.price_per_unit';

    /**
     * the column name for the min_points field
     */
    const COL_MIN_POINTS = 'reward_history.min_points';

    /**
     * the column name for the max_points field
     */
    const COL_MAX_POINTS = 'reward_history.max_points';

    /**
     * the column name for the required_points field
     */
    const COL_REQUIRED_POINTS = 'reward_history.required_points';

    /**
     * the column name for the max_period field
     */
    const COL_MAX_PERIOD = 'reward_history.max_period';

    /**
     * the column name for the time_beg field
     */
    const COL_TIME_BEG = 'reward_history.time_beg';

    /**
     * the column name for the time_end field
     */
    const COL_TIME_END = 'reward_history.time_end';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'reward_history.update_user';

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
        self::TYPE_PHPNAME       => array('RewardId', 'PointSystemId', 'RewardCategoryId', 'RewardTypeId', 'Title', 'Description', 'Icon', 'YenPerPoint', 'PricePerUnit', 'MinPoints', 'MaxPoints', 'RequiredPoints', 'MaxPeriod', 'TimeBeg', 'TimeEnd', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('rewardId', 'pointSystemId', 'rewardCategoryId', 'rewardTypeId', 'title', 'description', 'icon', 'yenPerPoint', 'pricePerUnit', 'minPoints', 'maxPoints', 'requiredPoints', 'maxPeriod', 'timeBeg', 'timeEnd', 'updateUser', ),
        self::TYPE_COLNAME       => array(RewardHistoryTableMap::COL_REWARD_ID, RewardHistoryTableMap::COL_POINT_SYSTEM_ID, RewardHistoryTableMap::COL_REWARD_CATEGORY_ID, RewardHistoryTableMap::COL_REWARD_TYPE_ID, RewardHistoryTableMap::COL_TITLE, RewardHistoryTableMap::COL_DESCRIPTION, RewardHistoryTableMap::COL_ICON, RewardHistoryTableMap::COL_YEN_PER_POINT, RewardHistoryTableMap::COL_PRICE_PER_UNIT, RewardHistoryTableMap::COL_MIN_POINTS, RewardHistoryTableMap::COL_MAX_POINTS, RewardHistoryTableMap::COL_REQUIRED_POINTS, RewardHistoryTableMap::COL_MAX_PERIOD, RewardHistoryTableMap::COL_TIME_BEG, RewardHistoryTableMap::COL_TIME_END, RewardHistoryTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('reward_id', 'point_system_id', 'reward_category_id', 'reward_type_id', 'title', 'description', 'icon', 'yen_per_point', 'price_per_unit', 'min_points', 'max_points', 'required_points', 'max_period', 'time_beg', 'time_end', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('RewardId' => 0, 'PointSystemId' => 1, 'RewardCategoryId' => 2, 'RewardTypeId' => 3, 'Title' => 4, 'Description' => 5, 'Icon' => 6, 'YenPerPoint' => 7, 'PricePerUnit' => 8, 'MinPoints' => 9, 'MaxPoints' => 10, 'RequiredPoints' => 11, 'MaxPeriod' => 12, 'TimeBeg' => 13, 'TimeEnd' => 14, 'UpdateUser' => 15, ),
        self::TYPE_CAMELNAME     => array('rewardId' => 0, 'pointSystemId' => 1, 'rewardCategoryId' => 2, 'rewardTypeId' => 3, 'title' => 4, 'description' => 5, 'icon' => 6, 'yenPerPoint' => 7, 'pricePerUnit' => 8, 'minPoints' => 9, 'maxPoints' => 10, 'requiredPoints' => 11, 'maxPeriod' => 12, 'timeBeg' => 13, 'timeEnd' => 14, 'updateUser' => 15, ),
        self::TYPE_COLNAME       => array(RewardHistoryTableMap::COL_REWARD_ID => 0, RewardHistoryTableMap::COL_POINT_SYSTEM_ID => 1, RewardHistoryTableMap::COL_REWARD_CATEGORY_ID => 2, RewardHistoryTableMap::COL_REWARD_TYPE_ID => 3, RewardHistoryTableMap::COL_TITLE => 4, RewardHistoryTableMap::COL_DESCRIPTION => 5, RewardHistoryTableMap::COL_ICON => 6, RewardHistoryTableMap::COL_YEN_PER_POINT => 7, RewardHistoryTableMap::COL_PRICE_PER_UNIT => 8, RewardHistoryTableMap::COL_MIN_POINTS => 9, RewardHistoryTableMap::COL_MAX_POINTS => 10, RewardHistoryTableMap::COL_REQUIRED_POINTS => 11, RewardHistoryTableMap::COL_MAX_PERIOD => 12, RewardHistoryTableMap::COL_TIME_BEG => 13, RewardHistoryTableMap::COL_TIME_END => 14, RewardHistoryTableMap::COL_UPDATE_USER => 15, ),
        self::TYPE_FIELDNAME     => array('reward_id' => 0, 'point_system_id' => 1, 'reward_category_id' => 2, 'reward_type_id' => 3, 'title' => 4, 'description' => 5, 'icon' => 6, 'yen_per_point' => 7, 'price_per_unit' => 8, 'min_points' => 9, 'max_points' => 10, 'required_points' => 11, 'max_period' => 12, 'time_beg' => 13, 'time_end' => 14, 'update_user' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $this->setName('reward_history');
        $this->setPhpName('RewardHistory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\RewardHistory');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('reward_id', 'RewardId', 'INTEGER', true, null, null);
        $this->addColumn('point_system_id', 'PointSystemId', 'INTEGER', true, null, null);
        $this->addColumn('reward_category_id', 'RewardCategoryId', 'INTEGER', false, null, null);
        $this->addColumn('reward_type_id', 'RewardTypeId', 'INTEGER', false, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('icon', 'Icon', 'VARCHAR', false, 255, null);
        $this->addColumn('yen_per_point', 'YenPerPoint', 'DECIMAL', true, null, null);
        $this->addColumn('price_per_unit', 'PricePerUnit', 'INTEGER', false, null, null);
        $this->addColumn('min_points', 'MinPoints', 'INTEGER', false, null, null);
        $this->addColumn('max_points', 'MaxPoints', 'INTEGER', false, null, null);
        $this->addColumn('required_points', 'RequiredPoints', 'INTEGER', false, null, null);
        $this->addColumn('max_period', 'MaxPeriod', 'VARCHAR', false, 255, null);
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
     * @param \RewardHistory $obj A \RewardHistory object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getRewardId(), (string) $obj->getTimeBeg()));
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
     * @param mixed $value A \RewardHistory object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \RewardHistory) {
                $key = serialize(array((string) $value->getRewardId(), (string) $value->getTimeBeg()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \RewardHistory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RewardId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RewardId', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)]));
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
                : self::translateFieldName('RewardId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 13 + $offset
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
        return $withPrefix ? RewardHistoryTableMap::CLASS_DEFAULT : RewardHistoryTableMap::OM_CLASS;
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
     * @return array           (RewardHistory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RewardHistoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RewardHistoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RewardHistoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RewardHistoryTableMap::OM_CLASS;
            /** @var RewardHistory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RewardHistoryTableMap::addInstanceToPool($obj, $key);
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
            $key = RewardHistoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RewardHistoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var RewardHistory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RewardHistoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_REWARD_ID);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_POINT_SYSTEM_ID);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_REWARD_CATEGORY_ID);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_REWARD_TYPE_ID);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_TITLE);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_ICON);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_YEN_PER_POINT);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_PRICE_PER_UNIT);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_MIN_POINTS);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_MAX_POINTS);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_REQUIRED_POINTS);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_MAX_PERIOD);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_TIME_BEG);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_TIME_END);
            $criteria->addSelectColumn(RewardHistoryTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.reward_id');
            $criteria->addSelectColumn($alias . '.point_system_id');
            $criteria->addSelectColumn($alias . '.reward_category_id');
            $criteria->addSelectColumn($alias . '.reward_type_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.icon');
            $criteria->addSelectColumn($alias . '.yen_per_point');
            $criteria->addSelectColumn($alias . '.price_per_unit');
            $criteria->addSelectColumn($alias . '.min_points');
            $criteria->addSelectColumn($alias . '.max_points');
            $criteria->addSelectColumn($alias . '.required_points');
            $criteria->addSelectColumn($alias . '.max_period');
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
        return Propel::getServiceContainer()->getDatabaseMap(RewardHistoryTableMap::DATABASE_NAME)->getTable(RewardHistoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RewardHistoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RewardHistoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RewardHistoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a RewardHistory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or RewardHistory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(RewardHistoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \RewardHistory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RewardHistoryTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(RewardHistoryTableMap::COL_REWARD_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(RewardHistoryTableMap::COL_TIME_BEG, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = RewardHistoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RewardHistoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RewardHistoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the reward_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RewardHistoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a RewardHistory or Criteria object.
     *
     * @param mixed               $criteria Criteria or RewardHistory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RewardHistoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from RewardHistory object
        }


        // Set the correct dbName
        $query = RewardHistoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RewardHistoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RewardHistoryTableMap::buildTableMap();
