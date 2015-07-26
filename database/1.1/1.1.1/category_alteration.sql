use moneyiq;
SET NAMES utf8;

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;

delete from store_category where store_category_id >=0;
ALTER TABLE store_category AUTO_INCREMENT = 1;
insert into store_category (name, description, update_time,  update_user) values
('None','None',NOW(),'ben');

insert into store_category (name, description, update_time,  update_user) 
select distinct category name, category description, NOW() update_time,  'ben' update_user from store;


ALTER TABLE `store`
	ADD COLUMN `store_category_id` INT NOT NULL DEFAULT '1' AFTER `store_name`,
	ADD CONSTRAINT `FK_store_category` FOREIGN KEY (`store_category_id`) REFERENCES `store_category` (`store_category_id`);

update store set store_category_id = 1 where category="None";
update store set store_category_id = 2 where category="スーパー・コンビニ";
update store set store_category_id = 3 where category="ショッピング";
update store set store_category_id = 4 where category="エンタメ・旅行";
update store set store_category_id = 5 where category="カーライフ";
update store set store_category_id = 6 where category="レストラン・カフェ";
update store set store_category_id = 7 where category="ビューティー・エステ";
update store set store_category_id = 8 where category="Point System";

ALTER TABLE `store` DROP COLUMN `category`;

ALTER TABLE `store` ADD COLUMN `is_major` TINYINT NOT NULL DEFAULT '0' AFTER `description`;


SET FOREIGN_KEY_CHECKS = 1
