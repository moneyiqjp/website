<?php

namespace Base;

use \CreditCard as ChildCreditCard;
use \CreditCardQuery as ChildCreditCardQuery;
use \Exception;
use \PDO;
use Map\CreditCardTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'credit_card' table.
 *
 *
 *
 * @method     ChildCreditCardQuery orderByCreditCardId($order = Criteria::ASC) Order by the credit_card_id column
 * @method     ChildCreditCardQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCreditCardQuery orderByIssuerId($order = Criteria::ASC) Order by the issuer_id column
 * @method     ChildCreditCardQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildCreditCardQuery orderByImageLink($order = Criteria::ASC) Order by the image_link column
 * @method     ChildCreditCardQuery orderByVisa($order = Criteria::ASC) Order by the visa column
 * @method     ChildCreditCardQuery orderByMaster($order = Criteria::ASC) Order by the master column
 * @method     ChildCreditCardQuery orderByJcb($order = Criteria::ASC) Order by the jcb column
 * @method     ChildCreditCardQuery orderByAmex($order = Criteria::ASC) Order by the amex column
 * @method     ChildCreditCardQuery orderByDiners($order = Criteria::ASC) Order by the diners column
 * @method     ChildCreditCardQuery orderByAfilliateLink($order = Criteria::ASC) Order by the afilliate_link column
 * @method     ChildCreditCardQuery orderByAffiliateId($order = Criteria::ASC) Order by the affiliate_id column
 * @method     ChildCreditCardQuery orderByPointexpirymonths($order = Criteria::ASC) Order by the pointExpiryMonths column
 * @method     ChildCreditCardQuery orderByPoinyexpirydisplay($order = Criteria::ASC) Order by the poinyExpiryDisplay column
 * @method     ChildCreditCardQuery orderByIssuePeriod($order = Criteria::ASC) Order by the issue_period column
 * @method     ChildCreditCardQuery orderByCreditLimitBottom($order = Criteria::ASC) Order by the credit_limit_bottom column
 * @method     ChildCreditCardQuery orderByCreditLimitUpper($order = Criteria::ASC) Order by the credit_limit_upper column
 * @method     ChildCreditCardQuery orderByCommission($order = Criteria::ASC) Order by the commission column
 * @method     ChildCreditCardQuery orderByDebitDate($order = Criteria::ASC) Order by the debit_date column
 * @method     ChildCreditCardQuery orderByCutoffDate($order = Criteria::ASC) Order by the cutoff_date column
 * @method     ChildCreditCardQuery orderByIsactive($order = Criteria::ASC) Order by the isActive column
 * @method     ChildCreditCardQuery orderByReference($order = Criteria::ASC) Order by the reference column
 * @method     ChildCreditCardQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildCreditCardQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 *
 * @method     ChildCreditCardQuery groupByCreditCardId() Group by the credit_card_id column
 * @method     ChildCreditCardQuery groupByName() Group by the name column
 * @method     ChildCreditCardQuery groupByIssuerId() Group by the issuer_id column
 * @method     ChildCreditCardQuery groupByDescription() Group by the description column
 * @method     ChildCreditCardQuery groupByImageLink() Group by the image_link column
 * @method     ChildCreditCardQuery groupByVisa() Group by the visa column
 * @method     ChildCreditCardQuery groupByMaster() Group by the master column
 * @method     ChildCreditCardQuery groupByJcb() Group by the jcb column
 * @method     ChildCreditCardQuery groupByAmex() Group by the amex column
 * @method     ChildCreditCardQuery groupByDiners() Group by the diners column
 * @method     ChildCreditCardQuery groupByAfilliateLink() Group by the afilliate_link column
 * @method     ChildCreditCardQuery groupByAffiliateId() Group by the affiliate_id column
 * @method     ChildCreditCardQuery groupByPointexpirymonths() Group by the pointExpiryMonths column
 * @method     ChildCreditCardQuery groupByPoinyexpirydisplay() Group by the poinyExpiryDisplay column
 * @method     ChildCreditCardQuery groupByIssuePeriod() Group by the issue_period column
 * @method     ChildCreditCardQuery groupByCreditLimitBottom() Group by the credit_limit_bottom column
 * @method     ChildCreditCardQuery groupByCreditLimitUpper() Group by the credit_limit_upper column
 * @method     ChildCreditCardQuery groupByCommission() Group by the commission column
 * @method     ChildCreditCardQuery groupByDebitDate() Group by the debit_date column
 * @method     ChildCreditCardQuery groupByCutoffDate() Group by the cutoff_date column
 * @method     ChildCreditCardQuery groupByIsactive() Group by the isActive column
 * @method     ChildCreditCardQuery groupByReference() Group by the reference column
 * @method     ChildCreditCardQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildCreditCardQuery groupByUpdateUser() Group by the update_user column
 *
 * @method     ChildCreditCardQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCreditCardQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCreditCardQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCreditCardQuery leftJoinAffiliateCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateCompany relation
 * @method     ChildCreditCardQuery rightJoinAffiliateCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateCompany relation
 * @method     ChildCreditCardQuery innerJoinAffiliateCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateCompany relation
 *
 * @method     ChildCreditCardQuery leftJoinIssuer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Issuer relation
 * @method     ChildCreditCardQuery rightJoinIssuer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Issuer relation
 * @method     ChildCreditCardQuery innerJoinIssuer($relationAlias = null) Adds a INNER JOIN clause to the query using the Issuer relation
 *
 * @method     ChildCreditCardQuery leftJoinCampaign($relationAlias = null) Adds a LEFT JOIN clause to the query using the Campaign relation
 * @method     ChildCreditCardQuery rightJoinCampaign($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Campaign relation
 * @method     ChildCreditCardQuery innerJoinCampaign($relationAlias = null) Adds a INNER JOIN clause to the query using the Campaign relation
 *
 * @method     ChildCreditCardQuery leftJoinCardDescription($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardDescription relation
 * @method     ChildCreditCardQuery rightJoinCardDescription($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardDescription relation
 * @method     ChildCreditCardQuery innerJoinCardDescription($relationAlias = null) Adds a INNER JOIN clause to the query using the CardDescription relation
 *
 * @method     ChildCreditCardQuery leftJoinCardFeatures($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardFeatures relation
 * @method     ChildCreditCardQuery rightJoinCardFeatures($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardFeatures relation
 * @method     ChildCreditCardQuery innerJoinCardFeatures($relationAlias = null) Adds a INNER JOIN clause to the query using the CardFeatures relation
 *
 * @method     ChildCreditCardQuery leftJoinCardPointSystem($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardPointSystem relation
 * @method     ChildCreditCardQuery rightJoinCardPointSystem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardPointSystem relation
 * @method     ChildCreditCardQuery innerJoinCardPointSystem($relationAlias = null) Adds a INNER JOIN clause to the query using the CardPointSystem relation
 *
 * @method     ChildCreditCardQuery leftJoinCardRestriction($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardRestriction relation
 * @method     ChildCreditCardQuery rightJoinCardRestriction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardRestriction relation
 * @method     ChildCreditCardQuery innerJoinCardRestriction($relationAlias = null) Adds a INNER JOIN clause to the query using the CardRestriction relation
 *
 * @method     ChildCreditCardQuery leftJoinDiscounts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discounts relation
 * @method     ChildCreditCardQuery rightJoinDiscounts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discounts relation
 * @method     ChildCreditCardQuery innerJoinDiscounts($relationAlias = null) Adds a INNER JOIN clause to the query using the Discounts relation
 *
 * @method     ChildCreditCardQuery leftJoinFees($relationAlias = null) Adds a LEFT JOIN clause to the query using the Fees relation
 * @method     ChildCreditCardQuery rightJoinFees($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Fees relation
 * @method     ChildCreditCardQuery innerJoinFees($relationAlias = null) Adds a INNER JOIN clause to the query using the Fees relation
 *
 * @method     ChildCreditCardQuery leftJoinInsurance($relationAlias = null) Adds a LEFT JOIN clause to the query using the Insurance relation
 * @method     ChildCreditCardQuery rightJoinInsurance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Insurance relation
 * @method     ChildCreditCardQuery innerJoinInsurance($relationAlias = null) Adds a INNER JOIN clause to the query using the Insurance relation
 *
 * @method     ChildCreditCardQuery leftJoinInterest($relationAlias = null) Adds a LEFT JOIN clause to the query using the Interest relation
 * @method     ChildCreditCardQuery rightJoinInterest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Interest relation
 * @method     ChildCreditCardQuery innerJoinInterest($relationAlias = null) Adds a INNER JOIN clause to the query using the Interest relation
 *
 * @method     ChildCreditCardQuery leftJoinMapCardFeatureConstraint($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapCardFeatureConstraint relation
 * @method     ChildCreditCardQuery rightJoinMapCardFeatureConstraint($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapCardFeatureConstraint relation
 * @method     ChildCreditCardQuery innerJoinMapCardFeatureConstraint($relationAlias = null) Adds a INNER JOIN clause to the query using the MapCardFeatureConstraint relation
 *
 * @method     \AffiliateCompanyQuery|\IssuerQuery|\CampaignQuery|\CardDescriptionQuery|\CardFeaturesQuery|\CardPointSystemQuery|\CardRestrictionQuery|\DiscountsQuery|\FeesQuery|\InsuranceQuery|\InterestQuery|\MapCardFeatureConstraintQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCreditCard findOne(ConnectionInterface $con = null) Return the first ChildCreditCard matching the query
 * @method     ChildCreditCard findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCreditCard matching the query, or a new ChildCreditCard object populated from the query conditions when no match is found
 *
 * @method     ChildCreditCard findOneByCreditCardId(int $credit_card_id) Return the first ChildCreditCard filtered by the credit_card_id column
 * @method     ChildCreditCard findOneByName(string $name) Return the first ChildCreditCard filtered by the name column
 * @method     ChildCreditCard findOneByIssuerId(int $issuer_id) Return the first ChildCreditCard filtered by the issuer_id column
 * @method     ChildCreditCard findOneByDescription(string $description) Return the first ChildCreditCard filtered by the description column
 * @method     ChildCreditCard findOneByImageLink(string $image_link) Return the first ChildCreditCard filtered by the image_link column
 * @method     ChildCreditCard findOneByVisa(boolean $visa) Return the first ChildCreditCard filtered by the visa column
 * @method     ChildCreditCard findOneByMaster(boolean $master) Return the first ChildCreditCard filtered by the master column
 * @method     ChildCreditCard findOneByJcb(boolean $jcb) Return the first ChildCreditCard filtered by the jcb column
 * @method     ChildCreditCard findOneByAmex(boolean $amex) Return the first ChildCreditCard filtered by the amex column
 * @method     ChildCreditCard findOneByDiners(boolean $diners) Return the first ChildCreditCard filtered by the diners column
 * @method     ChildCreditCard findOneByAfilliateLink(string $afilliate_link) Return the first ChildCreditCard filtered by the afilliate_link column
 * @method     ChildCreditCard findOneByAffiliateId(int $affiliate_id) Return the first ChildCreditCard filtered by the affiliate_id column
 * @method     ChildCreditCard findOneByPointexpirymonths(int $pointExpiryMonths) Return the first ChildCreditCard filtered by the pointExpiryMonths column
 * @method     ChildCreditCard findOneByPoinyexpirydisplay(string $poinyExpiryDisplay) Return the first ChildCreditCard filtered by the poinyExpiryDisplay column
 * @method     ChildCreditCard findOneByIssuePeriod(int $issue_period) Return the first ChildCreditCard filtered by the issue_period column
 * @method     ChildCreditCard findOneByCreditLimitBottom(int $credit_limit_bottom) Return the first ChildCreditCard filtered by the credit_limit_bottom column
 * @method     ChildCreditCard findOneByCreditLimitUpper(int $credit_limit_upper) Return the first ChildCreditCard filtered by the credit_limit_upper column
 * @method     ChildCreditCard findOneByCommission(int $commission) Return the first ChildCreditCard filtered by the commission column
 * @method     ChildCreditCard findOneByDebitDate(string $debit_date) Return the first ChildCreditCard filtered by the debit_date column
 * @method     ChildCreditCard findOneByCutoffDate(string $cutoff_date) Return the first ChildCreditCard filtered by the cutoff_date column
 * @method     ChildCreditCard findOneByIsactive(int $isActive) Return the first ChildCreditCard filtered by the isActive column
 * @method     ChildCreditCard findOneByReference(string $reference) Return the first ChildCreditCard filtered by the reference column
 * @method     ChildCreditCard findOneByUpdateTime(string $update_time) Return the first ChildCreditCard filtered by the update_time column
 * @method     ChildCreditCard findOneByUpdateUser(string $update_user) Return the first ChildCreditCard filtered by the update_user column
 *
 * @method     ChildCreditCard[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCreditCard objects based on current ModelCriteria
 * @method     ChildCreditCard[]|ObjectCollection findByCreditCardId(int $credit_card_id) Return ChildCreditCard objects filtered by the credit_card_id column
 * @method     ChildCreditCard[]|ObjectCollection findByName(string $name) Return ChildCreditCard objects filtered by the name column
 * @method     ChildCreditCard[]|ObjectCollection findByIssuerId(int $issuer_id) Return ChildCreditCard objects filtered by the issuer_id column
 * @method     ChildCreditCard[]|ObjectCollection findByDescription(string $description) Return ChildCreditCard objects filtered by the description column
 * @method     ChildCreditCard[]|ObjectCollection findByImageLink(string $image_link) Return ChildCreditCard objects filtered by the image_link column
 * @method     ChildCreditCard[]|ObjectCollection findByVisa(boolean $visa) Return ChildCreditCard objects filtered by the visa column
 * @method     ChildCreditCard[]|ObjectCollection findByMaster(boolean $master) Return ChildCreditCard objects filtered by the master column
 * @method     ChildCreditCard[]|ObjectCollection findByJcb(boolean $jcb) Return ChildCreditCard objects filtered by the jcb column
 * @method     ChildCreditCard[]|ObjectCollection findByAmex(boolean $amex) Return ChildCreditCard objects filtered by the amex column
 * @method     ChildCreditCard[]|ObjectCollection findByDiners(boolean $diners) Return ChildCreditCard objects filtered by the diners column
 * @method     ChildCreditCard[]|ObjectCollection findByAfilliateLink(string $afilliate_link) Return ChildCreditCard objects filtered by the afilliate_link column
 * @method     ChildCreditCard[]|ObjectCollection findByAffiliateId(int $affiliate_id) Return ChildCreditCard objects filtered by the affiliate_id column
 * @method     ChildCreditCard[]|ObjectCollection findByPointexpirymonths(int $pointExpiryMonths) Return ChildCreditCard objects filtered by the pointExpiryMonths column
 * @method     ChildCreditCard[]|ObjectCollection findByPoinyexpirydisplay(string $poinyExpiryDisplay) Return ChildCreditCard objects filtered by the poinyExpiryDisplay column
 * @method     ChildCreditCard[]|ObjectCollection findByIssuePeriod(int $issue_period) Return ChildCreditCard objects filtered by the issue_period column
 * @method     ChildCreditCard[]|ObjectCollection findByCreditLimitBottom(int $credit_limit_bottom) Return ChildCreditCard objects filtered by the credit_limit_bottom column
 * @method     ChildCreditCard[]|ObjectCollection findByCreditLimitUpper(int $credit_limit_upper) Return ChildCreditCard objects filtered by the credit_limit_upper column
 * @method     ChildCreditCard[]|ObjectCollection findByCommission(int $commission) Return ChildCreditCard objects filtered by the commission column
 * @method     ChildCreditCard[]|ObjectCollection findByDebitDate(string $debit_date) Return ChildCreditCard objects filtered by the debit_date column
 * @method     ChildCreditCard[]|ObjectCollection findByCutoffDate(string $cutoff_date) Return ChildCreditCard objects filtered by the cutoff_date column
 * @method     ChildCreditCard[]|ObjectCollection findByIsactive(int $isActive) Return ChildCreditCard objects filtered by the isActive column
 * @method     ChildCreditCard[]|ObjectCollection findByReference(string $reference) Return ChildCreditCard objects filtered by the reference column
 * @method     ChildCreditCard[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildCreditCard objects filtered by the update_time column
 * @method     ChildCreditCard[]|ObjectCollection findByUpdateUser(string $update_user) Return ChildCreditCard objects filtered by the update_user column
 * @method     ChildCreditCard[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CreditCardQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\CreditCardQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CreditCard', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCreditCardQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCreditCardQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCreditCardQuery) {
            return $criteria;
        }
        $query = new ChildCreditCardQuery();
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
     * @return ChildCreditCard|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CreditCardTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CreditCardTableMap::DATABASE_NAME);
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
     * @return ChildCreditCard A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT credit_card_id, name, issuer_id, description, image_link, visa, master, jcb, amex, diners, afilliate_link, affiliate_id, pointExpiryMonths, poinyExpiryDisplay, issue_period, credit_limit_bottom, credit_limit_upper, commission, debit_date, cutoff_date, isActive, reference, update_time, update_user FROM credit_card WHERE credit_card_id = :p0';
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
            /** @var ChildCreditCard $obj */
            $obj = new ChildCreditCard();
            $obj->hydrate($row);
            CreditCardTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCreditCard|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCreditCardId($creditCardId = null, $comparison = null)
    {
        if (is_array($creditCardId)) {
            $useMinMax = false;
            if (isset($creditCardId['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $creditCardId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditCardId['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $creditCardId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $creditCardId, $comparison);
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CreditCardTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the issuer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByIssuerId(1234); // WHERE issuer_id = 1234
     * $query->filterByIssuerId(array(12, 34)); // WHERE issuer_id IN (12, 34)
     * $query->filterByIssuerId(array('min' => 12)); // WHERE issuer_id > 12
     * </code>
     *
     * @see       filterByIssuer()
     *
     * @param     mixed $issuerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByIssuerId($issuerId = null, $comparison = null)
    {
        if (is_array($issuerId)) {
            $useMinMax = false;
            if (isset($issuerId['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_ISSUER_ID, $issuerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($issuerId['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_ISSUER_ID, $issuerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_ISSUER_ID, $issuerId, $comparison);
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CreditCardTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the image_link column
     *
     * Example usage:
     * <code>
     * $query->filterByImageLink('fooValue');   // WHERE image_link = 'fooValue'
     * $query->filterByImageLink('%fooValue%'); // WHERE image_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imageLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByImageLink($imageLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $imageLink)) {
                $imageLink = str_replace('*', '%', $imageLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_IMAGE_LINK, $imageLink, $comparison);
    }

    /**
     * Filter the query on the visa column
     *
     * Example usage:
     * <code>
     * $query->filterByVisa(true); // WHERE visa = true
     * $query->filterByVisa('yes'); // WHERE visa = true
     * </code>
     *
     * @param     boolean|string $visa The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByVisa($visa = null, $comparison = null)
    {
        if (is_string($visa)) {
            $visa = in_array(strtolower($visa), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_VISA, $visa, $comparison);
    }

    /**
     * Filter the query on the master column
     *
     * Example usage:
     * <code>
     * $query->filterByMaster(true); // WHERE master = true
     * $query->filterByMaster('yes'); // WHERE master = true
     * </code>
     *
     * @param     boolean|string $master The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByMaster($master = null, $comparison = null)
    {
        if (is_string($master)) {
            $master = in_array(strtolower($master), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_MASTER, $master, $comparison);
    }

    /**
     * Filter the query on the jcb column
     *
     * Example usage:
     * <code>
     * $query->filterByJcb(true); // WHERE jcb = true
     * $query->filterByJcb('yes'); // WHERE jcb = true
     * </code>
     *
     * @param     boolean|string $jcb The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByJcb($jcb = null, $comparison = null)
    {
        if (is_string($jcb)) {
            $jcb = in_array(strtolower($jcb), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_JCB, $jcb, $comparison);
    }

    /**
     * Filter the query on the amex column
     *
     * Example usage:
     * <code>
     * $query->filterByAmex(true); // WHERE amex = true
     * $query->filterByAmex('yes'); // WHERE amex = true
     * </code>
     *
     * @param     boolean|string $amex The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByAmex($amex = null, $comparison = null)
    {
        if (is_string($amex)) {
            $amex = in_array(strtolower($amex), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_AMEX, $amex, $comparison);
    }

    /**
     * Filter the query on the diners column
     *
     * Example usage:
     * <code>
     * $query->filterByDiners(true); // WHERE diners = true
     * $query->filterByDiners('yes'); // WHERE diners = true
     * </code>
     *
     * @param     boolean|string $diners The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByDiners($diners = null, $comparison = null)
    {
        if (is_string($diners)) {
            $diners = in_array(strtolower($diners), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_DINERS, $diners, $comparison);
    }

    /**
     * Filter the query on the afilliate_link column
     *
     * Example usage:
     * <code>
     * $query->filterByAfilliateLink('fooValue');   // WHERE afilliate_link = 'fooValue'
     * $query->filterByAfilliateLink('%fooValue%'); // WHERE afilliate_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $afilliateLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByAfilliateLink($afilliateLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($afilliateLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $afilliateLink)) {
                $afilliateLink = str_replace('*', '%', $afilliateLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_AFILLIATE_LINK, $afilliateLink, $comparison);
    }

    /**
     * Filter the query on the affiliate_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAffiliateId(1234); // WHERE affiliate_id = 1234
     * $query->filterByAffiliateId(array(12, 34)); // WHERE affiliate_id IN (12, 34)
     * $query->filterByAffiliateId(array('min' => 12)); // WHERE affiliate_id > 12
     * </code>
     *
     * @see       filterByAffiliateCompany()
     *
     * @param     mixed $affiliateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByAffiliateId($affiliateId = null, $comparison = null)
    {
        if (is_array($affiliateId)) {
            $useMinMax = false;
            if (isset($affiliateId['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_AFFILIATE_ID, $affiliateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($affiliateId['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_AFFILIATE_ID, $affiliateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_AFFILIATE_ID, $affiliateId, $comparison);
    }

    /**
     * Filter the query on the pointExpiryMonths column
     *
     * Example usage:
     * <code>
     * $query->filterByPointexpirymonths(1234); // WHERE pointExpiryMonths = 1234
     * $query->filterByPointexpirymonths(array(12, 34)); // WHERE pointExpiryMonths IN (12, 34)
     * $query->filterByPointexpirymonths(array('min' => 12)); // WHERE pointExpiryMonths > 12
     * </code>
     *
     * @param     mixed $pointexpirymonths The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByPointexpirymonths($pointexpirymonths = null, $comparison = null)
    {
        if (is_array($pointexpirymonths)) {
            $useMinMax = false;
            if (isset($pointexpirymonths['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_POINTEXPIRYMONTHS, $pointexpirymonths['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointexpirymonths['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_POINTEXPIRYMONTHS, $pointexpirymonths['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_POINTEXPIRYMONTHS, $pointexpirymonths, $comparison);
    }

    /**
     * Filter the query on the poinyExpiryDisplay column
     *
     * Example usage:
     * <code>
     * $query->filterByPoinyexpirydisplay('fooValue');   // WHERE poinyExpiryDisplay = 'fooValue'
     * $query->filterByPoinyexpirydisplay('%fooValue%'); // WHERE poinyExpiryDisplay LIKE '%fooValue%'
     * </code>
     *
     * @param     string $poinyexpirydisplay The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByPoinyexpirydisplay($poinyexpirydisplay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poinyexpirydisplay)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $poinyexpirydisplay)) {
                $poinyexpirydisplay = str_replace('*', '%', $poinyexpirydisplay);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_POINYEXPIRYDISPLAY, $poinyexpirydisplay, $comparison);
    }

    /**
     * Filter the query on the issue_period column
     *
     * Example usage:
     * <code>
     * $query->filterByIssuePeriod(1234); // WHERE issue_period = 1234
     * $query->filterByIssuePeriod(array(12, 34)); // WHERE issue_period IN (12, 34)
     * $query->filterByIssuePeriod(array('min' => 12)); // WHERE issue_period > 12
     * </code>
     *
     * @param     mixed $issuePeriod The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByIssuePeriod($issuePeriod = null, $comparison = null)
    {
        if (is_array($issuePeriod)) {
            $useMinMax = false;
            if (isset($issuePeriod['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_ISSUE_PERIOD, $issuePeriod['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($issuePeriod['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_ISSUE_PERIOD, $issuePeriod['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_ISSUE_PERIOD, $issuePeriod, $comparison);
    }

    /**
     * Filter the query on the credit_limit_bottom column
     *
     * Example usage:
     * <code>
     * $query->filterByCreditLimitBottom(1234); // WHERE credit_limit_bottom = 1234
     * $query->filterByCreditLimitBottom(array(12, 34)); // WHERE credit_limit_bottom IN (12, 34)
     * $query->filterByCreditLimitBottom(array('min' => 12)); // WHERE credit_limit_bottom > 12
     * </code>
     *
     * @param     mixed $creditLimitBottom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCreditLimitBottom($creditLimitBottom = null, $comparison = null)
    {
        if (is_array($creditLimitBottom)) {
            $useMinMax = false;
            if (isset($creditLimitBottom['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_LIMIT_BOTTOM, $creditLimitBottom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditLimitBottom['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_LIMIT_BOTTOM, $creditLimitBottom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_LIMIT_BOTTOM, $creditLimitBottom, $comparison);
    }

    /**
     * Filter the query on the credit_limit_upper column
     *
     * Example usage:
     * <code>
     * $query->filterByCreditLimitUpper(1234); // WHERE credit_limit_upper = 1234
     * $query->filterByCreditLimitUpper(array(12, 34)); // WHERE credit_limit_upper IN (12, 34)
     * $query->filterByCreditLimitUpper(array('min' => 12)); // WHERE credit_limit_upper > 12
     * </code>
     *
     * @param     mixed $creditLimitUpper The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCreditLimitUpper($creditLimitUpper = null, $comparison = null)
    {
        if (is_array($creditLimitUpper)) {
            $useMinMax = false;
            if (isset($creditLimitUpper['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_LIMIT_UPPER, $creditLimitUpper['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditLimitUpper['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_LIMIT_UPPER, $creditLimitUpper['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_LIMIT_UPPER, $creditLimitUpper, $comparison);
    }

    /**
     * Filter the query on the commission column
     *
     * Example usage:
     * <code>
     * $query->filterByCommission(1234); // WHERE commission = 1234
     * $query->filterByCommission(array(12, 34)); // WHERE commission IN (12, 34)
     * $query->filterByCommission(array('min' => 12)); // WHERE commission > 12
     * </code>
     *
     * @param     mixed $commission The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCommission($commission = null, $comparison = null)
    {
        if (is_array($commission)) {
            $useMinMax = false;
            if (isset($commission['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_COMMISSION, $commission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($commission['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_COMMISSION, $commission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_COMMISSION, $commission, $comparison);
    }

    /**
     * Filter the query on the debit_date column
     *
     * Example usage:
     * <code>
     * $query->filterByDebitDate('fooValue');   // WHERE debit_date = 'fooValue'
     * $query->filterByDebitDate('%fooValue%'); // WHERE debit_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $debitDate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByDebitDate($debitDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($debitDate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $debitDate)) {
                $debitDate = str_replace('*', '%', $debitDate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_DEBIT_DATE, $debitDate, $comparison);
    }

    /**
     * Filter the query on the cutoff_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCutoffDate('fooValue');   // WHERE cutoff_date = 'fooValue'
     * $query->filterByCutoffDate('%fooValue%'); // WHERE cutoff_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cutoffDate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCutoffDate($cutoffDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cutoffDate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cutoffDate)) {
                $cutoffDate = str_replace('*', '%', $cutoffDate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_CUTOFF_DATE, $cutoffDate, $comparison);
    }

    /**
     * Filter the query on the isActive column
     *
     * Example usage:
     * <code>
     * $query->filterByIsactive(1234); // WHERE isActive = 1234
     * $query->filterByIsactive(array(12, 34)); // WHERE isActive IN (12, 34)
     * $query->filterByIsactive(array('min' => 12)); // WHERE isActive > 12
     * </code>
     *
     * @param     mixed $isactive The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByIsactive($isactive = null, $comparison = null)
    {
        if (is_array($isactive)) {
            $useMinMax = false;
            if (isset($isactive['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_ISACTIVE, $isactive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isactive['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_ISACTIVE, $isactive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_ISACTIVE, $isactive, $comparison);
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CreditCardTableMap::COL_REFERENCE, $reference, $comparison);
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(CreditCardTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CreditCardTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CreditCardTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query by a related \AffiliateCompany object
     *
     * @param \AffiliateCompany|ObjectCollection $affiliateCompany The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByAffiliateCompany($affiliateCompany, $comparison = null)
    {
        if ($affiliateCompany instanceof \AffiliateCompany) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_AFFILIATE_ID, $affiliateCompany->getAffiliateId(), $comparison);
        } elseif ($affiliateCompany instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CreditCardTableMap::COL_AFFILIATE_ID, $affiliateCompany->toKeyValue('PrimaryKey', 'AffiliateId'), $comparison);
        } else {
            throw new PropelException('filterByAffiliateCompany() only accepts arguments of type \AffiliateCompany or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AffiliateCompany relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function joinAffiliateCompany($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AffiliateCompany');

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
            $this->addJoinObject($join, 'AffiliateCompany');
        }

        return $this;
    }

    /**
     * Use the AffiliateCompany relation AffiliateCompany object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AffiliateCompanyQuery A secondary query class using the current class as primary query
     */
    public function useAffiliateCompanyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAffiliateCompany($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AffiliateCompany', '\AffiliateCompanyQuery');
    }

    /**
     * Filter the query by a related \Issuer object
     *
     * @param \Issuer|ObjectCollection $issuer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByIssuer($issuer, $comparison = null)
    {
        if ($issuer instanceof \Issuer) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_ISSUER_ID, $issuer->getIssuerId(), $comparison);
        } elseif ($issuer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CreditCardTableMap::COL_ISSUER_ID, $issuer->toKeyValue('PrimaryKey', 'IssuerId'), $comparison);
        } else {
            throw new PropelException('filterByIssuer() only accepts arguments of type \Issuer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Issuer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function joinIssuer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Issuer');

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
            $this->addJoinObject($join, 'Issuer');
        }

        return $this;
    }

    /**
     * Use the Issuer relation Issuer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \IssuerQuery A secondary query class using the current class as primary query
     */
    public function useIssuerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinIssuer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Issuer', '\IssuerQuery');
    }

    /**
     * Filter the query by a related \Campaign object
     *
     * @param \Campaign|ObjectCollection $campaign  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCampaign($campaign, $comparison = null)
    {
        if ($campaign instanceof \Campaign) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $campaign->getCreditCardId(), $comparison);
        } elseif ($campaign instanceof ObjectCollection) {
            return $this
                ->useCampaignQuery()
                ->filterByPrimaryKeys($campaign->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCampaign() only accepts arguments of type \Campaign or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Campaign relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function joinCampaign($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Campaign');

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
            $this->addJoinObject($join, 'Campaign');
        }

        return $this;
    }

    /**
     * Use the Campaign relation Campaign object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CampaignQuery A secondary query class using the current class as primary query
     */
    public function useCampaignQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCampaign($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Campaign', '\CampaignQuery');
    }

    /**
     * Filter the query by a related \CardDescription object
     *
     * @param \CardDescription|ObjectCollection $cardDescription  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCardDescription($cardDescription, $comparison = null)
    {
        if ($cardDescription instanceof \CardDescription) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $cardDescription->getCreditCardId(), $comparison);
        } elseif ($cardDescription instanceof ObjectCollection) {
            return $this
                ->useCardDescriptionQuery()
                ->filterByPrimaryKeys($cardDescription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCardDescription() only accepts arguments of type \CardDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CardDescription relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function joinCardDescription($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CardDescription');

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
            $this->addJoinObject($join, 'CardDescription');
        }

        return $this;
    }

    /**
     * Use the CardDescription relation CardDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CardDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useCardDescriptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCardDescription($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CardDescription', '\CardDescriptionQuery');
    }

    /**
     * Filter the query by a related \CardFeatures object
     *
     * @param \CardFeatures|ObjectCollection $cardFeatures  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCardFeatures($cardFeatures, $comparison = null)
    {
        if ($cardFeatures instanceof \CardFeatures) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $cardFeatures->getCreditCardId(), $comparison);
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
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
     * Filter the query by a related \CardPointSystem object
     *
     * @param \CardPointSystem|ObjectCollection $cardPointSystem  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCardPointSystem($cardPointSystem, $comparison = null)
    {
        if ($cardPointSystem instanceof \CardPointSystem) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $cardPointSystem->getCreditCardId(), $comparison);
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
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
     * Filter the query by a related \CardRestriction object
     *
     * @param \CardRestriction|ObjectCollection $cardRestriction  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByCardRestriction($cardRestriction, $comparison = null)
    {
        if ($cardRestriction instanceof \CardRestriction) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $cardRestriction->getCreditCardId(), $comparison);
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
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
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
     * Filter the query by a related \Discounts object
     *
     * @param \Discounts|ObjectCollection $discounts  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByDiscounts($discounts, $comparison = null)
    {
        if ($discounts instanceof \Discounts) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $discounts->getCreditCardId(), $comparison);
        } elseif ($discounts instanceof ObjectCollection) {
            return $this
                ->useDiscountsQuery()
                ->filterByPrimaryKeys($discounts->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscounts() only accepts arguments of type \Discounts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discounts relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function joinDiscounts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Discounts');

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
            $this->addJoinObject($join, 'Discounts');
        }

        return $this;
    }

    /**
     * Use the Discounts relation Discounts object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DiscountsQuery A secondary query class using the current class as primary query
     */
    public function useDiscountsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiscounts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discounts', '\DiscountsQuery');
    }

    /**
     * Filter the query by a related \Fees object
     *
     * @param \Fees|ObjectCollection $fees  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByFees($fees, $comparison = null)
    {
        if ($fees instanceof \Fees) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $fees->getCreditCardId(), $comparison);
        } elseif ($fees instanceof ObjectCollection) {
            return $this
                ->useFeesQuery()
                ->filterByPrimaryKeys($fees->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFees() only accepts arguments of type \Fees or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Fees relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function joinFees($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Fees');

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
            $this->addJoinObject($join, 'Fees');
        }

        return $this;
    }

    /**
     * Use the Fees relation Fees object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FeesQuery A secondary query class using the current class as primary query
     */
    public function useFeesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFees($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Fees', '\FeesQuery');
    }

    /**
     * Filter the query by a related \Insurance object
     *
     * @param \Insurance|ObjectCollection $insurance  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByInsurance($insurance, $comparison = null)
    {
        if ($insurance instanceof \Insurance) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $insurance->getCreditCardId(), $comparison);
        } elseif ($insurance instanceof ObjectCollection) {
            return $this
                ->useInsuranceQuery()
                ->filterByPrimaryKeys($insurance->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInsurance() only accepts arguments of type \Insurance or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Insurance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function joinInsurance($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Insurance');

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
            $this->addJoinObject($join, 'Insurance');
        }

        return $this;
    }

    /**
     * Use the Insurance relation Insurance object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InsuranceQuery A secondary query class using the current class as primary query
     */
    public function useInsuranceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInsurance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Insurance', '\InsuranceQuery');
    }

    /**
     * Filter the query by a related \Interest object
     *
     * @param \Interest|ObjectCollection $interest  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByInterest($interest, $comparison = null)
    {
        if ($interest instanceof \Interest) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $interest->getCreditCardId(), $comparison);
        } elseif ($interest instanceof ObjectCollection) {
            return $this
                ->useInterestQuery()
                ->filterByPrimaryKeys($interest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInterest() only accepts arguments of type \Interest or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Interest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function joinInterest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Interest');

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
            $this->addJoinObject($join, 'Interest');
        }

        return $this;
    }

    /**
     * Use the Interest relation Interest object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InterestQuery A secondary query class using the current class as primary query
     */
    public function useInterestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInterest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Interest', '\InterestQuery');
    }

    /**
     * Filter the query by a related \MapCardFeatureConstraint object
     *
     * @param \MapCardFeatureConstraint|ObjectCollection $mapCardFeatureConstraint  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCreditCardQuery The current query, for fluid interface
     */
    public function filterByMapCardFeatureConstraint($mapCardFeatureConstraint, $comparison = null)
    {
        if ($mapCardFeatureConstraint instanceof \MapCardFeatureConstraint) {
            return $this
                ->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $mapCardFeatureConstraint->getCreditCardId(), $comparison);
        } elseif ($mapCardFeatureConstraint instanceof ObjectCollection) {
            return $this
                ->useMapCardFeatureConstraintQuery()
                ->filterByPrimaryKeys($mapCardFeatureConstraint->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapCardFeatureConstraint() only accepts arguments of type \MapCardFeatureConstraint or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapCardFeatureConstraint relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function joinMapCardFeatureConstraint($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapCardFeatureConstraint');

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
            $this->addJoinObject($join, 'MapCardFeatureConstraint');
        }

        return $this;
    }

    /**
     * Use the MapCardFeatureConstraint relation MapCardFeatureConstraint object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MapCardFeatureConstraintQuery A secondary query class using the current class as primary query
     */
    public function useMapCardFeatureConstraintQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapCardFeatureConstraint($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapCardFeatureConstraint', '\MapCardFeatureConstraintQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCreditCard $creditCard Object to remove from the list of results
     *
     * @return $this|ChildCreditCardQuery The current query, for fluid interface
     */
    public function prune($creditCard = null)
    {
        if ($creditCard) {
            $this->addUsingAlias(CreditCardTableMap::COL_CREDIT_CARD_ID, $creditCard->getCreditCardId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the credit_card table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CreditCardTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CreditCardTableMap::clearInstancePool();
            CreditCardTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CreditCardTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CreditCardTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CreditCardTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CreditCardTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CreditCardQuery
