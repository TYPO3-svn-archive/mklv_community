<?php

/**
 * Class definition of mklv_community view base class
 * 
 * All extending of tx_lib_phpViewProcessor should be done in this file
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_view extends tx_lib_phpViewProcessor {
	
	/**
	 * Reference to the model
	 *
	 * @var tx_lib_object
	 */
	protected $model = null;
	
	/**
	 * Sets the model for the current view
	 *
	 * @param 	tx_lib_object 	$model
	 */
	public function setModel($model) {
		$this->model = $model;
	}
	
	public function getModel() {
		return $this->model;
	}
	
	/**
	 * Returns the source code for a link for a given controller, action, pageUid and recordUid
	 *
	 * @param	string	$linkText			Text of the link
	 * @param 	int 	$pageUid			UID of the page to link to 
	 * @param 	string 	$controller			Name of controller
	 * @param 	string 	$action				Name of action
	 * @param 	array 	$parameters			Array with key=>value pairs of getParameters
	 * 
	 * @return	string						HTML Source code for the generated link
	 */
	public function printActionLink($linkText, $pageUid, $controller, $action, $parameters) {
		$result  = '<a href="'. $this->createDestinationLink($pageUid, $controller, $action, $parameters) .'">';
		$result .= $linkText;
		$result .= '</a>';
		return $result;
	}
	
	/**
	 * Creates a link for a page with a given controller, action, recordUid and recordUid Field parameter name
	 *
	 * @param 	int 		$pageUid		Uid of the page to link to
	 * @param 	string 		$controller		Name of controller
	 * @param 	string 		$action			Name of Action
	 * @param 	array		$parameters		Array with key=>value pairs of getParameters
	 * 
	 * @return string						relative link adress
	 */
	public function createDestinationLink($pageUid, $controller, $action, $parameters) {
		$result  = 'index.php?';
		$result .= 'id=' . $pageUid . '&';
		$result .= $controller . '[action][' . $action . ']&';
		$result .= $this->createGetParams($controller, $action, $parameters);
		
		return $result;
	}
	
	/**
	 * Creates a string for given parameters, action and controller
	 *
	 * @param 	string 	$controller		Name of controller
	 * @param 	string 	$action			Name of action
	 * @param 	array 	$parameters		Array with key=>value pairs of getParameters
	 * 
	 * @return 	string					Get Parameters, divided by &
	 */
	private function createGetParams($controller, $action, $parameters) {
		$resultArray = array();
		foreach ($parameters as $key => $value) {
			$resultArray[] = $controller . '[' . $key . ']=' . $value; 
		}
		$result = implode('&', $resultArray);
		return $result;
	}
	
	
	/**
	 * Returns the source code for an opening html form tag
	 *
	 * @param 	string 	$id		ID of the form element
	 */
	public function printFormTag($id) {
		$link = tx_div::makeInstance('tx_lib_link');
		$link->destination($this->getDestination());
		$link->noHash();
		$action = $link->makeUrl();
		printf(chr(10) . '<form id="%s" action="%s" method="post">' . chr(10), $id, $action);
	}
	
	public function printEndFormTag() {
		print '</form>';
	}
	
	/**
	 * Returns the source code for a buddy link given a user uid, which should become buddy.
	 * As user uid, the currently logged in user is taken.
	 *
	 * @param 	int 	$buddyUid	Uid of the user who should become a buddy
	 * @return 	string				HTML source code for the link
	 */
	public function printAddBuddyLink($buddyUid) {
		$userUid 		= tx_mklvcommunity_helper::getLoggedInUid();
		$buddyDeletePage= $this->controller->configurations->get('buddyDelete.pageId');
		$buddyAddPage	= $this->controller->configurations->get('buddyAdd.pageId');
		
		/* Check for buddy or not */
		$isBuddy 		= tx_mklvcommunity_helper::isBuddy($buddyUid, $userUid);
		
		/* Buddy can't add himself! */
		if ($userUid == $buddyUid) {
			return '';
		}
		
		if ($isBuddy) {
			/* User and buddy are buddies already, so create delete link */
			return $this->printActionLink('Delete Buddy', $buddyDeletePage, 'tx_mklvcommunity_controllers_buddiesDelete', 
					'showBuddiesDeleteAction', array('buddy_uid' => $buddyUid));
		} else {
			/* User and buddy are not friends yet, so create add buddy link */
			return $this->printActionLink('Add Buddy', $buddyAddPage, 'tx_mklvcommunity_controllers_buddiesAdd', 
					'showBuddiesAddAction', array('buddy_uid' => $buddyUid));
		}
	}
	
	/**
	 * Returns the source code for a user details link for a given uid and a given username
	 * If no username is given, the text for the link will be 'user details'
	 * 
	 * @todo Make link text configurable in TS
	 *
	 * @param 	int 	$userUid	UID of the user
	 * @param 	string 	$userName	Name of the user
	 * @return 	string				HTML Source Code for the user link
	 */
	public function printUserDetailsLink($userUid, $userName='') {
		$userDetailsPage = $this->controller->configurations->get('userDetails.pageId');
		if ($userName != '') {
			return $this->printActionLink($userName, $userDetailsPage, 
						'tx_mklvcommunity_controllers_userDetails', 'userDetails', array('uid' => $userUid));
		} else {
			return $this->printActionLink('User Details', $userDetailsPage, 
						'tx_mklvcommunity_controllers_userDetails', 'userDetails', array('uid' => $userUid));
		}
	}


	public function createGroupDetailsLink($gid, $text='') {
		$page = $this->controller->configurations->get('groupsProfile.pageId');
		if ($text == '') {
			$text = "%%%general.labels.groupdetails%%%";
		}
		return $this->printActionLink($text, $page, 'tx_mklvcommunity_controllers_groupsProfile', 
										'showGroupsProfileAction', array('groupUid' => $gid));
	}
	
	
	
	/**
	 * Create HTML source code for a link to join or leave a group
	 *
	 * @param 	int 	$gid	UID of the group
	 * @param 	string 	$text	Text to be shown as a link
	 * @return 	strgin			HTML source code for the link
	 */
	public function createJoinGroupLink($gid, $text='') {
		$loggedInUserUid = tx_mklvcommunity_helper::getLoggedInUid();
		$groupModel = $this->controller->makeInstance('tx_mklvcommunity_models_group');
		$page = $this->controller->configurations->get('groupsJoin.pageId');
		
		/* If user is already member of group, show delete - link */
		if ($groupModel->getUserGroupRelation($loggedInUserUid, $gid)) {
			if ($text == '') {
				$text = '%%%general.labels.groupsLeave%%%';	
			}
			return $this->printActionLink($text, $page, 'tx_mklvcommunity_controllers_groupsJoin',
											'showGroupsJoinDeleteAction', array('group_uid' => $gid));
		} else {
			if ($text == '' ) {
				$text = '%%%general.labels.groupsJoin%%%';
			}
			return $this->printActionLink($text, $page, 'tx_mklvcommunity_controllers_groupsJoin',
											'showGroupsJoinAction', array('group_uid' => $gid));
		}
	}
	
	
	public function printEditGroupLink($groupUid, $text='') {
		$editGroupPluginPageId = $this->controller->configurations->get('groupsEdit.pageId');
		if ($text=='') {
			$text = '%%%general.labels.groupsEdit%%%';
		}
		return $this->printActionLink($text,$editGroupPluginPageId,'tx_mklvcommunity_controllers_groupsEdit',
										'showGroupsEditAction', array('group_uid' => $groupUid) );
		
	}
	
}

?>