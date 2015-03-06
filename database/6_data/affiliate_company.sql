SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;
delete from affiliate_company where affiliate_id>0;
ALTER TABLE affiliate_company AUTO_INCREMENT = 1;

insert into  affiliate_company (name, description, website,signed_up_date, update_time, update_user)
values
  ('A8','','http://www.a8.net/',CURDATE(), NOW(),'ben')
 ,('JANet','','https://www.j-a-net.jp/',CURDATE(), NOW(),'ben');

SET FOREIGN_KEY_CHECKS = 1;
