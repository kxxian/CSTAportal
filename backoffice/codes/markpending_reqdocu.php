<?php
session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['operation'])) {

    if ($_POST["operation"] == "Send") {
        $id = $_POST['id'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));
        $email = htmlspecialchars(trim($_POST['email']));
        $reason= ucwords(htmlspecialchars(trim($_POST['reason'])));
        $reqdoc_ID=$_POST['reqdoc_ID'];


        //mark request document as pending
        $statement = $con->prepare("Delete from clearance WHERE clr_ID=?");
        $data = array($id);
        $result = $statement->execute($data);

        //mark request document as pending
        $statement1= $con->prepare("UPDATE tbldocureq set status=? WHERE reqdoc_ID=?");
        $data1 = array("Pending",$reqdoc_ID);
        $result1= $statement1->execute($data1);


        $mailTo = $email;


        $body =
        "<pre style='font-family:times new roman;'>
         Dear ".$fullname."  
         Your request of documents is marked pending due to the following reasons:
        
         *".$reason."
 
         Please settle all your deficiencies to proceed with your request.
 
         Thank You & Keep Safe
 
         Regards, 
         CSTA Student Portal
  
        </pre>";


        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "../includes/smtp_config.php";

        $mail->setFrom(""); // insert department email here
        $mail->FromName = "CSTA Student Portal"; // employee name + Department 
        $mail->addAddress($mailTo, $fullname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Request Marked as Pending"; // email subject
        $mail->Body = $body;

        $mail->send();
        $mail->smtpClose();
    }
}

//fetch 
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM clearance where clr_ID=?  LIMIT 1");
    $data = array($id);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['reqdoc_ID'] = $row['reqdoc_ID'];
       
    }
    echo json_encode($output);
}
