use moneyiq;
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
