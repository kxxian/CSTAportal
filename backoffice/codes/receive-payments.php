<?php
require_once '../includes/connect.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");


use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['pv_ID'])) {
        $pv_ID = $_POST['pv_ID'];
        $str = implode(",", $pv_ID,);
        echo $str;

        try {
                $sql = "UPDATE paymentverif set payment_status=? where pv_ID IN ({$str});";
                $data = array("Received");
                $stmt = $con->prepare($sql);
                $stmt->execute($data);
        } catch (PDOException $e) {
                echo $e->getMessage();
        }

        try {
                $sql2 = "SELECT email from vwpayverif where pv_ID IN ({$str});";
                // $data2 = array("Received");
                $stmt2 = $con->prepare($sql2);
                $stmt2->execute();

                $rows=$stmt2->fetchAll();
                // print_r($rows);
                echo "<script>alert('{$rows}')</script>";

        } catch (PDOException $e) {
                echo $e->getMessage();
        }











}
