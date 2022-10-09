<?php
// session_start();
require_once('../includes/connect.php');

// require("mailer/PHPMailer/src/PHPMailer.php");
// require("mailer/PHPMailer/src/SMTP.php");
// require("mailer/PHPMailer/src/Exception.php");


// use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['accept_id'])){
    $sql = "UPDATE students set isAccepted=? where id=?";
    $data = array('1',$_POST['accept_id']);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);


}

if (isset($_POST['decline_id'])){
    $sql = "DELETE FROM students where id=?";
    $data = array($_POST['decline_id']);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
}
