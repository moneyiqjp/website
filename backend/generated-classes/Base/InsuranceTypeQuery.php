<?php

namespace Base;

use \InsuranceType as ChildInsuranceType;
use \InsuranceTypeQuery as ChildInsuranceTypeQuery;
use \Exception;
use \PDO;
use Map\InsuranceTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'insurance_type' table.
 *
 * 
 *
 * @method     ChildInsuranceTypeQuery orderByInsuranceTypeId($order = Criteria::ASC) Order by the insurance_type_id column
 * @method     ChildInsuranceTypeQuery orderByTypeName($order = Criteria::ASC) Order by the type_name column
 * @method     ChildInsuranceTypeQuery orderBySubtypeName($order = Criteria::ASC) Order by the subtype_name column
 * @method     ChildInsuranceTypeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildInsuranceTypeQuery orderByRegion($order = Criteria::ASC) Order by the region column
 * @method     ChildInsuranceTypeQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildInsuranceTypeQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildInsuranceTypeQuery groupByInsuranceTypeId() Group by the insurance_type_id column
 * @method     ChildInsuranceTypeQuery groupByTypeName() Group by the type_name column
 * @method     ChildInsuranceTypeQuery groupBySubtypeName() Group by the subtype_name column
 * @method     ChildInsuranceTypeQuery groupByDescription() Group by the description column
 * @method     ChildInsuranceTypeQuery groupByRegion() Group by the region column
 * @method     ChildInsuranceTypeQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildInsuranceTypeQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildInsuranceTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInsuranceTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInsuranceTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInsuranceTypeQuery leftJoinInsurance($relationAlias = null) Adds a LEFT JOIN clause to the query using the Insurance relation
 * @method     ChildInsuranceTypeQuery rightJoinInsurance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Insurance relation
 * @method     ChildInsuranceTypeQuery innerJoinInsurance($relationAlias = null) Adds a INNER JOIN clause to the query using the Insurance relation
 *
 * @method     \InsuranceQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInsuranceType findOne(ConnectionInterface $con = null) Return the first ChildInsuranceType matching the query
 * @method     ChildInsuranceType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInsuranceType matching the query, or a new ChildInsuranceType object populated from the query conditions when no match is found
 *
 * @method     ChildInsuranceType findOneByInsuranceTypeId(int $insurance_type_id) Return the first ChildInsuranceType filtered by the insurance_type_id column
 * @method     ChildInsuranceType findOneByTypeName(string $type_name) Return the first ChildInsuranceType filtered by the type_name column
 * @method     ChildInsuranceType findOneBySubtypeName(string $subtype_name) Return the first ChildInsuranceType filtered by the subtype_name column
 * @method     ChildInsuranceType findOneByDescription(string $description) Return the first ChildInsuranceType filtered by the description column
 * @method     ChildInsuranceType findOneByRegion(string $region) Return the first ChildInsuranceType filtered by the region column
 * @method     ChildInsuranceType findOneByUpdateTime(string $update_time) Return the first ChildInsuranceType filtered by the update_time column
 * @method     ChildInsuranceType findOneByUpdateUser(string $update_user) Return the first ChildInsuranceType filtered by the update_user column
 *
 * @method     ChildInsuranceType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInsuranceType objects based on current ModelCriteria
 * @method     ChildInsuranceType[]|ObjectCollection findByInsuranceTypeId(int $insurance_type_id) Return ChildInsuranceType objects filtered by the insurance_type_id column
 * @method     ChildInsuranceType[]|ObjectCollection findByTypeName(string $type_name) Return ChildInsuranceType objects filtered by the type_name column
 * @method     ChildInsuranceType[]|ObjectCollection findBySubtypeName(string $subtype_name) Return ChildInsuranceType objects filtered by the subtype_name column
 * @method     ChildInsuranceType[]|ObjectCollection findByDescription(string $description) Return ChildInsuranceType objects filtered by the description column
 * @method     ChildInsuranceType[]|ObjectCollection findByRegion(string $region) Return ChildInsuranceType objects filtered by the region column
 * @method     ChildInsuranceType[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildInsuranceType objects filtered by the update_time column
 * @method     ChildInsuranceType[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildInsuranceType objects filtered by the update_user column
 * @method     ChildInsuranceType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InsuranceTypeQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\InsuranceTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\InsuranceType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInsuranceTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInsuranceTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInsuranceTypeQuery) {
            return $criteria;
        }
        $query = new ChildInsuranceTypeQuery();
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
     * @return ChildInsuranceType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InsuranceTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InsuranceTypeTableMap::DATABASE_NAME);
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
     * @return ChildInsuranceType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT insurance_type_id, type_name, subtype_name, description, region, update_time, update_user FROM insurance_type WHERE insurance_type_id = :p0';
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
            /** @var ChildInsuranceType $obj */
            $obj = new ChildInsuranceType();
            $obj->hydrate($row);
            InsuranceTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildInsuranceType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the insurance_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInsuranceTypeId(1234); // WHERE insurance_type_id = 1234
     * $query->filterByInsuranceTypeId(array(12, 34)); // WHERE insurance_type_id IN (12, 34)
     * $query->filterByInsuranceTypeId(array('min' => 12)); // WHERE insurance_type_id > 12
     * </code>
     *
     * @param     mixed $insuranceTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function filterByInsuranceTypeId($insuranceTypeId = null, $comparison = null)
    {
        if (is_array($insuranceTypeId)) {
            $useMinMax = false;
            if (isset($insuranceTypeId['min'])) {
                $this->addUsingAlias(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insuranceTypeId['max'])) {
                $this->addUsingAlias(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId, $comparison);
    }

    /**
     * Filter the query on the type_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeName('fooValue');   // WHERE type_name = 'fooValue'
     * $query->filterByTypeName('%fooValue%'); // WHERE type_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $typeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function filterByTypeName($typeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($typeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $typeName)) {
                $typeName = str_replace('*', '%', $typeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InsuranceTypeTableMap::COL_TYPE_NAME, $typeName, $comparison);
    }

    /**
     * Filter the query on the subtype_name column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtypeName('fooValue');   // WHERE subtype_name = 'fooValue'
     * $query->filterBySubtypeName('%fooValue%'); // WHERE subtype_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subtypeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function filterBySubtypeName($subtypeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subtypeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $subtypeName)) {
                $subtypeName = str_replace('*', '%', $subtypeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InsuranceTypeTableMap::COL_SUBTYPE_NAME, $subtypeName, $comparison);
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
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceTypeTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the region column
     *
     * Example usage:
     * <code>
     * $query->filterByRegion('fooValue');   // WHERE region = 'fooValue'
     * $query->filterByRegion('%fooValue%'); // WHERE region LIKE '%fooValue%'
     * </code>
     *
     * @param     string $region The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function filterByRegion($region = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($region)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $region)) {
                $region = str_replace('*', '%', $region);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InsuranceTypeTableMap::COL_REGION, $region, $comparison);
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
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(InsuranceTypeTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(InsuranceTypeTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTypeTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceTypeTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Insurance object
     *
     * @param \Insurance|ObjectCollection $insurance  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function filterByInsurance($insurance, $comparison = null)
    {
        if ($insurance instanceof \Insurance) {
            return $this
                ->addUsingAlias(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID, $insurance->getInsuranceTypeId(), $comparison);
        } elseif ($insurance instanceof ObjectCollection) {
            return $this
                ->useInsuranceQuery()
                ->filterByPrimaryKeys($insurance->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInsurance() only accepts arguments of type \Insurance or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Insurance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function joinInsurance($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Insurance');

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
            $this->addJoinObject($join, 'Insurance');
        }

        return $this;
    }

    /**
     * Use the Insurance relation Insurance object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InsuranceQuery A secondary query class using the current class as primary query
     */
    public function useInsuranceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInsurance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Insurance', '\InsuranceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInsuranceType $insuranceType Object to remove from the list of results
     *
     * @return $this|ChildInsuranceTypeQuery The current query, for fluid interface
     */
    public function prune($insuranceType = null)
    {
        if ($insuranceType) {
            $this->addUsingAlias(InsuranceTypeTableMap::COL_INSURANCE_TYPE_ID, $insuranceType->getInsuranceTypeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the insurance_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InsuranceTypeTableMap::clearInstancePool();
            InsuranceTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InsuranceTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            InsuranceTypeTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            InsuranceTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InsuranceTypeQuery
