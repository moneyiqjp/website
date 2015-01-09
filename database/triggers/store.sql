use moneyiq;
-- triggers on store table

DELIMITER $$
-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists store_update;
SET sql_notes = 1;


CREATE TRIGGER store_update
    BEFORE UPDATE ON store
    FOR EACH ROW BEGIN
 
    INSERT INTO store_history
    SET action = 'update',
		store_id= OLD.store_id,
		store_name= OLD.store_name,
		category= OLD.category,
		description= OLD.description,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 		
		 
END$$
#DELIMITER ;