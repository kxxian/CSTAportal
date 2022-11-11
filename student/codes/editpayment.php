<?php
# database connection
require '../includes/connect.php';

//fetch 
if (isset($_POST['searchpay'])) {
    $paynum = $_POST['paynum'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM paymentverif where paynum='" . $paynum . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['pv_ID'];
        $output['sy'] = $row['schoolyr'];
        $output['sem'] = $row['semester_ID'];
        $output['term'] = $row['terms_ID'];
        $output['tfeeamount'] = $row['tfeeamount'];
        $output['particulars'] = $row['particulars'];
        $output['totalothers'] = $row['particulars_total'];
        $output['totaldue'] =($row['gtotal']);
        $output['totaldue1'] ='₱'.number_format($row['gtotal'],2);
        $output['amtpaid'] = $row['amtpaid'];
        $output['sentvia'] = $row['sentvia_ID'];
        $output['paymethod'] = $row['paymethod_ID'];
        $output['datepaid'] = $row['date_of_payment'];
        $output['timepaid'] = $row['time_of_payment'];
        $output['note'] = $row['note'];
        // $output['sent_via'] = $row['sentvia'];
        // $output['paymethod'] = $row['paymethod'];
        // $output['dop'] = $row['date_paid'];
        // $output['top'] = $row['time_paid'];
        // $output['term'] = $row['term'];
        // $output['tfee'] = $row['tfeepayment'];
        // $output['gtotal'] = $row['gtotal'];
        // $output['sysem'] =  '('.$row['semester'].' of '.$row['schoolyr'].')';
        // $output['part'] = $row['particulars'];
        // $output['ptotal'] = $row['particulars_total'];
        // $output['paynum'] = $row['paynum'];
        // $output['office'] = $row['office'];
        // $output['dept'] = $row['dept_ID'];
        // $output['position'] = $row['position'];
        // $output['role'] = $row['permission_ID'];
    }
    echo json_encode($output);
}
