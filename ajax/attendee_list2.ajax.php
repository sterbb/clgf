<?php
require_once "../controllers/attendee.controller.php";
require_once "../models/attendee.model.php";

class shwattendeeListTable{ 
	public function showAttendeeTable(){
		$attendee = (new ControllerAttendee)->ctrShowAttendees();
		
		if(count($attendee) == 0){
			$jsonData = '{"data":[]}';
			echo $jsonData;
			return;
		}
		$jsonData = '{
			"data":[';
				
				for($i=0; $i < count($attendee); $i++){
					$jsonData .='[
						"'.$attendee[$i]["memname"].'",
						"'.$attendee[$i]["category"].'"
					],';
					
				}
				
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 
			}';

			
		echo $jsonData;
	}
}

$showattendees= new shwattendeeListTable();
$showattendees -> showAttendeeTable();