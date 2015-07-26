use moneyiq;
SET NAMES utf8;
-- View: vw_affiliate_company

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_affiliate_company`;
SET sql_notes = 1;

CREATE VIEW vw_affiliate_company AS
select affiliate_id, name, description, website, signed_up_date, update_time time_beg, '9999-12-31' time_end, update_user  from affiliate_company ac
union
select * from affiliate_company_history ach;