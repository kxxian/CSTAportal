<?php
session_start();
require_once('../codes/fetchuserdetails.php');
require_once('../includes/connect.php');
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");



// current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d H:i:s');


use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['accept_id'])) {
  $id = $_POST['accept_id'];
  $email = $_POST['email'];
  $sname = $_POST['sname'];

  $sql = "UPDATE students set isAccepted=? where id=?";
  $data = array('1', $id);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);


  //insert notification
  $notif = "Welcome to CSTA Student Portal. You can now set up your profile here.";
  $icon = "fas fa-user text-white";
  $link = "profile.php";
  $color = "bg-success";


  $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
  $data2 = array($id, $notif, $icon, $color, $link, $date);
  $stmt2 = $con->prepare($sql2);
  $stmt2->execute($data2);



  ##email

  $mailTo = $email;

  $body = "Good Day Teresian!<br><br>
  You can now login to the CSTA Student Portal. <br><br>
 
  Thank you. ";

  $mail = new PHPMailer();

  //$mail->SMTPDebug = 3;
  $mail->isSMTP();

  //SMTP user credentials
  include "../includes/smtp_config.php";

  $mail->setFrom($deptemail); // insert department email here
  $mail->FromName = $dept; // employee name + Department 
  $mail->addAddress($mailTo, $sname); // recipient
  $mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
  ));
  $mail->isHTML(true);
  $mail->Subject = "Account Registration Accepted"; // email subject
  $mail->Body = $body;

  // $mail->addAttachment(path: "$file", name: "Grades_{$lname}'.jpg'");

  //$mail->AltBody="";


  if (!$mail->send()) {
    echo "Email Not Sent: " . $mail->ErrorInfo;
  } else {

    //   $_SESSION['status'] = "Success!";
    //   $_SESSION['status_code'] = "success";
    //  $_SESSION['msg'] = "We have sent you an email.";
    //   header('location: registrations.php');
  }

  $mail->smtpClose();
}

if (isset($_POST['decline_id'])) {
  $sql = "DELETE FROM students where id=?";
  $data = array($_POST['decline_id']);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);

  $con = null;
}
