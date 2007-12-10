<?php

/**
 * Class definition file for group model. All domain specific functionality for groups
 * should be placed into this file
 *
 */

require_once('class.tx_mklvcommunity_model.php');

class tx_mklvcommunity_models_group extends tx_mklvcommunity_model {
	
	/**
	 * Loads a group by a given id.
	 *
	 * @param 	int 	$id		UID of the group to be loaded
	 */
	public function loadGroupById($id) {
		$groupRow = FeGroupsPeer::retrieveByPK($id);
		if ($groupRow) {
			$this->set('groupData', $groupRow);
		}

		/*$table 		= 'fe_groups';
		$fields 	= '*';
		$where		= 'uid=' . $id;

		$query 		= $GLOBALS['TYPO3_DB']->SELECTquery($fields, $table, $where);
		$result		= $GLOBALS['TYPO3_DB']->sql_query($query);
		
		if ($result) {
			$row 	= $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
			$entry 	= new tx_lib_object($row);
			$this->append($entry); 
		}*/
	}
	
	
	
	/**
	 * Loads all fe_groups from database and puts them into model object
	 *
	 */
	public function loadAllGroups() {
		$selectCriteria 	= new Criteria();
		#$selectCriteria->add(FeUsersPeer::DELETED, '1',Criteria::NOT_EQUAL);
		#$selectCriteria->add(FeUsersPeer::DISABLE, '1', Criteria::NOT_EQUAL);
		$groups = FeGroupsPeer::doSelect($selectCriteria);
		if ($groups) {
			$this->set('groupsList', $groups);
		}
	}
	
	
	
	/**
	 * Creates a new group with the given name. Returns null, if groupname allready exists 
	 * else it returns the uid of the new inserted recordset.
	 *
	 * @param 	string 		$groupName	Name for the new group
	 * @return 	mixed					NULL if groupname allready exists, id of created group else
	 */
	public function createGroup($groupName) {
		$groupId 		= null;
		$temporaryId 	= $this->_getIdByName($groupName);
		if(!$temporaryId) {
			$groupId = $this->_insertGroupByName($groupName);
		}
		return $groupId;
	}
	
	
	
	/**
	 * Creates a new empty group Object. Function should be called, if an empty group object needs to be
	 * created, without writing anything to the database.
	 *
	 */
	public function createEmptyGroup() {
		$emptyGroup 	= new FeGroups();
		$this->set('groupData', $emptyGroup);
	}
	
	/**
	 * Updates a record, identified by $groupUid with the values given in $fields as key=>value pairs
	 * Make sure that the keys in $ields are present in the fe_groups table!
	 *
	 * @param 	int 		$groupUid		UID of the group to be updated
	 * @param   string		$groupTitle 	Title for the group
	 * @param   string		$groupDescription Description of the group
	 * @return 	boolean						True, if update succeeds, else false
	 */
	public function updateGroupById($groupUid, $title, $description) {
		$groupRow = FeGroupsPeer::retrieveByPK($groupUid);
		if ($groupRow) {
			$groupRow->setTitle($title);
			$groupRow->setDescription($description);
			$groupRow->save();
			return true;		
		}
		return false;
	}
	
	
	
	public function insertGroup($title, $description) {
		$newGroup = new FeGroups();
		$newGroup->setTitle($title);
		$newGroup->setDescription($description);
		$newGroup->save();
		return $newGroup->getUid(); 
	}
	
	
	
	/**
	 * Deletes a group and all its members
	 *
	 * @param 	int 	$groupUid	UID of the group to be deleted
	 * @return 	mixed				Result object of TYPO3_DB
	 */
	public function deleteGroup($groupUid) {
		$table			= 'fe_users';
		$where			= "uid=" . $groupUid;
		$res 			= $GLOBALS['TYPO3_DB']->exec_DELETEquery($table, $where);

		/**
		 * @todo The users who belong to the group have to be updated
		 * Use M:N table for organizing groups and their users
		 */
		return $res;
	}
	
	
	
	/**
	 * Tries to select an UserGroupRelation by a given user and a group UID.
	 * Returns the relation, if there is any or returns null.
	 *
	 * @param 	int 	$userUid
	 * @param   int 	$groupUid
	 * @return 	TxMklvcommunityFeUsersFeGroupsMm
	 */
	public function getUserGroupRelation($userUid, $groupUid) {
		$selectCriteria = new Criteria();
		$selectCriteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::FE_GROUPS_UID, $groupUid, Criteria::EQUAL);
		$selectCriteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::FE_USERS_UID, $userUid, Criteria::EQUAL);
		$userGroupRelation = TxMklvcommunityFeUsersFeGroupsMmPeer::doSelect($selectCriteria);
		if ($userGroupRelation) {
			return $userGroupRelation[0];
		} else {
			return null;
		}
	}
	
	
	
	/**
	 * Inserts a new user - group relation
	 *
	 * @param 	int 	$userUid
	 * @param 	int 	$groupUid
	 */
	public function createNewUserGroupRelation($userUid, $groupUid) {
		$newUserGroupRelation = new TxMklvcommunityFeUsersFeGroupsMm();
		$newUserGroupRelation->setFeGroupsUid($groupUid);
		$newUserGroupRelation->setFeUsersUid($userUid);
		$newUserGroupRelation->save();
		$this->set('userGroupRelationData', $newUserGroupRelation);	
	}
	
	
	
	/**
	 * Deletes a user - group relation row from the relations table
	 *
	 * @param 	int 	$relationId
	 * @return 	boolean
	 */
	public function deleteRelationById($relationId) {
		TxMklvcommunityFeUsersFeGroupsMmPeer::doDelete($relationId);
		return true;
	}
	
	
	
	public function joinGroup($userId) {
		
	}
	
	
	
	public function leaveGroup($userId) {
		
	}
	
	public function addJoinRequest($userId) {
		
	}
	
	
	
	public function confirmJoinRequest($userId) {
		
	}
	
	
	
	public function inviteUser($userId) {
		 
	}
	
	/**
	 * Returns a group UID for a given groupname or null, if the groupname doesn't exist
	 *
	 * @param 	string 	$groupName		Name of the group whose UID should be fetched
	 * @return 	mixed					Uid of the group or null if no group is available
	 */
	private function _getIdByName($groupName) {
		$groupId 	= null;
		
		$table 		= 'fe_groups';
		$fields		= 'uid';
		$where		= 'title=\'' . $groupName . '\'';
		
		$query 		= $GLOBALS['TYPO3_DB']->SELECT_query($fields, $table, $where);
		$result		= $GLOBALS['TYPO3_DB']->sql_query($query);
		if ($result) {
			$row 	= $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
			$groupId=$row['uid']; 
		}
		return $groupId;
	}
	
	
	
	/**
	 * Inserts a new group with a given groupname (title)
	 *
	 * @param 	string 	$groupName		Name of group to be create
	 * @return 	mixed					NULL if no insert, else UID of inserted record
	 */
	private function insertGroupByName($groupName) {
		$groupId	= null;
		
		$table		= 'fe_groups';
		$insertArr	= array('title' => $groupName);
		$res 		= $GLOBALS['TYPO3_DB']->exec_INSERTquery($table, $insertArr);
		if ($res) {
			$groupId= $GLOBALS['TYPO3_DB']->sql_insert_id();
		}
		
		return $groupId;
	}
	
	
}

?>