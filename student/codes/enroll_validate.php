<?php
// session_start();
require_once('../includes/connect.php');
require_once('../includes/functions.php');
require_once('fetchuserdetails.php'); //get snum value from userdetails(students accounts)
require_once('../codes/fetchcurrentsyandsem.php');


// current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');



if (isset($_POST['ev'])) {

    //count 
    $sqlquery = "select * from vwenroll_validate where sid=? and schoolyr=? and semester=?";
    $info = array($sid, $currentsyval, $currentsemval);
    $statement = $con->prepare($sqlquery);
    $statement->execute($info);
    $rc = $statement->rowCount(); //counter

    if ($rc == 0) { //if none, insert enrollment entry for the user who is currently logged in  
        try {
            $sql = "INSERT INTO enrollment_validation (sid,schoolyr_ID,semester_ID,date_sent)VALUES(?,?,?,?)";
            $data = array($sid, $currentsy, $currentsem, $date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $newname = $con->lastInsertId();




            // if ($_FILES['enroll_receipt']['tmp_name'] != "") {
            //     $msg = validate_enroll_receipt($_FILES['enroll_receipt'], $newname);
            // }

            // if ($_FILES['enroll_assessment_form']['tmp_name'] != "") {
            //     $msg = validate_enroll_assessment($_FILES['enroll_assessment_form'], $newname);
            // }


            if ($_FILES['enroll_receipt']['tmp_name'] != "" || $_FILES['enroll_assessment_form']['tmp_name'] != "") {
                $msg = validate_enroll_receipt($_FILES['enroll_receipt'], $newname);
                $msg2 = validate_enroll_assessment($_FILES['enroll_assessment_form'], $newname);

                $sql = "UPDATE  enrollment_validation set `OR`=?, assessment=? where ev_ID=?";
                $data = array($msg, $msg2, $con->lastInsertId());
                $stmt = $con->prepare($sql);
                $stmt->execute($data);
            } else {
                $msg = "";
                $msg2 = "";
            }

            //update enrollment_status to validating
            $sql3 = "UPDATE enrollment set enrollment_status=? where sid=? and schoolyr_ID=? and semester_ID=?";
            $data3 = array("Validating", $sid, $currentsy, $currentsem);
            $stmt3 = $con->prepare($sql3);
            $stmt3->execute($data3);










            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Enrollment Validation Sent!";
            $_SESSION['status_code'] = "success";
            header('location:../enrollment.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }





        //insert notification
        $notif = "We are now validating your enrollment!";
        $icon = "fas fa-check text-white";
        $link = "enrollment.php";

        $sql2 = "INSERT INTO notif (sid,notification,icon,link,date)VALUES(?,?,?,?,?)";
        $data2 = array($sid, $notif, $icon, $link, $date);
        $stmt2 = $con->prepare($sql2);
        $stmt2->execute($data2);
    } else {
        try {
            $sql1 = "SELECT ev_ID from enrollment_validation where sid=? and schoolyr_ID=? and semester_ID=?";
            $data1 = array($sid, $currentsy, $currentsem);
            $stmt1 = $con->prepare($sql1);
            $stmt1->execute($data1);
            $row1 = $stmt1->fetch();

            $id = $row1['ev_ID'];

            $sql = "UPDATE enrollment_validation set date_sent=? where sid=? and schoolyr_ID=? and semester_ID=?";
            $data = array($date, $sid, $currentsy, $currentsem);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);


            if ($_FILES['enroll_receipt']['tmp_name'] != "") {
                $msg = validate_enroll_receipt($_FILES['enroll_receipt'], $id);
            }

            if ($_FILES['enroll_assessment_form']['tmp_name'] != "") {
                $msg = validate_enroll_assessment($_FILES['enroll_assessment_form'], $id);
            }

            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Enrollment Validation Updated!";
            $_SESSION['status_code'] = "success";
            header('location:../enrollment.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
} else {
    $_SESSION['status'] = "Error!";
    $_SESSION['msg'] = "Enrollment Form Not Sent!";
    $_SESSION['status_code'] = "error";
    header('location:../enrollment.php');
}
