<?php
session_start();
     require_once('../includes/connect.php');
      
     if(isset($_GET['id'])){ 
      
         $id=(int)$_GET['id']; 
         
        //echo $id;
        $sql="SELECT * FROM enrollment_switch where switch_ID =? ";
        $data=array($id);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        $status=$row['enrollment_status'];
        
     
        if ($status=="OPEN"){
        try{
            $sql="UPDATE enrollment_switch set enrollment_status='CLOSED' where switch_ID=?";
            $data=array($id);
            $stmt=$con->prepare($sql);
            $stmt->execute($data);

            $_SESSION['status'] = "Enrollment Closed!";
            $_SESSION['status_code'] = "success";
            header('location:../acadyear.php');


        }catch(PDOException $e){
            echo $e->getMessage();
        
        }
    }else if ($status=="CLOSED"){
            try{
                $sql="UPDATE enrollment_switch set enrollment_status='OPEN' where switch_ID=?";
                $data=array($id);
                $stmt=$con->prepare($sql);
                $stmt->execute($data);
    
                $_SESSION['status'] = "Enrollment Opened!";
                $_SESSION['status_code'] = "success";
                header('location:../acadyear.php');
    
    
            }catch(PDOException $e){
                echo $e->getMessage();
            
            }

        }



     }else{

     }

                
  
                
            
        
?>