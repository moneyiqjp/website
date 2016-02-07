<?php

namespace Base;

use \Trip as ChildTrip;
use \TripQuery as ChildTripQuery;
use \Exception;
use \PDO;
use Map\TripTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'trip' table.
 *
 *
 *
 * @method     ChildTripQuery orderByTripId($order = Criteria::ASC) Order by the trip_id column
 * @method     ChildTripQuery orderByFromCityId($order = Criteria::ASC) Order by the from_city_id column
 * @method     ChildTripQuery orderByToCityId($order = Criteria::ASC) Order by the to_city_id column
 * @method     ChildTripQuery orderByDistance($order = Criteria::ASC) Order by the distance column
 * @method     ChildTripQuery orderByUnitId($order = Criteria::ASC) Order by the unit_id column
 * @method     ChildTripQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     ChildTripQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildTripQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildTripQuery groupByTripId() Group by the trip_id column
 * @method     ChildTripQuery groupByFromCityId() Group by the from_city_id column
 * @method     ChildTripQuery groupByToCityId() Group by the to_city_id column
 * @method     ChildTripQuery groupByDistance() Group by the distance column
 * @method     ChildTripQuery groupByUnitId() Group by the unit_id column
 * @method     ChildTripQuery groupByDisplay() Group by the display column
 * @method     ChildTripQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildTripQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildTripQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTripQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTripQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTripQuery leftJoinUnit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Unit relation
 * @method     ChildTripQuery rightJoinUnit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Unit relation
 * @method     ChildTripQuery innerJoinUnit($relationAlias = null) Adds a INNER JOIN clause to the query using the Unit relation
 *
 * @method     ChildTripQuery leftJoinCityRelatedByFromCityId($relationAlias = null) Adds a LEFT JOIN clause to the query using the CityRelatedByFromCityId relation
 * @method     ChildTripQuery rightJoinCityRelatedByFromCityId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CityRelatedByFromCityId relation
 * @method     ChildTripQuery innerJoinCityRelatedByFromCityId($relationAlias = null) Adds a INNER JOIN clause to the query using the CityRelatedByFromCityId relation
 *
 * @method     ChildTripQuery leftJoinCityRelatedByToCityId($relationAlias = null) Adds a LEFT JOIN clause to the query using the CityRelatedByToCityId relation
 * @method     ChildTripQuery rightJoinCityRelatedByToCityId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CityRelatedByToCityId relation
 * @method     ChildTripQuery innerJoinCityRelatedByToCityId($relationAlias = null) Adds a INNER JOIN clause to the query using the CityRelatedByToCityId relation
 *
 * @method     ChildTripQuery leftJoinMilage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Milage relation
 * @method     ChildTripQuery rightJoinMilage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Milage relation
 * @method     ChildTripQuery innerJoinMilage($relationAlias = null) Adds a INNER JOIN clause to the query using the Milage relation
 *
 * @method     \UnitQuery|\CityQuery|\MilageQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTrip findOne(ConnectionInterface $con = null) Return the first ChildTrip matching the query
 * @method     ChildTrip findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTrip matching the query, or a new ChildTrip object populated from the query conditions when no match is found
 *
 * @method     ChildTrip findOneByTripId(int $trip_id) Return the first ChildTrip filtered by the trip_id column
 * @method     ChildTrip findOneByFromCityId(int $from_city_id) Return the first ChildTrip filtered by the from_city_id column
 * @method     ChildTrip findOneByToCityId(int $to_city_id) Return the first ChildTrip filtered by the to_city_id column
 * @method     ChildTrip findOneByDistance(int $distance) Return the first ChildTrip filtered by the distance column
 * @method     ChildTrip findOneByUnitId(int $unit_id) Return the first ChildTrip filtered by the unit_id column
 * @method     ChildTrip findOneByDisplay(string $display) Return the first ChildTrip filtered by the display column
 * @method     ChildTrip findOneByUpdateTime(string $update_time) Return the first ChildTrip filtered by the update_time column
 * @method     ChildTrip findOneByUpdateUser(string $update_user) Return the first ChildTrip filtered by the update_user column
 *
 * @method     ChildTrip[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTrip objects based on current ModelCriteria
 * @method     ChildTrip[]|ObjectCollection findByTripId(int $trip_id) Return ChildTrip objects filtered by the trip_id column
 * @method     ChildTrip[]|ObjectCollection findByFromCityId(int $from_city_id) Return ChildTrip objects filtered by the from_city_id column
 * @method     ChildTrip[]|ObjectCollection findByToCityId(int $to_city_id) Return ChildTrip objects filtered by the to_city_id column
 * @method     ChildTrip[]|ObjectCollection findByDistance(int $distance) Return ChildTrip objects filtered by the distance column
 * @method     ChildTrip[]|ObjectCollection findByUnitId(int $unit_id) Return ChildTrip objects filtered by the unit_id column
 * @method     ChildTrip[]|ObjectCollection findByDisplay(string $display) Return ChildTrip objects filtered by the display column
 * @method     ChildTrip[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildTrip objects filtered by the update_time column
 * @method     ChildTrip[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildTrip objects filtered by the update_user column
 * @method     ChildTrip[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TripQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\TripQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Trip', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTripQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTripQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTripQuery) {
            return $criteria;
        }
        $query = new ChildTripQuery();
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
     * @return ChildTrip|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TripTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TripTableMap::DATABASE_NAME);
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
     * @return ChildTrip A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT trip_id, from_city_id, to_city_id, distance, unit_id, display, update_time, update_user FROM trip WHERE trip_id = :p0';
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
            /** @var ChildTrip $obj */
            $obj = new ChildTrip();
            $obj->hydrate($row);
            TripTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildTrip|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TripTableMap::COL_TRIP_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TripTableMap::COL_TRIP_ID, $keys, Criteria::IN);
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
     * @param     mixed $tripId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function filterByTripId($tripId = null, $comparison = null)
    {
        if (is_array($tripId)) {
            $useMinMax = false;
            if (isset($tripId['min'])) {
                $this->addUsingAlias(TripTableMap::COL_TRIP_ID, $tripId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tripId['max'])) {
                $this->addUsingAlias(TripTableMap::COL_TRIP_ID, $tripId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TripTableMap::COL_TRIP_ID, $tripId, $comparison);
    }

    /**
     * Filter the query on the from_city_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFromCityId(1234); // WHERE from_city_id = 1234
     * $query->filterByFromCityId(array(12, 34)); // WHERE from_city_id IN (12, 34)
     * $query->filterByFromCityId(array('min' => 12)); // WHERE from_city_id > 12
     * </code>
     *
     * @see       filterByCityRelatedByFromCityId()
     *
     * @param     mixed $fromCityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function filterByFromCityId($fromCityId = null, $comparison = null)
    {
        if (is_array($fromCityId)) {
            $useMinMax = false;
            if (isset($fromCityId['min'])) {
                $this->addUsingAlias(TripTableMap::COL_FROM_CITY_ID, $fromCityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fromCityId['max'])) {
                $this->addUsingAlias(TripTableMap::COL_FROM_CITY_ID, $fromCityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TripTableMap::COL_FROM_CITY_ID, $fromCityId, $comparison);
    }

    /**
     * Filter the query on the to_city_id column
     *
     * Example usage:
     * <code>
     * $query->filterByToCityId(1234); // WHERE to_city_id = 1234
     * $query->filterByToCityId(array(12, 34)); // WHERE to_city_id IN (12, 34)
     * $query->filterByToCityId(array('min' => 12)); // WHERE to_city_id > 12
     * </code>
     *
     * @see       filterByCityRelatedByToCityId()
     *
     * @param     mixed $toCityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function filterByToCityId($toCityId = null, $comparison = null)
    {
        if (is_array($toCityId)) {
            $useMinMax = false;
            if (isset($toCityId['min'])) {
                $this->addUsingAlias(TripTableMap::COL_TO_CITY_ID, $toCityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($toCityId['max'])) {
                $this->addUsingAlias(TripTableMap::COL_TO_CITY_ID, $toCityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TripTableMap::COL_TO_CITY_ID, $toCityId, $comparison);
    }

    /**
     * Filter the query on the distance column
     *
     * Example usage:
     * <code>
     * $query->filterByDistance(1234); // WHERE distance = 1234
     * $query->filterByDistance(array(12, 34)); // WHERE distance IN (12, 34)
     * $query->filterByDistance(array('min' => 12)); // WHERE distance > 12
     * </code>
     *
     * @param     mixed $distance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function filterByDistance($distance = null, $comparison = null)
    {
        if (is_array($distance)) {
            $useMinMax = false;
            if (isset($distance['min'])) {
                $this->addUsingAlias(TripTableMap::COL_DISTANCE, $distance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($distance['max'])) {
                $this->addUsingAlias(TripTableMap::COL_DISTANCE, $distance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TripTableMap::COL_DISTANCE, $distance, $comparison);
    }

    /**
     * Filter the query on the unit_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitId(1234); // WHERE unit_id = 1234
     * $query->filterByUnitId(array(12, 34)); // WHERE unit_id IN (12, 34)
     * $query->filterByUnitId(array('min' => 12)); // WHERE unit_id > 12
     * </code>
     *
     * @see       filterByUnit()
     *
     * @param     mixed $unitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function filterByUnitId($unitId = null, $comparison = null)
    {
        if (is_array($unitId)) {
            $useMinMax = false;
            if (isset($unitId['min'])) {
                $this->addUsingAlias(TripTableMap::COL_UNIT_ID, $unitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitId['max'])) {
                $this->addUsingAlias(TripTableMap::COL_UNIT_ID, $unitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TripTableMap::COL_UNIT_ID, $unitId, $comparison);
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
     * @return $this|ChildTripQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TripTableMap::COL_DISPLAY, $display, $comparison);
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
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(TripTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(TripTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TripTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildTripQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TripTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Unit object
     *
     * @param \Unit|ObjectCollection $unit The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTripQuery The current query, for fluid interface
     */
    public function filterByUnit($unit, $comparison = null)
    {
        if ($unit instanceof \Unit) {
            return $this
                ->addUsingAlias(TripTableMap::COL_UNIT_ID, $unit->getUnitId(), $comparison);
        } elseif ($unit instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TripTableMap::COL_UNIT_ID, $unit->toKeyValue('PrimaryKey', 'UnitId'), $comparison);
        } else {
            throw new PropelException('filterByUnit() only accepts arguments of type \Unit or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Unit relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function joinUnit($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Unit');

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
            $this->addJoinObject($join, 'Unit');
        }

        return $this;
    }

    /**
     * Use the Unit relation Unit object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UnitQuery A secondary query class using the current class as primary query
     */
    public function useUnitQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUnit($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Unit', '\UnitQuery');
    }

    /**
     * Filter the query by a related \City object
     *
     * @param \City|ObjectCollection $city The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTripQuery The current query, for fluid interface
     */
    public function filterByCityRelatedByFromCityId($city, $comparison = null)
    {
        if ($city instanceof \City) {
            return $this
                ->addUsingAlias(TripTableMap::COL_FROM_CITY_ID, $city->getCityId(), $comparison);
        } elseif ($city instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TripTableMap::COL_FROM_CITY_ID, $city->toKeyValue('PrimaryKey', 'CityId'), $comparison);
        } else {
            throw new PropelException('filterByCityRelatedByFromCityId() only accepts arguments of type \City or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CityRelatedByFromCityId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function joinCityRelatedByFromCityId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CityRelatedByFromCityId');

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
            $this->addJoinObject($join, 'CityRelatedByFromCityId');
        }

        return $this;
    }

    /**
     * Use the CityRelatedByFromCityId relation City object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CityQuery A secondary query class using the current class as primary query
     */
    public function useCityRelatedByFromCityIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCityRelatedByFromCityId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CityRelatedByFromCityId', '\CityQuery');
    }

    /**
     * Filter the query by a related \City object
     *
     * @param \City|ObjectCollection $city The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTripQuery The current query, for fluid interface
     */
    public function filterByCityRelatedByToCityId($city, $comparison = null)
    {
        if ($city instanceof \City) {
            return $this
                ->addUsingAlias(TripTableMap::COL_TO_CITY_ID, $city->getCityId(), $comparison);
        } elseif ($city instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TripTableMap::COL_TO_CITY_ID, $city->toKeyValue('PrimaryKey', 'CityId'), $comparison);
        } else {
            throw new PropelException('filterByCityRelatedByToCityId() only accepts arguments of type \City or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CityRelatedByToCityId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function joinCityRelatedByToCityId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CityRelatedByToCityId');

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
            $this->addJoinObject($join, 'CityRelatedByToCityId');
        }

        return $this;
    }

    /**
     * Use the CityRelatedByToCityId relation City object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CityQuery A secondary query class using the current class as primary query
     */
    public function useCityRelatedByToCityIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCityRelatedByToCityId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CityRelatedByToCityId', '\CityQuery');
    }

    /**
     * Filter the query by a related \Milage object
     *
     * @param \Milage|ObjectCollection $milage  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTripQuery The current query, for fluid interface
     */
    public function filterByMilage($milage, $comparison = null)
    {
        if ($milage instanceof \Milage) {
            return $this
                ->addUsingAlias(TripTableMap::COL_TRIP_ID, $milage->getTripId(), $comparison);
        } elseif ($milage instanceof ObjectCollection) {
            return $this
                ->useMilageQuery()
                ->filterByPrimaryKeys($milage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMilage() only accepts arguments of type \Milage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Milage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function joinMilage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Milage');

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
            $this->addJoinObject($join, 'Milage');
        }

        return $this;
    }

    /**
     * Use the Milage relation Milage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MilageQuery A secondary query class using the current class as primary query
     */
    public function useMilageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMilage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Milage', '\MilageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTrip $trip Object to remove from the list of results
     *
     * @return $this|ChildTripQuery The current query, for fluid interface
     */
    public function prune($trip = null)
    {
        if ($trip) {
            $this->addUsingAlias(TripTableMap::COL_TRIP_ID, $trip->getTripId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the trip table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TripTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TripTableMap::clearInstancePool();
            TripTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TripTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TripTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TripTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TripTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TripQuery
