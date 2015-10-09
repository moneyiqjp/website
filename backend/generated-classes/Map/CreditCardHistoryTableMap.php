<?php

namespace Map;

use \CreditCardHistory;
use \CreditCardHistoryQuery;
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
 * This class defines the structure of the 'credit_card_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CreditCardHistoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CreditCardHistoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'credit_card_history';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CreditCardHistory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CreditCardHistory';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the credit_card_id field
     */
    const COL_CREDIT_CARD_ID = 'credit_card_history.credit_card_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'credit_card_history.name';

    /**
     * the column name for the issuer_id field
     */
    const COL_ISSUER_ID = 'credit_card_history.issuer_id';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'credit_card_history.description';

    /**
     * the column name for the image_link field
     */
    const COL_IMAGE_LINK = 'credit_card_history.image_link';

    /**
     * the column name for the visa field
     */
    const COL_VISA = 'credit_card_history.visa';

    /**
     * the column name for the master field
     */
    const COL_MASTER = 'credit_card_history.master';

    /**
     * the column name for the jcb field
     */
    const COL_JCB = 'credit_card_history.jcb';

    /**
     * the column name for the amex field
     */
    const COL_AMEX = 'credit_card_history.amex';

    /**
     * the column name for the diners field
     */
    const COL_DINERS = 'credit_card_history.diners';

    /**
     * the column name for the afilliate_link field
     */
    const COL_AFILLIATE_LINK = 'credit_card_history.afilliate_link';

    /**
     * the column name for the affiliate_id field
     */
    const COL_AFFILIATE_ID = 'credit_card_history.affiliate_id';

    /**
     * the column name for the time_beg field
     */
    const COL_TIME_BEG = 'credit_card_history.time_beg';

    /**
     * the column name for the time_end field
     */
    const COL_TIME_END = 'credit_card_history.time_end';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'credit_card_history.update_user';

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
        self::TYPE_PHPNAME       => array('CreditCardId', 'Name', 'IssuerId', 'Description', 'ImageLink', 'Visa', 'Master', 'Jcb', 'Amex', 'Diners', 'AfilliateLink', 'AffiliateId', 'TimeBeg', 'TimeEnd', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('creditCardId', 'name', 'issuerId', 'description', 'imageLink', 'visa', 'master', 'jcb', 'amex', 'diners', 'afilliateLink', 'affiliateId', 'timeBeg', 'timeEnd', 'updateUser', ),
        self::TYPE_COLNAME       => array(CreditCardHistoryTableMap::COL_CREDIT_CARD_ID, CreditCardHistoryTableMap::COL_NAME, CreditCardHistoryTableMap::COL_ISSUER_ID, CreditCardHistoryTableMap::COL_DESCRIPTION, CreditCardHistoryTableMap::COL_IMAGE_LINK, CreditCardHistoryTableMap::COL_VISA, CreditCardHistoryTableMap::COL_MASTER, CreditCardHistoryTableMap::COL_JCB, CreditCardHistoryTableMap::COL_AMEX, CreditCardHistoryTableMap::COL_DINERS, CreditCardHistoryTableMap::COL_AFILLIATE_LINK, CreditCardHistoryTableMap::COL_AFFILIATE_ID, CreditCardHistoryTableMap::COL_TIME_BEG, CreditCardHistoryTableMap::COL_TIME_END, CreditCardHistoryTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('credit_card_id', 'name', 'issuer_id', 'description', 'image_link', 'visa', 'master', 'jcb', 'amex', 'diners', 'afilliate_link', 'affiliate_id', 'time_beg', 'time_end', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CreditCardId' => 0, 'Name' => 1, 'IssuerId' => 2, 'Description' => 3, 'ImageLink' => 4, 'Visa' => 5, 'Master' => 6, 'Jcb' => 7, 'Amex' => 8, 'Diners' => 9, 'AfilliateLink' => 10, 'AffiliateId' => 11, 'TimeBeg' => 12, 'TimeEnd' => 13, 'UpdateUser' => 14, ),
        self::TYPE_CAMELNAME     => array('creditCardId' => 0, 'name' => 1, 'issuerId' => 2, 'description' => 3, 'imageLink' => 4, 'visa' => 5, 'master' => 6, 'jcb' => 7, 'amex' => 8, 'diners' => 9, 'afilliateLink' => 10, 'affiliateId' => 11, 'timeBeg' => 12, 'timeEnd' => 13, 'updateUser' => 14, ),
        self::TYPE_COLNAME       => array(CreditCardHistoryTableMap::COL_CREDIT_CARD_ID => 0, CreditCardHistoryTableMap::COL_NAME => 1, CreditCardHistoryTableMap::COL_ISSUER_ID => 2, CreditCardHistoryTableMap::COL_DESCRIPTION => 3, CreditCardHistoryTableMap::COL_IMAGE_LINK => 4, CreditCardHistoryTableMap::COL_VISA => 5, CreditCardHistoryTableMap::COL_MASTER => 6, CreditCardHistoryTableMap::COL_JCB => 7, CreditCardHistoryTableMap::COL_AMEX => 8, CreditCardHistoryTableMap::COL_DINERS => 9, CreditCardHistoryTableMap::COL_AFILLIATE_LINK => 10, CreditCardHistoryTableMap::COL_AFFILIATE_ID => 11, CreditCardHistoryTableMap::COL_TIME_BEG => 12, CreditCardHistoryTableMap::COL_TIME_END => 13, CreditCardHistoryTableMap::COL_UPDATE_USER => 14, ),
        self::TYPE_FIELDNAME     => array('credit_card_id' => 0, 'name' => 1, 'issuer_id' => 2, 'description' => 3, 'image_link' => 4, 'visa' => 5, 'master' => 6, 'jcb' => 7, 'amex' => 8, 'diners' => 9, 'afilliate_link' => 10, 'affiliate_id' => 11, 'time_beg' => 12, 'time_end' => 13, 'update_user' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('credit_card_history');
        $this->setPhpName('CreditCardHistory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CreditCardHistory');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('credit_card_id', 'CreditCardId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('issuer_id', 'IssuerId', 'INTEGER', true, null, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('image_link', 'ImageLink', 'VARCHAR', false, 255, null);
        $this->addColumn('visa', 'Visa', 'BOOLEAN', false, 1, false);
        $this->addColumn('master', 'Master', 'BOOLEAN', false, 1, false);
        $this->addColumn('jcb', 'Jcb', 'BOOLEAN', false, 1, false);
        $this->addColumn('amex', 'Amex', 'BOOLEAN', false, 1, false);
        $this->addColumn('diners', 'Diners', 'BOOLEAN', false, 1, false);
        $this->addColumn('afilliate_link', 'AfilliateLink', 'LONGVARCHAR', false, null, null);
        $this->addColumn('affiliate_id', 'AffiliateId', 'INTEGER', true, null, null);
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
     * @param \CreditCardHistory $obj A \CreditCardHistory object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getCreditCardId(), (string) $obj->getTimeBeg()));
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
     * @param mixed $value A \CreditCardHistory object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \CreditCardHistory) {
                $key = serialize(array((string) $value->getCreditCardId(), (string) $value->getTimeBeg()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \CreditCardHistory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CreditCardId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CreditCardId', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('TimeBeg', TableMap::TYPE_PHPNAME, $indexType)]));
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
                : self::translateFieldName('CreditCardId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 12 + $offset
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
        return $withPrefix ? CreditCardHistoryTableMap::CLASS_DEFAULT : CreditCardHistoryTableMap::OM_CLASS;
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
     * @return array           (CreditCardHistory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CreditCardHistoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CreditCardHistoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CreditCardHistoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CreditCardHistoryTableMap::OM_CLASS;
            /** @var CreditCardHistory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CreditCardHistoryTableMap::addInstanceToPool($obj, $key);
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
            $key = CreditCardHistoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CreditCardHistoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CreditCardHistory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CreditCardHistoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_CREDIT_CARD_ID);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_NAME);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_ISSUER_ID);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_IMAGE_LINK);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_VISA);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_MASTER);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_JCB);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_AMEX);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_DINERS);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_AFILLIATE_LINK);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_AFFILIATE_ID);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_TIME_BEG);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_TIME_END);
            $criteria->addSelectColumn(CreditCardHistoryTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.credit_card_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.issuer_id');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.image_link');
            $criteria->addSelectColumn($alias . '.visa');
            $criteria->addSelectColumn($alias . '.master');
            $criteria->addSelectColumn($alias . '.jcb');
            $criteria->addSelectColumn($alias . '.amex');
            $criteria->addSelectColumn($alias . '.diners');
            $criteria->addSelectColumn($alias . '.afilliate_link');
            $criteria->addSelectColumn($alias . '.affiliate_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(CreditCardHistoryTableMap::DATABASE_NAME)->getTable(CreditCardHistoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CreditCardHistoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CreditCardHistoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CreditCardHistoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CreditCardHistory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CreditCardHistory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CreditCardHistoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CreditCardHistory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CreditCardHistoryTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CreditCardHistoryTableMap::COL_CREDIT_CARD_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CreditCardHistoryTableMap::COL_TIME_BEG, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = CreditCardHistoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CreditCardHistoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CreditCardHistoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the credit_card_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CreditCardHistoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CreditCardHistory or Criteria object.
     *
     * @param mixed               $criteria Criteria or CreditCardHistory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CreditCardHistoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CreditCardHistory object
        }


        // Set the correct dbName
        $query = CreditCardHistoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CreditCardHistoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CreditCardHistoryTableMap::buildTableMap();
