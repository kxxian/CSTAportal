<?php
session_start();
require_once('../includes/connect.php');
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");



use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit'])) {

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

    //Maiden Name
    if (!isset($_POST['ce_input'])) {
        $maidname = '-';
    }else{
        $maidname = ucwords(htmlspecialchars(trim($_POST['maidname'])));
    }


    if (isset($_POST['selsy'])) {
        $pay_sy = $_POST['selsy'];
    } else {
        $pay_sy = 1;
    }

    if (isset($_POST['selsem'])) {
        $pay_sem = $_POST['selsem'];
    } else {
        $pay_sem = 1;
    }

    if (isset($_POST['selterm'])) {
        $payterm = $_POST['selterm'];
    } else {
        $payterm = 1;
    }

    $tfeeamount = htmlspecialchars(trim($_POST['tfeeamount']));
    $total_others = htmlspecialchars(trim($_POST['totalothers']));
    $amountdue = $_POST['totaldue'];
    $amtpaid = htmlspecialchars(trim($_POST['amtpaid']));;
    $sentthru = $_POST['sentthru'];
    $paymethod = $_POST['paymethod'];
    $dop = $_POST['DoP'];
    $top = $_POST['ToP'];
    $notes = $_POST['note'];

    if (isset($_POST['particulars'])) {
        $particulars = implode(", ", $_POST['particulars']);
    } else {
        $particulars = "NA";
    }

    //Generate Tracking number key
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

                    $sql = "INSERT INTO guest_payverif (payverif_no,lname,fname,mname,maiden_name,citizenship,gender,civil_status,dob,birthplace,mobile,email,cityadd,region,province,city,brgy,guardian,g_contact,date_of_payment,time_of_payment,schoolyr,semester_ID,terms_ID,tfeeamount,particulars,particulars_total,sentvia_ID,paymethod_ID,note,gtotal,amtpaid,date_sent)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($random, $lname, $fname, $mname, $maidname, $citizen, $gender, $cstatus, $bday, $birthplace, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $guardian, $guardiancontact,$dop, $top, $pay_sy, $pay_sem, $payterm, $tfeeamount, $particulars, $total_others, $sentthru, $paymethod, $notes, $amountdue, $amtpaid,$date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();


                    $_SESSION['status'] = "Success!";
                    $_SESSION['msg'] = "Your Payment is Sent!";
                    $_SESSION['status_code'] = "success";
                    header('location:../guest_payverif.php');


                    ##email

                    $mailTo = $email;

                    $body = "Hello $fname,<br><br>
                    Your payment verification request with tracking number <b>$random</b> has been submitted. <br><br>

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
                    $mail->Subject = "Payment Verification Request"; // email subject
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
                header('location: ../guest_payverif.php');
            }
        }
    }
}
