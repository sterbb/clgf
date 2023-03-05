<?php
// 




require '../extensions/PHPMailer/src/Exception.php';
require '../extensions/PHPMailer/src/PHPMailer.php';
require '../extensions/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    $attendance = $_POST['attendancelist'];
    $attendanceList = json_decode($attendance);

    $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'testclgf@gmail.com';
        $mail->Password = "hggcmqxkxorglsrr";
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

    foreach($attendanceList as $key =>$value){
        $info = array();
        foreach($value as $k =>$v){
            
            $info[]= $v;
        }

        if($info[3] != 1){
            $mail->clearAddresses();
            $mail-> setFrom('testclgf@gmail.com');
            $mail->addAddress($info[4]);
            $mail->isHTML(true);
            $mail->Subject ="test Email";
            $mail->Body = 'Hello '. $info[1]." \n\n Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus voluptatem illum quo rerum rem ut doloremque, eaque ipsum omnis, adipisci ratione atque labore nostrum expedita amet. Dolorem, sunt? Iusto, accusantium?";
            $mail->send();
        }
   
    }


?>