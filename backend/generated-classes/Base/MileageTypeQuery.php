<?php

namespace Base;

use \MileageType as ChildMileageType;
use \MileageTypeQuery as ChildMileageTypeQuery;
use \Exception;
use \PDO;
use Map\MileageTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'mileage_type' table.
 *
 *
 *
 * @method     ChildMileageTypeQuery orderByMileageTypeId($order = Criteria::ASC) Order by the mileage_type_id column
 * @method     ChildMileageTypeQuery orderByRoundTrip($order = Criteria::ASC) Order by the round_trip column
 * @method     ChildMileageTypeQuery orderBySeasonId($order = Criteria::ASC) Order by the season_id column
 * @method     ChildMileageTypeQuery orderByClass($order = Criteria::ASC) Order by the class column
 * @method     ChildMileageTypeQuery orderByTicketType($order = Criteria::ASC) Order by the ticket_type column
 * @method     ChildMileageTypeQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     ChildMileageTypeQuery orderByTripLength($order = Criteria::ASC) Order by the trip_length column
 * @method     ChildMileageTypeQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildMileageTypeQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildMileageTypeQuery groupByMileageTypeId() Group by the mileage_type_id column
 * @method     ChildMileageTypeQuery groupByRoundTrip() Group by the round_trip column
 * @method     ChildMileageTypeQuery groupBySeasonId() Group by the season_id column
 * @method     ChildMileageTypeQuery groupByClass() Group by the class column
 * @method     ChildMileageTypeQuery groupByTicketType() Group by the ticket_type column
 * @method     ChildMileageTypeQuery groupByDisplay() Group by the display column
 * @method     ChildMileageTypeQuery groupByTripLength() Group by the trip_length column
 * @method     ChildMileageTypeQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildMileageTypeQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildMileageTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMileageTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMileageTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMileageTypeQuery leftJoinSeason($relationAlias = null) Adds a LEFT JOIN clause to the query using the Season relation
 * @method     ChildMileageTypeQuery rightJoinSeason($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Season relation
 * @method     ChildMileageTypeQuery innerJoinSeason($relationAlias = null) Adds a INNER JOIN clause to the query using the Season relation
 *
 * @method     ChildMileageTypeQuery leftJoinFlightCost($relationAlias = null) Adds a LEFT JOIN clause to the query using the FlightCost relation
 * @method     ChildMileageTypeQuery rightJoinFlightCost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FlightCost relation
 * @method     ChildMileageTypeQuery innerJoinFlightCost($relationAlias = null) Adds a INNER JOIN clause to the query using the FlightCost relation
 *
 * @method     \SeasonQuery|\FlightCostQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMileageType findOne(ConnectionInterface $con = null) Return the first ChildMileageType matching the query
 * @method     ChildMileageType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMileageType matching the query, or a new ChildMileageType object populated from the query conditions when no match is found
 *
 * @method     ChildMileageType findOneByMileageTypeId(int $mileage_type_id) Return the first ChildMileageType filtered by the mileage_type_id column
 * @method     ChildMileageType findOneByRoundTrip(int $round_trip) Return the first ChildMileageType filtered by the round_trip column
 * @method     ChildMileageType findOneBySeasonId(int $season_id) Return the first ChildMileageType filtered by the season_id column
 * @method     ChildMileageType findOneByClass(string $class) Return the first ChildMileageType filtered by the class column
 * @method     ChildMileageType findOneByTicketType(string $ticket_type) Return the first ChildMileageType filtered by the ticket_type column
 * @method     ChildMileageType findOneByDisplay(string $display) Return the first ChildMileageType filtered by the display column
 * @method     ChildMileageType findOneByTripLength(int $trip_length) Return the first ChildMileageType filtered by the trip_length column
 * @method     ChildMileageType findOneByUpdateTime(string $update_time) Return the first ChildMileageType filtered by the update_time column
 * @method     ChildMileageType findOneByUpdateUser(string $update_user) Return the first ChildMileageType filtered by the update_user column
 *
 * @method     ChildMileageType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMileageType objects based on current ModelCriteria
 * @method     ChildMileageType[]|ObjectCollection findByMileageTypeId(int $mileage_type_id) Return ChildMileageType objects filtered by the mileage_type_id column
 * @method     ChildMileageType[]|ObjectCollection findByRoundTrip(int $round_trip) Return ChildMileageType objects filtered by the round_trip column
 * @method     ChildMileageType[]|ObjectCollection findBySeasonId(int $season_id) Return ChildMileageType objects filtered by the season_id column
 * @method     ChildMileageType[]|ObjectCollection findByClass(string $class) Return ChildMileageType objects filtered by the class column
 * @method     ChildMileageType[]|ObjectCollection findByTicketType(string $ticket_type) Return ChildMileageType objects filtered by the ticket_type column
 * @method     ChildMileageType[]|ObjectCollection findByDisplay(string $display) Return ChildMileageType objects filtered by the display column
 * @method     ChildMileageType[]|ObjectCollection findByTripLength(int $trip_length) Return ChildMileageType objects filtered by the trip_length column
 * @method     ChildMileageType[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildMileageType objects filtered by the update_time column
 * @method     ChildMileageType[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildMileageType objects filtered by the update_user column
 * @method     ChildMileageType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MileageTypeQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\MileageTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MileageType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMileageTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMileageTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMileageTypeQuery) {
            return $criteria;
        }
        $query = new ChildMileageTypeQuery();
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
     * @return ChildMileageType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MileageTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MileageTypeTableMap::DATABASE_NAME);
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
     * @return ChildMileageType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT mileage_type_id, round_trip, season_id, class, ticket_type, display, trip_length, update_time, update_user FROM mileage_type WHERE mileage_type_id = :p0';
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
            /** @var ChildMileageType $obj */
            $obj = new ChildMileageType();
            $obj->hydrate($row);
            MileageTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildMileageType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MileageTypeTableMap::COL_MILEAGE_TYPE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MileageTypeTableMap::COL_MILEAGE_TYPE_ID, $keys, Criteria::IN);
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
     * @param     mixed $mileageTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterByMileageTypeId($mileageTypeId = null, $comparison = null)
    {
        if (is_array($mileageTypeId)) {
            $useMinMax = false;
            if (isset($mileageTypeId['min'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_MILEAGE_TYPE_ID, $mileageTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mileageTypeId['max'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_MILEAGE_TYPE_ID, $mileageTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MileageTypeTableMap::COL_MILEAGE_TYPE_ID, $mileageTypeId, $comparison);
    }

    /**
     * Filter the query on the round_trip column
     *
     * Example usage:
     * <code>
     * $query->filterByRoundTrip(1234); // WHERE round_trip = 1234
     * $query->filterByRoundTrip(array(12, 34)); // WHERE round_trip IN (12, 34)
     * $query->filterByRoundTrip(array('min' => 12)); // WHERE round_trip > 12
     * </code>
     *
     * @param     mixed $roundTrip The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterByRoundTrip($roundTrip = null, $comparison = null)
    {
        if (is_array($roundTrip)) {
            $useMinMax = false;
            if (isset($roundTrip['min'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_ROUND_TRIP, $roundTrip['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roundTrip['max'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_ROUND_TRIP, $roundTrip['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MileageTypeTableMap::COL_ROUND_TRIP, $roundTrip, $comparison);
    }

    /**
     * Filter the query on the season_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySeasonId(1234); // WHERE season_id = 1234
     * $query->filterBySeasonId(array(12, 34)); // WHERE season_id IN (12, 34)
     * $query->filterBySeasonId(array('min' => 12)); // WHERE season_id > 12
     * </code>
     *
     * @see       filterBySeason()
     *
     * @param     mixed $seasonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterBySeasonId($seasonId = null, $comparison = null)
    {
        if (is_array($seasonId)) {
            $useMinMax = false;
            if (isset($seasonId['min'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_SEASON_ID, $seasonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seasonId['max'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_SEASON_ID, $seasonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MileageTypeTableMap::COL_SEASON_ID, $seasonId, $comparison);
    }

    /**
     * Filter the query on the class column
     *
     * Example usage:
     * <code>
     * $query->filterByClass('fooValue');   // WHERE class = 'fooValue'
     * $query->filterByClass('%fooValue%'); // WHERE class LIKE '%fooValue%'
     * </code>
     *
     * @param     string $class The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterByClass($class = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($class)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $class)) {
                $class = str_replace('*', '%', $class);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MileageTypeTableMap::COL_CLASS, $class, $comparison);
    }

    /**
     * Filter the query on the ticket_type column
     *
     * Example usage:
     * <code>
     * $query->filterByTicketType('fooValue');   // WHERE ticket_type = 'fooValue'
     * $query->filterByTicketType('%fooValue%'); // WHERE ticket_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ticketType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterByTicketType($ticketType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ticketType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ticketType)) {
                $ticketType = str_replace('*', '%', $ticketType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MileageTypeTableMap::COL_TICKET_TYPE, $ticketType, $comparison);
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
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MileageTypeTableMap::COL_DISPLAY, $display, $comparison);
    }

    /**
     * Filter the query on the trip_length column
     *
     * Example usage:
     * <code>
     * $query->filterByTripLength(1234); // WHERE trip_length = 1234
     * $query->filterByTripLength(array(12, 34)); // WHERE trip_length IN (12, 34)
     * $query->filterByTripLength(array('min' => 12)); // WHERE trip_length > 12
     * </code>
     *
     * @param     mixed $tripLength The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterByTripLength($tripLength = null, $comparison = null)
    {
        if (is_array($tripLength)) {
            $useMinMax = false;
            if (isset($tripLength['min'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_TRIP_LENGTH, $tripLength['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tripLength['max'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_TRIP_LENGTH, $tripLength['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MileageTypeTableMap::COL_TRIP_LENGTH, $tripLength, $comparison);
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
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(MileageTypeTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MileageTypeTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MileageTypeTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Season object
     *
     * @param \Season|ObjectCollection $season The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterBySeason($season, $comparison = null)
    {
        if ($season instanceof \Season) {
            return $this
                ->addUsingAlias(MileageTypeTableMap::COL_SEASON_ID, $season->getSeasonId(), $comparison);
        } elseif ($season instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MileageTypeTableMap::COL_SEASON_ID, $season->toKeyValue('PrimaryKey', 'SeasonId'), $comparison);
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
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
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
     * Filter the query by a related \FlightCost object
     *
     * @param \FlightCost|ObjectCollection $flightCost  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMileageTypeQuery The current query, for fluid interface
     */
    public function filterByFlightCost($flightCost, $comparison = null)
    {
        if ($flightCost instanceof \FlightCost) {
            return $this
                ->addUsingAlias(MileageTypeTableMap::COL_MILEAGE_TYPE_ID, $flightCost->getMileageTypeId(), $comparison);
        } elseif ($flightCost instanceof ObjectCollection) {
            return $this
                ->useFlightCostQuery()
                ->filterByPrimaryKeys($flightCost->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFlightCost() only accepts arguments of type \FlightCost or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FlightCost relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function joinFlightCost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FlightCost');

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
            $this->addJoinObject($join, 'FlightCost');
        }

        return $this;
    }

    /**
     * Use the FlightCost relation FlightCost object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FlightCostQuery A secondary query class using the current class as primary query
     */
    public function useFlightCostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFlightCost($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FlightCost', '\FlightCostQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMileageType $mileageType Object to remove from the list of results
     *
     * @return $this|ChildMileageTypeQuery The current query, for fluid interface
     */
    public function prune($mileageType = null)
    {
        if ($mileageType) {
            $this->addUsingAlias(MileageTypeTableMap::COL_MILEAGE_TYPE_ID, $mileageType->getMileageTypeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the mileage_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MileageTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MileageTypeTableMap::clearInstancePool();
            MileageTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MileageTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MileageTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MileageTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MileageTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MileageTypeQuery
