<?php
     require_once('includes/connect.php');
      
     if(isset($_GET['id'])){ 
      
         $id=(int)$_GET['id']; 
         
        //echo $id;
        $sql="SELECT * FROM schoolyr where schoolyr_ID =? ";
        $data=array($id);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        $status=$row['status'];
        
     
        if ($status=="ACTIVE"){
        try{
            $sql="UPDATE schoolyr set status='INACTIVE' where schoolyr_ID=?";
            $data=array($id);
            $stmt=$con->prepare($sql);
            $stmt->execute($data);

            header("location:sysetting.php");

        }catch(PDOException $e){
            echo $e->getMessage();
        
        }
    }else if ($status=="INACTIVE"){
            try{
                $sql="UPDATE schoolyr set status='ACTIVE' where schoolyr_ID=?";
                $data=array($id);
                $stmt=$con->prepare($sql);
                $stmt->execute($data);
    
                header("location:sysetting.php");
    
            }catch(PDOException $e){
                echo $e->getMessage();
            
            }

        }



     }else{

     }

                
  
                
            
        
?>