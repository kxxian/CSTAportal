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

    $id = $_POST['enroll_id'];
    $sid = $_POST['sid'];
    $date=date("m-d-y");
   // $dateassessed="Assessed {$date}";   
    // $or="Enrolled {$date}";
    $pv="Verified {$date}";
    $or="Complete! {$date}";

    //$note = $_POST['assessnotes'];

    $file = "attachments/" . basename($_FILES['attachment']['name']);
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


        // enrollment status
        $sql1 = "Update enrollment set date_pverif=?, date_or=?, enrollment_status=? where enrollment_ID=?";
        $data1 = array($pv, $or, 'Enrolled', $id);
        $stmt1 = $con->prepare($sql1);
        $stmt1->execute($data1);

       
        $_SESSION['status'] = "Registration Form Sent!";
        $_SESSION['status_code'] = "success";
        header('location:assessed-students.php');

    } catch (PDOException $e) {
        $e->getMessage();
    }


    $mailTo = $email;

  
    $body = "Welcome Teresian!<br><br>

    Congratulations you are Officially Enrolled, You have completed your enrollment for the ".$currentsemval." of A.Y. ".$currentsyval.". <br><br>
    
    Attached herewith is your soft copy of your Registration Form.<br><br>
    
    Thank you.<br><br>";

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
    $mail->Subject = "CONFIRMATION OF ENROLLMENT"; // email subject
    $mail->Body = $body;

    $mail->addAttachment(path: "$file", name: "regform_{$lname}'.jpg'");

    //$mail->AltBody="";


    if (!$mail->send()) {
        echo "Email Not Sent: " . $mail->ErrorInfo;
    } else {
       
        // $_SESSION['status'] = "Registration Form Sent!";
        // $_SESSION['status_code'] = "success";
        // header('location:assessed-students.php');
    }

    $mail->smtpClose();
}
