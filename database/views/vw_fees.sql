use moneyiq;
-- View: vw_fees

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_fees`;
SET sql_notes = 1;

CREATE VIEW vw_fees AS
select fee_id, fee_type, fee_amount, yearly_occurrence, start_year, end_year, credit_card_id, update_time time_beg, '9999-12-31' time_end, update_user  from fees ac
union
select * from fees_history ach;