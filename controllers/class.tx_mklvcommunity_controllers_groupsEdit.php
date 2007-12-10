<?php

/**
 * Class definition of groupsEdit controller
 * 
 * If the controller is called without a groupUid, an empty form for a new group will be displayed.
 * If a groupUid is given as parameter, the group is shown for editing in the frontend.
 * 
 * Here are some examples for calling the controller:
 * index.php?id=[page_uid]
 * index.php?id=[page_uid]&tx_mklvcommunity_controllers_groupsEdit[action][showGroupsEditAction]
 * 		&tx_mklvcommunity_controllers_groupsEdit[group_uid]=[group_uid]
 * 
 * @author Michael Knoll <mimi@kaktusteam.de>
 * @author Lars Volker <lv@mklv.de>
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_groupsEdit extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action for groupsEdit controller
	 *
	 * @var string
	 */
	public $defaultAction = 'showGroupsEdit';
	
	/**
	 * Shows a group edit form
	 *
	 * @return 	string	HTML source code for fe output
	 */
	public function showGroupsEditAction($errors = null, $formContents = null) {
		$groupModelHelper	= $this->makeInstance('tx_mklvcommunity_models_group');
		$groupUid 			= $this->parameters->get('group_uid');
		$groupEditView 		= $this->makeInstance('tx_mklvcommunity_views_groupsEdit');
		/* If no groupUid is given, create new empty group! */
		if ($groupUid == '') {
			$groupModelHelper->createEmptyGroup();
		} else {
			$groupModelHelper->loadGroupById($groupUid);
		}
		$groupModel = $groupModelHelper->get('groupData');
		/* If method is called from within controller, check for errors and put content in fields*/
		if ($errors) {
			$groupModel->setTitle($formContents['title']);
			$groupModel->setDescription($formContents['description']);	
			$groupEditView->setErrors($errors);
		}
		$groupEditView->setModel($groupModel);
		$groupEditView->render('groupsEditTemplate');
		
		$translator = $this->makeInstance('tx_lib_translatorProcessor', $groupEditView);
		$translator->translate();
		
		return $translator->get('result');
	}
	
	/**
	 * Process groupEdit form if 'save' Button is pressed
	 *
	 * @return string		HTML source code for fe output
	 */
	public function saveGroupsEditFormAction() {
		$errors 		= null;
		$groupUid 		= $this->parameters->get('group_uid');
		$groupTitle 	= $this->parameters->get('group_title');
		/* Check incoming parameters */
		if ($groupTitle == '') {
			$errors['group_title'] = 1;
		}
		$groupDescript	= $this->parameters->get('group_description');
		if ($groupDescript == '') {
			$errors['group_description'] = 1;
		}
		/* Set errors in form view, if any */
		if ($errors) {
			$formContents = array();
			$formContents['title'] = $groupTitle;
			$formContents['description'] = $groupDescript;
			return $this->showGroupsEditAction($errors, $formContents);
		}
		/* process form without errors */
		$groupModel		= $this->makeInstance('tx_mklvcommunity_models_group'); 
		if ($groupUid != '' ) {
			$groupModel->updateGroupById($groupUid, $groupTitle, $groupDescript);
		} else {
			$newGroupUid = $groupModel->insertGroup($groupTitle, $groupDescript);
			/* set new group uid as param for showGroupsEditAction */
			$this->parameters->set('group_uid', $newGroupUid); 
		}
		
		return $this->showGroupsEditAction();
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsEdit.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsEdit.php']);
}

?>