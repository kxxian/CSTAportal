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


if (isset($_POST['operation'])) {

    // if ($_POST["operation"] == "Add") {
    //     $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
    //     $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
    //     $mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
    //     $email = htmlspecialchars(trim($_POST['email']));
    //     $gender = $_POST['gender'];
    //     $mobile = htmlspecialchars(trim($_POST['mobile']));
    //     $office = $_POST['office'];
    //     $dept = $_POST['dept'];
    //     $position = ucwords(htmlspecialchars(trim($_POST['position'])));
    //     $role = $_POST['role'];

    //     $statement = $con->prepare("INSERT INTO employees (lname, fname, mname,email,Gender,mobile,office,dept_ID,position,permission_ID) VALUES(?,?,?,?,?,?,?,?,?,?)");

    //     $data = array($lname, $fname, $mname, $email, $gender, $mobile, $office, $dept,$position, $role);
    //     $result = $statement->execute($data);


    //     //Send Set Credentials to USER's email address
    //     $selector = bin2hex(random_bytes(8));
    //     $token = random_bytes(32);

    //     $url = "http://localhost/CSTAportal/backoffice/set-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    //     $expires = date("U") + 86400; //1-Day Expiration

    //     try {
    //         $sql = "DELETE From pwdreset where pwdresetEmail = ?;";
    //         $data = array($email);
    //         $stmt = $con->prepare($sql);
    //         $stmt->execute($data);
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }

    //     $hashedToken = password_hash($token, PASSWORD_DEFAULT);

    //     try {
    //         $sql = "INSERT INTO pwdreset (pwdresetEmail,pwdresetSelector,pwdresetToken,pwdresetExpires) VALUES(?,?,?,?);";
    //         $data = array($email, $selector, $hashedToken, $expires);
    //         $stmt = $con->prepare($sql);
    //         $stmt->execute($data);
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }

    //     $mailTo = $email;
    //     $subject = "Set Password";

    //     $message  = '<p>You are one step away from completing your registration to CSTA Admin. Please set<br>
    //         your user credentials to complete your registration </p>';
    //     $message .= '<p>Here is the link: <br><a href="' . $url . '">' . $url . '</a>  </p>';

    //     $headers = "From: Sender\r\n";
    //     $headers .= "Reply-To: Sender\r\n";
    //     $headers .= "Content-type: text/html\r\n";

    //     $mail = new PHPMailer();

    //     $mail->SMTPDebug = 3;
    //     $mail->isSMTP();

    //     //SMTP user credentials
    //     include '../includes/smtp_config.php';

    //     //$mail->setFrom("CSTA@sampleemail.com"); // insert department email here
    //     $mail->FromName = "CSTA Admin Portal"; // employee name + Department 
    //     $mail->addAddress($mailTo, $fname . ' ' . $lname); // recipient
    //     $mail->SMTPOptions = array('ssl' => array(
    //         'verify_peer' => false,
    //         'verify_peer_name' => false,
    //         'allow_self_signed' => false
    //     ));
    //     $mail->isHTML(true);
    //     $mail->Subject = "Set your password"; // email subject
    //     $mail->Body = $message;

    //     if (!$mail->send()) {
    //         echo "Email Not Sent: " . $mail->ErrorInfo;
    //     } else {

    //         // $_SESSION['status'] = "Registration Success!";
    //         // $_SESSION['status_code'] = "success";
    //         header('location:../forgot-password.php?reset=success');
    //     }

    //     $mail->smtpClose();
    // } else {
    //     header('location:../forgot-password.php?reset=notfound');
    // }


    if ($_POST["operation"] == "Send") {
        $id = $_POST['ev_ID'];
        $sid =$_POST['sid'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));
        $email = htmlspecialchars(trim($_POST['email']));
       
        //update enrollment validation
        $statement = $con->prepare("UPDATE enrollment_validation set status=? WHERE ev_ID=?");
        $data = array('Validated',$id);
        $result = $statement->execute($data);


        //update enrollment status of student
        $statement2 = $con->prepare("UPDATE enrollment set enrollment_status=? WHERE sid=? and schoolyr_ID=? and semester_ID=?");
        $data2 = array('Enrolled',$sid,$currentsy,$currentsem);
        $result2 = $statement2->execute($data2);


        $mailTo = $email;

        $body = "WelcomeTeresian!<br><br>

        Congratulations you are Officially Enrolled, You have completed your enrollment for the ".$currentsemval." of A.Y. ".$currentsyval."<br><br>
        
        Attached herewith is your soft copy of your Registration Form.<br><br>
        
        Thank you.
        ";

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
        $output['fullname'] = $row['lname'].', '.$row['fname'].' '.$row['mname'];
        $output['email'] = $row['email'];
    }
    echo json_encode($output);
}



