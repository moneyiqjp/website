<?php

namespace Base;

use \FlightCost as ChildFlightCost;
use \FlightCostQuery as ChildFlightCostQuery;
use \Exception;
use \PDO;
use Map\FlightCostTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'flight_cost' table.
 *
 *
 *
 * @method     ChildFlightCostQuery orderByFlightCostId($order = Criteria::ASC) Order by the flight_cost_id column
 * @method     ChildFlightCostQuery orderByRetrievalDate($order = Criteria::ASC) Order by the retrieval_date column
 * @method     ChildFlightCostQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildFlightCostQuery orderByMileageTypeId($order = Criteria::ASC) Order by the mileage_type_id column
 * @method     ChildFlightCostQuery orderByTripId($order = Criteria::ASC) Order by the trip_id column
 * @method     ChildFlightCostQuery orderByFareType($order = Criteria::ASC) Order by the fare_type column
 * @method     ChildFlightCostQuery orderByDepartDate($order = Criteria::ASC) Order by the depart_date column
 * @method     ChildFlightCostQuery orderByDepartFlightNo($order = Criteria::ASC) Order by the depart_flight_no column
 * @method     ChildFlightCostQuery orderByReturnDate($order = Criteria::ASC) Order by the return_date column
 * @method     ChildFlightCostQuery orderByReturnFlightNo($order = Criteria::ASC) Order by the return_flight_no column
 * @method     ChildFlightCostQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildFlightCostQuery orderByReference($order = Criteria::ASC) Order by the reference column
 *
 * @method     ChildFlightCostQuery groupByFlightCostId() Group by the flight_cost_id column
 * @method     ChildFlightCostQuery groupByRetrievalDate() Group by the retrieval_date column
 * @method     ChildFlightCostQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildFlightCostQuery groupByMileageTypeId() Group by the mileage_type_id column
 * @method     ChildFlightCostQuery groupByTripId() Group by the trip_id column
 * @method     ChildFlightCostQuery groupByFareType() Group by the fare_type column
 * @method     ChildFlightCostQuery groupByDepartDate() Group by the depart_date column
 * @method     ChildFlightCostQuery groupByDepartFlightNo() Group by the depart_flight_no column
 * @method     ChildFlightCostQuery groupByReturnDate() Group by the return_date column
 * @method     ChildFlightCostQuery groupByReturnFlightNo() Group by the return_flight_no column
 * @method     ChildFlightCostQuery groupByPrice() Group by the price column
 * @method     ChildFlightCostQuery groupByReference() Group by the reference column
 *
 * @method     ChildFlightCostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFlightCostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFlightCostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFlightCostQuery leftJoinMileageType($relationAlias = null) Adds a LEFT JOIN clause to the query using the MileageType relation
 * @method     ChildFlightCostQuery rightJoinMileageType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MileageType relation
 * @method     ChildFlightCostQuery innerJoinMileageType($relationAlias = null) Adds a INNER JOIN clause to the query using the MileageType relation
 *
 * @method     ChildFlightCostQuery leftJoinTrip($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trip relation
 * @method     ChildFlightCostQuery rightJoinTrip($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trip relation
 * @method     ChildFlightCostQuery innerJoinTrip($relationAlias = null) Adds a INNER JOIN clause to the query using the Trip relation
 *
 * @method     ChildFlightCostQuery leftJoinPointSystem($relationAlias = null) Adds a LEFT JOIN clause to the query using the PointSystem relation
 * @method     ChildFlightCostQuery rightJoinPointSystem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PointSystem relation
 * @method     ChildFlightCostQuery innerJoinPointSystem($relationAlias = null) Adds a INNER JOIN clause to the query using the PointSystem relation
 *
 * @method     \MileageTypeQuery|\TripQuery|\PointSystemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFlightCost findOne(ConnectionInterface $con = null) Return the first ChildFlightCost matching the query
 * @method     ChildFlightCost findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFlightCost matching the query, or a new ChildFlightCost object populated from the query conditions when no match is found
 *
 * @method     ChildFlightCost findOneByFlightCostId(int $flight_cost_id) Return the first ChildFlightCost filtered by the flight_cost_id column
 * @method     ChildFlightCost findOneByRetrievalDate(string $retrieval_date) Return the first ChildFlightCost filtered by the retrieval_date column
 * @method     ChildFlightCost findOneByPointSystemId(int $point_system_id) Return the first ChildFlightCost filtered by the point_system_id column
 * @method     ChildFlightCost findOneByMileageTypeId(int $mileage_type_id) Return the first ChildFlightCost filtered by the mileage_type_id column
 * @method     ChildFlightCost findOneByTripId(int $trip_id) Return the first ChildFlightCost filtered by the trip_id column
 * @method     ChildFlightCost findOneByFareType(string $fare_type) Return the first ChildFlightCost filtered by the fare_type column
 * @method     ChildFlightCost findOneByDepartDate(string $depart_date) Return the first ChildFlightCost filtered by the depart_date column
 * @method     ChildFlightCost findOneByDepartFlightNo(string $depart_flight_no) Return the first ChildFlightCost filtered by the depart_flight_no column
 * @method     ChildFlightCost findOneByReturnDate(string $return_date) Return the first ChildFlightCost filtered by the return_date column
 * @method     ChildFlightCost findOneByReturnFlightNo(string $return_flight_no) Return the first ChildFlightCost filtered by the return_flight_no column
 * @method     ChildFlightCost findOneByPrice(int $price) Return the first ChildFlightCost filtered by the price column
 * @method     ChildFlightCost findOneByReference(string $reference) Return the first ChildFlightCost filtered by the reference column
 *
 * @method     ChildFlightCost[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFlightCost objects based on current ModelCriteria
 * @method     ChildFlightCost[]|ObjectCollection findByFlightCostId(int $flight_cost_id) Return ChildFlightCost objects filtered by the flight_cost_id column
 * @method     ChildFlightCost[]|ObjectCollection findByRetrievalDate(string $retrieval_date) Return ChildFlightCost objects filtered by the retrieval_date column
 * @method     ChildFlightCost[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildFlightCost objects filtered by the point_system_id column
 * @method     ChildFlightCost[]|ObjectCollection findByMileageTypeId(int $mileage_type_id) Return ChildFlightCost objects filtered by the mileage_type_id column
 * @method     ChildFlightCost[]|ObjectCollection findByTripId(int $trip_id) Return ChildFlightCost objects filtered by the trip_id column
 * @method     ChildFlightCost[]|ObjectCollection findByFareType(string $fare_type) Return ChildFlightCost objects filtered by the fare_type column
 * @method     ChildFlightCost[]|ObjectCollection findByDepartDate(string $depart_date) Return ChildFlightCost objects filtered by the depart_date column
 * @method     ChildFlightCost[]|ObjectCollection findByDepartFlightNo(string $depart_flight_no) Return ChildFlightCost objects filtered by the depart_flight_no column
 * @method     ChildFlightCost[]|ObjectCollection findByReturnDate(string $return_date) Return ChildFlightCost objects filtered by the return_date column
 * @method     ChildFlightCost[]|ObjectCollection findByReturnFlightNo(string $return_flight_no) Return ChildFlightCost objects filtered by the return_flight_no column
 * @method     ChildFlightCost[]|ObjectCollection findByPrice(int $price) Return ChildFlightCost objects filtered by the price column
 * @method     ChildFlightCost[]|ObjectCollection findByReference(string $reference) Return ChildFlightCost objects filtered by the reference column
 * @method     ChildFlightCost[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FlightCostQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\FlightCostQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\FlightCost', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFlightCostQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFlightCostQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFlightCostQuery) {
            return $criteria;
        }
        $query = new ChildFlightCostQuery();
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
     * @return ChildFlightCost|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FlightCostTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FlightCostTableMap::DATABASE_NAME);
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
     * @return ChildFlightCost A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT flight_cost_id, retrieval_date, point_system_id, mileage_type_id, trip_id, fare_type, depart_date, depart_flight_no, return_date, return_flight_no, price, reference FROM flight_cost WHERE flight_cost_id = :p0';
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
            /** @var ChildFlightCost $obj */
            $obj = new ChildFlightCost();
            $obj->hydrate($row);
            FlightCostTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildFlightCost|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FlightCostTableMap::COL_FLIGHT_COST_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FlightCostTableMap::COL_FLIGHT_COST_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the flight_cost_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFlightCostId(1234); // WHERE flight_cost_id = 1234
     * $query->filterByFlightCostId(array(12, 34)); // WHERE flight_cost_id IN (12, 34)
     * $query->filterByFlightCostId(array('min' => 12)); // WHERE flight_cost_id > 12
     * </code>
     *
     * @param     mixed $flightCostId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByFlightCostId($flightCostId = null, $comparison = null)
    {
        if (is_array($flightCostId)) {
            $useMinMax = false;
            if (isset($flightCostId['min'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_FLIGHT_COST_ID, $flightCostId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($flightCostId['max'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_FLIGHT_COST_ID, $flightCostId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_FLIGHT_COST_ID, $flightCostId, $comparison);
    }

    /**
     * Filter the query on the retrieval_date column
     *
     * Example usage:
     * <code>
     * $query->filterByRetrievalDate('2011-03-14'); // WHERE retrieval_date = '2011-03-14'
     * $query->filterByRetrievalDate('now'); // WHERE retrieval_date = '2011-03-14'
     * $query->filterByRetrievalDate(array('max' => 'yesterday')); // WHERE retrieval_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $retrievalDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByRetrievalDate($retrievalDate = null, $comparison = null)
    {
        if (is_array($retrievalDate)) {
            $useMinMax = false;
            if (isset($retrievalDate['min'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_RETRIEVAL_DATE, $retrievalDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($retrievalDate['max'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_RETRIEVAL_DATE, $retrievalDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_RETRIEVAL_DATE, $retrievalDate, $comparison);
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
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
    }

    /**
     * Filter the query on the mileage_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMileageTypeId(1234); // WHERE mileage_type_id = 1234
     * $query->filterByMileageTypeId(array(12, 34)); // WHERE mileage_type_id IN (12, 34)
     * $query->filterByMileageTypeId(array('min' => 12)); // WHERE mileage_type_id > 12
     * </code>
     *
     * @see       filterByMileageType()
     *
     * @param     mixed $mileageTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByMileageTypeId($mileageTypeId = null, $comparison = null)
    {
        if (is_array($mileageTypeId)) {
            $useMinMax = false;
            if (isset($mileageTypeId['min'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_MILEAGE_TYPE_ID, $mileageTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mileageTypeId['max'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_MILEAGE_TYPE_ID, $mileageTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_MILEAGE_TYPE_ID, $mileageTypeId, $comparison);
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
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByTripId($tripId = null, $comparison = null)
    {
        if (is_array($tripId)) {
            $useMinMax = false;
            if (isset($tripId['min'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_TRIP_ID, $tripId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tripId['max'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_TRIP_ID, $tripId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_TRIP_ID, $tripId, $comparison);
    }

    /**
     * Filter the query on the fare_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFareType('fooValue');   // WHERE fare_type = 'fooValue'
     * $query->filterByFareType('%fooValue%'); // WHERE fare_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fareType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByFareType($fareType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fareType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fareType)) {
                $fareType = str_replace('*', '%', $fareType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_FARE_TYPE, $fareType, $comparison);
    }

    /**
     * Filter the query on the depart_date column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartDate('2011-03-14'); // WHERE depart_date = '2011-03-14'
     * $query->filterByDepartDate('now'); // WHERE depart_date = '2011-03-14'
     * $query->filterByDepartDate(array('max' => 'yesterday')); // WHERE depart_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $departDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByDepartDate($departDate = null, $comparison = null)
    {
        if (is_array($departDate)) {
            $useMinMax = false;
            if (isset($departDate['min'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_DEPART_DATE, $departDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departDate['max'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_DEPART_DATE, $departDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_DEPART_DATE, $departDate, $comparison);
    }

    /**
     * Filter the query on the depart_flight_no column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartFlightNo('fooValue');   // WHERE depart_flight_no = 'fooValue'
     * $query->filterByDepartFlightNo('%fooValue%'); // WHERE depart_flight_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departFlightNo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByDepartFlightNo($departFlightNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departFlightNo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $departFlightNo)) {
                $departFlightNo = str_replace('*', '%', $departFlightNo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_DEPART_FLIGHT_NO, $departFlightNo, $comparison);
    }

    /**
     * Filter the query on the return_date column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnDate('2011-03-14'); // WHERE return_date = '2011-03-14'
     * $query->filterByReturnDate('now'); // WHERE return_date = '2011-03-14'
     * $query->filterByReturnDate(array('max' => 'yesterday')); // WHERE return_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $returnDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByReturnDate($returnDate = null, $comparison = null)
    {
        if (is_array($returnDate)) {
            $useMinMax = false;
            if (isset($returnDate['min'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_RETURN_DATE, $returnDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnDate['max'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_RETURN_DATE, $returnDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_RETURN_DATE, $returnDate, $comparison);
    }

    /**
     * Filter the query on the return_flight_no column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnFlightNo('fooValue');   // WHERE return_flight_no = 'fooValue'
     * $query->filterByReturnFlightNo('%fooValue%'); // WHERE return_flight_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $returnFlightNo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByReturnFlightNo($returnFlightNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($returnFlightNo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $returnFlightNo)) {
                $returnFlightNo = str_replace('*', '%', $returnFlightNo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_RETURN_FLIGHT_NO, $returnFlightNo, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(FlightCostTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the reference column
     *
     * Example usage:
     * <code>
     * $query->filterByReference('fooValue');   // WHERE reference = 'fooValue'
     * $query->filterByReference('%fooValue%'); // WHERE reference LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reference The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByReference($reference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reference)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reference)) {
                $reference = str_replace('*', '%', $reference);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FlightCostTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query by a related \MileageType object
     *
     * @param \MileageType|ObjectCollection $mileageType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByMileageType($mileageType, $comparison = null)
    {
        if ($mileageType instanceof \MileageType) {
            return $this
                ->addUsingAlias(FlightCostTableMap::COL_MILEAGE_TYPE_ID, $mileageType->getMileageTypeId(), $comparison);
        } elseif ($mileageType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FlightCostTableMap::COL_MILEAGE_TYPE_ID, $mileageType->toKeyValue('PrimaryKey', 'MileageTypeId'), $comparison);
        } else {
            throw new PropelException('filterByMileageType() only accepts arguments of type \MileageType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MileageType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function joinMileageType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MileageType');

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
            $this->addJoinObject($join, 'MileageType');
        }

        return $this;
    }

    /**
     * Use the MileageType relation MileageType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MileageTypeQuery A secondary query class using the current class as primary query
     */
    public function useMileageTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMileageType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MileageType', '\MileageTypeQuery');
    }

    /**
     * Filter the query by a related \Trip object
     *
     * @param \Trip|ObjectCollection $trip The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByTrip($trip, $comparison = null)
    {
        if ($trip instanceof \Trip) {
            return $this
                ->addUsingAlias(FlightCostTableMap::COL_TRIP_ID, $trip->getTripId(), $comparison);
        } elseif ($trip instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FlightCostTableMap::COL_TRIP_ID, $trip->toKeyValue('PrimaryKey', 'TripId'), $comparison);
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
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
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
     * Filter the query by a related \PointSystem object
     *
     * @param \PointSystem|ObjectCollection $pointSystem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFlightCostQuery The current query, for fluid interface
     */
    public function filterByPointSystem($pointSystem, $comparison = null)
    {
        if ($pointSystem instanceof \PointSystem) {
            return $this
                ->addUsingAlias(FlightCostTableMap::COL_POINT_SYSTEM_ID, $pointSystem->getPointSystemId(), $comparison);
        } elseif ($pointSystem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FlightCostTableMap::COL_POINT_SYSTEM_ID, $pointSystem->toKeyValue('PrimaryKey', 'PointSystemId'), $comparison);
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
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
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
     * @param   ChildFlightCost $flightCost Object to remove from the list of results
     *
     * @return $this|ChildFlightCostQuery The current query, for fluid interface
     */
    public function prune($flightCost = null)
    {
        if ($flightCost) {
            $this->addUsingAlias(FlightCostTableMap::COL_FLIGHT_COST_ID, $flightCost->getFlightCostId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the flight_cost table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FlightCostTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FlightCostTableMap::clearInstancePool();
            FlightCostTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FlightCostTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FlightCostTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FlightCostTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FlightCostTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FlightCostQuery
