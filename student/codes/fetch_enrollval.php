<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'fetchcurrentsyandsem.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * FROM vwenroll_validate WHERE sid='".$sid."'
AND schoolyr='".$currentsyval."' AND semester='".$currentsemval."' ";


//$query .= 'AND enrollment_status="Assessment" ';


if($_POST["length"] != -1){
    $query.='LIMIT '.$_POST['start'].', '.$_POST['length'];
} 
$statement=$con->prepare($query);
$statement->execute();
$result=$statement->fetchAll();
$data=array();
$filtered_rows=$statement->rowCount();


foreach ($result as $row) {
   ;
    $sub_array = array();
    $sub_array[] = '<center> <a type="button"  target="_blank" href="uploads/enroll_val/enroll_receipt/' . $row['OR'] . '" id="' . $row["ev_ID"] . '" 
    class="btn btn-success btn-sm sendassessment" title="Official Receipt"><i class="fa fa-fw fa-receipt"></i></a>

    <a type="button" target="_blank" href="uploads/enroll_val/enroll_assess/' . $row['assessment'] . '" id="' . $row["ev_ID"] . '" 
    class="btn btn-warning btn-sm sendassessment" title="Assessment Form"><i class="fa fa-fw fa-book"></i></a> </center>';
    
    $sub_array[] = '<center>'. $row["status"]. '</center>';


   
   

    $sub_array[] =  '<center><button" class="btn btn-danger btn-sm cancel_enroll_validate" id="' . $row['ev_ID'] . '"  receipt="' . $row['OR'] . '"   assessment="' . $row['assessment'] . '"             title="Cancel">
    <i class="fas fa-fw fa-times "></i>
    </button></center>';
    
   

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_grade_request(),
    "data"              => $data

);
echo json_encode($output);
