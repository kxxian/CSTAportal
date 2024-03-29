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
        $sid = $_POST['sid'];
        $id = $_POST['gradereq_ID'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));
        $email = htmlspecialchars(trim($_POST['email']));

        $statement = $con->prepare("UPDATE gradereq set status=? WHERE gradereq_ID=?");

        $data = array('Done', $id);
        $result = $statement->execute($data);


        //insert notification
        $notif = "Your copy of grades is sent to your email.";
        $icon = "fas fa-file-alt text-white";
        $link = "#";
        $color="bg-success";

        $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
        $data2 = array($sid, $notif, $icon, $color, $link, $date);
        $stmt2 = $con->prepare($sql2);
        $stmt2->execute($data2);


        $mailTo = $email;

        $body = "Good Day Teresian!<br><br>

        Here's a copy of your " . $currentsemval . " grade. Thank you,<br><br>


       <strong>" . $empname . "</strong><br>
                " . $position . "
        ";

        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "../includes/smtp_config.php";

        $mail->setFrom(""); // insert department email here
        $mail->FromName = "CSTA Student Portal"; // employee name + Department 
        $mail->addAddress($mailTo, $fullname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "GRADES REQUEST FOR " . $currentsemval . " A.Y. " . $currentsyval . "
        "; // email subject
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
if (isset($_POST['gradereq_ID'])) {
    $id = $_POST['gradereq_ID'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM vwgradereq where gradereq_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['gradereq_ID'];
        $output['fullname'] = $row['fullname'];
        $output['email'] = $row['email'];
        $output['sid'] = $row['sid'];
    }
    echo json_encode($output);
}
