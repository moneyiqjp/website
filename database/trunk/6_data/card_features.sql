use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

delete from card_features where feature_id>0;
ALTER TABLE card_features AUTO_INCREMENT = 1;

insert into card_features (feature_type_id, credit_card_id, feature_cost, description, 
			update_time, update_user) values
(15 ,1 ,0,NULL ,NOW(),'ben'),
(15 ,5 ,0,NULL ,NOW(),'ben'),
(15 ,6 ,0,NULL ,NOW(),'ben'),
(15 ,8 ,0,NULL ,NOW(),'ben'),
(15 ,9 ,0,NULL ,NOW(),'ben'),
(15 ,10 ,0,NULL ,NOW(),'ben'),
(15 ,11 ,0,NULL ,NOW(),'ben'),
(15 ,12 ,0,NULL ,NOW(),'ben'),
(15 ,13 ,0,NULL ,NOW(),'ben'),
(15 ,14 ,0,NULL ,NOW(),'ben'),
(15 ,15 ,0,NULL ,NOW(),'ben'),
(15 ,16 ,0,NULL ,NOW(),'ben'),
(15 ,17 ,0,NULL ,NOW(),'ben'),
(15 ,18 ,0,NULL ,NOW(),'ben'),
(15 ,19 ,0,NULL ,NOW(),'ben'),
(15 ,21 ,0,NULL ,NOW(),'ben'),
(15 ,23 ,0,NULL ,NOW(),'ben'),
(15 ,24 ,0,NULL ,NOW(),'ben'),
(15 ,25 ,0,NULL ,NOW(),'ben'),
(15 ,26 ,0,NULL ,NOW(),'ben'),
(16 ,6 ,0,NULL ,NOW(),'ben'),
(16 ,8 ,0,NULL ,NOW(),'ben'),
(16 ,21 ,0,NULL ,NOW(),'ben'),
(16 ,22 ,0,NULL ,NOW(),'ben'),
(16 ,23 ,0,NULL ,NOW(),'ben'),
(16 ,24 ,0,NULL ,NOW(),'ben'),
(16 ,27 ,0,NULL ,NOW(),'ben'),
(17 ,2 ,0,NULL ,NOW(),'ben'),
(17 ,3 ,0,NULL ,NOW(),'ben'),
(17 ,4 ,0,NULL ,NOW(),'ben'),
(17 ,5 ,0,NULL ,NOW(),'ben'),
(17 ,7 ,0,NULL ,NOW(),'ben'),
(17 ,10 ,0,NULL ,NOW(),'ben'),
(17 ,11 ,0,NULL ,NOW(),'ben'),
(17 ,12 ,0,NULL ,NOW(),'ben'),
(17 ,13 ,0,NULL ,NOW(),'ben'),
(17 ,14 ,0,NULL ,NOW(),'ben'),
(17 ,21 ,0,NULL ,NOW(),'ben'),
(17 ,22 ,0,NULL ,NOW(),'ben'),
(17 ,23 ,0,NULL ,NOW(),'ben'),
(17 ,29 ,0,NULL ,NOW(),'ben'),
(17 ,30 ,0,NULL ,NOW(),'ben'),
(17 ,31 ,0,NULL ,NOW(),'ben'),
(18 ,20 ,0,NULL ,NOW(),'ben'),
(18 ,23 ,0,NULL ,NOW(),'ben'),
(18 ,28 ,0,NULL ,NOW(),'ben'),
(2 ,1 ,0,NULL ,NOW(),'ben'),
(2 ,2 ,0,NULL ,NOW(),'ben'),
(2 ,3 ,0,NULL ,NOW(),'ben'),
(2 ,4 ,0,NULL ,NOW(),'ben'),
(2 ,5 ,0,NULL ,NOW(),'ben'),
(2 ,6 ,540,NULL ,NOW(),'ben'),
(2 ,7 ,540,NULL ,NOW(),'ben'),
(2 ,8 ,0,NULL ,NOW(),'ben'),
(2 ,9 ,0,NULL ,NOW(),'ben'),
(2 ,10 ,0,NULL ,NOW(),'ben'),
(2 ,11 ,0,NULL ,NOW(),'ben'),
(2 ,12 ,0,NULL ,NOW(),'ben'),
(2 ,13 ,0,NULL ,NOW(),'ben'),
(2 ,14 ,0,NULL ,NOW(),'ben'),
(2 ,20 ,0,NULL ,NOW(),'ben'),
(2 ,21 ,0,NULL ,NOW(),'ben'),
(2 ,22 ,0,NULL ,NOW(),'ben'),
(2 ,23 ,0,NULL ,NOW(),'ben'),
(2 ,23 ,0,'2年目から500円(税別)' ,NOW(),'ben'),
(2 ,24 ,0,'2年目から500円(税別)' ,NOW(),'ben'),
(2 ,25 ,0,'2年目から500円(税別)' ,NOW(),'ben'),
(2 ,27 ,0,NULL ,NOW(),'ben'),
(2 ,28 ,0,NULL ,NOW(),'ben'),
(2 ,29 ,0,NULL ,NOW(),'ben'),
(2 ,30 ,0,NULL ,NOW(),'ben'),
(2 ,31 ,0,NULL ,NOW(),'ben'),
(3 ,1 ,0,NULL ,NOW(),'ben'),
(3 ,2 ,0,NULL ,NOW(),'ben'),
(3 ,3 ,0,NULL ,NOW(),'ben'),
(3 ,5 ,0,NULL ,NOW(),'ben'),
(3 ,8 ,5400,NULL ,NOW(),'ben'),
(3 ,9 ,0,NULL ,NOW(),'ben'),
(3 ,10 ,0,NULL ,NOW(),'ben'),
(3 ,11 ,0,NULL ,NOW(),'ben'),
(3 ,12 ,0,NULL ,NOW(),'ben'),
(3 ,13 ,0,NULL ,NOW(),'ben'),
(3 ,14 ,0,NULL ,NOW(),'ben'),
(3 ,21 ,0,NULL ,NOW(),'ben'),
(3 ,28 ,1080,NULL ,NOW(),'ben'),
(3 ,29 ,8400,NULL ,NOW(),'ben'),
(3 ,30 ,1050,NULL ,NOW(),'ben'),
(3 ,31 ,3650,NULL ,NOW(),'ben'),
(4 ,4 ,0,NULL ,NOW(),'ben'),
(4 ,9 ,0,NULL ,NOW(),'ben'),
(4 ,20 ,0,NULL ,NOW(),'ben'),
(4 ,23 ,0,NULL ,NOW(),'ben'),
(4 ,24 ,0,NULL ,NOW(),'ben'),
(4 ,25 ,0,NULL ,NOW(),'ben'),
(4 ,26 ,0,NULL ,NOW(),'ben'),
(5 ,5 ,0,NULL ,NOW(),'ben'),
(5 ,7 ,0,NULL ,NOW(),'ben'),
(5 ,13 ,0,NULL ,NOW(),'ben'),
(5 ,20 ,0,NULL ,NOW(),'ben'),
(5 ,21 ,0,NULL ,NOW(),'ben'),
(5 ,23 ,0,NULL ,NOW(),'ben'),
(5 ,27 ,0,NULL ,NOW(),'ben'),
(5 ,28 ,0,NULL ,NOW(),'ben'),
(6 ,21 ,0,NULL ,NOW(),'ben'),
(6 ,22 ,0,NULL ,NOW(),'ben'),
(6 ,23 ,0,NULL ,NOW(),'ben'),
(6 ,27 ,0,NULL ,NOW(),'ben'),
(6 ,28 ,0,NULL ,NOW(),'ben'),
(6 ,29 ,0,NULL ,NOW(),'ben'),
(6 ,30 ,0,NULL ,NOW(),'ben'),
(6 ,31 ,0,NULL ,NOW(),'ben'),
(7 ,6 ,0,NULL ,NOW(),'ben'),
(7 ,8 ,0,NULL ,NOW(),'ben'),
(7 ,9 ,0,NULL ,NOW(),'ben'),
(7 ,20 ,0,NULL ,NOW(),'ben'),
(7 ,21 ,0,NULL ,NOW(),'ben'),
(7 ,22 ,0,NULL ,NOW(),'ben'),
(7 ,23 ,0,NULL ,NOW(),'ben'),
(7 ,24 ,0,NULL ,NOW(),'ben'),
(7 ,27 ,0,NULL ,NOW(),'ben'),
(7 ,28 ,0,NULL ,NOW(),'ben'),
(7 ,29 ,0,NULL ,NOW(),'ben'),
(7 ,30 ,0,NULL ,NOW(),'ben'),
(7 ,31 ,0,NULL ,NOW(),'ben'),
(8 ,23 ,0,NULL ,NOW(),'ben'),
(9 ,10 ,0,NULL ,NOW(),'ben'),
(9 ,11 ,0,NULL ,NOW(),'ben'),
(9 ,12 ,0,NULL ,NOW(),'ben'),
(9 ,20 ,0,NULL ,NOW(),'ben'),
(10 ,24 ,0,NULL ,NOW(),'ben'),
(10 ,25 ,0,NULL ,NOW(),'ben'),
(10 ,26 ,0,NULL ,NOW(),'ben'),
(10 ,29 ,0,NULL ,NOW(),'ben'),
(10 ,30 ,0,NULL ,NOW(),'ben'),
(10 ,31 ,0,NULL ,NOW(),'ben'),
(11 ,20 ,0,NULL ,NOW(),'ben'),
(11 ,21 ,0,NULL ,NOW(),'ben'),
(11 ,28 ,0,NULL ,NOW(),'ben'),
(11 ,29 ,0,NULL ,NOW(),'ben'),
(11 ,30 ,0,NULL ,NOW(),'ben'),
(11 ,31 ,0,NULL ,NOW(),'ben'),
(12 ,27 ,0,NULL ,NOW(),'ben'),
(12 ,29 ,0,NULL ,NOW(),'ben'),
(12 ,30 ,0,NULL ,NOW(),'ben'),
(12 ,31 ,0,NULL ,NOW(),'ben'),
(13 ,29 ,0,NULL ,NOW(),'ben'),
(13 ,30 ,0,NULL ,NOW(),'ben'),
(13 ,31 ,0,NULL ,NOW(),'ben'),
(14 ,29 ,0,NULL ,NOW(),'ben'),
(14 ,30 ,0,NULL ,NOW(),'ben'),
(14 ,31 ,0,NULL ,NOW(),'ben');


SET FOREIGN_KEY_CHECKS = 1;