<?php

/**
 * Class definition file for userSearch. Displays a form for
 * searching users in the frontend.
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community 
 *
 */
class tx_mklvcommunity_controllers_userSearch extends tx_mklvcommunity_controller {

	 /**
     * default action overwrites the default-action function 
     * which normally is called defaultAction
     * 
     * defaultAction is called by the controller parent class if no $defaultAction var is set
     */
    public $defaultAction = 'showUserSearch';

    /**
     * If called as a subcontroller, a searchword can be set
     *
     * @var string
     */
    public $searchWord = '';
    
    /**
     * Shows a form for searching users
     *
     * @return string	The generated HTML Code for the plugin
     */
    public function showUserSearchAction() {
    	
    	/* Load model */
    	$model 		= $this->makeInstance('tx_mklvcommunity_models_user');
    	
    	/* Load view */
    	$view = $this->makeInstance('tx_mklvcommunity_views_userSearch', $model);
    	
    	/* Set searchword in the search field */
    	if ($this->searchWord != '') {
    		$view->setSearchWord($this->searchWord);
    	}
    	
    	/* render, translate and output view */
    	$view->render('userSearchTemplate');
    	$translator = $this->makeInstance('tx_lib_translatorProcessor', $view);
    	$translator->translate();
    	
    	return $translator->get('result');
    }
    
    /**
     * Setter method for the searchword (if called as subcontroller)
     *
     * @param 	string		$searchWord		Searchword to be redisplayed in the search field 
     */
    public function setSearchWord($searchWord) {
    	$this->searchWord = $searchWord;
    }
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userSearch.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_userSearch.php']);
}

?>