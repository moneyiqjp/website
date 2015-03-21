<?php

namespace Base;

use \CampaignHistory as ChildCampaignHistory;
use \CampaignHistoryQuery as ChildCampaignHistoryQuery;
use \Exception;
use \PDO;
use Map\CampaignHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'campaign_history' table.
 *
 *
 *
 * @method     ChildCampaignHistoryQuery orderByCampaignId($order = Criteria::ASC) Order by the campaign_id column
 * @method     ChildCampaignHistoryQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildCampaignHistoryQuery orderByCampaignName($order = Criteria::ASC) Order by the campaign_name column
 * @method     ChildCampaignHistoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildCampaignHistoryQuery orderByMaxPoints($order = Criteria::ASC) Order by the max_points column
 * @method     ChildCampaignHistoryQuery orderByValueInYen($order = Criteria::ASC) Order by the value_in_yen column
 * @method     ChildCampaignHistoryQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     ChildCampaignHistoryQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     ChildCampaignHistoryQuery orderByTimeBeg($order = Criteria::ASC) Order by the time_beg column
 * @method     ChildCampaignHistoryQuery orderByTimeEnd($order = Criteria::ASC) Order by the time_end column
 * @method     ChildCampaignHistoryQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildCampaignHistoryQuery groupByCampaignId() Group by the campaign_id column
 * @method     ChildCampaignHistoryQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildCampaignHistoryQuery groupByCampaignName() Group by the campaign_name column
 * @method     ChildCampaignHistoryQuery groupByDescription() Group by the description column
 * @method     ChildCampaignHistoryQuery groupByMaxPoints() Group by the max_points column
 * @method     ChildCampaignHistoryQuery groupByValueInYen() Group by the value_in_yen column
 * @method     ChildCampaignHistoryQuery groupByStartDate() Group by the start_date column
 * @method     ChildCampaignHistoryQuery groupByEndDate() Group by the end_date column
 * @method     ChildCampaignHistoryQuery groupByTimeBeg() Group by the time_beg column
 * @method     ChildCampaignHistoryQuery groupByTimeEnd() Group by the time_end column
 * @method     ChildCampaignHistoryQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildCampaignHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCampaignHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCampaignHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCampaignHistory findOne(ConnectionInterface $con = null) Return the first ChildCampaignHistory matching the query
 * @method     ChildCampaignHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCampaignHistory matching the query, or a new ChildCampaignHistory object populated from the query conditions when no match is found
 *
 * @method     ChildCampaignHistory findOneByCampaignId(int $campaign_id) Return the first ChildCampaignHistory filtered by the campaign_id column
 * @method     ChildCampaignHistory findOneByCreditCardId(int $credit_card_id) Return the first ChildCampaignHistory filtered by the credit_card_id column
 * @method     ChildCampaignHistory findOneByCampaignName(string $campaign_name) Return the first ChildCampaignHistory filtered by the campaign_name column
 * @method     ChildCampaignHistory findOneByDescription(string $description) Return the first ChildCampaignHistory filtered by the description column
 * @method     ChildCampaignHistory findOneByMaxPoints(int $max_points) Return the first ChildCampaignHistory filtered by the max_points column
 * @method     ChildCampaignHistory findOneByValueInYen(int $value_in_yen) Return the first ChildCampaignHistory filtered by the value_in_yen column
 * @method     ChildCampaignHistory findOneByStartDate(string $start_date) Return the first ChildCampaignHistory filtered by the start_date column
 * @method     ChildCampaignHistory findOneByEndDate(string $end_date) Return the first ChildCampaignHistory filtered by the end_date column
 * @method     ChildCampaignHistory findOneByTimeBeg(string $time_beg) Return the first ChildCampaignHistory filtered by the time_beg column
 * @method     ChildCampaignHistory findOneByTimeEnd(string $time_end) Return the first ChildCampaignHistory filtered by the time_end column
 * @method     ChildCampaignHistory findOneByUpdateUser(string $update_user) Return the first ChildCampaignHistory filtered by the update_user column
 *
 * @method     ChildCampaignHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCampaignHistory objects based on current ModelCriteria
 * @method     ChildCampaignHistory[]|ObjectCollection findByCampaignId(int $campaign_id) Return ChildCampaignHistory objects filtered by the campaign_id column
 * @method     ChildCampaignHistory[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildCampaignHistory objects filtered by the credit_card_id column
 * @method     ChildCampaignHistory[]|ObjectCollection findByCampaignName(string $campaign_name) Return ChildCampaignHistory objects filtered by the campaign_name column
 * @method     ChildCampaignHistory[]|ObjectCollection findByDescription(string $description) Return ChildCampaignHistory objects filtered by the description column
 * @method     ChildCampaignHistory[]|ObjectCollection findByMaxPoints(int $max_points) Return ChildCampaignHistory objects filtered by the max_points column
 * @method     ChildCampaignHistory[]|ObjectCollection findByValueInYen(int $value_in_yen) Return ChildCampaignHistory objects filtered by the value_in_yen column
 * @method     ChildCampaignHistory[]|ObjectCollection findByStartDate(string $start_date) Return ChildCampaignHistory objects filtered by the start_date column
 * @method     ChildCampaignHistory[]|ObjectCollection findByEndDate(string $end_date) Return ChildCampaignHistory objects filtered by the end_date column
 * @method     ChildCampaignHistory[]|ObjectCollection findByTimeBeg(string $time_beg) Return ChildCampaignHistory objects filtered by the time_beg column
 * @method     ChildCampaignHistory[]|ObjectCollection findByTimeEnd(string $time_end) Return ChildCampaignHistory objects filtered by the time_end column
 * @method     ChildCampaignHistory[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildCampaignHistory objects filtered by the update_user column
 * @method     ChildCampaignHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CampaignHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\CampaignHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CampaignHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCampaignHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCampaignHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCampaignHistoryQuery) {
            return $criteria;
        }
        $query = new ChildCampaignHistoryQuery();
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
     * @param array[$campaign_id, $time_beg] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCampaignHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CampaignHistoryTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CampaignHistoryTableMap::DATABASE_NAME);
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
     * @return ChildCampaignHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT campaign_id, credit_card_id, campaign_name, description, max_points, value_in_yen, start_date, end_date, time_beg, time_end, update_user FROM campaign_history WHERE campaign_id = :p0 AND time_beg = :p1';
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
            /** @var ChildCampaignHistory $obj */
            $obj = new ChildCampaignHistory();
            $obj->hydrate($row);
            CampaignHistoryTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildCampaignHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CampaignHistoryTableMap::COL_CAMPAIGN_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CampaignHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CampaignHistoryTableMap::COL_CAMPAIGN_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CampaignHistoryTableMap::COL_TIME_BEG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the campaign_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCampaignId(1234); // WHERE campaign_id = 1234
     * $query->filterByCampaignId(array(12, 34)); // WHERE campaign_id IN (12, 34)
     * $query->filterByCampaignId(array('min' => 12)); // WHERE campaign_id > 12
     * </code>
     *
     * @param     mixed $campaignId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByCampaignId($campaignId = null, $comparison = null)
    {
        if (is_array($campaignId)) {
            $useMinMax = false;
            if (isset($campaignId['min'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_CAMPAIGN_ID, $campaignId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($campaignId['max'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_CAMPAIGN_ID, $campaignId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_CAMPAIGN_ID, $campaignId, $comparison);
    }

    /**
     * Filter the query on the credit_card_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreditCardId(1234); // WHERE credit_card_id = 1234
     * $query->filterByCreditCardId(array(12, 34)); // WHERE credit_card_id IN (12, 34)
     * $query->filterByCreditCardId(array('min' => 12)); // WHERE credit_card_id > 12
     * </code>
     *
     * @param     mixed $creditCardId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
    }

    /**
     * Filter the query on the campaign_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCampaignName('fooValue');   // WHERE campaign_name = 'fooValue'
     * $query->filterByCampaignName('%fooValue%'); // WHERE campaign_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $campaignName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByCampaignName($campaignName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($campaignName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $campaignName)) {
                $campaignName = str_replace('*', '%', $campaignName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_CAMPAIGN_NAME, $campaignName, $comparison);
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
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByMaxPoints($maxPoints = null, $comparison = null)
    {
        if (is_array($maxPoints)) {
            $useMinMax = false;
            if (isset($maxPoints['min'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_MAX_POINTS, $maxPoints['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxPoints['max'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_MAX_POINTS, $maxPoints['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_MAX_POINTS, $maxPoints, $comparison);
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
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByValueInYen($valueInYen = null, $comparison = null)
    {
        if (is_array($valueInYen)) {
            $useMinMax = false;
            if (isset($valueInYen['min'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_VALUE_IN_YEN, $valueInYen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($valueInYen['max'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_VALUE_IN_YEN, $valueInYen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_VALUE_IN_YEN, $valueInYen, $comparison);
    }

    /**
     * Filter the query on the start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByStartDate('2011-03-14'); // WHERE start_date = '2011-03-14'
     * $query->filterByStartDate('now'); // WHERE start_date = '2011-03-14'
     * $query->filterByStartDate(array('max' => 'yesterday')); // WHERE start_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $startDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByStartDate($startDate = null, $comparison = null)
    {
        if (is_array($startDate)) {
            $useMinMax = false;
            if (isset($startDate['min'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_START_DATE, $startDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startDate['max'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_START_DATE, $startDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_START_DATE, $startDate, $comparison);
    }

    /**
     * Filter the query on the end_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEndDate('2011-03-14'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate('now'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate(array('max' => 'yesterday')); // WHERE end_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $endDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByEndDate($endDate = null, $comparison = null)
    {
        if (is_array($endDate)) {
            $useMinMax = false;
            if (isset($endDate['min'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endDate['max'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_END_DATE, $endDate, $comparison);
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
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeBeg($timeBeg = null, $comparison = null)
    {
        if (is_array($timeBeg)) {
            $useMinMax = false;
            if (isset($timeBeg['min'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_TIME_BEG, $timeBeg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeBeg['max'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_TIME_BEG, $timeBeg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_TIME_BEG, $timeBeg, $comparison);
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
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function filterByTimeEnd($timeEnd = null, $comparison = null)
    {
        if (is_array($timeEnd)) {
            $useMinMax = false;
            if (isset($timeEnd['min'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_TIME_END, $timeEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeEnd['max'])) {
                $this->addUsingAlias(CampaignHistoryTableMap::COL_TIME_END, $timeEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_TIME_END, $timeEnd, $comparison);
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
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CampaignHistoryTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCampaignHistory $campaignHistory Object to remove from the list of results
     *
     * @return $this|ChildCampaignHistoryQuery The current query, for fluid interface
     */
    public function prune($campaignHistory = null)
    {
        if ($campaignHistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CampaignHistoryTableMap::COL_CAMPAIGN_ID), $campaignHistory->getCampaignId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CampaignHistoryTableMap::COL_TIME_BEG), $campaignHistory->getTimeBeg(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the campaign_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CampaignHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CampaignHistoryTableMap::clearInstancePool();
            CampaignHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CampaignHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CampaignHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CampaignHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CampaignHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CampaignHistoryQuery
