SET NAMES utf8;
use moneyiq;
-- Table discounts

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `discounts`;
DROP TABLE IF EXISTS `discounts_history`;
SET sql_notes = 1;


CREATE TABLE discounts (
    discount_id int NOT NULL AUTO_INCREMENT,
    percentage double(15,15) NOT NULL ,
    start_date date    NULL,
    end_date date    NULL ,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    credit_card_id int    NOT NULL ,
    store_id int    NOT NULL ,
    multiple double(30,30) NOT NULL,
    conditions text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT discounts_pk PRIMARY KEY (discount_id)
);

CREATE TABLE discounts_history (
    discount_id int    NOT NULL ,
    percentage double(15,15)    NOT NULL ,
    start_date date    NULL ,
    end_date date    NULL ,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    credit_card_id int    NOT NULL ,
    store_id int    NOT NULL ,
    multiple double(30,30) NOT NULL,
    conditions text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT discounts_pk PRIMARY KEY (discount_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;

