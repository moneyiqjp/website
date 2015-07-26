use moneyiq;
SET NAMES utf8;
-- Table point_acquisition

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `point_system`;
DROP TABLE IF EXISTS `point_system_history`;
DROP TABLE IF EXISTS `card_point_system`;
SET sql_notes = 1;

CREATE TABLE point_system (
    point_system_id int    NOT NULL AUTO_INCREMENT,
    point_system_name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
	`default_points_per_yen` DECIMAL(8,6) NOT NULL DEFAULT '0.010000',
	`default_yen_per_point` DECIMAL(8,6) NOT NULL DEFAULT '1.000000',
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_system_pk PRIMARY KEY (point_system_id)
);

CREATE TABLE point_system_history (
    point_system_id int    NOT NULL ,
    point_system_name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
	`default_points_per_yen` DECIMAL(8,6) NOT NULL DEFAULT '0.010000',
	`default_yen_per_point` DECIMAL(8,6) NOT NULL DEFAULT '1.000000',
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_system_pk PRIMARY KEY (point_system_id,time_beg)
);


CREATE TABLE card_point_system (
   `card_point_system_id` int    NOT NULL AUTO_INCREMENT,
	`credit_card_id` INT(11) NOT NULL,
	`point_system_id` INT(11) NOT NULL,
	`priority_id` INT(11) NULL DEFAULT '100',
	`update_time` DATETIME NOT NULL,
	`update_user` VARCHAR(100) NOT NULL,
	CONSTRAINT card_point_system_pk PRIMARY KEY (card_point_system_id),
	CONSTRAINT `fk_credit_card_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
	CONSTRAINT `fk_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`)
);

SET FOREIGN_KEY_CHECKS = 1;
