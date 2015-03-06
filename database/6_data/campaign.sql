use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

delete from campaign where campaign_id>0;
ALTER TABLE campaign AUTO_INCREMENT = 1;

insert into campaign (credit_card_id, max_points, value_in_yen, start_date, end_date, update_time, update_user) values
	(1, 7000, 7000, NULL, '2015-01-15',NOW(),'ben'),
	(2, 7000, 7000, NULL, '2015-01-15',NOW(),'ben'),
	(3, 10000, 10000, '1900-01-01', '2015-01-15',NOW(),'ben'),
	(4, NULL, NULL, '2014-11-01', NULL,NOW(),'ben'),
	(5, 2000, 2000, '2014-12-26', '2015-01-05',NOW(),'ben'),
	(6, 5500, 5500, '2014-12-26', '2015-01-05',NOW(),'ben'),
	(7, 5500, 5500, NULL, NULL,NOW(),'ben'),
	(19, NULL, NULL, '2015-01-01', '2015-02-28',NOW(),'ben'),
	(20, 2000, 4000, NULL, NULL,NOW(),'ben'),
	(21, NULL, NULL, NULL, '2015-03-31',NOW(),'ben'),
	(22, 1000, 1000, NULL, '2015-03-31',NOW(),'ben'),
	(23, 1000, 1000, NULL, NULL,NOW(),'ben'),
	(28, NULL, NULL, '2015-01-05', '2015-03-15',NOW(),'ben'),
	(29, 7500, 7500, '2015-01-05', '2015-03-15',NOW(),'ben'),
	(30, 2000, 2000, '2015-01-05', '2015-03-15',NOW(),'ben'),
	(31, 9500, 9500, NULL, NULL,NOW(),'ben');

SET FOREIGN_KEY_CHECKS = 0;
