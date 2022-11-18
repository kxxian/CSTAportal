<?php

include '../includes/connect.php';
include 'functions.php';
$query = '';
$output = array();
$query .= "SELECT * from departments ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE (dept LIKE "%' . $_POST["search"]["value"] . '%"
  
    OR dept_email  LIKE "%' . $_POST["search"]["value"] . '%")';

     
}
// $query .= " AND isVisible = 'Visible' ";


if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.=' ORDER BY deptid ASC ';
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
    $sub_array[]=$row["dept"];
    $sub_array[]=$row["dept_email"];
 


    $sub_array[]='<center><button type="button" name="update" id="'.$row["deptid"].'" 
    class="btn btn-warning btn-sm edit_dept" title="Edit"><i class="fa fa-fw fa-edit"></i></button>

    <button type="button" name="update" id="'.$row["deptid"].'" 
    class="btn btn-danger btn-sm delete" title="Delete"><i class="fa fa-fw fa-trash"></i></button></center>

   
    ';

 

    $data[]=$sub_array;
}
$output=array(
"draw"              => intval($_POST["draw"]),
"recordsTotal"      => $filtered_rows,
"recordsFiltered"   =>get_courses(),
"data"              =>$data

);
echo json_encode($output);
?>