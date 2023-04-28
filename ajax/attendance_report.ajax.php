<?php
require_once "../controllers/report.controller.php";
require_once "../models/report.model.php";

class AjaxGetAttendanceReport{ 

    public $date1;
    public $date2;

	public function ajaxDisplayAttendanceReport(){
        $date1 = $this->date1;
        $date2 = $this->date2;
        $adult = $this->adult;
        $hype = $this->hype;
        $jkids = $this->jkids;
        $kaya = $this->kaya;

        $answer = (new ControllerReport)->ctrShowAttendanceReport($date1, $date2, $adult, $hype, $kaya, $jkids);
        echo json_encode($answer);
		
	}
}

$att_report = new AjaxGetAttendanceReport();
$att_report -> date1 = $_POST["date1"];
$att_report -> date2 = $_POST["date2"];
$att_report -> adult = $_POST["adult"];
$att_report -> hype = $_POST["hype"];
$att_report -> jkids = $_POST["jkids"];
$att_report -> kaya = $_POST["kaya"];

$att_report -> ajaxDisplayAttendanceReport();