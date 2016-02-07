DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_8;

DELIMITER //
CREATE PROCEDURE UpgradeMoneyIQ2_8(IN varDatabase varchar(20)) 
BEGIN

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='persona' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='description_short') THEN
		ALTER TABLE `persona`
			ADD COLUMN `description_short` VARCHAR(250) NULL COLLATE 'utf8_general_ci' AFTER `name`,
			CHANGE COLUMN `description` `description_long` TEXT NULL COLLATE 'utf8_general_ci' AFTER `description_short`;
		SELECT 'ADDED persona.description_short';
	else
		SELECT 'EXISTED persona.description_short';
	end if;	

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='city' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='city_id') THEN
			CREATE TABLE `city` (
				`city_id` INT(11) NOT NULL AUTO_INCREMENT,
				`region` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`display` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`update_time` DATETIME NOT NULL,
				`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`city_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table city';
	else
		SELECT 'EXISTED table city';
	end if;
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='trip' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='trip_id') THEN
			CREATE TABLE `trip` (
				`trip_id` INT(11) NOT NULL AUTO_INCREMENT,
				`from_city_id` INT(11) NOT NULL,
				`to_city_id` INT(11) NOT NULL,
				`distance` INT(11) NOT NULL,
				`unit_id` INT(11) NOT NULL,
				`display` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`update_time` DATETIME NOT NULL,
				`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`trip_id`),
				CONSTRAINT `trip_from_city_city` FOREIGN KEY (`from_city_id`) REFERENCES `city` (`city_id`),
				CONSTRAINT `trip_to_city_city` FOREIGN KEY (`to_city_id`) REFERENCES `city` (`city_id`),
				CONSTRAINT `fk_trip_unit` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table trip';
	else
		SELECT 'EXISTED table trip';
	end if;


	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='milage' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='milage_id') THEN
			CREATE TABLE `milage` (
				`milage_id` INT(11) NOT NULL AUTO_INCREMENT,
				`store_id` INT(11) NOT NULL,
				`trip_id` INT(11) NOT NULL,
				`required_miles` INT(11) NOT NULL,
				`value_in_yen` INT(11) NOT NULL,
				`display` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`update_time` DATETIME NOT NULL,
				`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`milage_id`),
				CONSTRAINT `fk_milage_trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
				CONSTRAINT `fk_milage_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table milage';
	else
		SELECT 'EXISTED table milage';
	end if;
	
END //
DELIMITER ;
CALL UpgradeMoneyIQ2_8(DATABASE());

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_8;