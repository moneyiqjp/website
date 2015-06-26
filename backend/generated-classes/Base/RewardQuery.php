<?php

namespace Base;

use \Reward as ChildReward;
use \RewardQuery as ChildRewardQuery;
use \Exception;
use \PDO;
use Map\RewardTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'reward' table.
 *
 *
 *
 * @method     ChildRewardQuery orderByRewardId($order = Criteria::ASC) Order by the reward_id column
 * @method     ChildRewardQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildRewardQuery orderByRewardCategoryId($order = Criteria::ASC) Order by the reward_category_id column
 * @method     ChildRewardQuery orderByRewardTypeId($order = Criteria::ASC) Order by the reward_type_id column
 * @method     ChildRewardQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildRewardQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildRewardQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 * @method     ChildRewardQuery orderByYenPerPoint($order = Criteria::ASC) Order by the yen_per_point column
 * @method     ChildRewardQuery orderByPricePerUnit($order = Criteria::ASC) Order by the price_per_unit column
 * @method     ChildRewardQuery orderByMinPoints($order = Criteria::ASC) Order by the min_points column
 * @method     ChildRewardQuery orderByMaxPoints($order = Criteria::ASC) Order by the max_points column
 * @method     ChildRewardQuery orderByRequiredPoints($order = Criteria::ASC) Order by the required_points column
 * @method     ChildRewardQuery orderByMaxPeriod($order = Criteria::ASC) Order by the max_period column
 * @method     ChildRewardQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildRewardQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildRewardQuery groupByRewardId() Group by the reward_id column
 * @method     ChildRewardQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildRewardQuery groupByRewardCategoryId() Group by the reward_category_id column
 * @method     ChildRewardQuery groupByRewardTypeId() Group by the reward_type_id column
 * @method     ChildRewardQuery groupByTitle() Group by the title column
 * @method     ChildRewardQuery groupByDescription() Group by the description column
 * @method     ChildRewardQuery groupByIcon() Group by the icon column
 * @method     ChildRewardQuery groupByYenPerPoint() Group by the yen_per_point column
 * @method     ChildRewardQuery groupByPricePerUnit() Group by the price_per_unit column
 * @method     ChildRewardQuery groupByMinPoints() Group by the min_points column
 * @method     ChildRewardQuery groupByMaxPoints() Group by the max_points column
 * @method     ChildRewardQuery groupByRequiredPoints() Group by the required_points column
 * @method     ChildRewardQuery groupByMaxPeriod() Group by the max_period column
 * @method     ChildRewardQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildRewardQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildRewardQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRewardQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRewardQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRewardQuery leftJoinRewardCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the RewardCategory relation
 * @method     ChildRewardQuery rightJoinRewardCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RewardCategory relation
 * @method     ChildRewardQuery innerJoinRewardCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the RewardCategory relation
 *
 * @method     ChildRewardQuery leftJoinPointSystem($relationAlias = null) Adds a LEFT JOIN clause to the query using the PointSystem relation
 * @method     ChildRewardQuery rightJoinPointSystem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PointSystem relation
 * @method     ChildRewardQuery innerJoinPointSystem($relationAlias = null) Adds a INNER JOIN clause to the query using the PointSystem relation
 *
 * @method     ChildRewardQuery leftJoinRewardType($relationAlias = null) Adds a LEFT JOIN clause to the query using the RewardType relation
 * @method     ChildRewardQuery rightJoinRewardType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RewardType relation
 * @method     ChildRewardQuery innerJoinRewardType($relationAlias = null) Adds a INNER JOIN clause to the query using the RewardType relation
 *
 * @method     \RewardCategoryQuery|\PointSystemQuery|\RewardTypeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildReward findOne(ConnectionInterface $con = null) Return the first ChildReward matching the query
 * @method     ChildReward findOneOrCreate(ConnectionInterface $con = null) Return the first ChildReward matching the query, or a new ChildReward object populated from the query conditions when no match is found
 *
 * @method     ChildReward findOneByRewardId(int $reward_id) Return the first ChildReward filtered by the reward_id column
 * @method     ChildReward findOneByPointSystemId(int $point_system_id) Return the first ChildReward filtered by the point_system_id column
 * @method     ChildReward findOneByRewardCategoryId(int $reward_category_id) Return the first ChildReward filtered by the reward_category_id column
 * @method     ChildReward findOneByRewardTypeId(int $reward_type_id) Return the first ChildReward filtered by the reward_type_id column
 * @method     ChildReward findOneByTitle(string $title) Return the first ChildReward filtered by the title column
 * @method     ChildReward findOneByDescription(string $description) Return the first ChildReward filtered by the description column
 * @method     ChildReward findOneByIcon(string $icon) Return the first ChildReward filtered by the icon column
 * @method     ChildReward findOneByYenPerPoint(string $yen_per_point) Return the first ChildReward filtered by the yen_per_point column
 * @method     ChildReward findOneByPricePerUnit(int $price_per_unit) Return the first ChildReward filtered by the price_per_unit column
 * @method     ChildReward findOneByMinPoints(int $min_points) Return the first ChildReward filtered by the min_points column
 * @method     ChildReward findOneByMaxPoints(int $max_points) Return the first ChildReward filtered by the max_points column
 * @method     ChildReward findOneByRequiredPoints(int $required_points) Return the first ChildReward filtered by the required_points column
 * @method     ChildReward findOneByMaxPeriod(string $max_period) Return the first ChildReward filtered by the max_period column
 * @method     ChildReward findOneByUpdateTime(string $update_time) Return the first ChildReward filtered by the update_time column
 * @method     ChildReward findOneByUpdateUser(string $update_user) Return the first ChildReward filtered by the update_user column
 *
 * @method     ChildReward[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildReward objects based on current ModelCriteria
 * @method     ChildReward[]|ObjectCollection findByRewardId(int $reward_id) Return ChildReward objects filtered by the reward_id column
 * @method     ChildReward[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildReward objects filtered by the point_system_id column
 * @method     ChildReward[]|ObjectCollection findByRewardCategoryId(int $reward_category_id) Return ChildReward objects filtered by the reward_category_id column
 * @method     ChildReward[]|ObjectCollection findByRewardTypeId(int $reward_type_id) Return ChildReward objects filtered by the reward_type_id column
 * @method     ChildReward[]|ObjectCollection findByTitle(string $title) Return ChildReward objects filtered by the title column
 * @method     ChildReward[]|ObjectCollection findByDescription(string $description) Return ChildReward objects filtered by the description column
 * @method     ChildReward[]|ObjectCollection findByIcon(string $icon) Return ChildReward objects filtered by the icon column
 * @method     ChildReward[]|ObjectCollection findByYenPerPoint(string $yen_per_point) Return ChildReward objects filtered by the yen_per_point column
 * @method     ChildReward[]|ObjectCollection findByPricePerUnit(int $price_per_unit) Return ChildReward objects filtered by the price_per_unit column
 * @method     ChildReward[]|ObjectCollection findByMinPoints(int $min_points) Return ChildReward objects filtered by the min_points column
 * @method     ChildReward[]|ObjectCollection findByMaxPoints(int $max_points) Return ChildReward objects filtered by the max_points column
 * @method     ChildReward[]|ObjectCollection findByRequiredPoints(int $required_points) Return ChildReward objects filtered by the required_points column
 * @method     ChildReward[]|ObjectCollection findByMaxPeriod(string $max_period) Return ChildReward objects filtered by the max_period column
 * @method     ChildReward[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildReward objects filtered by the update_time column
 * @method     ChildReward[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildReward objects filtered by the update_user column
 * @method     ChildReward[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RewardQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\RewardQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Reward', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRewardQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRewardQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRewardQuery) {
            return $criteria;
        }
        $query = new ChildRewardQuery();
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
     * @return ChildReward|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RewardTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RewardTableMap::DATABASE_NAME);
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
     * @return ChildReward A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT reward_id, point_system_id, reward_category_id, reward_type_id, title, description, icon, yen_per_point, price_per_unit, min_points, max_points, required_points, max_period, update_time, update_user FROM reward WHERE reward_id = :p0';
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
            /** @var ChildReward $obj */
            $obj = new ChildReward();
            $obj->hydrate($row);
            RewardTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildReward|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RewardTableMap::COL_REWARD_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RewardTableMap::COL_REWARD_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the reward_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRewardId(1234); // WHERE reward_id = 1234
     * $query->filterByRewardId(array(12, 34)); // WHERE reward_id IN (12, 34)
     * $query->filterByRewardId(array('min' => 12)); // WHERE reward_id > 12
     * </code>
     *
     * @param     mixed $rewardId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByRewardId($rewardId = null, $comparison = null)
    {
        if (is_array($rewardId)) {
            $useMinMax = false;
            if (isset($rewardId['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_REWARD_ID, $rewardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rewardId['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_REWARD_ID, $rewardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_REWARD_ID, $rewardId, $comparison);
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
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
    }

    /**
     * Filter the query on the reward_category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRewardCategoryId(1234); // WHERE reward_category_id = 1234
     * $query->filterByRewardCategoryId(array(12, 34)); // WHERE reward_category_id IN (12, 34)
     * $query->filterByRewardCategoryId(array('min' => 12)); // WHERE reward_category_id > 12
     * </code>
     *
     * @see       filterByRewardCategory()
     *
     * @param     mixed $rewardCategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByRewardCategoryId($rewardCategoryId = null, $comparison = null)
    {
        if (is_array($rewardCategoryId)) {
            $useMinMax = false;
            if (isset($rewardCategoryId['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_REWARD_CATEGORY_ID, $rewardCategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rewardCategoryId['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_REWARD_CATEGORY_ID, $rewardCategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_REWARD_CATEGORY_ID, $rewardCategoryId, $comparison);
    }

    /**
     * Filter the query on the reward_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRewardTypeId(1234); // WHERE reward_type_id = 1234
     * $query->filterByRewardTypeId(array(12, 34)); // WHERE reward_type_id IN (12, 34)
     * $query->filterByRewardTypeId(array('min' => 12)); // WHERE reward_type_id > 12
     * </code>
     *
     * @see       filterByRewardType()
     *
     * @param     mixed $rewardTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByRewardTypeId($rewardTypeId = null, $comparison = null)
    {
        if (is_array($rewardTypeId)) {
            $useMinMax = false;
            if (isset($rewardTypeId['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_REWARD_TYPE_ID, $rewardTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rewardTypeId['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_REWARD_TYPE_ID, $rewardTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_REWARD_TYPE_ID, $rewardTypeId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildRewardQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the icon column
     *
     * Example usage:
     * <code>
     * $query->filterByIcon('fooValue');   // WHERE icon = 'fooValue'
     * $query->filterByIcon('%fooValue%'); // WHERE icon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByIcon($icon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $icon)) {
                $icon = str_replace('*', '%', $icon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_ICON, $icon, $comparison);
    }

    /**
     * Filter the query on the yen_per_point column
     *
     * Example usage:
     * <code>
     * $query->filterByYenPerPoint(1234); // WHERE yen_per_point = 1234
     * $query->filterByYenPerPoint(array(12, 34)); // WHERE yen_per_point IN (12, 34)
     * $query->filterByYenPerPoint(array('min' => 12)); // WHERE yen_per_point > 12
     * </code>
     *
     * @param     mixed $yenPerPoint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByYenPerPoint($yenPerPoint = null, $comparison = null)
    {
        if (is_array($yenPerPoint)) {
            $useMinMax = false;
            if (isset($yenPerPoint['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_YEN_PER_POINT, $yenPerPoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yenPerPoint['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_YEN_PER_POINT, $yenPerPoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_YEN_PER_POINT, $yenPerPoint, $comparison);
    }

    /**
     * Filter the query on the price_per_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByPricePerUnit(1234); // WHERE price_per_unit = 1234
     * $query->filterByPricePerUnit(array(12, 34)); // WHERE price_per_unit IN (12, 34)
     * $query->filterByPricePerUnit(array('min' => 12)); // WHERE price_per_unit > 12
     * </code>
     *
     * @param     mixed $pricePerUnit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByPricePerUnit($pricePerUnit = null, $comparison = null)
    {
        if (is_array($pricePerUnit)) {
            $useMinMax = false;
            if (isset($pricePerUnit['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_PRICE_PER_UNIT, $pricePerUnit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pricePerUnit['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_PRICE_PER_UNIT, $pricePerUnit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_PRICE_PER_UNIT, $pricePerUnit, $comparison);
    }

    /**
     * Filter the query on the min_points column
     *
     * Example usage:
     * <code>
     * $query->filterByMinPoints(1234); // WHERE min_points = 1234
     * $query->filterByMinPoints(array(12, 34)); // WHERE min_points IN (12, 34)
     * $query->filterByMinPoints(array('min' => 12)); // WHERE min_points > 12
     * </code>
     *
     * @param     mixed $minPoints The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByMinPoints($minPoints = null, $comparison = null)
    {
        if (is_array($minPoints)) {
            $useMinMax = false;
            if (isset($minPoints['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_MIN_POINTS, $minPoints['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minPoints['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_MIN_POINTS, $minPoints['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_MIN_POINTS, $minPoints, $comparison);
    }

    /**
     * Filter the query on the max_points column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxPoints(1234); // WHERE max_points = 1234
     * $query->filterByMaxPoints(array(12, 34)); // WHERE max_points IN (12, 34)
     * $query->filterByMaxPoints(array('min' => 12)); // WHERE max_points > 12
     * </code>
     *
     * @param     mixed $maxPoints The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByMaxPoints($maxPoints = null, $comparison = null)
    {
        if (is_array($maxPoints)) {
            $useMinMax = false;
            if (isset($maxPoints['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_MAX_POINTS, $maxPoints['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxPoints['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_MAX_POINTS, $maxPoints['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_MAX_POINTS, $maxPoints, $comparison);
    }

    /**
     * Filter the query on the required_points column
     *
     * Example usage:
     * <code>
     * $query->filterByRequiredPoints(1234); // WHERE required_points = 1234
     * $query->filterByRequiredPoints(array(12, 34)); // WHERE required_points IN (12, 34)
     * $query->filterByRequiredPoints(array('min' => 12)); // WHERE required_points > 12
     * </code>
     *
     * @param     mixed $requiredPoints The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByRequiredPoints($requiredPoints = null, $comparison = null)
    {
        if (is_array($requiredPoints)) {
            $useMinMax = false;
            if (isset($requiredPoints['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_REQUIRED_POINTS, $requiredPoints['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requiredPoints['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_REQUIRED_POINTS, $requiredPoints['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_REQUIRED_POINTS, $requiredPoints, $comparison);
    }

    /**
     * Filter the query on the max_period column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxPeriod('fooValue');   // WHERE max_period = 'fooValue'
     * $query->filterByMaxPeriod('%fooValue%'); // WHERE max_period LIKE '%fooValue%'
     * </code>
     *
     * @param     string $maxPeriod The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByMaxPeriod($maxPeriod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($maxPeriod)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $maxPeriod)) {
                $maxPeriod = str_replace('*', '%', $maxPeriod);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_MAX_PERIOD, $maxPeriod, $comparison);
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
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(RewardTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(RewardTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildRewardQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \RewardCategory object
     *
     * @param \RewardCategory|ObjectCollection $rewardCategory The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRewardQuery The current query, for fluid interface
     */
    public function filterByRewardCategory($rewardCategory, $comparison = null)
    {
        if ($rewardCategory instanceof \RewardCategory) {
            return $this
                ->addUsingAlias(RewardTableMap::COL_REWARD_CATEGORY_ID, $rewardCategory->getRewardCategoryId(), $comparison);
        } elseif ($rewardCategory instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RewardTableMap::COL_REWARD_CATEGORY_ID, $rewardCategory->toKeyValue('PrimaryKey', 'RewardCategoryId'), $comparison);
        } else {
            throw new PropelException('filterByRewardCategory() only accepts arguments of type \RewardCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RewardCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function joinRewardCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RewardCategory');

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
            $this->addJoinObject($join, 'RewardCategory');
        }

        return $this;
    }

    /**
     * Use the RewardCategory relation RewardCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RewardCategoryQuery A secondary query class using the current class as primary query
     */
    public function useRewardCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRewardCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RewardCategory', '\RewardCategoryQuery');
    }

    /**
     * Filter the query by a related \PointSystem object
     *
     * @param \PointSystem|ObjectCollection $pointSystem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRewardQuery The current query, for fluid interface
     */
    public function filterByPointSystem($pointSystem, $comparison = null)
    {
        if ($pointSystem instanceof \PointSystem) {
            return $this
                ->addUsingAlias(RewardTableMap::COL_POINT_SYSTEM_ID, $pointSystem->getPointSystemId(), $comparison);
        } elseif ($pointSystem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RewardTableMap::COL_POINT_SYSTEM_ID, $pointSystem->toKeyValue('PrimaryKey', 'PointSystemId'), $comparison);
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
     * @return $this|ChildRewardQuery The current query, for fluid interface
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
     * Filter the query by a related \RewardType object
     *
     * @param \RewardType|ObjectCollection $rewardType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRewardQuery The current query, for fluid interface
     */
    public function filterByRewardType($rewardType, $comparison = null)
    {
        if ($rewardType instanceof \RewardType) {
            return $this
                ->addUsingAlias(RewardTableMap::COL_REWARD_TYPE_ID, $rewardType->getRewardTypeId(), $comparison);
        } elseif ($rewardType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RewardTableMap::COL_REWARD_TYPE_ID, $rewardType->toKeyValue('PrimaryKey', 'RewardTypeId'), $comparison);
        } else {
            throw new PropelException('filterByRewardType() only accepts arguments of type \RewardType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RewardType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function joinRewardType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RewardType');

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
            $this->addJoinObject($join, 'RewardType');
        }

        return $this;
    }

    /**
     * Use the RewardType relation RewardType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RewardTypeQuery A secondary query class using the current class as primary query
     */
    public function useRewardTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRewardType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RewardType', '\RewardTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildReward $reward Object to remove from the list of results
     *
     * @return $this|ChildRewardQuery The current query, for fluid interface
     */
    public function prune($reward = null)
    {
        if ($reward) {
            $this->addUsingAlias(RewardTableMap::COL_REWARD_ID, $reward->getRewardId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the reward table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RewardTableMap::clearInstancePool();
            RewardTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RewardTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RewardTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RewardTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RewardTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RewardQuery
