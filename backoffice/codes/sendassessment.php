<?php
session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'fetchcurrentsyandsem.php';
require_once 'functions.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

// current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d H:i:s');


if (isset($_POST['operation'])) {

   
    if ($_POST["operation"] == "Send") {
        $id = $_POST['enroll_id'];
        $sid = $_POST['sid'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));

        $email = htmlspecialchars(trim($_POST['email']));

        $statement = $con->prepare("UPDATE enrollment set enrollment_status=? WHERE enrollment_ID=?");
        $data = array('Waiting Payment', $id);
        $result = $statement->execute($data);


        //insert notification
        $notif = "Your assessment form is sent to your email. You can send your proof of payment here.";
        $icon = "fas fa-check text-white";
        $link = "payverif.php";
        $color="bg-success";

       
         $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
         $data2 = array($sid, $notif, $icon, $color, $link, $date);
         $stmt2 = $con->prepare($sql2);
         $stmt2->execute($data2);


        $mailTo = $email;

        $body = "Good Day Teresian!<br><br>

        Here's a copy of the <b>assessment form</b>. Minimum down payment is Php. 3,000.00. 
        Payment can be made thru Bank Deposit or Online Bank Transfer. Kindly send your proof of payment together with your assessment form to <a href='https://cstaportaltest.online/payverif.php'>https://cstaportaltest.online/payverif.php</a> for
        verification and Official Receipt purposes.


        ";


        $body =
        "<pre style='font-family:times new roman;'>
        Dear ".$fullname."  
            Here's a copy of the <b>assessment form</b>. Minimum down payment is Php. 3,000.00.
            Payments can be made thru Bank Deposit or Online Bank Transfer. Kindly send your proof of payment together with your assessment form to 
            <a href='https://cstaportaltest.online/payverif.php'>https://cstaportaltest.online/payverif.php</a> for
            verification and Official Receipt purposes.
        
        
         Regards, 
         CSTA Student Portal
  
        </pre>";

        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "../includes/smtp_config.php";

        $mail->setFrom($deptemail); // insert department email here
        $mail->FromName = $dept; // employee name + Department 
        $mail->addAddress($mailTo, $fullname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Assessment for $currentsemval A.Y. $currentsyval"; // email subject
        $mail->Body = '<pre>'.$body.'</pre>';


        //attachments
        foreach ($_FILES["attachment"]["name"] as $k => $v) {
            $mail->AddAttachment($_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k]);
        }

        $mail->send();
        $mail->smtpClose();
    }
}

//fetch 
if (isset($_POST['enroll_id'])) {
    $id = $_POST['enroll_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM vwforenrollment_students where enrollment_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['enrollment_ID'];
        $output['fullname'] = $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'];
        $output['email'] = $row['email'];
    }
    echo json_encode($output);
}


//return request
if (isset($_POST['return_assess'])) {
    $assess_id=$_POST['assess_id'];
    $fullname=$_POST['return_fullname'];
    $email=$_POST['return_email'];
    $remarks=$_POST['return_message'];


    $statement = $con->prepare("UPDATE enrollment set enrollment_status=?, remarks=? WHERE enrollment_ID=?");
    $data = array('Returned',$remarks, $assess_id);
    $result = $statement->execute($data);


    $_SESSION['status'] = "Success!";
    $_SESSION['msg'] = "Request Returned!";
    $_SESSION['status_code'] = "success";
    header('location:assessments.php');





}
