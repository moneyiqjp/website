<?php

namespace Base;

use \RewardHistory as ChildRewardHistory;
use \RewardHistoryQuery as ChildRewardHistoryQuery;
use \Exception;
use \PDO;
use Map\RewardHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'reward_history' table.
 *
 *
 *
 * @method     ChildRewardHistoryQuery orderByRewardId($order = Criteria::ASC) Order by the reward_id column
 * @method     ChildRewardHistoryQuery orderByPointSystemId($order = Criteria::ASC) Order by the point_system_id column
 * @method     ChildRewardHistoryQuery orderByRewardCategoryId($order = Criteria::ASC) Order by the reward_category_id column
 * @method     ChildRewardHistoryQuery orderByRewardTypeId($order = Criteria::ASC) Order by the reward_type_id column
 * @method     ChildRewardHistoryQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildRewardHistoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildRewardHistoryQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 * @method     ChildRewardHistoryQuery orderByYenPerPoint($order = Criteria::ASC) Order by the yen_per_point column
 * @method     ChildRewardHistoryQuery orderByPricePerUnit($order = Criteria::ASC) Order by the price_per_unit column
 * @method     ChildRewardHistoryQuery orderByMinPoints($order = Criteria::ASC) Order by the min_points column
 * @method     ChildRewardHistoryQuery orderByMaxPoints($order = Criteria::ASC) Order by the max_points column
 * @method     ChildRewardHistoryQuery orderByRequiredPoints($order = Criteria::ASC) Order by the required_points column
 * @method     ChildRewardHistoryQuery orderByMaxPeriod($order = Criteria::ASC) Order by the max_period column
 * @method     ChildRewardHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildRewardHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildRewardHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildRewardHistoryQuery groupByRewardId() Group by the reward_id column
 * @method     ChildRewardHistoryQuery groupByPointSystemId() Group by the point_system_id column
 * @method     ChildRewardHistoryQuery groupByRewardCategoryId() Group by the reward_category_id column
 * @method     ChildRewardHistoryQuery groupByRewardTypeId() Group by the reward_type_id column
 * @method     ChildRewardHistoryQuery groupByTitle() Group by the title column
 * @method     ChildRewardHistoryQuery groupByDescription() Group by the description column
 * @method     ChildRewardHistoryQuery groupByIcon() Group by the icon column
 * @method     ChildRewardHistoryQuery groupByYenPerPoint() Group by the yen_per_point column
 * @method     ChildRewardHistoryQuery groupByPricePerUnit() Group by the price_per_unit column
 * @method     ChildRewardHistoryQuery groupByMinPoints() Group by the min_points column
 * @method     ChildRewardHistoryQuery groupByMaxPoints() Group by the max_points column
 * @method     ChildRewardHistoryQuery groupByRequiredPoints() Group by the required_points column
 * @method     ChildRewardHistoryQuery groupByMaxPeriod() Group by the max_period column
 * @method     ChildRewardHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildRewardHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildRewardHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildRewardHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRewardHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRewardHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRewardHistory findOne(ConnectionInterface $con = null) Return the first ChildRewardHistory matching the query
 * @method     ChildRewardHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRewardHistory matching the query, or a new ChildRewardHistory object populated from the query conditions when no match is found
 *
 * @method     ChildRewardHistory findOneByRewardId(int $reward_id) Return the first ChildRewardHistory filtered by the reward_id column
 * @method     ChildRewardHistory findOneByPointSystemId(int $point_system_id) Return the first ChildRewardHistory filtered by the point_system_id column
 * @method     ChildRewardHistory findOneByRewardCategoryId(int $reward_category_id) Return the first ChildRewardHistory filtered by the reward_category_id column
 * @method     ChildRewardHistory findOneByRewardTypeId(int $reward_type_id) Return the first ChildRewardHistory filtered by the reward_type_id column
 * @method     ChildRewardHistory findOneByTitle(string $title) Return the first ChildRewardHistory filtered by the title column
 * @method     ChildRewardHistory findOneByDescription(string $description) Return the first ChildRewardHistory filtered by the description column
 * @method     ChildRewardHistory findOneByIcon(string $icon) Return the first ChildRewardHistory filtered by the icon column
 * @method     ChildRewardHistory findOneByYenPerPoint(string $yen_per_point) Return the first ChildRewardHistory filtered by the yen_per_point column
 * @method     ChildRewardHistory findOneByPricePerUnit(int $price_per_unit) Return the first ChildRewardHistory filtered by the price_per_unit column
 * @method     ChildRewardHistory findOneByMinPoints(int $min_points) Return the first ChildRewardHistory filtered by the min_points column
 * @method     ChildRewardHistory findOneByMaxPoints(int $max_points) Return the first ChildRewardHistory filtered by the max_points column
 * @method     ChildRewardHistory findOneByRequiredPoints(int $required_points) Return the first ChildRewardHistory filtered by the required_points column
 * @method     ChildRewardHistory findOneByMaxPeriod(string $max_period) Return the first ChildRewardHistory filtered by the max_period column
 * @method     ChildRewardHistory findOneByTimeBeg(string $time_beg) Return the first ChildRewardHistory filtered by the time_beg column
 * @method     ChildRewardHistory findOneByTimeEnd(string $time_end) Return the first ChildRewardHistory filtered by the time_end column
 * @method     ChildRewardHistory findOneByUpdateUser(string $update_user) Return the first ChildRewardHistory filtered by the update_user column
 *
 * @method     ChildRewardHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRewardHistory objects based on current ModelCriteria
 * @method     ChildRewardHistory[]|ObjectCollection findByRewardId(int $reward_id) Return ChildRewardHistory objects filtered by the reward_id column
 * @method     ChildRewardHistory[]|ObjectCollection findByPointSystemId(int $point_system_id) Return ChildRewardHistory objects filtered by the point_system_id column
 * @method     ChildRewardHistory[]|ObjectCollection findByRewardCategoryId(int $reward_category_id) Return ChildRewardHistory objects filtered by the reward_category_id column
 * @method     ChildRewardHistory[]|ObjectCollection findByRewardTypeId(int $reward_type_id) Return ChildRewardHistory objects filtered by the reward_type_id column
 * @method     ChildRewardHistory[]|ObjectCollection findByTitle(string $title) Return ChildRewardHistory objects filtered by the title column
 * @method     ChildRewardHistory[]|ObjectCollection findByDescription(string $description) Return ChildRewardHistory objects filtered by the description column
 * @method     ChildRewardHistory[]|ObjectCollection findByIcon(string $icon) Return ChildRewardHistory objects filtered by the icon column
 * @method     ChildRewardHistory[]|ObjectCollection findByYenPerPoint(string $yen_per_point) Return ChildRewardHistory objects filtered by the yen_per_point column
 * @method     ChildRewardHistory[]|ObjectCollection findByPricePerUnit(int $price_per_unit) Return ChildRewardHistory objects filtered by the price_per_unit column
 * @method     ChildRewardHistory[]|ObjectCollection findByMinPoints(int $min_points) Return ChildRewardHistory objects filtered by the min_points column
 * @method     ChildRewardHistory[]|ObjectCollection findByMaxPoints(int $max_points) Return ChildRewardHistory objects filtered by the max_points column
 * @method     ChildRewardHistory[]|ObjectCollection findByRequiredPoints(int $required_points) Return ChildRewardHistory objects filtered by the required_points column
 * @method     ChildRewardHistory[]|ObjectCollection findByMaxPeriod(string $max_period) Return ChildRewardHistory objects filtered by the max_period column
 * @method     ChildRewardHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildRewardHistory objects filtered by the time_beg column
 * @method     ChildRewardHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildRewardHistory objects filtered by the time_end column
 * @method     ChildRewardHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildRewardHistory objects filtered by the update_user column
 * @method     ChildRewardHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RewardHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\RewardHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\RewardHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRewardHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRewardHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRewardHistoryQuery) {
            return $criteria;
        }
        $query = new ChildRewardHistoryQuery();
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
     * @param array[$reward_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildRewardHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RewardHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RewardHistoryTableMap::DATABASE_NAME);
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
     * @return ChildRewardHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT reward_id, point_system_id, reward_category_id, reward_type_id, title, description, icon, yen_per_point, price_per_unit, min_points, max_points, required_points, max_period, time_beg, time_end, update_user FROM reward_history WHERE reward_id = :p0 AND time_beg = :p1';
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
            /** @var ChildRewardHistory $obj */
            $obj = new ChildRewardHistory();
            $obj->hydrate($row);
            RewardHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildRewardHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RewardHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RewardHistoryTableMap::COL_REWARD_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RewardHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByRewardId($rewardId = null, $comparison = null)
    {
        if (is_array($rewardId)) {
            $useMinMax = false;
            if (isset($rewardId['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_ID, $rewardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rewardId['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_ID, $rewardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_ID, $rewardId, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByPointSystemId($pointSystemId = null, $comparison = null)
    {
        if (is_array($pointSystemId)) {
            $useMinMax = false;
            if (isset($pointSystemId['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointSystemId['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_POINT_SYSTEM_ID, $pointSystemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_POINT_SYSTEM_ID, $pointSystemId, $comparison);
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
     * @param     mixed $rewardCategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByRewardCategoryId($rewardCategoryId = null, $comparison = null)
    {
        if (is_array($rewardCategoryId)) {
            $useMinMax = false;
            if (isset($rewardCategoryId['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_CATEGORY_ID, $rewardCategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rewardCategoryId['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_CATEGORY_ID, $rewardCategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_CATEGORY_ID, $rewardCategoryId, $comparison);
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
     * @param     mixed $rewardTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByRewardTypeId($rewardTypeId = null, $comparison = null)
    {
        if (is_array($rewardTypeId)) {
            $useMinMax = false;
            if (isset($rewardTypeId['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_TYPE_ID, $rewardTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rewardTypeId['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_TYPE_ID, $rewardTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_REWARD_TYPE_ID, $rewardTypeId, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardHistoryTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardHistoryTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardHistoryTableMap::COL_ICON, $icon, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByYenPerPoint($yenPerPoint = null, $comparison = null)
    {
        if (is_array($yenPerPoint)) {
            $useMinMax = false;
            if (isset($yenPerPoint['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_YEN_PER_POINT, $yenPerPoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yenPerPoint['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_YEN_PER_POINT, $yenPerPoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_YEN_PER_POINT, $yenPerPoint, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByPricePerUnit($pricePerUnit = null, $comparison = null)
    {
        if (is_array($pricePerUnit)) {
            $useMinMax = false;
            if (isset($pricePerUnit['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_PRICE_PER_UNIT, $pricePerUnit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pricePerUnit['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_PRICE_PER_UNIT, $pricePerUnit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_PRICE_PER_UNIT, $pricePerUnit, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByMinPoints($minPoints = null, $comparison = null)
    {
        if (is_array($minPoints)) {
            $useMinMax = false;
            if (isset($minPoints['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_MIN_POINTS, $minPoints['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minPoints['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_MIN_POINTS, $minPoints['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_MIN_POINTS, $minPoints, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByMaxPoints($maxPoints = null, $comparison = null)
    {
        if (is_array($maxPoints)) {
            $useMinMax = false;
            if (isset($maxPoints['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_MAX_POINTS, $maxPoints['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxPoints['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_MAX_POINTS, $maxPoints['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_MAX_POINTS, $maxPoints, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByRequiredPoints($requiredPoints = null, $comparison = null)
    {
        if (is_array($requiredPoints)) {
            $useMinMax = false;
            if (isset($requiredPoints['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_REQUIRED_POINTS, $requiredPoints['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requiredPoints['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_REQUIRED_POINTS, $requiredPoints['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_REQUIRED_POINTS, $requiredPoints, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardHistoryTableMap::COL_MAX_PERIOD, $maxPeriod, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(RewardHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RewardHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RewardHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRewardHistory $rewardHistory Object to remove from the list of results
     *
     * @return $this|ChildRewardHistoryQuery The current query, for fluid interface
     */
    public function prune($rewardHistory = null)
    {
        if ($rewardHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RewardHistoryTableMap::COL_REWARD_ID), $rewardHistory->getRewardId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RewardHistoryTableMap::COL_TIME_BEG), $rewardHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the reward_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RewardHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RewardHistoryTableMap::clearInstancePool();
            RewardHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RewardHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RewardHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RewardHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RewardHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RewardHistoryQuery
