use moneyiq;
SET NAMES utf8;
-- View: vw_store

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_store`;
SET sql_notes = 1;

CREATE VIEW vw_store AS
select store_id, store_name, category, description, update_time time_beg, '9999-12-31' time_end, update_user  from store ac
union
select * from store_history ach;