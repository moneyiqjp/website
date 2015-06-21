<?php

namespace Map;

use \Discount;
use \DiscountQuery;
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
 * This class defines the structure of the 'discount' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DiscountTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DiscountTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'discount';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Discount';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Discount';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the discount_id field
     */
    const COL_DISCOUNT_ID = 'discount.discount_id';

    /**
     * the column name for the point_system_id field
     */
    const COL_POINT_SYSTEM_ID = 'discount.point_system_id';

    /**
     * the column name for the percentage field
     */
    const COL_PERCENTAGE = 'discount.percentage';

    /**
     * the column name for the start_date field
     */
    const COL_START_DATE = 'discount.start_date';

    /**
     * the column name for the end_date field
     */
    const COL_END_DATE = 'discount.end_date';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'discount.description';

    /**
     * the column name for the store_id field
     */
    const COL_STORE_ID = 'discount.store_id';

    /**
     * the column name for the multiple field
     */
    const COL_MULTIPLE = 'discount.multiple';

    /**
     * the column name for the conditions field
     */
    const COL_CONDITIONS = 'discount.conditions';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'discount.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'discount.update_user';

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
        self::TYPE_PHPNAME       => array('DiscountId', 'PointSystemId', 'Percentage', 'StartDate', 'EndDate', 'Description', 'StoreId', 'Multiple', 'Conditions', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('discountId', 'pointSystemId', 'percentage', 'startDate', 'endDate', 'description', 'storeId', 'multiple', 'conditions', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(DiscountTableMap::COL_DISCOUNT_ID, DiscountTableMap::COL_POINT_SYSTEM_ID, DiscountTableMap::COL_PERCENTAGE, DiscountTableMap::COL_START_DATE, DiscountTableMap::COL_END_DATE, DiscountTableMap::COL_DESCRIPTION, DiscountTableMap::COL_STORE_ID, DiscountTableMap::COL_MULTIPLE, DiscountTableMap::COL_CONDITIONS, DiscountTableMap::COL_UPDATE_TIME, DiscountTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('discount_id', 'point_system_id', 'percentage', 'start_date', 'end_date', 'description', 'store_id', 'multiple', 'conditions', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('DiscountId' => 0, 'PointSystemId' => 1, 'Percentage' => 2, 'StartDate' => 3, 'EndDate' => 4, 'Description' => 5, 'StoreId' => 6, 'Multiple' => 7, 'Conditions' => 8, 'UpdateTime' => 9, 'UpdateUser' => 10, ),
        self::TYPE_CAMELNAME     => array('discountId' => 0, 'pointSystemId' => 1, 'percentage' => 2, 'startDate' => 3, 'endDate' => 4, 'description' => 5, 'storeId' => 6, 'multiple' => 7, 'conditions' => 8, 'updateTime' => 9, 'updateUser' => 10, ),
        self::TYPE_COLNAME       => array(DiscountTableMap::COL_DISCOUNT_ID => 0, DiscountTableMap::COL_POINT_SYSTEM_ID => 1, DiscountTableMap::COL_PERCENTAGE => 2, DiscountTableMap::COL_START_DATE => 3, DiscountTableMap::COL_END_DATE => 4, DiscountTableMap::COL_DESCRIPTION => 5, DiscountTableMap::COL_STORE_ID => 6, DiscountTableMap::COL_MULTIPLE => 7, DiscountTableMap::COL_CONDITIONS => 8, DiscountTableMap::COL_UPDATE_TIME => 9, DiscountTableMap::COL_UPDATE_USER => 10, ),
        self::TYPE_FIELDNAME     => array('discount_id' => 0, 'point_system_id' => 1, 'percentage' => 2, 'start_date' => 3, 'end_date' => 4, 'description' => 5, 'store_id' => 6, 'multiple' => 7, 'conditions' => 8, 'update_time' => 9, 'update_user' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('discount');
        $this->setPhpName('Discount');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Discount');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('discount_id', 'DiscountId', 'INTEGER', true, null, null);
        $this->addForeignKey('point_system_id', 'PointSystemId', 'INTEGER', 'point_system', 'point_system_id', true, null, null);
        $this->addColumn('percentage', 'Percentage', 'DOUBLE', true, 15, null);
        $this->addColumn('start_date', 'StartDate', 'DATE', false, null, null);
        $this->addColumn('end_date', 'EndDate', 'DATE', false, null, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('store_id', 'StoreId', 'INTEGER', 'store', 'store_id', true, null, null);
        $this->addColumn('multiple', 'Multiple', 'DOUBLE', true, 30, null);
        $this->addColumn('conditions', 'Conditions', 'LONGVARCHAR', false, null, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PointSystem', '\\PointSystem', RelationMap::MANY_TO_ONE, array('point_system_id' => 'point_system_id', ), null, null);
        $this->addRelation('Store', '\\Store', RelationMap::MANY_TO_ONE, array('store_id' => 'store_id', ), null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DiscountId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DiscountId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('DiscountId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? DiscountTableMap::CLASS_DEFAULT : DiscountTableMap::OM_CLASS;
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
     * @return array           (Discount object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DiscountTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DiscountTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DiscountTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DiscountTableMap::OM_CLASS;
            /** @var Discount $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DiscountTableMap::addInstanceToPool($obj, $key);
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
            $key = DiscountTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DiscountTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Discount $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DiscountTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DiscountTableMap::COL_DISCOUNT_ID);
            $criteria->addSelectColumn(DiscountTableMap::COL_POINT_SYSTEM_ID);
            $criteria->addSelectColumn(DiscountTableMap::COL_PERCENTAGE);
            $criteria->addSelectColumn(DiscountTableMap::COL_START_DATE);
            $criteria->addSelectColumn(DiscountTableMap::COL_END_DATE);
            $criteria->addSelectColumn(DiscountTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(DiscountTableMap::COL_STORE_ID);
            $criteria->addSelectColumn(DiscountTableMap::COL_MULTIPLE);
            $criteria->addSelectColumn(DiscountTableMap::COL_CONDITIONS);
            $criteria->addSelectColumn(DiscountTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(DiscountTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.discount_id');
            $criteria->addSelectColumn($alias . '.point_system_id');
            $criteria->addSelectColumn($alias . '.percentage');
            $criteria->addSelectColumn($alias . '.start_date');
            $criteria->addSelectColumn($alias . '.end_date');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.store_id');
            $criteria->addSelectColumn($alias . '.multiple');
            $criteria->addSelectColumn($alias . '.conditions');
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
        return Propel::getServiceContainer()->getDatabaseMap(DiscountTableMap::DATABASE_NAME)->getTable(DiscountTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DiscountTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DiscountTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DiscountTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Discount or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Discount object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DiscountTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Discount) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DiscountTableMap::DATABASE_NAME);
            $criteria->add(DiscountTableMap::COL_DISCOUNT_ID, (array) $values, Criteria::IN);
        }

        $query = DiscountQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DiscountTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DiscountTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the discount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DiscountQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Discount or Criteria object.
     *
     * @param mixed               $criteria Criteria or Discount object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DiscountTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Discount object
        }

        if ($criteria->containsKey(DiscountTableMap::COL_DISCOUNT_ID) && $criteria->keyContainsValue(DiscountTableMap::COL_DISCOUNT_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DiscountTableMap::COL_DISCOUNT_ID.')');
        }


        // Set the correct dbName
        $query = DiscountQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DiscountTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DiscountTableMap::buildTableMap();
