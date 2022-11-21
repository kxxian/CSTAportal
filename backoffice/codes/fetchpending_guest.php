<?php
 session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * from guest_payverif ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE payment_status="Pending" ';

    $query .= 'AND (lname LIKE "%' . $_POST["search"]["value"] . '%"';
  
    $query .= 'OR fname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR mname LIKE "%' . $_POST["search"]["value"] . '%")';
 
    
   
}

$query .= 'AND payment_status="Pending" ';

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY gp_id ASC ';
}
if($_POST["length"] != -1){
    $query.='LIMIT '.$_POST['start'].', '.$_POST['length'];
} 
$statement=$con->prepare($query);
$statement->execute();
$result=$statement->fetchAll();
$data=array();
$filtered_rows=$statement->rowCount();


foreach ($result as $row) {
    $lname= $row["lname"];
    $fname= $row["fname"];
    $mname= $row["mname"];
    $id=$row['gp_id'];

    $sub_array = array();
    $sub_array[] = $lname.', '.$fname.' '.$mname;
    $sub_array[] = $row["schoolyr"];


    $sub_array[] = $row["date_of_payment"];
    $sub_array[] = $row["time_of_payment"];
    $sub_array[] = $row["amtpaid"];



    $payment = "../../student/uploads/payverif/guest/assessment/{$row['gp_id']}.jpg";
    $assessment = "../../student/uploads/payverif/guest/pof/{$row['gp_id']}.jpg";

if (file_exists($assessment)){
   $img='<a title="Assessment Form" class="btn btn-primary btn-sm" target="_blank" href="../student/uploads/payverif/guest/assessment/'.$row['gp_id'].'.jpg">
   <i class="fa fa-receipt fa-fw"></i></a>';
}else{
   $img="";
}

if (file_exists($payment)){
    $img2='
    <a title="Proof of Payment" class="btn btn-warning btn-sm" target="_blank" href="../student/uploads/payverif/guest/pof/'.$row['gp_id'].'.jpg">
    <i class="fa fa-receipt fa-fw"></i></a>
    ';
 }else{
    $img2="";
 }




    $sub_array[] = $img.''.$img2;

    
   
    
    
    $sub_array[] =
     '

    <button type="button" id="' . $row["gp_id"] . '" 
    class="btn btn-success btn-sm paymentdetails" title="Payment Details"><i class="fa fa-fw fa-credit-card"></i></button>
    
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_pendingpayments_guest(),
    "data"              => $data

);
echo json_encode($output);
