<?php
// session_start();
require_once('../includes/connect.php');
require_once('../includes/functions.php');
require_once('fetchuserdetails.php'); //get snum value from userdetails(students accounts)
require_once('../codes/fetchcurrentsyandsem.php');


// current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d H:i:s');



if (isset($_POST['enroll']) && isset($_POST['selyrlevel'])) {
    $dept = $_POST['seldept'];
    $selyrlevel = $_POST['selyrlevel'];
    $course = $_POST['selCourse'];

    try {
        $sql = " update students set yrlevel=?, course=? where username=? and pass=?";
        $data = array($selyrlevel, $course, $_SESSION['username'], $_SESSION['password']);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    //count 
    $sqlquery = "select * from vwforenrollment_students where sid=? and schoolyr=? and semester=?";
    $info = array($sid, $currentsyval, $currentsemval);
    $statement = $con->prepare($sqlquery);
    $statement->execute($info);
    $rc = $statement->rowCount(); //counter

    if ($rc == 0) { //if none, insert enrollment entry for the user who is currently logged in  
        try {
            $sql = "INSERT INTO enrollment (sid,snum,mobile,dept_ID,course_ID,schoolyr_ID,semester_ID,date_enrolled)VALUES(?,?,?,?,?,?,?,?)";
            $data = array($sid, $snum, $mobile, $dept, $course, $currentsy, $currentsem, $date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $newname = $con->lastInsertId();

            //upload copy of grade
            if ($_FILES['grade']['tmp_name'] != "") {
                $msg = uploadgrade($_FILES['grade'], $newname);
            }


            //insert notification
            $notif = "You are now in queue for assessment.";
            $icon = "fas fa-check text-white";
            $link="enrollment.php";

            $sql2 = "INSERT INTO notif (sid,notification,icon,link,date)VALUES(?,?,?,?,?)";
            $data2 = array($sid, $notif, $icon,$link, $date);
            $stmt2 = $con->prepare($sql2);
            $stmt2->execute($data2);


            
            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Enrollment Application Sent!";
            $_SESSION['status_code'] = "success";
            header('location:../enrollment.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        try {
            $sql1 = "SELECT enrollment_ID from enrollment where sid=? and schoolyr_ID=? and semester_ID=?";
            $data1 = array($sid, $currentsy, $currentsem);
            $stmt1 = $con->prepare($sql1);
            $stmt1->execute($data1);
            $row1 = $stmt1->fetch();

            $id = $row1['enrollment_ID'];

            $sql = "UPDATE enrollment set dept_ID=?, course_ID=?, date_enrolled=? where sid=? and schoolyr_ID=? and semester_ID=?";
            $data = array($dept, $course, $date, $sid, $currentsy, $currentsem);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);


            //insert notification
            $notif = "You updated your enrollment details.";
            $icon = "fas fa-check text-white";
            $link="enrollment.php";

            $sql2 = "INSERT INTO notif (sid,notification,icon,link,date)VALUES(?,?,?,?,?)";
            $data2 = array($sid, $notif, $icon,$link, $date);
            $stmt2 = $con->prepare($sql2);
            $stmt2->execute($data2);


            if ($_FILES['grade']['name'] != "") {
                $msg = uploadgrade($_FILES['grade'], $id);
            }


            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Enrollment Application Updated!";
            $_SESSION['status_code'] = "success";
            header('location:../enrollment.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
} else if (!isset($_POST['enroll'])) {
    $_SESSION['status'] = "Error!";
    $_SESSION['msg'] = "Enrollment Form Not Sent!";
    $_SESSION['status_code'] = "error";
    header('location:../enrollment.php');
}
