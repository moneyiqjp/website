SET NAMES utf8;
use moneyiq;

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;

delete from payment_type where payment_type_id > 0;

insert into payment_type (payment_type, payment_description, update_time, update_user) values
('ikkai', '一回払い', NOW(), 'ben'),
('bunkatsu', '分割払い', NOW(), 'ben'),
('ribo', 'リボ払い', NOW(), 'ben');

SET FOREIGN_KEY_CHECKS = 1;
