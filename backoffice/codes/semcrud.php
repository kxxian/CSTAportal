<?php
require_once '../includes/connect.php';
require_once 'functions.php';

if (isset($_POST['operation_sem'])) {

    if ($_POST["operation_sem"] == "Add") {
        $sem = ucwords(htmlspecialchars(trim($_POST['sem'])));


        $statement = $con->prepare("INSERT INTO semester(semester) VALUES(?)");
        $data = array($sem);
        $result = $statement->execute($data);
    }

    if ($_POST["operation_sem"] == "Edit") {
        $id = $_POST['sem_id'];
        $sem = ucwords(htmlspecialchars(trim($_POST['sem'])));

        $statement = $con->prepare("UPDATE semester set semester=?  
         WHERE semester_ID=?");

        $data = array($sem, $id);
        $result = $statement->execute($data);
    }
}

//fetch semester
if (isset($_POST['sem_id'])) {
    $id = $_POST['sem_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM semester where semester_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['semester_ID'];
        $output['sem'] = $row['semester'];
    }
    echo json_encode($output);
}

//enable a semester
if (isset($_POST['enable_sem_id'])) {

    $sql = "SELECT * FROM semester where status=?";
    $data = array(1);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    $active = $stmt->rowCount();

    if ($active == 0) {
        $id = $_POST['enable_sem_id'];
        $statement = $con->prepare('UPDATE semester set status=? where semester_ID=?');
        $data = array('1', $id);
        $result = $statement->execute($data);
    } else {
        echo $active;
    }
}
//Disable current sem
if (isset($_POST['disable_sem_id'])) {
    $id = $_POST['disable_sem_id'];

    $statement = $con->prepare('UPDATE semester set status=? where semester_ID=?');
    $data = array('0', $id);
    $result = $statement->execute($data);
}

