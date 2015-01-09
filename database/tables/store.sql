use moneyiq;
-- Table store]

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `store`;
DROP TABLE IF EXISTS `store_history`;
SET sql_notes = 1;



CREATE TABLE store (
    store_id int    NOT NULL ,
    store_name varchar(100)    NOT NULL ,
    category varchar(100)    NOT NULL ,
    description text    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) NULL,
    CONSTRAINT store_pk PRIMARY KEY (store_id)
);


CREATE TABLE store_history (
    store_id int    NOT NULL ,
    store_name varchar(100)    NOT NULL ,
    category varchar(100)    NOT NULL ,
    description text    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) NULL,
    CONSTRAINT store_pk PRIMARY KEY (store_id,time_beg)
);


SET FOREIGN_KEY_CHECKS = 1;
