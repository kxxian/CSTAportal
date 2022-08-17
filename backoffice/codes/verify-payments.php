<?php

require_once '../includes/connect.php';

// current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');


if (isset($_POST['verifypayment'])) {

    $id = htmlspecialchars(trim($_POST['pv_ID']));
    $verif_code = htmlspecialchars(trim($_POST['verif_code']));

    try {
        $sql = "UPDATE paymentverif set payment_status=?, verif_code=?, date_verified=? where pv_ID =?";
        $data = array("Verified", $verif_code, $date, $id);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        session_start();

        $_SESSION['status'] = "Payment Verified";
        $_SESSION['status_code'] = "success";

        header("location:../received-payments.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
