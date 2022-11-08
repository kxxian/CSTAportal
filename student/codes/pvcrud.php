<?php
require_once '../includes/connect.php';
require_once 'functions.php';

//fetch 
if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM employees where id='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['id'];
        $output['lname'] = $row['lname'];
        $output['fname'] = $row['fname'];
        $output['mname'] = $row['mname'];
        $output['Gender'] = $row['Gender'];
        $output['email'] = $row['email'];
        $output['mobile'] = $row['mobile'];
        $output['office'] = $row['office'];
        $output['dept'] = $row['dept_ID'];
        $output['position'] = $row['position'];
        $output['role'] = $row['permission_ID'];
    }
    echo json_encode($output);
}


if (isset($_POST['cancel_id'])) {
    $id = $_POST['cancel_id'];

    $statement = $con->prepare('DELETE FROM paymentverif where pv_ID=?');
    $data = array($id);
    $result = $statement->execute($data);
}


