<?php

require_once "connection.php";

class ModelAccounts{

    static public function mdlAddAccounts($data){
		$db = new Connection();
		$pdo = $db->connect();

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->beginTransaction();
			

			if($data['access'] == 'user'){
				$acc_id = (new Connection)->connect()->prepare("SELECT CONCAT('USER', LPAD((count(id)+1),4,'0')) as gen_id  FROM accounts FOR UPDATE");

			}elseif($data['access'] == 'admin'){
				$acc_id = (new Connection)->connect()->prepare("SELECT CONCAT('ADMIN', LPAD((count(id)+1),4,'0')) as gen_id  FROM accounts FOR UPDATE");
	
			}

			$acc_id->execute();
			$accid = $acc_id -> fetchAll(PDO::FETCH_ASSOC);

			$stmt = $pdo->prepare("INSERT INTO accounts (accID, username, password, name, access, phone) VALUES (:accID, :username, :password, :name, :access, :phone)");

			$stmt->bindParam(":accID", $accid[0]['gen_id'], PDO::PARAM_STR);
			$stmt->bindParam(":username", $data["username"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
			$stmt->bindParam(":access", $data["access"], PDO::PARAM_STR);
			$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
			$stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
			



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



	static public function mdlEditAccounts($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$stmt = $pdo->prepare("UPDATE accounts SET username = :username, password = :password, access = :access, name = :name, phone = :phone WHERE accID =:accID");

			$stmt->bindParam(":accID", $data["accID"], PDO::PARAM_STR);

			$stmt->bindParam(":username", $data["username"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
			$stmt->bindParam(":access", $data["access"], PDO::PARAM_STR);
			$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
			$stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
			
	
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



	static public function mdlShowAccountsList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM accounts ORDER BY username");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlShowAccounts($item, $value){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM accounts WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}		




}