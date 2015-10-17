<?php

namespace Base;

use \InsuranceHistory as ChildInsuranceHistory;
use \InsuranceHistoryQuery as ChildInsuranceHistoryQuery;
use \Exception;
use \PDO;
use Map\InsuranceHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'insurance_history' table.
 *
 *
 *
 * @method     ChildInsuranceHistoryQuery orderByInsuranceId($order = Criteria::ASC) Order by the insurance_id column
 * @method     ChildInsuranceHistoryQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildInsuranceHistoryQuery orderByInsuranceTypeId($order = Criteria::ASC) Order by the insurance_type_id column
 * @method     ChildInsuranceHistoryQuery orderByMaxInsuredAmount($order = Criteria::ASC) Order by the max_insured_amount column
 * @method     ChildInsuranceHistoryQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildInsuranceHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildInsuranceHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildInsuranceHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildInsuranceHistoryQuery groupByInsuranceId() Group by the insurance_id column
 * @method     ChildInsuranceHistoryQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildInsuranceHistoryQuery groupByInsuranceTypeId() Group by the insurance_type_id column
 * @method     ChildInsuranceHistoryQuery groupByMaxInsuredAmount() Group by the max_insured_amount column
 * @method     ChildInsuranceHistoryQuery groupByValue() Group by the value column
 * @method     ChildInsuranceHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildInsuranceHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildInsuranceHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildInsuranceHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInsuranceHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInsuranceHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInsuranceHistory findOne(ConnectionInterface $con = null) Return the first ChildInsuranceHistory matching the query
 * @method     ChildInsuranceHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInsuranceHistory matching the query, or a new ChildInsuranceHistory object populated from the query conditions when no match is found
 *
 * @method     ChildInsuranceHistory findOneByInsuranceId(int $insurance_id) Return the first ChildInsuranceHistory filtered by the insurance_id column
 * @method     ChildInsuranceHistory findOneByCreditCardId(int $credit_card_id) Return the first ChildInsuranceHistory filtered by the credit_card_id column
 * @method     ChildInsuranceHistory findOneByInsuranceTypeId(int $insurance_type_id) Return the first ChildInsuranceHistory filtered by the insurance_type_id column
 * @method     ChildInsuranceHistory findOneByMaxInsuredAmount(int $max_insured_amount) Return the first ChildInsuranceHistory filtered by the max_insured_amount column
 * @method     ChildInsuranceHistory findOneByValue(int $value) Return the first ChildInsuranceHistory filtered by the value column
 * @method     ChildInsuranceHistory findOneByTimeBeg(string $time_beg) Return the first ChildInsuranceHistory filtered by the time_beg column
 * @method     ChildInsuranceHistory findOneByTimeEnd(string $time_end) Return the first ChildInsuranceHistory filtered by the time_end column
 * @method     ChildInsuranceHistory findOneByUpdateUser(string $update_user) Return the first ChildInsuranceHistory filtered by the update_user column
 *
 * @method     ChildInsuranceHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInsuranceHistory objects based on current ModelCriteria
 * @method     ChildInsuranceHistory[]|ObjectCollection findByInsuranceId(int $insurance_id) Return ChildInsuranceHistory objects filtered by the insurance_id column
 * @method     ChildInsuranceHistory[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildInsuranceHistory objects filtered by the credit_card_id column
 * @method     ChildInsuranceHistory[]|ObjectCollection findByInsuranceTypeId(int $insurance_type_id) Return ChildInsuranceHistory objects filtered by the insurance_type_id column
 * @method     ChildInsuranceHistory[]|ObjectCollection findByMaxInsuredAmount(int $max_insured_amount) Return ChildInsuranceHistory objects filtered by the max_insured_amount column
 * @method     ChildInsuranceHistory[]|ObjectCollection findByValue(int $value) Return ChildInsuranceHistory objects filtered by the value column
 * @method     ChildInsuranceHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildInsuranceHistory objects filtered by the time_beg column
 * @method     ChildInsuranceHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildInsuranceHistory objects filtered by the time_end column
 * @method     ChildInsuranceHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildInsuranceHistory objects filtered by the update_user column
 * @method     ChildInsuranceHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InsuranceHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\InsuranceHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\InsuranceHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInsuranceHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInsuranceHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInsuranceHistoryQuery) {
            return $criteria;
        }
        $query = new ChildInsuranceHistoryQuery();
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
     * @param array[$insurance_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInsuranceHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InsuranceHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InsuranceHistoryTableMap::DATABASE_NAME);
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
     * @return ChildInsuranceHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT insurance_id, credit_card_id, insurance_type_id, max_insured_amount, value, time_beg, time_end, update_user FROM insurance_history WHERE insurance_id = :p0 AND time_beg = :p1';
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
            /** @var ChildInsuranceHistory $obj */
            $obj = new ChildInsuranceHistory();
            $obj->hydrate($row);
            InsuranceHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildInsuranceHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InsuranceHistoryTableMap::COL_INSURANCE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InsuranceHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InsuranceHistoryTableMap::COL_INSURANCE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InsuranceHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the insurance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInsuranceId(1234); // WHERE insurance_id = 1234
     * $query->filterByInsuranceId(array(12, 34)); // WHERE insurance_id IN (12, 34)
     * $query->filterByInsuranceId(array('min' => 12)); // WHERE insurance_id > 12
     * </code>
     *
     * @param     mixed $insuranceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function filterByInsuranceId($insuranceId = null, $comparison = null)
    {
        if (is_array($insuranceId)) {
            $useMinMax = false;
            if (isset($insuranceId['min'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_INSURANCE_ID, $insuranceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insuranceId['max'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_INSURANCE_ID, $insuranceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceHistoryTableMap::COL_INSURANCE_ID, $insuranceId, $comparison);
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
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
    }

    /**
     * Filter the query on the insurance_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInsuranceTypeId(1234); // WHERE insurance_type_id = 1234
     * $query->filterByInsuranceTypeId(array(12, 34)); // WHERE insurance_type_id IN (12, 34)
     * $query->filterByInsuranceTypeId(array('min' => 12)); // WHERE insurance_type_id > 12
     * </code>
     *
     * @param     mixed $insuranceTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function filterByInsuranceTypeId($insuranceTypeId = null, $comparison = null)
    {
        if (is_array($insuranceTypeId)) {
            $useMinMax = false;
            if (isset($insuranceTypeId['min'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insuranceTypeId['max'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceHistoryTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId, $comparison);
    }

    /**
     * Filter the query on the max_insured_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxInsuredAmount(1234); // WHERE max_insured_amount = 1234
     * $query->filterByMaxInsuredAmount(array(12, 34)); // WHERE max_insured_amount IN (12, 34)
     * $query->filterByMaxInsuredAmount(array('min' => 12)); // WHERE max_insured_amount > 12
     * </code>
     *
     * @param     mixed $maxInsuredAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function filterByMaxInsuredAmount($maxInsuredAmount = null, $comparison = null)
    {
        if (is_array($maxInsuredAmount)) {
            $useMinMax = false;
            if (isset($maxInsuredAmount['min'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_MAX_INSURED_AMOUNT, $maxInsuredAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxInsuredAmount['max'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_MAX_INSURED_AMOUNT, $maxInsuredAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceHistoryTableMap::COL_MAX_INSURED_AMOUNT, $maxInsuredAmount, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value > 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceHistoryTableMap::COL_VALUE, $value, $comparison);
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
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(InsuranceHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInsuranceHistory $insuranceHistory Object to remove from the list of results
     *
     * @return $this|ChildInsuranceHistoryQuery The current query, for fluid interface
     */
    public function prune($insuranceHistory = null)
    {
        if ($insuranceHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InsuranceHistoryTableMap::COL_INSURANCE_ID), $insuranceHistory->getInsuranceId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InsuranceHistoryTableMap::COL_TIME_BEG), $insuranceHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the insurance_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InsuranceHistoryTableMap::clearInstancePool();
            InsuranceHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InsuranceHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InsuranceHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InsuranceHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InsuranceHistoryQuery
