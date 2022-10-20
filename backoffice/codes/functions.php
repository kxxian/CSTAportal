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

function get_registrations(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwstudents WHERE isAccepted=?");
    $data=array('0');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
}

function get_pendingpayments(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwpayverif WHERE payment_status=?");
    $data=array('Pending');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
}

function get_gradereq(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwgradereq WHERE status=?");
    $data=array('Pending');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
}

function get_docureq(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwdocureq WHERE status=?");
    $data=array('Sent');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
}
function get_clearance(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwclearance WHERE status=?");
    $data=array('Sent');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
}









