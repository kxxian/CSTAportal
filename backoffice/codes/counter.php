
<?php

require_once '../includes/connect.php';



require_once '../includes/connect.php';
//require_once '../codes/fetchcurrentsyandsem.php';
     //pending payments
    if(isset($_POST['data'])){
        
        $sql = "SELECT payment_status from vwpayverif where payment_status=?";
        $data = array("Pending");
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $count=$stmt->rowCount();

      echo $count;
      
    }
    //acknowledged payments
    if(isset($_POST['data2'])){
        
      $sql = "SELECT payment_status from vwpayverif where payment_status=?";
      $data = array("Received");
      $stmt = $con->prepare($sql);
      $stmt->execute($data);
      $count=$stmt->rowCount();

    echo $count;
    
  }
     //for receipt payments
  if(isset($_POST['data3'])){
        
    $sql = "SELECT payment_status from vwpayverif where payment_status=?";
    $data = array("For Receipt");
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    $count=$stmt->rowCount();

  echo $count;
  
}
//total requests
if(isset($_POST['data4'])){
        
  $sql = "SELECT payment_status from vwpayverif where payment_status!=?";
  $data = array("Verified");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}
 //pending student account registrations  
if(isset($_POST['data5'])){
        
  $sql = "SELECT status from vwstudents where status=?";
  $data = array("Pending");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}

// if(isset($_POST['data6'])){
        
//   $sql = "SELECT status from vwassessment where schoolyr=? AND semester=? AND status=?";
//   $data = array($currentsyval,$currentsemval,"Pending");
//   $stmt = $con->prepare($sql);
//   $stmt->execute($data);
//   $count=$stmt->rowCount();

// echo $count;

// }





?>