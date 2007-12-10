<?php

/**
 * Class definition for buddiesShowRelation controller
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_buddiesShowRelation extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action for buddiesShowRelations controller
	 *
	 * @var string
	 */
	private $defaultAction = 'showBuddiesShowRelation';
	
	/**
	 * Shows buddy relations
	 *
	 * @return 	string HTML source code for fe output
	 */
	public function showBuddiesShowRelationAction() {
		/**
		 * Whole function should be put in helper classes later on
		 */
		$loggedInUserUid = tx_mklvcommunity_helper::getLoggedInUid();
		$buddyUid = $this->parameters->get('uid');
		$relationArray = $this->getUserBuddyRelation($loggedInUserUid, $buddyUid);
		var_dump($relationArray);
		return 'User Buddy Relation';
	}
	
	/**
	 * Returns an array with a relation chain between a user and another user
	 *
	 * @param 	int 	$userUid	Uid of the first user
	 * @param 	int 	$buddyUid	Uid of the second user
	 * @return 	array				Relation chain of users array(user, ..., buddy)
	 */
	public function getUserBuddyRelation($userUid, $buddyUid) {
		if (!($userUid > 0 && $buddyUid > 0)) {
			return;
		}
		
		/* Initialize sets of buddies for user and buddy */
		$userBuddiesArray = array($userUid => $userUid);
		$buddyBuddiesArray = array($buddyUid => $buddyUid);
		
		/* Let sets grow until there is a common user in both sets */
		$growth = true;		// additional break condition
		while (array_intersect_key($userBuddiesArray, $buddyBuddiesArray) == array() && $growth) {
			$growth = false;
			/* Look for buddies for user set */
			/**
			 * @todo use another array to avoid double checks!
			 */
			foreach ($userBuddiesArray as $user => $knownBy) {
				$newUsers = $this->getBuddiesForUser($user);
				echo "New users for $user:<br>";
				foreach ($newUsers as $newUser) {
					if (!(array_key_exists($newUser, $userBuddiesArray))) {
						$userBuddiesArray[$newUser] = $user;
						$growth = true;
					}
				}
			}
			/* Intersect to avoid double entries after first set-growing */
			if (array_intersect_key($userBuddiesArray, $buddyBuddiesArray) == array()) {
				/* Look for buddies for buddy set */
				foreach ($buddyBuddiesArray as $user => $knownBy) {
					$newUsers = $this->getBuddiesForUser($user);
					foreach ($newUsers as $newUser) {
						
						if (!(array_key_exists($newUser, $buddyBuddiesArray))) {
							$buddyBuddiesArray[$newUser] = $user;
							$growth = true;
						}
					}
				}
			}
		}
		
		/* If there is a common buddy, reconstruct the relation */
		if (!array_intersect_key($userBuddiesArray, $buddyBuddiesArray) == array()) {
			$userBuddyRelation = array();
			/* This is really ugly - but I don't have a better solution */
			foreach (array_intersect_key($userBuddiesArray, $buddyBuddiesArray) as $key => $value) $commonBuddy = $key;
			$tmpUser = $commonBuddy;
			while ($tmpUser != $userUid) {
				$userBuddyRelation[] = $userBuddiesArray[$tmpUser];
				$tmpUser = $userBuddiesArray[$tmpUser];
			}
			/* Reverse order for getting a user to buddy relation chain */
			$userBuddyRelation = array_reverse($userBuddyRelation);
			$userBuddyRelation[] = $commonBuddy;
			$tmpUser = $commonBuddy;
			while ($tmpUser != $buddyUid) {
				$userBuddyRelation[] = $buddyBuddiesArray[$tmpUser];
				$tmpUser = $userBuddiesArray[$tmpUser];
			}
			return $userBuddyRelation;
		} else {
			return array();
		}
	}
	
	
	public function getBuddiesForUser($userUid) {
		$returnArray = array();
		
		$fields = 'buddy_uid';
		$tables = 'tx_mklvcommunity_buddy';
		$where  = 'user_uid = ' . $userUid;
		
		$query  = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where);
		$result = $GLOBALS['TYPO3_DB']->sql_query($query); 
		
		if  ($result) {
			while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) {
				$returnArray[] = $row['buddy_uid'];
			}
		}
		return $returnArray;
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_buddiesShowRelation.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_buddiesShowRelation.php']);
}

?>