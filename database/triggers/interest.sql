use moneyiq;

-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
drop trigger if exists interest_before_update;
SET sql_notes = 1;


CREATE TRIGGER interest_before_update BEFORE UPDATE ON interest FOR EACH ROW
INSERT INTO interest_history (interest_id, credit_card_id, payment_type_id, interest, time_beg, time_end, update_user)
VALUES (OLD.payment_type_id, OLD.payment_type_id, OLD.interest, OLD.update_time, NOW(), OLD.update_user); 

