use moneyiq;
-- View: vw_discounts

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_discounts`;
SET sql_notes = 1;

CREATE VIEW vw_discounts AS
select discount_id, percentage, start_date, end_date, description, credit_card_id, store_store_id, update_time time_beg, '9999-12-31' time_end, update_user  from discounts ac
union
select * from discounts_history ach;