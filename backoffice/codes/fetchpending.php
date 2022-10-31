<?php
 session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * from vwpayverif ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE payment_status="Pending" ';

    $query .= 'AND (snum LIKE "%' . $_POST["search"]["value"] . '%"';
  
    $query .= 'OR lname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR fname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR mname LIKE "%' . $_POST["search"]["value"] . '%"';
 
    $query .= 'OR yrlevel LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR course LIKE "%' . $_POST["search"]["value"] . '%")';
    
   
}

$query .= 'AND payment_status="Pending" ';

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY pv_ID ASC ';
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
    $id=$row['pv_ID'];

    $sub_array = array();
    $sub_array[] = $row["snum"];
    $sub_array[] = $lname.', '.$fname.' '.$mname;
    $sub_array[] = $row["yrlevel"];


    $sub_array[] = $row["abbr"];
    $sub_array[] = $row["amtpaid"];



    $payment = "../../student/uploads/payverif/payments/{$row['pv_ID']}.jpg";
    $reqform = "../../student/uploads/payverif/docrequestform/{$row['pv_ID']}.jpg";

if (file_exists($payment)){
   $img='<a title="Proof of Payment" class="btn btn-primary btn-sm" target="_blank" href="../student/uploads/payverif/payments/'.$row['pv_ID'].'.jpg">
   <i class="fa fa-receipt fa-fw"></i></a>';
}else{
   $img="";
}

if (file_exists($reqform)){
    $img2='
    <a title="Assessment/Disbursement" class="btn btn-warning btn-sm" target="_blank" href="../student/uploads/payverif/docrequestform/'.$row['pv_ID'].'.jpg">
    <i class="fa fa-receipt fa-fw"></i></a>
    ';
 }else{
    $img2="";
 }




    $sub_array[] = $img.''.$img2;

    
   
    
    
    $sub_array[] =
     '

    <button type="button" id="' . $row["pv_ID"] . '" 
    class="btn btn-success btn-sm paymentdetails" title="Payment Details"><i class="fa fa-fw fa-credit-card"></i></button>
    
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_pendingpayments(),
    "data"              => $data

);
echo json_encode($output);
