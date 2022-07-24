<?php
   
    require_once("includes/connect.php");
    require_once("includes/fetchuserdetails.php");

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





   /* function get_size($size){
        $kb_size=$size/1024;
        $format_size=number_format($kb_size,2);
        return $format_size;

    }
    $path='student/uploads/users/';
    $size=get_size($_FILES['picture']['size']);
    if($size<500.0){
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }
        $temp_file=$_FILES['picture']['tmp_name'];

        if($temp_file !=""){
            $newfilepath=$path.$_FILES['picture']['name'];

            if(move_uploaded_file($temp_file, $newfilepath)){
                echo "success!";
            }
            else{
                echo "error!";
            }
        }
    }else{
        echo "file too large";
    }*/


?>