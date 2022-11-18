<?php 
session_start();
require_once('includes/connect.php');
if(!isset($_GET['id'])){
    $_SESSION['status'] = "Oops!";
    $_SESSION['status_code'] = "warning";
   $_SESSION['msg'] = "Undefined schedule id.";
   header('location:index.php');
    $conn->close();
    exit;
}

$delete = $conn->query("DELETE FROM `events` where id = '{$_GET['id']}'");
if($delete){
    $_SESSION['status'] = "Success";
    $_SESSION['status_code'] = "success";
   $_SESSION['msg'] = "Event Deleted";
   header('location:index.php');
}else{
    $_SESSION['status'] = "Error";
    $_SESSION['status_code'] = "serror";
   $_SESSION['msg'] = "Somethng went wrong";
   header('location:index.php');
}
$conn->close();

?>