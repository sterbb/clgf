<?php
require_once "connection.php";

 class ModelPayment{
    
    static public function mdlAddRegPayment($data){
        $db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$stmt = $pdo->prepare("INSERT INTO regpayments (par1, par2, par3, par4, par5, par6, cashr1, cashr2, cashr3, cashr4, cashr5, cashr6,  chand1, chand2, chand3, chand4, chand5, chand6, rbal1, rbal2, rbal3, rbal4, rbal5, rbal6, receipt1, receipt2, receipt3, receipt4, receipt5, receipt6, tcashr, tchand, tbal) VALUES (:par1, :par2, :par3, :par4, :par5, :par6, :cashr1, :cashr2, :cashr3, :cashr4, :cashr5, :cashr6, :chand1, :chand2, :chand3, :chand4, :chand5, :chand6, :rbal1, :rbal2, :rbal3, :rbal4, :rbal5, :rbal6, :receipt1, :receipt2, :receipt3, :receipt4, :receipt5, :receipt6, :tcashr, :tchand, :tbal)");

			$stmt->bindParam(":par1", $data["par1"], PDO::PARAM_STR);
            $stmt->bindParam(":par2", $data["par2"], PDO::PARAM_STR);
            $stmt->bindParam(":par3", $data["par3"], PDO::PARAM_STR);
            $stmt->bindParam(":par4", $data["par4"], PDO::PARAM_STR);
            $stmt->bindParam(":par5", $data["par5"], PDO::PARAM_STR);
            $stmt->bindParam(":par6", $data["par6"], PDO::PARAM_STR);
            $stmt->bindParam(":cashr1", $data["cashr1"], PDO::PARAM_STR);
            $stmt->bindParam(":cashr2", $data["cashr2"], PDO::PARAM_STR);
            $stmt->bindParam(":cashr3", $data["cashr3"], PDO::PARAM_STR);
            $stmt->bindParam(":cashr4", $data["cashr4"], PDO::PARAM_STR);
            $stmt->bindParam(":cashr5", $data["cashr5"], PDO::PARAM_STR);
            $stmt->bindParam(":cashr6", $data["cashr6"], PDO::PARAM_STR);
            $stmt->bindParam(":chand1", $data["chand1"], PDO::PARAM_STR);
            $stmt->bindParam(":chand2", $data["chand2"], PDO::PARAM_STR);
            $stmt->bindParam(":chand3", $data["chand3"], PDO::PARAM_STR);
            $stmt->bindParam(":chand4", $data["chand4"], PDO::PARAM_STR);
            $stmt->bindParam(":chand5", $data["chand5"], PDO::PARAM_STR);
            $stmt->bindParam(":chand6", $data["chand6"], PDO::PARAM_STR);
            $stmt->bindParam(":rbal1", $data["rbal1"], PDO::PARAM_STR);
            $stmt->bindParam(":rbal2", $data["rbal2"], PDO::PARAM_STR);
            $stmt->bindParam(":rbal3", $data["rbal3"], PDO::PARAM_STR);
            $stmt->bindParam(":rbal4", $data["rbal4"], PDO::PARAM_STR);
            $stmt->bindParam(":rbal5", $data["rbal5"], PDO::PARAM_STR);
            $stmt->bindParam(":rbal6", $data["rbal6"], PDO::PARAM_STR);
            $stmt->bindParam(":receipt1", $data["receipt1"], PDO::PARAM_STR);
            $stmt->bindParam(":receipt2", $data["receipt2"], PDO::PARAM_STR);
            $stmt->bindParam(":receipt3", $data["receipt3"], PDO::PARAM_STR);
            $stmt->bindParam(":receipt4", $data["receipt4"], PDO::PARAM_STR);
            $stmt->bindParam(":receipt5", $data["receipt5"], PDO::PARAM_STR);
            $stmt->bindParam(":receipt6", $data["receipt6"], PDO::PARAM_STR);
            $stmt->bindParam(":tcashr", $data["tcashr"], PDO::PARAM_STR);
            $stmt->bindParam(":tchand", $data["tchand"], PDO::PARAM_STR);
            $stmt->bindParam(":tbal", $data["tbal"], PDO::PARAM_STR);
	
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

    static public function mdlShowPayment(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM regpayments ORDER BY id DESC");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}


 }
?>