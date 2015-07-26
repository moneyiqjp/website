use moneyiq;
SET NAMES utf8;
-- Table campaign

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `campaign`;
DROP TABLE IF EXISTS `campaign_history`;
SET sql_notes = 1;

CREATE TABLE campaign (
    campaign_id int NOT NULL  AUTO_INCREMENT,
    credit_card_id int    NOT NULL ,
    campaign_name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    max_points int    NULL ,
    value_in_yen int    NULL ,
    start_date date    NULL DEFAULT '1000-01-01' ,
    end_date date    NULL DEFAULT '9999-12-31' ,
	`reference` VARCHAR(255) NULL DEFAULT NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT campaign_pk PRIMARY KEY (campaign_id)
);


CREATE TABLE campaign_history (
    campaign_id int    NOT NULL ,
    credit_card_id int    NOT NULL ,
    campaign_name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    max_points int    NULL ,
    value_in_yen int    NULL ,
    start_date date    DEFAULT '1000-01-01' ,
    end_date date    NULL ,
	`reference` VARCHAR(255) NULL DEFAULT NULL,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT campaign_pk PRIMARY KEY (campaign_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;