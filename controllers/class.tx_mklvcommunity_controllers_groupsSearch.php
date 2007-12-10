<?php

/**
 * Class definition for groupsSearch controller
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_groupsSearch extends tx_mklvcommunity_controller {

	/**
	 * Sets default action for groupsSearch controller
	 *
	 * @var string
	 */
	public $defaultAction = 'showGroupsSearch';

	/**
	 * Shows a Groups Search Form
	 *
	 * @return 	string	HTML source code for fe output
	 */
	public function showGroupsSearchAction() {
		return 'show groups search';
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsSearch.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsSearch.php']);
}

?>