<?php
session_start();
require_once 'includes/connect.php';
require_once 'includes/fetchcurrentsyandsem.php';
require("mailer/PHPMailer/src/PHPMailer.php");
require("mailer/PHPMailer/src/SMTP.php");
require("mailer/PHPMailer/src/Exception.php");
date_default_timezone_set("Etc/GMT-8");

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit'])) {

    $id = $_POST['gradereq_id'];
    $sid = $_POST['sid'];
   // $dateassessed=date("m-d-y");


    //$updateyrlevel = $_POST['upyrlvl'];
    $note = $_POST['assessnotes'];

    $file = "grades/" . basename($_FILES['attachment']['name']);
    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $file)) {
       // $msg = "";
    } else {
       // $msg = "Please check your attachment";
    }


    try {
        $sql = "select * from vwstudents where id=?";
        $data = array($sid); // insert student id here
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch();

        //fetch student data for email purposes
        //$sid = $row['id'];
        $fullname = $row['fname'] . ' ' . $row['mname'] . '' . ' ' . $row['lname'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = strtolower($row['completeaddress']);
        $region = $row['region'];
        $snum = $row['snum'];
        $bday = $row['bday'];
        $gender = $row['gender'];
        $username = $row['username'];
        $yrlevel = $row['yrlevel'];
        $course = $row['course'];
        $guardian = $row['guardian'];
        $guardiancontact = $row['guardiancontact'];


        //update grade request status
        $sql1 = "Update gradereq set status='Sent' where gradereq_ID=?" ;
        $data1 = array($id);
        $stmt1 = $con->prepare($sql1);
        $stmt1->execute($data1);

        $_SESSION['status'] = "Grades Sent!";
        $_SESSION['status_code'] = "success";
        header('location:reqgrades.php');

    } catch (PDOException $e) {
        $e->getMessage();
    }


    $mailTo = $email;

    if ($gender == "Male") {
        $honorific = "Mr.";
    } else {
        $honorific = "Ms.";
    }

    $body = "Good Day Teresian!<br><br>
    Attached is a copy of your grades for the ".$currentsemval." of the
     Academic Year ".$currentsyval." as requested<br><br>Thank you.";

    $mail = new PHPMailer();

    //$mail->SMTPDebug = 3;
    $mail->isSMTP();

    //SMTP user credentials
    $mail->Host = "smtp-relay.sendinblue.com";
    $mail->SMTPAuth = true;
    $mail->Username = "jasonwafuu@gmail.com";
    $mail->Password = "whxz2btTErLDGyjI";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";

    $mail->setFrom("CSTA@sampleemail.com"); // insert department email here
    $mail->FromName = "CSTA Registrar"; // employee name + Department 
    $mail->addAddress($mailTo, $fname . ' ' . $lname); // recipient
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    $mail->isHTML(true);
    $mail->Subject = "GRADES: FOR RELEASING"; // email subject
    $mail->Body = $body;

    $mail->addAttachment(path: "$file", name: "Grades_{$lname}'.pdf'");

    //$mail->AltBody="";


    if (!$mail->send()) {
        echo "Email Not Sent: " . $mail->ErrorInfo;
    } else {
       
        $_SESSION['status'] = "Grades Sent!";
        $_SESSION['status_code'] = "success";
        header('location:reqgrades.php');
    }

    $mail->smtpClose();
}
