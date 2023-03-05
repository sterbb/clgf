<?php
require_once "../controllers/members.controller.php";
require_once "../models/members.model.php";
class AjaxMember{
    public $memID;
    public function ajaxGetMember(){
      $item = "memID";
      $value = $this->memID;
      $answer = (new ControllerMember)->ctrShowMember($item, $value);
      echo json_encode($answer);
    }
}
 
if(isset($_POST["memID"])){
  $getMember = new AjaxMember();
  $getMember -> memID = $_POST["memID"];
  $getMember -> ajaxGetMember();
}
?>