<?php


/**
 * Class definition file for userDetails plugin. Shows a tt_content object with
 * user details in frontend.
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_userDetails extends tx_mklvcommunity_controller {
    
    /**
     * default action overwrites the default-action function 
     * which normally is called defaultAction
     * 
     * defaultAction is called by the controller parent class if no $defaultAction var is set
     */
    public $defaultAction = 'userDetails';
    
    /**
     * Holds an array with keys that should be shown on 
     * the user's detail page. This fields can be set via
     * TS with userDetails.fieldsToBeShown
     *
     * @var array
     */
    private $fieldsToBeShown = null;
    
    public function userDetailsAction() {
    	
    	$uidOfUser = null;		// UID of the user to be shown
    	
    	if ($this->parameters->get('uid')) {
    		$uidOfUser = $this->parameters->get('uid');
    	} else {
    		$uidOfUser = (int)tx_mklvcommunity_helper::getLoggedInUid();
    	}
    	
    	$userModel = $this->makeInstance('tx_mklvcommunity_models_user');
    	$userModel->loadUserByUid($uidOfUser);
    	
    	$userDetailsView = $this->makeInstance('tx_mklvcommunity_views_userDetails');
    	$userDetailsView->setModel($userModel);
    	$userDetailsView->render('userDetailsTemplate');
    	
    	$userDetailsTranslator = $this->makeInstance('tx_lib_translatorProcessor', $userDetailsView);
    	$userDetailsTranslator->translate();
    	
    	return $userDetailsTranslator->get('result');
    	
    }
    
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userDetails.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userDetails.php']);
}

?>
