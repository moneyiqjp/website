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
    item_name varchar(255)    NULL ,
    item_description text    NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) NULL,
    CONSTRAINT card_description_pk PRIMARY KEY (credit_card_id)
);


-- Table card_description
CREATE TABLE card_description_history (
    item_id int    NOT NULL ,
    credit_card_id int    NOT NULL ,
    item_name varchar(255)    NULL ,
    item_description text    NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100),
    CONSTRAINT card_description_pk PRIMARY KEY (credit_card_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;