<?php
    session_start();
    require_once("includes/connect.php");

    $username=htmlspecialchars(trim($_POST['username']));
    $pass=(trim($_POST['password']));
    $approved="APPROVED";

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
            

            header('location:index.php');
        }
    }
    catch(PDOException $e){
        $e->getMessage();
    }



?>