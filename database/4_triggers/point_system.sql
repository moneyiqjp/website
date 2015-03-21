use moneyiq;
-- triggers on point_system table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists point_system_before_update;
SET sql_notes = 1;


CREATE TRIGGER point_system_before_update BEFORE UPDATE ON point_system FOR EACH ROW 
INSERT INTO point_system_history (point_system_id, point_system_name, points_per_yen, credit_card_id, store_id, time_beg, time_end, update_user)
VALUES (OLD.point_system_id, OLD.point_system_name, OLD.points_per_yen, OLD.credit_card_id, OLD.store_id, OLD.update_time, NOW(), OLD.update_user); 
