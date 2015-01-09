use moneyiq;

DELIMITER $$

-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
drop trigger if exists interest_before_update;
SET sql_notes = 1;


CREATE TRIGGER interest_before_update
    BEFORE UPDATE ON interest
    FOR EACH ROW BEGIN
 
    INSERT INTO interest_history
    SET action = 'update',
       credit_card_id = OLD.payment_type_id,
	    payment_type_id = OLD.payment_type_id,
	    interest = OLD.interest,
	    time_beg = OLD.update_time,
	    time_end = NOW(),
		 update_user = OLD.update_user; 
END$$
DELIMITER ;