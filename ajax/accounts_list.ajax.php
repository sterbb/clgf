<?php
require_once "../controllers/accounts.controller.php";
require_once "../models/accounts.model.php";

class accountsListTable{ 
	public function mdlShowAccountsList(){
		$accounts = (new ControllerAccounts)->ctrShowAccountsList();
		if(count($accounts) == 0){
			$jsonData = '{"data":[]}';
			echo $jsonData;
			return;
		}
		$jsonData = '{
			"data":[';
				for($i=0; $i < count($accounts); $i++){
					$jsonData .='[
						"'.$accounts[$i]["accID"].'",
						"'.$accounts[$i]["username"].'",
                        "'.$accounts[$i]["access"].'",
                        "'.$accounts[$i]["name"].'",
						"'.$accounts[$i]["phone"].'"
					
					
					],';
				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 
			}';
		echo $jsonData;
	}
}

$activateaccountsList = new accountsListTable();
$activateaccountsList -> mdlShowAccountsList();