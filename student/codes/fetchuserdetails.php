<?php
//  require_once('includes/connect.php');
if (!isset($_SESSION)) {
    session_start();
}

try {

    $sql = "select * from vwstudents where username=? and pass=? ";
    $data = array($_SESSION['username'], $_SESSION['password']);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    $row = $stmt->fetch();

    $sid = $row['id'];
    $fullname = $row['fname'] . ' ' . $row['lname'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $address = strtolower($row['completeaddress']);
    $region = $row['region'];
    $snum = $row['snum'];

    $bdate = date_create($row['bday']);
    $bday = date_format($bdate, "F j, Y");
    $username = $row['username'];
    $yrlevel = $row['yrlevel'];
    $course = $row['course'];
    $guardian = $row['guardian'];
    $guardiancontact = $row['guardiancontact'];

    if ($row['guardiancontact2'] != "") {
        $guardiancontact2 = ' / ' . $row['guardiancontact2'];
    } else {
        $guardiancontact2 = "";
    }

    $pass = $row['pass'];
} catch (PDOException $e) {
    $e->getMessage();
}

#if student doesn't have student number
if ($snum == "NA") {
    $reqdocu_menu = "hidden";
    $payverif_menu = "";
    $reqgrade_menu = "hidden";
    //sidebar
    $sidebar_schedule = "hidden";
    $sidebar_calendar = "hidden";
} else {
    $reqdocu_menu = "";
    $payverif_menu = "";
    $reqgrade_menu = "";
    //sidebar
    $sidebar_schedule = "";
    $sidebar_calendar = "";
}
