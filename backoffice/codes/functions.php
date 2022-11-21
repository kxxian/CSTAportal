<?php

function get_users(){
    include '../includes/connect.php';
    $statement=$con->prepare("SELECT * from vwemployees");
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();

    $con=null;
}

function get_assessments(){
    // session_start();
    include '../includes/connect.php';
    include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwforenrollment_students WHERE dept=? AND enrollment_status=?");
    $data=array($dept,'Assessment');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_enrollments(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwenroll_validate WHERE status=?");
    $data=array('Pending');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_registrations(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwstudents WHERE isAccepted=?");
    $data=array('0');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_pendingpayments(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwpayverif WHERE payment_status=?");
    $data=array('Pending');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_gradereq(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwgradereq WHERE status=?");
    $data=array('Pending');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_docureq(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwdocureq WHERE status=?");
    $data=array('Sent');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}
function get_clearance(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwclearance WHERE status=?");
    $data=array('Sent');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}
function get_sy(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from schoolyr WHERE isVisible=?");
    $data=array(1);
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_sem(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from semester WHERE isVisible=?");
    $data=array(1);
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_courses(){
    // session_start();
    include '../includes/connect.php';
    //include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from courses WHERE Visible=?");
    $data=array('Visible');
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_announcement(){
    // session_start();
    include '../includes/connect.php';
    include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwannouncements WHERE dept=?");
    $data=array($dept);
    $statement->execute($data);
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_faqs(){
    // session_start();
    include '../includes/connect.php';
   // include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from faq");
    //$data=array($dept);
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_enrollments_guest(){
    // session_start();
    include '../includes/connect.php';
    include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwguest_enrollment_freshman WHERE enrollment_status='Pending' AND deptid='$deptid'");
    //$data=array($dept);
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_enrollments_guest_transferee(){
    // session_start();
    include '../includes/connect.php';
    include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwguest_enrollment_transferee WHERE enrollment_status='Pending' AND deptid='$deptid'");
    //$data=array($dept);
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_enrollments_ce(){
    // session_start();
    include '../includes/connect.php';
    /* include 'fetchuserdetails.php'; */
    $statement=$con->prepare("SELECT * from vwguest_enrollment_ce WHERE enrollment_status='Pending'");
    //$data=array($dept);
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_enrollments_sct(){
    // session_start();
    include '../includes/connect.php';
    include 'fetchuserdetails.php';
    $statement=$con->prepare("SELECT * from vwguest_enrollment_sct WHERE enrollment_status='Pending' AND deptid='$deptid'");
    //$data=array($dept);
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_enrollments_ue(){
    // session_start();
    include '../includes/connect.php';
    /* include 'fetchuserdetails.php'; */
    $statement=$con->prepare("SELECT * from vwguest_enrollment_unitearner WHERE enrollment_status='Pending'");
    //$data=array($dept);
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;
}

function get_checkreq(){
    // session_start();
    include '../includes/connect.php';
     include 'fetchuserdetails.php'; 
    $statement=$con->prepare("SELECT * from vwforenrollment_students WHERE enrollment_status='Validating Requirements'");
    //$data=array($dept);
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
    $con=null;

}






