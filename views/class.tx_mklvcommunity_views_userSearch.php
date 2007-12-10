<?php

/**
 * Class definition file for userSearch view.
 * 
 * @author Michael Knoll, Lars Volker
 * @package Typo3
 * @subpackage mklv_community
 *
 */
class tx_mklvcommunity_views_userSearch extends tx_lib_phpViewProcessor {
	
	/**
	 * Search word to be displayed in the search field
	 *
	 * @var string
	 */
	public $searchWord = '';
	
	/**
	 * Outputs an opening search form tag for processing the search
	 *
	 * @param 	string 		$id		ID for the form tag (id="...")
	 */
	function printSearchFormTag($id) {
		$userListPageUid = $this->controller->configurations->get('userList.pageId');
		$link = tx_div::makeInstance('tx_lib_link');
		$link->destination($userListPageUid);
		$link->noHash();
		$action = $link->makeUrl();
		printf(chr(10) . '<form id="%s" action="%s" method="post">' . chr(10), $id, $action);
	}
	
	/**
	 * Setter method for the search word that is displayed as default entry
	 * in the search field.
	 *
	 * @param 	string 		$searchWord		Searchword to be set in the search field
	 */
	public function setSearchWord($searchWord) {
		$this->searchWord = $searchWord;
	}
	
	/**
	 * Getter Method for the searchword
	 *
	 * @return string						Searchword for search list
	 */
	public function getSearchWord() {
		return $this->searchWord;
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/apples/views/class.tx_apples_views_example.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/apples/views/class.tx_apples_views_example.php']);
}
?>