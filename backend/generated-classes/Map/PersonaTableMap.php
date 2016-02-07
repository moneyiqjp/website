<?php

namespace Map;

use \Persona;
use \PersonaQuery;
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
 * This class defines the structure of the 'persona' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PersonaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PersonaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'persona';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Persona';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Persona';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the persona_id field
     */
    const COL_PERSONA_ID = 'persona.persona_id';

    /**
     * the column name for the identifier field
     */
    const COL_IDENTIFIER = 'persona.identifier';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'persona.name';

    /**
     * the column name for the description_short field
     */
    const COL_DESCRIPTION_SHORT = 'persona.description_short';

    /**
     * the column name for the description_long field
     */
    const COL_DESCRIPTION_LONG = 'persona.description_long';

    /**
     * the column name for the default_spend field
     */
    const COL_DEFAULT_SPEND = 'persona.default_spend';

    /**
     * the column name for the sorting field
     */
    const COL_SORTING = 'persona.sorting';

    /**
     * the column name for the reward_category_id field
     */
    const COL_REWARD_CATEGORY_ID = 'persona.reward_category_id';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'persona.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'persona.update_user';

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
        self::TYPE_PHPNAME       => array('PersonaId', 'Identifier', 'Name', 'DescriptionShort', 'DescriptionLong', 'DefaultSpend', 'Sorting', 'RewardCategoryId', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('personaId', 'identifier', 'name', 'descriptionShort', 'descriptionLong', 'defaultSpend', 'sorting', 'rewardCategoryId', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(PersonaTableMap::COL_PERSONA_ID, PersonaTableMap::COL_IDENTIFIER, PersonaTableMap::COL_NAME, PersonaTableMap::COL_DESCRIPTION_SHORT, PersonaTableMap::COL_DESCRIPTION_LONG, PersonaTableMap::COL_DEFAULT_SPEND, PersonaTableMap::COL_SORTING, PersonaTableMap::COL_REWARD_CATEGORY_ID, PersonaTableMap::COL_UPDATE_TIME, PersonaTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('persona_id', 'identifier', 'name', 'description_short', 'description_long', 'default_spend', 'sorting', 'reward_category_id', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PersonaId' => 0, 'Identifier' => 1, 'Name' => 2, 'DescriptionShort' => 3, 'DescriptionLong' => 4, 'DefaultSpend' => 5, 'Sorting' => 6, 'RewardCategoryId' => 7, 'UpdateTime' => 8, 'UpdateUser' => 9, ),
        self::TYPE_CAMELNAME     => array('personaId' => 0, 'identifier' => 1, 'name' => 2, 'descriptionShort' => 3, 'descriptionLong' => 4, 'defaultSpend' => 5, 'sorting' => 6, 'rewardCategoryId' => 7, 'updateTime' => 8, 'updateUser' => 9, ),
        self::TYPE_COLNAME       => array(PersonaTableMap::COL_PERSONA_ID => 0, PersonaTableMap::COL_IDENTIFIER => 1, PersonaTableMap::COL_NAME => 2, PersonaTableMap::COL_DESCRIPTION_SHORT => 3, PersonaTableMap::COL_DESCRIPTION_LONG => 4, PersonaTableMap::COL_DEFAULT_SPEND => 5, PersonaTableMap::COL_SORTING => 6, PersonaTableMap::COL_REWARD_CATEGORY_ID => 7, PersonaTableMap::COL_UPDATE_TIME => 8, PersonaTableMap::COL_UPDATE_USER => 9, ),
        self::TYPE_FIELDNAME     => array('persona_id' => 0, 'identifier' => 1, 'name' => 2, 'description_short' => 3, 'description_long' => 4, 'default_spend' => 5, 'sorting' => 6, 'reward_category_id' => 7, 'update_time' => 8, 'update_user' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('persona');
        $this->setPhpName('Persona');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Persona');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('persona_id', 'PersonaId', 'INTEGER', true, null, null);
        $this->addColumn('identifier', 'Identifier', 'VARCHAR', true, 250, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description_short', 'DescriptionShort', 'VARCHAR', false, 250, null);
        $this->addColumn('description_long', 'DescriptionLong', 'LONGVARCHAR', false, null, null);
        $this->addColumn('default_spend', 'DefaultSpend', 'INTEGER', true, null, 100000);
        $this->addColumn('sorting', 'Sorting', 'VARCHAR', true, 250, null);
        $this->addForeignKey('reward_category_id', 'RewardCategoryId', 'INTEGER', 'reward_category', 'reward_category_id', true, null, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('RewardCategory', '\\RewardCategory', RelationMap::MANY_TO_ONE, array('reward_category_id' => 'reward_category_id', ), null, null);
        $this->addRelation('MapPersonaFeatureConstraint', '\\MapPersonaFeatureConstraint', RelationMap::ONE_TO_MANY, array('persona_id' => 'persona_id', ), null, null, 'MapPersonaFeatureConstraints');
        $this->addRelation('MapPersonaScene', '\\MapPersonaScene', RelationMap::ONE_TO_MANY, array('persona_id' => 'persona_id', ), null, null, 'MapPersonaScenes');
        $this->addRelation('MapPersonaStore', '\\MapPersonaStore', RelationMap::ONE_TO_MANY, array('persona_id' => 'persona_id', ), null, null, 'MapPersonaStores');
        $this->addRelation('PersonaRestriction', '\\PersonaRestriction', RelationMap::ONE_TO_MANY, array('persona_id' => 'persona_id', ), null, null, 'PersonaRestrictions');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersonaId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersonaId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('PersonaId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? PersonaTableMap::CLASS_DEFAULT : PersonaTableMap::OM_CLASS;
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
     * @return array           (Persona object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PersonaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PersonaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PersonaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PersonaTableMap::OM_CLASS;
            /** @var Persona $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PersonaTableMap::addInstanceToPool($obj, $key);
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
            $key = PersonaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PersonaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Persona $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PersonaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PersonaTableMap::COL_PERSONA_ID);
            $criteria->addSelectColumn(PersonaTableMap::COL_IDENTIFIER);
            $criteria->addSelectColumn(PersonaTableMap::COL_NAME);
            $criteria->addSelectColumn(PersonaTableMap::COL_DESCRIPTION_SHORT);
            $criteria->addSelectColumn(PersonaTableMap::COL_DESCRIPTION_LONG);
            $criteria->addSelectColumn(PersonaTableMap::COL_DEFAULT_SPEND);
            $criteria->addSelectColumn(PersonaTableMap::COL_SORTING);
            $criteria->addSelectColumn(PersonaTableMap::COL_REWARD_CATEGORY_ID);
            $criteria->addSelectColumn(PersonaTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(PersonaTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.persona_id');
            $criteria->addSelectColumn($alias . '.identifier');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description_short');
            $criteria->addSelectColumn($alias . '.description_long');
            $criteria->addSelectColumn($alias . '.default_spend');
            $criteria->addSelectColumn($alias . '.sorting');
            $criteria->addSelectColumn($alias . '.reward_category_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(PersonaTableMap::DATABASE_NAME)->getTable(PersonaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PersonaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PersonaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PersonaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Persona or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Persona object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Persona) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PersonaTableMap::DATABASE_NAME);
            $criteria->add(PersonaTableMap::COL_PERSONA_ID, (array) $values, Criteria::IN);
        }

        $query = PersonaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PersonaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PersonaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the persona table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PersonaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Persona or Criteria object.
     *
     * @param mixed               $criteria Criteria or Persona object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Persona object
        }

        if ($criteria->containsKey(PersonaTableMap::COL_PERSONA_ID) && $criteria->keyContainsValue(PersonaTableMap::COL_PERSONA_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PersonaTableMap::COL_PERSONA_ID.')');
        }


        // Set the correct dbName
        $query = PersonaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PersonaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PersonaTableMap::buildTableMap();
