<?php


/**
 * Class definition of a view for a user list.  
 *
 */
class tx_mklvcommunity_views_userList extends tx_mklvcommunity_views_listView {
	
	public function renderFromModel($rowConfiguration = null) {
		$rowConfiguration = array();
		$rowConfiguration[0] = new tx_mklvcommunity_listHelper_userDetailsLinkRenderer('uid');
		$rowConfiguration[1] = new tx_mklvcommunity_listHelper_buddyLinkRenderer('username');
		return parent::renderFromModel($rowConfiguration);
	}
	
}


/**
 * Implementation of a contentRenderer for creating a "add-buddy" link
 * 
 * @todo how can a helper class be configured with global configuration?
 * @todo nicer access to parent table...
 * 
 * The extnending class needs to implement the render() method which gets the 
 * contentObject of the cell as a parameter.
 *
 */
class tx_mklvcommunity_listHelper_buddyLinkRenderer extends tx_mklvcommunity_listHelper_contentRenderer {
	
	/**
	 * Renders a add-buddy link for a user uid given in the contentObject->get('uid') property
	 *
	 * @param 	tx_mklvcommunity_listHelper_contentObject 	$contentObject
	 * @return 	string															HTML source code for the link
	 */
	public function render($contentObject) {
		$cell = $this->getParentCell();
		$row = $cell->getParentRow();
		$table = $row->getParentTable();
		return $table->printAddBuddyLink($contentObject->getUid());
	}
	
}

/**
 * Implementation of a content Renderer for creating a "user-details" link
 * 
 * @todo nicer access to parent classes (table, row, cell)
 *
 */
class tx_mklvcommunity_listHelper_userDetailsLinkRenderer extends tx_mklvcommunity_listHelper_contentRenderer {
	/**
	 * Renders a user-details link for a user given in the contentObject->get('uid') property
	 *
	 * @param 	tx_mklvcommunity_listHelper_contentObject 	$contentObject		Content object with user uid set in contentObject->uid
	 * @return 	string															HTML source code for the linkt
	 */
	public function render($contentObject) {
		$cell = $this->getParentCell();
		$row = $cell->getParentRow();
		$table = $row->getParentTable();
		return $table->printUserDetailsLink($contentObject->getUid(), $contentObject->getUsername());
	}
	
}

?>