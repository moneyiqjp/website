use moneyiq;
-- triggers on issuer table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists issuer_update;
SET sql_notes = 1;


CREATE TRIGGER issuer_update BEFORE UPDATE ON issuer FOR EACH ROW  
INSERT INTO issuer_history (issuer_id, issuer_name, time_beg, time_end, update_user)
VALUES ( OLD.issuer_id, OLD.issuer_name, OLD.update_time, OLD.update_user, OLD.update_time, NOW(), OLD.update_user)