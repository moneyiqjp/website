use moneyiq;
-- triggers on fees table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists fees_update;
SET sql_notes = 1;


CREATE TRIGGER fees_update
    BEFORE UPDATE ON fees
    FOR EACH ROW BEGIN
 
    INSERT INTO fees_history
    SET action = 'update',
		fee_id= OLD.fee_id,
		fee_type= OLD.fee_type,
		fee_amount= OLD.fee_amount,
		yearly_occurrence= OLD.yearly_occurrence,
		start_year= OLD.start_year,
		end_year= OLD.end_year,
		credit_card_id= OLD.credit_card_id,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 		
		 
END$$
DELIMITER ;