<?php
session_start();
include 'fetchuserdetails.php';
include '../includes/connect.php';
include 'functions.php';
$query = '';
$output = array();
$query .= "SELECT * from vwannouncements ";
$query .= 'WHERE dept = "'.$dept.'" '; 

if (isset($_POST["search"]["value"])) {
    $query .= ' AND (a_day LIKE "%' . $_POST["search"]["value"] . '%"
  
     OR a_month LIKE "%' . $_POST["search"]["value"] . '%"
 
	 OR dept LIKE "%' . $_POST["search"]["value"] . '%"

	 OR a_title LIKE "%' . $_POST["search"]["value"] . '%"

	 OR a_desc LIKE "%' . $_POST["search"]["value"] . '%"

)';

     
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY a_id ASC ';
}
if($_POST["length"] != -1){
    $query.='LIMIT '.$_POST['start'].', '.$_POST['length'];
} 
$statement=$con->prepare($query);
$statement->execute();
$result=$statement->fetchAll();
$data=array();
$filtered_rows=$statement->rowCount();

foreach($result as $row)
{
    $sub_array=array();
    $sub_array[]=$row["a_day"];
	$sub_array[]=$row["a_month"];
    $sub_array[]=$row["dept"];
    $sub_array[]=$row["a_title"];
    $sub_array[]=$row["a_desc"];

    $sub_array[]='<button type="button" name="update" id="'.$row["a_id"].'" 
    class="btn btn-warning btn-sm update" title="Edit"><i class="fa fa-fw fa-edit"></i></button>

    
    <button type="button" name="delete" id="'.$row["a_id"].'" 
    class="btn btn-success btn-sm title="Delete"><i class="fa fa-fw fa-trash"></i></button>
    ';

 

    $data[]=$sub_array;
}
$output=array(
"draw"              => intval($_POST["draw"]),
"recordsTotal"      => $filtered_rows,
"recordsFiltered"   =>get_announcement(),
"data"              =>$data

);
echo json_encode($output);
?>
