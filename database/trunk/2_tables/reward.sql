use moneyiq;
SET NAMES utf8;
-- Table point_acquisition

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `reward`;
DROP TABLE IF EXISTS `reward_history`;

SET sql_notes = 1;


CREATE TABLE `reward` (
	`reward_id` INT(11) NOT NULL AUTO_INCREMENT,
	`point_system_id` INT(11) NOT NULL,
	`reward_category_id` INT(11) NULL DEFAULT NULL,
	`reward_type_id` INT(11) NULL DEFAULT NULL,
	`title` VARCHAR(255) NULL DEFAULT NULL,
	`description` TEXT NULL,
	`icon` VARCHAR(255) NULL DEFAULT NULL,
	`yen_per_point` DECIMAL(10,6) NOT NULL,
	`price_per_unit` INT(11) NULL DEFAULT NULL,
	`min_points` INT(11) NULL DEFAULT NULL,
	`max_points` INT(11) NULL DEFAULT NULL,
	`required_points` INT(11) NULL DEFAULT NULL,
	`max_period` VARCHAR(255) NULL DEFAULT NULL,
	`point_multiplier` DECIMAL(10,8) NOT NULL DEFAULT '1.00000000',
	`unit` VARCHAR(100) NULL DEFAULT NULL,
	`reference` VARCHAR(255) NULL DEFAULT NULL,
	`update_time` DATETIME NOT NULL,
	`update_user` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`reward_id`),
	INDEX `FK_reward_point_system` (`point_system_id`),
	INDEX `FK_reward_category_id` (`reward_category_id`),
	INDEX `FK_reward_type` (`reward_type_id`),
	CONSTRAINT `FK_reward_category_id` FOREIGN KEY (`reward_category_id`) REFERENCES `reward_category` (`reward_category_id`),
	CONSTRAINT `FK_reward_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`),
	CONSTRAINT `FK_reward_type` FOREIGN KEY (`reward_type_id`) REFERENCES `reward_type` (`reward_type_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;


CREATE TABLE reward_history (
    reward_id int    NOT NULL,
    point_system_id int    NOT NULL ,
	`reward_category_id` INT(11) NULL DEFAULT NULL,
	`reward_type_id` INT(11) NULL DEFAULT NULL,
    title varchar(255)    NULL ,
    description text NULL,
    icon varchar(255) NULL,
    yen_per_point decimal(10,6)    NOT NULL ,
    price_per_unit int    NULL ,
    min_points int    NULL ,
    max_points int    NULL ,
    required_points int    NULL ,
    max_period  varchar(255)    NULL ,
	`point_multiplier` DECIMAL(10,8) NOT NULL DEFAULT '1.00000000',
	`unit` VARCHAR(100) NULL DEFAULT NULL,
	`reference` VARCHAR(255) NULL DEFAULT NULL,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_reward_pksystem_pk PRIMARY KEY (reward_id,time_beg)
);



SET FOREIGN_KEY_CHECKS = 1;

