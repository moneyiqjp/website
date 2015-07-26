use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

-- Table affiliate_company
DROP TABLE IF EXISTS `unit`;
CREATE TABLE unit (
    unit_id int   NOT NULL AUTO_INCREMENT,
    name varchar(255)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT reward_type_pk PRIMARY KEY (unit_id)
);

DROP TABLE IF EXISTS `unit_history`;
CREATE TABLE unit_history (
    unit_id int    NOT NULL ,
    name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT reward_type_history_pk PRIMARY KEY (unit_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;