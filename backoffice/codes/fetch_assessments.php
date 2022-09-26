<?php
 session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * from vwforenrollment_students ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE enrollment_status="Pending" ';

    $query .= 'AND dept= "'.$dept.'" ';

    $query .= 'AND (snum LIKE "%' . $_POST["search"]["value"] . '%"';
  
    $query .= 'OR fullname LIKE "%' . $_POST["search"]["value"] . '%"';
 
    $query .= 'OR yrlevel LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR course LIKE "%' . $_POST["search"]["value"] . '%")';
    
   
}

$query .= 'AND enrollment_status="Pending" ';

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY enrollment_ID ASC ';
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
    $sub_array = array();
    $sub_array[] = $row["snum"];
    $sub_array[] = $row["fullname"];
    $sub_array[] = $row["yrlevel"];


    $sub_array[] = $row["course"];
   
    // $isActive=$sub_array[]=$row["isActive"];

    // if( $isActive=='No'){
    //     $color="success";
    //     $title="Activate";
    //     $button="activate";

    // }else{
    //     $color="danger";
    //     $title="Deactivate";
    //     $button="restrict";
    // }
    $sub_array[] = $row["enrollment_status"];

    $sub_array[] = '<button type="button" name="update" id="' . $row["enrollment_ID"] . '" 
    class="btn btn-info btn-sm update" title="View Requirement"><i class="fa fa-fw fa-eye"></i></button>

    <button type="button" name="update" id="' . $row["enrollment_ID"] . '" 
    class="btn btn-success btn-sm update" title="Send Assessment"><i class="fa fa-fw fa-paper-plane"></i></button>
    
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_assessments(),
    "data"              => $data

);
echo json_encode($output);
