<?php

namespace Base;

use \Interest as ChildInterest;
use \InterestQuery as ChildInterestQuery;
use \Exception;
use \PDO;
use Map\InterestTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'interest' table.
 *
 * 
 *
 * @method     ChildInterestQuery orderByInterestId($order = Criteria::ASC) Order by the interest_id column
 * @method     ChildInterestQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildInterestQuery orderByPaymentTypeId($order = Criteria::ASC) Order by the payment_type_id column
 * @method     ChildInterestQuery orderByMinInterest($order = Criteria::ASC) Order by the min_interest column
 * @method     ChildInterestQuery orderByMaxInterest($order = Criteria::ASC) Order by the max_interest column
 * @method     ChildInterestQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildInterestQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 * @method     ChildInterestQuery orderByReference($order = Criteria::ASC) Order by the reference column
 *
 * @method     ChildInterestQuery groupByInterestId() Group by the interest_id column
 * @method     ChildInterestQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildInterestQuery groupByPaymentTypeId() Group by the payment_type_id column
 * @method     ChildInterestQuery groupByMinInterest() Group by the min_interest column
 * @method     ChildInterestQuery groupByMaxInterest() Group by the max_interest column
 * @method     ChildInterestQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildInterestQuery groupByUpdateUser() Group by the update_user column
 * @method     ChildInterestQuery groupByReference() Group by the reference column
 *
 * @method     ChildInterestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInterestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInterestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInterestQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildInterestQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildInterestQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     ChildInterestQuery leftJoinPaymentType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentType relation
 * @method     ChildInterestQuery rightJoinPaymentType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentType relation
 * @method     ChildInterestQuery innerJoinPaymentType($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentType relation
 *
 * @method     \CreditCardQuery|\PaymentTypeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInterest findOne(ConnectionInterface $con = null) Return the first ChildInterest matching the query
 * @method     ChildInterest findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInterest matching the query, or a new ChildInterest object populated from the query conditions when no match is found
 *
 * @method     ChildInterest findOneByInterestId(int $interest_id) Return the first ChildInterest filtered by the interest_id column
 * @method     ChildInterest findOneByCreditCardId(int $credit_card_id) Return the first ChildInterest filtered by the credit_card_id column
 * @method     ChildInterest findOneByPaymentTypeId(int $payment_type_id) Return the first ChildInterest filtered by the payment_type_id column
 * @method     ChildInterest findOneByMinInterest(double $min_interest) Return the first ChildInterest filtered by the min_interest column
 * @method     ChildInterest findOneByMaxInterest(double $max_interest) Return the first ChildInterest filtered by the max_interest column
 * @method     ChildInterest findOneByUpdateTime(string $update_time) Return the first ChildInterest filtered by the update_time column
 * @method     ChildInterest findOneByUpdateUser(string $update_user) Return the first ChildInterest filtered by the update_user column
 * @method     ChildInterest findOneByReference(string $reference) Return the first ChildInterest filtered by the reference column
 *
 * @method     ChildInterest[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInterest objects based on current ModelCriteria
 * @method     ChildInterest[]|ObjectCollection findByInterestId(int $interest_id) Return ChildInterest objects filtered by the interest_id column
 * @method     ChildInterest[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildInterest objects filtered by the credit_card_id column
 * @method     ChildInterest[]|ObjectCollection findByPaymentTypeId(int $payment_type_id) Return ChildInterest objects filtered by the payment_type_id column
 * @method     ChildInterest[]|ObjectCollection findByMinInterest(double $min_interest) Return ChildInterest objects filtered by the min_interest column
 * @method     ChildInterest[]|ObjectCollection findByMaxInterest(double $max_interest) Return ChildInterest objects filtered by the max_interest column
 * @method     ChildInterest[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildInterest objects filtered by the update_time column
 * @method     ChildInterest[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildInterest objects filtered by the update_user column
 * @method     ChildInterest[]|ObjectCollection findByReference(string $reference) Return ChildInterest objects filtered by the reference column
 * @method     ChildInterest[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InterestQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\InterestQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Interest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInterestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInterestQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInterestQuery) {
            return $criteria;
        }
        $query = new ChildInterestQuery();
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
     * @return ChildInterest|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InterestTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InterestTableMap::DATABASE_NAME);
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
     * @return ChildInterest A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT interest_id, credit_card_id, payment_type_id, min_interest, max_interest, update_time, update_user, reference FROM interest WHERE interest_id = :p0';
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
            /** @var ChildInterest $obj */
            $obj = new ChildInterest();
            $obj->hydrate($row);
            InterestTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildInterest|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InterestTableMap::COL_INTEREST_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InterestTableMap::COL_INTEREST_ID, $keys, Criteria::IN);
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
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function filterByInterestId($interestId = null, $comparison = null)
    {
        if (is_array($interestId)) {
            $useMinMax = false;
            if (isset($interestId['min'])) {
                $this->addUsingAlias(InterestTableMap::COL_INTEREST_ID, $interestId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interestId['max'])) {
                $this->addUsingAlias(InterestTableMap::COL_INTEREST_ID, $interestId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestTableMap::COL_INTEREST_ID, $interestId, $comparison);
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
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(InterestTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(InterestTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @see       filterByPaymentType()
     *
     * @param     mixed $paymentTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function filterByPaymentTypeId($paymentTypeId = null, $comparison = null)
    {
        if (is_array($paymentTypeId)) {
            $useMinMax = false;
            if (isset($paymentTypeId['min'])) {
                $this->addUsingAlias(InterestTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentTypeId['max'])) {
                $this->addUsingAlias(InterestTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId, $comparison);
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
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function filterByMinInterest($minInterest = null, $comparison = null)
    {
        if (is_array($minInterest)) {
            $useMinMax = false;
            if (isset($minInterest['min'])) {
                $this->addUsingAlias(InterestTableMap::COL_MIN_INTEREST, $minInterest['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minInterest['max'])) {
                $this->addUsingAlias(InterestTableMap::COL_MIN_INTEREST, $minInterest['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestTableMap::COL_MIN_INTEREST, $minInterest, $comparison);
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
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function filterByMaxInterest($maxInterest = null, $comparison = null)
    {
        if (is_array($maxInterest)) {
            $useMinMax = false;
            if (isset($maxInterest['min'])) {
                $this->addUsingAlias(InterestTableMap::COL_MAX_INTEREST, $maxInterest['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxInterest['max'])) {
                $this->addUsingAlias(InterestTableMap::COL_MAX_INTEREST, $maxInterest['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestTableMap::COL_MAX_INTEREST, $maxInterest, $comparison);
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
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(InterestTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(InterestTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterestTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildInterestQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InterestTableMap::COL_UPDATE_USER, $updateUser, $comparison);
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
     * @return $this|ChildInterestQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InterestTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInterestQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(InterestTableMap::COL_CREDIT_CARD_ID, $creditCard->getCreditCardId(), $comparison);
        } elseif ($creditCard instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InterestTableMap::COL_CREDIT_CARD_ID, $creditCard->toKeyValue('PrimaryKey', 'CreditCardId'), $comparison);
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
     * @return $this|ChildInterestQuery The current query, for fluid interface
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
     * Filter the query by a related \PaymentType object
     *
     * @param \PaymentType|ObjectCollection $paymentType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInterestQuery The current query, for fluid interface
     */
    public function filterByPaymentType($paymentType, $comparison = null)
    {
        if ($paymentType instanceof \PaymentType) {
            return $this
                ->addUsingAlias(InterestTableMap::COL_PAYMENT_TYPE_ID, $paymentType->getPaymentTypeId(), $comparison);
        } elseif ($paymentType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InterestTableMap::COL_PAYMENT_TYPE_ID, $paymentType->toKeyValue('PrimaryKey', 'PaymentTypeId'), $comparison);
        } else {
            throw new PropelException('filterByPaymentType() only accepts arguments of type \PaymentType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function joinPaymentType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentType');

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
            $this->addJoinObject($join, 'PaymentType');
        }

        return $this;
    }

    /**
     * Use the PaymentType relation PaymentType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PaymentTypeQuery A secondary query class using the current class as primary query
     */
    public function usePaymentTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPaymentType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentType', '\PaymentTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInterest $interest Object to remove from the list of results
     *
     * @return $this|ChildInterestQuery The current query, for fluid interface
     */
    public function prune($interest = null)
    {
        if ($interest) {
            $this->addUsingAlias(InterestTableMap::COL_INTEREST_ID, $interest->getInterestId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the interest table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InterestTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InterestTableMap::clearInstancePool();
            InterestTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InterestTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InterestTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            InterestTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            InterestTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InterestQuery
