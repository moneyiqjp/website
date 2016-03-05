<?php

namespace Base;

use \SeasonDate as ChildSeasonDate;
use \SeasonDateQuery as ChildSeasonDateQuery;
use \Exception;
use \PDO;
use Map\SeasonDateTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'season_date' table.
 *
 *
 *
 * @method     ChildSeasonDateQuery orderBySeasonDateId($order = Criteria::ASC) Order by the season_date_id column
 * @method     ChildSeasonDateQuery orderBySeasonId($order = Criteria::ASC) Order by the season_id column
 * @method     ChildSeasonDateQuery orderByZoneId($order = Criteria::ASC) Order by the zone_id column
 * @method     ChildSeasonDateQuery orderByFromDate($order = Criteria::ASC) Order by the from_date column
 * @method     ChildSeasonDateQuery orderByToDate($order = Criteria::ASC) Order by the to_date column
 * @method     ChildSeasonDateQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildSeasonDateQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildSeasonDateQuery groupBySeasonDateId() Group by the season_date_id column
 * @method     ChildSeasonDateQuery groupBySeasonId() Group by the season_id column
 * @method     ChildSeasonDateQuery groupByZoneId() Group by the zone_id column
 * @method     ChildSeasonDateQuery groupByFromDate() Group by the from_date column
 * @method     ChildSeasonDateQuery groupByToDate() Group by the to_date column
 * @method     ChildSeasonDateQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildSeasonDateQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildSeasonDateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSeasonDateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSeasonDateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSeasonDateQuery leftJoinZone($relationAlias = null) Adds a LEFT JOIN clause to the query using the Zone relation
 * @method     ChildSeasonDateQuery rightJoinZone($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Zone relation
 * @method     ChildSeasonDateQuery innerJoinZone($relationAlias = null) Adds a INNER JOIN clause to the query using the Zone relation
 *
 * @method     ChildSeasonDateQuery leftJoinSeason($relationAlias = null) Adds a LEFT JOIN clause to the query using the Season relation
 * @method     ChildSeasonDateQuery rightJoinSeason($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Season relation
 * @method     ChildSeasonDateQuery innerJoinSeason($relationAlias = null) Adds a INNER JOIN clause to the query using the Season relation
 *
 * @method     \ZoneQuery|\SeasonQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSeasonDate findOne(ConnectionInterface $con = null) Return the first ChildSeasonDate matching the query
 * @method     ChildSeasonDate findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSeasonDate matching the query, or a new ChildSeasonDate object populated from the query conditions when no match is found
 *
 * @method     ChildSeasonDate findOneBySeasonDateId(int $season_date_id) Return the first ChildSeasonDate filtered by the season_date_id column
 * @method     ChildSeasonDate findOneBySeasonId(int $season_id) Return the first ChildSeasonDate filtered by the season_id column
 * @method     ChildSeasonDate findOneByZoneId(int $zone_id) Return the first ChildSeasonDate filtered by the zone_id column
 * @method     ChildSeasonDate findOneByFromDate(string $from_date) Return the first ChildSeasonDate filtered by the from_date column
 * @method     ChildSeasonDate findOneByToDate(string $to_date) Return the first ChildSeasonDate filtered by the to_date column
 * @method     ChildSeasonDate findOneByUpdateTime(string $update_time) Return the first ChildSeasonDate filtered by the update_time column
 * @method     ChildSeasonDate findOneByUpdateUser(string $update_user) Return the first ChildSeasonDate filtered by the update_user column
 *
 * @method     ChildSeasonDate[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSeasonDate objects based on current ModelCriteria
 * @method     ChildSeasonDate[]|ObjectCollection findBySeasonDateId(int $season_date_id) Return ChildSeasonDate objects filtered by the season_date_id column
 * @method     ChildSeasonDate[]|ObjectCollection findBySeasonId(int $season_id) Return ChildSeasonDate objects filtered by the season_id column
 * @method     ChildSeasonDate[]|ObjectCollection findByZoneId(int $zone_id) Return ChildSeasonDate objects filtered by the zone_id column
 * @method     ChildSeasonDate[]|ObjectCollection findByFromDate(string $from_date) Return ChildSeasonDate objects filtered by the from_date column
 * @method     ChildSeasonDate[]|ObjectCollection findByToDate(string $to_date) Return ChildSeasonDate objects filtered by the to_date column
 * @method     ChildSeasonDate[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildSeasonDate objects filtered by the update_time column
 * @method     ChildSeasonDate[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildSeasonDate objects filtered by the update_user column
 * @method     ChildSeasonDate[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SeasonDateQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\SeasonDateQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\SeasonDate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSeasonDateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSeasonDateQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSeasonDateQuery) {
            return $criteria;
        }
        $query = new ChildSeasonDateQuery();
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
     * @return ChildSeasonDate|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SeasonDateTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SeasonDateTableMap::DATABASE_NAME);
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
     * @return ChildSeasonDate A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT season_date_id, season_id, zone_id, from_date, to_date, update_time, update_user FROM season_date WHERE season_date_id = :p0';
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
            /** @var ChildSeasonDate $obj */
            $obj = new ChildSeasonDate();
            $obj->hydrate($row);
            SeasonDateTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSeasonDate|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SeasonDateTableMap::COL_SEASON_DATE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SeasonDateTableMap::COL_SEASON_DATE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the season_date_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySeasonDateId(1234); // WHERE season_date_id = 1234
     * $query->filterBySeasonDateId(array(12, 34)); // WHERE season_date_id IN (12, 34)
     * $query->filterBySeasonDateId(array('min' => 12)); // WHERE season_date_id > 12
     * </code>
     *
     * @param     mixed $seasonDateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterBySeasonDateId($seasonDateId = null, $comparison = null)
    {
        if (is_array($seasonDateId)) {
            $useMinMax = false;
            if (isset($seasonDateId['min'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_SEASON_DATE_ID, $seasonDateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seasonDateId['max'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_SEASON_DATE_ID, $seasonDateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonDateTableMap::COL_SEASON_DATE_ID, $seasonDateId, $comparison);
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
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterBySeasonId($seasonId = null, $comparison = null)
    {
        if (is_array($seasonId)) {
            $useMinMax = false;
            if (isset($seasonId['min'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_SEASON_ID, $seasonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seasonId['max'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_SEASON_ID, $seasonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonDateTableMap::COL_SEASON_ID, $seasonId, $comparison);
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
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterByZoneId($zoneId = null, $comparison = null)
    {
        if (is_array($zoneId)) {
            $useMinMax = false;
            if (isset($zoneId['min'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_ZONE_ID, $zoneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($zoneId['max'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_ZONE_ID, $zoneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonDateTableMap::COL_ZONE_ID, $zoneId, $comparison);
    }

    /**
     * Filter the query on the from_date column
     *
     * Example usage:
     * <code>
     * $query->filterByFromDate('2011-03-14'); // WHERE from_date = '2011-03-14'
     * $query->filterByFromDate('now'); // WHERE from_date = '2011-03-14'
     * $query->filterByFromDate(array('max' => 'yesterday')); // WHERE from_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $fromDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterByFromDate($fromDate = null, $comparison = null)
    {
        if (is_array($fromDate)) {
            $useMinMax = false;
            if (isset($fromDate['min'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_FROM_DATE, $fromDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fromDate['max'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_FROM_DATE, $fromDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonDateTableMap::COL_FROM_DATE, $fromDate, $comparison);
    }

    /**
     * Filter the query on the to_date column
     *
     * Example usage:
     * <code>
     * $query->filterByToDate('2011-03-14'); // WHERE to_date = '2011-03-14'
     * $query->filterByToDate('now'); // WHERE to_date = '2011-03-14'
     * $query->filterByToDate(array('max' => 'yesterday')); // WHERE to_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $toDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterByToDate($toDate = null, $comparison = null)
    {
        if (is_array($toDate)) {
            $useMinMax = false;
            if (isset($toDate['min'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_TO_DATE, $toDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($toDate['max'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_TO_DATE, $toDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonDateTableMap::COL_TO_DATE, $toDate, $comparison);
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
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(SeasonDateTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonDateTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SeasonDateTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Zone object
     *
     * @param \Zone|ObjectCollection $zone The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterByZone($zone, $comparison = null)
    {
        if ($zone instanceof \Zone) {
            return $this
                ->addUsingAlias(SeasonDateTableMap::COL_ZONE_ID, $zone->getZoneId(), $comparison);
        } elseif ($zone instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SeasonDateTableMap::COL_ZONE_ID, $zone->toKeyValue('PrimaryKey', 'ZoneId'), $comparison);
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
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
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
     * Filter the query by a related \Season object
     *
     * @param \Season|ObjectCollection $season The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSeasonDateQuery The current query, for fluid interface
     */
    public function filterBySeason($season, $comparison = null)
    {
        if ($season instanceof \Season) {
            return $this
                ->addUsingAlias(SeasonDateTableMap::COL_SEASON_ID, $season->getSeasonId(), $comparison);
        } elseif ($season instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SeasonDateTableMap::COL_SEASON_ID, $season->toKeyValue('PrimaryKey', 'SeasonId'), $comparison);
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
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
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
     * @param   ChildSeasonDate $seasonDate Object to remove from the list of results
     *
     * @return $this|ChildSeasonDateQuery The current query, for fluid interface
     */
    public function prune($seasonDate = null)
    {
        if ($seasonDate) {
            $this->addUsingAlias(SeasonDateTableMap::COL_SEASON_DATE_ID, $seasonDate->getSeasonDateId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the season_date table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonDateTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SeasonDateTableMap::clearInstancePool();
            SeasonDateTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonDateTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SeasonDateTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SeasonDateTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SeasonDateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SeasonDateQuery
