use moneyiq;
SET NAMES utf8;

-- Table point_usage

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `point_usage`;
DROP TABLE IF EXISTS `point_usage_history`;
SET sql_notes = 1;


CREATE TABLE point_usage (
    point_usage_id int    NOT NULL ,
    store_store_id int    NOT NULL ,
    yen_per_point double(16,16)    NOT NULL ,
    credit_card_id int    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_usage_pk PRIMARY KEY (point_usage_id)
);


CREATE TABLE point_usage_history (
    point_usage_id int    NOT NULL ,
    store_store_id int    NOT NULL ,
    yen_per_point double(16,16)    NOT NULL ,
    credit_card_id int    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT point_usage_pk PRIMARY KEY (point_usage_id,time_beg)
);



SET FOREIGN_KEY_CHECKS = 1;
