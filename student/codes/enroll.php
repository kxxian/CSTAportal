<?php

require_once('../includes/connect.php');
require_once('../codes/fetchuserdetails.php'); //get snum value from userdetails(students accounts)
require_once('../codes/fetchcurrentsyandsem.php');
date_default_timezone_set("Etc/GMT-8");

if (isset($_POST['enroll'])  && isset($_POST['selCourse'])) {
    $dept = $_POST['seldept'];
    $course = $_POST['selCourse'];

    $date = date("m-d-y");
    $DE="Registered {$date}";

    if ($row['course'] = "*Course  not set") { //set course upon enrollment
        try {
            $sql = " update students set course=? where username=? and pass=?";
            $data = array($course, $_SESSION['username'], $_SESSION['password']);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //count 
    $sqlquery = "select * from vwforenrollment_students where sid=? and schoolyr=? and semester=?";
    $info = array($sid, $currentsyval,$currentsemval);
    $statement = $con->prepare($sqlquery);
    $statement->execute($info);
    $rc = $statement->rowCount(); //counter

    if ($rc == 0) { //if none, insert enrollment entry for the user who is currently logged in  
        try {
            $sql = "INSERT INTO enrollment (sid,snum,mobile,dept_ID,course_ID,schoolyr_ID,semester_ID,date_validated,date_enrolled)VALUES(?,?,?,?,?,?,?,?,?)";
            $data = array($sid, $snum, $mobile,$dept, $course, $currentsy, $currentsem,'Processing', $DE);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);


            $_SESSION['status'] = "Enrollment Form Sent!";
            $_SESSION['status_code'] = "success";
            header('location:../enrollment.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        try {
            $sql = "UPDATE enrollment set dept_ID=?, course_ID=?, date_enrolled=? where sid=? and schoolyr_ID=? and semester_ID=?";
            $data = array($dept, $course, $DE, $sid,$currentsy,$currentsem);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);


            $_SESSION['status'] = "Enrollment Details Updated!";
            $_SESSION['status_code'] = "success";
            header('location:../enrollment.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
} else {
    $_SESSION['status'] = "Enrollment Form Not Sent!";
    $_SESSION['status_code'] = "error";
    header('location:../enrollment.php');
}
