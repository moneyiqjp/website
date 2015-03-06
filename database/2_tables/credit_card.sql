SET NAMES utf8;
use moneyiq;
-- Table credit_card

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `credit_card`;
DROP TABLE IF EXISTS `credit_card_history`;
SET sql_notes = 1;


CREATE TABLE credit_card (
    credit_card_id int    NOT NULL  AUTO_INCREMENT,
    name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    issuer_id int    NOT NULL ,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    image_link varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    visa bool    NULL default 0,
    master bool    NULL default 0,
    jcb bool    NULL default 0,
    amex bool    NULL default 0,
    diners bool    NULL default 0,
    afilliate_link text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    affiliate_id int    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    CONSTRAINT credit_card_pk PRIMARY KEY (credit_card_id)
);


CREATE INDEX idx_1 ON credit_card (credit_card_id);


CREATE TABLE credit_card_history (
    credit_card_id int    NOT NULL,
    name varchar(255)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    issuer_id int    NOT NULL ,
    description text  CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    image_link varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    visa bool    NULL default 0,
    master bool    NULL default 0,
    jcb bool    NULL default 0,
    amex bool    NULL default 0,
    diners bool    NULL default 0,
    afilliate_link text  CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    affiliate_id int    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT credit_card_pk PRIMARY KEY (credit_card_id,time_beg)
);


SET FOREIGN_KEY_CHECKS = 1;

