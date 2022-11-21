<?php
//session_start();
require_once('../includes/connect.php');


if (isset($_POST['accept_id'])){
    $id=$_POST['accept_id'];
    $sid=$_POST['sid'];

    $sql = "UPDATE enrollment set enrollment_status=? where enrollment_ID=?";
    $data = array('Assessment',$id);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);


    $con=null;
}

if (isset($_POST['decline_id'])){
    $sql = "DELETE FROM students where id=?";
    $data = array($_POST['decline_id']);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);

    $con=null;
}
