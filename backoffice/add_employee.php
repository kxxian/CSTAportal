<?php
    require_once('includes/connect.php');

    $id=(int)$_POST['txtempID'];
    $empnum=htmlspecialchars(trim($_POST['txtempnum']));
    $lname=htmlspecialchars(trim($_POST['txtlname']));
    $fname=htmlspecialchars(trim($_POST['txtfname']));
    $mname=htmlspecialchars(trim($_POST['txtmname']));
    $dept=$_POST['dept'];
    $uname=htmlspecialchars(trim($_POST['txtuname']));
    $pass=sha1(trim($_POST['txtpass']));


    try{

    $sql="INSERT INTO employees (empnum,lname,fname,mname,dept,username,pass)VALUES(?,?,?,?,?,?,?)";
    $data=array($empnum,$lname,$fname,$mname,$dept,$uname,$pass);
    $stmt=$con->prepare($sql);
    $stmt->execute($data);

}catch(PDOException $e){
    echo $e->getMessage();

}
//header("location:employees.php")






?>