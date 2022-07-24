<?php
require_once('../includes/connect.php');
require_once('../includes/fetchuserdetails.php'); //get snum value from userdetails(students accounts)
require_once('../includes/fetchcurrentsyandsem.php');
require_once('../includes/fetchstudenttable.php');


date_default_timezone_set("Etc/GMT-8");

if (isset($_POST['submit'])) {
   
    $date=date("m-d-y");


    //count 
    $sqlquery = "select * from vwgradereq where sid=? and schoolyr=?";
    $info = array($sid, $currentsyval);
    $statement = $con->prepare($sqlquery);
    $statement->execute($info);
    $rc = $statement->rowCount(); //counter

    if ($rc == 0) { //if none, insert enrollment entry for the user who is currently logged in  
        try {
            $sql = "INSERT INTO gradereq (sid,schoolyr_ID,semester_ID,yrlevel_ID,course_ID,date_req)VALUES(?,?,?,?,?,?)";
            $data = array($sid, $currentsy, $currentsem, $yrlevelid, $courseid, $date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $_SESSION['status'] = "Grade Request Sent!";
            $_SESSION['status_code'] = "success";
            header('location:gradesrequest.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
} else {
    $_SESSION['status'] = "Enrollment Form Not Sent!";
    $_SESSION['status_code'] = "error";
    header('location:enrollment.php');
}
