
<?php

require_once '../includes/connect.php';

    if(isset($_POST['data'])){
        
        $sql = "SELECT payment_status from vwpayverif where payment_status=?";
        $data = array("Pending");
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $count=$stmt->rowCount();

      echo $count;
      
    }

    if(isset($_POST['data2'])){
        
      $sql = "SELECT payment_status from vwpayverif where payment_status=?";
      $data = array("Received");
      $stmt = $con->prepare($sql);
      $stmt->execute($data);
      $count=$stmt->rowCount();

    echo $count;
    
  }


?>