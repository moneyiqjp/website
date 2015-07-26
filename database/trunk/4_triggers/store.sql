use moneyiq;
-- triggers on store table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists store_before_update;
SET sql_notes = 1;


CREATE TRIGGER store_before_update BEFORE UPDATE ON store FOR EACH ROW 
INSERT INTO store_history (store_id, store_name, category, description, update_time, update_user) values (OLD.store_id, OLD.store_name, OLD.category, OLD.description, OLD.update_time, NOW(),OLD.update_user); 
