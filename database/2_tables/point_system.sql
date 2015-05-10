use moneyiq;
SET NAMES utf8;
-- Table point_acquisition

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `point_system`;
DROP TABLE IF EXISTS `point_system_history`;
DROP TABLE IF EXISTS `card_point_system_map`;
SET sql_notes = 1;

CREATE TABLE point_system (
    point_system_id int    NOT NULL AUTO_INCREMENT,
    point_system_name varchar(255)    NOT NULL ,
    default_points_per_yen decimal    NOT NULL ,
    default_yen_per_point decimal    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_system_pk PRIMARY KEY (point_system_id)
);

CREATE TABLE point_system_history (
    point_system_id int    NOT NULL ,
    point_system_name varchar(255)    NOT NULL ,
    default_points_per_yen decimal    NOT NULL ,
    default_yen_per_point decimal    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_system_pk PRIMARY KEY (point_system_id,time_beg)
);


CREATE TABLE card_point_system_map (
    credit_card_id int    NOT NULL,
    point_system_id int    NOT NULL,
    priority_id int DEFAULT 100,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_system_pk PRIMARY KEY (credit_card_id, point_system_id)
);

SET FOREIGN_KEY_CHECKS = 1;
