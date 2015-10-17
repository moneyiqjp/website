<?php

namespace Base;

use \FeesHistory as ChildFeesHistory;
use \FeesHistoryQuery as ChildFeesHistoryQuery;
use \Exception;
use \PDO;
use Map\FeesHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'fees_history' table.
 *
 *
 *
 * @method     ChildFeesHistoryQuery orderByFeeId($order = Criteria::ASC) Order by the fee_id column
 * @method     ChildFeesHistoryQuery orderByFeeType($order = Criteria::ASC) Order by the fee_type column
 * @method     ChildFeesHistoryQuery orderByFeeAmount($order = Criteria::ASC) Order by the fee_amount column
 * @method     ChildFeesHistoryQuery orderByYearlyOccurrence($order = Criteria::ASC) Order by the yearly_occurrence column
 * @method     ChildFeesHistoryQuery orderByStartYear($order = Criteria::ASC) Order by the start_year column
 * @method     ChildFeesHistoryQuery orderByEndYear($order = Criteria::ASC) Order by the end_year column
 * @method     ChildFeesHistoryQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildFeesHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildFeesHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildFeesHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildFeesHistoryQuery groupByFeeId() Group by the fee_id column
 * @method     ChildFeesHistoryQuery groupByFeeType() Group by the fee_type column
 * @method     ChildFeesHistoryQuery groupByFeeAmount() Group by the fee_amount column
 * @method     ChildFeesHistoryQuery groupByYearlyOccurrence() Group by the yearly_occurrence column
 * @method     ChildFeesHistoryQuery groupByStartYear() Group by the start_year column
 * @method     ChildFeesHistoryQuery groupByEndYear() Group by the end_year column
 * @method     ChildFeesHistoryQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildFeesHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildFeesHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildFeesHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildFeesHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFeesHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFeesHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFeesHistory findOne(ConnectionInterface $con = null) Return the first ChildFeesHistory matching the query
 * @method     ChildFeesHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFeesHistory matching the query, or a new ChildFeesHistory object populated from the query conditions when no match is found
 *
 * @method     ChildFeesHistory findOneByFeeId(int $fee_id) Return the first ChildFeesHistory filtered by the fee_id column
 * @method     ChildFeesHistory findOneByFeeType(int $fee_type) Return the first ChildFeesHistory filtered by the fee_type column
 * @method     ChildFeesHistory findOneByFeeAmount(int $fee_amount) Return the first ChildFeesHistory filtered by the fee_amount column
 * @method     ChildFeesHistory findOneByYearlyOccurrence(int $yearly_occurrence) Return the first ChildFeesHistory filtered by the yearly_occurrence column
 * @method     ChildFeesHistory findOneByStartYear(int $start_year) Return the first ChildFeesHistory filtered by the start_year column
 * @method     ChildFeesHistory findOneByEndYear(int $end_year) Return the first ChildFeesHistory filtered by the end_year column
 * @method     ChildFeesHistory findOneByCreditCardId(int $credit_card_id) Return the first ChildFeesHistory filtered by the credit_card_id column
 * @method     ChildFeesHistory findOneByTimeBeg(string $time_beg) Return the first ChildFeesHistory filtered by the time_beg column
 * @method     ChildFeesHistory findOneByTimeEnd(string $time_end) Return the first ChildFeesHistory filtered by the time_end column
 * @method     ChildFeesHistory findOneByUpdateUser(string $update_user) Return the first ChildFeesHistory filtered by the update_user column
 *
 * @method     ChildFeesHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFeesHistory objects based on current ModelCriteria
 * @method     ChildFeesHistory[]|ObjectCollection findByFeeId(int $fee_id) Return ChildFeesHistory objects filtered by the fee_id column
 * @method     ChildFeesHistory[]|ObjectCollection findByFeeType(int $fee_type) Return ChildFeesHistory objects filtered by the fee_type column
 * @method     ChildFeesHistory[]|ObjectCollection findByFeeAmount(int $fee_amount) Return ChildFeesHistory objects filtered by the fee_amount column
 * @method     ChildFeesHistory[]|ObjectCollection findByYearlyOccurrence(int $yearly_occurrence) Return ChildFeesHistory objects filtered by the yearly_occurrence column
 * @method     ChildFeesHistory[]|ObjectCollection findByStartYear(int $start_year) Return ChildFeesHistory objects filtered by the start_year column
 * @method     ChildFeesHistory[]|ObjectCollection findByEndYear(int $end_year) Return ChildFeesHistory objects filtered by the end_year column
 * @method     ChildFeesHistory[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildFeesHistory objects filtered by the credit_card_id column
 * @method     ChildFeesHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildFeesHistory objects filtered by the time_beg column
 * @method     ChildFeesHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildFeesHistory objects filtered by the time_end column
 * @method     ChildFeesHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildFeesHistory objects filtered by the update_user column
 * @method     ChildFeesHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FeesHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\FeesHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\FeesHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFeesHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFeesHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFeesHistoryQuery) {
            return $criteria;
        }
        $query = new ChildFeesHistoryQuery();
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
     * @param array[$fee_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildFeesHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FeesHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FeesHistoryTableMap::DATABASE_NAME);
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
     * @return ChildFeesHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fee_id, fee_type, fee_amount, yearly_occurrence, start_year, end_year, credit_card_id, time_beg, time_end, update_user FROM fees_history WHERE fee_id = :p0 AND time_beg = :p1';
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
            /** @var ChildFeesHistory $obj */
            $obj = new ChildFeesHistory();
            $obj->hydrate($row);
            FeesHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildFeesHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(FeesHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(FeesHistoryTableMap::COL_FEE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(FeesHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the fee_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFeeId(1234); // WHERE fee_id = 1234
     * $query->filterByFeeId(array(12, 34)); // WHERE fee_id IN (12, 34)
     * $query->filterByFeeId(array('min' => 12)); // WHERE fee_id > 12
     * </code>
     *
     * @param     mixed $feeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByFeeId($feeId = null, $comparison = null)
    {
        if (is_array($feeId)) {
            $useMinMax = false;
            if (isset($feeId['min'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_ID, $feeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($feeId['max'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_ID, $feeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_ID, $feeId, $comparison);
    }

    /**
     * Filter the query on the fee_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFeeType(1234); // WHERE fee_type = 1234
     * $query->filterByFeeType(array(12, 34)); // WHERE fee_type IN (12, 34)
     * $query->filterByFeeType(array('min' => 12)); // WHERE fee_type > 12
     * </code>
     *
     * @param     mixed $feeType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByFeeType($feeType = null, $comparison = null)
    {
        if (is_array($feeType)) {
            $useMinMax = false;
            if (isset($feeType['min'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_TYPE, $feeType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($feeType['max'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_TYPE, $feeType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_TYPE, $feeType, $comparison);
    }

    /**
     * Filter the query on the fee_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByFeeAmount(1234); // WHERE fee_amount = 1234
     * $query->filterByFeeAmount(array(12, 34)); // WHERE fee_amount IN (12, 34)
     * $query->filterByFeeAmount(array('min' => 12)); // WHERE fee_amount > 12
     * </code>
     *
     * @param     mixed $feeAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByFeeAmount($feeAmount = null, $comparison = null)
    {
        if (is_array($feeAmount)) {
            $useMinMax = false;
            if (isset($feeAmount['min'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_AMOUNT, $feeAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($feeAmount['max'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_AMOUNT, $feeAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesHistoryTableMap::COL_FEE_AMOUNT, $feeAmount, $comparison);
    }

    /**
     * Filter the query on the yearly_occurrence column
     *
     * Example usage:
     * <code>
     * $query->filterByYearlyOccurrence(1234); // WHERE yearly_occurrence = 1234
     * $query->filterByYearlyOccurrence(array(12, 34)); // WHERE yearly_occurrence IN (12, 34)
     * $query->filterByYearlyOccurrence(array('min' => 12)); // WHERE yearly_occurrence > 12
     * </code>
     *
     * @param     mixed $yearlyOccurrence The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByYearlyOccurrence($yearlyOccurrence = null, $comparison = null)
    {
        if (is_array($yearlyOccurrence)) {
            $useMinMax = false;
            if (isset($yearlyOccurrence['min'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_YEARLY_OCCURRENCE, $yearlyOccurrence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yearlyOccurrence['max'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_YEARLY_OCCURRENCE, $yearlyOccurrence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesHistoryTableMap::COL_YEARLY_OCCURRENCE, $yearlyOccurrence, $comparison);
    }

    /**
     * Filter the query on the start_year column
     *
     * Example usage:
     * <code>
     * $query->filterByStartYear(1234); // WHERE start_year = 1234
     * $query->filterByStartYear(array(12, 34)); // WHERE start_year IN (12, 34)
     * $query->filterByStartYear(array('min' => 12)); // WHERE start_year > 12
     * </code>
     *
     * @param     mixed $startYear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByStartYear($startYear = null, $comparison = null)
    {
        if (is_array($startYear)) {
            $useMinMax = false;
            if (isset($startYear['min'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_START_YEAR, $startYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startYear['max'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_START_YEAR, $startYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesHistoryTableMap::COL_START_YEAR, $startYear, $comparison);
    }

    /**
     * Filter the query on the end_year column
     *
     * Example usage:
     * <code>
     * $query->filterByEndYear(1234); // WHERE end_year = 1234
     * $query->filterByEndYear(array(12, 34)); // WHERE end_year IN (12, 34)
     * $query->filterByEndYear(array('min' => 12)); // WHERE end_year > 12
     * </code>
     *
     * @param     mixed $endYear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByEndYear($endYear = null, $comparison = null)
    {
        if (is_array($endYear)) {
            $useMinMax = false;
            if (isset($endYear['min'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_END_YEAR, $endYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endYear['max'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_END_YEAR, $endYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesHistoryTableMap::COL_END_YEAR, $endYear, $comparison);
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
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(FeesHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FeesHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFeesHistory $feesHistory Object to remove from the list of results
     *
     * @return $this|ChildFeesHistoryQuery The current query, for fluid interface
     */
    public function prune($feesHistory = null)
    {
        if ($feesHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(FeesHistoryTableMap::COL_FEE_ID), $feesHistory->getFeeId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(FeesHistoryTableMap::COL_TIME_BEG), $feesHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the fees_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FeesHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FeesHistoryTableMap::clearInstancePool();
            FeesHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FeesHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FeesHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FeesHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FeesHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FeesHistoryQuery
