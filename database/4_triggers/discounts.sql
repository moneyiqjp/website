use moneyiq;
-- triggers on discounts table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists discounts_before_update;
SET sql_notes = 1;


CREATE TRIGGER discounts_before_update BEFORE UPDATE ON discounts FOR EACH ROW 
INSERT INTO discounts_history (discount_id, percentage, start_date, end_date, description, credit_card_id, store_store_id, update_time, update_user)
VALUES (OLD.discount_id, OLD.percentage, OLD.start_date, OLD.end_date, OLD.description, OLD.credit_card_id, OLD.store_store_id, OLD.update_time, NOW(), OLD.update_user); 
