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
    name varchar(255)    NOT NULL ,
    issuer_id int    NOT NULL ,
    description text    NULL ,
    visa bool    NULL ,
    master bool    NULL ,
    jcb bool    NULL ,
    amex bool    NULL ,
    diners bool    NULL ,
    afilliate_link varchar(255)    NULL ,
    affiliate_id int    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) NULL,
    CONSTRAINT credit_card_pk PRIMARY KEY (credit_card_id)
);


CREATE INDEX idx_1 ON credit_card (credit_card_id);


CREATE TABLE credit_card_history (
    credit_card_id int    NOT NULL  AUTO_INCREMENT,
    name varchar(255)    NOT NULL ,
    issuer_id int    NOT NULL ,
    description text    NULL ,
    visa bool    NULL ,
    master bool    NULL ,
    jcb bool    NULL ,
    amex bool    NULL ,
    diners bool    NULL ,
    afilliate_link varchar(255)    NULL ,
    affiliate_id int    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) NULL,
    CONSTRAINT credit_card_pk PRIMARY KEY (credit_card_id,time_beg)
);


SET FOREIGN_KEY_CHECKS = 1;

