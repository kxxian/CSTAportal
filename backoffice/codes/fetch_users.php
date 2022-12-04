<?php

include '../includes/connect.php';
include 'functions.php';
$query = '';
$output = array();
$query .= "SELECT * from vwemployees ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE (empname LIKE "%' . $_POST["search"]["value"] . '%"
  
     OR role LIKE "%' . $_POST["search"]["value"] . '%"
 
     OR dept LIKE "%' . $_POST["search"]["value"] . '%")';

     
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
    $sub_array[]='<center>'.$row["empname"].'</center>';
    $sub_array[]='<center>'.$row["office"].'</center>';
    $sub_array[]='<center>'.$row["dept"].'</center>';
    $sub_array[]='<center>'.$row["position"].'</center>';
    $sub_array[]='<center>'.$row["role"].'</center>';
    $isActive=$sub_array[]='<center>'.$row["isActive"].'</center>';

    if( $isActive=='No'){
        $color="success";
        $title="Activate";
        $button="activate";
        $icon="toggle-on";
    }else{
        $color="danger";
        $title="Restrict";
        $button="restrict";
        $icon="ban";
    }


    $sub_array[]='<button type="button" name="update" id="'.$row["id"].'" 
    class="btn btn-warning btn-sm update" title="Edit"><i class="fa fa-fw fa-edit"></i></button>

    
    <button type="button" id="'.$row["id"].'" 
    class="btn btn-'.$color.' btn-sm '.$button.'" title="'.$title.'"><i class="fa fa-fw fa-'.$icon.'"></i></button>

   


    ';

 

    $data[]=$sub_array;
}
$output=array(
"draw"              => intval($_POST["draw"]),
"recordsTotal"      => $filtered_rows,
"recordsFiltered"   =>get_users(),
"data"              =>$data

);
echo json_encode($output);
?>