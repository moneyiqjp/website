use moneyiq;
-- View: vw_credit_card

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_credit_card`;
SET sql_notes = 1;

CREATE VIEW vw_credit_card AS
select credit_card_id, name, issuer_id, description, visa, master, jcb, amex, diners, afilliate_link, affiliate_id, update_time time_beg, '9999-12-31' time_end, update_user  from credit_card ac
union
select * from credit_card_history ach;