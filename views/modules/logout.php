<?php
require_once "models/connection.php";

if(true){

        $db = new Connection();
		$pdo = $db->connect();

        $inactive = "inactive";

        $accstat = $pdo->prepare("UPDATE accounts SET acc_status = :acc_status WHERE accID = :accID");
        $accstat -> bindParam(":acc_status", $inactive, PDO::PARAM_STR);
        $accstat -> bindParam(":accID", $_SESSION["accID"], PDO::PARAM_STR);
        $accstat->execute();


		
		$pdo = null;	
		$stmt = null;
			
        session_destroy();
        session_unset();
        echo "<script>window.location.href='members'</script>";
}
?>