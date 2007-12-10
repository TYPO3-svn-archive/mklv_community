<?php

/**
 * Class definition for groupsJoin controller
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_groupsJoin extends tx_mklvcommunity_controller {
	
	
	
	/**
	 * Sets the default action for groupsJoin controller
	 *
	 * @var string
	 */
	public $defaultAction = 'showGroupsJoin';
	
	
	
	/**
	 * Show groups join form
	 *
	 * @return 	string	HTML source code for fe output
	 */
	public function showGroupsJoinAction() {
		$loggedInUser 	= tx_mklvcommunity_helper::getLoggedInUid(); 
		$groupUid 		= $this->parameters->get('group_uid');
		/* check for group UID parameter */
		if ($groupUid == '') {
			return tx_mklvcommunity_helper::errorMsg('Parameter group_uid is not set or missing, so nothing done!');
		}
		$groupModelHelper  = $this->makeInstance('tx_mklvcommunity_models_group');
		$groupJoinView	   = $this->makeInstance('tx_mklvcommunity_views_groupsJoin');
		/* check if user has already joined group */
		$userGroupRelation = $groupModelHelper->getUserGroupRelation($loggedInUser, $groupUid);
		/* Set flag, if user already has joined the group */
		if ($userGroupRelation) {
			$groupJoinView->userIsInGroup = true;	
		}
		$groupModelHelper->loadGroupById($groupUid);
		$groupModel = $groupModelHelper->get('groupData');
		if ($groupModel) {
			$groupJoinView->setModel($groupModel);
		} else {
			return tx_mklvcommunity_helper::errorMsg('No group identified with ' . $groupUid . ' - wrong UID?!?');
		}
		$groupJoinView->render('groupsJoinTemplate');
		$translator 	   = $this->makeInstance('tx_lib_translatorProcessor', $groupJoinView);
		$translator->translate();
		return $translator->get('result');
	}
	
	
	/**
	 * Action for showing a form for deleting a user-group relation.
	 * Requires a parameter group_uid. The corresponding user is taken from 
	 * the UID of the logged in user.
	 *
	 * @return 	string		HTML source code for the frontend view
	 */
	public function showGroupsJoinDeleteAction() {
		$loggedInUser = tx_mklvcommunity_helper::getLoggedInUid();
		$groupUid = $this->parameters->get('group_uid');
		if ($groupUid == '') {
			return tx_mklvcommunity_helper::errorMsg('Parameter group_uid was empty - so nothing to do!');
		}
		$groupModelHelper = $this->makeInstance('tx_mklvcommunity_models_group');
		if (!$groupModelHelper->getUserGroupRelation($loggedInUser, $groupUid)) {
			return tx_mklvcommunity_helper::errorMsg('You are not a member of this group!');
		}
		$groupModelHelper->loadGroupById($groupUid);
		if (!is_object($groupModelHelper->get('groupData'))) {
			return tx_mklvcommunity_helper::errorMsg('No such group - so nothing to do!');
		}
		$groupJoinView = $this->makeInstance('tx_mklvcommunity_views_groupsJoin');
		$groupJoinView->setModel($groupModelHelper->get('groupData'));
		$groupJoinView->render('groupsJoinDeleteTemplate');
		$translator = $this->makeInstance('tx_lib_translatorProcessor', $groupJoinView);
		return $translator->get('result');
	}
	
	
	/**
	 * Action for deleting a user group relation. Requires a parameter group_uid
	 * The corresponding user is taken from the UID of the logged in unser.
	 *
	 * @return 	string 		HTML source code for the frontend view
	 */
	public function performGroupsJoinDeleteAction() {
		$loggedInUser = tx_mklvcommunity_helper::getLoggedInUid();
		$groupUid = $this->parameters->get('group_uid');
		if ($groupUid == '') {
			return tx_mklvcommunity_helper::errorMsg('Parameter group_uid was empty - so nothing to do!');
		}
		$groupModelHelper = $this->makeInstance('tx_mklvcommunity_models_group');
		$groupRelation = $groupModelHelper->getUserGroupRelation($loggedInUser, $groupUid);
		if (!is_object($groupRelation)) {
			return tx_mklvcommunity_helper::errorMsg('You are not a member of this group - so nothing to do!');
		}
		$groupModelHelper->deleteRelationById($groupRelation->getUid());
		$groupModelHelper->loadGroupById($groupUid);
		$groupJoinView = $this->makeInstance('tx_mklvcommunity_views_groupsJoin');
		$groupJoinView->setModel($groupModelHelper->get('groupData'));
		$groupJoinView->render('groupJoinDeleteConfirmTemplate');
		$translator = $this->makeInstance('tx_lib_translatorProcessor', $groupJoinView);
		$translator->translate();
		
		return $translator->get('result');
	}
	
	
	
	/**
	 * Handles the "Join Group Form". If a user is already member of the group,
	 * a information will be displayed. Otherwise, user joins group and confirmation
	 * is displayes.
	 *
	 * @return string 	HTML source code for the confirmation
	 */
	public function saveGroupsJoinFormAction() {
		/* get user and group UIDs and check for parameters */
		$loggedInUser = tx_mklvcommunity_helper::getLoggedInUid();
		$groupUid = $this->parameters->get('group_uid');
		if ($groupUid == '') {
			return tx_mklvcommunity_helper::errorMsg('Parameter group_uid was empty - so nothing to do!');
		}
		$groupModelHelper = $this->makeInstance('tx_mklvcommunity_models_group');
		/* Make sure, user is not already a member of group */
		if ($groupModelHelper->getUserGroupRelation($loggedInUser, $groupUid)) {
			$newUserGroupRelationData = $groupModelHelper->getUserGroupRelation($loggedInUser, $groupUid);
			return $this->showGroupsJoinAlreadyJoinedAction($newUserGroupRelationData);
		}
		/* show confirmation */
		$groupModelHelper->createNewUserGroupRelation($loggedInUser, $groupUid);
		$newUserGroupRelationData = $groupModelHelper->get('userGroupRelationData');
		return $this->showGroupsJoinConfirmationAction($newUserGroupRelationData);
	}
	
	
	
	/**
	 * Shows a confirmation after joining a group
	 *
	 * @param TxMklvcommunityFeUsersFeGroupsMM $userGroupRelation
	 * @return string HTML source code for confirmation view
	 */
	private function showGroupsJoinConfirmationAction($userGroupRelation) {
		$groupJoinView = $this->makeInstance('tx_mklvcommunity_views_groupsJoin');
		$groupModelHelper = $this->makeInstance('tx_mklvcommunity_models_group');
		$groupModelHelper->loadGroupById($userGroupRelation->getFeGroupsUid());
		$groupJoinView->setModel($groupModelHelper->get('groupData'));
		$groupJoinView->render('groupsJoinConfirmationTemplate');
		$translator = $this->makeInstance('tx_lib_translatorProcessor', $groupJoinView);
		$translator->translate();
		return $translator->get('result');
	}
	
	

	/**
	 * Shows an information, that user is already member of a group
	 *
	 * @param TxMklvcommunityFeUsersFeGroupsMM $userGroupRelation
	 * @return string	HTML source code for information view
	 */
	private function showGroupsJoinAlreadyJoinedAction($userGroupRelation) {
		$groupJoinView = $this->makeInstance('tx_mklvcommunity_views_groupsJoin');
		$groupModelHelper = $this->makeInstance('tx_mklvcommunity_models_group');
		$groupModelHelper->loadGroupById($userGroupRelation->getFeGroupsUid());
		$groupJoinView->setModel($groupModelHelper->get('groupData'));
		$groupJoinView->render('groupsJoinAlreadyInGroupTemplate');
		$translator = $this->makeInstance('tx_lib_translatorProcessor', $groupJoinView);
		$translator->translate();
		return $translator->get('result');
	}
	
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsJoin.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsJoin.php']);
}

?>