<?php

include '../includes/connect.php';
include 'functions.php';
$query = '';
$output = array();
$query .= "SELECT * from schoolyr ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE (schoolyr LIKE "%' . $_POST["search"]["value"] . '%") ';
}

$query .= "AND isVisible =1 ";

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . '
    ';
} else {
    $query .= 'ORDER BY status desc ';
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


    $sub_array = array();
    $sub_array[] = '<center>' . $row["schoolyr"] . '</center>';

    if ($row['status'] == 1) {
        $badge = '<center><span class="badge badge-success">Current</span></center>';
        $btn = 'Remove as Current';
        $icon = 'ban';
        $color = 'danger';
        $class ='disable';
    } else {
        $badge = '<center><span class="badge badge-secondary">Inactive</span></center>';
        $btn = 'Set as Current';
        $icon = 'check';
        $color = 'success';
        $class ='enable';
    }
    $sub_array[] = $badge;


    $sub_array[] = '<button type="button" name="update" id="' . $row["schoolyr_ID"] . '" 
    class="btn btn-warning btn-sm update" title="Edit"><i class="fa fa-fw fa-edit"></i></button>

    
    <button type="button" id="' . $row["schoolyr_ID"] . '" 
    class="btn btn-' . $color . ' btn-sm '.$class.'" title="' . $btn . '"><i class="fa fa-fw fa-' . $icon . '"></i></button>
    ';



    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $filtered_rows,
    "recordsFiltered"   => get_sy(),
    "data"              => $data

);
echo json_encode($output);
