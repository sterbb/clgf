<?php
require_once "../controllers/login.controller.php";
require_once "../models/login.model.php";
class AjaxLogin{
    public $username;
    public $password;
    public function ajaxgetAccount(){
      $username = $this->username;
      $password = $this->password;

      $data = array("username"=> $username,
                    "password"=>$password);
      $answer = (new ControllerLogin)->ctrAuthenticateLogin($data);
      echo json_encode($answer);
      
    }
}
 
if(isset($_POST["username"])){
  $getAccount = new AjaxLogin();
  $getAccount -> username = $_POST["username"];
  $getAccount -> password = $_POST["password"];
  $getAccount -> ajaxgetAccount();
}