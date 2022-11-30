<?php
 session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * from vwgradereq ";

if (isset($_POST["search"]["value"])) {
    //$query .= 'WHERE status="Pending" ';

 

    $query .= 'WHERE (snum LIKE "%' . $_POST["search"]["value"] . '%"';
  
    $query .= 'OR fullname LIKE "%' . $_POST["search"]["value"] . '%"';
 
    $query .= 'OR yrlevel LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR course LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR schoolyr LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR semester LIKE "%' . $_POST["search"]["value"] . '%")';
    
   
}

$query .= ' AND status="Pending" ';

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

    $sub_array = array();
    $sub_array[] = '<center>'.$row["snum"].'</center>';
    $sub_array[] = '<center>'.$row["fullname"].'</center>';
    $sub_array[] = '<center>'.$row["yrlevel"].'</center>';
    $sub_array[] = '<center>'.$row["abbr"].'</center>';
    $sub_array[] = '<center>'.$row["schoolyr"].'</center>';
    $sub_array[] = '<center>'.$row["semester"].'</center>';
   
   
  
 
    
    
    
    $sub_array[] =
     '

    <button type="button"  id="' . $row["gradereq_ID"] . '" email="'.$row["email"].'" 
    class="btn btn-success btn-sm sendgrades" title="Send Grades"><i class="fa fa-fw fa-paper-plane"></i></button>
    
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_gradereq(),
    "data"              => $data

);
echo json_encode($output);
