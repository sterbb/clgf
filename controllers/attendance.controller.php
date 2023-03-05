<?php

class ControllerAttendance{
    static public function ctrAddSFAttendance($data){
        $answer = (new ModelAttendance)->mdlAddAttendance($data);
    }

    static public function ctrShowAttendanceList(){
		$answer = (new ModelAttendance)->mdlShowAttendanceList();
		return $answer;
	}
}

?>