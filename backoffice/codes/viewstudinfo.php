<?php
session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['operations'])) {

    if ($_POST["operations"] == "Send") {
        $id = $_POST['acc_id'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullnames'])));
        $email = htmlspecialchars(trim($_POST['emails']));
        // $reason= ucwords(htmlspecialchars(trim($_POST['reason'])));
        //$reqdoc_ID=$_POST['reqdoc_id'];

        $statement = $con->prepare("Update students set isAccepted=?, dor=dor WHERE id=?");

        $data = array('1',$id);
        $result = $statement->execute($data);


        $mailTo = $email;

        $body = "Good Day Teresian!<br><br>
        You can now login to the CSTA Student Portal. <br><br>
       
        Thank you. ";

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
        $mail->Subject = "Registration Accepted"; // email subject
        $mail->Body = $body;

        $mail->send();
        $mail->smtpClose();
    }
}

//fetch 
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM vwstudents where id=? and isAccepted=? LIMIT 1");
    $data = array($id, 0);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['id'];
        $output['studtype'] = $row['studtype'];
        $output['snum'] = $row['snum'];
        $output['fullname'] = $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'];
        $output['yrcourse'] = $row['yrlevel'].' '.$row['abbr'];
        $output['bday'] = $row['bday'];
        $output['gender'] = $row['gender'];
        $output['cstatus'] = $row['cstatus'];
        $output['email'] = $row['email'];
        $output['address'] = ucwords(strtolower($row['completeaddress']));
        $output['mothermaiden'] = $row['mothermaiden'];
        $output['guardian'] = $row['guardian'];
        $output['phone1'] = $row['guardiancontact'];
        $output['phone2'] = $row['guardiancontact2'];

    }
    echo json_encode($output);
}
