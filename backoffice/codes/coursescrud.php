<?php
require_once '../includes/connect.php';
require_once 'functions.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['operation'])) {

    if ($_POST["operation"] == "Add") {
        $course = ucwords(htmlspecialchars(trim($_POST['course'])));
        $abbr = strtoupper(htmlspecialchars(trim($_POST['abbr'])));
        $dept =$_POST['dept'];
      

        $statement = $con->prepare("INSERT INTO courses (deptid, abbr, course) VALUES(?,?,?)");

        $data = array($dept,$abbr,$course);
        $result = $statement->execute($data);
      
    } 

    //Edit Course
    if ($_POST["operation"] == "Edit") {
        $id = $_POST['course_id'];
        $course = ucwords(htmlspecialchars(trim($_POST['course'])));
        $abbr = strtoupper(htmlspecialchars(trim($_POST['abbr'])));
        $dept =$_POST['dept'];
      

        $statement = $con->prepare("UPDATE courses set deptid=?, abbr=?, course=? 
         WHERE course_ID=?");

        $data = array($dept, $abbr, $course,$id);
        $result = $statement->execute($data);
    }
}

//fetch courses 
if (isset($_POST['course_id'])) {
    $id = $_POST['course_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM courses where course_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['course_ID'];
        $output['deptid'] = $row['deptid'];
        $output['abbr'] = $row['abbr'];
        $output['course'] = $row['course'];
    }
    echo json_encode($output);
}

//Delete Course
if (isset($_POST['delete_course_id'])) {
    $id = $_POST['delete_course_id'];

    $statement = $con->prepare('DELETE FROM courses where course_ID=?');
    $data = array($id);
    $result = $statement->execute($data);
}


