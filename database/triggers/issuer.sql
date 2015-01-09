use moneyiq;
-- triggers on issuer table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists issuer_update;
SET sql_notes = 1;


CREATE TRIGGER issuer_update
    BEFORE UPDATE ON issuer
    FOR EACH ROW BEGIN
 
    INSERT INTO issuer_history
    SET action = 'update',
		issuer_id= OLD.issuer_id,
		issuer_name= OLD.issuer_name,
		update_time= OLD.update_time,
		update_user= OLD.update_user,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 		
		 
END$$
DELIMITER ;