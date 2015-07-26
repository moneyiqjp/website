-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Dumping data for table moneyiq.reward_type: ~4 rows (approximately)
/*!40000 ALTER TABLE `reward_type` DISABLE KEYS */;
INSERT IGNORE INTO `reward_type` (`reward_type_id`, `name`, `description`, `update_time`, `update_user`) VALUES
	(1, 'discount', NULL, '0000-00-00 00:00:00', ''),
	(2, 'exchange', NULL, '0000-00-00 00:00:00', ''),
	(3, 'free product', NULL, '0000-00-00 00:00:00', ''),
	(4, 'charity', NULL, '0000-00-00 00:00:00', '');
/*!40000 ALTER TABLE `reward_type` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
