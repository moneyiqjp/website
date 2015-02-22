SET NAMES utf8;
use moneyiq;
-- Table fees

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `fees`;
DROP TABLE IF EXISTS `fees_history`;
SET sql_notes = 1;


CREATE TABLE fees (
    fee_id int    NOT NULL ,
    fee_type int    NOT NULL ,
    fee_amount int    NOT NULL ,
    yearly_occurrence int    NULL ,
    start_year int    NULL ,
    end_year int    NULL ,
    credit_card_id int    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT fees_pk PRIMARY KEY (fee_id)
);

CREATE TABLE fees_history (
    fee_id int    NOT NULL ,
    fee_type int    NOT NULL ,
    fee_amount int    NOT NULL ,
    yearly_occurrence int    NULL ,
    start_year int    NULL ,
    end_year int    NULL ,
    credit_card_id int    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT fees_pk PRIMARY KEY (fee_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;

