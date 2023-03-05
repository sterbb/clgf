<?php
require_once "../controllers/accounts.controller.php";
require_once "../models/accounts.model.php";
class AjaxAccounts{
    public $accID;
    public function ajaxGetAccounts(){
      $item = "accID";
      $value = $this->accID;
      $answer = (new ControllerAccounts)->ctrShowAccounts($item, $value);
      echo json_encode($answer);
    }
}
 
if(isset($_POST["accID"])){
  $getAccounts = new AjaxAccounts();
  $getAccounts -> accID = $_POST["accID"];
  $getAccounts -> ajaxGetAccounts();
}

?>