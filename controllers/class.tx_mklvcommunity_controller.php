<?php

/**
 * Main controller class for all mklv_community plugin controllers.
 * 
 * All common controller functionality should be put into this file
 * 
 * @todo set default designator in a template function from classname, when main function is called
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controller extends tx_lib_controller {
	
	/**
	 * Holds the extension key
	 *
	 * @var string
	 */
	public $extKey = 'mklv_community';
	
	/**
	 * Use hook for pre action processing
	 *
	 */
	function doPreActionProcessings() {
		$this->_doLoginCheck();
	}
	
	/**
	 * Main function sets some vars and calls parent's main afterwards
	 * 
	 * @param	string   Incomming content if any. 
	 * @param  	mixed    Array with the local TypoScript setup and optionally a configurations object on key 'configurations'. 
	 * @param  	object   Context object if called as subcontroller.
	 * @param  	object   Parameters object if called as subcontroller.
	 * @return 	string   The complete result of the plugin, typically it's (x)html
	 */
	function main($input, $setup, $context = null, $parameters = null) {
		$this->defaultDesignator = $this->getClassName();
		return parent::main($input, $setup, $context, $parameters);
	}
	
	/**
	 * Check for global login configuration
	 * 
	 * The login configuration for the community plugins is given in setup.txt
	 * You can set up a login-configuration for the extension as a whole,
	 * for each controller or for each action of the controller.
	 * 
	 * Action-login-configuration takes precedence of Controller-login-configuration
	 * which takes precedence of Plugin-login-configuration
	 * 
	 * For setting up the login-configuration use the following TS code in the 
	 * plugin.controller.configurations section:
	 * 
	 * loginSettings {
	 *		## if set to 1, every controller requires login, can't be overwritten by controller login flags!
	 *		global = 0
	 *		## settings for each single plugin, only take effect, if globalLogin is set to 0!
	 *		pluginSettings {
	 *	    	## settings for userDetatils controller, if set to 1, action settings will take no effect!
	 * 	    	userDetails = 0
	 *			userDetailsSettings {
	 *		    	## settings for userDetails controller actions, only take effect, if controller is set to 0!
	 *				showUserDetailsAction = 1
	 *			}
	 *			userList = 0
	 *			userListSettings {
	 *				## settings for userList controller actions, only take effect, if controller ist set to 0!
	 *				showUserList = 1
	 * 				showBuddyList = 1
	 *			}
	 *		}
	 * }
	 */
	function _doLoginCheck() {
		$loginRequired = false;
		/* Get action login settings */
		$loginRequired = $loginRequired 
							|| $this->configurations->get('loginSettings.pluginSettings.' . $this->getClassName() . '.' . $this->action);
		$loginRequired = $loginRequired
							|| $this->configurations->get('loginSettings.pluginSettings.' . $this->getClassName() . '.global');
		$loginRequired = $loginRequired
							|| $this->configurations->get('loginSettings.global');

		/* If login is required and no login is available, redirect to error action */
		if ($loginRequired && !(tx_mklvcommunity_helper::getLoggedInUid() > 0)) {
			$this->action = 'showLoginRequiredErrorAction';
		}
	}
	
	/**
	 * Default action for displaying a 'not-logged-in-error'
	 * 
	 * This function is called, if a login is required through the TS settings
	 * and no logged in user is available. Feel free to overwrite this function
	 * in your controller class.
	 *
	 * @return 	string	Login error message
	 */
	function showLoginRequiredErrorAction() {
		return 'Login required!';
	}
	
}

?>