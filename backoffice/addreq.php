<?php
session_start();
require_once('includes/connect.php');


if (isset($_POST['submit'])) { //adding new requirement
    $req = htmlspecialchars(trim($_POST['txtreqName']));
    try {
        $sql = " insert into requirements(reqname) values(?)";
        $data = array($req);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);

        $_SESSION['status'] = "Requirement Added!";
        $_SESSION['status_code'] = "success";
        header('location:reqsetting.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    $_SESSION['status'] = "Requirement not Added!";
    $_SESSION['status_code'] = "error";
    header('location:reqsetting.php');
}
