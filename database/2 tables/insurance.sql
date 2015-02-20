use moneyiq;
-- Table insurance

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `insurance`;
DROP TABLE IF EXISTS `insurance_history`;
SET sql_notes = 1;


CREATE TABLE insurance (
    insurance_id int    NOT NULL ,
    credit_card_id int    NOT NULL ,
    shopping int    NULL ,
    domestic_travel int    NULL ,
    domestic_travel_hospital int    NULL ,
    domestic_travel_death int    NULL ,
    international_travel int    NULL ,
    international_travel_hospital int    NULL ,
    international_travel_death int    NULL ,
    international_travel_luggage int    NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) NULL,
    CONSTRAINT insurance_pk PRIMARY KEY (insurance_id)
);

CREATE TABLE insurance_history (
    insurance_id int    NOT NULL ,
    credit_card_id int    NOT NULL ,
    shopping int    NULL ,
    domestic_travel int    NULL ,
    domestic_travel_hospital int    NULL ,
    domestic_travel_death int    NULL ,
    international_travel int    NULL ,
    international_travel_hospital int    NULL ,
    international_travel_death int    NULL ,
    international_travel_luggage int    NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) NULL,
    CONSTRAINT insurance_pk PRIMARY KEY (insurance_id, time_beg)
);


SET FOREIGN_KEY_CHECKS = 1;
