use moneyiq;
SET NAMES utf8;
-- View: vw_campaign

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_campaign`;
SET sql_notes = 1;

CREATE VIEW vw_campaign AS
select campaign_id,credit_card_id,campaign_name,description,max_points,value_in_yen,start_date,end_date,update_time time_beg, '9999-12-31' time_end, update_user  from campaign ac
union
select * from campaign_history ach;