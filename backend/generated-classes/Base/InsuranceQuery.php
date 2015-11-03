<?php

namespace Base;

use \Insurance as ChildInsurance;
use \InsuranceQuery as ChildInsuranceQuery;
use \Exception;
use \PDO;
use Map\InsuranceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'insurance' table.
 *
 *
 *
 * @method     ChildInsuranceQuery orderByInsuranceId($order = Criteria::ASC) Order by the insurance_id column
 * @method     ChildInsuranceQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildInsuranceQuery orderByInsuranceTypeId($order = Criteria::ASC) Order by the insurance_type_id column
 * @method     ChildInsuranceQuery orderByGuaranteedPeriod($order = Criteria::ASC) Order by the guaranteed_period column
 * @method     ChildInsuranceQuery orderByMaxInsuredAmount($order = Criteria::ASC) Order by the max_insured_amount column
 * @method     ChildInsuranceQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildInsuranceQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildInsuranceQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 * @method     ChildInsuranceQuery orderByReference($order = Criteria::ASC) Order by the reference column
 *
 * @method     ChildInsuranceQuery groupByInsuranceId() Group by the insurance_id column
 * @method     ChildInsuranceQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildInsuranceQuery groupByInsuranceTypeId() Group by the insurance_type_id column
 * @method     ChildInsuranceQuery groupByGuaranteedPeriod() Group by the guaranteed_period column
 * @method     ChildInsuranceQuery groupByMaxInsuredAmount() Group by the max_insured_amount column
 * @method     ChildInsuranceQuery groupByValue() Group by the value column
 * @method     ChildInsuranceQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildInsuranceQuery groupByUpdateUser() Group by the update_user column
 * @method     ChildInsuranceQuery groupByReference() Group by the reference column
 *
 * @method     ChildInsuranceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInsuranceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInsuranceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInsuranceQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildInsuranceQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildInsuranceQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     ChildInsuranceQuery leftJoinInsuranceType($relationAlias = null) Adds a LEFT JOIN clause to the query using the InsuranceType relation
 * @method     ChildInsuranceQuery rightJoinInsuranceType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InsuranceType relation
 * @method     ChildInsuranceQuery innerJoinInsuranceType($relationAlias = null) Adds a INNER JOIN clause to the query using the InsuranceType relation
 *
 * @method     \CreditCardQuery|\InsuranceTypeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInsurance findOne(ConnectionInterface $con = null) Return the first ChildInsurance matching the query
 * @method     ChildInsurance findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInsurance matching the query, or a new ChildInsurance object populated from the query conditions when no match is found
 *
 * @method     ChildInsurance findOneByInsuranceId(int $insurance_id) Return the first ChildInsurance filtered by the insurance_id column
 * @method     ChildInsurance findOneByCreditCardId(int $credit_card_id) Return the first ChildInsurance filtered by the credit_card_id column
 * @method     ChildInsurance findOneByInsuranceTypeId(int $insurance_type_id) Return the first ChildInsurance filtered by the insurance_type_id column
 * @method     ChildInsurance findOneByGuaranteedPeriod(int $guaranteed_period) Return the first ChildInsurance filtered by the guaranteed_period column
 * @method     ChildInsurance findOneByMaxInsuredAmount(int $max_insured_amount) Return the first ChildInsurance filtered by the max_insured_amount column
 * @method     ChildInsurance findOneByValue(int $value) Return the first ChildInsurance filtered by the value column
 * @method     ChildInsurance findOneByUpdateTime(string $update_time) Return the first ChildInsurance filtered by the update_time column
 * @method     ChildInsurance findOneByUpdateUser(string $update_user) Return the first ChildInsurance filtered by the update_user column
 * @method     ChildInsurance findOneByReference(string $reference) Return the first ChildInsurance filtered by the reference column
 *
 * @method     ChildInsurance[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInsurance objects based on current ModelCriteria
 * @method     ChildInsurance[]|ObjectCollection findByInsuranceId(int $insurance_id) Return ChildInsurance objects filtered by the insurance_id column
 * @method     ChildInsurance[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildInsurance objects filtered by the credit_card_id column
 * @method     ChildInsurance[]|ObjectCollection findByInsuranceTypeId(int $insurance_type_id) Return ChildInsurance objects filtered by the insurance_type_id column
 * @method     ChildInsurance[]|ObjectCollection findByGuaranteedPeriod(int $guaranteed_period) Return ChildInsurance objects filtered by the guaranteed_period column
 * @method     ChildInsurance[]|ObjectCollection findByMaxInsuredAmount(int $max_insured_amount) Return ChildInsurance objects filtered by the max_insured_amount column
 * @method     ChildInsurance[]|ObjectCollection findByValue(int $value) Return ChildInsurance objects filtered by the value column
 * @method     ChildInsurance[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildInsurance objects filtered by the update_time column
 * @method     ChildInsurance[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildInsurance objects filtered by the update_user column
 * @method     ChildInsurance[]|ObjectCollection findByReference(string $reference) Return ChildInsurance objects filtered by the reference column
 * @method     ChildInsurance[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InsuranceQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\InsuranceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Insurance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInsuranceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInsuranceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInsuranceQuery) {
            return $criteria;
        }
        $query = new ChildInsuranceQuery();
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
     * @return ChildInsurance|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InsuranceTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InsuranceTableMap::DATABASE_NAME);
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
     * @return ChildInsurance A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT insurance_id, credit_card_id, insurance_type_id, guaranteed_period, max_insured_amount, value, update_time, update_user, reference FROM insurance WHERE insurance_id = :p0';
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
            /** @var ChildInsurance $obj */
            $obj = new ChildInsurance();
            $obj->hydrate($row);
            InsuranceTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildInsurance|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InsuranceTableMap::COL_INSURANCE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InsuranceTableMap::COL_INSURANCE_ID, $keys, Criteria::IN);
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
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByInsuranceId($insuranceId = null, $comparison = null)
    {
        if (is_array($insuranceId)) {
            $useMinMax = false;
            if (isset($insuranceId['min'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_INSURANCE_ID, $insuranceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insuranceId['max'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_INSURANCE_ID, $insuranceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTableMap::COL_INSURANCE_ID, $insuranceId, $comparison);
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
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @see       filterByInsuranceType()
     *
     * @param     mixed $insuranceTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByInsuranceTypeId($insuranceTypeId = null, $comparison = null)
    {
        if (is_array($insuranceTypeId)) {
            $useMinMax = false;
            if (isset($insuranceTypeId['min'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insuranceTypeId['max'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId, $comparison);
    }

    /**
     * Filter the query on the guaranteed_period column
     *
     * Example usage:
     * <code>
     * $query->filterByGuaranteedPeriod(1234); // WHERE guaranteed_period = 1234
     * $query->filterByGuaranteedPeriod(array(12, 34)); // WHERE guaranteed_period IN (12, 34)
     * $query->filterByGuaranteedPeriod(array('min' => 12)); // WHERE guaranteed_period > 12
     * </code>
     *
     * @param     mixed $guaranteedPeriod The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByGuaranteedPeriod($guaranteedPeriod = null, $comparison = null)
    {
        if (is_array($guaranteedPeriod)) {
            $useMinMax = false;
            if (isset($guaranteedPeriod['min'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_GUARANTEED_PERIOD, $guaranteedPeriod['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($guaranteedPeriod['max'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_GUARANTEED_PERIOD, $guaranteedPeriod['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTableMap::COL_GUARANTEED_PERIOD, $guaranteedPeriod, $comparison);
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
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByMaxInsuredAmount($maxInsuredAmount = null, $comparison = null)
    {
        if (is_array($maxInsuredAmount)) {
            $useMinMax = false;
            if (isset($maxInsuredAmount['min'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_MAX_INSURED_AMOUNT, $maxInsuredAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxInsuredAmount['max'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_MAX_INSURED_AMOUNT, $maxInsuredAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTableMap::COL_MAX_INSURED_AMOUNT, $maxInsuredAmount, $comparison);
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
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTableMap::COL_VALUE, $value, $comparison);
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
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(InsuranceTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceTableMap::COL_UPDATE_USER, $updateUser, $comparison);
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
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(InsuranceTableMap::COL_CREDIT_CARD_ID, $creditCard->getCreditCardId(), $comparison);
        } elseif ($creditCard instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InsuranceTableMap::COL_CREDIT_CARD_ID, $creditCard->toKeyValue('PrimaryKey', 'CreditCardId'), $comparison);
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
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
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
     * Filter the query by a related \InsuranceType object
     *
     * @param \InsuranceType|ObjectCollection $insuranceType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInsuranceQuery The current query, for fluid interface
     */
    public function filterByInsuranceType($insuranceType, $comparison = null)
    {
        if ($insuranceType instanceof \InsuranceType) {
            return $this
                ->addUsingAlias(InsuranceTableMap::COL_INSURANCE_TYPE_ID, $insuranceType->getInsuranceTypeId(), $comparison);
        } elseif ($insuranceType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InsuranceTableMap::COL_INSURANCE_TYPE_ID, $insuranceType->toKeyValue('PrimaryKey', 'InsuranceTypeId'), $comparison);
        } else {
            throw new PropelException('filterByInsuranceType() only accepts arguments of type \InsuranceType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InsuranceType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function joinInsuranceType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InsuranceType');

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
            $this->addJoinObject($join, 'InsuranceType');
        }

        return $this;
    }

    /**
     * Use the InsuranceType relation InsuranceType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InsuranceTypeQuery A secondary query class using the current class as primary query
     */
    public function useInsuranceTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInsuranceType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InsuranceType', '\InsuranceTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInsurance $insurance Object to remove from the list of results
     *
     * @return $this|ChildInsuranceQuery The current query, for fluid interface
     */
    public function prune($insurance = null)
    {
        if ($insurance) {
            $this->addUsingAlias(InsuranceTableMap::COL_INSURANCE_ID, $insurance->getInsuranceId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the insurance table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InsuranceTableMap::clearInstancePool();
            InsuranceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InsuranceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InsuranceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InsuranceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InsuranceQuery
