<?php
session_start();
require_once('includes/connect.php');

if (isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    //echo $id;
    $sql = "SELECT * FROM requestgrade_switch where switch_ID =? ";
    $data = array($id);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    $row = $stmt->fetch();
    $status = $row['gstatus'];


    if ($status == "OPEN") {
        try {
            $sql = "UPDATE requestgrade_switch set gstatus='CLOSED' where switch_ID=?";
            $data = array($id);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);


            $_SESSION['status'] = "Requesting of Grades Closed!";
            $_SESSION['status_code'] = "success";
            header('location:enrollmentsetting.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else if ($status == "CLOSED") {
        try {
            $sql = "UPDATE requestgrade_switch set gstatus='OPEN' where switch_ID=?";
            $data = array($id);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);

            $_SESSION['status'] = "Requesting of Grades Opened!";
            $_SESSION['status_code'] = "success";
            header('location:enrollmentsetting.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
} else {
}
