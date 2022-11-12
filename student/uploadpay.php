<?php
// session_start();
require_once('includes/connect.php');
require_once('codes/fetchuserdetails.php');
require_once('codes/fetchstudenttable.php');
require_once('includes/functions.php');



if (isset($_POST['sendpay'])) {
    $paynum = $_POST['paynumsearch'];


    if (isset($_POST['selsy'])) {
        $pay_sy = $_POST['selsy'];
    } else {
        $pay_sy = '-';
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

    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');
    
    $tfeeamount = htmlspecialchars(trim($_POST['tfeeamount']));
    $total_others = htmlspecialchars(trim($_POST['totalothers']));
    $amountdue = $_POST['totaldue'];
    $amtpaid = htmlspecialchars(trim($_POST['amtpaid']));;
    $sentthru = $_POST['sentthru'];
    $paymethod = $_POST['paymethod'];
    $dop = $_POST['DoP'];
    $top = $_POST['ToP'];
    $notes = $_POST['note'];

    if (isset($_POST['otherpart'])) {
        $particulars = ucwords($_POST['otherpart']);
    } else {
        $particulars = "-";
    }


    //insert new payment
    if ($paynum == "") {
        try {
            //Generate Tracking number key
            $random = (time() + rand(1, 4294967295));

            $sql = "INSERT INTO paymentverif (sid,paynum,date_of_payment,time_of_payment,schoolyr,semester_ID,terms_ID,tfeeamount,particulars,particulars_total,sentvia_ID,paymethod_ID,note,gtotal,amtpaid,date_sent) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $data = array($sid, $random, $dop, $top, $pay_sy, $pay_sem, $payterm, $tfeeamount, $particulars, $total_others, $sentthru, $paymethod, $notes, $amountdue, $amtpaid, $date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $newname = $con->lastInsertId();

            if ($_FILES['paymentproof']['name']) {
                $msg = uploadpayment($_FILES['paymentproof'], $newname);
            }

            if ($_FILES['reqform']['name']) {
                $msg = uploadreqform($_FILES['reqform'], $newname);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $_SESSION['status'] = "Success!";
        $_SESSION['msg'] = "Payment Sent!";
        $_SESSION['status_code'] = "success";
        header('location:payverif.php');




        //update payment
    } else {
        $sql1 = "SELECT pv_ID from paymentverif where paynum=?";
        $data1 = array($paynum);
        $stmt1 = $con->prepare($sql1);
        $stmt1->execute($data1);
        $row1 = $stmt1->fetch();
        $id = $row1['pv_ID'];


        try {

            $sql = "UPDATE paymentverif SET sid=?,date_of_payment=?,time_of_payment=?,schoolyr=?,semester_ID=?,terms_ID=?,tfeeamount=?,particulars=?,particulars_total=?,sentvia_ID=?,paymethod_ID=?,note=?,gtotal=?,amtpaid=?,date_sent=? WHERE paynum=?";
            $data = array($sid, $dop, $top, $pay_sy, $pay_sem, $payterm, $tfeeamount, $particulars, $total_others, $sentthru, $paymethod, $notes, $amountdue, $amtpaid, $date, $paynum);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            // $newname = $con->lastInsertId();

            if ($_FILES['paymentproof']['name']) {
                $msg = uploadpayment($_FILES['paymentproof'], $id);
            }

            if ($_FILES['reqform']['name']) {
                $msg = uploadreqform($_FILES['reqform'], $id);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $_SESSION['status'] = "Success!";
        $_SESSION['msg'] = "Payment Details Updated!";
        $_SESSION['status_code'] = "success";
        header('location:payverif.php');
    }
}
