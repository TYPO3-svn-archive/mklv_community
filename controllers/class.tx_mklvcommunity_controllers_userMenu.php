<?php

/**
 * Class definition file for userMenu content object. Displays a user menu in the frontend.
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_userMenu extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action of the userMenu controller
	 *
	 * @var string
	 */
	public $defaultAction = 'showUserMenu';

	/**
	 * Shows a menu for user functions in the frontend
	 *
	 * @return 	string 	HTML source code for the userMenu
	 */
	public function showUserMenuAction() {
		return 'user menu';
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userMenu.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userMenu.php']);
}

?>