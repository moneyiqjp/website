SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;
delete from insurance where insurance_id>0;
ALTER TABLE insurance AUTO_INCREMENT = 1;

insert into  insurance ( credit_card_id,  insurance_type_id,  max_insured_amount,  value, update_time, update_user) 
values
/*shopping*/
 (1,  8, 2000000, 2000000, NOW(), 'ben' ), 
 (2,  8, 2000000, 2000000, NOW(), 'ben' ), 
 (3,  8, 2000000, 2000000, NOW(), 'ben' ), 
 (5,  8, 1000000, 1000000, NOW(), 'ben' ), 
 (6,  8, 500000, 500000, NOW(), 'ben' ), 
 (7,  8, 500000, 500000, NOW(), 'ben' ), 
 (8,  8, 3000000, 3000000, NOW(), 'ben' ), 
 (9,  8, 1000000, 1000000, NOW(), 'ben' ), 
 (10,  8, 1000000, 1000000, NOW(), 'ben' ), 
 (22,  8, 500000, 500000, NOW(), 'ben' ), 
 (23,  8, 500000, 500000, NOW(), 'ben' ), 
 (24,  8, 1000000, 1000000, NOW(), 'ben' ), 
 (25,  8, 1000000, 1000000, NOW(), 'ben' ), 
 (28,  8, 1000000, 1000000, NOW(), 'ben' ), 
 (29,  8, 3000000, 3000000, NOW(), 'ben' ), 
 (30,  8, 1000000, 1000000, NOW(), 'ben' ), 
 (31,  8, 1000000, 1000000, NOW(), 'ben' ),

/*domestic travel death*/
 (2,  2, 10000000, 10000000, NOW(), 'ben' ), 
 (8,  2, 50000000, 50000000, NOW(), 'ben' ), 
 (14,  2, 10000000, 10000000, NOW(), 'ben' ), 
 (24,  2, 20000000, 20000000, NOW(), 'ben' ), 
 (25,  2, 20000000, 20000000, NOW(), 'ben' ), 
 (27,  2, 10000000, 10000000, NOW(), 'ben' ), 
 (28,  2, 30000000, 30000000, NOW(), 'ben' ), 
 (31,  2, 50000000, 50000000, NOW(), 'ben' ), 

/* Domestic travel health */
 (8,  3, 150000, 150000, NOW(), 'ben' ), 
 (24,  3, 500000, 500000, NOW(), 'ben' ), 
 (25,  3, 500000, 500000, NOW(), 'ben' ),

/* international travel death */
 (1,  5, 20000000, 20000000, NOW(), 'ben' ), 
 (2,  5, 20000000, 20000000, NOW(), 'ben' ), 
 (3,  5, 30000000, 30000000, NOW(), 'ben' ), 
 (6,  5, 20000000, 20000000, NOW(), 'ben' ), 
 (7,  5, 20000000, 20000000, NOW(), 'ben' ), 
 (8,  5, 50000000, 50000000, NOW(), 'ben' ), 
 (9,  5, 20000000, 20000000, NOW(), 'ben' ), 
 (14,  5, 20000000, 20000000, NOW(), 'ben' ), 
 (27,  5, 20000000, 20000000, NOW(), 'ben' ), 
 (28,  5, 30000000, 30000000, NOW(), 'ben' ), 
 (29,  5, 100000000, 100000000, NOW(), 'ben' ), 
 (30,  5, 10000000, 10000000, NOW(), 'ben' ), 
 (31,  5, 50000000, 50000000, NOW(), 'ben' ), 

/*international travel hospital */
 (6,  6, 2000000, 2000000, NOW(), 'ben' ), 
 (7,  6, 2000000, 2000000, NOW(), 'ben' ), 
 (8,  6, 2000000, 2000000, NOW(), 'ben' ), 

/* international travel luggage */
 (6,  7, 200000, 200000, NOW(), 'ben' ), 
 (7,  7, 200000, 200000, NOW(), 'ben' ), 
 (8,  7, 1000000, 1000000, NOW(), 'ben' ); 

SET FOREIGN_KEY_CHECKS = 1;

