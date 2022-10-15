<?php
// session_start();
require_once('../includes/connect.php');
require_once('../codes/fetchuserdetails.php'); //get snum value from userdetails(students accounts)
require_once('../codes/fetchcurrentsyandsem.php');
require_once('../codes/fetchstudenttable.php');



if (isset($_POST['submit'])) {

    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');

    $sy = $_POST['sy1'];
    $sem = $_POST['sem1'];


    //count 
    $sqlquery = "select * from vwgradereq where sid=? and schoolyr=? and semester=?";
    $info = array($sid, $sy, $sem);
    $statement = $con->prepare($sqlquery);
    $statement->execute($info);
    $rc = $statement->rowCount(); //counter

    if ($rc < 1) {
        try {
            $sql = "INSERT INTO gradereq (sid,schoolyr,semester,date_req)VALUES(?,?,?,?)";
            $data = array($sid, $sy, $sem, $date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Grade Request Sent!";
            $_SESSION['status_code'] = "success";
            header('location:../gradesrequest.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }else{
        $_SESSION['status'] = "Oops!";
        $_SESSION['msg'] = "Request already exists!";
        $_SESSION['status_code'] = "warning";
        header('location:../gradesrequest.php');

    }





 } 

//else {
//     $_SESSION['status'] = "Oops!";
//     $_SESSION['msg'] = "Request Not Sent!";
//     $_SESSION['status_code'] = "warning";
//     header('location:../gradesrequest.php');
// }

if (isset($_POST['gradereq_id'])) {
    $sql = "DELETE FROM gradereq where gradereq_ID=?";
    $data = array($_POST['gradereq_id']);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
}
