SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;
delete from unit where unit_id>0;
ALTER TABLE unit AUTO_INCREMENT = 1;

insert into  unit  (name, description, update_time, update_user) 
values 
('points','Points', NOW(),'ben'),
('miles','Miles', NOW(),'ben');

SET FOREIGN_KEY_CHECKS = 1;