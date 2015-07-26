use moneyiq;
SET NAMES utf8;
-- View: vw_point_usage

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_point_usage`;
SET sql_notes = 1;

CREATE VIEW vw_point_usage AS
select point_usage_id, store_id, yen_per_point, credit_card_id, update_time time_beg, '9999-12-31' time_end, update_user  from point_usage ac
union
select * from point_usage_history ach;