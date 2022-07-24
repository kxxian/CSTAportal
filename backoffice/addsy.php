<?php
session_start();
     require_once('includes/connect.php');

     if(isset($_POST['submit'])){ //adding new schoolyear
         $sy=htmlspecialchars(trim($_POST['txtSY']));     
                        try{
                        $sql=" insert into schoolyr(schoolyr) values(?)";
                        $data=array($sy);
                        $stmt=$con->prepare($sql);
                        $stmt->execute($data);

                        $_SESSION['status'] = "School Year Added!";
                        $_SESSION['status_code'] = "success";
                        header('location:sysetting.php');

                    }catch(PDOException $e){
                        echo $e->getMessage();
                    
                    }
                }

                
            
        
?>