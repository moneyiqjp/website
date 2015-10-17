<?php

namespace Base;

use \CardFeatureType as ChildCardFeatureType;
use \CardFeatureTypeQuery as ChildCardFeatureTypeQuery;
use \Exception;
use \PDO;
use Map\CardFeatureTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'card_feature_type' table.
 *
 *
 *
 * @method     ChildCardFeatureTypeQuery orderByFeatureTypeId($order = Criteria::ASC) Order by the feature_type_id column
 * @method     ChildCardFeatureTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCardFeatureTypeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildCardFeatureTypeQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     ChildCardFeatureTypeQuery orderByBackgroundColor($order = Criteria::ASC) Order by the background_color column
 * @method     ChildCardFeatureTypeQuery orderByForegroundColor($order = Criteria::ASC) Order by the foreground_color column
 * @method     ChildCardFeatureTypeQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildCardFeatureTypeQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildCardFeatureTypeQuery groupByFeatureTypeId() Group by the feature_type_id column
 * @method     ChildCardFeatureTypeQuery groupByName() Group by the name column
 * @method     ChildCardFeatureTypeQuery groupByDescription() Group by the description column
 * @method     ChildCardFeatureTypeQuery groupByCategory() Group by the category column
 * @method     ChildCardFeatureTypeQuery groupByBackgroundColor() Group by the background_color column
 * @method     ChildCardFeatureTypeQuery groupByForegroundColor() Group by the foreground_color column
 * @method     ChildCardFeatureTypeQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildCardFeatureTypeQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildCardFeatureTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCardFeatureTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCardFeatureTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCardFeatureTypeQuery leftJoinCardFeatures($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardFeatures relation
 * @method     ChildCardFeatureTypeQuery rightJoinCardFeatures($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardFeatures relation
 * @method     ChildCardFeatureTypeQuery innerJoinCardFeatures($relationAlias = null) Adds a INNER JOIN clause to the query using the CardFeatures relation
 *
 * @method     ChildCardFeatureTypeQuery leftJoinMapPersonaFeatureConstraint($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapPersonaFeatureConstraint relation
 * @method     ChildCardFeatureTypeQuery rightJoinMapPersonaFeatureConstraint($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapPersonaFeatureConstraint relation
 * @method     ChildCardFeatureTypeQuery innerJoinMapPersonaFeatureConstraint($relationAlias = null) Adds a INNER JOIN clause to the query using the MapPersonaFeatureConstraint relation
 *
 * @method     \CardFeaturesQuery|\MapPersonaFeatureConstraintQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCardFeatureType findOne(ConnectionInterface $con = null) Return the first ChildCardFeatureType matching the query
 * @method     ChildCardFeatureType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCardFeatureType matching the query, or a new ChildCardFeatureType object populated from the query conditions when no match is found
 *
 * @method     ChildCardFeatureType findOneByFeatureTypeId(int $feature_type_id) Return the first ChildCardFeatureType filtered by the feature_type_id column
 * @method     ChildCardFeatureType findOneByName(string $name) Return the first ChildCardFeatureType filtered by the name column
 * @method     ChildCardFeatureType findOneByDescription(string $description) Return the first ChildCardFeatureType filtered by the description column
 * @method     ChildCardFeatureType findOneByCategory(string $category) Return the first ChildCardFeatureType filtered by the category column
 * @method     ChildCardFeatureType findOneByBackgroundColor(string $background_color) Return the first ChildCardFeatureType filtered by the background_color column
 * @method     ChildCardFeatureType findOneByForegroundColor(string $foreground_color) Return the first ChildCardFeatureType filtered by the foreground_color column
 * @method     ChildCardFeatureType findOneByUpdateTime(string $update_time) Return the first ChildCardFeatureType filtered by the update_time column
 * @method     ChildCardFeatureType findOneByUpdateUser(string $update_user) Return the first ChildCardFeatureType filtered by the update_user column
 *
 * @method     ChildCardFeatureType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCardFeatureType objects based on current ModelCriteria
 * @method     ChildCardFeatureType[]|ObjectCollection findByFeatureTypeId(int $feature_type_id) Return ChildCardFeatureType objects filtered by the feature_type_id column
 * @method     ChildCardFeatureType[]|ObjectCollection findByName(string $name) Return ChildCardFeatureType objects filtered by the name column
 * @method     ChildCardFeatureType[]|ObjectCollection findByDescription(string $description) Return ChildCardFeatureType objects filtered by the description column
 * @method     ChildCardFeatureType[]|ObjectCollection findByCategory(string $category) Return ChildCardFeatureType objects filtered by the category column
 * @method     ChildCardFeatureType[]|ObjectCollection findByBackgroundColor(string $background_color) Return ChildCardFeatureType objects filtered by the background_color column
 * @method     ChildCardFeatureType[]|ObjectCollection findByForegroundColor(string $foreground_color) Return ChildCardFeatureType objects filtered by the foreground_color column
 * @method     ChildCardFeatureType[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildCardFeatureType objects filtered by the update_time column
 * @method     ChildCardFeatureType[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildCardFeatureType objects filtered by the update_user column
 * @method     ChildCardFeatureType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CardFeatureTypeQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\CardFeatureTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CardFeatureType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCardFeatureTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCardFeatureTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCardFeatureTypeQuery) {
            return $criteria;
        }
        $query = new ChildCardFeatureTypeQuery();
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
     * @return ChildCardFeatureType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CardFeatureTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CardFeatureTypeTableMap::DATABASE_NAME);
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
     * @return ChildCardFeatureType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT feature_type_id, name, description, category, background_color, foreground_color, update_time, update_user FROM card_feature_type WHERE feature_type_id = :p0';
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
            /** @var ChildCardFeatureType $obj */
            $obj = new ChildCardFeatureType();
            $obj->hydrate($row);
            CardFeatureTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCardFeatureType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, $keys, Criteria::IN);
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
     * @param     mixed $featureTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function filterByFeatureTypeId($featureTypeId = null, $comparison = null)
    {
        if (is_array($featureTypeId)) {
            $useMinMax = false;
            if (isset($featureTypeId['min'])) {
                $this->addUsingAlias(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, $featureTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($featureTypeId['max'])) {
                $this->addUsingAlias(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, $featureTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, $featureTypeId, $comparison);
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
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the category column
     *
     * Example usage:
     * <code>
     * $query->filterByCategory('fooValue');   // WHERE category = 'fooValue'
     * $query->filterByCategory('%fooValue%'); // WHERE category LIKE '%fooValue%'
     * </code>
     *
     * @param     string $category The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function filterByCategory($category = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($category)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $category)) {
                $category = str_replace('*', '%', $category);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_CATEGORY, $category, $comparison);
    }

    /**
     * Filter the query on the background_color column
     *
     * Example usage:
     * <code>
     * $query->filterByBackgroundColor('fooValue');   // WHERE background_color = 'fooValue'
     * $query->filterByBackgroundColor('%fooValue%'); // WHERE background_color LIKE '%fooValue%'
     * </code>
     *
     * @param     string $backgroundColor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function filterByBackgroundColor($backgroundColor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($backgroundColor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $backgroundColor)) {
                $backgroundColor = str_replace('*', '%', $backgroundColor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_BACKGROUND_COLOR, $backgroundColor, $comparison);
    }

    /**
     * Filter the query on the foreground_color column
     *
     * Example usage:
     * <code>
     * $query->filterByForegroundColor('fooValue');   // WHERE foreground_color = 'fooValue'
     * $query->filterByForegroundColor('%fooValue%'); // WHERE foreground_color LIKE '%fooValue%'
     * </code>
     *
     * @param     string $foregroundColor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function filterByForegroundColor($foregroundColor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($foregroundColor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $foregroundColor)) {
                $foregroundColor = str_replace('*', '%', $foregroundColor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_FOREGROUND_COLOR, $foregroundColor, $comparison);
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
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(CardFeatureTypeTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(CardFeatureTypeTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CardFeatureTypeTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \CardFeatures object
     *
     * @param \CardFeatures|ObjectCollection $cardFeatures  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function filterByCardFeatures($cardFeatures, $comparison = null)
    {
        if ($cardFeatures instanceof \CardFeatures) {
            return $this
                ->addUsingAlias(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, $cardFeatures->getFeatureTypeId(), $comparison);
        } elseif ($cardFeatures instanceof ObjectCollection) {
            return $this
                ->useCardFeaturesQuery()
                ->filterByPrimaryKeys($cardFeatures->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCardFeatures() only accepts arguments of type \CardFeatures or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CardFeatures relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function joinCardFeatures($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CardFeatures');

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
            $this->addJoinObject($join, 'CardFeatures');
        }

        return $this;
    }

    /**
     * Use the CardFeatures relation CardFeatures object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CardFeaturesQuery A secondary query class using the current class as primary query
     */
    public function useCardFeaturesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCardFeatures($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CardFeatures', '\CardFeaturesQuery');
    }

    /**
     * Filter the query by a related \MapPersonaFeatureConstraint object
     *
     * @param \MapPersonaFeatureConstraint|ObjectCollection $mapPersonaFeatureConstraint  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function filterByMapPersonaFeatureConstraint($mapPersonaFeatureConstraint, $comparison = null)
    {
        if ($mapPersonaFeatureConstraint instanceof \MapPersonaFeatureConstraint) {
            return $this
                ->addUsingAlias(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, $mapPersonaFeatureConstraint->getFeatureTypeId(), $comparison);
        } elseif ($mapPersonaFeatureConstraint instanceof ObjectCollection) {
            return $this
                ->useMapPersonaFeatureConstraintQuery()
                ->filterByPrimaryKeys($mapPersonaFeatureConstraint->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapPersonaFeatureConstraint() only accepts arguments of type \MapPersonaFeatureConstraint or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapPersonaFeatureConstraint relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function joinMapPersonaFeatureConstraint($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapPersonaFeatureConstraint');

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
            $this->addJoinObject($join, 'MapPersonaFeatureConstraint');
        }

        return $this;
    }

    /**
     * Use the MapPersonaFeatureConstraint relation MapPersonaFeatureConstraint object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MapPersonaFeatureConstraintQuery A secondary query class using the current class as primary query
     */
    public function useMapPersonaFeatureConstraintQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapPersonaFeatureConstraint($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapPersonaFeatureConstraint', '\MapPersonaFeatureConstraintQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCardFeatureType $cardFeatureType Object to remove from the list of results
     *
     * @return $this|ChildCardFeatureTypeQuery The current query, for fluid interface
     */
    public function prune($cardFeatureType = null)
    {
        if ($cardFeatureType) {
            $this->addUsingAlias(CardFeatureTypeTableMap::COL_FEATURE_TYPE_ID, $cardFeatureType->getFeatureTypeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the card_feature_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeatureTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CardFeatureTypeTableMap::clearInstancePool();
            CardFeatureTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CardFeatureTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CardFeatureTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CardFeatureTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CardFeatureTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CardFeatureTypeQuery
