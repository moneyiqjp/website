use moneyiq;
-- View: vw_active_campaign

-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_active_campaign`;
SET sql_notes = 1;

CREATE VIEW vw_active_campaign AS
Select * from campaign where start_date < NOW() and end_date > NOW();