-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: moneyiq.jp    Database: moneyiq_uat
-- ------------------------------------------------------
-- Server version	5.5.42-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `affiliate_company`
--

DROP TABLE IF EXISTS `affiliate_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliate_company` (
  `affiliate_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `website` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `signed_up_date` date NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`affiliate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_company`
--

LOCK TABLES `affiliate_company` WRITE;
/*!40000 ALTER TABLE `affiliate_company` DISABLE KEYS */;
INSERT INTO `affiliate_company` VALUES (1,'A8','','http://www.a8.net/','2015-04-04','2015-04-04 19:50:58','ben'),(2,'JANet','','https://www.j-a-net.jp/','2015-04-04','2015-04-04 19:50:58','ben');
/*!40000 ALTER TABLE `affiliate_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliate_company_history`
--

DROP TABLE IF EXISTS `affiliate_company_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliate_company_history` (
  `affiliate_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `website` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `signed_up_date` date NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`affiliate_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_company_history`
--

LOCK TABLES `affiliate_company_history` WRITE;
/*!40000 ALTER TABLE `affiliate_company_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `affiliate_company_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign` (
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
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`campaign_id`),
  KEY `campaign_credit_card` (`credit_card_id`),
  CONSTRAINT `campaign_credit_card` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign`
--

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
INSERT INTO `campaign` VALUES (1,1,'','',7000,7000,'2015-07-01','9999-12-31','2015-07-01 12:13:37','ben',NULL),(2,2,'','',7000,7000,'2015-07-03','9999-12-31','2015-07-03 15:35:36','ben',NULL),(3,3,'','　',10000,10000,'2015-07-13','9999-12-31','2015-07-13 14:14:49','ben',NULL),(6,6,'','',8000,8000,'2015-07-03','9999-12-31','2015-07-03 15:39:57','ben',NULL),(7,7,'','',8000,8000,'2015-07-03','9999-12-31','2015-07-03 15:39:33','ben',NULL),(8,19,'','',1400,7000,'2015-07-08','9999-12-31','2015-07-08 23:13:32','ben',NULL),(9,20,NULL,NULL,200,1000,'2015-07-07','2015-08-31','2015-07-07 09:48:38','ben',NULL),(10,21,NULL,NULL,NULL,NULL,NULL,'2015-03-31','2015-04-04 19:51:09','ben',NULL),(11,22,NULL,NULL,1000,1000,NULL,'2015-03-31','2015-04-04 19:51:09','ben',NULL),(12,23,NULL,NULL,2000,2000,'2015-07-09','2015-09-30','2015-07-09 12:36:24','ben','https://www.saisoncard.co.jp/lineup/ca147.html'),(13,28,NULL,NULL,NULL,NULL,'2015-01-05','2015-03-15','2015-04-04 19:51:09','ben',NULL),(14,29,NULL,NULL,4000,0,'2015-07-08','9999-09-09','2015-07-08 14:34:55','ben','http://www.jalcard.co.jp/cpn/jcb1310/a8.html'),(15,30,NULL,NULL,2000,2000,'2015-01-05','2015-03-15','2015-04-04 19:51:09','ben',NULL),(16,31,NULL,NULL,3000,0,'2015-07-08','9999-09-09','2015-07-08 14:35:38','ben','https://www.jalcard.co.jp/cgi-bin/cardlist/af.cgi?f=summer15&root=BXA8SUMMER15'),(19,15,'','',1000,5000,'2015-07-13','9999-12-31','2015-07-13 13:12:09','','https://www.smbc-card.com/nyukai/card/debutplus.jsp'),(20,16,'','',1400,7000,'2015-07-09','9999-12-31','2015-07-09 12:43:57','',NULL),(21,17,'','',1400,7000,'2015-07-11','9999-12-31','2015-07-11 21:11:30','',NULL),(22,18,'','',1400,7000,'2015-07-06','9999-12-31','2015-07-06 12:49:47','',NULL),(23,8,'','',13000,13000,'2015-07-03','9999-12-31','2015-07-03 15:39:14','',NULL),(24,32,'入会ポイントプレゼント',NULL,5000,5000,'2015-07-21','2015-09-30','2015-07-21 12:07:03','','http://card.yahoo.co.jp/campaign/?pid=aff'),(25,33,NULL,NULL,8000,8000,'2015-07-22','2015-08-31','2015-07-22 10:54:04','','https://www.eposcard.co.jp/eposcard/aflt.html');
/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_history`
--

DROP TABLE IF EXISTS `campaign_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_history` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_history`
--

LOCK TABLES `campaign_history` WRITE;
/*!40000 ALTER TABLE `campaign_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card_description`
--

DROP TABLE IF EXISTS `card_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_description` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_id` int(11) NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `item_description` text CHARACTER SET utf8,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `creditcard_description` (`credit_card_id`),
  CONSTRAINT `creditcard_description` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_description`
--

LOCK TABLES `card_description` WRITE;
/*!40000 ALTER TABLE `card_description` DISABLE KEYS */;
INSERT INTO `card_description` VALUES (1,1,'general description','最短3営業日カード発送','2015-04-04 19:51:40','ben'),(2,2,'general description','最短3営業日カード発送','2015-04-04 19:51:40','ben'),(3,3,'general description','最短3営業日カード発送','2015-04-04 19:51:40','ben'),(4,10,'general description','24時間365日のロードサーブス','2015-04-04 19:51:40','ben'),(5,10,'general description','メンテンアンス料金割引サービス','2015-04-04 19:51:40','ben'),(8,12,'general description','24時間365日のロードサーブス','2015-04-04 19:51:40','ben'),(9,12,'general description','メンテンアンス料金割引サービス','2015-04-04 19:51:40','ben'),(10,15,'restriction','20代限定','2015-07-13 23:02:19',''),(11,17,'restriction','女性限定','2015-07-13 23:03:09',''),(12,25,'restriction','女性限定','2015-07-14 03:37:40','');
/*!40000 ALTER TABLE `card_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card_description_history`
--

DROP TABLE IF EXISTS `card_description_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_description_history` (
  `item_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `item_description` text CHARACTER SET utf8,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`item_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_description_history`
--

LOCK TABLES `card_description_history` WRITE;
/*!40000 ALTER TABLE `card_description_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `card_description_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card_feature_type`
--

DROP TABLE IF EXISTS `card_feature_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_feature_type` (
  `feature_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `category` varchar(250) CHARACTER SET utf8 NOT NULL,
  `background_color` varchar(250) DEFAULT NULL,
  `foreground_color` varchar(250) DEFAULT '0',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`feature_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_feature_type`
--

LOCK TABLES `card_feature_type` WRITE;
/*!40000 ALTER TABLE `card_feature_type` DISABLE KEYS */;
INSERT INTO `card_feature_type` VALUES (1,'ゴールドカード',NULL,'prestige','#F5DA81','#101010','2015-07-04 06:13:38','ben'),(2,'ETC',NULL,'ETC','#E2A9F3','#2E2E2E','2015-07-04 06:13:07','ben'),(3,'家族カード',NULL,'utility','#4EA2E8','#FEFEFE','2015-07-04 06:07:02','ben'),(4,'iD',NULL,'e-payment','#C49C36','#271f0a','2015-07-03 13:38:51','ben'),(5,'nanaco',NULL,'e-payment','#F5F5DC','#8A3324','2015-07-02 04:24:35','ben'),(6,'Suica',NULL,'suica','#32CD32','#ffffff','2015-07-03 13:04:30','ben'),(7,'楽天Edy',NULL,'e-payment','#CDFAFF','#330C67','2015-07-04 06:02:07','ben'),(8,'sugoca',NULL,'e-payment','#FFB6C1','#000000','2015-07-02 04:42:58','ben'),(9,'Quicpay',NULL,'e-payment','#FFFFF0','#0000CD','2015-07-02 04:44:10','ben'),(10,'WAON',NULL,'e-payment','#FFFFF0','#EA3F00','2015-07-02 04:45:41','ben'),(11,'Pasmo',NULL,'pasmo','#ACABAB','#A9145F','2015-07-02 04:49:13','ben'),(12,'ICOCA',NULL,'e-payment','#1CA3A3','#FFFFFF','2015-07-02 04:52:08','ben'),(13,'Kitaca',NULL,'e-payment','#ADFF2F','#545252','2015-07-02 04:53:16','ben'),(14,'TOICA',NULL,'e-payment','#0886B1','#FFFFFF','2015-07-02 04:55:53','ben'),(15,'VISA',NULL,'network',NULL,'','2015-06-28 12:20:28','ben'),(16,'master',NULL,'network',NULL,NULL,'2015-04-04 19:51:59','ben'),(17,'JCB',NULL,'network',NULL,'','2015-06-28 08:52:42','ben'),(18,'AMEX',NULL,'network',NULL,'','2015-06-28 12:21:07','Andrew'),(19,'diners',NULL,'network',NULL,NULL,'2015-04-04 19:51:59','ben'),(20,'PiTaPa',NULL,'e-payment',NULL,'0','2015-07-03 14:46:30','AB'),(21,'ラウンジ','ラウンジアクセス','lounge',NULL,'0','2015-07-08 13:46:25','AB');
/*!40000 ALTER TABLE `card_feature_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card_feature_type_history`
--

DROP TABLE IF EXISTS `card_feature_type_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_feature_type_history` (
  `feature_type_id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `category` varchar(250) CHARACTER SET utf8 NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`feature_type_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_feature_type_history`
--

LOCK TABLES `card_feature_type_history` WRITE;
/*!40000 ALTER TABLE `card_feature_type_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `card_feature_type_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card_features`
--

DROP TABLE IF EXISTS `card_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_features` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_type_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `issuing_fee` int(11) DEFAULT NULL,
  `ongoing_fee` int(11) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`feature_id`),
  KEY `card_features_credit_card` (`credit_card_id`),
  KEY `fk_card_feature_type` (`feature_type_id`),
  CONSTRAINT `card_features_credit_card` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
  CONSTRAINT `fk_card_feature_type` FOREIGN KEY (`feature_type_id`) REFERENCES `card_feature_type` (`feature_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_features`
--

LOCK TABLES `card_features` WRITE;
/*!40000 ALTER TABLE `card_features` DISABLE KEYS */;
INSERT INTO `card_features` VALUES (1,15,1,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(3,15,6,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(4,15,8,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(6,15,10,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(8,15,12,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(9,15,13,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(10,15,14,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(11,15,15,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(12,15,16,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(13,15,17,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(14,15,18,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(15,15,19,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(16,15,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(17,15,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(18,15,24,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(19,15,25,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(20,15,26,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(21,16,6,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(22,16,8,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(23,16,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(24,16,22,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(25,16,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(26,16,24,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(27,16,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(28,17,2,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(29,17,3,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(32,17,7,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(33,17,10,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(35,17,12,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(36,17,13,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(37,17,14,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(38,17,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(39,17,22,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(40,17,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(41,17,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(42,17,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(43,17,31,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(44,18,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(45,18,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(46,18,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(47,2,1,'',1000,NULL,'2015-06-28 23:43:29','ben',NULL),(48,2,2,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(49,2,3,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(52,2,6,NULL,540,NULL,'2015-04-04 19:52:28','ben',NULL),(53,2,7,NULL,540,NULL,'2015-04-04 19:52:28','ben',NULL),(54,2,8,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(56,2,10,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(58,2,12,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(59,2,13,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(60,2,14,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(61,2,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(62,2,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(63,2,22,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(64,2,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(66,2,24,'2年目から500円(税別)',0,NULL,'2015-04-04 19:52:28','ben',NULL),(67,2,25,'2年目から500円(税別)',0,NULL,'2015-04-04 19:52:28','ben',NULL),(68,2,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(69,2,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(70,2,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(71,2,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(72,2,31,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(73,3,1,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(74,3,2,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(75,3,3,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(77,3,8,NULL,5400,NULL,'2015-04-04 19:52:28','ben',NULL),(79,3,10,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(81,3,12,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(82,3,13,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(83,3,14,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(84,3,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(85,3,28,NULL,1080,NULL,'2015-04-04 19:52:28','ben',NULL),(86,3,29,NULL,8640,NULL,'2015-07-08 13:25:21','ben',NULL),(87,3,30,NULL,1060,NULL,'2015-07-09 12:15:39','ben',NULL),(88,3,31,NULL,3780,NULL,'2015-07-07 13:36:50','ben',NULL),(91,4,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(92,4,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(93,4,24,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(94,4,25,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(95,4,26,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(97,5,7,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(98,5,13,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(99,5,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(100,5,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(101,5,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(102,5,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(103,5,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(104,6,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(105,6,22,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(106,6,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(107,6,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(108,6,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(109,6,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(110,6,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(111,6,31,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(112,7,6,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(113,7,8,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(115,7,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(116,7,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(117,7,22,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(118,7,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(119,7,24,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(120,7,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(121,7,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(122,7,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(123,7,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(125,8,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(126,9,10,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(128,9,12,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(129,9,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(130,10,24,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(131,10,25,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(132,10,26,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(133,10,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(134,10,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(136,11,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(137,11,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(138,11,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(139,11,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(140,11,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(142,12,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(144,12,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(147,13,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(150,14,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(152,1,3,'',0,0,'2015-07-01 13:35:28','ben',NULL),(153,1,29,'',0,0,'2015-07-01 13:36:07','ben',NULL),(154,1,8,'',0,0,'2015-07-01 13:36:23','ben',NULL),(155,1,18,'',0,0,'2015-07-03 14:34:12','ben',NULL),(156,3,18,'',0,0,'2015-07-03 14:39:21','ben',NULL),(157,4,18,'',0,0,'2015-07-03 14:40:52','ben',NULL),(158,2,18,'',0,0,'2015-07-03 14:41:21','ben',NULL),(159,2,15,'',0,0,'2015-07-03 14:47:09','ben',NULL),(160,3,15,'',0,0,'2015-07-03 14:47:17','ben',NULL),(161,20,15,'',0,0,'2015-07-03 14:49:42','AB',NULL),(162,4,15,'',0,0,'2015-07-03 14:49:45','ben',NULL),(163,10,15,'',0,0,'2015-07-03 14:51:48','ben',NULL),(164,10,18,'',0,0,'2015-07-03 14:52:03','ben',NULL),(165,4,16,'',0,0,'2015-07-03 14:52:33','ben',NULL),(166,10,16,'',0,0,'2015-07-03 14:52:35','ben',NULL),(167,3,16,'',0,0,'2015-07-03 14:52:45','ben',NULL),(168,2,16,'',0,0,'2015-07-03 14:52:52','ben',NULL),(170,3,19,'',0,0,'2015-07-03 14:57:26','ben',NULL),(171,2,19,'',0,0,'2015-07-03 14:57:30','ben',NULL),(172,10,19,'',0,0,'2015-07-03 14:57:34','ben',NULL),(173,4,19,'',0,0,'2015-07-03 14:58:09','ben',NULL),(174,3,17,'',0,0,'2015-07-03 14:59:45','ben',NULL),(175,2,17,'',0,0,'2015-07-03 14:59:49','ben',NULL),(176,10,17,'',0,0,'2015-07-03 14:59:50','ben',NULL),(177,16,17,'',0,0,'2015-07-03 15:01:10','ben',NULL),(178,4,17,'',0,0,'2015-07-03 15:01:20','ben',NULL),(179,7,7,'',0,0,'2015-07-03 15:09:25','ben',NULL),(180,6,3,'',0,0,'2015-07-03 15:21:12','ben',NULL),(181,5,3,'',0,0,'2015-07-03 15:21:21','ben',NULL),(182,9,3,'',0,0,'2015-07-03 15:22:09','ben',NULL),(183,7,1,'',0,0,'2015-07-03 15:30:28','ben',NULL),(185,12,1,'',0,0,'2015-07-03 15:32:27','ben',NULL),(187,9,2,'',0,0,'2015-07-03 15:33:31','ben',NULL),(189,6,1,'',0,0,'2015-07-03 15:34:26','ben',NULL),(190,3,6,'',0,0,'2015-07-03 15:44:09','ben',NULL),(191,3,7,'',0,0,'2015-07-03 15:44:26','ben',NULL),(193,5,2,NULL,NULL,NULL,'2015-07-05 00:55:07','ben',NULL),(194,5,31,NULL,NULL,NULL,'2015-07-07 23:36:01','ben',NULL),(195,21,29,'ラウンジアクセス',NULL,NULL,'2015-07-08 13:47:26','AB',NULL),(196,1,19,NULL,NULL,NULL,'2015-07-12 13:13:13','ben',NULL);
/*!40000 ALTER TABLE `card_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card_features_history`
--

DROP TABLE IF EXISTS `card_features_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_features_history` (
  `feature_id` int(11) NOT NULL,
  `feature_type_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `feature_cost` int(11) DEFAULT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`feature_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_features_history`
--

LOCK TABLES `card_features_history` WRITE;
/*!40000 ALTER TABLE `card_features_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `card_features_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card_point_system`
--

DROP TABLE IF EXISTS `card_point_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_point_system` (
  `card_point_system_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_id` int(11) NOT NULL,
  `point_system_id` int(11) NOT NULL,
  `priority_id` int(11) DEFAULT '100',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`card_point_system_id`),
  KEY `fk_credit_card_id` (`credit_card_id`),
  KEY `fk_point_system` (`point_system_id`),
  CONSTRAINT `fk_credit_card_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
  CONSTRAINT `fk_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_point_system`
--

LOCK TABLES `card_point_system` WRITE;
/*!40000 ALTER TABLE `card_point_system` DISABLE KEYS */;
INSERT INTO `card_point_system` VALUES (1,1,2,100,'2015-06-27 23:42:15','ben'),(2,2,2,100,'2015-06-27 23:42:15','ben'),(6,6,5,100,'2015-06-27 23:42:15','ben'),(7,7,5,100,'2015-06-27 23:42:15','ben'),(8,8,5,100,'2015-06-27 23:42:15','ben'),(10,10,7,100,'2015-06-27 23:42:15','ben'),(13,13,3,100,'2015-06-27 23:42:15','ben'),(14,14,8,100,'2015-06-27 23:42:15','ben'),(15,15,9,100,'2015-06-27 23:42:15','ben'),(16,16,9,100,'2015-06-27 23:42:15','ben'),(17,17,9,100,'2015-06-27 23:42:15','ben'),(20,20,10,100,'2015-06-27 23:42:15','ben'),(21,20,11,101,'2015-06-27 23:42:15','ben'),(23,21,11,101,'2015-06-27 23:42:15','ben'),(24,22,13,100,'2015-06-27 23:42:15','ben'),(25,23,14,100,'2015-06-27 23:42:15','ben'),(26,24,9,100,'2015-06-27 23:42:15','ben'),(27,25,9,100,'2015-06-27 23:42:15','ben'),(28,26,9,100,'2015-06-27 23:42:15','ben'),(29,27,15,100,'2015-06-27 23:42:15','ben'),(31,28,11,101,'2015-06-27 23:42:15','ben'),(33,30,16,100,'2015-06-27 23:42:15','ben'),(37,15,19,100,'2015-07-01 13:14:44',''),(38,29,20,100,'2015-07-01 13:17:02',''),(39,3,17,100,'2015-07-03 12:58:44',''),(41,12,21,100,'2015-07-06 22:27:01',''),(42,31,22,100,'2015-07-07 23:44:23',''),(43,18,23,100,'2015-07-12 13:23:36',''),(44,32,24,100,'2015-07-21 12:41:27',''),(45,33,25,100,'2015-07-22 10:57:22','');
/*!40000 ALTER TABLE `card_point_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credit_card`
--

DROP TABLE IF EXISTS `credit_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credit_card` (
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
  `pointExpiryMonths` int(11) DEFAULT '12',
  `reference` varchar(255) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`credit_card_id`),
  KEY `idx_1` (`credit_card_id`),
  KEY `affiliate_company_credit_card` (`affiliate_id`),
  KEY `issuer_credit_card` (`issuer_id`),
  CONSTRAINT `affiliate_company_credit_card` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate_company` (`affiliate_id`),
  CONSTRAINT `issuer_credit_card` FOREIGN KEY (`issuer_id`) REFERENCES `issuer` (`issuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credit_card`
--

LOCK TABLES `credit_card` WRITE;
/*!40000 ALTER TABLE `credit_card` DISABLE KEYS */;
INSERT INTO `credit_card` VALUES (1,'リクルートカードVISA',1,'リクルートカードVISA','http://s.eximg.jp/exnews/feed/Dime/Dime_151993_7.jpg',1,0,0,0,0,'http://px.a8.net/svt/ejp?a8mat=2C2WC4+7U7HIQ+2T4U+5YJRM',1,12,'https://point.recruit.co.jp/doc/info/point_details.html','2015-07-13 22:59:18','ben'),(2,'リクルートカードJCB',1,'リクルートカードJCB','http://www.kanzen-creditcard.com/img/card/recruit/recruit-jcb-320.jpg',0,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22209%22%20height%3D%22133%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww20.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001019000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20alt%3D%22%22%3E',1,12,'https://point.recruit.co.jp/doc/info/point_details.html','2015-07-13 22:59:23','ben'),(3,'リクルートカードプラス',1,'リクルートカードプラス','http://cdn-ak.f.st-hatena.com/images/fotolife/a/aiza_man/20140401/20140401080040.jpg',0,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2C2WC4+7U7HIQ+2T4U+5YZ76',1,12,'https://point.recruit.co.jp/doc/info/point_details.html','2015-07-21 12:57:16','ab'),(6,'楽天カードVISA/MC',4,'楽天カードVISA/MC','http://クレジットカード審査まとめ.com/wp-content/uploads/2013/11/rakuten.jpg',1,1,0,0,0,'http://px.a8.net/svt/ejp?a8mat=2HD7MZ+AC3XV6+FOQ+HZ2R6',1,12,'http://ichiba.faq.rakuten.co.jp/app/answers/detail/a_id/681','2015-07-13 14:19:48','ab'),(7,'楽天カードJCB',4,'楽天カードJCB','http://cdn-ak.f.st-hatena.com/images/fotolife/a/advantaged/20130812/20130812234625.jpg',0,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HD7MZ+AC3XV6+FOQ+HZ2R6',1,12,'http://ichiba.faq.rakuten.co.jp/app/answers/detail/a_id/681','2015-07-13 14:20:01','ab'),(8,'楽天プレミアムカード',4,'楽天プレミアムカード','http://moake.creditcardinfo.info/wp-content/uploads/2013/06/rakuten-premium.jpg',1,1,0,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HD7MZ%2BAC3XV6%2BFOQ%2BHZ2R6%22%20target%3D%22_blank%22%3E%E3%83%86%E3%82%B9%E3%83%88%E7%94%A8%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2HD7MZ%2BAC3XV6%2BFOQ%2BHZ2R6%22%20alt%3D%22%22%3E',1,12,'http://ichiba.faq.rakuten.co.jp/app/answers/detail/a_id/681','2015-07-13 14:20:14','ab'),(10,'ＥＮＥＯＳカードP',6,'ＥＮＥＯＳカードP','http://oil-stat.com/image/cc/eneos_p.gif',1,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E',1,24,'http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_p.html','2015-07-13 14:21:15','ab'),(12,'ＥＮＥＯＳカードS',6,'ＥＮＥＯＳカードS','http://www8.ts3card.com/affiliated/img/img_eneos_s.jpg',1,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E',1,24,'http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_p.html','2015-07-13 14:21:26','ab'),(13,'TSUTAYA Tカードプラス',7,'TSUTAYA Tカードプラス','http://cardjiten.jp/cardimg/t-card-plus.jpg',1,0,1,0,0,'http://click.j-a-net.jp/1526049/80178/',2,12,'http://qa.tsite.jp/faq/show/3499','2015-07-13 14:23:20','ab'),(14,'Kampo Style Club Card',8,'Kampo Style Club Card','http://dime.jp/review/files/2014/10/015KAMPO-STYLE-CLUB-CARD2.jpg',1,0,1,0,0,'http://click.j-a-net.jp/1526049/244311/',2,24,'http://www.jaccs.co.jp/service/card_lineup/teikei/kampo.html','2015-07-13 23:00:12','ben'),(15,'SMBC デビュープラス',9,'SMBC デビュープラス','http://www.smbc-card.com/nyukai/card/responsive/img/cardlist/001_DB_CD_F_rs.jpg',1,0,0,0,0,'http://click.j-a-net.jp/1526049/87675/',2,24,'https://www.smbc-card.com/mem/wp/about_wp.jsp','2015-07-12 11:23:32','ab'),(16,'SMBCクラシックカード',9,'SMBCクラシックカード','http://img1.kakaku.k-img.com/images/credit-card/card/l/008001.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/87471/',2,24,'https://www.smbc-card.com/mem/wp/about_wp.jsp','2015-07-12 11:24:07','ab'),(17,'SMBCアミティーカード',9,'SMBCアミティーカード','http://www.smbc-card.com/nyukai/card/responsive/img/cardlist/004_0_v_ic_smcc_amitie_rs.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/87615/',2,24,'https://www.smbc-card.com/mem/wp/about_wp.jsp0','2015-07-12 11:23:54','ben'),(18,'SMBCゴールドカード',9,'SMBCゴールドカード','https://www.smbc-card.com/mem/nyukai/pop/imgs/card_smbc_card_prime01.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/87617/',2,36,'https://www.smbc-card.com/mem/wp/about_wp.jsp','2015-07-12 11:24:23','ab'),(19,'SMBCプレミアゴールドカード',9,'SMBCプライムゴールドカード','http://www.smbc-card.com/nyukai/card/responsive/img/cardlist/014_V_Gold_front_rs.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/87619/',2,36,'https://www.smbc-card.com/mem/wp/about_wp.jsp','2015-07-12 13:10:55','ab'),(20,'YAMADA LABI ANA マイレージクラブカード',10,'YAMADA LABI ANA マイレージクラブカード','http://www.i-creditcard.net/hikaku/img/yamada-ana-mile.jpg',0,0,0,1,0,'http://click.j-a-net.jp/1526049/540076/',2,0,'http://www.saisoncard.co.jp/lineup/ca145.html','2015-07-13 14:26:01','ab'),(21,'SEIBU PRINCE CLUB カード ',10,'SEIBU PRINCE CLUB カード ','http://xn--pckugr66p.com/wp-content/uploads/seibu_princeclubcard_saison.png?783bda',1,1,1,0,0,'http://click.j-a-net.jp/1526049/540088/',2,60,'0','2015-07-12 12:17:41','ben'),(22,'マツダm\'z PLUSカード',10,'マツダm\'z PLUSカード','http://card1192ya.com//img/6563.jpg',0,1,1,0,0,'http://click.j-a-net.jp/1526049/540076/',2,0,'0','2015-07-09 12:17:25','ben'),(23,'JQ CARD セゾン',10,'JQ CARD セゾン','http://amu-kokura.img.jugem.jp/20111206_1022315.jpg',1,1,1,1,0,'http://click.j-a-net.jp/1526049/540090/',2,24,'http://www.jrkyushu.co.jp/jq/pc/point.html','2015-07-11 21:43:45','ab'),(24,'三井住友トラストカード',11,'三井住友トラストカード','http://www.smtcard.jp/card/img/card03_l.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/542113/',2,24,'http://www.smtb.jp/personal/members/visa/','2015-07-14 03:40:19','ab'),(25,'三井住友トラストレディーズカード',11,'三井住友トラストレディーズカード','http://card-db.com/images/smtcard-lady.jpg',1,0,0,0,0,'http://click.j-a-net.jp/1526049/542116/',2,24,'http://www.smtb.jp/personal/members/visa/','2015-07-13 14:25:03','ab'),(26,'三井住友トラストロードサービスカード',11,'三井住友トラストロードサービスカード','http://nullbio.com/dimg/VJA%2077CARD%20%E3%83%AD%E3%83%BC%E3%83%89%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9VISA%E3%82%AB%E3%83%BC%E3%83%89.jpg',1,0,0,0,0,'http://click.j-a-net.jp/1526049/542117/',2,0,'0','2015-07-09 12:18:41','ben'),(27,'カラマツトレインカード',12,'カラマツトレインカード','http://www.bossanovapgh.com/wp-content/uploads/2015/02/4e31004ffbc59c619b3ad4b10155c17e-300x190.png',0,1,0,0,0,'http://click.j-a-net.jp/1526049/543785/',2,0,'0','2015-07-09 12:18:55','ben'),(28,'SEIBU PRINCE CLUB カード (AMEX)',10,'SEIBU PRINCE CLUB カード (AMEX)','http://crecaguide.com/images/2r-11.gif',0,0,0,1,0,'http://click.j-a-net.jp/1526049/540088/',2,0,'0','2015-07-09 12:19:13','ben'),(29,'JAL Club-A ゴールドカード',13,'JAL Club-A ゴールドカード','http://gold-master.biz/image/jal/jcb_gold_l.jpg',0,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HDA0W+DLZRN6+28T6+66H9E',1,36,'','2015-07-09 12:19:28','ab'),(30,'JAL 普通カード',13,'JAL 普通カード','http://moneyiq.jp/images/jal-card-suica-proper.png',0,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HDA0W+DLZRN6+28T6+644DU',1,36,'0','2015-07-13 14:03:49','AB'),(31,'JAL Club-A カード Suica',13,'JAL Club-A カード Suica','http://www.jreast.co.jp/card/first/jalsuica/img/jalcard_img09.jpg',0,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HDA0W+DLZRN6+28T6+63H8I',1,36,'https://www.jal.co.jp/jalcard/card/suica.html','2015-07-09 12:20:01','AB'),(32,'Yahoo! Japan カード',14,'','http://dime.jp/review/files/2015/04/051Yahoo-JAPAN2.jpg',1,1,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HQH7E+6WV7N6+38JK+BXYEA',1,12,'','2015-07-21 13:00:17','ab'),(33,'エポスカード',15,'','http://prtimes.jp/i/3860/227/resize/d3860-227-309314-2.jpg',1,0,0,0,0,'http://px.a8.net/svt/ejp?a8mat=2HQH7F+27S3UA+38L8+626XU',1,24,'https://www.eposcard.co.jp/point/use.html','2015-07-22 10:52:49','ab');
/*!40000 ALTER TABLE `credit_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credit_card_history`
--

DROP TABLE IF EXISTS `credit_card_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credit_card_history` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credit_card_history`
--

LOCK TABLES `credit_card_history` WRITE;
/*!40000 ALTER TABLE `credit_card_history` DISABLE KEYS */;
INSERT INTO `credit_card_history` VALUES (1,'リクルートカードVISA',1,'リクルートカードVISA',NULL,1,0,0,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22209%22%20height%3D%22133%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww20.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001019000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(2,'リクルートカードJCB',1,'リクルートカードJCB',NULL,0,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22209%22%20height%3D%22133%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww20.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001019000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62ENL%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(3,'リクルートカードプラス',1,'リクルートカードプラス',NULL,0,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B7U7HIQ%2B2T4U%2B62MDD%22%20target%3D%22_blank%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%22207%22%20height%3D%22131%22%20alt%3D%22%22%20src%3D%22http%3A%2F%2Fwww27.a8.net%2Fsvt%2Fbgt%3Faid%3D141222964474%26wid%3D001%26eno%3D01%26mid%3Ds00000013107001020000%26mc%3D1%22%3E%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3F',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(4,'ファミマＴカード',2,'ファミマＴカード',NULL,0,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2H5Y%2B9SGMWI%2B2ZY4%2B5YJRM%22%20target%3D%22_blank%22%3E%E3%83%95%E3%82%A1%E3%83%9F%E3%83%9ET%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww10.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B9SGMWI%2B2ZY4%2B5YJRM%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(5,'セブン＆アイグループのクレジットカード',3,'セブン＆アイグループのクレジットカード',NULL,1,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2H5Y%2B8QCW6Q%2B2LAC%2BBWVTE%22%20target%3D%22_blank%22%3E%E3%82%BB%E3%83%96%E3%83%B3%E3%82%AB%E3%83%BC%E3%83%89%E3%83%97%E3%83%A9%E3%82%B9%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B8QCW6Q%2B2LAC%2BBWVTE%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(6,'楽天カードVISA/MC',4,'楽天カードVISA/MC',NULL,1,1,0,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20target%3D%22_blank%22%3E%E6%A5%BD%E5%A4%A9%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww15.a8.net%2F0.gif%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20alt%3D%22%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww17.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B2Z6SY%2B2OYK%2BBWVTE%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(7,'楽天カードJCB',4,'楽天カードJCB',NULL,0,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20target%3D%22_blank%22%3E%E6%A5%BD%E5%A4%A9%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww15.a8.net%2F0.gif%3Fa8mat%3D2BYC7I%2BF5D2WI%2BFOQ%2BC2102%22%20alt%3D%22%22%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww17.a8.net%2F0.gif%3Fa8mat%3D2C2H5Y%2B2Z6SY%2B2OYK%2BBWVTE%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(8,'楽天プレミアムカード',4,'楽天プレミアムカード',NULL,1,1,0,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HD7MZ%2BAC3XV6%2BFOQ%2BHZ2R6%22%20target%3D%22_blank%22%3E%E3%83%86%E3%82%B9%E3%83%88%E7%94%A8%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww12.a8.net%2F0.gif%3Fa8mat%3D2HD7MZ%2BAC3XV6%2BFOQ%2BHZ2R6%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(9,'ワンピースVISAカード',5,'ワンピースVISAカード',NULL,1,0,0,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2C2WC4%2B6P4KS2%2B1E32%2BHV7V6%22%20target%3D%22_blank%22%3E%E3%83%AF%E3%83%B3%E3%83%94%E3%83%BC%E3%82%B9VISA%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww10.a8.net%2F0.gif%3Fa8mat%3D2C2WC4%2B6P4KS2%2B1E32%2BHV7V6%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(10,'ＥＮＥＯＳカードP',6,'ＥＮＥＯＳカードP',NULL,1,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(11,'ＥＮＥＯＳカードC',6,'ＥＮＥＯＳカードC',NULL,1,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(12,'ＥＮＥＯＳカードS',6,'ＥＮＥＯＳカードS',NULL,1,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20target%3D%22_blank%22%3EENEOS%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww13.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BEXMG1E%2BM7Q%2B69WPU%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(13,'TSUTAYA Tカードプラス',7,'TSUTAYA Tカードプラス',NULL,1,0,1,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F80178%2F%22%20target%3D%22_blank%22%3ETSUTAYA%20T%E3%82%AB%E3%83%BC%E3%83%89%E3%83%97%E3%83%A9%E3%82%B9%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F80178%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(14,'Kanpo Style Club Card',8,'Kanpo Style Club Card',NULL,1,0,1,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F244311%2F%22%20target%3D%22_blank%22%3E%E6%BC%A2%E6%96%B9%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%82%AF%E3%83%A9%E3%83%96%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F244311%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(15,'SMBC デビュープラス',9,'SMBC デビュープラス',NULL,1,0,0,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87675%2F%22%20target%3D%22_blank%22%3E%E4%B8%96%E7%95%8C%E3%81%A7%E4%B8%80%E7%95%AA%E4%BD%BF%E3%81%88%E3%82%8B%E3%82%AB%E3%83%BC%E3%83%89%EF%BC%81%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87675%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(16,'SMBCクラシックカード',9,'SMBCクラシックカード',NULL,1,0,0,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87471%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%AF%E3%83%A9%E3%82%B7%E3%83%83%E3%82%AF%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87471%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(17,'SMBCアミティーカード',9,'SMBCアミティーカード',NULL,1,0,0,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87615%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%A2%E3%83%9F%E3%83%86%E3%82%A3%E3%82%A8%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87615%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(18,'SMBCゴールドカード',9,'SMBCゴールドカード',NULL,1,0,0,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87617%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%82%B4%E3%83%BC%E3%83%AB%E3%83%89%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87617%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(19,'SMBCプレミアゴールドカード',9,'SMBCプレミアゴールドカード',NULL,1,0,0,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F87619%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8BVISA%E3%83%A4%E3%83%B3%E3%82%B0%E3%82%B4%E3%83%BC%E3%83%AB%E3%83%89%E3%82%AB%E3%83%BC%E3%83%8920s%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F87619%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(20,'YAMADA LABI ANA マイレージクラブカード',10,'YAMADA LABI ANA マイレージクラブカード',NULL,0,0,0,1,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540076%2F%22%20target%3D%22_blank%22%3E%E3%83%9E%E3%83%84%E3%83%80m%27z%20PLUS%E3%82%AB%E3%83%BC%E3%83%89%E3%82%BB%E3%82%BE%E3%83%B3%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540076%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(21,'SEIBU PRINCE CLUB カード JCB)',10,'SEIBU PRINCE CLUB カード (JCB)',NULL,1,1,1,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540088%2F%22%20target%3D%22_blank%22%3ESEIBU%20PRINCE%20CLUB%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540088%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(22,'マツダm\'z PLUSカード',10,'マツダm\'z PLUSカード',NULL,0,1,1,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540076%2F%22%20target%3D%22_blank%22%3E%E3%83%9E%E3%83%84%E3%83%80m%27z%20PLUS%E3%82%AB%E3%83%BC%E3%83%89%E3%82%BB%E3%82%BE%E3%83%B3%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540076%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(23,'JQ CARD セゾン',10,'JQ CARD セゾン',NULL,1,1,1,1,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540090%2F%22%20target%3D%22_blank%22%3E%EF%BC%AA%EF%BC%B1%20%EF%BC%A3%EF%BC%A1%EF%BC%B2%EF%BC%A4%E3%82%BB%E3%82%BE%E3%83%B3%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540090%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(24,'三井住友トラストカード',11,'三井住友トラストカード',NULL,1,1,0,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F542113%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8B%E3%83%88%E3%83%A9%E3%82%B9%E3%83%88VISA%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F542113%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(25,'三井住友トラストレディーズカード',11,'三井住友トラストレディーズカード',NULL,1,0,0,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F542116%2F%22%20target%3D%22_blank%22%3E%E4%B8%89%E4%BA%95%E4%BD%8F%E5%8F%8B%E3%83%88%E3%83%A9%E3%82%B9%E3%83%88VISA%E3%83%AC%E3%83%87%E3%82%A3%E3%83%BC%E3%82%B9%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F542116%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(26,'三井住友トラストロードサービスカード',11,'三井住友トラストロードサービスカード',NULL,1,0,0,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F542117%2F%22%20target%3D%22_blank%22%3E%E3%83%AD%E3%83%BC%E3%83%89%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9VISA%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F542117%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(27,'カラマツトレインカード',12,'カラマツトレインカード',NULL,0,1,0,0,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F543785%2F%22%20target%3D%22_blank%22%3EJ%E3%83%87%E3%83%9D1%2C000%E5%86%86%E5%88%86%E3%82%92%E3%83%97%E3%83%AC%E3%82%BC%E3%83%B3%E3%83%88%21%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F543785%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(28,'SEIBU PRINCE CLUB カード AMEX)',10,'SEIBU PRINCE CLUB カード (AMEX)',NULL,0,0,0,1,0,'http%3A%2F%2Fclick.j-a-net.jp%2F1526049%2F540088%2F%22%20target%3D%22_blank%22%3ESEIBU%20PRINCE%20CLUB%E3%82%AB%E3%83%BC%E3%83%89%3Cimg%20src%3D%22http%3A%2F%2Ftext.j-a-net.jp%2F1526049%2F540088%2F%22%20height%3D%221%22%20width%3D%221%22%20border%3D%220%22%3E%3C%2Fa%3E',2,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(29,'JAL Club-A ゴールドカード',13,'JAL Club-A ゴールドカード',NULL,0,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B66H9E%22%20target%3D%22_blank%22%3E%EF%BC%AA%EF%BC%A1%EF%BC%AC%E3%82%B4%E3%83%BC%E3%83%AB%E3%83%89%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww16.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B66H9E%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(30,'JAL 普通カード',13,'JAL 普通カード',NULL,0,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B644DU%22%20target%3D%22_blank%22%3EJAL%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww11.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B644DU%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben'),(31,'JAL Club-A カード',13,'JAL Club-A カード',NULL,0,0,1,0,0,'http%3A%2F%2Fpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B63H8I%22%20target%3D%22_blank%22%3E%EF%BC%AA%EF%BC%A1%EF%BC%AC%E3%82%AB%E3%83%BC%E3%83%89%3C%2Fa%3E%0A%3Cimg%20border%3D%220%22%20width%3D%221%22%20height%3D%221%22%20src%3D%22http%3A%2F%2Fwww18.a8.net%2F0.gif%3Fa8mat%3D2HDA0W%2BDLZRN6%2B28T6%2B63H8I%22%20alt%3D%22%22%3E',1,'2015-04-04 19:52:50','2015-04-04 19:56:26','ben');
/*!40000 ALTER TABLE `credit_card_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discounts` (
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
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`discount_id`),
  KEY `fk_discounts_credit_card` (`credit_card_id`),
  KEY `fk_discounts_store` (`store_id`),
  CONSTRAINT `fk_discounts_credit_card` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
  CONSTRAINT `fk_discounts_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
INSERT INTO `discounts` VALUES (2,0.050000000000000,NULL,NULL,NULL,10,38,1.000000000000000000000000000000,'','2015-04-04 19:53:26','ben',NULL),(3,0.100000000000000,NULL,NULL,NULL,10,39,1.000000000000000000000000000000,'','2015-04-04 19:53:26','ben',NULL),(5,0.020000000000000,'2015-07-06','9999-09-09',NULL,12,33,1.000000000000000000000000000000,'ずっと1ℓ2円OFF','2015-07-06 22:23:46','ben',NULL),(6,0.050000000000000,NULL,NULL,NULL,20,19,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(7,0.050000000000000,NULL,NULL,NULL,20,20,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(8,0.050000000000000,NULL,NULL,NULL,21,19,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(9,0.050000000000000,NULL,NULL,NULL,21,20,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(10,0.050000000000000,NULL,NULL,NULL,22,19,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(11,0.050000000000000,NULL,NULL,NULL,22,20,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL);
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts_history`
--

DROP TABLE IF EXISTS `discounts_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discounts_history` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts_history`
--

LOCK TABLES `discounts_history` WRITE;
/*!40000 ALTER TABLE `discounts_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `discounts_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fees` (
  `fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_type` int(11) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `yearly_occurrence` int(11) DEFAULT NULL,
  `start_year` int(11) DEFAULT NULL,
  `end_year` int(11) DEFAULT NULL,
  `credit_card_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fee_id`),
  KEY `fees_credit_card` (`credit_card_id`),
  CONSTRAINT `fees_credit_card` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
INSERT INTO `fees` VALUES (1,1,0,1,0,1,1,'2015-04-04 19:53:40','ben',NULL),(2,2,0,1,1,2,1,'2015-04-04 19:53:40','ben',NULL),(3,1,0,1,0,1,2,'2015-07-12 11:31:55','ben',NULL),(4,2,0,1,1,2,2,'2015-04-04 19:53:40','ben',NULL),(5,1,2160,1,0,1,3,'2015-07-03 15:55:36','ben',NULL),(6,2,2160,1,1,2,3,'2015-07-03 15:55:46','ben',NULL),(11,1,0,1,0,1,6,'2015-04-04 19:53:40','ben',NULL),(12,2,1250,1,1,2,6,'2015-04-04 19:53:40','ben',NULL),(13,1,0,1,0,1,7,'2015-04-04 19:53:40','ben',NULL),(14,2,1250,1,1,2,7,'2015-04-04 19:53:40','ben',NULL),(15,1,10800,1,0,1,8,'2015-04-04 19:53:40','ben',NULL),(16,2,10800,1,1,2,8,'2015-04-04 19:53:40','ben',NULL),(19,1,0,1,0,1,10,'2015-04-04 19:53:40','ben',NULL),(20,2,1350,1,1,2,10,'2015-04-04 19:53:40','ben',NULL),(23,1,0,1,0,1,12,'2015-04-04 19:53:40','ben',NULL),(24,2,1350,1,1,2,12,'2015-04-04 19:53:40','ben',NULL),(25,1,0,1,0,1,13,'2015-04-04 19:53:40','ben',NULL),(26,2,0,1,1,2,13,'2015-04-04 19:53:40','ben',NULL),(27,1,0,1,0,1,14,'2015-04-04 19:53:40','ben',NULL),(28,2,1620,1,1,2,14,'2015-07-06 13:17:13','ben','http://www.jaccs.co.jp/service/card_lineup/teikei/kampo.html'),(29,1,0,1,0,1,15,'2015-04-04 19:53:40','ben',NULL),(31,1,0,1,0,1,16,'2015-04-04 19:53:40','ben',NULL),(33,1,0,1,0,1,17,'2015-04-04 19:53:40','ben',NULL),(35,1,0,1,0,1,18,'2015-04-04 19:53:40','ben',NULL),(37,1,0,1,0,1,19,'2015-07-12 13:21:45','ben','http://www.smbc-card.com/nyukai/card/index.jsp'),(38,2,5400,1,1,2,19,'2015-07-12 13:12:44','ben','http://www.smbc-card.com/nyukai/card/index.jsp'),(39,1,0,1,0,1,20,'2015-04-04 19:53:40','ben',NULL),(40,2,0,1,1,2,20,'2015-04-04 19:53:40','ben',NULL),(41,1,0,1,0,1,21,'2015-04-04 19:53:40','ben',NULL),(42,2,0,1,1,2,21,'2015-04-04 19:53:40','ben',NULL),(43,1,0,1,0,1,22,'2015-04-04 19:53:40','ben',NULL),(44,2,0,1,1,2,22,'2015-04-04 19:53:40','ben',NULL),(45,1,0,1,0,1,23,'2015-04-04 19:53:40','ben',NULL),(46,2,1350,1,1,2,23,'2015-04-04 19:53:40','ben',NULL),(47,1,0,1,0,1,24,'2015-04-04 19:53:40','ben',NULL),(48,2,1350,1,1,2,24,'2015-04-04 19:53:40','ben',NULL),(50,2,10800,1,2,NULL,18,'2015-07-03 14:35:22','',NULL),(51,1,0,1,1,2,15,'2015-07-12 12:15:32','',NULL),(52,2,1350,1,1,2,16,'2015-07-03 14:56:26','',NULL),(53,1,1350,1,1,2,17,'2015-07-03 15:01:06','',NULL),(54,1,10800,1,0,1,31,'2015-07-07 13:36:19','','https://www.jalcard.co.jp/cgi-bin/cardlist/af.cgi?f=summer15&root=BXA8SUMMER15'),(55,2,10800,1,1,2,31,'2015-07-07 13:52:10','','https://www.jal.co.jp/jalcard/card/jcb.html'),(56,1,17280,1,0,1,29,'2015-07-08 13:23:43','','https://www.jal.co.jp/jalcard/card/jcb.html'),(57,2,17280,1,1,2,29,'2015-07-08 13:24:03','','https://www.jal.co.jp/jalcard/card/jcb.html'),(58,1,2160,1,0,1,30,'2015-07-09 12:16:09','',NULL),(59,2,2160,1,1,2,30,'2015-07-09 12:27:33','',NULL),(60,1,3240,1,0,1,28,'2015-07-12 12:19:32','','https://club.seibugroup.jp/card/'),(61,2,3240,1,1,2,28,'2015-07-12 12:19:48','','https://club.seibugroup.jp/card/');
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees_history`
--

DROP TABLE IF EXISTS `fees_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fees_history` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees_history`
--

LOCK TABLES `fees_history` WRITE;
/*!40000 ALTER TABLE `fees_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `fees_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance`
--

DROP TABLE IF EXISTS `insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance` (
  `insurance_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_id` int(11) NOT NULL,
  `insurance_type_id` int(11) NOT NULL,
  `max_insured_amount` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`insurance_id`),
  KEY `insurance_credit_card` (`credit_card_id`),
  KEY `insurance_insurance_type` (`insurance_type_id`),
  CONSTRAINT `insurance_credit_card` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
  CONSTRAINT `insurance_insurance_type` FOREIGN KEY (`insurance_type_id`) REFERENCES `insurance_type` (`insurance_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance`
--

LOCK TABLES `insurance` WRITE;
/*!40000 ALTER TABLE `insurance` DISABLE KEYS */;
INSERT INTO `insurance` VALUES (1,1,8,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(2,2,8,2000000,2000000,'2015-07-04 10:08:30','ben','test'),(3,3,8,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(5,6,8,500000,500000,'2015-04-04 19:54:13','ben',NULL),(6,7,8,500000,500000,'2015-04-04 19:54:13','ben',NULL),(7,8,8,3000000,3000000,'2015-04-04 19:54:13','ben',NULL),(9,10,8,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(10,22,8,500000,500000,'2015-04-04 19:54:13','ben',NULL),(11,23,8,500000,500000,'2015-04-04 19:54:13','ben',NULL),(12,24,8,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(13,25,8,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(14,28,8,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(15,29,8,3000000,3000000,'2015-04-04 19:54:13','ben',NULL),(16,30,8,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(17,31,8,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(18,2,2,10000000,10000000,'2015-04-04 19:54:13','ben',NULL),(19,8,2,50000000,50000000,'2015-04-04 19:54:13','ben',NULL),(20,14,2,10000000,10000000,'2015-04-04 19:54:13','ben',NULL),(21,24,2,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(22,25,2,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(23,27,2,10000000,10000000,'2015-04-04 19:54:13','ben',NULL),(24,28,2,30000000,30000000,'2015-04-04 19:54:13','ben',NULL),(25,31,2,50000000,50000000,'2015-04-04 19:54:13','ben',NULL),(26,8,3,150000,150000,'2015-04-04 19:54:13','ben',NULL),(27,24,3,500000,500000,'2015-04-04 19:54:13','ben',NULL),(28,25,3,500000,500000,'2015-04-04 19:54:13','ben',NULL),(29,1,5,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(30,2,5,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(31,3,5,30000000,30000000,'2015-04-04 19:54:13','ben',NULL),(32,6,5,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(33,7,5,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(34,8,5,50000000,50000000,'2015-04-04 19:54:13','ben',NULL),(36,14,5,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(37,27,5,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(38,28,5,30000000,30000000,'2015-04-04 19:54:13','ben',NULL),(39,29,5,100000000,100000000,'2015-04-04 19:54:13','ben',NULL),(40,30,5,10000000,10000000,'2015-04-04 19:54:13','ben',NULL),(41,31,5,50000000,50000000,'2015-04-04 19:54:13','ben',NULL),(42,6,6,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(43,7,6,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(44,8,6,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(45,6,7,200000,200000,'2015-04-04 19:54:13','ben',NULL),(46,7,7,200000,200000,'2015-04-04 19:54:13','ben',NULL),(47,8,7,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(48,1,9,2000000,2000000,'2015-06-30 13:30:17','Andrew',NULL),(49,15,8,1000000,0,'2015-07-03 14:51:38','',NULL);
/*!40000 ALTER TABLE `insurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_history`
--

DROP TABLE IF EXISTS `insurance_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_history` (
  `insurance_id` int(11) NOT NULL,
  `credit_card_id` int(11) NOT NULL,
  `insurance_type_id` int(11) NOT NULL,
  `max_insured_amount` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`insurance_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_history`
--

LOCK TABLES `insurance_history` WRITE;
/*!40000 ALTER TABLE `insurance_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_type`
--

DROP TABLE IF EXISTS `insurance_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_type` (
  `insurance_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `subtype_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `region` varchar(255) DEFAULT 'Global',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`insurance_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_type`
--

LOCK TABLES `insurance_type` WRITE;
/*!40000 ALTER TABLE `insurance_type` DISABLE KEYS */;
INSERT INTO `insurance_type` VALUES (1,'travel','travel','旅行保険','domestic','2015-07-01 13:46:50','ben'),(2,'travel','death','旅行保険','domestic','2015-07-01 13:47:01','ben'),(3,'travel','hospital','旅行保険','domestic','2015-07-01 13:47:13','ben'),(4,'travel','travel','旅行保険','international','2015-07-01 13:47:21','ben'),(5,'travel','death','旅行保険','international','2015-07-01 13:47:29','ben'),(6,'travel','hospital','旅行保険','international','2015-07-01 13:47:37','ben'),(7,'travel','luggage','旅行保険','international','2015-07-01 13:47:45','ben'),(8,'shopping','shopping','買物保険','domestic','2015-07-01 13:47:59','ben'),(9,'shopping','shopping','買物保険','international','2015-07-01 13:48:25','Andrew');
/*!40000 ALTER TABLE `insurance_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_type_history`
--

DROP TABLE IF EXISTS `insurance_type_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_type_history` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_type_history`
--

LOCK TABLES `insurance_type_history` WRITE;
/*!40000 ALTER TABLE `insurance_type_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_type_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest` (
  `interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `min_interest` double(15,15) DEFAULT NULL,
  `max_interest` double(15,15) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`interest_id`),
  KEY `credit_card_id` (`credit_card_id`),
  KEY `Interest_payment_type` (`payment_type_id`),
  CONSTRAINT `Interest_credit_card` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
  CONSTRAINT `Interest_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`payment_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest`
--

LOCK TABLES `interest` WRITE;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` VALUES (1,1,1,0.149500000000000,0.179500000000000,'2015-04-04 19:54:53','ben',NULL),(2,1,2,0.122500000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(3,1,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(4,2,1,0.150000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(5,2,2,0.079200000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(6,2,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(7,3,1,0.150000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(8,3,2,0.079200000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(9,3,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(16,6,1,0.180000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(17,6,2,0.122500000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(18,6,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(19,7,1,0.180000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(20,7,2,0.122500000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(21,7,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(22,8,1,0.180000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(23,8,2,0.122500000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(24,8,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(28,10,1,0.179500000000000,0.179500000000000,'2015-04-04 19:54:53','ben',NULL),(29,10,2,0.132000000000000,0.132000000000000,'2015-04-04 19:54:53','ben',NULL),(30,10,3,0.132000000000000,0.132000000000000,'2015-04-04 19:54:53','ben',NULL),(34,12,1,0.179500000000000,0.179500000000000,'2015-04-04 19:54:53','ben',NULL),(35,12,2,0.132000000000000,0.132000000000000,'2015-04-04 19:54:53','ben',NULL),(36,12,3,0.132000000000000,0.132000000000000,'2015-04-04 19:54:53','ben',NULL),(37,13,1,0.180000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(38,13,2,0.107600000000000,0.132700000000000,'2015-04-04 19:54:53','ben',NULL),(39,13,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(40,14,1,0.180000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(41,14,2,0.122500000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(42,14,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(43,15,1,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(44,15,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(45,15,3,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(46,16,1,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(47,16,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(48,16,3,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(49,17,1,0.000000000000000,0.000000000000000,'2015-07-11 21:27:10','ben',NULL),(50,17,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(51,17,3,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(52,18,1,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(53,18,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(54,18,3,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(55,19,1,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(56,19,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(57,19,3,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(58,20,1,0.120000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(59,20,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(60,20,3,0.145200000000000,0.145200000000000,'2015-04-04 19:54:53','ben',NULL),(61,21,1,0.120000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(62,21,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(63,21,3,0.145200000000000,0.145200000000000,'2015-04-04 19:54:53','ben',NULL),(64,22,1,0.120000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(65,22,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(66,22,3,0.145200000000000,0.145200000000000,'2015-04-04 19:54:53','ben',NULL),(67,23,1,0.120000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(68,23,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(69,23,3,0.138000000000000,0.138000000000000,'2015-04-04 19:54:53','ben',NULL),(70,24,1,0.150000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(71,24,2,0.120000000000000,0.145000000000000,'2015-04-04 19:54:53','ben',NULL),(72,24,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(73,25,1,0.150000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(74,25,2,0.120000000000000,0.145000000000000,'2015-04-04 19:54:53','ben',NULL),(75,25,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(76,26,1,0.150000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(77,26,2,0.120000000000000,0.145000000000000,'2015-04-04 19:54:53','ben',NULL),(78,26,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(79,27,1,0.180000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(80,27,2,0.122500000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(81,27,3,0.150000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(82,28,1,0.120000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(83,28,2,0.000000000000000,0.000000000000000,'2015-04-04 19:54:53','ben',NULL),(84,28,3,0.145200000000000,0.145200000000000,'2015-04-04 19:54:53','ben',NULL),(85,29,1,0.150000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(86,29,2,0.120000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(87,29,3,0.132000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(88,30,1,0.150000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(89,30,2,0.120000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(90,30,3,0.132000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(91,31,1,0.150000000000000,0.180000000000000,'2015-04-04 19:54:53','ben',NULL),(92,31,2,0.120000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(93,31,3,0.132000000000000,0.150000000000000,'2015-04-04 19:54:53','ben',NULL),(95,33,3,0.150000000000000,0.000000000000000,'2015-07-22 11:25:13','','https://www.eposcard.co.jp/shopping/method/rebo.html');
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest_history`
--

DROP TABLE IF EXISTS `interest_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest_history` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest_history`
--

LOCK TABLES `interest_history` WRITE;
/*!40000 ALTER TABLE `interest_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `interest_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issuer`
--

DROP TABLE IF EXISTS `issuer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issuer` (
  `issuer_id` int(11) NOT NULL AUTO_INCREMENT,
  `issuer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`issuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuer`
--

LOCK TABLES `issuer` WRITE;
/*!40000 ALTER TABLE `issuer` DISABLE KEYS */;
INSERT INTO `issuer` VALUES (1,'株式会社リクルートライフスタイル','2015-04-04 19:55:13','benfries'),(3,'株式会社セブン・カードサービス','2015-04-04 19:55:13','benfries'),(4,'楽天カード株式会社','2015-04-04 19:55:13','benfries'),(5,'三井住友カード株式会社','2015-04-04 19:55:13','benfries'),(6,'ＪＸ日鉱日石エネルギー株式会社','2015-04-04 19:55:13','benfries'),(7,'TSUTAYA','2015-04-04 19:55:13','benfries'),(8,'NIHONDO','2015-04-04 19:55:13','benfries'),(9,'SMBC','2015-04-04 19:55:13','benfries'),(10,'Credit Saison','2015-04-04 19:55:13','benfries'),(11,'三井住友トラスト','2015-04-04 19:55:13','benfries'),(12,'ジャックス','2015-04-04 19:55:13','benfries'),(13,'株式会社ＪＡＬカード','2015-04-04 19:55:13','benfries'),(14,'Yahoo! Japan カード','2015-07-21 11:52:55','AB'),(15,'エポスカード株式会社','2015-07-22 10:52:30','ab'),(16,'test','2015-08-08 04:13:50','');
/*!40000 ALTER TABLE `issuer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issuer_history`
--

DROP TABLE IF EXISTS `issuer_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issuer_history` (
  `issuer_id` int(11) NOT NULL,
  `issuer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`issuer_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuer_history`
--

LOCK TABLES `issuer_history` WRITE;
/*!40000 ALTER TABLE `issuer_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `issuer_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_persona_scene`
--

DROP TABLE IF EXISTS `map_persona_scene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_persona_scene` (
  `persona_id` int(11) NOT NULL,
  `scene_id` int(11) NOT NULL,
  `priority_id` int(11) DEFAULT '100',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`persona_id`,`scene_id`),
  KEY `fk_persona_id` (`persona_id`),
  KEY `fk_scene_id` (`scene_id`),
  CONSTRAINT `fk_persona_id_ind` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`),
  CONSTRAINT `fk_scene_id_ind` FOREIGN KEY (`scene_id`) REFERENCES `scene` (`scene_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_persona_scene`
--

LOCK TABLES `map_persona_scene` WRITE;
/*!40000 ALTER TABLE `map_persona_scene` DISABLE KEYS */;
INSERT INTO `map_persona_scene` VALUES (1,1,100,'2015-08-08 05:51:22','');
/*!40000 ALTER TABLE `map_persona_scene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_scene_store_category`
--

DROP TABLE IF EXISTS `map_scene_store_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_scene_store_category` (
  `scene_id` int(11) NOT NULL,
  `store_category_id` int(11) NOT NULL,
  `priority_id` int(11) DEFAULT '100',
  `update_time` datetime DEFAULT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`scene_id`,`store_category_id`),
  KEY `fk_scene_id_ind` (`scene_id`),
  KEY `fk_store_category_id_ind` (`store_category_id`),
  CONSTRAINT `FK_map_scene_store_scene` FOREIGN KEY (`scene_id`) REFERENCES `scene` (`scene_id`),
  CONSTRAINT `FK_map_scene_store_store` FOREIGN KEY (`store_category_id`) REFERENCES `store_category` (`store_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_scene_store_category`
--

LOCK TABLES `map_scene_store_category` WRITE;
/*!40000 ALTER TABLE `map_scene_store_category` DISABLE KEYS */;
INSERT INTO `map_scene_store_category` VALUES (1,2,100,'2015-08-08 06:13:34',NULL);
/*!40000 ALTER TABLE `map_scene_store_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_type`
--

DROP TABLE IF EXISTS `payment_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_type` (
  `payment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_description` text CHARACTER SET utf8 NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`payment_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_type`
--

LOCK TABLES `payment_type` WRITE;
/*!40000 ALTER TABLE `payment_type` DISABLE KEYS */;
INSERT INTO `payment_type` VALUES (1,'ikkai','一回払い','2015-04-04 19:55:25','ben'),(2,'bunkatsu','分割払い','2015-04-04 19:55:25','ben'),(3,'ribo','リボ払い','2015-04-04 19:55:25','ben');
/*!40000 ALTER TABLE `payment_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_type_history`
--

DROP TABLE IF EXISTS `payment_type_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_type_history` (
  `payment_type_id` int(11) NOT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_description` text CHARACTER SET utf8 NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`payment_type_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_type_history`
--

LOCK TABLES `payment_type_history` WRITE;
/*!40000 ALTER TABLE `payment_type_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_type_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `persona_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'test','','2015-08-08 05:51:09',''),(2,'若い家族','Family with young kids','2015-09-13 01:19:52','ab'),(3,'出張','Business traveller','2015-09-13 01:20:38','ab'),(4,'働く女性','Single working women','2015-09-13 01:29:45','ab');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `point_acquisition`
--

DROP TABLE IF EXISTS `point_acquisition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `point_acquisition` (
  `point_acquisition_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_acquisition_name` varchar(255) NOT NULL,
  `points_per_yen` double(15,15) NOT NULL,
  `point_system_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`point_acquisition_id`),
  KEY `FK_point_acquisition_store` (`store_id`),
  KEY `ps_point_acquisition` (`point_system_id`),
  CONSTRAINT `FK_point_acquisition_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  CONSTRAINT `ps_point_acquisition` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `point_acquisition`
--

LOCK TABLES `point_acquisition` WRITE;
/*!40000 ALTER TABLE `point_acquisition` DISABLE KEYS */;
INSERT INTO `point_acquisition` VALUES (1,'',0.012000000000000,1,18,'2015-06-27 23:42:30','ben',NULL),(2,'',0.012000000000000,1,18,'2015-06-27 23:42:30','ben',NULL),(3,'',0.020000000000000,1,18,'2015-06-27 23:42:31','ben',NULL),(4,'',0.032000000000000,1,29,'2015-06-27 23:42:31','ben',NULL),(5,'',0.032000000000000,1,29,'2015-06-27 23:42:31','ben',NULL),(6,'',0.040000000000000,1,29,'2015-06-27 23:42:32','ben',NULL),(7,'',0.012000000000000,1,59,'2015-06-27 23:42:32','ben',NULL),(8,'',0.020000000000000,1,59,'2015-06-27 23:42:32','ben',NULL),(9,'',0.012000000000000,1,60,'2015-06-27 23:42:33','ben',NULL),(10,'',0.020000000000000,1,60,'2015-06-27 23:42:33','ben',NULL),(11,'',0.012000000000000,1,61,'2015-06-27 23:42:33','ben',NULL),(12,'',0.032000000000000,1,36,'2015-06-27 23:42:33','ben',NULL),(13,'',0.032000000000000,1,36,'2015-06-27 23:42:34','ben',NULL),(14,'',0.040000000000000,1,36,'2015-06-27 23:42:34','ben',NULL),(15,'',0.012000000000000,1,46,'2015-06-27 23:42:34','ben',NULL),(16,'',0.012000000000000,1,46,'2015-06-27 23:42:35','ben',NULL),(17,'',0.020000000000000,1,46,'2015-06-27 23:42:35','ben',NULL),(18,'',0.012000000000000,1,48,'2015-06-27 23:42:35','ben',NULL),(19,'',0.012000000000000,1,48,'2015-06-27 23:42:35','ben',NULL),(20,'',0.020000000000000,1,48,'2015-06-27 23:42:36','ben',NULL),(21,'',0.012000000000000,1,49,'2015-06-27 23:42:36','ben',NULL),(22,'',0.012000000000000,1,51,'2015-06-27 23:42:36','ben',NULL),(23,'',0.012000000000000,1,51,'2015-06-27 23:42:37','ben',NULL),(24,'',0.020000000000000,1,51,'2015-06-27 23:42:37','ben',NULL),(25,'',0.012000000000000,1,52,'2015-06-27 23:42:37','ben',NULL),(26,'',0.012000000000000,1,52,'2015-06-27 23:42:38','ben',NULL),(27,'',0.020000000000000,1,52,'2015-06-27 23:42:38','ben',NULL),(55,'',0.012000000000000,2,51,'2015-07-03 12:55:19','',NULL),(56,'',0.012000000000000,2,52,'2015-07-03 12:55:26','',NULL),(62,'',0.010000000000000,3,33,'2015-07-01 10:12:08','',NULL),(66,'',0.010000000000000,3,2,'2015-07-01 10:08:32','',NULL),(69,'',0.005000000000000,3,51,'2015-06-27 23:42:50','ben',NULL),(70,'',0.005000000000000,3,52,'2015-06-30 14:16:47','',NULL),(71,'',0.010000000000000,4,18,'2015-06-27 23:42:51','ben',NULL),(72,'',0.010000000000000,4,18,'2015-06-27 23:42:51','ben',NULL),(73,'',0.010000000000000,4,18,'2015-06-27 23:42:51','ben',NULL),(74,'',0.005000000000000,4,49,'2015-06-27 23:42:52','ben',NULL),(75,'',0.005000000000000,4,49,'2015-06-27 23:42:52','ben',NULL),(76,'',0.005000000000000,4,49,'2015-06-27 23:42:52','ben',NULL),(77,'',0.020000000000000,4,50,'2015-06-27 23:42:53','ben',NULL),(78,'',0.020000000000000,4,50,'2015-06-27 23:42:53','ben',NULL),(79,'',0.020000000000000,4,50,'2015-06-27 23:42:53','ben',NULL),(80,'',0.010000000000000,4,51,'2015-06-27 23:42:53','ben',NULL),(81,'',0.010000000000000,4,51,'2015-06-27 23:42:54','ben',NULL),(82,'',0.010000000000000,4,51,'2015-06-27 23:42:54','ben',NULL),(83,'',0.010000000000000,4,52,'2015-06-27 23:42:54','ben',NULL),(84,'',0.010000000000000,4,52,'2015-06-27 23:42:55','ben',NULL),(85,'',0.010000000000000,4,52,'2015-06-27 23:42:55','ben',NULL),(86,'',0.010000000000000,5,51,'2015-07-01 10:22:19','',NULL),(87,'',0.010000000000000,5,52,'2015-07-01 10:22:28','',NULL),(93,'',0.006000000000000,7,51,'2015-07-01 12:25:05','',NULL),(111,'',0.003500000000000,8,51,'2015-07-06 13:12:33','AB',NULL),(114,'',0.001000000000000,9,57,'2015-07-08 22:52:41','ben',NULL),(121,'',0.001000000000000,9,51,'2015-07-08 22:52:30','AB',NULL),(122,'',0.001000000000000,9,52,'2015-07-08 22:52:35','AB',NULL),(129,'',0.010000000000000,12,59,'2015-06-27 23:43:08','ben',NULL),(130,'',0.020000000000000,12,23,'2015-06-27 23:43:08','ben',NULL),(131,'',0.010000000000000,12,49,'2015-06-27 23:43:08','ben',NULL),(132,'',0.005000000000000,12,51,'2015-07-06 03:46:18','ben',NULL),(133,'',0.010000000000000,13,10,'2015-06-27 23:43:09','ben',NULL),(134,'',0.005000000000000,13,59,'2015-06-27 23:43:09','ben',NULL),(135,'',0.005000000000000,13,49,'2015-06-27 23:43:10','ben',NULL),(136,'',0.005000000000000,13,51,'2015-06-27 23:43:10','ben',NULL),(139,'',0.005000000000000,14,51,'2015-06-27 23:43:11','ben',NULL),(140,'',0.010000000000000,15,60,'2015-06-27 23:43:11','ben',NULL),(143,'',0.015000000000000,15,62,'2015-06-27 23:43:12','ben',NULL),(148,'',0.005000000000000,15,51,'2015-06-27 23:43:13','ben',NULL),(150,'',0.032000000000000,2,21,'2015-06-30 23:45:13','',NULL),(151,'',0.010000000000000,2,45,'2015-07-02 11:58:10','',NULL),(152,'',0.015000000000000,3,1,'2015-07-01 10:07:45','',NULL),(153,'',0.015000000000000,3,22,'2015-07-01 10:08:15','',NULL),(154,'',0.010000000000000,3,39,'2015-07-01 10:09:01','',NULL),(155,'',0.010000000000000,3,41,'2015-07-01 10:09:25','',NULL),(156,'',0.010000000000000,3,42,'2015-07-01 10:10:18','',NULL),(157,'',0.015000000000000,3,31,'2015-07-01 10:10:37','',NULL),(158,'',0.005000000000000,3,32,'2015-07-01 10:11:09','',NULL),(159,'',0.005000000000000,3,49,'2015-07-01 10:11:47','',NULL),(160,'',0.015000000000000,3,65,'2015-07-01 10:17:14','',NULL),(161,'',0.015000000000000,3,23,'2015-07-01 10:18:01','',NULL),(162,'',0.015000000000000,3,24,'2015-07-01 10:18:32','',NULL),(163,'',0.010000000000000,3,25,'2015-07-01 10:19:13','',NULL),(164,'',0.010000000000000,3,26,'2015-07-01 10:19:35','',NULL),(165,'',0.010000000000000,3,27,'2015-07-01 10:19:54','',NULL),(166,'',0.005000000000000,5,49,'2015-07-01 10:22:51','',NULL),(167,'',0.010000000000000,5,32,'2015-07-01 10:23:11','',NULL),(168,'',0.020000000000000,5,50,'2015-07-01 10:24:24','',NULL),(169,'',0.005000000000000,16,51,'2015-07-01 13:03:23','',NULL),(170,'',0.005000000000000,16,52,'2015-07-01 13:03:38','',NULL),(173,'',0.030000000000000,7,33,'2015-07-14 00:31:03','',NULL),(174,'',0.020000000000000,17,51,'2015-07-03 13:00:00','',NULL),(176,'',0.040000000000000,17,21,'2015-07-05 14:24:50','','http://point.recruit.co.jp/?tab=pointUseServise'),(177,'',0.040000000000000,17,45,'2015-07-03 15:17:26','',NULL),(178,'',0.020000000000000,17,48,'2015-07-03 15:24:53','',NULL),(179,'',0.020000000000000,17,32,'2015-07-03 15:25:26','',NULL),(180,'',0.020000000000000,17,60,'2015-07-03 15:25:37','',NULL),(181,'',0.020000000000000,17,46,'2015-07-03 15:25:49','',NULL),(182,'',0.020000000000000,17,52,'2015-07-03 15:26:26','',NULL),(183,'',0.020000000000000,17,59,'2015-07-03 15:26:37','',NULL),(185,'',0.020000000000000,5,33,'2015-07-03 15:42:38','',NULL),(186,'',0.030000000000000,17,5,'2015-07-05 14:26:57','AB','http://point.recruit.co.jp/?tab=pointUseServise'),(188,'',0.022000000000000,2,5,'2015-07-06 09:39:33','AB','https://point.recruit.co.jp/?tab=pointUseServise'),(189,'',0.006000000000000,21,51,'2015-07-06 22:27:45','AB',NULL),(190,'',0.020000000000000,21,33,'2015-07-14 00:34:21','AB',NULL),(191,'',0.020000000000000,21,58,'2015-07-06 22:29:04','AB',NULL),(192,'',0.006000000000000,21,60,'2015-07-06 22:29:42','AB',NULL),(193,'',0.006000000000000,21,32,'2015-07-06 22:30:02','AB',NULL),(195,'',0.006000000000000,7,60,'2015-07-06 22:36:19','AB','http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_p.html'),(196,'',0.010000000000000,7,32,'2015-07-06 22:39:43','AB','http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_p.html'),(199,'',0.006000000000000,22,46,'2015-07-07 23:46:26','AB','https://www.jal.co.jp/jalcard/card/suica.html'),(200,'',0.006000000000000,22,68,'2015-07-07 23:49:03','AB','https://www.jal.co.jp/jalcard/card/suica.html'),(201,'',0.004000000000000,22,33,'2015-07-14 00:36:33','AB','http://www.jreast.co.jp/card/thankspoint/index.html'),(202,'',0.010000000000000,20,51,'2015-07-08 13:26:32','','https://www.jal.co.jp/jalcard/card/club_a_gold.html'),(203,'',0.010000000000000,20,52,'2015-07-08 13:38:38','','https://www.jal.co.jp/jalcard/card/club_a_gold.html'),(204,'',0.020000000000000,20,33,'2015-07-14 00:36:10','ab','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(205,'',0.020000000000000,20,1,'2015-07-08 13:58:31','ab',NULL),(206,'',0.020000000000000,20,73,'2015-07-08 14:02:41','ab','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(207,'',0.020000000000000,20,71,'2015-07-08 14:02:58','ab','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(208,'',0.020000000000000,20,72,'2015-07-08 14:03:14','ab','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(209,'',0.010000000000000,16,33,'2015-07-14 00:35:04','AB','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(210,'',0.010000000000000,16,71,'2015-07-09 12:28:41','AB','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(211,'',0.010000000000000,16,72,'2015-07-09 12:28:56','AB','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(212,'',0.010000000000000,16,69,'2015-07-09 12:29:21','AB','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(213,'',0.001000000000000,11,51,'2015-07-10 10:42:49','ab','http://www.saisoncard.co.jp/lineup/ca099.html'),(215,'',0.002000000000000,11,52,'2015-07-12 11:41:33','ab','http://kakaku.com/card/item.asp?id=026012&t=point'),(216,'',0.002000000000000,23,51,'2015-07-12 13:15:56','ab','http://www.smbc-card.com/nyukai/card/index.jsp'),(217,'',0.002000000000000,23,52,'2015-07-12 13:16:24','ab','http://www.smbc-card.com/nyukai/card/index.jsp'),(218,'',0.030000000000000,24,6,'2015-07-21 12:10:28','ab','http://card.yahoo.co.jp/service/howto/'),(219,'',0.010000000000000,24,48,'2015-07-21 12:11:22','ab','http://card.yahoo.co.jp/service/howto/public_charges.html'),(220,'',0.015000000000000,24,74,'2015-07-21 12:15:02','ab','http://card.yahoo.co.jp/campaign/'),(221,'',0.015000000000000,24,1,'2015-07-21 12:16:17','ab','http://card.yahoo.co.jp/campaign/'),(222,'',0.015000000000000,24,56,'2015-07-21 12:17:20','','http://card.yahoo.co.jp/campaign/'),(223,'',0.060000000000000,24,75,'2015-07-21 12:18:59','ab','http://card.yahoo.co.jp/campaign/'),(224,'',0.010000000000000,24,51,'2015-07-21 13:12:27','ab','http://card.yahoo.co.jp/campaign/?pid=aff'),(225,'',0.005000000000000,25,51,'2015-07-22 11:15:41','ab','https://www.eposcard.co.jp/eposcard/aflt.html'),(226,'',0.025000000000000,25,25,'2015-07-22 11:15:49','ab','https://www.eposcard.co.jp/epospoint/index.html'),(227,'',0.025000000000000,25,77,'2015-07-22 11:15:57','ab','https://www.eposcard.co.jp/epospoint/index.html'),(228,'',0.030000000000000,25,83,'2015-07-22 11:16:04','ab','https://www.eposcard.co.jp/epospoint/index.html'),(229,'',0.015000000000000,25,82,'2015-07-22 11:16:11','ab','https://www.eposcard.co.jp/epospoint/index.html'),(230,'',0.015000000000000,25,78,'2015-07-22 11:16:19','ab','https://www.eposcard.co.jp/epospoint/index.html'),(231,'',0.025000000000000,25,81,'2015-07-22 11:16:27','ab','https://www.eposcard.co.jp/epospoint/index.html'),(232,'',0.005000000000000,25,48,'2015-07-22 11:16:34','','https://www.eposcard.co.jp/epospoint/index.html'),(233,'',0.010000000000000,25,76,'2015-07-22 11:16:40','ab','https://www.eposcard.co.jp/epospoint/index.html'),(234,'',0.010000000000000,25,50,'2015-07-22 11:18:40','ab','https://tamaru.eposcard.co.jp/'),(235,'',0.015000000000000,25,6,'2015-07-22 11:19:15','ab','https://tamaru.eposcard.co.jp/');
/*!40000 ALTER TABLE `point_acquisition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `point_acquisition_history`
--

DROP TABLE IF EXISTS `point_acquisition_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `point_acquisition_history` (
  `point_acquisition_id` int(11) NOT NULL,
  `point_acquisition_name` varchar(255) NOT NULL,
  `points_per_yen` double(15,15) NOT NULL,
  `point_system_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`point_acquisition_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `point_acquisition_history`
--

LOCK TABLES `point_acquisition_history` WRITE;
/*!40000 ALTER TABLE `point_acquisition_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `point_acquisition_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `point_system`
--

DROP TABLE IF EXISTS `point_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `point_system` (
  `point_system_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_system_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `default_points_per_yen` decimal(8,6) NOT NULL DEFAULT '0.010000',
  `default_yen_per_point` decimal(8,6) NOT NULL DEFAULT '1.000000',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`point_system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `point_system`
--

LOCK TABLES `point_system` WRITE;
/*!40000 ALTER TABLE `point_system` DISABLE KEYS */;
INSERT INTO `point_system` VALUES (1,'NONE',0.010000,0.000000,'2015-06-30 23:01:37','',NULL),(2,'リクルート',0.012000,1.000000,'2015-07-13 13:35:14','',NULL),(3,'T ポイント',0.005000,1.000000,'2015-06-30 23:01:56','',NULL),(4,'セブン＆アイ',0.005000,1.000000,'2015-06-30 23:02:10','',NULL),(5,'楽天',0.010000,1.000000,'2015-07-05 15:08:51','',NULL),(7,'ENEOSカードP',0.006000,1.000000,'2015-07-03 03:39:30','',NULL),(8,'Kampo',0.003500,5.000000,'2015-07-12 10:18:31','ab',NULL),(9,'SMBCワールドプレゼント',0.001000,5.000000,'2015-07-08 22:52:21','',NULL),(10,'YAMADA',0.001000,5.000000,'2015-07-07 09:52:55','AB',NULL),(11,'Saison 永久不減',0.001000,5.000000,'2015-07-10 10:57:50','ab',NULL),(12,'プリンスポイント',0.001000,1.000000,'2015-07-07 03:43:09','AB','https://club.seibugroup.jp/card/'),(13,'m\'z PLUSポイント',0.010000,1.000000,'2015-06-30 23:15:39','',NULL),(14,'JR 九州',0.005000,1.000000,'2015-07-11 21:47:53','ab',NULL),(15,'カラマツトレイン',0.005000,1.000000,'2015-06-30 23:16:30','',NULL),(16,'JAL',0.005000,1.000000,'2015-06-30 23:16:24','',NULL),(17,'リクルートプラス',0.020000,1.000000,'2015-07-05 14:24:16','',NULL),(19,'SMBC デビュープラス',0.010000,1.000000,'2015-07-01 13:14:26','',NULL),(20,'JAL Club-A ゴールドカード',0.010000,1.000000,'2015-07-01 13:16:44','',NULL),(21,'ENEOSカードS',0.006000,1.000000,'2015-07-03 03:40:35','',NULL),(22,'JR 東日本 VIEW',0.006000,1.000000,'2015-07-07 23:43:22','AB','https://www.jal.co.jp/jalcard/card/suica.html'),(23,'SMBC ワールドプレゼントゴールド',0.002000,5.000000,'2015-07-12 13:14:30','ab','http://www.smbc-card.com/nyukai/card/index.jsp'),(24,'Yahoo! Tsutaya',0.010000,1.000000,'2015-07-21 12:14:38','ab','http://card.yahoo.co.jp/service/howto/'),(25,'エポス',0.005000,1.000000,'2015-07-22 11:15:35','ab','https://www.eposcard.co.jp/eposcard/aflt.html');
/*!40000 ALTER TABLE `point_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `point_system_history`
--

DROP TABLE IF EXISTS `point_system_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `point_system_history` (
  `point_system_id` int(11) NOT NULL,
  `point_system_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `default_points_per_yen` decimal(10,0) NOT NULL,
  `default_yen_per_point` decimal(10,0) NOT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`point_system_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `point_system_history`
--

LOCK TABLES `point_system_history` WRITE;
/*!40000 ALTER TABLE `point_system_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `point_system_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `point_use`
--

DROP TABLE IF EXISTS `point_use`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `point_use` (
  `point_use_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_system_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `yen_per_point` decimal(8,6) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`point_use_id`),
  KEY `point_use_point_system` (`point_system_id`),
  KEY `point_use_store` (`store_id`),
  CONSTRAINT `point_use_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`),
  CONSTRAINT `point_use_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `point_use`
--

LOCK TABLES `point_use` WRITE;
/*!40000 ALTER TABLE `point_use` DISABLE KEYS */;
INSERT INTO `point_use` VALUES (1,2,18,1.000000,'2015-06-27 23:48:42','ben',NULL),(2,2,29,1.000000,'2015-06-27 23:48:42','ben',NULL),(3,2,61,1.000000,'2015-06-27 23:48:42','ben',NULL),(4,2,36,1.000000,'2015-06-27 23:48:42','ben',NULL),(5,2,46,1.000000,'2015-06-27 23:48:42','ben',NULL),(6,2,48,1.000000,'2015-06-27 23:48:42','ben',NULL),(7,2,49,1.000000,'2015-06-27 23:48:42','ben',NULL),(8,2,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(9,2,52,1.000000,'2015-06-27 23:48:42','ben',NULL),(10,2,59,1.000000,'2015-06-27 23:48:42','ben',NULL),(11,2,60,1.000000,'2015-06-27 23:48:42','ben',NULL),(12,3,18,1.000000,'2015-06-27 23:48:42','ben',NULL),(13,3,57,1.000000,'2015-06-27 23:48:42','ben',NULL),(14,3,40,1.000000,'2015-06-27 23:48:42','ben',NULL),(15,3,1,1.000000,'2015-06-27 23:48:42','ben',NULL),(16,3,39,1.000000,'2015-06-27 23:48:42','ben',NULL),(17,3,2,1.000000,'2015-06-27 23:48:42','ben',NULL),(18,3,13,1.000000,'2015-06-27 23:48:42','ben',NULL),(19,3,35,1.000000,'2015-06-27 23:48:42','ben',NULL),(20,3,49,1.000000,'2015-06-27 23:48:42','ben',NULL),(21,3,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(22,3,52,1.000000,'2015-06-27 23:48:42','ben',NULL),(23,3,60,1.000000,'2015-06-27 23:48:42','ben',NULL),(24,4,4,1.000000,'2015-06-27 23:48:42','ben',NULL),(25,4,33,1.000000,'2015-06-27 23:48:42','ben',NULL),(26,4,19,1.000000,'2015-06-27 23:48:42','ben',NULL),(27,4,6,1.000000,'2015-06-27 23:48:42','ben',NULL),(28,4,8,1.000000,'2015-06-27 23:48:42','ben',NULL),(29,4,2,1.000000,'2015-06-27 23:48:42','ben',NULL),(30,4,7,1.000000,'2015-06-27 23:48:42','ben',NULL),(31,4,63,1.000000,'2015-06-27 23:48:42','ben',NULL),(32,4,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(33,4,52,1.000000,'2015-06-27 23:48:42','ben',NULL),(34,5,18,1.000000,'2015-06-27 23:48:42','ben',NULL),(35,5,49,1.000000,'2015-06-27 23:48:42','ben',NULL),(36,5,50,1.000000,'2015-06-27 23:48:42','ben',NULL),(37,5,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(38,5,52,1.000000,'2015-06-27 23:48:42','ben',NULL),(41,7,60,1.000000,'2015-06-27 23:48:42','ben',NULL),(42,7,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(43,7,52,1.000000,'2015-06-27 23:48:42','ben',NULL),(44,3,26,1.000000,'2015-06-27 23:48:42','ben',NULL),(45,3,28,1.000000,'2015-06-27 23:48:42','ben',NULL),(46,3,44,1.000000,'2015-06-27 23:48:42','ben',NULL),(47,3,54,1.000000,'2015-06-27 23:48:42','ben',NULL),(48,3,55,1.000000,'2015-06-27 23:48:42','ben',NULL),(49,3,62,1.100000,'2015-06-30 14:16:33','ben',NULL),(50,8,51,5.000000,'2015-07-12 10:25:42','ben',NULL),(51,10,57,1.000000,'2015-06-27 23:48:42','ben',NULL),(52,10,60,1.000000,'2015-06-27 23:48:42','ben',NULL),(53,10,34,1.000000,'2015-06-27 23:48:42','ben',NULL),(54,10,47,1.000000,'2015-06-27 23:48:42','ben',NULL),(55,10,48,1.000000,'2015-06-27 23:48:42','ben',NULL),(56,10,53,1.000000,'2015-06-27 23:48:42','ben',NULL),(57,10,49,1.000000,'2015-06-27 23:48:42','ben',NULL),(58,10,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(59,10,52,1.000000,'2015-06-27 23:48:42','ben',NULL),(67,11,51,5.000000,'2015-07-10 10:38:54','ab',NULL),(68,11,52,5.000000,'2015-07-10 10:39:03','ab',NULL),(69,12,42,1.000000,'2015-06-27 23:48:42','ben',NULL),(70,12,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(71,12,52,1.000000,'2015-06-27 23:48:42','ben',NULL),(73,13,59,1.000000,'2015-06-27 23:48:42','ben',NULL),(74,13,23,1.000000,'2015-06-27 23:48:42','ben',NULL),(75,13,49,1.000000,'2015-06-27 23:48:42','ben',NULL),(76,13,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(77,14,10,1.000000,'2015-06-27 23:48:42','ben',NULL),(78,14,59,1.000000,'2015-06-27 23:48:42','ben',NULL),(79,14,49,1.000000,'2015-06-27 23:48:42','ben',NULL),(80,14,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(89,9,51,5.000000,'2015-07-03 14:17:30','ben',NULL),(90,9,52,5.000000,'2015-07-03 14:17:40','ben',NULL),(91,15,43,1.000000,'2015-06-27 23:48:42','ben',NULL),(92,15,20,1.000000,'2015-06-27 23:48:42','ben',NULL),(93,15,51,1.000000,'2015-06-27 23:48:42','ben',NULL),(94,16,60,1.000000,'2015-06-27 23:48:42','ben',NULL),(95,16,62,1.000000,'2015-06-27 23:48:42','ben',NULL),(96,16,51,1.000000,'2015-06-27 23:48:42','ben',NULL);
/*!40000 ALTER TABLE `point_use` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reward`
--

DROP TABLE IF EXISTS `reward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reward` (
  `reward_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_system_id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `reward_category_id` int(11) DEFAULT NULL,
  `reward_type_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `icon` varchar(255) DEFAULT NULL,
  `yen_per_point` decimal(10,6) NOT NULL,
  `price_per_unit` int(11) DEFAULT NULL,
  `min_points` int(11) DEFAULT NULL,
  `max_points` int(11) DEFAULT NULL,
  `required_points` int(11) DEFAULT NULL,
  `max_period` varchar(255) DEFAULT NULL,
  `point_multiplier` decimal(10,8) NOT NULL DEFAULT '1.00000000',
  `unit_id` int(11) NOT NULL DEFAULT '1',
  `reference` varchar(255) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`reward_id`),
  KEY `FK_reward_point_system` (`point_system_id`),
  KEY `FK_reward_category_id` (`reward_category_id`),
  KEY `FK_reward_type` (`reward_type_id`),
  KEY `FK_unit` (`unit_id`),
  KEY `FK_store_id` (`store_id`),
  CONSTRAINT `FK_reward_category_id` FOREIGN KEY (`reward_category_id`) REFERENCES `reward_category` (`reward_category_id`),
  CONSTRAINT `FK_reward_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`),
  CONSTRAINT `FK_reward_type` FOREIGN KEY (`reward_type_id`) REFERENCES `reward_type` (`reward_type_id`),
  CONSTRAINT `FK_store_id` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  CONSTRAINT `FK_unit` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reward`
--

LOCK TABLES `reward` WRITE;
/*!40000 ALTER TABLE `reward` DISABLE KEYS */;
INSERT INTO `reward` VALUES (1,2,NULL,7,1,'ホットペッパービューティーサロン割引','ホットペッパービューティーサロン割引。※1回あたり3,000円まで','http://www.moneyiq.jp/images/Cash_payment_32.png',1.000000,100,100,9999999,3000,'回',1.00000000,1,NULL,'2015-07-15 13:20:39',''),(2,2,NULL,2,1,'ホットペッパー食事割引券','1ポイント＝１円分',NULL,1.000000,100,100,NULL,0,'',1.00000000,1,NULL,'2015-07-13 23:39:25',''),(3,2,NULL,3,1,'じゃらん宿泊割引','１ポイント＝１円分',NULL,1.000000,100,100,NULL,50000,'',1.00000000,1,'https://point.recruit.co.jp/?tab=pointUseServise','2015-07-13 23:42:13',''),(5,3,NULL,7,1,'ファミリーマートでのお買い物に使う','１ポイント＝１円分',NULL,1.000000,1,1,NULL,1000,'',1.00000000,1,NULL,'2015-07-13 23:40:05',''),(6,3,NULL,7,1,'ENEOSでガソリンを','１ポイント＝１円分',NULL,1.000000,1,1,NULL,3000,'',1.00000000,1,NULL,'2015-07-13 23:40:31',''),(7,3,NULL,6,3,'ANA マイルレージに交換','ANA で東京→大阪 (片道）',NULL,2.031700,6000,6000,NULL,0,'',2.00000000,2,NULL,'2015-07-15 12:54:27',''),(8,4,NULL,7,1,'イトーヨーカドーでの買い物に使う','１ポイント＝１円分',NULL,1.000000,1,1,NULL,1000,'',1.00000000,1,NULL,'2015-07-13 23:40:45',''),(9,4,NULL,7,2,'nanaco電子マネーに交換','1セブン＆アイポイント＝1 nanaco ポイント',NULL,1.000000,100,500,NULL,500,'',1.00000000,1,NULL,'2015-07-13 23:41:02',''),(10,4,NULL,6,3,'ANA 国内航空券','東京⇄沖縄',NULL,2.476700,9000,9000,NULL,25000,'',0.50000000,2,NULL,'2015-07-15 12:53:35',''),(11,5,NULL,7,2,'Edy 電子マネーに交換','1楽天スーパーポイント→Edy で１円分',NULL,1.000000,1,10,NULL,1000,'',1.00000000,1,NULL,'2015-06-05 23:17:26','Ben'),(12,5,NULL,7,1,'楽天市場での買い物に使う','1楽天スーパーポイント→１円分',NULL,1.000000,1,50,NULL,10000,'',1.00000000,1,NULL,'2015-06-29 13:34:24',''),(13,5,NULL,3,1,'楽天トラベルでの旅を予約','１ポイント＝１円分',NULL,1.000000,1,50,NULL,0,'',1.00000000,1,NULL,'2015-07-13 23:42:22',''),(17,7,NULL,7,1,'ENEOSでガソリンを','１ポイント→１円割引',NULL,1.000000,1000,1000,NULL,1000,'',1.00000000,1,NULL,'2015-07-01 12:37:09',''),(18,7,NULL,7,2,'Tポイントへの交換','1ポイント→0.7 Tポイント',NULL,0.700000,1000,1000,NULL,10000,'',1.00000000,1,NULL,'2015-07-01 12:41:54',''),(19,7,NULL,9,3,'Dyson ハンディークリーナー','ポイントでDysonハンディークリーナーもらえる！',NULL,1.000000,NULL,50000,NULL,50000,'',1.00000000,1,NULL,'2015-07-01 12:42:16',''),(23,7,NULL,9,3,'スチームクリーナー','ポイントでスチームクリーナーがもらえる！',NULL,1.000000,NULL,10000,NULL,10000,'',1.00000000,1,NULL,'2015-07-01 12:42:35',''),(24,8,NULL,6,2,'ANA国内航空券','東京⇄福岡　1ポイント→3 ANA マイル',NULL,1.958700,7500,7500,NULL,10000,'',3.00000000,2,NULL,'2015-07-15 12:56:24',''),(27,9,NULL,9,2,'楽天スーパーポイント交換','1ポイント→５楽天スーパーポイント',NULL,5.000000,100,200,NULL,NULL,'',1.00000000,1,NULL,'2015-07-13 23:18:12',''),(29,9,NULL,9,3,'BOSE サウンドドックシリーズIII','ミュージックサウンドシステムをポイントでもらえる',NULL,5.000000,NULL,5000,NULL,NULL,'',1.00000000,1,NULL,'2015-07-06 12:54:39',''),(31,11,NULL,6,2,'ANA 国内航空券','東京⇄大阪 (往復）200永久不減ポイント→625 ANAマイル',NULL,2.031700,12000,12000,NULL,NULL,'',0.32000000,2,NULL,'2015-07-15 13:18:40','AB'),(32,11,NULL,9,2,'Amazon ギフト券','200永久不減ポイント→1000円分 Amazon ギフト券',NULL,5.000000,200,200,NULL,NULL,'',1.00000000,1,NULL,'2015-07-01 12:39:33',''),(33,12,NULL,2,3,'品川プリンスホテルディナー券','品川プリンスホテル　リュクス ダイニング ハプナ ディナー券(2時間飲み放題付き)　1名様',NULL,1.000000,NULL,5000,NULL,NULL,'',1.00000000,1,NULL,'2015-06-05 23:17:26','Ben'),(35,11,NULL,6,2,'JAL 国内航空券','東京⇄大阪（往復）200永久不減ポイント→500 JALマイル',NULL,1.948300,12000,12000,NULL,NULL,'',0.40000000,2,NULL,'2015-07-15 13:15:25','AB'),(36,13,NULL,7,1,'マツダ店でのお支払い時','1マツダm\'zポイント→1円',NULL,1.000000,1,1,300000,NULL,'回',1.00000000,1,NULL,'2015-07-01 12:41:14',''),(37,13,NULL,6,2,'JAL マイルレージに交換','4マツダm\'zポイント→1 JALマイル',NULL,0.250000,NULL,4000,60000,NULL,'年',1.00000000,1,NULL,'2015-06-05 23:17:26','Ben'),(38,14,NULL,7,2,'JR 九州SUGOCA電子マネーに交換','1ポイント→1円分',NULL,1.000000,1,100,NULL,NULL,'',1.00000000,1,NULL,'2015-07-11 21:51:14','ab'),(39,14,NULL,3,2,'JR 九州旅行券に交換','1ポイント＝1円分',NULL,1.000000,NULL,3000,NULL,NULL,'',1.00000000,1,NULL,'2015-07-13 23:42:36',''),(40,14,NULL,7,2,'セゾン永久不減ポイントに交換','4JQポイント→1永久不減ポイント',NULL,0.250000,NULL,2000,NULL,NULL,'',1.00000000,1,NULL,'2015-07-07 03:32:16',''),(41,9,NULL,7,2,'iD 電子マネーに交換','1ポイント→5円分',NULL,5.000000,100,200,NULL,NULL,'',1.00000000,1,NULL,'2015-06-05 23:17:26','Ben'),(42,9,NULL,7,2,'Ponta ポイントに交換','1ポイント→4.5Ponta ポイント',NULL,4.500000,100,200,NULL,NULL,'',1.00000000,1,NULL,'2015-07-01 12:38:21',''),(43,15,NULL,9,2,'カラマツトレインギフト券に交換','1ポイント→1円分',NULL,1.000000,500,500,NULL,NULL,'',1.00000000,1,NULL,'2015-07-01 12:37:28',''),(44,16,NULL,6,3,'東京→大阪片道飛行機券','ローシーズン限定',NULL,2.000000,NULL,7000,NULL,NULL,'',1.00000000,1,NULL,'2015-06-30 14:02:21',''),(45,16,NULL,6,3,'東京→福岡片道飛行機チケット','ローシーズン限定',NULL,2.000000,NULL,8500,NULL,NULL,'',1.00000000,1,NULL,'2015-06-30 14:02:30',''),(46,16,NULL,6,3,'東京→ハワイ片道飛行機チケット','ローシーズン限定',NULL,2.000000,NULL,17500,NULL,NULL,'',1.00000000,1,NULL,'2015-06-30 14:02:47',''),(47,17,NULL,3,1,'じゃらん宿泊割引','１ポイント＝１円分','http://www.moneyiq.jp/images/Hotel_building_32.png',1.000000,1,100,NULL,NULL,NULL,1.00000000,1,'http://recruit-card.jp/point/?campaignCd=crda0001','2015-07-13 23:42:47',''),(48,21,NULL,7,1,'ENEOSでキャッシュバック','１ポイント→１円割引','http://www.moneyiq.jp/images/Cash_payment_32.png',1.000000,1000,1000,NULL,NULL,NULL,1.00000000,1,'http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_s.html','2015-07-13 13:31:27','AB'),(54,22,NULL,7,1,'１ポイント＝1.1円分','.',NULL,1.111111,1,9000,20000,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:41:49',''),(55,22,NULL,9,2,'ルミネ商品券','.１ポイント＝3.2円分',NULL,3.200000,1,1250,NULL,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:43:43',''),(56,20,NULL,6,2,'JAL','東京⇄大阪 (往復)',NULL,3.000000,9500,9500,9500,NULL,NULL,1.00000000,2,NULL,'2015-07-09 13:05:46','ab'),(57,20,NULL,6,2,'JAL','東京⇄沖縄 (往復）',NULL,3.000000,11500,11500,11500,NULL,NULL,1.00000000,2,NULL,'2015-07-08 14:58:34','ab'),(58,20,NULL,6,2,'JAL','東京⇄ソウル (往復）',NULL,3.000000,15000,15000,15000,NULL,NULL,1.00000000,2,NULL,'2015-07-12 00:55:13',''),(59,20,NULL,6,2,'JAL 国際線','日本⇄香港 (往復）',NULL,3.000000,20000,20000,20000,NULL,NULL,1.00000000,2,NULL,'2015-07-08 14:58:51','ab'),(60,9,NULL,6,2,'ANA 国内線','東京⇔大阪 (往復)  1ポイント→3 ANA マイル',NULL,2.031700,12000,12000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-07-15 13:53:35','ab'),(62,9,NULL,6,2,'ANA国際線航空券','日本⇔ソウル (往復) 1ポイント→3 ANAマイル',NULL,3.081300,15000,15000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokusai.html','2015-07-15 13:53:53','ab'),(63,9,NULL,6,2,'ANA国際線航空券','日本⇔香港 (往復) 1ポイント→3 ANAマイル',NULL,2.891000,20000,20000,NULL,NULL,NULL,0.33333300,2,'https://www.ana.co.jp/amc/reference/tukau/kokusai.html','2015-07-15 13:55:45','ab'),(64,9,NULL,6,2,'ANA国内航空券','東京⇄沖縄（往復）1ポイント→3 ANAマイル',NULL,2.415600,18000,18000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-07-15 20:42:41','AB'),(65,8,NULL,7,2,'Jデポに交換 (請求書キャッシュバック）','１ポイント＝５円で換算',NULL,5.000000,300,300,NULL,NULL,NULL,1.00000000,1,NULL,'2015-07-12 10:23:35','ab'),(66,23,NULL,7,2,'楽天ポイントに交換','１ポイント→５楽天スーパーポイント',NULL,5.000000,100,200,NULL,NULL,NULL,1.00000000,1,NULL,'2015-07-12 13:19:16','ab'),(67,23,NULL,6,2,'ANA国際線','東京⇄大阪（往復、ローシーズンン）',NULL,3.000000,10000,10000,NULL,NULL,NULL,1.00000000,2,NULL,'2015-07-12 13:20:36','ab'),(68,17,NULL,7,1,'ホットペッパービューティーサロン割引','１ポイント＝１円分。※1回あたり3,000円まで',NULL,1.000000,100,100,NULL,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:42:04',''),(69,17,NULL,2,1,'ホットペッパー食事割引券','１ポイント＝１円分',NULL,1.000000,100,100,NULL,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:39:41',''),(71,9,NULL,2,2,'スターバックスカード','1ポイント＝スターバックス カード 4円分',NULL,4.000000,100,200,7500,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:46:50','ab'),(72,9,NULL,2,2,'タリーズカード','ワールドプレゼント1ポイント＝タリーズ カード　4円分',NULL,4.000000,100,200,5000,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:15:45','ab'),(73,5,NULL,2,2,'楽天デリバリー','１楽天スーパーポイント＝１円分',NULL,1.000000,100,100,NULL,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:28:32','ab'),(74,11,NULL,9,2,'ユニクロオンラインギフトカード','1,500ポイントで7,000円分',NULL,4.666660,1500,1500,2099,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:33:34','ab'),(75,11,NULL,9,2,'ユニクロオンラインギフトカード','2,100ポイントで10,000円分',NULL,4.761900,2100,2100,NULL,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:35:09','ab'),(76,9,NULL,6,3,'ANA 国内航空券','東京→大阪（片道）1ポイント→3 ANAマイル',NULL,2.031700,6000,6000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-07-15 20:43:21','ab'),(77,9,NULL,6,3,'ANA 国内航空券','東京→福岡 (片道) 1ポイント→3 ANAマイル',NULL,1.958700,7500,7500,9999999,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-07-15 20:56:33','ab'),(78,9,NULL,6,3,'ANA 国内航空券','東京→沖縄 (片道) 1ポイント→3 ANAマイル',NULL,2.476700,9000,9000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-07-15 20:59:22','ab'),(79,24,NULL,7,2,'Suica カードチャージ','1ポイント→１円分',NULL,1.000000,1000,1000,10000,NULL,NULL,1.00000000,1,'http://points.yahoo.co.jp/exchange/','2015-07-21 12:31:43','ab'),(80,24,NULL,7,2,'ジャパネット銀行口座入金','1ポイント→0.85円分',NULL,0.850000,100,1000,NULL,NULL,NULL,1.00000000,1,'http://points.yahoo.co.jp/exchange/','2015-07-21 12:31:35','ab'),(81,24,NULL,3,2,'Yahoo! トラベル宿泊券','1ポイント→１円分',NULL,1.000000,1,1,NULL,NULL,NULL,1.00000000,1,'http://points.yahoo.co.jp/save_use/','2015-07-21 12:35:06','ab'),(82,25,NULL,9,2,'マルイ商品券','1,000ポイント→1,000円分',NULL,1.000000,1000,1000,NULL,NULL,NULL,1.00000000,1,'https://www.eposcard.co.jp/epospoint/guide.html','2015-07-22 11:22:18','ab');
/*!40000 ALTER TABLE `reward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reward_category`
--

DROP TABLE IF EXISTS `reward_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reward_category` (
  `reward_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`reward_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reward_category`
--

LOCK TABLES `reward_category` WRITE;
/*!40000 ALTER TABLE `reward_category` DISABLE KEYS */;
INSERT INTO `reward_category` VALUES (2,'レストラン',NULL,'2015-06-29 13:26:12','Ben'),(3,'ホテル',NULL,'2015-06-29 13:26:01','Andrew'),(6,'マイレージ',NULL,'2015-07-04 23:41:08','AB'),(7,'キャッシュバック',NULL,'2015-07-04 23:41:23','Andrew'),(9,'商品券',NULL,'2015-06-30 23:09:05','Andrew');
/*!40000 ALTER TABLE `reward_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reward_category_history`
--

DROP TABLE IF EXISTS `reward_category_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reward_category_history` (
  `reward_category_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`reward_category_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reward_category_history`
--

LOCK TABLES `reward_category_history` WRITE;
/*!40000 ALTER TABLE `reward_category_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `reward_category_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reward_history`
--

DROP TABLE IF EXISTS `reward_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reward_history` (
  `reward_id` int(11) NOT NULL,
  `point_system_id` int(11) NOT NULL,
  `reward_category_id` int(11) DEFAULT NULL,
  `reward_type_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `icon` varchar(255) DEFAULT NULL,
  `yen_per_point` decimal(10,6) NOT NULL,
  `price_per_unit` int(11) DEFAULT NULL,
  `min_points` int(11) DEFAULT NULL,
  `max_points` int(11) DEFAULT NULL,
  `required_points` int(11) DEFAULT NULL,
  `max_period` varchar(255) DEFAULT NULL,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`reward_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reward_history`
--

LOCK TABLES `reward_history` WRITE;
/*!40000 ALTER TABLE `reward_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `reward_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reward_type`
--

DROP TABLE IF EXISTS `reward_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reward_type` (
  `reward_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `is_finite` tinyint(4) DEFAULT '0',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`reward_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reward_type`
--

LOCK TABLES `reward_type` WRITE;
/*!40000 ALTER TABLE `reward_type` DISABLE KEYS */;
INSERT INTO `reward_type` VALUES (1,'discount',NULL,0,'2015-07-03 15:50:50','Ben'),(2,'exchange',NULL,0,'2015-07-03 15:50:54','Ben'),(3,'free product',NULL,1,'2015-07-03 15:51:01','Ben'),(4,'charity',NULL,0,'2015-07-03 15:51:03','Ben'),(5,'other',NULL,0,'2015-07-03 15:51:06','Ben');
/*!40000 ALTER TABLE `reward_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reward_type_history`
--

DROP TABLE IF EXISTS `reward_type_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reward_type_history` (
  `reward_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`reward_type_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reward_type_history`
--

LOCK TABLES `reward_type_history` WRITE;
/*!40000 ALTER TABLE `reward_type_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `reward_type_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scene`
--

DROP TABLE IF EXISTS `scene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scene` (
  `scene_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `update_time` datetime DEFAULT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`scene_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scene`
--

LOCK TABLES `scene` WRITE;
/*!40000 ALTER TABLE `scene` DISABLE KEYS */;
INSERT INTO `scene` VALUES (1,'test','','2015-08-08 05:51:13',''),(2,'ネット通販','ネット通販','2015-09-12 23:06:42','ab'),(3,'日用品','日用品','2015-09-12 23:07:11','ab'),(4,'外食','外食','2015-09-12 23:07:32','ab1'),(5,'エンタメ','エンタメ','2015-09-12 23:08:02','ab'),(6,'家電・ホームセンター','家電・ホームセンター','2015-09-12 23:08:23','ab'),(7,'毎月の引き落とし','毎月の引き落とし','2015-09-12 23:08:40','ab'),(8,'カーライフ','カーライフ','2015-09-12 23:08:57','ab'),(9,'ショッピング','ショッピング','2015-09-12 23:09:13','ab'),(10,'トラベル・出張','トラベル・出張','2015-09-12 23:09:28','ab');
/*!40000 ALTER TABLE `scene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` text CHARACTER SET utf8 NOT NULL,
  `store_category_id` int(11) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8,
  `is_major` tinyint(4) NOT NULL DEFAULT '0',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`store_id`),
  KEY `FK_store_category` (`store_category_id`),
  CONSTRAINT `FK_store_category` FOREIGN KEY (`store_category_id`) REFERENCES `store_category` (`store_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (1,'ファミリーマート',2,NULL,0,'2015-04-04 19:56:15','ben'),(2,'スリーエフ',2,NULL,0,'2015-04-04 19:56:15','ben'),(3,'イトーヨーカドー',2,NULL,0,'2015-04-04 19:56:15','ben'),(4,'7-11',2,NULL,0,'2015-04-04 19:56:15','ben'),(5,'Oisix',2,NULL,0,'2015-04-04 19:56:15','ben'),(6,'Yahoo!ショッピング',3,NULL,0,'2015-04-04 19:56:15','ben'),(7,'SOGO',3,NULL,0,'2015-04-04 19:56:15','ben'),(8,'Seibu',3,NULL,0,'2015-04-04 19:56:15','ben'),(9,'ファミール',3,NULL,0,'2015-04-04 19:56:15','ben'),(10,'Loft',3,NULL,0,'2015-04-04 19:56:15','ben'),(12,'ヤマダモール',3,NULL,0,'2015-04-04 19:56:15','ben'),(13,'ヤマダ電機',3,NULL,0,'2015-04-04 19:56:15','ben'),(14,'MUJI',3,NULL,0,'2015-04-04 19:56:15','ben'),(15,'Uniqlo',3,NULL,0,'2015-04-04 19:56:15','ben'),(16,'Apple',3,NULL,0,'2015-04-04 19:56:15','ben'),(17,'Tokyu Hands',3,NULL,0,'2015-04-04 19:56:15','ben'),(18,'Joshin',3,NULL,0,'2015-04-04 19:56:15','ben'),(19,'SEIYU',3,NULL,0,'2015-04-04 19:56:15','ben'),(20,'LIVIN',3,NULL,0,'2015-04-04 19:56:15','ben'),(21,'じゃらん',4,NULL,0,'2015-04-04 19:56:15','ben'),(22,'TSUTAYA',4,NULL,0,'2015-04-04 19:56:15','ben'),(23,'阪急第一ホテルグループ',4,NULL,0,'2015-04-04 19:56:15','ben'),(24,'ニッポンレンタカー',4,NULL,0,'2015-04-04 19:56:15','ben'),(25,'シダックス',4,NULL,0,'2015-04-04 19:56:15','ben'),(26,'Knt!',4,NULL,0,'2015-04-04 19:56:15','ben'),(27,'東京無線タクシー',4,NULL,0,'2015-04-04 19:56:15','ben'),(28,'プリンスホテルズ',4,NULL,0,'2015-04-04 19:56:15','ben'),(29,'JR 九州',4,NULL,0,'2015-04-04 19:56:15','ben'),(30,'JTB',4,NULL,0,'2015-04-04 19:56:15','ben'),(31,'オートバックス',5,NULL,0,'2015-04-04 19:56:15','ben'),(32,'ETC',5,NULL,0,'2015-04-04 19:56:15','ben'),(33,'ENEOS/JOMO',5,NULL,0,'2015-04-04 19:56:15','ben'),(34,'コスモ',5,NULL,0,'2015-04-04 19:56:15','ben'),(35,'出光',5,NULL,0,'2015-04-04 19:56:15','ben'),(36,'マツダ',5,NULL,0,'2015-04-04 19:56:15','ben'),(37,'カーコンビニ倶楽部',5,NULL,0,'2015-04-04 19:56:15','ben'),(38,'オリックスレンタカー',5,NULL,0,'2015-04-04 19:56:15','ben'),(39,'ドトール・エクセルシオールカフェ',6,NULL,0,'2015-04-04 19:56:15','ben'),(40,'ガスト',6,NULL,0,'2015-04-04 19:56:15','ben'),(41,'バーミヤン',6,NULL,0,'2015-04-04 19:56:15','ben'),(42,'牛角',6,NULL,0,'2015-04-04 19:56:15','ben'),(43,'Denny\'s',6,NULL,0,'2015-04-04 19:56:15','ben'),(44,'ロッテリア',6,NULL,0,'2015-04-04 19:56:15','ben'),(45,'HOT PEPPER',6,NULL,0,'2015-04-04 19:56:15','AB'),(46,'モバイルSUICA',8,NULL,0,'2015-04-04 19:56:15','ben'),(47,'リボ利用',8,NULL,0,'2015-04-04 19:56:15','ben'),(48,'公共料金',8,NULL,0,'2015-04-04 19:56:15','ben'),(49,'楽天Edy',8,NULL,0,'2015-04-04 19:56:15','ben'),(50,'楽天市場',3,NULL,0,'2015-04-04 19:56:15','AB'),(51,'標準ポイント',8,NULL,0,'2015-04-04 19:56:15','ben'),(52,'海外一般店利用',8,NULL,0,'2015-04-04 19:56:15','ben'),(53,'牛角',8,NULL,0,'2015-04-04 19:56:15','ben'),(54,'阪急第一ホテルグループ',8,NULL,0,'2015-04-04 19:56:15','ben'),(55,'7-Net Shopping',8,NULL,0,'2015-04-04 19:56:15','ben'),(56,'ENEOS',8,NULL,0,'2015-04-04 19:56:15','ben'),(57,'iD2',8,NULL,0,'2015-04-04 19:56:15','ben'),(58,'JOMO',8,NULL,0,'2015-04-04 19:56:15','ben'),(59,'nanaco',8,NULL,0,'2015-04-04 19:56:15','ben'),(60,'QuicPay',8,NULL,0,'2015-04-04 19:56:15','ben'),(61,'SMART ICOCA',8,NULL,0,'2015-04-04 19:56:15','ben'),(62,'Waon',8,NULL,0,'2015-04-04 19:56:15','ben'),(63,'ヤマト',8,NULL,0,'2015-04-04 19:56:15','ben'),(64,'Amazon',3,NULL,0,'2015-04-04 19:56:15','ben'),(65,'東急ホテルズ',4,NULL,0,'0000-00-00 00:00:00','AB'),(66,'永久不減標準ポイント',8,'永久不減プログラム',0,'0000-00-00 00:00:00','AB'),(67,'ヨドバシカメラ',3,NULL,0,'0000-00-00 00:00:00','AB'),(68,'えきねっと',4,NULL,0,'0000-00-00 00:00:00','AB'),(69,'紀伊國屋書店',3,NULL,0,'0000-00-00 00:00:00','AB'),(70,'トヨタレンタカー',4,'エンタメ・旅行',0,'0000-00-00 00:00:00','ab'),(71,'DAIMARU',3,NULL,0,'0000-00-00 00:00:00','AB'),(72,'Matsuzakaya',3,NULL,0,'0000-00-00 00:00:00','AB'),(73,'Royal Host',6,NULL,0,'0000-00-00 00:00:00','ab'),(74,'ソフトバンク',8,NULL,0,'0000-00-00 00:00:00','ab'),(75,'Yahoo! トラベル',4,NULL,0,'0000-00-00 00:00:00','ab'),(76,'マルイ',3,NULL,0,'0000-00-00 00:00:00','ab'),(77,'APA ホテル',4,NULL,0,'0000-00-00 00:00:00','ab'),(78,'H.I.S.',4,NULL,0,'0000-00-00 00:00:00','ab'),(79,'タイムズ',5,NULL,0,'0000-00-00 00:00:00','ab'),(80,'Big Echo',4,NULL,0,'0000-00-00 00:00:00','ab'),(81,'KEYUCA',3,NULL,0,'0000-00-00 00:00:00','ab'),(82,'一休.com',4,NULL,0,'0000-00-00 00:00:00','ab'),(83,'Expedia',4,NULL,0,'0000-00-00 00:00:00','ab');
/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_category`
--

DROP TABLE IF EXISTS `store_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store_category` (
  `store_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`store_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_category`
--

LOCK TABLES `store_category` WRITE;
/*!40000 ALTER TABLE `store_category` DISABLE KEYS */;
INSERT INTO `store_category` VALUES (1,'None','None','2015-08-07 21:12:54','ben'),(2,'スーパー・コンビニ','スーパー・コンビニ','2015-08-07 21:12:54','ben'),(3,'ショッピング','ショッピング','2015-08-07 21:12:54','ben'),(4,'エンタメ・旅行','エンタメ・旅行','2015-08-07 21:12:54','ben'),(5,'カーライフ','カーライフ','2015-08-07 21:12:54','ben'),(6,'レストラン・カフェ','レストラン・カフェ','2015-08-07 21:12:54','ben'),(7,'Point System','Point System','2015-08-07 21:12:54','ben');
/*!40000 ALTER TABLE `store_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_history`
--

DROP TABLE IF EXISTS `store_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store_history` (
  `store_id` int(11) NOT NULL,
  `store_name` text CHARACTER SET utf8 NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`store_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_history`
--

LOCK TABLES `store_history` WRITE;
/*!40000 ALTER TABLE `store_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` VALUES (1,'points','Points','2015-07-22 11:22:18','ben'),(2,'miles','Miles','2015-07-15 20:59:22','ben'),(3,'',NULL,'2015-07-08 13:06:30','');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit_history`
--

DROP TABLE IF EXISTS `unit_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit_history` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `time_beg` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`unit_id`,`time_beg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit_history`
--

LOCK TABLES `unit_history` WRITE;
/*!40000 ALTER TABLE `unit_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_store`
--

DROP TABLE IF EXISTS `vw_store`;
/*!50001 DROP VIEW IF EXISTS `vw_store`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_store` AS SELECT 
 1 AS `store_id`,
 1 AS `store_name`,
 1 AS `category_name`,
 1 AS `description`,
 1 AS `update_time`,
 1 AS `update_user`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'moneyiq_uat'
--

--
-- Final view structure for view `vw_store`
--

/*!50001 DROP VIEW IF EXISTS `vw_store`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`moneyiqadmin`@`153.207.39.161` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_store` AS select `s`.`store_id` AS `store_id`,`s`.`store_name` AS `store_name`,`sc`.`name` AS `category_name`,`s`.`description` AS `description`,`s`.`update_time` AS `update_time`,`s`.`update_user` AS `update_user` from (`store` `s` join `store_category` `sc` on((`s`.`store_category_id` = `sc`.`store_category_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-15 10:04:26
