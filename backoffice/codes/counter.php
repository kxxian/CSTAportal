
<?php
session_start();
require_once '../includes/connect.php';
require_once 'fetchcurrentsyandsem.php';
require_once 'fetchuserdetails.php';


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
 //Dashboard Card -- For Assessment Students 
if(isset($_POST['data6'])){
        
  $sql = "SELECT enrollment_status from vwforenrollment_students where dept=? AND schoolyr=? AND semester=? AND enrollment_status=?";
  $data = array($dept,$currentsyval,$currentsemval,"For Assessment");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}

 //Dashboard Card -- For Assessment Students 
 if(isset($_POST['data7'])){
        
  $sql = "SELECT enrollment_status from vwforenrollment_students where dept=? AND schoolyr=? AND semester=? AND enrollment_status=?";
  $data = array($dept,$currentsyval,$currentsemval,"Assessed");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}

 //Dashboard Card -- Pending payments 
 if(isset($_POST['data8'])){
        
  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("Pending");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}

 //Dashboard Card -- for verification payments 
 if(isset($_POST['data9'])){
        
  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("Received");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}

 //Dashboard Card -- for verification payments 
 if(isset($_POST['data10'])){
        
  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("For Receipt");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}

 //Dashboard Card -- for verified payments 
 if(isset($_POST['data11'])){
        
  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("Verified");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}

//Dashboard Card -- for pending registrations 
if(isset($_POST['data12'])){
        
  $sql = "SELECT status from vwstudents where status=? or isAccepted=?";
  $data = array("Pending",0);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}

//Dashboard Card -- for pending registrations 
if(isset($_POST['data13'])){
        
  $sql = "SELECT status from vwstudents where status=? and isAccepted=?";
  $data = array("Verified",1);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}








?>