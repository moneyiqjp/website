<?php

namespace Map;

use \Store;
use \StoreQuery;
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
 * This class defines the structure of the 'store' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class StoreTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.StoreTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'store';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Store';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Store';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the store_id field
     */
    const COL_STORE_ID = 'store.store_id';

    /**
     * the column name for the store_name field
     */
    const COL_STORE_NAME = 'store.store_name';

    /**
     * the column name for the store_category_id field
     */
    const COL_STORE_CATEGORY_ID = 'store.store_category_id';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'store.description';

    /**
     * the column name for the is_major field
     */
    const COL_IS_MAJOR = 'store.is_major';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'store.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'store.update_user';

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
        self::TYPE_PHPNAME       => array('StoreId', 'StoreName', 'StoreCategoryId', 'Description', 'IsMajor', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('storeId', 'storeName', 'storeCategoryId', 'description', 'isMajor', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(StoreTableMap::COL_STORE_ID, StoreTableMap::COL_STORE_NAME, StoreTableMap::COL_STORE_CATEGORY_ID, StoreTableMap::COL_DESCRIPTION, StoreTableMap::COL_IS_MAJOR, StoreTableMap::COL_UPDATE_TIME, StoreTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('store_id', 'store_name', 'store_category_id', 'description', 'is_major', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('StoreId' => 0, 'StoreName' => 1, 'StoreCategoryId' => 2, 'Description' => 3, 'IsMajor' => 4, 'UpdateTime' => 5, 'UpdateUser' => 6, ),
        self::TYPE_CAMELNAME     => array('storeId' => 0, 'storeName' => 1, 'storeCategoryId' => 2, 'description' => 3, 'isMajor' => 4, 'updateTime' => 5, 'updateUser' => 6, ),
        self::TYPE_COLNAME       => array(StoreTableMap::COL_STORE_ID => 0, StoreTableMap::COL_STORE_NAME => 1, StoreTableMap::COL_STORE_CATEGORY_ID => 2, StoreTableMap::COL_DESCRIPTION => 3, StoreTableMap::COL_IS_MAJOR => 4, StoreTableMap::COL_UPDATE_TIME => 5, StoreTableMap::COL_UPDATE_USER => 6, ),
        self::TYPE_FIELDNAME     => array('store_id' => 0, 'store_name' => 1, 'store_category_id' => 2, 'description' => 3, 'is_major' => 4, 'update_time' => 5, 'update_user' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('store');
        $this->setPhpName('Store');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Store');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('store_id', 'StoreId', 'INTEGER', true, null, null);
        $this->addColumn('store_name', 'StoreName', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('store_category_id', 'StoreCategoryId', 'INTEGER', 'store_category', 'store_category_id', true, null, 1);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('is_major', 'IsMajor', 'TINYINT', true, null, 0);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('StoreCategory', '\\StoreCategory', RelationMap::MANY_TO_ONE, array('store_category_id' => 'store_category_id', ), null, null);
        $this->addRelation('Discount', '\\Discount', RelationMap::ONE_TO_MANY, array('store_id' => 'store_id', ), null, null, 'Discounts');
        $this->addRelation('Discounts', '\\Discounts', RelationMap::ONE_TO_MANY, array('store_id' => 'store_id', ), null, null, 'Discountss');
        $this->addRelation('PointAcquisition', '\\PointAcquisition', RelationMap::ONE_TO_MANY, array('store_id' => 'store_id', ), null, null, 'PointAcquisitions');
        $this->addRelation('PointUsage', '\\PointUsage', RelationMap::ONE_TO_MANY, array('store_id' => 'store_id', ), null, null, 'PointUsages');
        $this->addRelation('PointUse', '\\PointUse', RelationMap::ONE_TO_MANY, array('store_id' => 'store_id', ), null, null, 'PointUses');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('StoreId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('StoreId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('StoreId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? StoreTableMap::CLASS_DEFAULT : StoreTableMap::OM_CLASS;
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
     * @return array           (Store object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = StoreTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = StoreTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + StoreTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = StoreTableMap::OM_CLASS;
            /** @var Store $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            StoreTableMap::addInstanceToPool($obj, $key);
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
            $key = StoreTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = StoreTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Store $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                StoreTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(StoreTableMap::COL_STORE_ID);
            $criteria->addSelectColumn(StoreTableMap::COL_STORE_NAME);
            $criteria->addSelectColumn(StoreTableMap::COL_STORE_CATEGORY_ID);
            $criteria->addSelectColumn(StoreTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(StoreTableMap::COL_IS_MAJOR);
            $criteria->addSelectColumn(StoreTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(StoreTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.store_id');
            $criteria->addSelectColumn($alias . '.store_name');
            $criteria->addSelectColumn($alias . '.store_category_id');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.is_major');
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
        return Propel::getServiceContainer()->getDatabaseMap(StoreTableMap::DATABASE_NAME)->getTable(StoreTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(StoreTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(StoreTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new StoreTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Store or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Store object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(StoreTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Store) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(StoreTableMap::DATABASE_NAME);
            $criteria->add(StoreTableMap::COL_STORE_ID, (array) $values, Criteria::IN);
        }

        $query = StoreQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            StoreTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                StoreTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the store table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return StoreQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Store or Criteria object.
     *
     * @param mixed               $criteria Criteria or Store object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StoreTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Store object
        }

        if ($criteria->containsKey(StoreTableMap::COL_STORE_ID) && $criteria->keyContainsValue(StoreTableMap::COL_STORE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.StoreTableMap::COL_STORE_ID.')');
        }


        // Set the correct dbName
        $query = StoreQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // StoreTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
StoreTableMap::buildTableMap();
