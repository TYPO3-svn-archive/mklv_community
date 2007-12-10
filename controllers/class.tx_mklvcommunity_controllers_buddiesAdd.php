<?php

/**
 * Class definition of buddiesAdd controller
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_buddiesAdd extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action for controller
	 *
	 * @var string
	 */
	public $defaultAction = 'showBuddiesAdd';
	
	/**
	 * Shows buddy add form
	 *
	 * @return 	string 	HTML code for fe output
	 */
	public function showBuddiesAddAction() {
		/* Check for parameters */
    	if ( !($this->parameters->get('buddy_uid') > 0) ) {
    		return tx_mklvcommunity_helper::errorMsg('Missing parameter "buddy_uid"!');
    	} 
    	if ( !(tx_mklvcommunity_helper::getLoggedInUid() > 0 ) ) {
    		return tx_mklvcommunity_helper::errorMsg('No logged in user!');
    	}
    	$buddyUid 	= $this->parameters->get('buddy_uid');
		$userUid 	= tx_mklvcommunity_helper::getLoggedInUid();

		/* Make sure, buddy is not yet buddy */
		if ( tx_mklvcommunity_helper::isBuddy($buddyUid, $userUid)) {
			return tx_mklvcommunity_helper::errorMsg('User has already added this buddy!');
		}
		
		/* Make sure user doesn't add himself as a buddy */
		if ( $userUid == $buddyUid ) {
			return tx_mklvcommunity_helper::errorMsg("You are not allowed to add yourself as a buddy!");
		}
    	
    	/* Create view and render output */
    	$userModel 	= $this->makeInstance('tx_mklvcommunity_models_user');
		$userModel->loadUserByUid($buddyUid);
		
		$buddiesAddView = $this->makeInstance('tx_mklvcommunity_views_buddiesAddForm');
		$buddiesAddView->setModel($userModel->get('userData'));
		$buddiesAddView->render('userBuddyAddFormTemplate');

		$translator = $this->makeInstance('tx_lib_translatorProcessor', $buddiesAddView);
		$translator->translate();
		return $translator->get('result');
	}
	
	
	public function processBuddiesAddFormAction() {
		/* Check for parameters */
		if ( !($this->parameters->get('buddy_uid') > 0)) {
			return tx_mklvcommunity_helper::errorMsg('Missing parameter "buddy_uid"');
		}
		if ( !(tx_mklvcommunity_helper::getLoggedInUid() > 0) ) {
			return tx_mklvcommunity_helper::errorMsg('No logged in user!');
		}
		$buddyUid 	= $this->parameters->get('buddy_uid');
		$userUid 	= tx_mklvcommunity_helper::getLoggedInUid();
		
		/* Make sure user doesn't add himself as a buddy */
		if ($buddyUid == $userUid) {
			return tx_mklvcommunity_helper::errorMsg('You are not allowed to add yourself as a buddy!');
		}
		
		/* Check for confirmation settings */
		$buddyNeedsConfirm = tx_mklvcommunity_helper::getFieldByTableAndUid(
								'fe_users', 'tx_mklvcommunity_buddy_confirm', $buddyUid);
		
		/* Check for buddy confirmation */
		if ($buddyNeedsConfirm) {
			/* Create new 'unconfirmed_buddy' record and send confirmation mail */
			$userModel = $this->makeInstance('tx_mklvcommunity_models_user');
			$hashKey   = $model->insertUnconfirmedBuddy($buddyUid);
			$mailText  = "Another user has wants to add you to his buddy-list. Just use the following link to confirm his request: \n";
			$mailText .= "http://localhost/index.php?id=61&tx_mklvcommunity_controllers_userBuddyAdd[action][processConfirmationMailAction]";
			$mailText .= "&tx_mklvcommunity_controllers_userBuddyAdd[hash_key]=" . $hashKey;

			echo $hashKey;
			
			mail('mimi@kaktusteam.de', 'Subida Buddy Confirmation', $mailText, '');
			
			return 'An email has been sent to the user, to request his authorization<br>' . $mailText;
			
		} else {
			
			/* insert buddy record into buddy table */
			$model = $this->makeInstance('tx_mklvcommunity_models_user');
			$model->insertBuddy($buddyUid, $userUid);
			$model->insertBuddy($userUid, $buddyUid);
			
			/* Create view and render output */
	    	$actionPipe = $this->makeInstance('tx_mklvcommunity_models_user');
			$actionPipe->loadUserByUid($buddyUid);
			$actionPipe = $this->makeInstance('tx_mklvcommunity_views_userBuddyConfirm', $actionPipe);
			$actionPipe->render('userBuddyConfirmTemplate');
			$actionPipe = $this->makeInstance('tx_lib_translatorProcessor', $actionPipe);
			$actionPipe->translate();
			return $actionPipe->get('result');
				
		}
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_buddiesAdd.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_buddiesAdd.php']);
}

?>