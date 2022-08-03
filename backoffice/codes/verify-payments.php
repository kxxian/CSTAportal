<?php
session_start();
require_once '../includes/connect.php';


if (isset($_POST['verifypayment']) && isset($_POST['verif_code']) ) {


    $id= htmlspecialchars(trim($_POST['pv_ID']));
    $verif_code=htmlspecialchars(trim($_POST['verif_code']));

    try{
        $sql = "UPDATE paymentverif set payment_status=?, verif_code=? where pv_ID =?";
        $data = array("Verified", $verif_code, $id);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);

        $_SESSION['status']="Payment Verified";
        $_SESSION['status_code']="success";

        header("location:../received-payments.php");



    }catch (PDOException $e) {
        echo $e->getMessage();
    }

 
}
