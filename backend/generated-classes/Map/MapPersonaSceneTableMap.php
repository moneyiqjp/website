<?php

namespace Map;

use \MapPersonaScene;
use \MapPersonaSceneQuery;
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
 * This class defines the structure of the 'map_persona_scene' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MapPersonaSceneTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MapPersonaSceneTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'map_persona_scene';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MapPersonaScene';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MapPersonaScene';

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
     * the column name for the persona_id field
     */
    const COL_PERSONA_ID = 'map_persona_scene.persona_id';

    /**
     * the column name for the scene_id field
     */
    const COL_SCENE_ID = 'map_persona_scene.scene_id';

    /**
     * the column name for the percentage field
     */
    const COL_PERCENTAGE = 'map_persona_scene.percentage';

    /**
     * the column name for the priority_id field
     */
    const COL_PRIORITY_ID = 'map_persona_scene.priority_id';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'map_persona_scene.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'map_persona_scene.update_user';

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
        self::TYPE_PHPNAME       => array('PersonaId', 'SceneId', 'Percentage', 'PriorityId', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('personaId', 'sceneId', 'percentage', 'priorityId', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(MapPersonaSceneTableMap::COL_PERSONA_ID, MapPersonaSceneTableMap::COL_SCENE_ID, MapPersonaSceneTableMap::COL_PERCENTAGE, MapPersonaSceneTableMap::COL_PRIORITY_ID, MapPersonaSceneTableMap::COL_UPDATE_TIME, MapPersonaSceneTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('persona_id', 'scene_id', 'percentage', 'priority_id', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PersonaId' => 0, 'SceneId' => 1, 'Percentage' => 2, 'PriorityId' => 3, 'UpdateTime' => 4, 'UpdateUser' => 5, ),
        self::TYPE_CAMELNAME     => array('personaId' => 0, 'sceneId' => 1, 'percentage' => 2, 'priorityId' => 3, 'updateTime' => 4, 'updateUser' => 5, ),
        self::TYPE_COLNAME       => array(MapPersonaSceneTableMap::COL_PERSONA_ID => 0, MapPersonaSceneTableMap::COL_SCENE_ID => 1, MapPersonaSceneTableMap::COL_PERCENTAGE => 2, MapPersonaSceneTableMap::COL_PRIORITY_ID => 3, MapPersonaSceneTableMap::COL_UPDATE_TIME => 4, MapPersonaSceneTableMap::COL_UPDATE_USER => 5, ),
        self::TYPE_FIELDNAME     => array('persona_id' => 0, 'scene_id' => 1, 'percentage' => 2, 'priority_id' => 3, 'update_time' => 4, 'update_user' => 5, ),
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
        $this->setName('map_persona_scene');
        $this->setPhpName('MapPersonaScene');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MapPersonaScene');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('persona_id', 'PersonaId', 'INTEGER' , 'persona', 'persona_id', true, null, null);
        $this->addForeignPrimaryKey('scene_id', 'SceneId', 'INTEGER' , 'scene', 'scene_id', true, null, null);
        $this->addColumn('percentage', 'Percentage', 'DOUBLE', false, null, 0.3);
        $this->addColumn('priority_id', 'PriorityId', 'INTEGER', false, null, 100);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Persona', '\\Persona', RelationMap::MANY_TO_ONE, array('persona_id' => 'persona_id', ), null, null);
        $this->addRelation('Scene', '\\Scene', RelationMap::MANY_TO_ONE, array('scene_id' => 'scene_id', ), null, null);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \MapPersonaScene $obj A \MapPersonaScene object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getPersonaId(), (string) $obj->getSceneId()));
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
     * @param mixed $value A \MapPersonaScene object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \MapPersonaScene) {
                $key = serialize(array((string) $value->getPersonaId(), (string) $value->getSceneId()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \MapPersonaScene object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersonaId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('SceneId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersonaId', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('SceneId', TableMap::TYPE_PHPNAME, $indexType)]));
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
                : self::translateFieldName('SceneId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? MapPersonaSceneTableMap::CLASS_DEFAULT : MapPersonaSceneTableMap::OM_CLASS;
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
     * @return array           (MapPersonaScene object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MapPersonaSceneTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MapPersonaSceneTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MapPersonaSceneTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MapPersonaSceneTableMap::OM_CLASS;
            /** @var MapPersonaScene $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MapPersonaSceneTableMap::addInstanceToPool($obj, $key);
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
            $key = MapPersonaSceneTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MapPersonaSceneTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MapPersonaScene $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MapPersonaSceneTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MapPersonaSceneTableMap::COL_PERSONA_ID);
            $criteria->addSelectColumn(MapPersonaSceneTableMap::COL_SCENE_ID);
            $criteria->addSelectColumn(MapPersonaSceneTableMap::COL_PERCENTAGE);
            $criteria->addSelectColumn(MapPersonaSceneTableMap::COL_PRIORITY_ID);
            $criteria->addSelectColumn(MapPersonaSceneTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(MapPersonaSceneTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.persona_id');
            $criteria->addSelectColumn($alias . '.scene_id');
            $criteria->addSelectColumn($alias . '.percentage');
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
        return Propel::getServiceContainer()->getDatabaseMap(MapPersonaSceneTableMap::DATABASE_NAME)->getTable(MapPersonaSceneTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MapPersonaSceneTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MapPersonaSceneTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MapPersonaSceneTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MapPersonaScene or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MapPersonaScene object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MapPersonaSceneTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MapPersonaScene) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MapPersonaSceneTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(MapPersonaSceneTableMap::COL_PERSONA_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(MapPersonaSceneTableMap::COL_SCENE_ID, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = MapPersonaSceneQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MapPersonaSceneTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MapPersonaSceneTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the map_persona_scene table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MapPersonaSceneQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MapPersonaScene or Criteria object.
     *
     * @param mixed               $criteria Criteria or MapPersonaScene object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MapPersonaSceneTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MapPersonaScene object
        }


        // Set the correct dbName
        $query = MapPersonaSceneQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MapPersonaSceneTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MapPersonaSceneTableMap::buildTableMap();
