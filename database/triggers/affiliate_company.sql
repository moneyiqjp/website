use moneyiq;
-- triggers on affiliate_company table

-- turn off note warnings as triggers don't exist during initial load
SET sql_notes = 0;
drop trigger if exists affiliate_company_before_update;
SET sql_notes = 1;


CREATE TRIGGER affiliate_company_before_update BEFORE UPDATE ON affiliate_company FOR EACH ROW
INSERT INTO affiliate_company_history (affiliate_id, name, description, website, signed_up_date,time_beg,time_end, update_user) values (OLD.affiliate_id,	OLD.name,	OLD.description,	OLD.website, OLD.signed_up_date, OLD.update_time,   NOW(),	OLD.update_user);	 
