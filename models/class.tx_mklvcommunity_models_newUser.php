<?php

/**
 * Model for alle user domain functionality.
 * 
 * @author Michael Knoll <mimi@kaktusteam.de>
 * @package Typo3
 * @subpackage mklv_community
 *
 */

require_once('class.tx_mklvcommunity_model.php');

class tx_mklvcommunity_models_newUser extends tx_mklvcommunity_model {
	
	/**
	 * Loads a user by a given uid and returns a propel object
	 *
	 * @param unknown_type $uid
	 */
	public function loadUserByUid($uid) {
		return FeUsersPeer::retrieveByPK($uid);
	}
	
}

?>