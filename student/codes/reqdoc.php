<?php
session_start();
require_once('../includes/connect.php');
require_once('fetchuserdetails.php');
// require_once('includes/fetchstudenttable.php');
require_once('../includes/functions.php');


if (isset($_POST['submit'])) {
    $reqnumsearch = $_POST['reqno'];

    if ($_POST['doc']=="") {
        $documents = "-";
    } else {
        $documents = implode(", ", $_POST['doc']);
    }



    if (isset($_POST['diploma'])) {
        $diploma = $_POST['diploma'];
    } else {
        $diploma = 3;
    }


    if ($_POST['tor']=="") {
        $tor = "-";
    } else {
        $tor = ucwords(htmlspecialchars(trim($_POST['tor'])));
    }



    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');


    $pob = ucwords(htmlspecialchars(trim($_POST['birthplace'])));
    $stat = $_POST['studstat'];
    $yearGrad = ucwords(htmlspecialchars(trim($_POST['yearGrad'])));
    $lastSchool = ucwords(htmlspecialchars(trim($_POST['lastSchool'])));

    //file-- tor2

    $rep = ucwords(htmlspecialchars(trim($_POST['rep'])));
    $repmob = $_POST['repmob'];
    $deladd = ucwords(htmlspecialchars(trim($_POST['deladd'])));

    //Generate Tracking number key
    $random = (time() + rand(1, 4294967295));



    if (!isset($_POST['trans'])) {
        $trans = "-";
    } else {
        $trans = $_POST['trans'];
    }

    if (!isset($_POST['authdocs'])) {
        $auth = "-";
    } else {
        $auth = $_POST['authdocs'];
    }

    if ($reqnumsearch == "") {
        try {

            $sql = "INSERT INTO tbldocureq (sid,requestno,placeofbirth,studstat_ID,yearGrad,lastSchool,cert,trans_ID,tor_purpose,diploma_ID ,auth,deliver_add,receiver_name,contactnum,date_sent) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $data = array($sid, $random, $pob, $stat, $yearGrad, $lastSchool, $documents, $trans, $tor, $diploma, $auth,  $deladd, $rep, $repmob, $date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $newname = $con->lastInsertId();


            if ($_FILES['tor2']['tmp_name'] != "") {
                $msg = uploadtor($_FILES['tor2'], $newname);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $_SESSION['status'] = "Success!";
        $_SESSION['msg'] = "Request Sent!";
        $_SESSION['status_code'] = "success";
        header('location:../requestdocument.php');
    } else {


        $sql1 = "SELECT reqdoc_ID from tbldocureq where requestno=?";
        $data1 = array($reqnumsearch);
        $stmt1 = $con->prepare($sql1);
        $stmt1->execute($data1);
        $row1 = $stmt1->fetch();
        $id = $row1['reqdoc_ID'];

        try {

            $sql = "UPDATE tbldocureq set sid=?,requestno=?,placeofbirth=?,studstat_ID=?,yearGrad=?,lastSchool=?,cert=?,trans_ID=?,tor_purpose=?,diploma_ID=? ,auth=?,deliver_add=?,receiver_name=?,contactnum=?,date_sent=? WHERE requestno=?";
            $data = array($sid, $random, $pob, $stat, $yearGrad, $lastSchool, $documents, $trans, $tor, $diploma, $auth,  $deladd, $rep, $repmob, $date, $reqnumsearch);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            // $newname = $con->lastInsertId();


            if ($_FILES['tor2']['tmp_name'] != "") {
                $msg = uploadtor($_FILES['tor2'], $id);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $_SESSION['status'] = "Success!";
        $_SESSION['msg'] = "Request Updated!";
        $_SESSION['status_code'] = "success";
        header('location:../requestdocument.php');
    }
}
