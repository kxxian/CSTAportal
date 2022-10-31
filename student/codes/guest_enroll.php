<?php
session_start();
require_once('../includes/connect.php');
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");



use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit'])) {

    //Baccalaureate Programs
    if (!isset($_POST['bp_input'])) {
        $course = 1;
    }else {
        $course =$_POST['bp_input'];
    }
    // Previous Degree, Strand, Course
    if (!isset($_POST['pdsc_input'])) {
        $pdsc = '-';
    }else{
        $pdsc=ucwords(htmlspecialchars(trim($_POST['pdsc_input'])));
    }

    //No Degree Program
    if (!isset($_POST['ndp_input'])) {
        $ndp = '-';
    }else{
        $ndp = $_POST['ndp_input'];
    }

    //Course to enroll
    if (!isset($_POST['ce_input'])) {
        $sub_to_enroll = '-';
    }else{
        $sub_to_enroll = ucwords(htmlspecialchars(trim($_POST['ce_input'])));
    }

    //Maiden Name
    if (!isset($_POST['ce_input'])) {
        $maidname = '-';
    }else{
        $maidname = ucwords(htmlspecialchars(trim($_POST['maidname'])));
    }


    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');
    //echo ucwords($date);


    $id = (int)$_POST['txtStudID'];
    $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
    $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
    $mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
   
    $gender = $_POST['selGender'];
    $cstatus = $_POST['selCstatus'];
    $bday = $_POST['dtBday'];
    $birthplace = ucwords(htmlspecialchars(trim($_POST['birthplace'])));
    //$course = $_POST['courses'];
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
    $appstat = $_POST['appstat'];


    //Generate Verification key
    // $vkey =sha1(time().$uname);
    $random = (time()+ rand(1,4294967295));
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

                    $sql = "INSERT INTO guest_enrollment (enroll_no,lname,fname,mname,maiden_name,citizenship,gender,civil_status,dob,birthplace,mobile,email,cityadd,region,province,city,brgy,guardian,g_contact,app_status,course_ID,previous_deg,sub_to_enroll,non_degree,date_submitted)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($random, $lname, $fname, $mname, $maidname, $citizen, $gender, $cstatus, $bday, $birthplace, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $guardian, $guardiancontact, $appstat, $course, $pdsc, $sub_to_enroll, $ndp, $date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();


                    $_SESSION['status'] = "Success!";
                    $_SESSION['msg'] = "Your Enrollment is Sent!";
                    $_SESSION['status_code'] = "success";
                    header('location:../guest_enrollment.php');


                    ##email

                    $mailTo = $email;

                    $body = "Hello $fname,<br><br>
                    Your enrollment request with tracking number <b>$random</b> has been submitted. <br><br>

                    You can monitor the status of your request through the CSTA Student Portal. <br> <br>

                    Thank you. ";

                    $mail = new PHPMailer();

                    //$mail->SMTPDebug = 3;
                    $mail->isSMTP();

                    //SMTP user credentials
                    include "../includes/smtp_config.php";

                    $mail->setFrom("CSTA Student Portal"); // insert department email here
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

                    $mail->AltBody="";
                    $mail->send();
                    $mail->smtpClose();

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['msg'] = "Something went wrong.";
                $_SESSION['status_code'] = "error";
                header('location: ../login.php');
            }
        }
    }
}
