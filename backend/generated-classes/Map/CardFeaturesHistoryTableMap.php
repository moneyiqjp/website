<?php

namespace Map;

use \CardFeaturesHistory;
use \CardFeaturesHistoryQuery;
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
 * This class defines the structure of the 'card_features_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CardFeaturesHistoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CardFeaturesHistoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'card_features_history';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CardFeaturesHistory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CardFeaturesHistory';

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
     * the column name for the feature_id field
     */
    const COL_FEATURE_ID = 'card_features_history.feature_id';

    /**
     * the column name for the feature_type_id field
     */
    const COL_FEATURE_TYPE_ID = 'card_features_history.feature_type_id';

    /**
     * the column name for the credit_card_id field
     */
    const COL_CREDIT_CARD_ID = 'card_features_history.credit_card_id';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'card_features_history.description';

    /**
     * the column name for the feature_cost field
     */
    const COL_FEATURE_COST = 'card_features_history.feature_cost';

    /**
     * the column name for the time_beg field
     */
    const COL_TIME_BEG = 'card_features_history.time_beg';

    /**
     * the column name for the time_end field
     */
    const COL_TIME_END = 'card_features_history.time_end';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'card_features_history.update_user';

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
        self::TYPE_PHPNAME       => array('FeatureId', 'FeatureTypeId', 'CreditCardId', 'Description', 'FeatureCost', 'TimeBeg', 'TimeEnd', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('featureId', 'featureTypeId', 'creditCardId', 'description', 'featureCost', 'timeBeg', 'timeEnd', 'updateUser', ),
        self::TYPE_COLNAME       => array(CardFeaturesHistoryTableMap::COL_FEATURE_ID, CardFeaturesHistoryTableMap::COL_FEATURE_TYPE_ID, CardFeaturesHistoryTableMap::COL_CREDIT_CARD_ID, CardFeaturesHistoryTableMap::COL_DESCRIPTION, CardFeaturesHistoryTableMap::COL_FEATURE_COST, CardFeaturesHistoryTableMap::COL_TIME_BEG, CardFeaturesHistoryTableMap::COL_TIME_END, CardFeaturesHistoryTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('feature_id', 'feature_type_id', 'credit_card_id', 'description', 'feature_cost', 'time_beg', 'time_end', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FeatureId' => 0, 'FeatureTypeId' => 1, 'CreditCardId' => 2, 'Description' => 3, 'FeatureCost' => 4, 'TimeBeg' => 5, 'TimeEnd' => 6, 'UpdateUser' => 7, ),
        self::TYPE_CAMELNAME     => array('featureId' => 0, 'featureTypeId' => 1, 'creditCardId' => 2, 'description' => 3, 'featureCost' => 4, 'timeBeg' => 5, 'timeEnd' => 6, 'updateUser' => 7, ),
        self::TYPE_COLNAME       => array(CardFeaturesHistoryTableMap::COL_FEATURE_ID => 0, CardFeaturesHistoryTableMap::COL_FEATURE_TYPE_ID => 1, CardFeaturesHistoryTableMap::COL_CREDIT_CARD_ID => 2, CardFeaturesHistoryTableMap::COL_DESCRIPTION => 3, CardFeaturesHistoryTableMap::COL_FEATURE_COST => 4, CardFeaturesHistoryTableMap::COL_TIME_BEG => 5, CardFeaturesHistoryTableMap::COL_TIME_END => 6, CardFeaturesHistoryTableMap::COL_UPDATE_USER => 7, ),
        self::TYPE_FIELDNAME     => array('feature_id' => 0, 'feature_type_id' => 1, 'credit_card_id' => 2, 'description' => 3, 'feature_cost' => 4, 'time_beg' => 5, 'time_end' => 6, 'update_user' => 7, ),
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
        $this->setName('card_features_history');
        $this->setPhpName('CardFeaturesHistory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CardFeaturesHistory');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('feature_id', 'FeatureId', 'INTEGER', true, null, null);
        $this->addColumn('feature_type_id', 'FeatureTypeId', 'INTEGER', true, null, null);
        $this->addColumn('credit_card_id', 'CreditCardId', 'INTEGER', true, null, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('feature_cost', 'FeatureCost', 'INTEGER', false, null, null);
        $this->addPrimaryKey('time_beg', 'TimeBeg', 'TIMESTAMP', true, null, null);
        $this->addColumn('time_end', 'TimeEnd', 'TIMESTAMP', false, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', false, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \CardFeaturesHistory $obj A \CardFeaturesHistory object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getFeatureId(), (string) $obj->getTimeBeg()));
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
     * @param mixed $value A \CardFeaturesHistory object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \CardFeaturesHistory) {
                $key = serialize(array((string) $value->getFeatureId(), (string) $value->getTimeBeg()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \CardFeaturesHistory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeatureId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeatureId', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)]));
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
                : self::translateFieldName('FeatureId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 5 + $offset
                : self::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CardFeaturesHistoryTableMap::CLASS_DEFAULT : CardFeaturesHistoryTableMap::OM_CLASS;
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
     * @return array           (CardFeaturesHistory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CardFeaturesHistoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CardFeaturesHistoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CardFeaturesHistoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CardFeaturesHistoryTableMap::OM_CLASS;
            /** @var CardFeaturesHistory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CardFeaturesHistoryTableMap::addInstanceToPool($obj, $key);
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
            $key = CardFeaturesHistoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CardFeaturesHistoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CardFeaturesHistory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CardFeaturesHistoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CardFeaturesHistoryTableMap::COL_FEATURE_ID);
            $criteria->addSelectColumn(CardFeaturesHistoryTableMap::COL_FEATURE_TYPE_ID);
            $criteria->addSelectColumn(CardFeaturesHistoryTableMap::COL_CREDIT_CARD_ID);
            $criteria->addSelectColumn(CardFeaturesHistoryTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(CardFeaturesHistoryTableMap::COL_FEATURE_COST);
            $criteria->addSelectColumn(CardFeaturesHistoryTableMap::COL_TIME_BEG);
            $criteria->addSelectColumn(CardFeaturesHistoryTableMap::COL_TIME_END);
            $criteria->addSelectColumn(CardFeaturesHistoryTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.feature_id');
            $criteria->addSelectColumn($alias . '.feature_type_id');
            $criteria->addSelectColumn($alias . '.credit_card_id');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.feature_cost');
            $criteria->addSelectColumn($alias . '.time_beg');
            $criteria->addSelectColumn($alias . '.time_end');
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
        return Propel::getServiceContainer()->getDatabaseMap(CardFeaturesHistoryTableMap::DATABASE_NAME)->getTable(CardFeaturesHistoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CardFeaturesHistoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CardFeaturesHistoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CardFeaturesHistoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CardFeaturesHistory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CardFeaturesHistory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeaturesHistoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CardFeaturesHistory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CardFeaturesHistoryTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CardFeaturesHistoryTableMap::COL_FEATURE_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CardFeaturesHistoryTableMap::COL_TIME_BEG, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = CardFeaturesHistoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CardFeaturesHistoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CardFeaturesHistoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the card_features_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CardFeaturesHistoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CardFeaturesHistory or Criteria object.
     *
     * @param mixed               $criteria Criteria or CardFeaturesHistory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeaturesHistoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CardFeaturesHistory object
        }


        // Set the correct dbName
        $query = CardFeaturesHistoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CardFeaturesHistoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CardFeaturesHistoryTableMap::buildTableMap();
