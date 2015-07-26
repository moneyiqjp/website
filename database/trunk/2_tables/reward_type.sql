use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `reward_type`;

CREATE TABLE `reward_type` (
	`reward_type_id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`description` TEXT NULL COLLATE 'utf8_general_ci',
	`is_finite` TINYINT(4) NULL DEFAULT '0',
	`update_time` DATETIME NOT NULL,
	`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`reward_type_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;


DROP TABLE IF EXISTS `reward_type_history`;

CREATE TABLE `reward_type_history` (
	`reward_type_id` INT(11) NOT NULL,
	`name` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`description` TEXT NULL COLLATE 'utf8_general_ci',
	`time_beg` DATETIME NOT NULL,
	`time_end` DATETIME NULL DEFAULT NULL,
	`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`reward_type_id`, `time_beg`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

SET FOREIGN_KEY_CHECKS = 1;