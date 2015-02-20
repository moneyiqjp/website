use moneyiq;

SET FOREIGN_KEY_CHECKS = 0;

-- Table affiliate_company
DROP TABLE IF EXISTS `affiliate_company`;
CREATE TABLE affiliate_company (
    affiliate_id int    NOT NULL ,
    name varchar(255)    NOT NULL ,
    description text    NULL ,
    website varchar(255)    NULL ,
    signed_up_date date    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100),
    CONSTRAINT affiliate_company_pk PRIMARY KEY (affiliate_id)
);

DROP TABLE IF EXISTS `affiliate_company_history`;
CREATE TABLE affiliate_company_history (
    affiliate_id int    NOT NULL ,
    name varchar(255)    NOT NULL ,
    description text    NULL ,
    website varchar(255)    NULL ,
    signed_up_date date    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100),
    CONSTRAINT affiliate_company_pk PRIMARY KEY (affiliate_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;