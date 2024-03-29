<?php
session_start();
require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");


function upload($fname, $newname)
{
    $upload_directory = 'uploads/users/';
    if (is_uploaded_file($fname['tmp_name'])) {
        $filname = basename($fname['name']);
        $tmp = explode('.', $fname['name']);
        $uploadfile = $upload_directory . $newname . "." . end($tmp);

        if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {

            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Profile Picture Uploaded!";
            $_SESSION['status_code'] = "success";
            header('location:profile.php');
        } else {


            $_SESSION['status'] = "Oops!";
            $_SESSION['msg'] = "Profile Picture Not Updated!";
            $_SESSION['status_code'] = "error";
            header('location:profile.php');
        }
    }
}
$newname = $empid;
if ($_FILES['picture']['name'] != "") {
    $msg = upload($_FILES['picture'], $newname);
} else {
    $_SESSION['status'] = "Oops!";
    $_SESSION['msg'] = "No image Selected.";
    $_SESSION['status_code'] = "warning";
    header('location:profile.php');
}
