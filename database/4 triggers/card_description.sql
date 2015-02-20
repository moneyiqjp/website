use moneyiq;
-- triggers on campaign table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists card_description_before_update;
SET sql_notes = 1;


CREATE TRIGGER card_description_before_update BEFORE UPDATE ON card_description FOR EACH ROW 
INSERT INTO card_description_history (item_id, credit_card_id, item_name, item_description, time_beg, time_end, update_user)
VALUES ( OLD.item_id, OLD.credit_card_id, OLD.item_name, OLD.item_description, OLD.update_time, NOW(), OLD.update_user); 
