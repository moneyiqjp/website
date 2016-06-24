<?php

namespace Base;

use \ZoneTripMap as ChildZoneTripMap;
use \ZoneTripMapQuery as ChildZoneTripMapQuery;
use \Exception;
use \PDO;
use Map\ZoneTripMapTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'zone_trip_map' table.
 *
 *
 *
 * @method     ChildZoneTripMapQuery orderByZoneId($order = Criteria::ASC) Order by the zone_id column
 * @method     ChildZoneTripMapQuery orderByTripId($order = Criteria::ASC) Order by the trip_id column
 * @method     ChildZoneTripMapQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildZoneTripMapQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildZoneTripMapQuery groupByZoneId() Group by the zone_id column
 * @method     ChildZoneTripMapQuery groupByTripId() Group by the trip_id column
 * @method     ChildZoneTripMapQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildZoneTripMapQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildZoneTripMapQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildZoneTripMapQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildZoneTripMapQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildZoneTripMapQuery leftJoinTrip($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trip relation
 * @method     ChildZoneTripMapQuery rightJoinTrip($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trip relation
 * @method     ChildZoneTripMapQuery innerJoinTrip($relationAlias = null) Adds a INNER JOIN clause to the query using the Trip relation
 *
 * @method     ChildZoneTripMapQuery leftJoinZone($relationAlias = null) Adds a LEFT JOIN clause to the query using the Zone relation
 * @method     ChildZoneTripMapQuery rightJoinZone($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Zone relation
 * @method     ChildZoneTripMapQuery innerJoinZone($relationAlias = null) Adds a INNER JOIN clause to the query using the Zone relation
 *
 * @method     \TripQuery|\ZoneQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildZoneTripMap findOne(ConnectionInterface $con = null) Return the first ChildZoneTripMap matching the query
 * @method     ChildZoneTripMap findOneOrCreate(ConnectionInterface $con = null) Return the first ChildZoneTripMap matching the query, or a new ChildZoneTripMap object populated from the query conditions when no match is found
 *
 * @method     ChildZoneTripMap findOneByZoneId(int $zone_id) Return the first ChildZoneTripMap filtered by the zone_id column
 * @method     ChildZoneTripMap findOneByTripId(int $trip_id) Return the first ChildZoneTripMap filtered by the trip_id column
 * @method     ChildZoneTripMap findOneByUpdateTime(string $update_time) Return the first ChildZoneTripMap filtered by the update_time column
 * @method     ChildZoneTripMap findOneByUpdateUser(string $update_user) Return the first ChildZoneTripMap filtered by the update_user column
 *
 * @method     ChildZoneTripMap[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildZoneTripMap objects based on current ModelCriteria
 * @method     ChildZoneTripMap[]|ObjectCollection findByZoneId(int $zone_id) Return ChildZoneTripMap objects filtered by the zone_id column
 * @method     ChildZoneTripMap[]|ObjectCollection findByTripId(int $trip_id) Return ChildZoneTripMap objects filtered by the trip_id column
 * @method     ChildZoneTripMap[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildZoneTripMap objects filtered by the update_time column
 * @method     ChildZoneTripMap[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildZoneTripMap objects filtered by the update_user column
 * @method     ChildZoneTripMap[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ZoneTripMapQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\ZoneTripMapQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ZoneTripMap', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildZoneTripMapQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildZoneTripMapQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildZoneTripMapQuery) {
            return $criteria;
        }
        $query = new ChildZoneTripMapQuery();
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
     * @param array[$zone_id, $trip_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildZoneTripMap|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ZoneTripMapTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ZoneTripMapTableMap::DATABASE_NAME);
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
     * @return ChildZoneTripMap A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT zone_id, trip_id, update_time, update_user FROM zone_trip_map WHERE zone_id = :p0 AND trip_id = :p1';
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
            /** @var ChildZoneTripMap $obj */
            $obj = new ChildZoneTripMap();
            $obj->hydrate($row);
            ZoneTripMapTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildZoneTripMap|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ZoneTripMapTableMap::COL_ZONE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ZoneTripMapTableMap::COL_TRIP_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ZoneTripMapTableMap::COL_ZONE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ZoneTripMapTableMap::COL_TRIP_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the zone_id column
     *
     * Example usage:
     * <code>
     * $query->filterByZoneId(1234); // WHERE zone_id = 1234
     * $query->filterByZoneId(array(12, 34)); // WHERE zone_id IN (12, 34)
     * $query->filterByZoneId(array('min' => 12)); // WHERE zone_id > 12
     * </code>
     *
     * @see       filterByZone()
     *
     * @param     mixed $zoneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function filterByZoneId($zoneId = null, $comparison = null)
    {
        if (is_array($zoneId)) {
            $useMinMax = false;
            if (isset($zoneId['min'])) {
                $this->addUsingAlias(ZoneTripMapTableMap::COL_ZONE_ID, $zoneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($zoneId['max'])) {
                $this->addUsingAlias(ZoneTripMapTableMap::COL_ZONE_ID, $zoneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ZoneTripMapTableMap::COL_ZONE_ID, $zoneId, $comparison);
    }

    /**
     * Filter the query on the trip_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTripId(1234); // WHERE trip_id = 1234
     * $query->filterByTripId(array(12, 34)); // WHERE trip_id IN (12, 34)
     * $query->filterByTripId(array('min' => 12)); // WHERE trip_id > 12
     * </code>
     *
     * @see       filterByTrip()
     *
     * @param     mixed $tripId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function filterByTripId($tripId = null, $comparison = null)
    {
        if (is_array($tripId)) {
            $useMinMax = false;
            if (isset($tripId['min'])) {
                $this->addUsingAlias(ZoneTripMapTableMap::COL_TRIP_ID, $tripId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tripId['max'])) {
                $this->addUsingAlias(ZoneTripMapTableMap::COL_TRIP_ID, $tripId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ZoneTripMapTableMap::COL_TRIP_ID, $tripId, $comparison);
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
     * @return $this|ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(ZoneTripMapTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(ZoneTripMapTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ZoneTripMapTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildZoneTripMapQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ZoneTripMapTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Trip object
     *
     * @param \Trip|ObjectCollection $trip The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function filterByTrip($trip, $comparison = null)
    {
        if ($trip instanceof \Trip) {
            return $this
                ->addUsingAlias(ZoneTripMapTableMap::COL_TRIP_ID, $trip->getTripId(), $comparison);
        } elseif ($trip instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ZoneTripMapTableMap::COL_TRIP_ID, $trip->toKeyValue('PrimaryKey', 'TripId'), $comparison);
        } else {
            throw new PropelException('filterByTrip() only accepts arguments of type \Trip or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trip relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function joinTrip($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trip');

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
            $this->addJoinObject($join, 'Trip');
        }

        return $this;
    }

    /**
     * Use the Trip relation Trip object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TripQuery A secondary query class using the current class as primary query
     */
    public function useTripQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrip($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trip', '\TripQuery');
    }

    /**
     * Filter the query by a related \Zone object
     *
     * @param \Zone|ObjectCollection $zone The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function filterByZone($zone, $comparison = null)
    {
        if ($zone instanceof \Zone) {
            return $this
                ->addUsingAlias(ZoneTripMapTableMap::COL_ZONE_ID, $zone->getZoneId(), $comparison);
        } elseif ($zone instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ZoneTripMapTableMap::COL_ZONE_ID, $zone->toKeyValue('PrimaryKey', 'ZoneId'), $comparison);
        } else {
            throw new PropelException('filterByZone() only accepts arguments of type \Zone or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Zone relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function joinZone($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Zone');

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
            $this->addJoinObject($join, 'Zone');
        }

        return $this;
    }

    /**
     * Use the Zone relation Zone object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ZoneQuery A secondary query class using the current class as primary query
     */
    public function useZoneQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinZone($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Zone', '\ZoneQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildZoneTripMap $zoneTripMap Object to remove from the list of results
     *
     * @return $this|ChildZoneTripMapQuery The current query, for fluid interface
     */
    public function prune($zoneTripMap = null)
    {
        if ($zoneTripMap) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ZoneTripMapTableMap::COL_ZONE_ID), $zoneTripMap->getZoneId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ZoneTripMapTableMap::COL_TRIP_ID), $zoneTripMap->getTripId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the zone_trip_map table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ZoneTripMapTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ZoneTripMapTableMap::clearInstancePool();
            ZoneTripMapTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ZoneTripMapTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ZoneTripMapTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ZoneTripMapTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ZoneTripMapTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ZoneTripMapQuery
