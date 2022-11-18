<?php

include '../includes/connect.php';
include 'functions.php';
$query = '';
$output = array();
$query .= "SELECT * from faq ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE (question LIKE "%' . $_POST["search"]["value"] . '%"
 
     OR ans LIKE "%' . $_POST["search"]["value"] . '%")';

     
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY faq_ID ASC ';
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
    $sub_array[]=$row["question"];
    $sub_array[]=$row["ans"];
    


    $sub_array[]='<center><button type="button" name="update" id="'.$row["faq_ID"].'" 
    class="btn btn-warning btn-sm update" title="Edit"><i class="fa fa-fw fa-edit"></i></button>


    <button type="button" name="delete" id="'.$row["faq_ID"].'" 
    class="btn btn-danger btn-sm delete" title="Delete Question"><i class="fa fa-fw fa-trash"></i></button></center>



    ';

 

    $data[]=$sub_array;
}
$output=array(
"draw"              => intval($_POST["draw"]),
"recordsTotal"      => $filtered_rows,
"recordsFiltered"   =>get_faqs(),
"data"              =>$data

);
echo json_encode($output);
?>