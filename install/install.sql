CREATE TABLE `bbcnewswidget_settings` (
	`pbs_idx` INT(11) NOT NULL AUTO_INCREMENT,
	`seq` INT(10) NOT NULL,
	`pbs_tab_1` VARCHAR(20) NOT NULL,
	`pbs_tab_2` VARCHAR(20) NOT NULL,
	`pbs_tab_3` VARCHAR(20) NOT NULL,
	`pbs_list_limit` INT(11) NOT NULL DEFAULT '5',
	PRIMARY KEY (`pbs_idx`)
);
