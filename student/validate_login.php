<?php
session_start();
require_once("includes/connect.php");

$username = htmlspecialchars(trim($_POST['username']));
$pass = sha1(htmlspecialchars(trim($_POST['password'])));
$verified = "Verified";
$isAdmin = $_POST['isAdmin'];
$approved = "APPROVED";

date_default_timezone_set('Asia/Manila');
$date = date('y-m-d H:i:s');

//validation
try {
    $sql = "select * from students where username=? and pass=?";
    $data = array($username, $pass);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
   $row = $stmt->fetch();
    $rc = $stmt->rowCount();

    $isAccepted = $row['isAccepted'];
    $status = $row['status'];


    if ($rc <= 0) {
        header('location:login.php?login=1');
    } else if (($rc > 0) && ($status == 'Pending' || $isAccepted == 0)) {
        header('location:login.php?new=1');
    } else if ($rc > 0 && $status == 'Verified' && $isAccepted == 1) {


       


        // $row = $stmt->fetch();

        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['pass'];
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


        header('location:index.php');
    }
} catch (PDOException $e) {
    $e->getMessage();
}
