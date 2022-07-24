<?php

       session_start();
       require_once("includes/connect.php");
       try{
        $sql="select * from vwstudents where username=? and pass=? ";
        $data=array($_SESSION['username'],$_SESSION['password']);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        $fullname=$row['fullname'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $address=strtolower($row['completeaddress']);
        $snum=$row['snum'];
        $bday=$row['bday'];
        $username=$row['username'];        
       
       }
       
       catch(PDOException $e){
           $e->getMessage();
       }

    

?>