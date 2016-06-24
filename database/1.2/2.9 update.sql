DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_9;

DELIMITER //
CREATE PROCEDURE UpgradeMoneyIQ2_9(IN varDatabase varchar(20)) 
BEGIN

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='season_date' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='season_id') THEN	
				ALTER TABLE `season_date`
					ADD COLUMN `season_id` INT(11) NULL AFTER `season_date_id`;
				
				
				Update season_date set season_id=(select min(season_id) from season) where season_id is null;
				
				ALTER TABLE `season_date`
					CHANGE COLUMN `season_id` `season_id` INT(11) NOT NULL  AFTER `season_date_id`;			
				
				ALTER TABLE `season_date`	
					ADD CONSTRAINT `fk_season_date_season` FOREIGN KEY (`season_id`) REFERENCES `season` (`season_id`);
				
				SELECT 'Updated table season_date with season_id';
	else
		SELECT 'table season_date already up to date';
	end if;

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='credit_card' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='review_url') THEN
			ALTER TABLE `credit_card`
				ADD COLUMN `review_url` VARCHAR(255) NULL AFTER `isActive`;
		SELECT 'ADDED credit_card.review_url';
	else
		SELECT 'EXISTED credit_card.review_url';
	end if;

	if exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='zone_city_map' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='city_id') THEN
		ALTER TABLE `zone_city_map`
			DROP FOREIGN KEY `fk_zone_city_map_city`,
			DROP FOREIGN KEY `fk_zone_city_map_zone`;
		ALTER TABLE `zone_city_map`
			ALTER `city_id` DROP DEFAULT;
		RENAME TABLE zone_city_map to zone_trip_map;		
		ALTER TABLE `zone_trip_map`
			CHANGE COLUMN `city_id` `trip_id` INT(11) NOT NULL AFTER `zone_id`,
			ADD CONSTRAINT `fk_zone_trip_map_trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
			ADD CONSTRAINT `fk_zone_trip_map_zone` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`);
		SELECT 'ADDED zone_trip_map';
	else
		SELECT 'EXISTED zone_trip_map';
	end if;
	





END //
DELIMITER ;
CALL UpgradeMoneyIQ2_9(DATABASE());

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_9;