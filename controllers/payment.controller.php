<?php
class ControllerPayments{
	static public function ctrAddPayment($data){
		$answer = (new ModelPayment)->mdlAddRegPayment($data);
	}
    
    static public function ctrShowPayment(){
		$answer = (new ModelPayment)->mdlShowPayment();
		return $answer;
	}

}