<?php
session_start();
require_once('../includes/connect.php');
require_once('../includes/functions.php');
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");


use PHPMailer\PHPMailer\PHPMailer;


// FRESHMAN FORM SUBMIT
if (isset($_POST['submit'])) {
    //Maiden Name
    if ($_POST['maidname'] == "") {
        $maidname = '-';
    } else {
        $maidname = ucwords(htmlspecialchars(trim($_POST['maidname'])));
    }
    //Middle Name
    if ($_POST['mname'] == "") {
        $mname = '-';
    } else {
        $mname = ucwords(htmlspecialchars(trim($_POST['maidname'])));
    }



    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');
    $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
    $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
    $gender = $_POST['selGender'];
    $cstatus = $_POST['selCstatus'];
    $bday = $_POST['dtBday'];
    $birthplace = ucwords(htmlspecialchars(trim($_POST['birthplace'])));
    $citizen = ucwords(htmlspecialchars(trim($_POST['citizenship'])));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $email = htmlspecialchars(trim($_POST['email']));
    $cityadd = ucwords(htmlspecialchars(trim($_POST['cityadd'])));
    $region = $_POST['region'];
    $province = $_POST['provinces'];
    $city = $_POST['city'];
    $brgy = $_POST['barangay'];
    $guardian = ucwords((htmlspecialchars(trim($_POST['txtguardian']))));
    $guardiancontact = htmlspecialchars(trim($_POST['txtguardiancontact']));
    $studstat = $_POST['studstat'];
    $yearGrad = htmlspecialchars(trim($_POST['yearGrad']));
    $lastSchool = htmlspecialchars(trim($_POST['lastSchool']));

    if (!isset($_POST['doc'])) {
        $cert = "-";
    } else {
        $cert = implode(", ", $_POST['doc']);
    }

    if (!isset($_POST['diploma'])) {
        $diploma = 3;
    } else {
        $diploma = $_POST['diploma'];
    }

    if ($_POST['trans']=="") {
        $trans = "-";
    } else {
        $trans = $_POST['trans'];
    }

    if ($_POST['authdocs']=="") {
        $auth = "-";
    } else {
        $auth = $_POST['authdocs'];
    }

    if ($_POST['tor'] == "") {
        $tor = "-";
    } else {
        $tor = ucwords(htmlspecialchars(trim($_POST['tor'])));
    }


    $rep = ucwords(htmlspecialchars(trim($_POST['rep'])));
    $repmob = $_POST['repmob'];
    $deladd = ucwords(htmlspecialchars(trim($_POST['deladd'])));


    //Generate Verification key
    // $vkey =sha1(time().$uname);
    $random = (time() + rand(1, 4294967295));
    //echo $random;

    //google recaptcha
    if (isset($_POST['g-recaptcha-response'])) {
        $recaptcha = $_POST['g-recaptcha-response'];

        if (!$recaptcha) {
            $_SESSION['status'] = "Captcha Error!";
            $_SESSION['status_code'] = "error";
            header('location:../guest_enrollment.php');
            exit;
        } else {
            $secret = "6Le4tLIeAAAAAHVQguFN-behNmCF50ju6A3JywZW";
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $recaptcha;
            $response = file_get_contents($url);
            $responsekeys = json_decode($response, true);

            //print_r($responsekeys);
            if ($responsekeys['success']) {
                try {

                    $sql = "INSERT INTO guest_reqdocu (req_no,lname,fname,mname,maiden_name,citizenship,gender,civil_status,dob,mobile,email,cityadd,region,province,city,brgy,guardian,g_contact,studstat_ID,yearGrad,lastSchool,cert,trans_ID,tor_purpose,diploma_ID,auth,deliver_add,receiver_name,contactnum,date_sent)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($random, $lname, $fname, $mname, $maidname, $citizen, $gender, $cstatus, $bday, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $guardian, $guardiancontact, $studstat, $yearGrad, $lastSchool, $cert,$trans, $tor, $diploma, $auth,  $deladd, $rep, $repmob, $date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();

                    if ($_FILES['tor2']['name']) {
                        $msg = upload_guesttor($_FILES['tor2'], $newname);
                    }
            

                    $_SESSION['status'] = "Success!";
                    $_SESSION['msg'] = "Your Request is Sent!";
                    $_SESSION['status_code'] = "success";
                    header('location:../guest_requestdocu.php');


                    ##email

                    $mailTo = $email;

                    $body = "Hello $fname,<br><br>
                    Your document request with tracking number <b>$random</b> has been submitted. <br><br>

                    You can monitor the status of your request through the CSTA Student Portal. <br> <br>

                    Thank you. ";

                    $mail = new PHPMailer();

                    //$mail->SMTPDebug = 3;
                    $mail->isSMTP();

                    //SMTP user credentials
                    include "../includes/smtp_config.php";

                    $mail->setFrom(""); // insert department email here
                    $mail->FromName = "CSTA Student Portal"; // Name of Sender
                    $mail->addAddress($mailTo, $fname . ' ' . $lname); // recipient
                    $mail->SMTPOptions = array('ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => false
                    ));
                    $mail->isHTML(true);
                    $mail->Subject = "Enrollment Request"; // email subject
                    $mail->Body = $body;

                    // $mail->addAttachment(path: "$file", name: "Grades_{$lname}'.jpg'");

                    $mail->AltBody = "";
                    $mail->send();
                    $mail->smtpClose();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['msg'] = "Something went wrong.";
                $_SESSION['status_code'] = "error";
                header('location: ../guest_reqdocu.php');
            }
        }
    }
}
