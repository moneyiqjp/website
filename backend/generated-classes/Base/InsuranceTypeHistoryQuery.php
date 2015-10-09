<?php

namespace Base;

use \InsuranceTypeHistory as ChildInsuranceTypeHistory;
use \InsuranceTypeHistoryQuery as ChildInsuranceTypeHistoryQuery;
use \Exception;
use \PDO;
use Map\InsuranceTypeHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'insurance_type_history' table.
 *
 * 
 *
 * @method     ChildInsuranceTypeHistoryQuery orderByInsuranceTypeId($order = Criteria::ASC) Order by the insurance_type_id column
 * @method     ChildInsuranceTypeHistoryQuery orderByTypeName($order = Criteria::ASC) Order by the type_name column
 * @method     ChildInsuranceTypeHistoryQuery orderBySubtypeName($order = Criteria::ASC) Order by the subtype_name column
 * @method     ChildInsuranceTypeHistoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildInsuranceTypeHistoryQuery orderByRegion($order = Criteria::ASC) Order by the region column
 * @method     ChildInsuranceTypeHistoryQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildInsuranceTypeHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 * @method     ChildInsuranceTypeHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildInsuranceTypeHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 *
 * @method     ChildInsuranceTypeHistoryQuery groupByInsuranceTypeId() Group by the insurance_type_id column
 * @method     ChildInsuranceTypeHistoryQuery groupByTypeName() Group by the type_name column
 * @method     ChildInsuranceTypeHistoryQuery groupBySubtypeName() Group by the subtype_name column
 * @method     ChildInsuranceTypeHistoryQuery groupByDescription() Group by the description column
 * @method     ChildInsuranceTypeHistoryQuery groupByRegion() Group by the region column
 * @method     ChildInsuranceTypeHistoryQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildInsuranceTypeHistoryQuery groupByUpdateUser() Group by the update_user column
 * @method     ChildInsuranceTypeHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildInsuranceTypeHistoryQuery groupByTimeEnd() Group by the time_end column
 *
 * @method     ChildInsuranceTypeHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInsuranceTypeHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInsuranceTypeHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInsuranceTypeHistory findOne(ConnectionInterface $con = null) Return the first ChildInsuranceTypeHistory matching the query
 * @method     ChildInsuranceTypeHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInsuranceTypeHistory matching the query, or a new ChildInsuranceTypeHistory object populated from the query conditions when no match is found
 *
 * @method     ChildInsuranceTypeHistory findOneByInsuranceTypeId(int $insurance_type_id) Return the first ChildInsuranceTypeHistory filtered by the insurance_type_id column
 * @method     ChildInsuranceTypeHistory findOneByTypeName(string $type_name) Return the first ChildInsuranceTypeHistory filtered by the type_name column
 * @method     ChildInsuranceTypeHistory findOneBySubtypeName(string $subtype_name) Return the first ChildInsuranceTypeHistory filtered by the subtype_name column
 * @method     ChildInsuranceTypeHistory findOneByDescription(string $description) Return the first ChildInsuranceTypeHistory filtered by the description column
 * @method     ChildInsuranceTypeHistory findOneByRegion(string $region) Return the first ChildInsuranceTypeHistory filtered by the region column
 * @method     ChildInsuranceTypeHistory findOneByUpdateTime(string $update_time) Return the first ChildInsuranceTypeHistory filtered by the update_time column
 * @method     ChildInsuranceTypeHistory findOneByUpdateUser(string $update_user) Return the first ChildInsuranceTypeHistory filtered by the update_user column
 * @method     ChildInsuranceTypeHistory findOneByTimeBeg(string $time_beg) Return the first ChildInsuranceTypeHistory filtered by the time_beg column
 * @method     ChildInsuranceTypeHistory findOneByTimeEnd(string $time_end) Return the first ChildInsuranceTypeHistory filtered by the time_end column
 *
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInsuranceTypeHistory objects based on current ModelCriteria
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection findByInsuranceTypeId(int $insurance_type_id) Return ChildInsuranceTypeHistory objects filtered by the insurance_type_id column
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection findByTypeName(string $type_name) Return ChildInsuranceTypeHistory objects filtered by the type_name column
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection findBySubtypeName(string $subtype_name) Return ChildInsuranceTypeHistory objects filtered by the subtype_name column
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection findByDescription(string $description) Return ChildInsuranceTypeHistory objects filtered by the description column
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection findByRegion(string $region) Return ChildInsuranceTypeHistory objects filtered by the region column
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildInsuranceTypeHistory objects filtered by the update_time column
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildInsuranceTypeHistory objects filtered by the update_user column
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildInsuranceTypeHistory objects filtered by the time_beg column
 * @method     ChildInsuranceTypeHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildInsuranceTypeHistory objects filtered by the time_end column
 * @method     ChildInsuranceTypeHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InsuranceTypeHistoryQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\InsuranceTypeHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\InsuranceTypeHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInsuranceTypeHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInsuranceTypeHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInsuranceTypeHistoryQuery) {
            return $criteria;
        }
        $query = new ChildInsuranceTypeHistoryQuery();
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
     * @param array[$insurance_type_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInsuranceTypeHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InsuranceTypeHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InsuranceTypeHistoryTableMap::DATABASE_NAME);
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
     * @return ChildInsuranceTypeHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT insurance_type_id, type_name, subtype_name, description, region, update_time, update_user, time_beg, time_end FROM insurance_type_history WHERE insurance_type_id = :p0 AND time_beg = :p1';
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
            /** @var ChildInsuranceTypeHistory $obj */
            $obj = new ChildInsuranceTypeHistory();
            $obj->hydrate($row);
            InsuranceTypeHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildInsuranceTypeHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_INSURANCE_TYPE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InsuranceTypeHistoryTableMap::COL_INSURANCE_TYPE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InsuranceTypeHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByInsuranceTypeId($insuranceTypeId = null, $comparison = null)
    {
        if (is_array($insuranceTypeId)) {
            $useMinMax = false;
            if (isset($insuranceTypeId['min'])) {
                $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insuranceTypeId['max'])) {
                $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_INSURANCE_TYPE_ID, $insuranceTypeId, $comparison);
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_TYPE_NAME, $typeName, $comparison);
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_SUBTYPE_NAME, $subtypeName, $comparison);
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_REGION, $region, $comparison);
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InsuranceTypeHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInsuranceTypeHistory $insuranceTypeHistory Object to remove from the list of results
     *
     * @return $this|ChildInsuranceTypeHistoryQuery The current query, for fluid interface
     */
    public function prune($insuranceTypeHistory = null)
    {
        if ($insuranceTypeHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InsuranceTypeHistoryTableMap::COL_INSURANCE_TYPE_ID), $insuranceTypeHistory->getInsuranceTypeId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InsuranceTypeHistoryTableMap::COL_TIME_BEG), $insuranceTypeHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the insurance_type_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceTypeHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InsuranceTypeHistoryTableMap::clearInstancePool();
            InsuranceTypeHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InsuranceTypeHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InsuranceTypeHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            InsuranceTypeHistoryTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            InsuranceTypeHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InsuranceTypeHistoryQuery
