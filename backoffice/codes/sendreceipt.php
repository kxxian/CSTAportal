<?php
session_start();
require_once 'includes/connect.php';
require_once '../student/includes/functions.php';
require("mailer/PHPMailer/src/PHPMailer.php");
require("mailer/PHPMailer/src/SMTP.php");
require("mailer/PHPMailer/src/Exception.php");
date_default_timezone_set("Etc/GMT-8");

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit'])) {

    $id = $_POST['enroll_id'];
    $sid = $_POST['sid'];
    $date=date("m-d-y");
    $datepverif="Verified {$date}";   
   ;

    if(isset($_POST['assessnotes'])){
        $note = $_POST['assessnotes'];
    }else{
        $note = "";
    }

    
    $file = "attachments/receipts/" . basename($_FILES['attachment']['name']);
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


        //update enrollment status
        $sql1 = "Update paymentverif set payment_status=? where pv_ID=? ";
        $data1 = array('Verified', $id);
        $stmt1 = $con->prepare($sql1);
        $stmt1->execute($data1);

        //  $sql2 = "Update enrollment set date_pverif=?, payment_status=?, enrollment_status=? where sid=? and
        //  schoolyr=?
       
        //  ";
        //  $data2 = array($datepverif,'Verified','Enrolled', $sid);
        //  $stmt2 = $con->prepare($sql2);
        //  $stmt2->execute($data2);

       
        $_SESSION['status'] = "Payment Verified!";
        $_SESSION['status_code'] = "success";
        header('location:payverif.php');

    } catch (PDOException $e) {
        $e->getMessage();
    }


    $mailTo = $email;

    // if ($gender == "Male") {
    //     $honorific = "Mr.";
    // } else {
    //     $honorific = "Ms.";
    // }

    $body = "Hi Ma'am/Sir,<br>

    Please see attached advance copy of Official Receipt for your reference.<br>
    
    You may get the Original Copy at CSTA Cashier Monday to Friday 9am-4pm. 
    
    Thank You & Keep Safe.<br><br>
    
    {$note}
    ";

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
    $mail->FromName = "CSTA Accounting"; // employee name + Department 
    $mail->addAddress($mailTo, $fname . ' ' . $lname); // recipient
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    $mail->isHTML(true);
    $mail->Subject = "Assessment Form"; // email subject
    $mail->Body = $body;

    $mail->addAttachment(path: "$file", name: "OR_{$lname}'.jpg'");

    //$mail->AltBody="";


    if (!$mail->send()) {
        echo "Email Not Sent: " . $mail->ErrorInfo;
    } else {
       
        // $_SESSION['status'] = "Assessment Form Sent!";
        // $_SESSION['status_code'] = "success";
        // header('location:payverif.php');
    }

    $mail->smtpClose();
}
