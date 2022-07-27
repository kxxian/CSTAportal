
<?php

require_once '../includes/connect.php';


if (isset($_POST['viewpaydetails'])) {
    $query = "SELECT * FROM vwpayverif where pv_ID=?";
    $result = $con->prepare($query);
    $data = array($_POST['payment_ID']);
    $result->execute($data);
    $row = $result->fetch();

    echo json_encode($row);
}



