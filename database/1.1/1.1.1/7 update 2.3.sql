
DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_3;

DELIMITER //
CREATE PROCEDURE UpgradeMoneyIQ2_3(IN varDatabase varchar(20)) 
BEGIN
	
	if not exists(select 1 from information_schema.`TABLES` a where a.TABLE_NAME='mailinglist' and TABLE_SCHEMA=varDatabase) THEN	
		CREATE TABLE `mailinglist` (
			`email` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
			`update_time` DATETIME NOT NULL
		)
		COLLATE='utf8_general_ci'
		ENGINE=InnoDB;
		Select 'ADDED mailinglist';
	else
		Select 'EXISTED mailinglist';
	end if;

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='credit_card' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='isActive') THEN
		ALTER TABLE `credit_card`
				ADD COLUMN `isActive` TINYINT NULL DEFAULT '1' AFTER `reference`;
		SELECT 'ADDED credit_card.isActive';
	else
			SELECT 'EXISTED credit_card.isActive';
	end if;
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='insurance_type' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='type_display') THEN
		ALTER TABLE `insurance_type`
			ADD COLUMN `type_display` VARCHAR(255) NULL COLLATE 'utf8_general_ci' AFTER `type_name`,
			ADD COLUMN `subtype_display` VARCHAR(255) NULL COLLATE 'utf8_general_ci' AFTER `subtype_name`;
		SELECT 'ADDED insurance_type.translation';
	else
		SELECT 'EXISTED insurance_type.translation';
	end if;

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='restriction_type' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='display') THEN
		ALTER TABLE `restriction_type`
			ADD COLUMN `display` TEXT NOT NULL COLLATE 'utf8_general_ci' AFTER `description`;
			SELECT 'ADDED insurance_type.translation';
	else
		SELECT 'EXISTED insurance_type.translation';
	end if;

	if not exists(select 1 from information_schema.`TABLES` a where a.TABLE_NAME='card_restriction' and TABLE_SCHEMA=varDatabase) THEN	
		CREATE TABLE `card_restriction` (
			`credit_card_id` INT(11) NOT NULL,
			`restriction_type_id` INT(11) NOT NULL,
			`Comparator` VARCHAR(80) NULL DEFAULT '=',
			`value` VARCHAR(255) NOT NULL,
			`priority_id` INT(11) NULL DEFAULT '100',
			`update_time` DATETIME NULL DEFAULT NULL,
			`update_user` VARCHAR(100) NULL DEFAULT NULL,
		PRIMARY KEY (`credit_card_id`, `restriction_type_id`),
		INDEX `PK_cr_credit_card_id_ind` (`credit_card_id`),
		INDEX `PK_cr_feature_type_id_ind` (`restriction_type_id`),
		CONSTRAINT `FK_cr_credit_card_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`),
		CONSTRAINT `FK_cr_restriction_type_id` FOREIGN KEY (`restriction_type_id`) REFERENCES `restriction_type` (`restriction_type_id`)
		)
		COLLATE='utf8_general_ci'
		ENGINE=InnoDB
		;
		SELECT 'ADDED card_restriction';
	else
		SELECT 'EXISTED card_restriction';
	end if;	

	if not exists(select 1 from information_schema.`TABLES` a where a.TABLE_NAME='map_card_feature_constraint' and TABLE_SCHEMA=varDatabase) THEN	
		CREATE TABLE `map_card_feature_constraint` (
			`credit_card_id` INT(11) NOT NULL,
			`feature_type_id` INT(11) NOT NULL,
			`priority_id` INT(11) NULL DEFAULT '100',
			`update_time` DATETIME NULL DEFAULT NULL,
			`update_user` VARCHAR(100) NULL DEFAULT NULL,
			PRIMARY KEY (`credit_card_id`, `feature_type_id`),
			INDEX `pk_mccfc_creditcard_id_ind` (`credit_card_id`),
			INDEX `pk_mccfc_feature_type_id_ind` (`feature_type_id`),
			CONSTRAINT `fk_mccfc_feature_type_id` FOREIGN KEY (`feature_type_id`) REFERENCES `card_feature_type` (`feature_type_id`),
			CONSTRAINT `fk_mccfc_creditcard_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`)
		)
		COLLATE='utf8_general_ci'
		ENGINE=InnoDB
		;
		SELECT 'ADDED map_card_feature_constraint';
	else
		SELECT 'EXISTED map_card_feature_constraint';
	end if;	

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='store' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='allocation') THEN
		ALTER TABLE `store`
			ADD COLUMN `allocation` INT(11) NULL DEFAULT '10' AFTER `is_major`;			
		SELECT 'ADDED store.allocation';
	else
			SELECT 'EXISTED store.allocation';
	end if;



	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='credit_card' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='commission') THEN
		ALTER TABLE `credit_card`
			ADD COLUMN `commission` INT NULL AFTER `reference`;
		SELECT 'ADDED credit_card.commission';
	else
			SELECT 'EXISTED credit_card.commission';
	end if;
	
	
END //
DELIMITER ;
CALL UpgradeMoneyIQ2_3(DATABASE());
/*'moneyiq_uat');*/

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_3;