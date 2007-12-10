<?php

/**
 * Class for data access for community users.
 * 
 * @package Typo3
 * @subpackage MKLV Community
 * @author Michael Knoll, Lars Volker <subdev@subida.de>
 *
 */

require_once('class.tx_mklvcommunity_model.php');

class tx_mklvcommunity_models_user extends tx_mklvcommunity_model {
	
	private $fieldsToBeShown = null;
	
	/**
	 * Loads all users. The data is available 
	 * by calling $this->users
	 *
	 * @param unknown_type $exceptUids
	 */
	public function loadAllUsers($exceptUids = null) {
		$c = new Criteria();
		$c->add(FeUsersPeer::DELETED, '1',Criteria::NOT_EQUAL);
		$c->add(FeUsersPeer::DISABLE, '1', Criteria::NOT_EQUAL);
		$users = FeUsersPeer::doSelect($c);
		
		if ($users) {
			$this->set('users', $users);
		}
	}
		
	
	/**
	 * Loads a user by a given uid. The data is available
	 * by calling $this->userData
	 *
	 * @param unknown_type $uid
	 */
	function loadUserByUid($uid) {
		$user = FeUsersPeer::retrieveByPK($uid);
		
		if ($user) {
			$this->set('userData', $user);
		}
		
	}
	
	
	/**
	 * Loads a list of users which are buddies of a user given by a UID
	 *
	 * @param 	integer 	$userUid
	 * @return 	array					List of FeUsers objects
	 */
	public function loadBuddiesForUser($userUid) {
		$buddiesForUser = array();
		$isBuddyCriteria = new Criteria();
		$isBuddyCriteria->add(TxMklvcommunityBuddyPeer::DELETED, '1', Criteria::NOT_EQUAL);
		$isBuddyCriteria->add(TxMklvcommunityBuddyPeer::USER_UID, $userUid, Criteria::EQUAL);
		$buddiesUids = TxMklvcommunityBuddyPeer::doSelect($isBuddyCriteria);		
		foreach($buddiesUids as $buddyUid) {
			$buddiesForUser[] = FeUsersPeer::retrieveByPK($buddyUid->getUserUid());
		}
		$this->set('buddiesList', $buddiesForUser);
	}

	
	/**
	 * Returns a list of users that are filtered with the parameter
	 *
	 * @todo Improve search. Split into several words, if no result is found and look for each word
	 * 
	 * @param 	string 	$searchWord		Searchword for the user-search.
	 */
	function loadUserBySearchword($searchWord) {

		$searchCriteria = new Criteria();
		$searchCriteria->add(FeUsersPeer::USERNAME, $searchWord, Criteria::LIKE);
		$users = FeUsersPeer::doSelect($searchCriteria);
		$this->set('users', $users);

	}
	
	
	/**
	 * Inserts a new unconfirmed buddy record into unconfirmed buddy table
	 *
	 * @param 	int  	$buddyUid	Uid of the buddy
	 * @return 	string				MD5 value used for identify the recordset
	 */
	function insertUnconfirmedBuddy($buddyUid) {
		if (!($buddyUid > 0)) {
			throw new Exception('Parameter $buddyUid needs to be bigger than 0!');
		}
		if (!(tx_mklvcommunity_helper::getLoggedInUid()) > 0) {
			throw new Exception('No logged in user!');
		}
		
		$hasKey = md5(time() . $HTTP_ENV_VARS['REMOTE_ADDR']);
		
		$newUnconfirmedBuddy = new TxMklvcommunityUnconfirmedBuddy();
		$newUnconfirmedBuddy->setBuddyUid($buddyUid);
		$newUnconfirmedBuddy->setUserUid(tx_mklvcommunity_helper::getLoggedInUid());
		$newUnconfirmedBuddy->setHashKey($hasKey);
		try {
			$newUnconfirmedBuddy->save();
			return $hasKey;
		} catch (Exception $e) {
			die($e->getMessage());
		}
		return null;
	}
	
	
	
	/**
	 * Inserts a new unconfirmed buddy record into unconfirmed buddy table
	 *
	 * @param 	int  	$buddyUid	Uid of the buddy
	 * @return 	string				MD5 value used for identify the recordset
	 */
	function insertUnconfirmedBuddyOLD($buddyUid) {
		/* check for correct parameters */
		if (!($buddyUid > 0)) {
			throw new Exception('Parameter $buddyUid needs to be bigger than 0!');
		}
		if (!(tx_mklvcommunity_helper::getLoggedInUid() > 0)) {
			throw new Exception('No logged in user!');
		}
		
		/* set up query parameters */
		$table 						= 'tx_mklvcommunity_unconfirmed_buddy';
		$insertArray 				= array();
		$insertArray['user_uid'] 	= tx_mklvcommunity_helper::getLoggedInUid();
		$insertArray['buddy_uid'] 	= (int) $buddyUid;
		$insertArray['hash_key'] 	= md5(time() . $HTTP_ENV_VARS['REMOTE_ADDR']);
		
		/* execute query */
		$res = $GLOBALS['TYPO3_DB']->exec_INSERTquery( $table, $insertArray );
		/* return generated hash key */
		return $insertArray['hash_key'];
	}
	
	/**
	 * Inserts a new buddy relation into buddy table
	 *
	 * @param 	int 	$buddyUid	UID of the first user	
	 * @param 	int 	$userUid	UID of the second user
	 * @return 	boolean				Success of Insert
	 */
	function insertBuddy($buddyUid, $userUid) {
		/* check for correct parameters */
		if (! ($userUid > 0 && $buddyUid > 0) ) {
			throw new Exception('$buddyUid und $userUid need to be > 0!');
		}
		
		/* Make sure, buddy record is unique */
		if ( $buddyUid != tx_mklvcommunity_helper::getFieldByTableAndWhereClause('tx_mklvcommunity_buddy', 'buddy_uid', 'user_uid = ' . $userUid)) {
			/* set up query parameters */
			$table 						= 'tx_mklvcommunity_buddy';
			$insertArray1				= array();
			$insertArray1['user_uid']	= $userUid;
			$insertArray1['buddy_uid']	= $buddyUid;
			$insertArray1['tstamp']		= 'NOW()';
			/* execute query */
			$res1 = $GLOBALS['TYPO3_DB']->exec_INSERTquery( $table, $insertArray1 );
		}
		
		return $res1;
	}
	
	
	
	/**
	 * Deletes a user - buddy relation for a given user-buddy UID pair
	 *
	 * @param 	int 	$buddyUid		UID of the buddy
	 * @param 	int 	$userUid		UID of the user
	 * @return 	boolean
	 */
	public function deleteBuddy($buddyUid, $userUid) {
		$criteria = new Criteria();
		$criteria->add(TxMklvcommunityBuddyPeer::USER_UID, $userUid);
		$criteria->add(TxMklvcommunityBuddyPeer::BUDDY_UID, $buddyUid);
		TxMklvcommunityBuddyPeer::doDelete($criteria);
		$criteria = new Criteria();
		$criteria->add(TxMklvcommunityBuddyPeer::USER_UID, $buddyUid);
		$criteria->add(TxMklvcommunityBuddyPeer::BUDDY_UID, $userUid);
		TxMklvcommunityBuddyPeer::doDelete($criteria);
		return true;
	}

}



?>
