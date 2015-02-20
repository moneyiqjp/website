SET NAMES utf8;

use moneyiq;
-- Table issuer

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `issuer`;
DROP TABLE IF EXISTS `issuer_history`;
SET sql_notes = 1;


CREATE TABLE issuer (
    issuer_id	int    NOT NULL  AUTO_INCREMENT,
    issuer_name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) NULL,
    CONSTRAINT issuer_pk PRIMARY KEY (issuer_id)
);

CREATE TABLE issuer_history (
    issuer_id int    NOT NULL ,
    issuer_name varchar(255)    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) NULL,
    CONSTRAINT issuer_pk PRIMARY KEY (issuer_id, time_beg)
);


SET FOREIGN_KEY_CHECKS = 1;
