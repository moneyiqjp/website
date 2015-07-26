use moneyiq;
-- triggers on card_features table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists card_features_before_update;
SET sql_notes = 1;


CREATE TRIGGER card_features_before_update BEFORE UPDATE ON card_features FOR EACH ROW 
INSERT INTO card_features_history (feature_id, feature_type_id,credit_card_id, description, feature_cost, time_beg, time_end, update_user)
VALUES( OLD.feature_id, OLD.feature_type_id, OLD.credit_card_id, OLD.description, OLD.feature_cost, OLD.update_time, NOW(), OLD.update_user); 
		