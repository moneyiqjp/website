use moneyiq;
-- triggers on payment_type table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists payment_type;
SET sql_notes = 1;


CREATE TRIGGER payment_type_update
    BEFORE UPDATE ON payment_type
    FOR EACH ROW BEGIN
 
    INSERT INTO payment_type_history
    SET action = 'update',
		payment_type_id= OLD.payment_type_id,
		payment_type= OLD.payment_type,
		payment_description= OLD.payment_description,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 		
		 
END$$
DELIMITER ;