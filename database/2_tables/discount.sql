SET NAMES utf8;
use moneyiq;
-- Table point_use

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `discount`;

CREATE TABLE `discount` (
	`discount_id` INT(11) NOT NULL AUTO_INCREMENT,
	`point_system_id` INT(11) NOT NULL,
	`percentage` DOUBLE(15,15) NOT NULL,
	`start_date` DATE NULL DEFAULT NULL,
	`end_date` DATE NULL DEFAULT NULL,
	`description` TEXT NULL COLLATE 'utf8_general_ci',
	`store_id` INT(11) NOT NULL,
	`multiple` DOUBLE(30,30) NOT NULL,
	`conditions` TEXT NULL COLLATE 'utf8_general_ci',
	`update_time` DATETIME NOT NULL,
	`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`discount_id`),
	INDEX `fk_discount_point_system` (`point_system_id`),
	INDEX `fk_discount_store` (`store_id`),
	CONSTRAINT `fk_discount_point_system_key` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`),
	CONSTRAINT `fk_discount_store_key` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

insert into discount (point_system_id, percentage, start_date, end_date, description, store_id, multiple, conditions, update_time, update_user )
select distinct 
	point_system_id, percentage, start_date, end_date, description, store_id, multiple, conditions, pu.update_time, pu.update_user
  from card_point_system cps inner join discounts pu on pu.credit_card_id=cps.credit_card_id
 where 0 < (select count(*) from INFORMATION_SCHEMA.tables where table_name = 'discounts' and  TABLE_SCHEMA = 'moneyiq');

DROP TABLE IF EXISTS `discount_history`;
DROP TABLE IF EXISTS `discounts`;

SET FOREIGN_KEY_CHECKS = 1;
