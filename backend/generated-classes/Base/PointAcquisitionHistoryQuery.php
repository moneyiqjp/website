<?php

namespace Base;

use \PointAcquisitionHistory as ChildPointAcquisitionHistory;
use \PointAcquisitionHistoryQuery as ChildPointAcquisitionHistoryQuery;
use \Exception;
use \PDO;
use Map\PointAcquisitionHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'point_acquisition_history' table.
 *
 *
 *
 * @method     ChildPointAcquisitionHistoryQuery orderByPointAcquisitionId($order = Criteria::ASC) Order by the point_acquisition_id column
 * @method     ChildPointAcquisitionHistoryQuery orderByPointAcquisitionName($order = Criteria::ASC) Order by the point_acquisition_name column
 * @method     ChildPointAcquisitionHistoryQuery orderByPointsPerYen($order = Criteria::ASC) Order by the points_per_yen column
 * @method     ChildPointAcquisitionHistoryQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildPointAcquisitionHistoryQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildPointAcquisitionHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildPointAcquisitionHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildPointAcquisitionHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildPointAcquisitionHistoryQuery groupByPointAcquisitionId() Group by the point_acquisition_id column
 * @method     ChildPointAcquisitionHistoryQuery groupByPointAcquisitionName() Group by the point_acquisition_name column
 * @method     ChildPointAcquisitionHistoryQuery groupByPointsPerYen() Group by the points_per_yen column
 * @method     ChildPointAcquisitionHistoryQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildPointAcquisitionHistoryQuery groupByStoreId() Group by the store_id column
 * @method     ChildPointAcquisitionHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildPointAcquisitionHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildPointAcquisitionHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildPointAcquisitionHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPointAcquisitionHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPointAcquisitionHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPointAcquisitionHistory findOne(ConnectionInterface $con = null) Return the first ChildPointAcquisitionHistory matching the query
 * @method     ChildPointAcquisitionHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPointAcquisitionHistory matching the query, or a new ChildPointAcquisitionHistory object populated from the query conditions when no match is found
 *
 * @method     ChildPointAcquisitionHistory findOneByPointAcquisitionId(int $point_acquisition_id) Return the first ChildPointAcquisitionHistory filtered by the point_acquisition_id column
 * @method     ChildPointAcquisitionHistory findOneByPointAcquisitionName(string $point_acquisition_name) Return the first ChildPointAcquisitionHistory filtered by the point_acquisition_name column
 * @method     ChildPointAcquisitionHistory findOneByPointsPerYen(double $points_per_yen) Return the first ChildPointAcquisitionHistory filtered by the points_per_yen column
 * @method     ChildPointAcquisitionHistory findOneByPointSystemId(int $point_system_id) Return the first ChildPointAcquisitionHistory filtered by the point_system_id column
 * @method     ChildPointAcquisitionHistory findOneByStoreId(int $store_id) Return the first ChildPointAcquisitionHistory filtered by the store_id column
 * @method     ChildPointAcquisitionHistory findOneByTimeBeg(string $time_beg) Return the first ChildPointAcquisitionHistory filtered by the time_beg column
 * @method     ChildPointAcquisitionHistory findOneByTimeEnd(string $time_end) Return the first ChildPointAcquisitionHistory filtered by the time_end column
 * @method     ChildPointAcquisitionHistory findOneByUpdateUser(string $update_user) Return the first ChildPointAcquisitionHistory filtered by the update_user column
 *
 * @method     ChildPointAcquisitionHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPointAcquisitionHistory objects based on current ModelCriteria
 * @method     ChildPointAcquisitionHistory[]|ObjectCollection findByPointAcquisitionId(int $point_acquisition_id) Return ChildPointAcquisitionHistory objects filtered by the point_acquisition_id column
 * @method     ChildPointAcquisitionHistory[]|ObjectCollection findByPointAcquisitionName(string $point_acquisition_name) Return ChildPointAcquisitionHistory objects filtered by the point_acquisition_name column
 * @method     ChildPointAcquisitionHistory[]|ObjectCollection findByPointsPerYen(double $points_per_yen) Return ChildPointAcquisitionHistory objects filtered by the points_per_yen column
 * @method     ChildPointAcquisitionHistory[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildPointAcquisitionHistory objects filtered by the point_system_id column
 * @method     ChildPointAcquisitionHistory[]|ObjectCollection findByStoreId(int $store_id) Return ChildPointAcquisitionHistory objects filtered by the store_id column
 * @method     ChildPointAcquisitionHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildPointAcquisitionHistory objects filtered by the time_beg column
 * @method     ChildPointAcquisitionHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildPointAcquisitionHistory objects filtered by the time_end column
 * @method     ChildPointAcquisitionHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildPointAcquisitionHistory objects filtered by the update_user column
 * @method     ChildPointAcquisitionHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PointAcquisitionHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\PointAcquisitionHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PointAcquisitionHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPointAcquisitionHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPointAcquisitionHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPointAcquisitionHistoryQuery) {
            return $criteria;
        }
        $query = new ChildPointAcquisitionHistoryQuery();
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
     * @param array[$point_acquisition_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPointAcquisitionHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PointAcquisitionHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PointAcquisitionHistoryTableMap::DATABASE_NAME);
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
     * @return ChildPointAcquisitionHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT point_acquisition_id, point_acquisition_name, points_per_yen, point_system_id, store_id, time_beg, time_end, update_user FROM point_acquisition_history WHERE point_acquisition_id = :p0 AND time_beg = :p1';
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
            /** @var ChildPointAcquisitionHistory $obj */
            $obj = new ChildPointAcquisitionHistory();
            $obj->hydrate($row);
            PointAcquisitionHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildPointAcquisitionHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINT_ACQUISITION_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PointAcquisitionHistoryTableMap::COL_POINT_ACQUISITION_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PointAcquisitionHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the point_acquisition_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPointAcquisitionId(1234); // WHERE point_acquisition_id = 1234
     * $query->filterByPointAcquisitionId(array(12, 34)); // WHERE point_acquisition_id IN (12, 34)
     * $query->filterByPointAcquisitionId(array('min' => 12)); // WHERE point_acquisition_id > 12
     * </code>
     *
     * @param     mixed $pointAcquisitionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function filterByPointAcquisitionId($pointAcquisitionId = null, $comparison = null)
    {
        if (is_array($pointAcquisitionId)) {
            $useMinMax = false;
            if (isset($pointAcquisitionId['min'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINT_ACQUISITION_ID, $pointAcquisitionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointAcquisitionId['max'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINT_ACQUISITION_ID, $pointAcquisitionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINT_ACQUISITION_ID, $pointAcquisitionId, $comparison);
    }

    /**
     * Filter the query on the point_acquisition_name column
     *
     * Example usage:
     * <code>
     * $query->filterByPointAcquisitionName('fooValue');   // WHERE point_acquisition_name = 'fooValue'
     * $query->filterByPointAcquisitionName('%fooValue%'); // WHERE point_acquisition_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pointAcquisitionName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function filterByPointAcquisitionName($pointAcquisitionName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pointAcquisitionName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pointAcquisitionName)) {
                $pointAcquisitionName = str_replace('*', '%', $pointAcquisitionName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINT_ACQUISITION_NAME, $pointAcquisitionName, $comparison);
    }

    /**
     * Filter the query on the points_per_yen column
     *
     * Example usage:
     * <code>
     * $query->filterByPointsPerYen(1234); // WHERE points_per_yen = 1234
     * $query->filterByPointsPerYen(array(12, 34)); // WHERE points_per_yen IN (12, 34)
     * $query->filterByPointsPerYen(array('min' => 12)); // WHERE points_per_yen > 12
     * </code>
     *
     * @param     mixed $pointsPerYen The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function filterByPointsPerYen($pointsPerYen = null, $comparison = null)
    {
        if (is_array($pointsPerYen)) {
            $useMinMax = false;
            if (isset($pointsPerYen['min'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINTS_PER_YEN, $pointsPerYen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointsPerYen['max'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINTS_PER_YEN, $pointsPerYen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINTS_PER_YEN, $pointsPerYen, $comparison);
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
     * @param     mixed $pointSystemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
    }

    /**
     * Filter the query on the store_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreId(1234); // WHERE store_id = 1234
     * $query->filterByStoreId(array(12, 34)); // WHERE store_id IN (12, 34)
     * $query->filterByStoreId(array('min' => 12)); // WHERE store_id > 12
     * </code>
     *
     * @param     mixed $storeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_STORE_ID, $storeId, $comparison);
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
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PointAcquisitionHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPointAcquisitionHistory $pointAcquisitionHistory Object to remove from the list of results
     *
     * @return $this|ChildPointAcquisitionHistoryQuery The current query, for fluid interface
     */
    public function prune($pointAcquisitionHistory = null)
    {
        if ($pointAcquisitionHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PointAcquisitionHistoryTableMap::COL_POINT_ACQUISITION_ID), $pointAcquisitionHistory->getPointAcquisitionId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PointAcquisitionHistoryTableMap::COL_TIME_BEG), $pointAcquisitionHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the point_acquisition_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PointAcquisitionHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PointAcquisitionHistoryTableMap::clearInstancePool();
            PointAcquisitionHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PointAcquisitionHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PointAcquisitionHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PointAcquisitionHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PointAcquisitionHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PointAcquisitionHistoryQuery
