
<?php
session_start();
require_once '../includes/connect.php';
require_once 'fetchcurrentsyandsem.php';
require_once 'fetchuserdetails.php';


//pending payments
if (isset($_POST['data'])) {

  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("Pending");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}
//acknowledged payments
if (isset($_POST['data2'])) {

  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("Received");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}
//for receipt payments
if (isset($_POST['data3'])) {

  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("For Receipt");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}
//total requests
if (isset($_POST['data4'])) {

  $sql = "SELECT payment_status from vwpayverif where payment_status!=?";
  $data = array("Verified");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}
//pending student account registrations  
if (isset($_POST['data5'])) {

  $sql = "SELECT status from vwstudents where status=?";
  $data = array("Pending");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}
//Dashboard Card -- For Assessment Students 
if (isset($_POST['data6'])) {

  $sql = "SELECT enrollment_status from vwforenrollment_students where dept=? AND schoolyr=? AND semester=? AND enrollment_status=?";
  $data = array($dept, $currentsyval, $currentsemval, "Assessment");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//Dashboard Card -- For Assessment Students 
if (isset($_POST['data7'])) {

  $sql = "SELECT enrollment_status from vwforenrollment_students where dept=? AND schoolyr=? AND semester=? AND enrollment_status=?";
  $data = array($dept, $currentsyval, $currentsemval, "Assessed");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//Dashboard Card -- Pending payments 
if (isset($_POST['data8'])) {

  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("Pending");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//Dashboard Card -- for verification payments 
if (isset($_POST['data9'])) {

  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("Received");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//Dashboard Card -- for verification payments 
if (isset($_POST['data10'])) {

  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("For Receipt");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//Dashboard Card -- for verified payments 
if (isset($_POST['data11'])) {

  $sql = "SELECT payment_status from vwpayverif where payment_status=?";
  $data = array("Verified");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//Dashboard Card -- for pending registrations 
if (isset($_POST['data12'])) {

  $sql = "SELECT status from vwstudents where status=? or isAccepted=?";
  $data = array("Pending", 0);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//Dashboard Card -- for pending registrations 
if (isset($_POST['data13'])) {

  $sql = "SELECT status from vwstudents where status=? and isAccepted=?";
  $data = array("Verified", 1);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//sidebar counter -- for pending registrations 
if (isset($_POST['data14'])) {

  $sql = "SELECT status from vwclearance where status=?";
  $data = array("Sent");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//sidebar counter -- for enrollment 
if (isset($_POST['data15'])) {

  $sql = "SELECT status from vwenroll_validate where status=?";
  $data = array("Pending");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

//sidebar counter -- for request of documents
if (isset($_POST['data16'])) {

  $sql = "SELECT status from vwdocureq where status=?";
  $data = array("Sent");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}

if (isset($_POST['data17'])) {

  $sql = "SELECT status from vwgradereq where status=?";
  $data = array("Pending");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}
if (isset($_POST['data18'])) {

  $sql = "SELECT id from vwemployees where office=?";
  $data = array("Registrar");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  echo $count;
}
if (isset($_POST['data19'])) {

  $sql = "SELECT id from events where start_datetime>DATE(NOW()) OR (start_datetime = DATE(NOW()) AND start_datetime > TIME(NOW()) )";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $count = $stmt->rowCount();

  echo $count;
}
if (isset($_POST['data20'])) {

  $sql = " 
  SELECT
           (SELECT COUNT(id) FROM students WHERE `status`='Pending' AND isAccepted=0)
            +
            (SELECT COUNT(ev_ID) FROM enrollment_validation WHERE `status`='Pending' )
            +
            (SELECT COUNT(reqdoc_ID) FROM tbldocureq WHERE `status`='Sent')
            +
            (SELECT COUNT(gradereq_ID) FROM gradereq WHERE `status`='Pending') as total
         
          
  ";



  // $data = array("Pending", '0', "Pending", "Sent", "Pending");
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $row=$stmt->fetch();
  $count=$row['total'];

  echo $count;
}








?>