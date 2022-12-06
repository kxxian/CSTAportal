<?php
session_start();
require("includes/connect.php");

$username = htmlspecialchars(trim($_POST['username']));
$pass = sha1(trim($_POST['password']));
$approved = "APPROVED";
// current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d H:i:s');
//validation
try {
    $sql = "select * from employees where username=? and pass=?";
    $data = array($username, $pass);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    $rc = $stmt->rowCount();

    if ($rc <= 0) {
        header('location:login.php?login=1');
    } else {
        $row = $stmt->fetch();

        $_SESSION['username_admin'] = $row['username'];
        $_SESSION['password_admin'] = $row['pass'];
        $_SESSION['user_token'] = sha1($username.$date);

        $sql = "select * from user_login where username=? and pass=?";
        $data = array($row['username'], $row['pass']);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $tokencount=$stmt->rowCount();

        if ($tokencount==0){
            $sql = "INSERT into user_login (username, pass, user_token) values(?,?,?)";
            $data = array($username,$pass,$_SESSION['user_token']);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);

        }else{
            $sql = "UPDATE user_login set username=?, pass=?, user_token=?, login_time=? where username=? and pass=? ";
            $data = array($username,$pass,$_SESSION['user_token'],$date,$username,$pass);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);

        }


        /* $_SESSION['dept'] = $row['dept_ID']; */


        header('location:../backoffice/index.php');
    }
} catch (PDOException $e) {
    $e->getMessage();
}
$con = null;
