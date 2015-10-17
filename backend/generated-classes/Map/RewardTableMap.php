<?php

namespace Map;

use \Reward;
use \RewardQuery;
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
 * This class defines the structure of the 'reward' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RewardTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RewardTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'reward';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Reward';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Reward';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 19;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 19;

    /**
     * the column name for the reward_id field
     */
    const COL_REWARD_ID = 'reward.reward_id';

    /**
     * the column name for the point_system_id field
     */
    const COL_POINT_SYSTEM_ID = 'reward.point_system_id';

    /**
     * the column name for the store_id field
     */
    const COL_STORE_ID = 'reward.store_id';

    /**
     * the column name for the reward_category_id field
     */
    const COL_REWARD_CATEGORY_ID = 'reward.reward_category_id';

    /**
     * the column name for the reward_type_id field
     */
    const COL_REWARD_TYPE_ID = 'reward.reward_type_id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'reward.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'reward.description';

    /**
     * the column name for the icon field
     */
    const COL_ICON = 'reward.icon';

    /**
     * the column name for the yen_per_point field
     */
    const COL_YEN_PER_POINT = 'reward.yen_per_point';

    /**
     * the column name for the price_per_unit field
     */
    const COL_PRICE_PER_UNIT = 'reward.price_per_unit';

    /**
     * the column name for the min_points field
     */
    const COL_MIN_POINTS = 'reward.min_points';

    /**
     * the column name for the max_points field
     */
    const COL_MAX_POINTS = 'reward.max_points';

    /**
     * the column name for the required_points field
     */
    const COL_REQUIRED_POINTS = 'reward.required_points';

    /**
     * the column name for the max_period field
     */
    const COL_MAX_PERIOD = 'reward.max_period';

    /**
     * the column name for the point_multiplier field
     */
    const COL_POINT_MULTIPLIER = 'reward.point_multiplier';

    /**
     * the column name for the unit_id field
     */
    const COL_UNIT_ID = 'reward.unit_id';

    /**
     * the column name for the reference field
     */
    const COL_REFERENCE = 'reward.reference';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'reward.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'reward.update_user';

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
        self::TYPE_PHPNAME       => array('RewardId', 'PointSystemId', 'StoreId', 'RewardCategoryId', 'RewardTypeId', 'Title', 'Description', 'Icon', 'YenPerPoint', 'PricePerUnit', 'MinPoints', 'MaxPoints', 'RequiredPoints', 'MaxPeriod', 'PointMultiplier', 'UnitId', 'Reference', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('rewardId', 'pointSystemId', 'storeId', 'rewardCategoryId', 'rewardTypeId', 'title', 'description', 'icon', 'yenPerPoint', 'pricePerUnit', 'minPoints', 'maxPoints', 'requiredPoints', 'maxPeriod', 'pointMultiplier', 'unitId', 'reference', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(RewardTableMap::COL_REWARD_ID, RewardTableMap::COL_POINT_SYSTEM_ID, RewardTableMap::COL_STORE_ID, RewardTableMap::COL_REWARD_CATEGORY_ID, RewardTableMap::COL_REWARD_TYPE_ID, RewardTableMap::COL_TITLE, RewardTableMap::COL_DESCRIPTION, RewardTableMap::COL_ICON, RewardTableMap::COL_YEN_PER_POINT, RewardTableMap::COL_PRICE_PER_UNIT, RewardTableMap::COL_MIN_POINTS, RewardTableMap::COL_MAX_POINTS, RewardTableMap::COL_REQUIRED_POINTS, RewardTableMap::COL_MAX_PERIOD, RewardTableMap::COL_POINT_MULTIPLIER, RewardTableMap::COL_UNIT_ID, RewardTableMap::COL_REFERENCE, RewardTableMap::COL_UPDATE_TIME, RewardTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('reward_id', 'point_system_id', 'store_id', 'reward_category_id', 'reward_type_id', 'title', 'description', 'icon', 'yen_per_point', 'price_per_unit', 'min_points', 'max_points', 'required_points', 'max_period', 'point_multiplier', 'unit_id', 'reference', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('RewardId' => 0, 'PointSystemId' => 1, 'StoreId' => 2, 'RewardCategoryId' => 3, 'RewardTypeId' => 4, 'Title' => 5, 'Description' => 6, 'Icon' => 7, 'YenPerPoint' => 8, 'PricePerUnit' => 9, 'MinPoints' => 10, 'MaxPoints' => 11, 'RequiredPoints' => 12, 'MaxPeriod' => 13, 'PointMultiplier' => 14, 'UnitId' => 15, 'Reference' => 16, 'UpdateTime' => 17, 'UpdateUser' => 18, ),
        self::TYPE_CAMELNAME     => array('rewardId' => 0, 'pointSystemId' => 1, 'storeId' => 2, 'rewardCategoryId' => 3, 'rewardTypeId' => 4, 'title' => 5, 'description' => 6, 'icon' => 7, 'yenPerPoint' => 8, 'pricePerUnit' => 9, 'minPoints' => 10, 'maxPoints' => 11, 'requiredPoints' => 12, 'maxPeriod' => 13, 'pointMultiplier' => 14, 'unitId' => 15, 'reference' => 16, 'updateTime' => 17, 'updateUser' => 18, ),
        self::TYPE_COLNAME       => array(RewardTableMap::COL_REWARD_ID => 0, RewardTableMap::COL_POINT_SYSTEM_ID => 1, RewardTableMap::COL_STORE_ID => 2, RewardTableMap::COL_REWARD_CATEGORY_ID => 3, RewardTableMap::COL_REWARD_TYPE_ID => 4, RewardTableMap::COL_TITLE => 5, RewardTableMap::COL_DESCRIPTION => 6, RewardTableMap::COL_ICON => 7, RewardTableMap::COL_YEN_PER_POINT => 8, RewardTableMap::COL_PRICE_PER_UNIT => 9, RewardTableMap::COL_MIN_POINTS => 10, RewardTableMap::COL_MAX_POINTS => 11, RewardTableMap::COL_REQUIRED_POINTS => 12, RewardTableMap::COL_MAX_PERIOD => 13, RewardTableMap::COL_POINT_MULTIPLIER => 14, RewardTableMap::COL_UNIT_ID => 15, RewardTableMap::COL_REFERENCE => 16, RewardTableMap::COL_UPDATE_TIME => 17, RewardTableMap::COL_UPDATE_USER => 18, ),
        self::TYPE_FIELDNAME     => array('reward_id' => 0, 'point_system_id' => 1, 'store_id' => 2, 'reward_category_id' => 3, 'reward_type_id' => 4, 'title' => 5, 'description' => 6, 'icon' => 7, 'yen_per_point' => 8, 'price_per_unit' => 9, 'min_points' => 10, 'max_points' => 11, 'required_points' => 12, 'max_period' => 13, 'point_multiplier' => 14, 'unit_id' => 15, 'reference' => 16, 'update_time' => 17, 'update_user' => 18, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $this->setName('reward');
        $this->setPhpName('Reward');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Reward');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('reward_id', 'RewardId', 'INTEGER', true, null, null);
        $this->addForeignKey('point_system_id', 'PointSystemId', 'INTEGER', 'point_system', 'point_system_id', true, null, null);
        $this->addForeignKey('store_id', 'StoreId', 'INTEGER', 'store', 'store_id', false, null, null);
        $this->addForeignKey('reward_category_id', 'RewardCategoryId', 'INTEGER', 'reward_category', 'reward_category_id', false, null, null);
        $this->addForeignKey('reward_type_id', 'RewardTypeId', 'INTEGER', 'reward_type', 'reward_type_id', false, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('icon', 'Icon', 'VARCHAR', false, 255, null);
        $this->addColumn('yen_per_point', 'YenPerPoint', 'DECIMAL', true, null, null);
        $this->addColumn('price_per_unit', 'PricePerUnit', 'INTEGER', false, null, null);
        $this->addColumn('min_points', 'MinPoints', 'INTEGER', false, null, null);
        $this->addColumn('max_points', 'MaxPoints', 'INTEGER', false, null, null);
        $this->addColumn('required_points', 'RequiredPoints', 'INTEGER', false, null, null);
        $this->addColumn('max_period', 'MaxPeriod', 'VARCHAR', false, 255, null);
        $this->addColumn('point_multiplier', 'PointMultiplier', 'DECIMAL', true, null, 1);
        $this->addForeignKey('unit_id', 'UnitId', 'INTEGER', 'unit', 'unit_id', true, null, 1);
        $this->addColumn('reference', 'Reference', 'VARCHAR', false, 255, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('RewardCategory', '\\RewardCategory', RelationMap::MANY_TO_ONE, array('reward_category_id' => 'reward_category_id', ), null, null);
        $this->addRelation('PointSystem', '\\PointSystem', RelationMap::MANY_TO_ONE, array('point_system_id' => 'point_system_id', ), null, null);
        $this->addRelation('RewardType', '\\RewardType', RelationMap::MANY_TO_ONE, array('reward_type_id' => 'reward_type_id', ), null, null);
        $this->addRelation('Store', '\\Store', RelationMap::MANY_TO_ONE, array('store_id' => 'store_id', ), null, null);
        $this->addRelation('Unit', '\\Unit', RelationMap::MANY_TO_ONE, array('unit_id' => 'unit_id', ), null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RewardId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RewardId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('RewardId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? RewardTableMap::CLASS_DEFAULT : RewardTableMap::OM_CLASS;
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
     * @return array           (Reward object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RewardTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RewardTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RewardTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RewardTableMap::OM_CLASS;
            /** @var Reward $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RewardTableMap::addInstanceToPool($obj, $key);
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
            $key = RewardTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RewardTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Reward $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RewardTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(RewardTableMap::COL_REWARD_ID);
            $criteria->addSelectColumn(RewardTableMap::COL_POINT_SYSTEM_ID);
            $criteria->addSelectColumn(RewardTableMap::COL_STORE_ID);
            $criteria->addSelectColumn(RewardTableMap::COL_REWARD_CATEGORY_ID);
            $criteria->addSelectColumn(RewardTableMap::COL_REWARD_TYPE_ID);
            $criteria->addSelectColumn(RewardTableMap::COL_TITLE);
            $criteria->addSelectColumn(RewardTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(RewardTableMap::COL_ICON);
            $criteria->addSelectColumn(RewardTableMap::COL_YEN_PER_POINT);
            $criteria->addSelectColumn(RewardTableMap::COL_PRICE_PER_UNIT);
            $criteria->addSelectColumn(RewardTableMap::COL_MIN_POINTS);
            $criteria->addSelectColumn(RewardTableMap::COL_MAX_POINTS);
            $criteria->addSelectColumn(RewardTableMap::COL_REQUIRED_POINTS);
            $criteria->addSelectColumn(RewardTableMap::COL_MAX_PERIOD);
            $criteria->addSelectColumn(RewardTableMap::COL_POINT_MULTIPLIER);
            $criteria->addSelectColumn(RewardTableMap::COL_UNIT_ID);
            $criteria->addSelectColumn(RewardTableMap::COL_REFERENCE);
            $criteria->addSelectColumn(RewardTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(RewardTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.reward_id');
            $criteria->addSelectColumn($alias . '.point_system_id');
            $criteria->addSelectColumn($alias . '.store_id');
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
            $criteria->addSelectColumn($alias . '.point_multiplier');
            $criteria->addSelectColumn($alias . '.unit_id');
            $criteria->addSelectColumn($alias . '.reference');
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
        return Propel::getServiceContainer()->getDatabaseMap(RewardTableMap::DATABASE_NAME)->getTable(RewardTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RewardTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RewardTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RewardTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Reward or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Reward object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Reward) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RewardTableMap::DATABASE_NAME);
            $criteria->add(RewardTableMap::COL_REWARD_ID, (array) $values, Criteria::IN);
        }

        $query = RewardQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RewardTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RewardTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the reward table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RewardQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Reward or Criteria object.
     *
     * @param mixed               $criteria Criteria or Reward object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Reward object
        }

        if ($criteria->containsKey(RewardTableMap::COL_REWARD_ID) && $criteria->keyContainsValue(RewardTableMap::COL_REWARD_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RewardTableMap::COL_REWARD_ID.')');
        }


        // Set the correct dbName
        $query = RewardQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RewardTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RewardTableMap::buildTableMap();
