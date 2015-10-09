<?php

namespace Base;

use \Issuer as ChildIssuer;
use \IssuerQuery as ChildIssuerQuery;
use \Exception;
use \PDO;
use Map\IssuerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'issuer' table.
 *
 * 
 *
 * @method     ChildIssuerQuery orderByIssuerId($order = Criteria::ASC) Order by the issuer_id column
 * @method     ChildIssuerQuery orderByIssuerName($order = Criteria::ASC) Order by the issuer_name column
 * @method     ChildIssuerQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildIssuerQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildIssuerQuery groupByIssuerId() Group by the issuer_id column
 * @method     ChildIssuerQuery groupByIssuerName() Group by the issuer_name column
 * @method     ChildIssuerQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildIssuerQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildIssuerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildIssuerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildIssuerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildIssuerQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildIssuerQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildIssuerQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     \CreditCardQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildIssuer findOne(ConnectionInterface $con = null) Return the first ChildIssuer matching the query
 * @method     ChildIssuer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIssuer matching the query, or a new ChildIssuer object populated from the query conditions when no match is found
 *
 * @method     ChildIssuer findOneByIssuerId(int $issuer_id) Return the first ChildIssuer filtered by the issuer_id column
 * @method     ChildIssuer findOneByIssuerName(string $issuer_name) Return the first ChildIssuer filtered by the issuer_name column
 * @method     ChildIssuer findOneByUpdateTime(string $update_time) Return the first ChildIssuer filtered by the update_time column
 * @method     ChildIssuer findOneByUpdateUser(string $update_user) Return the first ChildIssuer filtered by the update_user column
 *
 * @method     ChildIssuer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildIssuer objects based on current ModelCriteria
 * @method     ChildIssuer[]|ObjectCollection findByIssuerId(int $issuer_id) Return ChildIssuer objects filtered by the issuer_id column
 * @method     ChildIssuer[]|ObjectCollection findByIssuerName(string $issuer_name) Return ChildIssuer objects filtered by the issuer_name column
 * @method     ChildIssuer[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildIssuer objects filtered by the update_time column
 * @method     ChildIssuer[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildIssuer objects filtered by the update_user column
 * @method     ChildIssuer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class IssuerQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\IssuerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Issuer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildIssuerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildIssuerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildIssuerQuery) {
            return $criteria;
        }
        $query = new ChildIssuerQuery();
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
     * @return ChildIssuer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = IssuerTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(IssuerTableMap::DATABASE_NAME);
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
     * @return ChildIssuer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT issuer_id, issuer_name, update_time, update_user FROM issuer WHERE issuer_id = :p0';
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
            /** @var ChildIssuer $obj */
            $obj = new ChildIssuer();
            $obj->hydrate($row);
            IssuerTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildIssuer|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildIssuerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(IssuerTableMap::COL_ISSUER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildIssuerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(IssuerTableMap::COL_ISSUER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the issuer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByIssuerId(1234); // WHERE issuer_id = 1234
     * $query->filterByIssuerId(array(12, 34)); // WHERE issuer_id IN (12, 34)
     * $query->filterByIssuerId(array('min' => 12)); // WHERE issuer_id > 12
     * </code>
     *
     * @param     mixed $issuerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssuerQuery The current query, for fluid interface
     */
    public function filterByIssuerId($issuerId = null, $comparison = null)
    {
        if (is_array($issuerId)) {
            $useMinMax = false;
            if (isset($issuerId['min'])) {
                $this->addUsingAlias(IssuerTableMap::COL_ISSUER_ID, $issuerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($issuerId['max'])) {
                $this->addUsingAlias(IssuerTableMap::COL_ISSUER_ID, $issuerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssuerTableMap::COL_ISSUER_ID, $issuerId, $comparison);
    }

    /**
     * Filter the query on the issuer_name column
     *
     * Example usage:
     * <code>
     * $query->filterByIssuerName('fooValue');   // WHERE issuer_name = 'fooValue'
     * $query->filterByIssuerName('%fooValue%'); // WHERE issuer_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $issuerName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssuerQuery The current query, for fluid interface
     */
    public function filterByIssuerName($issuerName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($issuerName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $issuerName)) {
                $issuerName = str_replace('*', '%', $issuerName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IssuerTableMap::COL_ISSUER_NAME, $issuerName, $comparison);
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
     * @return $this|ChildIssuerQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(IssuerTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(IssuerTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssuerTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildIssuerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(IssuerTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildIssuerQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(IssuerTableMap::COL_ISSUER_ID, $creditCard->getIssuerId(), $comparison);
        } elseif ($creditCard instanceof ObjectCollection) {
            return $this
                ->useCreditCardQuery()
                ->filterByPrimaryKeys($creditCard->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCreditCard() only accepts arguments of type \CreditCard or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CreditCard relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildIssuerQuery The current query, for fluid interface
     */
    public function joinCreditCard($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CreditCard');

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
            $this->addJoinObject($join, 'CreditCard');
        }

        return $this;
    }

    /**
     * Use the CreditCard relation CreditCard object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CreditCardQuery A secondary query class using the current class as primary query
     */
    public function useCreditCardQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCreditCard($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CreditCard', '\CreditCardQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIssuer $issuer Object to remove from the list of results
     *
     * @return $this|ChildIssuerQuery The current query, for fluid interface
     */
    public function prune($issuer = null)
    {
        if ($issuer) {
            $this->addUsingAlias(IssuerTableMap::COL_ISSUER_ID, $issuer->getIssuerId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the issuer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IssuerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            IssuerTableMap::clearInstancePool();
            IssuerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(IssuerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(IssuerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            IssuerTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            IssuerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // IssuerQuery
