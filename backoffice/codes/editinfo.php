<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once '../includes/connect.php';
//fetch record
if (isset($_POST['empid'])) {
    $id = $_POST['empid'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM employees where id=? LIMIT 1");
    $data = array($id);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['id'];
        $output['lname'] = $row['lname'];
        $output['fname'] = $row['fname'];
        $output['mname'] = $row['mname'];
        // $output['bday'] = $row['bday'];
        $output['email'] = $row['email'];
        $output['mobile'] = $row['mobile'];
        // $output['cityadd'] = $row['cityadd'];
        // $output['region'] = $row['region'];
        // $output['district'] = $row['region'];
        // $output['guardian'] = $row['guardian'];
        // $output['gcontact'] = $row['guardiancontact'];

    }
    echo json_encode($output);
}

if (isset($_POST['save'])) {
    $id = $_POST['user_id'];
    $pass = sha1(htmlspecialchars(trim($_POST['password'])));

    //get password of user
    $statement1 = $con->prepare("SELECT pass from employees where id=?");
    $data1 = array($id);
    $statement1->execute($data1);
    $row1 = $statement1->fetch();
    $checkpass = $row1['pass'];

    if ($pass == $checkpass) {
        try {
            $id = $_POST['user_id'];
            $lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
            $fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
            $mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];

            $statement = $con->prepare("UPDATE employees set lname=?,fname=?,mname=?, email=?, mobile=? where id=?");
            $data = array($lname, $fname, $mname, $email, $mobile, $id);
            $statement->execute($data);

            $_SESSION['status'] = "Success!";
            $_SESSION['status_code'] = "success";
            $_SESSION['msg'] = "Information Updated!";
            header('location: ../profile.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        
        $_SESSION['status'] = "Oops!";
        $_SESSION['status_code'] = "warning";
        $_SESSION['msg'] = "Incorrect Password!";
        header('location: ../profile.php');

    }
}
