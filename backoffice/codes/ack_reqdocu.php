<?php
session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

    if ($_POST["id"]) {
        $id = $_POST['id'];
        $sid= $_POST['sid'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));
        $email = htmlspecialchars(trim($_POST['email']));
       
        //Acknowledge
        $statement = $con->prepare("UPDATE tbldocureq set status=? WHERE reqdoc_ID=?");
        $data = array('Acknowledged',$id);
        $result = $statement->execute($data);

        //Send Clearance Request to Accounting
        $statement2 = $con->prepare("INSERT into clearance (sid,reqdoc_ID) values(?,?)");
        $data2 = array($sid,$id);
        $result2 = $statement2->execute($data2);

        $body =
        "
        Good day Teresian! <br><br>

        We received your request, post-clearance is now on Process. <br><br>
        Kindly wait for the summary of payment. <br><br>
        Thank you & Keep Safe <br><br>

        $empname<br>
        $position        
        
        ";

        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "../includes/smtp_config.php";

        //$mail->setFrom($empname); // insert department email here
        $mail->FromName = "CSTA Student Portal"; // employee name + Department 
        $mail->addAddress($email, $fullname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Request Acknowledged"; // email subject
        $mail->Body = $body;
        $mail->send();

        
        $mail->smtpClose();


    }




