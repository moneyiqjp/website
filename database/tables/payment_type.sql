use moneyiq;
-- Table payment_type

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `payment_type`;
DROP TABLE IF EXISTS `payment_type_history`;
SET sql_notes = 1;

CREATE TABLE payment_type (
    payment_type_id int    NOT NULL ,
    payment_type varchar(100)    NOT NULL ,
    payment_description text    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) NULL,
    CONSTRAINT payment_type_pk PRIMARY KEY (payment_type_id)
);


CREATE TABLE payment_type_history (
    payment_type_id int    NOT NULL ,
    payment_type varchar(100)    NOT NULL ,
    payment_description text    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) NULL,
    CONSTRAINT payment_type_pk PRIMARY KEY (payment_type_id, time_beg)
);



SET FOREIGN_KEY_CHECKS = 1;
