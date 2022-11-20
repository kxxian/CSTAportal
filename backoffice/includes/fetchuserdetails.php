<?php
       /* //session_start(); */
       /* require_once("../includes/connect.php"); */
       try{
        $sql="select * from vwemployees where username=? and pass=? ";
        $data=array($_SESSION['username_admin'],$_SESSION['password_admin']);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        
        $eid=$row['id'];
        $empname=$row['empname'];
        $deptid=$row['deptid'];
        $dept=$row['dept'];
        $usertype=$row['role'];
        $Office=$row['office'];
       }
       
       catch(PDOException $e){
           $e->getMessage();
       }

    

?>
