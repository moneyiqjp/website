<?php

namespace Base;

use \RestrictionType as ChildRestrictionType;
use \RestrictionTypeQuery as ChildRestrictionTypeQuery;
use \Exception;
use \PDO;
use Map\RestrictionTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'restriction_type' table.
 *
 *
 *
 * @method     ChildRestrictionTypeQuery orderByRestrictionTypeId($order = Criteria::ASC) Order by the restriction_type_id column
 * @method     ChildRestrictionTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildRestrictionTypeQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     ChildRestrictionTypeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildRestrictionTypeQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     ChildRestrictionTypeQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildRestrictionTypeQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildRestrictionTypeQuery groupByRestrictionTypeId() Group by the restriction_type_id column
 * @method     ChildRestrictionTypeQuery groupByName() Group by the name column
 * @method     ChildRestrictionTypeQuery groupByPath() Group by the path column
 * @method     ChildRestrictionTypeQuery groupByDescription() Group by the description column
 * @method     ChildRestrictionTypeQuery groupByDisplay() Group by the display column
 * @method     ChildRestrictionTypeQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildRestrictionTypeQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildRestrictionTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRestrictionTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRestrictionTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRestrictionTypeQuery leftJoinCardRestriction($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardRestriction relation
 * @method     ChildRestrictionTypeQuery rightJoinCardRestriction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardRestriction relation
 * @method     ChildRestrictionTypeQuery innerJoinCardRestriction($relationAlias = null) Adds a INNER JOIN clause to the query using the CardRestriction relation
 *
 * @method     ChildRestrictionTypeQuery leftJoinPersonaRestriction($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonaRestriction relation
 * @method     ChildRestrictionTypeQuery rightJoinPersonaRestriction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonaRestriction relation
 * @method     ChildRestrictionTypeQuery innerJoinPersonaRestriction($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonaRestriction relation
 *
 * @method     \CardRestrictionQuery|\PersonaRestrictionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRestrictionType findOne(ConnectionInterface $con = null) Return the first ChildRestrictionType matching the query
 * @method     ChildRestrictionType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRestrictionType matching the query, or a new ChildRestrictionType object populated from the query conditions when no match is found
 *
 * @method     ChildRestrictionType findOneByRestrictionTypeId(int $restriction_type_id) Return the first ChildRestrictionType filtered by the restriction_type_id column
 * @method     ChildRestrictionType findOneByName(string $name) Return the first ChildRestrictionType filtered by the name column
 * @method     ChildRestrictionType findOneByPath(string $path) Return the first ChildRestrictionType filtered by the path column
 * @method     ChildRestrictionType findOneByDescription(string $description) Return the first ChildRestrictionType filtered by the description column
 * @method     ChildRestrictionType findOneByDisplay(string $display) Return the first ChildRestrictionType filtered by the display column
 * @method     ChildRestrictionType findOneByUpdateTime(string $update_time) Return the first ChildRestrictionType filtered by the update_time column
 * @method     ChildRestrictionType findOneByUpdateUser(string $update_user) Return the first ChildRestrictionType filtered by the update_user column
 *
 * @method     ChildRestrictionType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRestrictionType objects based on current ModelCriteria
 * @method     ChildRestrictionType[]|ObjectCollection findByRestrictionTypeId(int $restriction_type_id) Return ChildRestrictionType objects filtered by the restriction_type_id column
 * @method     ChildRestrictionType[]|ObjectCollection findByName(string $name) Return ChildRestrictionType objects filtered by the name column
 * @method     ChildRestrictionType[]|ObjectCollection findByPath(string $path) Return ChildRestrictionType objects filtered by the path column
 * @method     ChildRestrictionType[]|ObjectCollection findByDescription(string $description) Return ChildRestrictionType objects filtered by the description column
 * @method     ChildRestrictionType[]|ObjectCollection findByDisplay(string $display) Return ChildRestrictionType objects filtered by the display column
 * @method     ChildRestrictionType[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildRestrictionType objects filtered by the update_time column
 * @method     ChildRestrictionType[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildRestrictionType objects filtered by the update_user column
 * @method     ChildRestrictionType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RestrictionTypeQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\RestrictionTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\RestrictionType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRestrictionTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRestrictionTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRestrictionTypeQuery) {
            return $criteria;
        }
        $query = new ChildRestrictionTypeQuery();
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
     * @return ChildRestrictionType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RestrictionTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RestrictionTypeTableMap::DATABASE_NAME);
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
     * @return ChildRestrictionType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT restriction_type_id, name, path, description, display, update_time, update_user FROM restriction_type WHERE restriction_type_id = :p0';
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
            /** @var ChildRestrictionType $obj */
            $obj = new ChildRestrictionType();
            $obj->hydrate($row);
            RestrictionTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildRestrictionType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the restriction_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRestrictionTypeId(1234); // WHERE restriction_type_id = 1234
     * $query->filterByRestrictionTypeId(array(12, 34)); // WHERE restriction_type_id IN (12, 34)
     * $query->filterByRestrictionTypeId(array('min' => 12)); // WHERE restriction_type_id > 12
     * </code>
     *
     * @param     mixed $restrictionTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function filterByRestrictionTypeId($restrictionTypeId = null, $comparison = null)
    {
        if (is_array($restrictionTypeId)) {
            $useMinMax = false;
            if (isset($restrictionTypeId['min'])) {
                $this->addUsingAlias(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, $restrictionTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($restrictionTypeId['max'])) {
                $this->addUsingAlias(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, $restrictionTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, $restrictionTypeId, $comparison);
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
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RestrictionTypeTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the path column
     *
     * Example usage:
     * <code>
     * $query->filterByPath('fooValue');   // WHERE path = 'fooValue'
     * $query->filterByPath('%fooValue%'); // WHERE path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $path The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function filterByPath($path = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($path)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $path)) {
                $path = str_replace('*', '%', $path);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RestrictionTypeTableMap::COL_PATH, $path, $comparison);
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
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RestrictionTypeTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RestrictionTypeTableMap::COL_DISPLAY, $display, $comparison);
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
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(RestrictionTypeTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(RestrictionTypeTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RestrictionTypeTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RestrictionTypeTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \CardRestriction object
     *
     * @param \CardRestriction|ObjectCollection $cardRestriction  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function filterByCardRestriction($cardRestriction, $comparison = null)
    {
        if ($cardRestriction instanceof \CardRestriction) {
            return $this
                ->addUsingAlias(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, $cardRestriction->getRestrictionTypeId(), $comparison);
        } elseif ($cardRestriction instanceof ObjectCollection) {
            return $this
                ->useCardRestrictionQuery()
                ->filterByPrimaryKeys($cardRestriction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCardRestriction() only accepts arguments of type \CardRestriction or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CardRestriction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function joinCardRestriction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CardRestriction');

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
            $this->addJoinObject($join, 'CardRestriction');
        }

        return $this;
    }

    /**
     * Use the CardRestriction relation CardRestriction object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CardRestrictionQuery A secondary query class using the current class as primary query
     */
    public function useCardRestrictionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCardRestriction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CardRestriction', '\CardRestrictionQuery');
    }

    /**
     * Filter the query by a related \PersonaRestriction object
     *
     * @param \PersonaRestriction|ObjectCollection $personaRestriction  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function filterByPersonaRestriction($personaRestriction, $comparison = null)
    {
        if ($personaRestriction instanceof \PersonaRestriction) {
            return $this
                ->addUsingAlias(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, $personaRestriction->getRestrictionTypeId(), $comparison);
        } elseif ($personaRestriction instanceof ObjectCollection) {
            return $this
                ->usePersonaRestrictionQuery()
                ->filterByPrimaryKeys($personaRestriction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPersonaRestriction() only accepts arguments of type \PersonaRestriction or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonaRestriction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function joinPersonaRestriction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonaRestriction');

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
            $this->addJoinObject($join, 'PersonaRestriction');
        }

        return $this;
    }

    /**
     * Use the PersonaRestriction relation PersonaRestriction object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PersonaRestrictionQuery A secondary query class using the current class as primary query
     */
    public function usePersonaRestrictionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersonaRestriction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonaRestriction', '\PersonaRestrictionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRestrictionType $restrictionType Object to remove from the list of results
     *
     * @return $this|ChildRestrictionTypeQuery The current query, for fluid interface
     */
    public function prune($restrictionType = null)
    {
        if ($restrictionType) {
            $this->addUsingAlias(RestrictionTypeTableMap::COL_RESTRICTION_TYPE_ID, $restrictionType->getRestrictionTypeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the restriction_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RestrictionTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RestrictionTypeTableMap::clearInstancePool();
            RestrictionTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RestrictionTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RestrictionTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RestrictionTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RestrictionTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RestrictionTypeQuery
