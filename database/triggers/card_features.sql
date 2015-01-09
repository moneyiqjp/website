use moneyiq;
-- triggers on card_features table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists card_features_update;
SET sql_notes = 1;


CREATE TRIGGER card_features_update
    BEFORE UPDATE ON card_features
    FOR EACH ROW BEGIN
 
    INSERT INTO card_features_history
    SET action = 'update',
		feature_id= OLD.feature_id,
		credit_card_id= OLD.credit_card_id,
		feature_name= OLD.feature_name,
		feature_type= OLD.feature_type,
		feature_description= OLD.feature_description,
		feature_cost= OLD.feature_cost,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 
		
		 
END$$
DELIMITER ;