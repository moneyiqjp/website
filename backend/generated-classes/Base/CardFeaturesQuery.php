<?php

namespace Base;

use \CardFeatures as ChildCardFeatures;
use \CardFeaturesQuery as ChildCardFeaturesQuery;
use \Exception;
use \PDO;
use Map\CardFeaturesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'card_features' table.
 *
 *
 *
 * @method     ChildCardFeaturesQuery orderByFeatureId($order = Criteria::ASC) Order by the feature_id column
 * @method     ChildCardFeaturesQuery orderByFeatureTypeId($order = Criteria::ASC) Order by the feature_type_id column
 * @method     ChildCardFeaturesQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildCardFeaturesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildCardFeaturesQuery orderByFeatureCost($order = Criteria::ASC) Order by the feature_cost column
 * @method     ChildCardFeaturesQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildCardFeaturesQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildCardFeaturesQuery groupByFeatureId() Group by the feature_id column
 * @method     ChildCardFeaturesQuery groupByFeatureTypeId() Group by the feature_type_id column
 * @method     ChildCardFeaturesQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildCardFeaturesQuery groupByDescription() Group by the description column
 * @method     ChildCardFeaturesQuery groupByFeatureCost() Group by the feature_cost column
 * @method     ChildCardFeaturesQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildCardFeaturesQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildCardFeaturesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCardFeaturesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCardFeaturesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCardFeaturesQuery leftJoinCreditCard($relationAlias = null) Adds a LEFT JOIN clause to the query using the CreditCard relation
 * @method     ChildCardFeaturesQuery rightJoinCreditCard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CreditCard relation
 * @method     ChildCardFeaturesQuery innerJoinCreditCard($relationAlias = null) Adds a INNER JOIN clause to the query using the CreditCard relation
 *
 * @method     ChildCardFeaturesQuery leftJoinCardFeatureType($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardFeatureType relation
 * @method     ChildCardFeaturesQuery rightJoinCardFeatureType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardFeatureType relation
 * @method     ChildCardFeaturesQuery innerJoinCardFeatureType($relationAlias = null) Adds a INNER JOIN clause to the query using the CardFeatureType relation
 *
 * @method     \CreditCardQuery|\CardFeatureTypeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCardFeatures findOne(ConnectionInterface $con = null) Return the first ChildCardFeatures matching the query
 * @method     ChildCardFeatures findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCardFeatures matching the query, or a new ChildCardFeatures object populated from the query conditions when no match is found
 *
 * @method     ChildCardFeatures findOneByFeatureId(int $feature_id) Return the first ChildCardFeatures filtered by the feature_id column
 * @method     ChildCardFeatures findOneByFeatureTypeId(int $feature_type_id) Return the first ChildCardFeatures filtered by the feature_type_id column
 * @method     ChildCardFeatures findOneByCreditCardId(int $credit_card_id) Return the first ChildCardFeatures filtered by the credit_card_id column
 * @method     ChildCardFeatures findOneByDescription(string $description) Return the first ChildCardFeatures filtered by the description column
 * @method     ChildCardFeatures findOneByFeatureCost(int $feature_cost) Return the first ChildCardFeatures filtered by the feature_cost column
 * @method     ChildCardFeatures findOneByUpdateTime(string $update_time) Return the first ChildCardFeatures filtered by the update_time column
 * @method     ChildCardFeatures findOneByUpdateUser(string $update_user) Return the first ChildCardFeatures filtered by the update_user column
 *
 * @method     ChildCardFeatures[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCardFeatures objects based on current ModelCriteria
 * @method     ChildCardFeatures[]|ObjectCollection findByFeatureId(int $feature_id) Return ChildCardFeatures objects filtered by the feature_id column
 * @method     ChildCardFeatures[]|ObjectCollection findByFeatureTypeId(int $feature_type_id) Return ChildCardFeatures objects filtered by the feature_type_id column
 * @method     ChildCardFeatures[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildCardFeatures objects filtered by the credit_card_id column
 * @method     ChildCardFeatures[]|ObjectCollection findByDescription(string $description) Return ChildCardFeatures objects filtered by the description column
 * @method     ChildCardFeatures[]|ObjectCollection findByFeatureCost(int $feature_cost) Return ChildCardFeatures objects filtered by the feature_cost column
 * @method     ChildCardFeatures[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildCardFeatures objects filtered by the update_time column
 * @method     ChildCardFeatures[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildCardFeatures objects filtered by the update_user column
 * @method     ChildCardFeatures[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CardFeaturesQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\CardFeaturesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CardFeatures', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCardFeaturesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCardFeaturesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCardFeaturesQuery) {
            return $criteria;
        }
        $query = new ChildCardFeaturesQuery();
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
     * @return ChildCardFeatures|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CardFeaturesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CardFeaturesTableMap::DATABASE_NAME);
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
     * @return ChildCardFeatures A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT feature_id, feature_type_id, credit_card_id, description, feature_cost, update_time, update_user FROM card_features WHERE feature_id = :p0';
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
            /** @var ChildCardFeatures $obj */
            $obj = new ChildCardFeatures();
            $obj->hydrate($row);
            CardFeaturesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCardFeatures|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the feature_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFeatureId(1234); // WHERE feature_id = 1234
     * $query->filterByFeatureId(array(12, 34)); // WHERE feature_id IN (12, 34)
     * $query->filterByFeatureId(array('min' => 12)); // WHERE feature_id > 12
     * </code>
     *
     * @param     mixed $featureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function filterByFeatureId($featureId = null, $comparison = null)
    {
        if (is_array($featureId)) {
            $useMinMax = false;
            if (isset($featureId['min'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_ID, $featureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($featureId['max'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_ID, $featureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_ID, $featureId, $comparison);
    }

    /**
     * Filter the query on the feature_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFeatureTypeId(1234); // WHERE feature_type_id = 1234
     * $query->filterByFeatureTypeId(array(12, 34)); // WHERE feature_type_id IN (12, 34)
     * $query->filterByFeatureTypeId(array('min' => 12)); // WHERE feature_type_id > 12
     * </code>
     *
     * @see       filterByCardFeatureType()
     *
     * @param     mixed $featureTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function filterByFeatureTypeId($featureTypeId = null, $comparison = null)
    {
        if (is_array($featureTypeId)) {
            $useMinMax = false;
            if (isset($featureTypeId['min'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_TYPE_ID, $featureTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($featureTypeId['max'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_TYPE_ID, $featureTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_TYPE_ID, $featureTypeId, $comparison);
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
     * @see       filterByCreditCard()
     *
     * @param     mixed $creditCardId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardFeaturesTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CardFeaturesTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the feature_cost column
     *
     * Example usage:
     * <code>
     * $query->filterByFeatureCost(1234); // WHERE feature_cost = 1234
     * $query->filterByFeatureCost(array(12, 34)); // WHERE feature_cost IN (12, 34)
     * $query->filterByFeatureCost(array('min' => 12)); // WHERE feature_cost > 12
     * </code>
     *
     * @param     mixed $featureCost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function filterByFeatureCost($featureCost = null, $comparison = null)
    {
        if (is_array($featureCost)) {
            $useMinMax = false;
            if (isset($featureCost['min'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_COST, $featureCost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($featureCost['max'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_COST, $featureCost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_COST, $featureCost, $comparison);
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
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(CardFeaturesTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardFeaturesTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CardFeaturesTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \CreditCard object
     *
     * @param \CreditCard|ObjectCollection $creditCard The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function filterByCreditCard($creditCard, $comparison = null)
    {
        if ($creditCard instanceof \CreditCard) {
            return $this
                ->addUsingAlias(CardFeaturesTableMap::COL_CREDIT_CARD_ID, $creditCard->getCreditCardId(), $comparison);
        } elseif ($creditCard instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CardFeaturesTableMap::COL_CREDIT_CARD_ID, $creditCard->toKeyValue('PrimaryKey', 'CreditCardId'), $comparison);
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
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
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
     * Filter the query by a related \CardFeatureType object
     *
     * @param \CardFeatureType|ObjectCollection $cardFeatureType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function filterByCardFeatureType($cardFeatureType, $comparison = null)
    {
        if ($cardFeatureType instanceof \CardFeatureType) {
            return $this
                ->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_TYPE_ID, $cardFeatureType->getFeatureTypeId(), $comparison);
        } elseif ($cardFeatureType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_TYPE_ID, $cardFeatureType->toKeyValue('PrimaryKey', 'FeatureTypeId'), $comparison);
        } else {
            throw new PropelException('filterByCardFeatureType() only accepts arguments of type \CardFeatureType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CardFeatureType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function joinCardFeatureType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CardFeatureType');

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
            $this->addJoinObject($join, 'CardFeatureType');
        }

        return $this;
    }

    /**
     * Use the CardFeatureType relation CardFeatureType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CardFeatureTypeQuery A secondary query class using the current class as primary query
     */
    public function useCardFeatureTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCardFeatureType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CardFeatureType', '\CardFeatureTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCardFeatures $cardFeatures Object to remove from the list of results
     *
     * @return $this|ChildCardFeaturesQuery The current query, for fluid interface
     */
    public function prune($cardFeatures = null)
    {
        if ($cardFeatures) {
            $this->addUsingAlias(CardFeaturesTableMap::COL_FEATURE_ID, $cardFeatures->getFeatureId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the card_features table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeaturesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CardFeaturesTableMap::clearInstancePool();
            CardFeaturesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeaturesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CardFeaturesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CardFeaturesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CardFeaturesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CardFeaturesQuery
