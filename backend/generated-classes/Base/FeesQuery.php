<?php

namespace Base;

use \Fees as ChildFees;
use \FeesQuery as ChildFeesQuery;
use \Exception;
use \PDO;
use Map\FeesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'fees' table.
 *
 * 
 *
 * @method     ChildFeesQuery orderByFeeId($order = Criteria::ASC) Order by the fee_id column
 * @method     ChildFeesQuery orderByFeeType($order = Criteria::ASC) Order by the fee_type column
 * @method     ChildFeesQuery orderByFeeAmount($order = Criteria::ASC) Order by the fee_amount column
 * @method     ChildFeesQuery orderByYearlyOccurrence($order = Criteria::ASC) Order by the yearly_occurrence column
 * @method     ChildFeesQuery orderByStartYear($order = Criteria::ASC) Order by the start_year column
 * @method     ChildFeesQuery orderByEndYear($order = Criteria::ASC) Order by the end_year column
 * @method     ChildFeesQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildFeesQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildFeesQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 * @method     ChildFeesQuery orderByReference($order = Criteria::ASC) Order by the reference column
 *
 * @method     ChildFeesQuery groupByFeeId() Group by the fee_id column
 * @method     ChildFeesQuery groupByFeeType() Group by the fee_type column
 * @method     ChildFeesQuery groupByFeeAmount() Group by the fee_amount column
 * @method     ChildFeesQuery groupByYearlyOccurrence() Group by the yearly_occurrence column
 * @method     ChildFeesQuery groupByStartYear() Group by the start_year column
 * @method     ChildFeesQuery groupByEndYear() Group by the end_year column
 * @method     ChildFeesQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildFeesQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildFeesQuery groupByUpdateUser() Group by the update_user column
 * @method     ChildFeesQuery groupByReference() Group by the reference column
 *
 * @method     ChildFeesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFeesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFeesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFeesQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildFeesQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildFeesQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     \CreditCardQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFees findOne(ConnectionInterface $con = null) Return the first ChildFees matching the query
 * @method     ChildFees findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFees matching the query, or a new ChildFees object populated from the query conditions when no match is found
 *
 * @method     ChildFees findOneByFeeId(int $fee_id) Return the first ChildFees filtered by the fee_id column
 * @method     ChildFees findOneByFeeType(int $fee_type) Return the first ChildFees filtered by the fee_type column
 * @method     ChildFees findOneByFeeAmount(int $fee_amount) Return the first ChildFees filtered by the fee_amount column
 * @method     ChildFees findOneByYearlyOccurrence(int $yearly_occurrence) Return the first ChildFees filtered by the yearly_occurrence column
 * @method     ChildFees findOneByStartYear(int $start_year) Return the first ChildFees filtered by the start_year column
 * @method     ChildFees findOneByEndYear(int $end_year) Return the first ChildFees filtered by the end_year column
 * @method     ChildFees findOneByCreditCardId(int $credit_card_id) Return the first ChildFees filtered by the credit_card_id column
 * @method     ChildFees findOneByUpdateTime(string $update_time) Return the first ChildFees filtered by the update_time column
 * @method     ChildFees findOneByUpdateUser(string $update_user) Return the first ChildFees filtered by the update_user column
 * @method     ChildFees findOneByReference(string $reference) Return the first ChildFees filtered by the reference column
 *
 * @method     ChildFees[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFees objects based on current ModelCriteria
 * @method     ChildFees[]|ObjectCollection findByFeeId(int $fee_id) Return ChildFees objects filtered by the fee_id column
 * @method     ChildFees[]|ObjectCollection findByFeeType(int $fee_type) Return ChildFees objects filtered by the fee_type column
 * @method     ChildFees[]|ObjectCollection findByFeeAmount(int $fee_amount) Return ChildFees objects filtered by the fee_amount column
 * @method     ChildFees[]|ObjectCollection findByYearlyOccurrence(int $yearly_occurrence) Return ChildFees objects filtered by the yearly_occurrence column
 * @method     ChildFees[]|ObjectCollection findByStartYear(int $start_year) Return ChildFees objects filtered by the start_year column
 * @method     ChildFees[]|ObjectCollection findByEndYear(int $end_year) Return ChildFees objects filtered by the end_year column
 * @method     ChildFees[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildFees objects filtered by the credit_card_id column
 * @method     ChildFees[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildFees objects filtered by the update_time column
 * @method     ChildFees[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildFees objects filtered by the update_user column
 * @method     ChildFees[]|ObjectCollection findByReference(string $reference) Return ChildFees objects filtered by the reference column
 * @method     ChildFees[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FeesQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\FeesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Fees', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFeesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFeesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFeesQuery) {
            return $criteria;
        }
        $query = new ChildFeesQuery();
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
     * @return ChildFees|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FeesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FeesTableMap::DATABASE_NAME);
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
     * @return ChildFees A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fee_id, fee_type, fee_amount, yearly_occurrence, start_year, end_year, credit_card_id, update_time, update_user, reference FROM fees WHERE fee_id = :p0';
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
            /** @var ChildFees $obj */
            $obj = new ChildFees();
            $obj->hydrate($row);
            FeesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildFees|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FeesTableMap::COL_FEE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FeesTableMap::COL_FEE_ID, $keys, Criteria::IN);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByFeeId($feeId = null, $comparison = null)
    {
        if (is_array($feeId)) {
            $useMinMax = false;
            if (isset($feeId['min'])) {
                $this->addUsingAlias(FeesTableMap::COL_FEE_ID, $feeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($feeId['max'])) {
                $this->addUsingAlias(FeesTableMap::COL_FEE_ID, $feeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesTableMap::COL_FEE_ID, $feeId, $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByFeeType($feeType = null, $comparison = null)
    {
        if (is_array($feeType)) {
            $useMinMax = false;
            if (isset($feeType['min'])) {
                $this->addUsingAlias(FeesTableMap::COL_FEE_TYPE, $feeType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($feeType['max'])) {
                $this->addUsingAlias(FeesTableMap::COL_FEE_TYPE, $feeType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesTableMap::COL_FEE_TYPE, $feeType, $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByFeeAmount($feeAmount = null, $comparison = null)
    {
        if (is_array($feeAmount)) {
            $useMinMax = false;
            if (isset($feeAmount['min'])) {
                $this->addUsingAlias(FeesTableMap::COL_FEE_AMOUNT, $feeAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($feeAmount['max'])) {
                $this->addUsingAlias(FeesTableMap::COL_FEE_AMOUNT, $feeAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesTableMap::COL_FEE_AMOUNT, $feeAmount, $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByYearlyOccurrence($yearlyOccurrence = null, $comparison = null)
    {
        if (is_array($yearlyOccurrence)) {
            $useMinMax = false;
            if (isset($yearlyOccurrence['min'])) {
                $this->addUsingAlias(FeesTableMap::COL_YEARLY_OCCURRENCE, $yearlyOccurrence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yearlyOccurrence['max'])) {
                $this->addUsingAlias(FeesTableMap::COL_YEARLY_OCCURRENCE, $yearlyOccurrence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesTableMap::COL_YEARLY_OCCURRENCE, $yearlyOccurrence, $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByStartYear($startYear = null, $comparison = null)
    {
        if (is_array($startYear)) {
            $useMinMax = false;
            if (isset($startYear['min'])) {
                $this->addUsingAlias(FeesTableMap::COL_START_YEAR, $startYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startYear['max'])) {
                $this->addUsingAlias(FeesTableMap::COL_START_YEAR, $startYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesTableMap::COL_START_YEAR, $startYear, $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByEndYear($endYear = null, $comparison = null)
    {
        if (is_array($endYear)) {
            $useMinMax = false;
            if (isset($endYear['min'])) {
                $this->addUsingAlias(FeesTableMap::COL_END_YEAR, $endYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endYear['max'])) {
                $this->addUsingAlias(FeesTableMap::COL_END_YEAR, $endYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesTableMap::COL_END_YEAR, $endYear, $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(FeesTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(FeesTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(FeesTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(FeesTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeesTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FeesTableMap::COL_UPDATE_USER, $updateUser, $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FeesTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFeesQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(FeesTableMap::COL_CREDIT_CARD_ID, $creditCard->getCreditCardId(), $comparison);
        } elseif ($creditCard instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FeesTableMap::COL_CREDIT_CARD_ID, $creditCard->toKeyValue('PrimaryKey', 'CreditCardId'), $comparison);
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
     * @return $this|ChildFeesQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildFees $fees Object to remove from the list of results
     *
     * @return $this|ChildFeesQuery The current query, for fluid interface
     */
    public function prune($fees = null)
    {
        if ($fees) {
            $this->addUsingAlias(FeesTableMap::COL_FEE_ID, $fees->getFeeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the fees table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FeesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FeesTableMap::clearInstancePool();
            FeesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FeesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FeesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            FeesTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            FeesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FeesQuery
