<?php

/**
 * Helper class for mklv_community. Implements some function used in
 * different classes and therefore put in a shared ressource.
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_helper extends tx_div {

	/**
	 * Returns the currently logged in user
	 *
	 * @return 	int		UID of the currently logged in user
	 */
	public static function getLoggedInUid() {
		$tmpUser = get_object_vars($GLOBALS['TSFE']->fe_user);
		return $tmpUser['user']['uid'];
	}
	
	/**
	 * Checks whether the two given user ids are buddies or not
	 *
	 * @param 	int 	$userUid	Uid of the first user
	 * @param 	int 	$buddyUid	Uid of the second user
	 * @return 	boolean				True, if the two users are buddies, else false
	 */
	public static function isBuddyOf($userUid, $buddyUid) {
		/* The simple case for easy use of function */
		if ($userUid == $buddyUid) {
			return true;
		}
		/* Do database query to check for buddy */
		$query = $GLOBALS['TYPO3_DB']->SELECTquery(
					'COUNT(*) AS is_buddy', 
					'tx_mklvcommunity_buddy', 
					'user_uid = ' . $userUid . ' AND buddy_uid = ' . $buddyUid);
		$result = $GLOBALS['TYPO3_DB']->sql_query($query);
		if ($result) {
			$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
			return ($row['is_buddy'] > 0);
		}
		return false;
	}

	/**
	 * Check whether the two given user ids are buddies of buddies or not
	 *
	 * @param 	int 	$userUid	Uid of the first user
	 * @param 	int 	$buddyUid	Uid of the second user
	 * @return 	boolean				True, if the two users are buddies of buddies, else flase
	 */
	public static function isBuddyOfBuddy($userUid, $buddyUid) {
		/* The simple case for easy use of function */
		if ($userUid == $buddyUid) {
			return true;
		}
		/* Do database query to check for buddy */
		$query = "SELECT COUNT(*) AS is_buddy FROM tx_mklvcommunity_buddy AS t1, tx_mklvcommunity_buddy AS t2 " .
				 "WHERE t1.user_uid = " . $userUid . " AND t2.user_uid = " . $buddyUid . " AND " .
				 "t1.buddy_uid = t2.user_uid";
		$result = $GLOBALS['TYPO3_DB']->sql_query($query);
		if ($result) {
			$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
			return ($row['is_buddy'] > 0);
		}
		return false;
	}
	
	/**
	 * Global function to show error messages
	 *
	 * @param unknown_type $msg
	 * @return unknown
	 */
	public static function errorMsg($msg) {
		return "An error occured: <br><div style=\"color:red\">$msg</div><br>";
	}
	
	
	public static function getFieldByTableAndUid($table, $field, $uid) {
		/* set up query parameters */
		$fields 	= $field;
		$tables 	= $table;
		$groupBy 	= null;
		$orderBy 	= null;
		$where		= 'uid = ' . $uid;
		$limit		= 1;
		
		/* query */
		$query		= $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy, $limit);
		$result		= $GLOBALS['TYPO3_DB']->sql_query($query);
		if ($result) {
			$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
			return $row[$fields];
		} else {
			return 0;
		}
	}
	
	public static function getFieldByTableAndWhereClause($table,$field, $whereClause) {
		/* set up query parameters */
		$fields		= $field;
		$table		= $table;
		$groupBy	= null;
		$orderBy	= null;
		$where 		= $whereClause;
		$limit 		= 1;
		
		/* query */
		$query 		= $GLOBALS['TYPO3_DB']->SELECTquery($fields, $table, $where, $groupBy, $orderBy, $limit);
		$result		= $GLOBALS['TYPO3_DB']->sql_query($query);
		if ($result) {
			$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
			return $row[$fields];
		} else {
			return 0;
		}
	}
	
	/**
	 * Returns true, if the given user has the given buddy on his buddy-list
	 *
	 * @param 	int 	$userUid	UID of the user
	 * @param 	int		$buddyUid	UID of the buddy
	 * @return 	boolean				True, if user has buddy on list - False, if not
	 */
	public static function isBuddy($userUid, $buddyUid) {
		$result = self::getFieldByTableAndWhereClause(
					'tx_mklvcommunity_buddy', 'user_uid', 'user_uid = ' . $userUid . ' AND buddy_uid = ' . $buddyUid);
		return $result > 0 ? true : false;
	}
	
}

class tx_mklvcommunity_helper_objByArray {
	
	private $virtualAttributesArray = array();
	
	public function __construct ($array) {
		$this->virtualAttributesArray = $array;
	}
	
	public function __get($key) {
		return $this->virtualAttributesArray[$key];
	}
	
}

?>