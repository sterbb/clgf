<?php

class ControllerReport{
	static public function ctrShowAttendanceReport($date1, $date2, $adult, $hype, $kaya, $jkids){
		$answer = (new ModelReport)->mdlShowAttendanceReport($date1, $date2, $adult, $hype, $kaya, $jkids);
        return $answer;
	}

}