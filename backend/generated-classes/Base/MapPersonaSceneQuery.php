<?php

namespace Base;

use \MapPersonaScene as ChildMapPersonaScene;
use \MapPersonaSceneQuery as ChildMapPersonaSceneQuery;
use \Exception;
use \PDO;
use Map\MapPersonaSceneTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'map_persona_scene' table.
 *
 *
 *
 * @method     ChildMapPersonaSceneQuery orderByPersonaId($order = Criteria::ASC) Order by the persona_id column
 * @method     ChildMapPersonaSceneQuery orderBySceneId($order = Criteria::ASC) Order by the scene_id column
 * @method     ChildMapPersonaSceneQuery orderByPriorityId($order = Criteria::ASC) Order by the priority_id column
 * @method     ChildMapPersonaSceneQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildMapPersonaSceneQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildMapPersonaSceneQuery groupByPersonaId() Group by the persona_id column
 * @method     ChildMapPersonaSceneQuery groupBySceneId() Group by the scene_id column
 * @method     ChildMapPersonaSceneQuery groupByPriorityId() Group by the priority_id column
 * @method     ChildMapPersonaSceneQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildMapPersonaSceneQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildMapPersonaSceneQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMapPersonaSceneQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMapPersonaSceneQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMapPersonaSceneQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     ChildMapPersonaSceneQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     ChildMapPersonaSceneQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     ChildMapPersonaSceneQuery leftJoinScene($relationAlias = null) Adds a LEFT JOIN clause to the query using the Scene relation
 * @method     ChildMapPersonaSceneQuery rightJoinScene($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Scene relation
 * @method     ChildMapPersonaSceneQuery innerJoinScene($relationAlias = null) Adds a INNER JOIN clause to the query using the Scene relation
 *
 * @method     \PersonaQuery|\SceneQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMapPersonaScene findOne(ConnectionInterface $con = null) Return the first ChildMapPersonaScene matching the query
 * @method     ChildMapPersonaScene findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMapPersonaScene matching the query, or a new ChildMapPersonaScene object populated from the query conditions when no match is found
 *
 * @method     ChildMapPersonaScene findOneByPersonaId(int $persona_id) Return the first ChildMapPersonaScene filtered by the persona_id column
 * @method     ChildMapPersonaScene findOneBySceneId(int $scene_id) Return the first ChildMapPersonaScene filtered by the scene_id column
 * @method     ChildMapPersonaScene findOneByPriorityId(int $priority_id) Return the first ChildMapPersonaScene filtered by the priority_id column
 * @method     ChildMapPersonaScene findOneByUpdateTime(string $update_time) Return the first ChildMapPersonaScene filtered by the update_time column
 * @method     ChildMapPersonaScene findOneByUpdateUser(string $update_user) Return the first ChildMapPersonaScene filtered by the update_user column
 *
 * @method     ChildMapPersonaScene[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMapPersonaScene objects based on current ModelCriteria
 * @method     ChildMapPersonaScene[]|ObjectCollection findByPersonaId(int $persona_id) Return ChildMapPersonaScene objects filtered by the persona_id column
 * @method     ChildMapPersonaScene[]|ObjectCollection findBySceneId(int $scene_id) Return ChildMapPersonaScene objects filtered by the scene_id column
 * @method     ChildMapPersonaScene[]|ObjectCollection findByPriorityId(int $priority_id) Return ChildMapPersonaScene objects filtered by the priority_id column
 * @method     ChildMapPersonaScene[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildMapPersonaScene objects filtered by the update_time column
 * @method     ChildMapPersonaScene[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildMapPersonaScene objects filtered by the update_user column
 * @method     ChildMapPersonaScene[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MapPersonaSceneQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\MapPersonaSceneQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MapPersonaScene', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMapPersonaSceneQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMapPersonaSceneQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMapPersonaSceneQuery) {
            return $criteria;
        }
        $query = new ChildMapPersonaSceneQuery();
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
     * @param array[$persona_id, $scene_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMapPersonaScene|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MapPersonaSceneTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MapPersonaSceneTableMap::DATABASE_NAME);
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
     * @return ChildMapPersonaScene A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT persona_id, scene_id, priority_id, update_time, update_user FROM map_persona_scene WHERE persona_id = :p0 AND scene_id = :p1';
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
            /** @var ChildMapPersonaScene $obj */
            $obj = new ChildMapPersonaScene();
            $obj->hydrate($row);
            MapPersonaSceneTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildMapPersonaScene|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(MapPersonaSceneTableMap::COL_PERSONA_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(MapPersonaSceneTableMap::COL_SCENE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(MapPersonaSceneTableMap::COL_PERSONA_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(MapPersonaSceneTableMap::COL_SCENE_ID, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function filterByPersonaId($personaId = null, $comparison = null)
    {
        if (is_array($personaId)) {
            $useMinMax = false;
            if (isset($personaId['min'])) {
                $this->addUsingAlias(MapPersonaSceneTableMap::COL_PERSONA_ID, $personaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personaId['max'])) {
                $this->addUsingAlias(MapPersonaSceneTableMap::COL_PERSONA_ID, $personaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapPersonaSceneTableMap::COL_PERSONA_ID, $personaId, $comparison);
    }

    /**
     * Filter the query on the scene_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySceneId(1234); // WHERE scene_id = 1234
     * $query->filterBySceneId(array(12, 34)); // WHERE scene_id IN (12, 34)
     * $query->filterBySceneId(array('min' => 12)); // WHERE scene_id > 12
     * </code>
     *
     * @see       filterByScene()
     *
     * @param     mixed $sceneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function filterBySceneId($sceneId = null, $comparison = null)
    {
        if (is_array($sceneId)) {
            $useMinMax = false;
            if (isset($sceneId['min'])) {
                $this->addUsingAlias(MapPersonaSceneTableMap::COL_SCENE_ID, $sceneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sceneId['max'])) {
                $this->addUsingAlias(MapPersonaSceneTableMap::COL_SCENE_ID, $sceneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapPersonaSceneTableMap::COL_SCENE_ID, $sceneId, $comparison);
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
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function filterByPriorityId($priorityId = null, $comparison = null)
    {
        if (is_array($priorityId)) {
            $useMinMax = false;
            if (isset($priorityId['min'])) {
                $this->addUsingAlias(MapPersonaSceneTableMap::COL_PRIORITY_ID, $priorityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priorityId['max'])) {
                $this->addUsingAlias(MapPersonaSceneTableMap::COL_PRIORITY_ID, $priorityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapPersonaSceneTableMap::COL_PRIORITY_ID, $priorityId, $comparison);
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
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(MapPersonaSceneTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(MapPersonaSceneTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapPersonaSceneTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MapPersonaSceneTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \Persona object
     *
     * @param \Persona|ObjectCollection $persona The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof \Persona) {
            return $this
                ->addUsingAlias(MapPersonaSceneTableMap::COL_PERSONA_ID, $persona->getPersonaId(), $comparison);
        } elseif ($persona instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MapPersonaSceneTableMap::COL_PERSONA_ID, $persona->toKeyValue('PrimaryKey', 'PersonaId'), $comparison);
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
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
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
     * Filter the query by a related \Scene object
     *
     * @param \Scene|ObjectCollection $scene The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function filterByScene($scene, $comparison = null)
    {
        if ($scene instanceof \Scene) {
            return $this
                ->addUsingAlias(MapPersonaSceneTableMap::COL_SCENE_ID, $scene->getSceneId(), $comparison);
        } elseif ($scene instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MapPersonaSceneTableMap::COL_SCENE_ID, $scene->toKeyValue('PrimaryKey', 'SceneId'), $comparison);
        } else {
            throw new PropelException('filterByScene() only accepts arguments of type \Scene or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Scene relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function joinScene($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Scene');

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
            $this->addJoinObject($join, 'Scene');
        }

        return $this;
    }

    /**
     * Use the Scene relation Scene object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SceneQuery A secondary query class using the current class as primary query
     */
    public function useSceneQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinScene($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Scene', '\SceneQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMapPersonaScene $mapPersonaScene Object to remove from the list of results
     *
     * @return $this|ChildMapPersonaSceneQuery The current query, for fluid interface
     */
    public function prune($mapPersonaScene = null)
    {
        if ($mapPersonaScene) {
            $this->addCond('pruneCond0', $this->getAliasedColName(MapPersonaSceneTableMap::COL_PERSONA_ID), $mapPersonaScene->getPersonaId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(MapPersonaSceneTableMap::COL_SCENE_ID), $mapPersonaScene->getSceneId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the map_persona_scene table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MapPersonaSceneTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MapPersonaSceneTableMap::clearInstancePool();
            MapPersonaSceneTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MapPersonaSceneTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MapPersonaSceneTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MapPersonaSceneTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MapPersonaSceneTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MapPersonaSceneQuery
