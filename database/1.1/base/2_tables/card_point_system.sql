use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `card_point_system`;
SET sql_notes = 1;

CREATE TABLE `card_point_system` (
	`card_point_system_id` INT(11) NOT NULL AUTO_INCREMENT,
	`credit_card_id` INT(11) NOT NULL,
	`point_system_id` INT(11) NOT NULL,
	`priority_id` INT(11) NULL DEFAULT '100',
	`update_time` DATETIME NOT NULL,
	`update_user` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`card_point_system_id`),
	INDEX `fk_credit_card_id` (`credit_card_id`),
	INDEX `fk_point_system` (`point_system_id`),
	CONSTRAINT `fk_credit_card_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
	CONSTRAINT `fk_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

SET FOREIGN_KEY_CHECKS = 1;