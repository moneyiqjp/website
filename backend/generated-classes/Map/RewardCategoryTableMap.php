<?php

namespace Map;

use \RewardCategory;
use \RewardCategoryQuery;
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
 * This class defines the structure of the 'reward_category' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RewardCategoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RewardCategoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'reward_category';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\RewardCategory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'RewardCategory';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the reward_category_id field
     */
    const COL_REWARD_CATEGORY_ID = 'reward_category.reward_category_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'reward_category.name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'reward_category.description';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'reward_category.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'reward_category.update_user';

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
        self::TYPE_PHPNAME       => array('RewardCategoryId', 'Name', 'Description', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('rewardCategoryId', 'name', 'description', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(RewardCategoryTableMap::COL_REWARD_CATEGORY_ID, RewardCategoryTableMap::COL_NAME, RewardCategoryTableMap::COL_DESCRIPTION, RewardCategoryTableMap::COL_UPDATE_TIME, RewardCategoryTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('reward_category_id', 'name', 'description', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('RewardCategoryId' => 0, 'Name' => 1, 'Description' => 2, 'UpdateTime' => 3, 'UpdateUser' => 4, ),
        self::TYPE_CAMELNAME     => array('rewardCategoryId' => 0, 'name' => 1, 'description' => 2, 'updateTime' => 3, 'updateUser' => 4, ),
        self::TYPE_COLNAME       => array(RewardCategoryTableMap::COL_REWARD_CATEGORY_ID => 0, RewardCategoryTableMap::COL_NAME => 1, RewardCategoryTableMap::COL_DESCRIPTION => 2, RewardCategoryTableMap::COL_UPDATE_TIME => 3, RewardCategoryTableMap::COL_UPDATE_USER => 4, ),
        self::TYPE_FIELDNAME     => array('reward_category_id' => 0, 'name' => 1, 'description' => 2, 'update_time' => 3, 'update_user' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('reward_category');
        $this->setPhpName('RewardCategory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\RewardCategory');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('reward_category_id', 'RewardCategoryId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MapSceneRewardCategory', '\\MapSceneRewardCategory', RelationMap::ONE_TO_MANY, array('reward_category_id' => 'reward_category_id', ), null, null, 'MapSceneRewardCategories');
        $this->addRelation('Reward', '\\Reward', RelationMap::ONE_TO_MANY, array('reward_category_id' => 'reward_category_id', ), null, null, 'Rewards');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RewardCategoryId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RewardCategoryId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('RewardCategoryId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? RewardCategoryTableMap::CLASS_DEFAULT : RewardCategoryTableMap::OM_CLASS;
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
     * @return array           (RewardCategory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RewardCategoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RewardCategoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RewardCategoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RewardCategoryTableMap::OM_CLASS;
            /** @var RewardCategory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RewardCategoryTableMap::addInstanceToPool($obj, $key);
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
            $key = RewardCategoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RewardCategoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var RewardCategory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RewardCategoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(RewardCategoryTableMap::COL_REWARD_CATEGORY_ID);
            $criteria->addSelectColumn(RewardCategoryTableMap::COL_NAME);
            $criteria->addSelectColumn(RewardCategoryTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(RewardCategoryTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(RewardCategoryTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.reward_category_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
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
        return Propel::getServiceContainer()->getDatabaseMap(RewardCategoryTableMap::DATABASE_NAME)->getTable(RewardCategoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RewardCategoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RewardCategoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RewardCategoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a RewardCategory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or RewardCategory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(RewardCategoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \RewardCategory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RewardCategoryTableMap::DATABASE_NAME);
            $criteria->add(RewardCategoryTableMap::COL_REWARD_CATEGORY_ID, (array) $values, Criteria::IN);
        }

        $query = RewardCategoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RewardCategoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RewardCategoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the reward_category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RewardCategoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a RewardCategory or Criteria object.
     *
     * @param mixed               $criteria Criteria or RewardCategory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RewardCategoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from RewardCategory object
        }

        if ($criteria->containsKey(RewardCategoryTableMap::COL_REWARD_CATEGORY_ID) && $criteria->keyContainsValue(RewardCategoryTableMap::COL_REWARD_CATEGORY_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RewardCategoryTableMap::COL_REWARD_CATEGORY_ID.')');
        }


        // Set the correct dbName
        $query = RewardCategoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RewardCategoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RewardCategoryTableMap::buildTableMap();
