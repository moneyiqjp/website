use moneyiq;
SET NAMES utf8;
-- Table store]

-- required as we want to be able to refresh our db table by table
SET FOREIGN_KEY_CHECKS = 0;


-- turn off note warnings as tables don't exist during initial load
SET sql_notes = 0;
DROP TABLE IF EXISTS `store_category`;
SET sql_notes = 1;


CREATE TABLE store_category (
    store_category_id int NOT NULL AUTO_INCREMENT,
    name  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    description text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT category_pk PRIMARY KEY (store_category_id)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;


SET FOREIGN_KEY_CHECKS = 1;
