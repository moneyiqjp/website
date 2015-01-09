use moneyiq;
-- triggers on insurance table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists insurance_update;
SET sql_notes = 1;


CREATE TRIGGER insurance_update
    BEFORE UPDATE ON insurance
    FOR EACH ROW BEGIN
 
    INSERT INTO insurance_history
    SET action = 'update',
		insurance_id= OLD.insurance_id,
		credit_card_id= OLD.credit_card_id,
		shopping= OLD.shopping,
		domestic_travel= OLD.domestic_travel,
		domestic_travel_hospital= OLD.domestic_travel_hospital,
		domestic_travel_death= OLD.domestic_travel_death,
		international_travel= OLD.international_travel,
		international_travel_hospital= OLD.international_travel_hospital,
		international_travel_death= OLD.international_travel_death,
		international_travel_luggage= OLD.international_travel_luggage,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 		
		 
END$$
DELIMITER ;