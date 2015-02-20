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
    discount_id int    NOT NULL ,
    percentage double(15,15)    NOT NULL ,
    start_date date    NULL ,
    end_date date    NULL ,
    description text    NULL ,
    credit_card_id int    NOT NULL ,
    store_store_id int    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) NULL,
    CONSTRAINT discounts_pk PRIMARY KEY (discount_id)
);

CREATE TABLE discounts_history (
    discount_id int    NOT NULL ,
    percentage double(15,15)    NOT NULL ,
    start_date date    NULL ,
    end_date date    NULL ,
    description text    NULL ,
    credit_card_id int    NOT NULL ,
    store_store_id int    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) NULL,
    CONSTRAINT discounts_pk PRIMARY KEY (discount_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;

