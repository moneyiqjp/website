<?php

namespace Base;

use \PaymentTypeHistory as ChildPaymentTypeHistory;
use \PaymentTypeHistoryQuery as ChildPaymentTypeHistoryQuery;
use \Exception;
use \PDO;
use Map\PaymentTypeHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'payment_type_history' table.
 *
 * 
 *
 * @method     ChildPaymentTypeHistoryQuery orderByPaymentTypeId($order = Criteria::ASC) Order by the payment_type_id column
 * @method     ChildPaymentTypeHistoryQuery orderByPaymentType($order = Criteria::ASC) Order by the payment_type column
 * @method     ChildPaymentTypeHistoryQuery orderByPaymentDescription($order = Criteria::ASC) Order by the payment_description column
 * @method     ChildPaymentTypeHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildPaymentTypeHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildPaymentTypeHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildPaymentTypeHistoryQuery groupByPaymentTypeId() Group by the payment_type_id column
 * @method     ChildPaymentTypeHistoryQuery groupByPaymentType() Group by the payment_type column
 * @method     ChildPaymentTypeHistoryQuery groupByPaymentDescription() Group by the payment_description column
 * @method     ChildPaymentTypeHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildPaymentTypeHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildPaymentTypeHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildPaymentTypeHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPaymentTypeHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPaymentTypeHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPaymentTypeHistory findOne(ConnectionInterface $con = null) Return the first ChildPaymentTypeHistory matching the query
 * @method     ChildPaymentTypeHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPaymentTypeHistory matching the query, or a new ChildPaymentTypeHistory object populated from the query conditions when no match is found
 *
 * @method     ChildPaymentTypeHistory findOneByPaymentTypeId(int $payment_type_id) Return the first ChildPaymentTypeHistory filtered by the payment_type_id column
 * @method     ChildPaymentTypeHistory findOneByPaymentType(string $payment_type) Return the first ChildPaymentTypeHistory filtered by the payment_type column
 * @method     ChildPaymentTypeHistory findOneByPaymentDescription(string $payment_description) Return the first ChildPaymentTypeHistory filtered by the payment_description column
 * @method     ChildPaymentTypeHistory findOneByTimeBeg(string $time_beg) Return the first ChildPaymentTypeHistory filtered by the time_beg column
 * @method     ChildPaymentTypeHistory findOneByTimeEnd(string $time_end) Return the first ChildPaymentTypeHistory filtered by the time_end column
 * @method     ChildPaymentTypeHistory findOneByUpdateUser(string $update_user) Return the first ChildPaymentTypeHistory filtered by the update_user column
 *
 * @method     ChildPaymentTypeHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPaymentTypeHistory objects based on current ModelCriteria
 * @method     ChildPaymentTypeHistory[]|ObjectCollection findByPaymentTypeId(int $payment_type_id) Return ChildPaymentTypeHistory objects filtered by the payment_type_id column
 * @method     ChildPaymentTypeHistory[]|ObjectCollection findByPaymentType(string $payment_type) Return ChildPaymentTypeHistory objects filtered by the payment_type column
 * @method     ChildPaymentTypeHistory[]|ObjectCollection findByPaymentDescription(string $payment_description) Return ChildPaymentTypeHistory objects filtered by the payment_description column
 * @method     ChildPaymentTypeHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildPaymentTypeHistory objects filtered by the time_beg column
 * @method     ChildPaymentTypeHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildPaymentTypeHistory objects filtered by the time_end column
 * @method     ChildPaymentTypeHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildPaymentTypeHistory objects filtered by the update_user column
 * @method     ChildPaymentTypeHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PaymentTypeHistoryQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\PaymentTypeHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PaymentTypeHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPaymentTypeHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPaymentTypeHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPaymentTypeHistoryQuery) {
            return $criteria;
        }
        $query = new ChildPaymentTypeHistoryQuery();
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
     * @param array[$payment_type_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPaymentTypeHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PaymentTypeHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PaymentTypeHistoryTableMap::DATABASE_NAME);
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
     * @return ChildPaymentTypeHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT payment_type_id, payment_type, payment_description, time_beg, time_end, update_user FROM payment_type_history WHERE payment_type_id = :p0 AND time_beg = :p1';
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
            /** @var ChildPaymentTypeHistory $obj */
            $obj = new ChildPaymentTypeHistory();
            $obj->hydrate($row);
            PaymentTypeHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildPaymentTypeHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPaymentTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_PAYMENT_TYPE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPaymentTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PaymentTypeHistoryTableMap::COL_PAYMENT_TYPE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PaymentTypeHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the payment_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentTypeId(1234); // WHERE payment_type_id = 1234
     * $query->filterByPaymentTypeId(array(12, 34)); // WHERE payment_type_id IN (12, 34)
     * $query->filterByPaymentTypeId(array('min' => 12)); // WHERE payment_type_id > 12
     * </code>
     *
     * @param     mixed $paymentTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByPaymentTypeId($paymentTypeId = null, $comparison = null)
    {
        if (is_array($paymentTypeId)) {
            $useMinMax = false;
            if (isset($paymentTypeId['min'])) {
                $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentTypeId['max'])) {
                $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId, $comparison);
    }

    /**
     * Filter the query on the payment_type column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentType('fooValue');   // WHERE payment_type = 'fooValue'
     * $query->filterByPaymentType('%fooValue%'); // WHERE payment_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByPaymentType($paymentType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paymentType)) {
                $paymentType = str_replace('*', '%', $paymentType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_PAYMENT_TYPE, $paymentType, $comparison);
    }

    /**
     * Filter the query on the payment_description column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentDescription('fooValue');   // WHERE payment_description = 'fooValue'
     * $query->filterByPaymentDescription('%fooValue%'); // WHERE payment_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByPaymentDescription($paymentDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paymentDescription)) {
                $paymentDescription = str_replace('*', '%', $paymentDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_PAYMENT_DESCRIPTION, $paymentDescription, $comparison);
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
     * @return $this|ChildPaymentTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildPaymentTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildPaymentTypeHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentTypeHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPaymentTypeHistory $paymentTypeHistory Object to remove from the list of results
     *
     * @return $this|ChildPaymentTypeHistoryQuery The current query, for fluid interface
     */
    public function prune($paymentTypeHistory = null)
    {
        if ($paymentTypeHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PaymentTypeHistoryTableMap::COL_PAYMENT_TYPE_ID), $paymentTypeHistory->getPaymentTypeId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PaymentTypeHistoryTableMap::COL_TIME_BEG), $paymentTypeHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the payment_type_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTypeHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PaymentTypeHistoryTableMap::clearInstancePool();
            PaymentTypeHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTypeHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PaymentTypeHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            PaymentTypeHistoryTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            PaymentTypeHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PaymentTypeHistoryQuery
