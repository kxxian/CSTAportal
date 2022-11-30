<?php
session_start();
require_once('../includes/connect.php');
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");



use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit'])) {
    if ($_POST['txtSnum'] == "") {
        $snum = "NA";
    } else {
        $snum = htmlspecialchars(trim($_POST['txtSnum']));
    }


    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');
    //echo ucwords($date);
    $studtype = $_POST['studtype'];

    $lname = ucwords(strtolower(htmlspecialchars(trim($_POST['txtLname']))));
    $fname = ucwords(strtolower(htmlspecialchars(trim($_POST['txtFname']))));
    $mname = ucwords(strtolower(htmlspecialchars(trim($_POST['txtMname']))));

    $gender = $_POST['selGender'];
    $cstatus = $_POST['cstatus'];
    $bday = $_POST['dtBday'];
    $yrlevel = $_POST['yrlevel'];
    $dept = $_POST['dept'];
    $course = $_POST['courses'];
    $citizen = ucwords(strtolower(htmlspecialchars(trim($_POST['txtCitizenship']))));
    $mobile = htmlspecialchars(trim($_POST['txtContactno']));
    $email = htmlspecialchars(trim($_POST['txtEmail']));
    $cityadd = ucwords(strtolower(htmlspecialchars(trim($_POST['txtCityadd']))));
    $region = $_POST['region'];
    $province = $_POST['provinces'];
    $city = $_POST['city'];
    $brgy = $_POST['barangay'];
    $mothermaiden = ucwords(strtolower(htmlspecialchars(trim($_POST['mothermaiden']))));
    $guardian = ucwords(strtolower(htmlspecialchars(trim($_POST['txtguardian']))));
    $guardiancontact = htmlspecialchars(trim($_POST['txtguardiancontact']));
    $guardiancontact2 = htmlspecialchars(trim($_POST['txtguardiancontact2']));
    // $uname = htmlspecialchars(trim($_POST['txtUsername']));
    // $pass = sha1(trim($_POST['txtPassword']));

    //Generate Verification key
    $vkey = sha1(time() . $email);

    //echo $vkey;

    //google recaptcha
    if (isset($_POST['g-recaptcha-response'])) {
        $recaptcha = $_POST['g-recaptcha-response'];

        if (!$recaptcha) {
            $_SESSION['status'] = "Captcha Error!";
            $_SESSION['status_code'] = "error";
            header('location:register.php');
            exit;
        } else {
            $secret = "6Le4tLIeAAAAAHVQguFN-behNmCF50ju6A3JywZW";
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $recaptcha;
            $response = file_get_contents($url);
            $responsekeys = json_decode($response, true);

            //print_r($responsekeys);
            if ($responsekeys['success']) {
                try {

                    $sql = "INSERT INTO students (studtype,lname,fname,mname,snum,yrlevel,dept_ID,course,gender,cstatus,bday,citizenship,mobile,email,cityadd,region,province,city,brgy,mothermaiden,guardian,guardiancontact,guardiancontact2,vkey,dor)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($studtype,$lname, $fname, $mname, $snum, $yrlevel, $dept, $course, $gender, $cstatus, $bday, $citizen, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $mothermaiden, $guardian, $guardiancontact, $guardiancontact2, $vkey, $date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();

                    ##email

                    $mailTo = $email;

                    $body = "Good Day Teresian!<br><br>
                    Thank you for registering at CSTA Student Portal. <br><br>
                    
                    Please click the <a href='http://localhost/CSTAportal/student/verify.php?vkey=$vkey'>link</a> to verify your email address. <br>
                    
                    <br>
                    Thank you. ";

                    $mail = new PHPMailer();

                    //$mail->SMTPDebug = 3;
                    $mail->isSMTP();

                    //SMTP user credentials
                    include "../includes/smtp_config.php";

                    $mail->setFrom("CSTA@sampleemail.com"); // insert department email here
                    $mail->FromName = "CSTA Student Portal"; // employee name + Department 
                    $mail->addAddress($mailTo, $fname . ' ' . $lname); // recipient
                    $mail->SMTPOptions = array('ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => false
                    ));
                    $mail->isHTML(true);
                    $mail->Subject = "Email Verification"; // email subject
                    $mail->Body = $body;

                    // $mail->addAttachment(path: "$file", name: "Grades_{$lname}'.jpg'");

                    //$mail->AltBody="";


                    if (!$mail->send()) {
                        echo "Email Not Sent: " . $mail->ErrorInfo;
                    } else {

                        $_SESSION['status'] = "Success!";
                        $_SESSION['status_code'] = "success";
                        $_SESSION['msg'] = "We have sent you an email.";
                        header('location: ../login.php');
                    }

                    $mail->smtpClose();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $_SESSION['status'] = "Registration Failed!";
                $_SESSION['status_code'] = "error";
                // $_SESSION['msg'] = "";
                header('location: ../login.php');
            }
        }
    }
}
