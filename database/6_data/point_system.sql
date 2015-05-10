use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

delete from point_system where point_system_id>0;
ALTER TABLE point_system AUTO_INCREMENT = 1;

insert into point_system (point_system_name,default_points_per_yen,default_yen_per_point,update_time,update_user) values
('NONE', 0.0, 0.0, NOW(),'ben'), 
('リクルート', 1.0, 1.0,NOW(),'ben'), 
('T ポイント', 1.0,1.0,NOW(),'ben'), 
('セブン＆アイ', 1.0,1.0,NOW(),'ben'), 
('楽天', 1.0,1.0,NOW(),'ben'), 
('SMBC', 1.0,1.0,NOW(),'ben'), 
('ENEOS', 1.0,1.0,NOW(),'ben'),  
('Kampo', 1.0, 1.0, NOW(),'ben'), 
('SMBCワールドプレゼント', 1.0, 1.0, NOW(),'ben'), 
('YAMADA', 1.0, 1.0, NOW(),'ben'), 
('Saison 永久不減', 1.0, 1.0, NOW(),'ben'), 
('プリンスポイント', 1.0, 1.0, NOW(),'ben'), 
('m\'z PLUSポイント', 1.0, 1.0, NOW(),'ben'), 
('JR 九州', 1.0, 1.0, NOW(),'ben'), 
('カラマツトレイン', 1.0, 1.0, NOW(),'ben'),
('JAL', 1.0, 1.0, NOW(),'ben');

delete from card_point_system_map where credit_card_id>0;

insert into card_point_system_map ( credit_card_id, point_system_id, priority_id, update_time, update_user) values
( 1, 100, 1, NOW(),'ben'),
( 2, 100, 1, NOW(),'ben'),
( 3, 100, 1, NOW(),'ben'),
( 4, 100, 2, NOW(),'ben'),
( 5, 100, 3, NOW(),'ben' ),
( 6, 100, 4, NOW(),'ben' ),
( 7, 100, 4, NOW(),'ben' ),
( 8, 100, 4, NOW(),'ben' ),
( 9, 100, 5, NOW(),'ben' ),
( 10, 100, 6, NOW(),'ben' ),
( 11, 100, 6, NOW(),'ben' ),
( 12, 100, 6, NOW(),'ben' ),
( 13, 100, 2, NOW(),'ben' ),
( 14, 100, 7, NOW(),'ben' ),
( 15, 100, 8, NOW(),'ben' ),
( 16, 100, 8, NOW(),'ben' ),
( 17, 100, 8, NOW(),'ben' ),
( 18, 100, 8, NOW(),'ben' ),
( 19, 100, 8, NOW(),'ben' ),
( 20, 100, 9, NOW(),'ben' ),
( 20, 101, 10, NOW(),'ben' ),
( 21, 100, 11, NOW(),'ben' ),
( 21, 101, 10, NOW(),'ben' ),
( 22, 100, 12, NOW(),'ben' ),
( 23, 100, 13, NOW(),'ben' ),
( 24, 100, 8, NOW(),'ben' ),
( 25, 100, 8, NOW(),'ben' ),
( 26, 100, 8, NOW(),'ben' ),
( 27, 100, 14, NOW(),'ben' ),
( 28, 100, 11, NOW(),'ben' ),
( 28, 101, 10, NOW(),'ben' ),
( 29, 100, 15, NOW(),'ben' ),
( 30, 100, 15, NOW(),'ben' ),
( 31, 100, 15, NOW(),'ben' );



SET FOREIGN_KEY_CHECKS = 0;
