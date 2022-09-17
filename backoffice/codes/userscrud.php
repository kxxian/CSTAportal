<?php
require_once '../includes/connect.php';
require_once 'function_users.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['operation'])) {

    if ($_POST["operation"] == "Add") {
        $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
        $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
        $mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
        $email = htmlspecialchars(trim($_POST['email']));
        $gender = $_POST['gender'];
        $mobile = htmlspecialchars(trim($_POST['mobile']));
        $office = $_POST['office'];
        $dept = $_POST['dept'];
        $role = $_POST['role'];

        $statement = $con->prepare("INSERT INTO employees (lname, fname, mname,email,Gender,mobile,office,dept_ID,permission_ID) VALUES(?,?,?,?,?,?,?,?,?)");

        $data = array($lname, $fname, $mname, $email, $gender, $mobile, $office, $dept, $role);
        $result = $statement->execute($data);


        //Send Set Credentials to USER's email address
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "http://localhost/CSTAportal/backoffice/set-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
        $expires = date("U") + 86400; //1-Day Expiration

        try {
            $sql = "DELETE From pwdreset where pwdresetEmail = ?;";
            $data = array($email);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $hashedToken = password_hash($token, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO pwdreset (pwdresetEmail,pwdresetSelector,pwdresetToken,pwdresetExpires) VALUES(?,?,?,?);";
            $data = array($email, $selector, $hashedToken, $expires);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $mailTo = $email;
        $subject = "Set Password";

        $message  = '<p>You are one step away from completing your registration to CSTA Admin. Please set<br>
            your user credentials to complete your registration </p>';
        $message .= '<p>Here is the link: <br><a href="' . $url . '">' . $url . '</a>  </p>';

        $headers = "From: Sender\r\n";
        $headers .= "Reply-To: Sender\r\n";
        $headers .= "Content-type: text/html\r\n";

        $mail = new PHPMailer();

        $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include '../includes/smtp_config.php';

        //$mail->setFrom("CSTA@sampleemail.com"); // insert department email here
        $mail->FromName = "CSTA Admin Portal"; // employee name + Department 
        $mail->addAddress($mailTo, $fname . ' ' . $lname); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Set your password"; // email subject
        $mail->Body = $message;

        if (!$mail->send()) {
            echo "Email Not Sent: " . $mail->ErrorInfo;
        } else {

            // $_SESSION['status'] = "Registration Success!";
            // $_SESSION['status_code'] = "success";
            header('location:../forgot-password.php?reset=success');
        }

        $mail->smtpClose();
    } else {
        header('location:../forgot-password.php?reset=notfound');
    }


    if ($_POST["operation"] == "Edit") {
        $id = $_POST['user_id'];
        $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
        $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
        $mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
        $email = htmlspecialchars(trim($_POST['email']));
        $gender = $_POST['gender'];
        $mobile = htmlspecialchars(trim($_POST['mobile']));
        $office = $_POST['office'];
        $dept = $_POST['dept'];
        $role = $_POST['role'];

        $statement = $con->prepare("UPDATE employees set lname=?, fname=?, mname=?,email=? ,Gender=? ,mobile=? , office=?, dept_ID=? ,permission_ID=?  
         WHERE id=?");

        $data = array($lname, $fname, $mname, $email, $gender, $mobile, $office, $dept, $role, $id);
        $result = $statement->execute($data);
    }
}

if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM employees where id='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['id'];
        $output['lname'] = $row['lname'];
        $output['fname'] = $row['fname'];
        $output['mname'] = $row['mname'];
        $output['Gender'] = $row['Gender'];
        $output['email'] = $row['email'];
        $output['mobile'] = $row['mobile'];
        $output['office'] = $row['office'];
        $output['dept'] = $row['dept_ID'];
        $output['role'] = $row['permission_ID'];
    }
    echo json_encode($output);
}


if (isset($_POST['restrict_id'])) {
    $id = $_POST['restrict_id'];

    $statement = $con->prepare('UPDATE employees set isActive=? where id=?');
    $data = array('No', $id);
    $result = $statement->execute($data);
}

if (isset($_POST['activate_id'])) {
    $id = $_POST['activate_id'];

    $statement = $con->prepare('UPDATE employees set isActive=? where id=?');
    $data = array('Yes', $id);
    $result = $statement->execute($data);
}
