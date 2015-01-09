use moneyiq;
-- Table campaign

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `campaign`;
DROP TABLE IF EXISTS `campaign_history`;
SET sql_notes = 1;

CREATE TABLE campaign (
    campaign_id int    NOT NULL ,
    credit_card_id int    NOT NULL ,
    campaign_name varchar(255)    NOT NULL ,
    description text    NULL ,
    max_points int    NULL ,
    value_in_yen int    NULL ,
    start_date date    NULL DEFAULT '1000-01-01' ,
    end_date date    NOT NULL ,
    issuer_id int    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) NULL,
    CONSTRAINT campaign_pk PRIMARY KEY (campaign_id)
);


CREATE TABLE campaign_history (
    campaign_id int    NOT NULL ,
    credit_card_id int    NOT NULL ,
    campaign_name varchar(255)    NOT NULL ,
    description text    NULL ,
    max_points int    NULL ,
    value_in_yen int    NULL ,
    start_date date    NULL DEFAULT '1000-01-01' ,
    end_date date    NOT NULL ,
    issuer_id int    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100),
    CONSTRAINT campaign_pk PRIMARY KEY (campaign_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;