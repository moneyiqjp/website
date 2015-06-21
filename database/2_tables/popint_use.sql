SET NAMES utf8;
use moneyiq;
-- Table point_use

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `point_use`;

CREATE TABLE `point_use` (
	`point_use_id` INT(11) NOT NULL AUTO_INCREMENT,
	`point_system_id` INT(11) NOT NULL,
	`store_id` INT(11) NOT NULL,
	`yen_per_point` DECIMAL(8,6) NOT NULL,
	`update_time` DATETIME NOT NULL,
	`update_user` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`point_use_id`),	
	INDEX `point_use_point_system` (`point_system_id`),
	INDEX `point_use_store` (`store_id`),
	CONSTRAINT `point_use_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
	CONSTRAINT `point_use_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

insert into point_use (point_system_id, store_id, yen_per_point, update_time, update_user )
select distinct 
	point_system_id, store_id, yen_per_point, pu.update_time, pu.update_user 
  from card_point_system cps inner join point_usage pu on pu.credit_card_id=cps.credit_card_id
 where 0 < (select count(*) from INFORMATION_SCHEMA.tables where table_name = 'point_usage' and  TABLE_SCHEMA = 'moneyiq');

DROP TABLE IF EXISTS `point_usage`;

SET FOREIGN_KEY_CHECKS = 1;
