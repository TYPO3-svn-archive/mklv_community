<?php

/**
 * Class definition of buddiesList controller
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_buddiesList extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action for controller
	 *
	 * @var string
	 */
	public $defaultAction = 'showBuddiesList';
	
	/**
	 * Shows buddy list
	 *
	 * @return 	string 	HTML code for fe output
	 */
	public function showBuddiesListAction() {
		$loggedInUserUid = tx_mklvcommunity_helper::getFrontEndUser();
		
		$userModel = $this->makeInstance('tx_mklvcommunity_models_user');
		$userModel->loadBuddiesForUser($loggedInUserUid);
		
		$buddiesListView = $this->makeInstance('tx_mklvcommunity_views_buddiesList');
		$buddiesListView->setModel($userModel->get('buddiesList'));
		$buddiesListView->render('userBuddyListTemplate');
		
		$buddiesListTranslator = $this->makeInstance('tx_lib_translatorProcessor', $buddiesListView);
		$buddiesListTranslator->translate();
		
		return $buddiesListTranslator->get('result');
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_buddiesList.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_buddiesList.php']);
}

?>