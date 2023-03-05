<?php
require_once "connection.php";

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
	
			$stmt = $pdo->prepare("SELECT username, password,name,access	 FROM accounts WHERE username = :username");
			$stmt -> bindParam(":username", $data['username'], PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetchAll();
			
			if(!$result){
				echo"error";
		
			}else{
				foreach($result as $row){
					if($result && (password_verify($data['password'], $row["password"]))){
						$_SESSION["name"] = $row["name"];
						$_SESSION["access"] = $row["access"];
						
					}else{
						return false;

					}
				}
			}	

			$stmt->execute();			
	
			$pdo->commit();
			return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	

			$pdo = null;	
			$stmt = null;

	
	}

}