/*
DROP PROCEDURE IF EXISTS UpgradeMoneyIQ25;
*/

DELIMITER //
CREATE PROCEDURE UpgradeMoneyIQ26(IN varDatabase varchar(20)) 
BEGIN	

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='persona' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='reward_category_id') THEN
		ALTER TABLE `persona`
			ADD COLUMN `identifier` VARCHAR(250) NOT NULL AFTER `persona_id`,
			ADD COLUMN `sorting` VARCHAR(250) NOT NULL AFTER `identifier`,
			ADD COLUMN `reward_category_id` INT NOT NULL AFTER `sorting`;

		ALTER TABLE `persona`
			ADD CONSTRAINT `FK_persona_reward_category` FOREIGN KEY (`reward_category_id`) REFERENCES `reward_category` (`reward_category_id`);


		SELECT 'ADDED persona.reward_category_id';
	else
			SELECT 'EXISTED persona.reward_category_id';
	end if;

END //
DELIMITER ;
CALL UpgradeMoneyIQ26(DATABASE());

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ26;