<?php

namespace Base;

use \City as ChildCity;
use \CityQuery as ChildCityQuery;
use \Exception;
use \PDO;
use Map\CityTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'city' table.
 *
 *
 *
 * @method     ChildCityQuery orderByCityId($order = Criteria::ASC) Order by the city_id column
 * @method     ChildCityQuery orderByRegion($order = Criteria::ASC) Order by the region column
 * @method     ChildCityQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     ChildCityQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildCityQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildCityQuery groupByCityId() Group by the city_id column
 * @method     ChildCityQuery groupByRegion() Group by the region column
 * @method     ChildCityQuery groupByDisplay() Group by the display column
 * @method     ChildCityQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildCityQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildCityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCityQuery leftJoinTripRelatedByFromCityId($relationAlias = null) Adds a LEFT JOIN clause to the query using the TripRelatedByFromCityId relation
 * @method     ChildCityQuery rightJoinTripRelatedByFromCityId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TripRelatedByFromCityId relation
 * @method     ChildCityQuery innerJoinTripRelatedByFromCityId($relationAlias = null) Adds a INNER JOIN clause to the query using the TripRelatedByFromCityId relation
 *
 * @method     ChildCityQuery leftJoinTripRelatedByToCityId($relationAlias = null) Adds a LEFT JOIN clause to the query using the TripRelatedByToCityId relation
 * @method     ChildCityQuery rightJoinTripRelatedByToCityId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TripRelatedByToCityId relation
 * @method     ChildCityQuery innerJoinTripRelatedByToCityId($relationAlias = null) Adds a INNER JOIN clause to the query using the TripRelatedByToCityId relation
 *
 * @method     \TripQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCity findOne(ConnectionInterface $con = null) Return the first ChildCity matching the query
 * @method     ChildCity findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCity matching the query, or a new ChildCity object populated from the query conditions when no match is found
 *
 * @method     ChildCity findOneByCityId(int $city_id) Return the first ChildCity filtered by the city_id column
 * @method     ChildCity findOneByRegion(string $region) Return the first ChildCity filtered by the region column
 * @method     ChildCity findOneByDisplay(string $display) Return the first ChildCity filtered by the display column
 * @method     ChildCity findOneByUpdateTime(string $update_time) Return the first ChildCity filtered by the update_time column
 * @method     ChildCity findOneByUpdateUser(string $update_user) Return the first ChildCity filtered by the update_user column
 *
 * @method     ChildCity[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCity objects based on current ModelCriteria
 * @method     ChildCity[]|ObjectCollection findByCityId(int $city_id) Return ChildCity objects filtered by the city_id column
 * @method     ChildCity[]|ObjectCollection findByRegion(string $region) Return ChildCity objects filtered by the region column
 * @method     ChildCity[]|ObjectCollection findByDisplay(string $display) Return ChildCity objects filtered by the display column
 * @method     ChildCity[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildCity objects filtered by the update_time column
 * @method     ChildCity[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildCity objects filtered by the update_user column
 * @method     ChildCity[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CityQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\CityQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\City', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCityQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCityQuery) {
            return $criteria;
        }
        $query = new ChildCityQuery();
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
     * @return ChildCity|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CityTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CityTableMap::DATABASE_NAME);
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
     * @return ChildCity A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT city_id, region, display, update_time, update_user FROM city WHERE city_id = :p0';
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
            /** @var ChildCity $obj */
            $obj = new ChildCity();
            $obj->hydrate($row);
            CityTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCity|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CityTableMap::COL_CITY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CityTableMap::COL_CITY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the city_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCityId(1234); // WHERE city_id = 1234
     * $query->filterByCityId(array(12, 34)); // WHERE city_id IN (12, 34)
     * $query->filterByCityId(array('min' => 12)); // WHERE city_id > 12
     * </code>
     *
     * @param     mixed $cityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCityQuery The current query, for fluid interface
     */
    public function filterByCityId($cityId = null, $comparison = null)
    {
        if (is_array($cityId)) {
            $useMinMax = false;
            if (isset($cityId['min'])) {
                $this->addUsingAlias(CityTableMap::COL_CITY_ID, $cityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cityId['max'])) {
                $this->addUsingAlias(CityTableMap::COL_CITY_ID, $cityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CityTableMap::COL_CITY_ID, $cityId, $comparison);
    }

    /**
     * Filter the query on the region column
     *
     * Example usage:
     * <code>
     * $query->filterByRegion('fooValue');   // WHERE region = 'fooValue'
     * $query->filterByRegion('%fooValue%'); // WHERE region LIKE '%fooValue%'
     * </code>
     *
     * @param     string $region The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCityQuery The current query, for fluid interface
     */
    public function filterByRegion($region = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($region)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $region)) {
                $region = str_replace('*', '%', $region);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CityTableMap::COL_REGION, $region, $comparison);
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
     * @return $this|ChildCityQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CityTableMap::COL_DISPLAY, $display, $comparison);
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
     * @return $this|ChildCityQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(CityTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(CityTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CityTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildCityQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CityTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Trip object
     *
     * @param \Trip|ObjectCollection $trip  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCityQuery The current query, for fluid interface
     */
    public function filterByTripRelatedByFromCityId($trip, $comparison = null)
    {
        if ($trip instanceof \Trip) {
            return $this
                ->addUsingAlias(CityTableMap::COL_CITY_ID, $trip->getFromCityId(), $comparison);
        } elseif ($trip instanceof ObjectCollection) {
            return $this
                ->useTripRelatedByFromCityIdQuery()
                ->filterByPrimaryKeys($trip->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTripRelatedByFromCityId() only accepts arguments of type \Trip or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TripRelatedByFromCityId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCityQuery The current query, for fluid interface
     */
    public function joinTripRelatedByFromCityId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TripRelatedByFromCityId');

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
            $this->addJoinObject($join, 'TripRelatedByFromCityId');
        }

        return $this;
    }

    /**
     * Use the TripRelatedByFromCityId relation Trip object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TripQuery A secondary query class using the current class as primary query
     */
    public function useTripRelatedByFromCityIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTripRelatedByFromCityId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TripRelatedByFromCityId', '\TripQuery');
    }

    /**
     * Filter the query by a related \Trip object
     *
     * @param \Trip|ObjectCollection $trip  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCityQuery The current query, for fluid interface
     */
    public function filterByTripRelatedByToCityId($trip, $comparison = null)
    {
        if ($trip instanceof \Trip) {
            return $this
                ->addUsingAlias(CityTableMap::COL_CITY_ID, $trip->getToCityId(), $comparison);
        } elseif ($trip instanceof ObjectCollection) {
            return $this
                ->useTripRelatedByToCityIdQuery()
                ->filterByPrimaryKeys($trip->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTripRelatedByToCityId() only accepts arguments of type \Trip or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TripRelatedByToCityId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCityQuery The current query, for fluid interface
     */
    public function joinTripRelatedByToCityId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TripRelatedByToCityId');

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
            $this->addJoinObject($join, 'TripRelatedByToCityId');
        }

        return $this;
    }

    /**
     * Use the TripRelatedByToCityId relation Trip object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TripQuery A secondary query class using the current class as primary query
     */
    public function useTripRelatedByToCityIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTripRelatedByToCityId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TripRelatedByToCityId', '\TripQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCity $city Object to remove from the list of results
     *
     * @return $this|ChildCityQuery The current query, for fluid interface
     */
    public function prune($city = null)
    {
        if ($city) {
            $this->addUsingAlias(CityTableMap::COL_CITY_ID, $city->getCityId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the city table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CityTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CityTableMap::clearInstancePool();
            CityTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CityTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CityTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CityTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CityTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CityQuery
