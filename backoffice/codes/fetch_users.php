<?php

include '../includes/connect.php';
include 'function_users.php';
$query = '';
$output = array();
$query .= "SELECT * from vwemployees ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE empname LIKE "%' . $_POST["search"]["value"] . '%"';
  
    $query .= 'OR role LIKE "%' . $_POST["search"]["value"] . '%"';
 
    $query .= 'OR dept LIKE "%' . $_POST["search"]["value"] . '%"';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY id ASC ';
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
    $sub_array[]=$row["empname"];
    $sub_array[]=$row["office"];
    $sub_array[]=$row["dept"];
  
   
    $sub_array[]=$row["role"];
    $sub_array[]=$row["isActive"];
    $sub_array[]='<button type="button" name="update" id="'.$row["id"].'" 
    class="btn btn-warning btn-sm update" title="Edit"><i class="fa fa-fw fa-edit"></i></button>

    
    <button type="button" name="delete" id="'.$row["id"].'" 
    class="btn btn-danger btn-sm delete" title="Delete"><i class="fa fa-fw fa-trash"></i></button>
    ';

 

    $data[]=$sub_array;
}
$output=array(
"draw"              => intval($_POST["draw"]),
"recordsTotal"      => $filtered_rows,
"recordsFiltered"   =>get_total_all_records(),
"data"              =>$data

);
echo json_encode($output);
?>