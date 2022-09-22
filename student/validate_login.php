<?php
    session_start();
    require_once("includes/connect.php");

    $username=htmlspecialchars(trim($_POST['username']));
    $pass=sha1(trim($_POST['password']));
    $verified="Verified";

    //validation
    try{
        $sql="select * from students where username=? and pass=? and status=?";
        $data=array($username,$pass,$verified);
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