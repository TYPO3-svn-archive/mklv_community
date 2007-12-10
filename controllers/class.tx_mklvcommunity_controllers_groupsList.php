<?php

require_once('/usr/share/php/propel/Propel.php');

set_include_path("/var/www/localhost/svn/subida/typo3conf/ext/mklv_community/propel_test/build/classes" . PATH_SEPARATOR . get_include_path());

include_once('mklv_community/FeGroupsPeer.php');
include_once('mklv_community/FeGroups.php');

Propel::init("/var/www/localhost/svn/subida/typo3conf/ext/mklv_community/propel_test/build/conf/mklv_community-conf.php");

/**
 * Class definition for groups list controller
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_controllers_groupsList extends tx_mklvcommunity_controller {
	
	/**
	 * Sets the default action for groupsList controller
	 *
	 * @var string
	 */
	public $defaultAction = 'showGroupsList';
	
	/**
	 * Shows Groups list
	 *
	 * @return 	string	HTML source code for fe output
	 */
	public function showGroupsListAction() {
		
		// Schritte zu gehen
		// 1. Liste der Gruppen des Users beschaffen
		// in der View anzeigen

		// load data
		$groupsModel = $this->makeInstance('tx_mklvcommunity_models_group');
		$groupsModel->loadAllGroups();

		// get ourselfs a view from the groups
		$groupsListView = $this->makeInstance('tx_mklvcommunity_views_groupsList');
		$groupsListView->setModel($groupsModel->get('groupsList'));
		$groupsListView->setRenderFactory(new tx_mklvcommunity_listHelper_tableRenderFactory());
		$groupsListView->render('groupsListTemplate');
		
		$translator = $this->makeInstance('tx_lib_translatorProcessor', $groupsListView);
		$translator->translate();
		
		return $translator->get('result');
		
		/*
		$view = $model->toObjectOfObjects('tx_mklvcommunity_views_groupList');
		$view -> setRenderFactory(new tx_mklvcommunity_listHelper_tableRenderFactory());
		$rowConfig = array();
		$rowConfig['title'] = new tx_mklvcommunity_listHelper_groupDetailsLinkRenderer('title');


		//return 'Groups list';
		return $view->renderFromModel($rowConfig);*/
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsList.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mklv_community/controllers/class.tx_mklvcommunity_controllers_groupsList.php']);
}

?>
