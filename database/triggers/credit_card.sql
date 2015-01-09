use moneyiq;
-- triggers on credit_card table

DELIMITER $$

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists credit_card_update;
SET sql_notes = 1;


CREATE TRIGGER credit_card_update
    BEFORE UPDATE ON credit_card
    FOR EACH ROW BEGIN
 
    INSERT INTO credit_card_history
    SET action = 'update',
		credit_card_id= OLD.credit_card_id,
		name= OLD.name,
		issuer_id= OLD.issuer_id,
		description= OLD.description,
		visa= OLD.visa,
		master= OLD.master,
		jcb= OLD.jcb,
		amex= OLD.amex,
		diners= OLD.diners,
		afilliate_link= OLD.afilliate_link,
		affiliate_id= OLD.affiliate_id,
		time_beg = OLD.update_time,
	   time_end = NOW(),
		update_user = OLD.update_user; 
		
		 
END$$
DELIMITER ;