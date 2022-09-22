<?php
session_start();
require_once('includes/connect.php');

//Verification process
if (isset($_GET['vkey'])){
$vkey = $_GET['vkey'];

$sql = "SELECT vkey,status from students where vkey=? AND status=? LIMIT 1";
$data = array($vkey,'Pending');
$stmt = $con->prepare($sql);
$stmt->execute($data); 
$count=$stmt->rowCount();

//Verify the student with same vkey
if ($count==1){
    $update = "UPDATE students set status=? where vkey=? LIMIT 1";
    $data = array('Verified', $vkey);
    $stmt = $con->prepare($update);
    $stmt->execute($data); 

    if($update){
        //echo "Account Verified";
        header("Location:login.php");
        $_SESSION['status'] = "Success!";
        $_SESSION['msg']="Account Verified!";
        $_SESSION['status_code'] = "success";
    }
}else{
    header("Location:login.php"); 
    $_SESSION['status'] = "Oops!";
    $_SESSION['msg']="Invalid link!";
    $_SESSION['status_code'] = "warning";

}



}else{
    header("Location:login.php"); 
    // $_SESSION['status'] = "Something went wrong. Please try again!";
    // $_SESSION['status_code'] = "error";
}