use moneyiq;
SET NAMES utf8;
-- View: vw_card_features

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_card_features`;
SET sql_notes = 1;

CREATE VIEW vw_card_features AS
select feature_id, credit_card_id,feature_name, feature_type, feature_description, feature_cost, update_time time_beg, '9999-12-31' time_end, update_user  from card_features ac
union
select * from card_features_history ach;