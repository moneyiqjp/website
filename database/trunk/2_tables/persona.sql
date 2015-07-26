use moneyiq;
SET NAMES utf8;
-- Table store]

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `persona`;
DROP TABLE IF EXISTS `map_persona_scene`;
DROP TABLE IF EXISTS `scene`;
DROP TABLE IF EXISTS `map_scene_store_category`;
SET sql_notes = 1;


CREATE TABLE persona (
    persona_id int NOT NULL AUTO_INCREMENT,
    name  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT persona_pk PRIMARY KEY (persona_id)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

CREATE TABLE `map_persona_scene` (
/*	`map_id` INT(11) NOT NULL AUTO_INCREMENT, */
	persona_id INT(11) NOT NULL,
	scene_id INT(11) NOT NULL,
	priority_id INT(11) NULL DEFAULT '100',
	update_time DATETIME NOT NULL,
	update_user VARCHAR(100) NOT NULL,
	PRIMARY KEY (persona_id, scene_id),
	INDEX `fk_persona_id` (`persona_id`),
	INDEX `fk_scene_id` (`scene_id`),
	CONSTRAINT `fk_persona_id_ind` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`),
	CONSTRAINT `fk_scene_id_ind` FOREIGN KEY (`scene_id`) REFERENCES `scene` (`scene_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

CREATE TABLE scene (
    scene_id int NOT NULL AUTO_INCREMENT,
    name  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT scene_pk PRIMARY KEY (scene_id)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

CREATE TABLE `map_scene_store_category` (
/*	`map_id` INT(11) NOT NULL AUTO_INCREMENT, */
	scene_id INT(11) NOT NULL,
	store_category_id INT(11) NOT NULL,
	priority_id INT(11) NULL DEFAULT '100',
	update_time DATETIME NOT NULL,
	update_user VARCHAR(100) NOT NULL,
	PRIMARY KEY (scene_id, store_category_id),
	INDEX `fk_scene_id_ind` (`scene_id`),
	INDEX `fk_store_category_id_ind` (`store_category_id`),
	CONSTRAINT `fk_scene_id` FOREIGN KEY (`scene_id`) REFERENCES `scene` (`scene_id`),
	CONSTRAINT `fk_store_category_id` FOREIGN KEY (`store_category_id`) REFERENCES `store_category` (`store_category_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;


SET FOREIGN_KEY_CHECKS = 1;
