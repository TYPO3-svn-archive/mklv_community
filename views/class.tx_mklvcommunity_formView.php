<?php

class tx_mklvcommunity_formView extends tx_mklvcommunity_view {
	
	private $errors = null;
	
	private $message = '';
	
	public function setErrors($errors) {
		$this->errors = $errors;
	}
	
	public function getErrors($key = '') {
		if ($key != '') {
			return $this->errors[$key];
		}
		return $this->errors;
	}
	
	public function setMessage($message) {
		$this->message = $message;
	}
	
	public function getMessage() {
		return $this->message;
	}
	
}

?>