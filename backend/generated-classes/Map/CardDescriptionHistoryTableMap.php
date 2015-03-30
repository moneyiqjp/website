<?php

namespace Map;

use \CardDescriptionHistory;
use \CardDescriptionHistoryQuery;
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
 * This class defines the structure of the 'card_description_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CardDescriptionHistoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CardDescriptionHistoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'card_description_history';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CardDescriptionHistory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CardDescriptionHistory';

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
     * the column name for the item_id field
     */
    const COL_ITEM_ID = 'card_description_history.item_id';

    /**
     * the column name for the credit_card_id field
     */
    const COL_CREDIT_CARD_ID = 'card_description_history.credit_card_id';

    /**
     * the column name for the item_name field
     */
    const COL_ITEM_NAME = 'card_description_history.item_name';

    /**
     * the column name for the item_description field
     */
    const COL_ITEM_DESCRIPTION = 'card_description_history.item_description';

    /**
     * the column name for the time_beg field
     */
    const COL_TIME_BEG = 'card_description_history.time_beg';

    /**
     * the column name for the time_end field
     */
    const COL_TIME_END = 'card_description_history.time_end';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'card_description_history.update_user';

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
        self::TYPE_PHPNAME       => array('ItemId', 'CreditCardId', 'ItemName', 'ItemDescription', 'TimeBeg', 'TimeEnd', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('itemId', 'creditCardId', 'itemName', 'itemDescription', 'timeBeg', 'timeEnd', 'updateUser', ),
        self::TYPE_COLNAME       => array(CardDescriptionHistoryTableMap::COL_ITEM_ID, CardDescriptionHistoryTableMap::COL_CREDIT_CARD_ID, CardDescriptionHistoryTableMap::COL_ITEM_NAME, CardDescriptionHistoryTableMap::COL_ITEM_DESCRIPTION, CardDescriptionHistoryTableMap::COL_TIME_BEG, CardDescriptionHistoryTableMap::COL_TIME_END, CardDescriptionHistoryTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('item_id', 'credit_card_id', 'item_name', 'item_description', 'time_beg', 'time_end', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ItemId' => 0, 'CreditCardId' => 1, 'ItemName' => 2, 'ItemDescription' => 3, 'TimeBeg' => 4, 'TimeEnd' => 5, 'UpdateUser' => 6, ),
        self::TYPE_CAMELNAME     => array('itemId' => 0, 'creditCardId' => 1, 'itemName' => 2, 'itemDescription' => 3, 'timeBeg' => 4, 'timeEnd' => 5, 'updateUser' => 6, ),
        self::TYPE_COLNAME       => array(CardDescriptionHistoryTableMap::COL_ITEM_ID => 0, CardDescriptionHistoryTableMap::COL_CREDIT_CARD_ID => 1, CardDescriptionHistoryTableMap::COL_ITEM_NAME => 2, CardDescriptionHistoryTableMap::COL_ITEM_DESCRIPTION => 3, CardDescriptionHistoryTableMap::COL_TIME_BEG => 4, CardDescriptionHistoryTableMap::COL_TIME_END => 5, CardDescriptionHistoryTableMap::COL_UPDATE_USER => 6, ),
        self::TYPE_FIELDNAME     => array('item_id' => 0, 'credit_card_id' => 1, 'item_name' => 2, 'item_description' => 3, 'time_beg' => 4, 'time_end' => 5, 'update_user' => 6, ),
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
        $this->setName('card_description_history');
        $this->setPhpName('CardDescriptionHistory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CardDescriptionHistory');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('item_id', 'ItemId', 'INTEGER', true, null, null);
        $this->addColumn('credit_card_id', 'CreditCardId', 'INTEGER', true, null, null);
        $this->addColumn('item_name', 'ItemName', 'VARCHAR', true, 255, null);
        $this->addColumn('item_description', 'ItemDescription', 'LONGVARCHAR', false, null, null);
        $this->addPrimaryKey('time_beg', 'TimeBeg', 'TIMESTAMP', true, null, null);
        $this->addColumn('time_end', 'TimeEnd', 'TIMESTAMP', false, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
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
     * @param \CardDescriptionHistory $obj A \CardDescriptionHistory object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getItemId(), (string) $obj->getTimeBeg()));
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
     * @param mixed $value A \CardDescriptionHistory object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \CardDescriptionHistory) {
                $key = serialize(array((string) $value->getItemId(), (string) $value->getTimeBeg()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \CardDescriptionHistory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ItemId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ItemId', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)]));
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
                : self::translateFieldName('ItemId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
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
        return $withPrefix ? CardDescriptionHistoryTableMap::CLASS_DEFAULT : CardDescriptionHistoryTableMap::OM_CLASS;
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
     * @return array           (CardDescriptionHistory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CardDescriptionHistoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CardDescriptionHistoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CardDescriptionHistoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CardDescriptionHistoryTableMap::OM_CLASS;
            /** @var CardDescriptionHistory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CardDescriptionHistoryTableMap::addInstanceToPool($obj, $key);
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
            $key = CardDescriptionHistoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CardDescriptionHistoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CardDescriptionHistory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CardDescriptionHistoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CardDescriptionHistoryTableMap::COL_ITEM_ID);
            $criteria->addSelectColumn(CardDescriptionHistoryTableMap::COL_CREDIT_CARD_ID);
            $criteria->addSelectColumn(CardDescriptionHistoryTableMap::COL_ITEM_NAME);
            $criteria->addSelectColumn(CardDescriptionHistoryTableMap::COL_ITEM_DESCRIPTION);
            $criteria->addSelectColumn(CardDescriptionHistoryTableMap::COL_TIME_BEG);
            $criteria->addSelectColumn(CardDescriptionHistoryTableMap::COL_TIME_END);
            $criteria->addSelectColumn(CardDescriptionHistoryTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.item_id');
            $criteria->addSelectColumn($alias . '.credit_card_id');
            $criteria->addSelectColumn($alias . '.item_name');
            $criteria->addSelectColumn($alias . '.item_description');
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
        return Propel::getServiceContainer()->getDatabaseMap(CardDescriptionHistoryTableMap::DATABASE_NAME)->getTable(CardDescriptionHistoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CardDescriptionHistoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CardDescriptionHistoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CardDescriptionHistoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CardDescriptionHistory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CardDescriptionHistory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CardDescriptionHistoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CardDescriptionHistory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CardDescriptionHistoryTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CardDescriptionHistoryTableMap::COL_ITEM_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CardDescriptionHistoryTableMap::COL_TIME_BEG, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = CardDescriptionHistoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CardDescriptionHistoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CardDescriptionHistoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the card_description_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CardDescriptionHistoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CardDescriptionHistory or Criteria object.
     *
     * @param mixed               $criteria Criteria or CardDescriptionHistory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardDescriptionHistoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CardDescriptionHistory object
        }


        // Set the correct dbName
        $query = CardDescriptionHistoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CardDescriptionHistoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CardDescriptionHistoryTableMap::buildTableMap();