<?php
if (!defined ('TYPO3_MODE'))     die ('Access denied.');

/* Inserted on 2007-9-23 */

$TCA["tx_mklvcommunity_buddy"] = array (
    "ctrl" => $TCA["tx_mklvcommunity_buddy"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "hidden,user_uid,buddy_uid"
    ),
    "feInterface" => $TCA["tx_mklvcommunity_buddy"]["feInterface"],
    "columns" => array (
        'hidden' => array (        
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array (
                'type'    => 'check',
                'default' => '0'
            )
        ),
        "user_uid" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_buddy.user_uid",        
            "config" => Array (
                "type" => "group",    
                "internal_type" => "db",    
                "allowed" => "fe_users",    
                "size" => 1,    
                "minitems" => 0,
                "maxitems" => 1,
            )
        ),
        "buddy_uid" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_buddy.buddy_uid",        
            "config" => Array (
                "type" => "group",    
                "internal_type" => "db",    
                "allowed" => "fe_users",    
                "size" => 1,    
                "minitems" => 0,
                "maxitems" => 1,
            )
        ),
    ),
    "types" => array (
        "0" => array("showitem" => "hidden;;1;;1-1-1, user_uid, buddy_uid")
    ),
    "palettes" => array (
        "1" => array("showitem" => "")
    )
);



$TCA["tx_mklvcommunity_unconfirmed_buddy"] = array (
    "ctrl" => $TCA["tx_mklvcommunity_unconfirmed_buddy"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "hidden,user_uid,buddy_uid"
    ),
    "feInterface" => $TCA["tx_mklvcommunity_unconfirmed_buddy"]["feInterface"],
    "columns" => array (
        'hidden' => array (        
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array (
                'type'    => 'check',
                'default' => '0'
            )
        ),
        "user_uid" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_unconfirmed_buddy.user_uid",        
            "config" => Array (
                "type" => "group",    
                "internal_type" => "db",    
                "allowed" => "fe_users",    
                "size" => 1,    
                "minitems" => 0,
                "maxitems" => 1,
            )
        ),
        "buddy_uid" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_unconfirmed_buddy.buddy_uid",        
            "config" => Array (
                "type" => "group",    
                "internal_type" => "db",    
                "allowed" => "pages",    
                "size" => 1,    
                "minitems" => 0,
                "maxitems" => 1,
            )
        ),
        "hash_key" => Array (        
        "exclude" => 1,        
        "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_unconfirmed_buddy.hash_key",        
        "config" => Array (
            "type" => "input",    
            "size" => "48",    
            "max" => "250",
        ),
    ),
    ),
    "types" => array (
        "0" => array("showitem" => "hidden;;1;;1-1-1, user_uid, buddy_uid, hash_key")
    ),
    "palettes" => array (
        "1" => array("showitem" => "")
    )
);



$TCA["tx_mklvcommunity_privacy_setting"] = array (
    "ctrl" => $TCA["tx_mklvcommunity_privacy_setting"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "hidden,ext_key,ext_field,privacy_flag"
    ),
    "feInterface" => $TCA["tx_mklvcommunity_privacy_setting"]["feInterface"],
    "columns" => array (
        'hidden' => array (        
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array (
                'type'    => 'check',
                'default' => '0'
            )
        ),
        "ext_key" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_privacy_setting.ext_key",        
            "config" => Array (
                "type" => "input",    
                "size" => "30",
            )
        ),
        "ext_field" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_privacy_setting.ext_field",        
            "config" => Array (
                "type" => "input",    
                "size" => "30",
            )
        ),
        "privacy_flag" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_privacy_setting.privacy_flag",        
            "config" => Array (
                "type" => "radio",
                "items" => Array (
                    Array("LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_privacy_setting.privacy_flag.I.0", "0"),
                    Array("LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_privacy_setting.privacy_flag.I.1", "1"),
                    Array("LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_privacy_setting.privacy_flag.I.2", "2"),
                    Array("LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_privacy_setting.privacy_flag.I.3", "3"),
                ),
            )
        ),
    ),
    "types" => array (
        "0" => array("showitem" => "hidden;;1;;1-1-1, ext_key, ext_field, privacy_flag")
    ),
    "palettes" => array (
        "1" => array("showitem" => "")
    )
);



$TCA["tx_mklvcommunity_group_invitation"] = array (
    "ctrl" => $TCA["tx_mklvcommunity_group_invitation"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "hidden,user_uid,group_uid,date,recipient_uid"
    ),
    "feInterface" => $TCA["tx_mklvcommunity_group_invitation"]["feInterface"],
    "columns" => array (
        'hidden' => array (        
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array (
                'type'    => 'check',
                'default' => '0'
            )
        ),
        "user_uid" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_group_invitation.user_uid",        
            "config" => Array (
                "type" => "group",    
                "internal_type" => "db",    
                "allowed" => "fe_users",    
                "size" => 1,    
                "minitems" => 0,
                "maxitems" => 1,
            )
        ),
        "group_uid" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_group_invitation.group_uid",        
            "config" => Array (
                "type" => "group",    
                "internal_type" => "db",    
                "allowed" => "fe_groups",    
                "size" => 1,    
                "minitems" => 0,
                "maxitems" => 1,
            )
        ),
        "date" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_group_invitation.date",        
            "config" => Array (
                "type"     => "input",
                "size"     => "8",
                "max"      => "20",
                "eval"     => "date",
                "checkbox" => "0",
                "default"  => "0"
            )
        ),
        "recipient_uid" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_group_invitation.recipient_uid",        
            "config" => Array (
                "type" => "group",    
                "internal_type" => "db",    
                "allowed" => "fe_users",    
                "size" => 1,    
                "minitems" => 0,
                "maxitems" => 1,
            )
        ),
    ),
    "types" => array (
        "0" => array("showitem" => "hidden;;1;;1-1-1, user_uid, group_uid, date, recipient_uid")
    ),
    "palettes" => array (
        "1" => array("showitem" => "")
    )
);



$TCA["tx_mklvcommunity_fe_users_fe_groups_MM"] = array (
    "ctrl" => $TCA["tx_mklvcommunity_fe_users_fe_groups_MM"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "hidden,fe_users_uid,fe_groups_uid"
    ),
    "feInterface" => $TCA["tx_mklvcommunity_fe_users_fe_groups_MM"]["feInterface"],
    "columns" => array (
        'hidden' => array (        
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array (
                'type'    => 'check',
                'default' => '0'
            )
        ),
        "fe_users_uid" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_fe_users_fe_groups_MM.fe_users_uid",        
            "config" => Array (
                "type" => "group",    
                "internal_type" => "db",    
                "allowed" => "fe_users",    
                "size" => 1,    
                "minitems" => 0,
                "maxitems" => 1,
            )
        ),
        "fe_groups_uid" => Array (        
            "exclude" => 1,        
            "label" => "LLL:EXT:mklv_community/locallang_db.xml:tx_mklvcommunity_fe_users_fe_groups_MM.fe_groups_uid",        
            "config" => Array (
                "type" => "group",    
                "internal_type" => "db",    
                "allowed" => "fe_groups",    
                "size" => 1,    
                "minitems" => 0,
                "maxitems" => 1,
            )
        ),
    ),
    "types" => array (
        "0" => array("showitem" => "hidden;;1;;1-1-1, fe_users_uid, fe_groups_uid")
    ),
    "palettes" => array (
        "1" => array("showitem" => "")
    )
);

/* End of 2007-9-23 */

?>