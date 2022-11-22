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
    $studtype = $_POST['studtype'];

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

    if ($rc == 0 && $studtype == "Regular") { //if none, insert enrollment entry for the user who is currently logged in  
        try {
            $sql = "INSERT INTO enrollment (sid,snum,studtype,mobile,dept_ID,course_ID,schoolyr_ID,semester_ID,date_enrolled,enrollment_status)VALUES(?,?,?,?,?,?,?,?,?,?)";
            $data = array($sid, $snum, $studtype, $mobile, $dept, $course, $currentsy, $currentsem, $date, "Assessment");
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $newname = $con->lastInsertId();

            //upload copy of grade and insert filename
            if ($_FILES['grade']['tmp_name'] != "") {
                $msg = uploadgrade($_FILES['grade'], $newname);

                $sql = "UPDATE enrollment set grade_copy=? where enrollment_ID=?";
                $data = array($msg, $con->lastInsertId());
                $stmt = $con->prepare($sql);
                $stmt->execute($data);
            }

            //insert notification
            $notif = "You are now in queue for assessment.";
            $icon = "fas fa-check text-white";
            $link = "enrollment.php";
            $color = "bg-success";

            $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
            $data2 = array($sid, $notif, $icon, $color, $link, $date);
            $stmt2 = $con->prepare($sql2);
            $stmt2->execute($data2);

            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Enrollment Application Sent!";
            $_SESSION['status_code'] = "success";
            header('location:../enrollment.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else if (($rc == 0) && ($studtype == "Freshman" || $studtype == "Transferee")) {
        try {
            $sql = "INSERT INTO enrollment (sid,snum,studtype,mobile,dept_ID,course_ID,schoolyr_ID,semester_ID,date_enrolled)VALUES(?,?,?,?,?,?,?,?,?)";
            $data = array($sid, $snum, $studtype, $mobile, $dept, $course, $currentsy, $currentsem, $date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $newname = $con->lastInsertId();

            //upload copy of grade and insert filename
            if ($_FILES['grade']['tmp_name'] != "") {
                $msg = uploadgrade($_FILES['grade'], $newname);

                $sql = "UPDATE enrollment set grade_copy=? where enrollment_ID=?";
                $data = array($msg, $con->lastInsertId());
                $stmt = $con->prepare($sql);
                $stmt->execute($data);
            } else {
                $msg = "";
            }

            //insert notification
            $notif = "We are now validating your requirements.";
            $icon = "fas fa-file-alt text-white";
            $link = "profile.php";
            $color = "bg-warning";

            $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
            $data2 = array($sid, $notif, $icon, $color, $link, $date);
            $stmt2 = $con->prepare($sql2);
            $stmt2->execute($data2);



            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Enrollment Application Sent!";
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
