
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- fe_groups
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `fe_groups`;


CREATE TABLE `fe_groups`
(
	`uid` INTEGER  NOT NULL AUTO_INCREMENT,
	`pid` INTEGER,
	`tstamp` INTEGER,
	`title` VARCHAR(50),
	`hidden` TINYINT,
	`lockToDomain` VARCHAR(250),
	`deleted` TINYINT,
	`description` TEXT,
	`subgroup` LONGBLOB,
	`TSconfig` LONGBLOB,
	`tx_mklvcommunity_icon` LONGBLOB,
	`tx_mklvcommunity_visibility` INTEGER,
	`tx_mklvcommunity_invitation` TINYINT,
	`tx_mklvcommunity_url` VARCHAR,
	`tx_mklvcommunity_owner` LONGBLOB,
	`tx_mklvcommunity_admins` INTEGER,
	`tx_mklvcommunity_tags` TEXT,
	PRIMARY KEY (`uid`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- fe_users
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `fe_users`;


CREATE TABLE `fe_users`
(
	`uid` INTEGER  NOT NULL AUTO_INCREMENT,
	`pid` INTEGER,
	`tstamp` INTEGER,
	`username` VARCHAR(50),
	`password` VARCHAR(50),
	`usergroup` LONGBLOB,
	`disable` TINYINT,
	`starttime` INTEGER,
	`endtime` INTEGER,
	`name` VARCHAR(80),
	`address` TEXT,
	`telephone` VARCHAR(20),
	`fax` VARCHAR(20),
	`email` VARCHAR(80),
	`crdate` INTEGER,
	`cruser_id` INTEGER,
	`lockToDomain` VARCHAR(50),
	`deleted` TINYINT,
	`uc` LONGBLOB,
	`title` VARCHAR(40),
	`zip` VARCHAR(10),
	`city` VARCHAR(50),
	`country` VARCHAR(40),
	`www` VARCHAR(80),
	`company` VARCHAR(80),
	`image` LONGBLOB,
	`TSconfig` LONGBLOB,
	`fe_cruser_id` INTEGER,
	`lastlogin` INTEGER,
	`is_online` INTEGER,
	`tx_mklvcommunity_icq` TEXT,
	`tx_mklvcommunity_privacy_flag` INTEGER,
	`tx_mklvcommunity_buddy_confirm` TINYINT,
	PRIMARY KEY (`uid`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- tx_mklvcommunity_unconfirmed_buddy
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tx_mklvcommunity_unconfirmed_buddy`;


CREATE TABLE `tx_mklvcommunity_unconfirmed_buddy`
(
	`uid` INTEGER  NOT NULL AUTO_INCREMENT,
	`pid` INTEGER,
	`tstamp` INTEGER,
	`crdate` INTEGER,
	`cruser_id` INTEGER,
	`deleted` TINYINT,
	`hidden` TINYINT,
	`user_uid` INTEGER,
	`buddy_uid` INTEGER,
	`hash_key` VARCHAR(80),
	PRIMARY KEY (`uid`),
	INDEX `tx_mklvcommunity_unconfirmed_buddy_FI_1` (`user_uid`),
	CONSTRAINT `tx_mklvcommunity_unconfirmed_buddy_FK_1`
		FOREIGN KEY (`user_uid`)
		REFERENCES `fe_users` (`uid`),
	INDEX `tx_mklvcommunity_unconfirmed_buddy_FI_2` (`buddy_uid`),
	CONSTRAINT `tx_mklvcommunity_unconfirmed_buddy_FK_2`
		FOREIGN KEY (`buddy_uid`)
		REFERENCES `fe_users` (`uid`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- tx_mklvcommunity_buddy
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tx_mklvcommunity_buddy`;


CREATE TABLE `tx_mklvcommunity_buddy`
(
	`uid` INTEGER  NOT NULL AUTO_INCREMENT,
	`pid` INTEGER,
	`tstamp` INTEGER,
	`crdate` INTEGER,
	`cruser_id` INTEGER,
	`deleted` TINYINT,
	`hidden` TINYINT,
	`user_uid` INTEGER,
	`buddy_uid` INTEGER,
	PRIMARY KEY (`uid`),
	INDEX `tx_mklvcommunity_buddy_FI_1` (`user_uid`),
	CONSTRAINT `tx_mklvcommunity_buddy_FK_1`
		FOREIGN KEY (`user_uid`)
		REFERENCES `fe_users` (`uid`),
	INDEX `tx_mklvcommunity_buddy_FI_2` (`buddy_uid`),
	CONSTRAINT `tx_mklvcommunity_buddy_FK_2`
		FOREIGN KEY (`buddy_uid`)
		REFERENCES `fe_users` (`uid`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- tx_mklvcommunity_fe_users_fe_groups_MM
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tx_mklvcommunity_fe_users_fe_groups_MM`;


CREATE TABLE `tx_mklvcommunity_fe_users_fe_groups_MM`
(
	`uid` INTEGER  NOT NULL AUTO_INCREMENT,
	`pid` INTEGER,
	`tstamp` INTEGER,
	`crdate` INTEGER,
	`cruser_id` INTEGER,
	`deleted` INTEGER,
	`hidden` TINYINT,
	`fe_users_uid` LONGBLOB,
	`fe_groups_uid` LONGBLOB,
	PRIMARY KEY (`uid`)
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
