SET NAMES utf8;
use moneyiq;

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;

delete from insurance_type where insurance_type_id > 0;

insert into insurance_type (type_name, subtype_name, region, description, update_time, update_user) values
('travel', 'travel', 'domestic','domestic travel insurance', NOW(),'ben'),
('travel', 'death', 'domestic','domestic travel life insurance', NOW(),'ben'),
('travel', 'hospital', 'domestic','domestic travel health insurance', NOW(),'ben'),
('travel', 'travel', 'international','international travel insurance', NOW(),'ben'),
('travel', 'death', 'international','international travel life insurance', NOW(),'ben'),
('travel', 'hospital', 'international','international travel health insurance', NOW(),'ben'),
('travel', 'luggage', 'international','international travel luggage insurance', NOW(),'ben'),
('shopping', 'shopping', 'domestic','shopping insuarance', NOW(),'ben');


SET FOREIGN_KEY_CHECKS = 1;