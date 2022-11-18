<?php
session_start();
require_once('../includes/connect.php');
require_once('../includes/functions.php');
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");


use PHPMailer\PHPMailer\PHPMailer;
// FRESHMAN FORM SUBMIT
if (isset($_POST['submit_freshman'])) {
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


    $appstat = "Freshman";
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
    $course = $_POST['bp_input'];
    $pdsc = ucwords(htmlspecialchars(trim($_POST['pdsc_input'])));


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

                    $sql = "INSERT INTO guest_enrollment_freshman (enroll_no,lname,fname,mname,maiden_name,citizenship,gender,civil_status,dob,birthplace,mobile,email,cityadd,region,province,city,brgy,guardian,g_contact,app_status,course_ID,previous_deg,date_submitted)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($random, $lname, $fname, $mname, $maidname, $citizen, $gender, $cstatus, $bday, $birthplace, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $guardian, $guardiancontact, $appstat, $course, $pdsc, $date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();

                    if ($_FILES['freshbc']['name']) {
                        $msg = uploadbc($_FILES['freshbc'], $newname);
                    }
                    if ($_FILES['freshgmc']['name']) {
                        $msg = uploadgmc($_FILES['freshgmc'], $newname);
                    }
                    if ($_FILES['freshf138']['name']) {
                        $msg = uploadf138($_FILES['freshf138'], $newname);
                    }


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
                header('location: ../login.php');
            }
        }
    }
}
######################################
// Transferee FORM SUBMIT
if (isset($_POST['submit_transferee'])) {
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


    $appstat = "Transferee";
    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');
    //echo ucwords($date);
    $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
    $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
    //$mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
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
    $course = $_POST['bp_input'];
    $pdsc = ucwords(htmlspecialchars(trim($_POST['pdsc_input'])));


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

                    $sql = "INSERT INTO guest_enrollment_transferee (enroll_no,lname,fname,mname,maiden_name,citizenship,gender,civil_status,dob,birthplace,mobile,email,cityadd,region,province,city,brgy,guardian,g_contact,app_status,course_ID,previous_deg,date_submitted)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($random, $lname, $fname, $mname, $maidname, $citizen, $gender, $cstatus, $bday, $birthplace, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $guardian, $guardiancontact, $appstat, $course, $pdsc, $date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();


                    if ($_FILES['transbc']['name']) {
                        $msg = uploadtransbc($_FILES['transbc'], $newname);
                    }
                    if ($_FILES['transgmc']['name']) {
                        $msg = uploadtransgmc($_FILES['transgmc'], $newname);
                    }
                    if ($_FILES['transhd']['name']) {
                        $msg = uploadtranshd($_FILES['transhd'], $newname);
                    }
                    if ($_FILES['transtor']['name']) {
                        $msg = uploadtranstor($_FILES['transtor'], $newname);
                    }

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
                header('location: ../login.php');
            }
        }
    }
}

######################################
// SCT FORM SUBMIT
if (isset($_POST['submit_sct'])) {
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


    $appstat = "Second Course Taker";
    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');
    //echo ucwords($date);
    $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
    $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
    //$mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
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
    $course = $_POST['bp_input'];
    $pdsc = ucwords(htmlspecialchars(trim($_POST['pdsc_input'])));


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

                    $sql = "INSERT INTO guest_enrollment_sct (enroll_no,lname,fname,mname,maiden_name,citizenship,gender,civil_status,dob,birthplace,mobile,email,cityadd,region,province,city,brgy,guardian,g_contact,app_status,course_ID,previous_deg,date_submitted)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($random, $lname, $fname, $mname, $maidname, $citizen, $gender, $cstatus, $bday, $birthplace, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $guardian, $guardiancontact, $appstat, $course, $pdsc, $date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();

                    if ($_FILES['sctbc']['name']) {
                        $msg = uploadsctbc($_FILES['sctbc'], $newname);
                    }
                    if ($_FILES['scttor']['name']) {
                        $msg = uploadscttor($_FILES['scttor'], $newname);
                    }


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
                header('location: ../login.php');
            }
        }
    }
}
######################################
// Cross-Enrollee FORM SUBMIT
if (isset($_POST['submit_ce'])) {
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


    $appstat = "Cross-Enrollee";
    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');
    //echo ucwords($date);
    $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
    $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
    //$mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
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
    $ce = $_POST['ce_input'];
    $pdsc = ucwords(htmlspecialchars(trim($_POST['pdsc_input'])));


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

                    $sql = "INSERT INTO guest_enrollment_ce (enroll_no,lname,fname,mname,maiden_name,citizenship,gender,civil_status,dob,birthplace,mobile,email,cityadd,region,province,city,brgy,guardian,g_contact,app_status,sub_to_enroll,previous_deg,date_submitted)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($random, $lname, $fname, $mname, $maidname, $citizen, $gender, $cstatus, $bday, $birthplace, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $guardian, $guardiancontact, $appstat, $ce, $pdsc, $date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();

                         
                    if ($_FILES['cereqbc']['name']) {
                        $msg = uploadcebc($_FILES['cereqbc'], $newname);
                    }
                    if ($_FILES['cereqpermit']['name']) {
                        $msg = uploadcepermit($_FILES['cereqpermit'], $newname);
                    }



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
                header('location: ../login.php');
            }
        }
    }
}
######################################
// Unit Earners FORM SUBMIT
if (isset($_POST['submit_ue'])) {
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


    $appstat = "Unit Earner";
    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');
    //echo ucwords($date);
    $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
    $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
    //$mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
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
    $ndp = $_POST['ndp_input'];
    $pdsc = ucwords(htmlspecialchars(trim($_POST['pdsc_input'])));


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

                    $sql = "INSERT INTO guest_enrollment_unitearner (enroll_no,lname,fname,mname,maiden_name,citizenship,gender,civil_status,dob,birthplace,mobile,email,cityadd,region,province,city,brgy,guardian,g_contact,app_status,ndp_ID,previous_deg,date_submitted)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($random, $lname, $fname, $mname, $maidname, $citizen, $gender, $cstatus, $bday, $birthplace, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $guardian, $guardiancontact, $appstat, $ndp, $pdsc, $date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();

                    
                    if ($_FILES['sctbc']['name']) {
                        $msg = uploaduebc($_FILES['sctbc'], $newname);
                    }
                    if ($_FILES['scttor']['name']) {
                        $msg = uploaduetor($_FILES['scttor'], $newname);
                    }


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
                header('location: ../login.php');
            }
        }
    }
}
