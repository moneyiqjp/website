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
				`name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
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


	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='mileage' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='mileage_id') THEN
			CREATE TABLE `mileage` (
				`mileage_id` INT(11) NOT NULL AUTO_INCREMENT,
				`store_id` INT(11) NOT NULL,
				`point_system_id` INT(11) NOT NULL,
				`trip_id` INT(11) NOT NULL,
				`required_miles` INT(11) NOT NULL,
				`value_in_yen` INT(11) NOT NULL,
				`display` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`update_time` DATETIME NOT NULL,
				`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`mileage_id`),
				CONSTRAINT `fk_mileage_trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
				CONSTRAINT `fk_mileage_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
				CONSTRAINT `fk_mileage_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table mileage';
	else
		SELECT 'EXISTED table mileage';
	end if;
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='mileage' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='display_long') THEN
			ALTER TABLE `mileage`
				CHANGE COLUMN `display` `display` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci' AFTER `value_in_yen`,
				ADD COLUMN `display_long` VARCHAR(255) NULL COLLATE 'utf8_general_ci' AFTER `display`;
		SELECT 'ADDED mileage.display_long';
	else
		SELECT 'EXISTED mileage.display_long';
	end if;
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='season' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='season_id') THEN
			CREATE TABLE `season` (				
				`season_id` INT(11) NOT NULL AUTO_INCREMENT,
				`point_system_id` INT(11) NOT NULL,
				`name` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				`season_type` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				`from_date` Date NULL,
				`to_date` Date NULL,
				`update_time` DATETIME NOT NULL,
				`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`season_id`),
				CONSTRAINT `fk_season_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table season';
	else
		SELECT 'EXISTED table season';
	end if;
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='mileage_type' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='mileage_type_id') THEN
			CREATE TABLE `mileage_type` (
				`mileage_type_id` INT(11) NOT NULL AUTO_INCREMENT,
				`round_trip` TINYINT NOT NULL DEFAULT '0',
				`season_id` INT(11) NOT NULL,
				`class` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',				
				`ticket_type` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`display` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`trip_length` INT(11) NOT NULL,
				`update_time` DATETIME NOT NULL,
				`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`mileage_type_id`),
				CONSTRAINT `fk_mileage_type_season` FOREIGN KEY (`season_id`) REFERENCES `season` (`season_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table mileage_type';
	else
		SELECT 'EXISTED table mileage_type';
	end if;
	
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='flight_cost' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='mileage_type_id') THEN
			CREATE TABLE `flight_cost` (
				`flight_cost_id` INT(11) NOT NULL AUTO_INCREMENT,
				`retrieval_date` date NOT NULL,
				`point_system_id` INT(11) NOT NULL,
				`mileage_type_id` INT(11) NOT NULL,
				`trip_id` INT(11) NOT NULL,
				`fare_type` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8_general_ci',				
				`depart_date` DATE NULL,
				`depart_flight_no` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`return_date` DATE NULL,				
				`return_flight_no` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`price` INT(15) NOT NULL,
				`reference` VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`flight_cost_id`),
				CONSTRAINT `fk_flight_cost_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`),
				CONSTRAINT `fk_flight_cost_milage_type` FOREIGN KEY (`mileage_type_id`) REFERENCES `mileage_type` (`mileage_type_id`),
				CONSTRAINT `fk_flight_cost_trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table flight_cost';
	else
		SELECT 'EXISTED table flight_cost';
	end if;

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='mileage' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='mileage_type_id') THEN	
				ALTER TABLE `mileage`
					ADD COLUMN `mileage_type_id` INT(11) NOT NULL  AFTER `required_miles`;
				ALTER TABLE `mileage`	
					ADD CONSTRAINT `fk_mileage_mileage_type` FOREIGN KEY (`mileage_type_id`) REFERENCES `mileage_type` (`mileage_type_id`);
				SELECT 'Updated table mileage with mileage_type';
	else
		SELECT 'table mileage already up to date';
	end if;

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='season' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='display') THEN	
		ALTER TABLE `season`
			ADD COLUMN `display` VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci' AFTER `to_date`;
		SELECT 'Updated table season with display';
	else
		SELECT 'table season already up to date';
	end if;
	
		if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='season_type' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='season_type_id') THEN
			CREATE TABLE `season_type` (
				`season_type_id` INT(11) NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(150) NULL DEFAULT NULL COLLATE 'utf8_general_ci',								
				`display` VARCHAR(150) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
				`update_time` DATETIME NOT NULL,
				`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`season_type_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table season_type';
	else
		SELECT 'EXISTED table season_type';
	end if;

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='season' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='reference') THEN	
			ALTER TABLE `season`
					ADD COLUMN `reference` VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci'  AFTER `display`;
		SELECT 'Updated table season with reference';
	else
		SELECT 'table season already has reference';
	end if;

	if exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='season' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='season_type') THEN	
		ALTER TABLE `season`
			CHANGE COLUMN `season_type` `season_type_name` VARCHAR(100) NULL DEFAULT NULL AFTER `name`;
		insert into season_type (name) select distinct season_type_name from season;
		ALTER TABLE `season`
			ADD COLUMN `season_type_id` INT(11) NULL DEFAULT NULL AFTER `season_type_name`;		
		Update season s INNER JOIN season_type st ON st.name=s.season_type_name set  s.season_type_id = st.season_type_id;	
		SELECT 'Updated table season with season type name';
	else
		SELECT 'table season already has season type name';
	end if;

	if exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='season' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='season_type_name') THEN	
		ALTER TABLE `season`
			ALTER `season_type_id` DROP DEFAULT;
		ALTER TABLE `season`
			CHANGE COLUMN `season_type_id` `season_type_id` INT(11) NOT NULL AFTER `season_type_name`;
		ALTER TABLE `season`	DROP COLUMN `season_type_name`;		
		ALTER TABLE `season`
			ADD CONSTRAINT `fk_season_season_type` FOREIGN KEY (`season_type_id`) REFERENCES `season_type` (`season_type_id`);
		SELECT 'Updated table season with season type id';
	else
		SELECT 'table season already has season type id';
	end if;

	if exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='mileage_type' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='season_id') THEN	
		ALTER TABLE `mileage_type`
			ADD COLUMN `season_type_id` INT(11) NULL DEFAULT NULL AFTER `season_id`;
		update mileage_type mt inner join season s on mt.season_id=s.season_id set mt.season_type_id=s.season_type_id;
		ALTER TABLE `mileage_type`
			DROP FOREIGN KEY `fk_mileage_type_season`;
		ALTER TABLE `mileage_type`
			DROP COLUMN `season_id`;
		ALTER TABLE `mileage_type` DROP COLUMN season_id;
		ALTER TABLE `mileage_type`	ALTER `season_id` DROP DEFAULT;
		ALTER TABLE `mileage_type`	CHANGE COLUMN `season_type_id` `season_type_id` INT(11) NOT NULL AFTER `round_trip`;
		ALTER TABLE `mileage_type`
			ADD CONSTRAINT `fk_mileage_type_season_type` FOREIGN KEY (`season_type_id`) REFERENCES `season_type` (`season_type_id`);
		SELECT 'Updated table season with season type id';
	else
		SELECT 'table season already has season type id';
	end if;
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='zone' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='zone_id') THEN
			CREATE TABLE `zone` (				
				`zone_id` INT(11) NOT NULL AUTO_INCREMENT,
				`point_system_id` INT(11) NOT NULL,
				`name` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				`display` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
				`update_time` DATETIME NULL,
				`update_user` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`zone_id`),
				CONSTRAINT `fk_zone_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table zone';
	else
		SELECT 'EXISTED table zone';
	end if;
		
		
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='season_date' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='season_date_id') THEN
			CREATE TABLE `season_date` (
				`season_date_id` INT(11) NOT NULL AUTO_INCREMENT,	
				`zone_id` INT(11) NOT NULL,
				`from_date` Date NULL,
				`to_date` Date NULL,
				`update_time` DATETIME NOT NULL,
				`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`season_date_id`),
				CONSTRAINT `fk_season_date_zone` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table season_date';
	else
		SELECT 'EXISTED table season_date';
	end if;
	
	if exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='season' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='from_date') THEN
			ALTER TABLE `season`
				DROP COLUMN `from_date`,
				DROP COLUMN `to_date`;
		SELECT 'removed from\to date from season';
	else
		SELECT 'from\to date from season already gone';
	end if;
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='region' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='region_id') THEN
			CREATE TABLE `region` (				
				`region_id` INT(11) NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
				`display` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
				`update_time` DATETIME NULL,
				`update_user` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`region_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table region';
	else
		SELECT 'EXISTED table region';
	end if;

	
		if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='zone_city_map' and TABLE_SCHEMA=varDatabase) THEN
			CREATE TABLE `zone_city_map` (			
				`zone_id` INT(11) NOT NULL,
				`city_id` INT(11) NOT NULL,
				`update_time` DATETIME NULL,
				`update_user` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
				PRIMARY KEY (`zone_id`, `city_id`),
				CONSTRAINT `fk_zone_city_map_zone` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`),
				CONSTRAINT `fk_zone_city_map_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`)
			)
			COLLATE='utf8_general_ci',
			ENGINE=InnoDB
			;
		SELECT 'ADDED table zone_city_map';
	else
		SELECT 'EXISTED table zone_city_map';
	end if;


END //
DELIMITER ;
CALL UpgradeMoneyIQ2_8(DATABASE());

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_8;