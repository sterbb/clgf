<?php
require_once "connection.php";

// Set the session cookie to expire when the browser is closed
session_set_cookie_params(0);
session_start();




class ModelLogin{
    private $username;
    private $password;

	public function Login($data){
		$db = new Connection();
		$pdo = $db->connect();

		try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
	
			$stmt = $pdo->prepare("SELECT username, password,name,access,accID, acc_status, acc_log	 FROM accounts WHERE username = :username");
			$stmt -> bindParam(":username", $data['username'], PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetchAll();

			// $ipconfig =   shell_exec ("ipconfig/all");  
			$mac = explode('Physical Address. . . . . . . . .',shell_exec ("ipconfig/all"));  
			$mac1 = explode(':',$mac[1]);  
			$macaddress = explode(' ',$mac1[1]);
			$macAddress = trim(strval($macaddress[1]));
			  
			$stmt1 = $pdo->prepare("SELECT * FROM devices WHERE macAddress = :macAddress");
			$stmt1 -> bindParam(":macAddress", $macAddress, PDO::PARAM_STR);
			$stmt1->execute();
			$result1 = $stmt1->fetchAll(PDO::FETCH_NUM);

				foreach($result as $row){
					$allowed;
					$acc_status = $row['acc_status'];
					$accID = $row["accID"];	
					$currentlog = $row["acc_log"];
					$active = "active"; 

						//check if device is allowed to access
						foreach($result1 as $row1){
							if($row1[1] == $macAddress ){
								$allowed = "true";
							}

						}
						
						//if user accedintally exit the browser or closing the tab without logging out
						if($currentlog == $macAddress && $acc_status == $active){
							$acc_status = "inactive";	
						}

						//check if password is correct, account is not yet login, and if the device is allowed
						if($result && (password_verify($data['password'], $row["password"])) && ($acc_status != $active) && $allowed == "true"){
							echo '<script language="javascript">';
							echo 'alert("message successfully sent")';
							echo '</script>';

			
							$accstat = $pdo->prepare("UPDATE accounts SET acc_status = :acc_status, acc_log = :acc_log WHERE accID = :accID");
							$accstat -> bindParam(":acc_status", $active, PDO::PARAM_STR);
							$accstat -> bindParam(":accID", $row["accID"], PDO::PARAM_STR);
							$accstat -> bindParam(":acc_log", $macAddress, PDO::PARAM_STR);
							$accstat->execute();

							$_SESSION["name"] = $row['name'];	
							$_SESSION["access"] = $row["access"];
							$_SESSION['accID'] = $row["accID"];
							$_SESSION['acc_log'] = $macAddress;
							$_SESSION['allowed'] = "allowed";
							


							$pdo->commit();
							return "ok";
						
							
			
						}elseif($result && (password_verify($data['password'], $row["password"])) && ($acc_status != $active) && $allowed != "true"){
							$false = "false";
							$_SESSION["name"] = $row['name'];
							$_SESSION["allowed"] = $false;
							$pdo->commit();
							return "ok";
							 

						}
				}
			

			
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
			

	
	}

}