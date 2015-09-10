SET NAMES utf8;
-- Table map_scene_reward_category]

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `map_scene_reward_category`;
SET sql_notes = 1;

CREATE TABLE `map_scene_reward_category` (
	`scene_id` INT(11) NOT NULL,
	`reward_category_id` INT(11) NOT NULL,
	`priority_id` INT(11) NULL DEFAULT '100',
	`update_time` DATETIME NULL DEFAULT NULL,
	`update_user` VARCHAR(100) NULL DEFAULT NULL,
	PRIMARY KEY (`scene_id`, `reward_category_id`),
	INDEX `fk_msrc_scene_id_index` (`scene_id`),
	INDEX `fk_msrc_store_category_id_ind` (`reward_category_id`),
	CONSTRAINT `FK_msrc_map_scene_store_scene` FOREIGN KEY (`scene_id`) REFERENCES `scene` (`scene_id`),
	CONSTRAINT `FK_msrc_map_scene_store_store` FOREIGN KEY (`reward_category_id`) REFERENCES `reward_category` (`rewward_category_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

SET FOREIGN_KEY_CHECKS = 1;
