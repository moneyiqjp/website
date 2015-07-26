use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

delete from card_description where item_id>0;
ALTER TABLE card_description AUTO_INCREMENT = 1;

insert into card_description (credit_card_id, item_name, item_description, update_time, update_user) values
 (1, 'general description','最短3営業日カード発送',NOW(),'ben'),
 (2, 'general description','最短3営業日カード発送',NOW(),'ben'),
 (3, 'general description','最短3営業日カード発送',NOW(),'ben'),
 (10, 'general description','24時間365日のロードサーブス',NOW(),'ben'),
 (10, 'general description','メンテンアンス料金割引サービス',NOW(),'ben'),
 (11, 'general description','24時間365日のロードサーブス',NOW(),'ben'),
 (11, 'general description','メンテンアンス料金割引サービス',NOW(),'ben'),
 (12, 'general description','24時間365日のロードサーブス',NOW(),'ben'),
 (12, 'general description','メンテンアンス料金割引サービス',NOW(),'ben');


SET FOREIGN_KEY_CHECKS = 1;