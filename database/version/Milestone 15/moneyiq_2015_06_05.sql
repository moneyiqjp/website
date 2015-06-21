-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2015 at 05:37 AM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moneyiq`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_company`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `affiliate_company`
--

TRUNCATE TABLE `affiliate_company`;
--
-- Dumping data for table `affiliate_company`
--

INSERT INTO `affiliate_company` (`affiliate_id`, `name`, `description`, `website`, `signed_up_date`, `update_time`, `update_user`) VALUES
(1, 'A8', '', 'http://www.a8.net/', '2015-04-04', '2015-04-04 19:50:58', 'ben'),
(2, 'JANet', '', 'https://www.j-a-net.jp/', '2015-04-04', '2015-04-04 19:50:58', 'ben');

--
-- Triggers `affiliate_company`
--
DROP TRIGGER IF EXISTS `affiliate_company_before_update`;
DELIMITER //
CREATE TRIGGER `affiliate_company_before_update` BEFORE UPDATE ON `affiliate_company`
 FOR EACH ROW INSERT INTO affiliate_company_history (affiliate_id, name, description, website, signed_up_date,time_beg,time_end, update_user) values (OLD.affiliate_id,	OLD.name,	OLD.description,	OLD.website, OLD.signed_up_date, OLD.update_time,   NOW(),	OLD.update_user)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_company_history`
--

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `affiliate_company_history`
--

TRUNCATE TABLE `affiliate_company_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Truncate table before insert `campaign`
--

