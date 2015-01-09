use moneyiq;
-- triggers on campaign table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists campaign_before_update;
SET sql_notes = 1;


CREATE TRIGGER campaign_before_update
    BEFORE UPDATE ON campaign
    FOR EACH ROW BEGIN
 
    INSERT INTO campaign_history
    SET action = 'update',
		campaign_id = OLD.campaign_id,
		credit_card_id = OLD.credit_card_id,
		campaign_name = OLD.campaign_name,
		description = OLD.description,
		max_points = OLD.max_points,
		value_in_yen = OLD.value_in_yen,
		start_date = OLD.start_date,
		end_date = OLD.end_date,
		issuer_id = OLD.issuer_id,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 
		
		 
END$$
DELIMITER ;