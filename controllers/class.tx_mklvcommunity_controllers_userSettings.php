<?php

/**
 * Class definition file for displaying user settings in the frontend
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_userSettings extends tx_mklvcommunity_controller{
	
	/**
	 * Sets the default action
	 *
	 * @var string
	 */
	public $defaultAction = 'showUserSettings';
	
	/**
	 * Shows user settings in the frontend
	 *
	 * @return 	string	HTML sourcecode for the user settings form
	 */
	public function showUserSettingsAction() {
		$actionPipe = $this->makeInstance('tx_mklvcommunity_models_user');
		$actionPipe->loadUserByUid(tx_mklvcommunity_helper::getLoggedInUid());
		$actionPipe = $actionPipe->toObjectOfObjects('tx_mklvcommunity_views_userSettings');
		$actionPipe->render('userSettingsTemplate');
		$actionPipe = $this->makeInstance('tx_lib_translatorProcessor', $actionPipe);
		$actionPipe->translate();
		return $actionPipe->get('result');
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userSettings.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userSettings.php']);
}

?>