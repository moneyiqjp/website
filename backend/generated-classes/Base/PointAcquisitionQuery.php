<?php

namespace Base;

use \PointAcquisition as ChildPointAcquisition;
use \PointAcquisitionQuery as ChildPointAcquisitionQuery;
use \Exception;
use \PDO;
use Map\PointAcquisitionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'point_acquisition' table.
 *
 * 
 *
 * @method     ChildPointAcquisitionQuery orderByPointAcquisitionId($order = Criteria::ASC) Order by the point_acquisition_id column
 * @method     ChildPointAcquisitionQuery orderByPointAcquisitionName($order = Criteria::ASC) Order by the point_acquisition_name column
 * @method     ChildPointAcquisitionQuery orderByPointsPerYen($order = Criteria::ASC) Order by the points_per_yen column
 * @method     ChildPointAcquisitionQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildPointAcquisitionQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildPointAcquisitionQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildPointAcquisitionQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 * @method     ChildPointAcquisitionQuery orderByReference($order = Criteria::ASC) Order by the reference column
 *
 * @method     ChildPointAcquisitionQuery groupByPointAcquisitionId() Group by the point_acquisition_id column
 * @method     ChildPointAcquisitionQuery groupByPointAcquisitionName() Group by the point_acquisition_name column
 * @method     ChildPointAcquisitionQuery groupByPointsPerYen() Group by the points_per_yen column
 * @method     ChildPointAcquisitionQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildPointAcquisitionQuery groupByStoreId() Group by the store_id column
 * @method     ChildPointAcquisitionQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildPointAcquisitionQuery groupByUpdateUser() Group by the update_user column
 * @method     ChildPointAcquisitionQuery groupByReference() Group by the reference column
 *
 * @method     ChildPointAcquisitionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPointAcquisitionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPointAcquisitionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPointAcquisitionQuery leftJoinStore($relationAlias = null) Adds a LEFT JOIN clause to the query using the Store relation
 * @method     ChildPointAcquisitionQuery rightJoinStore($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Store relation
 * @method     ChildPointAcquisitionQuery innerJoinStore($relationAlias = null) Adds a INNER JOIN clause to the query using the Store relation
 *
 * @method     ChildPointAcquisitionQuery leftJoinPointSystem($relationAlias = null) Adds a LEFT JOIN clause to the query using the PointSystem relation
 * @method     ChildPointAcquisitionQuery rightJoinPointSystem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PointSystem relation
 * @method     ChildPointAcquisitionQuery innerJoinPointSystem($relationAlias = null) Adds a INNER JOIN clause to the query using the PointSystem relation
 *
 * @method     \StoreQuery|\PointSystemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPointAcquisition findOne(ConnectionInterface $con = null) Return the first ChildPointAcquisition matching the query
 * @method     ChildPointAcquisition findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPointAcquisition matching the query, or a new ChildPointAcquisition object populated from the query conditions when no match is found
 *
 * @method     ChildPointAcquisition findOneByPointAcquisitionId(int $point_acquisition_id) Return the first ChildPointAcquisition filtered by the point_acquisition_id column
 * @method     ChildPointAcquisition findOneByPointAcquisitionName(string $point_acquisition_name) Return the first ChildPointAcquisition filtered by the point_acquisition_name column
 * @method     ChildPointAcquisition findOneByPointsPerYen(double $points_per_yen) Return the first ChildPointAcquisition filtered by the points_per_yen column
 * @method     ChildPointAcquisition findOneByPointSystemId(int $point_system_id) Return the first ChildPointAcquisition filtered by the point_system_id column
 * @method     ChildPointAcquisition findOneByStoreId(int $store_id) Return the first ChildPointAcquisition filtered by the store_id column
 * @method     ChildPointAcquisition findOneByUpdateTime(string $update_time) Return the first ChildPointAcquisition filtered by the update_time column
 * @method     ChildPointAcquisition findOneByUpdateUser(string $update_user) Return the first ChildPointAcquisition filtered by the update_user column
 * @method     ChildPointAcquisition findOneByReference(string $reference) Return the first ChildPointAcquisition filtered by the reference column
 *
 * @method     ChildPointAcquisition[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPointAcquisition objects based on current ModelCriteria
 * @method     ChildPointAcquisition[]|ObjectCollection findByPointAcquisitionId(int $point_acquisition_id) Return ChildPointAcquisition objects filtered by the point_acquisition_id column
 * @method     ChildPointAcquisition[]|ObjectCollection findByPointAcquisitionName(string $point_acquisition_name) Return ChildPointAcquisition objects filtered by the point_acquisition_name column
 * @method     ChildPointAcquisition[]|ObjectCollection findByPointsPerYen(double $points_per_yen) Return ChildPointAcquisition objects filtered by the points_per_yen column
 * @method     ChildPointAcquisition[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildPointAcquisition objects filtered by the point_system_id column
 * @method     ChildPointAcquisition[]|ObjectCollection findByStoreId(int $store_id) Return ChildPointAcquisition objects filtered by the store_id column
 * @method     ChildPointAcquisition[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildPointAcquisition objects filtered by the update_time column
 * @method     ChildPointAcquisition[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildPointAcquisition objects filtered by the update_user column
 * @method     ChildPointAcquisition[]|ObjectCollection findByReference(string $reference) Return ChildPointAcquisition objects filtered by the reference column
 * @method     ChildPointAcquisition[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PointAcquisitionQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\PointAcquisitionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PointAcquisition', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPointAcquisitionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPointAcquisitionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPointAcquisitionQuery) {
            return $criteria;
        }
        $query = new ChildPointAcquisitionQuery();
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
     * @return ChildPointAcquisition|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PointAcquisitionTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PointAcquisitionTableMap::DATABASE_NAME);
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
     * @return ChildPointAcquisition A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT point_acquisition_id, point_acquisition_name, points_per_yen, point_system_id, store_id, update_time, update_user, reference FROM point_acquisition WHERE point_acquisition_id = :p0';
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
            /** @var ChildPointAcquisition $obj */
            $obj = new ChildPointAcquisition();
            $obj->hydrate($row);
            PointAcquisitionTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildPointAcquisition|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_ACQUISITION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_ACQUISITION_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByPointAcquisitionId($pointAcquisitionId = null, $comparison = null)
    {
        if (is_array($pointAcquisitionId)) {
            $useMinMax = false;
            if (isset($pointAcquisitionId['min'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_ACQUISITION_ID, $pointAcquisitionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointAcquisitionId['max'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_ACQUISITION_ID, $pointAcquisitionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_ACQUISITION_ID, $pointAcquisitionId, $comparison);
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
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_ACQUISITION_NAME, $pointAcquisitionName, $comparison);
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
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByPointsPerYen($pointsPerYen = null, $comparison = null)
    {
        if (is_array($pointsPerYen)) {
            $useMinMax = false;
            if (isset($pointsPerYen['min'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_POINTS_PER_YEN, $pointsPerYen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointsPerYen['max'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_POINTS_PER_YEN, $pointsPerYen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_POINTS_PER_YEN, $pointsPerYen, $comparison);
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
     * @see       filterByPointSystem()
     *
     * @param     mixed $pointSystemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
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
     * @see       filterByStore()
     *
     * @param     mixed $storeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_STORE_ID, $storeId, $comparison);
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
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(PointAcquisitionTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query on the reference column
     *
     * Example usage:
     * <code>
     * $query->filterByReference('fooValue');   // WHERE reference = 'fooValue'
     * $query->filterByReference('%fooValue%'); // WHERE reference LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reference The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByReference($reference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reference)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reference)) {
                $reference = str_replace('*', '%', $reference);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PointAcquisitionTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query by a related \Store object
     *
     * @param \Store|ObjectCollection $store The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByStore($store, $comparison = null)
    {
        if ($store instanceof \Store) {
            return $this
                ->addUsingAlias(PointAcquisitionTableMap::COL_STORE_ID, $store->getStoreId(), $comparison);
        } elseif ($store instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PointAcquisitionTableMap::COL_STORE_ID, $store->toKeyValue('PrimaryKey', 'StoreId'), $comparison);
        } else {
            throw new PropelException('filterByStore() only accepts arguments of type \Store or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Store relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function joinStore($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Store');

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
            $this->addJoinObject($join, 'Store');
        }

        return $this;
    }

    /**
     * Use the Store relation Store object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \StoreQuery A secondary query class using the current class as primary query
     */
    public function useStoreQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStore($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Store', '\StoreQuery');
    }

    /**
     * Filter the query by a related \PointSystem object
     *
     * @param \PointSystem|ObjectCollection $pointSystem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function filterByPointSystem($pointSystem, $comparison = null)
    {
        if ($pointSystem instanceof \PointSystem) {
            return $this
                ->addUsingAlias(PointAcquisitionTableMap::COL_POINT_SYSTEM_ID, $pointSystem->getPointSystemId(), $comparison);
        } elseif ($pointSystem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PointAcquisitionTableMap::COL_POINT_SYSTEM_ID, $pointSystem->toKeyValue('PrimaryKey', 'PointSystemId'), $comparison);
        } else {
            throw new PropelException('filterByPointSystem() only accepts arguments of type \PointSystem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PointSystem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function joinPointSystem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PointSystem');

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
            $this->addJoinObject($join, 'PointSystem');
        }

        return $this;
    }

    /**
     * Use the PointSystem relation PointSystem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PointSystemQuery A secondary query class using the current class as primary query
     */
    public function usePointSystemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPointSystem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PointSystem', '\PointSystemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPointAcquisition $pointAcquisition Object to remove from the list of results
     *
     * @return $this|ChildPointAcquisitionQuery The current query, for fluid interface
     */
    public function prune($pointAcquisition = null)
    {
        if ($pointAcquisition) {
            $this->addUsingAlias(PointAcquisitionTableMap::COL_POINT_ACQUISITION_ID, $pointAcquisition->getPointAcquisitionId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the point_acquisition table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PointAcquisitionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PointAcquisitionTableMap::clearInstancePool();
            PointAcquisitionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PointAcquisitionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PointAcquisitionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            PointAcquisitionTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            PointAcquisitionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PointAcquisitionQuery
