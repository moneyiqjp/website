use moneyiq;
-- triggers on payment_type table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists payment_type_before_update;
SET sql_notes = 1;


CREATE TRIGGER payment_type_before_update BEFORE UPDATE ON payment_type FOR EACH ROW  
INSERT INTO payment_type_history (payment_type_id, payment_type, payment_description, time_beg, time_end, update_user)
VALUES (OLD.payment_type_id, OLD.payment_type, OLD.payment_description, OLD.update_time, NOW(), update_user)
