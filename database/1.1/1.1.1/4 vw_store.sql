SET NAMES utf8;
-- View: vw_store

-- turn off note warnings as views don't exist during initial load
SET sql_notes = 0;
DROP VIEW IF EXISTS `vw_store`;
SET sql_notes = 1;

CREATE VIEW vw_store AS
select
      s.store_id, s.store_name, sc.name category_name, s.description,s.update_time,s.update_user 
 from store s 
inner join store_category sc on s.store_category_id = sc.store_category_id