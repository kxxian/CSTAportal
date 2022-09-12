<?php
require_once '../includes/connect.php';
require_once 'function_users.php';

if (isset($_POST['operation'])) {

    if ($_POST["operation"] == "Add") {
        $lname = htmlspecialchars(trim($_POST['lname']));
        $fname = htmlspecialchars(trim($_POST['fname']));
        $mname = htmlspecialchars(trim($_POST['mname']));
        $email = htmlspecialchars(trim($_POST['email']));
        $gender = $_POST['gender'];
        $mobile = htmlspecialchars(trim($_POST['mobile']));
        $office = $_POST['office'];
        $dept = $_POST['dept'];
        $role = $_POST['role'];

        $statement = $con->prepare("INSERT INTO employees (lname, fname, mname,email,Gender,mobile,office,dept_ID,permission_ID) VALUES(?,?,?,?,?,?,?,?,?)");

        $data = array($lname, $fname, $mname, $email, $gender, $mobile,$office, $dept, $role);
        $result = $statement->execute($data);
    }

    if ($_POST["operation"] == "Edit") {
        $id = $_POST['user_id'];
        $lname = htmlspecialchars(trim($_POST['lname']));
        $fname = htmlspecialchars(trim($_POST['fname']));
        $mname = htmlspecialchars(trim($_POST['mname']));
        $email = htmlspecialchars(trim($_POST['email']));
        $gender = $_POST['gender'];
        $mobile = htmlspecialchars(trim($_POST['mobile']));
        $office = $_POST['office'];
        $dept = $_POST['dept'];
        $role = $_POST['role'];

        $statement = $con->prepare("UPDATE employees set lname=?, fname=?, mname=?,email=? ,Gender=? ,mobile=? , office=?, dept_ID=? ,permission_ID=?  
         WHERE id=?");

        $data = array($lname, $fname, $mname, $email, $gender, $mobile, $office, $dept, $role, $id);
        $result = $statement->execute($data);
    }
}
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
        $output['role'] = $row['permission_ID'];
        
        
     
        
    }
    echo json_encode($output);
}


if (isset($_POST['restrict_id'])){
    $id=$_POST['restrict_id'];

    $statement=$con->prepare('UPDATE employees set isActive=? where id=?');
    $data=array('No',$id);
    $result=$statement->execute($data);
}

if (isset($_POST['activate_id'])){
    $id=$_POST['activate_id'];

    $statement=$con->prepare('UPDATE employees set isActive=? where id=?');
    $data=array('Yes',$id);
    $result=$statement->execute($data);
}
