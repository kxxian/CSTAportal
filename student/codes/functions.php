<?php

function get_grade_request(){
    // session_start();
    include '../includes/connect.php';
    include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwgradereq WHERE sid=?");
    $data=array($sid);
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
}

function get_users(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from guest_enrollment");
    $data=array();
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
}








