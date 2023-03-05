<?php

require_once "connection.php";


class ModelAttendee{

	//checking of attendance
	static public function mdlShowAttendeeList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM members ORDER BY fullname");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	//view attendees for the day
	static public function mdlShowAtteendees(){
	
		$stmt = (new Connection)->connect()->prepare("SELECT memname, category FROM attendancelist WHERE attendanceid = :attendanceid AND astatus = 1 ORDER BY memname");
		$stmt -> bindParam(":attendanceid", $_COOKIE["aid"], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

}

