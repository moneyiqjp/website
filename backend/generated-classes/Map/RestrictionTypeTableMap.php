<?php

namespace Map;

use \RestrictionType;
use \RestrictionTypeQuery;
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
 * This class defines the structure of the 'restriction_type' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RestrictionTypeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RestrictionTypeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'restriction_type';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\RestrictionType';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'RestrictionType';

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
     * the column name for the restriction_type_id field
     */
    const COL_RESTRICTION_TYPE_ID = 'restriction_type.restriction_type_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'restriction_type.name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'restriction_type.description';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'restriction_type.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'restriction_type.update_user';

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
        self::TYPE_PHPNAME       => array('RestrictionTypeId', 'Name', 'Description', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('restrictionTypeId', 'name', 'description', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, RestrictionTypeTableMap::COL_NAME, RestrictionTypeTableMap::COL_DESCRIPTION, RestrictionTypeTableMap::COL_UPDATE_TIME, RestrictionTypeTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('restriction_type_id', 'name', 'description', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('RestrictionTypeId' => 0, 'Name' => 1, 'Description' => 2, 'UpdateTime' => 3, 'UpdateUser' => 4, ),
        self::TYPE_CAMELNAME     => array('restrictionTypeId' => 0, 'name' => 1, 'description' => 2, 'updateTime' => 3, 'updateUser' => 4, ),
        self::TYPE_COLNAME       => array(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID => 0, RestrictionTypeTableMap::COL_NAME => 1, RestrictionTypeTableMap::COL_DESCRIPTION => 2, RestrictionTypeTableMap::COL_UPDATE_TIME => 3, RestrictionTypeTableMap::COL_UPDATE_USER => 4, ),
        self::TYPE_FIELDNAME     => array('restriction_type_id' => 0, 'name' => 1, 'description' => 2, 'update_time' => 3, 'update_user' => 4, ),
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
        $this->setName('restriction_type');
        $this->setPhpName('RestrictionType');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\RestrictionType');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('restriction_type_id', 'RestrictionTypeId', 'INTEGER', true, null, null);
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
        $this->addRelation('PersonaRestriction', '\\PersonaRestriction', RelationMap::ONE_TO_MANY, array('restriction_type_id' => 'restriction_type_id', ), null, null, 'PersonaRestrictions');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RestrictionTypeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RestrictionTypeId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('RestrictionTypeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? RestrictionTypeTableMap::CLASS_DEFAULT : RestrictionTypeTableMap::OM_CLASS;
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
     * @return array           (RestrictionType object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RestrictionTypeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RestrictionTypeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RestrictionTypeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RestrictionTypeTableMap::OM_CLASS;
            /** @var RestrictionType $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RestrictionTypeTableMap::addInstanceToPool($obj, $key);
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
            $key = RestrictionTypeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RestrictionTypeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var RestrictionType $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RestrictionTypeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID);
            $criteria->addSelectColumn(RestrictionTypeTableMap::COL_NAME);
            $criteria->addSelectColumn(RestrictionTypeTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(RestrictionTypeTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(RestrictionTypeTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.restriction_type_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(RestrictionTypeTableMap::DATABASE_NAME)->getTable(RestrictionTypeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RestrictionTypeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RestrictionTypeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RestrictionTypeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a RestrictionType or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or RestrictionType object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(RestrictionTypeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \RestrictionType) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RestrictionTypeTableMap::DATABASE_NAME);
            $criteria->add(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, (array) $values, Criteria::IN);
        }

        $query = RestrictionTypeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RestrictionTypeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RestrictionTypeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the restriction_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RestrictionTypeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a RestrictionType or Criteria object.
     *
     * @param mixed               $criteria Criteria or RestrictionType object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RestrictionTypeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from RestrictionType object
        }

        if ($criteria->containsKey(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID) && $criteria->keyContainsValue(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID.')');
        }


        // Set the correct dbName
        $query = RestrictionTypeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RestrictionTypeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RestrictionTypeTableMap::buildTableMap();
