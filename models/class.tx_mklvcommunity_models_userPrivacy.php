<?php

class tx_mklvcommunity_models_userPrivacy extends tx_lib_object {
	
	/**
	 * Loads a user's page privacy setting from the database
	 * 
	 * @param int	$uid	The uid of the user
	 *
	 */

	private $uid;
	
	private $translator;
	
	/**
	 * Overwrite default constructor to initialize a translator object for the model
	 *
	 * @param 	mixed 	$param1
	 * @param 	mixed 	$param2
	 * @return 	tx_mklvcommunity_models_userPrivacy
	 */
	function tx_mklvcommunity_models_userPrivacy($param1 = null, $param2 = null) {
		$this->translator = new tx_lib_translatorProcessor($param1);
		$this->translator->setPathToLanguageFile($param1->configurations['pathToDbLanguageFile']);
		parent::tx_lib_objectBase($param1, $param2);
	}
	
	/**
	 * Loads all privacy-related information for a user 
	 * by its uid. The information for possible privacy-flags
	 * is taken by the configuration entry of the TCA
	 *
	 * @param int 	$uid 	UID of the user
	 */
	function loadUserPrivacyByUid($uid) {
		/* check for correct parameters */
		if (!$uid > 0) {
			throw new Exception("Parameter \$uid <= 0. Needs to be > 0!");
		}
		
		/* read privacy flag settings from TCA and put them into model*/
		$this->uid = $uid;
		t3lib_div::loadTCA('tx_mklvcommunity_privacy_setting');
		$privacyFlagsItem = array();
		// Read configuration for privacy_flag-field from TCA
		$privacyFlagsItem = $GLOBALS['TCA']['tx_mklvcommunity_privacy_setting']['columns']['privacy_flag']['config']['items'];
		$tmpObj = new tx_lib_object();
		foreach ($privacyFlagsItem AS $privacyItem) {
			$tmp = array();
			$tmp['key'] = $privacyItem[1];
			$tmp['description'] = $this->translator->translateTextLl($privacyItem[0]);
			$tmpObj->append(new tx_lib_object($tmp));
		}
		$this->set('privacyFlags', $tmpObj);
		
		/* set up query parameters */
		$fields 	= 'tx_mklvcommunity_privacy_flag';
		$tables 	= 'fe_users';
		$where 		= 'uid = ' . $this->uid;
        
		/* execute query */
		$result		= $GLOBALS['TYPO3_DB']->exec_SELECTquery($fields, $tables, $where);
		if($result) {
			$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
			$this->set('privacyFlag', $row['tx_mklvcommunity_privacy_flag']);
		}
	}
	
	function saveUserPrivacy($privacyFlag) {
		/* check for correct parameters */
		if (!(0 <= $privacyFlag && $privacyFlag <= 3)) {
			throw new Exception("Parameter \$privaceFlag should be between 0 and 3!");
		}
		
		/* set up query parameters */
		/* @todo use helper function */
		$insertArray['tx_mklvcommunity_privacy_flag'] 	= (int)htmlspecialchars($privacyFlag);
		$tmpUser 						= get_object_vars($GLOBALS['TSFE']->fe_user);
		$feUser							= $tmpUser['user']['uid'];
		$where							= (string)'uid = ' . $feUser;
		
		/* check login state of fe_user */
		if (!is_null($feUser)){		
			/* execute query */
			$GLOBALS['TYPO3_DB']->exec_UPDATEquery('fe_users', $where, $insertArray);
		} else {
			throw new Exception("User Privacy can only be set, if fe user is logged in!");
		}
	}
}

?>