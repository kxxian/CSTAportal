<?php
    require_once('../includes/connect.php');
    require_once('../includes/fetchuserdetails.php');


    if(isset($_POST['changepass'])){ 
     
        $currentpass= sha1(trim($_POST['txtcurrentpass']));
        $newpass= sha1(trim($_POST['txtnewpass']));
        $confirmpass= sha1(trim($_POST['txtrepass']));
       
        
        if (($currentpass==$pass) && ($newpass==$confirmpass)){
        try{
       
        $sql=" UPDATE students set pass=? where id=?";
        $data=array($newpass,$sid);
        $stmt=$con->prepare($sql);
        $stmt->execute($data);

        
        $_SESSION['status'] = "Password Successfully Updated!";
        $_SESSION['status_code'] = "success";
        header('location:logout.php');
    
        }catch(PDOException $e){
            $e->getMessage();
        }
        
        }else  if (!(($currentpass==$pass) && ($newpass==$confirmpass))){

       
            $_SESSION['status'] = "Password Not Changed!";
            $_SESSION['status_code'] = "error";
            header('location:settings.php');
        }



    
       
    


                   }
               
    





?>