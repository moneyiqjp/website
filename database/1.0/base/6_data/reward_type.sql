SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

delete from reward_type where reward_type_id>0;
ALTER TABLE reward_type AUTO_INCREMENT = 1;

INSERT IGNORE INTO `reward_type` (`reward_type_id`, `name`, `description`, `update_time`, `update_user`) VALUES
	(1, 'discount', NULL, NOW(), 'Ben'),
	(2, 'exchange', NULL, NOW(), 'Ben'),
	(3, 'free product', NULL, NOW(), 'Ben'),
	(4, 'charity', NULL, NOW(), 'Ben'),
	(5, 'other', NULL, NOW(), 'Ben');		
	
SET FOREIGN_KEY_CHECKS = 1;