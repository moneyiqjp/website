SET FOREIGN_KEY_CHECKS = 0;
SET NAMES utf8;

DROP TABLE IF EXISTS `affiliate_company`;
CREATE TABLE IF NOT EXISTS `affiliate_company` (
  `affiliate_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `website` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `signed_up_date` date NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`affiliate_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


DROP TABLE IF EXISTS `affiliate_company_history`;
CREATE TABLE IF NOT EXISTS `affiliate_company_history` (
  `affiliate_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `website` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `signed_up_date` date NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`affiliate_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*
--
-- Triggers `affiliate_company`
--
DROP TRIGGER IF EXISTS `affiliate_company_before_update`;
DELIMITER //
CREATE TRIGGER `affiliate_company_before_update` BEFORE UPDATE ON `affiliate_company`
 FOR EACH ROW INSERT INTO affiliate_company_history (affiliate_id, name, description, website, signed_up_date,time_beg,time_end, update_user) values (OLD.affiliate_id,	OLD.name,	OLD.description,	OLD.website, OLD.signed_up_date, OLD.update_time,   NOW(),	OLD.update_user)
//
DELIMITER ;
*/


show warnings;

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
CREATE TABLE IF NOT EXISTS `campaign` (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_id` int(11) NOT NULL,
  `campaign_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `max_points` int(11) DEFAULT NULL,
  `value_in_yen` int(11) DEFAULT NULL,
  `start_date` date DEFAULT '1000-01-01',
  `end_date` date DEFAULT '9999-12-31',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`campaign_id`),
  KEY `campaign_credit_card` (`credit_card_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;
/*
--
-- Triggers `campaign`
--
DROP TRIGGER IF EXISTS `campaign_before_update`;
DELIMITER //
CREATE TRIGGER `campaign_before_update` BEFORE UPDATE ON `campaign`
 FOR EACH ROW INSERT INTO campaign_history (campaign_id, credit_card_id, campaign_name, description, max_points, value_in_yen, start_date, end_date, time_beg, time_end, update_user )
VALUES (OLD.campaign_id, OLD.credit_card_id, OLD.campaign_name, OLD.description, OLD.max_points, OLD.value_in_yen, start_date = OLD.start_date, OLD.end_date, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `campaign_history`
--

DROP TABLE IF EXISTS `campaign_history`;
CREATE TABLE IF NOT EXISTS `campaign_history` (
  `campaign_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `campaign_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `max_points` int(11) DEFAULT NULL,
  `value_in_yen` int(11) DEFAULT NULL,
  `start_date` date DEFAULT '1000-01-01',
  `end_date` date DEFAULT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`campaign_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card_description`
--

DROP TABLE IF EXISTS `card_description`;
CREATE TABLE IF NOT EXISTS `card_description` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_id` int(11) NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `item_description` text CHARACTER SET utf8,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `creditcard_description` (`credit_card_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
/*
--
-- Triggers `card_description`
--
DROP TRIGGER IF EXISTS `card_description_before_update`;
DELIMITER //
CREATE TRIGGER `card_description_before_update` BEFORE UPDATE ON `card_description`
 FOR EACH ROW INSERT INTO card_description_history (item_id, credit_card_id, item_name, item_description, time_beg, time_end, update_user)
VALUES ( OLD.item_id, OLD.credit_card_id, OLD.item_name, OLD.item_description, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `card_description_history`
--

DROP TABLE IF EXISTS `card_description_history`;
CREATE TABLE IF NOT EXISTS `card_description_history` (
  `item_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `item_description` text CHARACTER SET utf8,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`item_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card_features`
--

DROP TABLE IF EXISTS `card_features`;
CREATE TABLE IF NOT EXISTS `card_features` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_type_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `feature_cost` int(11) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`feature_id`),
  KEY `card_features_credit_card` (`credit_card_id`),
  KEY `fk_card_feature_type` (`feature_type_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;
/*
--
-- Triggers `card_features`
--
DROP TRIGGER IF EXISTS `card_features_before_update`;
DELIMITER //
CREATE TRIGGER `card_features_before_update` BEFORE UPDATE ON `card_features`
 FOR EACH ROW INSERT INTO card_features_history (feature_id, feature_type_id,credit_card_id, description, feature_cost, time_beg, time_end, update_user)
VALUES( OLD.feature_id, OLD.feature_type_id, OLD.credit_card_id, OLD.description, OLD.feature_cost, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `card_features_history`
--

DROP TABLE IF EXISTS `card_features_history`;
CREATE TABLE IF NOT EXISTS `card_features_history` (
  `feature_id` int(11) NOT NULL,
  `feature_type_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `feature_cost` int(11) DEFAULT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`feature_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card_feature_type`
--

DROP TABLE IF EXISTS `card_feature_type`;
CREATE TABLE IF NOT EXISTS `card_feature_type` (
  `feature_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `category` varchar(250) CHARACTER SET utf8 NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`feature_type_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `card_feature_type_history`
--

DROP TABLE IF EXISTS `card_feature_type_history`;
CREATE TABLE IF NOT EXISTS `card_feature_type_history` (
  `feature_type_id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `category` varchar(250) CHARACTER SET utf8 NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`feature_type_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

DROP TABLE IF EXISTS `credit_card`;
CREATE TABLE IF NOT EXISTS `credit_card` (
  `credit_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `issuer_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `image_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `visa` tinyint(1) DEFAULT '0',
  `master` tinyint(1) DEFAULT '0',
  `jcb` tinyint(1) DEFAULT '0',
  `amex` tinyint(1) DEFAULT '0',
  `diners` tinyint(1) DEFAULT '0',
  `afilliate_link` text CHARACTER SET utf8,
  `affiliate_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`credit_card_id`),
  KEY `idx_1` (`credit_card_id`),
  KEY `affiliate_company_credit_card` (`affiliate_id`),
  KEY `issuer_credit_card` (`issuer_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;
/*
--
-- Triggers `credit_card`
--
DROP TRIGGER IF EXISTS `credit_card_before_update`;
DELIMITER //
CREATE TRIGGER `credit_card_before_update` BEFORE UPDATE ON `credit_card`
 FOR EACH ROW INSERT INTO credit_card_history (credit_card_id, name, issuer_id, description, visa, master, jcb, amex, diners, afilliate_link, affiliate_id, time_beg, time_end, update_user )
VALUES ( OLD.credit_card_id, OLD.name, OLD.issuer_id, OLD.description, OLD.visa, OLD.master, OLD.jcb, OLD.amex, OLD.diners, OLD.afilliate_link, OLD.affiliate_id, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `credit_card_history`
--

DROP TABLE IF EXISTS `credit_card_history`;
CREATE TABLE IF NOT EXISTS `credit_card_history` (
  `credit_card_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `issuer_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `image_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `visa` tinyint(1) DEFAULT '0',
  `master` tinyint(1) DEFAULT '0',
  `jcb` tinyint(1) DEFAULT '0',
  `amex` tinyint(1) DEFAULT '0',
  `diners` tinyint(1) DEFAULT '0',
  `afilliate_link` text CHARACTER SET utf8,
  `affiliate_id` int(11) NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`credit_card_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` double(15,15) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `credit_card_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `multiple` double(30,30) NOT NULL,
  `conditions` text CHARACTER SET utf8,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`discount_id`),
  KEY `fk_discounts_credit_card` (`credit_card_id`),
  KEY `fk_discounts_store` (`store_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;
/*
--
-- Triggers `discounts`
--
DROP TRIGGER IF EXISTS `discounts_before_update`;
DELIMITER //
CREATE TRIGGER `discounts_before_update` BEFORE UPDATE ON `discounts`
 FOR EACH ROW INSERT INTO discounts_history (discount_id, percentage, start_date, end_date, description, credit_card_id, store_id, multiple, conditions, update_time, update_user)
VALUES (OLD.discount_id, OLD.percentage, OLD.start_date, OLD.end_date, OLD.description, OLD.credit_card_id, OLD.store_id, OLD.multiple, OLD.conditions, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `discounts_history`
--

DROP TABLE IF EXISTS `discounts_history`;
CREATE TABLE IF NOT EXISTS `discounts_history` (
  `discount_id` int(11) NOT NULL,
  `percentage` double(15,15) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `credit_card_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `multiple` double(30,30) NOT NULL,
  `conditions` text CHARACTER SET utf8,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`discount_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
CREATE TABLE IF NOT EXISTS `fees` (
  `fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_type` int(11) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `yearly_occurrence` int(11) DEFAULT NULL,
  `start_year` int(11) DEFAULT NULL,
  `end_year` int(11) DEFAULT NULL,
  `credit_card_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`fee_id`),
  KEY `fees_credit_card` (`credit_card_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;
/*
--
-- Triggers `fees`
--
DROP TRIGGER IF EXISTS `fees_before_update`;
DELIMITER //
CREATE TRIGGER `fees_before_update` BEFORE UPDATE ON `fees`
 FOR EACH ROW INSERT INTO fees_history (fee_id, fee_type, fee_amount, yearly_occurrence, start_year, end_year, credit_card_id, time_beg, time_end, update_user)
VALUES ( OLD.fee_id, OLD.fee_type, OLD.fee_amount, OLD.yearly_occurrence, OLD.start_year, OLD.end_year, OLD.credit_card_id, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `fees_history`
--

DROP TABLE IF EXISTS `fees_history`;
CREATE TABLE IF NOT EXISTS `fees_history` (
  `fee_id` int(11) NOT NULL,
  `fee_type` int(11) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `yearly_occurrence` int(11) DEFAULT NULL,
  `start_year` int(11) DEFAULT NULL,
  `end_year` int(11) DEFAULT NULL,
  `credit_card_id` int(11) NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`fee_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

DROP TABLE IF EXISTS `insurance`;
CREATE TABLE IF NOT EXISTS `insurance` (
  `insurance_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_id` int(11) NOT NULL,
  `insurance_type_id` int(11) NOT NULL,
  `max_insured_amount` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`insurance_id`),
  KEY `insurance_credit_card` (`credit_card_id`),
  KEY `insurance_insurance_type` (`insurance_type_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

/*
--
-- Triggers `insurance`
--
DROP TRIGGER IF EXISTS `insurance_before_update`;
DELIMITER //
CREATE TRIGGER `insurance_before_update` BEFORE UPDATE ON `insurance`
 FOR EACH ROW INSERT INTO insurance_history (insurance_id, credit_card_id, insurance_type_id, max_insured_amount, value, time_beg, time_end, update_user)
VALUES (OLD.insurance_id, OLD.credit_card_id, OLD.insurance_type_id, OLD.max_insured_amount, OLD.value, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `insurance_history`
--

DROP TABLE IF EXISTS `insurance_history`;
CREATE TABLE IF NOT EXISTS `insurance_history` (
  `insurance_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `insurance_type_id` int(11) NOT NULL,
  `max_insured_amount` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`insurance_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_type`
--

DROP TABLE IF EXISTS `insurance_type`;
CREATE TABLE IF NOT EXISTS `insurance_type` (
  `insurance_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `subtype_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `region` varchar(255) DEFAULT 'Global',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`insurance_type_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_type_history`
--

DROP TABLE IF EXISTS `insurance_type_history`;
CREATE TABLE IF NOT EXISTS `insurance_type_history` (
  `insurance_type_id` int(11) NOT NULL,
  `type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `subtype_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `region` varchar(255) DEFAULT 'Global',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  PRIMARY KEY (`insurance_type_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
CREATE TABLE IF NOT EXISTS `interest` (
  `interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `min_interest` double(15,15) DEFAULT NULL,
  `max_interest` double(15,15) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`interest_id`),
  KEY `credit_card_id` (`credit_card_id`),
  KEY `Interest_payment_type` (`payment_type_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;
/*
--
-- Triggers `interest`
--
DROP TRIGGER IF EXISTS `interest_before_update`;
DELIMITER //
CREATE TRIGGER `interest_before_update` BEFORE UPDATE ON `interest`
 FOR EACH ROW INSERT INTO interest_history (interest_id, credit_card_id, payment_type_id, min_interest, max_interest, time_beg, time_end, update_user)
VALUES (OLD.payment_type_id, OLD.payment_type_id, OLD.min_interest, OLD.max_interest, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `interest_history`
--

DROP TABLE IF EXISTS `interest_history`;
CREATE TABLE IF NOT EXISTS `interest_history` (
  `interest_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `min_interest` double(15,15) DEFAULT NULL,
  `max_interest` double(15,15) DEFAULT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`credit_card_id`,`payment_type_id`,`time_beg`),
  KEY `interest_id` (`interest_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuer`
--

DROP TABLE IF EXISTS `issuer`;
CREATE TABLE IF NOT EXISTS `issuer` (
  `issuer_id` int(11) NOT NULL AUTO_INCREMENT,
  `issuer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`issuer_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;
/*
--
-- Triggers `issuer`
--
DROP TRIGGER IF EXISTS `issuer_before_update`;
DELIMITER //
CREATE TRIGGER `issuer_before_update` BEFORE UPDATE ON `issuer`
 FOR EACH ROW INSERT INTO issuer_history (issuer_id, issuer_name, time_beg, time_end, update_user)
VALUES ( OLD.issuer_id, OLD.issuer_name, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `issuer_history`
--

DROP TABLE IF EXISTS `issuer_history`;
CREATE TABLE IF NOT EXISTS `issuer_history` (
  `issuer_id` int(11) NOT NULL,
  `issuer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`issuer_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

DROP TABLE IF EXISTS `payment_type`;
CREATE TABLE IF NOT EXISTS `payment_type` (
  `payment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_description` text CHARACTER SET utf8 NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`payment_type_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
/*
--
-- Triggers `payment_type`
--
DROP TRIGGER IF EXISTS `payment_type_before_update`;
DELIMITER //
CREATE TRIGGER `payment_type_before_update` BEFORE UPDATE ON `payment_type`
 FOR EACH ROW INSERT INTO payment_type_history (payment_type_id, payment_type, payment_description, time_beg, time_end, update_user)
VALUES (OLD.payment_type_id, OLD.payment_type, OLD.payment_description, OLD.update_time, NOW(), update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `payment_type_history`
--

DROP TABLE IF EXISTS `payment_type_history`;
CREATE TABLE IF NOT EXISTS `payment_type_history` (
  `payment_type_id` int(11) NOT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_description` text CHARACTER SET utf8 NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`payment_type_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point_system`
--

DROP TABLE IF EXISTS `point_system`;
CREATE TABLE IF NOT EXISTS `point_system` (
  `point_system_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_system_name` varchar(255) NOT NULL,
  `points_per_yen` double(15,15) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`point_system_id`),
  KEY `credit_card_point_system` (`credit_card_id`),
  KEY `point_system_store` (`store_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;
/*
--
-- Triggers `point_system`
--
DROP TRIGGER IF EXISTS `point_system_before_update`;
DELIMITER //
CREATE TRIGGER `point_system_before_update` BEFORE UPDATE ON `point_system`
 FOR EACH ROW INSERT INTO point_system_history (point_system_id, point_system_name, points_per_yen, credit_card_id, store_id, time_beg, time_end, update_user)
VALUES (OLD.point_system_id, OLD.point_system_name, OLD.points_per_yen, OLD.credit_card_id, OLD.store_id, OLD.update_time, NOW(), OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `point_system_history`
--

DROP TABLE IF EXISTS `point_system_history`;
CREATE TABLE IF NOT EXISTS `point_system_history` (
  `point_system_id` int(11) NOT NULL,
  `point_system_name` varchar(255) NOT NULL,
  `points_per_yen` double(15,15) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`point_system_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point_usage`
--

DROP TABLE IF EXISTS `point_usage`;
CREATE TABLE IF NOT EXISTS `point_usage` (
  `point_usage_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `yen_per_point` double(16,16) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`point_usage_id`),
  KEY `point_usage_credit_card` (`credit_card_id`),
  KEY `const_point_usage_store` (`store_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

/*
--
-- Triggers `point_usage`
--
DROP TRIGGER IF EXISTS `point_usage_before_update`;
DELIMITER //
CREATE TRIGGER `point_usage_before_update` BEFORE UPDATE ON `point_usage`
 FOR EACH ROW INSERT INTO point_usage_history (point_usage_id, store_id, yen_per_point, credit_card_id, time_beg, time_end, update_user)
values (OLD.point_usage_id,OLD.store_id, OLD.yen_per_point, OLD.credit_card_id, OLD.update_time, NOW(),OLD.update_user)
//
DELIMITER ;
*/
-- --------------------------------------------------------

--
-- Table structure for table `point_usage_history`
--

DROP TABLE IF EXISTS `point_usage_history`;
CREATE TABLE IF NOT EXISTS `point_usage_history` (
  `point_usage_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `yen_per_point` double(16,16) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`point_usage_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` text CHARACTER SET utf8 NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

-- --------------------------------------------------------

--
-- Table structure for table `store_history`
--

DROP TABLE IF EXISTS `store_history`;
CREATE TABLE IF NOT EXISTS `store_history` (
  `store_id` int(11) NOT NULL,
  `store_name` text CHARACTER SET utf8 NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`store_id`,`time_beg`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;