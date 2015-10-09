<?php

namespace Base;

use \AffiliateCompany as ChildAffiliateCompany;
use \AffiliateCompanyQuery as ChildAffiliateCompanyQuery;
use \Exception;
use \PDO;
use Map\AffiliateCompanyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'affiliate_company' table.
 *
 * 
 *
 * @method     ChildAffiliateCompanyQuery orderByAffiliateId($order = Criteria::ASC) Order by the affiliate_id column
 * @method     ChildAffiliateCompanyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildAffiliateCompanyQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildAffiliateCompanyQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method     ChildAffiliateCompanyQuery orderBySignedUpDate($order = Criteria::ASC) Order by the signed_up_date column
 * @method     ChildAffiliateCompanyQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildAffiliateCompanyQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildAffiliateCompanyQuery groupByAffiliateId() Group by the affiliate_id column
 * @method     ChildAffiliateCompanyQuery groupByName() Group by the name column
 * @method     ChildAffiliateCompanyQuery groupByDescription() Group by the description column
 * @method     ChildAffiliateCompanyQuery groupByWebsite() Group by the website column
 * @method     ChildAffiliateCompanyQuery groupBySignedUpDate() Group by the signed_up_date column
 * @method     ChildAffiliateCompanyQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildAffiliateCompanyQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildAffiliateCompanyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAffiliateCompanyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAffiliateCompanyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAffiliateCompanyQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildAffiliateCompanyQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildAffiliateCompanyQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     \CreditCardQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAffiliateCompany findOne(ConnectionInterface $con = null) Return the first ChildAffiliateCompany matching the query
 * @method     ChildAffiliateCompany findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAffiliateCompany matching the query, or a new ChildAffiliateCompany object populated from the query conditions when no match is found
 *
 * @method     ChildAffiliateCompany findOneByAffiliateId(int $affiliate_id) Return the first ChildAffiliateCompany filtered by the affiliate_id column
 * @method     ChildAffiliateCompany findOneByName(string $name) Return the first ChildAffiliateCompany filtered by the name column
 * @method     ChildAffiliateCompany findOneByDescription(string $description) Return the first ChildAffiliateCompany filtered by the description column
 * @method     ChildAffiliateCompany findOneByWebsite(string $website) Return the first ChildAffiliateCompany filtered by the website column
 * @method     ChildAffiliateCompany findOneBySignedUpDate(string $signed_up_date) Return the first ChildAffiliateCompany filtered by the signed_up_date column
 * @method     ChildAffiliateCompany findOneByUpdateTime(string $update_time) Return the first ChildAffiliateCompany filtered by the update_time column
 * @method     ChildAffiliateCompany findOneByUpdateUser(string $update_user) Return the first ChildAffiliateCompany filtered by the update_user column
 *
 * @method     ChildAffiliateCompany[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAffiliateCompany objects based on current ModelCriteria
 * @method     ChildAffiliateCompany[]|ObjectCollection findByAffiliateId(int $affiliate_id) Return ChildAffiliateCompany objects filtered by the affiliate_id column
 * @method     ChildAffiliateCompany[]|ObjectCollection findByName(string $name) Return ChildAffiliateCompany objects filtered by the name column
 * @method     ChildAffiliateCompany[]|ObjectCollection findByDescription(string $description) Return ChildAffiliateCompany objects filtered by the description column
 * @method     ChildAffiliateCompany[]|ObjectCollection findByWebsite(string $website) Return ChildAffiliateCompany objects filtered by the website column
 * @method     ChildAffiliateCompany[]|ObjectCollection findBySignedUpDate(string $signed_up_date) Return ChildAffiliateCompany objects filtered by the signed_up_date column
 * @method     ChildAffiliateCompany[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildAffiliateCompany objects filtered by the update_time column
 * @method     ChildAffiliateCompany[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildAffiliateCompany objects filtered by the update_user column
 * @method     ChildAffiliateCompany[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AffiliateCompanyQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\AffiliateCompanyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AffiliateCompany', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAffiliateCompanyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAffiliateCompanyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAffiliateCompanyQuery) {
            return $criteria;
        }
        $query = new ChildAffiliateCompanyQuery();
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
     * @return ChildAffiliateCompany|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AffiliateCompanyTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AffiliateCompanyTableMap::DATABASE_NAME);
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
     * @return ChildAffiliateCompany A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT affiliate_id, name, description, website, signed_up_date, update_time, update_user FROM affiliate_company WHERE affiliate_id = :p0';
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
            /** @var ChildAffiliateCompany $obj */
            $obj = new ChildAffiliateCompany();
            $obj->hydrate($row);
            AffiliateCompanyTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildAffiliateCompany|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AffiliateCompanyTableMap::COL_AFFILIATE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AffiliateCompanyTableMap::COL_AFFILIATE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the affiliate_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAffiliateId(1234); // WHERE affiliate_id = 1234
     * $query->filterByAffiliateId(array(12, 34)); // WHERE affiliate_id IN (12, 34)
     * $query->filterByAffiliateId(array('min' => 12)); // WHERE affiliate_id > 12
     * </code>
     *
     * @param     mixed $affiliateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
     */
    public function filterByAffiliateId($affiliateId = null, $comparison = null)
    {
        if (is_array($affiliateId)) {
            $useMinMax = false;
            if (isset($affiliateId['min'])) {
                $this->addUsingAlias(AffiliateCompanyTableMap::COL_AFFILIATE_ID, $affiliateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($affiliateId['max'])) {
                $this->addUsingAlias(AffiliateCompanyTableMap::COL_AFFILIATE_ID, $affiliateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AffiliateCompanyTableMap::COL_AFFILIATE_ID, $affiliateId, $comparison);
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
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AffiliateCompanyTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AffiliateCompanyTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterByWebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterByWebsite('%fooValue%'); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
     */
    public function filterByWebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $website)) {
                $website = str_replace('*', '%', $website);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AffiliateCompanyTableMap::COL_WEBSITE, $website, $comparison);
    }

    /**
     * Filter the query on the signed_up_date column
     *
     * Example usage:
     * <code>
     * $query->filterBySignedUpDate('2011-03-14'); // WHERE signed_up_date = '2011-03-14'
     * $query->filterBySignedUpDate('now'); // WHERE signed_up_date = '2011-03-14'
     * $query->filterBySignedUpDate(array('max' => 'yesterday')); // WHERE signed_up_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $signedUpDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
     */
    public function filterBySignedUpDate($signedUpDate = null, $comparison = null)
    {
        if (is_array($signedUpDate)) {
            $useMinMax = false;
            if (isset($signedUpDate['min'])) {
                $this->addUsingAlias(AffiliateCompanyTableMap::COL_SIGNED_UP_DATE, $signedUpDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($signedUpDate['max'])) {
                $this->addUsingAlias(AffiliateCompanyTableMap::COL_SIGNED_UP_DATE, $signedUpDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AffiliateCompanyTableMap::COL_SIGNED_UP_DATE, $signedUpDate, $comparison);
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
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(AffiliateCompanyTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(AffiliateCompanyTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AffiliateCompanyTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AffiliateCompanyTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAffiliateCompanyQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(AffiliateCompanyTableMap::COL_AFFILIATE_ID, $creditCard->getAffiliateId(), $comparison);
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
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
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
     * @param   ChildAffiliateCompany $affiliateCompany Object to remove from the list of results
     *
     * @return $this|ChildAffiliateCompanyQuery The current query, for fluid interface
     */
    public function prune($affiliateCompany = null)
    {
        if ($affiliateCompany) {
            $this->addUsingAlias(AffiliateCompanyTableMap::COL_AFFILIATE_ID, $affiliateCompany->getAffiliateId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the affiliate_company table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AffiliateCompanyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AffiliateCompanyTableMap::clearInstancePool();
            AffiliateCompanyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AffiliateCompanyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AffiliateCompanyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            AffiliateCompanyTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            AffiliateCompanyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AffiliateCompanyQuery
