<?php
        // session_start(); 
    //     $host="localhost:3307"; 
    //     $dbase="studentportal"; 
    //     $user="root"; 
    //     $pwd = ""; 
       
    //    $dsn="mysql:host={$host};dbname={$dbase}";
    //    try{
    //        $con=new PDO($dsn,$user,$pwd);
          
    //    }catch(PDOException $e){
    //        echo $e->getMessage();
    //    }
       
       try{
        $sql="select * from user_login where username=? and pass=? ";
        $data=array($_SESSION['username_admin'],$_SESSION['password_admin']);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        $row=$stmt->fetch();
        
        $user_token=$row['user_token'];
    
       }
       
       catch(PDOException $e){
           $e->getMessage();
       }

    

?>
