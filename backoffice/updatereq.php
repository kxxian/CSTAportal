<?php
     require_once('includes/connect.php');
      
     if(isset($_GET['id'])){ 
      
         $id=(int)$_GET['id']; 
         
        //echo $id;
        $sql="SELECT * FROM requirements where req_ID =? ";
        $data=array($id);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        $status=$row['isActive'];
        
     
        if ($status=="ACTIVE"){
        try{
            $sql="UPDATE requirements set isActive='INACTIVE' where req_ID=?";
            $data=array($id);
            $stmt=$con->prepare($sql);
            $stmt->execute($data);

            header("location:reqsetting.php");

        }catch(PDOException $e){
            echo $e->getMessage();
        
        }
    }else if ($status=="INACTIVE"){
            try{
                $sql="UPDATE requirements set isActive='ACTIVE' where req_ID=?";
                $data=array($id);
                $stmt=$con->prepare($sql);
                $stmt->execute($data);
    
                header("location:reqsetting.php");
    
            }catch(PDOException $e){
                echo $e->getMessage();
            
            }

        }



     }else{

     }

                
  
                
            
        
?>