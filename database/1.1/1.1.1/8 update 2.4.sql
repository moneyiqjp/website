/*
DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_4;
*/

DELIMITER //
CREATE PROCEDURE UpgradeMoneyIQ2_4(IN varDatabase varchar(20)) 
BEGIN	

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='payment_type' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='display') THEN
		ALTER TABLE `payment_type`
			CHANGE COLUMN `payment_type` `type` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci' AFTER `payment_type_id`,
			ADD COLUMN `display` TEXT NOT NULL COLLATE 'utf8_general_ci' AFTER `type`,
			CHANGE COLUMN `payment_description` `description` TEXT NOT NULL COLLATE 'utf8_general_ci' AFTER `display`;	
		SELECT 'ADDED payment_type.display';
	else
			SELECT 'EXISTED payment_type.display';
	end if;
	
	

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='credit_card' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='issue_period') THEN
		ALTER TABLE `credit_card`
			ADD COLUMN `issue_period` INT(11) NULL AFTER `pointExpiryMonths`,
			ADD COLUMN `credit_limit_bottom` INT(11) NULL AFTER `issue_period`,
			ADD COLUMN `credit_limit_upper` INT(11) NULL AFTER `credit_limit_bottom`,
			ADD COLUMN `debit_date` VARCHAR(250) NULL COLLATE 'utf8_general_ci' AFTER `commission`,
			ADD COLUMN `cutoff_date` VARCHAR(250) NULL COLLATE 'utf8_general_ci' AFTER `debit_date`,
			CHANGE COLUMN `reference` `reference` VARCHAR(255) NULL DEFAULT NULL AFTER `isActive`;
		SELECT 'ADDED credit_card.issue_period';
	else
			SELECT 'EXISTED credit_card.issue_period';
	end if;
	
	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='insurance' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='guaranteed_period') THEN
		ALTER TABLE `insurance`
			ADD COLUMN `guaranteed_period` INT(11) NULL DEFAULT NULL AFTER `insurance_type_id`;
		SELECT 'ADDED insurance.guaranteed_period';
	else
			SELECT 'EXISTED insurance.guaranteed_period';
	end if;
	
	if exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='insurance' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='update_user') THEN		
		ALTER TABLE `insurance`
			ALTER `update_user` DROP DEFAULT;
		ALTER TABLE `insurance`
			CHANGE COLUMN `update_user` `update_user` VARCHAR(100) NULL COLLATE 'utf8_general_ci' AFTER `update_time`;
		SELECT 'DELETED RESTRICTION insurance.update_user';
	else
		SELECT 'ALREADY DELETED RESTRICTION insurance.update_user';
	end if;
	
	
END //
DELIMITER ;
CALL UpgradeMoneyIQ2_4(DATABASE());
/*'moneyiq_uat');*/

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_4;