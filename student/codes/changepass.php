<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
  
    require_once('../includes/connect.php');
    require_once('../codes/fetchuserdetails.php');


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

        $_SESSION['status'] = "Success!";
        $_SESSION['msg'] = "Password Updated!";
        $_SESSION['status_code'] = "success";
       
        header('location:../logout.php');
    
        }catch(PDOException $e){
            $e->getMessage();
        }
        
		}else  if (!($currentpass==$pass)){

            $_SESSION['status'] = "Error!";
            $_SESSION['msg'] = "Password Incorrect!";
            $_SESSION['status_code'] = "error";
            header('location:../settings.php');
		}
}
?>
