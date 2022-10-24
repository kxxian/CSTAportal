<?php

include '../includes/connect.php';
include 'functions.php';
$query = '';
$output = array();
$query .= "SELECT * from semester ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE (semester LIKE "%' . $_POST["search"]["value"] . '%") ';

     
}

$query .= "AND isVisible =1 ";

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY semester_ID ASC ';
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
    $sub_array[]=$row["semester"];
    $sub_array[]=$row["isVisible"];
    


    $sub_array[]='<button type="button" name="update" id="'.$row["semester_ID"].'" 
    class="btn btn-danger btn-sm update" title="Delete"><i class="fa fa-fw fa-trash"></i></button>

    
    <button type="button" name="delete" id="'.$row["semester_ID"].'" 
    class="btn btn-success btn-sm activate" title="Set as current"><i class="fa fa-fw fa-power-off"></i></button>
    ';

 

    $data[]=$sub_array;
}
$output=array(
"draw"              => intval($_POST["draw"]),
"recordsTotal"      => $filtered_rows,
"recordsFiltered"   =>get_sem(),
"data"              =>$data

);
echo json_encode($output);
?>