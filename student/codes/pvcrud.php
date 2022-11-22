<?php
require_once '../includes/connect.php';
require_once 'functions.php';

//fetch 
if (isset($_POST['payment_id'])) {
    $id = $_POST['payment_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM vwpayverif where pv_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['pv_ID'];
        $output['date_sent'] = $row['date_sent'];
        $output['sent_via'] = $row['sentvia'];
        $output['paymethod'] = $row['paymethod'];
        $output['dop'] = $row['date_paid'];
        $output['top'] = $row['time_paid'];
        $output['term'] = $row['term'];
        $output['tfee'] = $row['tfeepayment'];
        $output['gtotal'] = $row['gtotal'];
        $output['sysem'] =  '('.$row['semester'].' of '.$row['schoolyr'].')';
        $output['part'] = $row['particulars'];
        $output['ptotal'] = $row['particulars_total'];
        $output['paynum'] = $row['paynum'];
        
    }
    echo json_encode($output);
}


if (isset($_POST['cancel_id'])) {
    $id = $_POST['cancel_id'];
    $reqform=$_POST['reqform'];
    $payproof= $_POST['payproof'];

    $statement = $con->prepare('DELETE FROM paymentverif where pv_ID=?');
    $data = array($id);
    $result = $statement->execute($data);

    unlink("../uploads/payverif/docrequestform/".$reqform."");    
    unlink("../uploads/payverif/payments/".$payproof.""); 
}
