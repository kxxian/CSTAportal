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

    if ($_POST["operation"] == "ack") {
        $id = $_POST['pv_ID'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));
        $email = htmlspecialchars(trim($_POST['email']));

        $statement = $con->prepare("UPDATE paymentverif set payment_status=? WHERE pv_ID=?");

        $data = array('Received', $id);
        $result = $statement->execute($data);


        $body =
            "
        Hi Ma'am / Sir, <br><br>

        Your payment is duly noted, we shall update you once verified.<br><br>

        Thank you & Keep Safe
        
        
        ";

        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "../includes/smtp_config.php";

        $mail->setFrom($deptemail); // insert department email here
        $mail->FromName = "CSTA Accounting"; // employee name + Department 
        $mail->addAddress($email, $fullname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Payment Acknowledged"; // email subject
        $mail->Body = $body;


       $mail->send();
           
        $mail->smtpClose();
    }
}

//fetch 
if (isset($_POST['payment_id'])) {
    $id = $_POST['payment_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM vwpayverif where pv_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['pv_ID'];
        // $output['fullname'] = $row['lname'].', '.$row['fname'].' '.$row['mname'];
        // $output['email'] = $row['email'];
        $output['date_sent'] = $row['date_sent'];
        $output['sent_via'] = $row['sentvia'];
        $output['pay'] = $row['paymethod'];
        $output['dop'] = $row['date_paid'];
        $output['top'] = $row['time_paid'];
        $output['term'] = $row['term'];
        $output['sysem'] =  '(' . $row['semester'] . ' of ' . $row['schoolyr'] . ')';
        $output['tfee'] = $row['tfeepayment'];
        $output['part'] = $row['particulars'];
        $output['ptotal'] = $row['particulars_total'];
        $output['gtotal'] = $row['gtotal'];
        $output['amtpaid'] = $row['amtpaid'];
        $output['email'] = $row['email'];
        $output['fullname'] = $row['lname'].', '.$row['fname'].' '.$row['mname'];
    }
    echo json_encode($output);
}
