#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
    tx_mklvcommunity_icq tinytext NOT NULL,
    tx_mklvcommunity_privacy_flag int(11) DEFAULT '0' NOT NULL,
	tx_mklvcommunity_buddy_confirm tinyint(3) DEFAULT '0' NOT NULL
);




#
# Table structure for table 'fe_groups_tx_mklvcommunity_admins_mm'
# 
#
CREATE TABLE fe_groups_tx_mklvcommunity_admins_mm (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'fe_groups'
#
CREATE TABLE fe_groups (
    tx_mklvcommunity_icon blob NOT NULL,
    tx_mklvcommunity_visibility int(11) DEFAULT '0' NOT NULL,
    tx_mklvcommunity_invitation tinyint(3) DEFAULT '0' NOT NULL,
    tx_mklvcommunity_url tinytext NOT NULL,
    tx_mklvcommunity_owner blob NOT NULL,
    tx_mklvcommunity_admins int(11) DEFAULT '0' NOT NULL,
    tx_mklvcommunity_tags text NOT NULL
);



#
# Table structure for table 'tx_mklvcommunity_buddy'
#
CREATE TABLE tx_mklvcommunity_buddy (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(4) DEFAULT '0' NOT NULL,
    hidden tinyint(4) DEFAULT '0' NOT NULL,
    user_uid blob NOT NULL,
    buddy_uid blob NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid)
);



#
# Table structure for table 'tx_mklvcommunity_unconfirmed_buddy'
#
CREATE TABLE tx_mklvcommunity_unconfirmed_buddy (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(4) DEFAULT '0' NOT NULL,
    hidden tinyint(4) DEFAULT '0' NOT NULL,
    user_uid blob NOT NULL,
    buddy_uid blob NOT NULL,
    hash_key tinytext NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid)
);



#
# Table structure for table 'tx_mklvcommunity_privacy_setting'
#
CREATE TABLE tx_mklvcommunity_privacy_setting (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(4) DEFAULT '0' NOT NULL,
    hidden tinyint(4) DEFAULT '0' NOT NULL,
    ext_key tinytext NOT NULL,
    ext_field tinytext NOT NULL,
    privacy_flag int(11) DEFAULT '0' NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid)
);



#
# Table structure for table 'tx_mklvcommunity_group_invitation'
#
CREATE TABLE tx_mklvcommunity_group_invitation (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(4) DEFAULT '0' NOT NULL,
    hidden tinyint(4) DEFAULT '0' NOT NULL,
    user_uid blob NOT NULL,
    group_uid blob NOT NULL,
    date int(11) DEFAULT '0' NOT NULL,
    recipient_uid blob NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid)
);



#
# Table structure for table 'tx_mklvcommunity_fe_users_fe_groups_MM'
#
CREATE TABLE tx_mklvcommunity_fe_users_fe_groups_MM (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(4) DEFAULT '0' NOT NULL,
    hidden tinyint(4) DEFAULT '0' NOT NULL,
    fe_users_uid blob NOT NULL,
    fe_groups_uid blob NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid)
);