<?php

namespace Base;

use \Season as ChildSeason;
use \SeasonQuery as ChildSeasonQuery;
use \Exception;
use \PDO;
use Map\SeasonTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'season' table.
 *
 *
 *
 * @method     ChildSeasonQuery orderBySeasonId($order = Criteria::ASC) Order by the season_id column
 * @method     ChildSeasonQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildSeasonQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSeasonQuery orderBySeasonTypeId($order = Criteria::ASC) Order by the season_type_id column
 * @method     ChildSeasonQuery orderByFromDate($order = Criteria::ASC) Order by the from_date column
 * @method     ChildSeasonQuery orderByToDate($order = Criteria::ASC) Order by the to_date column
 * @method     ChildSeasonQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     ChildSeasonQuery orderByReference($order = Criteria::ASC) Order by the reference column
 * @method     ChildSeasonQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildSeasonQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildSeasonQuery groupBySeasonId() Group by the season_id column
 * @method     ChildSeasonQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildSeasonQuery groupByName() Group by the name column
 * @method     ChildSeasonQuery groupBySeasonTypeId() Group by the season_type_id column
 * @method     ChildSeasonQuery groupByFromDate() Group by the from_date column
 * @method     ChildSeasonQuery groupByToDate() Group by the to_date column
 * @method     ChildSeasonQuery groupByDisplay() Group by the display column
 * @method     ChildSeasonQuery groupByReference() Group by the reference column
 * @method     ChildSeasonQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildSeasonQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildSeasonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSeasonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSeasonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSeasonQuery leftJoinPointSystem($relationAlias = null) Adds a LEFT JOIN clause to the query using the PointSystem relation
 * @method     ChildSeasonQuery rightJoinPointSystem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PointSystem relation
 * @method     ChildSeasonQuery innerJoinPointSystem($relationAlias = null) Adds a INNER JOIN clause to the query using the PointSystem relation
 *
 * @method     ChildSeasonQuery leftJoinSeasonType($relationAlias = null) Adds a LEFT JOIN clause to the query using the SeasonType relation
 * @method     ChildSeasonQuery rightJoinSeasonType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SeasonType relation
 * @method     ChildSeasonQuery innerJoinSeasonType($relationAlias = null) Adds a INNER JOIN clause to the query using the SeasonType relation
 *
 * @method     ChildSeasonQuery leftJoinMileageType($relationAlias = null) Adds a LEFT JOIN clause to the query using the MileageType relation
 * @method     ChildSeasonQuery rightJoinMileageType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MileageType relation
 * @method     ChildSeasonQuery innerJoinMileageType($relationAlias = null) Adds a INNER JOIN clause to the query using the MileageType relation
 *
 * @method     \PointSystemQuery|\SeasonTypeQuery|\MileageTypeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSeason findOne(ConnectionInterface $con = null) Return the first ChildSeason matching the query
 * @method     ChildSeason findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSeason matching the query, or a new ChildSeason object populated from the query conditions when no match is found
 *
 * @method     ChildSeason findOneBySeasonId(int $season_id) Return the first ChildSeason filtered by the season_id column
 * @method     ChildSeason findOneByPointSystemId(int $point_system_id) Return the first ChildSeason filtered by the point_system_id column
 * @method     ChildSeason findOneByName(string $name) Return the first ChildSeason filtered by the name column
 * @method     ChildSeason findOneBySeasonTypeId(int $season_type_id) Return the first ChildSeason filtered by the season_type_id column
 * @method     ChildSeason findOneByFromDate(string $from_date) Return the first ChildSeason filtered by the from_date column
 * @method     ChildSeason findOneByToDate(string $to_date) Return the first ChildSeason filtered by the to_date column
 * @method     ChildSeason findOneByDisplay(string $display) Return the first ChildSeason filtered by the display column
 * @method     ChildSeason findOneByReference(string $reference) Return the first ChildSeason filtered by the reference column
 * @method     ChildSeason findOneByUpdateTime(string $update_time) Return the first ChildSeason filtered by the update_time column
 * @method     ChildSeason findOneByUpdateUser(string $update_user) Return the first ChildSeason filtered by the update_user column
 *
 * @method     ChildSeason[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSeason objects based on current ModelCriteria
 * @method     ChildSeason[]|ObjectCollection findBySeasonId(int $season_id) Return ChildSeason objects filtered by the season_id column
 * @method     ChildSeason[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildSeason objects filtered by the point_system_id column
 * @method     ChildSeason[]|ObjectCollection findByName(string $name) Return ChildSeason objects filtered by the name column
 * @method     ChildSeason[]|ObjectCollection findBySeasonTypeId(int $season_type_id) Return ChildSeason objects filtered by the season_type_id column
 * @method     ChildSeason[]|ObjectCollection findByFromDate(string $from_date) Return ChildSeason objects filtered by the from_date column
 * @method     ChildSeason[]|ObjectCollection findByToDate(string $to_date) Return ChildSeason objects filtered by the to_date column
 * @method     ChildSeason[]|ObjectCollection findByDisplay(string $display) Return ChildSeason objects filtered by the display column
 * @method     ChildSeason[]|ObjectCollection findByReference(string $reference) Return ChildSeason objects filtered by the reference column
 * @method     ChildSeason[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildSeason objects filtered by the update_time column
 * @method     ChildSeason[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildSeason objects filtered by the update_user column
 * @method     ChildSeason[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SeasonQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\SeasonQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Season', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSeasonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSeasonQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSeasonQuery) {
            return $criteria;
        }
        $query = new ChildSeasonQuery();
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
     * @return ChildSeason|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SeasonTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SeasonTableMap::DATABASE_NAME);
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
     * @return ChildSeason A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT season_id, point_system_id, name, season_type_id, from_date, to_date, display, reference, update_time, update_user FROM season WHERE season_id = :p0';
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
            /** @var ChildSeason $obj */
            $obj = new ChildSeason();
            $obj->hydrate($row);
            SeasonTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSeason|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SeasonTableMap::COL_SEASON_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SeasonTableMap::COL_SEASON_ID, $keys, Criteria::IN);
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
     * @param     mixed $seasonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function filterBySeasonId($seasonId = null, $comparison = null)
    {
        if (is_array($seasonId)) {
            $useMinMax = false;
            if (isset($seasonId['min'])) {
                $this->addUsingAlias(SeasonTableMap::COL_SEASON_ID, $seasonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seasonId['max'])) {
                $this->addUsingAlias(SeasonTableMap::COL_SEASON_ID, $seasonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonTableMap::COL_SEASON_ID, $seasonId, $comparison);
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(SeasonTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(SeasonTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SeasonTableMap::COL_NAME, $name, $comparison);
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
     * @see       filterBySeasonType()
     *
     * @param     mixed $seasonTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function filterBySeasonTypeId($seasonTypeId = null, $comparison = null)
    {
        if (is_array($seasonTypeId)) {
            $useMinMax = false;
            if (isset($seasonTypeId['min'])) {
                $this->addUsingAlias(SeasonTableMap::COL_SEASON_TYPE_ID, $seasonTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seasonTypeId['max'])) {
                $this->addUsingAlias(SeasonTableMap::COL_SEASON_TYPE_ID, $seasonTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonTableMap::COL_SEASON_TYPE_ID, $seasonTypeId, $comparison);
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function filterByFromDate($fromDate = null, $comparison = null)
    {
        if (is_array($fromDate)) {
            $useMinMax = false;
            if (isset($fromDate['min'])) {
                $this->addUsingAlias(SeasonTableMap::COL_FROM_DATE, $fromDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fromDate['max'])) {
                $this->addUsingAlias(SeasonTableMap::COL_FROM_DATE, $fromDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonTableMap::COL_FROM_DATE, $fromDate, $comparison);
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function filterByToDate($toDate = null, $comparison = null)
    {
        if (is_array($toDate)) {
            $useMinMax = false;
            if (isset($toDate['min'])) {
                $this->addUsingAlias(SeasonTableMap::COL_TO_DATE, $toDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($toDate['max'])) {
                $this->addUsingAlias(SeasonTableMap::COL_TO_DATE, $toDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonTableMap::COL_TO_DATE, $toDate, $comparison);
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SeasonTableMap::COL_DISPLAY, $display, $comparison);
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SeasonTableMap::COL_REFERENCE, $reference, $comparison);
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(SeasonTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(SeasonTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeasonTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SeasonTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \PointSystem object
     *
     * @param \PointSystem|ObjectCollection $pointSystem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSeasonQuery The current query, for fluid interface
     */
    public function filterByPointSystem($pointSystem, $comparison = null)
    {
        if ($pointSystem instanceof \PointSystem) {
            return $this
                ->addUsingAlias(SeasonTableMap::COL_POINT_SYSTEM_ID, $pointSystem->getPointSystemId(), $comparison);
        } elseif ($pointSystem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SeasonTableMap::COL_POINT_SYSTEM_ID, $pointSystem->toKeyValue('PrimaryKey', 'PointSystemId'), $comparison);
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
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
     * Filter the query by a related \SeasonType object
     *
     * @param \SeasonType|ObjectCollection $seasonType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSeasonQuery The current query, for fluid interface
     */
    public function filterBySeasonType($seasonType, $comparison = null)
    {
        if ($seasonType instanceof \SeasonType) {
            return $this
                ->addUsingAlias(SeasonTableMap::COL_SEASON_TYPE_ID, $seasonType->getSeasonTypeId(), $comparison);
        } elseif ($seasonType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SeasonTableMap::COL_SEASON_TYPE_ID, $seasonType->toKeyValue('PrimaryKey', 'SeasonTypeId'), $comparison);
        } else {
            throw new PropelException('filterBySeasonType() only accepts arguments of type \SeasonType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SeasonType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function joinSeasonType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SeasonType');

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
            $this->addJoinObject($join, 'SeasonType');
        }

        return $this;
    }

    /**
     * Use the SeasonType relation SeasonType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SeasonTypeQuery A secondary query class using the current class as primary query
     */
    public function useSeasonTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSeasonType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SeasonType', '\SeasonTypeQuery');
    }

    /**
     * Filter the query by a related \MileageType object
     *
     * @param \MileageType|ObjectCollection $mileageType  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSeasonQuery The current query, for fluid interface
     */
    public function filterByMileageType($mileageType, $comparison = null)
    {
        if ($mileageType instanceof \MileageType) {
            return $this
                ->addUsingAlias(SeasonTableMap::COL_SEASON_ID, $mileageType->getSeasonId(), $comparison);
        } elseif ($mileageType instanceof ObjectCollection) {
            return $this
                ->useMileageTypeQuery()
                ->filterByPrimaryKeys($mileageType->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildSeasonQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildSeason $season Object to remove from the list of results
     *
     * @return $this|ChildSeasonQuery The current query, for fluid interface
     */
    public function prune($season = null)
    {
        if ($season) {
            $this->addUsingAlias(SeasonTableMap::COL_SEASON_ID, $season->getSeasonId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the season table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SeasonTableMap::clearInstancePool();
            SeasonTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SeasonTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SeasonTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SeasonTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SeasonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SeasonQuery