TRUNCATE TABLE `campaign`;
--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`campaign_id`, `credit_card_id`, `campaign_name`, `description`, `max_points`, `value_in_yen`, `start_date`, `end_date`, `update_time`, `update_user`) VALUES
(1, 1, NULL, NULL, 7000, 7000, NULL, '2015-01-15', '2015-04-04 19:51:09', 'ben'),
(2, 2, NULL, NULL, 7000, 7000, NULL, '2015-01-15', '2015-04-04 19:51:09', 'ben'),
(3, 3, NULL, NULL, 10000, 10000, '1900-01-01', '2015-01-15', '2015-04-04 19:51:09', 'ben'),
(4, 4, NULL, NULL, NULL, NULL, '2014-11-01', NULL, '2015-04-04 19:51:09', 'ben'),
(5, 5, NULL, NULL, 2000, 2000, '2014-12-26', '2015-01-05', '2015-04-04 19:51:09', 'ben'),
(6, 6, NULL, NULL, 5500, 5500, '2014-12-26', '2015-01-05', '2015-04-04 19:51:09', 'ben'),
(7, 7, NULL, NULL, 5500, 5500, NULL, NULL, '2015-04-04 19:51:09', 'ben'),
(8, 19, NULL, NULL, NULL, NULL, '2015-01-01', '2015-02-28', '2015-04-04 19:51:09', 'ben'),
(9, 20, NULL, NULL, 2000, 4000, NULL, NULL, '2015-04-04 19:51:09', 'ben'),
(10, 21, NULL, NULL, NULL, NULL, NULL, '2015-03-31', '2015-04-04 19:51:09', 'ben'),
(11, 22, NULL, NULL, 1000, 1000, NULL, '2015-03-31', '2015-04-04 19:51:09', 'ben'),
(12, 23, NULL, NULL, 1000, 1000, NULL, NULL, '2015-04-04 19:51:09', 'ben'),
(13, 28, NULL, NULL, NULL, NULL, '2015-01-05', '2015-03-15', '2015-04-04 19:51:09', 'ben'),
(14, 29, NULL, NULL, 7500, 7500, '2015-01-05', '2015-03-15', '2015-04-04 19:51:09', 'ben'),
(15, 30, NULL, NULL, 2000, 2000, '2015-01-05', '2015-03-15', '2015-04-04 19:51:09', 'ben'),
(16, 31, NULL, NULL, 9500, 9500, NULL, NULL, '2015-04-04 19:51:09', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `campaign_history`
--

TRUNCATE TABLE `campaign_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Truncate table before insert `card_description`
--

TRUNCATE TABLE `card_description`;
--
-- Dumping data for table `card_description`
--

INSERT INTO `card_description` (`item_id`, `credit_card_id`, `item_name`, `item_description`, `update_time`, `update_user`) VALUES
(1, 1, 'general description', '最短3営業日カード発送', '2015-04-04 19:51:40', 'ben'),
(2, 2, 'general description', '最短3営業日カード発送', '2015-04-04 19:51:40', 'ben'),
(3, 3, 'general description', '最短3営業日カード発送', '2015-04-04 19:51:40', 'ben'),
(4, 10, 'general description', '24時間365日のロードサーブス', '2015-04-04 19:51:40', 'ben'),
(5, 10, 'general description', 'メンテンアンス料金割引サービス', '2015-04-04 19:51:40', 'ben'),
(6, 11, 'general description', '24時間365日のロードサーブス', '2015-04-04 19:51:40', 'ben'),
(7, 11, 'general description', 'メンテンアンス料金割引サービス', '2015-04-04 19:51:40', 'ben'),
(8, 12, 'general description', '24時間365日のロードサーブス', '2015-04-04 19:51:40', 'ben'),
(9, 12, 'general description', 'メンテンアンス料金割引サービス', '2015-04-04 19:51:40', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `card_description_history`
--

TRUNCATE TABLE `card_description_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Truncate table before insert `card_features`
--

TRUNCATE TABLE `card_features`;
--
-- Dumping data for table `card_features`
--

INSERT INTO `card_features` (`feature_id`, `feature_type_id`, `credit_card_id`, `description`, `feature_cost`, `update_time`, `update_user`) VALUES
(1, 15, 1, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(2, 15, 5, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(3, 15, 6, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(4, 15, 8, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(5, 15, 9, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(6, 15, 10, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(7, 15, 11, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(8, 15, 12, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(9, 15, 13, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(10, 15, 14, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(11, 15, 15, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(12, 15, 16, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(13, 15, 17, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(14, 15, 18, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(15, 15, 19, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(16, 15, 21, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(17, 15, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(18, 15, 24, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(19, 15, 25, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(20, 15, 26, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(21, 16, 6, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(22, 16, 8, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(23, 16, 21, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(24, 16, 22, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(25, 16, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(26, 16, 24, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(27, 16, 27, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(28, 17, 2, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(29, 17, 3, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(30, 17, 4, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(31, 17, 5, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(32, 17, 7, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(33, 17, 10, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(34, 17, 11, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(35, 17, 12, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(36, 17, 13, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(37, 17, 14, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(38, 17, 21, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(39, 17, 22, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(40, 17, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(41, 17, 29, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(42, 17, 30, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(43, 17, 31, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(44, 18, 20, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(45, 18, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(46, 18, 28, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(47, 2, 1, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(48, 2, 2, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(49, 2, 3, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(50, 2, 4, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(51, 2, 5, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(52, 2, 6, NULL, 540, '2015-04-04 19:52:28', 'ben'),
(53, 2, 7, NULL, 540, '2015-04-04 19:52:28', 'ben'),
(54, 2, 8, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(55, 2, 9, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(56, 2, 10, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(57, 2, 11, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(58, 2, 12, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(59, 2, 13, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(60, 2, 14, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(61, 2, 20, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(62, 2, 21, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(63, 2, 22, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(64, 2, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(65, 2, 23, '2年目から500円(税別)', 0, '2015-04-04 19:52:28', 'ben'),
(66, 2, 24, '2年目から500円(税別)', 0, '2015-04-04 19:52:28', 'ben'),
(67, 2, 25, '2年目から500円(税別)', 0, '2015-04-04 19:52:28', 'ben'),
(68, 2, 27, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(69, 2, 28, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(70, 2, 29, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(71, 2, 30, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(72, 2, 31, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(73, 3, 1, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(74, 3, 2, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(75, 3, 3, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(76, 3, 5, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(77, 3, 8, NULL, 5400, '2015-04-04 19:52:28', 'ben'),
(78, 3, 9, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(79, 3, 10, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(80, 3, 11, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(81, 3, 12, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(82, 3, 13, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(83, 3, 14, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(84, 3, 21, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(85, 3, 28, NULL, 1080, '2015-04-04 19:52:28', 'ben'),
(86, 3, 29, NULL, 8400, '2015-04-04 19:52:28', 'ben'),
(87, 3, 30, NULL, 1050, '2015-04-04 19:52:28', 'ben'),
(88, 3, 31, NULL, 3650, '2015-04-04 19:52:28', 'ben'),
(89, 4, 4, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(90, 4, 9, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(91, 4, 20, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(92, 4, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(93, 4, 24, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(94, 4, 25, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(95, 4, 26, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(96, 5, 5, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(97, 5, 7, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(98, 5, 13, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(99, 5, 20, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(100, 5, 21, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(101, 5, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(102, 5, 27, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(103, 5, 28, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(104, 6, 21, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(105, 6, 22, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(106, 6, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(107, 6, 27, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(108, 6, 28, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(109, 6, 29, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(110, 6, 30, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(111, 6, 31, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(112, 7, 6, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(113, 7, 8, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(114, 7, 9, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(115, 7, 20, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(116, 7, 21, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(117, 7, 22, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(118, 7, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(119, 7, 24, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(120, 7, 27, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(121, 7, 28, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(122, 7, 29, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(123, 7, 30, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(124, 7, 31, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(125, 8, 23, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(126, 9, 10, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(127, 9, 11, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(128, 9, 12, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(129, 9, 20, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(130, 10, 24, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(131, 10, 25, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(132, 10, 26, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(133, 10, 29, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(134, 10, 30, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(135, 10, 31, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(136, 11, 20, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(137, 11, 21, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(138, 11, 28, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(139, 11, 29, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(140, 11, 30, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(141, 11, 31, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(142, 12, 27, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(143, 12, 29, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(144, 12, 30, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(145, 12, 31, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(146, 13, 29, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(147, 13, 30, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(148, 13, 31, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(149, 14, 29, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(150, 14, 30, NULL, 0, '2015-04-04 19:52:28', 'ben'),
(151, 14, 31, NULL, 0, '2015-04-04 19:52:28', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `card_features_history`
--

TRUNCATE TABLE `card_features_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Truncate table before insert `card_feature_type`
--

TRUNCATE TABLE `card_feature_type`;
--
-- Dumping data for table `card_feature_type`
--

INSERT INTO `card_feature_type` (`feature_type_id`, `name`, `description`, `category`, `update_time`, `update_user`) VALUES
(1, 'gold_card', NULL, 'prestige', '2015-04-04 19:51:59', 'ben'),
(2, 'ETC', NULL, 'utility', '2015-04-04 19:51:59', 'ben'),
(3, 'Family Card', NULL, 'utility', '2015-04-04 19:51:59', 'ben'),
(4, 'iD', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(5, 'nanaco', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(6, 'suica', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(7, '楽天Edy', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(8, 'sugoca', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(9, 'Quicpay', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(10, 'WAON', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(11, 'Pasmo', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(12, 'ICOCA', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(13, 'Kitaca', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(14, 'TOICA', NULL, 'e-payment', '2015-04-04 19:51:59', 'ben'),
(15, 'visa', NULL, 'network', '2015-04-04 19:51:59', 'ben'),
(16, 'master', NULL, 'network', '2015-04-04 19:51:59', 'ben'),
(17, 'jcb', NULL, 'network', '2015-04-04 19:51:59', 'ben'),
(18, 'amex', NULL, 'network', '2015-04-04 19:51:59', 'ben'),
(19, 'diners', NULL, 'network', '2015-04-04 19:51:59', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `card_feature_type_history`
--

TRUNCATE TABLE `card_feature_type_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Truncate table before insert `credit_card`
--

TRUNCATE TABLE `credit_card`;
--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`credit_card_id`, `name`, `issuer_id`, `description`, `image_link`, `visa`, `master`, `jcb`, `amex`, `diners`, `afilliate_link`, `affiliate_id`, `update_time`, `update_user`) VALUES
(1, 'リクルートカードVISA', 1, 'リクルートカードVISA', 'http://s.eximg.jp/exnews/feed/Dime/Dime_151993_7.jpg', 1, 0, 0, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22209%22%20height%3D%22133%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww20.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001019000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(2, 'リクルートカードJCB', 1, 'リクルートカードJCB', 'http://img.manesto.com/upload/posts/images/FdykMq0rSsPzzA6r_MPVGL.jpg', 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22209%22%20height%3D%22133%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww20.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001019000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(3, 'リクルートカードプラス', 1, 'リクルートカードプラス', 'http://cdn-ak.f.st-hatena.com/images/fotolife/a/aiza_man/20140401/20140401080040.jpg', 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62MDD%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22207%22%20height%3D%22131%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww27.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001020000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3F', 1, '2015-04-04 19:52:50', 'ben'),
(4, 'ファミマＴカード', 2, 'ファミマＴカード', 'http://www.i-creditcard.net/hikaku/img/famima-t.jpg', 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2H5Y%2B9SGMWI%2B2ZY4%2B5YJRM%22%20target%3D%22_blank%22%3E%E3%83%95%E3%82%A1%E3%83%9F%E3%83%9ET%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww10.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B9SGMWI%2B2ZY4%2B5YJRM%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(5, 'セブン＆アイグループのクレジットカード', 3, 'セブン＆アイグループのクレジットカード', 'http://ryutsuu.biz/images/2013/03/20130325sevenai.jpg', 1, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2H5Y%2B8QCW6Q%2B2LAC%2BBWVTE%22%20target%3D%22_blank%22%3E%E3%82%BB%E3%83%96%E3%83%B3%E3%82%AB%E3%83%BC%E3%83%89%E3%83%97%E3%83%A9%E3%82%B9%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B8QCW6Q%2B2LAC%2BBWVTE%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(6, '楽天カードVISA/MC', 4, '楽天カードVISA/MC', 'http://クレジットカード審査まとめ.com/wp-content/uploads/2013/11/rakuten.jpg', 1, 1, 0, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20target%3D%22_blank%22%3E%E6%A5%BD%E5%A4%A9%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww15.a8.net%2F0.gif%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20alt%3D%22%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww17.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B2Z6SY%2B2OYK%2BBWVTE%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(7, '楽天カードJCB', 4, '楽天カードJCB', 'http://cdn-ak.f.st-hatena.com/images/fotolife/a/advantaged/20130812/20130812234625.jpg', 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20target%3D%22_blank%22%3E%E6%A5%BD%E5%A4%A9%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww15.a8.net%2F0.gif%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20alt%3D%22%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww17.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B2Z6SY%2B2OYK%2BBWVTE%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(8, '楽天プレミアムカード', 4, '楽天プレミアムカード', 'http://moake.creditcardinfo.info/wp-content/uploads/2013/06/rakuten-premium.jpg', 1, 1, 0, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HD7MZ%2BAC3XV6%2BFOQ%2BHZ2R6%22%20target%3D%22_blank%22%3E%E3%83%86%E3%82%B9%E3%83%88%E7%94%A8%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2HD7MZ%2BAC3XV6%2BFOQ%2BHZ2R6%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(9, 'ワンピースVISAカード', 5, 'ワンピースVISAカード', 'http://www.smbc-card.com/mem/company/news/imgs/p_0001029_2.jpg', 1, 0, 0, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B6P4KS2%2B1E32%2BHV7V6%22%20target%3D%22_blank%22%3E%E3%83%AF%E3%83%B3%E3%83%94%E3%83%BC%E3%82%B9VISA%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww10.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B6P4KS2%2B1E32%2BHV7V6%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(10, 'ＥＮＥＯＳカードP', 6, 'ＥＮＥＯＳカードP', 'http://oil-stat.com/image/cc/eneos_p.gif', 1, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(11, 'ＥＮＥＯＳカードC', 6, 'ＥＮＥＯＳカードC', 'http://www8.ts3card.com/affiliated/img/img_eneos_c.jpg', 1, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(12, 'ＥＮＥＯＳカードS', 6, 'ＥＮＥＯＳカードS', 'http://uplife.info/support/images/eneos_card.jpg', 1, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(13, 'TSUTAYA Tカードプラス', 7, 'TSUTAYA Tカードプラス', 'http://cardjiten.jp/cardimg/t-card-plus.jpg', 1, 0, 1, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F80178%2F%22%20target%3D%22_blank%22%3ETSUTAYA%20T%E3%82%AB%E3%83%BC%E3%83%89%E3%83%97%E3%83%A9%E3%82%B9%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F80178%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(14, 'Kanpo Style Club Card', 8, 'Kanpo Style Club Card', 'http://dime.jp/review/files/2014/10/015KAMPO-STYLE-CLUB-CARD2.jpg', 1, 0, 1, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F244311%2F%22%20target%3D%22_blank%22%3E%E6%BC%A2%E6%96%B9%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%82%AF%E3%83%A9%E3%83%96%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F244311%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(15, 'SMBC デビュープラス', 9, 'SMBC デビュープラス', 'http://www.smbc-card.com/nyukai/card/responsive/img/cardlist/001_DB_CD_F_rs.jpg', 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87675%2F%22%20target%3D%22_blank%22%3E%E4%B8%96%E7%95%8C%E3%81%A7%E4%B8%80%E7%95%AA%E4%BD%BF%E3%81%88%E3%82%8B%E3%82%AB%E3%83%BC%E3%83%89%EF%BC%81%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87675%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(16, 'SMBCクラシックカード', 9, 'SMBCクラシックカード', 'http://img1.kakaku.k-img.com/images/credit-card/card/l/008001.jpg', 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87471%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%AF%E3%83%A9%E3%82%B7%E3%83%83%E3%82%AF%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87471%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(17, 'SMBCアミティーカード', 9, 'SMBCアミティーカード', 'http://www.smbc-card.com/nyukai/card/responsive/img/cardlist/004_0_v_ic_smcc_amitie_rs.jpg', 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87615%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%A2%E3%83%9F%E3%83%86%E3%82%A3%E3%82%A8%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87615%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(18, 'SMBCゴールドカード', 9, 'SMBCゴールドカード', 'https://www.smbc-card.com/mem/nyukai/pop/imgs/card_smbc_card_prime01.jpg', 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87617%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%B4%E3%83%BC%E3%83%AB%E3%83%89%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87617%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(19, 'SMBCプレミアゴールドカード', 9, 'SMBCプレミアゴールドカード', 'http://crefan.jp/data/00001696_1.gif', 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87619%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%83%A4%E3%83%B3%E3%82%B0%E3%82%B4%E3%83%BC%E3%83%AB%E3%83%89%E3%82%AB%E3%83%BC%E3%83%8920s%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87619%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(20, 'YAMADA LABI ANA マイレージクラブカード', 10, 'YAMADA LABI ANA マイレージクラブカード', 'http://www.i-creditcard.net/hikaku/img/yamada-ana-mile.jpg', 0, 0, 0, 1, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540076%2F%22%20target%3D%22_blank%22%3E%E3%83%9E%E3%83%84%E3%83%80m%27z%20PLUS%E3%82%AB%E3%83%BC%E3%83%89%E3%82%BB%E3%82%BE%E3%83%B3%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540076%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(21, 'SEIBU PRINCE CLUB カード JCB)', 10, 'SEIBU PRINCE CLUB カード (JCB)', 'https://club.seibugroup.jp/shared/images/icon_card_05.png', 1, 1, 1, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540088%2F%22%20target%3D%22_blank%22%3ESEIBU%20PRINCE%20CLUB%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540088%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(22, 'マツダm''z PLUSカード', 10, 'マツダm''z PLUSカード', 'http://card1192ya.com//img/6563.jpg', 0, 1, 1, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540076%2F%22%20target%3D%22_blank%22%3E%E3%83%9E%E3%83%84%E3%83%80m%27z%20PLUS%E3%82%AB%E3%83%BC%E3%83%89%E3%82%BB%E3%82%BE%E3%83%B3%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540076%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(23, 'JQ CARD セゾン', 10, 'JQ CARD セゾン', 'http://amu-kokura.img.jugem.jp/20111206_1022315.jpg', 1, 1, 1, 1, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540090%2F%22%20target%3D%22_blank%22%3E%EF%BC%AA%EF%BC%B1%20%EF%BC%A3%EF%BC%A1%EF%BC%B2%EF%BC%A4%E3%82%BB%E3%82%BE%E3%83%B3%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540090%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(24, '三井住友トラストカード', 11, '三井住友トラストカード', 'https://www.trafficgate.net/affiliate/image/sample_banner.cgi?mer_code=2670&lnk_id=342', 1, 1, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F542113%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8B%E3%83%88%E3%83%A9%E3%82%B9%E3%83%88VISA%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F542113%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(25, '三井住友トラストレディーズカード', 11, '三井住友トラストレディーズカード', 'http://card-db.com/images/smtcard-lady.jpg', 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F542116%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8B%E3%83%88%E3%83%A9%E3%82%B9%E3%83%88VISA%E3%83%AC%E3%83%87%E3%82%A3%E3%83%BC%E3%82%B9%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F542116%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(26, '三井住友トラストロードサービスカード', 11, '三井住友トラストロードサービスカード', 'http://nullbio.com/dimg/VJA%2077CARD%20%E3%83%AD%E3%83%BC%E3%83%89%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9VISA%E3%82%AB%E3%83%BC%E3%83%89.jpg', 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F542117%2F%22%20target%3D%22_blank%22%3E%E3%83%AD%E3%83%BC%E3%83%89%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9VISA%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F542117%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(27, 'カラマツトレインカード', 12, 'カラマツトレインカード', 'http://www.bossanovapgh.com/wp-content/uploads/2015/02/4e31004ffbc59c619b3ad4b10155c17e-300x190.png', 0, 1, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F543785%2F%22%20target%3D%22_blank%22%3EJ%E3%83%87%E3%83%9D1%2C000%E5%86%86%E5%88%86%E3%82%92%E3%83%97%E3%83%AC%E3%82%BC%E3%83%B3%E3%83%88%21%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F543785%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(28, 'SEIBU PRINCE CLUB カード AMEX)', 10, 'SEIBU PRINCE CLUB カード (AMEX)', 'http://crecaguide.com/images/2r-11.gif', 0, 0, 0, 1, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540088%2F%22%20target%3D%22_blank%22%3ESEIBU%20PRINCE%20CLUB%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540088%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', 'ben'),
(29, 'JAL Club-A ゴールドカード', 13, 'JAL Club-A ゴールドカード', 'http://moneyiq.jp/images/jal-card-club-a-gold-proper.png', 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B66H9E%22%20target%3D%22_blank%22%3E%EF%BC%AA%EF%BC%A1%EF%BC%AC%E3%82%B4%E3%83%BC%E3%83%AB%E3%83%89%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww16.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B66H9E%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(30, 'JAL 普通カード', 13, 'JAL 普通カード', 'http://moneyiq.jp/images/jal-card-suica-proper.png', 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B644DU%22%20target%3D%22_blank%22%3EJAL%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww11.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B644DU%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben'),
(31, 'JAL Club-A カード', 13, 'JAL Club-A カード', 'http://moneyiq.jp/images/jal-card-club-a-proper.png', 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B63H8I%22%20target%3D%22_blank%22%3E%EF%BC%AA%EF%BC%A1%EF%BC%AC%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww18.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B63H8I%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `credit_card_history`
--

TRUNCATE TABLE `credit_card_history`;
--
-- Dumping data for table `credit_card_history`
--

INSERT INTO `credit_card_history` (`credit_card_id`, `name`, `issuer_id`, `description`, `image_link`, `visa`, `master`, `jcb`, `amex`, `diners`, `afilliate_link`, `affiliate_id`, `time_beg`, `time_end`, `update_user`) VALUES
(1, 'リクルートカードVISA', 1, 'リクルートカードVISA', NULL, 1, 0, 0, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22209%22%20height%3D%22133%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww20.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001019000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(2, 'リクルートカードJCB', 1, 'リクルートカードJCB', NULL, 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22209%22%20height%3D%22133%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww20.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001019000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(3, 'リクルートカードプラス', 1, 'リクルートカードプラス', NULL, 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62MDD%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22207%22%20height%3D%22131%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww27.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001020000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3F', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(4, 'ファミマＴカード', 2, 'ファミマＴカード', NULL, 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2H5Y%2B9SGMWI%2B2ZY4%2B5YJRM%22%20target%3D%22_blank%22%3E%E3%83%95%E3%82%A1%E3%83%9F%E3%83%9ET%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww10.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B9SGMWI%2B2ZY4%2B5YJRM%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(5, 'セブン＆アイグループのクレジットカード', 3, 'セブン＆アイグループのクレジットカード', NULL, 1, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2H5Y%2B8QCW6Q%2B2LAC%2BBWVTE%22%20target%3D%22_blank%22%3E%E3%82%BB%E3%83%96%E3%83%B3%E3%82%AB%E3%83%BC%E3%83%89%E3%83%97%E3%83%A9%E3%82%B9%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B8QCW6Q%2B2LAC%2BBWVTE%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(6, '楽天カードVISA/MC', 4, '楽天カードVISA/MC', NULL, 1, 1, 0, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20target%3D%22_blank%22%3E%E6%A5%BD%E5%A4%A9%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww15.a8.net%2F0.gif%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20alt%3D%22%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww17.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B2Z6SY%2B2OYK%2BBWVTE%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(7, '楽天カードJCB', 4, '楽天カードJCB', NULL, 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20target%3D%22_blank%22%3E%E6%A5%BD%E5%A4%A9%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww15.a8.net%2F0.gif%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20alt%3D%22%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww17.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B2Z6SY%2B2OYK%2BBWVTE%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(8, '楽天プレミアムカード', 4, '楽天プレミアムカード', NULL, 1, 1, 0, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HD7MZ%2BAC3XV6%2BFOQ%2BHZ2R6%22%20target%3D%22_blank%22%3E%E3%83%86%E3%82%B9%E3%83%88%E7%94%A8%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2HD7MZ%2BAC3XV6%2BFOQ%2BHZ2R6%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(9, 'ワンピースVISAカード', 5, 'ワンピースVISAカード', NULL, 1, 0, 0, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B6P4KS2%2B1E32%2BHV7V6%22%20target%3D%22_blank%22%3E%E3%83%AF%E3%83%B3%E3%83%94%E3%83%BC%E3%82%B9VISA%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww10.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B6P4KS2%2B1E32%2BHV7V6%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(10, 'ＥＮＥＯＳカードP', 6, 'ＥＮＥＯＳカードP', NULL, 1, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(11, 'ＥＮＥＯＳカードC', 6, 'ＥＮＥＯＳカードC', NULL, 1, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(12, 'ＥＮＥＯＳカードS', 6, 'ＥＮＥＯＳカードS', NULL, 1, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(13, 'TSUTAYA Tカードプラス', 7, 'TSUTAYA Tカードプラス', NULL, 1, 0, 1, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F80178%2F%22%20target%3D%22_blank%22%3ETSUTAYA%20T%E3%82%AB%E3%83%BC%E3%83%89%E3%83%97%E3%83%A9%E3%82%B9%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F80178%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(14, 'Kanpo Style Club Card', 8, 'Kanpo Style Club Card', NULL, 1, 0, 1, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F244311%2F%22%20target%3D%22_blank%22%3E%E6%BC%A2%E6%96%B9%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%82%AF%E3%83%A9%E3%83%96%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F244311%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(15, 'SMBC デビュープラス', 9, 'SMBC デビュープラス', NULL, 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87675%2F%22%20target%3D%22_blank%22%3E%E4%B8%96%E7%95%8C%E3%81%A7%E4%B8%80%E7%95%AA%E4%BD%BF%E3%81%88%E3%82%8B%E3%82%AB%E3%83%BC%E3%83%89%EF%BC%81%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87675%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(16, 'SMBCクラシックカード', 9, 'SMBCクラシックカード', NULL, 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87471%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%AF%E3%83%A9%E3%82%B7%E3%83%83%E3%82%AF%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87471%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(17, 'SMBCアミティーカード', 9, 'SMBCアミティーカード', NULL, 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87615%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%A2%E3%83%9F%E3%83%86%E3%82%A3%E3%82%A8%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87615%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(18, 'SMBCゴールドカード', 9, 'SMBCゴールドカード', NULL, 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87617%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%B4%E3%83%BC%E3%83%AB%E3%83%89%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87617%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(19, 'SMBCプレミアゴールドカード', 9, 'SMBCプレミアゴールドカード', NULL, 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87619%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%83%A4%E3%83%B3%E3%82%B0%E3%82%B4%E3%83%BC%E3%83%AB%E3%83%89%E3%82%AB%E3%83%BC%E3%83%8920s%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87619%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(20, 'YAMADA LABI ANA マイレージクラブカード', 10, 'YAMADA LABI ANA マイレージクラブカード', NULL, 0, 0, 0, 1, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540076%2F%22%20target%3D%22_blank%22%3E%E3%83%9E%E3%83%84%E3%83%80m%27z%20PLUS%E3%82%AB%E3%83%BC%E3%83%89%E3%82%BB%E3%82%BE%E3%83%B3%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540076%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(21, 'SEIBU PRINCE CLUB カード JCB)', 10, 'SEIBU PRINCE CLUB カード (JCB)', NULL, 1, 1, 1, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540088%2F%22%20target%3D%22_blank%22%3ESEIBU%20PRINCE%20CLUB%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540088%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(22, 'マツダm''z PLUSカード', 10, 'マツダm''z PLUSカード', NULL, 0, 1, 1, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540076%2F%22%20target%3D%22_blank%22%3E%E3%83%9E%E3%83%84%E3%83%80m%27z%20PLUS%E3%82%AB%E3%83%BC%E3%83%89%E3%82%BB%E3%82%BE%E3%83%B3%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540076%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(23, 'JQ CARD セゾン', 10, 'JQ CARD セゾン', NULL, 1, 1, 1, 1, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540090%2F%22%20target%3D%22_blank%22%3E%EF%BC%AA%EF%BC%B1%20%EF%BC%A3%EF%BC%A1%EF%BC%B2%EF%BC%A4%E3%82%BB%E3%82%BE%E3%83%B3%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540090%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(24, '三井住友トラストカード', 11, '三井住友トラストカード', NULL, 1, 1, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F542113%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8B%E3%83%88%E3%83%A9%E3%82%B9%E3%83%88VISA%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F542113%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(25, '三井住友トラストレディーズカード', 11, '三井住友トラストレディーズカード', NULL, 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F542116%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8B%E3%83%88%E3%83%A9%E3%82%B9%E3%83%88VISA%E3%83%AC%E3%83%87%E3%82%A3%E3%83%BC%E3%82%B9%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F542116%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(26, '三井住友トラストロードサービスカード', 11, '三井住友トラストロードサービスカード', NULL, 1, 0, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F542117%2F%22%20target%3D%22_blank%22%3E%E3%83%AD%E3%83%BC%E3%83%89%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9VISA%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F542117%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(27, 'カラマツトレインカード', 12, 'カラマツトレインカード', NULL, 0, 1, 0, 0, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F543785%2F%22%20target%3D%22_blank%22%3EJ%E3%83%87%E3%83%9D1%2C000%E5%86%86%E5%88%86%E3%82%92%E3%83%97%E3%83%AC%E3%82%BC%E3%83%B3%E3%83%88%21%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F543785%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(28, 'SEIBU PRINCE CLUB カード AMEX)', 10, 'SEIBU PRINCE CLUB カード (AMEX)', NULL, 0, 0, 0, 1, 0, 'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540088%2F%22%20target%3D%22_blank%22%3ESEIBU%20PRINCE%20CLUB%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540088%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E', 2, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(29, 'JAL Club-A ゴールドカード', 13, 'JAL Club-A ゴールドカード', NULL, 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B66H9E%22%20target%3D%22_blank%22%3E%EF%BC%AA%EF%BC%A1%EF%BC%AC%E3%82%B4%E3%83%BC%E3%83%AB%E3%83%89%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww16.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B66H9E%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(30, 'JAL 普通カード', 13, 'JAL 普通カード', NULL, 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B644DU%22%20target%3D%22_blank%22%3EJAL%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww11.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B644DU%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben'),
(31, 'JAL Club-A カード', 13, 'JAL Club-A カード', NULL, 0, 0, 1, 0, 0, 'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B63H8I%22%20target%3D%22_blank%22%3E%EF%BC%AA%EF%BC%A1%EF%BC%AC%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww18.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B63H8I%22%20alt%3D%22%22%3E', 1, '2015-04-04 19:52:50', '2015-04-04 19:56:26', 'ben');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Truncate table before insert `discounts`
--

TRUNCATE TABLE `discounts`;
--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `percentage`, `start_date`, `end_date`, `description`, `credit_card_id`, `store_id`, `multiple`, `conditions`, `update_time`, `update_user`) VALUES
(1, 0.050000000000000, NULL, NULL, NULL, 5, 3, 0.100000000000000000000000000000, '毎月8日、18日、28日のみ', '2015-04-04 19:53:26', 'ben'),
(2, 0.050000000000000, NULL, NULL, NULL, 10, 38, 1.000000000000000000000000000000, '', '2015-04-04 19:53:26', 'ben'),
(3, 0.100000000000000, NULL, NULL, NULL, 10, 39, 1.000000000000000000000000000000, '', '2015-04-04 19:53:26', 'ben'),
(4, 0.053846153846154, NULL, NULL, NULL, 11, 33, 1.000000000000000000000000000000, '最大1ℓ7円OFF', '2015-04-04 19:53:26', 'ben'),
(5, 0.015384615384615, NULL, NULL, NULL, 12, 33, 1.000000000000000000000000000000, 'ずっと1ℓ2円OFF', '2015-04-04 19:53:26', 'ben'),
(6, 0.050000000000000, NULL, NULL, NULL, 20, 19, 0.066666666666666700000000000000, '毎月5日、20日のみ', '2015-04-04 19:53:26', 'ben'),
(7, 0.050000000000000, NULL, NULL, NULL, 20, 20, 0.066666666666666700000000000000, '毎月5日、20日のみ', '2015-04-04 19:53:26', 'ben'),
(8, 0.050000000000000, NULL, NULL, NULL, 21, 19, 0.066666666666666700000000000000, '毎月5日、20日のみ', '2015-04-04 19:53:26', 'ben'),
(9, 0.050000000000000, NULL, NULL, NULL, 21, 20, 0.066666666666666700000000000000, '毎月5日、20日のみ', '2015-04-04 19:53:26', 'ben'),
(10, 0.050000000000000, NULL, NULL, NULL, 22, 19, 0.066666666666666700000000000000, '毎月5日、20日のみ', '2015-04-04 19:53:26', 'ben'),
(11, 0.050000000000000, NULL, NULL, NULL, 22, 20, 0.066666666666666700000000000000, '毎月5日、20日のみ', '2015-04-04 19:53:26', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `discounts_history`
--

TRUNCATE TABLE `discounts_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Truncate table before insert `fees`
--

TRUNCATE TABLE `fees`;
--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fee_id`, `fee_type`, `fee_amount`, `yearly_occurrence`, `start_year`, `end_year`, `credit_card_id`, `update_time`, `update_user`) VALUES
(1, 1, 0, 1, 0, 1, 1, '2015-04-04 19:53:40', 'ben'),
(2, 2, 0, 1, 1, 2, 1, '2015-04-04 19:53:40', 'ben'),
(3, 1, 0, 1, 0, 1, 2, '2015-04-04 19:53:40', 'ben'),
(4, 2, 0, 1, 1, 2, 2, '2015-04-04 19:53:40', 'ben'),
(5, 1, 2000, 1, 0, 1, 3, '2015-04-04 19:53:40', 'ben'),
(6, 2, 2000, 1, 1, 2, 3, '2015-04-04 19:53:40', 'ben'),
(7, 1, 0, 1, 0, 1, 4, '2015-04-04 19:53:40', 'ben'),
(8, 2, 0, 1, 1, 2, 4, '2015-04-04 19:53:40', 'ben'),
(9, 1, 0, 1, 0, 1, 5, '2015-04-04 19:53:40', 'ben'),
(10, 2, 1000, 1, 1, 2, 5, '2015-04-04 19:53:40', 'ben'),
(11, 1, 0, 1, 0, 1, 6, '2015-04-04 19:53:40', 'ben'),
(12, 2, 1250, 1, 1, 2, 6, '2015-04-04 19:53:40', 'ben'),
(13, 1, 0, 1, 0, 1, 7, '2015-04-04 19:53:40', 'ben'),
(14, 2, 1250, 1, 1, 2, 7, '2015-04-04 19:53:40', 'ben'),
(15, 1, 10800, 1, 0, 1, 8, '2015-04-04 19:53:40', 'ben'),
(16, 2, 10800, 1, 1, 2, 8, '2015-04-04 19:53:40', 'ben'),
(17, 1, 0, 1, 0, 1, 9, '2015-04-04 19:53:40', 'ben'),
(18, 2, 1250, 1, 1, 2, 9, '2015-04-04 19:53:40', 'ben'),
(19, 1, 0, 1, 0, 1, 10, '2015-04-04 19:53:40', 'ben'),
(20, 2, 1350, 1, 1, 2, 10, '2015-04-04 19:53:40', 'ben'),
(21, 1, 0, 1, 0, 1, 11, '2015-04-04 19:53:40', 'ben'),
(22, 2, 1350, 1, 1, 2, 11, '2015-04-04 19:53:40', 'ben'),
(23, 1, 0, 1, 0, 1, 12, '2015-04-04 19:53:40', 'ben'),
(24, 2, 1350, 1, 1, 2, 12, '2015-04-04 19:53:40', 'ben'),
(25, 1, 0, 1, 0, 1, 13, '2015-04-04 19:53:40', 'ben'),
(26, 2, 0, 1, 1, 2, 13, '2015-04-04 19:53:40', 'ben'),
(27, 1, 0, 1, 0, 1, 14, '2015-04-04 19:53:40', 'ben'),
(28, 2, 1500, 1, 1, 2, 14, '2015-04-04 19:53:40', 'ben'),
(29, 1, 0, 1, 0, 1, 15, '2015-04-04 19:53:40', 'ben'),
(30, 2, 0, 1, 1, 2, 15, '2015-04-04 19:53:40', 'ben'),
(31, 1, 0, 1, 0, 1, 16, '2015-04-04 19:53:40', 'ben'),
(32, 2, 0, 1, 1, 2, 16, '2015-04-04 19:53:40', 'ben'),
(33, 1, 0, 1, 0, 1, 17, '2015-04-04 19:53:40', 'ben'),
(34, 2, 0, 1, 1, 2, 17, '2015-04-04 19:53:40', 'ben'),
(35, 1, 0, 1, 0, 1, 18, '2015-04-04 19:53:40', 'ben'),
(36, 2, 0, 1, 1, 2, 18, '2015-04-04 19:53:40', 'ben'),
(37, 1, 0, 1, 0, 1, 19, '2015-04-04 19:53:40', 'ben'),
(38, 2, 0, 1, 1, 2, 19, '2015-04-04 19:53:40', 'ben'),
(39, 1, 0, 1, 0, 1, 20, '2015-04-04 19:53:40', 'ben'),
(40, 2, 0, 1, 1, 2, 20, '2015-04-04 19:53:40', 'ben'),
(41, 1, 0, 1, 0, 1, 21, '2015-04-04 19:53:40', 'ben'),
(42, 2, 0, 1, 1, 2, 21, '2015-04-04 19:53:40', 'ben'),
(43, 1, 0, 1, 0, 1, 22, '2015-04-04 19:53:40', 'ben'),
(44, 2, 0, 1, 1, 2, 22, '2015-04-04 19:53:40', 'ben'),
(45, 1, 0, 1, 0, 1, 23, '2015-04-04 19:53:40', 'ben'),
(46, 2, 1350, 1, 1, 2, 23, '2015-04-04 19:53:40', 'ben'),
(47, 1, 0, 1, 0, 1, 24, '2015-04-04 19:53:40', 'ben'),
(48, 2, 1350, 1, 1, 2, 24, '2015-04-04 19:53:40', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `fees_history`
--

TRUNCATE TABLE `fees_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Truncate table before insert `insurance`
--

TRUNCATE TABLE `insurance`;
--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insurance_id`, `credit_card_id`, `insurance_type_id`, `max_insured_amount`, `value`, `update_time`, `update_user`) VALUES
(1, 1, 8, 2000000, 2000000, '2015-04-04 19:54:13', 'ben'),
(2, 2, 8, 2000000, 2000000, '2015-04-04 19:54:13', 'ben'),
(3, 3, 8, 2000000, 2000000, '2015-04-04 19:54:13', 'ben'),
(4, 5, 8, 1000000, 1000000, '2015-04-04 19:54:13', 'ben'),
(5, 6, 8, 500000, 500000, '2015-04-04 19:54:13', 'ben'),
(6, 7, 8, 500000, 500000, '2015-04-04 19:54:13', 'ben'),
(7, 8, 8, 3000000, 3000000, '2015-04-04 19:54:13', 'ben'),
(8, 9, 8, 1000000, 1000000, '2015-04-04 19:54:13', 'ben'),
(9, 10, 8, 1000000, 1000000, '2015-04-04 19:54:13', 'ben'),
(10, 22, 8, 500000, 500000, '2015-04-04 19:54:13', 'ben'),
(11, 23, 8, 500000, 500000, '2015-04-04 19:54:13', 'ben'),
(12, 24, 8, 1000000, 1000000, '2015-04-04 19:54:13', 'ben'),
(13, 25, 8, 1000000, 1000000, '2015-04-04 19:54:13', 'ben'),
(14, 28, 8, 1000000, 1000000, '2015-04-04 19:54:13', 'ben'),
(15, 29, 8, 3000000, 3000000, '2015-04-04 19:54:13', 'ben'),
(16, 30, 8, 1000000, 1000000, '2015-04-04 19:54:13', 'ben'),
(17, 31, 8, 1000000, 1000000, '2015-04-04 19:54:13', 'ben'),
(18, 2, 2, 10000000, 10000000, '2015-04-04 19:54:13', 'ben'),
(19, 8, 2, 50000000, 50000000, '2015-04-04 19:54:13', 'ben'),
(20, 14, 2, 10000000, 10000000, '2015-04-04 19:54:13', 'ben'),
(21, 24, 2, 20000000, 20000000, '2015-04-04 19:54:13', 'ben'),
(22, 25, 2, 20000000, 20000000, '2015-04-04 19:54:13', 'ben'),
(23, 27, 2, 10000000, 10000000, '2015-04-04 19:54:13', 'ben'),
(24, 28, 2, 30000000, 30000000, '2015-04-04 19:54:13', 'ben'),
(25, 31, 2, 50000000, 50000000, '2015-04-04 19:54:13', 'ben'),
(26, 8, 3, 150000, 150000, '2015-04-04 19:54:13', 'ben'),
(27, 24, 3, 500000, 500000, '2015-04-04 19:54:13', 'ben'),
(28, 25, 3, 500000, 500000, '2015-04-04 19:54:13', 'ben'),
(29, 1, 5, 20000000, 20000000, '2015-04-04 19:54:13', 'ben'),
(30, 2, 5, 20000000, 20000000, '2015-04-04 19:54:13', 'ben'),
(31, 3, 5, 30000000, 30000000, '2015-04-04 19:54:13', 'ben'),
(32, 6, 5, 20000000, 20000000, '2015-04-04 19:54:13', 'ben'),
(33, 7, 5, 20000000, 20000000, '2015-04-04 19:54:13', 'ben'),
(34, 8, 5, 50000000, 50000000, '2015-04-04 19:54:13', 'ben'),
(35, 9, 5, 20000000, 20000000, '2015-04-04 19:54:13', 'ben'),
(36, 14, 5, 20000000, 20000000, '2015-04-04 19:54:13', 'ben'),
(37, 27, 5, 20000000, 20000000, '2015-04-04 19:54:13', 'ben'),
(38, 28, 5, 30000000, 30000000, '2015-04-04 19:54:13', 'ben'),
(39, 29, 5, 100000000, 100000000, '2015-04-04 19:54:13', 'ben'),
(40, 30, 5, 10000000, 10000000, '2015-04-04 19:54:13', 'ben'),
(41, 31, 5, 50000000, 50000000, '2015-04-04 19:54:13', 'ben'),
(42, 6, 6, 2000000, 2000000, '2015-04-04 19:54:13', 'ben'),
(43, 7, 6, 2000000, 2000000, '2015-04-04 19:54:13', 'ben'),
(44, 8, 6, 2000000, 2000000, '2015-04-04 19:54:13', 'ben'),
(45, 6, 7, 200000, 200000, '2015-04-04 19:54:13', 'ben'),
(46, 7, 7, 200000, 200000, '2015-04-04 19:54:13', 'ben'),
(47, 8, 7, 1000000, 1000000, '2015-04-04 19:54:13', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `insurance_history`
--

TRUNCATE TABLE `insurance_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Truncate table before insert `insurance_type`
--

TRUNCATE TABLE `insurance_type`;
--
-- Dumping data for table `insurance_type`
--

INSERT INTO `insurance_type` (`insurance_type_id`, `type_name`, `subtype_name`, `description`, `region`, `update_time`, `update_user`) VALUES
(1, 'travel', 'travel', 'domestic travel insurance', 'domestic', '2015-04-04 19:54:24', 'ben'),
(2, 'travel', 'death', 'domestic travel life insurance', 'domestic', '2015-04-04 19:54:24', 'ben'),
(3, 'travel', 'hospital', 'domestic travel health insurance', 'domestic', '2015-04-04 19:54:24', 'ben'),
(4, 'travel', 'travel', 'international travel insurance', 'international', '2015-04-04 19:54:24', 'ben'),
(5, 'travel', 'death', 'international travel life insurance', 'international', '2015-04-04 19:54:24', 'ben'),
(6, 'travel', 'hospital', 'international travel health insurance', 'international', '2015-04-04 19:54:24', 'ben'),
(7, 'travel', 'luggage', 'international travel luggage insurance', 'international', '2015-04-04 19:54:24', 'ben'),
(8, 'shopping', 'shopping', 'shopping insuarance', 'domestic', '2015-04-04 19:54:24', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `insurance_type_history`
--

TRUNCATE TABLE `insurance_type_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Truncate table before insert `interest`
--

TRUNCATE TABLE `interest`;
--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interest_id`, `credit_card_id`, `payment_type_id`, `min_interest`, `max_interest`, `update_time`, `update_user`) VALUES
(1, 1, 1, 0.149500000000000, 0.179500000000000, '2015-04-04 19:54:53', 'ben'),
(2, 1, 2, 0.122500000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(3, 1, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(4, 2, 1, 0.150000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(5, 2, 2, 0.079200000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(6, 2, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(7, 3, 1, 0.150000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(8, 3, 2, 0.079200000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(9, 3, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(10, 4, 1, 0.149500000000000, 0.179500000000000, '2015-04-04 19:54:53', 'ben'),
(11, 4, 2, NULL, NULL, '2015-04-04 19:54:53', 'ben'),
(12, 4, 3, 0.180000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(13, 5, 1, 0.180000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(14, 5, 2, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(15, 5, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(16, 6, 1, 0.180000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(17, 6, 2, 0.122500000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(18, 6, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(19, 7, 1, 0.180000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(20, 7, 2, 0.122500000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(21, 7, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(22, 8, 1, 0.180000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(23, 8, 2, 0.122500000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(24, 8, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(25, 9, 1, 0.150000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(26, 9, 2, 0.120000000000000, 0.147500000000000, '2015-04-04 19:54:53', 'ben'),
(27, 9, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(28, 10, 1, 0.179500000000000, 0.179500000000000, '2015-04-04 19:54:53', 'ben'),
(29, 10, 2, 0.132000000000000, 0.132000000000000, '2015-04-04 19:54:53', 'ben'),
(30, 10, 3, 0.132000000000000, 0.132000000000000, '2015-04-04 19:54:53', 'ben'),
(31, 11, 1, 0.179500000000000, 0.179500000000000, '2015-04-04 19:54:53', 'ben'),
(32, 11, 2, 0.132000000000000, 0.132000000000000, '2015-04-04 19:54:53', 'ben'),
(33, 11, 3, 0.132000000000000, 0.132000000000000, '2015-04-04 19:54:53', 'ben'),
(34, 12, 1, 0.179500000000000, 0.179500000000000, '2015-04-04 19:54:53', 'ben'),
(35, 12, 2, 0.132000000000000, 0.132000000000000, '2015-04-04 19:54:53', 'ben'),
(36, 12, 3, 0.132000000000000, 0.132000000000000, '2015-04-04 19:54:53', 'ben'),
(37, 13, 1, 0.180000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(38, 13, 2, 0.107600000000000, 0.132700000000000, '2015-04-04 19:54:53', 'ben'),
(39, 13, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(40, 14, 1, 0.180000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(41, 14, 2, 0.122500000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(42, 14, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(43, 15, 1, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(44, 15, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(45, 15, 3, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(46, 16, 1, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(47, 16, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(48, 16, 3, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(49, 17, 1, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(50, 17, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(51, 17, 3, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(52, 18, 1, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(53, 18, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(54, 18, 3, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(55, 19, 1, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(56, 19, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(57, 19, 3, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(58, 20, 1, 0.120000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(59, 20, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(60, 20, 3, 0.145200000000000, 0.145200000000000, '2015-04-04 19:54:53', 'ben'),
(61, 21, 1, 0.120000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(62, 21, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(63, 21, 3, 0.145200000000000, 0.145200000000000, '2015-04-04 19:54:53', 'ben'),
(64, 22, 1, 0.120000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(65, 22, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(66, 22, 3, 0.145200000000000, 0.145200000000000, '2015-04-04 19:54:53', 'ben'),
(67, 23, 1, 0.120000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(68, 23, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(69, 23, 3, 0.138000000000000, 0.138000000000000, '2015-04-04 19:54:53', 'ben'),
(70, 24, 1, 0.150000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(71, 24, 2, 0.120000000000000, 0.145000000000000, '2015-04-04 19:54:53', 'ben'),
(72, 24, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(73, 25, 1, 0.150000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(74, 25, 2, 0.120000000000000, 0.145000000000000, '2015-04-04 19:54:53', 'ben'),
(75, 25, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(76, 26, 1, 0.150000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(77, 26, 2, 0.120000000000000, 0.145000000000000, '2015-04-04 19:54:53', 'ben'),
(78, 26, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(79, 27, 1, 0.180000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(80, 27, 2, 0.122500000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(81, 27, 3, 0.150000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(82, 28, 1, 0.120000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(83, 28, 2, 0.000000000000000, 0.000000000000000, '2015-04-04 19:54:53', 'ben'),
(84, 28, 3, 0.145200000000000, 0.145200000000000, '2015-04-04 19:54:53', 'ben'),
(85, 29, 1, 0.150000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(86, 29, 2, 0.120000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(87, 29, 3, 0.132000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(88, 30, 1, 0.150000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(89, 30, 2, 0.120000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(90, 30, 3, 0.132000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(91, 31, 1, 0.150000000000000, 0.180000000000000, '2015-04-04 19:54:53', 'ben'),
(92, 31, 2, 0.120000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben'),
(93, 31, 3, 0.132000000000000, 0.150000000000000, '2015-04-04 19:54:53', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `interest_history`
--

TRUNCATE TABLE `interest_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Truncate table before insert `issuer`
--

TRUNCATE TABLE `issuer`;
--
-- Dumping data for table `issuer`
--

INSERT INTO `issuer` (`issuer_id`, `issuer_name`, `update_time`, `update_user`) VALUES
(1, '株式会社リクルートライフスタイル', '2015-04-04 19:55:13', 'benfries'),
(3, '株式会社セブン・カードサービス', '2015-04-04 19:55:13', 'benfries'),
(4, '楽天カード株式会社', '2015-04-04 19:55:13', 'benfries'),
(5, '三井住友カード株式会社', '2015-04-04 19:55:13', 'benfries'),
(6, 'ＪＸ日鉱日石エネルギー株式会社', '2015-04-04 19:55:13', 'benfries'),
(7, 'TSUTAYA', '2015-04-04 19:55:13', 'benfries'),
(8, 'NIHONDO', '2015-04-04 19:55:13', 'benfries'),
(9, 'SMBC', '2015-04-04 19:55:13', 'benfries'),
(10, 'Credit Saison', '2015-04-04 19:55:13', 'benfries'),
(11, '三井住友トラスト', '2015-04-04 19:55:13', 'benfries'),
(12, 'ジャックス', '2015-04-04 19:55:13', 'benfries'),
(13, '株式会社ＪＡＬカード', '2015-04-04 19:55:13', 'benfries');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `issuer_history`
--

TRUNCATE TABLE `issuer_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `payment_type`
--

TRUNCATE TABLE `payment_type`;
--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`payment_type_id`, `payment_type`, `payment_description`, `update_time`, `update_user`) VALUES
(1, 'ikkai', '一回払い', '2015-04-04 19:55:25', 'ben'),
(2, 'bunkatsu', '分割払い', '2015-04-04 19:55:25', 'ben'),
(3, 'ribo', 'リボ払い', '2015-04-04 19:55:25', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `payment_type_history`
--

TRUNCATE TABLE `payment_type_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Truncate table before insert `point_system`
--

TRUNCATE TABLE `point_system`;
--
-- Dumping data for table `point_system`
--

INSERT INTO `point_system` (`point_system_id`, `point_system_name`, `points_per_yen`, `credit_card_id`, `store_id`, `update_time`, `update_user`) VALUES
(1, 'store', 0.015000000000000, 5, 4, '2015-04-04 19:55:48', 'ben'),
(2, 'store', 0.020000000000000, 24, 55, '2015-04-04 19:55:48', 'ben'),
(3, 'store', 0.020000000000000, 25, 55, '2015-04-04 19:55:48', 'ben'),
(4, 'store', 0.010000000000000, 24, 64, '2015-04-04 19:55:48', 'ben'),
(5, 'store', 0.010000000000000, 25, 64, '2015-04-04 19:55:48', 'ben'),
(6, 'store', 0.010000000000000, 27, 43, '2015-04-04 19:55:48', 'ben'),
(7, 'store', 0.015000000000000, 5, 33, '2015-04-04 19:55:48', 'ben'),
(8, 'store', 0.012000000000000, 1, 18, '2015-04-04 19:55:48', 'ben'),
(9, 'store', 0.012000000000000, 2, 18, '2015-04-04 19:55:48', 'ben'),
(10, 'store', 0.020000000000000, 3, 18, '2015-04-04 19:55:48', 'ben'),
(11, 'store', 0.005000000000000, 4, 18, '2015-04-04 19:55:48', 'ben'),
(12, 'store', 0.010000000000000, 6, 18, '2015-04-04 19:55:48', 'ben'),
(13, 'store', 0.010000000000000, 7, 18, '2015-04-04 19:55:48', 'ben'),
(14, 'store', 0.010000000000000, 8, 18, '2015-04-04 19:55:48', 'ben'),
(15, 'store', 0.005000000000000, 13, 18, '2015-04-04 19:55:48', 'ben'),
(16, 'store', 0.032000000000000, 1, 29, '2015-04-04 19:55:48', 'ben'),
(17, 'store', 0.032000000000000, 2, 29, '2015-04-04 19:55:48', 'ben'),
(18, 'store', 0.040000000000000, 3, 29, '2015-04-04 19:55:48', 'ben'),
(19, 'store', 0.005000000000000, 4, 57, '2015-04-04 19:55:48', 'ben'),
(20, 'store', 0.005000000000000, 20, 57, '2015-04-04 19:55:48', 'ben'),
(21, 'store', 0.010000000000000, 27, 20, '2015-04-04 19:55:48', 'ben'),
(22, 'store', 0.010000000000000, 23, 10, '2015-04-04 19:55:48', 'ben'),
(23, 'store', 0.015000000000000, 24, 14, '2015-04-04 19:55:48', 'ben'),
(24, 'store', 0.015000000000000, 25, 14, '2015-04-04 19:55:48', 'ben'),
(25, 'store', 0.010000000000000, 13, 26, '2015-04-04 19:55:48', 'ben'),
(26, 'store', 0.010000000000000, 5, 19, '2015-04-04 19:55:48', 'ben'),
(27, 'store', 0.012000000000000, 2, 59, '2015-04-04 19:55:48', 'ben'),
(28, 'store', 0.020000000000000, 3, 59, '2015-04-04 19:55:48', 'ben'),
(29, 'store', 0.010000000000000, 22, 59, '2015-04-04 19:55:48', 'ben'),
(30, 'store', 0.005000000000000, 23, 59, '2015-04-04 19:55:48', 'ben'),
(31, 'store', 0.012000000000000, 2, 60, '2015-04-04 19:55:48', 'ben'),
(32, 'store', 0.020000000000000, 3, 60, '2015-04-04 19:55:48', 'ben'),
(33, 'store', 0.006000000000000, 10, 60, '2015-04-04 19:55:48', 'ben'),
(34, 'store', 0.005000000000000, 20, 60, '2015-04-04 19:55:48', 'ben'),
(35, 'store', 0.010000000000000, 29, 60, '2015-04-04 19:55:48', 'ben'),
(36, 'store', 0.010000000000000, 30, 60, '2015-04-04 19:55:48', 'ben'),
(37, 'store', 0.010000000000000, 31, 60, '2015-04-04 19:55:48', 'ben'),
(38, 'store', 0.010000000000000, 5, 6, '2015-04-04 19:55:48', 'ben'),
(39, 'store', 0.012000000000000, 1, 61, '2015-04-04 19:55:48', 'ben'),
(40, 'store', 0.010000000000000, 5, 8, '2015-04-04 19:55:48', 'ben'),
(41, 'store', 0.015000000000000, 24, 37, '2015-04-04 19:55:48', 'ben'),
(42, 'store', 0.015000000000000, 25, 37, '2015-04-04 19:55:48', 'ben'),
(43, 'store', 0.010000000000000, 4, 40, '2015-04-04 19:55:48', 'ben'),
(44, 'store', 0.015000000000000, 13, 40, '2015-04-04 19:55:48', 'ben'),
(45, 'store', 0.015000000000000, 29, 62, '2015-04-04 19:55:48', 'ben'),
(46, 'store', 0.015000000000000, 30, 62, '2015-04-04 19:55:48', 'ben'),
(47, 'store', 0.015000000000000, 31, 62, '2015-04-04 19:55:48', 'ben'),
(48, 'store', 0.010000000000000, 4, 1, '2015-04-04 19:55:48', 'ben'),
(49, 'store', 0.010000000000000, 13, 1, '2015-04-04 19:55:48', 'ben'),
(50, 'store', 0.010000000000000, 24, 1, '2015-04-04 19:55:48', 'ben'),
(51, 'store', 0.010000000000000, 25, 1, '2015-04-04 19:55:48', 'ben'),
(52, 'store', 0.015000000000000, 5, 2, '2015-04-04 19:55:48', 'ben'),
(53, 'store', 0.010000000000000, 4, 39, '2015-04-04 19:55:48', 'ben'),
(54, 'store', 0.015000000000000, 13, 39, '2015-04-04 19:55:48', 'ben'),
(55, 'store', 0.010000000000000, 4, 40, '2015-04-04 19:55:48', 'ben'),
(56, 'store', 0.005000000000000, 20, 34, '2015-04-04 19:55:48', 'ben'),
(57, 'store', 0.010000000000000, 13, 28, '2015-04-04 19:55:48', 'ben'),
(58, 'store', 0.032000000000000, 1, 36, '2015-04-04 19:55:48', 'ben'),
(59, 'store', 0.032000000000000, 2, 36, '2015-04-04 19:55:48', 'ben'),
(60, 'store', 0.040000000000000, 3, 36, '2015-04-04 19:55:48', 'ben'),
(61, 'store', 0.015000000000000, 24, 36, '2015-04-04 19:55:48', 'ben'),
(62, 'store', 0.015000000000000, 25, 36, '2015-04-04 19:55:48', 'ben'),
(63, 'store', 0.010000000000000, 4, 2, '2015-04-04 19:55:48', 'ben'),
(64, 'store', 0.010000000000000, 13, 2, '2015-04-04 19:55:48', 'ben'),
(65, 'store', 0.010000000000000, 4, 13, '2015-04-04 19:55:48', 'ben'),
(66, 'store', 0.010000000000000, 13, 13, '2015-04-04 19:55:48', 'ben'),
(67, 'store', 0.015000000000000, 13, 44, '2015-04-04 19:55:48', 'ben'),
(68, 'store', 0.010000000000000, 4, 35, '2015-04-04 19:55:48', 'ben'),
(69, 'store', 0.010000000000000, 13, 35, '2015-04-04 19:55:48', 'ben'),
(70, 'store', 0.015000000000000, 5, 7, '2015-04-04 19:55:48', 'ben'),
(71, 'store', 0.010000000000000, 4, 1, '2015-04-04 19:55:48', 'ben'),
(72, 'store', 0.015000000000000, 13, 1, '2015-04-04 19:55:48', 'ben'),
(73, 'store', 0.010000000000000, 21, 42, '2015-04-04 19:55:48', 'ben'),
(74, 'store', 0.010000000000000, 28, 42, '2015-04-04 19:55:48', 'ben'),
(75, 'store', 0.020000000000000, 22, 23, '2015-04-04 19:55:48', 'ben'),
(76, 'store', 0.012000000000000, 1, 46, '2015-04-04 19:55:48', 'ben'),
(77, 'store', 0.012000000000000, 2, 46, '2015-04-04 19:55:48', 'ben'),
(78, 'store', 0.020000000000000, 3, 46, '2015-04-04 19:55:48', 'ben'),
(79, 'store', 0.010000000000000, 20, 47, '2015-04-04 19:55:48', 'ben'),
(80, 'store', 0.100000000000000, 20, 48, '2015-04-04 19:55:48', 'ben'),
(81, 'store', 0.010000000000000, 5, 63, '2015-04-04 19:55:48', 'ben'),
(82, 'store', 0.010000000000000, 24, 47, '2015-04-04 19:55:48', 'ben'),
(83, 'store', 0.010000000000000, 25, 47, '2015-04-04 19:55:48', 'ben'),
(84, 'store', 0.005000000000000, 13, 51, '2015-04-04 19:55:48', 'ben'),
(85, 'store', 0.012000000000000, 1, 48, '2015-04-04 19:55:48', 'ben'),
(86, 'store', 0.012000000000000, 2, 48, '2015-04-04 19:55:48', 'ben'),
(87, 'store', 0.020000000000000, 3, 48, '2015-04-04 19:55:48', 'ben'),
(88, 'store', 0.005000000000000, 20, 53, '2015-04-04 19:55:48', 'ben'),
(89, 'store', 0.010000000000000, 13, 54, '2015-04-04 19:55:48', 'ben'),
(90, 'store', 0.015000000000000, 13, 55, '2015-04-04 19:55:48', 'ben'),
(91, 'store', 0.012000000000000, 1, 49, '2015-04-04 19:55:48', 'ben'),
(92, 'store', 0.005000000000000, 4, 49, '2015-04-04 19:55:48', 'ben'),
(93, 'store', 0.005000000000000, 6, 49, '2015-04-04 19:55:48', 'ben'),
(94, 'store', 0.005000000000000, 7, 49, '2015-04-04 19:55:48', 'ben'),
(95, 'store', 0.005000000000000, 8, 49, '2015-04-04 19:55:48', 'ben'),
(96, 'store', 0.005000000000000, 13, 49, '2015-04-04 19:55:48', 'ben'),
(97, 'store', 0.005000000000000, 20, 49, '2015-04-04 19:55:48', 'ben'),
(98, 'store', 0.010000000000000, 22, 49, '2015-04-04 19:55:48', 'ben'),
(99, 'store', 0.005000000000000, 23, 49, '2015-04-04 19:55:48', 'ben'),
(100, 'store', 0.020000000000000, 6, 50, '2015-04-04 19:55:48', 'ben'),
(101, 'store', 0.020000000000000, 7, 50, '2015-04-04 19:55:48', 'ben'),
(102, 'store', 0.020000000000000, 8, 50, '2015-04-04 19:55:48', 'ben'),
(103, 'store', 0.010000000000000, 24, 50, '2015-04-04 19:55:48', 'ben'),
(104, 'store', 0.010000000000000, 25, 50, '2015-04-04 19:55:48', 'ben'),
(105, 'store', 0.012000000000000, 1, 51, '2015-04-04 19:55:48', 'ben'),
(106, 'store', 0.012000000000000, 2, 51, '2015-04-04 19:55:48', 'ben'),
(107, 'store', 0.020000000000000, 3, 51, '2015-04-04 19:55:48', 'ben'),
(108, 'store', 0.005000000000000, 4, 51, '2015-04-04 19:55:48', 'ben'),
(109, 'store', 0.005000000000000, 5, 51, '2015-04-04 19:55:48', 'ben'),
(110, 'store', 0.010000000000000, 6, 51, '2015-04-04 19:55:48', 'ben'),
(111, 'store', 0.010000000000000, 7, 51, '2015-04-04 19:55:48', 'ben'),
(112, 'store', 0.010000000000000, 8, 51, '2015-04-04 19:55:48', 'ben'),
(113, 'store', 0.005500000000000, 9, 51, '2015-04-04 19:55:48', 'ben'),
(114, 'store', 0.006000000000000, 10, 51, '2015-04-04 19:55:48', 'ben'),
(115, 'store', 0.006000000000000, 12, 51, '2015-04-04 19:55:48', 'ben'),
(116, 'store', 0.005000000000000, 13, 51, '2015-04-04 19:55:48', 'ben'),
(117, 'store', 0.003500000000000, 14, 51, '2015-04-04 19:55:48', 'ben'),
(118, 'store', 0.005000000000000, 20, 51, '2015-04-04 19:55:48', 'ben'),
(119, 'store', 0.005000000000000, 21, 51, '2015-04-04 19:55:48', 'ben'),
(120, 'store', 0.010000000000000, 22, 51, '2015-04-04 19:55:48', 'ben'),
(121, 'store', 0.005000000000000, 23, 51, '2015-04-04 19:55:48', 'ben'),
(122, 'store', 0.005000000000000, 24, 51, '2015-04-04 19:55:48', 'ben'),
(123, 'store', 0.005000000000000, 25, 51, '2015-04-04 19:55:48', 'ben'),
(124, 'store', 0.005000000000000, 27, 51, '2015-04-04 19:55:48', 'ben'),
(125, 'store', 0.005000000000000, 28, 51, '2015-04-04 19:55:48', 'ben'),
(126, 'store', 0.010000000000000, 29, 51, '2015-04-04 19:55:48', 'ben'),
(127, 'store', 0.005000000000000, 30, 51, '2015-04-04 19:55:48', 'ben'),
(128, 'store', 0.005000000000000, 31, 51, '2015-04-04 19:55:48', 'ben'),
(129, 'store', 0.012000000000000, 1, 52, '2015-04-04 19:55:48', 'ben'),
(130, 'store', 0.012000000000000, 2, 52, '2015-04-04 19:55:48', 'ben'),
(131, 'store', 0.020000000000000, 3, 52, '2015-04-04 19:55:48', 'ben'),
(132, 'store', 0.005000000000000, 4, 52, '2015-04-04 19:55:48', 'ben'),
(133, 'store', 0.005000000000000, 5, 52, '2015-04-04 19:55:48', 'ben'),
(134, 'store', 0.010000000000000, 6, 52, '2015-04-04 19:55:48', 'ben'),
(135, 'store', 0.010000000000000, 7, 52, '2015-04-04 19:55:48', 'ben'),
(136, 'store', 0.010000000000000, 8, 52, '2015-04-04 19:55:48', 'ben'),
(137, 'store', 0.005500000000000, 9, 52, '2015-04-04 19:55:48', 'ben'),
(138, 'store', 0.006000000000000, 10, 52, '2015-04-04 19:55:48', 'ben'),
(139, 'store', 0.006000000000000, 12, 52, '2015-04-04 19:55:48', 'ben'),
(140, 'store', 0.005000000000000, 13, 52, '2015-04-04 19:55:48', 'ben'),
(141, 'store', 0.010000000000000, 20, 52, '2015-04-04 19:55:48', 'ben'),
(142, 'store', 0.005000000000000, 21, 52, '2015-04-04 19:55:48', 'ben'),
(143, 'store', 0.005000000000000, 24, 52, '2015-04-04 19:55:48', 'ben'),
(144, 'store', 0.005000000000000, 25, 52, '2015-04-04 19:55:48', 'ben'),
(145, 'store', 0.010000000000000, 28, 52, '2015-04-04 19:55:48', 'ben'),
(146, 'store', 0.010000000000000, 4, 60, '2015-04-04 19:55:48', 'ben'),
(147, 'store', 0.010000000000000, 13, 60, '2015-04-04 19:55:48', 'ben'),
(148, 'store', 0.015000000000000, 13, 62, '2015-04-04 19:55:48', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `point_system_history`
--

TRUNCATE TABLE `point_system_history`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Truncate table before insert `point_usage`
--

TRUNCATE TABLE `point_usage`;
--
-- Dumping data for table `point_usage`
--

INSERT INTO `point_usage` (`point_usage_id`, `store_id`, `yen_per_point`, `credit_card_id`, `update_time`, `update_user`) VALUES
(1, 4, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(2, 55, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(3, 55, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(4, 64, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(5, 64, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(6, 43, 0.9999999999999999, 27, '2015-04-04 19:55:48', 'ben'),
(7, 33, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(8, 18, 0.9999999999999999, 1, '2015-04-04 19:55:48', 'ben'),
(9, 18, 0.9999999999999999, 2, '2015-04-04 19:55:48', 'ben'),
(10, 18, 0.9999999999999999, 3, '2015-04-04 19:55:48', 'ben'),
(11, 18, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(12, 18, 0.9999999999999999, 6, '2015-04-04 19:55:48', 'ben'),
(13, 18, 0.9999999999999999, 7, '2015-04-04 19:55:48', 'ben'),
(14, 18, 0.9999999999999999, 8, '2015-04-04 19:55:48', 'ben'),
(15, 18, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(16, 29, 0.9999999999999999, 1, '2015-04-04 19:55:48', 'ben'),
(17, 29, 0.9999999999999999, 2, '2015-04-04 19:55:48', 'ben'),
(18, 29, 0.9999999999999999, 3, '2015-04-04 19:55:48', 'ben'),
(19, 57, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(20, 57, 0.9999999999999999, 20, '2015-04-04 19:55:48', 'ben'),
(21, 20, 0.9999999999999999, 27, '2015-04-04 19:55:48', 'ben'),
(22, 10, 0.9999999999999999, 23, '2015-04-04 19:55:48', 'ben'),
(23, 14, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(24, 14, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(25, 26, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(26, 19, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(27, 59, 0.9999999999999999, 2, '2015-04-04 19:55:48', 'ben'),
(28, 59, 0.9999999999999999, 3, '2015-04-04 19:55:48', 'ben'),
(29, 59, 0.9999999999999999, 22, '2015-04-04 19:55:48', 'ben'),
(30, 59, 0.9999999999999999, 23, '2015-04-04 19:55:48', 'ben'),
(31, 60, 0.9999999999999999, 2, '2015-04-04 19:55:48', 'ben'),
(32, 60, 0.9999999999999999, 3, '2015-04-04 19:55:48', 'ben'),
(33, 60, 0.9999999999999999, 10, '2015-04-04 19:55:48', 'ben'),
(34, 60, 0.9999999999999999, 20, '2015-04-04 19:55:48', 'ben'),
(35, 60, 0.9999999999999999, 29, '2015-04-04 19:55:48', 'ben'),
(36, 60, 0.9999999999999999, 30, '2015-04-04 19:55:48', 'ben'),
(37, 60, 0.9999999999999999, 31, '2015-04-04 19:55:48', 'ben'),
(38, 6, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(39, 61, 0.9999999999999999, 1, '2015-04-04 19:55:48', 'ben'),
(40, 8, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(41, 37, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(42, 37, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(43, 40, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(44, 40, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(45, 62, 0.9999999999999999, 29, '2015-04-04 19:55:48', 'ben'),
(46, 62, 0.9999999999999999, 30, '2015-04-04 19:55:48', 'ben'),
(47, 62, 0.9999999999999999, 31, '2015-04-04 19:55:48', 'ben'),
(48, 1, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(49, 1, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(50, 1, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(51, 1, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(52, 2, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(53, 39, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(54, 39, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(55, 40, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(56, 34, 0.9999999999999999, 20, '2015-04-04 19:55:48', 'ben'),
(57, 28, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(58, 36, 0.9999999999999999, 1, '2015-04-04 19:55:48', 'ben'),
(59, 36, 0.9999999999999999, 2, '2015-04-04 19:55:48', 'ben'),
(60, 36, 0.9999999999999999, 3, '2015-04-04 19:55:48', 'ben'),
(61, 36, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(62, 36, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(63, 2, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(64, 2, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(65, 13, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(66, 13, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(67, 44, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(68, 35, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(69, 35, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(70, 7, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(71, 1, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(72, 1, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(73, 42, 0.9999999999999999, 21, '2015-04-04 19:55:48', 'ben'),
(74, 42, 0.9999999999999999, 28, '2015-04-04 19:55:48', 'ben'),
(75, 23, 0.9999999999999999, 22, '2015-04-04 19:55:48', 'ben'),
(76, 46, 0.9999999999999999, 1, '2015-04-04 19:55:48', 'ben'),
(77, 46, 0.9999999999999999, 2, '2015-04-04 19:55:48', 'ben'),
(78, 46, 0.9999999999999999, 3, '2015-04-04 19:55:48', 'ben'),
(79, 47, 0.9999999999999999, 20, '2015-04-04 19:55:48', 'ben'),
(80, 48, 0.9999999999999999, 20, '2015-04-04 19:55:48', 'ben'),
(81, 63, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(82, 47, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(83, 47, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(84, 51, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(85, 48, 0.9999999999999999, 1, '2015-04-04 19:55:48', 'ben'),
(86, 48, 0.9999999999999999, 2, '2015-04-04 19:55:48', 'ben'),
(87, 48, 0.9999999999999999, 3, '2015-04-04 19:55:48', 'ben'),
(88, 53, 0.9999999999999999, 20, '2015-04-04 19:55:48', 'ben'),
(89, 54, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(90, 55, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(91, 49, 0.9999999999999999, 1, '2015-04-04 19:55:48', 'ben'),
(92, 49, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(93, 49, 0.9999999999999999, 6, '2015-04-04 19:55:48', 'ben'),
(94, 49, 0.9999999999999999, 7, '2015-04-04 19:55:48', 'ben'),
(95, 49, 0.9999999999999999, 8, '2015-04-04 19:55:48', 'ben'),
(96, 49, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(97, 49, 0.9999999999999999, 20, '2015-04-04 19:55:48', 'ben'),
(98, 49, 0.9999999999999999, 22, '2015-04-04 19:55:48', 'ben'),
(99, 49, 0.9999999999999999, 23, '2015-04-04 19:55:48', 'ben'),
(100, 50, 0.9999999999999999, 6, '2015-04-04 19:55:48', 'ben'),
(101, 50, 0.9999999999999999, 7, '2015-04-04 19:55:48', 'ben'),
(102, 50, 0.9999999999999999, 8, '2015-04-04 19:55:48', 'ben'),
(103, 50, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(104, 50, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(105, 51, 0.9999999999999999, 1, '2015-04-04 19:55:48', 'ben'),
(106, 51, 0.9999999999999999, 2, '2015-04-04 19:55:48', 'ben'),
(107, 51, 0.9999999999999999, 3, '2015-04-04 19:55:48', 'ben'),
(108, 51, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(109, 51, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(110, 51, 0.9999999999999999, 6, '2015-04-04 19:55:48', 'ben'),
(111, 51, 0.9999999999999999, 7, '2015-04-04 19:55:48', 'ben'),
(112, 51, 0.9999999999999999, 8, '2015-04-04 19:55:48', 'ben'),
(113, 51, 0.9999999999999999, 9, '2015-04-04 19:55:48', 'ben'),
(114, 51, 0.9999999999999999, 10, '2015-04-04 19:55:48', 'ben'),
(115, 51, 0.9999999999999999, 12, '2015-04-04 19:55:48', 'ben'),
(116, 51, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(117, 51, 0.9999999999999999, 14, '2015-04-04 19:55:48', 'ben'),
(118, 51, 0.9999999999999999, 20, '2015-04-04 19:55:48', 'ben'),
(119, 51, 0.9999999999999999, 21, '2015-04-04 19:55:48', 'ben'),
(120, 51, 0.9999999999999999, 22, '2015-04-04 19:55:48', 'ben'),
(121, 51, 0.9999999999999999, 23, '2015-04-04 19:55:48', 'ben'),
(122, 51, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(123, 51, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(124, 51, 0.9999999999999999, 27, '2015-04-04 19:55:48', 'ben'),
(125, 51, 0.9999999999999999, 28, '2015-04-04 19:55:48', 'ben'),
(126, 51, 0.9999999999999999, 29, '2015-04-04 19:55:48', 'ben'),
(127, 51, 0.9999999999999999, 30, '2015-04-04 19:55:48', 'ben'),
(128, 51, 0.9999999999999999, 31, '2015-04-04 19:55:48', 'ben'),
(129, 52, 0.9999999999999999, 1, '2015-04-04 19:55:48', 'ben'),
(130, 52, 0.9999999999999999, 2, '2015-04-04 19:55:48', 'ben'),
(131, 52, 0.9999999999999999, 3, '2015-04-04 19:55:48', 'ben'),
(132, 52, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(133, 52, 0.9999999999999999, 5, '2015-04-04 19:55:48', 'ben'),
(134, 52, 0.9999999999999999, 6, '2015-04-04 19:55:48', 'ben'),
(135, 52, 0.9999999999999999, 7, '2015-04-04 19:55:48', 'ben'),
(136, 52, 0.9999999999999999, 8, '2015-04-04 19:55:48', 'ben'),
(137, 52, 0.9999999999999999, 9, '2015-04-04 19:55:48', 'ben'),
(138, 52, 0.9999999999999999, 10, '2015-04-04 19:55:48', 'ben'),
(139, 52, 0.9999999999999999, 12, '2015-04-04 19:55:48', 'ben'),
(140, 52, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(141, 52, 0.9999999999999999, 20, '2015-04-04 19:55:48', 'ben'),
(142, 52, 0.9999999999999999, 21, '2015-04-04 19:55:48', 'ben'),
(143, 52, 0.9999999999999999, 24, '2015-04-04 19:55:48', 'ben'),
(144, 52, 0.9999999999999999, 25, '2015-04-04 19:55:48', 'ben'),
(145, 52, 0.9999999999999999, 28, '2015-04-04 19:55:48', 'ben'),
(146, 60, 0.9999999999999999, 4, '2015-04-04 19:55:48', 'ben'),
(147, 60, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben'),
(148, 62, 0.9999999999999999, 13, '2015-04-04 19:55:48', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `point_usage_history`
--

TRUNCATE TABLE `point_usage_history`;
--
-- Dumping data for table `point_usage_history`
--

INSERT INTO `point_usage_history` (`point_usage_id`, `store_id`, `yen_per_point`, `credit_card_id`, `time_beg`, `time_end`, `update_user`) VALUES
(1, 4, 0.0150000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(2, 55, 0.0200000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(3, 55, 0.0200000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(4, 64, 0.0100000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(5, 64, 0.0100000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(6, 43, 0.0100000000000000, 27, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(7, 33, 0.0150000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(8, 18, 0.0120000000000000, 1, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(9, 18, 0.0120000000000000, 2, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(10, 18, 0.0200000000000000, 3, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(11, 18, 0.0050000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(12, 18, 0.0100000000000000, 6, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(13, 18, 0.0100000000000000, 7, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(14, 18, 0.0100000000000000, 8, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(15, 18, 0.0050000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(16, 29, 0.0320000000000000, 1, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(17, 29, 0.0320000000000000, 2, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(18, 29, 0.0400000000000000, 3, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(19, 57, 0.0050000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(20, 57, 0.0050000000000000, 20, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(21, 20, 0.0100000000000000, 27, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(22, 10, 0.0100000000000000, 23, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(23, 14, 0.0150000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(24, 14, 0.0150000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(25, 26, 0.0100000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(26, 19, 0.0100000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(27, 59, 0.0120000000000000, 2, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(28, 59, 0.0200000000000000, 3, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(29, 59, 0.0100000000000000, 22, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(30, 59, 0.0050000000000000, 23, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(31, 60, 0.0120000000000000, 2, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(32, 60, 0.0200000000000000, 3, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(33, 60, 0.0060000000000000, 10, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(34, 60, 0.0050000000000000, 20, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(35, 60, 0.0100000000000000, 29, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(36, 60, 0.0100000000000000, 30, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(37, 60, 0.0100000000000000, 31, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(38, 6, 0.0100000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(39, 61, 0.0120000000000000, 1, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(40, 8, 0.0100000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(41, 37, 0.0150000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(42, 37, 0.0150000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(43, 40, 0.0100000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(44, 40, 0.0150000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(45, 62, 0.0150000000000000, 29, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(46, 62, 0.0150000000000000, 30, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(47, 62, 0.0150000000000000, 31, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(48, 1, 0.0100000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(49, 1, 0.0100000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(50, 1, 0.0100000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(51, 1, 0.0100000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(52, 2, 0.0150000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(53, 39, 0.0100000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(54, 39, 0.0150000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(55, 40, 0.0100000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(56, 34, 0.0050000000000000, 20, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(57, 28, 0.0100000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(58, 36, 0.0320000000000000, 1, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(59, 36, 0.0320000000000000, 2, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(60, 36, 0.0400000000000000, 3, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(61, 36, 0.0150000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(62, 36, 0.0150000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(63, 2, 0.0100000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(64, 2, 0.0100000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(65, 13, 0.0100000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(66, 13, 0.0100000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(67, 44, 0.0150000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(68, 35, 0.0100000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(69, 35, 0.0100000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(70, 7, 0.0150000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(71, 1, 0.0100000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(72, 1, 0.0150000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(73, 42, 0.0100000000000000, 21, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(74, 42, 0.0100000000000000, 28, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(75, 23, 0.0200000000000000, 22, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(76, 46, 0.0120000000000000, 1, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(77, 46, 0.0120000000000000, 2, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(78, 46, 0.0200000000000000, 3, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(79, 47, 0.0100000000000000, 20, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(80, 48, 0.1000000000000000, 20, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(81, 63, 0.0100000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(82, 47, 0.0100000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(83, 47, 0.0100000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(84, 51, 0.0050000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(85, 48, 0.0120000000000000, 1, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(86, 48, 0.0120000000000000, 2, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(87, 48, 0.0200000000000000, 3, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(88, 53, 0.0050000000000000, 20, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(89, 54, 0.0100000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(90, 55, 0.0150000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(91, 49, 0.0120000000000000, 1, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(92, 49, 0.0050000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(93, 49, 0.0050000000000000, 6, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(94, 49, 0.0050000000000000, 7, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(95, 49, 0.0050000000000000, 8, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(96, 49, 0.0050000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(97, 49, 0.0050000000000000, 20, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(98, 49, 0.0100000000000000, 22, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(99, 49, 0.0050000000000000, 23, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(100, 50, 0.0200000000000000, 6, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(101, 50, 0.0200000000000000, 7, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(102, 50, 0.0200000000000000, 8, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(103, 50, 0.0100000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(104, 50, 0.0100000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(105, 51, 0.0120000000000000, 1, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(106, 51, 0.0120000000000000, 2, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(107, 51, 0.0200000000000000, 3, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(108, 51, 0.0050000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(109, 51, 0.0050000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(110, 51, 0.0100000000000000, 6, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(111, 51, 0.0100000000000000, 7, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(112, 51, 0.0100000000000000, 8, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(113, 51, 0.0055000000000000, 9, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(114, 51, 0.0060000000000000, 10, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(115, 51, 0.0060000000000000, 12, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(116, 51, 0.0050000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(117, 51, 0.0035000000000000, 14, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(118, 51, 0.0050000000000000, 20, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(119, 51, 0.0050000000000000, 21, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(120, 51, 0.0100000000000000, 22, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(121, 51, 0.0050000000000000, 23, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(122, 51, 0.0050000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(123, 51, 0.0050000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(124, 51, 0.0050000000000000, 27, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(125, 51, 0.0050000000000000, 28, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(126, 51, 0.0100000000000000, 29, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(127, 51, 0.0050000000000000, 30, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(128, 51, 0.0050000000000000, 31, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(129, 52, 0.0120000000000000, 1, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(130, 52, 0.0120000000000000, 2, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(131, 52, 0.0200000000000000, 3, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(132, 52, 0.0050000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(133, 52, 0.0050000000000000, 5, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(134, 52, 0.0100000000000000, 6, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(135, 52, 0.0100000000000000, 7, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(136, 52, 0.0100000000000000, 8, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(137, 52, 0.0055000000000000, 9, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(138, 52, 0.0060000000000000, 10, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(139, 52, 0.0060000000000000, 12, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(140, 52, 0.0050000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(141, 52, 0.0100000000000000, 20, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(142, 52, 0.0050000000000000, 21, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(143, 52, 0.0050000000000000, 24, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(144, 52, 0.0050000000000000, 25, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(145, 52, 0.0100000000000000, 28, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(146, 60, 0.0100000000000000, 4, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(147, 60, 0.0100000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(148, 62, 0.0150000000000000, 13, '2015-04-04 19:55:43', '2015-04-04 19:55:43', 'ben'),
(1, 4, 0.0150000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(2, 55, 0.0200000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(3, 55, 0.0200000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(4, 64, 0.0100000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(5, 64, 0.0100000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(6, 43, 0.0100000000000000, 27, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(7, 33, 0.0150000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(8, 18, 0.0120000000000000, 1, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(9, 18, 0.0120000000000000, 2, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(10, 18, 0.0200000000000000, 3, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(11, 18, 0.0050000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(12, 18, 0.0100000000000000, 6, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(13, 18, 0.0100000000000000, 7, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(14, 18, 0.0100000000000000, 8, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(15, 18, 0.0050000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(16, 29, 0.0320000000000000, 1, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(17, 29, 0.0320000000000000, 2, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(18, 29, 0.0400000000000000, 3, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(19, 57, 0.0050000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(20, 57, 0.0050000000000000, 20, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(21, 20, 0.0100000000000000, 27, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(22, 10, 0.0100000000000000, 23, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(23, 14, 0.0150000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(24, 14, 0.0150000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(25, 26, 0.0100000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(26, 19, 0.0100000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(27, 59, 0.0120000000000000, 2, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(28, 59, 0.0200000000000000, 3, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(29, 59, 0.0100000000000000, 22, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(30, 59, 0.0050000000000000, 23, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(31, 60, 0.0120000000000000, 2, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(32, 60, 0.0200000000000000, 3, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(33, 60, 0.0060000000000000, 10, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(34, 60, 0.0050000000000000, 20, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(35, 60, 0.0100000000000000, 29, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(36, 60, 0.0100000000000000, 30, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(37, 60, 0.0100000000000000, 31, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(38, 6, 0.0100000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(39, 61, 0.0120000000000000, 1, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(40, 8, 0.0100000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(41, 37, 0.0150000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(42, 37, 0.0150000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(43, 40, 0.0100000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(44, 40, 0.0150000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(45, 62, 0.0150000000000000, 29, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(46, 62, 0.0150000000000000, 30, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(47, 62, 0.0150000000000000, 31, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(48, 1, 0.0100000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(49, 1, 0.0100000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(50, 1, 0.0100000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(51, 1, 0.0100000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(52, 2, 0.0150000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(53, 39, 0.0100000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(54, 39, 0.0150000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(55, 40, 0.0100000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(56, 34, 0.0050000000000000, 20, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(57, 28, 0.0100000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(58, 36, 0.0320000000000000, 1, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(59, 36, 0.0320000000000000, 2, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(60, 36, 0.0400000000000000, 3, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(61, 36, 0.0150000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(62, 36, 0.0150000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(63, 2, 0.0100000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(64, 2, 0.0100000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(65, 13, 0.0100000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(66, 13, 0.0100000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(67, 44, 0.0150000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(68, 35, 0.0100000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(69, 35, 0.0100000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(70, 7, 0.0150000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(71, 1, 0.0100000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(72, 1, 0.0150000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(73, 42, 0.0100000000000000, 21, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(74, 42, 0.0100000000000000, 28, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(75, 23, 0.0200000000000000, 22, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(76, 46, 0.0120000000000000, 1, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(77, 46, 0.0120000000000000, 2, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(78, 46, 0.0200000000000000, 3, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(79, 47, 0.0100000000000000, 20, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(80, 48, 0.1000000000000000, 20, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(81, 63, 0.0100000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(82, 47, 0.0100000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(83, 47, 0.0100000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(84, 51, 0.0050000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(85, 48, 0.0120000000000000, 1, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(86, 48, 0.0120000000000000, 2, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(87, 48, 0.0200000000000000, 3, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(88, 53, 0.0050000000000000, 20, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(89, 54, 0.0100000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(90, 55, 0.0150000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(91, 49, 0.0120000000000000, 1, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(92, 49, 0.0050000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(93, 49, 0.0050000000000000, 6, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(94, 49, 0.0050000000000000, 7, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(95, 49, 0.0050000000000000, 8, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(96, 49, 0.0050000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(97, 49, 0.0050000000000000, 20, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(98, 49, 0.0100000000000000, 22, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(99, 49, 0.0050000000000000, 23, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(100, 50, 0.0200000000000000, 6, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(101, 50, 0.0200000000000000, 7, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(102, 50, 0.0200000000000000, 8, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(103, 50, 0.0100000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(104, 50, 0.0100000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(105, 51, 0.0120000000000000, 1, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(106, 51, 0.0120000000000000, 2, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(107, 51, 0.0200000000000000, 3, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(108, 51, 0.0050000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(109, 51, 0.0050000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(110, 51, 0.0100000000000000, 6, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(111, 51, 0.0100000000000000, 7, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(112, 51, 0.0100000000000000, 8, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(113, 51, 0.0055000000000000, 9, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(114, 51, 0.0060000000000000, 10, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(115, 51, 0.0060000000000000, 12, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(116, 51, 0.0050000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(117, 51, 0.0035000000000000, 14, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(118, 51, 0.0050000000000000, 20, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(119, 51, 0.0050000000000000, 21, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(120, 51, 0.0100000000000000, 22, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(121, 51, 0.0050000000000000, 23, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(122, 51, 0.0050000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(123, 51, 0.0050000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(124, 51, 0.0050000000000000, 27, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(125, 51, 0.0050000000000000, 28, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(126, 51, 0.0100000000000000, 29, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(127, 51, 0.0050000000000000, 30, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(128, 51, 0.0050000000000000, 31, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(129, 52, 0.0120000000000000, 1, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(130, 52, 0.0120000000000000, 2, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(131, 52, 0.0200000000000000, 3, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(132, 52, 0.0050000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(133, 52, 0.0050000000000000, 5, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(134, 52, 0.0100000000000000, 6, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(135, 52, 0.0100000000000000, 7, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(136, 52, 0.0100000000000000, 8, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(137, 52, 0.0055000000000000, 9, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(138, 52, 0.0060000000000000, 10, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(139, 52, 0.0060000000000000, 12, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(140, 52, 0.0050000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(141, 52, 0.0100000000000000, 20, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(142, 52, 0.0050000000000000, 21, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(143, 52, 0.0050000000000000, 24, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(144, 52, 0.0050000000000000, 25, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(145, 52, 0.0100000000000000, 28, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(146, 60, 0.0100000000000000, 4, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(147, 60, 0.0100000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben'),
(148, 62, 0.0150000000000000, 13, '2015-04-04 19:55:48', '2015-04-04 19:55:48', 'ben');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Truncate table before insert `store`
--

TRUNCATE TABLE `store`;
--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `category`, `description`, `update_time`, `update_user`) VALUES
(1, 'ファミリーマート', 'スーパー・コンビニ', NULL, '2015-04-04 19:56:15', 'ben'),
(2, 'スリーエフ', 'スーパー・コンビニ', NULL, '2015-04-04 19:56:15', 'ben'),
(3, 'イトーヨーカドー', 'スーパー・コンビニ', NULL, '2015-04-04 19:56:15', 'ben'),
(4, '7-11', 'スーパー・コンビニ', NULL, '2015-04-04 19:56:15', 'ben'),
(5, 'Oisix', 'スーパー・コンビニ', NULL, '2015-04-04 19:56:15', 'ben'),
(6, 'Yahoo!ショッピング', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(7, 'Sogo', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(8, 'Seibu', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(9, 'ファミール', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(10, 'Loft', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(11, '東急ホテルズ', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(12, 'ヤマダモール', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(13, 'ヤマダ電機', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(14, 'MUJI', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(15, 'Uniqlo', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(16, 'Apple', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(17, 'Tokyu Hands', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(18, 'Joshin', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(19, 'SEIYU', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(20, 'LIVIN', 'ショッピング', NULL, '2015-04-04 19:56:15', 'ben'),
(21, 'じゃらん', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(22, 'TSUTAYA', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(23, '阪急第一ホテルグループ', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(24, 'ニッポンレンタカー', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(25, 'シダックス', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(26, 'Knt!', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(27, '東京無線タクシー', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(28, 'プリンスホテルズ', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(29, 'JR 九州', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(30, 'JTB', 'エンタメ・旅行', NULL, '2015-04-04 19:56:15', 'ben'),
(31, 'オートバックス', 'カーライフ', NULL, '2015-04-04 19:56:15', 'ben'),
(32, 'ETC', 'カーライフ', NULL, '2015-04-04 19:56:15', 'ben'),
(33, 'ENEOS/JOMO', 'カーライフ', NULL, '2015-04-04 19:56:15', 'ben'),
(34, 'コスモ', 'カーライフ', NULL, '2015-04-04 19:56:15', 'ben'),
(35, '出光', 'カーライフ', NULL, '2015-04-04 19:56:15', 'ben'),
(36, 'マツダ', 'カーライフ', NULL, '2015-04-04 19:56:15', 'ben'),
(37, 'カーコンビニ倶楽部', 'カーライフ', NULL, '2015-04-04 19:56:15', 'ben'),
(38, 'オリックスレンタカー', 'カーライフ', NULL, '2015-04-04 19:56:15', 'ben'),
(39, 'ドトール・エクセルシオールカフェ', 'レストラン・カフェ', NULL, '2015-04-04 19:56:15', 'ben'),
(40, 'ガスト', 'レストラン・カフェ', NULL, '2015-04-04 19:56:15', 'ben'),
(41, 'バーミヤン', 'レストラン・カフェ', NULL, '2015-04-04 19:56:15', 'ben'),
(42, '牛角', 'レストラン・カフェ', NULL, '2015-04-04 19:56:15', 'ben'),
(43, 'Denny''s', 'レストラン・カフェ', NULL, '2015-04-04 19:56:15', 'ben'),
(44, 'ロッテリア', 'レストラン・カフェ', NULL, '2015-04-04 19:56:15', 'ben'),
(45, 'HOT PEPPER', 'ビューティー・エステ', NULL, '2015-04-04 19:56:15', 'ben'),
(46, 'モバイルSUICA', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(47, 'リボ利用', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(48, '公共料金', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(49, '楽天Edy', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(50, '楽天市場', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(51, '標準ポイント', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(52, '海外一般店利用', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(53, '牛角', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(54, '阪急第一ホテルグループ', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(55, '7-Net Shopping', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(56, 'ENEOS', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(57, 'iD2', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(58, 'JOMO', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(59, 'nanaco', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(60, 'QuicPay', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(61, 'SMART ICOCA', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(62, 'Waon', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(63, 'ヤマト', 'Point System', NULL, '2015-04-04 19:56:15', 'ben'),
(64, 'Amazon', 'Point System', NULL, '2015-04-04 19:56:15', 'ben');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `store_history`
--

TRUNCATE TABLE `store_history`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
