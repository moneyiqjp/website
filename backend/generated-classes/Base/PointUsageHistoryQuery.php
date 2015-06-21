<?php

namespace Base;

use \PointUsageHistory as ChildPointUsageHistory;
use \PointUsageHistoryQuery as ChildPointUsageHistoryQuery;
use \Exception;
use \PDO;
use Map\PointUsageHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'point_usage_history' table.
 *
 *
 *
 * @method     ChildPointUsageHistoryQuery orderByPointUsageId($order = Criteria::ASC) Order by the point_usage_id column
 * @method     ChildPointUsageHistoryQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildPointUsageHistoryQuery orderByYenPerPoint($order = Criteria::ASC) Order by the yen_per_point column
 * @method     ChildPointUsageHistoryQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildPointUsageHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildPointUsageHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildPointUsageHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildPointUsageHistoryQuery groupByPointUsageId() Group by the point_usage_id column
 * @method     ChildPointUsageHistoryQuery groupByStoreId() Group by the store_id column
 * @method     ChildPointUsageHistoryQuery groupByYenPerPoint() Group by the yen_per_point column
 * @method     ChildPointUsageHistoryQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildPointUsageHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildPointUsageHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildPointUsageHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildPointUsageHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPointUsageHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPointUsageHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPointUsageHistory findOne(ConnectionInterface $con = null) Return the first ChildPointUsageHistory matching the query
 * @method     ChildPointUsageHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPointUsageHistory matching the query, or a new ChildPointUsageHistory object populated from the query conditions when no match is found
 *
 * @method     ChildPointUsageHistory findOneByPointUsageId(int $point_usage_id) Return the first ChildPointUsageHistory filtered by the point_usage_id column
 * @method     ChildPointUsageHistory findOneByStoreId(int $store_id) Return the first ChildPointUsageHistory filtered by the store_id column
 * @method     ChildPointUsageHistory findOneByYenPerPoint(string $yen_per_point) Return the first ChildPointUsageHistory filtered by the yen_per_point column
 * @method     ChildPointUsageHistory findOneByCreditCardId(int $credit_card_id) Return the first ChildPointUsageHistory filtered by the credit_card_id column
 * @method     ChildPointUsageHistory findOneByTimeBeg(string $time_beg) Return the first ChildPointUsageHistory filtered by the time_beg column
 * @method     ChildPointUsageHistory findOneByTimeEnd(string $time_end) Return the first ChildPointUsageHistory filtered by the time_end column
 * @method     ChildPointUsageHistory findOneByUpdateUser(string $update_user) Return the first ChildPointUsageHistory filtered by the update_user column
 *
 * @method     ChildPointUsageHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPointUsageHistory objects based on current ModelCriteria
 * @method     ChildPointUsageHistory[]|ObjectCollection findByPointUsageId(int $point_usage_id) Return ChildPointUsageHistory objects filtered by the point_usage_id column
 * @method     ChildPointUsageHistory[]|ObjectCollection findByStoreId(int $store_id) Return ChildPointUsageHistory objects filtered by the store_id column
 * @method     ChildPointUsageHistory[]|ObjectCollection findByYenPerPoint(string $yen_per_point) Return ChildPointUsageHistory objects filtered by the yen_per_point column
 * @method     ChildPointUsageHistory[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildPointUsageHistory objects filtered by the credit_card_id column
 * @method     ChildPointUsageHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildPointUsageHistory objects filtered by the time_beg column
 * @method     ChildPointUsageHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildPointUsageHistory objects filtered by the time_end column
 * @method     ChildPointUsageHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildPointUsageHistory objects filtered by the update_user column
 * @method     ChildPointUsageHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PointUsageHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\PointUsageHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PointUsageHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPointUsageHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPointUsageHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPointUsageHistoryQuery) {
            return $criteria;
        }
        $query = new ChildPointUsageHistoryQuery();
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
     * @param array[$point_usage_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPointUsageHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PointUsageHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PointUsageHistoryTableMap::DATABASE_NAME);
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
     * @return ChildPointUsageHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT point_usage_id, store_id, yen_per_point, credit_card_id, time_beg, time_end, update_user FROM point_usage_history WHERE point_usage_id = :p0 AND time_beg = :p1';
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
            /** @var ChildPointUsageHistory $obj */
            $obj = new ChildPointUsageHistory();
            $obj->hydrate($row);
            PointUsageHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildPointUsageHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PointUsageHistoryTableMap::COL_POINT_USAGE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PointUsageHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PointUsageHistoryTableMap::COL_POINT_USAGE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PointUsageHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the point_usage_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPointUsageId(1234); // WHERE point_usage_id = 1234
     * $query->filterByPointUsageId(array(12, 34)); // WHERE point_usage_id IN (12, 34)
     * $query->filterByPointUsageId(array('min' => 12)); // WHERE point_usage_id > 12
     * </code>
     *
     * @param     mixed $pointUsageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
     */
    public function filterByPointUsageId($pointUsageId = null, $comparison = null)
    {
        if (is_array($pointUsageId)) {
            $useMinMax = false;
            if (isset($pointUsageId['min'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_POINT_USAGE_ID, $pointUsageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointUsageId['max'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_POINT_USAGE_ID, $pointUsageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointUsageHistoryTableMap::COL_POINT_USAGE_ID, $pointUsageId, $comparison);
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
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointUsageHistoryTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Filter the query on the yen_per_point column
     *
     * Example usage:
     * <code>
     * $query->filterByYenPerPoint(1234); // WHERE yen_per_point = 1234
     * $query->filterByYenPerPoint(array(12, 34)); // WHERE yen_per_point IN (12, 34)
     * $query->filterByYenPerPoint(array('min' => 12)); // WHERE yen_per_point > 12
     * </code>
     *
     * @param     mixed $yenPerPoint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
     */
    public function filterByYenPerPoint($yenPerPoint = null, $comparison = null)
    {
        if (is_array($yenPerPoint)) {
            $useMinMax = false;
            if (isset($yenPerPoint['min'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_YEN_PER_POINT, $yenPerPoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yenPerPoint['max'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_YEN_PER_POINT, $yenPerPoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointUsageHistoryTableMap::COL_YEN_PER_POINT, $yenPerPoint, $comparison);
    }

    /**
     * Filter the query on the credit_card_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreditCardId(1234); // WHERE credit_card_id = 1234
     * $query->filterByCreditCardId(array(12, 34)); // WHERE credit_card_id IN (12, 34)
     * $query->filterByCreditCardId(array('min' => 12)); // WHERE credit_card_id > 12
     * </code>
     *
     * @param     mixed $creditCardId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointUsageHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointUsageHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(PointUsageHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointUsageHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PointUsageHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPointUsageHistory $pointUsageHistory Object to remove from the list of results
     *
     * @return $this|ChildPointUsageHistoryQuery The current query, for fluid interface
     */
    public function prune($pointUsageHistory = null)
    {
        if ($pointUsageHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PointUsageHistoryTableMap::COL_POINT_USAGE_ID), $pointUsageHistory->getPointUsageId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PointUsageHistoryTableMap::COL_TIME_BEG), $pointUsageHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the point_usage_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PointUsageHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PointUsageHistoryTableMap::clearInstancePool();
            PointUsageHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PointUsageHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PointUsageHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PointUsageHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PointUsageHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PointUsageHistoryQuery
