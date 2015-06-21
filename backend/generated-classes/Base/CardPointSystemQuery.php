<?php

namespace Base;

use \CardPointSystem as ChildCardPointSystem;
use \CardPointSystemQuery as ChildCardPointSystemQuery;
use \Exception;
use \PDO;
use Map\CardPointSystemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'card_point_system' table.
 *
 *
 *
 * @method     ChildCardPointSystemQuery orderByCardPointSystemId($order = Criteria::ASC) Order by the card_point_system_id column
 * @method     ChildCardPointSystemQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildCardPointSystemQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildCardPointSystemQuery orderByPriorityId($order = Criteria::ASC) Order by the priority_id column
 * @method     ChildCardPointSystemQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildCardPointSystemQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildCardPointSystemQuery groupByCardPointSystemId() Group by the card_point_system_id column
 * @method     ChildCardPointSystemQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildCardPointSystemQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildCardPointSystemQuery groupByPriorityId() Group by the priority_id column
 * @method     ChildCardPointSystemQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildCardPointSystemQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildCardPointSystemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCardPointSystemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCardPointSystemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCardPointSystemQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildCardPointSystemQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildCardPointSystemQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     ChildCardPointSystemQuery leftJoinPointSystem($relationAlias = null) Adds a LEFT JOIN clause to the query using the PointSystem relation
 * @method     ChildCardPointSystemQuery rightJoinPointSystem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PointSystem relation
 * @method     ChildCardPointSystemQuery innerJoinPointSystem($relationAlias = null) Adds a INNER JOIN clause to the query using the PointSystem relation
 *
 * @method     \CreditCardQuery|\PointSystemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCardPointSystem findOne(ConnectionInterface $con = null) Return the first ChildCardPointSystem matching the query
 * @method     ChildCardPointSystem findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCardPointSystem matching the query, or a new ChildCardPointSystem object populated from the query conditions when no match is found
 *
 * @method     ChildCardPointSystem findOneByCardPointSystemId(int $card_point_system_id) Return the first ChildCardPointSystem filtered by the card_point_system_id column
 * @method     ChildCardPointSystem findOneByCreditCardId(int $credit_card_id) Return the first ChildCardPointSystem filtered by the credit_card_id column
 * @method     ChildCardPointSystem findOneByPointSystemId(int $point_system_id) Return the first ChildCardPointSystem filtered by the point_system_id column
 * @method     ChildCardPointSystem findOneByPriorityId(int $priority_id) Return the first ChildCardPointSystem filtered by the priority_id column
 * @method     ChildCardPointSystem findOneByUpdateTime(string $update_time) Return the first ChildCardPointSystem filtered by the update_time column
 * @method     ChildCardPointSystem findOneByUpdateUser(string $update_user) Return the first ChildCardPointSystem filtered by the update_user column
 *
 * @method     ChildCardPointSystem[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCardPointSystem objects based on current ModelCriteria
 * @method     ChildCardPointSystem[]|ObjectCollection findByCardPointSystemId(int $card_point_system_id) Return ChildCardPointSystem objects filtered by the card_point_system_id column
 * @method     ChildCardPointSystem[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildCardPointSystem objects filtered by the credit_card_id column
 * @method     ChildCardPointSystem[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildCardPointSystem objects filtered by the point_system_id column
 * @method     ChildCardPointSystem[]|ObjectCollection findByPriorityId(int $priority_id) Return ChildCardPointSystem objects filtered by the priority_id column
 * @method     ChildCardPointSystem[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildCardPointSystem objects filtered by the update_time column
 * @method     ChildCardPointSystem[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildCardPointSystem objects filtered by the update_user column
 * @method     ChildCardPointSystem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CardPointSystemQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\CardPointSystemQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CardPointSystem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCardPointSystemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCardPointSystemQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCardPointSystemQuery) {
            return $criteria;
        }
        $query = new ChildCardPointSystemQuery();
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
     * @return ChildCardPointSystem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CardPointSystemTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CardPointSystemTableMap::DATABASE_NAME);
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
     * @return ChildCardPointSystem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT card_point_system_id, credit_card_id, point_system_id, priority_id, update_time, update_user FROM card_point_system WHERE card_point_system_id = :p0';
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
            /** @var ChildCardPointSystem $obj */
            $obj = new ChildCardPointSystem();
            $obj->hydrate($row);
            CardPointSystemTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCardPointSystem|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CardPointSystemTableMap::COL_CARD_POINT_SYSTEM_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CardPointSystemTableMap::COL_CARD_POINT_SYSTEM_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the card_point_system_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCardPointSystemId(1234); // WHERE card_point_system_id = 1234
     * $query->filterByCardPointSystemId(array(12, 34)); // WHERE card_point_system_id IN (12, 34)
     * $query->filterByCardPointSystemId(array('min' => 12)); // WHERE card_point_system_id > 12
     * </code>
     *
     * @param     mixed $cardPointSystemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function filterByCardPointSystemId($cardPointSystemId = null, $comparison = null)
    {
        if (is_array($cardPointSystemId)) {
            $useMinMax = false;
            if (isset($cardPointSystemId['min'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_CARD_POINT_SYSTEM_ID, $cardPointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cardPointSystemId['max'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_CARD_POINT_SYSTEM_ID, $cardPointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardPointSystemTableMap::COL_CARD_POINT_SYSTEM_ID, $cardPointSystemId, $comparison);
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
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardPointSystemTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
    }

    /**
     * Filter the query on the point_system_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPointSystemId(1234); // WHERE point_system_id = 1234
     * $query->filterByPointSystemId(array(12, 34)); // WHERE point_system_id IN (12, 34)
     * $query->filterByPointSystemId(array('min' => 12)); // WHERE point_system_id > 12
     * </code>
     *
     * @see       filterByPointSystem()
     *
     * @param     mixed $pointSystemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardPointSystemTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
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
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function filterByPriorityId($priorityId = null, $comparison = null)
    {
        if (is_array($priorityId)) {
            $useMinMax = false;
            if (isset($priorityId['min'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_PRIORITY_ID, $priorityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priorityId['max'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_PRIORITY_ID, $priorityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardPointSystemTableMap::COL_PRIORITY_ID, $priorityId, $comparison);
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
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(CardPointSystemTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardPointSystemTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CardPointSystemTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(CardPointSystemTableMap::COL_CREDIT_CARD_ID, $creditCard->getCreditCardId(), $comparison);
        } elseif ($creditCard instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CardPointSystemTableMap::COL_CREDIT_CARD_ID, $creditCard->toKeyValue('PrimaryKey', 'CreditCardId'), $comparison);
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
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
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
     * Filter the query by a related \PointSystem object
     *
     * @param \PointSystem|ObjectCollection $pointSystem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function filterByPointSystem($pointSystem, $comparison = null)
    {
        if ($pointSystem instanceof \PointSystem) {
            return $this
                ->addUsingAlias(CardPointSystemTableMap::COL_POINT_SYSTEM_ID, $pointSystem->getPointSystemId(), $comparison);
        } elseif ($pointSystem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CardPointSystemTableMap::COL_POINT_SYSTEM_ID, $pointSystem->toKeyValue('PrimaryKey', 'PointSystemId'), $comparison);
        } else {
            throw new PropelException('filterByPointSystem() only accepts arguments of type \PointSystem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PointSystem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function joinPointSystem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PointSystem');

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
            $this->addJoinObject($join, 'PointSystem');
        }

        return $this;
    }

    /**
     * Use the PointSystem relation PointSystem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PointSystemQuery A secondary query class using the current class as primary query
     */
    public function usePointSystemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPointSystem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PointSystem', '\PointSystemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCardPointSystem $cardPointSystem Object to remove from the list of results
     *
     * @return $this|ChildCardPointSystemQuery The current query, for fluid interface
     */
    public function prune($cardPointSystem = null)
    {
        if ($cardPointSystem) {
            $this->addUsingAlias(CardPointSystemTableMap::COL_CARD_POINT_SYSTEM_ID, $cardPointSystem->getCardPointSystemId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the card_point_system table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardPointSystemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CardPointSystemTableMap::clearInstancePool();
            CardPointSystemTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CardPointSystemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CardPointSystemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CardPointSystemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CardPointSystemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CardPointSystemQuery
