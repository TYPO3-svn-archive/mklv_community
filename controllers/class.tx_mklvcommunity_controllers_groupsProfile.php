<?php

/**
 * Class file for groupsProfile plugin. Shows group Profile in frontend.
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_groupsProfile extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action
	 *
	 * @var string
	 */
	public $defaultAction='showGroupsProfile';
	
	/**
	 * Shows a group's profile
	 *
	 * @return 	string 	HTML source code for a group's profile
	 */
	public function showGroupsProfileAction() {
		
		if ($this->parameters->get('groupUid') != '') {
			$groupUid = $this->parameters->get('groupUid');
		} else {
			return tx_mklvcommunity_helper::errorMsg('No parameter groupUid - so no output created!');		
		}
		
		$groupModel = $this->makeInstance('tx_mklvcommunity_models_group');
		$groupModel->loadGroupById($groupUid);
		
		$groupProfileView = $this->makeInstance('tx_mklvcommunity_views_groupsProfile');
		$groupProfileView->setModel($groupModel->get('groupData'));
		$groupProfileView->render('groupsProfileTemplate');
		
		$translator = $this->makeInstance('tx_lib_translatorProcessor', $groupProfileView);
		$translator->translate();
	
		return $translator->get('result');
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsProfile.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsProfile.php']);
}

?>