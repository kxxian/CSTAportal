<?php
 session_start();
include_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * from vwguest_enrollment_freshman ";
/* $query .= 'WHERE deptid= "'.$deptid.'" '; */

if (isset($_POST["search"]["value"])) {
    //$query .= 'WHERE status="Pending" ';

    $query .= 'WHERE (previous_deg LIKE "%'.$_POST["search"]["value"].'%"';

    $query .= 'OR lname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR fname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR mname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR course LIKE "%' . $_POST["search"]["value"] . '%")';
    
   
}

$query .= "AND enrollment_status='Pending' ";

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY ge_id ASC ';
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
    $sub_array[] = $lname.', '.$fname.' '.$mname;
    $sub_array[] = $row["app_status"];

    $sub_array[] = $row["course"];
    $sub_array[] = $row["previous_deg"];
	
 
    $sub_array[] = '<a target="_blank" title="Birth / Marriage Certificate" class="btn btn-success btn-sm" href="../student/uploads/requirements/freshman/bc/'.$row['ge_id'].'.pdf">
    <i class="fa fa-fw fa-receipt"></i>
    </a>
    
    <a target="_blank" title="Good Moral Certificate" class="btn btn-warning btn-sm" href="../student/uploads/requirements/freshman/gmc/'.$row['ge_id'].'.pdf">
    <i class="fa fa-fw fa-book"></i>
    </a>
    
    <a target="_blank" title="Form 138" class="btn btn-info btn-sm" href="../student/uploads/requirements/freshman/f138/'.$row['ge_id'].'.pdf">
    <i class="fa fa-fw fa-book"></i>
    </a>
    ';
    
    
    $sub_array[] =
     '

    <button type="button" name="validate" id="' . $row["ge_id"] . '"  
    class="btn btn-success btn-sm sendregform" title="Accept / Validate"><i class="fas fa-vote-yea"></i></button>
    
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_enrollments_guest(),
    "data"              => $data

);
echo json_encode($output);
