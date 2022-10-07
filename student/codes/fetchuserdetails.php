<?php
       session_start();
    //    require_once('includes/connect.php');
       try{
        $sql="select * from vwstudents where username=? and pass=? ";
        $data=array($_SESSION['username'],$_SESSION['password']);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        
        $sid=$row['id'];
        $fullname=$row['fname'].' '.$row['lname'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $address=strtolower($row['completeaddress']);
        $region=$row['region'];
        $snum=$row['snum'];

        $bdate=date_create($row['bday']);
        $bday= date_format($bdate,"F j, Y");
        $username=$row['username'];
        $yrlevel=$row['yrlevel'];
        $course=$row['course'];  
        $guardian=$row['guardian'];  
        $guardiancontact=$row['guardiancontact'];
        $pass=$row['pass'];
       }
       
       catch(PDOException $e){
           $e->getMessage();
       }

    

?>