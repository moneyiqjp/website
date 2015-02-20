use moneyiq;
-- triggers on insurance table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists insurance_before_update;
SET sql_notes = 1;


CREATE TRIGGER insurance_before_update BEFORE UPDATE ON insurance FOR EACH ROW
INSERT INTO insurance_history (insurance_id, credit_card_id, shopping, domestic_travel, domestic_travel_hospital, domestic_travel_death, international_travel, international_travel_hospital, international_travel_death, international_travel_luggage, time_beg, time_end, update_user)
VALUES (OLD.insurance_id, OLD.credit_card_id, OLD.shopping, OLD.domestic_travel, OLD.domestic_travel_hospital, OLD.domestic_travel_death, OLD.international_travel, OLD.international_travel_hospital, OLD.international_travel_death, OLD.international_travel_luggage, OLD.update_time, NOW(), OLD.update_user);
	