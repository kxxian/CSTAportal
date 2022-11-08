<?php
require_once '../includes/connect.php';
require_once 'functions.php'; 
/* require("../mailer/PHPMailer/src/PHPMailer.php"); */
/* require("../mailer/PHPMailer/src/SMTP.php"); */
/* require("../mailer/PHPMailer/src/Exception.php"); */

/* use PHPMailer\PHPMailer\PHPMailer; */


if (isset($_POST['operation'])) {

	if ($_POST["operation"] == "Add") {
		$empid=$_POST['empid'];
		$title = ucwords(htmlspecialchars(trim($_POST['txttitle'])));
		$desc = htmlspecialchars(trim($_POST['txtdesc']));
		$day = $_POST['selday'];
		$month= $_POST['selmonth'];

		$statement = $con->prepare("INSERT INTO announcements (a_eid, a_day, a_month, a_title, a_desc) VALUES(?,?,?,?,?)");

		$data = array($empid,$day, $month, $title, $desc);
		$result = $statement->execute($data);
	}

	if ($_POST["operation"] == "Edit") {
		$id = $_POST['a_id'];
		$empid=$_POST['empid'];
		$title = ucwords(htmlspecialchars(trim($_POST['txttitle'])));
		$desc = htmlspecialchars(trim($_POST['txtdesc']));
		$day = $_POST['selday'];
		$month= $_POST['selmonth'];

		$statement = $con->prepare("UPDATE announcements set a_eid=?, a_day=?, a_month=?, a_title=?,a_desc=? WHERE a_id=?");

		$data = array($empid,$day,$month,$title,$desc,$id);
		$result = $statement->execute($data);
	}
}

//fetch 
if (isset($_POST['announce_id'])) {
	$id = $_POST['announce_id'];
	$output = array();
	$statement = $con->prepare("SELECT * FROM announcements where a_id='" . $id . "' LIMIT 1");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach ($result as $row) {
		$output['id'] = $row['a_id'];
		$output['day'] = $row['a_day'];
		$output['month'] = $row['a_month'];
		$output['title'] = $row['a_title'];
		$output['desc'] = $row['a_desc'];
	}
	echo json_encode($output);
}


if (isset($_POST['delete_id'])) {
	$id = $_POST['delete_id'];

	$statement = $con->prepare('Delete from announcements where a_id=?');
	$data = array($id);
	$result = $statement->execute($data);
}


