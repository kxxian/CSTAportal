<?php
session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';




$query = '';
$output = array();
$query .= "SELECT * from vwstudents ";

if (isset($_POST["search"]["value"])) {
    //$query .= 'WHERE status="Pending" ';

    $query .= 'WHERE (date_registered LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR snum LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR lname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR fname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR mname LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR yrlevel LIKE "%' . $_POST["search"]["value"] . '%"';

    $query .= 'OR abbr LIKE "%' . $_POST["search"]["value"] . '%")';
}

$query .= ' AND studtype="Transferee" AND status="Verified" AND isAccepted="0" ';

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . '
    ';
} else {
    $query .= 'ORDER BY date_registered ASC ';
}
if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $con->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();


foreach ($result as $row) {
    $lname = $row["lname"];
    $fname = $row["fname"];
    $mname = $row["mname"];

    $sub_array = array();


    $sub_array[] = '<center>' . $row["snum"] . '</center>';
    $sub_array[] = '<center>' . $lname . ', ' . $fname . ' ' . $mname . '</center>';
    $sub_array[] = '<center>' . $row["yrlevel"] . '</center>';
    $sub_array[] = '<center>' . $row["abbr"] . '</center>';
    $sub_array[] = '<center>' . $row["date_registered"] . '</center>';


    $sub_array[] =
        '

     <button type="button" id="' . $row["id"] . '"  email="' . $row['email'] . '" sname="' . $lname . ', ' . $fname . ' ' . $mname . '"
     class="btn btn-info btn-sm viewstudentinfo" title="View Student Information"><i class="fa fa-fw fa-search"></i></button>
 

    <button type="button" id="' . $row["id"] . '"  email="' . $row['email'] . '" sname="' . $lname . ', ' . $fname . ' ' . $mname . '"
    class="btn btn-success btn-sm accept" title="Accept"><i class="fa fa-fw fa-thumbs-up"></i></button>

    <button type="button" id="' . $row["id"] . '"  email="' . $row['email'] . '" sname="' . $lname . ', ' . $fname . ' ' . $mname . '"
    class="btn btn-danger btn-sm decline" title="Decline"><i class="fa fa-fw fa-thumbs-down"></i></button>
    
    ';



    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_registrations_trans(),
    "data"              => $data

);
echo json_encode($output);
