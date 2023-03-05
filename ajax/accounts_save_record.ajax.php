<?php
require_once "../controllers/accounts.controller.php";
require_once "../models/accounts.model.php";


class saveAccounts{
  public $trans_type; 

  public $username;
  public $password;
  public $access;
  public $name;
  public $phone;

  public function saveAccountsRecord(){
    $trans_type = $this->trans_type;

    $username = $this->username;

  	$password = $this->password;
    $access = $this->access;
    $name = $this->name;
    $phone = $this->phone;

    $hashpass = password_hash($password, PASSWORD_DEFAULT);



    $data = array("username"=>$username,
                  "password"=>$hashpass,
                  "access"=>$access,
                  "name"=>$name,
                  "phone"=>$phone);
                  

    if ($trans_type == 'New'){
      $answer = (new ControllerAccounts)->ctrAddAccounts($data);
    }else{
      $answer = (new ControllerAccounts)->ctrEditAccounts($data);
    }

  }
}

$save_accounts = new saveAccounts();
$save_accounts -> trans_type = $_POST["trans_type"];
$save_accounts -> username = $_POST["username"];
$save_accounts -> password = $_POST["password"];
$save_accounts -> access = $_POST["access"];
$save_accounts -> name = $_POST["name"];
$save_accounts -> phone = $_POST["phone"];


$save_accounts -> saveAccountsRecord();