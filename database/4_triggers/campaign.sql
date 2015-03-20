use moneyiq;
-- triggers on campaign table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists campaign_before_update;
SET sql_notes = 1;


CREATE TRIGGER campaign_before_update BEFORE UPDATE ON campaign FOR EACH ROW 
INSERT INTO campaign_history (campaign_id, credit_card_id, campaign_name, description, max_points, value_in_yen, start_date, end_date, time_beg, time_end, update_user )
VALUES (OLD.campaign_id, OLD.credit_card_id, OLD.campaign_name, OLD.description, OLD.max_points, OLD.value_in_yen, start_date = OLD.start_date, OLD.end_date, OLD.update_time, NOW(), OLD.update_user);
