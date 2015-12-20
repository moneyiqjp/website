DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_7;

DELIMITER //
CREATE PROCEDURE UpgradeMoneyIQ2_7(IN varDatabase varchar(20)) 
BEGIN

	if not exists(select 1 from information_schema.`TABLES` a where a.TABLE_NAME='map_persona_store' and TABLE_SCHEMA=varDatabase) THEN	
		CREATE TABLE `map_persona_store` (
			`persona_id` INT(11) NOT NULL,
			`store_id` INT(11) NOT NULL,
			`percentage` DOUBLE NULL DEFAULT '0.05',
			`negative` TINYINT NULL DEFAULT '0',
			`update_time` DATETIME NOT NULL,
			`update_user` VARCHAR(100) NOT NULL,
			PRIMARY KEY (`persona_id`, `store_id`),
			INDEX `ind_mperstore_persona_id` (`persona_id`),
			INDEX `ind_mperstore_store_id` (`store_id`),
			CONSTRAINT `fk_mperstore_persona_id` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`),
			CONSTRAINT `fk_mperstore_store_id` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`)
		)
		COLLATE='utf8_general_ci'
		ENGINE=InnoDB
		;
		SELECT 'ADDED map_persona_store';
	else
		SELECT 'EXISTED map_persona_store';
	end if;	




	
END //
DELIMITER ;
CALL UpgradeMoneyIQ2_7(DATABASE());

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_7;