<?php
session_start();
require_once 'includes/connect.php';
require("mailer/PHPMailer/src/PHPMailer.php");
require("mailer/PHPMailer/src/SMTP.php");
require("mailer/PHPMailer/src/Exception.php");
date_default_timezone_set("Etc/GMT-8");

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit'])) {

    $id = $_POST['enroll_id'];
    $sid = $_POST['sid'];
    $date=date("m-d-y");
    $dateassessed="Assessed {$date}";   
    $valid="Validated {$date}";


    $updateyrlevel = $_POST['upyrlvl'];

    if (isset($_POST['assessnotes'])){
        $note = $_POST['assessnotes'];
    }else{
        $note="";
    }
   

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


        //update yearlevel and enrollment status
        $sql1 = "Update enrollment set date_validated=?, date_assessed=?, date_pverif=?, enrollment_status=? where enrollment_ID=?";
        $data1 = array($valid, $dateassessed,'Processing','Assessed', $id);
        $stmt1 = $con->prepare($sql1);
        $stmt1->execute($data1);

        $sql2 = "Update students set yrlevel=? where id=?";
        $data2 = array($updateyrlevel, $sid);
        $stmt2 = $con->prepare($sql2);
        $stmt2->execute($data2);

        $_SESSION['status'] = "Assessment Form Sent!";
        $_SESSION['status_code'] = "success";
        header('location:assessments.php');

    } catch (PDOException $e) {
        $e->getMessage();
    }


    $mailTo = $email;

    if ($gender == "Male") {
        $honorific = "Mr.";
    } else {
        $honorific = "Ms.";
    }

    $body = "Good day Teresian!<br><br>

    Here's a copy of the <strong>assessment form</strong>. Minimum down payment is Php. 3,000.00.<br> 
    Payment can be made thru Bank Deposit or Online Bank Transfer. Kindly send your proof of payment together with your assessment form to https://cstaportal.com/payverif for verification and Official Receipt purposes.<br><br>
    
    <strong>BANK DETAILS</strong><br><br>
    
    <strong>METROBANK</strong><br><br>
    
    Account Name -               <strong>COLEGIO DE STA.TERESA DE AVILA or CSTA</strong><br><br>
    
    Account Number -           <strong>190-7-19081612-1</strong><br><br>
    
     
    
    <strong>BDO</strong>
    
    Account Name -               <strong>COLEGIO DE STA.TERESA DE AVILA or CSTA</strong><br><br>
    
    Account Number -           <strong>013-3080-00-301</strong><br><br><br>
    
     
    
    Thank you. God Bless and Keep safe.<br>
    
     
    
   <strong> Admin Name</strong><br>
    
    <small>Position</small><br>
    
    <small>Fb Page: </small><br>
    
    <small>Tel. No.: 8-275-3916</small> <br><br>
    
    {$note}";

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
    $mail->Subject = "Assessment Form"; // email subject
    $mail->Body = $body;

    $mail->addAttachment(path: "$file", name: "assessment_{$lname}'.jpg'");

    //$mail->AltBody="";


    if (!$mail->send()) {
        echo "Email Not Sent: " . $mail->ErrorInfo;
    } else {
       
        $_SESSION['status'] = "Assessment Form Sent!";
        $_SESSION['status_code'] = "success";
        header('location:assessments.php');
    }

    $mail->smtpClose();
}
