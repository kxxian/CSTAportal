<?php
require_once("includes/fetchuserdetails.php");

if(isset($_POST['save'])){ //adding new schoolyear
    $upmobile=htmlspecialchars(trim($_POST['txtMobile']));     
    $upemail=htmlspecialchars(trim($_POST['txtEmail']));     

                   try{
                   $sql=" UPDATE students set mobile=?, email=? where id=?";
                   $data=array($upmobile,$upemail,$sid);
                   $stmt=$con->prepare($sql);
                   $stmt->execute($data);

                
                   $_SESSION['status'] = "Contact Details Updated!";
                   $_SESSION['status_code'] = "success";
                   header('location:settings.php');

               }catch(PDOException $e){
                   echo $e->getMessage();
               
               }
           }



?>