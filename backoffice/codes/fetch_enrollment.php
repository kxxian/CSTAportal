<?php
 session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * from vwenroll_validate ";

if (isset($_POST["search"]["value"])) {
    //$query .= 'WHERE status="Pending" ';

    $query .= 'WHERE (dept LIKE "%'.$_POST["search"]["value"].'%"';

    $query .= 'OR snum LIKE "%' . $_POST["search"]["value"] . '%"';
  
    $query .= 'OR lname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR fname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR mname LIKE "%' . $_POST["search"]["value"] . '%"';
 
    $query .= 'OR yrlevel LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR course LIKE "%' . $_POST["search"]["value"] . '%")';
    
   
}

$query .= ' AND status="Pending" ';

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY ev_ID ASC ';
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
    $sub_array[] = $row["yrlevel"];
    $sub_array[] = $row["dept"];


    $sub_array[] = $row["course"];
   
  
 
    $sub_array[] = '<a target="_blank" title="Official Receipt" class="btn btn-success btn-sm" href="../student/uploads/enroll_val/enroll_assess/'.$row['ev_ID'].'.jpg">
    <i class="fa fa-fw fa-receipt"></i>
    </a>
    
    <a target="_blank" title="Assessment Form" class="btn btn-warning btn-sm" href="../student/uploads/enroll_val/enroll_receipt/'.$row['ev_ID'].'.jpg">
    <i class="fa fa-fw fa-book"></i>
    </a>
    
    ';
    
    
    $sub_array[] =
     '

    <button type="button" name="sendassessment" id="' . $row["ev_ID"] . '" 
    class="btn btn-success btn-sm sendassessment" title="Send Assessment"><i class="fa fa-fw fa-paper-plane"></i></button>
    
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_enrollments(),
    "data"              => $data

);
echo json_encode($output);
