SET NAMES utf8;
use moneyiq;
-- Table card_features

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `card_features`;
DROP TABLE IF EXISTS `card_features_history`;
SET sql_notes = 1;

CREATE TABLE card_features (
    feature_id int    NOT NULL  AUTO_INCREMENT,
    feature_type_id int NOT NULL,
    credit_card_id int    NOT NULL ,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    feature_cost int    NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    CONSTRAINT card_features_pk PRIMARY KEY (feature_id)
);

CREATE TABLE card_features_history (
    feature_id int    NOT NULL,
    feature_type_id int NOT NULL,
    credit_card_id int    NOT NULL ,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100),
    CONSTRAINT card_features_pk PRIMARY KEY (feature_id,time_beg)
);


SET FOREIGN_KEY_CHECKS = 1;