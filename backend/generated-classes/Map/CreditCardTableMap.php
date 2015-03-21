<?php

namespace Map;

use \CreditCard;
use \CreditCardQuery;
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
 * This class defines the structure of the 'credit_card' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CreditCardTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CreditCardTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'credit_card';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CreditCard';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CreditCard';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the credit_card_id field
     */
    const COL_CREDIT_CARD_ID = 'credit_card.credit_card_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'credit_card.name';

    /**
     * the column name for the issuer_id field
     */
    const COL_ISSUER_ID = 'credit_card.issuer_id';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'credit_card.description';

    /**
     * the column name for the image_link field
     */
    const COL_IMAGE_LINK = 'credit_card.image_link';

    /**
     * the column name for the visa field
     */
    const COL_VISA = 'credit_card.visa';

    /**
     * the column name for the master field
     */
    const COL_MASTER = 'credit_card.master';

    /**
     * the column name for the jcb field
     */
    const COL_JCB = 'credit_card.jcb';

    /**
     * the column name for the amex field
     */
    const COL_AMEX = 'credit_card.amex';

    /**
     * the column name for the diners field
     */
    const COL_DINERS = 'credit_card.diners';

    /**
     * the column name for the afilliate_link field
     */
    const COL_AFILLIATE_LINK = 'credit_card.afilliate_link';

    /**
     * the column name for the affiliate_id field
     */
    const COL_AFFILIATE_ID = 'credit_card.affiliate_id';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'credit_card.update_time';

    /**
     * the column name for the update_user field
     */
    const COL_UPDATE_USER = 'credit_card.update_user';

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
        self::TYPE_PHPNAME       => array('CreditCardId', 'Name', 'IssuerId', 'Description', 'ImageLink', 'Visa', 'Master', 'Jcb', 'Amex', 'Diners', 'AfilliateLink', 'AffiliateId', 'UpdateTime', 'UpdateUser', ),
        self::TYPE_CAMELNAME     => array('creditCardId', 'name', 'issuerId', 'description', 'imageLink', 'visa', 'master', 'jcb', 'amex', 'diners', 'afilliateLink', 'affiliateId', 'updateTime', 'updateUser', ),
        self::TYPE_COLNAME       => array(CreditCardTableMap::COL_CREDIT_CARD_ID, CreditCardTableMap::COL_NAME, CreditCardTableMap::COL_ISSUER_ID, CreditCardTableMap::COL_DESCRIPTION, CreditCardTableMap::COL_IMAGE_LINK, CreditCardTableMap::COL_VISA, CreditCardTableMap::COL_MASTER, CreditCardTableMap::COL_JCB, CreditCardTableMap::COL_AMEX, CreditCardTableMap::COL_DINERS, CreditCardTableMap::COL_AFILLIATE_LINK, CreditCardTableMap::COL_AFFILIATE_ID, CreditCardTableMap::COL_UPDATE_TIME, CreditCardTableMap::COL_UPDATE_USER, ),
        self::TYPE_FIELDNAME     => array('credit_card_id', 'name', 'issuer_id', 'description', 'image_link', 'visa', 'master', 'jcb', 'amex', 'diners', 'afilliate_link', 'affiliate_id', 'update_time', 'update_user', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CreditCardId' => 0, 'Name' => 1, 'IssuerId' => 2, 'Description' => 3, 'ImageLink' => 4, 'Visa' => 5, 'Master' => 6, 'Jcb' => 7, 'Amex' => 8, 'Diners' => 9, 'AfilliateLink' => 10, 'AffiliateId' => 11, 'UpdateTime' => 12, 'UpdateUser' => 13, ),
        self::TYPE_CAMELNAME     => array('creditCardId' => 0, 'name' => 1, 'issuerId' => 2, 'description' => 3, 'imageLink' => 4, 'visa' => 5, 'master' => 6, 'jcb' => 7, 'amex' => 8, 'diners' => 9, 'afilliateLink' => 10, 'affiliateId' => 11, 'updateTime' => 12, 'updateUser' => 13, ),
        self::TYPE_COLNAME       => array(CreditCardTableMap::COL_CREDIT_CARD_ID => 0, CreditCardTableMap::COL_NAME => 1, CreditCardTableMap::COL_ISSUER_ID => 2, CreditCardTableMap::COL_DESCRIPTION => 3, CreditCardTableMap::COL_IMAGE_LINK => 4, CreditCardTableMap::COL_VISA => 5, CreditCardTableMap::COL_MASTER => 6, CreditCardTableMap::COL_JCB => 7, CreditCardTableMap::COL_AMEX => 8, CreditCardTableMap::COL_DINERS => 9, CreditCardTableMap::COL_AFILLIATE_LINK => 10, CreditCardTableMap::COL_AFFILIATE_ID => 11, CreditCardTableMap::COL_UPDATE_TIME => 12, CreditCardTableMap::COL_UPDATE_USER => 13, ),
        self::TYPE_FIELDNAME     => array('credit_card_id' => 0, 'name' => 1, 'issuer_id' => 2, 'description' => 3, 'image_link' => 4, 'visa' => 5, 'master' => 6, 'jcb' => 7, 'amex' => 8, 'diners' => 9, 'afilliate_link' => 10, 'affiliate_id' => 11, 'update_time' => 12, 'update_user' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('credit_card');
        $this->setPhpName('CreditCard');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CreditCard');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('credit_card_id', 'CreditCardId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addForeignKey('issuer_id', 'IssuerId', 'INTEGER', 'issuer', 'issuer_id', true, null, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('image_link', 'ImageLink', 'VARCHAR', false, 255, null);
        $this->addColumn('visa', 'Visa', 'BOOLEAN', false, 1, false);
        $this->addColumn('master', 'Master', 'BOOLEAN', false, 1, false);
        $this->addColumn('jcb', 'Jcb', 'BOOLEAN', false, 1, false);
        $this->addColumn('amex', 'Amex', 'BOOLEAN', false, 1, false);
        $this->addColumn('diners', 'Diners', 'BOOLEAN', false, 1, false);
        $this->addColumn('afilliate_link', 'AfilliateLink', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('affiliate_id', 'AffiliateId', 'INTEGER', 'affiliate_company', 'affiliate_id', true, null, null);
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('update_user', 'UpdateUser', 'VARCHAR', false, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Issuer', '\\Issuer', RelationMap::MANY_TO_ONE, array('issuer_id' => 'issuer_id', ), null, null);
        $this->addRelation('AffiliateCompany', '\\AffiliateCompany', RelationMap::MANY_TO_ONE, array('affiliate_id' => 'affiliate_id', ), null, null);
        $this->addRelation('Campaign', '\\Campaign', RelationMap::ONE_TO_MANY, array('credit_card_id' => 'credit_card_id', ), null, null, 'Campaigns');
        $this->addRelation('CardDescription', '\\CardDescription', RelationMap::ONE_TO_MANY, array('credit_card_id' => 'credit_card_id', ), null, null, 'CardDescriptions');
        $this->addRelation('CardFeatures', '\\CardFeatures', RelationMap::ONE_TO_MANY, array('credit_card_id' => 'credit_card_id', ), null, null, 'CardFeaturess');
        $this->addRelation('Discounts', '\\Discounts', RelationMap::ONE_TO_MANY, array('credit_card_id' => 'credit_card_id', ), null, null, 'Discountss');
        $this->addRelation('Fees', '\\Fees', RelationMap::ONE_TO_MANY, array('credit_card_id' => 'credit_card_id', ), null, null, 'Feess');
        $this->addRelation('Insurance', '\\Insurance', RelationMap::ONE_TO_MANY, array('credit_card_id' => 'credit_card_id', ), null, null, 'Insurances');
        $this->addRelation('Interest', '\\Interest', RelationMap::ONE_TO_MANY, array('credit_card_id' => 'credit_card_id', ), null, null, 'Interests');
        $this->addRelation('PointSystem', '\\PointSystem', RelationMap::ONE_TO_MANY, array('credit_card_id' => 'credit_card_id', ), null, null, 'PointSystems');
        $this->addRelation('PointUsage', '\\PointUsage', RelationMap::ONE_TO_MANY, array('credit_card_id' => 'credit_card_id', ), null, null, 'PointUsages');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CreditCardId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CreditCardId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CreditCardId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CreditCardTableMap::CLASS_DEFAULT : CreditCardTableMap::OM_CLASS;
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
     * @return array           (CreditCard object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CreditCardTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CreditCardTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CreditCardTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CreditCardTableMap::OM_CLASS;
            /** @var CreditCard $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CreditCardTableMap::addInstanceToPool($obj, $key);
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
            $key = CreditCardTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CreditCardTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CreditCard $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CreditCardTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CreditCardTableMap::COL_CREDIT_CARD_ID);
            $criteria->addSelectColumn(CreditCardTableMap::COL_NAME);
            $criteria->addSelectColumn(CreditCardTableMap::COL_ISSUER_ID);
            $criteria->addSelectColumn(CreditCardTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(CreditCardTableMap::COL_IMAGE_LINK);
            $criteria->addSelectColumn(CreditCardTableMap::COL_VISA);
            $criteria->addSelectColumn(CreditCardTableMap::COL_MASTER);
            $criteria->addSelectColumn(CreditCardTableMap::COL_JCB);
            $criteria->addSelectColumn(CreditCardTableMap::COL_AMEX);
            $criteria->addSelectColumn(CreditCardTableMap::COL_DINERS);
            $criteria->addSelectColumn(CreditCardTableMap::COL_AFILLIATE_LINK);
            $criteria->addSelectColumn(CreditCardTableMap::COL_AFFILIATE_ID);
            $criteria->addSelectColumn(CreditCardTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(CreditCardTableMap::COL_UPDATE_USER);
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
        return Propel::getServiceContainer()->getDatabaseMap(CreditCardTableMap::DATABASE_NAME)->getTable(CreditCardTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CreditCardTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CreditCardTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CreditCardTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CreditCard or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CreditCard object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CreditCardTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CreditCard) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CreditCardTableMap::DATABASE_NAME);
            $criteria->add(CreditCardTableMap::COL_CREDIT_CARD_ID, (array) $values, Criteria::IN);
        }

        $query = CreditCardQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CreditCardTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CreditCardTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the credit_card table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CreditCardQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CreditCard or Criteria object.
     *
     * @param mixed               $criteria Criteria or CreditCard object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CreditCardTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CreditCard object
        }

        if ($criteria->containsKey(CreditCardTableMap::COL_CREDIT_CARD_ID) && $criteria->keyContainsValue(CreditCardTableMap::COL_CREDIT_CARD_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CreditCardTableMap::COL_CREDIT_CARD_ID.')');
        }


        // Set the correct dbName
        $query = CreditCardQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CreditCardTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CreditCardTableMap::buildTableMap();
