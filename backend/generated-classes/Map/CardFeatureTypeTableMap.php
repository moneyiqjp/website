<?php

namespace Map;

use \CardFeatureType;
use \CardFeatureTypeQuery;
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
 * This class defines the structure of the 'card_feature_type' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CardFeatureTypeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CardFeatureTypeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'card_feature_type';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CardFeatureType';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CardFeatureType';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the feature_type_id field
     */
    const COL_FEATURE_TYPE_ID = 'card_feature_type.feature_type_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'card_feature_type.name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'card_feature_type.description';

    /**
     * the column name for the category field
     */
    const COL_CATEGORY = 'card_feature_type.category';

    /**
     * the column name for the background_color field
     */
    const COL_BACKGROUND_COLOR = 'card_feature_type.background_color';

    /**
     * the column name for the foreground_color field
     */
    const COL_FOREGROUND_COLOR = 'card_feature_type.foreground_color';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'card_feature_type.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'card_feature_type.update_user';

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
        self::TYPE_PHPNAME       => array('FeatureTypeId', 'Name', 'Description', 'Category', 'BackgroundColor', 'ForegroundColor', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('featureTypeId', 'name', 'description', 'category', 'backgroundColor', 'foregroundColor', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, CardFeatureTypeTableMap::COL_NAME, CardFeatureTypeTableMap::COL_DESCRIPTION, CardFeatureTypeTableMap::COL_CATEGORY, CardFeatureTypeTableMap::COL_BACKGROUND_COLOR, CardFeatureTypeTableMap::COL_FOREGROUND_COLOR, CardFeatureTypeTableMap::COL_UPDATE_TIME, CardFeatureTypeTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('feature_type_id', 'name', 'description', 'category', 'background_color', 'foreground_color', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FeatureTypeId' => 0, 'Name' => 1, 'Description' => 2, 'Category' => 3, 'BackgroundColor' => 4, 'ForegroundColor' => 5, 'UpdateTime' => 6, 'UpdateUser' => 7, ),
        self::TYPE_CAMELNAME     => array('featureTypeId' => 0, 'name' => 1, 'description' => 2, 'category' => 3, 'backgroundColor' => 4, 'foregroundColor' => 5, 'updateTime' => 6, 'updateUser' => 7, ),
        self::TYPE_COLNAME       => array(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID => 0, CardFeatureTypeTableMap::COL_NAME => 1, CardFeatureTypeTableMap::COL_DESCRIPTION => 2, CardFeatureTypeTableMap::COL_CATEGORY => 3, CardFeatureTypeTableMap::COL_BACKGROUND_COLOR => 4, CardFeatureTypeTableMap::COL_FOREGROUND_COLOR => 5, CardFeatureTypeTableMap::COL_UPDATE_TIME => 6, CardFeatureTypeTableMap::COL_UPDATE_USER => 7, ),
        self::TYPE_FIELDNAME     => array('feature_type_id' => 0, 'name' => 1, 'description' => 2, 'category' => 3, 'background_color' => 4, 'foreground_color' => 5, 'update_time' => 6, 'update_user' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('card_feature_type');
        $this->setPhpName('CardFeatureType');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CardFeatureType');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('feature_type_id', 'FeatureTypeId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 250, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('category', 'Category', 'VARCHAR', true, 250, null);
        $this->addColumn('background_color', 'BackgroundColor', 'VARCHAR', false, 250, null);
        $this->addColumn('foreground_color', 'ForegroundColor', 'VARCHAR', false, 250, '0');
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', false, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CardFeatures', '\\CardFeatures', RelationMap::ONE_TO_MANY, array('feature_type_id' => 'feature_type_id', ), null, null, 'CardFeaturess');
        $this->addRelation('MapPersonaFeatureConstraint', '\\MapPersonaFeatureConstraint', RelationMap::ONE_TO_MANY, array('feature_type_id' => 'feature_type_id', ), null, null, 'MapPersonaFeatureConstraints');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeatureTypeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeatureTypeId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('FeatureTypeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CardFeatureTypeTableMap::CLASS_DEFAULT : CardFeatureTypeTableMap::OM_CLASS;
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
     * @return array           (CardFeatureType object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CardFeatureTypeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CardFeatureTypeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CardFeatureTypeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CardFeatureTypeTableMap::OM_CLASS;
            /** @var CardFeatureType $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CardFeatureTypeTableMap::addInstanceToPool($obj, $key);
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
            $key = CardFeatureTypeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CardFeatureTypeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CardFeatureType $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CardFeatureTypeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID);
            $criteria->addSelectColumn(CardFeatureTypeTableMap::COL_NAME);
            $criteria->addSelectColumn(CardFeatureTypeTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(CardFeatureTypeTableMap::COL_CATEGORY);
            $criteria->addSelectColumn(CardFeatureTypeTableMap::COL_BACKGROUND_COLOR);
            $criteria->addSelectColumn(CardFeatureTypeTableMap::COL_FOREGROUND_COLOR);
            $criteria->addSelectColumn(CardFeatureTypeTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(CardFeatureTypeTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.feature_type_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.category');
            $criteria->addSelectColumn($alias . '.background_color');
            $criteria->addSelectColumn($alias . '.foreground_color');
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
        return Propel::getServiceContainer()->getDatabaseMap(CardFeatureTypeTableMap::DATABASE_NAME)->getTable(CardFeatureTypeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CardFeatureTypeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CardFeatureTypeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CardFeatureTypeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CardFeatureType or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CardFeatureType object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeatureTypeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CardFeatureType) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CardFeatureTypeTableMap::DATABASE_NAME);
            $criteria->add(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, (array) $values, Criteria::IN);
        }

        $query = CardFeatureTypeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CardFeatureTypeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CardFeatureTypeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the card_feature_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CardFeatureTypeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CardFeatureType or Criteria object.
     *
     * @param mixed               $criteria Criteria or CardFeatureType object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeatureTypeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CardFeatureType object
        }

        if ($criteria->containsKey(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID) && $criteria->keyContainsValue(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID.')');
        }


        // Set the correct dbName
        $query = CardFeatureTypeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CardFeatureTypeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CardFeatureTypeTableMap::buildTableMap();
