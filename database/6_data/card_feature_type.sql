use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

delete from card_feature_type where feature_type_id>0;
ALTER TABLE card_feature_type AUTO_INCREMENT = 1;

insert into card_feature_type (category, name, update_time, update_user) values
('prestige','gold_card',NOW(),'ben'),
('utility','ETC',NOW(),'ben'),
('utility','Family Card',NOW(),'ben'),
('e-payment','iD',NOW(),'ben'),
('e-payment','nanaco',NOW(),'ben'),
('e-payment','suica',NOW(),'ben'),
('e-payment','楽天Edy',NOW(),'ben'),
('e-payment','sugoca',NOW(),'ben'),
('e-payment','Quicpay',NOW(),'ben'),
('e-payment','WAON',NOW(),'ben'),
('e-payment','Pasmo',NOW(),'ben'),
('e-payment','ICOCA',NOW(),'ben'),
('e-payment','Kitaca',NOW(),'ben'),
('e-payment','TOICA',NOW(),'ben'),
('network','visa',NOW(),'ben'),
('network','master',NOW(),'ben'),
('network','jcb',NOW(),'ben'),
('network','amex',NOW(),'ben'),
('network','diners',NOW(),'ben');

SET FOREIGN_KEY_CHECKS = 0;