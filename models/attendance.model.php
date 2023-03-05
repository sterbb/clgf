<?php
date_default_timezone_set('Asia/Manila');
require_once "connection.php";


class  ModelAttendance{

    static public function mdlAddAttendance($data){
        $db = new Connection();
		$pdo = $db->connect();



        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();


            $attendance_id = (new Connection)->connect()->prepare("SELECT CONCAT(LPAD((count(id)+1),4,'0')) as gen_id  FROM attendance FOR UPDATE");


            $attendance_id->execute();
		    $attendanceid = $attendance_id -> fetchAll(PDO::FETCH_ASSOC);

			$attendancecode = "SF" . $attendanceid[0]["gen_id"] . date("Y");

			// attendance 
			$stmt = $pdo->prepare("INSERT INTO attendance(attendanceid, stime, stype, sdate, attendancelist) VALUES (:attendanceid, :stime, :stype, :sdate, :attendancelist)");	

			$stmt->bindParam(":attendanceid", $attendancecode, PDO::PARAM_STR);
			$stmt->bindParam(":stime", $data["stime"], PDO::PARAM_STR);	
			$stmt->bindParam(":stype", $data["type"], PDO::PARAM_STR);	
            $stmt->bindParam(":sdate", $data["sdate"], PDO::PARAM_STR);	
            $stmt->bindParam(":attendancelist", $data["attendancelist"], PDO::PARAM_STR);
			$stmt->execute();

			$attendanceList = json_decode($data["attendancelist"]);


			//attendees
			foreach($attendanceList as $attendance){
				$attendee = $pdo->prepare("INSERT INTO attendancelist(attendanceid, memname, memid, category, astatus) VALUES (:attendanceid, :memname, :memid, :category, :astatus)");
			
				$attendee -> bindParam(":attendanceid", $attendancecode, PDO::PARAM_STR);
				$attendee -> bindParam(":memname", $attendance -> name, PDO::PARAM_STR);
				$attendee -> bindParam(":memid", $attendance -> memID, PDO::PARAM_STR);
				$attendee -> bindParam(":category", $attendance -> category, PDO::PARAM_STR);
				$attendee -> bindParam(":astatus", $attendance -> attendance, PDO::PARAM_STR);
				$attendee->execute();

			}


		    $pdo->commit();
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
    }


	static public function mdlShowAttendanceList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM attendance ORDER BY sdate ASC" );
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
		
	}


}

?>