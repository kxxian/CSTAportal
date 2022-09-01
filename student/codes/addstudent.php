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

    $id = (int)$_POST['txtStudID'];
    $lname = htmlspecialchars(trim($_POST['txtLname']));
    $fname = htmlspecialchars(trim($_POST['txtFname']));
    $mname = htmlspecialchars(trim($_POST['txtMname']));
    $snum = htmlspecialchars(trim($_POST['txtSnum']));
    $gender = $_POST['selGender'];
    $bday = $_POST['dtBday'];

    $yrlevel = $_POST['yrlevel'];
    $dept = $_POST['dept'];
    $course = $_POST['courses'];

    $citizen = htmlspecialchars(trim($_POST['txtCitizenship']));
    $mobile = htmlspecialchars(trim($_POST['txtContactno']));
    $email = htmlspecialchars(trim($_POST['txtEmail']));
    $cityadd = htmlspecialchars(trim($_POST['txtCityadd']));
    $region = $_POST['region'];
    $province = $_POST['provinces'];
    $city = $_POST['city'];
    $brgy = $_POST['barangay'];
    $guardian = htmlspecialchars(trim($_POST['txtguardian']));
    $guardiancontact = htmlspecialchars(trim($_POST['txtguardiancontact']));
    $uname = htmlspecialchars(trim($_POST['txtUsername']));
    $pass = sha1(trim($_POST['txtPassword']));

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

                    $sql = "INSERT INTO students (lname,fname,mname,snum,yrlevel,dept_ID,course,gender,bday,citizenship,mobile,email,cityadd,region,province,city,brgy,guardian,guardiancontact,username,pass,dor)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $data = array($lname, $fname, $mname, $snum, $yrlevel, $dept, $course, $gender, $bday, $citizen, $mobile, $email, $cityadd, $region, $province, $city, $brgy, $guardian, $guardiancontact, $uname, $pass,$date);
                    $stmt = $con->prepare($sql);
                    $stmt->execute($data);
                    $newname = $con->lastInsertId();


                    $_SESSION['status'] = "Registration Success!";
                    $_SESSION['status_code'] = "success";
                    // $_SESSION['msg'] = "Check Your Email Regularly For Account Approval";
                    header('location:login.php');


                    ##email

                    $mailTo = $email;

                    $body = "Good Day Teresian!<br><br>
                    Thank you for registering at CSTA Student Portal. <br><br>
                    
                    Please be patient while we validate your registration. We will notify you once account is activated.<br><br>
                    
                    Thank you. ";

                    $mail = new PHPMailer();

                    //$mail->SMTPDebug = 3;
                    $mail->isSMTP();

                    //SMTP user credentials
                    include "../includes/smtp_config.php";

                    $mail->setFrom("CSTA@sampleemail.com"); // insert department email here
                    $mail->FromName = "CSTA Registrar"; // employee name + Department 
                    $mail->addAddress($mailTo, $fname . ' ' . $lname); // recipient
                    $mail->SMTPOptions = array('ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => false
                    ));
                    $mail->isHTML(true);
                    $mail->Subject = "STUDENT PORTAL REGISTRATION"; // email subject
                    $mail->Body = $body;

                    // $mail->addAttachment(path: "$file", name: "Grades_{$lname}'.jpg'");

                    //$mail->AltBody="";


                    if (!$mail->send()) {
                        echo "Email Not Sent: " . $mail->ErrorInfo;
                    } else {

                        $_SESSION['status'] = "Registration Success!";
                        $_SESSION['status_code'] = "success";
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
