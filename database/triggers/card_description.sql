use moneyiq;
-- triggers on campaign table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists card_description_update;
SET sql_notes = 1;


CREATE TRIGGER card_description_update
    BEFORE UPDATE ON card_description
    FOR EACH ROW BEGIN
 
    INSERT INTO card_description_history
    SET action = 'update',
      item_id= OLD.item_id,
      credit_card_id= OLD.credit_card_id,
      item_name= OLD.item_name,
	   item_description= OLD.item_description,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 
		
		 
END$$
DELIMITER ;