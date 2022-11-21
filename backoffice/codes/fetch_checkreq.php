<?php
 session_start();

 
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';
require_once 'fetchcurrentsyandsem.php';




$query = '';
$output = array();
$query .= "SELECT * from vwforenrollment_students ";
$query .= 'WHERE dept= "'.$dept.'" ';

if (isset($_POST["search"]["value"])) {
    //$query .= 'WHERE enrollment_status="Assessment" ';

    $query .= 'AND (snum LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR studtype LIKE "%' . $_POST["search"]["value"] . '%"';
  
    $query .= 'OR lname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR fname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR mname LIKE "%' . $_POST["search"]["value"] . '%"';
 
    $query .= 'OR yrlevel LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR dept LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR abbr LIKE "%' . $_POST["search"]["value"] . '%")';
    
   
}

$query .= " AND enrollment_status='Validating Requirements' AND schoolyr='$currentsyval' AND semester='$currentsemval' ";

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
   
    $sub_array[] = $row["snum"];
    $sub_array[] = $row["studtype"];
    $sub_array[] = $lname.', '.$fname.' '.$mname;
    $sub_array[] = $row["yrlevel"];


    $sub_array[] = $row["dept"];
    $sub_array[] = $row["abbr"];
   
  

    
    $sub_array[] =
     '



     <button type="button" name="sendassessment" id="' . $row["enrollment_ID"] . '" sid="'.$row['sid'].'" username="'.$row['username'].'"
     class="btn btn-dark btn-sm viewprofile" title="Requirements Uploaded"><i class="fa fa-fw fa-user"></i></button>

    <button type="button" id="' . $row["enrollment_ID"] . '" sid="'.$row['sid'].'"
    class="btn btn-success btn-sm acceptreq" title="Accept Requirements"><i class="fa fa-fw fa-thumbs-up"></i></button>
    
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_checkreq(),
    "data"              => $data

);
echo json_encode($output);
