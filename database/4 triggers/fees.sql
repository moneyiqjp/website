use moneyiq;
-- triggers on fees table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists fees_before_update;
SET sql_notes = 1;


CREATE TRIGGER fees_before_update BEFORE UPDATE ON fees FOR EACH ROW 
INSERT INTO fees_history (fee_id, fee_type, fee_amount, yearly_occurrence, start_year, end_year, credit_card_id, time_beg, time_end, update_user)
VALUES ( OLD.fee_id, OLD.fee_type, OLD.fee_amount, OLD.yearly_occurrence, OLD.start_year, OLD.end_year, OLD.credit_card_id, OLD.update_time, NOW(), OLD.update_user);
