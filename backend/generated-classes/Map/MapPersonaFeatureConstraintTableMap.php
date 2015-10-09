<?php

namespace Map;

use \MapPersonaFeatureConstraint;
use \MapPersonaFeatureConstraintQuery;
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
 * This class defines the structure of the 'map_persona_feature_constraint' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MapPersonaFeatureConstraintTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MapPersonaFeatureConstraintTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'map_persona_feature_constraint';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MapPersonaFeatureConstraint';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MapPersonaFeatureConstraint';

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
     * the column name for the persona_id field
     */
    const COL_PERSONA_ID = 'map_persona_feature_constraint.persona_id';

    /**
     * the column name for the feature_type_id field
     */
    const COL_FEATURE_TYPE_ID = 'map_persona_feature_constraint.feature_type_id';

    /**
     * the column name for the priority_id field
     */
    const COL_PRIORITY_ID = 'map_persona_feature_constraint.priority_id';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'map_persona_feature_constraint.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'map_persona_feature_constraint.update_user';

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
        self::TYPE_PHPNAME       => array('PersonaId', 'FeatureTypeId', 'PriorityId', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('personaId', 'featureTypeId', 'priorityId', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID, MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, MapPersonaFeatureConstraintTableMap::COL_PRIORITY_ID, MapPersonaFeatureConstraintTableMap::COL_UPDATE_TIME, MapPersonaFeatureConstraintTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('persona_id', 'feature_type_id', 'priority_id', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PersonaId' => 0, 'FeatureTypeId' => 1, 'PriorityId' => 2, 'UpdateTime' => 3, 'UpdateUser' => 4, ),
        self::TYPE_CAMELNAME     => array('personaId' => 0, 'featureTypeId' => 1, 'priorityId' => 2, 'updateTime' => 3, 'updateUser' => 4, ),
        self::TYPE_COLNAME       => array(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID => 0, MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID => 1, MapPersonaFeatureConstraintTableMap::COL_PRIORITY_ID => 2, MapPersonaFeatureConstraintTableMap::COL_UPDATE_TIME => 3, MapPersonaFeatureConstraintTableMap::COL_UPDATE_USER => 4, ),
        self::TYPE_FIELDNAME     => array('persona_id' => 0, 'feature_type_id' => 1, 'priority_id' => 2, 'update_time' => 3, 'update_user' => 4, ),
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
        $this->setName('map_persona_feature_constraint');
        $this->setPhpName('MapPersonaFeatureConstraint');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MapPersonaFeatureConstraint');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('persona_id', 'PersonaId', 'INTEGER' , 'persona', 'persona_id', true, null, null);
        $this->addForeignPrimaryKey('feature_type_id', 'FeatureTypeId', 'INTEGER' , 'card_feature_type', 'feature_type_id', true, null, null);
        $this->addColumn('priority_id', 'PriorityId', 'INTEGER', false, null, 100);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', false, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', false, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CardFeatureType', '\\CardFeatureType', RelationMap::MANY_TO_ONE, array('feature_type_id' => 'feature_type_id', ), null, null);
        $this->addRelation('Persona', '\\Persona', RelationMap::MANY_TO_ONE, array('persona_id' => 'persona_id', ), null, null);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \MapPersonaFeatureConstraint $obj A \MapPersonaFeatureConstraint object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getPersonaId(), (string) $obj->getFeatureTypeId()));
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
     * @param mixed $value A \MapPersonaFeatureConstraint object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \MapPersonaFeatureConstraint) {
                $key = serialize(array((string) $value->getPersonaId(), (string) $value->getFeatureTypeId()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \MapPersonaFeatureConstraint object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersonaId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FeatureTypeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersonaId', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FeatureTypeId', TableMap::TYPE_PHPNAME, $indexType)]));
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
                : self::translateFieldName('PersonaId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('FeatureTypeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? MapPersonaFeatureConstraintTableMap::CLASS_DEFAULT : MapPersonaFeatureConstraintTableMap::OM_CLASS;
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
     * @return array           (MapPersonaFeatureConstraint object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MapPersonaFeatureConstraintTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MapPersonaFeatureConstraintTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MapPersonaFeatureConstraintTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MapPersonaFeatureConstraintTableMap::OM_CLASS;
            /** @var MapPersonaFeatureConstraint $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MapPersonaFeatureConstraintTableMap::addInstanceToPool($obj, $key);
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
            $key = MapPersonaFeatureConstraintTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MapPersonaFeatureConstraintTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MapPersonaFeatureConstraint $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MapPersonaFeatureConstraintTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID);
            $criteria->addSelectColumn(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID);
            $criteria->addSelectColumn(MapPersonaFeatureConstraintTableMap::COL_PRIORITY_ID);
            $criteria->addSelectColumn(MapPersonaFeatureConstraintTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(MapPersonaFeatureConstraintTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.persona_id');
            $criteria->addSelectColumn($alias . '.feature_type_id');
            $criteria->addSelectColumn($alias . '.priority_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(MapPersonaFeatureConstraintTableMap::DATABASE_NAME)->getTable(MapPersonaFeatureConstraintTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MapPersonaFeatureConstraintTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MapPersonaFeatureConstraintTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MapPersonaFeatureConstraintTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MapPersonaFeatureConstraint or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MapPersonaFeatureConstraint object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MapPersonaFeatureConstraintTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MapPersonaFeatureConstraint) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MapPersonaFeatureConstraintTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = MapPersonaFeatureConstraintQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MapPersonaFeatureConstraintTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MapPersonaFeatureConstraintTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the map_persona_feature_constraint table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MapPersonaFeatureConstraintQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MapPersonaFeatureConstraint or Criteria object.
     *
     * @param mixed               $criteria Criteria or MapPersonaFeatureConstraint object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MapPersonaFeatureConstraintTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MapPersonaFeatureConstraint object
        }


        // Set the correct dbName
        $query = MapPersonaFeatureConstraintQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MapPersonaFeatureConstraintTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MapPersonaFeatureConstraintTableMap::buildTableMap();
