SET NAMES utf8;
use moneyiq;
-- Table card_features

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `card_feature_type`;
DROP TABLE IF EXISTS `card_feature_type_history`;
SET sql_notes = 1;

CREATE TABLE card_feature_type (
    feature_type_id int    NOT NULL  AUTO_INCREMENT,
    name varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    category varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,    
	`foreground_color` VARCHAR(250) NULL DEFAULT NULL,
	`background_color` VARCHAR(250) NULL DEFAULT NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    CONSTRAINT card_features_pk PRIMARY KEY (feature_type_id)
);

CREATE TABLE card_feature_type_history (
    feature_type_id int    NOT NULL,
    name varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,   
    category varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,   
    time_beg datetime NOT NULL,
    time_end datetime NULL,
	`foreground_color` VARCHAR(250) NULL DEFAULT NULL,
	`background_color` VARCHAR(250) NULL DEFAULT NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    CONSTRAINT card_features_pk PRIMARY KEY (feature_type_id,time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;