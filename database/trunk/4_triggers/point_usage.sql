use moneyiq;
-- triggers on point_usage table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists point_usage_before_update;
SET sql_notes = 1;

CREATE TRIGGER point_usage_before_update BEFORE UPDATE ON point_usage FOR EACH ROW
INSERT INTO point_usage_history (point_usage_id, store_id, yen_per_point, credit_card_id, time_beg, time_end, update_user)
values (OLD.point_usage_id,OLD.store_id, OLD.yen_per_point, OLD.credit_card_id, OLD.update_time, NOW(),OLD.update_user);