<?php

namespace Base;

use \AffiliateCompany as ChildAffiliateCompany;
use \AffiliateCompanyQuery as ChildAffiliateCompanyQuery;
use \Campaign as ChildCampaign;
use \CampaignQuery as ChildCampaignQuery;
use \CardDescription as ChildCardDescription;
use \CardDescriptionQuery as ChildCardDescriptionQuery;
use \CardFeatures as ChildCardFeatures;
use \CardFeaturesQuery as ChildCardFeaturesQuery;
use \CardPointSystem as ChildCardPointSystem;
use \CardPointSystemQuery as ChildCardPointSystemQuery;
use \CardRestriction as ChildCardRestriction;
use \CardRestrictionQuery as ChildCardRestrictionQuery;
use \CreditCard as ChildCreditCard;
use \CreditCardQuery as ChildCreditCardQuery;
use \Discounts as ChildDiscounts;
use \DiscountsQuery as ChildDiscountsQuery;
use \Fees as ChildFees;
use \FeesQuery as ChildFeesQuery;
use \Insurance as ChildInsurance;
use \InsuranceQuery as ChildInsuranceQuery;
use \Interest as ChildInterest;
use \InterestQuery as ChildInterestQuery;
use \Issuer as ChildIssuer;
use \IssuerQuery as ChildIssuerQuery;
use \MapCardFeatureConstraint as ChildMapCardFeatureConstraint;
use \MapCardFeatureConstraintQuery as ChildMapCardFeatureConstraintQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\CreditCardTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'credit_card' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class CreditCard implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CreditCardTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the credit_card_id field.
     * @var        int
     */
    protected $credit_card_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the issuer_id field.
     * @var        int
     */
    protected $issuer_id;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the image_link field.
     * @var        string
     */
    protected $image_link;

    /**
     * The value for the visa field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $visa;

    /**
     * The value for the master field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $master;

    /**
     * The value for the jcb field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $jcb;

    /**
     * The value for the amex field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $amex;

    /**
     * The value for the diners field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $diners;

    /**
     * The value for the afilliate_link field.
     * @var        string
     */
    protected $afilliate_link;

    /**
     * The value for the affiliate_id field.
     * @var        int
     */
    protected $affiliate_id;

    /**
     * The value for the pointexpirymonths field.
     * Note: this column has a database default value of: 12
     * @var        int
     */
    protected $pointexpirymonths;

    /**
     * The value for the reference field.
     * @var        string
     */
    protected $reference;

    /**
     * The value for the commission field.
     * @var        int
     */
    protected $commission;

    /**
     * The value for the isactive field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $isactive;

    /**
     * The value for the update_time field.
     * @var        \DateTime
     */
    protected $update_time;

    /**
     * The value for the update_user field.
     * @var        string
     */
    protected $update_user;

    /**
     * @var        ChildAffiliateCompany
     */
    protected $aAffiliateCompany;

    /**
     * @var        ChildIssuer
     */
    protected $aIssuer;

    /**
     * @var        ObjectCollection|ChildCampaign[] Collection to store aggregation of ChildCampaign objects.
     */
    protected $collCampaigns;
    protected $collCampaignsPartial;

    /**
     * @var        ObjectCollection|ChildCardDescription[] Collection to store aggregation of ChildCardDescription objects.
     */
    protected $collCardDescriptions;
    protected $collCardDescriptionsPartial;

    /**
     * @var        ObjectCollection|ChildCardFeatures[] Collection to store aggregation of ChildCardFeatures objects.
     */
    protected $collCardFeaturess;
    protected $collCardFeaturessPartial;

    /**
     * @var        ObjectCollection|ChildCardPointSystem[] Collection to store aggregation of ChildCardPointSystem objects.
     */
    protected $collCardPointSystems;
    protected $collCardPointSystemsPartial;

    /**
     * @var        ObjectCollection|ChildCardRestriction[] Collection to store aggregation of ChildCardRestriction objects.
     */
    protected $collCardRestrictions;
    protected $collCardRestrictionsPartial;

    /**
     * @var        ObjectCollection|ChildDiscounts[] Collection to store aggregation of ChildDiscounts objects.
     */
    protected $collDiscountss;
    protected $collDiscountssPartial;

    /**
     * @var        ObjectCollection|ChildFees[] Collection to store aggregation of ChildFees objects.
     */
    protected $collFeess;
    protected $collFeessPartial;

    /**
     * @var        ObjectCollection|ChildInsurance[] Collection to store aggregation of ChildInsurance objects.
     */
    protected $collInsurances;
    protected $collInsurancesPartial;

    /**
     * @var        ObjectCollection|ChildInterest[] Collection to store aggregation of ChildInterest objects.
     */
    protected $collInterests;
    protected $collInterestsPartial;

    /**
     * @var        ObjectCollection|ChildMapCardFeatureConstraint[] Collection to store aggregation of ChildMapCardFeatureConstraint objects.
     */
    protected $collMapCardFeatureConstraints;
    protected $collMapCardFeatureConstraintsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCampaign[]
     */
    protected $campaignsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCardDescription[]
     */
    protected $cardDescriptionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCardFeatures[]
     */
    protected $cardFeaturessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCardPointSystem[]
     */
    protected $cardPointSystemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCardRestriction[]
     */
    protected $cardRestrictionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDiscounts[]
     */
    protected $discountssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFees[]
     */
    protected $feessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInsurance[]
     */
    protected $insurancesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInterest[]
     */
    protected $interestsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMapCardFeatureConstraint[]
     */
    protected $mapCardFeatureConstraintsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->visa = false;
        $this->master = false;
        $this->jcb = false;
        $this->amex = false;
        $this->diners = false;
        $this->pointexpirymonths = 12;
        $this->isactive = 1;
    }

    /**
     * Initializes internal state of Base\CreditCard object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>CreditCard</code> instance.  If
     * <code>obj</code> is an instance of <code>CreditCard</code>, delegates to
     * <code>equals(CreditCard)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|CreditCard The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [credit_card_id] column value.
     *
     * @return int
     */
    public function getCreditCardId()
    {
        return $this->credit_card_id;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [issuer_id] column value.
     *
     * @return int
     */
    public function getIssuerId()
    {
        return $this->issuer_id;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [image_link] column value.
     *
     * @return string
     */
    public function getImageLink()
    {
        return $this->image_link;
    }

    /**
     * Get the [visa] column value.
     *
     * @return boolean
     */
    public function getVisa()
    {
        return $this->visa;
    }

    /**
     * Get the [visa] column value.
     *
     * @return boolean
     */
    public function isVisa()
    {
        return $this->getVisa();
    }

    /**
     * Get the [master] column value.
     *
     * @return boolean
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * Get the [master] column value.
     *
     * @return boolean
     */
    public function isMaster()
    {
        return $this->getMaster();
    }

    /**
     * Get the [jcb] column value.
     *
     * @return boolean
     */
    public function getJcb()
    {
        return $this->jcb;
    }

    /**
     * Get the [jcb] column value.
     *
     * @return boolean
     */
    public function isJcb()
    {
        return $this->getJcb();
    }

    /**
     * Get the [amex] column value.
     *
     * @return boolean
     */
    public function getAmex()
    {
        return $this->amex;
    }

    /**
     * Get the [amex] column value.
     *
     * @return boolean
     */
    public function isAmex()
    {
        return $this->getAmex();
    }

    /**
     * Get the [diners] column value.
     *
     * @return boolean
     */
    public function getDiners()
    {
        return $this->diners;
    }

    /**
     * Get the [diners] column value.
     *
     * @return boolean
     */
    public function isDiners()
    {
        return $this->getDiners();
    }

    /**
     * Get the [afilliate_link] column value.
     *
     * @return string
     */
    public function getAfilliateLink()
    {
        return $this->afilliate_link;
    }

    /**
     * Get the [affiliate_id] column value.
     *
     * @return int
     */
    public function getAffiliateId()
    {
        return $this->affiliate_id;
    }

    /**
     * Get the [pointexpirymonths] column value.
     *
     * @return int
     */
    public function getPointexpirymonths()
    {
        return $this->pointexpirymonths;
    }

    /**
     * Get the [reference] column value.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Get the [commission] column value.
     *
     * @return int
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Get the [isactive] column value.
     *
     * @return int
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Get the [optionally formatted] temporal [update_time] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdateTime($format = NULL)
    {
        if ($format === null) {
            return $this->update_time;
        } else {
            return $this->update_time instanceof \DateTime ? $this->update_time->format($format) : null;
        }
    }

    /**
     * Get the [update_user] column value.
     *
     * @return string
     */
    public function getUpdateUser()
    {
        return $this->update_user;
    }

    /**
     * Set the value of [credit_card_id] column.
     *
     * @param  int $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setCreditCardId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->credit_card_id !== $v) {
            $this->credit_card_id = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_CREDIT_CARD_ID] = true;
        }

        return $this;
    } // setCreditCardId()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [issuer_id] column.
     *
     * @param  int $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setIssuerId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->issuer_id !== $v) {
            $this->issuer_id = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_ISSUER_ID] = true;
        }

        if ($this->aIssuer !== null && $this->aIssuer->getIssuerId() !== $v) {
            $this->aIssuer = null;
        }

        return $this;
    } // setIssuerId()

    /**
     * Set the value of [description] column.
     *
     * @param  string $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [image_link] column.
     *
     * @param  string $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setImageLink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->image_link !== $v) {
            $this->image_link = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_IMAGE_LINK] = true;
        }

        return $this;
    } // setImageLink()

    /**
     * Sets the value of the [visa] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setVisa($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->visa !== $v) {
            $this->visa = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_VISA] = true;
        }

        return $this;
    } // setVisa()

    /**
     * Sets the value of the [master] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setMaster($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->master !== $v) {
            $this->master = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_MASTER] = true;
        }

        return $this;
    } // setMaster()

    /**
     * Sets the value of the [jcb] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setJcb($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->jcb !== $v) {
            $this->jcb = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_JCB] = true;
        }

        return $this;
    } // setJcb()

    /**
     * Sets the value of the [amex] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setAmex($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->amex !== $v) {
            $this->amex = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_AMEX] = true;
        }

        return $this;
    } // setAmex()

    /**
     * Sets the value of the [diners] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setDiners($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->diners !== $v) {
            $this->diners = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_DINERS] = true;
        }

        return $this;
    } // setDiners()

    /**
     * Set the value of [afilliate_link] column.
     *
     * @param  string $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setAfilliateLink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->afilliate_link !== $v) {
            $this->afilliate_link = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_AFILLIATE_LINK] = true;
        }

        return $this;
    } // setAfilliateLink()

    /**
     * Set the value of [affiliate_id] column.
     *
     * @param  int $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setAffiliateId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->affiliate_id !== $v) {
            $this->affiliate_id = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_AFFILIATE_ID] = true;
        }

        if ($this->aAffiliateCompany !== null && $this->aAffiliateCompany->getAffiliateId() !== $v) {
            $this->aAffiliateCompany = null;
        }

        return $this;
    } // setAffiliateId()

    /**
     * Set the value of [pointexpirymonths] column.
     *
     * @param  int $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setPointexpirymonths($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pointexpirymonths !== $v) {
            $this->pointexpirymonths = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_POINTEXPIRYMONTHS] = true;
        }

        return $this;
    } // setPointexpirymonths()

    /**
     * Set the value of [reference] column.
     *
     * @param  string $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setReference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reference !== $v) {
            $this->reference = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_REFERENCE] = true;
        }

        return $this;
    } // setReference()

    /**
     * Set the value of [commission] column.
     *
     * @param  int $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setCommission($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->commission !== $v) {
            $this->commission = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_COMMISSION] = true;
        }

        return $this;
    } // setCommission()

    /**
     * Set the value of [isactive] column.
     *
     * @param  int $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setIsactive($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->isactive !== $v) {
            $this->isactive = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_ISACTIVE] = true;
        }

        return $this;
    } // setIsactive()

    /**
     * Sets the value of [update_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setUpdateTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_time !== null || $dt !== null) {
            if ($dt !== $this->update_time) {
                $this->update_time = $dt;
                $this->modifiedColumns[CreditCardTableMap::COL_UPDATE_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateTime()

    /**
     * Set the value of [update_user] column.
     *
     * @param  string $v new value
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function setUpdateUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->update_user !== $v) {
            $this->update_user = $v;
            $this->modifiedColumns[CreditCardTableMap::COL_UPDATE_USER] = true;
        }

        return $this;
    } // setUpdateUser()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->visa !== false) {
                return false;
            }

            if ($this->master !== false) {
                return false;
            }

            if ($this->jcb !== false) {
                return false;
            }

            if ($this->amex !== false) {
                return false;
            }

            if ($this->diners !== false) {
                return false;
            }

            if ($this->pointexpirymonths !== 12) {
                return false;
            }

            if ($this->isactive !== 1) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CreditCardTableMap::translateFieldName('CreditCardId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->credit_card_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CreditCardTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CreditCardTableMap::translateFieldName('IssuerId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->issuer_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CreditCardTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CreditCardTableMap::translateFieldName('ImageLink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->image_link = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CreditCardTableMap::translateFieldName('Visa', TableMap::TYPE_PHPNAME, $indexType)];
            $this->visa = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CreditCardTableMap::translateFieldName('Master', TableMap::TYPE_PHPNAME, $indexType)];
            $this->master = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CreditCardTableMap::translateFieldName('Jcb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->jcb = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CreditCardTableMap::translateFieldName('Amex', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amex = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CreditCardTableMap::translateFieldName('Diners', TableMap::TYPE_PHPNAME, $indexType)];
            $this->diners = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CreditCardTableMap::translateFieldName('AfilliateLink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->afilliate_link = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CreditCardTableMap::translateFieldName('AffiliateId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->affiliate_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CreditCardTableMap::translateFieldName('Pointexpirymonths', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pointexpirymonths = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CreditCardTableMap::translateFieldName('Reference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reference = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CreditCardTableMap::translateFieldName('Commission', TableMap::TYPE_PHPNAME, $indexType)];
            $this->commission = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CreditCardTableMap::translateFieldName('Isactive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->isactive = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CreditCardTableMap::translateFieldName('UpdateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : CreditCardTableMap::translateFieldName('UpdateUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->update_user = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 18; // 18 = CreditCardTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CreditCard'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aIssuer !== null && $this->issuer_id !== $this->aIssuer->getIssuerId()) {
            $this->aIssuer = null;
        }
        if ($this->aAffiliateCompany !== null && $this->affiliate_id !== $this->aAffiliateCompany->getAffiliateId()) {
            $this->aAffiliateCompany = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CreditCardTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCreditCardQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAffiliateCompany = null;
            $this->aIssuer = null;
            $this->collCampaigns = null;

            $this->collCardDescriptions = null;

            $this->collCardFeaturess = null;

            $this->collCardPointSystems = null;

            $this->collCardRestrictions = null;

            $this->collDiscountss = null;

            $this->collFeess = null;

            $this->collInsurances = null;

            $this->collInterests = null;

            $this->collMapCardFeatureConstraints = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see CreditCard::setDeleted()
     * @see CreditCard::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CreditCardTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCreditCardQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CreditCardTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CreditCardTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aAffiliateCompany !== null) {
                if ($this->aAffiliateCompany->isModified() || $this->aAffiliateCompany->isNew()) {
                    $affectedRows += $this->aAffiliateCompany->save($con);
                }
                $this->setAffiliateCompany($this->aAffiliateCompany);
            }

            if ($this->aIssuer !== null) {
                if ($this->aIssuer->isModified() || $this->aIssuer->isNew()) {
                    $affectedRows += $this->aIssuer->save($con);
                }
                $this->setIssuer($this->aIssuer);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->campaignsScheduledForDeletion !== null) {
                if (!$this->campaignsScheduledForDeletion->isEmpty()) {
                    \CampaignQuery::create()
                        ->filterByPrimaryKeys($this->campaignsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->campaignsScheduledForDeletion = null;
                }
            }

            if ($this->collCampaigns !== null) {
                foreach ($this->collCampaigns as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cardDescriptionsScheduledForDeletion !== null) {
                if (!$this->cardDescriptionsScheduledForDeletion->isEmpty()) {
                    \CardDescriptionQuery::create()
                        ->filterByPrimaryKeys($this->cardDescriptionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cardDescriptionsScheduledForDeletion = null;
                }
            }

            if ($this->collCardDescriptions !== null) {
                foreach ($this->collCardDescriptions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cardFeaturessScheduledForDeletion !== null) {
                if (!$this->cardFeaturessScheduledForDeletion->isEmpty()) {
                    \CardFeaturesQuery::create()
                        ->filterByPrimaryKeys($this->cardFeaturessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cardFeaturessScheduledForDeletion = null;
                }
            }

            if ($this->collCardFeaturess !== null) {
                foreach ($this->collCardFeaturess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cardPointSystemsScheduledForDeletion !== null) {
                if (!$this->cardPointSystemsScheduledForDeletion->isEmpty()) {
                    \CardPointSystemQuery::create()
                        ->filterByPrimaryKeys($this->cardPointSystemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cardPointSystemsScheduledForDeletion = null;
                }
            }

            if ($this->collCardPointSystems !== null) {
                foreach ($this->collCardPointSystems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cardRestrictionsScheduledForDeletion !== null) {
                if (!$this->cardRestrictionsScheduledForDeletion->isEmpty()) {
                    \CardRestrictionQuery::create()
                        ->filterByPrimaryKeys($this->cardRestrictionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cardRestrictionsScheduledForDeletion = null;
                }
            }

            if ($this->collCardRestrictions !== null) {
                foreach ($this->collCardRestrictions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->discountssScheduledForDeletion !== null) {
                if (!$this->discountssScheduledForDeletion->isEmpty()) {
                    \DiscountsQuery::create()
                        ->filterByPrimaryKeys($this->discountssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->discountssScheduledForDeletion = null;
                }
            }

            if ($this->collDiscountss !== null) {
                foreach ($this->collDiscountss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->feessScheduledForDeletion !== null) {
                if (!$this->feessScheduledForDeletion->isEmpty()) {
                    \FeesQuery::create()
                        ->filterByPrimaryKeys($this->feessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->feessScheduledForDeletion = null;
                }
            }

            if ($this->collFeess !== null) {
                foreach ($this->collFeess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->insurancesScheduledForDeletion !== null) {
                if (!$this->insurancesScheduledForDeletion->isEmpty()) {
                    \InsuranceQuery::create()
                        ->filterByPrimaryKeys($this->insurancesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->insurancesScheduledForDeletion = null;
                }
            }

            if ($this->collInsurances !== null) {
                foreach ($this->collInsurances as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->interestsScheduledForDeletion !== null) {
                if (!$this->interestsScheduledForDeletion->isEmpty()) {
                    \InterestQuery::create()
                        ->filterByPrimaryKeys($this->interestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->interestsScheduledForDeletion = null;
                }
            }

            if ($this->collInterests !== null) {
                foreach ($this->collInterests as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mapCardFeatureConstraintsScheduledForDeletion !== null) {
                if (!$this->mapCardFeatureConstraintsScheduledForDeletion->isEmpty()) {
                    \MapCardFeatureConstraintQuery::create()
                        ->filterByPrimaryKeys($this->mapCardFeatureConstraintsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mapCardFeatureConstraintsScheduledForDeletion = null;
                }
            }

            if ($this->collMapCardFeatureConstraints !== null) {
                foreach ($this->collMapCardFeatureConstraints as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[CreditCardTableMap::COL_CREDIT_CARD_ID] = true;
        if (null !== $this->credit_card_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CreditCardTableMap::COL_CREDIT_CARD_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CreditCardTableMap::COL_CREDIT_CARD_ID)) {
            $modifiedColumns[':p' . $index++]  = 'credit_card_id';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_ISSUER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'issuer_id';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_IMAGE_LINK)) {
            $modifiedColumns[':p' . $index++]  = 'image_link';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_VISA)) {
            $modifiedColumns[':p' . $index++]  = 'visa';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_MASTER)) {
            $modifiedColumns[':p' . $index++]  = 'master';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_JCB)) {
            $modifiedColumns[':p' . $index++]  = 'jcb';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_AMEX)) {
            $modifiedColumns[':p' . $index++]  = 'amex';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_DINERS)) {
            $modifiedColumns[':p' . $index++]  = 'diners';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_AFILLIATE_LINK)) {
            $modifiedColumns[':p' . $index++]  = 'afilliate_link';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_AFFILIATE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'affiliate_id';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_POINTEXPIRYMONTHS)) {
            $modifiedColumns[':p' . $index++]  = 'pointExpiryMonths';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'reference';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_COMMISSION)) {
            $modifiedColumns[':p' . $index++]  = 'commission';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_ISACTIVE)) {
            $modifiedColumns[':p' . $index++]  = 'isActive';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_UPDATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'update_time';
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_UPDATE_USER)) {
            $modifiedColumns[':p' . $index++]  = 'update_user';
        }

        $sql = sprintf(
            'INSERT INTO credit_card (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'credit_card_id':
                        $stmt->bindValue($identifier, $this->credit_card_id, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'issuer_id':
                        $stmt->bindValue($identifier, $this->issuer_id, PDO::PARAM_INT);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'image_link':
                        $stmt->bindValue($identifier, $this->image_link, PDO::PARAM_STR);
                        break;
                    case 'visa':
                        $stmt->bindValue($identifier, (int) $this->visa, PDO::PARAM_INT);
                        break;
                    case 'master':
                        $stmt->bindValue($identifier, (int) $this->master, PDO::PARAM_INT);
                        break;
                    case 'jcb':
                        $stmt->bindValue($identifier, (int) $this->jcb, PDO::PARAM_INT);
                        break;
                    case 'amex':
                        $stmt->bindValue($identifier, (int) $this->amex, PDO::PARAM_INT);
                        break;
                    case 'diners':
                        $stmt->bindValue($identifier, (int) $this->diners, PDO::PARAM_INT);
                        break;
                    case 'afilliate_link':
                        $stmt->bindValue($identifier, $this->afilliate_link, PDO::PARAM_STR);
                        break;
                    case 'affiliate_id':
                        $stmt->bindValue($identifier, $this->affiliate_id, PDO::PARAM_INT);
                        break;
                    case 'pointExpiryMonths':
                        $stmt->bindValue($identifier, $this->pointexpirymonths, PDO::PARAM_INT);
                        break;
                    case 'reference':
                        $stmt->bindValue($identifier, $this->reference, PDO::PARAM_STR);
                        break;
                    case 'commission':
                        $stmt->bindValue($identifier, $this->commission, PDO::PARAM_INT);
                        break;
                    case 'isActive':
                        $stmt->bindValue($identifier, $this->isactive, PDO::PARAM_INT);
                        break;
                    case 'update_time':
                        $stmt->bindValue($identifier, $this->update_time ? $this->update_time->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'update_user':
                        $stmt->bindValue($identifier, $this->update_user, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setCreditCardId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CreditCardTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getCreditCardId();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getIssuerId();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getImageLink();
                break;
            case 5:
                return $this->getVisa();
                break;
            case 6:
                return $this->getMaster();
                break;
            case 7:
                return $this->getJcb();
                break;
            case 8:
                return $this->getAmex();
                break;
            case 9:
                return $this->getDiners();
                break;
            case 10:
                return $this->getAfilliateLink();
                break;
            case 11:
                return $this->getAffiliateId();
                break;
            case 12:
                return $this->getPointexpirymonths();
                break;
            case 13:
                return $this->getReference();
                break;
            case 14:
                return $this->getCommission();
                break;
            case 15:
                return $this->getIsactive();
                break;
            case 16:
                return $this->getUpdateTime();
                break;
            case 17:
                return $this->getUpdateUser();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['CreditCard'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CreditCard'][$this->hashCode()] = true;
        $keys = CreditCardTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCreditCardId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getIssuerId(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getImageLink(),
            $keys[5] => $this->getVisa(),
            $keys[6] => $this->getMaster(),
            $keys[7] => $this->getJcb(),
            $keys[8] => $this->getAmex(),
            $keys[9] => $this->getDiners(),
            $keys[10] => $this->getAfilliateLink(),
            $keys[11] => $this->getAffiliateId(),
            $keys[12] => $this->getPointexpirymonths(),
            $keys[13] => $this->getReference(),
            $keys[14] => $this->getCommission(),
            $keys[15] => $this->getIsactive(),
            $keys[16] => $this->getUpdateTime(),
            $keys[17] => $this->getUpdateUser(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aAffiliateCompany) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'affiliateCompany';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'affiliate_company';
                        break;
                    default:
                        $key = 'AffiliateCompany';
                }

                $result[$key] = $this->aAffiliateCompany->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aIssuer) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'issuer';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'issuer';
                        break;
                    default:
                        $key = 'Issuer';
                }

                $result[$key] = $this->aIssuer->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCampaigns) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'campaigns';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'campaigns';
                        break;
                    default:
                        $key = 'Campaigns';
                }

                $result[$key] = $this->collCampaigns->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCardDescriptions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cardDescriptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'card_descriptions';
                        break;
                    default:
                        $key = 'CardDescriptions';
                }

                $result[$key] = $this->collCardDescriptions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCardFeaturess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cardFeaturess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'card_featuress';
                        break;
                    default:
                        $key = 'CardFeaturess';
                }

                $result[$key] = $this->collCardFeaturess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCardPointSystems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cardPointSystems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'card_point_systems';
                        break;
                    default:
                        $key = 'CardPointSystems';
                }

                $result[$key] = $this->collCardPointSystems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCardRestrictions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cardRestrictions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'card_restrictions';
                        break;
                    default:
                        $key = 'CardRestrictions';
                }

                $result[$key] = $this->collCardRestrictions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDiscountss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'discountss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'discountss';
                        break;
                    default:
                        $key = 'Discountss';
                }

                $result[$key] = $this->collDiscountss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFeess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'feess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'feess';
                        break;
                    default:
                        $key = 'Feess';
                }

                $result[$key] = $this->collFeess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInsurances) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'insurances';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'insurances';
                        break;
                    default:
                        $key = 'Insurances';
                }

                $result[$key] = $this->collInsurances->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInterests) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'interests';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'interests';
                        break;
                    default:
                        $key = 'Interests';
                }

                $result[$key] = $this->collInterests->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMapCardFeatureConstraints) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'mapCardFeatureConstraints';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'map_card_feature_constraints';
                        break;
                    default:
                        $key = 'MapCardFeatureConstraints';
                }

                $result[$key] = $this->collMapCardFeatureConstraints->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\CreditCard
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CreditCardTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CreditCard
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCreditCardId($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setIssuerId($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setImageLink($value);
                break;
            case 5:
                $this->setVisa($value);
                break;
            case 6:
                $this->setMaster($value);
                break;
            case 7:
                $this->setJcb($value);
                break;
            case 8:
                $this->setAmex($value);
                break;
            case 9:
                $this->setDiners($value);
                break;
            case 10:
                $this->setAfilliateLink($value);
                break;
            case 11:
                $this->setAffiliateId($value);
                break;
            case 12:
                $this->setPointexpirymonths($value);
                break;
            case 13:
                $this->setReference($value);
                break;
            case 14:
                $this->setCommission($value);
                break;
            case 15:
                $this->setIsactive($value);
                break;
            case 16:
                $this->setUpdateTime($value);
                break;
            case 17:
                $this->setUpdateUser($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = CreditCardTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setCreditCardId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIssuerId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescription($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setImageLink($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setVisa($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setMaster($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setJcb($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAmex($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDiners($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setAfilliateLink($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setAffiliateId($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPointexpirymonths($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setReference($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCommission($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setIsactive($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setUpdateTime($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setUpdateUser($arr[$keys[17]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\CreditCard The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CreditCardTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CreditCardTableMap::COL_CREDIT_CARD_ID)) {
            $criteria->add(CreditCardTableMap::COL_CREDIT_CARD_ID, $this->credit_card_id);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_NAME)) {
            $criteria->add(CreditCardTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_ISSUER_ID)) {
            $criteria->add(CreditCardTableMap::COL_ISSUER_ID, $this->issuer_id);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_DESCRIPTION)) {
            $criteria->add(CreditCardTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_IMAGE_LINK)) {
            $criteria->add(CreditCardTableMap::COL_IMAGE_LINK, $this->image_link);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_VISA)) {
            $criteria->add(CreditCardTableMap::COL_VISA, $this->visa);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_MASTER)) {
            $criteria->add(CreditCardTableMap::COL_MASTER, $this->master);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_JCB)) {
            $criteria->add(CreditCardTableMap::COL_JCB, $this->jcb);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_AMEX)) {
            $criteria->add(CreditCardTableMap::COL_AMEX, $this->amex);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_DINERS)) {
            $criteria->add(CreditCardTableMap::COL_DINERS, $this->diners);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_AFILLIATE_LINK)) {
            $criteria->add(CreditCardTableMap::COL_AFILLIATE_LINK, $this->afilliate_link);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_AFFILIATE_ID)) {
            $criteria->add(CreditCardTableMap::COL_AFFILIATE_ID, $this->affiliate_id);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_POINTEXPIRYMONTHS)) {
            $criteria->add(CreditCardTableMap::COL_POINTEXPIRYMONTHS, $this->pointexpirymonths);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_REFERENCE)) {
            $criteria->add(CreditCardTableMap::COL_REFERENCE, $this->reference);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_COMMISSION)) {
            $criteria->add(CreditCardTableMap::COL_COMMISSION, $this->commission);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_ISACTIVE)) {
            $criteria->add(CreditCardTableMap::COL_ISACTIVE, $this->isactive);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_UPDATE_TIME)) {
            $criteria->add(CreditCardTableMap::COL_UPDATE_TIME, $this->update_time);
        }
        if ($this->isColumnModified(CreditCardTableMap::COL_UPDATE_USER)) {
            $criteria->add(CreditCardTableMap::COL_UPDATE_USER, $this->update_user);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildCreditCardQuery::create();
        $criteria->add(CreditCardTableMap::COL_CREDIT_CARD_ID, $this->credit_card_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getCreditCardId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getCreditCardId();
    }

    /**
     * Generic method to set the primary key (credit_card_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCreditCardId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getCreditCardId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CreditCard (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setIssuerId($this->getIssuerId());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setImageLink($this->getImageLink());
        $copyObj->setVisa($this->getVisa());
        $copyObj->setMaster($this->getMaster());
        $copyObj->setJcb($this->getJcb());
        $copyObj->setAmex($this->getAmex());
        $copyObj->setDiners($this->getDiners());
        $copyObj->setAfilliateLink($this->getAfilliateLink());
        $copyObj->setAffiliateId($this->getAffiliateId());
        $copyObj->setPointexpirymonths($this->getPointexpirymonths());
        $copyObj->setReference($this->getReference());
        $copyObj->setCommission($this->getCommission());
        $copyObj->setIsactive($this->getIsactive());
        $copyObj->setUpdateTime($this->getUpdateTime());
        $copyObj->setUpdateUser($this->getUpdateUser());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCampaigns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCampaign($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCardDescriptions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCardDescription($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCardFeaturess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCardFeatures($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCardPointSystems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCardPointSystem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCardRestrictions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCardRestriction($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDiscountss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiscounts($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFeess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFees($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInsurances() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInsurance($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInterests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInterest($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMapCardFeatureConstraints() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMapCardFeatureConstraint($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCreditCardId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \CreditCard Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildAffiliateCompany object.
     *
     * @param  ChildAffiliateCompany $v
     * @return $this|\CreditCard The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAffiliateCompany(ChildAffiliateCompany $v = null)
    {
        if ($v === null) {
            $this->setAffiliateId(NULL);
        } else {
            $this->setAffiliateId($v->getAffiliateId());
        }

        $this->aAffiliateCompany = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildAffiliateCompany object, it will not be re-added.
        if ($v !== null) {
            $v->addCreditCard($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildAffiliateCompany object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildAffiliateCompany The associated ChildAffiliateCompany object.
     * @throws PropelException
     */
    public function getAffiliateCompany(ConnectionInterface $con = null)
    {
        if ($this->aAffiliateCompany === null && ($this->affiliate_id !== null)) {
            $this->aAffiliateCompany = ChildAffiliateCompanyQuery::create()->findPk($this->affiliate_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAffiliateCompany->addCreditCards($this);
             */
        }

        return $this->aAffiliateCompany;
    }

    /**
     * Declares an association between this object and a ChildIssuer object.
     *
     * @param  ChildIssuer $v
     * @return $this|\CreditCard The current object (for fluent API support)
     * @throws PropelException
     */
    public function setIssuer(ChildIssuer $v = null)
    {
        if ($v === null) {
            $this->setIssuerId(NULL);
        } else {
            $this->setIssuerId($v->getIssuerId());
        }

        $this->aIssuer = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildIssuer object, it will not be re-added.
        if ($v !== null) {
            $v->addCreditCard($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildIssuer object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildIssuer The associated ChildIssuer object.
     * @throws PropelException
     */
    public function getIssuer(ConnectionInterface $con = null)
    {
        if ($this->aIssuer === null && ($this->issuer_id !== null)) {
            $this->aIssuer = ChildIssuerQuery::create()->findPk($this->issuer_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aIssuer->addCreditCards($this);
             */
        }

        return $this->aIssuer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Campaign' == $relationName) {
            return $this->initCampaigns();
        }
        if ('CardDescription' == $relationName) {
            return $this->initCardDescriptions();
        }
        if ('CardFeatures' == $relationName) {
            return $this->initCardFeaturess();
        }
        if ('CardPointSystem' == $relationName) {
            return $this->initCardPointSystems();
        }
        if ('CardRestriction' == $relationName) {
            return $this->initCardRestrictions();
        }
        if ('Discounts' == $relationName) {
            return $this->initDiscountss();
        }
        if ('Fees' == $relationName) {
            return $this->initFeess();
        }
        if ('Insurance' == $relationName) {
            return $this->initInsurances();
        }
        if ('Interest' == $relationName) {
            return $this->initInterests();
        }
        if ('MapCardFeatureConstraint' == $relationName) {
            return $this->initMapCardFeatureConstraints();
        }
    }

    /**
     * Clears out the collCampaigns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCampaigns()
     */
    public function clearCampaigns()
    {
        $this->collCampaigns = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCampaigns collection loaded partially.
     */
    public function resetPartialCampaigns($v = true)
    {
        $this->collCampaignsPartial = $v;
    }

    /**
     * Initializes the collCampaigns collection.
     *
     * By default this just sets the collCampaigns collection to an empty array (like clearcollCampaigns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCampaigns($overrideExisting = true)
    {
        if (null !== $this->collCampaigns && !$overrideExisting) {
            return;
        }
        $this->collCampaigns = new ObjectCollection();
        $this->collCampaigns->setModel('\Campaign');
    }

    /**
     * Gets an array of ChildCampaign objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCampaign[] List of ChildCampaign objects
     * @throws PropelException
     */
    public function getCampaigns(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCampaignsPartial && !$this->isNew();
        if (null === $this->collCampaigns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCampaigns) {
                // return empty collection
                $this->initCampaigns();
            } else {
                $collCampaigns = ChildCampaignQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCampaignsPartial && count($collCampaigns)) {
                        $this->initCampaigns(false);

                        foreach ($collCampaigns as $obj) {
                            if (false == $this->collCampaigns->contains($obj)) {
                                $this->collCampaigns->append($obj);
                            }
                        }

                        $this->collCampaignsPartial = true;
                    }

                    return $collCampaigns;
                }

                if ($partial && $this->collCampaigns) {
                    foreach ($this->collCampaigns as $obj) {
                        if ($obj->isNew()) {
                            $collCampaigns[] = $obj;
                        }
                    }
                }

                $this->collCampaigns = $collCampaigns;
                $this->collCampaignsPartial = false;
            }
        }

        return $this->collCampaigns;
    }

    /**
     * Sets a collection of ChildCampaign objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $campaigns A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setCampaigns(Collection $campaigns, ConnectionInterface $con = null)
    {
        /** @var ChildCampaign[] $campaignsToDelete */
        $campaignsToDelete = $this->getCampaigns(new Criteria(), $con)->diff($campaigns);


        $this->campaignsScheduledForDeletion = $campaignsToDelete;

        foreach ($campaignsToDelete as $campaignRemoved) {
            $campaignRemoved->setCreditCard(null);
        }

        $this->collCampaigns = null;
        foreach ($campaigns as $campaign) {
            $this->addCampaign($campaign);
        }

        $this->collCampaigns = $campaigns;
        $this->collCampaignsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Campaign objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Campaign objects.
     * @throws PropelException
     */
    public function countCampaigns(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCampaignsPartial && !$this->isNew();
        if (null === $this->collCampaigns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCampaigns) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCampaigns());
            }

            $query = ChildCampaignQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collCampaigns);
    }

    /**
     * Method called to associate a ChildCampaign object to this object
     * through the ChildCampaign foreign key attribute.
     *
     * @param  ChildCampaign $l ChildCampaign
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addCampaign(ChildCampaign $l)
    {
        if ($this->collCampaigns === null) {
            $this->initCampaigns();
            $this->collCampaignsPartial = true;
        }

        if (!$this->collCampaigns->contains($l)) {
            $this->doAddCampaign($l);
        }

        return $this;
    }

    /**
     * @param ChildCampaign $campaign The ChildCampaign object to add.
     */
    protected function doAddCampaign(ChildCampaign $campaign)
    {
        $this->collCampaigns[]= $campaign;
        $campaign->setCreditCard($this);
    }

    /**
     * @param  ChildCampaign $campaign The ChildCampaign object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeCampaign(ChildCampaign $campaign)
    {
        if ($this->getCampaigns()->contains($campaign)) {
            $pos = $this->collCampaigns->search($campaign);
            $this->collCampaigns->remove($pos);
            if (null === $this->campaignsScheduledForDeletion) {
                $this->campaignsScheduledForDeletion = clone $this->collCampaigns;
                $this->campaignsScheduledForDeletion->clear();
            }
            $this->campaignsScheduledForDeletion[]= clone $campaign;
            $campaign->setCreditCard(null);
        }

        return $this;
    }

    /**
     * Clears out the collCardDescriptions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCardDescriptions()
     */
    public function clearCardDescriptions()
    {
        $this->collCardDescriptions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCardDescriptions collection loaded partially.
     */
    public function resetPartialCardDescriptions($v = true)
    {
        $this->collCardDescriptionsPartial = $v;
    }

    /**
     * Initializes the collCardDescriptions collection.
     *
     * By default this just sets the collCardDescriptions collection to an empty array (like clearcollCardDescriptions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCardDescriptions($overrideExisting = true)
    {
        if (null !== $this->collCardDescriptions && !$overrideExisting) {
            return;
        }
        $this->collCardDescriptions = new ObjectCollection();
        $this->collCardDescriptions->setModel('\CardDescription');
    }

    /**
     * Gets an array of ChildCardDescription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCardDescription[] List of ChildCardDescription objects
     * @throws PropelException
     */
    public function getCardDescriptions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCardDescriptionsPartial && !$this->isNew();
        if (null === $this->collCardDescriptions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCardDescriptions) {
                // return empty collection
                $this->initCardDescriptions();
            } else {
                $collCardDescriptions = ChildCardDescriptionQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCardDescriptionsPartial && count($collCardDescriptions)) {
                        $this->initCardDescriptions(false);

                        foreach ($collCardDescriptions as $obj) {
                            if (false == $this->collCardDescriptions->contains($obj)) {
                                $this->collCardDescriptions->append($obj);
                            }
                        }

                        $this->collCardDescriptionsPartial = true;
                    }

                    return $collCardDescriptions;
                }

                if ($partial && $this->collCardDescriptions) {
                    foreach ($this->collCardDescriptions as $obj) {
                        if ($obj->isNew()) {
                            $collCardDescriptions[] = $obj;
                        }
                    }
                }

                $this->collCardDescriptions = $collCardDescriptions;
                $this->collCardDescriptionsPartial = false;
            }
        }

        return $this->collCardDescriptions;
    }

    /**
     * Sets a collection of ChildCardDescription objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $cardDescriptions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setCardDescriptions(Collection $cardDescriptions, ConnectionInterface $con = null)
    {
        /** @var ChildCardDescription[] $cardDescriptionsToDelete */
        $cardDescriptionsToDelete = $this->getCardDescriptions(new Criteria(), $con)->diff($cardDescriptions);


        $this->cardDescriptionsScheduledForDeletion = $cardDescriptionsToDelete;

        foreach ($cardDescriptionsToDelete as $cardDescriptionRemoved) {
            $cardDescriptionRemoved->setCreditCard(null);
        }

        $this->collCardDescriptions = null;
        foreach ($cardDescriptions as $cardDescription) {
            $this->addCardDescription($cardDescription);
        }

        $this->collCardDescriptions = $cardDescriptions;
        $this->collCardDescriptionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CardDescription objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CardDescription objects.
     * @throws PropelException
     */
    public function countCardDescriptions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCardDescriptionsPartial && !$this->isNew();
        if (null === $this->collCardDescriptions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCardDescriptions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCardDescriptions());
            }

            $query = ChildCardDescriptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collCardDescriptions);
    }

    /**
     * Method called to associate a ChildCardDescription object to this object
     * through the ChildCardDescription foreign key attribute.
     *
     * @param  ChildCardDescription $l ChildCardDescription
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addCardDescription(ChildCardDescription $l)
    {
        if ($this->collCardDescriptions === null) {
            $this->initCardDescriptions();
            $this->collCardDescriptionsPartial = true;
        }

        if (!$this->collCardDescriptions->contains($l)) {
            $this->doAddCardDescription($l);
        }

        return $this;
    }

    /**
     * @param ChildCardDescription $cardDescription The ChildCardDescription object to add.
     */
    protected function doAddCardDescription(ChildCardDescription $cardDescription)
    {
        $this->collCardDescriptions[]= $cardDescription;
        $cardDescription->setCreditCard($this);
    }

    /**
     * @param  ChildCardDescription $cardDescription The ChildCardDescription object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeCardDescription(ChildCardDescription $cardDescription)
    {
        if ($this->getCardDescriptions()->contains($cardDescription)) {
            $pos = $this->collCardDescriptions->search($cardDescription);
            $this->collCardDescriptions->remove($pos);
            if (null === $this->cardDescriptionsScheduledForDeletion) {
                $this->cardDescriptionsScheduledForDeletion = clone $this->collCardDescriptions;
                $this->cardDescriptionsScheduledForDeletion->clear();
            }
            $this->cardDescriptionsScheduledForDeletion[]= clone $cardDescription;
            $cardDescription->setCreditCard(null);
        }

        return $this;
    }

    /**
     * Clears out the collCardFeaturess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCardFeaturess()
     */
    public function clearCardFeaturess()
    {
        $this->collCardFeaturess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCardFeaturess collection loaded partially.
     */
    public function resetPartialCardFeaturess($v = true)
    {
        $this->collCardFeaturessPartial = $v;
    }

    /**
     * Initializes the collCardFeaturess collection.
     *
     * By default this just sets the collCardFeaturess collection to an empty array (like clearcollCardFeaturess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCardFeaturess($overrideExisting = true)
    {
        if (null !== $this->collCardFeaturess && !$overrideExisting) {
            return;
        }
        $this->collCardFeaturess = new ObjectCollection();
        $this->collCardFeaturess->setModel('\CardFeatures');
    }

    /**
     * Gets an array of ChildCardFeatures objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCardFeatures[] List of ChildCardFeatures objects
     * @throws PropelException
     */
    public function getCardFeaturess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCardFeaturessPartial && !$this->isNew();
        if (null === $this->collCardFeaturess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCardFeaturess) {
                // return empty collection
                $this->initCardFeaturess();
            } else {
                $collCardFeaturess = ChildCardFeaturesQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCardFeaturessPartial && count($collCardFeaturess)) {
                        $this->initCardFeaturess(false);

                        foreach ($collCardFeaturess as $obj) {
                            if (false == $this->collCardFeaturess->contains($obj)) {
                                $this->collCardFeaturess->append($obj);
                            }
                        }

                        $this->collCardFeaturessPartial = true;
                    }

                    return $collCardFeaturess;
                }

                if ($partial && $this->collCardFeaturess) {
                    foreach ($this->collCardFeaturess as $obj) {
                        if ($obj->isNew()) {
                            $collCardFeaturess[] = $obj;
                        }
                    }
                }

                $this->collCardFeaturess = $collCardFeaturess;
                $this->collCardFeaturessPartial = false;
            }
        }

        return $this->collCardFeaturess;
    }

    /**
     * Sets a collection of ChildCardFeatures objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $cardFeaturess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setCardFeaturess(Collection $cardFeaturess, ConnectionInterface $con = null)
    {
        /** @var ChildCardFeatures[] $cardFeaturessToDelete */
        $cardFeaturessToDelete = $this->getCardFeaturess(new Criteria(), $con)->diff($cardFeaturess);


        $this->cardFeaturessScheduledForDeletion = $cardFeaturessToDelete;

        foreach ($cardFeaturessToDelete as $cardFeaturesRemoved) {
            $cardFeaturesRemoved->setCreditCard(null);
        }

        $this->collCardFeaturess = null;
        foreach ($cardFeaturess as $cardFeatures) {
            $this->addCardFeatures($cardFeatures);
        }

        $this->collCardFeaturess = $cardFeaturess;
        $this->collCardFeaturessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CardFeatures objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CardFeatures objects.
     * @throws PropelException
     */
    public function countCardFeaturess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCardFeaturessPartial && !$this->isNew();
        if (null === $this->collCardFeaturess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCardFeaturess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCardFeaturess());
            }

            $query = ChildCardFeaturesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collCardFeaturess);
    }

    /**
     * Method called to associate a ChildCardFeatures object to this object
     * through the ChildCardFeatures foreign key attribute.
     *
     * @param  ChildCardFeatures $l ChildCardFeatures
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addCardFeatures(ChildCardFeatures $l)
    {
        if ($this->collCardFeaturess === null) {
            $this->initCardFeaturess();
            $this->collCardFeaturessPartial = true;
        }

        if (!$this->collCardFeaturess->contains($l)) {
            $this->doAddCardFeatures($l);
        }

        return $this;
    }

    /**
     * @param ChildCardFeatures $cardFeatures The ChildCardFeatures object to add.
     */
    protected function doAddCardFeatures(ChildCardFeatures $cardFeatures)
    {
        $this->collCardFeaturess[]= $cardFeatures;
        $cardFeatures->setCreditCard($this);
    }

    /**
     * @param  ChildCardFeatures $cardFeatures The ChildCardFeatures object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeCardFeatures(ChildCardFeatures $cardFeatures)
    {
        if ($this->getCardFeaturess()->contains($cardFeatures)) {
            $pos = $this->collCardFeaturess->search($cardFeatures);
            $this->collCardFeaturess->remove($pos);
            if (null === $this->cardFeaturessScheduledForDeletion) {
                $this->cardFeaturessScheduledForDeletion = clone $this->collCardFeaturess;
                $this->cardFeaturessScheduledForDeletion->clear();
            }
            $this->cardFeaturessScheduledForDeletion[]= clone $cardFeatures;
            $cardFeatures->setCreditCard(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CreditCard is new, it will return
     * an empty collection; or if this CreditCard has previously
     * been saved, it will retrieve related CardFeaturess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CreditCard.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCardFeatures[] List of ChildCardFeatures objects
     */
    public function getCardFeaturessJoinCardFeatureType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCardFeaturesQuery::create(null, $criteria);
        $query->joinWith('CardFeatureType', $joinBehavior);

        return $this->getCardFeaturess($query, $con);
    }

    /**
     * Clears out the collCardPointSystems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCardPointSystems()
     */
    public function clearCardPointSystems()
    {
        $this->collCardPointSystems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCardPointSystems collection loaded partially.
     */
    public function resetPartialCardPointSystems($v = true)
    {
        $this->collCardPointSystemsPartial = $v;
    }

    /**
     * Initializes the collCardPointSystems collection.
     *
     * By default this just sets the collCardPointSystems collection to an empty array (like clearcollCardPointSystems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCardPointSystems($overrideExisting = true)
    {
        if (null !== $this->collCardPointSystems && !$overrideExisting) {
            return;
        }
        $this->collCardPointSystems = new ObjectCollection();
        $this->collCardPointSystems->setModel('\CardPointSystem');
    }

    /**
     * Gets an array of ChildCardPointSystem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCardPointSystem[] List of ChildCardPointSystem objects
     * @throws PropelException
     */
    public function getCardPointSystems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCardPointSystemsPartial && !$this->isNew();
        if (null === $this->collCardPointSystems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCardPointSystems) {
                // return empty collection
                $this->initCardPointSystems();
            } else {
                $collCardPointSystems = ChildCardPointSystemQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCardPointSystemsPartial && count($collCardPointSystems)) {
                        $this->initCardPointSystems(false);

                        foreach ($collCardPointSystems as $obj) {
                            if (false == $this->collCardPointSystems->contains($obj)) {
                                $this->collCardPointSystems->append($obj);
                            }
                        }

                        $this->collCardPointSystemsPartial = true;
                    }

                    return $collCardPointSystems;
                }

                if ($partial && $this->collCardPointSystems) {
                    foreach ($this->collCardPointSystems as $obj) {
                        if ($obj->isNew()) {
                            $collCardPointSystems[] = $obj;
                        }
                    }
                }

                $this->collCardPointSystems = $collCardPointSystems;
                $this->collCardPointSystemsPartial = false;
            }
        }

        return $this->collCardPointSystems;
    }

    /**
     * Sets a collection of ChildCardPointSystem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $cardPointSystems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setCardPointSystems(Collection $cardPointSystems, ConnectionInterface $con = null)
    {
        /** @var ChildCardPointSystem[] $cardPointSystemsToDelete */
        $cardPointSystemsToDelete = $this->getCardPointSystems(new Criteria(), $con)->diff($cardPointSystems);


        $this->cardPointSystemsScheduledForDeletion = $cardPointSystemsToDelete;

        foreach ($cardPointSystemsToDelete as $cardPointSystemRemoved) {
            $cardPointSystemRemoved->setCreditCard(null);
        }

        $this->collCardPointSystems = null;
        foreach ($cardPointSystems as $cardPointSystem) {
            $this->addCardPointSystem($cardPointSystem);
        }

        $this->collCardPointSystems = $cardPointSystems;
        $this->collCardPointSystemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CardPointSystem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CardPointSystem objects.
     * @throws PropelException
     */
    public function countCardPointSystems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCardPointSystemsPartial && !$this->isNew();
        if (null === $this->collCardPointSystems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCardPointSystems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCardPointSystems());
            }

            $query = ChildCardPointSystemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collCardPointSystems);
    }

    /**
     * Method called to associate a ChildCardPointSystem object to this object
     * through the ChildCardPointSystem foreign key attribute.
     *
     * @param  ChildCardPointSystem $l ChildCardPointSystem
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addCardPointSystem(ChildCardPointSystem $l)
    {
        if ($this->collCardPointSystems === null) {
            $this->initCardPointSystems();
            $this->collCardPointSystemsPartial = true;
        }

        if (!$this->collCardPointSystems->contains($l)) {
            $this->doAddCardPointSystem($l);
        }

        return $this;
    }

    /**
     * @param ChildCardPointSystem $cardPointSystem The ChildCardPointSystem object to add.
     */
    protected function doAddCardPointSystem(ChildCardPointSystem $cardPointSystem)
    {
        $this->collCardPointSystems[]= $cardPointSystem;
        $cardPointSystem->setCreditCard($this);
    }

    /**
     * @param  ChildCardPointSystem $cardPointSystem The ChildCardPointSystem object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeCardPointSystem(ChildCardPointSystem $cardPointSystem)
    {
        if ($this->getCardPointSystems()->contains($cardPointSystem)) {
            $pos = $this->collCardPointSystems->search($cardPointSystem);
            $this->collCardPointSystems->remove($pos);
            if (null === $this->cardPointSystemsScheduledForDeletion) {
                $this->cardPointSystemsScheduledForDeletion = clone $this->collCardPointSystems;
                $this->cardPointSystemsScheduledForDeletion->clear();
            }
            $this->cardPointSystemsScheduledForDeletion[]= clone $cardPointSystem;
            $cardPointSystem->setCreditCard(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CreditCard is new, it will return
     * an empty collection; or if this CreditCard has previously
     * been saved, it will retrieve related CardPointSystems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CreditCard.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCardPointSystem[] List of ChildCardPointSystem objects
     */
    public function getCardPointSystemsJoinPointSystem(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCardPointSystemQuery::create(null, $criteria);
        $query->joinWith('PointSystem', $joinBehavior);

        return $this->getCardPointSystems($query, $con);
    }

    /**
     * Clears out the collCardRestrictions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCardRestrictions()
     */
    public function clearCardRestrictions()
    {
        $this->collCardRestrictions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCardRestrictions collection loaded partially.
     */
    public function resetPartialCardRestrictions($v = true)
    {
        $this->collCardRestrictionsPartial = $v;
    }

    /**
     * Initializes the collCardRestrictions collection.
     *
     * By default this just sets the collCardRestrictions collection to an empty array (like clearcollCardRestrictions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCardRestrictions($overrideExisting = true)
    {
        if (null !== $this->collCardRestrictions && !$overrideExisting) {
            return;
        }
        $this->collCardRestrictions = new ObjectCollection();
        $this->collCardRestrictions->setModel('\CardRestriction');
    }

    /**
     * Gets an array of ChildCardRestriction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCardRestriction[] List of ChildCardRestriction objects
     * @throws PropelException
     */
    public function getCardRestrictions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCardRestrictionsPartial && !$this->isNew();
        if (null === $this->collCardRestrictions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCardRestrictions) {
                // return empty collection
                $this->initCardRestrictions();
            } else {
                $collCardRestrictions = ChildCardRestrictionQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCardRestrictionsPartial && count($collCardRestrictions)) {
                        $this->initCardRestrictions(false);

                        foreach ($collCardRestrictions as $obj) {
                            if (false == $this->collCardRestrictions->contains($obj)) {
                                $this->collCardRestrictions->append($obj);
                            }
                        }

                        $this->collCardRestrictionsPartial = true;
                    }

                    return $collCardRestrictions;
                }

                if ($partial && $this->collCardRestrictions) {
                    foreach ($this->collCardRestrictions as $obj) {
                        if ($obj->isNew()) {
                            $collCardRestrictions[] = $obj;
                        }
                    }
                }

                $this->collCardRestrictions = $collCardRestrictions;
                $this->collCardRestrictionsPartial = false;
            }
        }

        return $this->collCardRestrictions;
    }

    /**
     * Sets a collection of ChildCardRestriction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $cardRestrictions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setCardRestrictions(Collection $cardRestrictions, ConnectionInterface $con = null)
    {
        /** @var ChildCardRestriction[] $cardRestrictionsToDelete */
        $cardRestrictionsToDelete = $this->getCardRestrictions(new Criteria(), $con)->diff($cardRestrictions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->cardRestrictionsScheduledForDeletion = clone $cardRestrictionsToDelete;

        foreach ($cardRestrictionsToDelete as $cardRestrictionRemoved) {
            $cardRestrictionRemoved->setCreditCard(null);
        }

        $this->collCardRestrictions = null;
        foreach ($cardRestrictions as $cardRestriction) {
            $this->addCardRestriction($cardRestriction);
        }

        $this->collCardRestrictions = $cardRestrictions;
        $this->collCardRestrictionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CardRestriction objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CardRestriction objects.
     * @throws PropelException
     */
    public function countCardRestrictions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCardRestrictionsPartial && !$this->isNew();
        if (null === $this->collCardRestrictions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCardRestrictions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCardRestrictions());
            }

            $query = ChildCardRestrictionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collCardRestrictions);
    }

    /**
     * Method called to associate a ChildCardRestriction object to this object
     * through the ChildCardRestriction foreign key attribute.
     *
     * @param  ChildCardRestriction $l ChildCardRestriction
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addCardRestriction(ChildCardRestriction $l)
    {
        if ($this->collCardRestrictions === null) {
            $this->initCardRestrictions();
            $this->collCardRestrictionsPartial = true;
        }

        if (!$this->collCardRestrictions->contains($l)) {
            $this->doAddCardRestriction($l);
        }

        return $this;
    }

    /**
     * @param ChildCardRestriction $cardRestriction The ChildCardRestriction object to add.
     */
    protected function doAddCardRestriction(ChildCardRestriction $cardRestriction)
    {
        $this->collCardRestrictions[]= $cardRestriction;
        $cardRestriction->setCreditCard($this);
    }

    /**
     * @param  ChildCardRestriction $cardRestriction The ChildCardRestriction object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeCardRestriction(ChildCardRestriction $cardRestriction)
    {
        if ($this->getCardRestrictions()->contains($cardRestriction)) {
            $pos = $this->collCardRestrictions->search($cardRestriction);
            $this->collCardRestrictions->remove($pos);
            if (null === $this->cardRestrictionsScheduledForDeletion) {
                $this->cardRestrictionsScheduledForDeletion = clone $this->collCardRestrictions;
                $this->cardRestrictionsScheduledForDeletion->clear();
            }
            $this->cardRestrictionsScheduledForDeletion[]= clone $cardRestriction;
            $cardRestriction->setCreditCard(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CreditCard is new, it will return
     * an empty collection; or if this CreditCard has previously
     * been saved, it will retrieve related CardRestrictions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CreditCard.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCardRestriction[] List of ChildCardRestriction objects
     */
    public function getCardRestrictionsJoinRestrictionType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCardRestrictionQuery::create(null, $criteria);
        $query->joinWith('RestrictionType', $joinBehavior);

        return $this->getCardRestrictions($query, $con);
    }

    /**
     * Clears out the collDiscountss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDiscountss()
     */
    public function clearDiscountss()
    {
        $this->collDiscountss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDiscountss collection loaded partially.
     */
    public function resetPartialDiscountss($v = true)
    {
        $this->collDiscountssPartial = $v;
    }

    /**
     * Initializes the collDiscountss collection.
     *
     * By default this just sets the collDiscountss collection to an empty array (like clearcollDiscountss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiscountss($overrideExisting = true)
    {
        if (null !== $this->collDiscountss && !$overrideExisting) {
            return;
        }
        $this->collDiscountss = new ObjectCollection();
        $this->collDiscountss->setModel('\Discounts');
    }

    /**
     * Gets an array of ChildDiscounts objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDiscounts[] List of ChildDiscounts objects
     * @throws PropelException
     */
    public function getDiscountss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountssPartial && !$this->isNew();
        if (null === $this->collDiscountss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiscountss) {
                // return empty collection
                $this->initDiscountss();
            } else {
                $collDiscountss = ChildDiscountsQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDiscountssPartial && count($collDiscountss)) {
                        $this->initDiscountss(false);

                        foreach ($collDiscountss as $obj) {
                            if (false == $this->collDiscountss->contains($obj)) {
                                $this->collDiscountss->append($obj);
                            }
                        }

                        $this->collDiscountssPartial = true;
                    }

                    return $collDiscountss;
                }

                if ($partial && $this->collDiscountss) {
                    foreach ($this->collDiscountss as $obj) {
                        if ($obj->isNew()) {
                            $collDiscountss[] = $obj;
                        }
                    }
                }

                $this->collDiscountss = $collDiscountss;
                $this->collDiscountssPartial = false;
            }
        }

        return $this->collDiscountss;
    }

    /**
     * Sets a collection of ChildDiscounts objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $discountss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setDiscountss(Collection $discountss, ConnectionInterface $con = null)
    {
        /** @var ChildDiscounts[] $discountssToDelete */
        $discountssToDelete = $this->getDiscountss(new Criteria(), $con)->diff($discountss);


        $this->discountssScheduledForDeletion = $discountssToDelete;

        foreach ($discountssToDelete as $discountsRemoved) {
            $discountsRemoved->setCreditCard(null);
        }

        $this->collDiscountss = null;
        foreach ($discountss as $discounts) {
            $this->addDiscounts($discounts);
        }

        $this->collDiscountss = $discountss;
        $this->collDiscountssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Discounts objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Discounts objects.
     * @throws PropelException
     */
    public function countDiscountss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountssPartial && !$this->isNew();
        if (null === $this->collDiscountss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiscountss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDiscountss());
            }

            $query = ChildDiscountsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collDiscountss);
    }

    /**
     * Method called to associate a ChildDiscounts object to this object
     * through the ChildDiscounts foreign key attribute.
     *
     * @param  ChildDiscounts $l ChildDiscounts
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addDiscounts(ChildDiscounts $l)
    {
        if ($this->collDiscountss === null) {
            $this->initDiscountss();
            $this->collDiscountssPartial = true;
        }

        if (!$this->collDiscountss->contains($l)) {
            $this->doAddDiscounts($l);
        }

        return $this;
    }

    /**
     * @param ChildDiscounts $discounts The ChildDiscounts object to add.
     */
    protected function doAddDiscounts(ChildDiscounts $discounts)
    {
        $this->collDiscountss[]= $discounts;
        $discounts->setCreditCard($this);
    }

    /**
     * @param  ChildDiscounts $discounts The ChildDiscounts object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeDiscounts(ChildDiscounts $discounts)
    {
        if ($this->getDiscountss()->contains($discounts)) {
            $pos = $this->collDiscountss->search($discounts);
            $this->collDiscountss->remove($pos);
            if (null === $this->discountssScheduledForDeletion) {
                $this->discountssScheduledForDeletion = clone $this->collDiscountss;
                $this->discountssScheduledForDeletion->clear();
            }
            $this->discountssScheduledForDeletion[]= clone $discounts;
            $discounts->setCreditCard(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CreditCard is new, it will return
     * an empty collection; or if this CreditCard has previously
     * been saved, it will retrieve related Discountss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CreditCard.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDiscounts[] List of ChildDiscounts objects
     */
    public function getDiscountssJoinStore(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDiscountsQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getDiscountss($query, $con);
    }

    /**
     * Clears out the collFeess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFeess()
     */
    public function clearFeess()
    {
        $this->collFeess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collFeess collection loaded partially.
     */
    public function resetPartialFeess($v = true)
    {
        $this->collFeessPartial = $v;
    }

    /**
     * Initializes the collFeess collection.
     *
     * By default this just sets the collFeess collection to an empty array (like clearcollFeess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFeess($overrideExisting = true)
    {
        if (null !== $this->collFeess && !$overrideExisting) {
            return;
        }
        $this->collFeess = new ObjectCollection();
        $this->collFeess->setModel('\Fees');
    }

    /**
     * Gets an array of ChildFees objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildFees[] List of ChildFees objects
     * @throws PropelException
     */
    public function getFeess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFeessPartial && !$this->isNew();
        if (null === $this->collFeess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFeess) {
                // return empty collection
                $this->initFeess();
            } else {
                $collFeess = ChildFeesQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collFeessPartial && count($collFeess)) {
                        $this->initFeess(false);

                        foreach ($collFeess as $obj) {
                            if (false == $this->collFeess->contains($obj)) {
                                $this->collFeess->append($obj);
                            }
                        }

                        $this->collFeessPartial = true;
                    }

                    return $collFeess;
                }

                if ($partial && $this->collFeess) {
                    foreach ($this->collFeess as $obj) {
                        if ($obj->isNew()) {
                            $collFeess[] = $obj;
                        }
                    }
                }

                $this->collFeess = $collFeess;
                $this->collFeessPartial = false;
            }
        }

        return $this->collFeess;
    }

    /**
     * Sets a collection of ChildFees objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $feess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setFeess(Collection $feess, ConnectionInterface $con = null)
    {
        /** @var ChildFees[] $feessToDelete */
        $feessToDelete = $this->getFeess(new Criteria(), $con)->diff($feess);


        $this->feessScheduledForDeletion = $feessToDelete;

        foreach ($feessToDelete as $feesRemoved) {
            $feesRemoved->setCreditCard(null);
        }

        $this->collFeess = null;
        foreach ($feess as $fees) {
            $this->addFees($fees);
        }

        $this->collFeess = $feess;
        $this->collFeessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Fees objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Fees objects.
     * @throws PropelException
     */
    public function countFeess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFeessPartial && !$this->isNew();
        if (null === $this->collFeess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFeess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getFeess());
            }

            $query = ChildFeesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collFeess);
    }

    /**
     * Method called to associate a ChildFees object to this object
     * through the ChildFees foreign key attribute.
     *
     * @param  ChildFees $l ChildFees
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addFees(ChildFees $l)
    {
        if ($this->collFeess === null) {
            $this->initFeess();
            $this->collFeessPartial = true;
        }

        if (!$this->collFeess->contains($l)) {
            $this->doAddFees($l);
        }

        return $this;
    }

    /**
     * @param ChildFees $fees The ChildFees object to add.
     */
    protected function doAddFees(ChildFees $fees)
    {
        $this->collFeess[]= $fees;
        $fees->setCreditCard($this);
    }

    /**
     * @param  ChildFees $fees The ChildFees object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeFees(ChildFees $fees)
    {
        if ($this->getFeess()->contains($fees)) {
            $pos = $this->collFeess->search($fees);
            $this->collFeess->remove($pos);
            if (null === $this->feessScheduledForDeletion) {
                $this->feessScheduledForDeletion = clone $this->collFeess;
                $this->feessScheduledForDeletion->clear();
            }
            $this->feessScheduledForDeletion[]= clone $fees;
            $fees->setCreditCard(null);
        }

        return $this;
    }

    /**
     * Clears out the collInsurances collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInsurances()
     */
    public function clearInsurances()
    {
        $this->collInsurances = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInsurances collection loaded partially.
     */
    public function resetPartialInsurances($v = true)
    {
        $this->collInsurancesPartial = $v;
    }

    /**
     * Initializes the collInsurances collection.
     *
     * By default this just sets the collInsurances collection to an empty array (like clearcollInsurances());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInsurances($overrideExisting = true)
    {
        if (null !== $this->collInsurances && !$overrideExisting) {
            return;
        }
        $this->collInsurances = new ObjectCollection();
        $this->collInsurances->setModel('\Insurance');
    }

    /**
     * Gets an array of ChildInsurance objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInsurance[] List of ChildInsurance objects
     * @throws PropelException
     */
    public function getInsurances(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInsurancesPartial && !$this->isNew();
        if (null === $this->collInsurances || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInsurances) {
                // return empty collection
                $this->initInsurances();
            } else {
                $collInsurances = ChildInsuranceQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInsurancesPartial && count($collInsurances)) {
                        $this->initInsurances(false);

                        foreach ($collInsurances as $obj) {
                            if (false == $this->collInsurances->contains($obj)) {
                                $this->collInsurances->append($obj);
                            }
                        }

                        $this->collInsurancesPartial = true;
                    }

                    return $collInsurances;
                }

                if ($partial && $this->collInsurances) {
                    foreach ($this->collInsurances as $obj) {
                        if ($obj->isNew()) {
                            $collInsurances[] = $obj;
                        }
                    }
                }

                $this->collInsurances = $collInsurances;
                $this->collInsurancesPartial = false;
            }
        }

        return $this->collInsurances;
    }

    /**
     * Sets a collection of ChildInsurance objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $insurances A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setInsurances(Collection $insurances, ConnectionInterface $con = null)
    {
        /** @var ChildInsurance[] $insurancesToDelete */
        $insurancesToDelete = $this->getInsurances(new Criteria(), $con)->diff($insurances);


        $this->insurancesScheduledForDeletion = $insurancesToDelete;

        foreach ($insurancesToDelete as $insuranceRemoved) {
            $insuranceRemoved->setCreditCard(null);
        }

        $this->collInsurances = null;
        foreach ($insurances as $insurance) {
            $this->addInsurance($insurance);
        }

        $this->collInsurances = $insurances;
        $this->collInsurancesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Insurance objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Insurance objects.
     * @throws PropelException
     */
    public function countInsurances(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInsurancesPartial && !$this->isNew();
        if (null === $this->collInsurances || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInsurances) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInsurances());
            }

            $query = ChildInsuranceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collInsurances);
    }

    /**
     * Method called to associate a ChildInsurance object to this object
     * through the ChildInsurance foreign key attribute.
     *
     * @param  ChildInsurance $l ChildInsurance
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addInsurance(ChildInsurance $l)
    {
        if ($this->collInsurances === null) {
            $this->initInsurances();
            $this->collInsurancesPartial = true;
        }

        if (!$this->collInsurances->contains($l)) {
            $this->doAddInsurance($l);
        }

        return $this;
    }

    /**
     * @param ChildInsurance $insurance The ChildInsurance object to add.
     */
    protected function doAddInsurance(ChildInsurance $insurance)
    {
        $this->collInsurances[]= $insurance;
        $insurance->setCreditCard($this);
    }

    /**
     * @param  ChildInsurance $insurance The ChildInsurance object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeInsurance(ChildInsurance $insurance)
    {
        if ($this->getInsurances()->contains($insurance)) {
            $pos = $this->collInsurances->search($insurance);
            $this->collInsurances->remove($pos);
            if (null === $this->insurancesScheduledForDeletion) {
                $this->insurancesScheduledForDeletion = clone $this->collInsurances;
                $this->insurancesScheduledForDeletion->clear();
            }
            $this->insurancesScheduledForDeletion[]= clone $insurance;
            $insurance->setCreditCard(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CreditCard is new, it will return
     * an empty collection; or if this CreditCard has previously
     * been saved, it will retrieve related Insurances from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CreditCard.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInsurance[] List of ChildInsurance objects
     */
    public function getInsurancesJoinInsuranceType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInsuranceQuery::create(null, $criteria);
        $query->joinWith('InsuranceType', $joinBehavior);

        return $this->getInsurances($query, $con);
    }

    /**
     * Clears out the collInterests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInterests()
     */
    public function clearInterests()
    {
        $this->collInterests = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInterests collection loaded partially.
     */
    public function resetPartialInterests($v = true)
    {
        $this->collInterestsPartial = $v;
    }

    /**
     * Initializes the collInterests collection.
     *
     * By default this just sets the collInterests collection to an empty array (like clearcollInterests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInterests($overrideExisting = true)
    {
        if (null !== $this->collInterests && !$overrideExisting) {
            return;
        }
        $this->collInterests = new ObjectCollection();
        $this->collInterests->setModel('\Interest');
    }

    /**
     * Gets an array of ChildInterest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInterest[] List of ChildInterest objects
     * @throws PropelException
     */
    public function getInterests(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInterestsPartial && !$this->isNew();
        if (null === $this->collInterests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInterests) {
                // return empty collection
                $this->initInterests();
            } else {
                $collInterests = ChildInterestQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInterestsPartial && count($collInterests)) {
                        $this->initInterests(false);

                        foreach ($collInterests as $obj) {
                            if (false == $this->collInterests->contains($obj)) {
                                $this->collInterests->append($obj);
                            }
                        }

                        $this->collInterestsPartial = true;
                    }

                    return $collInterests;
                }

                if ($partial && $this->collInterests) {
                    foreach ($this->collInterests as $obj) {
                        if ($obj->isNew()) {
                            $collInterests[] = $obj;
                        }
                    }
                }

                $this->collInterests = $collInterests;
                $this->collInterestsPartial = false;
            }
        }

        return $this->collInterests;
    }

    /**
     * Sets a collection of ChildInterest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $interests A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setInterests(Collection $interests, ConnectionInterface $con = null)
    {
        /** @var ChildInterest[] $interestsToDelete */
        $interestsToDelete = $this->getInterests(new Criteria(), $con)->diff($interests);


        $this->interestsScheduledForDeletion = $interestsToDelete;

        foreach ($interestsToDelete as $interestRemoved) {
            $interestRemoved->setCreditCard(null);
        }

        $this->collInterests = null;
        foreach ($interests as $interest) {
            $this->addInterest($interest);
        }

        $this->collInterests = $interests;
        $this->collInterestsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Interest objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Interest objects.
     * @throws PropelException
     */
    public function countInterests(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInterestsPartial && !$this->isNew();
        if (null === $this->collInterests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInterests) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInterests());
            }

            $query = ChildInterestQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collInterests);
    }

    /**
     * Method called to associate a ChildInterest object to this object
     * through the ChildInterest foreign key attribute.
     *
     * @param  ChildInterest $l ChildInterest
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addInterest(ChildInterest $l)
    {
        if ($this->collInterests === null) {
            $this->initInterests();
            $this->collInterestsPartial = true;
        }

        if (!$this->collInterests->contains($l)) {
            $this->doAddInterest($l);
        }

        return $this;
    }

    /**
     * @param ChildInterest $interest The ChildInterest object to add.
     */
    protected function doAddInterest(ChildInterest $interest)
    {
        $this->collInterests[]= $interest;
        $interest->setCreditCard($this);
    }

    /**
     * @param  ChildInterest $interest The ChildInterest object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeInterest(ChildInterest $interest)
    {
        if ($this->getInterests()->contains($interest)) {
            $pos = $this->collInterests->search($interest);
            $this->collInterests->remove($pos);
            if (null === $this->interestsScheduledForDeletion) {
                $this->interestsScheduledForDeletion = clone $this->collInterests;
                $this->interestsScheduledForDeletion->clear();
            }
            $this->interestsScheduledForDeletion[]= clone $interest;
            $interest->setCreditCard(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CreditCard is new, it will return
     * an empty collection; or if this CreditCard has previously
     * been saved, it will retrieve related Interests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CreditCard.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInterest[] List of ChildInterest objects
     */
    public function getInterestsJoinPaymentType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInterestQuery::create(null, $criteria);
        $query->joinWith('PaymentType', $joinBehavior);

        return $this->getInterests($query, $con);
    }

    /**
     * Clears out the collMapCardFeatureConstraints collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMapCardFeatureConstraints()
     */
    public function clearMapCardFeatureConstraints()
    {
        $this->collMapCardFeatureConstraints = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMapCardFeatureConstraints collection loaded partially.
     */
    public function resetPartialMapCardFeatureConstraints($v = true)
    {
        $this->collMapCardFeatureConstraintsPartial = $v;
    }

    /**
     * Initializes the collMapCardFeatureConstraints collection.
     *
     * By default this just sets the collMapCardFeatureConstraints collection to an empty array (like clearcollMapCardFeatureConstraints());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMapCardFeatureConstraints($overrideExisting = true)
    {
        if (null !== $this->collMapCardFeatureConstraints && !$overrideExisting) {
            return;
        }
        $this->collMapCardFeatureConstraints = new ObjectCollection();
        $this->collMapCardFeatureConstraints->setModel('\MapCardFeatureConstraint');
    }

    /**
     * Gets an array of ChildMapCardFeatureConstraint objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCreditCard is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMapCardFeatureConstraint[] List of ChildMapCardFeatureConstraint objects
     * @throws PropelException
     */
    public function getMapCardFeatureConstraints(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMapCardFeatureConstraintsPartial && !$this->isNew();
        if (null === $this->collMapCardFeatureConstraints || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMapCardFeatureConstraints) {
                // return empty collection
                $this->initMapCardFeatureConstraints();
            } else {
                $collMapCardFeatureConstraints = ChildMapCardFeatureConstraintQuery::create(null, $criteria)
                    ->filterByCreditCard($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMapCardFeatureConstraintsPartial && count($collMapCardFeatureConstraints)) {
                        $this->initMapCardFeatureConstraints(false);

                        foreach ($collMapCardFeatureConstraints as $obj) {
                            if (false == $this->collMapCardFeatureConstraints->contains($obj)) {
                                $this->collMapCardFeatureConstraints->append($obj);
                            }
                        }

                        $this->collMapCardFeatureConstraintsPartial = true;
                    }

                    return $collMapCardFeatureConstraints;
                }

                if ($partial && $this->collMapCardFeatureConstraints) {
                    foreach ($this->collMapCardFeatureConstraints as $obj) {
                        if ($obj->isNew()) {
                            $collMapCardFeatureConstraints[] = $obj;
                        }
                    }
                }

                $this->collMapCardFeatureConstraints = $collMapCardFeatureConstraints;
                $this->collMapCardFeatureConstraintsPartial = false;
            }
        }

        return $this->collMapCardFeatureConstraints;
    }

    /**
     * Sets a collection of ChildMapCardFeatureConstraint objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $mapCardFeatureConstraints A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function setMapCardFeatureConstraints(Collection $mapCardFeatureConstraints, ConnectionInterface $con = null)
    {
        /** @var ChildMapCardFeatureConstraint[] $mapCardFeatureConstraintsToDelete */
        $mapCardFeatureConstraintsToDelete = $this->getMapCardFeatureConstraints(new Criteria(), $con)->diff($mapCardFeatureConstraints);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->mapCardFeatureConstraintsScheduledForDeletion = clone $mapCardFeatureConstraintsToDelete;

        foreach ($mapCardFeatureConstraintsToDelete as $mapCardFeatureConstraintRemoved) {
            $mapCardFeatureConstraintRemoved->setCreditCard(null);
        }

        $this->collMapCardFeatureConstraints = null;
        foreach ($mapCardFeatureConstraints as $mapCardFeatureConstraint) {
            $this->addMapCardFeatureConstraint($mapCardFeatureConstraint);
        }

        $this->collMapCardFeatureConstraints = $mapCardFeatureConstraints;
        $this->collMapCardFeatureConstraintsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MapCardFeatureConstraint objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MapCardFeatureConstraint objects.
     * @throws PropelException
     */
    public function countMapCardFeatureConstraints(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMapCardFeatureConstraintsPartial && !$this->isNew();
        if (null === $this->collMapCardFeatureConstraints || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMapCardFeatureConstraints) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMapCardFeatureConstraints());
            }

            $query = ChildMapCardFeatureConstraintQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCreditCard($this)
                ->count($con);
        }

        return count($this->collMapCardFeatureConstraints);
    }

    /**
     * Method called to associate a ChildMapCardFeatureConstraint object to this object
     * through the ChildMapCardFeatureConstraint foreign key attribute.
     *
     * @param  ChildMapCardFeatureConstraint $l ChildMapCardFeatureConstraint
     * @return $this|\CreditCard The current object (for fluent API support)
     */
    public function addMapCardFeatureConstraint(ChildMapCardFeatureConstraint $l)
    {
        if ($this->collMapCardFeatureConstraints === null) {
            $this->initMapCardFeatureConstraints();
            $this->collMapCardFeatureConstraintsPartial = true;
        }

        if (!$this->collMapCardFeatureConstraints->contains($l)) {
            $this->doAddMapCardFeatureConstraint($l);
        }

        return $this;
    }

    /**
     * @param ChildMapCardFeatureConstraint $mapCardFeatureConstraint The ChildMapCardFeatureConstraint object to add.
     */
    protected function doAddMapCardFeatureConstraint(ChildMapCardFeatureConstraint $mapCardFeatureConstraint)
    {
        $this->collMapCardFeatureConstraints[]= $mapCardFeatureConstraint;
        $mapCardFeatureConstraint->setCreditCard($this);
    }

    /**
     * @param  ChildMapCardFeatureConstraint $mapCardFeatureConstraint The ChildMapCardFeatureConstraint object to remove.
     * @return $this|ChildCreditCard The current object (for fluent API support)
     */
    public function removeMapCardFeatureConstraint(ChildMapCardFeatureConstraint $mapCardFeatureConstraint)
    {
        if ($this->getMapCardFeatureConstraints()->contains($mapCardFeatureConstraint)) {
            $pos = $this->collMapCardFeatureConstraints->search($mapCardFeatureConstraint);
            $this->collMapCardFeatureConstraints->remove($pos);
            if (null === $this->mapCardFeatureConstraintsScheduledForDeletion) {
                $this->mapCardFeatureConstraintsScheduledForDeletion = clone $this->collMapCardFeatureConstraints;
                $this->mapCardFeatureConstraintsScheduledForDeletion->clear();
            }
            $this->mapCardFeatureConstraintsScheduledForDeletion[]= clone $mapCardFeatureConstraint;
            $mapCardFeatureConstraint->setCreditCard(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CreditCard is new, it will return
     * an empty collection; or if this CreditCard has previously
     * been saved, it will retrieve related MapCardFeatureConstraints from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CreditCard.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMapCardFeatureConstraint[] List of ChildMapCardFeatureConstraint objects
     */
    public function getMapCardFeatureConstraintsJoinCardFeatureType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMapCardFeatureConstraintQuery::create(null, $criteria);
        $query->joinWith('CardFeatureType', $joinBehavior);

        return $this->getMapCardFeatureConstraints($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aAffiliateCompany) {
            $this->aAffiliateCompany->removeCreditCard($this);
        }
        if (null !== $this->aIssuer) {
            $this->aIssuer->removeCreditCard($this);
        }
        $this->credit_card_id = null;
        $this->name = null;
        $this->issuer_id = null;
        $this->description = null;
        $this->image_link = null;
        $this->visa = null;
        $this->master = null;
        $this->jcb = null;
        $this->amex = null;
        $this->diners = null;
        $this->afilliate_link = null;
        $this->affiliate_id = null;
        $this->pointexpirymonths = null;
        $this->reference = null;
        $this->commission = null;
        $this->isactive = null;
        $this->update_time = null;
        $this->update_user = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collCampaigns) {
                foreach ($this->collCampaigns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCardDescriptions) {
                foreach ($this->collCardDescriptions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCardFeaturess) {
                foreach ($this->collCardFeaturess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCardPointSystems) {
                foreach ($this->collCardPointSystems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCardRestrictions) {
                foreach ($this->collCardRestrictions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDiscountss) {
                foreach ($this->collDiscountss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFeess) {
                foreach ($this->collFeess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInsurances) {
                foreach ($this->collInsurances as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInterests) {
                foreach ($this->collInterests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMapCardFeatureConstraints) {
                foreach ($this->collMapCardFeatureConstraints as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCampaigns = null;
        $this->collCardDescriptions = null;
        $this->collCardFeaturess = null;
        $this->collCardPointSystems = null;
        $this->collCardRestrictions = null;
        $this->collDiscountss = null;
        $this->collFeess = null;
        $this->collInsurances = null;
        $this->collInterests = null;
        $this->collMapCardFeatureConstraints = null;
        $this->aAffiliateCompany = null;
        $this->aIssuer = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CreditCardTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
