<?php
require_once "../controllers/attendance.controller.php";
require_once "../models/attendance.model.php";


class saveAttendance{
  public $type;
  public $stime;
  public $sdate;
  public $attendancelist;

  public function saveAttendanceRecord(){
    $stime = $this->stime;
    $sdate = $this->sdate;
    $type = $this->type;
    $attendancelist = $this->attendancelist;

    if($type == ''){
      $type = "General Event";
    }

    $data = array("stime"=>$stime,
                  "sdate"=>$sdate,
                  "type"=>$type,
                  "attendancelist"=>$attendancelist);
                  
    //feature to be added
    //if ($type == 'Sunday Fellowship'){

      $answer = (new ControllerAttendance)->ctrAddSFAttendance($data);



  }
}

$save_attendance = new saveAttendance();

$save_attendance -> stime = $_POST["stime"];
$save_attendance -> sdate = $_POST["sdate"];
$save_attendance -> type = $_POST["type"];
$save_attendance -> attendancelist = $_POST["attendancelist"];



$save_attendance -> saveAttendanceRecord();