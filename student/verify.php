<?php
session_start();
require_once('includes/connect.php');

require("mailer/PHPMailer/src/PHPMailer.php");
require("mailer/PHPMailer/src/SMTP.php");
require("mailer/PHPMailer/src/Exception.php");


use PHPMailer\PHPMailer\PHPMailer;

//Verification process
if (isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];

    $sql = "SELECT lname, fname, email,vkey,status,isAccepted from students where vkey=? AND status=? LIMIT 1";
    $data = array($vkey, 'Pending');
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    $count = $stmt->rowCount();
    $row = $stmt->fetch();

    $email=$row['email'];
    $lname=$row['lname'];
    $fname=$row['fname'];

    //Verify the student with same vkey
    if ($count == 1) {
        $update = "UPDATE students set status=?, isAccepted=? where vkey=? LIMIT 1";
        $data = array('Verified', '0', $vkey);
        $stmt = $con->prepare($update);
        $stmt->execute($data);


        ##email

        $mailTo = $email;

        $body = "Good Day Teresian!<br><br>
        You have successfully verified your email address. <br><br>
        
        Please be patient as we validate your registration.<br>
        

        <br>
        Thank you. ";

        $mail = new PHPMailer();

        //$mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "includes/smtp_config.php";

        //$mail->setFrom(""); // insert department email here
        $mail->FromName = "CSTA Student Portal"; // employee name + Department 
        $mail->addAddress($mailTo, $fname . ' ' . $lname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Email Address Verified"; // email subject
        $mail->Body = $body;



        if (!$mail->send()) {
            echo "Email Not Sent: " . $mail->ErrorInfo;
        } else {
       
            // header("Location:login.php");
            // $_SESSION['status'] = "Success!";
            // $_SESSION['msg'] = "Email Address Verified!";
            // $_SESSION['status_code'] = "success";
        }


        $mail->smtpClose();

        if ($update) {
            //echo "Account Verified";
            header("Location:login.php");
            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Email Address Verified!";
            $_SESSION['status_code'] = "success";
        }
    } else {
        header("Location:login.php");
        $_SESSION['status'] = "Oops!";
        $_SESSION['msg'] = "Invalid link!";
        $_SESSION['status_code'] = "warning";
    }
} else {
    header("Location:login.php");
    // $_SESSION['status'] = "Something went wrong. Please try again!";
    // $_SESSION['status_code'] = "error";
}
