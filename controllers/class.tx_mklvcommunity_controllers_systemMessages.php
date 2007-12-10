<?php

/**
 * Class definition file for system messages controller
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_systemMessages extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action for the controller
	 *
	 * @var string
	 */
	public $defaultAction = 'showSystemMessages';
	
	/**
	 * Shows system messages
	 *
	 * @return 	string	HTML source code for the system messages 
	 */
	public function showSystemMessagesAction() {
		return 'showSystemMessages'; 
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_systemMessages.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_systemMessages.php']);
}

?>