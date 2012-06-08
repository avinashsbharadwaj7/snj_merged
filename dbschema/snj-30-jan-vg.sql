ALTER TABLE `snj`.`jobs` ADD COLUMN `mop_creation_text` VARCHAR(512) NULL  AFTER `email_addresses` ;
 
INSERT INTO `snj`.`snj_scope_of_works` (`idsnj_scope_of_work`, `snj_sow_description`, `idsnj_dd_fk`) VALUES (166, 'RAN Integration', 1);
