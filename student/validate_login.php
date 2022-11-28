<?php
    session_start();
    require_once("includes/connect.php");

    $username=htmlspecialchars(trim($_POST['username']));
    $pass=sha1(htmlspecialchars(trim($_POST['password'])));
    $verified="Verified";
    $isAdmin=$_POST['isAdmin'];
    $approved="APPROVED";


    // //validation
    // try{
    //     $sql="select * from employees where username=? and pass=?";
    //     $data=array($username,$pass);
    //     $stmt=$con->prepare($sql);
    //     $stmt->execute($data);
    //     $rc=$stmt->rowCount();
       
    //     if($rc<=0){
    //         header('location:login.php?login=1');
    //     }else{
    //         $row=$stmt->fetch();

    //         $_SESSION['username_admin']=$row['username'];
    //         $_SESSION['password_admin']=$row['pass'];
	// 		/* $_SESSION['dept'] = $row['dept_ID']; */
            

    //         header('location:../backoffice/index.php');
    //     }
       
    // }
    // catch(PDOException $e){
    //     $e->getMessage();
    // }
    // $con= null;


         //validation
    try{
        $sql="select * from students where username=? and pass=?";
        $data=array($username,$pass);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        $rc=$stmt->rowCount();
       
        $isAccepted = $row['isAccepted'];
        $status = $row['status'];

        
        if ($rc <= 0) {
            header('location:login.php?login=1');
        } else if (($rc > 0) && ($status == 'Pending' || $isAccepted == 0)) {
            header('location:login.php?new=1');
        } else if ($rc >0 && $status == 'Verified' && $isAccepted == 1) {


            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['pass'];


            header('location:index.php');
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
   

