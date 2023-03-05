<?php
class ControllerAttendee{

	static public function ctrShowAttendeeList(){
		$answer = (new ModelAttendee)->mdlShowAttendeeList();
		return $answer;
	}

	static public function ctrShowAttendees(){
		$answer = (new ModelAttendee)->mdlShowAtteendees();
		return $answer;
	}
	


}