/*
DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_3;
*/
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
	


	
END //
DELIMITER ;
CALL UpgradeMoneyIQ2_3(DATABASE());
/*'moneyiq_uat');*/

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ2_3;