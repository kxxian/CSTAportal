<?php 
session_start();
require_once('includes/connect.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    $_SESSION['status'] = "Oops!";
    $_SESSION['status_code'] = "warning";
   $_SESSION['msg'] = "No data to save.";
    header('location:index.php');
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `events` (`title`,`description`,`start_datetime`,`end_datetime`) VALUES ('$title','$description','$start_datetime','$end_datetime')";
}else{
    $sql = "UPDATE `events` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
}
$save = $conn->query($sql);
if($save){
    $_SESSION['status'] = "Success!";
    $_SESSION['status_code'] = "success";
   $_SESSION['msg'] = "Even saved successfully.";
    header('location:index.php');
}else{
    $_SESSION['status'] = "Error!";
    $_SESSION['status_code'] = "error";
   $_SESSION['msg'] = "Something went wrong.";
    header('location:index.php');
}
$conn->close();
