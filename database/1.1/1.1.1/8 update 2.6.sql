/*
DROP PROCEDURE IF EXISTS UpgradeMoneyIQ25;
*/

DELIMITER //
CREATE PROCEDURE UpgradeMoneyIQ26(IN varDatabase varchar(20)) 
BEGIN	

	if not exists(select 1 from reward_category where name='None') THEN
		insert into reward_category (name, description, update_time, update_user) values
		('None', 'Standby for specifying no category',NOW(),'Ben');
		SELECT 'Setup default reward_category';
	else
		select reward_category_id, name from reward_category where name='None';
	end if;


	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='persona' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='reward_category_id') THEN
		ALTER TABLE `persona`
			ADD COLUMN `identifier` VARCHAR(250) NOT NULL AFTER `persona_id`,
			ADD COLUMN `sorting` VARCHAR(250) NOT NULL COLLATE 'utf8_general_ci' AFTER `identifier`,
			ADD COLUMN `reward_category_id` INT NOT NULL AFTER `sorting`;
			SELECT 'ADDED persona.reward_category_id';
	else
			SELECT 'EXISTED persona.reward_category_id';
	end if;


	if exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='persona' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='reward_category_id') THEN
			update persona set reward_category_id=(select reward_category_id from reward_category where name='None');
			SELECT 'DEFAULTED persona.reward_category_id';
	else
			SELECT 'Already set persona.reward_category_id';
	end if;
	

	if not exists(select 1 from information_schema.REFERENTIAL_CONSTRAINTS where CONSTRAINT_NAME='FK_persona_reward_category' and CONSTRAINT_SCHEMA=varDatabase) THEN
		ALTER TABLE `persona`
			ADD CONSTRAINT `FK_persona_reward_category` FOREIGN KEY (`reward_category_id`) REFERENCES `reward_category` (`reward_category_id`);
			SELECT 'ADDED FK_persona_reward_category';
	else
			SELECT 'EXISTED FK_persona_reward_category';
	end if;
	

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='persona' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='default_spend') THEN
		ALTER TABLE `persona`
			CHANGE COLUMN `sorting` `sorting` VARCHAR(250) NOT NULL AFTER `description`,
			CHANGE COLUMN `reward_category_id` `reward_category_id` INT(11) NOT NULL AFTER `sorting`;
		ALTER TABLE `persona`			
			ADD COLUMN `default_spend` INT(11) NOT NULL DEFAULT '100000' AFTER `description`;
			SELECT 'ADDED persona.default_spend';
	else
			SELECT 'EXISTED persona.default_spend';
	end if;


	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='card_description' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='item_type') THEN	
		ALTER TABLE `card_description`
			ADD COLUMN `item_type` VARCHAR(255) NULL COLLATE 'utf8_general_ci' AFTER `item_name`;
			SELECT 'ADDED card_description.item_type';
	else
			SELECT 'EXISTED card_description.item_type';
	end if;


	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='reward_category' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='subcategory') THEN	
		ALTER TABLE `reward_category`
			ADD COLUMN `subcategory` VARCHAR(50) NULL COLLATE 'utf8_general_ci' AFTER `name`;
			SELECT 'ADDED reward_category.subcategory';
	else
			SELECT 'EXISTED reward_category.subcategory';
	end if;


	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='map_persona_feature_constraint' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='negative') THEN	
		ALTER TABLE `map_persona_feature_constraint`
			ADD COLUMN `negative` TINYINT NULL DEFAULT '0' AFTER `priority_id`;
			SELECT 'ADDED map_persona_feature_constraint.negative';
	else
			SELECT 'EXISTED map_persona_feature_constraint.negative';
	end if;

END //
DELIMITER ;
CALL UpgradeMoneyIQ26(DATABASE());

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ26;