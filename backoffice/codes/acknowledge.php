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
        $id = $_POST['payment_id'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));
        $email = htmlspecialchars(trim($_POST['email']));
       
        $statement = $con->prepare("UPDATE paymentverif set payment_status=? WHERE pv_ID=?");

        $data = array('Received',$id);
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

        //$mail->setFrom($empname); // insert department email here
        $mail->FromName = $empname; // employee name + Department 
        $mail->addAddress($email, $fullname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Payment Acknowledged"; // email subject
        $mail->Body = $body;


        //attachments
        // foreach ($_FILES["attachment"]["name"] as $k => $v) {
        //     $mail->AddAttachment($_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k]);
        // }

        if (!$mail->send()) {
            // echo "<Email Not Sent: " . $mail->ErrorInfo;
            // $_SESSION['status'] = "Receipt Not Sent!";
            // $_SESSION['status_code'] = "error";
            // header('location:../for-receipt-issuance.php');
        } else {

            // $_SESSION['status'] = "Receipt Sent!";
            // $_SESSION['status_code'] = "success";
            // header('location:../for-receipt-issuance.php');
        }
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
        $output['fullname'] = $row['lname'].', '.$row['fname'].' '.$row['mname'];
        $output['email'] = $row['email'];
        $output['date'] = $row['date_paid'];
        $output['time'] = $row['time_paid'];
        $output['appsy'] = $row['schoolyr'].' '.$row['semester'];
        $output['term'] = $row['term'];
        $output['tfeeamount'] = $row['tfeepayment'];
        $output['others'] = $row['particulars'];
        $output['others_total'] = $row['particulars_total'];
        $output['paymethod'] = $row['paymethod'];
        $output['sentvia'] = $row['sentvia'];
        $output['gtotal'] = $row['amtpaid'];
        $output['note'] = $row['note'];
    }
    echo json_encode($output);
}



