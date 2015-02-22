SET NAMES utf8;
use moneyiq;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `interest`;
CREATE TABLE interest (
	 interest_id int AUTO_INCREMENT,
    credit_card_id int    NOT NULL ,
    payment_type_id int    NOT NULL ,
    interest double(15,15)    NOT NULL ,
    update_time datetime NOT NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (interest_id),
    INDEX(credit_card_id)
);

DROP TABLE IF EXISTS `interest_history`;
CREATE TABLE interest_history (
	 interest_id int not null,
    credit_card_id int    NOT NULL ,
    payment_type_id int    NOT NULL ,
    interest double(15,15)    NOT NULL ,
    time_beg datetime NOT NULL,
    time_end datetime NULL,
    update_user varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT Interest_pk PRIMARY KEY (credit_card_id,payment_type_id,time_beg),
    INDEX(interest_id)
);

SET FOREIGN_KEY_CHECKS = 1;