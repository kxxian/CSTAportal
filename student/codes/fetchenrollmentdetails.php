<?php
try {

    $sql = "select * from vwforenrollment_students where sid=? and schoolyr=? and semester=? ";
    $data = array($sid, $currentsyval, $currentsemval);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    $row = $stmt->fetch();
    $count = $stmt->rowCount();


    //  $enroll_count=$count;


    // if ($count < 1) {
    //     $reqdocu_menu = "hidden";
    //     $payverif_menu = "hidden";
    //     $reqgrade_menu = "hidden";
    //     $sidebar_schedule = "hidden";
    //     $sidebar_calendar="hidden";
    // } else {
    //     $enrollment_status = $row['enrollment_status'];

    //     if ($enrollment_status == "Validating Requirements") {
    //         $reqdocu_menu = "hidden";
    //         $payverif_menu = "hidden";
    //         $reqgrade_menu = "hidden";
    //         //sidebar
    //         $sidebar_schedule = "hidden";
    //         $sidebar_calendar="hidden";
    //     } elseif ($enrollment_status == "Assessment") {
    //         $reqdocu_menu = "hidden";
    //         $payverif_menu = "hidden";
    //         $reqgrade_menu = "hidden";
    //         //sidebar
    //         $sidebar_schedule = "hidden";
    //         $sidebar_calendar="hidden";
    //     } elseif ($enrollment_status == "Waiting Payment") {
    //         $reqdocu_menu = "hidden";
    //         $payverif_menu = "";
    //         $reqgrade_menu = "hidden";
    //         //sidebar
    //         $sidebar_schedule = "hidden";
    //         $sidebar_calendar="hidden";
    //     } elseif ($enrollment_status == "Validating") {
    //         $reqdocu_menu = "hidden";
    //         $payverif_menu = "";
    //         $reqgrade_menu = "hidden";
            
    //         $sidebar_schedule = "hidden";
    //         $sidebar_calendar="hidden";
    //     } elseif ($enrollment_status == "Enrolled") {
    //         $reqdocu_menu = "";
    //         $payverif_menu = "";
    //         $reqgrade_menu = "";
    //         $sidebar_schedule = "";
    //         $sidebar_calendar="";
    //     }
    // }
} catch (PDOException $e) {
    $e->getMessage();
}




      
    

?>