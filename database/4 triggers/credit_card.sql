use moneyiq;
-- triggers on credit_card table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists credit_card_before_update;
SET sql_notes = 1;


CREATE TRIGGER credit_card_before_update BEFORE UPDATE ON credit_card FOR EACH ROW
INSERT INTO credit_card_history (credit_card_id, name, issuer_id, description, visa, master, jcb, amex, diners, afilliate_link, affiliate_id, time_beg, time_end, update_user )
VALUES ( OLD.credit_card_id, OLD.name, OLD.issuer_id, OLD.description, OLD.visa, OLD.master, OLD.jcb, OLD.amex, OLD.diners, OLD.afilliate_link, OLD.affiliate_id, OLD.update_time, NOW(), OLD.update_user);
		