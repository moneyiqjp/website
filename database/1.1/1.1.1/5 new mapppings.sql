DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_2;

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
	
	if not exists(select * from store where store_name='None') THEN
		insert into store (store_name, store_category_id, description, is_major,update_time,update_user)
		values ('None', 1, 'default store if nothing is displayed', 9, NOW(),'ben');
		Select 'Default store added';
	else
		Select 'Default store already exists';
	end if;
	
	select @store_default := store_id from store where store_name='None';
	select concat('Default stores to ', @store_default);
	update reward set store_id=@store_default where store_id is null;
	
	if not exists(select 1 from information_schema.`TABLES` a where a.TABLE_NAME='map_scene_reward_category' and TABLE_SCHEMA=varDatabase) THEN	
		CREATE TABLE `map_scene_reward_category` (
			`scene_id` INT(11) NOT NULL,
			`reward_category_id` INT(11) NOT NULL,
			`priority_id` INT(11) NULL DEFAULT '100',
			`update_time` DATETIME NULL DEFAULT NULL,
			`update_user` VARCHAR(100) NULL DEFAULT NULL,
			PRIMARY KEY (`scene_id`, `reward_category_id`),
			INDEX `fk_msrc_scene_id_index` (`scene_id`),
			INDEX `fk_msrc_store_category_id_ind` (`reward_category_id`),
			CONSTRAINT `FK_msrc_map_scene_rewardcategory_scene` FOREIGN KEY (`scene_id`) REFERENCES `scene` (`scene_id`),
			CONSTRAINT `FK_msrc_map_scene_rewardcategory_rewardcategory` FOREIGN KEY (`reward_category_id`) REFERENCES `reward_category` (`reward_category_id`)
		)
		COLLATE='utf8_general_ci'
		ENGINE=InnoDB
		;
		Select 'ADDED map_scene_reward_category';
	else
		Select 'EXISTED map_scene_reward_category';
	end if;
	

	
	if not exists(select 1 from information_schema.`TABLES` a where a.TABLE_NAME='map_persona_feature_constraint' and TABLE_SCHEMA=varDatabase) THEN	
		CREATE TABLE `map_persona_feature_constraint` (
			`persona_id` INT(11) NOT NULL,
			`feature_type_id` INT(11) NOT NULL,
			`priority_id` INT(11) NULL DEFAULT '100',
			`update_time` DATETIME NULL DEFAULT NULL,
			`update_user` VARCHAR(100) NULL DEFAULT NULL,
			PRIMARY KEY (`persona_id`, `feature_type_id`),
			INDEX `fk_mpfc_persona_id_ind` (`persona_id`),
			INDEX `fk_mpfc_feature_type_id_ind` (`feature_type_id`),
			CONSTRAINT `FK_mpfc_persona_id` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`),
			CONSTRAINT `FK_mpfc_feature_type_id` FOREIGN KEY (`feature_type_id`) REFERENCES `card_feature_type` (`feature_type_id`)
		)
		COLLATE='utf8_general_ci'
		ENGINE=InnoDB
		;

		SELECT 'ADDED map_persona_feature_constraint';
	else
			SELECT 'EXISTED map_persona_feature_constraint';
	end if;

	if not exists(select 1 from information_schema.`TABLES` a where a.TABLE_NAME='restriction_type' and TABLE_SCHEMA=varDatabase) THEN	
		CREATE TABLE `restriction_type` (
			`restriction_type_id` INT(11) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
			`description` TEXT NULL COLLATE 'utf8_general_ci',
			`update_time` DATETIME NOT NULL,
			`update_user` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
			PRIMARY KEY (`restriction_type_id`)
		)
		COLLATE='utf8mb4_general_ci'
		ENGINE=InnoDB
		AUTO_INCREMENT=1
		;
		SELECT 'ADDED restriction_type';
	else
			SELECT 'EXISTED restriction_type';
	end if;


	if not exists(select 1 from information_schema.`TABLES` a where a.TABLE_NAME='persona_restriction' and TABLE_SCHEMA=varDatabase) THEN	
		CREATE TABLE `persona_restriction` (
			`persona_id` INT(11) NOT NULL,
			`restriction_type_id` INT(11) NOT NULL,
			`priority_id` INT(11) NULL DEFAULT '100',
			`value` VARCHAR(255) NOT NULL,
			`update_time` DATETIME NULL DEFAULT NULL,
			`update_user` VARCHAR(100) NULL DEFAULT NULL,
			PRIMARY KEY (`persona_id`, `restriction_type_id`),
			INDEX `fk_pr_persona_id_ind` (`persona_id`),
			INDEX `fk_pr_feature_type_id_ind` (`restriction_type_id`),
			CONSTRAINT `FK_pr_persona_id` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`),
			CONSTRAINT `FK_pr_restriction_type_id` FOREIGN KEY (`restriction_type_id`) REFERENCES `restriction_type` (`restriction_type_id`)
		)
		COLLATE='utf8_general_ci'
		ENGINE=InnoDB
		;

		SELECT 'ADDED persona_restriction';
	else
			SELECT 'EXISTED persona_restriction';
	end if;

	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='map_persona_scene' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='percentage') THEN
		ALTER TABLE `map_persona_scene`
			ADD COLUMN `percentage` DOUBLE NULL DEFAULT '0.30' AFTER `scene_id`;
		SELECT 'ADDED map_persona_scene.percentage';
	else
			SELECT 'EXISTED map_persona_scene.percentage';
	end if;
	
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='persona_restriction' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='comparator') THEN
		ALTER TABLE `persona_restriction`
		ADD COLUMN `Comparator` VARCHAR(80) NULL DEFAULT '=' AFTER `restriction_type_id`,
		CHANGE COLUMN `priority_id` `priority_id` INT(11) NULL DEFAULT '100' AFTER `value`;
		SELECT 'ADDED persona_restriction.comparator';
	else
			SELECT 'EXISTED persona_restriction.comparator';
	end if;
	
	
	ALTER TABLE unit_history Engine=InnoDB;

END //
DELIMITER ;
CALL UpgradeMoneyIQ2_2(DATABASE());
/*'moneyiq_uat');*/

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_2;