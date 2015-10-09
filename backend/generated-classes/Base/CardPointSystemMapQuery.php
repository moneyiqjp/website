<?php

namespace Base;

use \CardPointSystemMap as ChildCardPointSystemMap;
use \CardPointSystemMapQuery as ChildCardPointSystemMapQuery;
use \Exception;
use \PDO;
use Map\CardPointSystemMapTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'card_point_system_map' table.
 *
 * 
 *
 * @method     ChildCardPointSystemMapQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildCardPointSystemMapQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildCardPointSystemMapQuery orderByPriorityId($order = Criteria::ASC) Order by the priority_id column
 * @method     ChildCardPointSystemMapQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildCardPointSystemMapQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildCardPointSystemMapQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildCardPointSystemMapQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildCardPointSystemMapQuery groupByPriorityId() Group by the priority_id column
 * @method     ChildCardPointSystemMapQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildCardPointSystemMapQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildCardPointSystemMapQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCardPointSystemMapQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCardPointSystemMapQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCardPointSystemMap findOne(ConnectionInterface $con = null) Return the first ChildCardPointSystemMap matching the query
 * @method     ChildCardPointSystemMap findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCardPointSystemMap matching the query, or a new ChildCardPointSystemMap object populated from the query conditions when no match is found
 *
 * @method     ChildCardPointSystemMap findOneByCreditCardId(int $credit_card_id) Return the first ChildCardPointSystemMap filtered by the credit_card_id column
 * @method     ChildCardPointSystemMap findOneByPointSystemId(int $point_system_id) Return the first ChildCardPointSystemMap filtered by the point_system_id column
 * @method     ChildCardPointSystemMap findOneByPriorityId(int $priority_id) Return the first ChildCardPointSystemMap filtered by the priority_id column
 * @method     ChildCardPointSystemMap findOneByUpdateTime(string $update_time) Return the first ChildCardPointSystemMap filtered by the update_time column
 * @method     ChildCardPointSystemMap findOneByUpdateUser(string $update_user) Return the first ChildCardPointSystemMap filtered by the update_user column
 *
 * @method     ChildCardPointSystemMap[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCardPointSystemMap objects based on current ModelCriteria
 * @method     ChildCardPointSystemMap[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildCardPointSystemMap objects filtered by the credit_card_id column
 * @method     ChildCardPointSystemMap[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildCardPointSystemMap objects filtered by the point_system_id column
 * @method     ChildCardPointSystemMap[]|ObjectCollection findByPriorityId(int $priority_id) Return ChildCardPointSystemMap objects filtered by the priority_id column
 * @method     ChildCardPointSystemMap[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildCardPointSystemMap objects filtered by the update_time column
 * @method     ChildCardPointSystemMap[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildCardPointSystemMap objects filtered by the update_user column
 * @method     ChildCardPointSystemMap[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CardPointSystemMapQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\CardPointSystemMapQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CardPointSystemMap', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCardPointSystemMapQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCardPointSystemMapQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCardPointSystemMapQuery) {
            return $criteria;
        }
        $query = new ChildCardPointSystemMapQuery();
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
     * @param array[$credit_card_id, $point_system_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCardPointSystemMap|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CardPointSystemMapTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CardPointSystemMapTableMap::DATABASE_NAME);
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
     * @return ChildCardPointSystemMap A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT credit_card_id, point_system_id, priority_id, update_time, update_user FROM card_point_system_map WHERE credit_card_id = :p0 AND point_system_id = :p1';
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
            /** @var ChildCardPointSystemMap $obj */
            $obj = new ChildCardPointSystemMap();
            $obj->hydrate($row);
            CardPointSystemMapTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildCardPointSystemMap|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCardPointSystemMapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CardPointSystemMapTableMap::COL_CREDIT_CARD_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CardPointSystemMapTableMap::COL_POINT_SYSTEM_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCardPointSystemMapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CardPointSystemMapTableMap::COL_CREDIT_CARD_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CardPointSystemMapTableMap::COL_POINT_SYSTEM_ID, $key[1], Criteria::EQUAL);
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
     * @param     mixed $creditCardId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardPointSystemMapQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(CardPointSystemMapTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(CardPointSystemMapTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardPointSystemMapTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @param     mixed $pointSystemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardPointSystemMapQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(CardPointSystemMapTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(CardPointSystemMapTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardPointSystemMapTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
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
     * @return $this|ChildCardPointSystemMapQuery The current query, for fluid interface
     */
    public function filterByPriorityId($priorityId = null, $comparison = null)
    {
        if (is_array($priorityId)) {
            $useMinMax = false;
            if (isset($priorityId['min'])) {
                $this->addUsingAlias(CardPointSystemMapTableMap::COL_PRIORITY_ID, $priorityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priorityId['max'])) {
                $this->addUsingAlias(CardPointSystemMapTableMap::COL_PRIORITY_ID, $priorityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardPointSystemMapTableMap::COL_PRIORITY_ID, $priorityId, $comparison);
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
     * @return $this|ChildCardPointSystemMapQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(CardPointSystemMapTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(CardPointSystemMapTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardPointSystemMapTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildCardPointSystemMapQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CardPointSystemMapTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCardPointSystemMap $cardPointSystemMap Object to remove from the list of results
     *
     * @return $this|ChildCardPointSystemMapQuery The current query, for fluid interface
     */
    public function prune($cardPointSystemMap = null)
    {
        if ($cardPointSystemMap) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CardPointSystemMapTableMap::COL_CREDIT_CARD_ID), $cardPointSystemMap->getCreditCardId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CardPointSystemMapTableMap::COL_POINT_SYSTEM_ID), $cardPointSystemMap->getPointSystemId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the card_point_system_map table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardPointSystemMapTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CardPointSystemMapTableMap::clearInstancePool();
            CardPointSystemMapTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CardPointSystemMapTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CardPointSystemMapTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            CardPointSystemMapTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            CardPointSystemMapTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CardPointSystemMapQuery
