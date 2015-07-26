use moneyiq;
SET NAMES utf8;
-- View: vw_card_description

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_card_description`;
SET sql_notes = 1;

CREATE VIEW vw_card_description AS
select item_id ,credit_card_id ,item_name ,item_description , update_time time_beg, '9999-12-31' time_end, update_user  from card_description ac
union
select * from card_description_history ach;