use moneyiq;
-- triggers on insurance table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists insurance_before_update;
SET sql_notes = 1;


CREATE TRIGGER insurance_before_update BEFORE UPDATE ON insurance FOR EACH ROW
INSERT INTO insurance_history (insurance_id, credit_card_id, insurance_type_id, max_insured_amount, value, time_beg, time_end, update_user)
VALUES (OLD.insurance_id, OLD.credit_card_id, OLD.insurance_type_id, OLD.max_insured_amount, OLD.value, OLD.update_time, NOW(), OLD.update_user);
	