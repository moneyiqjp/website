<?php

namespace Base;

use \InterestHistory as ChildInterestHistory;
use \InterestHistoryQuery as ChildInterestHistoryQuery;
use \Exception;
use \PDO;
use Map\InterestHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'interest_history' table.
 *
 *
 *
 * @method     ChildInterestHistoryQuery orderByInterestId($order = Criteria::ASC) Order by the interest_id column
 * @method     ChildInterestHistoryQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildInterestHistoryQuery orderByPaymentTypeId($order = Criteria::ASC) Order by the payment_type_id column
 * @method     ChildInterestHistoryQuery orderByMinInterest($order = Criteria::ASC) Order by the min_interest column
 * @method     ChildInterestHistoryQuery orderByMaxInterest($order = Criteria::ASC) Order by the max_interest column
 * @method     ChildInterestHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildInterestHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildInterestHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildInterestHistoryQuery groupByInterestId() Group by the interest_id column
 * @method     ChildInterestHistoryQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildInterestHistoryQuery groupByPaymentTypeId() Group by the payment_type_id column
 * @method     ChildInterestHistoryQuery groupByMinInterest() Group by the min_interest column
 * @method     ChildInterestHistoryQuery groupByMaxInterest() Group by the max_interest column
 * @method     ChildInterestHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildInterestHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildInterestHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildInterestHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInterestHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInterestHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInterestHistory findOne(ConnectionInterface $con = null) Return the first ChildInterestHistory matching the query
 * @method     ChildInterestHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInterestHistory matching the query, or a new ChildInterestHistory object populated from the query conditions when no match is found
 *
 * @method     ChildInterestHistory findOneByInterestId(int $interest_id) Return the first ChildInterestHistory filtered by the interest_id column
 * @method     ChildInterestHistory findOneByCreditCardId(int $credit_card_id) Return the first ChildInterestHistory filtered by the credit_card_id column
 * @method     ChildInterestHistory findOneByPaymentTypeId(int $payment_type_id) Return the first ChildInterestHistory filtered by the payment_type_id column
 * @method     ChildInterestHistory findOneByMinInterest(double $min_interest) Return the first ChildInterestHistory filtered by the min_interest column
 * @method     ChildInterestHistory findOneByMaxInterest(double $max_interest) Return the first ChildInterestHistory filtered by the max_interest column
 * @method     ChildInterestHistory findOneByTimeBeg(string $time_beg) Return the first ChildInterestHistory filtered by the time_beg column
 * @method     ChildInterestHistory findOneByTimeEnd(string $time_end) Return the first ChildInterestHistory filtered by the time_end column
 * @method     ChildInterestHistory findOneByUpdateUser(string $update_user) Return the first ChildInterestHistory filtered by the update_user column
 *
 * @method     ChildInterestHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInterestHistory objects based on current ModelCriteria
 * @method     ChildInterestHistory[]|ObjectCollection findByInterestId(int $interest_id) Return ChildInterestHistory objects filtered by the interest_id column
 * @method     ChildInterestHistory[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildInterestHistory objects filtered by the credit_card_id column
 * @method     ChildInterestHistory[]|ObjectCollection findByPaymentTypeId(int $payment_type_id) Return ChildInterestHistory objects filtered by the payment_type_id column
 * @method     ChildInterestHistory[]|ObjectCollection findByMinInterest(double $min_interest) Return ChildInterestHistory objects filtered by the min_interest column
 * @method     ChildInterestHistory[]|ObjectCollection findByMaxInterest(double $max_interest) Return ChildInterestHistory objects filtered by the max_interest column
 * @method     ChildInterestHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildInterestHistory objects filtered by the time_beg column
 * @method     ChildInterestHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildInterestHistory objects filtered by the time_end column
 * @method     ChildInterestHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildInterestHistory objects filtered by the update_user column
 * @method     ChildInterestHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InterestHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\InterestHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\InterestHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInterestHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInterestHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInterestHistoryQuery) {
            return $criteria;
        }
        $query = new ChildInterestHistoryQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$credit_card_id, $payment_type_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInterestHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InterestHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InterestHistoryTableMap::DATABASE_NAME);
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
     * @return ChildInterestHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT interest_id, credit_card_id, payment_type_id, min_interest, max_interest, time_beg, time_end, update_user FROM interest_history WHERE credit_card_id = :p0 AND payment_type_id = :p1 AND time_beg = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2] ? $key[2]->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildInterestHistory $obj */
            $obj = new ChildInterestHistory();
            $obj->hydrate($row);
            InterestHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return ChildInterestHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InterestHistoryTableMap::COL_CREDIT_CARD_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InterestHistoryTableMap::COL_PAYMENT_TYPE_ID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(InterestHistoryTableMap::COL_TIME_BEG, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InterestHistoryTableMap::COL_CREDIT_CARD_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InterestHistoryTableMap::COL_PAYMENT_TYPE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(InterestHistoryTableMap::COL_TIME_BEG, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the interest_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInterestId(1234); // WHERE interest_id = 1234
     * $query->filterByInterestId(array(12, 34)); // WHERE interest_id IN (12, 34)
     * $query->filterByInterestId(array('min' => 12)); // WHERE interest_id > 12
     * </code>
     *
     * @param     mixed $interestId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function filterByInterestId($interestId = null, $comparison = null)
    {
        if (is_array($interestId)) {
            $useMinMax = false;
            if (isset($interestId['min'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_INTEREST_ID, $interestId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interestId['max'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_INTEREST_ID, $interestId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestHistoryTableMap::COL_INTEREST_ID, $interestId, $comparison);
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
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
    }

    /**
     * Filter the query on the payment_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentTypeId(1234); // WHERE payment_type_id = 1234
     * $query->filterByPaymentTypeId(array(12, 34)); // WHERE payment_type_id IN (12, 34)
     * $query->filterByPaymentTypeId(array('min' => 12)); // WHERE payment_type_id > 12
     * </code>
     *
     * @param     mixed $paymentTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function filterByPaymentTypeId($paymentTypeId = null, $comparison = null)
    {
        if (is_array($paymentTypeId)) {
            $useMinMax = false;
            if (isset($paymentTypeId['min'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentTypeId['max'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestHistoryTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId, $comparison);
    }

    /**
     * Filter the query on the min_interest column
     *
     * Example usage:
     * <code>
     * $query->filterByMinInterest(1234); // WHERE min_interest = 1234
     * $query->filterByMinInterest(array(12, 34)); // WHERE min_interest IN (12, 34)
     * $query->filterByMinInterest(array('min' => 12)); // WHERE min_interest > 12
     * </code>
     *
     * @param     mixed $minInterest The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function filterByMinInterest($minInterest = null, $comparison = null)
    {
        if (is_array($minInterest)) {
            $useMinMax = false;
            if (isset($minInterest['min'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_MIN_INTEREST, $minInterest['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minInterest['max'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_MIN_INTEREST, $minInterest['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestHistoryTableMap::COL_MIN_INTEREST, $minInterest, $comparison);
    }

    /**
     * Filter the query on the max_interest column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxInterest(1234); // WHERE max_interest = 1234
     * $query->filterByMaxInterest(array(12, 34)); // WHERE max_interest IN (12, 34)
     * $query->filterByMaxInterest(array('min' => 12)); // WHERE max_interest > 12
     * </code>
     *
     * @param     mixed $maxInterest The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function filterByMaxInterest($maxInterest = null, $comparison = null)
    {
        if (is_array($maxInterest)) {
            $useMinMax = false;
            if (isset($maxInterest['min'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_MAX_INTEREST, $maxInterest['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxInterest['max'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_MAX_INTEREST, $maxInterest['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestHistoryTableMap::COL_MAX_INTEREST, $maxInterest, $comparison);
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
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(InterestHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InterestHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInterestHistory $interestHistory Object to remove from the list of results
     *
     * @return $this|ChildInterestHistoryQuery The current query, for fluid interface
     */
    public function prune($interestHistory = null)
    {
        if ($interestHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InterestHistoryTableMap::COL_CREDIT_CARD_ID), $interestHistory->getCreditCardId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InterestHistoryTableMap::COL_PAYMENT_TYPE_ID), $interestHistory->getPaymentTypeId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(InterestHistoryTableMap::COL_TIME_BEG), $interestHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the interest_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InterestHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InterestHistoryTableMap::clearInstancePool();
            InterestHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InterestHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InterestHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InterestHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InterestHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InterestHistoryQuery
