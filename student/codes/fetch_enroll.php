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
$query .= "SELECT * FROM vwforenrollment_students WHERE sid='".$sid."'
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
    $sub_array[] = '<center>'.$row["studtype"].'</center>';
    $sub_array[] = '<center>'.$row["yrlevel"].'</center>';

    $sub_array[] =  '<center>'.$row["abbr"].'</center>';


    if (!file_exists('../uploads/copygrades/'.$row['grade_copy'])){
        $copygrade= "NA";
    }else{
        $copygrade='<center><a class="font-weight-bold text-center" href="uploads/copygrades/'.$row['grade_copy'].'">Grades</a></center>';

    }


    $sub_array[] = $copygrade;
   
  
  
    
    $sub_array[] =
     '
    <center>
    <button type="button"  id="' . $row["enrollment_ID"] . '"  filename="' . $row["grade_copy"] . '" 
    class="btn btn-danger btn-sm cancel_enroll" title="Cancel Request"><i class="fa fa-fw fa-times"></i></button>
    </center>
    ';

    

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_grade_request(),
    "data"              => $data

);
echo json_encode($output);
