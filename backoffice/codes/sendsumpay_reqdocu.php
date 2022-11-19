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
        $reason = ucwords(htmlspecialchars(trim($_POST['reason'])));
        $reqdoc_ID = $_POST['reqdoc_ID'];


        //mark request document as pending
        $statement1 = $con->prepare("UPDATE tbldocureq set status=? WHERE reqdoc_ID=?");
        $data1 = array("Waiting Payment", $id);
        $result1 = $statement1->execute($data1);


        //insert notification
        $notif = "Summary of Payment for your documents is sent to your email.";
        $icon = "fas fa-envelope text-white";
        $link = "#";
        $color = "bg-success";

        $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
        $data2 = array($sid, $notif, $icon, $color, $link, $date);
        $stmt2 = $con->prepare($sql2);
        $stmt2->execute($data2);


        $mailTo = $email;

        $body = "Good Day Teresian!<br><br>

        Please see attached file of the summary of payment for your request. <br>
        Payment can be sent thru Bank Deposit or Online Bank Transfer. Kindly send your proof<br>
        of payment together with your summary of payment attached in this email to <br>
        <a href='https://cstaportaltest.online/payverif.php'>https://cstaportaltest.online/payverif.php</a> for verification and Official Receipt purposes.
      
       
    
        ";

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
        $mail->Subject = "summary of Payment"; // email subject
        $mail->Body = $body;

        //attachments

        $mail->AddAttachment($_FILES["sumpay"]["tmp_name"], "summary of payment");



        $mail->send();
        $mail->smtpClose();
    }
}

//fetch 
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM vwdocureq where reqdoc_ID=?  LIMIT 1");
    $data = array($id);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['reqdoc_ID'];
        $output['fullname'] = $row['fname'] . ' ' . $row['lname'];
        $output['email'] = $row['email'];
    }
    echo json_encode($output);
}
