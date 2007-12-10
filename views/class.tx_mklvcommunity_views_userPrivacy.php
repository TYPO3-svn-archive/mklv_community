<?php
class tx_mklvcommunity_views_userPrivacy extends tx_lib_phpViewProcessor {
	
	function printFormTag($id) {
		$link = tx_div::makeInstance('tx_lib_link');
		$link->destination($this->getDestination());
		$link->noHash();
		$action = $link->makeUrl();
		printf(chr(10) . '<form id="%s" action="%s" method="post">' . chr(10), $id, $action);
	}
	
	function printPrivacySelect() {
		$output = '<select name=' . $this->controller->defaultDesignator . '[privacyFlag]>' . "\n";
		foreach($this['privacyFlags'] as $privacyFlag) {
			$output .= $this->_printSelectLine(
						$privacyFlag->get('key'), $privacyFlag->get('description'), $this->get('privacyFlag'));
		}
		$output .= "</select>";
		print($output);
	}
	
	function _printSelectLine($value, $description, $selectedKey) {
		$output = '<option value="' . $value . '"';
		if ($selectedKey == $value) {
			$output .= ' selected';
		}
		$output .= '>' . $description . '</option>';
		return $output;
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/apples/views/class.tx_apples_views_example.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/apples/views/class.tx_apples_views_example.php']);
}
?>