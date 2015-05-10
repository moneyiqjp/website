use moneyiq;
SET NAMES utf8;
-- Table point_acquisition

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `point_acquisition`;
DROP TABLE IF EXISTS `point_acquisition_history`;
SET sql_notes = 1;

CREATE TABLE point_acquisition (
    point_acquisition_id int    NOT NULL AUTO_INCREMENT,
    point_acquisition_name varchar(255)    NOT NULL ,
    points_per_yen double(15,15)    NOT NULL ,
    point_system_id int    NOT NULL ,
    store_id int    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_acquisition_pk PRIMARY KEY (point_acquisition_id)
);

CREATE TABLE point_acquisition_history (
    point_acquisition_id int    NOT NULL ,
    point_acquisition_name varchar(255)    NOT NULL ,
    points_per_yen double(15,15)    NOT NULL ,
    point_system_id int    NOT NULL ,
    store_id int    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_acquisition_pk PRIMARY KEY (point_acquisition_id,time_beg)
);



SET FOREIGN_KEY_CHECKS = 1;
