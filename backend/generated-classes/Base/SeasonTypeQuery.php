<?php

namespace Base;

use \SeasonType as ChildSeasonType;
use \SeasonTypeQuery as ChildSeasonTypeQuery;
use \Exception;
use \PDO;
use Map\SeasonTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'season_type' table.
 *
 *
 *
 * @method     ChildSeasonTypeQuery orderBySeasonTypeId($order = Criteria::ASC) Order by the season_type_id column
 * @method     ChildSeasonTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSeasonTypeQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     ChildSeasonTypeQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildSeasonTypeQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildSeasonTypeQuery groupBySeasonTypeId() Group by the season_type_id column
 * @method     ChildSeasonTypeQuery groupByName() Group by the name column
 * @method     ChildSeasonTypeQuery groupByDisplay() Group by the display column
 * @method     ChildSeasonTypeQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildSeasonTypeQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildSeasonTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSeasonTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSeasonTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSeasonTypeQuery leftJoinSeason($relationAlias = null) Adds a LEFT JOIN clause to the query using the Season relation
 * @method     ChildSeasonTypeQuery rightJoinSeason($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Season relation
 * @method     ChildSeasonTypeQuery innerJoinSeason($relationAlias = null) Adds a INNER JOIN clause to the query using the Season relation
 *
 * @method     \SeasonQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSeasonType findOne(ConnectionInterface $con = null) Return the first ChildSeasonType matching the query
 * @method     ChildSeasonType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSeasonType matching the query, or a new ChildSeasonType object populated from the query conditions when no match is found
 *
 * @method     ChildSeasonType findOneBySeasonTypeId(int $season_type_id) Return the first ChildSeasonType filtered by the season_type_id column
 * @method     ChildSeasonType findOneByName(string $name) Return the first ChildSeasonType filtered by the name column
 * @method     ChildSeasonType findOneByDisplay(string $display) Return the first ChildSeasonType filtered by the display column
 * @method     ChildSeasonType findOneByUpdateTime(string $update_time) Return the first ChildSeasonType filtered by the update_time column
 * @method     ChildSeasonType findOneByUpdateUser(string $update_user) Return the first ChildSeasonType filtered by the update_user column
 *
 * @method     ChildSeasonType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSeasonType objects based on current ModelCriteria
 * @method     ChildSeasonType[]|ObjectCollection findBySeasonTypeId(int $season_type_id) Return ChildSeasonType objects filtered by the season_type_id column
 * @method     ChildSeasonType[]|ObjectCollection findByName(string $name) Return ChildSeasonType objects filtered by the name column
 * @method     ChildSeasonType[]|ObjectCollection findByDisplay(string $display) Return ChildSeasonType objects filtered by the display column
 * @method     ChildSeasonType[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildSeasonType objects filtered by the update_time column
 * @method     ChildSeasonType[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildSeasonType objects filtered by the update_user column
 * @method     ChildSeasonType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SeasonTypeQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\SeasonTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\SeasonType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSeasonTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSeasonTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSeasonTypeQuery) {
            return $criteria;
        }
        $query = new ChildSeasonTypeQuery();
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
     * @return ChildSeasonType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SeasonTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SeasonTypeTableMap::DATABASE_NAME);
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
     * @return ChildSeasonType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT season_type_id, name, display, update_time, update_user FROM season_type WHERE season_type_id = :p0';
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
            /** @var ChildSeasonType $obj */
            $obj = new ChildSeasonType();
            $obj->hydrate($row);
            SeasonTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSeasonType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSeasonTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SeasonTypeTableMap::COL_SEASON_TYPE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSeasonTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SeasonTypeTableMap::COL_SEASON_TYPE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the season_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySeasonTypeId(1234); // WHERE season_type_id = 1234
     * $query->filterBySeasonTypeId(array(12, 34)); // WHERE season_type_id IN (12, 34)
     * $query->filterBySeasonTypeId(array('min' => 12)); // WHERE season_type_id > 12
     * </code>
     *
     * @param     mixed $seasonTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeasonTypeQuery The current query, for fluid interface
     */
    public function filterBySeasonTypeId($seasonTypeId = null, $comparison = null)
    {
        if (is_array($seasonTypeId)) {
            $useMinMax = false;
            if (isset($seasonTypeId['min'])) {
                $this->addUsingAlias(SeasonTypeTableMap::COL_SEASON_TYPE_ID, $seasonTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seasonTypeId['max'])) {
                $this->addUsingAlias(SeasonTypeTableMap::COL_SEASON_TYPE_ID, $seasonTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonTypeTableMap::COL_SEASON_TYPE_ID, $seasonTypeId, $comparison);
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
     * @return $this|ChildSeasonTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SeasonTypeTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the display column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplay('fooValue');   // WHERE display = 'fooValue'
     * $query->filterByDisplay('%fooValue%'); // WHERE display LIKE '%fooValue%'
     * </code>
     *
     * @param     string $display The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeasonTypeQuery The current query, for fluid interface
     */
    public function filterByDisplay($display = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($display)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $display)) {
                $display = str_replace('*', '%', $display);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SeasonTypeTableMap::COL_DISPLAY, $display, $comparison);
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
     * @return $this|ChildSeasonTypeQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(SeasonTypeTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(SeasonTypeTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonTypeTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildSeasonTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SeasonTypeTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Season object
     *
     * @param \Season|ObjectCollection $season  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSeasonTypeQuery The current query, for fluid interface
     */
    public function filterBySeason($season, $comparison = null)
    {
        if ($season instanceof \Season) {
            return $this
                ->addUsingAlias(SeasonTypeTableMap::COL_SEASON_TYPE_ID, $season->getSeasonTypeId(), $comparison);
        } elseif ($season instanceof ObjectCollection) {
            return $this
                ->useSeasonQuery()
                ->filterByPrimaryKeys($season->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySeason() only accepts arguments of type \Season or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Season relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSeasonTypeQuery The current query, for fluid interface
     */
    public function joinSeason($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Season');

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
            $this->addJoinObject($join, 'Season');
        }

        return $this;
    }

    /**
     * Use the Season relation Season object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SeasonQuery A secondary query class using the current class as primary query
     */
    public function useSeasonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSeason($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Season', '\SeasonQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSeasonType $seasonType Object to remove from the list of results
     *
     * @return $this|ChildSeasonTypeQuery The current query, for fluid interface
     */
    public function prune($seasonType = null)
    {
        if ($seasonType) {
            $this->addUsingAlias(SeasonTypeTableMap::COL_SEASON_TYPE_ID, $seasonType->getSeasonTypeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the season_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SeasonTypeTableMap::clearInstancePool();
            SeasonTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SeasonTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SeasonTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SeasonTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SeasonTypeQuery
