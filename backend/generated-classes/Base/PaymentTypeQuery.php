<?php

namespace Base;

use \PaymentType as ChildPaymentType;
use \PaymentTypeQuery as ChildPaymentTypeQuery;
use \Exception;
use \PDO;
use Map\PaymentTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'payment_type' table.
 *
 *
 *
 * @method     ChildPaymentTypeQuery orderByPaymentTypeId($order = Criteria::ASC) Order by the payment_type_id column
 * @method     ChildPaymentTypeQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildPaymentTypeQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     ChildPaymentTypeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildPaymentTypeQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildPaymentTypeQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildPaymentTypeQuery groupByPaymentTypeId() Group by the payment_type_id column
 * @method     ChildPaymentTypeQuery groupByType() Group by the type column
 * @method     ChildPaymentTypeQuery groupByDisplay() Group by the display column
 * @method     ChildPaymentTypeQuery groupByDescription() Group by the description column
 * @method     ChildPaymentTypeQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildPaymentTypeQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildPaymentTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPaymentTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPaymentTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPaymentTypeQuery leftJoinInterest($relationAlias = null) Adds a LEFT JOIN clause to the query using the Interest relation
 * @method     ChildPaymentTypeQuery rightJoinInterest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Interest relation
 * @method     ChildPaymentTypeQuery innerJoinInterest($relationAlias = null) Adds a INNER JOIN clause to the query using the Interest relation
 *
 * @method     \InterestQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPaymentType findOne(ConnectionInterface $con = null) Return the first ChildPaymentType matching the query
 * @method     ChildPaymentType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPaymentType matching the query, or a new ChildPaymentType object populated from the query conditions when no match is found
 *
 * @method     ChildPaymentType findOneByPaymentTypeId(int $payment_type_id) Return the first ChildPaymentType filtered by the payment_type_id column
 * @method     ChildPaymentType findOneByType(string $type) Return the first ChildPaymentType filtered by the type column
 * @method     ChildPaymentType findOneByDisplay(string $display) Return the first ChildPaymentType filtered by the display column
 * @method     ChildPaymentType findOneByDescription(string $description) Return the first ChildPaymentType filtered by the description column
 * @method     ChildPaymentType findOneByUpdateTime(string $update_time) Return the first ChildPaymentType filtered by the update_time column
 * @method     ChildPaymentType findOneByUpdateUser(string $update_user) Return the first ChildPaymentType filtered by the update_user column
 *
 * @method     ChildPaymentType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPaymentType objects based on current ModelCriteria
 * @method     ChildPaymentType[]|ObjectCollection findByPaymentTypeId(int $payment_type_id) Return ChildPaymentType objects filtered by the payment_type_id column
 * @method     ChildPaymentType[]|ObjectCollection findByType(string $type) Return ChildPaymentType objects filtered by the type column
 * @method     ChildPaymentType[]|ObjectCollection findByDisplay(string $display) Return ChildPaymentType objects filtered by the display column
 * @method     ChildPaymentType[]|ObjectCollection findByDescription(string $description) Return ChildPaymentType objects filtered by the description column
 * @method     ChildPaymentType[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildPaymentType objects filtered by the update_time column
 * @method     ChildPaymentType[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildPaymentType objects filtered by the update_user column
 * @method     ChildPaymentType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PaymentTypeQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\PaymentTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PaymentType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPaymentTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPaymentTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPaymentTypeQuery) {
            return $criteria;
        }
        $query = new ChildPaymentTypeQuery();
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
     * @return ChildPaymentType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PaymentTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PaymentTypeTableMap::DATABASE_NAME);
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
     * @return ChildPaymentType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT payment_type_id, type, display, description, update_time, update_user FROM payment_type WHERE payment_type_id = :p0';
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
            /** @var ChildPaymentType $obj */
            $obj = new ChildPaymentType();
            $obj->hydrate($row);
            PaymentTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildPaymentType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PaymentTypeTableMap::COL_PAYMENT_TYPE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PaymentTypeTableMap::COL_PAYMENT_TYPE_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByPaymentTypeId($paymentTypeId = null, $comparison = null)
    {
        if (is_array($paymentTypeId)) {
            $useMinMax = false;
            if (isset($paymentTypeId['min'])) {
                $this->addUsingAlias(PaymentTypeTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentTypeId['max'])) {
                $this->addUsingAlias(PaymentTypeTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTypeTableMap::COL_PAYMENT_TYPE_ID, $paymentTypeId, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentTypeTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentTypeTableMap::COL_DISPLAY, $display, $comparison);
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
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentTypeTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(PaymentTypeTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(PaymentTypeTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTypeTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentTypeTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Interest object
     *
     * @param \Interest|ObjectCollection $interest  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByInterest($interest, $comparison = null)
    {
        if ($interest instanceof \Interest) {
            return $this
                ->addUsingAlias(PaymentTypeTableMap::COL_PAYMENT_TYPE_ID, $interest->getPaymentTypeId(), $comparison);
        } elseif ($interest instanceof ObjectCollection) {
            return $this
                ->useInterestQuery()
                ->filterByPrimaryKeys($interest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInterest() only accepts arguments of type \Interest or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Interest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
     */
    public function joinInterest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Interest');

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
            $this->addJoinObject($join, 'Interest');
        }

        return $this;
    }

    /**
     * Use the Interest relation Interest object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InterestQuery A secondary query class using the current class as primary query
     */
    public function useInterestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInterest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Interest', '\InterestQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPaymentType $paymentType Object to remove from the list of results
     *
     * @return $this|ChildPaymentTypeQuery The current query, for fluid interface
     */
    public function prune($paymentType = null)
    {
        if ($paymentType) {
            $this->addUsingAlias(PaymentTypeTableMap::COL_PAYMENT_TYPE_ID, $paymentType->getPaymentTypeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the payment_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PaymentTypeTableMap::clearInstancePool();
            PaymentTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PaymentTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PaymentTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PaymentTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PaymentTypeQuery
