use moneyiq;
-- triggers on point_usage table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists point_usage_update;
SET sql_notes = 1;


CREATE TRIGGER point_usage_update
    BEFORE UPDATE ON point_usage
    FOR EACH ROW BEGIN
 
    INSERT INTO point_usage_history
    SET action = 'update',
		point_usage_id= OLD.point_usage_id,
		store_store_id= OLD.store_store_id,
		yen_per_point= OLD.yen_per_point,
		credit_card_id= OLD.credit_card_id,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 		
		 
END$$
DELIMITER ;