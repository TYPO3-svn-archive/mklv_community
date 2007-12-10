<?php

class tx_mklvcommunity_views_userSearchList extends tx_mklvcommunity_views_userList {
	
	private $searchWord;
	private $message;
	private $rowConfiguration;
	
	public function setSearchWord($searchWord) {
		$this->searchWord = $searchWord;
	}

	public function setMessage($message) {
		$this->message = $message;
	}
	
	public function getMessage() {
		return $this->message;
	}
	
	public function setRowConfiguration($rowConfiguration) {
		$this->rowConfiguration = $rowConfiguration;
	}
	
	public function renderFromModel() {
		return parent::renderFromModel($this->rowConfiguration);
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

?>