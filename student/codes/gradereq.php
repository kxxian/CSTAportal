<?php
// session_start();
require_once('../includes/connect.php');
require_once('../codes/fetchuserdetails.php'); //get snum value from userdetails(students accounts)
require_once('../codes/fetchcurrentsyandsem.php');
require_once('../codes/fetchstudenttable.php');



if (isset($_POST['submit'])) {
   
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');

    $sy=$_POST['sy1'];
    $sem=$_POST['sem1'];
    $purpose=trim(htmlspecialchars($_POST['purpose']));

    //count 
    $sqlquery = "select * from vwgradereq where sid=? and schoolyr=? and semester=?";
    $info = array($sid, $currentsyval,$currentsemval);
    $statement = $con->prepare($sqlquery);
    $statement->execute($info);
    $rc = $statement->rowCount(); //counter

   
        try {
            $sql = "INSERT INTO gradereq (sid,schoolyr,semester_ID,purpose,date_req)VALUES(?,?,?,?,?)";
            $data = array($sid, $sy, $sem,$purpose,$date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Grade Request Sent!";
            $_SESSION['status_code'] = "success";
            header('location:../gradesrequest.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    
} else {
    $_SESSION['status'] = "Oops!";
    $_SESSION['msg'] = "Request Not Sent!";
    $_SESSION['status_code'] = "warning";
    header('location:../gradesrequest.php');
}
