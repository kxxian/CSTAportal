<?php
require 'database_connection.php';
$operation = $_POST['operation'];
$event_name = ucwords(htmlspecialchars(trim($_POST['event_name'])));
$event_start_date = date("y-m-d", strtotime($_POST['event_start_date']));
$event_end_date = date("y-m-d", strtotime($_POST['event_end_date']));

if ($operation == 'update') {
    $event_id = $_POST['event_id'];

    $updatequery = "update `calendar_event_master` set `event_name`='" . $event_name . "',`event_start_date`='" . $event_start_date . "',`event_end_date`='" . $event_end_date . "' 
    where `event_id`='" . $event_id . "'";

    if (mysqli_query($con, $updatequery)) {
        $data = array(
            'status' => true,
            'msg' => 'Event updated successfully!'
        );
    } else {
        $data = array(
            'status' => false,
            'msg' => 'Sorry, Event not added.'
        );
    }
} else if ($operation == 'add') {

    $insertquery = "insert into `calendar_event_master`(`event_name`,`event_start_date`,`event_end_date`) values ('" . $event_name . "','" . $event_start_date . "','" . $event_end_date . "')";

    if (mysqli_query($con, $insertquery)) {
        $data = array(
            'status' => true,
            'msg' => 'Event added successfully!'
        );
    } else {
        $data = array(
            'status' => false,
            'msg' => 'Sorry, Event not added.'
        );
    }
}



echo json_encode($data);
