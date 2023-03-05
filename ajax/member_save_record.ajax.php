<?php
require_once "../controllers/members.controller.php";
require_once "../models/members.model.php";


class saveMember{
  public $trans_type; 

  public $memID;
  public $fname;
  public $mname;
  public $lname;
  public $suffix;
  public $category;
  public $cstats;
  public $civilstats;
  public $age;
  public $dob;
  public $gender;
  public $email;
  public $phone;
  public $branch;
  




  public function saveMemberRecord(){
    $trans_type = $this->trans_type;

    $memID = $this->memID;
  	$fname = $this->fname;
    $mname = $this->mname;
    $lname = $this->lname;
    $suffix = $this->suffix;
    $category = $this->category;
    $cstats = $this->cstats;
    $civilstats = $this->civilstats;
    $age = $this->age;
    $dob = $this->dob;
    $gender = $this->gender;
    $email = $this->email;
    $phone = $this->phone;

    $branch = $this->branch;


    $data = array("memID"=>$memID,
                  "fname"=>$fname,
                  "mname"=>$mname,
                  "lname"=>$lname,
                  "suffix"=>$suffix,
                  "category"=>$category,
                  "cstats"=>$cstats,
                  "civilstats"=>$civilstats,
                  "age"=>$age,
                  "dob"=>$dob,
                  "gender"=>$gender,
                  "email"=>$email,
                  "phone"=>$phone,
                  "branch"=>$branch);
                  

    if ($trans_type == 'New'){
      $answer = (new ControllerMember)->ctrAddMember($data);
    }else{
      $answer = (new ControllerMember)->ctrEditMember($data);

    }

  }
}

$save_member = new saveMember();

$save_member -> trans_type = $_POST["trans_type"];

$save_member -> memID = $_POST["memID"];

$save_member -> fname = ucwords($_POST["fname"]);

$save_member -> mname = ucwords($_POST["mname"]);

$save_member -> lname = ucwords($_POST["lname"]);

$save_member -> suffix = $_POST["suffix"];

$save_member -> category = $_POST["category"];

$save_member -> cstats = $_POST["cstats"];

$save_member -> civilstats = $_POST["civilstats"];

$save_member -> age = $_POST["age"];

$save_member -> dob = $_POST["dob"];

$save_member -> gender = $_POST["gender"];

$save_member -> email = $_POST["email"];

$save_member -> phone = $_POST["phone"];


$save_member -> branch = $_POST["branch"];





$save_member -> saveMemberRecord();

?>