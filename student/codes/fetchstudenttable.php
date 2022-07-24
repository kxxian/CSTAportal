

<?php
//session_start();
       require_once("includes/connect.php");
       try{
        $sql="select * from students where username=? and pass=? ";
        $data=array($_SESSION['username'],$_SESSION['password']);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        $count=$stmt->rowCount();

        $yrlevelid=$row['yrlevel'];
        //$sid=$row['sid'];
        $courseid=$row['course'];    
       }
       
       catch(PDOException $e){
           $e->getMessage();
        
       }
?>