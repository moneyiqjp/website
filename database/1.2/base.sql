-- MySQL dump 10.13  Distrib 5.6.26, for Win32 (x86)
--
-- Host: moneyiq.jp    Database: moneyiq_uat
-- ------------------------------------------------------
-- Server version	5.5.45-cll-lve

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_company`
--

LOCK TABLES `affiliate_company` WRITE;
/*!40000 ALTER TABLE `affiliate_company` DISABLE KEYS */;
INSERT INTO `affiliate_company` VALUES (1,'A8','','http://www.a8.net/','2015-04-04','2015-04-04 19:50:58','ben'),(2,'JANet','','https://www.j-a-net.jp/','2015-04-04','2015-04-04 19:50:58','ben'),(3,'Value Commerce',NULL,'https://aff.valuecommerce.ne.jp/home','2015-01-01','2015-11-05 09:42:34','ab'),(4,'None','Default',NULL,'2015-11-08','2015-11-08 06:37:32',''),(5,'楽天 Linkshare','Rakuten Linkshare','https://www.linkshare.ne.jp/','2015-11-23','2015-11-24 23:25:41','ab');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign`
--

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
INSERT INTO `campaign` VALUES (1,1,'','',6000,6000,'2015-12-01','2015-12-07','2015-12-01 23:30:45','ben','http://recruit-card.jp/campaign/newadmission/'),(2,2,'','',6000,6000,'2015-12-01','2015-12-07','2015-12-01 23:31:33','ben','http://recruit-card.jp/campaign/newadmission/'),(6,6,'','',5000,5000,'2016-02-11','9999-12-31','2016-02-11 04:33:59','ben','http://card.rakuten.co.jp/rakuten_card/campaign/'),(7,7,'','',5000,5000,'2016-02-11','9999-12-31','2016-02-11 04:34:26','ben',NULL),(8,19,'','',1400,7000,'2015-07-08','9999-12-31','2015-07-08 23:13:32','ben',NULL),(9,20,NULL,NULL,200,1000,'2015-12-08','2015-12-31','2015-12-08 13:38:52','ben','http://saisoncard-promotion.com/%E3%83%A4%E3%83%9E%E3%83%80LABI%E3%82%AB%E3%83%BC%E3%83%89/sc.html'),(10,21,NULL,NULL,2000,NULL,'2015-12-08','2016-01-31','2015-12-08 13:43:15','ben','http://saisoncard-promotion.com/SEIBU_PRINCE_CLUB%E3%82%AB%E3%83%BC%E3%83%89%E3%82%BB%E3%82%BE%E3%83%B3/index.html'),(11,22,NULL,NULL,500,500,'2015-12-08','2016-03-31','2015-12-08 13:48:26','ben','http://saisoncard-promotion.com/MAZDA_mz_PLUS_CARD_SAISON/index.html'),(12,23,NULL,NULL,2000,2000,'2015-12-08','2016-03-31','2015-12-08 13:54:53','ben','http://saisoncard-promotion.com/JQ/index.html'),(13,28,NULL,NULL,NULL,NULL,'2015-01-05','2015-03-15','2015-04-04 19:51:09','ben',NULL),(14,29,NULL,NULL,3000,0,'2015-11-29','2015-12-15','2015-11-29 07:11:58','ben','https://jalcard.jal.co.jp/cgi-bin/cardlist/af.cgi?f=autumn15&root=BXA8SUMMER15'),(15,30,NULL,NULL,500,500,'2015-11-29','2015-12-15','2015-11-29 06:54:23','ben','https://jalcard.jal.co.jp/cgi-bin/cardlist/af.cgi?f=suica10th2&root=BXA8SUMMER15'),(16,31,NULL,NULL,2000,0,'2015-11-29','2015-12-15','2015-11-29 06:53:30','ben','https://jalcard.jal.co.jp/cgi-bin/cardlist/af.cgi?f=suica10th2&root=BXA8SUMMER15'),(19,15,'','',1000,5000,'2015-07-13','9999-12-31','2015-07-13 13:12:09','','https://www.smbc-card.com/nyukai/card/debutplus.jsp'),(20,16,'','',1400,7000,'2015-07-09','9999-12-31','2015-07-09 12:43:57','',NULL),(21,17,'','',1400,7000,'2015-07-11','9999-12-31','2015-07-11 21:11:30','',NULL),(22,18,'','',1400,7000,'2015-07-06','9999-12-31','2015-07-06 12:49:47','',NULL),(23,8,'','',10000,10000,'2016-02-11','9999-12-31','2016-02-11 04:34:48','','http://card.rakuten.co.jp/premium_card/campaign/'),(24,32,'入会ポイントプレゼント',NULL,5000,5000,'2015-07-21','2015-09-30','2015-07-21 12:07:03','','http://card.yahoo.co.jp/campaign/?pid=aff'),(25,33,NULL,NULL,8000,8000,'2015-11-16','2015-12-16','2015-11-16 13:38:06','','https://www.eposcard.co.jp/eposcard/aflt.html'),(26,37,NULL,NULL,7000,NULL,'2015-12-03','9999-12-31','2015-12-03 23:33:46','','https://www.orico.co.jp/cardorder/lp/gw/thepoint/'),(27,38,NULL,NULL,6000,NULL,'2015-12-03','2016-02-29','2015-12-03 14:08:36','','http://www.jfr-card.co.jp/card/gold/'),(28,39,NULL,NULL,500,500,'2015-11-12','2015-11-12','2015-11-12 09:44:50','','http://www.jfr-card.co.jp/cp/2015/09/01/'),(29,40,NULL,NULL,1000,1000,'2015-11-12','2016-01-31','2015-11-12 22:39:16','','http://www.aeon.co.jp/campaign/lp/select_A.html'),(30,41,NULL,NULL,200,NULL,'2015-11-16','9999-12-31','2015-11-16 14:28:52','','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(31,42,NULL,NULL,200,NULL,'2015-11-16','9999-12-31','2015-11-16 14:30:11','','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(32,43,NULL,NULL,400,NULL,'2015-11-16','9999-12-31','2015-11-16 14:45:17','','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(33,45,NULL,NULL,10000,NULL,'2015-12-03','9999-12-31','2015-12-03 23:16:29','','https://www.americanexpress.com/japan/apps/sky_traveler/exp_sky5w_c.cgi?sourcecode=4ISEP01950&sourcecode1=4ISEP01960&CPID=100157840&AFFID=JGOOGLE&VEID=sCXbmPzNn-dc_pcrid_61683631129_plid__kword_%E3%82%B9%E3%82%AB%E3%82%A4%20%E3%83%88%E3%83%A9%E3%83%99%E3%'),(34,46,NULL,NULL,1000,NULL,'2015-11-18','9999-12-31','2015-11-18 13:59:11','','https://www.americanexpress.com/jp/content/ana-classic-card/'),(35,44,NULL,NULL,10000,NULL,'2015-11-21','2015-11-30','2015-11-21 08:17:28','','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(36,48,NULL,NULL,12000,NULL,'2015-12-03','2016-02-18','2015-12-03 23:25:37','','http://www.americanexpress.com/japan/apps/ana_amex/21aij/aurd/ca_01_ff.cgi?sourcecode=5IPAP02730&sourcecode1=5IPAP02740&CPID=100198664&AFFID=ANAHP&date=20160219&PSKU=AURH'),(37,50,NULL,NULL,800,NULL,'2015-11-23','2016-01-31','2015-11-23 05:42:29','','http://www.jreast.co.jp/card/campaign/adm/viewsuica.html?&utm_source=AFF&utm_medium=comparison&utm_campaign=viewsuica&utm_content=PC'),(38,51,NULL,NULL,800,NULL,'2015-11-23','2016-01-31','2015-11-23 06:30:11','','https://www.jreast.co.jp/card/first/bic/'),(39,52,NULL,NULL,800,NULL,'2015-11-23','2016-01-31','2015-11-23 07:13:34','','https://www.jreast.co.jp/card/first/lumine.html'),(40,58,NULL,NULL,7000,NULL,'2015-12-04','2016-03-31','2015-12-04 03:42:23','','https://www.orico.co.jp/cardorder/lp/gw/thepointpremiumgold/'),(41,55,NULL,NULL,5000,5000,'2015-11-29','2015-12-15','2015-11-29 07:09:24','','https://jalcard.jal.co.jp/cgi-bin/cardlist/af.cgi?f=autumn15&root=BXA8SUMMER15'),(42,59,NULL,'16000',16000,NULL,'2016-01-16','2016-03-31','2016-01-16 08:09:24','','http://info.d-card.jp/std/topics/af/gold.html'),(43,60,NULL,NULL,2000,NULL,'2015-11-29','2016-03-31','2015-11-29 23:35:23','','http://info.d-card.jp/std/topics/dcard/cpn-dcard-shinki.html'),(44,14,NULL,NULL,1300,NULL,'2015-12-01','2016-03-31','2015-12-01 23:48:36','','http://www.jaccs.co.jp/service/campaign/autumn2015/'),(45,54,NULL,NULL,6000,NULL,'2015-12-03','2016-03-31','2015-12-03 23:08:58','','http://www.cr.mufg.jp/apply/card/viaso/attention.html'),(46,56,NULL,NULL,0,NULL,'2015-12-04','2016-03-31','2015-12-04 03:34:50','','http://www.cr.mufg.jp/apply/card/dc_jizile/attention.html'),(47,61,NULL,NULL,5000,5000,'2016-02-11','9999-09-09','2016-02-11 04:35:08','','http://card.rakuten.co.jp/rakuten_card/campaign/affiliate/a.html'),(48,62,NULL,NULL,1400,7000,'2016-02-09','2016-03-31','2016-02-09 10:30:37','','http://www.lifecard.co.jp/card/credit/std/');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `item_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `item_description` text CHARACTER SET utf8,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `creditcard_description` (`credit_card_id`),
  CONSTRAINT `creditcard_description` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_description`
--

LOCK TABLES `card_description` WRITE;
/*!40000 ALTER TABLE `card_description` DISABLE KEYS */;
INSERT INTO `card_description` VALUES (1,1,'general description',NULL,'最短3営業日カード発送','2015-04-04 19:51:40','ben'),(2,2,'general description',NULL,'最短3営業日カード発送','2015-04-04 19:51:40','ben'),(3,3,'general description',NULL,'最短3営業日カード発送','2015-04-04 19:51:40','ben'),(4,10,'general description',NULL,'24時間365日のロードサーブス','2015-04-04 19:51:40','ben'),(5,10,'general description',NULL,'メンテンアンス料金割引サービス','2015-04-04 19:51:40','ben'),(8,12,'general description',NULL,'24時間365日のロードサーブス','2015-04-04 19:51:40','ben'),(9,12,'general description',NULL,'メンテンアンス料金割引サービス','2015-04-04 19:51:40','ben'),(10,15,'restriction',NULL,'20代限定','2015-07-13 23:02:19',''),(11,17,'restriction',NULL,'女性限定','2015-07-13 23:03:09',''),(12,25,'restriction',NULL,'女性限定','2015-07-14 03:37:40',''),(13,47,'家族カード',NULL,'家族カード１枚目無料、２枚目以降は12,000円＋税','2015-11-22 01:49:23',''),(14,47,'年会費',NULL,'2016年１月３１日まで申し込むと初年度年会費は無料','2015-11-22 01:52:40',''),(15,45,'pitch',NULL,'飛行機・旅行利用で100円毎最大3マイル貯まる','2015-12-16 23:42:03',''),(16,48,'pitch',NULL,'キャンペーンで最大12,000マイルもらえる(=東京⇄大阪フライト）','2015-12-17 02:58:13',''),(17,14,'pitch',NULL,'2,000円利用=6ポイント=18 ANAマイル','2015-12-17 02:58:45',''),(18,37,'pitch',NULL,'1000ポイント＝600 ANAマイル、移管手数料ゼロ','2015-12-17 02:59:21',''),(19,55,'pitch',NULL,'JALグループ利用で100円＝最大4マイル','2015-12-17 02:59:51',''),(20,29,'pitch',NULL,'JALカードショッピングプレミアム入会でマイル２倍','2015-12-17 03:00:21',''),(21,56,'pitch',NULL,'1,000円利用=3ポイント=7.5 JALマイル','2015-12-17 03:01:06',''),(22,54,'pitch',NULL,'手続き不要オートキャッシュバック','2015-12-17 03:01:27',''),(23,6,'pitch',NULL,'楽天Edy電子マネーを現金のように使う','2015-12-17 03:06:26',''),(24,14,'pitch',NULL,'2,000円利用＝6ポイント=30円キャッシュバック','2015-12-17 03:10:47',''),(25,8,'pitch',NULL,'世界中700以上の空港ラウンジに無料アクセス','2015-12-17 03:11:36',''),(26,58,'pitch',NULL,'最もポイント貯まりやすい年会費１万円以下ゴールドカード','2015-12-17 03:12:17',''),(27,1,'pitch',NULL,'業界トップクラス標準還元率1.2%','2015-12-17 03:13:07',''),(28,2,'pitch',NULL,'業界トップクラス標準還元率1.2%','2015-12-17 03:13:35',''),(29,38,'pitch',NULL,'大丸・松坂屋でポイント5倍','2015-12-17 03:17:16','');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_feature_type`
--

LOCK TABLES `card_feature_type` WRITE;
/*!40000 ALTER TABLE `card_feature_type` DISABLE KEYS */;
INSERT INTO `card_feature_type` VALUES (1,'ゴールドカード',NULL,'prestige','#F5DA81','#101010','2015-07-04 06:13:38','ben'),(2,'ETC',NULL,'ETC','#E2A9F3','#2E2E2E','2015-07-04 06:13:07','ben'),(3,'家族カード',NULL,'utility','#4EA2E8','#FEFEFE','2015-07-04 06:07:02','ben'),(4,'iD',NULL,'e-payment','#C49C36','#271f0a','2015-07-03 13:38:51','ben'),(5,'nanaco',NULL,'e-payment','#F5F5DC','#8A3324','2015-07-02 04:24:35','ben'),(6,'Suica',NULL,'suica','#32CD32','#ffffff','2015-07-03 13:04:30','ben'),(7,'楽天Edy',NULL,'e-payment','#CDFAFF','#330C67','2015-07-04 06:02:07','ben'),(8,'sugoca',NULL,'e-payment','#FFB6C1','#000000','2015-07-02 04:42:58','ben'),(9,'Quicpay',NULL,'e-payment','#FFFFF0','#0000CD','2015-07-02 04:44:10','ben'),(10,'WAON',NULL,'e-payment','#FFFFF0','#EA3F00','2015-07-02 04:45:41','ben'),(11,'Pasmo',NULL,'pasmo','#ACABAB','#A9145F','2015-07-02 04:49:13','ben'),(12,'ICOCA',NULL,'e-payment','#1CA3A3','#FFFFFF','2015-07-02 04:52:08','ben'),(13,'Kitaca',NULL,'e-payment','#ADFF2F','#545252','2015-07-02 04:53:16','ben'),(14,'TOICA',NULL,'e-payment','#0886B1','#FFFFFF','2015-07-02 04:55:53','ben'),(20,'PiTaPa',NULL,'e-payment',NULL,'0','2015-07-03 14:46:30','AB'),(21,'空港ラウンジ','ラウンジアクセス','lounge',NULL,'0','2015-11-07 14:42:08','AB'),(22,'ANA',NULL,'ANA',NULL,'0','2015-11-08 02:12:06','ab'),(23,'JAL',NULL,'JAL',NULL,'0','2015-11-08 02:10:00','ab'),(24,'ロードサービス','Road service','utility',NULL,'0','2015-11-11 13:26:35','ab'),(25,'プラチナカード',NULL,'platinum',NULL,'0','2015-12-19 03:09:36','ab'),(26,'学生OK','student','student',NULL,'0','2016-02-13 01:23:10','ab');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=431 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_features`
--

LOCK TABLES `card_features` WRITE;
/*!40000 ALTER TABLE `card_features` DISABLE KEYS */;
INSERT INTO `card_features` VALUES (47,2,1,'',1000,NULL,'2015-06-28 23:43:29','ben',NULL),(48,2,2,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(49,2,3,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(52,2,6,NULL,540,NULL,'2015-04-04 19:52:28','ben',NULL),(53,2,7,NULL,540,NULL,'2015-04-04 19:52:28','ben',NULL),(54,2,8,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(56,2,10,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(58,2,12,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(59,2,13,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(60,2,14,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(61,2,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(62,2,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(63,2,22,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(64,2,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(66,2,24,'2年目から500円(税別)',0,NULL,'2015-04-04 19:52:28','ben',NULL),(67,2,25,'2年目から500円(税別)',0,NULL,'2015-04-04 19:52:28','ben',NULL),(68,2,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(69,2,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(70,2,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(71,2,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(72,2,31,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(73,3,1,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(74,3,2,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(75,3,3,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(77,3,8,NULL,5400,NULL,'2015-04-04 19:52:28','ben',NULL),(79,3,10,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(81,3,12,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(82,3,13,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(83,3,14,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(84,3,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(85,3,28,NULL,1080,NULL,'2015-04-04 19:52:28','ben',NULL),(86,3,29,NULL,8640,NULL,'2015-07-08 13:25:21','ben',NULL),(87,3,30,NULL,1060,NULL,'2015-07-09 12:15:39','ben',NULL),(91,4,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(92,4,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(93,4,24,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(94,4,25,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(95,4,26,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(97,5,7,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(98,5,13,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(99,5,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(100,5,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(101,5,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(102,5,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(103,5,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(104,6,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(105,6,22,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(106,6,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(107,6,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(108,6,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(109,6,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(110,6,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(111,6,31,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(112,7,6,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(113,7,8,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(115,7,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(116,7,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(117,7,22,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(118,7,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(119,7,24,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(120,7,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(121,7,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(122,7,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(123,7,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(125,8,23,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(126,9,10,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(128,9,12,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(129,9,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(130,10,24,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(131,10,25,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(132,10,26,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(133,10,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(134,10,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(136,11,20,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(137,11,21,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(138,11,28,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(139,11,29,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(140,11,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(142,12,27,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(144,12,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(147,13,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(150,14,30,NULL,0,NULL,'2015-04-04 19:52:28','ben',NULL),(152,1,3,'',0,0,'2015-07-01 13:35:28','ben',NULL),(153,1,29,'',0,0,'2015-07-01 13:36:07','ben',NULL),(154,1,8,'',0,0,'2015-07-01 13:36:23','ben',NULL),(155,1,18,'',0,0,'2015-07-03 14:34:12','ben',NULL),(156,3,18,'',0,0,'2015-07-03 14:39:21','ben',NULL),(157,4,18,'',0,0,'2015-07-03 14:40:52','ben',NULL),(158,2,18,'',0,0,'2015-07-03 14:41:21','ben',NULL),(159,2,15,'',0,0,'2015-07-03 14:47:09','ben',NULL),(160,3,15,'',0,0,'2015-07-03 14:47:17','ben',NULL),(161,20,15,'',0,0,'2015-07-03 14:49:42','AB',NULL),(162,4,15,'',0,0,'2015-07-03 14:49:45','ben',NULL),(163,10,15,'',0,0,'2015-07-03 14:51:48','ben',NULL),(164,10,18,'',0,0,'2015-07-03 14:52:03','ben',NULL),(165,4,16,'',0,0,'2015-07-03 14:52:33','ben',NULL),(166,10,16,'',0,0,'2015-07-03 14:52:35','ben',NULL),(167,3,16,'',0,0,'2015-07-03 14:52:45','ben',NULL),(168,2,16,'',0,0,'2015-07-03 14:52:52','ben',NULL),(170,3,19,'',0,0,'2015-07-03 14:57:26','ben',NULL),(171,2,19,'',0,0,'2015-07-03 14:57:30','ben',NULL),(172,10,19,'',0,0,'2015-07-03 14:57:34','ben',NULL),(173,4,19,'',0,0,'2015-07-03 14:58:09','ben',NULL),(174,3,17,'',0,0,'2015-07-03 14:59:45','ben',NULL),(175,2,17,'',0,0,'2015-07-03 14:59:49','ben',NULL),(176,10,17,'',0,0,'2015-07-03 14:59:50','ben',NULL),(178,4,17,'',0,0,'2015-07-03 15:01:20','ben',NULL),(179,7,7,'',0,0,'2015-07-03 15:09:25','ben',NULL),(180,6,3,'',0,0,'2015-07-03 15:21:12','ben',NULL),(181,5,3,'',0,0,'2015-07-03 15:21:21','ben',NULL),(182,9,3,'',0,0,'2015-07-03 15:22:09','ben',NULL),(183,7,1,'',0,0,'2015-07-03 15:30:28','ben',NULL),(185,12,1,'',0,0,'2015-07-03 15:32:27','ben',NULL),(187,9,2,'',0,0,'2015-07-03 15:33:31','ben',NULL),(189,6,1,'',0,0,'2015-07-03 15:34:26','ben',NULL),(190,3,6,'',0,0,'2015-07-03 15:44:09','ben',NULL),(191,3,7,'',0,0,'2015-07-03 15:44:26','ben',NULL),(193,5,2,NULL,NULL,NULL,'2015-07-05 00:55:07','ben',NULL),(194,5,31,NULL,NULL,NULL,'2015-07-07 23:36:01','ben',NULL),(195,21,29,'ラウンジアクセス',NULL,NULL,'2015-07-08 13:47:26','AB',NULL),(196,1,19,NULL,NULL,NULL,'2015-07-12 13:13:13','ben',NULL),(212,22,13,NULL,NULL,NULL,'2015-11-08 02:00:14','ab',NULL),(213,22,14,NULL,NULL,NULL,'2015-11-08 02:02:53','ab',NULL),(214,22,20,NULL,NULL,NULL,'2015-11-08 02:03:18','ab',NULL),(215,22,21,NULL,NULL,NULL,'2015-11-08 02:03:34','ab',NULL),(216,23,21,NULL,NULL,NULL,'2015-11-08 02:03:37','ab',NULL),(217,22,28,NULL,NULL,NULL,'2015-11-08 02:03:54','ab',NULL),(218,23,28,NULL,NULL,NULL,'2015-11-08 02:03:56','ab',NULL),(219,23,30,NULL,NULL,NULL,'2015-11-08 02:04:19','ab',NULL),(220,23,29,NULL,NULL,NULL,'2015-11-08 02:04:41','ab',NULL),(221,23,31,NULL,NULL,3240,'2015-11-23 06:10:35','ab',NULL),(222,22,15,NULL,NULL,NULL,'2015-11-08 02:05:41','ab',NULL),(223,22,16,NULL,NULL,NULL,'2015-11-08 02:05:50','ab',NULL),(224,22,17,NULL,NULL,NULL,'2015-11-08 02:05:58','ab',NULL),(225,22,24,NULL,NULL,NULL,'2015-11-08 02:06:32','ab',NULL),(226,22,25,NULL,NULL,NULL,'2015-11-08 02:06:45','ab',NULL),(227,22,26,NULL,NULL,NULL,'2015-11-08 02:06:53','ab',NULL),(228,22,18,NULL,NULL,NULL,'2015-11-08 02:07:28','ab',NULL),(229,22,19,NULL,NULL,NULL,'2015-11-08 02:07:35','ab',NULL),(241,3,36,NULL,NULL,NULL,'2015-11-08 07:22:34','ben',NULL),(242,1,31,NULL,NULL,NULL,'2015-11-08 13:23:13','ben',NULL),(243,21,18,'ラウンジアクセス',NULL,NULL,'2015-11-08 14:21:30','AB',NULL),(244,21,19,'ラウンジアクセス',NULL,NULL,'2015-11-08 14:21:50','AB',NULL),(245,1,38,NULL,NULL,NULL,'2015-11-11 13:13:38','ben',NULL),(246,3,38,NULL,0,0,'2015-11-11 13:15:40','ben',NULL),(247,21,38,'ラウンジアクセス',NULL,NULL,'2015-11-11 13:23:40','AB',NULL),(248,24,38,'Road service',NULL,NULL,'2015-11-11 13:27:00','ab',NULL),(249,12,38,NULL,NULL,NULL,'2015-11-11 13:42:25','ben',NULL),(250,6,38,NULL,NULL,NULL,'2015-11-11 13:42:37','ben',NULL),(251,2,38,NULL,NULL,NULL,'2015-11-11 13:44:27','ben',NULL),(252,23,38,NULL,NULL,NULL,'2015-11-11 13:48:45','ab',NULL),(253,2,39,NULL,NULL,NULL,'2015-11-12 09:28:08','ben',NULL),(254,23,39,NULL,NULL,NULL,'2015-11-12 09:35:17','ab',NULL),(255,10,40,NULL,NULL,NULL,'2015-11-12 22:15:21','ben',NULL),(256,4,40,NULL,NULL,NULL,'2015-11-12 22:20:29','ben',NULL),(257,8,40,NULL,NULL,NULL,'2015-11-12 22:23:51','ben',NULL),(258,6,40,NULL,NULL,NULL,'2015-11-12 22:23:54','ben',NULL),(259,13,40,NULL,NULL,NULL,'2015-11-12 22:23:58','ben',NULL),(260,3,40,NULL,NULL,NULL,'2015-11-12 22:24:38','ben',NULL),(261,2,40,NULL,0,0,'2015-11-12 22:25:11','ben',NULL),(262,23,40,NULL,NULL,NULL,'2015-11-12 22:25:38','ab',NULL),(263,4,41,NULL,NULL,NULL,'2015-11-16 13:58:06','ben',NULL),(264,20,41,NULL,NULL,NULL,'2015-11-16 13:58:09','AB',NULL),(265,7,41,NULL,NULL,NULL,'2015-11-16 13:58:12','ben',NULL),(266,3,41,NULL,NULL,1080,'2015-11-16 14:05:41','ben',NULL),(267,22,41,NULL,NULL,NULL,'2015-11-16 14:12:15','ab',NULL),(268,22,42,NULL,NULL,NULL,'2015-11-16 14:12:38','ab',NULL),(269,4,42,NULL,NULL,NULL,'2015-11-16 14:13:36','ben',NULL),(270,20,42,NULL,NULL,NULL,'2015-11-16 14:13:38','AB',NULL),(271,6,42,NULL,NULL,NULL,'2015-11-16 14:13:43','ben',NULL),(272,3,42,NULL,NULL,1080,'2015-11-16 14:14:00','ben',NULL),(273,2,42,NULL,NULL,540,'2015-11-16 14:16:45','ben',NULL),(274,2,41,NULL,NULL,540,'2015-11-16 14:17:14','ben',NULL),(275,4,43,NULL,NULL,NULL,'2015-11-16 14:45:43','ben',NULL),(276,20,43,NULL,NULL,NULL,'2015-11-16 14:45:46','AB',NULL),(277,2,43,NULL,NULL,540,'2015-11-16 14:46:09','ben',NULL),(278,22,43,NULL,NULL,NULL,'2015-11-16 14:45:54','ab',NULL),(279,7,43,NULL,NULL,NULL,'2015-11-16 14:46:00','ben',NULL),(280,1,43,NULL,NULL,NULL,'2015-11-16 14:46:12','ben',NULL),(281,3,43,NULL,NULL,4320,'2015-11-16 14:46:49','ben',NULL),(282,22,44,NULL,NULL,NULL,'2015-11-16 22:51:22','ab',NULL),(283,4,44,NULL,NULL,NULL,'2015-11-16 22:51:23','ben',NULL),(284,20,44,NULL,NULL,NULL,'2015-11-16 22:51:26','AB',NULL),(285,7,44,NULL,NULL,NULL,'2015-11-16 22:51:30','ben',NULL),(286,2,44,NULL,NULL,NULL,'2015-11-16 22:52:01','ben',NULL),(287,21,44,'ラウンジアクセス',NULL,NULL,'2015-11-16 22:52:34','AB',NULL),(289,3,44,NULL,NULL,NULL,'2015-11-16 22:53:08','ben',NULL),(290,3,45,NULL,NULL,5400,'2015-11-18 12:49:11','ben',NULL),(291,22,45,NULL,NULL,5400,'2015-11-18 12:51:58','ab',NULL),(292,2,45,NULL,NULL,540,'2015-11-18 12:52:26','ben',NULL),(293,21,45,'ラウンジアクセス',NULL,NULL,'2015-11-18 13:11:41','AB',NULL),(294,3,46,NULL,NULL,2700,'2015-11-18 13:45:45','ben',NULL),(295,7,46,NULL,NULL,NULL,'2015-11-18 13:47:53','ben',NULL),(296,12,46,NULL,NULL,NULL,'2015-11-18 13:47:57','ben',NULL),(297,6,46,NULL,NULL,NULL,'2015-11-18 13:48:08','ben',NULL),(298,2,46,NULL,NULL,NULL,'2015-11-18 13:48:42','ben',NULL),(299,22,46,NULL,NULL,6480,'2015-11-18 13:55:18','ab',NULL),(300,2,33,NULL,NULL,0,'2015-11-21 06:22:58','ben',NULL),(301,22,33,NULL,NULL,NULL,'2015-11-21 06:23:03','ab',NULL),(302,23,33,NULL,NULL,NULL,'2015-11-21 06:26:05','ab',NULL),(303,22,37,NULL,NULL,NULL,'2015-11-21 06:44:08','ab',NULL),(304,23,37,NULL,NULL,NULL,'2015-11-21 06:45:59','ab',NULL),(305,12,47,NULL,NULL,NULL,'2015-11-22 01:26:19','ben',NULL),(306,7,47,NULL,NULL,NULL,'2015-11-22 01:26:22','ben',NULL),(307,6,47,NULL,NULL,NULL,'2015-11-22 01:26:25','ben',NULL),(308,3,47,NULL,NULL,12960,'2015-11-22 01:28:09','ben',NULL),(309,22,47,NULL,NULL,3240,'2015-11-22 01:37:45','ab',NULL),(310,1,47,NULL,NULL,NULL,'2015-11-22 01:44:56','ben',NULL),(311,22,48,NULL,NULL,6480,'2015-11-22 02:06:00','ab',NULL),(312,3,48,NULL,NULL,16740,'2015-11-22 02:03:56','ben',NULL),(313,21,48,'ラウンジアクセス',NULL,NULL,'2015-11-22 02:08:02','AB',NULL),(314,1,48,NULL,NULL,NULL,'2015-11-22 02:08:04','ben',NULL),(315,7,48,NULL,NULL,NULL,'2015-11-22 02:08:18','ben',NULL),(316,12,48,NULL,NULL,NULL,'2015-11-22 02:08:25','ben',NULL),(317,4,48,NULL,NULL,NULL,'2015-11-22 02:08:26','ben',NULL),(318,2,48,NULL,NULL,NULL,'2015-11-22 02:08:57','ben',NULL),(319,14,50,NULL,NULL,NULL,'2015-11-23 05:20:44','ben',NULL),(320,8,50,NULL,NULL,NULL,'2015-11-23 05:20:45','ben',NULL),(321,20,50,NULL,NULL,NULL,'2015-11-23 05:20:46','AB',NULL),(322,5,50,NULL,NULL,NULL,'2015-11-23 05:20:51','ben',NULL),(323,13,50,NULL,NULL,NULL,'2015-11-23 05:20:54','ben',NULL),(324,12,50,NULL,NULL,NULL,'2015-11-23 05:20:57','ben',NULL),(325,7,50,NULL,NULL,NULL,'2015-11-23 05:20:59','ben',NULL),(327,11,50,NULL,NULL,NULL,'2015-11-23 05:21:07','ben',NULL),(328,6,50,NULL,NULL,NULL,'2015-11-23 05:21:42','ben',NULL),(329,3,50,NULL,NULL,NULL,'2015-11-23 05:21:45','ben',NULL),(330,2,50,NULL,NULL,515,'2015-11-23 05:50:33','ben',NULL),(332,13,31,NULL,NULL,NULL,'2015-11-23 06:00:45','ben',NULL),(333,8,31,NULL,NULL,NULL,'2015-11-23 06:00:56','ben',NULL),(334,14,31,NULL,NULL,NULL,'2015-11-23 06:00:57','ben',NULL),(335,7,31,NULL,NULL,NULL,'2015-11-23 06:00:59','ben',NULL),(336,11,31,NULL,NULL,NULL,'2015-11-23 06:01:04','ben',NULL),(337,12,51,NULL,NULL,NULL,'2015-11-23 06:27:20','ben',NULL),(338,13,51,NULL,NULL,NULL,'2015-11-23 06:27:22','ben',NULL),(339,5,51,NULL,NULL,NULL,'2015-11-23 06:27:24','ben',NULL),(340,8,51,NULL,NULL,NULL,'2015-11-23 06:27:26','ben',NULL),(341,14,51,NULL,NULL,NULL,'2015-11-23 06:27:29','ben',NULL),(342,7,51,NULL,NULL,NULL,'2015-11-23 06:27:31','ben',NULL),(343,2,51,NULL,NULL,515,'2015-11-23 06:28:11','ben',NULL),(344,11,51,NULL,NULL,NULL,'2015-11-23 06:27:36','ben',NULL),(345,6,51,NULL,NULL,NULL,'2015-11-23 06:27:40','ben',NULL),(347,12,52,NULL,NULL,NULL,'2015-11-23 07:10:38','ben',NULL),(348,13,52,NULL,NULL,NULL,'2015-11-23 07:10:40','ben',NULL),(349,5,52,NULL,NULL,NULL,'2015-11-23 07:10:42','ben',NULL),(350,8,52,NULL,NULL,NULL,'2015-11-23 07:10:45','ben',NULL),(351,14,52,NULL,NULL,NULL,'2015-11-23 07:10:46','ben',NULL),(352,7,52,NULL,NULL,NULL,'2015-11-23 07:10:48','ben',NULL),(353,2,52,NULL,NULL,515,'2015-11-23 07:11:14','ben',NULL),(354,11,52,NULL,NULL,NULL,'2015-11-23 07:10:52','ben',NULL),(355,6,52,NULL,NULL,NULL,'2015-11-23 07:10:59','ben',NULL),(357,3,53,NULL,NULL,324,'2015-11-23 10:02:30','ben',NULL),(358,11,53,NULL,NULL,NULL,'2015-11-23 10:02:53','ben',NULL),(359,2,53,NULL,NULL,NULL,'2015-11-23 10:05:53','ben',NULL),(360,23,53,NULL,NULL,NULL,'2015-11-23 10:05:56','ab',NULL),(361,22,53,NULL,NULL,NULL,'2015-11-23 12:49:26','ab',NULL),(362,2,54,NULL,1080,NULL,'2015-11-24 23:33:37','ben',NULL),(363,3,54,NULL,NULL,NULL,'2015-11-24 23:34:09','ben',NULL),(364,23,55,NULL,NULL,NULL,'2015-11-27 13:22:33','ab',NULL),(365,3,55,NULL,NULL,16740,'2015-11-27 13:22:52','ben',NULL),(366,25,55,NULL,NULL,NULL,'2015-11-27 13:23:59','ab',NULL),(368,2,55,NULL,NULL,NULL,'2015-11-27 13:24:13','ben',NULL),(369,21,55,'ラウンジアクセス',NULL,NULL,'2015-11-27 13:24:19','AB',NULL),(370,3,56,NULL,NULL,NULL,'2015-11-27 14:05:46','ben',NULL),(371,2,56,NULL,1080,NULL,'2015-11-27 14:05:57','ben',NULL),(372,23,56,NULL,NULL,NULL,'2015-11-27 14:05:50','ab',NULL),(373,1,57,NULL,NULL,NULL,'2015-11-28 00:31:24','ben',NULL),(374,10,57,NULL,NULL,NULL,'2015-11-28 00:31:28','ben',NULL),(375,23,57,NULL,NULL,NULL,'2015-11-28 00:32:16','ab',NULL),(376,2,57,NULL,NULL,NULL,'2015-11-28 00:32:17','ben',NULL),(377,4,57,NULL,NULL,NULL,'2015-11-28 00:32:32','ben',NULL),(378,21,57,'ラウンジアクセス',NULL,NULL,'2015-11-28 00:33:08','AB',NULL),(379,23,58,NULL,NULL,NULL,'2015-11-28 00:53:33','ab',NULL),(380,2,58,NULL,NULL,NULL,'2015-11-28 00:53:35','ben',NULL),(381,22,58,NULL,NULL,NULL,'2015-11-28 00:53:42','ab',NULL),(382,4,58,NULL,NULL,NULL,'2015-11-28 00:54:10','ben',NULL),(383,9,58,NULL,NULL,NULL,'2015-11-28 00:54:20','ben',NULL),(384,3,58,NULL,NULL,NULL,'2015-11-28 00:54:22','ben',NULL),(385,1,58,NULL,NULL,NULL,'2015-11-28 01:04:57','ben',NULL),(386,4,59,NULL,NULL,NULL,'2015-11-29 09:14:19','ben',NULL),(387,6,59,NULL,NULL,NULL,'2015-11-29 09:14:22','ben',NULL),(388,12,59,NULL,NULL,NULL,'2015-11-29 09:14:26','ben',NULL),(389,7,59,NULL,NULL,NULL,'2015-11-29 09:14:30','ben',NULL),(390,23,59,NULL,NULL,NULL,'2015-11-29 09:14:52','ab',NULL),(391,2,59,NULL,NULL,NULL,'2015-11-29 09:14:55','ben',NULL),(392,1,59,NULL,NULL,NULL,'2015-11-29 09:14:58','ben',NULL),(393,21,59,'ラウンジアクセス',NULL,NULL,'2015-11-29 09:15:01','AB',NULL),(394,3,59,NULL,NULL,NULL,'2015-11-29 09:15:07','ben',NULL),(395,2,60,NULL,NULL,540,'2015-11-29 23:31:20','ben',NULL),(396,23,60,NULL,NULL,NULL,'2015-11-29 23:30:09','ab',NULL),(397,7,60,NULL,NULL,NULL,'2015-11-29 23:30:28','ben',NULL),(398,12,60,NULL,NULL,NULL,'2015-11-29 23:30:30','ben',NULL),(399,5,60,NULL,NULL,NULL,'2015-11-29 23:30:33','ben',NULL),(400,4,60,NULL,NULL,NULL,'2015-11-29 23:30:36','ben',NULL),(401,6,60,NULL,NULL,NULL,'2015-11-29 23:30:51','ben',NULL),(402,3,60,NULL,432,NULL,'2015-11-29 23:33:26','ben',NULL),(403,22,61,NULL,NULL,NULL,'2015-12-04 10:16:46','ab',NULL),(404,3,61,NULL,NULL,NULL,'2015-12-04 10:16:54','ben',NULL),(405,2,61,NULL,NULL,540,'2015-12-04 10:17:03','ben',NULL),(406,7,61,NULL,NULL,NULL,'2015-12-04 10:17:06','ben',NULL),(407,23,22,NULL,NULL,NULL,'2015-12-08 13:45:53','ab',NULL),(408,12,23,NULL,NULL,NULL,'2015-12-08 13:55:33','ben',NULL),(409,9,23,NULL,NULL,NULL,'2015-12-08 13:55:36','ben',NULL),(410,21,8,'ラウンジアクセス',NULL,NULL,'2015-12-13 04:40:29','AB',NULL),(411,25,44,NULL,NULL,NULL,'2015-12-20 05:00:44','ab',NULL),(412,22,6,NULL,NULL,NULL,'2015-12-20 08:55:56','ab',NULL),(413,22,7,NULL,NULL,NULL,'2015-12-20 08:56:19','ab',NULL),(414,22,8,NULL,NULL,NULL,'2015-12-20 08:56:45','ab',NULL),(415,22,62,NULL,NULL,NULL,'2016-02-09 10:20:55','ab',NULL),(416,2,62,NULL,NULL,NULL,'2016-02-09 10:23:20','ben',NULL),(417,6,62,NULL,NULL,NULL,'2016-02-09 10:23:33','ben',NULL),(418,4,62,NULL,NULL,NULL,'2016-02-09 10:23:35','ben',NULL),(419,7,62,NULL,NULL,NULL,'2016-02-09 10:23:38','ben',NULL),(420,26,62,'Student',NULL,NULL,'2016-02-09 10:34:38','ab',NULL),(421,26,15,'Student',NULL,NULL,'2016-02-11 04:16:11','ab',NULL),(422,26,6,'Student',NULL,NULL,'2016-02-11 04:16:41','ab',NULL),(423,26,7,'Student',NULL,NULL,'2016-02-11 04:16:55','ab',NULL),(424,26,61,'Student',NULL,NULL,'2016-02-11 04:17:10','ab',NULL),(425,22,63,NULL,NULL,NULL,'2016-02-11 04:36:58','ab',NULL),(426,2,63,NULL,NULL,NULL,'2016-02-11 04:37:00','ben',NULL),(427,23,63,NULL,NULL,NULL,'2016-02-11 04:37:01','ab',NULL),(428,26,63,'Student',NULL,NULL,'2016-02-11 04:39:05','ab',NULL),(429,3,63,NULL,NULL,NULL,'2016-02-11 04:39:07','ben',NULL),(430,9,63,NULL,NULL,NULL,'2016-02-11 04:50:04','ben',NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_point_system`
--

LOCK TABLES `card_point_system` WRITE;
/*!40000 ALTER TABLE `card_point_system` DISABLE KEYS */;
INSERT INTO `card_point_system` VALUES (1,1,2,100,'2015-06-27 23:42:15','ben'),(2,2,2,100,'2015-06-27 23:42:15','ben'),(6,6,5,100,'2015-06-27 23:42:15','ben'),(7,7,5,100,'2015-06-27 23:42:15','ben'),(8,8,5,100,'2015-06-27 23:42:15','ben'),(10,10,7,100,'2015-06-27 23:42:15','ben'),(13,13,3,100,'2015-06-27 23:42:15','ben'),(14,14,8,100,'2015-06-27 23:42:15','ben'),(15,15,9,100,'2015-06-27 23:42:15','ben'),(16,16,9,100,'2015-06-27 23:42:15','ben'),(17,17,9,100,'2015-06-27 23:42:15','ben'),(20,20,10,100,'2015-06-27 23:42:15','ben'),(21,20,11,101,'2015-06-27 23:42:15','ben'),(23,21,11,101,'2015-06-27 23:42:15','ben'),(24,22,13,100,'2015-06-27 23:42:15','ben'),(25,23,14,100,'2015-06-27 23:42:15','ben'),(26,24,9,100,'2015-06-27 23:42:15','ben'),(27,25,9,100,'2015-06-27 23:42:15','ben'),(28,26,9,100,'2015-06-27 23:42:15','ben'),(29,27,15,100,'2015-06-27 23:42:15','ben'),(31,28,11,101,'2015-06-27 23:42:15','ben'),(33,30,16,100,'2015-06-27 23:42:15','ben'),(37,15,19,100,'2015-07-01 13:14:44',''),(38,29,20,100,'2015-07-01 13:17:02',''),(39,3,17,100,'2015-07-03 12:58:44',''),(41,12,21,100,'2015-07-06 22:27:01',''),(43,18,23,100,'2015-07-12 13:23:36',''),(44,32,24,100,'2015-07-21 12:41:27',''),(45,33,25,100,'2015-07-22 10:57:22',''),(46,19,23,100,'2015-10-18 00:45:22',''),(47,36,26,100,'2015-11-05 10:08:19',''),(48,37,27,100,'2015-11-05 10:47:46',''),(49,38,28,100,'2015-11-11 13:21:13',''),(50,39,29,100,'2015-11-12 09:31:27',''),(51,40,30,100,'2015-11-12 22:38:19',''),(52,41,9,100,'2015-11-16 14:01:38',''),(54,42,9,100,'2015-11-16 14:30:44',''),(55,43,9,100,'2015-11-16 14:47:24',''),(56,45,31,100,'2015-11-18 13:05:20',''),(57,46,32,100,'2015-11-18 13:56:16',''),(59,47,31,100,'2015-11-22 01:37:53',''),(60,48,32,100,'2015-11-22 02:10:33',''),(61,50,33,100,'2015-11-23 05:27:10',''),(63,51,34,100,'2015-11-23 06:44:35',''),(64,51,22,100,'2015-11-23 06:59:36',''),(65,52,22,100,'2015-11-23 07:13:43',''),(66,31,20,100,'2015-11-23 07:54:34',''),(67,53,35,100,'2015-11-23 10:48:21',''),(68,54,36,100,'2015-11-24 23:35:59',''),(69,55,37,100,'2015-11-27 13:34:38',''),(70,56,38,100,'2015-11-27 14:09:39',''),(71,57,30,100,'2015-11-28 00:31:18',''),(72,58,27,100,'2015-11-28 00:55:39',''),(73,59,39,100,'2015-11-29 09:24:50',''),(74,60,39,100,'2015-11-29 23:33:56',''),(75,61,5,100,'2015-12-04 10:16:17',''),(76,62,40,100,'2016-02-09 10:30:05',''),(77,63,41,100,'2016-02-11 04:44:29','');
/*!40000 ALTER TABLE `card_point_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card_restriction`
--

DROP TABLE IF EXISTS `card_restriction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_restriction` (
  `credit_card_id` int(11) NOT NULL,
  `restriction_type_id` int(11) NOT NULL,
  `Comparator` varchar(80) DEFAULT '=',
  `value` varchar(255) NOT NULL,
  `priority_id` int(11) DEFAULT '100',
  `update_time` datetime DEFAULT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`credit_card_id`,`restriction_type_id`),
  KEY `PK_cr_credit_card_id_ind` (`credit_card_id`),
  KEY `PK_cr_feature_type_id_ind` (`restriction_type_id`),
  CONSTRAINT `FK_cr_credit_card_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
  CONSTRAINT `FK_cr_restriction_type_id` FOREIGN KEY (`restriction_type_id`) REFERENCES `restriction_type` (`restriction_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_restriction`
--

LOCK TABLES `card_restriction` WRITE;
/*!40000 ALTER TABLE `card_restriction` DISABLE KEYS */;
INSERT INTO `card_restriction` VALUES (17,3,'=','2',100,'2015-11-02 10:02:49',NULL),(17,4,'=','Female',100,'2015-11-03 09:26:19',NULL),(45,5,'<','80000',100,'2015-11-18 12:54:43',NULL),(63,3,'<','30',1,'2016-02-11 07:05:41',NULL);
/*!40000 ALTER TABLE `card_restriction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (2,'Tokyo','日本','東京','2016-02-09 14:03:54','ab'),(3,'Osaka','日本','大阪','2016-02-09 14:04:43','ab');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
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
  `pointExpiryDisplay` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `issue_period` int(11) DEFAULT NULL,
  `credit_limit_bottom` int(11) DEFAULT NULL,
  `credit_limit_upper` int(11) DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `debit_date` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `cutoff_date` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT '1',
  `reference` varchar(255) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`credit_card_id`),
  KEY `idx_1` (`credit_card_id`),
  KEY `affiliate_company_credit_card` (`affiliate_id`),
  KEY `issuer_credit_card` (`issuer_id`),
  CONSTRAINT `affiliate_company_credit_card` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate_company` (`affiliate_id`),
  CONSTRAINT `issuer_credit_card` FOREIGN KEY (`issuer_id`) REFERENCES `issuer` (`issuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credit_card`
--

LOCK TABLES `credit_card` WRITE;
/*!40000 ALTER TABLE `credit_card` DISABLE KEYS */;
INSERT INTO `credit_card` VALUES (1,'リクルートカードVISA',1,'リクルートカードVISA','http://o-kodukai.com/wp-content/uploads/2015/05/%E3%83%AA%E3%82%AF%E3%83%AB%E3%83%BC%E3%83%88%E3%82%AB%E3%83%BC%E3%83%89.jpg',1,0,0,0,0,'http://recruit-card.jp/basic-card/',4,12,'',0,0,1000000,0,'翌月10日','毎月15日',1,'https://point.recruit.co.jp/doc/info/point_details.html','2016-01-24 23:01:33','ab'),(2,'リクルートカードJCB',1,'リクルートカードJCB','http://www.kanzen-creditcard.com/img/card/recruit/recruit-jcb-320.jpg',0,0,1,0,0,'http://recruit-card.jp/basic-card/',1,12,NULL,0,0,1000000,0,'翌月10日','毎月15日',1,'https://point.recruit.co.jp/doc/info/point_details.html','2015-12-08 13:21:34','ab'),(3,'リクルートカードプラス',1,'リクルートカードプラス','http://cdn-ak.f.st-hatena.com/images/fotolife/a/aiza_man/20140401/20140401080040.jpg',0,0,1,0,0,'http://recruit-card.jp/plus-card/',1,12,NULL,0,0,0,0,'','',0,'https://point.recruit.co.jp/doc/info/point_details.html','2015-12-04 09:14:05','ab'),(6,'楽天カードVISA/MC',4,'楽天カードVISA/MC','http://www.moneyiq.jp/img/rakutensilvercard_960.png',1,1,0,0,0,'http://px.a8.net/svt/ejp?a8mat=2BYC7I+F5D2WI+FOQ+BXYE9',1,12,NULL,0,100000,1000000,953,'毎月月末','翌月27日',1,'http://ichiba.faq.rakuten.co.jp/app/answers/detail/a_id/681','2015-12-06 13:06:23','ab'),(7,'楽天カードJCB',4,'楽天カードJCB','http://cdn-ak.f.st-hatena.com/images/fotolife/a/advantaged/20130812/20130812234625.jpg',0,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2BYC7I+F5D2WI+FOQ+BXYE9',1,12,'',0,100000,1000000,953,'翌月27日','毎月月末',1,'http://ichiba.faq.rakuten.co.jp/app/answers/detail/a_id/681','2016-02-11 04:34:11','ab'),(8,'楽天プレミアムカード',4,'楽天プレミアムカード','http://gold-master.biz/image/rakuten/premium_jcb.jpg',1,1,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HD7MZ+AC3XV6+FOQ+HZAGX',1,12,NULL,0,0,3000000,953,'翌月27日','毎月月末',1,'http://ichiba.faq.rakuten.co.jp/app/answers/detail/a_id/681','2015-12-06 14:17:08','ab'),(10,'ＥＮＥＯＳカードP',6,'ＥＮＥＯＳカードP','http://oil-stat.com/image/cc/eneos_p.gif',1,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HDA0W+EXMG1E+M7Q+6I9N5',1,24,NULL,0,0,0,477,'翌月2日','毎月5日',1,'http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_p.html','2015-12-06 14:19:41','ab'),(12,'ＥＮＥＯＳカードS',6,'ＥＮＥＯＳカードS','http://www8.ts3card.com/affiliated/img/img_eneos_s.jpg',1,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HDA0W+EXMG1E+M7Q+6I9N5',1,24,NULL,0,0,0,477,'翌月2日','毎月5日',1,'http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_p.html','2015-12-06 14:20:54','ab'),(13,'TSUTAYA Tカードプラス',7,'TSUTAYA Tカードプラス','http://cardjiten.jp/cardimg/t-card-plus.jpg',1,0,1,0,0,'http://click.j-a-net.jp/1526049/80178/',2,12,NULL,0,0,0,380,'翌月27日','ショッピング5日、キャッシング月末',1,'http://qa.tsite.jp/faq/show/3499','2015-12-06 14:24:39','ab'),(14,'Kampo Style Club Card',8,'Kampo Style Club Card','http://dime.jp/review/files/2014/10/015KAMPO-STYLE-CLUB-CARD2.jpg',1,0,1,0,0,'http://www.jaccs.co.jp/service/card_lineup/teikei/kampo.html',4,24,NULL,0,100000,500000,0,'翌月27日','毎月月末',1,'http://www.jaccs.co.jp/service/card_lineup/teikei/kampo.html','2015-12-06 14:28:59','ab'),(15,'SMBC デビュープラス',9,'SMBC デビュープラス','http://www.smbc-card.com/nyukai/card/responsive/img/cardlist/001_DB_CD_F_rs.jpg',1,0,0,0,0,'http://click.j-a-net.jp/1526049/87675/',2,24,NULL,0,100000,800000,3000,'翌月26日','毎月月末',1,'https://www.smbc-card.com/mem/wp/about_wp.jsp','2015-12-06 14:31:28','ab'),(16,'SMBCクラシックカード',9,'SMBCクラシックカード','http://img1.kakaku.k-img.com/images/credit-card/card/l/008001.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/87471/',2,24,NULL,0,100000,800000,3000,'①翌月10日　②翌月26日','①毎月15日　②毎月月末',1,'https://www.smbc-card.com/mem/wp/about_wp.jsp','2015-12-06 14:34:37','ab'),(17,'SMBCアミティエカード',9,'SMBCアミティエカード','https://www.smbc-card.com/nyukai/card/responsive/img/cardlist/004_0_v_ic_smcc_amitie_rs.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/87615/',2,24,NULL,0,100000,800000,3000,'①翌月10日　②翌月26日','①毎月15日　②毎月月末',1,'https://www.smbc-card.com/mem/wp/about_wp.jsp0','2015-12-08 13:29:32','ben'),(18,'SMBCゴールドカード',9,'SMBCゴールドカード','https://www.smbc-card.com/mem/nyukai/pop/imgs/card_smbc_card_prime01.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/87617/',2,36,NULL,0,700000,2000000,3000,'①翌月10日　②翌月26日','①毎月15日　②毎月月末',1,'https://www.smbc-card.com/mem/wp/about_wp.jsp','2015-12-08 13:31:11','ab'),(19,'SMBCプライムゴールドカード(２０代限定）',9,'SMBCプライムゴールドカード(２０代限定）','http://www.smbc-card.com/nyukai/card/responsive/img/cardlist/014_V_Gold_front_rs.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/87619/',2,36,NULL,0,500000,2000000,3000,'①翌月10日　②翌月26日','①毎月15日　②毎月月末',1,'https://www.smbc-card.com/mem/wp/about_wp.jsp','2015-12-08 13:33:23','ab'),(20,'YAMADA LABI ANA マイレージクラブカード',10,'YAMADA LABI ANA マイレージクラブカード','http://www.i-creditcard.net/hikaku/img/yamada-ana-mile.jpg',0,0,0,1,0,'http://www.saisoncard.co.jp/lineup/ca145.html',4,0,NULL,0,0,0,0,'翌々月4日','毎月月末',1,'http://www.saisoncard.co.jp/lineup/ca145.html','2015-12-08 13:36:03','ab'),(21,'SEIBU PRINCE CLUB カード ',10,'SEIBU PRINCE CLUB カード ','http://クレ活.com/wp-content/uploads/seibu_princeclubcard_saison.png?783bda',1,1,1,0,0,'http://www.saisoncard.co.jp/lineup/ca099-2.html',4,60,NULL,0,0,0,0,'翌々月4日','毎月月末',1,'0','2015-12-08 13:41:20','ben'),(22,'マツダm\'z PLUSカード',10,'マツダm\'z PLUSカード','http://card1192ya.com//img/6563.jpg',0,1,1,0,0,'https://www.saisoncard.co.jp/lineup/ca088.html',4,0,NULL,0,0,0,0,'翌々月4日','毎月月末',1,'0','2015-12-08 13:45:16','ab'),(23,'JQ CARD セゾン',10,'JQ CARD セゾン','http://creditranking.jp/wp-content/uploads/2015/08/jqcardsaison.jpg',1,1,1,1,0,'http://www.saisoncard.co.jp/lineup/ca147.html',4,24,NULL,0,0,0,0,'翌々月4日','毎月月末',1,'http://www.jrkyushu.co.jp/jq/pc/point.html','2015-12-08 13:53:47','ab'),(24,'三井住友トラストカード',11,'三井住友トラストカード','http://www.smtcard.jp/card/img/card03_l.jpg',1,1,0,0,0,'http://click.j-a-net.jp/1526049/542113/',2,24,NULL,0,0,0,3300,'','',1,'http://www.smtb.jp/personal/members/visa/','2015-12-08 14:00:15','ab'),(25,'三井住友トラストレディーズカード',11,'三井住友トラストレディーズカード','http://card-db.com/images/smtcard-lady.jpg',1,0,0,0,0,'http://click.j-a-net.jp/1526049/542116/',2,24,NULL,0,0,0,3300,'','',1,'http://www.smtb.jp/personal/members/visa/','2015-12-08 14:01:30','ab'),(26,'三井住友トラストロードサービスカード',11,'三井住友トラストロードサービスカード','http://nullbio.com/dimg/VJA%2077CARD%20%E3%83%AD%E3%83%BC%E3%83%89%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9VISA%E3%82%AB%E3%83%BC%E3%83%89.jpg',1,0,0,0,0,'http://click.j-a-net.jp/1526049/542117/',2,0,NULL,0,0,0,3300,'','',1,'0','2015-12-08 14:02:13','ben'),(27,'カラマツトレインカード',12,'カラマツトレインカード','http://www.bossanovapgh.com/wp-content/uploads/2015/02/4e31004ffbc59c619b3ad4b10155c17e-300x190.png',0,1,0,0,0,'http://click.j-a-net.jp/1526049/543785/',2,0,NULL,0,0,0,0,'','',0,'0','2015-12-08 14:04:23','ben'),(28,'SEIBU PRINCE CLUB カード (AMEX)',10,'SEIBU PRINCE CLUB カード (AMEX)','http://crecaguide.com/images/2r-11.gif',0,0,0,1,0,'https://club.seibugroup.jp/card/',4,0,NULL,0,0,0,0,'','',1,'0','2015-12-08 14:06:17','ben'),(29,'JAL Club-A ゴールドカード',13,'JAL Club-A ゴールドカード','http://クレ活.com/wp-content/uploads/jal_clubacard_master.png?783bda',0,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HDA0W+DLZRN6+28T6+66H9E',1,36,NULL,0,500000,1000000,3000,'翌月10日','毎月15日',1,'','2015-12-08 14:10:06','ab'),(30,'JAL 普通カード',13,'JAL 普通カード','http://moneyiq.jp/images/jal-card-suica-proper.png',0,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HDA0W+DLZRN6+28T6+644DU',1,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'0','2015-07-13 14:03:49','AB'),(31,'JAL Club-A カード Suica',20,'JAL Club-A カード Suica','http://img1.kakaku.k-img.com/images/credit-card/card/l/027007.jpg',0,0,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HDA0W+DLZRN6+28T6+63H8I',1,24,NULL,0,0,0,0,'','',1,'https://www.jal.co.jp/jalcard/card/suica.html','2015-11-23 05:58:32','AB'),(32,'Yahoo! Japan カード',14,'','http://dime.jp/review/files/2015/04/051Yahoo-JAPAN2.jpg',1,1,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2HQH7E+6WV7N6+38JK+BXYEA',1,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','2015-07-21 13:00:17','ab'),(33,'エポスカード',15,'','http://prtimes.jp/i/3860/227/resize/d3860-227-309314-2.jpg',1,0,0,0,0,'http://px.a8.net/svt/ejp?a8mat=2HQH7F+27S3UA+38L8+626XU',1,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'https://www.eposcard.co.jp/point/use.html','2015-07-22 10:52:49','ab'),(36,'REX CARD (レックスカード)',12,'','http://img1.kakaku.k-img.com/images/credit-card/card/l/035005.jpg',1,0,0,0,0,'http://www.jaccs.co.jp/service/card_lineup/teikei/kakaku.html',1,0,NULL,0,600000,2000000,0,'翌月27日払い','毎月末日',1,'','2015-11-05 09:39:00','ab'),(37,'Orico Card THE POINT',16,'','http://www.moneyiq.jp/img/orico_card.png',1,1,0,0,0,'https://www.orico.co.jp/creditcard/thepoint/',4,0,NULL,0,100000,3000000,0,'毎月27日','毎月末日',1,'','2015-11-28 00:52:14','ab'),(38,'大丸松坂屋ゴールドカード',17,'大丸松坂屋ゴールドカード','http://www.jfr-card.co.jp/card/gold/_img/card_visa_gold_img.png',1,1,0,0,0,'http://ck.jp.ap.valuecommerce.com/servlet/referral?sid=3200549&pid=883819219',3,0,'',0,0,0,1543,'翌月10日','毎月15日',1,'http://www.jfr-card.co.jp/nyukai/','2016-02-11 05:02:30','ab'),(39,'大丸松坂屋カード',17,'大丸松坂屋カード','http://www.bossanovapgh.com/wp-content/uploads/2015/03/ea22473d2e95c0538615a33926839be1.jpg',1,1,0,0,0,'http://ck.jp.ap.valuecommerce.com/servlet/referral?sid=3200549&pid=883819219',3,0,'',0,0,0,1543,'翌月10日','毎月15日',1,'http://www.jfr-card.co.jp/card/standard/','2016-02-11 05:03:25','ab'),(40,'イオンカード',18,'イオンカード','http://www.aeon.co.jp/common/images/card/card-056.png',1,1,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2C2WC4+8C2HO2+2M7E+6DZBM',1,0,'',0,100000,500000,1000,'翌月2日','毎月10日',1,'http://www.aeon.co.jp/campaign/lp/select_A.html','2016-01-17 06:44:30','ab'),(41,'ANA VISA カード',5,'ANA VISA カード','http://img1.kakaku.k-img.com/images/credit-card/card/l/036010.jpg',1,0,0,0,0,'https://click.j-a-net.jp/1526049/469689/',2,24,NULL,0,200000,800000,4000,'翌月10日','毎月15日',1,'http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029','2015-11-16 14:25:15','ab'),(42,'ANA VISA Suica カード',5,'ANA VISA Suica カード','http://hereishappiness.com/wp-content/uploads/2015/03/4cf17419e527764fce5b5eea21a4047d.jpg',1,0,0,0,0,'https://click.j-a-net.jp/1526049/543449/',2,24,NULL,0,200000,800000,4000,'翌月10日','毎月15日',1,'http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029','2015-11-16 14:12:30','ab'),(43,'ANA ワイドゴールドカード',5,'ANA ワイドゴールドカード','http://www.smbc-card.com/common/include/camp/rwd/ana/img/img_card_gold.png',1,1,0,0,0,'https://click.j-a-net.jp/1526049/469689/',2,24,NULL,0,700000,2000000,4000,'翌月10日','毎月15日',1,'http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029','2015-11-16 14:43:45','ab'),(44,'ANA VISA プラチナプレミアムカード',5,'ANA VISA プラチナプレミアムカード','http://www.smbc-card.com/common/include/camp/rwd/ana/img/img_card_plat.png',1,0,0,0,0,'https://click.j-a-net.jp/1526049/469689/',2,24,NULL,0,3000000,0,4000,'翌月10日','毎月15日',0,'http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029','2015-11-23 22:33:55','ab'),(45,'AMEX スカイ・トラベラー・カード',19,'AMEX スカイ・トラベラー・カード','http://img.manesto.com/upload/posts/images/Jedi__.jpg',0,0,0,1,0,'https://www.americanexpress.com/jp/content/sky-traveler-card/',1,0,NULL,0,0,0,0,'利用者により異なる','利用者により異なる',1,'https://www.americanexpress.com/jp/content/sky-traveler-card/','2015-11-23 22:24:57','ab'),(46,'ANA アメリカンエクスプレスカード',19,'ANA アメリカンエクスプレスカード','http://www.i-creditcard.net/hikaku/img/ana-amex-300.jpg',0,0,0,1,0,'https://www.americanexpress.com/jp/content/ana-classic-card/',4,36,NULL,0,0,0,0,'利用者により異なる','利用者により異なる',0,'https://www.americanexpress.com/jp/content/ana-classic-card/','2015-11-23 22:25:12','ab'),(47,'AMEXゴールドカード',19,'AMEXゴールドカード','http://img1.kakaku.k-img.com/images/credit-card/card/l/012002.jpg',0,0,0,1,0,'https://www.americanexpress.com/jp/content/gold-card/',4,36,NULL,0,0,0,0,'毎月10日・21日・26日のいずれか','利用者により、異なる',0,'https://www.americanexpress.com/jp/content/gold-card/','2015-11-23 22:25:27','ab'),(48,'ANAアメリカンエクスプレスゴールド',19,'ANAアメリカンエクスプレスゴールド','http://img1.kakaku.k-img.com/images/credit-card/card/l/012005.jpg',0,0,0,1,0,'http://www.americanexpress.com/japan/apps/ana_amex/21aij/aurd/ca_01_ff.cgi?sourcecode=5IPAP02730&sourcecode1=5IPAP02740&CPID=100198664&AFFID=ANAHP&date=20160219&PSKU=AURH',4,24,NULL,0,700000,2000000,0,'利用者により異なる','利用者により異なる',1,'http://www.americanexpress.com/japan/apps/ana_amex/21aij/aurp/ca_01_ff.cgi?sourcecode=5IPAP02730&sourcecode1=5IPAP02740&CPID=100198664&AFFID=ANAHP&date=20160219','2015-11-24 12:52:36','ab'),(50,'「ビュー・スイカ」カード',20,'「ビュー・スイカ」カード','http://hikaku-master.com/image/view/viewsuica_l.jpg',1,1,1,0,0,'https://www.jreast.co.jp/card/first/viewsuica.html',4,24,NULL,0,150000,400000,0,'翌々月4日','毎月末日',1,'https://www.jreast.co.jp/card/first/viewsuica.html','2015-11-23 22:35:16','ab'),(51,'ビックカメラSuicaカード',20,'ビックカメラSuicaカード','http://ayu5.com/bigsuica.jpg',1,0,1,0,0,'https://www.jreast.co.jp/card/first/bic/',4,24,NULL,0,150000,400000,0,'翌々月4日','毎月末日',0,'https://www.jreast.co.jp/card/first/bic/','2015-11-23 22:33:26','ab'),(52,'ルミネカード',20,'ルミネカード','http://etcカード申し込み.net/wp-content/uploads/2014/10/lumine_card.jpg',1,1,1,0,0,'https://www.jreast.co.jp/card/first/lumine.html',4,24,NULL,0,150000,400000,0,'翌々月4日','月末日',1,'https://www.jreast.co.jp/card/first/lumine.html','2015-11-23 22:34:19','ab'),(53,'TOKYU CARD ClubQ JMB PASMO',13,'TOKYU CARD ClubQ JMB PASMO','http://img1.kakaku.k-img.com/images/credit-card/card/l/003007.jpg',1,1,0,0,0,'http://px.a8.net/svt/ejp?a8mat=2HDA0W+DLZRN6+28T6+66H9E',1,36,NULL,0,0,0,3000,'翌月10日','毎月15日',1,'http://www.topcard.co.jp/camp/card_entry.html?mb','2015-11-23 10:01:11','ab'),(54,'NICOS VIASO (ビアソ)',21,'NICOS VIASO (ビアソ)','http://card-lab.com/images/nicos_viaso.gif',1,1,0,0,0,'http://www.cr.mufg.jp/apply/card/viaso/',4,12,NULL,0,100000,1000000,0,'当月27日','毎月5日',1,'http://www.cr.mufg.jp/apply/card/viaso/','2015-11-24 23:32:41','ab'),(55,'JAL アメリカン・エクスプレス・カードプラチナ',21,'JAL アメリカン・エクスプレス・カードプラチナ','http://takahitokikuchi.poitan.net/wp-content/uploads/2012/12/Image2.jpg',0,0,0,1,0,'https://www.jal.co.jp/jalcard/card/amex.html',4,36,NULL,0,500000,5000000,0,'翌月１０日','当月１５日',1,'https://www.jal.co.jp/jalcard/card/amex.html','2015-11-27 13:48:10','ab'),(56,'DC カード Jizile (ジザイル）',21,'DC カード Jizile (ジザイル）','http://ecx.images-amazon.com/images/I/51XRFEYraQL.jpg',1,1,0,0,0,'http://www.cr.mufg.jp/apply/card/dc_jizile/',4,36,NULL,0,100000,1000000,0,'翌月１０日','毎月１５日',1,'http://www.cr.mufg.jp/apply/card/dc_jizile/','2015-11-27 14:04:40','ab'),(57,'イオンゴールドカード',18,'イオンゴールドカード','http://www.aeon.co.jp/common/images/card/card-064.png',1,1,1,0,0,'http://www.aeon.co.jp/creditcard/merit/goldcard.html',4,24,NULL,0,0,0,0,'翌月２日','毎月１０日',1,'http://www.aeon.co.jp/creditcard/merit/goldcard.html','2015-11-28 00:30:45','ab'),(58,'Orico Card THE POINT PREMIUM GOLD',16,'Orico Card THE POINT PREMIUM GOLD','https://www.orico.co.jp/shared/images/card-thepointpremiumgold_l.png',0,1,0,0,0,'https://www.orico.co.jp/creditcard/thepointpremiumgold/',4,12,NULL,0,100000,3000000,0,'毎月27日','当月末日',1,'https://www.orico.co.jp/creditcard/thepointpremiumgold/','2015-11-28 00:51:47','ab'),(59,'dカード GOLD',22,'dカード GOLD','http://d-card.jp/st/images/pict_dgold_card.png',1,1,0,0,0,'http://info.d-card.jp/std/topics/af/gold.html',4,24,NULL,0,0,0,0,'翌月１０日','毎月１５日',1,'http://info.d-card.jp/std/topics/af/gold.html','2015-11-29 09:13:42','ab'),(60,'dカード',22,'dカード','http://www.bossanovapgh.com/wp-content/uploads/2015/11/pict_dcard_card.png',1,1,0,0,0,'http://d-card.jp/st/abouts/index.html',4,24,NULL,0,0,0,0,'翌月10日','毎月15日',1,'http://d-card.jp/st/abouts/index.html','2015-11-29 23:29:38','ab'),(61,'楽天PINKカード',4,'楽天PINKカード','http://cdn-ak.f.st-hatena.com/images/fotolife/l/luretaky/20151018/20151018153550.jpg',1,1,1,0,0,'http://px.a8.net/svt/ejp?a8mat=2BYC7I+F5D2WI+FOQ+C3BAP',1,12,NULL,0,100000,1000000,990,'翌月27日','毎月月末',1,'http://card.rakuten.co.jp/rakuten_card/campaign/affiliate/a.html','2015-12-04 10:15:52','ab'),(62,'ライフカード',23,'ライフカード','http://www.creditcard-file.net/card-img/lifecard/blue.gif',1,1,1,0,0,'http://www.lifecard.co.jp/card/credit/std/',4,60,'',0,0,0,0,'当月２７日または翌月３日（利用金融機関により異なる）','毎月５日（キャッシング毎月月末）',1,'http://www.lifecard.co.jp/card/credit/std/','2016-02-09 21:46:36','ab'),(63,'JCB CARD EXTAGE (18歳〜29歳限定)',24,'JCB CARD EXTAGE (18歳〜29歳限定)','http://hikaku-master.com/image/jcb/extage_l.jpg',0,0,1,0,0,'https://www.jcb.co.jp/ordercard/kojin_card/ippanextage.html',4,24,'',0,200000,1000000,0,'毎月15日','翌月10日',1,'https://www.jcb.co.jp/ordercard/kojin_card/ippanextage.html','2016-02-11 07:06:48','ab');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
INSERT INTO `discounts` VALUES (2,0.050000000000000,NULL,NULL,NULL,10,38,1.000000000000000000000000000000,'','2015-04-04 19:53:26','ben',NULL),(3,0.100000000000000,NULL,NULL,NULL,10,39,1.000000000000000000000000000000,'','2015-04-04 19:53:26','ben',NULL),(5,0.020000000000000,'2015-07-06','9999-09-09',NULL,12,33,1.000000000000000000000000000000,'ずっと1ℓ2円OFF','2015-07-06 22:23:46','ben',NULL),(6,0.050000000000000,NULL,NULL,NULL,20,19,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(7,0.050000000000000,NULL,NULL,NULL,20,20,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(8,0.050000000000000,NULL,NULL,NULL,21,19,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(9,0.050000000000000,NULL,NULL,NULL,21,20,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(10,0.050000000000000,NULL,NULL,NULL,22,19,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(11,0.050000000000000,NULL,NULL,NULL,22,20,0.066666666666666700000000000000,'毎月5日、20日のみ','2015-04-04 19:53:26','ben',NULL),(12,0.050000000000000,'2015-11-23','2015-11-23',NULL,52,118,0.000000000000000000000000000000,NULL,'2015-11-23 07:12:29','','https://www.jreast.co.jp/card/first/lumine.html'),(13,0.030000000000000,'2015-11-29','2015-11-29',NULL,59,102,0.000000000000000000000000000000,NULL,'2015-11-29 09:17:33','','http://kakaku.com/card/item.asp?id=059002&t=detail#tab');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
INSERT INTO `fees` VALUES (1,1,0,1,0,1,1,'2015-04-04 19:53:40','ben',NULL),(2,2,0,1,1,2,1,'2015-04-04 19:53:40','ben',NULL),(3,1,0,1,0,1,2,'2015-07-12 11:31:55','ben',NULL),(4,2,0,1,1,2,2,'2015-04-04 19:53:40','ben',NULL),(5,1,2160,1,0,1,3,'2015-07-03 15:55:36','ben',NULL),(6,2,2160,1,1,2,3,'2015-07-03 15:55:46','ben',NULL),(11,1,0,1,0,1,6,'2015-04-04 19:53:40','ben',NULL),(12,2,0,1,1,2,6,'2015-12-02 21:09:34','ben',NULL),(13,1,0,1,0,1,7,'2015-04-04 19:53:40','ben',NULL),(14,2,0,1,1,2,7,'2015-12-02 21:10:02','ben',NULL),(15,1,10800,1,0,1,8,'2015-04-04 19:53:40','ben',NULL),(16,2,10800,1,1,2,8,'2015-04-04 19:53:40','ben',NULL),(19,1,0,1,0,1,10,'2015-04-04 19:53:40','ben',NULL),(20,2,1350,1,1,2,10,'2015-04-04 19:53:40','ben',NULL),(23,1,0,1,0,1,12,'2015-04-04 19:53:40','ben',NULL),(24,2,1350,1,1,2,12,'2015-04-04 19:53:40','ben',NULL),(25,1,0,1,0,1,13,'2015-04-04 19:53:40','ben',NULL),(26,2,0,1,1,2,13,'2015-04-04 19:53:40','ben',NULL),(27,1,0,1,0,1,14,'2015-04-04 19:53:40','ben',NULL),(28,2,1620,1,1,2,14,'2015-07-06 13:17:13','ben','http://www.jaccs.co.jp/service/card_lineup/teikei/kampo.html'),(29,1,0,1,0,1,15,'2015-04-04 19:53:40','ben',NULL),(31,1,0,1,0,1,16,'2015-04-04 19:53:40','ben',NULL),(33,1,0,1,0,1,17,'2015-04-04 19:53:40','ben',NULL),(35,1,0,1,0,1,18,'2015-04-04 19:53:40','ben',NULL),(37,1,0,1,0,1,19,'2015-07-12 13:21:45','ben','http://www.smbc-card.com/nyukai/card/index.jsp'),(38,2,5400,1,1,2,19,'2015-07-12 13:12:44','ben','http://www.smbc-card.com/nyukai/card/index.jsp'),(39,1,0,1,0,1,20,'2015-04-04 19:53:40','ben',NULL),(40,2,0,1,1,2,20,'2015-04-04 19:53:40','ben',NULL),(41,1,0,1,0,1,21,'2015-04-04 19:53:40','ben',NULL),(42,2,0,1,1,2,21,'2015-04-04 19:53:40','ben',NULL),(43,1,0,1,0,1,22,'2015-04-04 19:53:40','ben',NULL),(44,2,0,1,1,2,22,'2015-04-04 19:53:40','ben',NULL),(45,1,0,1,0,1,23,'2015-04-04 19:53:40','ben',NULL),(46,2,1350,1,1,2,23,'2015-04-04 19:53:40','ben',NULL),(47,1,0,1,0,1,24,'2015-04-04 19:53:40','ben',NULL),(48,2,1350,1,1,2,24,'2015-04-04 19:53:40','ben',NULL),(50,2,10800,1,2,NULL,18,'2015-07-03 14:35:22','',NULL),(51,1,0,1,1,2,15,'2015-07-12 12:15:32','',NULL),(52,2,1350,1,1,2,16,'2015-07-03 14:56:26','',NULL),(53,2,1350,1,1,2,17,'2015-11-21 07:01:40','',NULL),(54,1,10800,1,0,1,31,'2015-07-07 13:36:19','','https://www.jalcard.co.jp/cgi-bin/cardlist/af.cgi?f=summer15&root=BXA8SUMMER15'),(55,2,10800,1,1,2,31,'2015-07-07 13:52:10','','https://www.jal.co.jp/jalcard/card/jcb.html'),(56,1,17280,1,0,1,29,'2015-07-08 13:23:43','','https://www.jal.co.jp/jalcard/card/jcb.html'),(57,2,17280,1,1,2,29,'2015-07-08 13:24:03','','https://www.jal.co.jp/jalcard/card/jcb.html'),(58,1,2160,1,0,1,30,'2015-07-09 12:16:09','',NULL),(59,2,2160,1,1,2,30,'2015-07-09 12:27:33','',NULL),(60,1,3240,1,0,1,28,'2015-07-12 12:19:32','','https://club.seibugroup.jp/card/'),(61,2,3240,1,1,2,28,'2015-07-12 12:19:48','','https://club.seibugroup.jp/card/'),(62,2,2700,NULL,NULL,NULL,36,'2015-11-05 09:49:30','','http://www.jaccs.co.jp/service/card_lineup/teikei/kakaku.html'),(63,1,7560,1,0,1,38,'2015-11-12 09:50:38','','http://www.jfr-card.co.jp/card/gold/'),(64,1,0,NULL,NULL,NULL,39,'2015-11-12 09:19:25','','http://www.jfr-card.co.jp/card/standard/'),(65,2,1080,NULL,NULL,NULL,39,'2015-11-12 09:19:39','','http://www.jfr-card.co.jp/card/standard/'),(66,1,0,1,0,1,40,'2015-11-12 22:23:43','',NULL),(70,1,15120,1,0,1,43,'2015-11-16 14:51:12','','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(72,2,15120,1,1,2,43,'2015-11-16 22:32:54','',NULL),(73,2,2160,1,NULL,NULL,41,'2015-11-16 22:39:35','',NULL),(74,2,2160,1,NULL,NULL,42,'2015-11-16 22:43:05','','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(75,1,10800,1,NULL,NULL,45,'2015-11-18 12:50:45','','https://www.americanexpress.com/jp/content/sky-traveler-card/'),(76,2,10800,1,NULL,NULL,45,'2015-11-18 13:34:14','',NULL),(77,1,7560,1,NULL,NULL,46,'2015-11-18 13:46:22','','http://kakaku.com/card/item.asp?id=012004'),(78,2,7560,1,NULL,NULL,46,'2015-11-18 13:47:24','','http://kakaku.com/card/item.asp?id=012004'),(79,1,86400,1,NULL,NULL,44,'2015-11-21 08:26:37','',NULL),(80,2,86400,NULL,NULL,NULL,44,'2015-11-21 08:26:47','',NULL),(81,1,31320,1,NULL,NULL,47,'2015-11-22 01:27:36','','https://www.americanexpress.com/jp/content/gold-card/'),(82,2,31320,1,NULL,NULL,47,'2015-11-22 01:27:50','','https://www.americanexpress.com/jp/content/gold-card/'),(83,1,33480,1,NULL,NULL,48,'2015-11-22 02:04:50','','https://www.americanexpress.com/jp/content/ana-gold-card/'),(84,2,33480,1,NULL,NULL,48,'2015-11-22 02:05:06','','https://www.americanexpress.com/jp/content/ana-gold-card/'),(85,1,515,1,NULL,NULL,50,'2015-11-23 05:23:23','','https://www.jreast.co.jp/card/first/viewsuica.html'),(86,2,515,1,NULL,NULL,50,'2015-11-23 05:23:36','','https://www.jreast.co.jp/card/first/viewsuica.html'),(87,1,0,1,NULL,NULL,51,'2015-11-23 06:28:58','','https://www.jreast.co.jp/card/first/bic/'),(88,2,515,1,NULL,NULL,51,'2015-11-23 06:29:13','','https://www.jreast.co.jp/card/first/bic/'),(89,1,0,1,NULL,NULL,52,'2015-11-23 07:11:33','','https://www.jreast.co.jp/card/first/lumine.html'),(90,2,1029,1,NULL,NULL,52,'2015-11-23 07:15:04','','https://www.jreast.co.jp/card/first/lumine.html'),(91,1,0,1,NULL,NULL,53,'2015-11-23 10:05:06','','http://kakaku.com/card/item.asp?id=003007'),(92,2,1080,1,NULL,NULL,53,'2015-11-23 10:05:19','','http://kakaku.com/card/item.asp?id=003007'),(93,1,33480,1,NULL,NULL,55,'2015-11-27 13:23:08','','https://www.jal.co.jp/jalcard/card/amex.html'),(94,2,33480,1,NULL,NULL,55,'2015-11-27 13:23:19','','https://www.jal.co.jp/jalcard/card/amex.html'),(95,2,7560,1,NULL,NULL,38,'2015-11-27 23:29:00','','http://www.jfr-card.co.jp/card/gold/'),(96,1,1950,1,NULL,NULL,58,'2015-11-28 00:53:14','','https://www.orico.co.jp/creditcard/thepointpremiumgold/'),(97,2,1950,1,NULL,NULL,58,'2015-11-28 00:53:29','','https://www.orico.co.jp/creditcard/thepointpremiumgold/'),(98,1,10800,1,NULL,NULL,59,'2015-11-29 09:21:14','','http://kakaku.com/card/item.asp?id=059002&t=detail#tab'),(99,2,10800,1,NULL,NULL,59,'2015-11-29 09:21:32','','http://kakaku.com/card/item.asp?id=059002&t=detail#tab'),(100,1,0,1,NULL,NULL,60,'2015-11-29 23:32:34','','http://d-card.jp/st/abouts/index.html'),(101,2,1350,1,NULL,NULL,60,'2015-11-29 23:32:53','','http://d-card.jp/st/abouts/index.html');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `guaranteed_period` int(11) DEFAULT NULL,
  `max_insured_amount` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`insurance_id`),
  KEY `insurance_credit_card` (`credit_card_id`),
  KEY `insurance_insurance_type` (`insurance_type_id`),
  CONSTRAINT `insurance_credit_card` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
  CONSTRAINT `insurance_insurance_type` FOREIGN KEY (`insurance_type_id`) REFERENCES `insurance_type` (`insurance_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance`
--

LOCK TABLES `insurance` WRITE;
/*!40000 ALTER TABLE `insurance` DISABLE KEYS */;
INSERT INTO `insurance` VALUES (1,1,8,NULL,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(2,2,8,NULL,2000000,2000000,'2015-07-04 10:08:30','ben','test'),(3,3,8,NULL,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(5,6,8,NULL,500000,500000,'2015-04-04 19:54:13','ben',NULL),(6,7,8,NULL,500000,500000,'2015-04-04 19:54:13','ben',NULL),(7,8,8,NULL,3000000,3000000,'2015-04-04 19:54:13','ben',NULL),(9,10,8,NULL,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(10,22,8,NULL,500000,500000,'2015-04-04 19:54:13','ben',NULL),(11,23,8,NULL,500000,500000,'2015-04-04 19:54:13','ben',NULL),(12,24,8,NULL,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(13,25,8,NULL,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(14,28,8,NULL,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(15,29,8,NULL,3000000,3000000,'2015-04-04 19:54:13','ben',NULL),(16,30,8,NULL,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(17,31,8,NULL,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(18,2,2,NULL,10000000,10000000,'2015-04-04 19:54:13','ben',NULL),(19,8,2,NULL,50000000,50000000,'2015-04-04 19:54:13','ben',NULL),(20,14,2,NULL,10000000,10000000,'2015-04-04 19:54:13','ben',NULL),(21,24,2,NULL,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(22,25,2,NULL,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(23,27,2,NULL,10000000,10000000,'2015-04-04 19:54:13','ben',NULL),(24,28,2,NULL,30000000,30000000,'2015-04-04 19:54:13','ben',NULL),(25,31,2,NULL,50000000,50000000,'2015-04-04 19:54:13','ben',NULL),(26,8,3,NULL,150000,150000,'2015-04-04 19:54:13','ben',NULL),(27,24,3,NULL,500000,500000,'2015-04-04 19:54:13','ben',NULL),(28,25,3,NULL,500000,500000,'2015-04-04 19:54:13','ben',NULL),(29,1,5,NULL,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(30,2,5,NULL,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(31,3,5,NULL,30000000,30000000,'2015-04-04 19:54:13','ben',NULL),(32,6,5,NULL,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(33,7,5,NULL,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(34,8,5,NULL,50000000,50000000,'2015-04-04 19:54:13','ben',NULL),(36,14,5,NULL,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(37,27,5,NULL,20000000,20000000,'2015-04-04 19:54:13','ben',NULL),(38,28,5,NULL,30000000,30000000,'2015-04-04 19:54:13','ben',NULL),(39,29,5,NULL,100000000,100000000,'2015-04-04 19:54:13','ben',NULL),(40,30,5,NULL,10000000,10000000,'2015-04-04 19:54:13','ben',NULL),(41,31,5,NULL,50000000,50000000,'2015-04-04 19:54:13','ben',NULL),(42,6,6,NULL,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(43,7,6,NULL,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(44,8,6,NULL,2000000,2000000,'2015-04-04 19:54:13','ben',NULL),(45,6,7,NULL,200000,200000,'2015-04-04 19:54:13','ben',NULL),(46,7,7,NULL,200000,200000,'2015-04-04 19:54:13','ben',NULL),(47,8,7,NULL,1000000,1000000,'2015-04-04 19:54:13','ben',NULL),(48,1,9,NULL,2000000,2000000,'2015-06-30 13:30:17','Andrew',NULL),(49,15,8,NULL,1000000,0,'2015-07-03 14:51:38','',NULL),(50,36,5,NULL,20000000,NULL,'2015-11-05 09:52:09','ab','http://www.jaccs.co.jp/service/card_lineup/teikei/kakaku.html'),(51,36,6,NULL,2000000,NULL,'2015-11-08 07:33:43','',NULL),(52,41,8,NULL,1000000,NULL,'2015-11-16 14:00:35','ab','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(53,41,5,NULL,10000000,NULL,'2015-11-16 14:01:07','ab','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(54,41,2,NULL,10000000,NULL,'2015-11-16 14:01:26','ab','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(55,42,8,NULL,1000000,NULL,'2015-11-16 14:15:24','','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(56,42,5,NULL,10000000,NULL,'2015-11-16 14:15:40','ab','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(57,42,2,NULL,10000000,NULL,'2015-11-16 14:15:55','ab','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(58,43,8,NULL,3000000,NULL,'2015-11-16 14:48:07','ab','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(59,43,5,NULL,50000000,NULL,'2015-11-16 14:48:28','ab','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(60,43,2,NULL,50000000,NULL,'2015-11-16 14:48:42','ab','http://www.smbc-card.com/camp/ana/a14998/index.jsp?dk=af_snt_032_20029'),(61,45,4,NULL,20000000,NULL,'2015-11-18 12:57:44','ab','http://kakaku.com/card/item.asp?id=012008&t=detail#tab'),(62,45,8,90,5000000,NULL,'2015-11-18 12:58:15','ab','http://kakaku.com/card/item.asp?id=012008&t=detail#tab'),(63,45,2,NULL,20000000,NULL,'2015-11-18 12:58:40','ab','http://kakaku.com/card/item.asp?id=012008&t=detail#tab'),(64,45,7,NULL,300000,NULL,'2015-11-18 13:00:00','ab','http://kakaku.com/card/item.asp?id=012008&t=detail#tab'),(65,45,6,NULL,1000000,NULL,'2015-11-18 13:00:30','ab','http://kakaku.com/card/item.asp?id=012008&t=detail#tab'),(66,46,5,NULL,30000000,NULL,'2015-11-18 13:49:44','ab','http://kakaku.com/card/item.asp?id=012004'),(67,46,2,NULL,20000000,NULL,'2015-11-18 13:52:07','ab','http://kakaku.com/card/item.asp?id=012004'),(68,46,7,NULL,300000,NULL,'2015-11-18 13:50:52','ab','http://kakaku.com/card/item.asp?id=012004'),(69,46,8,NULL,5000000,NULL,'2015-11-18 13:51:11','ab','http://kakaku.com/card/item.asp?id=012004'),(70,62,5,NULL,20000000,NULL,'2016-02-09 10:26:10','ab',NULL),(71,62,7,NULL,200000,NULL,'2016-02-09 10:26:39','',NULL),(72,62,6,NULL,2000000,NULL,'2016-02-09 10:26:59','',NULL),(73,63,9,NULL,1000000,NULL,'2016-02-11 04:37:46','',NULL),(74,63,5,NULL,20000000,NULL,'2016-02-11 04:38:04','',NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `type_display` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subtype_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `subtype_display` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `region` varchar(255) DEFAULT 'Global',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`insurance_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_type`
--

LOCK TABLES `insurance_type` WRITE;
/*!40000 ALTER TABLE `insurance_type` DISABLE KEYS */;
INSERT INTO `insurance_type` VALUES (1,'travel',NULL,'travel',NULL,'旅行保険','domestic','2015-07-01 13:46:50','ben'),(2,'travel',NULL,'death',NULL,'旅行保険','domestic','2015-07-01 13:47:01','ben'),(3,'travel',NULL,'hospital',NULL,'旅行保険','domestic','2015-07-01 13:47:13','ben'),(4,'travel',NULL,'travel',NULL,'旅行保険','international','2015-07-01 13:47:21','ben'),(5,'travel',NULL,'death',NULL,'旅行保険','international','2015-07-01 13:47:29','ben'),(6,'travel',NULL,'hospital',NULL,'旅行保険','international','2015-07-01 13:47:37','ben'),(7,'travel',NULL,'luggage',NULL,'旅行保険','international','2015-07-01 13:47:45','ben'),(8,'shopping',NULL,'shopping',NULL,'買物保険','domestic','2015-07-01 13:47:59','ben'),(9,'shopping',NULL,'shopping',NULL,'買物保険','international','2015-07-01 13:48:25','Andrew');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `Display` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`interest_id`),
  KEY `credit_card_id` (`credit_card_id`),
  KEY `Interest_payment_type` (`payment_type_id`),
  CONSTRAINT `Interest_credit_card` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
  CONSTRAINT `Interest_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`payment_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest`
--

LOCK TABLES `interest` WRITE;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` VALUES (2,1,2,0.122500000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(3,1,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(5,2,2,0.079200000000000,0.180000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(6,2,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(7,3,1,0.150000000000000,0.180000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(8,3,2,0.079200000000000,0.180000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(9,3,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(17,6,2,0.122500000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(18,6,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(20,7,2,0.122500000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(21,7,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(22,8,4,0.180000000000000,0.000000000000000,NULL,'2015-12-06 14:17:23','ben',NULL),(23,8,2,0.122500000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(24,8,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(28,10,4,0.179500000000000,0.000000000000000,NULL,'2015-12-06 14:19:59','ben',NULL),(29,10,2,0.132000000000000,0.132000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(30,10,3,0.132000000000000,0.132000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(34,12,4,0.179500000000000,0.000000000000000,NULL,'2015-12-06 14:21:08','ben',NULL),(35,12,2,0.132000000000000,0.132000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(36,12,3,0.132000000000000,0.132000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(37,13,4,0.150000000000000,0.180000000000000,NULL,'2015-12-06 14:24:55','ben',NULL),(38,13,2,0.107600000000000,0.132700000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(39,13,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(40,14,4,0.180000000000000,0.000000000000000,NULL,'2015-12-06 14:29:20','ben',NULL),(41,14,2,0.122500000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(42,14,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(43,15,1,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(44,15,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(45,15,3,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(46,16,1,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(47,16,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(48,16,3,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(49,17,1,0.000000000000000,0.000000000000000,NULL,'2015-07-11 21:27:10','ben',NULL),(50,17,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(51,17,3,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(52,18,4,0.000000000000000,0.000000000000000,NULL,'2015-12-09 21:51:35','ben',NULL),(53,18,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(54,18,3,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(55,19,1,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(56,19,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(57,19,3,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(58,20,1,0.120000000000000,0.180000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(59,20,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(60,20,3,0.145200000000000,0.145200000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(61,21,4,0.120000000000000,0.180000000000000,NULL,'2015-12-08 13:41:39','ben',NULL),(62,21,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(63,21,3,0.145200000000000,0.145200000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(64,22,4,0.120000000000000,0.180000000000000,NULL,'2015-12-08 13:46:39','ben',NULL),(65,22,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(66,22,3,0.145200000000000,0.145200000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(67,23,4,0.120000000000000,0.180000000000000,NULL,'2015-12-08 13:54:06','ben',NULL),(68,23,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(69,23,3,0.138000000000000,0.138000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(70,24,4,0.150000000000000,0.180000000000000,NULL,'2015-12-08 14:00:40','ben',NULL),(71,24,2,0.120000000000000,0.145000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(72,24,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(73,25,4,0.150000000000000,0.180000000000000,NULL,'2015-12-08 14:01:48','ben',NULL),(74,25,2,0.120000000000000,0.145000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(75,25,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(76,26,4,0.150000000000000,0.180000000000000,NULL,'2015-12-08 14:02:29','ben',NULL),(77,26,2,0.120000000000000,0.145000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(78,26,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(79,27,1,0.180000000000000,0.180000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(80,27,2,0.122500000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(81,27,3,0.150000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(82,28,1,0.120000000000000,0.180000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(83,28,2,0.000000000000000,0.000000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(84,28,3,0.145200000000000,0.145200000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(85,29,1,0.150000000000000,0.180000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(86,29,2,0.120000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(87,29,3,0.132000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(88,30,1,0.150000000000000,0.180000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(89,30,2,0.120000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(90,30,3,0.132000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(91,31,1,0.150000000000000,0.180000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(92,31,2,0.120000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(93,31,3,0.132000000000000,0.150000000000000,NULL,'2015-04-04 19:54:53','ben',NULL),(95,33,3,0.150000000000000,0.000000000000000,NULL,'2015-07-22 11:25:13','','https://www.eposcard.co.jp/shopping/method/rebo.html'),(96,37,3,0.150000000000000,0.150000000000000,NULL,'2015-11-05 10:44:19','','https://www.orico.co.jp/creditcard/thepoint/'),(97,38,2,0.180000000000000,0.180000000000000,NULL,'2015-11-11 13:16:27','','http://www.jfr-card.co.jp/card/gold/'),(98,38,3,0.096000000000000,0.096000000000000,NULL,'2015-11-11 13:25:29','','http://www.jfr-card.co.jp/card/gold/'),(99,6,4,0.180000000000000,0.000000000000000,NULL,'2015-12-06 13:07:10','',NULL),(100,7,4,0.180000000000000,0.000000000000000,NULL,'2015-12-06 14:14:15','',NULL),(101,62,4,0.150000000000000,0.150000000000000,NULL,'2016-02-09 10:22:37','',NULL),(102,63,4,0.000000000000000,0.000000000000000,'JCB公式サイトに参照','2016-02-11 04:38:57','',NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuer`
--

LOCK TABLES `issuer` WRITE;
/*!40000 ALTER TABLE `issuer` DISABLE KEYS */;
INSERT INTO `issuer` VALUES (1,'株式会社リクルートライフスタイル','2015-04-04 19:55:13','benfries'),(3,'株式会社セブン・カードサービス','2015-04-04 19:55:13','benfries'),(4,'楽天カード株式会社','2015-04-04 19:55:13','benfries'),(5,'三井住友カード株式会社','2015-04-04 19:55:13','benfries'),(6,'ＪＸ日鉱日石エネルギー株式会社','2015-04-04 19:55:13','benfries'),(7,'TSUTAYA','2015-04-04 19:55:13','benfries'),(8,'NIHONDO','2015-04-04 19:55:13','benfries'),(9,'SMBC','2015-04-04 19:55:13','benfries'),(10,'Credit Saison','2015-04-04 19:55:13','benfries'),(11,'三井住友トラスト','2015-04-04 19:55:13','benfries'),(12,'ジャックス','2015-04-04 19:55:13','benfries'),(13,'株式会社ＪＡＬカード','2015-04-04 19:55:13','benfries'),(14,'Yahoo! Japan カード','2015-07-21 11:52:55','AB'),(15,'エポスカード株式会社','2015-07-22 10:52:30','ab'),(16,'Orico','2015-11-05 10:48:09','ab'),(17,'JFR Card','2015-11-11 12:58:10','ab'),(18,'AEON','2015-11-12 13:39:23','ab'),(19,'アメリカンエクスプレス','2015-11-18 12:37:24','ab'),(20,'JR EAST','2015-11-23 05:16:35','ab'),(21,'東京三菱UFJ銀行','2015-11-24 23:26:16','ab'),(22,'NTTドコモ','2015-11-29 09:09:40','ab'),(23,'ライフカード株式会社','2016-02-09 10:12:28','ab'),(24,'JCB','2016-02-11 04:31:23','ab');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuer_history`
--

LOCK TABLES `issuer_history` WRITE;
/*!40000 ALTER TABLE `issuer_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `issuer_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailinglist`
--

DROP TABLE IF EXISTS `mailinglist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailinglist` (
  `email` varchar(255) NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailinglist`
--

LOCK TABLES `mailinglist` WRITE;
/*!40000 ALTER TABLE `mailinglist` DISABLE KEYS */;
INSERT INTO `mailinglist` VALUES ('alex@alex.al','2015-11-06 03:14:54'),('alex@alex.alx','2015-11-06 03:22:52'),('benny@money.iq','2015-11-06 03:28:30'),('andrew@money.iq','2015-11-06 03:36:48'),('ria.san@gmail.com','2015-11-08 02:41:35'),('test@email.com','2015-11-08 12:43:27'),('cliffcard@gmail.com','2015-11-14 09:14:41');
/*!40000 ALTER TABLE `mailinglist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_card_feature_constraint`
--

DROP TABLE IF EXISTS `map_card_feature_constraint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_card_feature_constraint` (
  `credit_card_id` int(11) NOT NULL,
  `feature_type_id` int(11) NOT NULL,
  `priority_id` int(11) DEFAULT '100',
  `update_time` datetime DEFAULT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`credit_card_id`,`feature_type_id`),
  KEY `pk_mccfc_creditcard_id_ind` (`credit_card_id`),
  KEY `pk_mccfc_feature_type_id_ind` (`feature_type_id`),
  CONSTRAINT `fk_mccfc_creditcard_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
  CONSTRAINT `fk_mccfc_feature_type_id` FOREIGN KEY (`feature_type_id`) REFERENCES `card_feature_type` (`feature_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_card_feature_constraint`
--

LOCK TABLES `map_card_feature_constraint` WRITE;
/*!40000 ALTER TABLE `map_card_feature_constraint` DISABLE KEYS */;
/*!40000 ALTER TABLE `map_card_feature_constraint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_persona_feature_constraint`
--

DROP TABLE IF EXISTS `map_persona_feature_constraint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_persona_feature_constraint` (
  `persona_id` int(11) NOT NULL,
  `feature_type_id` int(11) NOT NULL,
  `priority_id` int(11) DEFAULT '100',
  `negative` tinyint(4) DEFAULT '0',
  `update_time` datetime DEFAULT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`persona_id`,`feature_type_id`),
  KEY `fk_mpfc_persona_id_ind` (`persona_id`),
  KEY `fk_mpfc_feature_type_id_ind` (`feature_type_id`),
  CONSTRAINT `FK_mpfc_feature_type_id` FOREIGN KEY (`feature_type_id`) REFERENCES `card_feature_type` (`feature_type_id`),
  CONSTRAINT `FK_mpfc_persona_id` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_persona_feature_constraint`
--

LOCK TABLES `map_persona_feature_constraint` WRITE;
/*!40000 ALTER TABLE `map_persona_feature_constraint` DISABLE KEYS */;
INSERT INTO `map_persona_feature_constraint` VALUES (4,1,100,1,NULL,'ben'),(5,1,100,1,NULL,'ben'),(5,22,100,0,NULL,'ab'),(6,22,100,0,NULL,'ab'),(7,23,100,0,NULL,'ab'),(8,22,100,1,NULL,'ab'),(8,23,100,0,NULL,'ab'),(9,22,100,0,NULL,'ab'),(10,1,100,1,NULL,'ben'),(10,22,100,0,NULL,'ab'),(11,23,100,0,NULL,'ab'),(14,1,100,1,NULL,'ben'),(15,1,100,0,NULL,'ben'),(16,1,100,0,NULL,'ben'),(17,1,100,0,NULL,'ben'),(19,1,100,1,NULL,'ben'),(21,22,100,0,NULL,'ab'),(23,23,100,0,NULL,'ab');
/*!40000 ALTER TABLE `map_persona_feature_constraint` ENABLE KEYS */;
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
  `percentage` double DEFAULT '0.3',
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
INSERT INTO `map_persona_scene` VALUES (2,2,0.1,100,'2015-10-17 00:59:46',''),(2,3,0.3,100,'2015-10-17 00:58:55',''),(2,8,0.3,100,'2015-10-17 01:00:23',''),(3,3,0.3,100,'2015-10-17 00:58:38',''),(3,4,0.1,100,'2015-10-17 00:58:12',''),(3,10,0.3,100,'2015-10-17 00:57:50',''),(4,2,0.2,100,'2015-11-06 12:37:05',''),(4,4,0.5,100,'2015-11-07 14:27:14',''),(5,10,0.3,100,'2015-12-05 01:33:42',''),(6,10,0.3,100,'2016-01-31 04:20:51',''),(7,3,0.3,100,'2015-12-13 05:13:35',''),(7,4,0.2,100,'2015-12-13 05:13:54',''),(7,9,0.1,100,'2015-12-13 05:14:09',''),(8,10,0.3,100,'2015-12-24 13:24:10',''),(9,10,0.3,100,'2015-12-13 05:39:28',''),(10,3,0.3,100,'2015-12-13 05:50:03',''),(10,4,0.2,100,'2015-12-13 05:50:19',''),(10,9,0.1,100,'2015-12-13 05:49:44',''),(11,10,0.3,100,'2015-12-24 13:14:51',''),(12,3,0.3,100,'2015-12-13 05:57:10',''),(12,7,0.2,100,'2015-12-13 05:57:27',''),(13,3,0.3,100,'2015-12-13 05:58:47',''),(13,7,0.2,100,'2015-12-13 05:59:00',''),(14,3,0.3,100,'2015-12-13 06:01:46',''),(14,7,0.2,100,'2015-12-13 06:01:34',''),(15,10,0.3,100,'2015-12-13 06:03:37',''),(16,10,0.3,100,'2015-12-20 04:29:28',''),(17,3,0.2,100,'2016-01-31 09:42:10',''),(17,9,0.2,100,'2016-01-31 09:46:59',''),(17,10,0.3,100,'2015-12-27 11:07:47',''),(18,4,0.3,100,'2015-12-13 06:11:59',''),(18,10,0.2,100,'2015-12-13 06:12:18',''),(19,2,0.3,100,'2015-12-13 06:14:46',''),(20,3,0.3,100,'2015-12-13 06:16:03',''),(20,9,0.2,100,'2015-12-13 06:16:22',''),(21,3,0.1,100,'2016-01-16 08:33:10',''),(21,9,0.1,100,'2016-01-16 08:32:56',''),(23,4,0.2,100,'2016-02-11 05:32:46',''),(23,10,0.2,100,'2016-02-11 05:28:44',''),(24,3,0.3,100,'2016-02-12 10:15:31',''),(24,10,0.1,100,'2016-02-12 10:10:06',''),(25,10,0.4,100,'2016-02-12 10:31:39','');
/*!40000 ALTER TABLE `map_persona_scene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_persona_store`
--

DROP TABLE IF EXISTS `map_persona_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_persona_store` (
  `persona_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `percentage` double DEFAULT '0.05',
  `negative` tinyint(4) DEFAULT '0',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`persona_id`,`store_id`),
  KEY `ind_mperstore_persona_id` (`persona_id`),
  KEY `ind_mperstore_store_id` (`store_id`),
  CONSTRAINT `fk_mperstore_persona_id` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`),
  CONSTRAINT `fk_mperstore_store_id` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_persona_store`
--

LOCK TABLES `map_persona_store` WRITE;
/*!40000 ALTER TABLE `map_persona_store` DISABLE KEYS */;
INSERT INTO `map_persona_store` VALUES (5,119,0.2,0,'2016-01-24 22:45:16',''),(6,119,0.3,0,'2016-01-31 04:20:05',''),(9,119,0.3,0,'2015-12-20 07:38:30',''),(11,120,0.05,0,'2016-01-24 22:53:59',''),(16,127,0.3,0,'2015-12-20 07:40:22',''),(18,45,0.1,0,'2016-01-24 23:04:29',''),(20,71,0.1,0,'2015-12-20 07:44:34',''),(23,120,0.2,1,'2016-02-11 05:31:58',''),(23,127,0.05,0,'2016-02-11 05:32:21',''),(23,130,0.05,0,'2016-02-11 05:42:25',''),(24,3,0.2,0,'2016-02-12 10:14:48',''),(24,4,0.1,0,'2016-02-12 10:14:39',''),(24,102,0.1,0,'2016-02-12 10:14:57',''),(24,119,0.05,0,'2016-02-12 10:11:00','');
/*!40000 ALTER TABLE `map_persona_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_scene_rewcat`
--

DROP TABLE IF EXISTS `map_scene_rewcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_scene_rewcat` (
  `scene_id` int(11) NOT NULL,
  `reward_category_id` int(11) NOT NULL,
  `priority_id` int(11) DEFAULT '100',
  `update_time` datetime DEFAULT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`scene_id`,`reward_category_id`),
  KEY `fk_msrc_scene_id_ind` (`scene_id`),
  KEY `fk_msrc_reward_category_id_ind` (`reward_category_id`),
  CONSTRAINT `FK_msrc_map_scene_reward_reward_category` FOREIGN KEY (`reward_category_id`) REFERENCES `reward_category` (`reward_category_id`),
  CONSTRAINT `FK_msrc_map_scene_reward_scene` FOREIGN KEY (`scene_id`) REFERENCES `scene` (`scene_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_scene_rewcat`
--

LOCK TABLES `map_scene_rewcat` WRITE;
/*!40000 ALTER TABLE `map_scene_rewcat` DISABLE KEYS */;
INSERT INTO `map_scene_rewcat` VALUES (2,9,100,'2015-11-05 23:03:29',NULL),(2,10,100,'2015-12-20 05:45:42',NULL),(2,11,100,'2015-12-20 05:45:28',NULL),(2,13,100,'2015-12-20 05:43:18',NULL),(3,7,100,'2015-10-17 00:50:51',NULL),(3,10,100,'2015-12-20 05:46:09',NULL),(3,11,100,'2015-12-20 05:46:23',NULL),(3,13,100,'2015-12-20 07:18:13',NULL),(3,14,100,'2015-12-20 07:18:28',NULL),(4,2,100,'2015-10-17 00:50:09',NULL),(5,2,100,'2015-10-16 12:41:51',NULL),(6,7,100,'2015-10-17 00:50:38',NULL),(6,10,100,'2015-12-20 05:46:48',NULL),(7,7,100,'2015-10-17 00:50:59',NULL),(7,10,100,'2015-12-20 05:47:15',NULL),(8,9,100,'2015-10-17 00:48:56',NULL),(9,9,100,'2015-10-17 00:49:12',NULL),(10,3,100,'2015-10-17 00:49:27',NULL),(10,6,100,'2015-10-17 00:49:40',NULL);
/*!40000 ALTER TABLE `map_scene_rewcat` ENABLE KEYS */;
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
INSERT INTO `map_scene_store_category` VALUES (2,11,100,'2015-10-20 09:34:46',NULL),(3,2,100,'2015-10-20 03:03:59',NULL),(4,6,100,'2015-10-17 00:42:03',NULL),(5,4,100,'2015-10-17 00:40:28',NULL),(6,8,100,'2015-10-17 23:27:12',NULL),(7,9,100,'2015-10-17 23:27:29',NULL),(8,5,100,'2015-10-17 00:40:48',NULL),(9,3,100,'2015-10-17 00:40:59',NULL),(10,10,100,'2015-10-17 23:26:44',NULL);
/*!40000 ALTER TABLE `map_scene_store_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mileage`
--

DROP TABLE IF EXISTS `mileage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mileage` (
  `mileage_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `point_system_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `required_miles` int(11) NOT NULL,
  `value_in_yen` int(11) NOT NULL,
  `display` varchar(255) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`mileage_id`),
  KEY `fk_milage_trip` (`trip_id`),
  KEY `fk_milage_store` (`store_id`),
  KEY `fk_milage_point_system` (`point_system_id`),
  CONSTRAINT `fk_milage_trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
  CONSTRAINT `fk_milage_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  CONSTRAINT `fk_milage_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mileage`
--

LOCK TABLES `mileage` WRITE;
/*!40000 ALTER TABLE `mileage` DISABLE KEYS */;
INSERT INTO `mileage` VALUES (2,84,16,2,12000,0,'東京⇄大阪 (通常シーズン)','2016-02-11 03:16:45','');
/*!40000 ALTER TABLE `mileage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_type`
--

DROP TABLE IF EXISTS `payment_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_type` (
  `payment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `display` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`payment_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_type`
--

LOCK TABLES `payment_type` WRITE;
/*!40000 ALTER TABLE `payment_type` DISABLE KEYS */;
INSERT INTO `payment_type` VALUES (1,'ikkai','','一回払い','2015-04-04 19:55:25','ben'),(2,'bunkatsu','','分割払い','2015-04-04 19:55:25','ben'),(3,'ribo','','リボ払い','2015-04-04 19:55:25','ben'),(4,'cashing','キャッシング','キャッシング','2015-12-05 03:36:11','ben');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `identifier` varchar(250) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description_short` varchar(250) DEFAULT NULL,
  `description_long` text,
  `default_spend` int(11) NOT NULL DEFAULT '100000',
  `sorting` varchar(250) NOT NULL,
  `reward_category_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`persona_id`),
  KEY `FK_persona_reward_category` (`reward_category_id`),
  CONSTRAINT `FK_persona_reward_category` FOREIGN KEY (`reward_category_id`) REFERENCES `reward_category` (`reward_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (2,'young-family','若い家族','Family with young kids','Family with young kids',100000,'reward',12,'2016-01-17 03:55:46','ab'),(3,'business-traveller','出張','Business traveller','Business traveller',100000,'reward',12,'2015-12-20 05:34:07','ab'),(4,'first-card','マイファーストカード','My first card','My first card',100000,'reward',12,'2015-12-20 05:34:13','ab'),(5,'sora-miler-ana','ANA空マイラー','Sora Miler: Regular user of ANA','ANA空マイラー<br>ANAマイルを貯めたい人は必見!  シミュレーションで最もマイルを貯められるクレジットカードが見つけられます。ANAマイラーは二つに分かれています。あなたはどっち？  ANA空マイラーは、出張や観光でANA航空券を買うことが多い人におすすめです。  ANA陸マイラーは、日常飛行機に乗ることが 少ないが、いつもの生活費でマイルを貯めてANA航空券特典をもらいたい人にはおすすめです。',100000,'reward',12,'2016-02-13 02:19:15','ab'),(6,'no-fee-ana','年会費無料ANA','No annual fee, ANA mileage','No annual fee, ANA mileage',100000,'reward',6,'2016-01-31 04:19:31','ab'),(7,'shopping-jal','ショッピングJAL','Non-flyer who wants to earn JAL points','Non-flyer who wants to earn JAL points',100000,'reward',6,'2015-12-20 05:34:37','ab'),(8,'no-fee-jal','年会費無料JAL','No annual fee, JAL mileage','No annual fee, JAL mileage',100000,'reward',6,'2016-01-31 04:47:34','ab'),(9,'campaign-ana','ANAキャンペーン','Best campaign for ANA mileage cards','Best campaign for ANA mileage cards',100000,'campaign-points',6,'2016-02-01 22:11:31','ab'),(10,'riku-miler-ana','ANA陸マイラー','Best ANA card for non-flyers','Best ANA card for non-flyers',100000,'reward',6,'2015-12-20 05:35:34','ab'),(11,'campaign-jal','JALキャンペーン','Best JAL mileage card campaign','Best JAL mileage card campaign',100000,'campaign-points',12,'2015-12-20 05:35:45','ab'),(12,'cashback-bank-acc','銀行振り込み型','Best cashback to bank account','Best cashback to bank account',100000,'reward',13,'2015-12-20 05:36:04','ab'),(13,'cashback-bill','請求書に充当','Best cashback card bill','Best cashback card bill',100000,'reward',14,'2015-12-20 05:36:11','ab'),(14,'e-money','電子マネー','Best cash back e-money','Best cash back e-money',100000,'reward',11,'2015-12-20 05:36:17','ab'),(15,'gold-mileage','ゴールドマイレージ','Best Gold Mileage card','Best Gold Mileage card',100000,'reward',12,'2015-12-20 05:36:47','ab'),(16,'gold-travel','ゴールド旅行','Best Gold card for travelling (Lounges?)','Best Gold card for travelling (Lounges?)',100000,'reward',3,'2015-12-20 05:36:40','ab'),(17,'gold-low-fee','ゴールド年会費１万円以下','Best Gold Card annual fee less than 10,000 yen','Best Gold Card annual fee less than 10,000 yen',100000,'reward',12,'2015-12-20 05:36:56','ab'),(18,'hotel-restaurant','ホテル・レストラン','Hotel/Restaurant card','Hotel/Restaurant card',100000,'reward',3,'2015-12-20 05:37:19','ab'),(19,'point-cashback','ポイントキャッシュバック','Cashback in Point article','Cashback in Point article',100000,'reward',11,'2015-12-20 05:37:40','ab'),(20,'purch-discount','購入時割引','Best discount at point of purchase','Best discount at point of purchase',100000,'rate',12,'2015-12-20 05:37:47','ab'),(21,'mileage-point-back-rate','高い還元率マイレージ','highest point back rate','highest point back rate',100000,'rate',6,'2016-01-16 08:31:56','ab'),(22,'overseas-points','海外旅行に強い','Best point card for overseas','Best point card for overseas',100000,'reward',6,'2016-01-23 00:55:49','ab'),(23,'best-jal','最強JALカード','Best card for JAL mileage points','',100000,'reward',6,'2016-02-11 05:18:32','ab'),(24,'high-point-back-rate','高還元率クレジットカード','Highest point back rate','',100000,'rate',12,'2016-02-12 10:05:20','ab'),(25,'overseas-points','海外高還元率クレジットカード','High point cards for overseas','',100000,'reward',6,'2016-02-12 10:38:23','ab');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_restriction`
--

DROP TABLE IF EXISTS `persona_restriction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_restriction` (
  `persona_id` int(11) NOT NULL,
  `restriction_type_id` int(11) NOT NULL,
  `Comparator` varchar(80) DEFAULT '=',
  `value` varchar(255) NOT NULL,
  `priority_id` int(11) DEFAULT '100',
  `update_time` datetime DEFAULT NULL,
  `update_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`persona_id`,`restriction_type_id`),
  KEY `fk_pr_persona_id_ind` (`persona_id`),
  KEY `fk_pr_feature_type_id_ind` (`restriction_type_id`),
  CONSTRAINT `FK_pr_persona_id` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`),
  CONSTRAINT `FK_pr_restriction_type_id` FOREIGN KEY (`restriction_type_id`) REFERENCES `restriction_type` (`restriction_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_restriction`
--

LOCK TABLES `persona_restriction` WRITE;
/*!40000 ALTER TABLE `persona_restriction` DISABLE KEYS */;
INSERT INTO `persona_restriction` VALUES (6,1,'=','0',100,'2015-12-20 07:20:23',NULL),(6,6,'=','0',100,'2016-01-31 04:18:03',NULL),(8,1,'=','0',100,'2015-12-20 07:21:30',NULL),(8,6,'=','0',100,'2016-01-31 04:47:18',NULL),(17,6,'<','10000',100,'2016-01-31 05:13:17',NULL);
/*!40000 ALTER TABLE `persona_restriction` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=338 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `point_acquisition`
--

LOCK TABLES `point_acquisition` WRITE;
/*!40000 ALTER TABLE `point_acquisition` DISABLE KEYS */;
INSERT INTO `point_acquisition` VALUES (1,'',0.012000000000000,1,18,'2015-06-27 23:42:30','ben',NULL),(2,'',0.012000000000000,1,18,'2015-06-27 23:42:30','ben',NULL),(3,'',0.020000000000000,1,18,'2015-06-27 23:42:31','ben',NULL),(4,'',0.032000000000000,1,29,'2015-06-27 23:42:31','ben',NULL),(5,'',0.032000000000000,1,29,'2015-06-27 23:42:31','ben',NULL),(6,'',0.040000000000000,1,29,'2015-06-27 23:42:32','ben',NULL),(7,'',0.012000000000000,1,59,'2015-06-27 23:42:32','ben',NULL),(8,'',0.020000000000000,1,59,'2015-06-27 23:42:32','ben',NULL),(9,'',0.012000000000000,1,60,'2015-06-27 23:42:33','ben',NULL),(10,'',0.020000000000000,1,60,'2015-06-27 23:42:33','ben',NULL),(11,'',0.012000000000000,1,61,'2015-06-27 23:42:33','ben',NULL),(12,'',0.032000000000000,1,36,'2015-06-27 23:42:33','ben',NULL),(13,'',0.032000000000000,1,36,'2015-06-27 23:42:34','ben',NULL),(14,'',0.040000000000000,1,36,'2015-06-27 23:42:34','ben',NULL),(15,'',0.012000000000000,1,46,'2015-06-27 23:42:34','ben',NULL),(16,'',0.012000000000000,1,46,'2015-06-27 23:42:35','ben',NULL),(17,'',0.020000000000000,1,46,'2015-06-27 23:42:35','ben',NULL),(18,'',0.012000000000000,1,48,'2015-06-27 23:42:35','ben',NULL),(19,'',0.012000000000000,1,48,'2015-06-27 23:42:35','ben',NULL),(20,'',0.020000000000000,1,48,'2015-06-27 23:42:36','ben',NULL),(21,'',0.012000000000000,1,49,'2015-06-27 23:42:36','ben',NULL),(22,'',0.012000000000000,1,51,'2015-06-27 23:42:36','ben',NULL),(23,'',0.012000000000000,1,51,'2015-06-27 23:42:37','ben',NULL),(24,'',0.020000000000000,1,51,'2015-06-27 23:42:37','ben',NULL),(25,'',0.012000000000000,1,52,'2015-06-27 23:42:37','ben',NULL),(26,'',0.012000000000000,1,52,'2015-06-27 23:42:38','ben',NULL),(27,'',0.020000000000000,1,52,'2015-06-27 23:42:38','ben',NULL),(55,'',0.012000000000000,2,51,'2015-07-03 12:55:19','',NULL),(56,'',0.012000000000000,2,52,'2015-07-03 12:55:26','',NULL),(62,'',0.010000000000000,3,33,'2015-07-01 10:12:08','',NULL),(66,'',0.010000000000000,3,2,'2015-07-01 10:08:32','',NULL),(69,'',0.005000000000000,3,51,'2015-06-27 23:42:50','ben',NULL),(70,'',0.005000000000000,3,52,'2015-06-30 14:16:47','',NULL),(71,'',0.010000000000000,4,18,'2015-06-27 23:42:51','ben',NULL),(72,'',0.010000000000000,4,18,'2015-06-27 23:42:51','ben',NULL),(73,'',0.010000000000000,4,18,'2015-06-27 23:42:51','ben',NULL),(74,'',0.005000000000000,4,49,'2015-06-27 23:42:52','ben',NULL),(75,'',0.005000000000000,4,49,'2015-06-27 23:42:52','ben',NULL),(76,'',0.005000000000000,4,49,'2015-06-27 23:42:52','ben',NULL),(77,'',0.020000000000000,4,50,'2015-06-27 23:42:53','ben',NULL),(78,'',0.020000000000000,4,50,'2015-06-27 23:42:53','ben',NULL),(79,'',0.020000000000000,4,50,'2015-06-27 23:42:53','ben',NULL),(80,'',0.010000000000000,4,51,'2015-06-27 23:42:53','ben',NULL),(81,'',0.010000000000000,4,51,'2015-06-27 23:42:54','ben',NULL),(82,'',0.010000000000000,4,51,'2015-06-27 23:42:54','ben',NULL),(83,'',0.010000000000000,4,52,'2015-06-27 23:42:54','ben',NULL),(84,'',0.010000000000000,4,52,'2015-06-27 23:42:55','ben',NULL),(85,'',0.010000000000000,4,52,'2015-06-27 23:42:55','ben',NULL),(86,'',0.010000000000000,5,51,'2015-07-01 10:22:19','',NULL),(87,'',0.010000000000000,5,52,'2015-07-01 10:22:28','',NULL),(93,'',0.006000000000000,7,51,'2015-07-01 12:25:05','',NULL),(111,'',0.003000000000000,8,51,'2015-11-21 08:08:35','AB',NULL),(114,'',0.001000000000000,9,57,'2015-07-08 22:52:41','ben',NULL),(121,'',0.001000000000000,9,51,'2015-07-08 22:52:30','AB',NULL),(122,'',0.001000000000000,9,52,'2015-07-08 22:52:35','AB',NULL),(129,'',0.010000000000000,12,59,'2015-06-27 23:43:08','ben',NULL),(130,'',0.020000000000000,12,23,'2015-06-27 23:43:08','ben',NULL),(131,'',0.010000000000000,12,49,'2015-06-27 23:43:08','ben',NULL),(132,'',0.005000000000000,12,51,'2015-07-06 03:46:18','ben',NULL),(133,'',0.010000000000000,13,10,'2015-06-27 23:43:09','ben',NULL),(134,'',0.005000000000000,13,59,'2015-06-27 23:43:09','ben',NULL),(135,'',0.005000000000000,13,49,'2015-06-27 23:43:10','ben',NULL),(136,'',0.010000000000000,13,51,'2015-12-08 13:49:40','ben','http://saisoncard-promotion.com/MAZDA_mz_PLUS_CARD_SAISON/index.html'),(139,'',0.005000000000000,14,51,'2015-06-27 23:43:11','ben',NULL),(140,'',0.010000000000000,15,60,'2015-06-27 23:43:11','ben',NULL),(143,'',0.015000000000000,15,62,'2015-06-27 23:43:12','ben',NULL),(148,'',0.005000000000000,15,51,'2015-06-27 23:43:13','ben',NULL),(150,'',0.032000000000000,2,21,'2015-06-30 23:45:13','',NULL),(151,'',0.032000000000000,2,45,'2015-12-04 09:43:06','','http://recruit-card.jp/point/?campaignCd=crda0001'),(152,'',0.015000000000000,3,1,'2015-07-01 10:07:45','',NULL),(153,'',0.015000000000000,3,22,'2015-07-01 10:08:15','',NULL),(154,'',0.010000000000000,3,39,'2015-07-01 10:09:01','',NULL),(155,'',0.010000000000000,3,41,'2015-07-01 10:09:25','',NULL),(156,'',0.010000000000000,3,42,'2015-07-01 10:10:18','',NULL),(157,'',0.015000000000000,3,31,'2015-07-01 10:10:37','',NULL),(158,'',0.005000000000000,3,32,'2015-07-01 10:11:09','',NULL),(159,'',0.005000000000000,3,49,'2015-07-01 10:11:47','',NULL),(160,'',0.015000000000000,3,65,'2015-07-01 10:17:14','',NULL),(161,'',0.015000000000000,3,23,'2015-07-01 10:18:01','',NULL),(162,'',0.015000000000000,3,24,'2015-07-01 10:18:32','',NULL),(163,'',0.010000000000000,3,25,'2015-07-01 10:19:13','',NULL),(164,'',0.010000000000000,3,26,'2015-07-01 10:19:35','',NULL),(165,'',0.010000000000000,3,27,'2015-07-01 10:19:54','',NULL),(166,'',0.005000000000000,5,49,'2015-07-01 10:22:51','',NULL),(167,'',0.010000000000000,5,32,'2015-07-01 10:23:11','',NULL),(168,'',0.020000000000000,5,50,'2015-07-01 10:24:24','',NULL),(169,'',0.005000000000000,16,51,'2015-07-01 13:03:23','',NULL),(170,'',0.005000000000000,16,52,'2015-07-01 13:03:38','',NULL),(173,'',0.030000000000000,7,33,'2015-07-14 00:31:03','',NULL),(174,'',0.020000000000000,17,51,'2015-07-03 13:00:00','',NULL),(176,'',0.040000000000000,17,21,'2015-07-05 14:24:50','','http://point.recruit.co.jp/?tab=pointUseServise'),(177,'',0.040000000000000,17,45,'2015-07-03 15:17:26','',NULL),(178,'',0.020000000000000,17,48,'2015-07-03 15:24:53','',NULL),(179,'',0.020000000000000,17,32,'2015-07-03 15:25:26','',NULL),(180,'',0.020000000000000,17,60,'2015-07-03 15:25:37','',NULL),(181,'',0.020000000000000,17,46,'2015-07-03 15:25:49','',NULL),(182,'',0.020000000000000,17,52,'2015-07-03 15:26:26','',NULL),(183,'',0.020000000000000,17,59,'2015-07-03 15:26:37','',NULL),(185,'',0.020000000000000,5,33,'2015-07-03 15:42:38','',NULL),(186,'',0.030000000000000,17,5,'2015-07-05 14:26:57','AB','http://point.recruit.co.jp/?tab=pointUseServise'),(188,'',0.022000000000000,2,5,'2015-07-06 09:39:33','AB','https://point.recruit.co.jp/?tab=pointUseServise'),(189,'',0.006000000000000,21,51,'2015-07-06 22:27:45','AB',NULL),(190,'',0.020000000000000,21,33,'2015-07-14 00:34:21','AB',NULL),(191,'',0.020000000000000,21,58,'2015-07-06 22:29:04','AB',NULL),(192,'',0.006000000000000,21,60,'2015-07-06 22:29:42','AB',NULL),(193,'',0.006000000000000,21,32,'2015-07-06 22:30:02','AB',NULL),(195,'',0.006000000000000,7,60,'2015-07-06 22:36:19','AB','http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_p.html'),(196,'',0.010000000000000,7,32,'2015-07-06 22:39:43','AB','http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_p.html'),(199,'',0.006000000000000,22,46,'2015-07-07 23:46:26','AB','https://www.jal.co.jp/jalcard/card/suica.html'),(200,'',0.006000000000000,22,68,'2015-07-07 23:49:03','AB','https://www.jal.co.jp/jalcard/card/suica.html'),(201,'',0.004000000000000,22,33,'2015-07-14 00:36:33','AB','http://www.jreast.co.jp/card/thankspoint/index.html'),(202,'',0.010000000000000,20,51,'2015-07-08 13:26:32','','https://www.jal.co.jp/jalcard/card/club_a_gold.html'),(203,'',0.010000000000000,20,52,'2015-07-08 13:38:38','','https://www.jal.co.jp/jalcard/card/club_a_gold.html'),(204,'',0.020000000000000,20,33,'2015-07-14 00:36:10','ab','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(205,'',0.020000000000000,20,1,'2015-07-08 13:58:31','ab',NULL),(206,'',0.020000000000000,20,73,'2015-07-08 14:02:41','ab','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(207,'',0.020000000000000,20,71,'2015-07-08 14:02:58','ab','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(208,'',0.020000000000000,20,72,'2015-07-08 14:03:14','ab','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(209,'',0.010000000000000,16,33,'2015-07-14 00:35:04','AB','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(210,'',0.010000000000000,16,71,'2015-07-09 12:28:41','AB','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(211,'',0.010000000000000,16,72,'2015-07-09 12:28:56','AB','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(212,'',0.010000000000000,16,69,'2015-07-09 12:29:21','AB','http://www.jal.co.jp/jmb/partner/beginner/#tokuyakuten'),(213,'',0.001000000000000,11,51,'2015-07-10 10:42:49','ab','http://www.saisoncard.co.jp/lineup/ca099.html'),(215,'',0.002000000000000,11,52,'2015-07-12 11:41:33','ab','http://kakaku.com/card/item.asp?id=026012&t=point'),(216,'',0.001000000000000,23,51,'2015-11-27 23:17:00','ab','http://www.smbc-card.com/nyukai/card/index.jsp'),(217,'',0.001000000000000,23,52,'2015-11-27 23:17:57','ab','http://www.smbc-card.com/nyukai/card/index.jsp'),(218,'',0.030000000000000,24,6,'2015-07-21 12:10:28','ab','http://card.yahoo.co.jp/service/howto/'),(219,'',0.010000000000000,24,48,'2015-07-21 12:11:22','ab','http://card.yahoo.co.jp/service/howto/public_charges.html'),(220,'',0.015000000000000,24,74,'2015-07-21 12:15:02','ab','http://card.yahoo.co.jp/campaign/'),(221,'',0.015000000000000,24,1,'2015-07-21 12:16:17','ab','http://card.yahoo.co.jp/campaign/'),(222,'',0.015000000000000,24,56,'2015-07-21 12:17:20','','http://card.yahoo.co.jp/campaign/'),(223,'',0.060000000000000,24,75,'2015-07-21 12:18:59','ab','http://card.yahoo.co.jp/campaign/'),(224,'',0.010000000000000,24,51,'2015-07-21 13:12:27','ab','http://card.yahoo.co.jp/campaign/?pid=aff'),(225,'',0.005000000000000,25,51,'2015-07-22 11:15:41','ab','https://www.eposcard.co.jp/eposcard/aflt.html'),(226,'',0.025000000000000,25,25,'2015-07-22 11:15:49','ab','https://www.eposcard.co.jp/epospoint/index.html'),(227,'',0.025000000000000,25,77,'2015-07-22 11:15:57','ab','https://www.eposcard.co.jp/epospoint/index.html'),(228,'',0.030000000000000,25,83,'2015-07-22 11:16:04','ab','https://www.eposcard.co.jp/epospoint/index.html'),(229,'',0.015000000000000,25,82,'2015-07-22 11:16:11','ab','https://www.eposcard.co.jp/epospoint/index.html'),(230,'',0.015000000000000,25,78,'2015-07-22 11:16:19','ab','https://www.eposcard.co.jp/epospoint/index.html'),(231,'',0.025000000000000,25,81,'2015-07-22 11:16:27','ab','https://www.eposcard.co.jp/epospoint/index.html'),(232,'',0.005000000000000,25,48,'2015-07-22 11:16:34','','https://www.eposcard.co.jp/epospoint/index.html'),(233,'',0.010000000000000,25,76,'2015-07-22 11:16:40','ab','https://www.eposcard.co.jp/epospoint/index.html'),(234,'',0.010000000000000,25,50,'2015-07-22 11:18:40','ab','https://tamaru.eposcard.co.jp/'),(235,'',0.015000000000000,25,6,'2015-07-22 11:19:15','ab','https://tamaru.eposcard.co.jp/'),(236,'',0.002000000000000,22,51,'2015-11-23 06:05:15','ab',NULL),(237,'',0.015000000000000,26,51,'2015-11-05 10:08:47','ab','http://www.jaccs.co.jp/service/card_lineup/teikei/kakaku.html'),(238,'',0.010000000000000,27,51,'2015-11-05 10:49:14','ab','https://www.orico.co.jp/creditcard/thepoint/'),(239,'',0.010000000000000,28,51,'2015-11-11 13:21:46','ab','http://www.jfr-card.co.jp/point/'),(240,'',0.050000000000000,28,71,'2015-11-11 13:22:35','ab','http://www.jfr-card.co.jp/card/gold/'),(241,'',0.010000000000000,28,100,'2015-11-11 13:30:43','ab','http://www.jfr-card.co.jp/point/offer/life/'),(242,'',0.010000000000000,28,86,'2015-11-11 13:31:01','ab','http://www.jfr-card.co.jp/point/offer/life/'),(243,'',0.010000000000000,28,99,'2015-11-11 13:31:26','ab','http://www.jfr-card.co.jp/point/offer/life/'),(244,'',0.010000000000000,28,87,'2015-11-11 13:31:53','ab','http://www.jfr-card.co.jp/point/offer/life/'),(245,'',0.010000000000000,28,74,'2015-11-11 13:32:05','ab','http://www.jfr-card.co.jp/point/offer/life/'),(246,'',0.010000000000000,28,48,'2015-11-11 13:32:20','ab','http://www.jfr-card.co.jp/point/offer/life/'),(247,'',0.010000000000000,28,101,'2015-11-11 13:32:44','ab',NULL),(248,'',0.050000000000000,29,72,'2015-11-12 09:29:53','ab','http://www.jfr-card.co.jp/card/standard/'),(249,'',0.005000000000000,29,51,'2015-11-12 09:34:27','ab','http://www.jfr-card.co.jp/card/standard/'),(250,'',0.010000000000000,29,71,'2015-11-12 09:31:09','ab','http://www.jfr-card.co.jp/card/standard/'),(251,'',0.005000000000000,29,46,'2015-11-12 09:37:13','ab',NULL),(252,'',0.010000000000000,29,61,'2015-11-12 09:37:41','ab','http://www.jfr-card.co.jp/point/charge/'),(253,'',0.005000000000000,30,105,'2015-11-12 22:29:05','ab','http://www.aeon.co.jp/tpt/'),(254,'',0.005000000000000,30,51,'2015-11-12 22:29:30','ab','http://www.aeon.co.jp/tpt/'),(255,'',0.005000000000000,30,88,'2015-11-12 22:29:47','ab','http://www.aeon.co.jp/tpt/'),(256,'',0.005000000000000,30,99,'2015-11-12 22:32:29','ab','http://www.aeon.co.jp/creditcard/service/public_fee/'),(257,'',0.005000000000000,30,100,'2015-11-12 22:32:54','ab','http://www.aeon.co.jp/creditcard/service/public_fee/'),(258,'',0.005000000000000,30,86,'2015-11-12 22:33:12','ab','http://www.aeon.co.jp/creditcard/service/public_fee/'),(259,'',0.005000000000000,30,87,'2015-11-12 22:46:51','ab','http://www.aeon.co.jp/creditcard/service/public_fee/'),(260,'',0.010000000000000,30,26,'2015-11-12 22:46:40','ab','http://www.aeon.co.jp/point/save/point_club/index.html'),(261,'',0.010000000000000,30,34,'2015-11-12 22:47:41','ab','http://www.aeon.co.jp/point/save/point_club/index.html'),(262,'',0.010000000000000,31,51,'2015-11-18 13:06:45','ab','https://www.americanexpress.com/jp/content/sky-traveler-card/'),(263,'',0.005000000000000,31,99,'2015-11-18 13:08:18','ab','http://kakaku.com/card/item.asp?id=012008&t=point#tab'),(264,'',0.005000000000000,31,100,'2015-11-18 13:08:12','ab','http://kakaku.com/card/item.asp?id=012008&t=point#tab'),(265,'',0.010000000000000,31,48,'2015-11-18 13:08:29','ab','http://kakaku.com/card/item.asp?id=012008&t=point#tab'),(266,'',0.030000000000000,31,119,'2015-11-18 13:10:48','ab','https://www.americanexpress.com/jp/content/sky-traveler-card/'),(267,'',0.010000000000000,31,120,'2015-11-18 13:11:08','ab','https://www.americanexpress.com/jp/content/sky-traveler-card/'),(268,'',0.030000000000000,31,121,'2015-11-18 13:15:47','ab','https://www.americanexpress.com/jp/content/sky-traveler-card/'),(269,'',0.010000000000000,32,51,'2015-11-18 13:57:14','ab','https://www.americanexpress.com/jp/content/ana-classic-card/'),(270,'',0.020000000000000,32,119,'2015-11-22 02:17:19','ab','https://www.americanexpress.com/jp/content/ana-classic-card/'),(271,'',0.002000000000000,33,51,'2015-11-23 05:27:53','ab','http://kakaku.com/card/item.asp?id=040001&t=point#tab'),(272,'',0.006000000000000,33,29,'2015-11-23 05:28:43','ab','http://kakaku.com/card/item.asp?id=040001&t=point#tab'),(273,'',0.002000000000000,33,99,'2015-11-23 05:34:45','ab','https://www.jreast.co.jp/card/first/viewsuica.html'),(274,'',0.002000000000000,33,86,'2015-11-23 05:35:13','ab','https://www.jreast.co.jp/card/first/viewsuica.html'),(275,'',0.002000000000000,33,87,'2015-11-23 05:35:27','ab','https://www.jreast.co.jp/card/first/viewsuica.html'),(276,'',0.002000000000000,33,74,'2015-11-23 05:35:44','ab','https://www.jreast.co.jp/card/first/viewsuica.html'),(277,'',0.002000000000000,33,100,'2015-11-23 05:36:05','ab','https://www.jreast.co.jp/card/first/viewsuica.html'),(278,'',0.002000000000000,33,48,'2015-11-23 05:36:23','ab','https://www.jreast.co.jp/card/first/viewsuica.html'),(279,'',0.004000000000000,33,33,'2015-11-23 05:44:24','ab','https://www.jreast.co.jp/card/thankspoint/'),(280,'',0.002000000000000,33,32,'2015-11-23 05:45:03','ab','https://www.jreast.co.jp/card/thankspoint/'),(281,'',0.100000000000000,34,122,'2015-11-23 06:51:18','ab','https://www.jreast.co.jp/card/first/jalsuica/index.html'),(282,'',0.005000000000000,34,51,'2015-11-23 06:52:35','ab','https://www.jreast.co.jp/card/first/jalsuica/index.html'),(283,'',0.005000000000000,34,86,'2015-11-23 06:53:51','ab','https://www.jreast.co.jp/card/first/jalsuica/index.html'),(284,'',0.005000000000000,34,87,'2015-11-23 06:54:25','ab','https://www.jreast.co.jp/card/first/jalsuica/index.html'),(285,'',0.005000000000000,34,74,'2015-11-23 06:55:01','ab','https://www.jreast.co.jp/card/first/jalsuica/index.html'),(286,'',0.005000000000000,34,99,'2015-11-23 06:54:55','ab','https://www.jreast.co.jp/card/first/jalsuica/index.html'),(287,'',0.005000000000000,34,100,'2015-11-23 06:55:38','ab','https://www.jreast.co.jp/card/first/jalsuica/index.html'),(288,'',0.005000000000000,34,48,'2015-11-23 06:55:43','ab','https://www.jreast.co.jp/card/first/jalsuica/index.html'),(289,'',0.006000000000000,22,29,'2015-11-23 07:23:31','ab',NULL),(290,'',0.005000000000000,35,51,'2015-11-23 12:25:50','ab','http://www.topcard.co.jp/save/'),(291,'',0.035000000000000,35,114,'2015-11-23 12:26:59','ab','http://www.topcard.co.jp/save/'),(292,'',0.002000000000000,35,32,'2015-11-23 12:27:45','ab','http://www.topcard.co.jp/save/'),(293,'',0.010000000000000,35,17,'2015-11-23 12:30:11','ab','http://www.topcard.co.jp/save/'),(294,'',0.010000000000000,35,33,'2015-11-23 12:33:02','ab','http://www.topcard.co.jp/save/shop/detail/056.html'),(295,'',0.010000000000000,35,35,'2015-11-23 12:35:08','ab','http://www.topcard.co.jp/save/shop/detail/055.html'),(296,'',0.010000000000000,35,24,'2015-11-23 12:36:50','ab','http://www.topcard.co.jp/save/shop/detail/053.html'),(297,'',0.010000000000000,35,65,'2015-11-23 12:52:31','ab','http://www.topcard.co.jp/save/shop/detail/033.html'),(298,'',0.010000000000000,36,32,'2015-11-24 23:36:15','ab','http://www.cr.mufg.jp/member/point/nicos/viaso/index.html'),(299,'',0.010000000000000,36,86,'2015-11-24 23:36:35','ab','http://www.cr.mufg.jp/member/point/nicos/viaso/index.html'),(300,'',0.010000000000000,36,87,'2015-11-24 23:36:50','ab','http://www.cr.mufg.jp/member/point/nicos/viaso/index.html'),(301,'',0.010000000000000,36,74,'2015-11-24 23:37:03','ab','http://www.cr.mufg.jp/member/point/nicos/viaso/index.html'),(302,'',0.005000000000000,36,51,'2015-11-24 23:37:20','ab','http://www.cr.mufg.jp/member/point/nicos/viaso/index.html'),(303,'',0.010000000000000,36,123,'2015-11-24 23:39:11','ab','http://www.cr.mufg.jp/member/point/nicos/viaso/index.html'),(304,'',0.010000000000000,37,51,'2015-11-27 13:35:10','ab','http://jalcard.jal.co.jp/addon/'),(305,'',0.040000000000000,37,120,'2015-11-27 13:35:29','ab','http://jalcard.jal.co.jp/addon/'),(306,'',0.003000000000000,38,51,'2015-11-27 14:09:55','ab','http://www.cr.mufg.jp/apply/card/dc_jizile/'),(307,'',0.010000000000000,39,51,'2015-11-29 09:25:19','ab','http://d-card.jp/st/abouts/d-cardgold.html'),(308,'',0.100000000000000,39,87,'2015-11-29 09:28:50','ab','http://d-card.jp/st/services/points/use.html'),(309,'',0.020000000000000,39,33,'2015-11-29 09:29:19','ab','http://d-card.jp/st/services/points/use.html'),(310,'',0.040000000000000,39,38,'2015-11-29 09:50:56','ab','http://d-card.jp/st/services/points/use.html'),(311,'',0.020000000000000,39,112,'2015-11-29 09:52:01','ab','http://d-card.jp/st/services/points/use.html'),(312,'',0.020000000000000,39,111,'2015-11-29 09:52:21','ab','http://d-card.jp/st/services/points/use.html'),(313,'',0.020000000000000,39,69,'2015-11-29 09:52:55','ab','http://d-card.jp/st/services/points/use.html'),(314,'',0.030000000000000,39,30,'2015-11-29 09:53:32','ab','http://d-card.jp/st/services/points/use.html'),(315,'',0.020000000000000,39,120,'2015-11-29 09:54:04','ab','http://d-card.jp/st/services/points/use.html'),(316,'',0.030000000000000,39,80,'2015-11-29 09:54:32','ab','http://d-card.jp/st/services/points/use.html'),(317,'',0.030000000000000,39,65,'2015-11-29 09:55:04','ab','http://d-card.jp/st/services/points/use.html'),(318,'',0.020000000000000,39,126,'2015-11-29 10:44:46','ab','http://d-card.jp/st/services/points/use.html'),(319,'',0.020000000000000,39,125,'2015-11-29 10:45:03','ab','http://d-card.jp/st/services/points/use.html'),(320,'',0.020000000000000,39,124,'2015-11-29 10:45:31','ab','http://d-card.jp/st/services/points/use.html'),(321,'',0.010000000000000,39,32,'2015-11-29 10:49:26','ab','http://d-card.jp/st/services/points/use.html'),(322,'',0.010000000000000,39,99,'2015-11-29 10:50:39','ab','http://d-card.jp/st/services/benefits/lifeline/payment.html'),(323,'',0.010000000000000,39,100,'2015-11-29 10:50:51','ab','http://d-card.jp/st/services/benefits/lifeline/payment.html'),(324,'',0.010000000000000,39,48,'2015-11-29 10:51:05','ab','http://d-card.jp/st/services/benefits/lifeline/payment.html'),(325,'',0.010000000000000,39,101,'2015-11-29 10:51:16','ab','http://d-card.jp/st/services/benefits/lifeline/payment.html'),(326,'',0.010000000000000,13,33,'2015-12-08 13:50:04','','http://saisoncard-promotion.com/MAZDA_mz_PLUS_CARD_SAISON/index.html'),(327,'',0.030000000000000,20,120,'2015-12-15 13:09:40','ab','http://gold-master.biz/jal.shtml'),(328,'',0.020000000000000,5,127,'2015-12-20 04:33:24','ab','http://kakaku.com/card/item.asp?id=016001&t=point'),(329,'',0.001000000000000,40,51,'2016-02-09 13:59:51','ab','http://www.lifecard.co.jp/card/service/point/point.html#tm'),(330,'',0.005000000000000,41,130,'2016-02-11 04:46:24','ab',NULL),(331,'',0.003000000000000,41,4,'2016-02-11 04:46:48','ab',NULL),(332,'',0.003000000000000,41,3,'2016-02-11 04:46:58','',NULL),(333,'',0.002000000000000,41,129,'2016-02-11 04:47:14','',NULL),(334,'',0.002000000000000,41,52,'2016-02-11 04:47:46','',NULL),(335,'',0.001000000000000,41,51,'2016-02-11 04:47:59','',NULL),(336,'',0.002000000000000,41,106,'2016-02-11 04:49:17','','http://www.jcb-originalseries.jp/os/201504/?13231083152100&ad_id=os_ospc_hkk_p_a_20151130os0040&utm_medium=hkk__os_j&utm_source=os__p_a__j&utm_term=os0040__hkk__j'),(337,'',0.002000000000000,41,107,'2016-02-11 04:49:40','','http://www.jcb-originalseries.jp/os/201504/?13231083152100&ad_id=os_ospc_hkk_p_a_20151130os0040&utm_medium=hkk__os_j&utm_source=os__p_a__j&utm_term=os0040__hkk__j');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `point_system`
--

LOCK TABLES `point_system` WRITE;
/*!40000 ALTER TABLE `point_system` DISABLE KEYS */;
INSERT INTO `point_system` VALUES (1,'NONE',0.010000,0.000000,'2015-06-30 23:01:37','',NULL),(2,'リクルート',0.012000,1.000000,'2015-07-13 13:35:14','',NULL),(3,'T ポイント',0.005000,1.000000,'2015-06-30 23:01:56','',NULL),(4,'セブン＆アイ',0.005000,1.000000,'2015-06-30 23:02:10','',NULL),(5,'楽天',0.010000,1.000000,'2015-07-05 15:08:51','',NULL),(7,'ENEOSカードP',0.006000,1.000000,'2015-07-03 03:39:30','',NULL),(8,'Kampo',0.003000,5.000000,'2015-11-21 08:08:27','ab',NULL),(9,'SMBCワールドプレゼント',0.001000,5.000000,'2015-07-08 22:52:21','',NULL),(10,'YAMADA',0.001000,5.000000,'2015-07-07 09:52:55','AB',NULL),(11,'Saison 永久不減',0.001000,5.000000,'2015-07-10 10:57:50','ab',NULL),(12,'プリンスポイント',0.001000,1.000000,'2015-07-07 03:43:09','AB','https://club.seibugroup.jp/card/'),(13,'m\'z PLUSポイント',0.010000,1.000000,'2015-06-30 23:15:39','',NULL),(14,'JR 九州',0.005000,1.000000,'2015-07-11 21:47:53','ab',NULL),(15,'カラマツトレイン',0.005000,1.000000,'2015-06-30 23:16:30','',NULL),(16,'JAL',0.005000,1.000000,'2015-06-30 23:16:24','',NULL),(17,'リクルートプラス',0.020000,1.000000,'2015-07-05 14:24:16','',NULL),(19,'SMBC デビュープラス',0.010000,1.000000,'2015-07-01 13:14:26','',NULL),(20,'JAL Club-A ゴールドカード',0.010000,1.000000,'2015-07-01 13:16:44','',NULL),(21,'ENEOSカードS',0.006000,1.000000,'2015-07-03 03:40:35','',NULL),(22,'JR 東日本 VIEW',0.002000,2.500000,'2015-11-23 07:22:32','AB','https://www.jal.co.jp/jalcard/card/suica.html'),(23,'SMBC ワールドプレゼントゴールド',0.002000,5.000000,'2015-07-12 13:14:30','ab','http://www.smbc-card.com/nyukai/card/index.jsp'),(24,'Yahoo! Tsutaya',0.010000,1.000000,'2015-07-21 12:14:38','ab','http://card.yahoo.co.jp/service/howto/'),(25,'エポス',0.005000,1.000000,'2015-07-22 11:15:35','ab','https://www.eposcard.co.jp/eposcard/aflt.html'),(26,'Jデポ',0.015000,1.000000,'2015-11-05 10:07:48','ab','http://www.jaccs.co.jp/service/card_lineup/teikei/kakaku.html'),(27,'オリコポイント',0.010000,1.000000,'2015-11-05 10:47:27','ab','https://www.orico.co.jp/creditcard/thepoint/'),(28,'JFR ゴールド',0.010000,1.000000,'2015-11-11 13:56:57','ab','http://www.jfr-card.co.jp/point/'),(29,'JFR',0.010000,1.000000,'2015-11-12 09:29:17','ab','http://www.jfr-card.co.jp/card/standard/'),(30,'ときめきポイント',0.005000,1.000000,'2015-11-12 22:28:30','ab','http://www.aeon.co.jp/tpt/'),(31,'AMEX メンバーシップ・リワード',0.010000,1.000000,'2015-11-22 01:35:06','ab','https://www.americanexpress.com/jp/content/sky-traveler-card/'),(32,'ANA アメリカンエクスプレス',0.010000,1.000000,'2015-11-18 13:55:48','ab','https://www.americanexpress.com/jp/content/ana-classic-card/'),(33,'ビュー・サンクスポイント',0.002000,2.500000,'2015-11-23 05:26:49','ab','http://kakaku.com/card/item.asp?id=040001&t=point#tab'),(34,'JR VIEW ビックカメラ',0.050000,1.000000,'2015-11-23 06:50:50','ab','https://www.jreast.co.jp/card/first/bic/'),(35,'TOKYU POINT',0.005000,1.000000,'2015-11-23 10:48:03','ab','http://www.topcard.co.jp/save/'),(36,'VIASO ポイントプログラム',0.005000,1.000000,'2015-11-24 23:35:40','ab','http://www.cr.mufg.jp/member/point/nicos/viaso/index.html'),(37,'JAL プラチナ',0.010000,1.000000,'2015-11-27 13:34:17','ab','http://jalcard.jal.co.jp/addon/'),(38,'MUFJ DC ハッピープレゼント',0.003000,5.000000,'2015-11-27 14:09:23','ab','http://www.cr.mufg.jp/apply/card/dc_jizile/'),(39,'dポイント',0.010000,1.000000,'2015-11-29 09:24:27','ab','http://d-card.jp/st/abouts/d-cardgold.html'),(40,'ライフサンクスプレゼント',0.001000,5.000000,'2016-02-09 10:29:22','ab','http://www.lifecard.co.jp/card/service/point/point.html'),(41,'Oki Doki ポイントプログラム',0.001000,5.000000,'2016-02-11 04:44:05','ab','http://kakaku.com/card/item.asp?id=011003&t=point#tab');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
-- Table structure for table `restriction_type`
--

DROP TABLE IF EXISTS `restriction_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restriction_type` (
  `restriction_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `display` text CHARACTER SET utf8 NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`restriction_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restriction_type`
--

LOCK TABLES `restriction_type` WRITE;
/*!40000 ALTER TABLE `restriction_type` DISABLE KEYS */;
INSERT INTO `restriction_type` VALUES (1,'Fee','/card/annualFeeFirstYear','First year fee','','2015-12-31 06:09:52',''),(2,'Mileage',NULL,NULL,'','2015-10-17 01:10:10','ab'),(3,'Age',NULL,'Minimum age restriction','','2015-11-02 09:51:32','ab'),(4,'Sex','/restriction/sex','To restrict cards by sex','','2015-12-31 06:12:22','ab'),(5,'ANA ポイント移行',NULL,'transfer to ANA points','ANA ポイント移行','2015-11-18 12:54:12','ab'),(6,'FeeSubsequentYear','/card/annualFeeSubseqYear','Fee from year 2 onward','','2015-12-31 06:10:26',''),(7,'CardName','/card/cardName',NULL,'','2015-12-31 06:11:06',''),(8,'Issuer','/card/cardIssuer',NULL,'','2015-12-31 06:11:21',''),(9,'Campaign Text','/card/campaignText',NULL,'','2015-12-31 06:11:45',''),(10,'PointsExpiryPeriod','/card/pointsExpiryPeriod',NULL,'','2015-12-31 06:12:38',''),(11,'CampaignPoints','/card/campaignPoints/',NULL,'','2015-12-31 06:13:48',''),(12,'CampaignYenValue','/card/campaignYenValue',NULL,'','2015-12-31 06:13:59',''),(13,'InterestShopping','/card/interestShopping',NULL,'','2015-12-31 06:14:18',''),(14,'PointsToMoneyConversionRate','/card/pointsToMoneyConversionRate',NULL,'','2016-01-01 07:28:13',''),(15,'ShortDescription','/card/shortDescription',NULL,'','2016-01-01 07:28:29',''),(16,'IssuePeriod','/card/issue_period',NULL,'','2016-01-01 07:29:58',''),(17,'CreditLimit Bottom','/card/credit_limit_bottom',NULL,'','2016-01-01 07:30:17',''),(18,'Credit limit upper','/card/credit_limit_upper',NULL,'','2016-01-01 07:30:33',''),(19,'MinInterest (ikkai)','/card/interest[Type=\"ikkai\"]/MinInterest',NULL,'','2016-01-01 07:43:27',''),(20,'MaxInterest (ikkai)','/card/interest[Type=\"ikkai\"]/MaxInterest',NULL,'','2016-01-01 07:43:43',''),(21,'MinInterest (Bunkatsu)','/card/interest[Type=\"bunkatsu\"]/MinInterest',NULL,'','2016-01-01 07:44:25',''),(22,'MaxInterest (Bunkatsu)','/card/interest[Type=\"bunkatsu\"]/MaxInterest',NULL,'','2016-01-01 07:43:50',''),(23,'MinInterest (ribo)','/card/interest[Type=\"ribo\"]/MinInterest',NULL,'','2016-01-01 07:44:32',''),(24,'MaxInterest (ribo)','/card/interest[Type=\"ribo\"]/MaxInterest',NULL,'','2016-01-01 07:43:57',''),(25,'MinInterest (Cashing)','/card/interest[Type=\"cashing\"]/MinInterest',NULL,'','2016-01-01 07:44:41',''),(26,'MaxInterest (cashing)','/card/interest[Type=\"cashing\"]/MaxInterest',NULL,'','2016-01-01 07:44:06',''),(27,'PaymentNetwork','/card/supportedBrands',NULL,'','2016-01-01 07:42:57','');
/*!40000 ALTER TABLE `restriction_type` ENABLE KEYS */;
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
  `store_id` int(11) DEFAULT '84',
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
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reward`
--

LOCK TABLES `reward` WRITE;
/*!40000 ALTER TABLE `reward` DISABLE KEYS */;
INSERT INTO `reward` VALUES (2,2,84,2,1,'ホットペッパー食事割引券','ホットペッパー食事割引券',NULL,1.000000,100,100,NULL,0,'',1.00000000,1,NULL,'2015-10-20 10:05:16',''),(3,2,84,3,1,'じゃらん宿泊割引','じゃらん宿泊割引券',NULL,1.000000,100,100,NULL,50000,'',1.00000000,1,'https://point.recruit.co.jp/?tab=pointUseServise','2015-10-18 00:56:02',''),(5,3,84,10,1,'ファミリーマートでのお買い物に使う','１ポイント＝１円分',NULL,1.000000,1,1,NULL,1000,'',1.00000000,1,NULL,'2015-12-20 05:09:08',''),(6,3,84,10,1,'ENEOSでガソリンを','１ポイント＝１円分',NULL,1.000000,1,1,NULL,3000,'',1.00000000,1,NULL,'2015-12-20 05:09:23',''),(7,3,84,6,3,'ANA マイルレージに交換','ANA で東京→大阪 (片道）',NULL,2.031700,6000,6000,NULL,0,'',2.00000000,2,NULL,'2015-07-15 12:54:27',''),(8,4,84,10,1,'イトーヨーカドーでの買い物に使う','１ポイント＝１円分',NULL,1.000000,1,1,NULL,1000,'',1.00000000,1,NULL,'2015-12-20 05:09:41',''),(9,4,84,11,2,'nanaco電子マネーに交換','1セブン＆アイポイント＝1 nanaco ポイント',NULL,1.000000,100,500,NULL,500,'',1.00000000,1,NULL,'2015-12-20 05:09:56',''),(10,4,84,6,3,'ANA 国内航空券','東京⇄沖縄',NULL,2.476700,9000,9000,NULL,25000,'',0.50000000,2,NULL,'2015-07-15 12:53:35',''),(11,5,84,11,2,'Edy 電子マネーに交換','Edy 電子マネーに交換',NULL,1.000000,1,10,NULL,1000,'',1.00000000,1,NULL,'2015-12-20 05:10:09',''),(12,5,84,10,1,'楽天市場での買い物に使う','楽天市場での買い物に使う',NULL,1.000000,1,50,NULL,10000,'',1.00000000,1,NULL,'2015-12-20 05:10:30',''),(13,5,84,3,1,'楽天トラベルでの旅を予約','楽天トラベルホテル割引券',NULL,1.000000,1,50,NULL,0,'',1.00000000,1,NULL,'2015-10-20 10:06:54',''),(17,7,84,10,1,'ENEOSでガソリンを','１ポイント→１円割引',NULL,1.000000,1000,1000,NULL,1000,'',1.00000000,1,NULL,'2015-12-20 05:10:53',''),(18,7,84,10,2,'Tポイントへの交換','1ポイント→0.7 Tポイント',NULL,0.700000,1000,1000,NULL,10000,'',1.00000000,1,NULL,'2015-12-20 05:11:03',''),(19,7,84,9,3,'Dyson ハンディークリーナー','ポイントでDysonハンディークリーナーもらえる！',NULL,1.000000,NULL,50000,NULL,50000,'',1.00000000,1,NULL,'2015-07-01 12:42:16',''),(23,7,84,9,3,'スチームクリーナー','ポイントでスチームクリーナーがもらえる！',NULL,1.000000,NULL,10000,NULL,10000,'',1.00000000,1,NULL,'2015-07-01 12:42:35',''),(24,8,84,6,2,'ANA国内航空券','東京⇄福岡  1P→3 ANA マイル',NULL,1.972000,15000,15000,NULL,15000,'',0.33330000,2,'http://www.jaccs.co.jp/service/card_lineup/teikei/kampo.html','2015-11-21 08:12:04',''),(27,9,84,9,2,'楽天スーパーポイント交換','楽天スーパーポイント交換 1P→５楽天P',NULL,5.000000,100,200,NULL,NULL,'',1.00000000,1,NULL,'2015-10-20 10:16:16',''),(29,9,84,9,3,'BOSE サウンドドックシリーズIII','BOSE サウンドドックシリーズIII',NULL,5.000000,NULL,5000,NULL,NULL,'',1.00000000,1,NULL,'2015-10-20 10:09:50',''),(31,11,84,6,2,'ANA 国内航空券','東京⇄大阪 (往復）200永久不減ポイント→625 ANAマイル',NULL,2.031700,12000,12000,NULL,NULL,'',0.32000000,2,NULL,'2015-07-15 13:18:40','AB'),(32,11,84,9,2,'Amazon ギフト券','200永久不減ポイント→1000円分 Amazon ギフト券',NULL,5.000000,200,200,NULL,NULL,'',1.00000000,1,NULL,'2015-07-01 12:39:33',''),(33,12,84,2,3,'品川プリンスホテルディナー券','品川プリンスホテル　リュクス ダイニング ハプナ ディナー券(2時間飲み放題付き)　1名様',NULL,1.000000,NULL,5000,NULL,NULL,'',1.00000000,1,NULL,'2015-06-05 23:17:26','Ben'),(35,11,84,6,2,'JAL 国内航空券','東京⇄大阪（往復）200永久不減ポイント→500 JALマイル',NULL,1.948300,12000,12000,NULL,NULL,'',0.40000000,2,NULL,'2015-07-15 13:15:25','AB'),(36,13,84,10,1,'マツダ店でのお支払い時','1マツダm\'zポイント→1円',NULL,1.000000,1,1,300000,NULL,'回',1.00000000,1,NULL,'2015-12-20 05:11:31',''),(38,14,84,11,2,'JR 九州SUGOCA電子マネーに交換','1ポイント→1円分',NULL,1.000000,1,100,NULL,NULL,'',1.00000000,1,NULL,'2015-12-20 05:11:42',''),(39,14,84,3,2,'JR 九州旅行券に交換','JR 九州ホテル券',NULL,1.000000,NULL,3000,NULL,NULL,'',1.00000000,1,NULL,'2015-10-18 00:58:26',''),(41,9,84,11,2,'iD 電子マネーに交換','iD 電子マネーに交換 1P→5円分',NULL,5.000000,100,200,NULL,NULL,'',1.00000000,1,NULL,'2015-12-20 05:13:25',''),(42,9,84,10,2,'Ponta ポイントに交換','Ponta ポイントに交換 1P→4.5Ponta P',NULL,4.500000,100,200,NULL,NULL,'',1.00000000,1,NULL,'2015-12-20 05:13:40',''),(43,15,84,10,2,'カラマツトレインギフト券に交換','1ポイント→1円分',NULL,1.000000,500,500,NULL,NULL,'',1.00000000,1,NULL,'2015-12-20 05:13:54',''),(44,16,84,6,3,'東京→大阪片道飛行機券','東京→大阪（片道）',NULL,1.670000,NULL,7000,NULL,NULL,'',1.00000000,1,NULL,'2015-11-05 11:16:20',''),(45,16,84,6,3,'東京→福岡片道飛行機チケット','東京→福岡（片道）',NULL,1.657600,NULL,8500,NULL,NULL,'',1.00000000,1,NULL,'2015-11-05 11:16:38',''),(46,16,84,6,3,'東京⇄ハワイ片道飛行機チケット','東京⇄ハワイ（往復）',NULL,2.324800,NULL,40000,NULL,NULL,'',1.00000000,1,NULL,'2015-11-05 11:17:56',''),(47,17,84,3,1,'じゃらん宿泊割引券','じゃらん宿泊割引券','http://www.moneyiq.jp/images/Hotel_building_32.png',1.000000,1,100,NULL,NULL,NULL,1.00000000,1,'http://recruit-card.jp/point/?campaignCd=crda0001','2015-09-19 08:53:19',''),(48,21,84,10,1,'ENEOSで購入時割引','１ポイント→１円割引','http://www.moneyiq.jp/images/Cash_payment_32.png',1.000000,1000,1000,NULL,NULL,NULL,1.00000000,1,'http://www.noe.jx-group.co.jp/carlife/card/card/kind/card_s.html','2015-12-20 05:14:35',''),(54,22,84,11,1,'１ポイント＝1.1円分','Suica チャージ 400P=1,000円',NULL,2.500000,400,400,20000,400,NULL,1.00000000,1,NULL,'2015-12-20 05:14:58',''),(55,22,84,9,2,'ルミネ商品券','ルミネ商品券 1,250P毎→4,000円分',NULL,3.200000,1250,1250,NULL,1250,NULL,1.00000000,1,'http://www.jreast.co.jp/card/thankspoint/item/index.html#ticket','2015-11-08 13:52:37',''),(56,20,84,6,2,'JAL','東京⇄大阪 (往復) 1P=1マイル',NULL,1.948300,9500,9500,9500,NULL,NULL,1.00000000,2,NULL,'2015-11-18 13:30:40',''),(57,20,84,6,2,'JAL','東京⇄沖縄 (往復）1P=1マイル',NULL,2.414000,11500,11500,11500,NULL,NULL,1.00000000,2,NULL,'2015-11-18 13:31:02',''),(58,20,84,6,2,'JAL','東京⇄ソウル (往復）1P=1マイル',NULL,3.481300,15000,15000,15000,NULL,NULL,1.00000000,2,NULL,'2015-11-18 13:31:13',''),(59,20,84,6,2,'JAL 国際線','日本⇄香港 (往復）1P=1マイル',NULL,3.459000,20000,20000,20000,NULL,NULL,1.00000000,2,NULL,'2015-11-18 13:31:24',''),(60,9,84,6,2,'ANA 国内線','東京⇔大阪 (往復) 1ポイント→3 ANA マイル',NULL,2.031700,12000,12000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-11-08 13:08:45',''),(62,9,84,6,2,'ANA国際線航空券','日本⇔ソウル (往復) 1ポイント→3 ANAマイル',NULL,3.081300,15000,15000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokusai.html','2015-07-15 13:53:53','ab'),(63,9,84,6,2,'ANA国際線航空券','日本⇔香港 (往復) 1P→3 ANAマイル',NULL,2.891000,20000,20000,NULL,NULL,NULL,0.33333300,2,'https://www.ana.co.jp/amc/reference/tukau/kokusai.html','2015-10-20 10:11:21',''),(64,9,84,6,2,'ANA国内航空券','東京⇄沖縄（往復）1ポイント→3 ANAマイル',NULL,2.415600,18000,18000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-07-15 20:42:41','AB'),(65,8,84,14,2,'Jデポに交換 (請求書キャッシュバック）','請求書にキャッシュバック。Jデポに交換  1P＝５円で換算',NULL,5.000000,300,300,NULL,1500,NULL,1.00000000,1,NULL,'2015-12-20 05:15:22',''),(66,23,84,10,2,'楽天ポイントに交換','楽天ポイントに交換 1P→５楽天P',NULL,5.000000,100,200,NULL,NULL,NULL,1.00000000,1,NULL,'2015-12-20 05:15:40',''),(67,23,84,6,2,'ANA国際線','東京→大阪（片道）',NULL,2.031700,6000,6000,NULL,6000,NULL,1.00000000,2,NULL,'2015-11-21 08:19:33',''),(69,17,84,2,1,'ホットペッパー食事割引券','ホットペッパー食事割引券',NULL,1.000000,100,100,NULL,NULL,NULL,1.00000000,1,NULL,'2015-10-18 00:49:51',''),(71,9,84,2,2,'スターバックスカード','スターバックスカード 1P＝ 4円分',NULL,4.000000,100,200,7500,NULL,NULL,1.00000000,1,NULL,'2015-11-08 13:01:01',''),(72,9,84,2,2,'タリーズカード','タリーズカード 1P＝タリーズ カード　4円分',NULL,4.000000,100,200,5000,NULL,NULL,1.00000000,1,NULL,'2015-10-20 10:12:37',''),(73,5,84,2,2,'楽天デリバリー','楽天デリバリー利用券',NULL,1.000000,100,100,NULL,NULL,NULL,1.00000000,1,NULL,'2015-10-18 00:52:41',''),(74,11,84,9,2,'ユニクロオンラインギフトカード','1,500ポイントで7,000円分',NULL,4.666660,1500,1500,2099,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:33:34','ab'),(75,11,84,9,2,'ユニクロオンラインギフトカード','2,100ポイントで10,000円分',NULL,4.761900,2100,2100,NULL,NULL,NULL,1.00000000,1,NULL,'2015-07-13 23:35:09','ab'),(76,9,84,6,3,'ANA 国内航空券','東京→大阪（片道）1P→3 ANAマイル',NULL,2.031700,6000,6000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-10-20 10:12:54',''),(77,9,84,6,3,'ANA 国内航空券','東京→福岡 (片道)。1P→3 ANAマイル',NULL,1.958700,7500,7500,9999999,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-11-08 13:19:21',''),(78,9,84,6,3,'ANA 国内航空券','東京→沖縄 (片道) 1P→3 ANAマイル',NULL,2.476700,9000,9000,NULL,NULL,NULL,0.33333000,2,'https://www.ana.co.jp/amc/reference/tukau/kokunai_6.html','2015-10-20 10:13:10',''),(79,24,84,10,2,'Suica カードチャージ','1ポイント→１円分',NULL,1.000000,1000,1000,10000,NULL,NULL,1.00000000,1,'http://points.yahoo.co.jp/exchange/','2015-12-20 05:16:13',''),(80,24,84,13,2,'ジャパネット銀行口座入金','ジャパネット銀行口座入金 1P→0.85円分',NULL,0.850000,100,1000,NULL,NULL,NULL,1.00000000,1,'http://points.yahoo.co.jp/exchange/','2016-01-17 06:53:06',''),(81,24,84,3,2,'Yahoo! トラベル宿泊券','Yahoo! トラベル宿泊券',NULL,1.000000,1,1,NULL,NULL,NULL,1.00000000,1,'http://points.yahoo.co.jp/save_use/','2015-10-18 00:57:01',''),(82,25,84,9,2,'マルイ商品券','1,000ポイント→1,000円分',NULL,1.000000,1000,1000,NULL,1000,NULL,1.00000000,1,'https://www.eposcard.co.jp/epospoint/guide.html','2015-11-16 13:39:01','ab'),(83,26,84,14,1,'請求書にキャッシュバック','請求書にキャッシュバック。1,500P→1,500円',NULL,1.000000,1,NULL,NULL,1500,NULL,1.00000000,1,'http://www.jaccs.co.jp/service/card_lineup/teikei/kakaku.html','2015-12-20 05:17:04',''),(84,26,84,6,3,'ANA 東京→大阪 (片道)','ANA 東京→大阪 (片道) 5P=1 ANAマイル',NULL,2.031700,6000,6000,NULL,6000,NULL,5.00000000,2,NULL,'2015-11-05 11:09:28',''),(85,27,84,9,2,'Amazon','Amazon商品券に交換',NULL,1.000000,500,NULL,NULL,500,NULL,1.00000000,1,'http://www.orico.co.jp/creditcard/point/exchange/eorico/amazon/','2015-11-05 10:54:29','ab'),(86,27,84,9,2,'nanaco','nanacoギフト券に交換',NULL,1.000000,1000,NULL,NULL,1000,NULL,1.00000000,1,'http://www.orico.co.jp/creditcard/point/exchange/eorico/nanaco/','2015-11-05 10:55:51','ab'),(87,27,84,6,3,NULL,'JAL 東京→大阪（片道）2P=1 JALマイル',NULL,1.670000,7000,7000,NULL,7000,NULL,2.00000000,2,'https://www.orico.co.jp/creditcard/point/exchange/alliance/jal/','2015-11-05 11:09:53',''),(88,22,84,9,2,'JR東日本カーレンタル商品券','JR東日本カーレンタル商品券。1,000P→3,000円分',NULL,3.000000,1000,1000,NULL,1000,NULL,1.00000000,1,'http://www.jreast.co.jp/card/thankspoint/item/index.html#ticket','2015-12-20 02:10:10',''),(89,23,84,14,2,'請求書にキャッシュバック。','請求書にキャッシュバック。1P→3円分',NULL,3.000000,1,200,NULL,200,NULL,1.00000000,1,'https://www.smbc-card.com/mem/wp/cashback.jsp','2015-12-20 05:17:47',''),(90,23,84,10,1,'ポンタポイント','ポンタポイントに交換。1P→4.5ポンタポイント',NULL,4.500000,1,200,NULL,200,NULL,1.00000000,1,'https://www.smbc-card.com/mem/wp/ponta.jsp','2015-12-20 05:18:05',''),(91,28,84,10,1,'大丸・松坂屋でポイント利用 1P→1円','大丸・松坂屋でポイント利用 1P→1円',NULL,1.000000,1,1,NULL,1,NULL,1.00000000,1,'http://www.jfr-card.co.jp/point/use/','2015-12-20 05:18:21',''),(92,28,84,6,2,NULL,'JAL 東京⇄大阪（往復）5P=1マイル',NULL,1.948300,12000,12000,NULL,12000,NULL,5.00000000,2,'http://www.jfr-card.co.jp/payment/option/shopping/','2015-11-11 14:00:25','ab'),(94,29,84,10,2,'大丸・松坂屋でポイント利用 1P=1円','大丸・松坂屋でポイント利用 1P=1円',NULL,1.000000,1,1,NULL,1,NULL,1.00000000,1,'http://www.jfr-card.co.jp/point/offer/','2015-12-20 05:18:34',''),(95,30,84,11,2,'WAON電子マネーへ交換 1P=1円','WAON電子マネーへ交換 1P=1円',NULL,1.000000,500,1000,NULL,1000,NULL,1.00000000,1,'http://www.aeon.co.jp/point/use/waon/index.html','2015-12-20 05:18:43',''),(96,30,84,6,3,NULL,'東京→大阪（片道）JAL',NULL,1.670000,7000,7000,NULL,7000,NULL,2.00000000,2,'http://www.aeon.co.jp/NM_iframe/ratepoint_jal.html','2015-11-12 22:57:55','ab'),(101,31,84,6,3,'東京⇄沖縄（往復）1P→1 ANAマイル','東京⇄沖縄 1P→1 ANAマイル',NULL,2.415600,18000,18000,NULL,18000,NULL,1.00000000,2,NULL,'2015-11-21 07:53:16','ab'),(102,31,84,6,3,'東京→福岡（往復）1P=1マイル','東京⇄福岡 1P=1ANAマイル',NULL,1.958700,7500,7500,NULL,7500,NULL,1.00000000,2,NULL,'2015-11-21 07:54:12','ab'),(103,32,84,6,3,'東京⇄大阪 1P=1マイル','東京⇄大阪 1P=1マイル',NULL,2.031700,12000,12000,NULL,12000,NULL,1.00000000,2,NULL,'2015-11-22 02:18:54','ab'),(104,32,84,6,3,'東京⇄福岡 1P=1マイル','東京⇄福岡 1P=1マイル',NULL,1.958700,15000,15000,NULL,15000,NULL,1.00000000,2,NULL,'2015-11-22 02:19:10','ab'),(105,32,84,6,3,'東京⇄沖縄 1P=1マイル','東京⇄沖縄 1P=1マイル',NULL,2.415600,18000,18000,NULL,18000,NULL,1.00000000,2,NULL,'2015-11-22 02:19:35','ab'),(106,31,84,6,3,'東京→大阪（往復）1P=1マイル','東京⇄大阪 1P=1 ANAマイル',NULL,2.031700,12000,12000,NULL,12000,NULL,1.00000000,2,NULL,'2015-11-21 07:54:05','ab'),(108,31,56,6,3,'日本⇄香港（往復）1P=1マイル','日本⇄香港 1P=1マイル',NULL,2.891000,20000,20000,NULL,20000,NULL,1.00000000,2,NULL,'2015-11-21 08:14:01',''),(109,31,84,6,3,'日本⇄シンガポール（往復）1P=1マイル','日本⇄シンガポール 1P=1マイル',NULL,1.579100,35000,35000,NULL,35000,NULL,1.00000000,2,NULL,'2015-11-21 08:02:02','ab'),(110,31,84,6,3,'日本⇄ホノルル（往復）1P=1マイル','日本⇄ホノルル（往復）1P=1マイル',NULL,2.449800,40000,40000,NULL,40000,NULL,1.00000000,2,NULL,'2015-11-18 14:12:14',''),(111,31,84,6,3,'日本⇄バンクーバー（往復）1P=1マイル','日本⇄バンクーバー（往復）1P=1マイル',NULL,2.862400,50000,50000,NULL,50000,NULL,1.00000000,2,NULL,'2015-11-18 14:13:14','ab'),(112,31,84,6,3,'日本⇄パリ（往復）1P=1マイル','日本⇄パリ（往復）1P=1マイル',NULL,2.538700,55000,55000,NULL,55000,NULL,1.00000000,2,NULL,'2015-11-18 14:14:07','ab'),(113,27,84,6,3,'東京→大阪（片道）1P=0.6 ANAマイル','東京→大阪（片道）1P=0.6 ANAマイル',NULL,1.850000,6000,6000,NULL,6000,NULL,1.66667000,2,'https://www.orico.co.jp/creditcard/point/exchange/alliance/ana/','2016-02-11 05:58:53',''),(114,8,84,6,3,'東京⇄大阪 1P=3 ANAマイル','東京⇄大阪 1P=3 ANAマイル',NULL,2.031700,12000,12000,NULL,12000,NULL,0.33330000,2,'http://www.jaccs.co.jp/service/card_lineup/teikei/kampo.html','2015-11-21 07:50:41','ab'),(115,8,56,6,3,'東京→沖縄 (片道) 1P=3 ANAマイル','東京→沖縄 (片道) 1P=3 ANAマイル',NULL,2.476700,9000,9000,NULL,9000,NULL,0.33300000,2,'http://www.jaccs.co.jp/service/card_lineup/teikei/kampo.html','2015-11-23 22:27:45',''),(116,32,84,6,3,'日本⇄ソウル 1P=1マイル','日本⇄ソウル 1P=1マイル',NULL,3.081300,15000,15000,NULL,15000,NULL,1.00000000,2,NULL,'2015-11-22 02:21:50','ab'),(117,32,84,6,3,'日本⇄香港 1P=1マイル','日本⇄香港 1P=1マイル',NULL,2.891000,20000,20000,NULL,20000,NULL,1.00000000,2,NULL,'2015-11-22 02:22:58','ab'),(118,32,84,6,3,'日本⇄シンガポール 1P=1マイル','日本⇄シンガポール 1P=1マイル',NULL,1.579100,35000,35000,NULL,35000,NULL,1.00000000,2,NULL,'2015-11-22 02:23:56','ab'),(119,32,84,6,3,'日本⇄ホノルル 1P=1マイル','日本⇄ホノルル 1P=1マイル',NULL,2.449800,40000,40000,NULL,40000,NULL,1.00000000,2,NULL,'2015-11-22 02:25:05','ab'),(120,32,84,6,3,'日本⇄バンクーバー 1P=1マイル','日本⇄バンクーバー 1P=1マイル',NULL,2.862400,50000,50000,NULL,50000,NULL,1.00000000,2,NULL,'2015-11-22 02:26:21','ab'),(121,32,84,6,3,'日本⇄パリ 1P=1マイル','日本⇄パリ 1P=1マイル',NULL,2.538700,55000,55000,NULL,55000,NULL,1.00000000,2,NULL,'2015-11-22 02:27:46','ab'),(122,33,84,11,1,'Suica チャージ 400P=1,000円','Suica チャージ 400P=1,000円',NULL,2.500000,400,400,NULL,400,NULL,1.00000000,1,'https://www.jreast.co.jp/card/first/viewsuica.html','2015-12-20 05:19:38',''),(123,33,84,9,2,'ルミネ商品券','ルミネ商品券',NULL,3.200000,4000,4000,NULL,4000,NULL,1.00000000,1,'http://kakaku.com/card/item.asp?id=040001&t=point#tab','2015-11-23 05:40:20','ab'),(124,34,84,9,1,'ビックカメラ商品券 1P=1円','ビックカメラ商品券 1P=1円',NULL,1.000000,1,1,NULL,1,NULL,1.00000000,1,'https://www.jreast.co.jp/card/first/jalsuica/index.html','2015-11-23 06:50:42','ab'),(125,34,84,11,1,'Suicaチャージ 1,500P=1,000円','Suicaチャージ 1,500P=1,000円',NULL,0.666670,1000,1000,NULL,1000,NULL,1.00000000,1,'https://www.jreast.co.jp/card/first/bic/','2015-12-20 05:19:52',''),(126,22,84,3,2,'びゅうサンクスクーポン（国内旅行）1,600P=5,000円','びゅうサンクスクーポン',NULL,3.125000,1600,1600,NULL,1600,NULL,1.00000000,1,'http://kakaku.com/card/item.asp?id=040002&t=point#tab','2015-11-23 07:20:02',''),(127,35,84,11,1,'PASMOチャージ 1,000P=1,000円','PASMOチャージ 1,000P=1,000円',NULL,1.000000,1000,1000,NULL,1000,NULL,1.00000000,1,'http://www.topcard.co.jp/use/pasmo/','2016-01-17 06:53:48','ab'),(128,35,84,3,1,'Tokyu Hotels 宿泊券 1P=1円','Tokyu Hotels 宿泊券 1P=1円',NULL,1.000000,1,1,NULL,1,NULL,1.00000000,1,'http://www.topcard.co.jp/save/shop/detail/033.html','2015-11-23 12:46:08','ab'),(129,31,84,6,3,'日本⇄ソウル ANA 1P→1円','日本⇄ソウル ANA 1P→1円',NULL,3.081300,15000,15000,NULL,15000,NULL,1.00000000,2,NULL,'2015-11-23 13:50:46','ab'),(130,36,84,13,1,'銀行口座に振り込みキャッシュバック','銀行口座に振り込みキャッシュバック',NULL,1.000000,1000,1000,NULL,1000,NULL,1.00000000,1,'http://www.cr.mufg.jp/member/point/nicos/viaso/confirm.html','2015-12-20 05:20:15',''),(131,37,84,6,3,'東京⇄大阪 JAL ','東京⇄大阪 JAL ',NULL,1.948300,12000,12000,NULL,12000,NULL,1.00000000,2,NULL,'2015-11-27 13:37:53','ab'),(132,37,84,6,3,'東京⇄福岡 JAL','東京⇄福岡 JAL',NULL,2.098700,15000,15000,NULL,15000,NULL,1.00000000,2,NULL,'2015-11-27 13:38:51','ab'),(133,37,84,6,3,'東京⇄石垣 JAL','東京⇄石垣 JAL',NULL,2.414000,20000,20000,NULL,20000,NULL,1.00000000,2,NULL,'2015-11-27 13:39:58','ab'),(134,37,84,6,3,'日本⇄香港 JAL','日本⇄香港 JAL',NULL,3.459000,20000,20000,NULL,20000,NULL,1.00000000,2,NULL,'2015-11-27 13:40:57','ab'),(135,37,84,6,3,'日本⇄シンガポール','日本⇄シンガポール JAL',NULL,1.464900,35000,35000,NULL,NULL,'35000',1.00000000,2,NULL,'2015-11-27 13:41:48','ab'),(136,37,84,6,3,'日本⇄ホノルル JAL','日本⇄ホノルル JAL',NULL,2.324800,40000,40000,NULL,40000,NULL,1.00000000,2,NULL,'2015-11-27 13:42:59','ab'),(137,38,84,6,3,'東京→大阪（片道）JAL 1P=2.5マイル','東京→大阪（片道）JAL 1P=2.5マイル',NULL,1.670000,7000,7000,NULL,7000,NULL,0.40000000,2,NULL,'2015-11-27 14:16:37','ab'),(138,39,84,6,3,'東京⇄大阪 JAL 2P=1マイル','東京⇄大阪 JAL 2P=1マイル',NULL,1.948300,1,12000,NULL,12000,NULL,2.00000000,2,NULL,'2015-11-29 23:05:33','ab'),(139,39,84,6,3,'日本⇄ソウル JAL 2P=1マイル','日本⇄ソウル JAL 2P=1マイル',NULL,3.481300,15000,15000,NULL,15000,NULL,2.00000000,2,NULL,'2015-11-29 23:05:25',''),(140,39,84,6,3,'日本⇄香港 2P=1マイル','日本⇄香港 2P=1マイル',NULL,3.459000,20000,20000,NULL,20000,NULL,2.00000000,2,NULL,'2015-11-29 23:05:19','ab'),(141,39,84,6,3,'日本⇄シンガポール JAL 2P=1マイル','日本⇄シンガポール JAL 2P=1マイル',NULL,1.464900,35000,35000,NULL,35000,NULL,2.00000000,2,NULL,'2015-11-29 23:05:11','ab'),(142,39,84,6,3,'日本⇄ホノルル JAL 2P=1マイル','日本⇄ホノルル JAL 2P=1マイル',NULL,2.324800,40000,40000,NULL,40000,NULL,2.00000000,2,NULL,'2015-11-29 23:05:04','a '),(143,39,84,6,3,'日本⇄バンクーバー JAL 2P=1マイル','日本⇄バンクーバー JAL 2P=1マイル',NULL,2.543200,50000,50000,NULL,NULL,NULL,2.00000000,2,NULL,'2015-11-29 23:04:47','ab'),(144,39,84,6,3,'東京→大阪（片道）JAL 2P=1マイル','東京→大阪（片道）JAL 2P=1マイル',NULL,1.670000,7000,7000,NULL,7000,NULL,2.00000000,2,NULL,'2015-11-29 23:39:05','ab'),(145,39,84,6,3,'東京→福岡（片道）JAL 2P=1マイル','東京→福岡（片道）JAL 2P=1マイル',NULL,1.657600,8500,8500,NULL,8500,NULL,2.00000000,2,NULL,'2015-11-29 23:40:01','ab'),(146,39,84,10,2,'Pontaポイントに交換 5,000P→4,750 Ponta P ','Pontaポイントに交換 5,000P→4,750 Ponta P',NULL,1.000000,5000,5000,NULL,5000,NULL,1.05263158,1,'https://dpoint.jp/ctrw/web/use/buy_products/buy_products_use_list.html#_ga=1.61394668.1585628774.1448788781','2016-01-17 06:36:37',''),(147,30,84,10,2,'Sports Authorityでポイントを使う1P→1円','Sports Authorityでポイントを使う1P→1円',NULL,1.000000,500,1000,NULL,1000,NULL,1.00000000,1,'http://www.aeon.co.jp/point/use/shopping.html','2016-01-17 06:47:05',''),(148,39,84,11,2,'iD電子マネーに交換 2,000P→2,000円相当','iD電子マネーに交換 2,000P→2,000円相当',NULL,1.000000,2000,2000,NULL,2000,NULL,1.00000000,1,'https://dpoint.jp/ctrw/web/use/item_change/detail/gift_use_detail.html#_ga=1.128674124.1585628774.1448788781','2016-01-18 22:25:09',''),(150,39,84,9,2,'全国で使えるギフトカード 8,000P→5,000円分','全国で使えるギフトカード 8,000P→5,000円分',NULL,0.625000,8000,8000,40000,8000,NULL,1.00000000,1,'https://dpoint.jp/ctrw/web/use/buy_products/buy_products_use_list.html#_ga=1.69960272.1585628774.1448788781','2016-01-18 22:54:25',''),(151,30,84,9,2,'ワタミグループ外食商品券 1,000P→1,000円分','ワタミグループ外食商品券 1,000P→1,000円分',NULL,1.000000,1000,1000,NULL,1000,NULL,1.00000000,1,'http://tokimeki.aeon.co.jp/detail.html?id=2457&category=411&page=200','2016-01-18 22:58:35',''),(153,40,84,9,2,'AOYAMAギフト券','AOYAMAギフト券',NULL,10.000000,1000,1000,NULL,1000,NULL,1.00000000,1,'http://matsunosuke.jp/life-card/','2016-02-09 21:35:36','ab'),(154,40,84,9,2,'Amazon 5000円商品券','Amazon 5000円商品券',NULL,0.050000,1000,1000,NULL,1000,NULL,1.00000000,1,'http://matsunosuke.jp/life-card/','2016-02-11 03:26:13','ab'),(155,40,84,9,2,'Amazon 10,000円商品券','Amazon 10,000円商品券',NULL,0.055550,1800,1800,NULL,1800,NULL,1.00000000,1,'http://matsunosuke.jp/life-card/','2016-02-11 03:28:05','ab'),(156,41,84,14,2,'請求書にキャッシュバック','請求書にキャッシュバック',NULL,4.500000,1000,1000,NULL,1000,NULL,1.00000000,1,NULL,'2016-02-11 04:58:16','ab'),(157,41,84,11,2,'nanaco ポイントに交換','nanaco ポイントに交換',NULL,5.000000,200,200,NULL,200,NULL,1.00000000,1,NULL,'2016-02-11 05:00:10','ab');
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
  `subcategory` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`reward_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reward_category`
--

LOCK TABLES `reward_category` WRITE;
/*!40000 ALTER TABLE `reward_category` DISABLE KEYS */;
INSERT INTO `reward_category` VALUES (2,'レストラン',NULL,NULL,'2015-06-29 13:26:12','Ben'),(3,'ホテル',NULL,NULL,'2015-06-29 13:26:01','Andrew'),(6,'マイレージ',NULL,NULL,'2015-07-04 23:41:08','AB'),(7,'キャッシュバック',NULL,NULL,'2015-07-04 23:41:23','Andrew'),(9,'商品券',NULL,NULL,'2015-06-30 23:09:05','Andrew'),(10,'購入時割引',NULL,NULL,'2015-12-03 13:53:48','ab'),(11,'電子マネー',NULL,NULL,'2015-12-03 13:54:10','ab'),(12,'None',NULL,'Standby for specifying no category','2015-12-19 05:31:00','Ben'),(13,'キャッシュバック','銀行振り込み型','cashback_to_bank_ac','2015-12-20 04:20:55','ab'),(14,'キャッシュバック','請求書に充当','cashback_to_bill','2015-12-20 04:21:31','ab');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
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
INSERT INTO `scene` VALUES (2,'ネット通販','ネット通販','2015-09-12 23:06:42','ab'),(3,'日用品','日用品','2015-09-12 23:07:11','ab'),(4,'外食','外食','2015-09-12 23:07:32','ab1'),(5,'本・エンタメ','former エンタメ','2015-11-08 02:34:37','ab'),(6,'家電・ホーム','former 家電・ホームセンター','2015-11-08 02:34:56','ab'),(7,'毎月の引き落とし','毎月の引き落とし','2015-09-12 23:08:40','ab'),(8,'カーライフ','カーライフ','2015-09-12 23:08:57','ab'),(9,'ファッション','former ショッピング','2015-11-08 02:34:00','ab'),(10,'トラベル・出張','トラベル・出張','2015-09-12 23:09:28','ab');
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
  `allocation` int(11) DEFAULT '10',
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`store_id`),
  KEY `FK_store_category` (`store_category_id`),
  CONSTRAINT `FK_store_category` FOREIGN KEY (`store_category_id`) REFERENCES `store_category` (`store_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (1,'ファミリーマート',2,NULL,1,10,'2015-10-17 01:56:01','ben'),(2,'スリーエフ',2,NULL,0,10,'2015-04-04 19:56:15','ben'),(3,'イトーヨーカドー',2,NULL,1,50,'2015-11-02 09:33:41','ben'),(4,'7-11',2,NULL,1,10,'2015-10-17 01:56:19','ben'),(5,'Oisix',2,NULL,0,50,'2015-11-02 09:33:52','ab'),(6,'Yahoo!ショッピング',11,NULL,0,100,'2015-11-02 09:34:06','ab'),(7,'SOGO',3,NULL,0,30,'2015-11-07 14:07:48','ab'),(8,'Seibu',3,NULL,0,30,'2015-11-07 14:07:58','ab'),(9,'ファミール',6,NULL,0,10,'2015-10-20 09:50:07','ben'),(10,'Loft',8,NULL,0,30,'2015-11-07 14:08:43','ab'),(13,'ヤマダ電機',8,NULL,1,30,'2015-11-07 14:08:20','ab'),(14,'MUJI',8,NULL,1,10,'2015-11-07 14:01:40','ab'),(15,'Uniqlo',3,NULL,1,10,'2015-10-17 01:57:33','ben'),(16,'Apple',8,NULL,0,30,'2015-11-02 09:35:43','ab'),(17,'Tokyu Hands',8,NULL,1,30,'2015-11-07 14:08:35','ab'),(18,'Joshin',8,NULL,0,30,'2015-11-07 14:00:06','ab'),(19,'SEIYU',3,NULL,1,30,'2015-11-02 09:36:06','ab'),(20,'LIVIN',3,NULL,0,30,'2015-11-02 09:36:12','ab'),(21,'じゃらん',10,NULL,1,50,'2015-11-08 12:51:12','ab'),(22,'TSUTAYA',4,NULL,1,10,'2015-10-17 01:58:20','ben'),(23,'阪急第一ホテルグループ',10,NULL,0,50,'2015-11-02 09:36:40','ab'),(24,'ニッポンレンタカー',10,NULL,0,20,'2015-11-02 09:36:45','ab'),(25,'シダックス',4,NULL,0,10,'2015-10-17 01:58:35','ben'),(26,'Knt!',10,NULL,0,50,'2015-11-02 09:37:02','ab'),(27,'東京無線タクシー',10,NULL,0,30,'2015-11-02 09:37:42','ab'),(28,'プリンスホテルズ',10,NULL,0,50,'2015-11-02 09:37:54','ab'),(29,'JR東日本',10,NULL,0,20,'2015-11-24 13:14:18','ab'),(30,'JTB',10,NULL,0,50,'2015-11-02 09:38:10','ab'),(31,'オートバックス',5,NULL,0,20,'2015-11-02 09:38:28','ab'),(32,'ETC',5,NULL,1,20,'2015-11-02 09:38:58','ab'),(33,'ENEOS/JOMO',5,NULL,1,20,'2015-11-02 09:39:17','ab'),(34,'コスモ',5,NULL,1,20,'2015-11-02 09:39:23','ab'),(35,'出光',5,NULL,1,20,'2015-11-02 09:39:30','ab'),(36,'マツダ',5,NULL,0,20,'2015-11-08 12:53:42','ab'),(37,'カーコンビニ倶楽部',5,NULL,0,20,'2015-11-02 09:39:46','ab'),(38,'オリックスレンタカー',10,NULL,0,20,'2015-11-02 09:39:52','ab'),(39,'ドトール・エクセルシオールカフェ',6,NULL,1,5,'2015-11-02 09:39:56','ben'),(40,'ガスト',6,NULL,1,10,'2015-10-17 01:59:53','ben'),(41,'バーミヤン',6,NULL,1,10,'2015-10-17 02:00:04','ben'),(42,'牛角',6,NULL,0,10,'2015-04-04 19:56:15','ben'),(43,'Denny\'s',6,NULL,0,10,'2015-04-04 19:56:15','ben'),(44,'ロッテリア',6,NULL,0,10,'2015-04-04 19:56:15','ben'),(45,'HOT PEPPER グルメ',6,NULL,0,10,'2015-12-04 09:44:04','AB'),(46,'モバイルSUICA',7,NULL,0,20,'2015-11-02 09:40:36','ab'),(47,'リボ利用',1,NULL,0,100,'2015-11-02 09:40:44','ab'),(48,'電気支払い',9,NULL,1,10,'2015-11-07 12:54:41','ab'),(49,'楽天Edy',7,NULL,0,20,'2015-11-02 09:40:57','ab'),(50,'楽天市場',11,NULL,1,100,'2015-11-02 09:41:06','AB'),(51,'標準ポイント',7,NULL,0,100,'2015-11-02 09:41:11','ab'),(52,'海外一般店利用',10,NULL,1,10,'2016-02-12 10:26:23','ab'),(53,'牛角',1,NULL,0,10,'2015-11-07 14:33:47','ab'),(54,'阪急第一ホテルグループ',1,NULL,0,50,'2015-11-23 13:29:18','ab'),(55,'7-Net Shopping',11,NULL,0,100,'2015-11-02 09:41:45','ab'),(56,'ENEOS',1,NULL,0,20,'2015-11-07 14:37:54','ab'),(57,'iD',7,NULL,0,20,'2015-11-02 09:41:59','ab'),(58,'JOMO',1,NULL,0,20,'2015-11-07 14:36:58','ab'),(59,'nanaco',7,NULL,0,20,'2015-11-02 09:42:14','ab'),(60,'QuicPay',7,NULL,0,20,'2015-11-02 09:42:20','ab'),(61,'SMART ICOCA',7,NULL,0,20,'2015-11-02 09:42:27','ab'),(62,'Waon',7,NULL,0,20,'2015-11-02 09:42:32','ab'),(63,'ヤマト',1,NULL,0,20,'2015-11-07 14:19:09','ab'),(64,'Amazon',11,NULL,1,100,'2015-11-02 09:42:57','ab'),(65,'東急ホテルズ',10,NULL,0,50,'2015-11-02 09:43:03','AB'),(66,'永久不減標準ポイント',7,'永久不減プログラム',0,100,'2015-11-02 09:43:10','AB'),(67,'ヨドバシカメラ',8,NULL,0,30,'2015-11-02 09:43:26','AB'),(68,'えきねっと',10,NULL,0,30,'2015-11-02 09:43:43','AB'),(69,'紀伊國屋書店',4,NULL,0,10,'2015-11-07 14:02:44','AB'),(70,'トヨタレンタカー',10,'エンタメ・旅行',0,20,'2015-11-02 09:43:59','ab'),(71,'DAIMARU',3,NULL,0,30,'2015-11-02 09:44:12','AB'),(72,'松坂屋',3,NULL,0,30,'2015-11-11 14:05:32','AB'),(73,'Royal Host',6,NULL,0,10,'2015-11-02 09:44:22','ab'),(74,'Softbank',9,NULL,0,30,'2015-11-07 14:01:58','ab'),(75,'Yahoo! トラベル',10,NULL,0,50,'2015-11-02 09:45:04','ab'),(76,'マルイ',3,NULL,0,30,'2015-11-02 09:45:10','ab'),(77,'APA ホテル',10,NULL,0,50,'2015-11-07 14:18:30','ab'),(78,'H.I.S.',10,NULL,0,50,'2015-11-02 09:45:21','ab'),(79,'タイムズ',10,NULL,0,20,'2015-11-07 14:38:47','ab'),(80,'Big Echo',4,NULL,0,10,'0000-00-00 00:00:00','ab'),(81,'KEYUCA',8,NULL,0,20,'2015-11-02 09:45:40','ab'),(82,'一休.com',10,NULL,0,50,'2015-11-02 09:45:44','ab'),(83,'Expedia',10,NULL,0,50,'2015-11-07 14:17:19','ab'),(84,'None',1,'default store if nothing is displayed',9,10,'2015-10-10 21:54:41','ben'),(85,'HOT PEPPER ビューティー',12,NULL,1,10,'2015-10-20 10:04:28','ab'),(86,'au',9,'au',0,30,'2015-11-07 12:48:24','ab'),(87,'docomo',9,NULL,0,30,'2015-11-07 12:48:32','ab'),(88,'AEON',2,'AEON',0,50,'2015-11-07 14:21:41','ab'),(89,'マルエツ',2,'マルエツ',0,50,'2015-11-07 12:49:20','ab'),(90,'Daiei',2,NULL,0,50,'2015-11-07 12:49:49','ab'),(91,'LIFE',2,NULL,0,50,'2015-11-07 12:50:07','ab'),(92,'ドンキホーテ',2,NULL,0,50,'2015-11-07 12:51:14','ab'),(94,'やよい軒',6,NULL,0,10,'2015-11-07 12:52:06','ab'),(95,'Coco\'s',6,NULL,0,10,'2015-11-07 12:52:21','ab'),(96,'大戸屋',6,NULL,0,10,'2015-11-07 12:52:46','ab'),(98,'DeNA',11,NULL,0,100,'2015-11-07 12:53:50','ab'),(99,'ガス支払い',9,NULL,0,5,'2015-11-07 12:55:08','ab'),(100,'水道支払い',9,NULL,1,5,'2015-11-07 12:55:22','ab'),(101,'各種税金支払い',9,NULL,0,10,'2015-11-07 12:56:32','ab'),(102,'LAWSON',2,NULL,1,10,'2015-11-07 14:13:29','ab'),(103,'Natural Lawson',2,NULL,0,10,'2015-11-07 12:57:34','ab'),(104,'Daily Yamazaki',2,NULL,0,10,'2015-11-07 12:57:52','ab'),(105,'MINISTOP',2,NULL,0,10,'2015-11-07 13:55:54','ab'),(106,'Shell',5,NULL,0,20,'2015-11-07 13:57:18','ab'),(107,'Esso',5,NULL,0,20,'2015-11-07 13:57:40','ab'),(108,'IKEA',8,NULL,0,30,'2015-11-07 13:59:27','ab'),(109,'ニトリ',8,NULL,0,30,'2015-11-07 13:59:57','ab'),(110,'IDC 大塚',8,NULL,0,30,'2015-11-07 14:21:05','ab'),(111,'三越',3,NULL,1,30,'2015-11-07 14:13:35','ab'),(112,'ISETAN',3,NULL,0,30,'2015-11-07 14:10:21','ab'),(113,'阪急',3,NULL,0,30,'2015-11-07 14:10:53','ab'),(114,'東急',3,NULL,0,10,'2015-11-07 14:11:18','ab'),(115,'有隣堂',4,NULL,0,10,'2015-11-07 14:13:47','ab'),(116,'ジュンク堂',4,NULL,0,10,'2015-11-07 14:13:54','ab'),(117,'カラオケ館',4,NULL,0,10,'2015-11-07 14:13:15','ab'),(118,'LUMINE',3,NULL,0,30,'2015-11-07 14:14:35','ab'),(119,'ANA',10,'ANA',1,10,'2015-11-18 13:09:55','ab'),(120,'JAL',10,'JAL',1,10,'2015-11-18 13:10:08','ab'),(121,'日本旅行',10,'日本旅行',0,10,'2015-11-18 13:15:07','ab'),(122,'ビックカメラ',8,NULL,1,20,'2015-11-23 06:43:07','ab'),(123,'Y! mobile',9,'Y! mobile',0,10,'2015-11-24 23:38:37','ab'),(124,'THE SUITS COMPANY',3,'THE SUITS COMPANY',0,10,'2015-11-29 10:42:14','ab'),(125,'洋服の青山',3,'洋服の青山',0,10,'2015-11-29 10:42:39','ab'),(126,'JEANSMATE',1,'JEANSMATE',0,10,'2015-11-29 10:43:24','ab'),(127,'楽天トラベル',10,'楽天トラベル',1,20,'2015-12-20 04:30:51','ab'),(128,'SPORTS AUTHORITY',1,'本・エンタメ',0,10,'2016-01-17 06:43:58','ab'),(129,'海外利用',1,'海外利用',1,10,'2016-01-23 00:57:58','ab'),(130,'スターバックス',6,'スターバックス',1,5,'2016-02-11 04:45:39','ab');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_category`
--

LOCK TABLES `store_category` WRITE;
/*!40000 ALTER TABLE `store_category` DISABLE KEYS */;
INSERT INTO `store_category` VALUES (1,'None','None','2015-08-07 21:12:54','ben'),(2,'日用品','(previously スーパー・コンビニ)','2015-10-17 02:17:35','ab'),(3,'ファッション','ファッション','2015-11-07 12:31:43','ben'),(4,'本・エンタメ','(previously エンタメ・旅行）','2015-11-08 01:52:45','ab'),(5,'カーライフ','カーライフ','2015-08-07 21:12:54','ben'),(6,'外食','(previously レストラン・カフェ)','2015-10-17 23:19:53','ab'),(7,'Point System','Point System','2015-08-07 21:12:54','ben'),(8,'家電・ホーム','家電・ホーム','2015-11-07 12:29:27','ab'),(9,'毎月の引き落とし','毎月の引き落とし','2015-10-17 23:21:11','ab'),(10,'トラベル・出張','トラベル・出張','2015-10-17 23:22:08','ab'),(11,'ネット通販','Net shopping','2015-10-20 09:34:19','ab'),(12,'ビューティー','Beauty','2015-10-20 10:03:33','ab');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_history`
--

LOCK TABLES `store_history` WRITE;
/*!40000 ALTER TABLE `store_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip`
--

DROP TABLE IF EXISTS `trip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trip` (
  `trip_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_city_id` int(11) NOT NULL,
  `to_city_id` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `display` varchar(255) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  PRIMARY KEY (`trip_id`),
  KEY `trip_from_city_city` (`from_city_id`),
  KEY `trip_to_city_city` (`to_city_id`),
  KEY `fk_trip_unit` (`unit_id`),
  CONSTRAINT `trip_from_city_city` FOREIGN KEY (`from_city_id`) REFERENCES `city` (`city_id`),
  CONSTRAINT `trip_to_city_city` FOREIGN KEY (`to_city_id`) REFERENCES `city` (`city_id`),
  CONSTRAINT `fk_trip_unit` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip`
--

LOCK TABLES `trip` WRITE;
/*!40000 ALTER TABLE `trip` DISABLE KEYS */;
INSERT INTO `trip` VALUES (2,2,3,0,2,NULL,'2016-02-11 03:11:35','ab');
/*!40000 ALTER TABLE `trip` ENABLE KEYS */;
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
INSERT INTO `unit` VALUES (1,'points','Points','2016-02-11 05:00:10','ben'),(2,'miles','Miles','2016-02-11 05:58:53','ben'),(3,'',NULL,'2015-07-08 13:06:30','');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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

-- Dump completed on 2016-02-19 22:11:06
