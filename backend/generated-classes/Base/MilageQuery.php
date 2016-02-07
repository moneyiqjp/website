<?php

namespace Base;

use \Milage as ChildMilage;
use \MilageQuery as ChildMilageQuery;
use \Exception;
use \PDO;
use Map\MilageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'milage' table.
 *
 *
 *
 * @method     ChildMilageQuery orderByMilageId($order = Criteria::ASC) Order by the milage_id column
 * @method     ChildMilageQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildMilageQuery orderByTripId($order = Criteria::ASC) Order by the trip_id column
 * @method     ChildMilageQuery orderByRequiredMiles($order = Criteria::ASC) Order by the required_miles column
 * @method     ChildMilageQuery orderByValueInYen($order = Criteria::ASC) Order by the value_in_yen column
 * @method     ChildMilageQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     ChildMilageQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildMilageQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildMilageQuery groupByMilageId() Group by the milage_id column
 * @method     ChildMilageQuery groupByStoreId() Group by the store_id column
 * @method     ChildMilageQuery groupByTripId() Group by the trip_id column
 * @method     ChildMilageQuery groupByRequiredMiles() Group by the required_miles column
 * @method     ChildMilageQuery groupByValueInYen() Group by the value_in_yen column
 * @method     ChildMilageQuery groupByDisplay() Group by the display column
 * @method     ChildMilageQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildMilageQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildMilageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMilageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMilageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMilageQuery leftJoinStore($relationAlias = null) Adds a LEFT JOIN clause to the query using the Store relation
 * @method     ChildMilageQuery rightJoinStore($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Store relation
 * @method     ChildMilageQuery innerJoinStore($relationAlias = null) Adds a INNER JOIN clause to the query using the Store relation
 *
 * @method     ChildMilageQuery leftJoinTrip($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trip relation
 * @method     ChildMilageQuery rightJoinTrip($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trip relation
 * @method     ChildMilageQuery innerJoinTrip($relationAlias = null) Adds a INNER JOIN clause to the query using the Trip relation
 *
 * @method     \StoreQuery|\TripQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMilage findOne(ConnectionInterface $con = null) Return the first ChildMilage matching the query
 * @method     ChildMilage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMilage matching the query, or a new ChildMilage object populated from the query conditions when no match is found
 *
 * @method     ChildMilage findOneByMilageId(int $milage_id) Return the first ChildMilage filtered by the milage_id column
 * @method     ChildMilage findOneByStoreId(int $store_id) Return the first ChildMilage filtered by the store_id column
 * @method     ChildMilage findOneByTripId(int $trip_id) Return the first ChildMilage filtered by the trip_id column
 * @method     ChildMilage findOneByRequiredMiles(int $required_miles) Return the first ChildMilage filtered by the required_miles column
 * @method     ChildMilage findOneByValueInYen(int $value_in_yen) Return the first ChildMilage filtered by the value_in_yen column
 * @method     ChildMilage findOneByDisplay(string $display) Return the first ChildMilage filtered by the display column
 * @method     ChildMilage findOneByUpdateTime(string $update_time) Return the first ChildMilage filtered by the update_time column
 * @method     ChildMilage findOneByUpdateUser(string $update_user) Return the first ChildMilage filtered by the update_user column
 *
 * @method     ChildMilage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMilage objects based on current ModelCriteria
 * @method     ChildMilage[]|ObjectCollection findByMilageId(int $milage_id) Return ChildMilage objects filtered by the milage_id column
 * @method     ChildMilage[]|ObjectCollection findByStoreId(int $store_id) Return ChildMilage objects filtered by the store_id column
 * @method     ChildMilage[]|ObjectCollection findByTripId(int $trip_id) Return ChildMilage objects filtered by the trip_id column
 * @method     ChildMilage[]|ObjectCollection findByRequiredMiles(int $required_miles) Return ChildMilage objects filtered by the required_miles column
 * @method     ChildMilage[]|ObjectCollection findByValueInYen(int $value_in_yen) Return ChildMilage objects filtered by the value_in_yen column
 * @method     ChildMilage[]|ObjectCollection findByDisplay(string $display) Return ChildMilage objects filtered by the display column
 * @method     ChildMilage[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildMilage objects filtered by the update_time column
 * @method     ChildMilage[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildMilage objects filtered by the update_user column
 * @method     ChildMilage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MilageQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\MilageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Milage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMilageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMilageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMilageQuery) {
            return $criteria;
        }
        $query = new ChildMilageQuery();
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
     * @return ChildMilage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MilageTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MilageTableMap::DATABASE_NAME);
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
     * @return ChildMilage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT milage_id, store_id, trip_id, required_miles, value_in_yen, display, update_time, update_user FROM milage WHERE milage_id = :p0';
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
            /** @var ChildMilage $obj */
            $obj = new ChildMilage();
            $obj->hydrate($row);
            MilageTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildMilage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MilageTableMap::COL_MILAGE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MilageTableMap::COL_MILAGE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the milage_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMilageId(1234); // WHERE milage_id = 1234
     * $query->filterByMilageId(array(12, 34)); // WHERE milage_id IN (12, 34)
     * $query->filterByMilageId(array('min' => 12)); // WHERE milage_id > 12
     * </code>
     *
     * @param     mixed $milageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function filterByMilageId($milageId = null, $comparison = null)
    {
        if (is_array($milageId)) {
            $useMinMax = false;
            if (isset($milageId['min'])) {
                $this->addUsingAlias(MilageTableMap::COL_MILAGE_ID, $milageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($milageId['max'])) {
                $this->addUsingAlias(MilageTableMap::COL_MILAGE_ID, $milageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MilageTableMap::COL_MILAGE_ID, $milageId, $comparison);
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
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(MilageTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(MilageTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MilageTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Filter the query on the trip_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTripId(1234); // WHERE trip_id = 1234
     * $query->filterByTripId(array(12, 34)); // WHERE trip_id IN (12, 34)
     * $query->filterByTripId(array('min' => 12)); // WHERE trip_id > 12
     * </code>
     *
     * @see       filterByTrip()
     *
     * @param     mixed $tripId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function filterByTripId($tripId = null, $comparison = null)
    {
        if (is_array($tripId)) {
            $useMinMax = false;
            if (isset($tripId['min'])) {
                $this->addUsingAlias(MilageTableMap::COL_TRIP_ID, $tripId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tripId['max'])) {
                $this->addUsingAlias(MilageTableMap::COL_TRIP_ID, $tripId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MilageTableMap::COL_TRIP_ID, $tripId, $comparison);
    }

    /**
     * Filter the query on the required_miles column
     *
     * Example usage:
     * <code>
     * $query->filterByRequiredMiles(1234); // WHERE required_miles = 1234
     * $query->filterByRequiredMiles(array(12, 34)); // WHERE required_miles IN (12, 34)
     * $query->filterByRequiredMiles(array('min' => 12)); // WHERE required_miles > 12
     * </code>
     *
     * @param     mixed $requiredMiles The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function filterByRequiredMiles($requiredMiles = null, $comparison = null)
    {
        if (is_array($requiredMiles)) {
            $useMinMax = false;
            if (isset($requiredMiles['min'])) {
                $this->addUsingAlias(MilageTableMap::COL_REQUIRED_MILES, $requiredMiles['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requiredMiles['max'])) {
                $this->addUsingAlias(MilageTableMap::COL_REQUIRED_MILES, $requiredMiles['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MilageTableMap::COL_REQUIRED_MILES, $requiredMiles, $comparison);
    }

    /**
     * Filter the query on the value_in_yen column
     *
     * Example usage:
     * <code>
     * $query->filterByValueInYen(1234); // WHERE value_in_yen = 1234
     * $query->filterByValueInYen(array(12, 34)); // WHERE value_in_yen IN (12, 34)
     * $query->filterByValueInYen(array('min' => 12)); // WHERE value_in_yen > 12
     * </code>
     *
     * @param     mixed $valueInYen The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function filterByValueInYen($valueInYen = null, $comparison = null)
    {
        if (is_array($valueInYen)) {
            $useMinMax = false;
            if (isset($valueInYen['min'])) {
                $this->addUsingAlias(MilageTableMap::COL_VALUE_IN_YEN, $valueInYen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($valueInYen['max'])) {
                $this->addUsingAlias(MilageTableMap::COL_VALUE_IN_YEN, $valueInYen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MilageTableMap::COL_VALUE_IN_YEN, $valueInYen, $comparison);
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
     * @return $this|ChildMilageQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MilageTableMap::COL_DISPLAY, $display, $comparison);
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
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(MilageTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(MilageTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MilageTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildMilageQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MilageTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Store object
     *
     * @param \Store|ObjectCollection $store The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMilageQuery The current query, for fluid interface
     */
    public function filterByStore($store, $comparison = null)
    {
        if ($store instanceof \Store) {
            return $this
                ->addUsingAlias(MilageTableMap::COL_STORE_ID, $store->getStoreId(), $comparison);
        } elseif ($store instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MilageTableMap::COL_STORE_ID, $store->toKeyValue('PrimaryKey', 'StoreId'), $comparison);
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
     * @return $this|ChildMilageQuery The current query, for fluid interface
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
     * Filter the query by a related \Trip object
     *
     * @param \Trip|ObjectCollection $trip The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMilageQuery The current query, for fluid interface
     */
    public function filterByTrip($trip, $comparison = null)
    {
        if ($trip instanceof \Trip) {
            return $this
                ->addUsingAlias(MilageTableMap::COL_TRIP_ID, $trip->getTripId(), $comparison);
        } elseif ($trip instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MilageTableMap::COL_TRIP_ID, $trip->toKeyValue('PrimaryKey', 'TripId'), $comparison);
        } else {
            throw new PropelException('filterByTrip() only accepts arguments of type \Trip or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trip relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function joinTrip($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trip');

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
            $this->addJoinObject($join, 'Trip');
        }

        return $this;
    }

    /**
     * Use the Trip relation Trip object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TripQuery A secondary query class using the current class as primary query
     */
    public function useTripQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrip($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trip', '\TripQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMilage $milage Object to remove from the list of results
     *
     * @return $this|ChildMilageQuery The current query, for fluid interface
     */
    public function prune($milage = null)
    {
        if ($milage) {
            $this->addUsingAlias(MilageTableMap::COL_MILAGE_ID, $milage->getMilageId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the milage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MilageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MilageTableMap::clearInstancePool();
            MilageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MilageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MilageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MilageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MilageTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MilageQuery
