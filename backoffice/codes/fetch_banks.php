<?php

include '../includes/connect.php';
include 'functions.php';
$query = '';
$output = array();
$query .= "SELECT * from payoptions ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE (provider LIKE "%' . $_POST["search"]["value"] . '%"
  
     OR accname LIKE "%' . $_POST["search"]["value"] . '%"
 
     OR accnumber LIKE "%' . $_POST["search"]["value"] . '%")';

     
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY po_ID ASC ';
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
    $sub_array[]= '<center>'.$row["provider"].'</center>';
    $sub_array[]= '<center>'.$row["accname"].'</center>';
    $sub_array[]= '<center>'.$row["accnumber"].'</center>';
  
    $sub_array[]='<button type="button" name="update" id="'.$row["po_ID"].'" 
    class="btn btn-warning btn-sm update" title="Edit"><i class="fa fa-fw fa-edit"></i></button>


    <button type="button" name="delete" id="'.$row["po_ID"].'" 
    class="btn btn-danger btn-sm delete" title="Delete User"><i class="fa fa-fw fa-trash"></i></button>

    ';

    $data[]=$sub_array;
}
$output=array(
"draw"              => intval($_POST["draw"]),
"recordsTotal"      => $filtered_rows,
"recordsFiltered"   =>get_banks(),
"data"              =>$data

);
echo json_encode($output);
?>