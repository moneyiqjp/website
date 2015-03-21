<?php

namespace Base;

use \DiscountsHistory as ChildDiscountsHistory;
use \DiscountsHistoryQuery as ChildDiscountsHistoryQuery;
use \Exception;
use \PDO;
use Map\DiscountsHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'discounts_history' table.
 *
 *
 *
 * @method     ChildDiscountsHistoryQuery orderByDiscountId($order = Criteria::ASC) Order by the discount_id column
 * @method     ChildDiscountsHistoryQuery orderByPercentage($order = Criteria::ASC) Order by the percentage column
 * @method     ChildDiscountsHistoryQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     ChildDiscountsHistoryQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     ChildDiscountsHistoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildDiscountsHistoryQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildDiscountsHistoryQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildDiscountsHistoryQuery orderByMultiple($order = Criteria::ASC) Order by the multiple column
 * @method     ChildDiscountsHistoryQuery orderByConditions($order = Criteria::ASC) Order by the conditions column
 * @method     ChildDiscountsHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildDiscountsHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildDiscountsHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildDiscountsHistoryQuery groupByDiscountId() Group by the discount_id column
 * @method     ChildDiscountsHistoryQuery groupByPercentage() Group by the percentage column
 * @method     ChildDiscountsHistoryQuery groupByStartDate() Group by the start_date column
 * @method     ChildDiscountsHistoryQuery groupByEndDate() Group by the end_date column
 * @method     ChildDiscountsHistoryQuery groupByDescription() Group by the description column
 * @method     ChildDiscountsHistoryQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildDiscountsHistoryQuery groupByStoreId() Group by the store_id column
 * @method     ChildDiscountsHistoryQuery groupByMultiple() Group by the multiple column
 * @method     ChildDiscountsHistoryQuery groupByConditions() Group by the conditions column
 * @method     ChildDiscountsHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildDiscountsHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildDiscountsHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildDiscountsHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDiscountsHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDiscountsHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDiscountsHistory findOne(ConnectionInterface $con = null) Return the first ChildDiscountsHistory matching the query
 * @method     ChildDiscountsHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDiscountsHistory matching the query, or a new ChildDiscountsHistory object populated from the query conditions when no match is found
 *
 * @method     ChildDiscountsHistory findOneByDiscountId(int $discount_id) Return the first ChildDiscountsHistory filtered by the discount_id column
 * @method     ChildDiscountsHistory findOneByPercentage(double $percentage) Return the first ChildDiscountsHistory filtered by the percentage column
 * @method     ChildDiscountsHistory findOneByStartDate(string $start_date) Return the first ChildDiscountsHistory filtered by the start_date column
 * @method     ChildDiscountsHistory findOneByEndDate(string $end_date) Return the first ChildDiscountsHistory filtered by the end_date column
 * @method     ChildDiscountsHistory findOneByDescription(string $description) Return the first ChildDiscountsHistory filtered by the description column
 * @method     ChildDiscountsHistory findOneByCreditCardId(int $credit_card_id) Return the first ChildDiscountsHistory filtered by the credit_card_id column
 * @method     ChildDiscountsHistory findOneByStoreId(int $store_id) Return the first ChildDiscountsHistory filtered by the store_id column
 * @method     ChildDiscountsHistory findOneByMultiple(double $multiple) Return the first ChildDiscountsHistory filtered by the multiple column
 * @method     ChildDiscountsHistory findOneByConditions(string $conditions) Return the first ChildDiscountsHistory filtered by the conditions column
 * @method     ChildDiscountsHistory findOneByTimeBeg(string $time_beg) Return the first ChildDiscountsHistory filtered by the time_beg column
 * @method     ChildDiscountsHistory findOneByTimeEnd(string $time_end) Return the first ChildDiscountsHistory filtered by the time_end column
 * @method     ChildDiscountsHistory findOneByUpdateUser(string $update_user) Return the first ChildDiscountsHistory filtered by the update_user column
 *
 * @method     ChildDiscountsHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDiscountsHistory objects based on current ModelCriteria
 * @method     ChildDiscountsHistory[]|ObjectCollection findByDiscountId(int $discount_id) Return ChildDiscountsHistory objects filtered by the discount_id column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByPercentage(double $percentage) Return ChildDiscountsHistory objects filtered by the percentage column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByStartDate(string $start_date) Return ChildDiscountsHistory objects filtered by the start_date column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByEndDate(string $end_date) Return ChildDiscountsHistory objects filtered by the end_date column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByDescription(string $description) Return ChildDiscountsHistory objects filtered by the description column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildDiscountsHistory objects filtered by the credit_card_id column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByStoreId(int $store_id) Return ChildDiscountsHistory objects filtered by the store_id column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByMultiple(double $multiple) Return ChildDiscountsHistory objects filtered by the multiple column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByConditions(string $conditions) Return ChildDiscountsHistory objects filtered by the conditions column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildDiscountsHistory objects filtered by the time_beg column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildDiscountsHistory objects filtered by the time_end column
 * @method     ChildDiscountsHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildDiscountsHistory objects filtered by the update_user column
 * @method     ChildDiscountsHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DiscountsHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\DiscountsHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DiscountsHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDiscountsHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDiscountsHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDiscountsHistoryQuery) {
            return $criteria;
        }
        $query = new ChildDiscountsHistoryQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$discount_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDiscountsHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DiscountsHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DiscountsHistoryTableMap::DATABASE_NAME);
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
     * @return ChildDiscountsHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT discount_id, percentage, start_date, end_date, description, credit_card_id, store_id, multiple, conditions, time_beg, time_end, update_user FROM discounts_history WHERE discount_id = :p0 AND time_beg = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1] ? $key[1]->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDiscountsHistory $obj */
            $obj = new ChildDiscountsHistory();
            $obj->hydrate($row);
            DiscountsHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildDiscountsHistory|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(DiscountsHistoryTableMap::COL_DISCOUNT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(DiscountsHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(DiscountsHistoryTableMap::COL_DISCOUNT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(DiscountsHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the discount_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscountId(1234); // WHERE discount_id = 1234
     * $query->filterByDiscountId(array(12, 34)); // WHERE discount_id IN (12, 34)
     * $query->filterByDiscountId(array('min' => 12)); // WHERE discount_id > 12
     * </code>
     *
     * @param     mixed $discountId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByDiscountId($discountId = null, $comparison = null)
    {
        if (is_array($discountId)) {
            $useMinMax = false;
            if (isset($discountId['min'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_DISCOUNT_ID, $discountId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discountId['max'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_DISCOUNT_ID, $discountId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_DISCOUNT_ID, $discountId, $comparison);
    }

    /**
     * Filter the query on the percentage column
     *
     * Example usage:
     * <code>
     * $query->filterByPercentage(1234); // WHERE percentage = 1234
     * $query->filterByPercentage(array(12, 34)); // WHERE percentage IN (12, 34)
     * $query->filterByPercentage(array('min' => 12)); // WHERE percentage > 12
     * </code>
     *
     * @param     mixed $percentage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByPercentage($percentage = null, $comparison = null)
    {
        if (is_array($percentage)) {
            $useMinMax = false;
            if (isset($percentage['min'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_PERCENTAGE, $percentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percentage['max'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_PERCENTAGE, $percentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_PERCENTAGE, $percentage, $comparison);
    }

    /**
     * Filter the query on the start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByStartDate('2011-03-14'); // WHERE start_date = '2011-03-14'
     * $query->filterByStartDate('now'); // WHERE start_date = '2011-03-14'
     * $query->filterByStartDate(array('max' => 'yesterday')); // WHERE start_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $startDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByStartDate($startDate = null, $comparison = null)
    {
        if (is_array($startDate)) {
            $useMinMax = false;
            if (isset($startDate['min'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_START_DATE, $startDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startDate['max'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_START_DATE, $startDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_START_DATE, $startDate, $comparison);
    }

    /**
     * Filter the query on the end_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEndDate('2011-03-14'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate('now'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate(array('max' => 'yesterday')); // WHERE end_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $endDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByEndDate($endDate = null, $comparison = null)
    {
        if (is_array($endDate)) {
            $useMinMax = false;
            if (isset($endDate['min'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endDate['max'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_END_DATE, $endDate, $comparison);
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
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the credit_card_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreditCardId(1234); // WHERE credit_card_id = 1234
     * $query->filterByCreditCardId(array(12, 34)); // WHERE credit_card_id IN (12, 34)
     * $query->filterByCreditCardId(array('min' => 12)); // WHERE credit_card_id > 12
     * </code>
     *
     * @param     mixed $creditCardId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Filter the query on the multiple column
     *
     * Example usage:
     * <code>
     * $query->filterByMultiple(1234); // WHERE multiple = 1234
     * $query->filterByMultiple(array(12, 34)); // WHERE multiple IN (12, 34)
     * $query->filterByMultiple(array('min' => 12)); // WHERE multiple > 12
     * </code>
     *
     * @param     mixed $multiple The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByMultiple($multiple = null, $comparison = null)
    {
        if (is_array($multiple)) {
            $useMinMax = false;
            if (isset($multiple['min'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_MULTIPLE, $multiple['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($multiple['max'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_MULTIPLE, $multiple['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_MULTIPLE, $multiple, $comparison);
    }

    /**
     * Filter the query on the conditions column
     *
     * Example usage:
     * <code>
     * $query->filterByConditions('fooValue');   // WHERE conditions = 'fooValue'
     * $query->filterByConditions('%fooValue%'); // WHERE conditions LIKE '%fooValue%'
     * </code>
     *
     * @param     string $conditions The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByConditions($conditions = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($conditions)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $conditions)) {
                $conditions = str_replace('*', '%', $conditions);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_CONDITIONS, $conditions, $comparison);
    }

    /**
     * Filter the query on the time_beg column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeBeg('2011-03-14'); // WHERE time_beg = '2011-03-14'
     * $query->filterByTimeBeg('now'); // WHERE time_beg = '2011-03-14'
     * $query->filterByTimeBeg(array('max' => 'yesterday')); // WHERE time_beg > '2011-03-13'
     * </code>
     *
     * @param     mixed $timeBeg The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
    }

    /**
     * Filter the query on the time_end column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeEnd('2011-03-14'); // WHERE time_end = '2011-03-14'
     * $query->filterByTimeEnd('now'); // WHERE time_end = '2011-03-14'
     * $query->filterByTimeEnd(array('max' => 'yesterday')); // WHERE time_end > '2011-03-13'
     * </code>
     *
     * @param     mixed $timeEnd The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(DiscountsHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiscountsHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDiscountsHistory $discountsHistory Object to remove from the list of results
     *
     * @return $this|ChildDiscountsHistoryQuery The current query, for fluid interface
     */
    public function prune($discountsHistory = null)
    {
        if ($discountsHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(DiscountsHistoryTableMap::COL_DISCOUNT_ID), $discountsHistory->getDiscountId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(DiscountsHistoryTableMap::COL_TIME_BEG), $discountsHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the discounts_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DiscountsHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DiscountsHistoryTableMap::clearInstancePool();
            DiscountsHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DiscountsHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DiscountsHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DiscountsHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DiscountsHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DiscountsHistoryQuery
