<?php
     require_once('includes/connect.php');

     if(isset($_POST['submit'])){ //adding new semester
         $sem=htmlspecialchars(trim($_POST['txtSem']));     
                        try{
                        $sql=" insert into semester(semester) values(?)";
                        $data=array($sem);
                        $stmt=$con->prepare($sql);
                        $stmt->execute($data);

                        header("location:sysetting.php");

                    }catch(PDOException $e){
                        echo $e->getMessage();
                    
                    }
                }

                
            
        
?>