<?php

/* Added for extending and creating tables 2007-9-23 */
$tempColumns = Array (
    "tx_mklvcommunity_icq" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_users.tx_mklvcommunity_icq",        
        "config" => Array (
            "type" => "input",    
            "size" => "16",    
            "max" => "16",
        )
    ),
    "tx_mklvcommunity_privacy_flag" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_users.tx_mklvcommunity_privacy_flag",        
        "config" => Array (
            "type" => "radio",
            "items" => Array (
                Array("LLL:EXT:mklv_community/locallang_db.xml:fe_users.tx_mklvcommunity_privacy_flag.I.0", "0"),
                Array("LLL:EXT:mklv_community/locallang_db.xml:fe_users.tx_mklvcommunity_privacy_flag.I.1", "1"),
                Array("LLL:EXT:mklv_community/locallang_db.xml:fe_users.tx_mklvcommunity_privacy_flag.I.2", "2"),
                Array("LLL:EXT:mklv_community/locallang_db.xml:fe_users.tx_mklvcommunity_privacy_flag.I.3", "3"),
            ),
        )
    ),
    "tx_mklvcommunity_buddy_confirm" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_users.tx_mklvcommunity_buddy_confirm",        
        "config" => Array (
            "type" => "check",
        )
    ),
);


t3lib_div::loadTCA("fe_users");
t3lib_extMgm::addTCAcolumns("fe_users",$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes("fe_users","tx_mklvcommunity_icq;;;;1-1-1, tx_mklvcommunity_privacy_flag, tx_mklvcommunity_buddy_confirm");

$tempColumns = Array (
    "tx_mklvcommunity_icon" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_groups.tx_mklvcommunity_icon",        
        "config" => Array (
            "type" => "group",
            "internal_type" => "file",
            "allowed" => $GLOBALS["TYPO3_CONF_VARS"]["GFX"]["imagefile_ext"],    
            "max_size" => 100,    
            "uploadfolder" => "uploads/tx_mklvcommunity",
            "size" => 1,    
            "minitems" => 0,
            "maxitems" => 1,
        )
    ),
    "tx_mklvcommunity_visibility" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_groups.tx_mklvcommunity_visibility",        
        "config" => Array (
            "type" => "radio",
            "items" => Array (
                Array("LLL:EXT:mklv_community/locallang_db.xml:fe_groups.tx_mklvcommunity_visibility.I.0", "0"),
                Array("LLL:EXT:mklv_community/locallang_db.xml:fe_groups.tx_mklvcommunity_visibility.I.1", "1"),
            ),
        )
    ),
    "tx_mklvcommunity_invitation" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_groups.tx_mklvcommunity_invitation",        
        "config" => Array (
            "type" => "check",
        )
    ),
    "tx_mklvcommunity_url" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_groups.tx_mklvcommunity_url",        
        "config" => Array (
            "type"     => "input",
            "size"     => "15",
            "max"      => "255",
            "checkbox" => "",
            "eval"     => "trim",
            "wizards"  => array(
                "_PADDING" => 2,
                "link"     => array(
                    "type"         => "popup",
                    "title"        => "Link",
                    "icon"         => "link_popup.gif",
                    "script"       => "browse_links.php?mode=wizard",
                    "JSopenParams" => "height=300,width=500,status=0,menubar=0,scrollbars=1"
                )
            )
        )
    ),
    "tx_mklvcommunity_owner" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_groups.tx_mklvcommunity_owner",        
        "config" => Array (
            "type" => "group",    
            "internal_type" => "db",    
            "allowed" => "fe_users",    
            "size" => 1,    
            "minitems" => 0,
            "maxitems" => 1,
        )
    ),
    "tx_mklvcommunity_admins" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_groups.tx_mklvcommunity_admins",        
        "config" => Array (
            "type" => "group",    
            "internal_type" => "db",    
            "allowed" => "pages",    
            "size" => 10,    
            "minitems" => 0,
            "maxitems" => 20,    
            "MM" => "fe_groups_tx_mklvcommunity_admins_mm",
        )
    ),
    "tx_mklvcommunity_tags" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:fe_groups.tx_mklvcommunity_tags",        
        "config" => Array (
            "type" => "text",
            "cols" => "30",    
            "rows" => "5",
        )
    ),
);


