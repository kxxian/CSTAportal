<?php
        // session_start(); 
        $host="localhost:3307"; 
        $dbase="studentportal"; 
        $user="root"; 
        $pwd = ""; 
       
       $dsn="mysql:host={$host};dbname={$dbase}";
       try{
           $con=new PDO($dsn,$user,$pwd);
          
       }catch(PDOException $e){
           echo $e->getMessage();
       }
       
       try{
        $sql="select * from vwemployees where username=? and pass=? ";
        $data=array($_SESSION['username_admin'],$_SESSION['password_admin']);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        
        $empid=$row['id'];
        $empname=$row['empname'];
		$deptid=$row['deptid'];
        $dept=$row['dept'];
        $deptemail=$row['dept_email'];
        $usertype=$row['role'];
        $Office=$row['office'];
        $useremail=$row['email'];
        $position=$row['position'];
        $mobile=$row['mobile'];
       }
       
       catch(PDOException $e){
           $e->getMessage();
       }

    

?>
