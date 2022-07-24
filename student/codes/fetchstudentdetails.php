<?php
       require_once("includes/connect.php");
       require_once('codes/fetchcurrentsyandsem.php');
       try{
        $sql="select * from vwforenrollment_students where username=? and password=? and schoolyr=? and semester=? ";
        $data=array($_SESSION['username'],$_SESSION['password'],$currentsyval,$currentsemval);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        $count=$stmt->rowCount();
        //$yrlevel=$row['yrlevel'];
        //$sid=$row['sid'];
        //$course=$row['course'];    
       }
       
       catch(PDOException $e){
           $e->getMessage();
        
       }

       //student status
      if($count==0){
        $color="red";
        $enroll_status="Not Enrolled";
      }
      else{ 

        if($row['enrollment_status']=="Enrolled"){
          $color="#00FF00";
        }else{
          $color="#ffc107";
        }
        $enroll_status=$row['enrollment_status'];
      }

     

     
?>