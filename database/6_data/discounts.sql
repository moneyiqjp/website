use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

delete from discounts where discount_id>0;
ALTER TABLE discounts AUTO_INCREMENT = 1;

insert into discounts (percentage, credit_card_id, store_id,multiple, conditions, update_time, update_user) values
	(0.05, 5, 3, 0.1, '毎月8日、18日、28日のみ', NOW(), 'ben'),
	(0.05, 10, 38, 1, '', NOW(), 'ben'),
	(0.1, 10, 39, 1, '', NOW(), 'ben'),
	(0.0538461538461538, 11, 33, 1, '最大1ℓ7円OFF', NOW(), 'ben'),
	(0.0153846153846154, 12, 33, 1, 'ずっと1ℓ2円OFF', NOW(), 'ben'),
	(0.05, 20, 19, 0.0666666666666667, '毎月5日、20日のみ', NOW(), 'ben'),
	(0.05, 20, 20, 0.0666666666666667, '毎月5日、20日のみ', NOW(), 'ben'),
	(0.05, 21, 19, 0.0666666666666667, '毎月5日、20日のみ', NOW(), 'ben'),
	(0.05, 21, 20, 0.0666666666666667, '毎月5日、20日のみ', NOW(), 'ben'),
	(0.05, 22, 19, 0.0666666666666667, '毎月5日、20日のみ', NOW(), 'ben'),
	(0.05, 22, 20, 0.0666666666666667, '毎月5日、20日のみ', NOW(), 'ben');
	
	
SET FOREIGN_KEY_CHECKS = 1;