use moneyiq;
SET NAMES utf8;
-- foreign keys

SET FOREIGN_KEY_CHECKS = 0;

-- Reference:  Interest_credit_card (table: Interest)
ALTER TABLE interest ADD CONSTRAINT Interest_credit_card FOREIGN KEY Interest_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);

    
-- Reference:  Interest_payment_type (table: Interest)
ALTER TABLE interest ADD CONSTRAINT Interest_payment_type FOREIGN KEY Interest_payment_type (payment_type_id)
    REFERENCES payment_type (payment_type_id);

    
-- Reference:  affiliate_company_credit_card (table: credit_card)
ALTER TABLE credit_card ADD CONSTRAINT affiliate_company_credit_card FOREIGN KEY affiliate_company_credit_card (affiliate_id)
    REFERENCES affiliate_company (affiliate_id);


-- Reference:  campaign_credit_card (table: campaign)
ALTER TABLE campaign ADD CONSTRAINT campaign_credit_card FOREIGN KEY campaign_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);


-- Reference:  campaign_issuer (table: camdiscountspaign)
ALTER TABLE card_features ADD CONSTRAINT card_features_credit_card FOREIGN KEY card_features_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);


-- Reference:  creditcard_description (table: card_description)
ALTER TABLE card_description ADD CONSTRAINT creditcard_description FOREIGN KEY creditcard_description (credit_card_id)
    REFERENCES credit_card (credit_card_id);


-- Reference:  discounts_credit_card (table: discounts)
ALTER TABLE discounts ADD CONSTRAINT fk_discounts_credit_card FOREIGN KEY fk_discounts_credit_card_key (credit_card_id)
    REFERENCES credit_card (credit_card_id);

    
-- Reference:  discounts_store (table: discounts)
ALTER TABLE discounts ADD CONSTRAINT fk_discounts_store FOREIGN KEY fk_discounts_store_key (store_id)
    REFERENCES store (store_id);


-- Reference:  fees_credit_card (table: fees)
ALTER TABLE fees ADD CONSTRAINT fees_credit_card FOREIGN KEY fees_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);


-- Reference:  insurance_credit_card (table: insurance)
ALTER TABLE insurance ADD CONSTRAINT insurance_credit_card FOREIGN KEY insurance_credit_card (credit_card_id)
    REFERENCES credit_card (credit_card_id);


-- Reference:  insurance_insurance_type (table: insurance)
ALTER TABLE insurance ADD CONSTRAINT insurance_insurance_type FOREIGN KEY insurance_insurance_type_key (insurance_type_id)
    REFERENCES insurance_type (insurance_type_id);

    
-- Reference:  issuer_credit_card (table: credit_card)
ALTER TABLE credit_card ADD CONSTRAINT issuer_credit_card FOREIGN KEY issuer_credit_card (issuer_id) REFERENCES issuer (issuer_id);

  
ALTER TABLE card_features ADD CONSTRAINT fk_card_feature_type FOREIGN KEY fk_card_feature_type (feature_type_id)
    REFERENCES card_feature_type (feature_type_id);

ALTER TABLE card_point_system ADD 	CONSTRAINT `fk_credit_card_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`credit_card_id`);
ALTER TABLE card_point_system ADD 	CONSTRAINT `fk_point_system` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`);

ALTER TABLE point_acquisition ADD 	CONSTRAINT `FK_point_acquisition_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);
ALTER TABLE point_acquisition ADD 	CONSTRAINT `ps_point_acquisition` FOREIGN KEY (`point_system_id`) REFERENCES `point_system` (`point_system_id`);

ALTER TABLE reward	ADD CONSTRAINT `FK_unit` FOREIGN KEY (`unit_id`) REFERENCES unit (`unit_id`);

SET FOREIGN_KEY_CHECKS = 1;