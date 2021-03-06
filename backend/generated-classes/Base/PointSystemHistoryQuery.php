<?php

namespace Base;

use \PointSystemHistory as ChildPointSystemHistory;
use \PointSystemHistoryQuery as ChildPointSystemHistoryQuery;
use \Exception;
use \PDO;
use Map\PointSystemHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'point_system_history' table.
 *
 *
 *
 * @method     ChildPointSystemHistoryQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildPointSystemHistoryQuery orderByPointSystemName($order = Criteria::ASC) Order by the point_system_name column
 * @method     ChildPointSystemHistoryQuery orderByDefaultPointsPerYen($order = Criteria::ASC) Order by the default_points_per_yen column
 * @method     ChildPointSystemHistoryQuery orderByDefaultYenPerPoint($order = Criteria::ASC) Order by the default_yen_per_point column
 * @method     ChildPointSystemHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildPointSystemHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildPointSystemHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildPointSystemHistoryQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildPointSystemHistoryQuery groupByPointSystemName() Group by the point_system_name column
 * @method     ChildPointSystemHistoryQuery groupByDefaultPointsPerYen() Group by the default_points_per_yen column
 * @method     ChildPointSystemHistoryQuery groupByDefaultYenPerPoint() Group by the default_yen_per_point column
 * @method     ChildPointSystemHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildPointSystemHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildPointSystemHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildPointSystemHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPointSystemHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPointSystemHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPointSystemHistory findOne(ConnectionInterface $con = null) Return the first ChildPointSystemHistory matching the query
 * @method     ChildPointSystemHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPointSystemHistory matching the query, or a new ChildPointSystemHistory object populated from the query conditions when no match is found
 *
 * @method     ChildPointSystemHistory findOneByPointSystemId(int $point_system_id) Return the first ChildPointSystemHistory filtered by the point_system_id column
 * @method     ChildPointSystemHistory findOneByPointSystemName(string $point_system_name) Return the first ChildPointSystemHistory filtered by the point_system_name column
 * @method     ChildPointSystemHistory findOneByDefaultPointsPerYen(string $default_points_per_yen) Return the first ChildPointSystemHistory filtered by the default_points_per_yen column
 * @method     ChildPointSystemHistory findOneByDefaultYenPerPoint(string $default_yen_per_point) Return the first ChildPointSystemHistory filtered by the default_yen_per_point column
 * @method     ChildPointSystemHistory findOneByTimeBeg(string $time_beg) Return the first ChildPointSystemHistory filtered by the time_beg column
 * @method     ChildPointSystemHistory findOneByTimeEnd(string $time_end) Return the first ChildPointSystemHistory filtered by the time_end column
 * @method     ChildPointSystemHistory findOneByUpdateUser(string $update_user) Return the first ChildPointSystemHistory filtered by the update_user column
 *
 * @method     ChildPointSystemHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPointSystemHistory objects based on current ModelCriteria
 * @method     ChildPointSystemHistory[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildPointSystemHistory objects filtered by the point_system_id column
 * @method     ChildPointSystemHistory[]|ObjectCollection findByPointSystemName(string $point_system_name) Return ChildPointSystemHistory objects filtered by the point_system_name column
 * @method     ChildPointSystemHistory[]|ObjectCollection findByDefaultPointsPerYen(string $default_points_per_yen) Return ChildPointSystemHistory objects filtered by the default_points_per_yen column
 * @method     ChildPointSystemHistory[]|ObjectCollection findByDefaultYenPerPoint(string $default_yen_per_point) Return ChildPointSystemHistory objects filtered by the default_yen_per_point column
 * @method     ChildPointSystemHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildPointSystemHistory objects filtered by the time_beg column
 * @method     ChildPointSystemHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildPointSystemHistory objects filtered by the time_end column
 * @method     ChildPointSystemHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildPointSystemHistory objects filtered by the update_user column
 * @method     ChildPointSystemHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PointSystemHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\PointSystemHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PointSystemHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPointSystemHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPointSystemHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPointSystemHistoryQuery) {
            return $criteria;
        }
        $query = new ChildPointSystemHistoryQuery();
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
     * @param array[$point_system_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPointSystemHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PointSystemHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PointSystemHistoryTableMap::DATABASE_NAME);
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
     * @return ChildPointSystemHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT point_system_id, point_system_name, default_points_per_yen, default_yen_per_point, time_beg, time_end, update_user FROM point_system_history WHERE point_system_id = :p0 AND time_beg = :p1';
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
            /** @var ChildPointSystemHistory $obj */
            $obj = new ChildPointSystemHistory();
            $obj->hydrate($row);
            PointSystemHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildPointSystemHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PointSystemHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PointSystemHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
    }

    /**
     * Filter the query on the point_system_name column
     *
     * Example usage:
     * <code>
     * $query->filterByPointSystemName('fooValue');   // WHERE point_system_name = 'fooValue'
     * $query->filterByPointSystemName('%fooValue%'); // WHERE point_system_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pointSystemName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
     */
    public function filterByPointSystemName($pointSystemName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pointSystemName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pointSystemName)) {
                $pointSystemName = str_replace('*', '%', $pointSystemName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PointSystemHistoryTableMap::COL_POINT_SYSTEM_NAME, $pointSystemName, $comparison);
    }

    /**
     * Filter the query on the default_points_per_yen column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultPointsPerYen(1234); // WHERE default_points_per_yen = 1234
     * $query->filterByDefaultPointsPerYen(array(12, 34)); // WHERE default_points_per_yen IN (12, 34)
     * $query->filterByDefaultPointsPerYen(array('min' => 12)); // WHERE default_points_per_yen > 12
     * </code>
     *
     * @param     mixed $defaultPointsPerYen The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
     */
    public function filterByDefaultPointsPerYen($defaultPointsPerYen = null, $comparison = null)
    {
        if (is_array($defaultPointsPerYen)) {
            $useMinMax = false;
            if (isset($defaultPointsPerYen['min'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_DEFAULT_POINTS_PER_YEN, $defaultPointsPerYen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultPointsPerYen['max'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_DEFAULT_POINTS_PER_YEN, $defaultPointsPerYen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointSystemHistoryTableMap::COL_DEFAULT_POINTS_PER_YEN, $defaultPointsPerYen, $comparison);
    }

    /**
     * Filter the query on the default_yen_per_point column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultYenPerPoint(1234); // WHERE default_yen_per_point = 1234
     * $query->filterByDefaultYenPerPoint(array(12, 34)); // WHERE default_yen_per_point IN (12, 34)
     * $query->filterByDefaultYenPerPoint(array('min' => 12)); // WHERE default_yen_per_point > 12
     * </code>
     *
     * @param     mixed $defaultYenPerPoint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
     */
    public function filterByDefaultYenPerPoint($defaultYenPerPoint = null, $comparison = null)
    {
        if (is_array($defaultYenPerPoint)) {
            $useMinMax = false;
            if (isset($defaultYenPerPoint['min'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_DEFAULT_YEN_PER_POINT, $defaultYenPerPoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultYenPerPoint['max'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_DEFAULT_YEN_PER_POINT, $defaultYenPerPoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointSystemHistoryTableMap::COL_DEFAULT_YEN_PER_POINT, $defaultYenPerPoint, $comparison);
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
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointSystemHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(PointSystemHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointSystemHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PointSystemHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPointSystemHistory $pointSystemHistory Object to remove from the list of results
     *
     * @return $this|ChildPointSystemHistoryQuery The current query, for fluid interface
     */
    public function prune($pointSystemHistory = null)
    {
        if ($pointSystemHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PointSystemHistoryTableMap::COL_POINT_SYSTEM_ID), $pointSystemHistory->getPointSystemId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PointSystemHistoryTableMap::COL_TIME_BEG), $pointSystemHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the point_system_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PointSystemHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PointSystemHistoryTableMap::clearInstancePool();
            PointSystemHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PointSystemHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PointSystemHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PointSystemHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PointSystemHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PointSystemHistoryQuery
