<?php
require_once "../controllers/members.controller.php";
require_once "../models/members.model.php";

class memberListTable{ 
	public function showMemberListTable(){
		$member = (new ControllerMember)->ctrShowMemberList();
		if(count($member) == 0){
			$jsonData = '{"data":[]}';
			echo $jsonData;
			return;
		}
		$jsonData = '{
			"data":[';
				for($i=0; $i < count($member); $i++){
					$jsonData .='[
						"'.$member[$i]["memID"].'",
						"'.$member[$i]["fullname"].'",
						"'.$member[$i]["category"].'",
						"'.$member[$i]["cstats"].'",
						"'.$member[$i]["fname"].'",
						"'.$member[$i]["mname"].'",
						"'.$member[$i]["lname"].'",
						"'.$member[$i]["suffix"].'",
						"'.$member[$i]["civilstats"].'",
						"'.$member[$i]["age"].'",
						"'.$member[$i]["dob"].'",
						"'.$member[$i]["gender"].'",
						"'.$member[$i]["email"].'",
						"'.$member[$i]["phone"].'"
					
					
					
					],';
				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 
			}';
		echo $jsonData;
	}
}

$activatememberList = new memberListTable();
$activatememberList -> showMemberListTable();
?>