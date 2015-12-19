/*
DROP PROCEDURE IF EXISTS UpgradeMoneyIQ25;
*/

DELIMITER //
CREATE PROCEDURE UpgradeMoneyIQ25(IN varDatabase varchar(20)) 
BEGIN	

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='interest' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='display') THEN
		ALTER TABLE `interest`
			ADD COLUMN `Display` VARCHAR(250) NULL COLLATE 'utf8_general_ci' AFTER `max_interest`;
		SELECT 'ADDED interest.display';
	else
			SELECT 'EXISTED interest.display';
	end if;
	
	

	if not exists(select 1 from information_schema.`COLUMNS` a where a.TABLE_NAME='credit_card' and TABLE_SCHEMA=varDatabase and COLUMN_NAME='poinyExpiryDisplay') THEN
	ALTER TABLE `credit_card`
		ADD COLUMN `pointExpiryDisplay` VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci' AFTER `pointExpiryMonths`;

		SELECT 'ADDED credit_card.poinyExpiryDisplay';
	else
			SELECT 'EXISTED credit_card.poinyExpiryDisplay';
	end if;
	
END //
DELIMITER ;
CALL UpgradeMoneyIQ25(DATABASE());

DROP PROCEDURE IF EXISTS UpgradeMoneyIQ25;