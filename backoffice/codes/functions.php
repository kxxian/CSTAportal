<?php

function get_users(){
    include '../includes/connect.php';
    $statement=$con->prepare("SELECT * from vwemployees");
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
}

function get_assessments(){
    // session_start();
    include '../includes/connect.php';
    include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwforenrollment_students WHERE dept=? AND enrollment_status=?");
    $data=array($dept,'For Assessment');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
}

function get_enrollments(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwenroll_validate WHERE status=?");
    $data=array('Pending');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
}







