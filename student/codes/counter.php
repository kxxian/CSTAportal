
<?php

require_once '../includes/connect.php';
require_once '../codes/fetchcurrentsyandsem.php';
require_once '../codes/fetchuserdetails.php';
     //pending payments
   
if(isset($_POST['data6'])){
        
  $sql = "SELECT status from vwassessment where sid=? AND schoolyr=? AND semester=? AND status=?";
  $data = array($sid,$currentsyval,$currentsemval,"Pending");
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count=$stmt->rowCount();

echo $count;

}




?>