-- Created by Vertabelo (http://vertabelo.com)
-- Script type: create
-- Scope: [tables, references, sequences, views, procedures]
-- Generated at Wed Jan 07 19:31:13 UTC 2015




-- tables
-- Table Interest
CREATE TABLE Interest (
    credit_card_id int    NOT NULL ,
    payment_type_id int    NOT NULL ,
    interest double(15,15)    NOT NULL ,
    CONSTRAINT Interest_pk PRIMARY KEY (credit_card_id,payment_type_id)
);

-- Table affiliate_company
CREATE TABLE affiliate_company (
    affiliate_id int    NOT NULL ,
    name int    NOT NULL ,
    description text    NULL ,
    website varchar(255)    NULL ,
    signed_up_date date    NOT NULL ,
    CONSTRAINT affiliate_company_pk PRIMARY KEY (affiliate_id)
);

-- Table campaign
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
    CONSTRAINT campaign_pk PRIMARY KEY (campaign_id)
);

-- Table card_description
CREATE TABLE card_description (
    item_id int    NOT NULL ,
    credit_card_id int    NOT NULL ,
    item_name varchar(255)    NULL ,
    item_description text    NULL ,
    CONSTRAINT card_description_pk PRIMARY KEY (credit_card_id)
);

-- Table card_features
CREATE TABLE card_features (
    feature_id int    NOT NULL  AUTO_INCREMENT,
    credit_card_id int    NOT NULL ,
    feature_name varchar(250)    NOT NULL ,
    feature_type int    NOT NULL ,
    feature_description text    NULL ,
    feature_cost int    NULL ,
    CONSTRAINT card_features_pk PRIMARY KEY (feature_id)
);

-- Table credit_card
CREATE TABLE credit_card (
    credit_card_id int    NOT NULL  AUTO_INCREMENT,
    name varchar(255)    NOT NULL ,
    issuer_id int    NOT NULL ,
    description text    NULL ,
    visa bool    NULL ,
    master bool    NULL ,
    jcb bool    NULL ,
    amex bool    NULL ,
    diners bool    NULL ,
    afilliate_link varchar(255)    NULL ,
    affiliate_id int    NOT NULL ,
    CONSTRAINT credit_card_pk PRIMARY KEY (credit_card_id)
);

CREATE INDEX idx_1 ON credit_card (credit_card_id);


-- Table discounts
CREATE TABLE discounts (
    discount_id int    NOT NULL ,
    percentage double(15,15)    NOT NULL ,
    start_date date    NULL ,
    end_date date    NULL ,
    description text    NULL ,
    credit_card_id int    NOT NULL ,
    store_store_id int    NOT NULL ,
    CONSTRAINT discounts_pk PRIMARY KEY (discount_id)
);

-- Table fees
CREATE TABLE fees (
    fee_id int    NOT NULL ,
    fee_type int    NOT NULL ,
    fee_amount int    NOT NULL ,
    yearly_occurrence int    NULL ,
    start_year int    NULL ,
    end_year int    NULL ,
    credit_card_id int    NOT NULL ,
    CONSTRAINT fees_pk PRIMARY KEY (fee_id)
);

-- Table insurance
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
    CONSTRAINT insurance_pk PRIMARY KEY (insurance_id)
);

-- Table issuer
CREATE TABLE issuer (
    issuer_id int    NOT NULL ,
    issuer_name varchar(255)    NOT NULL ,
    CONSTRAINT issuer_pk PRIMARY KEY (issuer_id)
);

-- Table payment_type
CREATE TABLE payment_type (
    payment_type_id int    NOT NULL ,
    payment_type varchar(100)    NOT NULL ,
    payment_description text    NOT NULL ,
    CONSTRAINT payment_type_pk PRIMARY KEY (payment_type_id)
);

-- Table point_system
CREATE TABLE point_system (
    point_system_id int    NOT NULL ,
    point_system_name varchar(255)    NOT NULL ,
    points_per_yen double(15,15)    NOT NULL ,
    credit_card_id int    NOT NULL ,
    store_store_id int    NOT NULL ,
    CONSTRAINT point_system_pk PRIMARY KEY (point_system_id)
);

