<?php
   
    require_once("includes/connect.php");
    require_once("codes/fetchuserdetails.php");

   function upload ($fname, $newname){
        $upload_directory='uploads/users/';
        if(is_uploaded_file($fname['tmp_name'])){
            $filname=basename($fname['name']);
            $tmp = explode('.', $fname['name']);
            $uploadfile= $upload_directory.$newname.".".end($tmp);

            if(move_uploaded_file($fname['tmp_name'],$uploadfile)){

           
                $_SESSION['status'] = "Profile Picture Updated!";
                $_SESSION['status_code'] = "success";
                header('location:settings.php');
                
            }else{
                
           
              
                $_SESSION['status'] = "Profile Picture Not Updated!";
                $_SESSION['status_code'] = "error";
                header('location:settings.php');
                 
            }
            
        }
    }
    $newname=$sid;
    if ($_FILES['picture']['name'] !=""){
        $msg= upload($_FILES['picture'],$newname); 
    } 
?>