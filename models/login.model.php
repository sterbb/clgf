<?php
require_once "connection.php";

session_set_cookie_params(0);
session_start();

// Set the session cookie to expire when the browser is closed


class ModelLogin{
    private $username;
    private $password;

	public function Login($data){
		$db = new Connection();
		$pdo = $db->connect();

		try{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
	
			$stmt = $pdo->prepare("SELECT username, password,name,access,accID, acc_status	 FROM accounts WHERE username = :username");
			$stmt -> bindParam(":username", $data['username'], PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetchAll();
			
	
		
			
			if(!$result){
				echo"<style>.errorLogin{visibility:visible;}</style>";
				echo"invalid";
						
			}else{
				foreach($result as $row){
						$acc_status = $row['acc_status'];
						$accID = $row["accID"];
						$active = "active";
					if($result && (password_verify($data['password'], $row["password"])) && ($acc_status != $active)){
						echo '<script language="javascript">';
						echo 'alert("message successfully sent")';
						echo '</script>';

						$accstat = $pdo->prepare("UPDATE accounts SET acc_status = :acc_status WHERE accID = :accID");
						$accstat -> bindParam(":acc_status", $active, PDO::PARAM_STR);
						$accstat -> bindParam(":accID", $row["accID"], PDO::PARAM_STR);
						$accstat->execute();

						$_SESSION["name"] = $row["name"];	
						$_SESSION["access"] = $row["access"];
						$_SESSION['accID'] = $row["accID"];

						
						

						$pdo->commit();
						return "ok";
						
					

					
					
					}else{
						echo"invalid";
						echo"<style>.errorLogin{visibility:visible;}</style>";

					}
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