<?php

/**
 * Class definition for buddies delete controller
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_buddiesDelete extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action
	 *
	 * @var string
	 */
	public $defaultAction = 'showBuddiesDelete';
	
	
	/**
	 * Shows a confirm request for deleting a buddy from buddy list
	 * 
	 * @todo Add a "really-delete-form"
	 *
	 * @return 	string	HTML source code for fe output
	 */
	public function showBuddiesDeleteAction() {
		$buddyUid = $this->parameters->get('buddy_uid');
		if ($buddyUid == '') {
			tx_mklvcommunity_helper::errorMsg('Empty parameter buddy_uid - so nothing to do!');
		}
		$loggedInUserUid = tx_mklvcommunity_helper::getLoggedInUid();
		$userModelHelper = $this->makeInstance('tx_mklvcommunity_models_user');
		$userModelHelper->deleteBuddy($buddyUid, $loggedInUserUid);
		
		$userModelHelper->loadUserByUid($buddyUid);
		
		$buddiesDeleteView = $this->makeInstance('tx_mklvcommunity_views_buddiesDelete');
		$buddiesDeleteView->setModel($userModelHelper->get('userData'));
		$buddiesDeleteView->render('buddiesDeleteTemplate');
		
		$translator = $this->makeInstance('tx_lib_translatorProcessor', $buddiesDeleteView);
		$translator->translate();
		
		return $translator->get('result');
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_buddiesDelete.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_buddiesDelete.php']);
}

?>