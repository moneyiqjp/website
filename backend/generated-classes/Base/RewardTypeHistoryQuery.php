<?php

namespace Base;

use \RewardTypeHistory as ChildRewardTypeHistory;
use \RewardTypeHistoryQuery as ChildRewardTypeHistoryQuery;
use \Exception;
use \PDO;
use Map\RewardTypeHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'reward_type_history' table.
 *
 * 
 *
 * @method     ChildRewardTypeHistoryQuery orderByRewardTypeId($order = Criteria::ASC) Order by the reward_type_id column
 * @method     ChildRewardTypeHistoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildRewardTypeHistoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildRewardTypeHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildRewardTypeHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildRewardTypeHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildRewardTypeHistoryQuery groupByRewardTypeId() Group by the reward_type_id column
 * @method     ChildRewardTypeHistoryQuery groupByName() Group by the name column
 * @method     ChildRewardTypeHistoryQuery groupByDescription() Group by the description column
 * @method     ChildRewardTypeHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildRewardTypeHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildRewardTypeHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildRewardTypeHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRewardTypeHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRewardTypeHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRewardTypeHistory findOne(ConnectionInterface $con = null) Return the first ChildRewardTypeHistory matching the query
 * @method     ChildRewardTypeHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRewardTypeHistory matching the query, or a new ChildRewardTypeHistory object populated from the query conditions when no match is found
 *
 * @method     ChildRewardTypeHistory findOneByRewardTypeId(int $reward_type_id) Return the first ChildRewardTypeHistory filtered by the reward_type_id column
 * @method     ChildRewardTypeHistory findOneByName(string $name) Return the first ChildRewardTypeHistory filtered by the name column
 * @method     ChildRewardTypeHistory findOneByDescription(string $description) Return the first ChildRewardTypeHistory filtered by the description column
 * @method     ChildRewardTypeHistory findOneByTimeBeg(string $time_beg) Return the first ChildRewardTypeHistory filtered by the time_beg column
 * @method     ChildRewardTypeHistory findOneByTimeEnd(string $time_end) Return the first ChildRewardTypeHistory filtered by the time_end column
 * @method     ChildRewardTypeHistory findOneByUpdateUser(string $update_user) Return the first ChildRewardTypeHistory filtered by the update_user column
 *
 * @method     ChildRewardTypeHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRewardTypeHistory objects based on current ModelCriteria
 * @method     ChildRewardTypeHistory[]|ObjectCollection findByRewardTypeId(int $reward_type_id) Return ChildRewardTypeHistory objects filtered by the reward_type_id column
 * @method     ChildRewardTypeHistory[]|ObjectCollection findByName(string $name) Return ChildRewardTypeHistory objects filtered by the name column
 * @method     ChildRewardTypeHistory[]|ObjectCollection findByDescription(string $description) Return ChildRewardTypeHistory objects filtered by the description column
 * @method     ChildRewardTypeHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildRewardTypeHistory objects filtered by the time_beg column
 * @method     ChildRewardTypeHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildRewardTypeHistory objects filtered by the time_end column
 * @method     ChildRewardTypeHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildRewardTypeHistory objects filtered by the update_user column
 * @method     ChildRewardTypeHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RewardTypeHistoryQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\RewardTypeHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\RewardTypeHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRewardTypeHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRewardTypeHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRewardTypeHistoryQuery) {
            return $criteria;
        }
        $query = new ChildRewardTypeHistoryQuery();
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
     * @param array[$reward_type_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildRewardTypeHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RewardTypeHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RewardTypeHistoryTableMap::DATABASE_NAME);
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
     * @return ChildRewardTypeHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT reward_type_id, name, description, time_beg, time_end, update_user FROM reward_type_history WHERE reward_type_id = :p0 AND time_beg = :p1';
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
            /** @var ChildRewardTypeHistory $obj */
            $obj = new ChildRewardTypeHistory();
            $obj->hydrate($row);
            RewardTypeHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildRewardTypeHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRewardTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RewardTypeHistoryTableMap::COL_REWARD_TYPE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RewardTypeHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRewardTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RewardTypeHistoryTableMap::COL_REWARD_TYPE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RewardTypeHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the reward_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRewardTypeId(1234); // WHERE reward_type_id = 1234
     * $query->filterByRewardTypeId(array(12, 34)); // WHERE reward_type_id IN (12, 34)
     * $query->filterByRewardTypeId(array('min' => 12)); // WHERE reward_type_id > 12
     * </code>
     *
     * @param     mixed $rewardTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByRewardTypeId($rewardTypeId = null, $comparison = null)
    {
        if (is_array($rewardTypeId)) {
            $useMinMax = false;
            if (isset($rewardTypeId['min'])) {
                $this->addUsingAlias(RewardTypeHistoryTableMap::COL_REWARD_TYPE_ID, $rewardTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rewardTypeId['max'])) {
                $this->addUsingAlias(RewardTypeHistoryTableMap::COL_REWARD_TYPE_ID, $rewardTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTypeHistoryTableMap::COL_REWARD_TYPE_ID, $rewardTypeId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RewardTypeHistoryTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RewardTypeHistoryTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildRewardTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(RewardTypeHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(RewardTypeHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTypeHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildRewardTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(RewardTypeHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(RewardTypeHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTypeHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildRewardTypeHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardTypeHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRewardTypeHistory $rewardTypeHistory Object to remove from the list of results
     *
     * @return $this|ChildRewardTypeHistoryQuery The current query, for fluid interface
     */
    public function prune($rewardTypeHistory = null)
    {
        if ($rewardTypeHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RewardTypeHistoryTableMap::COL_REWARD_TYPE_ID), $rewardTypeHistory->getRewardTypeId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RewardTypeHistoryTableMap::COL_TIME_BEG), $rewardTypeHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the reward_type_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTypeHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RewardTypeHistoryTableMap::clearInstancePool();
            RewardTypeHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTypeHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RewardTypeHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            RewardTypeHistoryTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            RewardTypeHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RewardTypeHistoryQuery
