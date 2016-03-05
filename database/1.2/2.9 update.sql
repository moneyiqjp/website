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
	
	
	



END //
DELIMITER ;
CALL UpgradeMoneyIQ2_9(DATABASE());

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_9;