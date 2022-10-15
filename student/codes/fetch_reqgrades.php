<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * from vwgradereq WHERE sid='".$sid."' ";

if (isset($_POST["search"]["value"])) {
 
    $query .= 'OR schoolyr LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR semester LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR date_req LIKE "%' . $_POST["search"]["value"] . '%"';
 
    $query .= 'OR status LIKE "%' . $_POST["search"]["value"] . '%"';

    
   
}

//$query .= 'AND enrollment_status="Assessment" ';

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY gradereq_ID ASC ';
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
   ;
    $sub_array = array();
    $sub_array[] = $row["schoolyr"];
    $sub_array[] = $row["semester"];


    $sub_array[] = $row["date_req"];
   
  
    $sub_array[] = $row["status"];
    
    $sub_array[] =
     '

    <button type="button"  id="' . $row["gradereq_ID"] . '" 
    class="btn btn-danger btn-sm cancelgradereq" title="Cancel Request"><i class="fa fa-fw fa-times"></i></button>
    
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_grade_request(),
    "data"              => $data

);
echo json_encode($output);
