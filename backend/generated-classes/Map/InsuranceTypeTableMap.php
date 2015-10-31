<?php

namespace Map;

use \InsuranceType;
use \InsuranceTypeQuery;
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
 * This class defines the structure of the 'insurance_type' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InsuranceTypeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.InsuranceTypeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'insurance_type';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\InsuranceType';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'InsuranceType';

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
     * the column name for the insurance_type_id field
     */
    const COL_INSURANCE_TYPE_ID = 'insurance_type.insurance_type_id';

    /**
     * the column name for the type_name field
     */
    const COL_TYPE_NAME = 'insurance_type.type_name';

    /**
     * the column name for the type_display field
     */
    const COL_TYPE_DISPLAY = 'insurance_type.type_display';

    /**
     * the column name for the subtype_name field
     */
    const COL_SUBTYPE_NAME = 'insurance_type.subtype_name';

    /**
     * the column name for the subtype_display field
     */
    const COL_SUBTYPE_DISPLAY = 'insurance_type.subtype_display';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'insurance_type.description';

    /**
     * the column name for the region field
     */
    const COL_REGION = 'insurance_type.region';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'insurance_type.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'insurance_type.update_user';

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
        self::TYPE_PHPNAME       => array('InsuranceTypeId', 'TypeName', 'TypeDisplay', 'SubtypeName', 'SubtypeDisplay', 'Description', 'Region', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('insuranceTypeId', 'typeName', 'typeDisplay', 'subtypeName', 'subtypeDisplay', 'description', 'region', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID, InsuranceTypeTableMap::COL_TYPE_NAME, InsuranceTypeTableMap::COL_TYPE_DISPLAY, InsuranceTypeTableMap::COL_SUBTYPE_NAME, InsuranceTypeTableMap::COL_SUBTYPE_DISPLAY, InsuranceTypeTableMap::COL_DESCRIPTION, InsuranceTypeTableMap::COL_REGION, InsuranceTypeTableMap::COL_UPDATE_TIME, InsuranceTypeTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('insurance_type_id', 'type_name', 'type_display', 'subtype_name', 'subtype_display', 'description', 'region', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('InsuranceTypeId' => 0, 'TypeName' => 1, 'TypeDisplay' => 2, 'SubtypeName' => 3, 'SubtypeDisplay' => 4, 'Description' => 5, 'Region' => 6, 'UpdateTime' => 7, 'UpdateUser' => 8, ),
        self::TYPE_CAMELNAME     => array('insuranceTypeId' => 0, 'typeName' => 1, 'typeDisplay' => 2, 'subtypeName' => 3, 'subtypeDisplay' => 4, 'description' => 5, 'region' => 6, 'updateTime' => 7, 'updateUser' => 8, ),
        self::TYPE_COLNAME       => array(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID => 0, InsuranceTypeTableMap::COL_TYPE_NAME => 1, InsuranceTypeTableMap::COL_TYPE_DISPLAY => 2, InsuranceTypeTableMap::COL_SUBTYPE_NAME => 3, InsuranceTypeTableMap::COL_SUBTYPE_DISPLAY => 4, InsuranceTypeTableMap::COL_DESCRIPTION => 5, InsuranceTypeTableMap::COL_REGION => 6, InsuranceTypeTableMap::COL_UPDATE_TIME => 7, InsuranceTypeTableMap::COL_UPDATE_USER => 8, ),
        self::TYPE_FIELDNAME     => array('insurance_type_id' => 0, 'type_name' => 1, 'type_display' => 2, 'subtype_name' => 3, 'subtype_display' => 4, 'description' => 5, 'region' => 6, 'update_time' => 7, 'update_user' => 8, ),
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
        $this->setName('insurance_type');
        $this->setPhpName('InsuranceType');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\InsuranceType');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('insurance_type_id', 'InsuranceTypeId', 'INTEGER', true, null, null);
        $this->addColumn('type_name', 'TypeName', 'VARCHAR', true, 255, null);
        $this->addColumn('type_display', 'TypeDisplay', 'VARCHAR', false, 255, null);
        $this->addColumn('subtype_name', 'SubtypeName', 'VARCHAR', true, 255, null);
        $this->addColumn('subtype_display', 'SubtypeDisplay', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('region', 'Region', 'VARCHAR', false, 255, 'Global');
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Insurance', '\\Insurance', RelationMap::ONE_TO_MANY, array('insurance_type_id' => 'insurance_type_id', ), null, null, 'Insurances');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InsuranceTypeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InsuranceTypeId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('InsuranceTypeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? InsuranceTypeTableMap::CLASS_DEFAULT : InsuranceTypeTableMap::OM_CLASS;
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
     * @return array           (InsuranceType object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InsuranceTypeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InsuranceTypeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InsuranceTypeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InsuranceTypeTableMap::OM_CLASS;
            /** @var InsuranceType $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InsuranceTypeTableMap::addInstanceToPool($obj, $key);
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
            $key = InsuranceTypeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InsuranceTypeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InsuranceType $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InsuranceTypeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID);
            $criteria->addSelectColumn(InsuranceTypeTableMap::COL_TYPE_NAME);
            $criteria->addSelectColumn(InsuranceTypeTableMap::COL_TYPE_DISPLAY);
            $criteria->addSelectColumn(InsuranceTypeTableMap::COL_SUBTYPE_NAME);
            $criteria->addSelectColumn(InsuranceTypeTableMap::COL_SUBTYPE_DISPLAY);
            $criteria->addSelectColumn(InsuranceTypeTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(InsuranceTypeTableMap::COL_REGION);
            $criteria->addSelectColumn(InsuranceTypeTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(InsuranceTypeTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.insurance_type_id');
            $criteria->addSelectColumn($alias . '.type_name');
            $criteria->addSelectColumn($alias . '.type_display');
            $criteria->addSelectColumn($alias . '.subtype_name');
            $criteria->addSelectColumn($alias . '.subtype_display');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.region');
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
        return Propel::getServiceContainer()->getDatabaseMap(InsuranceTypeTableMap::DATABASE_NAME)->getTable(InsuranceTypeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InsuranceTypeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InsuranceTypeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InsuranceTypeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InsuranceType or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InsuranceType object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceTypeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \InsuranceType) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InsuranceTypeTableMap::DATABASE_NAME);
            $criteria->add(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID, (array) $values, Criteria::IN);
        }

        $query = InsuranceTypeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InsuranceTypeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InsuranceTypeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the insurance_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InsuranceTypeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InsuranceType or Criteria object.
     *
     * @param mixed               $criteria Criteria or InsuranceType object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceTypeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InsuranceType object
        }

        if ($criteria->containsKey(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID) && $criteria->keyContainsValue(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID.')');
        }


        // Set the correct dbName
        $query = InsuranceTypeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InsuranceTypeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InsuranceTypeTableMap::buildTableMap();
