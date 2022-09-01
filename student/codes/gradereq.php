<?php
require_once('../includes/connect.php');
require_once('../codes/fetchuserdetails.php'); //get snum value from userdetails(students accounts)
require_once('../codes/fetchcurrentsyandsem.php');
require_once('../codes/fetchstudenttable.php');



if (isset($_POST['submit'])) {
   
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');


    //count 
    $sqlquery = "select * from vwgradereq where sid=? and schoolyr=? and semester=?";
    $info = array($sid, $currentsyval,$currentsemval);
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
            header('location:../gradesrequest.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
} else {
    $_SESSION['status'] = "Grade Request Not Sent!";
    $_SESSION['status_code'] = "error";
    header('location:enrollment.php');
}
