<?php
       session_start();
       require_once("../includes/connect.php");
       try{
        $sql="select * from vwemployees where username=? and pass=? ";
        $data=array($_SESSION['username'],$_SESSION['password']);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        
        $empid=$row['id'];

        $empname=$row['empname'];
        $dept=$row['dept'];
        $usertype=$row['role'];
        $Office=$row['office'];
        $useremail=$row['email'];
        $position=$row['position'];
       }
       
       catch(PDOException $e){
           $e->getMessage();
       }

    

?>
