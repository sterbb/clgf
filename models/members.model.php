<?php

require_once "connection.php";

class ModelMembers{

    static public function mdlAddMember($data){
		$db = new Connection();
		$pdo = $db->connect();


        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();



			if($data['category'] == 'JKIDS'){
				$mem_id = (new Connection)->connect()->prepare("SELECT CONCAT('JKIDS', LPAD((count(id)+1),4,'0')) as gen_id  FROM members FOR UPDATE");

			}elseif($data['category'] == 'HYPE'){
				$mem_id = (new Connection)->connect()->prepare("SELECT CONCAT('HYPE', LPAD((count(id)+1),4,'0')) as gen_id  FROM members FOR UPDATE");
	
			}elseif($data['category'] == 'KAYA'){
				$mem_id = (new Connection)->connect()->prepare("SELECT CONCAT('KAYA', LPAD((count(id)+1),4,'0')) as gen_id  FROM members FOR UPDATE");
	
			}elseif($data['category'] == 'KC'){
				$mem_id = (new Connection)->connect()->prepare("SELECT CONCAT('KC', LPAD((count(id)+1),4,'0')) as gen_id  FROM members FOR UPDATE");
	
			}else{
				$mem_id = (new Connection)->connect()->prepare("SELECT CONCAT('ADULTS', LPAD((count(id)+1),4,'0')) as gen_id  FROM members FOR UPDATE");
			}
			

			$mem_id->execute();
			$memid = $mem_id -> fetchAll(PDO::FETCH_ASSOC);

			

			$m_initial = substr($data['mname'], 0,1);
			$full =  $data['fname']." ".$m_initial.". ".$data['lname'];

			
			$stmt = $pdo->prepare("INSERT INTO members (fullname, memID, fname, mname, lname, suffix, category, cstats, civilstats, age, dob, gender, email, phone) VALUES (:fullname, :memID, :fname, :mname, :lname, :suffix, :category, :cstats, :civilstats, :age, :dob, :gender, :email, :phone)");

			$stmt->bindParam(":fullname", $full, PDO::PARAM_STR);
			$stmt->bindParam(":memID", $memid[0]['gen_id'], PDO::PARAM_STR);
			$stmt->bindParam(":fname", $data["fname"], PDO::PARAM_STR);
			$stmt->bindParam(":mname", $data["mname"], PDO::PARAM_STR);
			$stmt->bindParam(":lname", $data["lname"], PDO::PARAM_STR);
			$stmt->bindParam(":suffix", $data["suffix"], PDO::PARAM_STR);
			$stmt->bindParam(":category", $data["category"], PDO::PARAM_STR);
			$stmt->bindParam(":cstats", $data["cstats"], PDO::PARAM_STR);
			$stmt->bindParam(":civilstats", $data["civilstats"], PDO::PARAM_STR);
			$stmt->bindParam(":age", $data["age"], PDO::PARAM_STR);
			$stmt->bindParam(":dob", $data["dob"], PDO::PARAM_STR);
			$stmt->bindParam(":gender", $data["gender"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
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

	static public function mdlEditMember($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$stmt = $pdo->prepare("UPDATE members SET fullname= :fullname, fname = :fname, mname = :mname, lname = :lname, suffix = :suffix, category = :category, cstats = :cstats, civilstats = :civilstats, age = :age, dob = :dob,  gender = :gender, email = :email, phone = :phone WHERE memID = :memID");

			$m_initial = substr($data['mname'], 0,1);
			$full =  $data['fname']." ".$m_initial.". ".$data['lname'];
			$stmt->bindParam(":memID", $data["memID"], PDO::PARAM_STR);
			$stmt->bindParam(":fname", $data["fname"], PDO::PARAM_STR);
			$stmt->bindParam(":mname", $data["mname"], PDO::PARAM_STR);
			$stmt->bindParam(":lname", $data["lname"], PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $full, PDO::PARAM_STR);
			$stmt->bindParam(":suffix", $data["suffix"], PDO::PARAM_STR);
			$stmt->bindParam(":category", $data["category"], PDO::PARAM_STR);
			$stmt->bindParam(":cstats", $data["cstats"], PDO::PARAM_STR);
			$stmt->bindParam(":civilstats", $data["civilstats"], PDO::PARAM_STR);
			$stmt->bindParam(":age", $data["age"], PDO::PARAM_STR);
			$stmt->bindParam(":dob", $data["dob"], PDO::PARAM_STR);
			$stmt->bindParam(":gender", $data["gender"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
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


	static public function mdlShowMemberList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM members ORDER BY fname");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlShowRegularMemberList(){
		$regular = "Regular";
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM members WHERE cstats = :cstats ORDER BY fname");
		$stmt->bindParam(":cstats", $regular, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlShowMember($item, $value){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM members WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}		

	static public function mdlShowSpecMember($category){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM members WHERE category = :cat ORDER BY fname");
		$stmt -> bindParam(":cat", $category, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

}

?>