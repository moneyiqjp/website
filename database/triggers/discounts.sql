use moneyiq;
-- triggers on discounts table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists discounts_update;
SET sql_notes = 1;


CREATE TRIGGER discounts_update
    BEFORE UPDATE ON discounts
    FOR EACH ROW BEGIN
 
    INSERT INTO discounts_history
    SET action = 'update',
		discount_id= OLD.discount_id,
		percentage= OLD.percentage,
		start_date= OLD.start_date,
		end_date= OLD.end_date,
		description= OLD.description,
		credit_card_id= OLD.credit_card_id,
		store_store_id= OLD.store_store_id,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 		
		 
END$$
DELIMITER ;