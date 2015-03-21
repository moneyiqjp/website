<?php

namespace Map;

use \Campaign;
use \CampaignQuery;
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
 * This class defines the structure of the 'campaign' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CampaignTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CampaignTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'campaign';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Campaign';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Campaign';

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
     * the column name for the campaign_id field
     */
    const COL_CAMPAIGN_ID = 'campaign.campaign_id';

    /**
     * the column name for the credit_card_id field
     */
    const COL_CREDIT_CARD_ID = 'campaign.credit_card_id';

    /**
     * the column name for the campaign_name field
     */
    const COL_CAMPAIGN_NAME = 'campaign.campaign_name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'campaign.description';

    /**
     * the column name for the max_points field
     */
    const COL_MAX_POINTS = 'campaign.max_points';

    /**
     * the column name for the value_in_yen field
     */
    const COL_VALUE_IN_YEN = 'campaign.value_in_yen';

    /**
     * the column name for the start_date field
     */
    const COL_START_DATE = 'campaign.start_date';

    /**
     * the column name for the end_date field
     */
    const COL_END_DATE = 'campaign.end_date';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'campaign.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'campaign.update_user';

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
        self::TYPE_PHPNAME       => array('CampaignId', 'CreditCardId', 'CampaignName', 'Description', 'MaxPoints', 'ValueInYen', 'StartDate', 'EndDate', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('campaignId', 'creditCardId', 'campaignName', 'description', 'maxPoints', 'valueInYen', 'startDate', 'endDate', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(CampaignTableMap::COL_CAMPAIGN_ID, CampaignTableMap::COL_CREDIT_CARD_ID, CampaignTableMap::COL_CAMPAIGN_NAME, CampaignTableMap::COL_DESCRIPTION, CampaignTableMap::COL_MAX_POINTS, CampaignTableMap::COL_VALUE_IN_YEN, CampaignTableMap::COL_START_DATE, CampaignTableMap::COL_END_DATE, CampaignTableMap::COL_UPDATE_TIME, CampaignTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('campaign_id', 'credit_card_id', 'campaign_name', 'description', 'max_points', 'value_in_yen', 'start_date', 'end_date', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CampaignId' => 0, 'CreditCardId' => 1, 'CampaignName' => 2, 'Description' => 3, 'MaxPoints' => 4, 'ValueInYen' => 5, 'StartDate' => 6, 'EndDate' => 7, 'UpdateTime' => 8, 'UpdateUser' => 9, ),
        self::TYPE_CAMELNAME     => array('campaignId' => 0, 'creditCardId' => 1, 'campaignName' => 2, 'description' => 3, 'maxPoints' => 4, 'valueInYen' => 5, 'startDate' => 6, 'endDate' => 7, 'updateTime' => 8, 'updateUser' => 9, ),
        self::TYPE_COLNAME       => array(CampaignTableMap::COL_CAMPAIGN_ID => 0, CampaignTableMap::COL_CREDIT_CARD_ID => 1, CampaignTableMap::COL_CAMPAIGN_NAME => 2, CampaignTableMap::COL_DESCRIPTION => 3, CampaignTableMap::COL_MAX_POINTS => 4, CampaignTableMap::COL_VALUE_IN_YEN => 5, CampaignTableMap::COL_START_DATE => 6, CampaignTableMap::COL_END_DATE => 7, CampaignTableMap::COL_UPDATE_TIME => 8, CampaignTableMap::COL_UPDATE_USER => 9, ),
        self::TYPE_FIELDNAME     => array('campaign_id' => 0, 'credit_card_id' => 1, 'campaign_name' => 2, 'description' => 3, 'max_points' => 4, 'value_in_yen' => 5, 'start_date' => 6, 'end_date' => 7, 'update_time' => 8, 'update_user' => 9, ),
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
        $this->setName('campaign');
        $this->setPhpName('Campaign');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Campaign');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('campaign_id', 'CampaignId', 'INTEGER', true, null, null);
        $this->addForeignKey('credit_card_id', 'CreditCardId', 'INTEGER', 'credit_card', 'credit_card_id', true, null, null);
        $this->addColumn('campaign_name', 'CampaignName', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('max_points', 'MaxPoints', 'INTEGER', false, null, null);
        $this->addColumn('value_in_yen', 'ValueInYen', 'INTEGER', false, null, null);
        $this->addColumn('start_date', 'StartDate', 'DATE', false, null, '1000-01-01');
        $this->addColumn('end_date', 'EndDate', 'DATE', false, null, '9999-12-31');
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', true, 100, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CampaignId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CampaignId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CampaignId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CampaignTableMap::CLASS_DEFAULT : CampaignTableMap::OM_CLASS;
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
     * @return array           (Campaign object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CampaignTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CampaignTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CampaignTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CampaignTableMap::OM_CLASS;
            /** @var Campaign $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CampaignTableMap::addInstanceToPool($obj, $key);
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
            $key = CampaignTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CampaignTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Campaign $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CampaignTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CampaignTableMap::COL_CAMPAIGN_ID);
            $criteria->addSelectColumn(CampaignTableMap::COL_CREDIT_CARD_ID);
            $criteria->addSelectColumn(CampaignTableMap::COL_CAMPAIGN_NAME);
            $criteria->addSelectColumn(CampaignTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(CampaignTableMap::COL_MAX_POINTS);
            $criteria->addSelectColumn(CampaignTableMap::COL_VALUE_IN_YEN);
            $criteria->addSelectColumn(CampaignTableMap::COL_START_DATE);
            $criteria->addSelectColumn(CampaignTableMap::COL_END_DATE);
            $criteria->addSelectColumn(CampaignTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(CampaignTableMap::COL_UPDATE_USER);
        } else {
            $criteria->addSelectColumn($alias . '.campaign_id');
            $criteria->addSelectColumn($alias . '.credit_card_id');
            $criteria->addSelectColumn($alias . '.campaign_name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.max_points');
            $criteria->addSelectColumn($alias . '.value_in_yen');
            $criteria->addSelectColumn($alias . '.start_date');
            $criteria->addSelectColumn($alias . '.end_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(CampaignTableMap::DATABASE_NAME)->getTable(CampaignTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CampaignTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CampaignTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CampaignTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Campaign or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Campaign object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CampaignTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Campaign) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CampaignTableMap::DATABASE_NAME);
            $criteria->add(CampaignTableMap::COL_CAMPAIGN_ID, (array) $values, Criteria::IN);
        }

        $query = CampaignQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CampaignTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CampaignTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the campaign table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CampaignQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Campaign or Criteria object.
     *
     * @param mixed               $criteria Criteria or Campaign object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CampaignTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Campaign object
        }

        if ($criteria->containsKey(CampaignTableMap::COL_CAMPAIGN_ID) && $criteria->keyContainsValue(CampaignTableMap::COL_CAMPAIGN_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CampaignTableMap::COL_CAMPAIGN_ID.')');
        }


        // Set the correct dbName
        $query = CampaignQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CampaignTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CampaignTableMap::buildTableMap();
