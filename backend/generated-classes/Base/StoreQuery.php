<?php

namespace Base;

use \Store as ChildStore;
use \StoreQuery as ChildStoreQuery;
use \Exception;
use \PDO;
use Map\StoreTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'store' table.
 *
 *
 *
 * @method     ChildStoreQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildStoreQuery orderByStoreName($order = Criteria::ASC) Order by the store_name column
 * @method     ChildStoreQuery orderByStoreCategoryId($order = Criteria::ASC) Order by the store_category_id column
 * @method     ChildStoreQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildStoreQuery orderByIsMajor($order = Criteria::ASC) Order by the is_major column
 * @method     ChildStoreQuery orderByAllocation($order = Criteria::ASC) Order by the allocation column
 * @method     ChildStoreQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildStoreQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildStoreQuery groupByStoreId() Group by the store_id column
 * @method     ChildStoreQuery groupByStoreName() Group by the store_name column
 * @method     ChildStoreQuery groupByStoreCategoryId() Group by the store_category_id column
 * @method     ChildStoreQuery groupByDescription() Group by the description column
 * @method     ChildStoreQuery groupByIsMajor() Group by the is_major column
 * @method     ChildStoreQuery groupByAllocation() Group by the allocation column
 * @method     ChildStoreQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildStoreQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildStoreQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStoreQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStoreQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStoreQuery leftJoinStoreCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the StoreCategory relation
 * @method     ChildStoreQuery rightJoinStoreCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StoreCategory relation
 * @method     ChildStoreQuery innerJoinStoreCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the StoreCategory relation
 *
 * @method     ChildStoreQuery leftJoinDiscounts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discounts relation
 * @method     ChildStoreQuery rightJoinDiscounts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discounts relation
 * @method     ChildStoreQuery innerJoinDiscounts($relationAlias = null) Adds a INNER JOIN clause to the query using the Discounts relation
 *
 * @method     ChildStoreQuery leftJoinMapPersonaStore($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapPersonaStore relation
 * @method     ChildStoreQuery rightJoinMapPersonaStore($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapPersonaStore relation
 * @method     ChildStoreQuery innerJoinMapPersonaStore($relationAlias = null) Adds a INNER JOIN clause to the query using the MapPersonaStore relation
 *
 * @method     ChildStoreQuery leftJoinMileage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mileage relation
 * @method     ChildStoreQuery rightJoinMileage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mileage relation
 * @method     ChildStoreQuery innerJoinMileage($relationAlias = null) Adds a INNER JOIN clause to the query using the Mileage relation
 *
 * @method     ChildStoreQuery leftJoinPointAcquisition($relationAlias = null) Adds a LEFT JOIN clause to the query using the PointAcquisition relation
 * @method     ChildStoreQuery rightJoinPointAcquisition($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PointAcquisition relation
 * @method     ChildStoreQuery innerJoinPointAcquisition($relationAlias = null) Adds a INNER JOIN clause to the query using the PointAcquisition relation
 *
 * @method     ChildStoreQuery leftJoinPointUse($relationAlias = null) Adds a LEFT JOIN clause to the query using the PointUse relation
 * @method     ChildStoreQuery rightJoinPointUse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PointUse relation
 * @method     ChildStoreQuery innerJoinPointUse($relationAlias = null) Adds a INNER JOIN clause to the query using the PointUse relation
 *
 * @method     ChildStoreQuery leftJoinReward($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reward relation
 * @method     ChildStoreQuery rightJoinReward($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reward relation
 * @method     ChildStoreQuery innerJoinReward($relationAlias = null) Adds a INNER JOIN clause to the query using the Reward relation
 *
 * @method     \StoreCategoryQuery|\DiscountsQuery|\MapPersonaStoreQuery|\MileageQuery|\PointAcquisitionQuery|\PointUseQuery|\RewardQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildStore findOne(ConnectionInterface $con = null) Return the first ChildStore matching the query
 * @method     ChildStore findOneOrCreate(ConnectionInterface $con = null) Return the first ChildStore matching the query, or a new ChildStore object populated from the query conditions when no match is found
 *
 * @method     ChildStore findOneByStoreId(int $store_id) Return the first ChildStore filtered by the store_id column
 * @method     ChildStore findOneByStoreName(string $store_name) Return the first ChildStore filtered by the store_name column
 * @method     ChildStore findOneByStoreCategoryId(int $store_category_id) Return the first ChildStore filtered by the store_category_id column
 * @method     ChildStore findOneByDescription(string $description) Return the first ChildStore filtered by the description column
 * @method     ChildStore findOneByIsMajor(int $is_major) Return the first ChildStore filtered by the is_major column
 * @method     ChildStore findOneByAllocation(int $allocation) Return the first ChildStore filtered by the allocation column
 * @method     ChildStore findOneByUpdateTime(string $update_time) Return the first ChildStore filtered by the update_time column
 * @method     ChildStore findOneByUpdateUser(string $update_user) Return the first ChildStore filtered by the update_user column
 *
 * @method     ChildStore[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildStore objects based on current ModelCriteria
 * @method     ChildStore[]|ObjectCollection findByStoreId(int $store_id) Return ChildStore objects filtered by the store_id column
 * @method     ChildStore[]|ObjectCollection findByStoreName(string $store_name) Return ChildStore objects filtered by the store_name column
 * @method     ChildStore[]|ObjectCollection findByStoreCategoryId(int $store_category_id) Return ChildStore objects filtered by the store_category_id column
 * @method     ChildStore[]|ObjectCollection findByDescription(string $description) Return ChildStore objects filtered by the description column
 * @method     ChildStore[]|ObjectCollection findByIsMajor(int $is_major) Return ChildStore objects filtered by the is_major column
 * @method     ChildStore[]|ObjectCollection findByAllocation(int $allocation) Return ChildStore objects filtered by the allocation column
 * @method     ChildStore[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildStore objects filtered by the update_time column
 * @method     ChildStore[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildStore objects filtered by the update_user column
 * @method     ChildStore[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class StoreQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\StoreQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Store', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildStoreQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildStoreQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildStoreQuery) {
            return $criteria;
        }
        $query = new ChildStoreQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildStore|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StoreTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(StoreTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildStore A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT store_id, store_name, store_category_id, description, is_major, allocation, update_time, update_user FROM store WHERE store_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildStore $obj */
            $obj = new ChildStore();
            $obj->hydrate($row);
            StoreTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildStore|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StoreTableMap::COL_STORE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StoreTableMap::COL_STORE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the store_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreId(1234); // WHERE store_id = 1234
     * $query->filterByStoreId(array(12, 34)); // WHERE store_id IN (12, 34)
     * $query->filterByStoreId(array('min' => 12)); // WHERE store_id > 12
     * </code>
     *
     * @param     mixed $storeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(StoreTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(StoreTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StoreTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Filter the query on the store_name column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreName('fooValue');   // WHERE store_name = 'fooValue'
     * $query->filterByStoreName('%fooValue%'); // WHERE store_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $storeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByStoreName($storeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($storeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $storeName)) {
                $storeName = str_replace('*', '%', $storeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StoreTableMap::COL_STORE_NAME, $storeName, $comparison);
    }

    /**
     * Filter the query on the store_category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreCategoryId(1234); // WHERE store_category_id = 1234
     * $query->filterByStoreCategoryId(array(12, 34)); // WHERE store_category_id IN (12, 34)
     * $query->filterByStoreCategoryId(array('min' => 12)); // WHERE store_category_id > 12
     * </code>
     *
     * @see       filterByStoreCategory()
     *
     * @param     mixed $storeCategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByStoreCategoryId($storeCategoryId = null, $comparison = null)
    {
        if (is_array($storeCategoryId)) {
            $useMinMax = false;
            if (isset($storeCategoryId['min'])) {
                $this->addUsingAlias(StoreTableMap::COL_STORE_CATEGORY_ID, $storeCategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeCategoryId['max'])) {
                $this->addUsingAlias(StoreTableMap::COL_STORE_CATEGORY_ID, $storeCategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StoreTableMap::COL_STORE_CATEGORY_ID, $storeCategoryId, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StoreTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the is_major column
     *
     * Example usage:
     * <code>
     * $query->filterByIsMajor(1234); // WHERE is_major = 1234
     * $query->filterByIsMajor(array(12, 34)); // WHERE is_major IN (12, 34)
     * $query->filterByIsMajor(array('min' => 12)); // WHERE is_major > 12
     * </code>
     *
     * @param     mixed $isMajor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByIsMajor($isMajor = null, $comparison = null)
    {
        if (is_array($isMajor)) {
            $useMinMax = false;
            if (isset($isMajor['min'])) {
                $this->addUsingAlias(StoreTableMap::COL_IS_MAJOR, $isMajor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isMajor['max'])) {
                $this->addUsingAlias(StoreTableMap::COL_IS_MAJOR, $isMajor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StoreTableMap::COL_IS_MAJOR, $isMajor, $comparison);
    }

    /**
     * Filter the query on the allocation column
     *
     * Example usage:
     * <code>
     * $query->filterByAllocation(1234); // WHERE allocation = 1234
     * $query->filterByAllocation(array(12, 34)); // WHERE allocation IN (12, 34)
     * $query->filterByAllocation(array('min' => 12)); // WHERE allocation > 12
     * </code>
     *
     * @param     mixed $allocation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByAllocation($allocation = null, $comparison = null)
    {
        if (is_array($allocation)) {
            $useMinMax = false;
            if (isset($allocation['min'])) {
                $this->addUsingAlias(StoreTableMap::COL_ALLOCATION, $allocation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($allocation['max'])) {
                $this->addUsingAlias(StoreTableMap::COL_ALLOCATION, $allocation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StoreTableMap::COL_ALLOCATION, $allocation, $comparison);
    }

    /**
     * Filter the query on the update_time column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateTime('2011-03-14'); // WHERE update_time = '2011-03-14'
     * $query->filterByUpdateTime('now'); // WHERE update_time = '2011-03-14'
     * $query->filterByUpdateTime(array('max' => 'yesterday')); // WHERE update_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $updateTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(StoreTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(StoreTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StoreTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
    }

    /**
     * Filter the query on the update_user column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateUser('fooValue');   // WHERE update_user = 'fooValue'
     * $query->filterByUpdateUser('%fooValue%'); // WHERE update_user LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updateUser The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function filterByUpdateUser($updateUser = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updateUser)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updateUser)) {
                $updateUser = str_replace('*', '%', $updateUser);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StoreTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \StoreCategory object
     *
     * @param \StoreCategory|ObjectCollection $storeCategory The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildStoreQuery The current query, for fluid interface
     */
    public function filterByStoreCategory($storeCategory, $comparison = null)
    {
        if ($storeCategory instanceof \StoreCategory) {
            return $this
                ->addUsingAlias(StoreTableMap::COL_STORE_CATEGORY_ID, $storeCategory->getStoreCategoryId(), $comparison);
        } elseif ($storeCategory instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StoreTableMap::COL_STORE_CATEGORY_ID, $storeCategory->toKeyValue('PrimaryKey', 'StoreCategoryId'), $comparison);
        } else {
            throw new PropelException('filterByStoreCategory() only accepts arguments of type \StoreCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StoreCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function joinStoreCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StoreCategory');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'StoreCategory');
        }

        return $this;
    }

    /**
     * Use the StoreCategory relation StoreCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \StoreCategoryQuery A secondary query class using the current class as primary query
     */
    public function useStoreCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStoreCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StoreCategory', '\StoreCategoryQuery');
    }

    /**
     * Filter the query by a related \Discounts object
     *
     * @param \Discounts|ObjectCollection $discounts  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStoreQuery The current query, for fluid interface
     */
    public function filterByDiscounts($discounts, $comparison = null)
    {
        if ($discounts instanceof \Discounts) {
            return $this
                ->addUsingAlias(StoreTableMap::COL_STORE_ID, $discounts->getStoreId(), $comparison);
        } elseif ($discounts instanceof ObjectCollection) {
            return $this
                ->useDiscountsQuery()
                ->filterByPrimaryKeys($discounts->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscounts() only accepts arguments of type \Discounts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discounts relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function joinDiscounts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Discounts');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Discounts');
        }

        return $this;
    }

    /**
     * Use the Discounts relation Discounts object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DiscountsQuery A secondary query class using the current class as primary query
     */
    public function useDiscountsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiscounts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discounts', '\DiscountsQuery');
    }

    /**
     * Filter the query by a related \MapPersonaStore object
     *
     * @param \MapPersonaStore|ObjectCollection $mapPersonaStore  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStoreQuery The current query, for fluid interface
     */
    public function filterByMapPersonaStore($mapPersonaStore, $comparison = null)
    {
        if ($mapPersonaStore instanceof \MapPersonaStore) {
            return $this
                ->addUsingAlias(StoreTableMap::COL_STORE_ID, $mapPersonaStore->getStoreId(), $comparison);
        } elseif ($mapPersonaStore instanceof ObjectCollection) {
            return $this
                ->useMapPersonaStoreQuery()
                ->filterByPrimaryKeys($mapPersonaStore->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapPersonaStore() only accepts arguments of type \MapPersonaStore or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapPersonaStore relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function joinMapPersonaStore($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapPersonaStore');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'MapPersonaStore');
        }

        return $this;
    }

    /**
     * Use the MapPersonaStore relation MapPersonaStore object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MapPersonaStoreQuery A secondary query class using the current class as primary query
     */
    public function useMapPersonaStoreQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapPersonaStore($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapPersonaStore', '\MapPersonaStoreQuery');
    }

    /**
     * Filter the query by a related \Mileage object
     *
     * @param \Mileage|ObjectCollection $mileage  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStoreQuery The current query, for fluid interface
     */
    public function filterByMileage($mileage, $comparison = null)
    {
        if ($mileage instanceof \Mileage) {
            return $this
                ->addUsingAlias(StoreTableMap::COL_STORE_ID, $mileage->getStoreId(), $comparison);
        } elseif ($mileage instanceof ObjectCollection) {
            return $this
                ->useMileageQuery()
                ->filterByPrimaryKeys($mileage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMileage() only accepts arguments of type \Mileage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mileage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function joinMileage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mileage');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Mileage');
        }

        return $this;
    }

    /**
     * Use the Mileage relation Mileage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MileageQuery A secondary query class using the current class as primary query
     */
    public function useMileageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMileage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mileage', '\MileageQuery');
    }

    /**
     * Filter the query by a related \PointAcquisition object
     *
     * @param \PointAcquisition|ObjectCollection $pointAcquisition  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStoreQuery The current query, for fluid interface
     */
    public function filterByPointAcquisition($pointAcquisition, $comparison = null)
    {
        if ($pointAcquisition instanceof \PointAcquisition) {
            return $this
                ->addUsingAlias(StoreTableMap::COL_STORE_ID, $pointAcquisition->getStoreId(), $comparison);
        } elseif ($pointAcquisition instanceof ObjectCollection) {
            return $this
                ->usePointAcquisitionQuery()
                ->filterByPrimaryKeys($pointAcquisition->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPointAcquisition() only accepts arguments of type \PointAcquisition or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PointAcquisition relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function joinPointAcquisition($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PointAcquisition');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PointAcquisition');
        }

        return $this;
    }

    /**
     * Use the PointAcquisition relation PointAcquisition object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PointAcquisitionQuery A secondary query class using the current class as primary query
     */
    public function usePointAcquisitionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPointAcquisition($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PointAcquisition', '\PointAcquisitionQuery');
    }

    /**
     * Filter the query by a related \PointUse object
     *
     * @param \PointUse|ObjectCollection $pointUse  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStoreQuery The current query, for fluid interface
     */
    public function filterByPointUse($pointUse, $comparison = null)
    {
        if ($pointUse instanceof \PointUse) {
            return $this
                ->addUsingAlias(StoreTableMap::COL_STORE_ID, $pointUse->getStoreId(), $comparison);
        } elseif ($pointUse instanceof ObjectCollection) {
            return $this
                ->usePointUseQuery()
                ->filterByPrimaryKeys($pointUse->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPointUse() only accepts arguments of type \PointUse or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PointUse relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function joinPointUse($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PointUse');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PointUse');
        }

        return $this;
    }

    /**
     * Use the PointUse relation PointUse object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PointUseQuery A secondary query class using the current class as primary query
     */
    public function usePointUseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPointUse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PointUse', '\PointUseQuery');
    }

    /**
     * Filter the query by a related \Reward object
     *
     * @param \Reward|ObjectCollection $reward  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStoreQuery The current query, for fluid interface
     */
    public function filterByReward($reward, $comparison = null)
    {
        if ($reward instanceof \Reward) {
            return $this
                ->addUsingAlias(StoreTableMap::COL_STORE_ID, $reward->getStoreId(), $comparison);
        } elseif ($reward instanceof ObjectCollection) {
            return $this
                ->useRewardQuery()
                ->filterByPrimaryKeys($reward->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByReward() only accepts arguments of type \Reward or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Reward relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function joinReward($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Reward');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Reward');
        }

        return $this;
    }

    /**
     * Use the Reward relation Reward object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RewardQuery A secondary query class using the current class as primary query
     */
    public function useRewardQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinReward($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Reward', '\RewardQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildStore $store Object to remove from the list of results
     *
     * @return $this|ChildStoreQuery The current query, for fluid interface
     */
    public function prune($store = null)
    {
        if ($store) {
            $this->addUsingAlias(StoreTableMap::COL_STORE_ID, $store->getStoreId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the store table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StoreTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StoreTableMap::clearInstancePool();
            StoreTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StoreTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(StoreTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            StoreTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            StoreTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // StoreQuery
