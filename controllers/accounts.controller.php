<?php
class ControllerAccounts{
	static public function ctrAddAccounts($data){
	   	$answer = (new ModelAccounts)->mdlAddAccounts($data);
	}

	static public function ctrEditAccounts($data){
	   	$answer = (new ModelAccounts)->mdlEditAccounts($data);
	}

	static public function ctrShowAccountsList(){
		$answer = (new ModelAccounts)->mdlShowAccountsList();
		return $answer;
	}

	static public function ctrShowAccounts($item, $value){
		$answer = (new ModelAccounts)->mdlShowAccounts($item, $value);
		return $answer;
	}	

}