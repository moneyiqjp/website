SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

delete from reward_category where reward_category_id>0;
ALTER TABLE reward_category AUTO_INCREMENT = 0;

INSERT IGNORE INTO `reward_category` (`reward_category_id`, `name`, `description`, `update_time`, `update_user`) VALUES
	(1, 'Beauty', NULL, NOW(), 'Ben'),
	(2, 'Restaurants', NULL, NOW(), 'Ben'),
	(3, 'Travel', NULL, NOW(), 'Ben'),
	(4, 'Supermarkets/Combini', NULL, NOW(), 'Ben'),
	(5, 'Auto', NULL, NOW(), 'Ben'),
	(6, 'Mileage', NULL, NOW(), 'Ben'),
	(7, 'E-Money', NULL, NOW(), 'Ben'),
	(8, 'Net shopping', NULL, NOW(), 'Ben'),
	(9, 'Limited Ed. Goods', NULL, NOW(), 'Ben'),
	(10, 'Shopping', NULL, NOW(), 'Ben'),
	(11, 'Electronics', NULL, NOW(), 'Ben'),
	(12, 'Health & Beauty', NULL, NOW(), 'Ben'),
	(13, 'Charity', NULL, NOW(), 'Ben'),
	(14, 'Ben', NULL, NOW(), 'Ben'),
	(15, 'Other', NULL, NOW(), 'Ben');
	
SET FOREIGN_KEY_CHECKS = 1;