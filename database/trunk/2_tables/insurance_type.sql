use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

-- Table affiliate_company
DROP TABLE IF EXISTS `insurance_type`;
CREATE TABLE insurance_type (
    insurance_type_id int NOT NULL AUTO_INCREMENT,
    type_name  varchar(255)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    subtype_name  varchar(255)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    region varchar(255) default "Global",
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT insurance_type_pk PRIMARY KEY (insurance_type_id)
);

DROP TABLE IF EXISTS `insurance_type_history`;
CREATE TABLE insurance_type_history (
    insurance_type_id int NOT NULL,
    type_name  varchar(255)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    subtype_name  varchar(255)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    region varchar(255) default "Global",
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    CONSTRAINT insurance_type_history_id_pk PRIMARY KEY (insurance_type_id, time_beg)
);

SET FOREIGN_KEY_CHECKS = 1;