<?php
session_start();
require_once '../includes/connect.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");


use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['email_data'])) {

        try {
                foreach ($_POST['email_data'] as $row) {
                        $ids = $row['id'];
                        $email = $row['email'];
                        $name = $row['name'];

                        $sql = "UPDATE paymentverif set payment_status=? where pv_ID IN ({$ids});";
                        $data = array("Received");
                        $stmt = $con->prepare($sql);
                        $stmt->execute($data);


                        //email
                        $mailTo = $email;
                        $body =
                                "
                                Hi Ma'am / Sir, <br><br>
        
                                Your payment is duly noted, we shall update you once verified.<br><br>
        
                                Thank you & Keep Safe
                                
                                
                                ";
                        $mail = new PHPMailer();

                        // $mail->SMTPDebug = 3;
                        $mail->isSMTP();

                        // smtp user credentials

                        include '../includes/smtp_config.php';

                        $mail->setFrom("CSTA_Accounting@sampleemail.com"); // insert department email here
                        $mail->FromName = "CSTA Accounting"; // employee name + Department 
                        $mail->addAddress($email, $name); // recipient
                        $mail->wordwrap = 50;
                        $mail->SMTPOptions = array('ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => false
                        ));
                        $mail->isHTML(true);
                        $mail->Subject = "Payment Received"; // email subject
                        $mail->Body = $body;


                        // $mail->addAttachment(path: "$file", name: "Grades_{$lname}'.jpg'");

                        $mail->AltBody = "";

                        $result = $mail->send();

                        $mail->smtpClose();
                }
        } catch (PDOException $e) {
                echo $e->getMessage();
        }
}


else if (isset($_POST['acknowledge'])) {
        $pv_id = $_POST['pv_id'];
        $email =  $_POST['txtemail'];
        $name = $_POST['txtName'];



        try {
                $sql = "UPDATE paymentverif set payment_status=? where pv_ID=?";
                $data = array("Received", $pv_id);
                $stmt = $con->prepare($sql);
                $stmt->execute($data);


                //email
                $mailTo = $email;
                $body =
                        "
                        Hi Ma'am / Sir, <br><br>

                        Your payment is duly noted, we shall update you once verified.<br><br>

                        Thank you & Keep Safe
                        
                        
                        ";
                $mail = new PHPMailer();

                // $mail->SMTPDebug = 3;
                $mail->isSMTP();

                // smtp user credentials

                include '../includes/smtp_config.php';

                $mail->setFrom("CSTA_Accounting@sampleemail.com"); // insert department email here
                $mail->FromName = "CSTA Accounting"; // employee name + Department 
                $mail->addAddress($email, $name); // recipient
                $mail->wordwrap = 50;
                $mail->SMTPOptions = array('ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => false
                ));
                $mail->isHTML(true);
                $mail->Subject = "Payment Received"; // email subject
                $mail->Body = $body;

                // $mail->addAttachment(path: "$file", name: "Grades_{$lname}'.jpg'");

                $mail->AltBody = "";

             

                if (!$mail->send()) {
                        echo "Email Not Sent: " . $mail->ErrorInfo;
                } else {

                        $_SESSION['status'] = "Payment Acknowledged!";
                        $_SESSION['status_code'] = "success";
                        header('location: ../pending-payments.php');
                }

                $mail->smtpClose();
        } catch (PDOException $e) {
                echo $e->getMessage();
        }
}
