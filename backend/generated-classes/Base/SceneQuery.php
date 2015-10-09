<?php

namespace Base;

use \Scene as ChildScene;
use \SceneQuery as ChildSceneQuery;
use \Exception;
use \PDO;
use Map\SceneTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'scene' table.
 *
 * 
 *
 * @method     ChildSceneQuery orderBySceneId($order = Criteria::ASC) Order by the scene_id column
 * @method     ChildSceneQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSceneQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildSceneQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildSceneQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildSceneQuery groupBySceneId() Group by the scene_id column
 * @method     ChildSceneQuery groupByName() Group by the name column
 * @method     ChildSceneQuery groupByDescription() Group by the description column
 * @method     ChildSceneQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildSceneQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildSceneQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSceneQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSceneQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSceneQuery leftJoinMapPersonaScene($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapPersonaScene relation
 * @method     ChildSceneQuery rightJoinMapPersonaScene($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapPersonaScene relation
 * @method     ChildSceneQuery innerJoinMapPersonaScene($relationAlias = null) Adds a INNER JOIN clause to the query using the MapPersonaScene relation
 *
 * @method     ChildSceneQuery leftJoinMapSceneRewardCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapSceneRewardCategory relation
 * @method     ChildSceneQuery rightJoinMapSceneRewardCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapSceneRewardCategory relation
 * @method     ChildSceneQuery innerJoinMapSceneRewardCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the MapSceneRewardCategory relation
 *
 * @method     ChildSceneQuery leftJoinMapSceneStoreCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapSceneStoreCategory relation
 * @method     ChildSceneQuery rightJoinMapSceneStoreCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapSceneStoreCategory relation
 * @method     ChildSceneQuery innerJoinMapSceneStoreCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the MapSceneStoreCategory relation
 *
 * @method     \MapPersonaSceneQuery|\MapSceneRewardCategoryQuery|\MapSceneStoreCategoryQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildScene findOne(ConnectionInterface $con = null) Return the first ChildScene matching the query
 * @method     ChildScene findOneOrCreate(ConnectionInterface $con = null) Return the first ChildScene matching the query, or a new ChildScene object populated from the query conditions when no match is found
 *
 * @method     ChildScene findOneBySceneId(int $scene_id) Return the first ChildScene filtered by the scene_id column
 * @method     ChildScene findOneByName(string $name) Return the first ChildScene filtered by the name column
 * @method     ChildScene findOneByDescription(string $description) Return the first ChildScene filtered by the description column
 * @method     ChildScene findOneByUpdateTime(string $update_time) Return the first ChildScene filtered by the update_time column
 * @method     ChildScene findOneByUpdateUser(string $update_user) Return the first ChildScene filtered by the update_user column
 *
 * @method     ChildScene[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildScene objects based on current ModelCriteria
 * @method     ChildScene[]|ObjectCollection findBySceneId(int $scene_id) Return ChildScene objects filtered by the scene_id column
 * @method     ChildScene[]|ObjectCollection findByName(string $name) Return ChildScene objects filtered by the name column
 * @method     ChildScene[]|ObjectCollection findByDescription(string $description) Return ChildScene objects filtered by the description column
 * @method     ChildScene[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildScene objects filtered by the update_time column
 * @method     ChildScene[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildScene objects filtered by the update_user column
 * @method     ChildScene[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SceneQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of \Base\SceneQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Scene', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSceneQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSceneQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSceneQuery) {
            return $criteria;
        }
        $query = new ChildSceneQuery();
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
     * @return ChildScene|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SceneTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SceneTableMap::DATABASE_NAME);
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
     * @return ChildScene A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT scene_id, name, description, update_time, update_user FROM scene WHERE scene_id = :p0';
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
            /** @var ChildScene $obj */
            $obj = new ChildScene();
            $obj->hydrate($row);
            SceneTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildScene|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSceneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SceneTableMap::COL_SCENE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSceneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SceneTableMap::COL_SCENE_ID, $keys, Criteria::IN);
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
     * @param     mixed $sceneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSceneQuery The current query, for fluid interface
     */
    public function filterBySceneId($sceneId = null, $comparison = null)
    {
        if (is_array($sceneId)) {
            $useMinMax = false;
            if (isset($sceneId['min'])) {
                $this->addUsingAlias(SceneTableMap::COL_SCENE_ID, $sceneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sceneId['max'])) {
                $this->addUsingAlias(SceneTableMap::COL_SCENE_ID, $sceneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SceneTableMap::COL_SCENE_ID, $sceneId, $comparison);
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
     * @return $this|ChildSceneQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SceneTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSceneQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SceneTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildSceneQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(SceneTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(SceneTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SceneTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildSceneQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SceneTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \MapPersonaScene object
     *
     * @param \MapPersonaScene|ObjectCollection $mapPersonaScene  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSceneQuery The current query, for fluid interface
     */
    public function filterByMapPersonaScene($mapPersonaScene, $comparison = null)
    {
        if ($mapPersonaScene instanceof \MapPersonaScene) {
            return $this
                ->addUsingAlias(SceneTableMap::COL_SCENE_ID, $mapPersonaScene->getSceneId(), $comparison);
        } elseif ($mapPersonaScene instanceof ObjectCollection) {
            return $this
                ->useMapPersonaSceneQuery()
                ->filterByPrimaryKeys($mapPersonaScene->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapPersonaScene() only accepts arguments of type \MapPersonaScene or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapPersonaScene relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSceneQuery The current query, for fluid interface
     */
    public function joinMapPersonaScene($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapPersonaScene');

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
            $this->addJoinObject($join, 'MapPersonaScene');
        }

        return $this;
    }

    /**
     * Use the MapPersonaScene relation MapPersonaScene object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MapPersonaSceneQuery A secondary query class using the current class as primary query
     */
    public function useMapPersonaSceneQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapPersonaScene($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapPersonaScene', '\MapPersonaSceneQuery');
    }

    /**
     * Filter the query by a related \MapSceneRewardCategory object
     *
     * @param \MapSceneRewardCategory|ObjectCollection $mapSceneRewardCategory  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSceneQuery The current query, for fluid interface
     */
    public function filterByMapSceneRewardCategory($mapSceneRewardCategory, $comparison = null)
    {
        if ($mapSceneRewardCategory instanceof \MapSceneRewardCategory) {
            return $this
                ->addUsingAlias(SceneTableMap::COL_SCENE_ID, $mapSceneRewardCategory->getSceneId(), $comparison);
        } elseif ($mapSceneRewardCategory instanceof ObjectCollection) {
            return $this
                ->useMapSceneRewardCategoryQuery()
                ->filterByPrimaryKeys($mapSceneRewardCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapSceneRewardCategory() only accepts arguments of type \MapSceneRewardCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapSceneRewardCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSceneQuery The current query, for fluid interface
     */
    public function joinMapSceneRewardCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapSceneRewardCategory');

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
            $this->addJoinObject($join, 'MapSceneRewardCategory');
        }

        return $this;
    }

    /**
     * Use the MapSceneRewardCategory relation MapSceneRewardCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MapSceneRewardCategoryQuery A secondary query class using the current class as primary query
     */
    public function useMapSceneRewardCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapSceneRewardCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapSceneRewardCategory', '\MapSceneRewardCategoryQuery');
    }

    /**
     * Filter the query by a related \MapSceneStoreCategory object
     *
     * @param \MapSceneStoreCategory|ObjectCollection $mapSceneStoreCategory  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSceneQuery The current query, for fluid interface
     */
    public function filterByMapSceneStoreCategory($mapSceneStoreCategory, $comparison = null)
    {
        if ($mapSceneStoreCategory instanceof \MapSceneStoreCategory) {
            return $this
                ->addUsingAlias(SceneTableMap::COL_SCENE_ID, $mapSceneStoreCategory->getSceneId(), $comparison);
        } elseif ($mapSceneStoreCategory instanceof ObjectCollection) {
            return $this
                ->useMapSceneStoreCategoryQuery()
                ->filterByPrimaryKeys($mapSceneStoreCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapSceneStoreCategory() only accepts arguments of type \MapSceneStoreCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapSceneStoreCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSceneQuery The current query, for fluid interface
     */
    public function joinMapSceneStoreCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapSceneStoreCategory');

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
            $this->addJoinObject($join, 'MapSceneStoreCategory');
        }

        return $this;
    }

    /**
     * Use the MapSceneStoreCategory relation MapSceneStoreCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MapSceneStoreCategoryQuery A secondary query class using the current class as primary query
     */
    public function useMapSceneStoreCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapSceneStoreCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapSceneStoreCategory', '\MapSceneStoreCategoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildScene $scene Object to remove from the list of results
     *
     * @return $this|ChildSceneQuery The current query, for fluid interface
     */
    public function prune($scene = null)
    {
        if ($scene) {
            $this->addUsingAlias(SceneTableMap::COL_SCENE_ID, $scene->getSceneId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the scene table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SceneTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SceneTableMap::clearInstancePool();
            SceneTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SceneTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SceneTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            SceneTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            SceneTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SceneQuery
