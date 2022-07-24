<?php
//session_start();
require_once("includes/connect.php");

if (isset($_GET['id'])) {

    $id = ((int)$_GET['id']);

    try {
        $sql = "select * from vwstudents where id=? ";
        $data = array($id);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch();

        $sid = $row['id'];
        $fullname = $row['fname'] . '  ' . $row['lname'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = strtolower($row['completeaddress']);
        $region = $row['region'];
        $snum = $row['snum'];
        $bday = $row['bday'];
        $username = $row['username'];
        $yrlevel = $row['yrlevel'];
        $course = $row['course'];
        $guardian = $row['guardian'];
        $guardiancontact = $row['guardiancontact'];
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
