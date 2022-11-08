<?php
require_once '../includes/connect.php';
/* require_once 'functions.php'; */
/* require("../mailer/PHPMailer/src/PHPMailer.php"); */
/* require("../mailer/PHPMailer/src/SMTP.php"); */
/* require("../mailer/PHPMailer/src/Exception.php"); */

/* use PHPMailer\PHPMailer\PHPMailer; */


if (isset($_POST['operation'])) {

	if ($_POST["operation"] == "Add") {
		$title = ucwords(htmlspecialchars(trim($_POST['txttitle'])));
		$desc = htmlspecialchars(trim($_POST['txtdesc']));
		$day = $_POST['selday'];
		$month= $_POST['selmonth'];

		$statement = $con->prepare("INSERT INTO announcements (a_day, a_month, a_title, a_desc) VALUES(?,?,?,?)");

		$data = array($day, $month, $title, $desc);
		$result = $statement->execute($data);
	}

	if ($_POST["operation"] == "Edit") {
		$id = $_POST['user_id'];
		$lname = ucwords(htmlspecialchars(trim($_POST['lname'])));
		$fname = ucwords(htmlspecialchars(trim($_POST['fname'])));
		$mname = ucwords(htmlspecialchars(trim($_POST['mname'])));
		$email = htmlspecialchars(trim($_POST['email']));
		$gender = $_POST['gender'];
		$mobile = htmlspecialchars(trim($_POST['mobile']));
		$office = $_POST['office'];
		$dept = $_POST['dept'];
		$role = $_POST['role'];
		$position = ucwords(htmlspecialchars(trim($_POST['position'])));

		$statement = $con->prepare("UPDATE employees set lname=?, fname=?, mname=?,email=? ,Gender=? ,mobile=? , office=?, dept_ID=? , position=?, permission_ID=?  
			WHERE id=?");

		$data = array($lname, $fname, $mname, $email, $gender, $mobile, $office, $dept, $position, $role, $id);
		$result = $statement->execute($data);
	}
}

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


if (isset($_POST['restrict_id'])) {
	$id = $_POST['restrict_id'];

	$statement = $con->prepare('UPDATE employees set isActive=? where id=?');
	$data = array('No', $id);
	$result = $statement->execute($data);
}

if (isset($_POST['activate_id'])) {
	$id = $_POST['activate_id'];

	$statement = $con->prepare('UPDATE employees set isActive=? where id=?');
	$data = array('Yes', $id);
	$result = $statement->execute($data);
}
