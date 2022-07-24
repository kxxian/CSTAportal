<?php
//session_start();
require_once('includes/connect.php');
require_once('includes/fetchuserdetails.php');
require_once('includes/fetchstudenttable.php');
require_once('includes/functions.php');


if (isset($_POST['submit'])) {

   $coursedoc=$_POST['selcourse'];
   $yeargrad=htmlspecialchars(trim($_POST['yearGrad']));
   $lastSchool=htmlspecialchars(trim($_POST['lastSchool']));

    if (isset($_POST['doc'])) {
        $documents = implode(", ", $_POST['doc']);
    } else {
        $documents = ".";
    }

    if (isset($_POST['purpose'])) {
        $purpose = implode(", ", $_POST['purpose']);
    } else {
        $purpose = htmlspecialchars(trim($_POST['otherpurpose']));;
    }

    


    try {

        $sql = "INSERT INTO docreq (sid,course_ID,year_graduated,lastschool,requesteddocs,purpose)VALUES(?,?,?,?,?,?)";
        $data = array($sid, $coursedoc, $yeargrad, $lastSchool, $documents,$purpose);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $newname = $con->lastInsertId();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $_SESSION['status'] = "Request Sent!";
    $_SESSION['status_code'] = "success";
    header('location:requestdocument.php');
}
