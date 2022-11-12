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
      
    }
    echo json_encode($output);
}
