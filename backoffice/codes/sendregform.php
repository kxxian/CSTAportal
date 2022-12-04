<?php
session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'fetchcurrentsyandsem.php';
require_once 'functions.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;


// current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d H:i:s');

if (isset($_POST['operation'])) {

    if ($_POST["operation"] == "Send") {
        $id = $_POST['ev_ID'];
        $sid = $_POST['sid'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));
        $email = htmlspecialchars(trim($_POST['email']));

        //update enrollment validation
        $statement = $con->prepare("UPDATE enrollment_validation set status=? WHERE ev_ID=?");
        $data = array('Validated', $id);
        $result = $statement->execute($data);


        //insert notification
        $notif = "You are now officially enrolled. Check your email for your registration form.";
        $icon = "fas fa-user-check text-white";
        $link = "enrollment.php";
        $color="bg-success";

        $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
        $data2 = array($sid, $notif, $icon, $color, $link, $date);
        $stmt2 = $con->prepare($sql2);
        $stmt2->execute($data2);



        //update enrollment status of student
        $statement2 = $con->prepare("UPDATE enrollment set enrollment_status=? WHERE sid=? and schoolyr_ID=? and semester_ID=?");
        $data2 = array('Enrolled', $sid, $currentsy, $currentsem);
        $result2 = $statement2->execute($data2);


        $mailTo = $email;

        $body =
        "<pre style='font-family:times new roman;'>
        Hello Teresian!  
            Congratulations you are now Officially Enrolled, You have completed your enrollment for the " . $currentsemval . " of A.Y. " . $currentsyval . "
            Attached herewith is your softcopy of your Registration Form. Please wait for further announcements regarding the sectioning and registration
            and class schedules. 
        
         Regards, 
         CSTA Student Portal
        </pre>";




        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "../includes/smtp_config.php";

        $mail->setFrom($useremail); // insert department email here
        $mail->FromName = $empname; // employee name + Department 
        $mail->addAddress($mailTo, $fullname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "CONFIRMATION OF ENROLLMENT"; // email subject
        $mail->Body = $body;


        //attachments
        foreach ($_FILES["attachment"]["name"] as $k => $v) {
            $mail->AddAttachment($_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k]);
        }

        $mail->send();
        $mail->smtpClose();
    }
}

//fetch 
if (isset($_POST['ev_ID'])) {
    $id = $_POST['ev_ID'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM vwenroll_validate where ev_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['ev_ID'];
        $output['sid'] = $row['sid'];
        $output['fullname'] = $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'];
        $output['email'] = $row['email'];
    }
    echo json_encode($output);
}
