<?php

namespace Base;

use \MapCardFeatureConstraint as ChildMapCardFeatureConstraint;
use \MapCardFeatureConstraintQuery as ChildMapCardFeatureConstraintQuery;
use \Exception;
use \PDO;
use Map\MapCardFeatureConstraintTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'map_card_feature_constraint' table.
 *
 *
 *
 * @method     ChildMapCardFeatureConstraintQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildMapCardFeatureConstraintQuery orderByFeatureTypeId($order = Criteria::ASC) Order by the feature_type_id column
 * @method     ChildMapCardFeatureConstraintQuery orderByPriorityId($order = Criteria::ASC) Order by the priority_id column
 * @method     ChildMapCardFeatureConstraintQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildMapCardFeatureConstraintQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildMapCardFeatureConstraintQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildMapCardFeatureConstraintQuery groupByFeatureTypeId() Group by the feature_type_id column
 * @method     ChildMapCardFeatureConstraintQuery groupByPriorityId() Group by the priority_id column
 * @method     ChildMapCardFeatureConstraintQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildMapCardFeatureConstraintQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildMapCardFeatureConstraintQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMapCardFeatureConstraintQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMapCardFeatureConstraintQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMapCardFeatureConstraintQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildMapCardFeatureConstraintQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildMapCardFeatureConstraintQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     ChildMapCardFeatureConstraintQuery leftJoinCardFeatureType($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardFeatureType relation
 * @method     ChildMapCardFeatureConstraintQuery rightJoinCardFeatureType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardFeatureType relation
 * @method     ChildMapCardFeatureConstraintQuery innerJoinCardFeatureType($relationAlias = null) Adds a INNER JOIN clause to the query using the CardFeatureType relation
 *
 * @method     \CreditCardQuery|\CardFeatureTypeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMapCardFeatureConstraint findOne(ConnectionInterface $con = null) Return the first ChildMapCardFeatureConstraint matching the query
 * @method     ChildMapCardFeatureConstraint findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMapCardFeatureConstraint matching the query, or a new ChildMapCardFeatureConstraint object populated from the query conditions when no match is found
 *
 * @method     ChildMapCardFeatureConstraint findOneByCreditCardId(int $credit_card_id) Return the first ChildMapCardFeatureConstraint filtered by the credit_card_id column
 * @method     ChildMapCardFeatureConstraint findOneByFeatureTypeId(int $feature_type_id) Return the first ChildMapCardFeatureConstraint filtered by the feature_type_id column
 * @method     ChildMapCardFeatureConstraint findOneByPriorityId(int $priority_id) Return the first ChildMapCardFeatureConstraint filtered by the priority_id column
 * @method     ChildMapCardFeatureConstraint findOneByUpdateTime(string $update_time) Return the first ChildMapCardFeatureConstraint filtered by the update_time column
 * @method     ChildMapCardFeatureConstraint findOneByUpdateUser(string $update_user) Return the first ChildMapCardFeatureConstraint filtered by the update_user column
 *
 * @method     ChildMapCardFeatureConstraint[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMapCardFeatureConstraint objects based on current ModelCriteria
 * @method     ChildMapCardFeatureConstraint[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildMapCardFeatureConstraint objects filtered by the credit_card_id column
 * @method     ChildMapCardFeatureConstraint[]|ObjectCollection findByFeatureTypeId(int $feature_type_id) Return ChildMapCardFeatureConstraint objects filtered by the feature_type_id column
 * @method     ChildMapCardFeatureConstraint[]|ObjectCollection findByPriorityId(int $priority_id) Return ChildMapCardFeatureConstraint objects filtered by the priority_id column
 * @method     ChildMapCardFeatureConstraint[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildMapCardFeatureConstraint objects filtered by the update_time column
 * @method     ChildMapCardFeatureConstraint[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildMapCardFeatureConstraint objects filtered by the update_user column
 * @method     ChildMapCardFeatureConstraint[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MapCardFeatureConstraintQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\MapCardFeatureConstraintQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MapCardFeatureConstraint', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMapCardFeatureConstraintQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMapCardFeatureConstraintQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMapCardFeatureConstraintQuery) {
            return $criteria;
        }
        $query = new ChildMapCardFeatureConstraintQuery();
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
     * @param array[$credit_card_id, $feature_type_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMapCardFeatureConstraint|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MapCardFeatureConstraintTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MapCardFeatureConstraintTableMap::DATABASE_NAME);
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
     * @return ChildMapCardFeatureConstraint A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT credit_card_id, feature_type_id, priority_id, update_time, update_user FROM map_card_feature_constraint WHERE credit_card_id = :p0 AND feature_type_id = :p1';
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
            /** @var ChildMapCardFeatureConstraint $obj */
            $obj = new ChildMapCardFeatureConstraint();
            $obj->hydrate($row);
            MapCardFeatureConstraintTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildMapCardFeatureConstraint|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_CREDIT_CARD_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(MapCardFeatureConstraintTableMap::COL_CREDIT_CARD_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(MapCardFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
    }

    /**
     * Filter the query on the feature_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFeatureTypeId(1234); // WHERE feature_type_id = 1234
     * $query->filterByFeatureTypeId(array(12, 34)); // WHERE feature_type_id IN (12, 34)
     * $query->filterByFeatureTypeId(array('min' => 12)); // WHERE feature_type_id > 12
     * </code>
     *
     * @see       filterByCardFeatureType()
     *
     * @param     mixed $featureTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByFeatureTypeId($featureTypeId = null, $comparison = null)
    {
        if (is_array($featureTypeId)) {
            $useMinMax = false;
            if (isset($featureTypeId['min'])) {
                $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $featureTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($featureTypeId['max'])) {
                $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $featureTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $featureTypeId, $comparison);
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
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByPriorityId($priorityId = null, $comparison = null)
    {
        if (is_array($priorityId)) {
            $useMinMax = false;
            if (isset($priorityId['min'])) {
                $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_PRIORITY_ID, $priorityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priorityId['max'])) {
                $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_PRIORITY_ID, $priorityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_PRIORITY_ID, $priorityId, $comparison);
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
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MapCardFeatureConstraintTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(MapCardFeatureConstraintTableMap::COL_CREDIT_CARD_ID, $creditCard->getCreditCardId(), $comparison);
        } elseif ($creditCard instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MapCardFeatureConstraintTableMap::COL_CREDIT_CARD_ID, $creditCard->toKeyValue('PrimaryKey', 'CreditCardId'), $comparison);
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
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
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
     * Filter the query by a related \CardFeatureType object
     *
     * @param \CardFeatureType|ObjectCollection $cardFeatureType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByCardFeatureType($cardFeatureType, $comparison = null)
    {
        if ($cardFeatureType instanceof \CardFeatureType) {
            return $this
                ->addUsingAlias(MapCardFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $cardFeatureType->getFeatureTypeId(), $comparison);
        } elseif ($cardFeatureType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MapCardFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $cardFeatureType->toKeyValue('PrimaryKey', 'FeatureTypeId'), $comparison);
        } else {
            throw new PropelException('filterByCardFeatureType() only accepts arguments of type \CardFeatureType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CardFeatureType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function joinCardFeatureType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CardFeatureType');

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
            $this->addJoinObject($join, 'CardFeatureType');
        }

        return $this;
    }

    /**
     * Use the CardFeatureType relation CardFeatureType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CardFeatureTypeQuery A secondary query class using the current class as primary query
     */
    public function useCardFeatureTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCardFeatureType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CardFeatureType', '\CardFeatureTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMapCardFeatureConstraint $mapCardFeatureConstraint Object to remove from the list of results
     *
     * @return $this|ChildMapCardFeatureConstraintQuery The current query, for fluid interface
     */
    public function prune($mapCardFeatureConstraint = null)
    {
        if ($mapCardFeatureConstraint) {
            $this->addCond('pruneCond0', $this->getAliasedColName(MapCardFeatureConstraintTableMap::COL_CREDIT_CARD_ID), $mapCardFeatureConstraint->getCreditCardId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(MapCardFeatureConstraintTableMap::COL_FEATURE_TYPE_ID), $mapCardFeatureConstraint->getFeatureTypeId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the map_card_feature_constraint table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MapCardFeatureConstraintTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MapCardFeatureConstraintTableMap::clearInstancePool();
            MapCardFeatureConstraintTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MapCardFeatureConstraintTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MapCardFeatureConstraintTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MapCardFeatureConstraintTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MapCardFeatureConstraintTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MapCardFeatureConstraintQuery
