use moneyiq;
-- View: vw_interest

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_interest`;
SET sql_notes = 1;

CREATE VIEW vw_interest AS
select interest_id, credit_card_id, payment_type_id, interest, update_time time_beg, '9999-12-31' time_end, update_user  from interest ac
union
select * from interest_history ach;