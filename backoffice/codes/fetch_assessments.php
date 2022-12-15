<?php
 session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';
require_once 'fetchcurrentsyandsem.php';




$query = '';
$output = array();
$query .= "SELECT * from vwforenrollment_students ";
// $query .= 'WHERE dept= "'.$dept.'" ';

if (isset($_POST["search"]["value"])) {
    //$query .= 'WHERE enrollment_status="Assessment" ';

    $query .= 'WHERE (snum LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR studtype LIKE "%' . $_POST["search"]["value"] . '%"';
  
    $query .= 'OR lname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR fname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR mname LIKE "%' . $_POST["search"]["value"] . '%"';
 
    $query .= 'OR yrlevel LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR course LIKE "%' . $_POST["search"]["value"] . '%")';
    
   
}

$query .= "AND enrollment_status='Assessment' AND schoolyr='$currentsyval' AND semester='$currentsemval' ";

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
    ';
}
else{
    $query.='ORDER BY enrollment_ID ASC ';
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
    $sub_array[] = '<center>'.$row["snum"].'</center>';
    $sub_array[] = '<center>'.$row["studtype"].'</center>';
    $sub_array[] = '<center>'.$lname.', '.$fname.' '.$mname.'</center>';
    $sub_array[] = '<center>'.$row["yrlevel"].'</center>';


    $sub_array[] = '<center>'.$row["abbr"].'</center>';
   
  
    $sub_array[] = '<center><a title="Copy of Grades" type="button" class="btn btn-info btn-sm" target="_blank" href="../student/uploads/copygrades/'.$row['grade_copy'].'.">
    <i class="fa fa-fw fa-file-alt"></i>
    </a></center>';
    
    
    $sub_array[] =
     '<center><button type="button" name="sendassessment" id="' . $row["enrollment_ID"] . '" sid="'.$row['sid'].'" email="'.$row['email'].'" fullname="'.$lname.', '.$fname.' '.$mname.'"
     class="btn btn-warning btn-sm returnassessment" title="Send Assessment"><i class="fa fa-fw fa-redo"></i></button>

    <button type="button" name="sendassessment" id="' . $row["enrollment_ID"] . '" sid="'.$row['sid'].'"
    class="btn btn-success btn-sm sendassessment" title="Send Assessment"><i class="fa fa-fw fa-paper-plane"></i></button>
    </center>
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_assessments(),
    "data"              => $data

);
echo json_encode($output);
