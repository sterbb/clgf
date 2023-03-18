<?php
require_once "../controllers/payment.controller.php";
require_once "../models/payment.model.php";
class AjaxPayment{
    public function ajaxGetPayment(){
      $answer = (new ControllerPayments)->ctrShowPayment();
      echo json_encode($answer);
    }
}

  $getPayment = new AjaxPayment();
  $getPayment -> ajaxGetPayment();

?>