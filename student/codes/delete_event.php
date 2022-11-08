<?php
require 'database_connection.php';

    $event_id = $_POST['event_id'];

    $query = "delete from `calendar_event_master` where `event_id`='" . $event_id . "'";

    if (mysqli_query($con, $query)) {
        $data = array(
            'status' => true,
            'msg' => 'Event removed!'
        );
    } else {
        $data = array(
            'status' => false,
            'msg' => 'Sorry, Event not removed.'
        );
    }


echo json_encode($data);
