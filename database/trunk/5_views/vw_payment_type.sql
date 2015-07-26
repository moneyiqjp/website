use moneyiq;
SET NAMES utf8;
-- View: vw_payment_type

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_payment_type`;
SET sql_notes = 1;

CREATE VIEW vw_payment_type AS
select payment_type_id, payment_type, payment_description, update_time time_beg, '9999-12-31' time_end, update_user  from payment_type ac
union
select * from payment_type_history ach;