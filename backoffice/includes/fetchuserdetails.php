<?php
       //session_start();
       require_once("includes/connect.php");
       try{
        $sql="select * from vwemployees where username=? and pass=? ";
        $data=array($_SESSION['username'],$_SESSION['password']);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        
        //$sid=$row['id'];
        $empname=$row['empname'];
        $dept=$row['dept'];
        // $email=$row['email'];
        // $mobile=$row['mobile'];
        // $address=strtolower($row['completeaddress']);
        // $region=$row['region'];
        // $snum=$row['snum'];
        // $bday=$row['bday'];
        // $username=$row['username'];
        // $yrlevel=$row['yrlevel'];
        // $course=$row['course'];  
        // $guardian=$row['guardian'];  
        // $guardiancontact=$row['guardiancontact'];
        $pass=$row['pass'];
       }
       
       catch(PDOException $e){
           $e->getMessage();
       }

    

?>