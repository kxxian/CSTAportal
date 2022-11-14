<?php
    session_start();
    require_once("includes/connect.php");

    $username=htmlspecialchars(trim($_POST['username']));
    $pass=sha1(htmlspecialchars(trim($_POST['password'])));
    $verified="Verified";
    $isAdmin=$_POST['isAdmin'];
    $approved="APPROVED";

    if($isAdmin=="admin"){
    //validation
    try{
        $sql="select * from employees where username=? and pass=?";
        $data=array($username,$pass);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $rc=$stmt->rowCount();
       
        if($rc<=0){
            header('location:login.php?login=1');
        }else{
            $row=$stmt->fetch();

            $_SESSION['username']=$row['username'];
            $_SESSION['password']=$row['pass'];
			/* $_SESSION['dept'] = $row['dept_ID']; */
            

            header('location:../backoffice/index.php');
        }
    }
    catch(PDOException $e){
        $e->getMessage();
    }


    }else{
         //validation
    try{
        $sql="select * from students where username=? and pass=? and status=? and isAccepted=?";
        $data=array($username,$pass,$verified,'1');
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $rc=$stmt->rowCount();
       
        if($rc<=0){
            header('location:login.php?login=1');
        }else{
            $row=$stmt->fetch();

            $_SESSION['username']=$row['username'];
            $_SESSION['password']=$row['pass'];
            

            header('location:index.php');
        }
    }
    catch(PDOException $e){
        $e->getMessage();
    }

    }
