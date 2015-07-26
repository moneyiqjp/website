SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

delete from fees where fee_id>0;
ALTER TABLE fees AUTO_INCREMENT = 1;

insert into  fees ( fee_type,  fee_amount, yearly_occurrence,  start_year, end_year, credit_card_id, update_time, update_user) 
values
( 1, 0, 1, 0, 1, 1, NOW(),'ben'),
( 2, 0, 1, 1, 2, 1, NOW(),'ben'),
( 1, 0, 1, 0, 1, 2, NOW(),'ben'),
( 2, 0, 1, 1, 2, 2, NOW(),'ben'),
( 1, 2000, 1, 0, 1, 3, NOW(),'ben'),
( 2, 2000, 1, 1, 2, 3, NOW(),'ben'),
( 1, 0, 1, 0, 1, 4, NOW(),'ben'),
( 2, 0, 1, 1, 2, 4, NOW(),'ben'),
( 1, 0, 1, 0, 1, 5, NOW(),'ben'),
( 2, 1000, 1, 1, 2, 5, NOW(),'ben'),
( 1, 0, 1, 0, 1, 6, NOW(),'ben'),
( 2, 1250, 1, 1, 2, 6, NOW(),'ben'),
( 1, 0, 1, 0, 1, 7, NOW(),'ben'),
( 2, 1250, 1, 1, 2, 7, NOW(),'ben'),
( 1, 10800, 1, 0, 1, 8, NOW(),'ben'),
( 2, 10800, 1, 1, 2, 8, NOW(),'ben'),
( 1, 0, 1, 0, 1, 9, NOW(),'ben'),
( 2, 1250, 1, 1, 2, 9, NOW(),'ben'),
( 1, 0, 1, 0, 1, 10, NOW(),'ben'),
( 2, 1350, 1, 1, 2, 10, NOW(),'ben'),
( 1, 0, 1, 0, 1, 11, NOW(),'ben'),
( 2, 1350, 1, 1, 2, 11, NOW(),'ben'),
( 1, 0, 1, 0, 1, 12, NOW(),'ben'),
( 2, 1350, 1, 1, 2, 12, NOW(),'ben'),
( 1, 0, 1, 0, 1, 13, NOW(),'ben'),
( 2, 0, 1, 1, 2, 13, NOW(),'ben'),
( 1, 0, 1, 0, 1, 14, NOW(),'ben'),
( 2, 1500, 1, 1, 2, 14, NOW(),'ben'),
( 1, 0, 1, 0, 1, 15, NOW(),'ben'),
( 2, 0, 1, 1, 2, 15, NOW(),'ben'),
( 1, 0, 1, 0, 1, 16, NOW(),'ben'),
( 2, 0, 1, 1, 2, 16, NOW(),'ben'),
( 1, 0, 1, 0, 1, 17, NOW(),'ben'),
( 2, 0, 1, 1, 2, 17, NOW(),'ben'),
( 1, 0, 1, 0, 1, 18, NOW(),'ben'),
( 2, 0, 1, 1, 2, 18, NOW(),'ben'),
( 1, 0, 1, 0, 1, 19, NOW(),'ben'),
( 2, 0, 1, 1, 2, 19, NOW(),'ben'),
( 1, 0, 1, 0, 1, 20, NOW(),'ben'),
( 2, 0, 1, 1, 2, 20, NOW(),'ben'),
( 1, 0, 1, 0, 1, 21, NOW(),'ben'),
( 2, 0, 1, 1, 2, 21, NOW(),'ben'),
( 1, 0, 1, 0, 1, 22, NOW(),'ben'),
( 2, 0, 1, 1, 2, 22, NOW(),'ben'),
( 1, 0, 1, 0, 1, 23, NOW(),'ben'),
( 2, 1350, 1, 1, 2, 23, NOW(),'ben'),
( 1, 0, 1, 0, 1, 24, NOW(),'ben'),
( 2, 1350, 1, 1, 2, 24, NOW(),'ben');


SET FOREIGN_KEY_CHECKS = 1;

