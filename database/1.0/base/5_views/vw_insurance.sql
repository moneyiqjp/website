use moneyiq;
SET NAMES utf8;
-- View: vw_insurance

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_insurance`;
SET sql_notes = 1;

CREATE VIEW vw_insurance AS
select insurance_id, credit_card_id, insurance_type_id, max_insured_amount, value, update_time time_beg, '9999-12-31' time_end, update_user  from insurance ac
union
select * from insurance_history ach;