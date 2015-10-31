<?php

namespace Base;

use \CardRestriction as ChildCardRestriction;
use \CardRestrictionQuery as ChildCardRestrictionQuery;
use \Exception;
use \PDO;
use Map\CardRestrictionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'card_restriction' table.
 *
 *
 *
 * @method     ChildCardRestrictionQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildCardRestrictionQuery orderByRestrictionTypeId($order = Criteria::ASC) Order by the restriction_type_id column
 * @method     ChildCardRestrictionQuery orderByComparator($order = Criteria::ASC) Order by the Comparator column
 * @method     ChildCardRestrictionQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildCardRestrictionQuery orderByPriorityId($order = Criteria::ASC) Order by the priority_id column
 * @method     ChildCardRestrictionQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildCardRestrictionQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildCardRestrictionQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildCardRestrictionQuery groupByRestrictionTypeId() Group by the restriction_type_id column
 * @method     ChildCardRestrictionQuery groupByComparator() Group by the Comparator column
 * @method     ChildCardRestrictionQuery groupByValue() Group by the value column
 * @method     ChildCardRestrictionQuery groupByPriorityId() Group by the priority_id column
 * @method     ChildCardRestrictionQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildCardRestrictionQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildCardRestrictionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCardRestrictionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCardRestrictionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCardRestrictionQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildCardRestrictionQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildCardRestrictionQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     ChildCardRestrictionQuery leftJoinRestrictionType($relationAlias = null) Adds a LEFT JOIN clause to the query using the RestrictionType relation
 * @method     ChildCardRestrictionQuery rightJoinRestrictionType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RestrictionType relation
 * @method     ChildCardRestrictionQuery innerJoinRestrictionType($relationAlias = null) Adds a INNER JOIN clause to the query using the RestrictionType relation
 *
 * @method     \CreditCardQuery|\RestrictionTypeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCardRestriction findOne(ConnectionInterface $con = null) Return the first ChildCardRestriction matching the query
 * @method     ChildCardRestriction findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCardRestriction matching the query, or a new ChildCardRestriction object populated from the query conditions when no match is found
 *
 * @method     ChildCardRestriction findOneByCreditCardId(int $credit_card_id) Return the first ChildCardRestriction filtered by the credit_card_id column
 * @method     ChildCardRestriction findOneByRestrictionTypeId(int $restriction_type_id) Return the first ChildCardRestriction filtered by the restriction_type_id column
 * @method     ChildCardRestriction findOneByComparator(string $Comparator) Return the first ChildCardRestriction filtered by the Comparator column
 * @method     ChildCardRestriction findOneByValue(string $value) Return the first ChildCardRestriction filtered by the value column
 * @method     ChildCardRestriction findOneByPriorityId(int $priority_id) Return the first ChildCardRestriction filtered by the priority_id column
 * @method     ChildCardRestriction findOneByUpdateTime(string $update_time) Return the first ChildCardRestriction filtered by the update_time column
 * @method     ChildCardRestriction findOneByUpdateUser(string $update_user) Return the first ChildCardRestriction filtered by the update_user column
 *
 * @method     ChildCardRestriction[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCardRestriction objects based on current ModelCriteria
 * @method     ChildCardRestriction[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildCardRestriction objects filtered by the credit_card_id column
 * @method     ChildCardRestriction[]|ObjectCollection findByRestrictionTypeId(int $restriction_type_id) Return ChildCardRestriction objects filtered by the restriction_type_id column
 * @method     ChildCardRestriction[]|ObjectCollection findByComparator(string $Comparator) Return ChildCardRestriction objects filtered by the Comparator column
 * @method     ChildCardRestriction[]|ObjectCollection findByValue(string $value) Return ChildCardRestriction objects filtered by the value column
 * @method     ChildCardRestriction[]|ObjectCollection findByPriorityId(int $priority_id) Return ChildCardRestriction objects filtered by the priority_id column
 * @method     ChildCardRestriction[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildCardRestriction objects filtered by the update_time column
 * @method     ChildCardRestriction[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildCardRestriction objects filtered by the update_user column
 * @method     ChildCardRestriction[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CardRestrictionQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\CardRestrictionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CardRestriction', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCardRestrictionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCardRestrictionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCardRestrictionQuery) {
            return $criteria;
        }
        $query = new ChildCardRestrictionQuery();
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
     * @param array[$credit_card_id, $restriction_type_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCardRestriction|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CardRestrictionTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CardRestrictionTableMap::DATABASE_NAME);
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
     * @return ChildCardRestriction A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT credit_card_id, restriction_type_id, Comparator, value, priority_id, update_time, update_user FROM card_restriction WHERE credit_card_id = :p0 AND restriction_type_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCardRestriction $obj */
            $obj = new ChildCardRestriction();
            $obj->hydrate($row);
            CardRestrictionTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildCardRestriction|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CardRestrictionTableMap::COL_CREDIT_CARD_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CardRestrictionTableMap::COL_RESTRICTION_TYPE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CardRestrictionTableMap::COL_CREDIT_CARD_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CardRestrictionTableMap::COL_RESTRICTION_TYPE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(CardRestrictionTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(CardRestrictionTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardRestrictionTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
    }

    /**
     * Filter the query on the restriction_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRestrictionTypeId(1234); // WHERE restriction_type_id = 1234
     * $query->filterByRestrictionTypeId(array(12, 34)); // WHERE restriction_type_id IN (12, 34)
     * $query->filterByRestrictionTypeId(array('min' => 12)); // WHERE restriction_type_id > 12
     * </code>
     *
     * @see       filterByRestrictionType()
     *
     * @param     mixed $restrictionTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByRestrictionTypeId($restrictionTypeId = null, $comparison = null)
    {
        if (is_array($restrictionTypeId)) {
            $useMinMax = false;
            if (isset($restrictionTypeId['min'])) {
                $this->addUsingAlias(CardRestrictionTableMap::COL_RESTRICTION_TYPE_ID, $restrictionTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($restrictionTypeId['max'])) {
                $this->addUsingAlias(CardRestrictionTableMap::COL_RESTRICTION_TYPE_ID, $restrictionTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardRestrictionTableMap::COL_RESTRICTION_TYPE_ID, $restrictionTypeId, $comparison);
    }

    /**
     * Filter the query on the Comparator column
     *
     * Example usage:
     * <code>
     * $query->filterByComparator('fooValue');   // WHERE Comparator = 'fooValue'
     * $query->filterByComparator('%fooValue%'); // WHERE Comparator LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comparator The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByComparator($comparator = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comparator)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comparator)) {
                $comparator = str_replace('*', '%', $comparator);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CardRestrictionTableMap::COL_COMPARATOR, $comparator, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CardRestrictionTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the priority_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPriorityId(1234); // WHERE priority_id = 1234
     * $query->filterByPriorityId(array(12, 34)); // WHERE priority_id IN (12, 34)
     * $query->filterByPriorityId(array('min' => 12)); // WHERE priority_id > 12
     * </code>
     *
     * @param     mixed $priorityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByPriorityId($priorityId = null, $comparison = null)
    {
        if (is_array($priorityId)) {
            $useMinMax = false;
            if (isset($priorityId['min'])) {
                $this->addUsingAlias(CardRestrictionTableMap::COL_PRIORITY_ID, $priorityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priorityId['max'])) {
                $this->addUsingAlias(CardRestrictionTableMap::COL_PRIORITY_ID, $priorityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardRestrictionTableMap::COL_PRIORITY_ID, $priorityId, $comparison);
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
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(CardRestrictionTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(CardRestrictionTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardRestrictionTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CardRestrictionTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(CardRestrictionTableMap::COL_CREDIT_CARD_ID, $creditCard->getCreditCardId(), $comparison);
        } elseif ($creditCard instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CardRestrictionTableMap::COL_CREDIT_CARD_ID, $creditCard->toKeyValue('PrimaryKey', 'CreditCardId'), $comparison);
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
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
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
     * Filter the query by a related \RestrictionType object
     *
     * @param \RestrictionType|ObjectCollection $restrictionType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function filterByRestrictionType($restrictionType, $comparison = null)
    {
        if ($restrictionType instanceof \RestrictionType) {
            return $this
                ->addUsingAlias(CardRestrictionTableMap::COL_RESTRICTION_TYPE_ID, $restrictionType->getRestrictionTypeId(), $comparison);
        } elseif ($restrictionType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CardRestrictionTableMap::COL_RESTRICTION_TYPE_ID, $restrictionType->toKeyValue('PrimaryKey', 'RestrictionTypeId'), $comparison);
        } else {
            throw new PropelException('filterByRestrictionType() only accepts arguments of type \RestrictionType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RestrictionType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function joinRestrictionType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RestrictionType');

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
            $this->addJoinObject($join, 'RestrictionType');
        }

        return $this;
    }

    /**
     * Use the RestrictionType relation RestrictionType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RestrictionTypeQuery A secondary query class using the current class as primary query
     */
    public function useRestrictionTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRestrictionType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RestrictionType', '\RestrictionTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCardRestriction $cardRestriction Object to remove from the list of results
     *
     * @return $this|ChildCardRestrictionQuery The current query, for fluid interface
     */
    public function prune($cardRestriction = null)
    {
        if ($cardRestriction) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CardRestrictionTableMap::COL_CREDIT_CARD_ID), $cardRestriction->getCreditCardId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CardRestrictionTableMap::COL_RESTRICTION_TYPE_ID), $cardRestriction->getRestrictionTypeId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the card_restriction table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardRestrictionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CardRestrictionTableMap::clearInstancePool();
            CardRestrictionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CardRestrictionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CardRestrictionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CardRestrictionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CardRestrictionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CardRestrictionQuery
