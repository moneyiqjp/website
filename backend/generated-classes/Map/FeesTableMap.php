<?php

namespace Map;

use \Fees;
use \FeesQuery;
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
 * This class defines the structure of the 'fees' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FeesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.FeesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'fees';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Fees';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Fees';

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
     * the column name for the fee_id field
     */
    const COL_FEE_ID = 'fees.fee_id';

    /**
     * the column name for the fee_type field
     */
    const COL_FEE_TYPE = 'fees.fee_type';

    /**
     * the column name for the fee_amount field
     */
    const COL_FEE_AMOUNT = 'fees.fee_amount';

    /**
     * the column name for the yearly_occurrence field
     */
    const COL_YEARLY_OCCURRENCE = 'fees.yearly_occurrence';

    /**
     * the column name for the start_year field
     */
    const COL_START_YEAR = 'fees.start_year';

    /**
     * the column name for the end_year field
     */
    const COL_END_YEAR = 'fees.end_year';

    /**
     * the column name for the credit_card_id field
     */
    const COL_CREDIT_CARD_ID = 'fees.credit_card_id';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'fees.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'fees.update_user';

    /**
     * the column name for the reference field
     */
    const COL_REFERENCE = 'fees.reference';

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
        self::TYPE_PHPNAME       => array('FeeId', 'FeeType', 'FeeAmount', 'YearlyOccurrence', 'StartYear', 'EndYear', 'CreditCardId', 'UpdateTime', 'UpdateUser', 'Reference', ),
        self::TYPE_CAMELNAME     => array('feeId', 'feeType', 'feeAmount', 'yearlyOccurrence', 'startYear', 'endYear', 'creditCardId', 'updateTime', 'updateUser', 'reference', ),
        self::TYPE_COLNAME       => array(FeesTableMap::COL_FEE_ID, FeesTableMap::COL_FEE_TYPE, FeesTableMap::COL_FEE_AMOUNT, FeesTableMap::COL_YEARLY_OCCURRENCE, FeesTableMap::COL_START_YEAR, FeesTableMap::COL_END_YEAR, FeesTableMap::COL_CREDIT_CARD_ID, FeesTableMap::COL_UPDATE_TIME, FeesTableMap::COL_UPDATE_USER, FeesTableMap::COL_REFERENCE, ),
        self::TYPE_FIELDNAME     => array('fee_id', 'fee_type', 'fee_amount', 'yearly_occurrence', 'start_year', 'end_year', 'credit_card_id', 'update_time', 'update_user', 'reference', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FeeId' => 0, 'FeeType' => 1, 'FeeAmount' => 2, 'YearlyOccurrence' => 3, 'StartYear' => 4, 'EndYear' => 5, 'CreditCardId' => 6, 'UpdateTime' => 7, 'UpdateUser' => 8, 'Reference' => 9, ),
        self::TYPE_CAMELNAME     => array('feeId' => 0, 'feeType' => 1, 'feeAmount' => 2, 'yearlyOccurrence' => 3, 'startYear' => 4, 'endYear' => 5, 'creditCardId' => 6, 'updateTime' => 7, 'updateUser' => 8, 'reference' => 9, ),
        self::TYPE_COLNAME       => array(FeesTableMap::COL_FEE_ID => 0, FeesTableMap::COL_FEE_TYPE => 1, FeesTableMap::COL_FEE_AMOUNT => 2, FeesTableMap::COL_YEARLY_OCCURRENCE => 3, FeesTableMap::COL_START_YEAR => 4, FeesTableMap::COL_END_YEAR => 5, FeesTableMap::COL_CREDIT_CARD_ID => 6, FeesTableMap::COL_UPDATE_TIME => 7, FeesTableMap::COL_UPDATE_USER => 8, FeesTableMap::COL_REFERENCE => 9, ),
        self::TYPE_FIELDNAME     => array('fee_id' => 0, 'fee_type' => 1, 'fee_amount' => 2, 'yearly_occurrence' => 3, 'start_year' => 4, 'end_year' => 5, 'credit_card_id' => 6, 'update_time' => 7, 'update_user' => 8, 'reference' => 9, ),
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
        $this->setName('fees');
        $this->setPhpName('Fees');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Fees');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('fee_id', 'FeeId', 'INTEGER', true, null, null);
        $this->addColumn('fee_type', 'FeeType', 'INTEGER', true, null, null);
        $this->addColumn('fee_amount', 'FeeAmount', 'INTEGER', true, null, null);
        $this->addColumn('yearly_occurrence', 'YearlyOccurrence', 'INTEGER', false, null, null);
        $this->addColumn('start_year', 'StartYear', 'INTEGER', false, null, null);
        $this->addColumn('end_year', 'EndYear', 'INTEGER', false, null, null);
        $this->addForeignKey('credit_card_id', 'CreditCardId', 'INTEGER', 'credit_card', 'credit_card_id', true, null, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
        $this->addColumn('reference', 'Reference', 'VARCHAR', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CreditCard', '\\CreditCard', RelationMap::MANY_TO_ONE, array('credit_card_id' => 'credit_card_id', ), null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FeeId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('FeeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? FeesTableMap::CLASS_DEFAULT : FeesTableMap::OM_CLASS;
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
     * @return array           (Fees object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FeesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FeesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FeesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FeesTableMap::OM_CLASS;
            /** @var Fees $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FeesTableMap::addInstanceToPool($obj, $key);
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
            $key = FeesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FeesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Fees $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FeesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FeesTableMap::COL_FEE_ID);
            $criteria->addSelectColumn(FeesTableMap::COL_FEE_TYPE);
            $criteria->addSelectColumn(FeesTableMap::COL_FEE_AMOUNT);
            $criteria->addSelectColumn(FeesTableMap::COL_YEARLY_OCCURRENCE);
            $criteria->addSelectColumn(FeesTableMap::COL_START_YEAR);
            $criteria->addSelectColumn(FeesTableMap::COL_END_YEAR);
            $criteria->addSelectColumn(FeesTableMap::COL_CREDIT_CARD_ID);
            $criteria->addSelectColumn(FeesTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(FeesTableMap::COL_UPDATE_USER);
            $criteria->addSelectColumn(FeesTableMap::COL_REFERENCE);
        } else {
            $criteria->addSelectColumn($alias . '.fee_id');
            $criteria->addSelectColumn($alias . '.fee_type');
            $criteria->addSelectColumn($alias . '.fee_amount');
            $criteria->addSelectColumn($alias . '.yearly_occurrence');
            $criteria->addSelectColumn($alias . '.start_year');
            $criteria->addSelectColumn($alias . '.end_year');
            $criteria->addSelectColumn($alias . '.credit_card_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(FeesTableMap::DATABASE_NAME)->getTable(FeesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FeesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FeesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FeesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Fees or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Fees object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FeesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Fees) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FeesTableMap::DATABASE_NAME);
            $criteria->add(FeesTableMap::COL_FEE_ID, (array) $values, Criteria::IN);
        }

        $query = FeesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FeesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FeesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the fees table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FeesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Fees or Criteria object.
     *
     * @param mixed               $criteria Criteria or Fees object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FeesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Fees object
        }

        if ($criteria->containsKey(FeesTableMap::COL_FEE_ID) && $criteria->keyContainsValue(FeesTableMap::COL_FEE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FeesTableMap::COL_FEE_ID.')');
        }


        // Set the correct dbName
        $query = FeesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FeesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FeesTableMap::buildTableMap();
