
<?php

require_once '../includes/connect.php';
require_once '../codes/fetchcurrentsyandsem.php';
require_once '../codes/fetchuserdetails.php';
    
    //enrollment status
if(isset($_POST['data1'])){
        
  $sql = "SELECT enrollment_status from vwforenrollment_students where sid=? AND schoolyr=? AND semester=?";
  $data = array($sid,$currentsyval,$currentsemval);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $row=$stmt->fetch();
  $count=$stmt->rowCount();


  if ($count>0){
    $status=$row['enrollment_status'];
  }else{
    $status="Not Enrolled";
  }

  

echo $status;

}

// if(isset($_POST['data57'])){
        
//   $sql = "SELECT status from vwenroll_validate where sid=? AND schoolyr=? AND semester=?";
//   $data = array($sid,$currentsyval,$currentsemval);
//   $stmt = $con->prepare($sql);
//   $stmt->execute($data);
//   $row=$stmt->fetch();
//   $count=$stmt->rowCount();


//   if ($count>0){
//     $status=$row['status'];
//   }else{
//     $status="Not Enrolled";
//   }

  

// echo $status;

// }







?>