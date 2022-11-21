<?php
    session_start();
    require("includes/connect.php");

    $username=htmlspecialchars(trim($_POST['username']));
    $pass=sha1(trim($_POST['password']));
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

            $_SESSION['username_admin']=$row['username'];
            $_SESSION['password_admin']=$row['pass'];
			/* $_SESSION['dept'] = $row['dept_ID']; */
            

            header('location:index.php');
        }
    }
    catch(PDOException $e){
        $e->getMessage();
    }



?>
