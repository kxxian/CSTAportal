<?php
session_start();
require_once('../includes/connect.php');
require_once('fetchuserdetails.php');
// require_once('includes/fetchstudenttable.php');
 require_once('../includes/functions.php');


if (isset($_POST['submit'])) {

    if (isset($_POST['doc'])) {
        $documents = implode(", ", $_POST['doc']);
    } else {
        $documents = "-";
    }

    if (isset($_POST['ctc'])) {
        $ctc = implode(", ", $_POST['ctc']);
    } else {
        $ctc = "-";
    }

    $pob = ucwords(htmlspecialchars(trim($_POST['birthplace'])));
    $stat = $_POST['studstat'];
    $yearGrad = ucwords(htmlspecialchars(trim($_POST['yearGrad'])));
    $lastSchool = ucwords(htmlspecialchars(trim($_POST['lastSchool'])));
    $tor = ucwords(htmlspecialchars(trim($_POST['tor'])));
    //file-- tor2
    $diploma = $_POST['diploma'];
    $rep = ucwords(htmlspecialchars(trim($_POST['rep'])));
    $repmob = $_POST['repmob'];
    $deladd = ucwords(htmlspecialchars(trim($_POST['deladd'])));
    try {

        $sql = "INSERT INTO tbldocureq (sid,placeofbirth,stud_status,yearGrad,lastSchool,cert,tor_purpose,diploma,auth,deliver_add,receiver_name,contactnum) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $data = array($sid, $pob, $stat, $yearGrad, $lastSchool, $documents, $tor, $diploma, $ctc, $deladd, $rep, $repmob);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $newname = $con->lastInsertId();


        if ($_FILES['tor2']['tmp_name'] !=""){
            $msg= uploadtor($_FILES['tor2'],$newname); 
        } 
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $_SESSION['status'] = "Success!";
    $_SESSION['msg'] = "Request Sent!";
    $_SESSION['status_code'] = "success";
    header('location:../requestdocument.php');
}
