<?php

/**
 * Class definition file for userList controller. Displays user lists in the frontend.
 * TODOs
 * @todo Configuration for single page ID needed
 * @todo Configuration for add buddy page ID needed
 * @todo Set user list controller on TS to make it callable from other extension
 * @todo implement more efficient dispatcher to enable more than one user list on one page
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 */
class tx_mklvcommunity_controllers_userList extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action of the controller
	 *
	 * @var string
	 */
	public $defaultAction 		= 'showUserList';

	/**
	 * Shows a user list in the frontend
	 *
	 * @return 	string	HTML source code for the user list
	 */
	public function showUserListAction() {
		
		$userModel = $this->makeInstance('tx_mklvcommunity_models_user');
		$userModel->loadAllUsers();
		
		$userListView = $this->makeInstance('tx_mklvcommunity_views_userList');
		$userListView->setRenderFactory(new tx_mklvcommunity_listHelper_tableRenderFactory());
		$userListView->setModel($userModel->get('users'));
		$userListView->render('userListTemplate');
		
		$userListTranslator = $this->makeInstance('tx_lib_translatorProcessor', $userListView);
		$userListTranslator->translate();
		
		return $userListTranslator->get('result');
		
	}
	
	public function showBuddyListAction() {
		return 'showBuddyList';
	}
	
	/**
	 * Shows a list with search results in the frontend
	 * On top of the list, a form is shown that contains the
	 * current search word.
	 *
	 * @return string		HTML Source Code for the result list
	 */
	public function showSearchListAction() {
		$result = '';
		
		/* Get parameters */
		$searchWord = $this->parameters->get('search_word');
		
		
		/**
		 * Call tx_mklvcommunity_controllers_userSearch as subcontroller 
		 * @todo what about auto-instantiating as sub-controller?
		 *       needs to get its configuration automatically? How to do that?
		 */
		$userSearchController = $this->makeInstance('tx_mklvcommunity_controllers_userSearch');
		$userSearchController->defaultAction = 'showUserSearch';
		$userSearchController->setSearchWord($searchWord);
		$userSearchController->configurations = $this->configurations;
		$result .= $userSearchController->showUserSearchAction();
		
		/* Load search result from model */
		$userModelHelper = $this->makeInstance('tx_mklvcommunity_models_user');
		$userModelHelper->loadUserBySearchword($searchWord);
		$userSearchListView = $this->makeInstance('tx_mklvcommunity_views_userSearchList');
		$userSearchListView->setSearchWord($searchWord);
		$userSearchListView->setMessage('%%%template.userSearchList.searchResultMessage%%%');
		$userSearchListView->setModel($userModelHelper->get('users'));
		
		/* Set row configuration for list view */
		$rowConfiguration = array();
		$rowConfiguration['username'] = new tx_mklvcommunity_listHelper_userDetailsLinkRenderer('username');
		$rowConfiguration['uid'] = new tx_mklvcommunity_listHelper_buddyLinkRenderer('uid');
		$userSearchListView->setRowConfiguration($rowConfiguration);
		$userSearchListView->setRenderFactory(new tx_mklvcommunity_listHelper_tableRenderFactory());
		
		/* Render template */
		$userSearchListView->render('userSearchListTemplate');	
			
		/* Set translator */
		$translator = $this->makeInstance('tx_lib_translatorProcessor', $userSearchListView);
    	$translator->translate();
    	$result .= $translator->get('result');
    	return $result;
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userList.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userList.php']);
}

?>