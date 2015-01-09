use moneyiq;
-- triggers on point_system table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists point_system_update;
SET sql_notes = 1;


CREATE TRIGGER point_system_update
    BEFORE UPDATE ON point_system
    FOR EACH ROW BEGIN
 
    INSERT INTO point_system_history
    SET action = 'update',
		point_system_id= OLD.point_system_id,
		point_system_name= OLD.point_system_name,
		points_per_yen= OLD.points_per_yen,
		credit_card_id= OLD.credit_card_id,
		store_store_id= OLD.store_store_id,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 		
		 
END$$
DELIMITER ;