t3lib_div::loadTCA("fe_groups");
t3lib_extMgm::addTCAcolumns("fe_groups",$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes("fe_groups","tx_mklvcommunity_icon;;;;1-1-1, tx_mklvcommunity_visibility, tx_mklvcommunity_invitation, tx_mklvcommunity_url, tx_mklvcommunity_owner, tx_mklvcommunity_admins, tx_mklvcommunity_tags");

$TCA["tx_mklvcommunity_buddy"] = array (
    "ctrl" => array (
        'title'     => 'LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_buddy',        
        'label'     => 'uid',    
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => "ORDER BY crdate",    
        'delete' => 'deleted',    
        'enablecolumns' => array (        
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_mklvcommunity_buddy.gif',
    ),
    "feInterface" => array (
        "fe_admin_fieldList" => "hidden, user_uid, buddy_uid",
    )
);

$TCA["tx_mklvcommunity_unconfirmed_buddy"] = array (
    "ctrl" => array (
        'title'     => 'LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_unconfirmed_buddy',        
        'label'     => 'uid',    
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => "ORDER BY crdate",    
        'delete' => 'deleted',    
        'enablecolumns' => array (        
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_mklvcommunity_unconfirmed_buddy.gif',
    ),
    "feInterface" => array (
        "fe_admin_fieldList" => "hidden, user_uid, buddy_uid, hash_key",
    )
);

$TCA["tx_mklvcommunity_privacy_setting"] = array (
    "ctrl" => array (
        'title'     => 'LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_privacy_setting',        
        'label'     => 'uid',    
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => "ORDER BY crdate",    
        'delete' => 'deleted',    
        'enablecolumns' => array (        
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_mklvcommunity_privacy_setting.gif',
    ),
    "feInterface" => array (
        "fe_admin_fieldList" => "hidden, ext_key, ext_field, privacy_flag",
    )
);

$TCA["tx_mklvcommunity_group_invitation"] = array (
    "ctrl" => array (
        'title'     => 'LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_group_invitation',        
        'label'     => 'uid',    
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => "ORDER BY crdate",    
        'delete' => 'deleted',    
        'enablecolumns' => array (        
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_mklvcommunity_group_invitation.gif',
    ),
    "feInterface" => array (
        "fe_admin_fieldList" => "hidden, user_uid, group_uid, date, recipient_uid",
    )
);

$TCA["tx_mklvcommunity_fe_users_fe_groups_MM"] = array (
    "ctrl" => array (
        'title'     => 'LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_fe_users_fe_groups_MM',        
        'label'     => 'uid',    
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => "ORDER BY crdate",    
        'delete' => 'deleted',    
        'enablecolumns' => array (        
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_mklvcommunity_fe_users_fe_groups_MM.gif',
    ),
    "feInterface" => array (
        "fe_admin_fieldList" => "hidden, fe_users_uid, fe_groups_uid",
    )
);

/* End of 2007-9-23 */


t3lib_div::loadTCA('tt_content');

/* Register Plugins for user functionality */
t3lib_extMgm::addPlugin(Array('MKLV Community User Details','mklvcommunity_userDetails'),'list_type');
t3lib_extMgm::addPlugin(array('MKLV Community User Privacy', 'mklvcommunity_userPrivacy'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community User Search', 'mklvcommunity_userSearch'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community User Buddy Add', 'mklvcommunity_userBuddyAdd'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community User List', 'mklvcommunity_userList'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community User Settings', 'mklvcommunity_userSettings'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community User Menu', 'mklvcommunity_userMenu'),'list_type');
/* Register plugins for groups functionality */
t3lib_extMgm::addPlugin(Array('MKLV Community Groups List', 'mklvcommunity_groupsList'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community Groups Search', 'mklvcommunity_groupsSearch'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community Groups Edit', 'mklvcommunity_groupsEdit'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community Groups Profile', 'mklvcommunity_groupsProfile'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community Groups Join', 'mklvcommunity_groupsJoin'), 'list_type');
/* Register plugins for buddies functionality */
t3lib_extMgm::addPlugin(Array('MKLV Community Buddies Add', 'mklvcommunity_buddiesAdd'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community Buddies Delete', 'mklvcommunity_buddiesDelete'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community Buddies Show Relation', 'mklvcommunity_buddiesShowRelation'), 'list_type');
t3lib_extMgm::addPlugin(Array('MKLV Community Buddies List', 'mklvcommunity_buddiesList'), 'list_type');
/* Register plugins for system messaging */
t3lib_extMgm::addPlugin(Array('MKLV Community System Messages', 'mklvcommunity_systemMessages'), 'list_type');


/* Register Static Templates */
t3lib_extMgm::addStaticFile('mklv_community','./configuration','MKLV Community');
?>