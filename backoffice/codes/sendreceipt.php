<?php
session_start();
require('../includes/connect.php');
// require_once '/student/includes/functions.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['sendreceipt'])) {

    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');


    try {
        $OR = htmlspecialchars(trim($_POST['OrNum']));
        $AR = htmlspecialchars(trim($_POST['ArNum']));


        if (!isset($_POST['OrNum'])) {
            $OR = "NA";
        } elseif (!isset($_POST['ArNum'])) {
            $AR = "NA";
        } else {
            $OR = htmlspecialchars(trim($_POST['OrNum']));
            $AR = htmlspecialchars(trim($_POST['ArNum']));
        }


        $pv_ID = $_POST['pv_ID'];


        $remarks = htmlspecialchars(trim($_POST['Remarks']));
        $email = $_POST['txtemail'];
        $name = $_POST['txtname'];


        //update payment status
        $sql = "Update paymentverif set payment_status=?, OR_num=?, AR_num=?, remarks=?, date_completed=? where pv_ID=? ";
        $data = array('Verified', $OR, $AR, $remarks, $date, $pv_ID);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);

        $mailTo = $email;

        $body = "Hi Ma'am/Sir,<br><br>

        Please see attached advance copy of Official Receipt for your reference.<br><br>
        
        You may get the Original Copy at CSTA Cashier Monday to Friday 9am-4pm. <br><br>
        
        Thank You & Keep Safe.<br><br>
        
    
        ";

        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "../includes/smtp_config.php";

        $mail->setFrom("CSTA@sampleemail.com"); // insert department email here
        $mail->FromName = "CSTA Accounting"; // employee name + Department 
        $mail->addAddress($mailTo, $name); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Receipt"; // email subject
        $mail->Body = $body;


        //attachments
        foreach ($_FILES["OReceipt"]["name"] as $k => $v) {
            $mail->AddAttachment($_FILES["OReceipt"]["tmp_name"][$k], $_FILES["OReceipt"]["name"][$k]);
        }

        if (!$mail->send()) {
            // echo "<Email Not Sent: " . $mail->ErrorInfo;
            $_SESSION['status'] = "Receipt Not Sent!";
            $_SESSION['status_code'] = "error";
            header('location:../for-receipt-issuance.php');
        } else {

            $_SESSION['status'] = "Receipt Sent!";
            $_SESSION['status_code'] = "success";
            header('location:../for-receipt-issuance.php');
        }
        $mail->smtpClose();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
