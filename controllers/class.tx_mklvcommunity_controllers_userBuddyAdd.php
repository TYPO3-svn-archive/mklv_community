<?php

/**
 * Controller for add buddy mechanism.
 * 
 * Some functionality needs to be implemented:
 * - Show form with information about buddy to be added (captcha)
 * - Make it configurable via Flexform, wether buddy needs to accept friendship or not
 * - Send mail to buddy, to inform him about handshake and to let him accept it or not
 * - Send mail to user who wants to add buddy, if buddy has accepted friendship
 * - Show buddy ignore form (delete buddy from buddy-list)
 * 
 * @todo as controller does a lot more than adding buddies, it should be renamed to userBuddy
 * @todo put the whole thing into the buddy - controllers!
 * @todo add case, that userA added userB, waiting for confirmation and userB adds user A now!
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_userBuddyAdd extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action to be called by main() 
	 * if no other action is given
	 *
	 * @var string
	 */
	public $defaultAction = 'showUserBuddyAdd';
    
    /**
     * Shows a form that lets user confirm the wish to add
     * a buddy to his buddy list
     * 
     * @todo needs to be implemnted
     *
     * @return 	string		HTML Code for plugin output 
     */
    public function showUserBuddyAddAction() {
    	
    	/* Check for parameters */
    	if ( !($this->parameters->get('buddy_uid') > 0) ) {
    		return tx_mklvcommunity_helper::errorMsg('Missing parameter "buddy_uid"!');
    	} 
    	if ( !(tx_mklvcommunity_helper::getLoggedInUid() > 0 ) ) {
    		return tx_mklvcommunity_helper::errorMsg('No logged in user!');
    	}
    	$buddyUid = $this->parameters->get('buddy_uid');
		$userUid = tx_mklvcommunity_helper::getLoggedInUid();

		/* Make sure, buddy is not yet buddy */
		if ( tx_mklvcommunity_helper::isBuddy($buddyUid, $userUid)) {
			return tx_mklvcommunity_helper::errorMsg('User has already added this buddy!');
		}
		
		/* Make sure user doesn't add himself as a buddy */
		if ( $userUid == $buddyUid ) {
			return tx_mklvcommunity_helper::errorMsg("You are not allowed to add yourself as a buddy!");
		}
    	
    	/* Create view and render output */
    	$actionPipe = $this->makeInstance('tx_mklvcommunity_models_user');
		$actionPipe->loadUserByUid($buddyUid);
		$actionPipe = $this->makeInstance('tx_mklvcommunity_views_userBuddyAddForm', $actionPipe);
		$actionPipe->render('userBuddyAddFormTemplate');
		$actionPipe = $this->makeInstance('tx_lib_translatorProcessor', $actionPipe);
		$actionPipe->translate();
		return $actionPipe->get('result');
    	
    }
    
    /**
     * If buddy needs to confirm friendship, a mail
     * to buddy is sent.
     * 
     * @todo needs to be implemented
     * 
     * @return string		HTML Code for plugin output
     *
     */
    public function processUserBuddyAddFormAction() {
    	
    	/* Check for parameters */
		if ( !($this->parameters->get('buddy_uid') > 0)) {
			return tx_mklvcommunity_helper::errorMsg('Missing parameter "buddy_uid"');
		}
		if ( !(tx_mklvcommunity_helper::getLoggedInUid() > 0) ) {
			return tx_mklvcommunity_helper::errorMsg('No logged in user!');
		}
		$buddyUid = $this->parameters->get('buddy_uid');
		$userUid = tx_mklvcommunity_helper::getLoggedInUid();
		
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
			$model	   = $this->makeInstance('tx_mklvcommunity_models_user');
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
    
    /**
     * Processes the confirmation of the confirmation mail
     * by the buddy. Shows a message to the buddy who has
     * accepted the friendship, sends a information mail to
     * the user who has initiated the friendship
     * 
     * @todo needs to be implemented
     * 
     * @return string		HTML Code for plugin output
     * 
     */
	public function processConfirmationMailAction() {
		
		/* check for parameters */
		if ($this->parameters->get('hash_key') == '') {
			return tx_mklvcommunity_helper::errorMsg('Need a hash key to confirm friendship!');
		}
		
		/* check for existing unconfirmed buddy record */
		/**
		 * Note: As the user who gets this view is the one who has to 
		 * confirm the friendship, he becomes the buddy, so userUid = BuddyUid
		 * and vice versa.
		 */
		$hashKey 	= $this->parameters->get('hash_key');
		$buddyUid 	= tx_mklvcommunity_helper::getFieldByTableAndWhereClause('tx_mklvcommunity_unconfirmed_buddy','user_uid', 'hash_key = "' . $hashKey . '"');
		$userUid 	= tx_mklvcommunity_helper::getFieldByTableAndWhereClause('tx_mklvcommunity_unconfirmed_buddy','buddy_uid', 'hash_key = "' . $hashKey . '"');
		if (!($userUid > 0 && $buddyUid > 0)) {
			return tx_mklvcommunity_helper::errorMsg('No unconfirmed buddy for the given hash_key: ' . $hashKey);
		}

		/* check for buddy ignore */
		if ($this->parameters->get('ignore')) {
			/* @todo implement the ignore stuff */	
		}
		
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
	
	/**
	 * Deletes a user from a buddy list and sends a mail to
	 * the deleted buddy.
	 * 
	 * @todo needs to be implemented
	 * 
	 * @return string		HTML Code for plugin output
	 *
	 */
	public function deleteBuddyAction() {
		return 'Delete Buddy Action';
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userBuddyAdd.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userBuddyAdd.php']);
}

?>