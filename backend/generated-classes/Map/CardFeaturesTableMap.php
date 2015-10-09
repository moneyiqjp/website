<?php

namespace Map;

use \CardFeatures;
use \CardFeaturesQuery;
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
 * This class defines the structure of the 'card_features' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CardFeaturesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CardFeaturesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'card_features';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CardFeatures';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CardFeatures';

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
     * the column name for the feature_id field
     */
    const COL_FEATURE_ID = 'card_features.feature_id';

    /**
     * the column name for the feature_type_id field
     */
    const COL_FEATURE_TYPE_ID = 'card_features.feature_type_id';

    /**
     * the column name for the credit_card_id field
     */
    const COL_CREDIT_CARD_ID = 'card_features.credit_card_id';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'card_features.description';

    /**
     * the column name for the issuing_fee field
     */
    const COL_ISSUING_FEE = 'card_features.issuing_fee';

    /**
     * the column name for the ongoing_fee field
     */
    const COL_ONGOING_FEE = 'card_features.ongoing_fee';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'card_features.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'card_features.update_user';

    /**
     * the column name for the reference field
     */
    const COL_REFERENCE = 'card_features.reference';

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
        self::TYPE_PHPNAME       => array('FeatureId', 'FeatureTypeId', 'CreditCardId', 'Description', 'IssuingFee', 'OngoingFee', 'UpdateTime', 'UpdateUser', 'Reference', ),
        self::TYPE_CAMELNAME     => array('featureId', 'featureTypeId', 'creditCardId', 'description', 'issuingFee', 'ongoingFee', 'updateTime', 'updateUser', 'reference', ),
        self::TYPE_COLNAME       => array(CardFeaturesTableMap::COL_FEATURE_ID, CardFeaturesTableMap::COL_FEATURE_TYPE_ID, CardFeaturesTableMap::COL_CREDIT_CARD_ID, CardFeaturesTableMap::COL_DESCRIPTION, CardFeaturesTableMap::COL_ISSUING_FEE, CardFeaturesTableMap::COL_ONGOING_FEE, CardFeaturesTableMap::COL_UPDATE_TIME, CardFeaturesTableMap::COL_UPDATE_USER, CardFeaturesTableMap::COL_REFERENCE, ),
        self::TYPE_FIELDNAME     => array('feature_id', 'feature_type_id', 'credit_card_id', 'description', 'issuing_fee', 'ongoing_fee', 'update_time', 'update_user', 'reference', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FeatureId' => 0, 'FeatureTypeId' => 1, 'CreditCardId' => 2, 'Description' => 3, 'IssuingFee' => 4, 'OngoingFee' => 5, 'UpdateTime' => 6, 'UpdateUser' => 7, 'Reference' => 8, ),
        self::TYPE_CAMELNAME     => array('featureId' => 0, 'featureTypeId' => 1, 'creditCardId' => 2, 'description' => 3, 'issuingFee' => 4, 'ongoingFee' => 5, 'updateTime' => 6, 'updateUser' => 7, 'reference' => 8, ),
        self::TYPE_COLNAME       => array(CardFeaturesTableMap::COL_FEATURE_ID => 0, CardFeaturesTableMap::COL_FEATURE_TYPE_ID => 1, CardFeaturesTableMap::COL_CREDIT_CARD_ID => 2, CardFeaturesTableMap::COL_DESCRIPTION => 3, CardFeaturesTableMap::COL_ISSUING_FEE => 4, CardFeaturesTableMap::COL_ONGOING_FEE => 5, CardFeaturesTableMap::COL_UPDATE_TIME => 6, CardFeaturesTableMap::COL_UPDATE_USER => 7, CardFeaturesTableMap::COL_REFERENCE => 8, ),
        self::TYPE_FIELDNAME     => array('feature_id' => 0, 'feature_type_id' => 1, 'credit_card_id' => 2, 'description' => 3, 'issuing_fee' => 4, 'ongoing_fee' => 5, 'update_time' => 6, 'update_user' => 7, 'reference' => 8, ),
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
        $this->setName('card_features');
        $this->setPhpName('CardFeatures');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CardFeatures');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('feature_id', 'FeatureId', 'INTEGER', true, null, null);
        $this->addForeignKey('feature_type_id', 'FeatureTypeId', 'INTEGER', 'card_feature_type', 'feature_type_id', true, null, null);
        $this->addForeignKey('credit_card_id', 'CreditCardId', 'INTEGER', 'credit_card', 'credit_card_id', true, null, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('issuing_fee', 'IssuingFee', 'INTEGER', false, null, null);
        $this->addColumn('ongoing_fee', 'OngoingFee', 'INTEGER', false, null, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', false, 100, null);
        $this->addColumn('reference', 'Reference', 'VARCHAR', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CreditCard', '\\CreditCard', RelationMap::MANY_TO_ONE, array('credit_card_id' => 'credit_card_id', ), null, null);
        $this->addRelation('CardFeatureType', '\\CardFeatureType', RelationMap::MANY_TO_ONE, array('feature_type_id' => 'feature_type_id', ), null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeatureId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeatureId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('FeatureId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CardFeaturesTableMap::CLASS_DEFAULT : CardFeaturesTableMap::OM_CLASS;
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
     * @return array           (CardFeatures object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CardFeaturesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CardFeaturesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CardFeaturesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CardFeaturesTableMap::OM_CLASS;
            /** @var CardFeatures $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CardFeaturesTableMap::addInstanceToPool($obj, $key);
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
            $key = CardFeaturesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CardFeaturesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CardFeatures $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CardFeaturesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CardFeaturesTableMap::COL_FEATURE_ID);
            $criteria->addSelectColumn(CardFeaturesTableMap::COL_FEATURE_TYPE_ID);
            $criteria->addSelectColumn(CardFeaturesTableMap::COL_CREDIT_CARD_ID);
            $criteria->addSelectColumn(CardFeaturesTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(CardFeaturesTableMap::COL_ISSUING_FEE);
            $criteria->addSelectColumn(CardFeaturesTableMap::COL_ONGOING_FEE);
            $criteria->addSelectColumn(CardFeaturesTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(CardFeaturesTableMap::COL_UPDATE_USER);
            $criteria->addSelectColumn(CardFeaturesTableMap::COL_REFERENCE);
        } else {
            $criteria->addSelectColumn($alias . '.feature_id');
            $criteria->addSelectColumn($alias . '.feature_type_id');
            $criteria->addSelectColumn($alias . '.credit_card_id');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.issuing_fee');
            $criteria->addSelectColumn($alias . '.ongoing_fee');
            $criteria->addSelectColumn($alias . '.update_time');
            $criteria->addSelectColumn($alias . '.update_user');
            $criteria->addSelectColumn($alias . '.reference');
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
        return Propel::getServiceContainer()->getDatabaseMap(CardFeaturesTableMap::DATABASE_NAME)->getTable(CardFeaturesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CardFeaturesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CardFeaturesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CardFeaturesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CardFeatures or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CardFeatures object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeaturesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CardFeatures) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CardFeaturesTableMap::DATABASE_NAME);
            $criteria->add(CardFeaturesTableMap::COL_FEATURE_ID, (array) $values, Criteria::IN);
        }

        $query = CardFeaturesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CardFeaturesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CardFeaturesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the card_features table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CardFeaturesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CardFeatures or Criteria object.
     *
     * @param mixed               $criteria Criteria or CardFeatures object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeaturesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CardFeatures object
        }

        if ($criteria->containsKey(CardFeaturesTableMap::COL_FEATURE_ID) && $criteria->keyContainsValue(CardFeaturesTableMap::COL_FEATURE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CardFeaturesTableMap::COL_FEATURE_ID.')');
        }


        // Set the correct dbName
        $query = CardFeaturesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CardFeaturesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CardFeaturesTableMap::buildTableMap();
