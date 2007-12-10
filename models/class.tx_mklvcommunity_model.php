<?php

/**
 * Including and initializing Propel
 */
require_once('/usr/share/php/propel/Propel.php');
set_include_path("/var/www/localhost/svn/subida/typo3conf/ext/mklv_community/propel_test/build/classes" . PATH_SEPARATOR . get_include_path());
include_once('mklv_community/FeUsersPeer.php');
include_once('mklv_community/FeUsers.php');
include_once('mklv_community/TxMklvcommunityBuddyPeer.php');
include_once('mklv_community/TxMklvcommunityBuddy.php');
include_once('mklv_community/TxMklvcommunityUnconfirmedBuddyPeer.php');
include_once('mklv_community/TxMklvcommunityUnconfirmedBuddy.php');
include_once('mklv_community/FeGroups.php');
include_once('mklv_community/FeGroupsPeer.php');
include_once('mklv_community/TxMklvcommunityFeUsersFeGroupsMm.php');
include_once('mklv_community/TxMklvcommunityFeUsersFeGroupsMmPeer.php');

Propel::init("/var/www/localhost/svn/subida/typo3conf/ext/mklv_community/propel_test/build/conf/mklv_community-conf.php");

/**
 * Including MKLV Helper classes
 */
require_once(t3lib_extMgm::extPath('mklv_community') . 'helpers/class.tx_mklvcommunity_helper.php');


/**
 * Base class for all mklvcommunity_models. All common code goes here
 *
 */
class tx_mklvcommunity_model extends tx_lib_object {
	
}

?>