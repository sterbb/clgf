<?php

require_once "connection.php";
class ModelReport{
	static public function mdlShowAttendanceReport($date1, $date2, $adult, $hype, $kaya, $jkids){ 
        $db = new Connection();
		$pdo = $db->connect();

        
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            if($date2 != ''){
                $daterange = "WHERE sdate BETWEEN '$date1' AND '$date2' ";
            }else{
                $daterange = "WHERE sdate = '$date1' ";
            }
    
            $whereclause = $daterange;

            $stmt = (new Connection)->connect()->prepare("SELECT * FROM attendance  $whereclause ORDER BY sdate ASC" );
            $stmt -> execute();
            $result = $stmt -> fetchAll();


            $answer = array();

            $adult_status;
            $hype_status;
            $jkids_status;
            $kaya_status;

            $nhype = "hype";
            $nadult = "adults";
            $njkids = "jkids";
            $nkaya = "kaya";

            $c_array = array();
            

            if($adult == "true"){
                $adult_status = " (category = '$nadult')";
                array_push($c_array, $adult_status);
            }else{
                $adult_status = "";
            }

            if($hype == "true"){
                $hype_status = "(category = '$nhype')";
                array_push($c_array, $hype_status);
            }else{
                $hype_status = "";
            }

            if($jkids == "true"){
                $jkids_status = "(category = '$njkids')";
                array_push($c_array, $jkids_status);
            }else{
                $jkids_status = "";
            }

            if($kaya == "true"){
                $kaya_status = "(category = '$nkaya')";
                array_push($c_array, $kaya_status);
            }else{
                $kaya_status = "";
            }

            $insideclause = "";




            if($adult_status == "" && $hype_status == "" && $kaya_status == "" && $jkids_status == ""){
                $whereclause2 = "";
            }else{
                for($i = 0; $i < count($c_array); $i++){
                    if($i == 0){
                        $insideclause = $insideclause . $c_array[$i];
                    }else{
                        $insideclause = $insideclause . "OR" . $c_array[$i];
                    }
                }
                $whereclause2 = "AND (" . $insideclause . ")";
            }

            //$whereclause2 = $adult_status . $hype_status . $kaya_status . $jkids_status;

            foreach($result as $row){
                $attid = $row["attendanceid"];
                $attdate = $row["sdate"];
                $atttype = $row["stype"];
                
                $att_status = "1";

                $stmt2 = (new Connection)->connect()->prepare("SELECT * FROM attendancelist  WHERE attendanceid = :attendanceid  $whereclause2 AND astatus = :astatus");
                $stmt2 -> bindParam(":attendanceid", $attid, PDO::PARAM_STR);
                $stmt2 -> bindParam(":astatus", $att_status, PDO::PARAM_STR);
                $stmt2 -> execute();
                $result2= $stmt2 -> fetchAll();
                array_push($result2, $atttype);
                array_push($result2, $attdate);
                array_push($result2, $attid);

                array_push($answer, $result2);


                
            }

            return $answer;


        

		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	

  

	}

}