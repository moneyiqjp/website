<?php

namespace Base;

use \StoreHistory as ChildStoreHistory;
use \StoreHistoryQuery as ChildStoreHistoryQuery;
use \Exception;
use \PDO;
use Map\StoreHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'store_history' table.
 *
 * 
 *
 * @method     ChildStoreHistoryQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildStoreHistoryQuery orderByStoreName($order = Criteria::ASC) Order by the store_name column
 * @method     ChildStoreHistoryQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     ChildStoreHistoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildStoreHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildStoreHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildStoreHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildStoreHistoryQuery groupByStoreId() Group by the store_id column
 * @method     ChildStoreHistoryQuery groupByStoreName() Group by the store_name column
 * @method     ChildStoreHistoryQuery groupByCategory() Group by the category column
 * @method     ChildStoreHistoryQuery groupByDescription() Group by the description column
 * @method     ChildStoreHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildStoreHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildStoreHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildStoreHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStoreHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStoreHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStoreHistory findOne(ConnectionInterface $con = null) Return the first ChildStoreHistory matching the query
 * @method     ChildStoreHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildStoreHistory matching the query, or a new ChildStoreHistory object populated from the query conditions when no match is found
 *
 * @method     ChildStoreHistory findOneByStoreId(int $store_id) Return the first ChildStoreHistory filtered by the store_id column
 * @method     ChildStoreHistory findOneByStoreName(string $store_name) Return the first ChildStoreHistory filtered by the store_name column
 * @method     ChildStoreHistory findOneByCategory(string $category) Return the first ChildStoreHistory filtered by the category column
 * @method     ChildStoreHistory findOneByDescription(string $description) Return the first ChildStoreHistory filtered by the description column
 * @method     ChildStoreHistory findOneByTimeBeg(string $time_beg) Return the first ChildStoreHistory filtered by the time_beg column
 * @method     ChildStoreHistory findOneByTimeEnd(string $time_end) Return the first ChildStoreHistory filtered by the time_end column
 * @method     ChildStoreHistory findOneByUpdateUser(string $update_user) Return the first ChildStoreHistory filtered by the update_user column
 *
 * @method     ChildStoreHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildStoreHistory objects based on current ModelCriteria
 * @method     ChildStoreHistory[]|ObjectCollection findByStoreId(int $store_id) Return ChildStoreHistory objects filtered by the store_id column
 * @method     ChildStoreHistory[]|ObjectCollection findByStoreName(string $store_name) Return ChildStoreHistory objects filtered by the store_name column
 * @method     ChildStoreHistory[]|ObjectCollection findByCategory(string $category) Return ChildStoreHistory objects filtered by the category column
 * @method     ChildStoreHistory[]|ObjectCollection findByDescription(string $description) Return ChildStoreHistory objects filtered by the description column
 * @method     ChildStoreHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildStoreHistory objects filtered by the time_beg column
 * @method     ChildStoreHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildStoreHistory objects filtered by the time_end column
 * @method     ChildStoreHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildStoreHistory objects filtered by the update_user column
 * @method     ChildStoreHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class StoreHistoryQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\StoreHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\StoreHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildStoreHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildStoreHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildStoreHistoryQuery) {
            return $criteria;
        }
        $query = new ChildStoreHistoryQuery();
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
     * @param array[$store_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildStoreHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StoreHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(StoreHistoryTableMap::DATABASE_NAME);
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
     * @return ChildStoreHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT store_id, store_name, category, description, time_beg, time_end, update_user FROM store_history WHERE store_id = :p0 AND time_beg = :p1';
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
            /** @var ChildStoreHistory $obj */
            $obj = new ChildStoreHistory();
            $obj->hydrate($row);
            StoreHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildStoreHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(StoreHistoryTableMap::COL_STORE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(StoreHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(StoreHistoryTableMap::COL_STORE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(StoreHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(StoreHistoryTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(StoreHistoryTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StoreHistoryTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Filter the query on the store_name column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreName('fooValue');   // WHERE store_name = 'fooValue'
     * $query->filterByStoreName('%fooValue%'); // WHERE store_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $storeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
     */
    public function filterByStoreName($storeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($storeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $storeName)) {
                $storeName = str_replace('*', '%', $storeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StoreHistoryTableMap::COL_STORE_NAME, $storeName, $comparison);
    }

    /**
     * Filter the query on the category column
     *
     * Example usage:
     * <code>
     * $query->filterByCategory('fooValue');   // WHERE category = 'fooValue'
     * $query->filterByCategory('%fooValue%'); // WHERE category LIKE '%fooValue%'
     * </code>
     *
     * @param     string $category The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
     */
    public function filterByCategory($category = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($category)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $category)) {
                $category = str_replace('*', '%', $category);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StoreHistoryTableMap::COL_CATEGORY, $category, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StoreHistoryTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(StoreHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(StoreHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StoreHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(StoreHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(StoreHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StoreHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(StoreHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildStoreHistory $storeHistory Object to remove from the list of results
     *
     * @return $this|ChildStoreHistoryQuery The current query, for fluid interface
     */
    public function prune($storeHistory = null)
    {
        if ($storeHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(StoreHistoryTableMap::COL_STORE_ID), $storeHistory->getStoreId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(StoreHistoryTableMap::COL_TIME_BEG), $storeHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the store_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StoreHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StoreHistoryTableMap::clearInstancePool();
            StoreHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(StoreHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(StoreHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            StoreHistoryTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            StoreHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // StoreHistoryQuery
