use moneyiq;
SET NAMES utf8;
-- Table point_acquisition

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `reward`;
DROP TABLE IF EXISTS `reward_history`;

SET sql_notes = 1;


CREATE TABLE reward (
    reward_id int    NOT NULL AUTO_INCREMENT,
    point_system_id int    NOT NULL ,
    type varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    title varchar(255)    NULL ,
    description text NULL,
    icon varchar(255) NULL,
    yen_per_point double    NOT NULL ,
    price_per_unit double    NULL ,
    min_points int    NULL ,
    max_points int    NULL ,
    required_points int    NULL ,
    max_period  varchar(255)    NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT reward_pk PRIMARY KEY (reward_id)
);

CREATE TABLE reward_history (
    reward_id int    NOT NULL AUTO_INCREMENT,
    point_system_id int    NOT NULL ,
    type varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    title varchar(255)    NULL ,
    description text NULL,
    icon varchar(255) NULL,
    yen_per_point decimal    NOT NULL ,
    price_per_unit decimal    NULL ,
    min_points int    NULL ,
    max_points int    NULL ,
    required_points int    NULL ,
    max_period  varchar(255)    NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_reward_pksystem_pk PRIMARY KEY (reward_id,time_beg)
);



SET FOREIGN_KEY_CHECKS = 1;

