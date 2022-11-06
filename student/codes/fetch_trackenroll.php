<?php

include '../includes/connect.php';
include 'functions.php';
$query = '';
$output = array();
$query .= "SELECT * from guest_enrollment ";


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
    $sub_array[]=$row["lname"].', '.$row["fname"].' '.$row["mname"];
    $sub_array[]=$row["email"];
    $sub_array[]=$row["mobile"];
    $sub_array[]="";
    $sub_array[]=$row["app_status"];
    $isActive=$sub_array[]=$row["enrollment_status"];

    // if( $isActive=='No'){
    //     $color="success";
    //     $title="Activate";
    //     $button="activate";
    // }else{
    //     $color="danger";
    //     $title="Deactivate";
    //     $button="restrict";
    // }


    $sub_array[]='<button type="button" name="update" id="'.$row["ge_id"].'" 
    class="btn btn-warning btn-sm update" title="Edit"><i class="fa fa-fw fa-edit"></i></button>

    
    <button type="button" name="delete" id="'.$row["ge_id"].'" 
    class="btn btn-danger btn-sm  title="Cancel"><i class="fa fa-fw fa-times"></i></button>
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