<?php

namespace Base;

use \MapPersonaFeatureConstraint as ChildMapPersonaFeatureConstraint;
use \MapPersonaFeatureConstraintQuery as ChildMapPersonaFeatureConstraintQuery;
use \Exception;
use \PDO;
use Map\MapPersonaFeatureConstraintTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'map_persona_feature_constraint' table.
 *
 * 
 *
 * @method     ChildMapPersonaFeatureConstraintQuery orderByPersonaId($order = Criteria::ASC) Order by the persona_id column
 * @method     ChildMapPersonaFeatureConstraintQuery orderByFeatureTypeId($order = Criteria::ASC) Order by the feature_type_id column
 * @method     ChildMapPersonaFeatureConstraintQuery orderByPriorityId($order = Criteria::ASC) Order by the priority_id column
 * @method     ChildMapPersonaFeatureConstraintQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildMapPersonaFeatureConstraintQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildMapPersonaFeatureConstraintQuery groupByPersonaId() Group by the persona_id column
 * @method     ChildMapPersonaFeatureConstraintQuery groupByFeatureTypeId() Group by the feature_type_id column
 * @method     ChildMapPersonaFeatureConstraintQuery groupByPriorityId() Group by the priority_id column
 * @method     ChildMapPersonaFeatureConstraintQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildMapPersonaFeatureConstraintQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildMapPersonaFeatureConstraintQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMapPersonaFeatureConstraintQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMapPersonaFeatureConstraintQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMapPersonaFeatureConstraintQuery leftJoinCardFeatureType($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardFeatureType relation
 * @method     ChildMapPersonaFeatureConstraintQuery rightJoinCardFeatureType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardFeatureType relation
 * @method     ChildMapPersonaFeatureConstraintQuery innerJoinCardFeatureType($relationAlias = null) Adds a INNER JOIN clause to the query using the CardFeatureType relation
 *
 * @method     ChildMapPersonaFeatureConstraintQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     ChildMapPersonaFeatureConstraintQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     ChildMapPersonaFeatureConstraintQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     \CardFeatureTypeQuery|\PersonaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMapPersonaFeatureConstraint findOne(ConnectionInterface $con = null) Return the first ChildMapPersonaFeatureConstraint matching the query
 * @method     ChildMapPersonaFeatureConstraint findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMapPersonaFeatureConstraint matching the query, or a new ChildMapPersonaFeatureConstraint object populated from the query conditions when no match is found
 *
 * @method     ChildMapPersonaFeatureConstraint findOneByPersonaId(int $persona_id) Return the first ChildMapPersonaFeatureConstraint filtered by the persona_id column
 * @method     ChildMapPersonaFeatureConstraint findOneByFeatureTypeId(int $feature_type_id) Return the first ChildMapPersonaFeatureConstraint filtered by the feature_type_id column
 * @method     ChildMapPersonaFeatureConstraint findOneByPriorityId(int $priority_id) Return the first ChildMapPersonaFeatureConstraint filtered by the priority_id column
 * @method     ChildMapPersonaFeatureConstraint findOneByUpdateTime(string $update_time) Return the first ChildMapPersonaFeatureConstraint filtered by the update_time column
 * @method     ChildMapPersonaFeatureConstraint findOneByUpdateUser(string $update_user) Return the first ChildMapPersonaFeatureConstraint filtered by the update_user column
 *
 * @method     ChildMapPersonaFeatureConstraint[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMapPersonaFeatureConstraint objects based on current ModelCriteria
 * @method     ChildMapPersonaFeatureConstraint[]|ObjectCollection findByPersonaId(int $persona_id) Return ChildMapPersonaFeatureConstraint objects filtered by the persona_id column
 * @method     ChildMapPersonaFeatureConstraint[]|ObjectCollection findByFeatureTypeId(int $feature_type_id) Return ChildMapPersonaFeatureConstraint objects filtered by the feature_type_id column
 * @method     ChildMapPersonaFeatureConstraint[]|ObjectCollection findByPriorityId(int $priority_id) Return ChildMapPersonaFeatureConstraint objects filtered by the priority_id column
 * @method     ChildMapPersonaFeatureConstraint[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildMapPersonaFeatureConstraint objects filtered by the update_time column
 * @method     ChildMapPersonaFeatureConstraint[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildMapPersonaFeatureConstraint objects filtered by the update_user column
 * @method     ChildMapPersonaFeatureConstraint[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MapPersonaFeatureConstraintQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\MapPersonaFeatureConstraintQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MapPersonaFeatureConstraint', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMapPersonaFeatureConstraintQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMapPersonaFeatureConstraintQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMapPersonaFeatureConstraintQuery) {
            return $criteria;
        }
        $query = new ChildMapPersonaFeatureConstraintQuery();
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
     * @param array[$persona_id, $feature_type_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMapPersonaFeatureConstraint|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MapPersonaFeatureConstraintTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MapPersonaFeatureConstraintTableMap::DATABASE_NAME);
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
     * @return ChildMapPersonaFeatureConstraint A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT persona_id, feature_type_id, priority_id, update_time, update_user FROM map_persona_feature_constraint WHERE persona_id = :p0 AND feature_type_id = :p1';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);            
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildMapPersonaFeatureConstraint $obj */
            $obj = new ChildMapPersonaFeatureConstraint();
            $obj->hydrate($row);
            MapPersonaFeatureConstraintTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildMapPersonaFeatureConstraint|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the persona_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonaId(1234); // WHERE persona_id = 1234
     * $query->filterByPersonaId(array(12, 34)); // WHERE persona_id IN (12, 34)
     * $query->filterByPersonaId(array('min' => 12)); // WHERE persona_id > 12
     * </code>
     *
     * @see       filterByPersona()
     *
     * @param     mixed $personaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByPersonaId($personaId = null, $comparison = null)
    {
        if (is_array($personaId)) {
            $useMinMax = false;
            if (isset($personaId['min'])) {
                $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID, $personaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personaId['max'])) {
                $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID, $personaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID, $personaId, $comparison);
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
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByFeatureTypeId($featureTypeId = null, $comparison = null)
    {
        if (is_array($featureTypeId)) {
            $useMinMax = false;
            if (isset($featureTypeId['min'])) {
                $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $featureTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($featureTypeId['max'])) {
                $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $featureTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $featureTypeId, $comparison);
    }

    /**
     * Filter the query on the priority_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPriorityId(1234); // WHERE priority_id = 1234
     * $query->filterByPriorityId(array(12, 34)); // WHERE priority_id IN (12, 34)
     * $query->filterByPriorityId(array('min' => 12)); // WHERE priority_id > 12
     * </code>
     *
     * @param     mixed $priorityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByPriorityId($priorityId = null, $comparison = null)
    {
        if (is_array($priorityId)) {
            $useMinMax = false;
            if (isset($priorityId['min'])) {
                $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_PRIORITY_ID, $priorityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priorityId['max'])) {
                $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_PRIORITY_ID, $priorityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_PRIORITY_ID, $priorityId, $comparison);
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
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \CardFeatureType object
     *
     * @param \CardFeatureType|ObjectCollection $cardFeatureType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByCardFeatureType($cardFeatureType, $comparison = null)
    {
        if ($cardFeatureType instanceof \CardFeatureType) {
            return $this
                ->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $cardFeatureType->getFeatureTypeId(), $comparison);
        } elseif ($cardFeatureType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID, $cardFeatureType->toKeyValue('PrimaryKey', 'FeatureTypeId'), $comparison);
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
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
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
     * Filter the query by a related \Persona object
     *
     * @param \Persona|ObjectCollection $persona The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof \Persona) {
            return $this
                ->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID, $persona->getPersonaId(), $comparison);
        } elseif ($persona instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID, $persona->toKeyValue('PrimaryKey', 'PersonaId'), $comparison);
        } else {
            throw new PropelException('filterByPersona() only accepts arguments of type \Persona or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Persona relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function joinPersona($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Persona');

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
            $this->addJoinObject($join, 'Persona');
        }

        return $this;
    }

    /**
     * Use the Persona relation Persona object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PersonaQuery A secondary query class using the current class as primary query
     */
    public function usePersonaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersona($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Persona', '\PersonaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMapPersonaFeatureConstraint $mapPersonaFeatureConstraint Object to remove from the list of results
     *
     * @return $this|ChildMapPersonaFeatureConstraintQuery The current query, for fluid interface
     */
    public function prune($mapPersonaFeatureConstraint = null)
    {
        if ($mapPersonaFeatureConstraint) {
            $this->addCond('pruneCond0', $this->getAliasedColName(MapPersonaFeatureConstraintTableMap::COL_PERSONA_ID), $mapPersonaFeatureConstraint->getPersonaId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(MapPersonaFeatureConstraintTableMap::COL_FEATURE_TYPE_ID), $mapPersonaFeatureConstraint->getFeatureTypeId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the map_persona_feature_constraint table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MapPersonaFeatureConstraintTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MapPersonaFeatureConstraintTableMap::clearInstancePool();
            MapPersonaFeatureConstraintTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MapPersonaFeatureConstraintTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MapPersonaFeatureConstraintTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            MapPersonaFeatureConstraintTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            MapPersonaFeatureConstraintTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MapPersonaFeatureConstraintQuery
