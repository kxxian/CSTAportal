<?php
 session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * from vwclearance ";

if (isset($_POST["search"]["value"])) {
    //$query .= 'WHERE status="Sent" ';

   
    $query .= 'WHERE (snum LIKE "%' . $_POST["search"]["value"] . '%"';
  
    $query .= 'OR lname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR fname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR mname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR course LIKE "%' . $_POST["search"]["value"] . '%")';
    
   
}

$query .= ' AND status="Sent" ';

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY clr_ID ASC ';
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

    $sub_array = array();
    $sub_array[] = $row["snum"];
    $sub_array[] = $lname.', '.$fname.' '.$mname;
    $sub_array[] = $row["course"];

  
 
   
    
    
    $sub_array[] =
     '
    <button type="button" id="' . $row["clr_ID"] . '"  email="'.$row['email'] .'" fullname="'.$lname.', '.$fname.' '.$mname.'" 
    sid="'.$row['sid'].'"  class="btn btn-success btn-sm ack" title="Clear"><i class="fa fa-fw fa-check"></i></button>

    <button type="button" id="' . $row["clr_ID"] . '"  email="'.$row['email'] .'" 
    class="btn btn-warning btn-sm decline" title="Mark as Pending"><i class="fa fa-fw fa-hourglass"></i></button>
    
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_clearance(),
    "data"              => $data

);
echo json_encode($output);
