DELIMITER //
CREATE PROCEDURE UpgradeMoneyIQ2_2(IN varDatabase varchar(20)) 
BEGIN
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='reward' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='store_id') THEN
		ALTER TABLE `reward`
			ADD COLUMN `store_id` INT NULL AFTER `point_system_id`,
			ADD CONSTRAINT `FK_store_id` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);
		SELECT 'ADDED reward.store_id';
	else
			SELECT 'EXISTED reward.store_id';
	end if;
	
	if not exists(select 1 from information_schema.`TABLES` a where a.TABLE_NAME='map_scene_reward_category') THEN	
		
		SELECT 'ADDED map_scene_reward_category';
	else
			SELECT 'EXISTED map_scene_reward_category';
	end if;


END //
DELIMITER ;
CALL UpgradeMoneyIQ2_2('moneyiq_uat');

DROP PROCEDURE UpgradeMoneyIQ2_2;