<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchuserdetails.php');
require_once('includes/fetchstudenttable.php');


//$course=$row['course'];

if (isset($_POST['uploadpayments'])) {


    if ($_POST['payfor'] == 1) {
        $payfor = 'tuitionfee';

        $amount = $_POST['paymentamount'];
        $sy = $_POST['selSY'];
        $sem = $_POST['selSem'];
        $mop = $_POST['selmop'];

        if (!isset($_POST['selterm'])) {
            $term = '1';
        } else {
            $term = $_POST['selterm'];
        }

        $sentthru = $_POST['sentthru'];
        $paymethod = $_POST['paymethod'];
        $dop = $_POST['dop'];
        $note = htmlspecialchars(trim($_POST['tuitionpaynote']));

        try {
            $query = "INSERT into payverif_tuition (sid, amount, schoolyr_ID, semester_ID, paymentmode_ID, term_id, sentvia_ID, paymethod_ID, dop, note)
                values(?,?,?,?,?,?,?,?,?,?)";
            $input = array($sid, $amount, $sy, $sem, $mop, $term, $sentthru, $paymethod, $dop, $note);
            $statement = $con->prepare($query);
            $statement->execute($input);

            function upload($fname, $newname)
            { // upload tuition fee proof of payment
                $upload_directory = 'uploads/payverif/tuition/';
                if (is_uploaded_file($fname['tmp_name'])) {
                    $filname = basename($fname['name']);
                    $tmp = explode('.', $fname['name']);
                    $uploadfile = $upload_directory . $newname . "." . end($tmp);

                    if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {

                        $_SESSION['status'] = "Proof of Payment Uploaded!";
                        $_SESSION['status_code'] = "success";
                        header('location:payverif.php');
                    } else {
                        $_SESSION['status'] = "Proof of Payment Not Uploaded!";
                        $_SESSION['status_code'] = "error";
                        header('location:payverif.php');
                    }
                }
            }
            $newname = ($payfor . '-' . $sid . '-' . $sy . '-' . $sem.'-'. $term);
            if ($_FILES['paymentproof']['name'] != "") {
                $msg = upload($_FILES['paymentproof'], $newname);
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    } else if ($_POST['payfor'] == 2) {
        $reqform = 'requestform_'; // file prefixes
        $others = 'otherpayments_'; // file prefixes
        ;
        $checkboxselect = $_POST['others'];
        $chk = "";
        foreach ($checkboxselect as $chkothers) {
            $chk .= '-' . $chkothers . ", ";
        }


        $amount = $_POST['paymentamount'];
        $sentthru = $_POST['sentthru'];
        $paymethod = $_POST['paymethod'];
        $dop = $_POST['dop'];
        $note = htmlspecialchars(trim($_POST['tuitionpaynote']));

        try {
            $query = "INSERT into payverif_others (sid, particulars, amount, sentvia_ID, paymethod_ID, dop, note)
            values(?,?,?,?,?,?,?)";
            $input = array($sid, $chk, $amount, $sentthru, $paymethod, $dop, $note);
            $statement = $con->prepare($query);
            $statement->execute($input);

            function uploadreqform($fname, $newname)
            { // upload REQUESTFORM
                $upload_directory = 'uploads/payverif/requestform/';
                if (is_uploaded_file($fname['tmp_name'])) {
                    $filname = basename($fname['name']);
                    $tmp = explode('.', $fname['name']);
                    $uploadfile = $upload_directory . $newname . "." . end($tmp);

                    if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {

                        //  echo "<script>alert('Proof of Payment Successfully Uploaded!');document.location='payverif.php'</script>";
                    } else {
                        // echo "<script>alert('Failed to upload!');document.location='payverif.php'</script>";    
                    }
                }
            }
            $newname = ($reqform . sha1($chk . '-' . $sid . '-' . $snum . '-' . $username . '-' . $mobile)); //naming the requestform
            if ($_FILES['uploadreqform']['name'] != "") {
                $msg = uploadreqform($_FILES['uploadreqform'], $newname);
            }


            function uploadotherpayment($fname, $newname1)
            { // upload others paymentproof
                $upload_directory = 'uploads/payverif/others/';
                if (is_uploaded_file($fname['tmp_name'])) {
                    $filname = basename($fname['name']);
                    $tmp = explode('.', $fname['name']);
                    $uploadfile = $upload_directory . $newname1 . "." . end($tmp);

                    if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {


                        $_SESSION['status'] = "Proof of Payment Uploaded!";
                        $_SESSION['status_code'] = "success";
                        header('location:payverif.php');
                    } else {
                        $_SESSION['status'] = "Proof of Payment Not Uploaded!";
                        $_SESSION['status_code'] = "error";
                        header('location:payverif.php');
                    }
                }
            }
            $newname1 = ($others . sha1($chk . '-' . $sid . '-' . $snum . '-' . $username . '-' . $mobile)); //naming the payment proof for other payments
            if ($_FILES['paymentproof']['name'] != "") {
                $msg = uploadotherpayment($_FILES['paymentproof'], $newname1);
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
