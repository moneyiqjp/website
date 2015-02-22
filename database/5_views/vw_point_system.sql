use moneyiq;
-- View: vw_point_system

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_point_system`;
SET sql_notes = 1;

CREATE VIEW vw_point_system AS
select point_system_id, point_system_name, points_per_yen, credit_card_id, store_store_id, update_time time_beg, '9999-12-31' time_end, update_user  from point_system ac
union
select * from point_system_history ach;