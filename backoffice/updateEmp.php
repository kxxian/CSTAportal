<?php
require_once('includes/connect.php');

$id=(int)$_POST['txtempId'];
$empnum=htmlspecialchars(trim($_POST['txtEmpnum']));
$lname=htmlspecialchars(trim($_POST['txtlname']));
$fname=htmlspecialchars(trim($_POST['txtfname']));
$mname=htmlspecialchars(trim($_POST['txtmname']));
$dob=$_POST['dob'];
$religion=htmlspecialchars(trim($_POST['txtreligion']));
$gender=$_POST['txtgender'];
$department=$_POST['txtdept'];
$mobile=htmlspecialchars(trim($_POST['txtMobile']));
$uname=htmlspecialchars(trim($_POST['txtuname']));
$passUpdate=(trim($_POST['txtpass']));
$pass=sha1(trim($_POST['txtpass']));

try{
    if(strlen($passUpdate==0)){
        $sql="UPDATE employees SET empnum=?,lname=?,fname=?,mname=?,dob=?,religion=?,gender=?,dept=?,mobile=?,username=? WHERE id=?";
        $data=array($empnum,$lname,$fname,$mname,$dob,$religion,$gender,$department,$mobile,$uname,$id);
    }else{
        $sql="UPDATE employees SET empnum=?,lname=?,fname=?,mname=?,dob=?,religion=?,gender=?,dept=?,mobile=?,username=?,pass=? WHERE id=?";
        $data=array($empnum,$lname,$fname,$mname,$dob,$religion,$gender,$department,$mobile,$uname,$pass,$id);
    }
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
}catch  (PDOException $error){
    echo $error->getMessage();
}
header('location:employees.php');
?>