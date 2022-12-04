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
        //$reqdoc_ID=$_POST['reqdoc_id'];

        $statement = $con->prepare("Delete from students WHERE id=?");

        $data = array($id);
        $result = $statement->execute($data);


        $mailTo = $email;

        $body = "Good Day Teresian!<br><br>

        We are sorry to inform you that we declined your request to register for the following reasons: <br><br>
        
        *".$reason." <br><br>

        If you think this was a mistake, Please register again and make sure all information are correct.<br><br>

        Thank You & Keep Safe.<br><br>
        
    
        ";

        $body =
        "<pre style='font-family:times new roman;'>
         Dear ".$fullname."  
         We are sorry to inform you that we declined your request to register for the following reasons: 
        
        *".$reason." 

        If you think this was a mistake, Please register again and make sure all information are correct.

        Thank You & Keep Safe.
 
         Regards, 
         CSTA Student Portal
  
        </pre>";



        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "../includes/smtp_config.php";

        $mail->setFrom($useremail); // insert department email here
        $mail->FromName = $empname; // employee name + Department 
        $mail->addAddress($mailTo, $fullname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Account Registration Declined"; // email subject
        $mail->Body = $body;

        $mail->send();
        $mail->smtpClose();
    }
}

//fetch 
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM vwstudents where id=? and isAccepted=? LIMIT 1");
    $data = array($id, 0);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['id'];
        $output['fullname'] = $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'];
        $output['email'] = $row['email'];
    }
    echo json_encode($output);
}