-- Table point_usage
CREATE TABLE point_usage (
    point_usage_id int    NOT NULL ,
    store_store_id int    NOT NULL ,
    yen_per_point double(16,16)    NOT NULL ,
    credit_card_id int    NOT NULL ,
    CONSTRAINT point_usage_pk PRIMARY KEY (point_usage_id)
);

-- Table store
CREATE TABLE store (
    store_id int    NOT NULL ,
    store_name varchar(100)    NOT NULL ,
    category varchar(100)    NOT NULL ,
    description text    NOT NULL ,
    CONSTRAINT store_pk PRIMARY KEY (store_id)
);




-- views
-- View: vw_active_campaign
CREATE VIEW vw_active_campaign AS
Select * from campaign where start_date < NOW() and end_date > NOW();




-- foreign keys
-- Reference:  Interest_credit_card (table: Interest)


ALTER TABLE Interest ADD CONSTRAINT Interest_credit_card FOREIGN KEY Interest_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);
-- Reference:  Interest_payment_type (table: Interest)


ALTER TABLE Interest ADD CONSTRAINT Interest_payment_type FOREIGN KEY Interest_payment_type (payment_type_id)
    REFERENCES payment_type (payment_type_id);
-- Reference:  affiliate_company_credit_card (table: credit_card)


ALTER TABLE credit_card ADD CONSTRAINT affiliate_company_credit_card FOREIGN KEY affiliate_company_credit_card (affiliate_id)
    REFERENCES affiliate_company (affiliate_id);
-- Reference:  campaign_credit_card (table: campaign)


ALTER TABLE campaign ADD CONSTRAINT campaign_credit_card FOREIGN KEY campaign_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);
-- Reference:  campaign_issuer (table: campaign)


ALTER TABLE campaign ADD CONSTRAINT campaign_issuer FOREIGN KEY campaign_issuer (issuer_id)
    REFERENCES issuer (issuer_id);
-- Reference:  card_features_credit_card (table: card_features)


ALTER TABLE card_features ADD CONSTRAINT card_features_credit_card FOREIGN KEY card_features_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);
-- Reference:  credit_card_point_system (table: point_system)


ALTER TABLE point_system ADD CONSTRAINT credit_card_point_system FOREIGN KEY credit_card_point_system (credit_card_id)
    REFERENCES credit_card (credit_card_id);
-- Reference:  creditcard_description (table: card_description)


ALTER TABLE card_description ADD CONSTRAINT creditcard_description FOREIGN KEY creditcard_description (credit_card_id)
    REFERENCES credit_card (credit_card_id);
-- Reference:  discounts_credit_card (table: discounts)


ALTER TABLE discounts ADD CONSTRAINT discounts_credit_card FOREIGN KEY discounts_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);
-- Reference:  discounts_store (table: discounts)


ALTER TABLE discounts ADD CONSTRAINT discounts_store FOREIGN KEY discounts_store (store_store_id)
    REFERENCES store (store_id);
-- Reference:  fees_credit_card (table: fees)


ALTER TABLE fees ADD CONSTRAINT fees_credit_card FOREIGN KEY fees_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);
-- Reference:  insurance_credit_card (table: insurance)


ALTER TABLE insurance ADD CONSTRAINT insurance_credit_card FOREIGN KEY insurance_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);
-- Reference:  issuer_credit_card (table: credit_card)


ALTER TABLE credit_card ADD CONSTRAINT issuer_credit_card FOREIGN KEY issuer_credit_card (issuer_id)
    REFERENCES issuer (issuer_id);
-- Reference:  point_system_store (table: point_system)


ALTER TABLE point_system ADD CONSTRAINT point_system_store FOREIGN KEY point_system_store (store_store_id)
    REFERENCES store (store_id);
-- Reference:  point_usage_credit_card (table: point_usage)


ALTER TABLE point_usage ADD CONSTRAINT point_usage_credit_card FOREIGN KEY point_usage_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);
-- Reference:  point_usage_store (table: point_usage)


ALTER TABLE point_usage ADD CONSTRAINT point_usage_store FOREIGN KEY point_usage_store (store_store_id)
    REFERENCES store (store_id);



-- End of file.

