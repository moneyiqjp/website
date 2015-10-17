<?php

namespace Base;

use \RewardType as ChildRewardType;
use \RewardTypeQuery as ChildRewardTypeQuery;
use \Exception;
use \PDO;
use Map\RewardTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'reward_type' table.
 *
 *
 *
 * @method     ChildRewardTypeQuery orderByRewardTypeId($order = Criteria::ASC) Order by the reward_type_id column
 * @method     ChildRewardTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildRewardTypeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildRewardTypeQuery orderByIsFinite($order = Criteria::ASC) Order by the is_finite column
 * @method     ChildRewardTypeQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildRewardTypeQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildRewardTypeQuery groupByRewardTypeId() Group by the reward_type_id column
 * @method     ChildRewardTypeQuery groupByName() Group by the name column
 * @method     ChildRewardTypeQuery groupByDescription() Group by the description column
 * @method     ChildRewardTypeQuery groupByIsFinite() Group by the is_finite column
 * @method     ChildRewardTypeQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildRewardTypeQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildRewardTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRewardTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRewardTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRewardTypeQuery leftJoinReward($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reward relation
 * @method     ChildRewardTypeQuery rightJoinReward($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reward relation
 * @method     ChildRewardTypeQuery innerJoinReward($relationAlias = null) Adds a INNER JOIN clause to the query using the Reward relation
 *
 * @method     \RewardQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRewardType findOne(ConnectionInterface $con = null) Return the first ChildRewardType matching the query
 * @method     ChildRewardType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRewardType matching the query, or a new ChildRewardType object populated from the query conditions when no match is found
 *
 * @method     ChildRewardType findOneByRewardTypeId(int $reward_type_id) Return the first ChildRewardType filtered by the reward_type_id column
 * @method     ChildRewardType findOneByName(string $name) Return the first ChildRewardType filtered by the name column
 * @method     ChildRewardType findOneByDescription(string $description) Return the first ChildRewardType filtered by the description column
 * @method     ChildRewardType findOneByIsFinite(int $is_finite) Return the first ChildRewardType filtered by the is_finite column
 * @method     ChildRewardType findOneByUpdateTime(string $update_time) Return the first ChildRewardType filtered by the update_time column
 * @method     ChildRewardType findOneByUpdateUser(string $update_user) Return the first ChildRewardType filtered by the update_user column
 *
 * @method     ChildRewardType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRewardType objects based on current ModelCriteria
 * @method     ChildRewardType[]|ObjectCollection findByRewardTypeId(int $reward_type_id) Return ChildRewardType objects filtered by the reward_type_id column
 * @method     ChildRewardType[]|ObjectCollection findByName(string $name) Return ChildRewardType objects filtered by the name column
 * @method     ChildRewardType[]|ObjectCollection findByDescription(string $description) Return ChildRewardType objects filtered by the description column
 * @method     ChildRewardType[]|ObjectCollection findByIsFinite(int $is_finite) Return ChildRewardType objects filtered by the is_finite column
 * @method     ChildRewardType[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildRewardType objects filtered by the update_time column
 * @method     ChildRewardType[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildRewardType objects filtered by the update_user column
 * @method     ChildRewardType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RewardTypeQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\RewardTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\RewardType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRewardTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRewardTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRewardTypeQuery) {
            return $criteria;
        }
        $query = new ChildRewardTypeQuery();
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
     * @return ChildRewardType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RewardTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RewardTypeTableMap::DATABASE_NAME);
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
     * @return ChildRewardType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT reward_type_id, name, description, is_finite, update_time, update_user FROM reward_type WHERE reward_type_id = :p0';
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
            /** @var ChildRewardType $obj */
            $obj = new ChildRewardType();
            $obj->hydrate($row);
            RewardTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildRewardType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RewardTypeTableMap::COL_REWARD_TYPE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RewardTypeTableMap::COL_REWARD_TYPE_ID, $keys, Criteria::IN);
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
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
     */
    public function filterByRewardTypeId($rewardTypeId = null, $comparison = null)
    {
        if (is_array($rewardTypeId)) {
            $useMinMax = false;
            if (isset($rewardTypeId['min'])) {
                $this->addUsingAlias(RewardTypeTableMap::COL_REWARD_TYPE_ID, $rewardTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rewardTypeId['max'])) {
                $this->addUsingAlias(RewardTypeTableMap::COL_REWARD_TYPE_ID, $rewardTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTypeTableMap::COL_REWARD_TYPE_ID, $rewardTypeId, $comparison);
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
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardTypeTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardTypeTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the is_finite column
     *
     * Example usage:
     * <code>
     * $query->filterByIsFinite(1234); // WHERE is_finite = 1234
     * $query->filterByIsFinite(array(12, 34)); // WHERE is_finite IN (12, 34)
     * $query->filterByIsFinite(array('min' => 12)); // WHERE is_finite > 12
     * </code>
     *
     * @param     mixed $isFinite The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
     */
    public function filterByIsFinite($isFinite = null, $comparison = null)
    {
        if (is_array($isFinite)) {
            $useMinMax = false;
            if (isset($isFinite['min'])) {
                $this->addUsingAlias(RewardTypeTableMap::COL_IS_FINITE, $isFinite['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isFinite['max'])) {
                $this->addUsingAlias(RewardTypeTableMap::COL_IS_FINITE, $isFinite['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTypeTableMap::COL_IS_FINITE, $isFinite, $comparison);
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
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(RewardTypeTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(RewardTypeTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTypeTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardTypeTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Reward object
     *
     * @param \Reward|ObjectCollection $reward  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRewardTypeQuery The current query, for fluid interface
     */
    public function filterByReward($reward, $comparison = null)
    {
        if ($reward instanceof \Reward) {
            return $this
                ->addUsingAlias(RewardTypeTableMap::COL_REWARD_TYPE_ID, $reward->getRewardTypeId(), $comparison);
        } elseif ($reward instanceof ObjectCollection) {
            return $this
                ->useRewardQuery()
                ->filterByPrimaryKeys($reward->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByReward() only accepts arguments of type \Reward or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Reward relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
     */
    public function joinReward($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Reward');

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
            $this->addJoinObject($join, 'Reward');
        }

        return $this;
    }

    /**
     * Use the Reward relation Reward object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RewardQuery A secondary query class using the current class as primary query
     */
    public function useRewardQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinReward($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Reward', '\RewardQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRewardType $rewardType Object to remove from the list of results
     *
     * @return $this|ChildRewardTypeQuery The current query, for fluid interface
     */
    public function prune($rewardType = null)
    {
        if ($rewardType) {
            $this->addUsingAlias(RewardTypeTableMap::COL_REWARD_TYPE_ID, $rewardType->getRewardTypeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the reward_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RewardTypeTableMap::clearInstancePool();
            RewardTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RewardTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RewardTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RewardTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RewardTypeQuery
