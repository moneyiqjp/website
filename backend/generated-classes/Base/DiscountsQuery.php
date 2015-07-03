<?php

namespace Base;

use \Discounts as ChildDiscounts;
use \DiscountsQuery as ChildDiscountsQuery;
use \Exception;
use \PDO;
use Map\DiscountsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'discounts' table.
 *
 *
 *
 * @method     ChildDiscountsQuery orderByDiscountId($order = Criteria::ASC) Order by the discount_id column
 * @method     ChildDiscountsQuery orderByPercentage($order = Criteria::ASC) Order by the percentage column
 * @method     ChildDiscountsQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     ChildDiscountsQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     ChildDiscountsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildDiscountsQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildDiscountsQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildDiscountsQuery orderByMultiple($order = Criteria::ASC) Order by the multiple column
 * @method     ChildDiscountsQuery orderByConditions($order = Criteria::ASC) Order by the conditions column
 * @method     ChildDiscountsQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildDiscountsQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 * @method     ChildDiscountsQuery orderByReference($order = Criteria::ASC) Order by the reference column
 *
 * @method     ChildDiscountsQuery groupByDiscountId() Group by the discount_id column
 * @method     ChildDiscountsQuery groupByPercentage() Group by the percentage column
 * @method     ChildDiscountsQuery groupByStartDate() Group by the start_date column
 * @method     ChildDiscountsQuery groupByEndDate() Group by the end_date column
 * @method     ChildDiscountsQuery groupByDescription() Group by the description column
 * @method     ChildDiscountsQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildDiscountsQuery groupByStoreId() Group by the store_id column
 * @method     ChildDiscountsQuery groupByMultiple() Group by the multiple column
 * @method     ChildDiscountsQuery groupByConditions() Group by the conditions column
 * @method     ChildDiscountsQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildDiscountsQuery groupByUpdateUser() Group by the update_user column
 * @method     ChildDiscountsQuery groupByReference() Group by the reference column
 *
 * @method     ChildDiscountsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDiscountsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDiscountsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDiscountsQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildDiscountsQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildDiscountsQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     ChildDiscountsQuery leftJoinStore($relationAlias = null) Adds a LEFT JOIN clause to the query using the Store relation
 * @method     ChildDiscountsQuery rightJoinStore($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Store relation
 * @method     ChildDiscountsQuery innerJoinStore($relationAlias = null) Adds a INNER JOIN clause to the query using the Store relation
 *
 * @method     \CreditCardQuery|\StoreQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDiscounts findOne(ConnectionInterface $con = null) Return the first ChildDiscounts matching the query
 * @method     ChildDiscounts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDiscounts matching the query, or a new ChildDiscounts object populated from the query conditions when no match is found
 *
 * @method     ChildDiscounts findOneByDiscountId(int $discount_id) Return the first ChildDiscounts filtered by the discount_id column
 * @method     ChildDiscounts findOneByPercentage(double $percentage) Return the first ChildDiscounts filtered by the percentage column
 * @method     ChildDiscounts findOneByStartDate(string $start_date) Return the first ChildDiscounts filtered by the start_date column
 * @method     ChildDiscounts findOneByEndDate(string $end_date) Return the first ChildDiscounts filtered by the end_date column
 * @method     ChildDiscounts findOneByDescription(string $description) Return the first ChildDiscounts filtered by the description column
 * @method     ChildDiscounts findOneByCreditCardId(int $credit_card_id) Return the first ChildDiscounts filtered by the credit_card_id column
 * @method     ChildDiscounts findOneByStoreId(int $store_id) Return the first ChildDiscounts filtered by the store_id column
 * @method     ChildDiscounts findOneByMultiple(double $multiple) Return the first ChildDiscounts filtered by the multiple column
 * @method     ChildDiscounts findOneByConditions(string $conditions) Return the first ChildDiscounts filtered by the conditions column
 * @method     ChildDiscounts findOneByUpdateTime(string $update_time) Return the first ChildDiscounts filtered by the update_time column
 * @method     ChildDiscounts findOneByUpdateUser(string $update_user) Return the first ChildDiscounts filtered by the update_user column
 * @method     ChildDiscounts findOneByReference(string $reference) Return the first ChildDiscounts filtered by the reference column
 *
 * @method     ChildDiscounts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDiscounts objects based on current ModelCriteria
 * @method     ChildDiscounts[]|ObjectCollection findByDiscountId(int $discount_id) Return ChildDiscounts objects filtered by the discount_id column
 * @method     ChildDiscounts[]|ObjectCollection findByPercentage(double $percentage) Return ChildDiscounts objects filtered by the percentage column
 * @method     ChildDiscounts[]|ObjectCollection findByStartDate(string $start_date) Return ChildDiscounts objects filtered by the start_date column
 * @method     ChildDiscounts[]|ObjectCollection findByEndDate(string $end_date) Return ChildDiscounts objects filtered by the end_date column
 * @method     ChildDiscounts[]|ObjectCollection findByDescription(string $description) Return ChildDiscounts objects filtered by the description column
 * @method     ChildDiscounts[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildDiscounts objects filtered by the credit_card_id column
 * @method     ChildDiscounts[]|ObjectCollection findByStoreId(int $store_id) Return ChildDiscounts objects filtered by the store_id column
 * @method     ChildDiscounts[]|ObjectCollection findByMultiple(double $multiple) Return ChildDiscounts objects filtered by the multiple column
 * @method     ChildDiscounts[]|ObjectCollection findByConditions(string $conditions) Return ChildDiscounts objects filtered by the conditions column
 * @method     ChildDiscounts[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildDiscounts objects filtered by the update_time column
 * @method     ChildDiscounts[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildDiscounts objects filtered by the update_user column
 * @method     ChildDiscounts[]|ObjectCollection findByReference(string $reference) Return ChildDiscounts objects filtered by the reference column
 * @method     ChildDiscounts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DiscountsQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\DiscountsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Discounts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDiscountsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDiscountsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDiscountsQuery) {
            return $criteria;
        }
        $query = new ChildDiscountsQuery();
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
     * @return ChildDiscounts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DiscountsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DiscountsTableMap::DATABASE_NAME);
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
     * @return ChildDiscounts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT discount_id, percentage, start_date, end_date, description, credit_card_id, store_id, multiple, conditions, update_time, update_user, reference FROM discounts WHERE discount_id = :p0';
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
            /** @var ChildDiscounts $obj */
            $obj = new ChildDiscounts();
            $obj->hydrate($row);
            DiscountsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildDiscounts|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DiscountsTableMap::COL_DISCOUNT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DiscountsTableMap::COL_DISCOUNT_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByDiscountId($discountId = null, $comparison = null)
    {
        if (is_array($discountId)) {
            $useMinMax = false;
            if (isset($discountId['min'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_DISCOUNT_ID, $discountId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discountId['max'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_DISCOUNT_ID, $discountId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsTableMap::COL_DISCOUNT_ID, $discountId, $comparison);
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByPercentage($percentage = null, $comparison = null)
    {
        if (is_array($percentage)) {
            $useMinMax = false;
            if (isset($percentage['min'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_PERCENTAGE, $percentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percentage['max'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_PERCENTAGE, $percentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsTableMap::COL_PERCENTAGE, $percentage, $comparison);
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByStartDate($startDate = null, $comparison = null)
    {
        if (is_array($startDate)) {
            $useMinMax = false;
            if (isset($startDate['min'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_START_DATE, $startDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startDate['max'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_START_DATE, $startDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsTableMap::COL_START_DATE, $startDate, $comparison);
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByEndDate($endDate = null, $comparison = null)
    {
        if (is_array($endDate)) {
            $useMinMax = false;
            if (isset($endDate['min'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endDate['max'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsTableMap::COL_END_DATE, $endDate, $comparison);
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiscountsTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @see       filterByCreditCard()
     *
     * @param     mixed $creditCardId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @see       filterByStore()
     *
     * @param     mixed $storeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsTableMap::COL_STORE_ID, $storeId, $comparison);
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByMultiple($multiple = null, $comparison = null)
    {
        if (is_array($multiple)) {
            $useMinMax = false;
            if (isset($multiple['min'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_MULTIPLE, $multiple['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($multiple['max'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_MULTIPLE, $multiple['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsTableMap::COL_MULTIPLE, $multiple, $comparison);
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiscountsTableMap::COL_CONDITIONS, $conditions, $comparison);
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(DiscountsTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscountsTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiscountsTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query on the reference column
     *
     * Example usage:
     * <code>
     * $query->filterByReference('fooValue');   // WHERE reference = 'fooValue'
     * $query->filterByReference('%fooValue%'); // WHERE reference LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reference The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByReference($reference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reference)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reference)) {
                $reference = str_replace('*', '%', $reference);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiscountsTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(DiscountsTableMap::COL_CREDIT_CARD_ID, $creditCard->getCreditCardId(), $comparison);
        } elseif ($creditCard instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DiscountsTableMap::COL_CREDIT_CARD_ID, $creditCard->toKeyValue('PrimaryKey', 'CreditCardId'), $comparison);
        } else {
            throw new PropelException('filterByCreditCard() only accepts arguments of type \CreditCard or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CreditCard relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function joinCreditCard($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CreditCard');

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
            $this->addJoinObject($join, 'CreditCard');
        }

        return $this;
    }

    /**
     * Use the CreditCard relation CreditCard object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CreditCardQuery A secondary query class using the current class as primary query
     */
    public function useCreditCardQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCreditCard($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CreditCard', '\CreditCardQuery');
    }

    /**
     * Filter the query by a related \Store object
     *
     * @param \Store|ObjectCollection $store The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDiscountsQuery The current query, for fluid interface
     */
    public function filterByStore($store, $comparison = null)
    {
        if ($store instanceof \Store) {
            return $this
                ->addUsingAlias(DiscountsTableMap::COL_STORE_ID, $store->getStoreId(), $comparison);
        } elseif ($store instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DiscountsTableMap::COL_STORE_ID, $store->toKeyValue('PrimaryKey', 'StoreId'), $comparison);
        } else {
            throw new PropelException('filterByStore() only accepts arguments of type \Store or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Store relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function joinStore($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Store');

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
            $this->addJoinObject($join, 'Store');
        }

        return $this;
    }

    /**
     * Use the Store relation Store object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \StoreQuery A secondary query class using the current class as primary query
     */
    public function useStoreQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStore($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Store', '\StoreQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDiscounts $discounts Object to remove from the list of results
     *
     * @return $this|ChildDiscountsQuery The current query, for fluid interface
     */
    public function prune($discounts = null)
    {
        if ($discounts) {
            $this->addUsingAlias(DiscountsTableMap::COL_DISCOUNT_ID, $discounts->getDiscountId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the discounts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DiscountsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DiscountsTableMap::clearInstancePool();
            DiscountsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DiscountsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DiscountsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DiscountsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DiscountsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DiscountsQuery
