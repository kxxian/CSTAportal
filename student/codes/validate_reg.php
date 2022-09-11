<?php
# database connection
require '../includes/connect.php';

if (isset($_POST['validate'])) {
    $data = explode("^", $_POST['details']);

    # check if an account matches/exists in database
    $sql = "SELECT lname,fname,mname,bday
            FROM   students
            WHERE  lname=? AND fname=? AND mname=? AND  
            bday=?";

    $data = array($data['0'], $data['1'], $data['2'], $data['3']);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);


    if ($stmt->rowCount() > 0) {
        echo "<span style='color: #df4759; font-weight:bold'>A user matched your registration. Forgot your password? Click <a href='forgot-password.php'>here</a></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}


if (isset($_POST['validate2'])) {
    $data2 = explode("^", $_POST['mobem']);

    # check if mobile number already registered to a user
    $sql2 = "SELECT mobile
            FROM  students
            WHERE mobile=?";

    $data2 = array($data2['0']);
    $stmt2 = $con->prepare($sql2);
    $stmt2->execute($data2);
    
    if ($stmt2->rowCount() > 0) {
        echo "<span style='color: #df4759; font-weight:bold;'>Mobile number already registered</span>        ";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }

    $data2 = explode("^", $_POST['mobem']);
    # check if email already registered to a student
    $sql3 = "SELECT email
            FROM  students
            WHERE email=?";

    $data2 = array($data2['1']);
    $stmt3 = $con->prepare($sql3);
    $stmt3->execute($data2);


    if ($stmt3->rowCount() > 0) {
        echo "
        
        <span class='float-right' style='color: #df4759; font-weight:bold; text-align:right'>Email already registered</span>
        
        ";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
    }
}


if (isset($_POST['validate3'])) {
    $snum =  $_POST['snum'];

    # check if student number already registered to a student
    $sql2 = "SELECT snum
            FROM  students
            WHERE snum=?";

    $data3 = array($snum);
    $stmt3 = $con->prepare($sql2);
    $stmt3->execute($data3);
    
    if ($stmt3->rowCount() > 0) {
        echo "<span style='color: #df4759; font-weight:bold'>Student number is already in use. <a href='forgot-password.php'> Forgot Password?</a></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }

    
}
