<?php

require_once('includes/connect.php');

// if (!empty($_POST)) {

    
    $empnum = htmlspecialchars(trim($_POST['empNum']));
    $lname = htmlspecialchars(trim($_POST['l_name']));
    $fname = htmlspecialchars(trim($_POST['f_name']));
    $mname = htmlspecialchars(trim($_POST['m_name']));
    $dob = $_POST['dob'];
    $religion = htmlspecialchars(trim($_POST['religion']));
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $username = htmlspecialchars(trim($_POST['uname']));
    $password = sha1(trim($_POST['pwd']));
    
    try {

        $sql = "INSERT INTO employees (empnum,lname,fname,mname,dob,religion,gender,dept,mobile,username,pass)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $data = array($empnum,$lname,$fname,$mname,$dob,$religion,$gender,$department,$mobile,$username,$password);
        $stmt->execute($data);

        header('location: employees.php');
        
    } catch(PDOException $error){
        
        echo $error->getMessage();
    }
    
//}
?>