<?php
require_once '../includes/connect.php';
require_once 'functions.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['operation'])) {

    if ($_POST["operation"] == "Add") {
        $dept = ucwords(htmlspecialchars(trim($_POST['dept'])));
        $dept_email = htmlspecialchars(trim($_POST['dept_email']));


        $statement = $con->prepare("INSERT INTO departments (dept, dept_email) VALUES(?,?)");

        $data = array($dept, $dept_email);
        $result = $statement->execute($data);
    }

    //Edit Course
    if ($_POST["operation"] == "Edit") {
        $id = $_POST['dept_id'];
        $dept = ucwords(htmlspecialchars(trim($_POST['dept'])));
        $dept_email = htmlspecialchars(trim($_POST['dept_email']));

        $statement = $con->prepare("UPDATE departments set dept=?, dept_email=? 
        WHERE deptid=?");

        $data = array($dept, $dept_email, $id);
        $result = $statement->execute($data);
    }
}

//fetch courses 
if (isset($_POST['dept_id'])) {
    $id = $_POST['dept_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM departments where deptid='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['deptid'];
        $output['dept'] = $row['dept'];
        $output['dept_email'] = $row['dept_email'];
    }
    echo json_encode($output);
}

//Delete Course
if (isset($_POST['delete_dept_id'])) {
    $id = $_POST['delete_dept_id'];

    $statement = $con->prepare('DELETE FROM departments where deptid=?');
    $data = array($id);
    $result = $statement->execute($data);
}
