use moneyiq;
SET NAMES utf8;
-- View: vw_issuer

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_issuer`;
SET sql_notes = 1;

CREATE VIEW vw_issuer AS
select issuer_id, issuer_name, update_time time_beg, '9999-12-31' time_end, update_user  from issuer ac
union
select * from issuer_history ach;