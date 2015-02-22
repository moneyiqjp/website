SET NAMES utf8;
use moneyiq;
-- Table card_description
-- allows additional descriptions for a credit card

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off wote warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `card_description`;
DROP TABLE IF EXISTS `card_description_history`;
SET sql_notes = 1;

CREATE TABLE card_description (
    item_id int    NOT NULL ,
    credit_card_id int    NOT NULL ,
    item_name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    item_description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    CONSTRAINT card_description_pk PRIMARY KEY (credit_card_id)
);


-- Table card_description
CREATE TABLE card_description_history (
    item_id int    NOT NULL ,
    credit_card_id int    NOT NULL ,
    item_name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    item_description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT card_description_pk PRIMARY KEY (credit_card_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;