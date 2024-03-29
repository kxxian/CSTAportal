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
    $sid = $_POST['sid'];
    $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));
    $email = htmlspecialchars(trim($_POST['email']));

    //Acknowledge
    $statement = $con->prepare("UPDATE tbldocureq set status=? WHERE reqdoc_ID=?");
    $data = array('Acknowledged', $id);
    $result = $statement->execute($data);

    //Send Clearance Request to Accounting
    $statement2 = $con->prepare("INSERT into clearance (sid,reqdoc_ID) values(?,?)");
    $data2 = array($sid, $id);
    $result2 = $statement2->execute($data2);


    //insert notification
    $notif = "Your request of document is received..";
    $icon = "fas fa-thumbs-up text-white";
    $link = "enrollment.php";
    $color = "bg-success";

    $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
    $data2 = array($sid, $notif, $icon, $color, $link, $date);
    $stmt2 = $con->prepare($sql2);
    $stmt2->execute($data2);


    $body =
        "<pre style='font-family:times new roman;'>
         Dear ".$fullname."  
            We have received your request. Post-clearance is now on process. 
            Kindly wait for the summary of payment. 
            Thank you & Keep Safe 
 
         Regards, 
         CSTA Student Portal
  
        </pre>";

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
