<?php

class tx_mklvcommunity_views_buddiesAddForm extends tx_mklvcommunity_view {
	
	public function printHiddenBuddyUidField() {
		$return = '<input type="hidden" value="';
		$return .= $this->model->getUid();
		$return .= '" name="tx_mklvcommunity_controllers_buddiesAdd[buddy_uid]" />';
		echo $return;
	}
	
}

?>