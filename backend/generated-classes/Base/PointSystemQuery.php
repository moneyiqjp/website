<?php

namespace Base;

use \PointSystem as ChildPointSystem;
use \PointSystemQuery as ChildPointSystemQuery;
use \Exception;
use \PDO;
use Map\PointSystemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'point_system' table.
 *
 *
 *
 * @method     ChildPointSystemQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildPointSystemQuery orderByPointSystemName($order = Criteria::ASC) Order by the point_system_name column
 * @method     ChildPointSystemQuery orderByDefaultPointsPerYen($order = Criteria::ASC) Order by the default_points_per_yen column
 * @method     ChildPointSystemQuery orderByDefaultYenPerPoint($order = Criteria::ASC) Order by the default_yen_per_point column
 * @method     ChildPointSystemQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildPointSystemQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 * @method     ChildPointSystemQuery orderByReference($order = Criteria::ASC) Order by the reference column
 *
 * @method     ChildPointSystemQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildPointSystemQuery groupByPointSystemName() Group by the point_system_name column
 * @method     ChildPointSystemQuery groupByDefaultPointsPerYen() Group by the default_points_per_yen column
 * @method     ChildPointSystemQuery groupByDefaultYenPerPoint() Group by the default_yen_per_point column
 * @method     ChildPointSystemQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildPointSystemQuery groupByUpdateUser() Group by the update_user column
 * @method     ChildPointSystemQuery groupByReference() Group by the reference column
 *
 * @method     ChildPointSystemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPointSystemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPointSystemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPointSystemQuery leftJoinCardPointSystem($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardPointSystem relation
 * @method     ChildPointSystemQuery rightJoinCardPointSystem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardPointSystem relation
 * @method     ChildPointSystemQuery innerJoinCardPointSystem($relationAlias = null) Adds a INNER JOIN clause to the query using the CardPointSystem relation
 *
 * @method     ChildPointSystemQuery leftJoinFlightCost($relationAlias = null) Adds a LEFT JOIN clause to the query using the FlightCost relation
 * @method     ChildPointSystemQuery rightJoinFlightCost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FlightCost relation
 * @method     ChildPointSystemQuery innerJoinFlightCost($relationAlias = null) Adds a INNER JOIN clause to the query using the FlightCost relation
 *
 * @method     ChildPointSystemQuery leftJoinMileage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mileage relation
 * @method     ChildPointSystemQuery rightJoinMileage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mileage relation
 * @method     ChildPointSystemQuery innerJoinMileage($relationAlias = null) Adds a INNER JOIN clause to the query using the Mileage relation
 *
 * @method     ChildPointSystemQuery leftJoinPointAcquisition($relationAlias = null) Adds a LEFT JOIN clause to the query using the PointAcquisition relation
 * @method     ChildPointSystemQuery rightJoinPointAcquisition($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PointAcquisition relation
 * @method     ChildPointSystemQuery innerJoinPointAcquisition($relationAlias = null) Adds a INNER JOIN clause to the query using the PointAcquisition relation
 *
 * @method     ChildPointSystemQuery leftJoinPointUse($relationAlias = null) Adds a LEFT JOIN clause to the query using the PointUse relation
 * @method     ChildPointSystemQuery rightJoinPointUse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PointUse relation
 * @method     ChildPointSystemQuery innerJoinPointUse($relationAlias = null) Adds a INNER JOIN clause to the query using the PointUse relation
 *
 * @method     ChildPointSystemQuery leftJoinReward($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reward relation
 * @method     ChildPointSystemQuery rightJoinReward($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reward relation
 * @method     ChildPointSystemQuery innerJoinReward($relationAlias = null) Adds a INNER JOIN clause to the query using the Reward relation
 *
 * @method     ChildPointSystemQuery leftJoinSeason($relationAlias = null) Adds a LEFT JOIN clause to the query using the Season relation
 * @method     ChildPointSystemQuery rightJoinSeason($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Season relation
 * @method     ChildPointSystemQuery innerJoinSeason($relationAlias = null) Adds a INNER JOIN clause to the query using the Season relation
 *
 * @method     \CardPointSystemQuery|\FlightCostQuery|\MileageQuery|\PointAcquisitionQuery|\PointUseQuery|\RewardQuery|\SeasonQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPointSystem findOne(ConnectionInterface $con = null) Return the first ChildPointSystem matching the query
 * @method     ChildPointSystem findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPointSystem matching the query, or a new ChildPointSystem object populated from the query conditions when no match is found
 *
 * @method     ChildPointSystem findOneByPointSystemId(int $point_system_id) Return the first ChildPointSystem filtered by the point_system_id column
 * @method     ChildPointSystem findOneByPointSystemName(string $point_system_name) Return the first ChildPointSystem filtered by the point_system_name column
 * @method     ChildPointSystem findOneByDefaultPointsPerYen(string $default_points_per_yen) Return the first ChildPointSystem filtered by the default_points_per_yen column
 * @method     ChildPointSystem findOneByDefaultYenPerPoint(string $default_yen_per_point) Return the first ChildPointSystem filtered by the default_yen_per_point column
 * @method     ChildPointSystem findOneByUpdateTime(string $update_time) Return the first ChildPointSystem filtered by the update_time column
 * @method     ChildPointSystem findOneByUpdateUser(string $update_user) Return the first ChildPointSystem filtered by the update_user column
 * @method     ChildPointSystem findOneByReference(string $reference) Return the first ChildPointSystem filtered by the reference column
 *
 * @method     ChildPointSystem[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPointSystem objects based on current ModelCriteria
 * @method     ChildPointSystem[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildPointSystem objects filtered by the point_system_id column
 * @method     ChildPointSystem[]|ObjectCollection findByPointSystemName(string $point_system_name) Return ChildPointSystem objects filtered by the point_system_name column
 * @method     ChildPointSystem[]|ObjectCollection findByDefaultPointsPerYen(string $default_points_per_yen) Return ChildPointSystem objects filtered by the default_points_per_yen column
 * @method     ChildPointSystem[]|ObjectCollection findByDefaultYenPerPoint(string $default_yen_per_point) Return ChildPointSystem objects filtered by the default_yen_per_point column
 * @method     ChildPointSystem[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildPointSystem objects filtered by the update_time column
 * @method     ChildPointSystem[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildPointSystem objects filtered by the update_user column
 * @method     ChildPointSystem[]|ObjectCollection findByReference(string $reference) Return ChildPointSystem objects filtered by the reference column
 * @method     ChildPointSystem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PointSystemQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\PointSystemQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PointSystem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPointSystemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPointSystemQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPointSystemQuery) {
            return $criteria;
        }
        $query = new ChildPointSystemQuery();
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
     * @return ChildPointSystem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PointSystemTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PointSystemTableMap::DATABASE_NAME);
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
     * @return ChildPointSystem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT point_system_id, point_system_name, default_points_per_yen, default_yen_per_point, update_time, update_user, reference FROM point_system WHERE point_system_id = :p0';
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
            /** @var ChildPointSystem $obj */
            $obj = new ChildPointSystem();
            $obj->hydrate($row);
            PointSystemTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildPointSystem|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $keys, Criteria::IN);
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
     * @param     mixed $pointSystemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
    }

    /**
     * Filter the query on the point_system_name column
     *
     * Example usage:
     * <code>
     * $query->filterByPointSystemName('fooValue');   // WHERE point_system_name = 'fooValue'
     * $query->filterByPointSystemName('%fooValue%'); // WHERE point_system_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pointSystemName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByPointSystemName($pointSystemName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pointSystemName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pointSystemName)) {
                $pointSystemName = str_replace('*', '%', $pointSystemName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_NAME, $pointSystemName, $comparison);
    }

    /**
     * Filter the query on the default_points_per_yen column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultPointsPerYen(1234); // WHERE default_points_per_yen = 1234
     * $query->filterByDefaultPointsPerYen(array(12, 34)); // WHERE default_points_per_yen IN (12, 34)
     * $query->filterByDefaultPointsPerYen(array('min' => 12)); // WHERE default_points_per_yen > 12
     * </code>
     *
     * @param     mixed $defaultPointsPerYen The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByDefaultPointsPerYen($defaultPointsPerYen = null, $comparison = null)
    {
        if (is_array($defaultPointsPerYen)) {
            $useMinMax = false;
            if (isset($defaultPointsPerYen['min'])) {
                $this->addUsingAlias(PointSystemTableMap::COL_DEFAULT_POINTS_PER_YEN, $defaultPointsPerYen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultPointsPerYen['max'])) {
                $this->addUsingAlias(PointSystemTableMap::COL_DEFAULT_POINTS_PER_YEN, $defaultPointsPerYen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointSystemTableMap::COL_DEFAULT_POINTS_PER_YEN, $defaultPointsPerYen, $comparison);
    }

    /**
     * Filter the query on the default_yen_per_point column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultYenPerPoint(1234); // WHERE default_yen_per_point = 1234
     * $query->filterByDefaultYenPerPoint(array(12, 34)); // WHERE default_yen_per_point IN (12, 34)
     * $query->filterByDefaultYenPerPoint(array('min' => 12)); // WHERE default_yen_per_point > 12
     * </code>
     *
     * @param     mixed $defaultYenPerPoint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByDefaultYenPerPoint($defaultYenPerPoint = null, $comparison = null)
    {
        if (is_array($defaultYenPerPoint)) {
            $useMinMax = false;
            if (isset($defaultYenPerPoint['min'])) {
                $this->addUsingAlias(PointSystemTableMap::COL_DEFAULT_YEN_PER_POINT, $defaultYenPerPoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultYenPerPoint['max'])) {
                $this->addUsingAlias(PointSystemTableMap::COL_DEFAULT_YEN_PER_POINT, $defaultYenPerPoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointSystemTableMap::COL_DEFAULT_YEN_PER_POINT, $defaultYenPerPoint, $comparison);
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
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(PointSystemTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(PointSystemTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PointSystemTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PointSystemTableMap::COL_UPDATE_USER, $updateUser, $comparison);
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
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PointSystemTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query by a related \CardPointSystem object
     *
     * @param \CardPointSystem|ObjectCollection $cardPointSystem  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByCardPointSystem($cardPointSystem, $comparison = null)
    {
        if ($cardPointSystem instanceof \CardPointSystem) {
            return $this
                ->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $cardPointSystem->getPointSystemId(), $comparison);
        } elseif ($cardPointSystem instanceof ObjectCollection) {
            return $this
                ->useCardPointSystemQuery()
                ->filterByPrimaryKeys($cardPointSystem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCardPointSystem() only accepts arguments of type \CardPointSystem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CardPointSystem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function joinCardPointSystem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CardPointSystem');

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
            $this->addJoinObject($join, 'CardPointSystem');
        }

        return $this;
    }

    /**
     * Use the CardPointSystem relation CardPointSystem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CardPointSystemQuery A secondary query class using the current class as primary query
     */
    public function useCardPointSystemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCardPointSystem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CardPointSystem', '\CardPointSystemQuery');
    }

    /**
     * Filter the query by a related \FlightCost object
     *
     * @param \FlightCost|ObjectCollection $flightCost  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByFlightCost($flightCost, $comparison = null)
    {
        if ($flightCost instanceof \FlightCost) {
            return $this
                ->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $flightCost->getPointSystemId(), $comparison);
        } elseif ($flightCost instanceof ObjectCollection) {
            return $this
                ->useFlightCostQuery()
                ->filterByPrimaryKeys($flightCost->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFlightCost() only accepts arguments of type \FlightCost or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FlightCost relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function joinFlightCost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FlightCost');

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
            $this->addJoinObject($join, 'FlightCost');
        }

        return $this;
    }

    /**
     * Use the FlightCost relation FlightCost object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FlightCostQuery A secondary query class using the current class as primary query
     */
    public function useFlightCostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFlightCost($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FlightCost', '\FlightCostQuery');
    }

    /**
     * Filter the query by a related \Mileage object
     *
     * @param \Mileage|ObjectCollection $mileage  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByMileage($mileage, $comparison = null)
    {
        if ($mileage instanceof \Mileage) {
            return $this
                ->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $mileage->getPointSystemId(), $comparison);
        } elseif ($mileage instanceof ObjectCollection) {
            return $this
                ->useMileageQuery()
                ->filterByPrimaryKeys($mileage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMileage() only accepts arguments of type \Mileage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mileage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function joinMileage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mileage');

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
            $this->addJoinObject($join, 'Mileage');
        }

        return $this;
    }

    /**
     * Use the Mileage relation Mileage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MileageQuery A secondary query class using the current class as primary query
     */
    public function useMileageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMileage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mileage', '\MileageQuery');
    }

    /**
     * Filter the query by a related \PointAcquisition object
     *
     * @param \PointAcquisition|ObjectCollection $pointAcquisition  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByPointAcquisition($pointAcquisition, $comparison = null)
    {
        if ($pointAcquisition instanceof \PointAcquisition) {
            return $this
                ->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $pointAcquisition->getPointSystemId(), $comparison);
        } elseif ($pointAcquisition instanceof ObjectCollection) {
            return $this
                ->usePointAcquisitionQuery()
                ->filterByPrimaryKeys($pointAcquisition->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPointAcquisition() only accepts arguments of type \PointAcquisition or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PointAcquisition relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function joinPointAcquisition($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PointAcquisition');

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
            $this->addJoinObject($join, 'PointAcquisition');
        }

        return $this;
    }

    /**
     * Use the PointAcquisition relation PointAcquisition object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PointAcquisitionQuery A secondary query class using the current class as primary query
     */
    public function usePointAcquisitionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPointAcquisition($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PointAcquisition', '\PointAcquisitionQuery');
    }

    /**
     * Filter the query by a related \PointUse object
     *
     * @param \PointUse|ObjectCollection $pointUse  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByPointUse($pointUse, $comparison = null)
    {
        if ($pointUse instanceof \PointUse) {
            return $this
                ->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $pointUse->getPointSystemId(), $comparison);
        } elseif ($pointUse instanceof ObjectCollection) {
            return $this
                ->usePointUseQuery()
                ->filterByPrimaryKeys($pointUse->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPointUse() only accepts arguments of type \PointUse or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PointUse relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function joinPointUse($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PointUse');

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
            $this->addJoinObject($join, 'PointUse');
        }

        return $this;
    }

    /**
     * Use the PointUse relation PointUse object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PointUseQuery A secondary query class using the current class as primary query
     */
    public function usePointUseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPointUse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PointUse', '\PointUseQuery');
    }

    /**
     * Filter the query by a related \Reward object
     *
     * @param \Reward|ObjectCollection $reward  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterByReward($reward, $comparison = null)
    {
        if ($reward instanceof \Reward) {
            return $this
                ->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $reward->getPointSystemId(), $comparison);
        } elseif ($reward instanceof ObjectCollection) {
            return $this
                ->useRewardQuery()
                ->filterByPrimaryKeys($reward->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByReward() only accepts arguments of type \Reward or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Reward relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function joinReward($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Reward');

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
            $this->addJoinObject($join, 'Reward');
        }

        return $this;
    }

    /**
     * Use the Reward relation Reward object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RewardQuery A secondary query class using the current class as primary query
     */
    public function useRewardQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinReward($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Reward', '\RewardQuery');
    }

    /**
     * Filter the query by a related \Season object
     *
     * @param \Season|ObjectCollection $season  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPointSystemQuery The current query, for fluid interface
     */
    public function filterBySeason($season, $comparison = null)
    {
        if ($season instanceof \Season) {
            return $this
                ->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $season->getPointSystemId(), $comparison);
        } elseif ($season instanceof ObjectCollection) {
            return $this
                ->useSeasonQuery()
                ->filterByPrimaryKeys($season->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySeason() only accepts arguments of type \Season or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Season relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function joinSeason($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Season');

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
            $this->addJoinObject($join, 'Season');
        }

        return $this;
    }

    /**
     * Use the Season relation Season object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SeasonQuery A secondary query class using the current class as primary query
     */
    public function useSeasonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSeason($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Season', '\SeasonQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPointSystem $pointSystem Object to remove from the list of results
     *
     * @return $this|ChildPointSystemQuery The current query, for fluid interface
     */
    public function prune($pointSystem = null)
    {
        if ($pointSystem) {
            $this->addUsingAlias(PointSystemTableMap::COL_POINT_SYSTEM_ID, $pointSystem->getPointSystemId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the point_system table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PointSystemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PointSystemTableMap::clearInstancePool();
            PointSystemTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PointSystemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PointSystemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PointSystemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PointSystemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PointSystemQuery
