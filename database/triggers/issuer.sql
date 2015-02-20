use moneyiq;
-- triggers on card_features table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists issuer_before_update;
SET sql_notes = 1;


CREATE TRIGGER issuer_before_update BEFORE UPDATE ON issuer FOR EACH ROW 
INSERT INTO issuer_history (issuer_id, issuer_name, time_beg, time_end, update_user)
VALUES ( OLD.issuer_id, OLD.issuer_name, OLD.update_time, NOW(), OLD.update_user)