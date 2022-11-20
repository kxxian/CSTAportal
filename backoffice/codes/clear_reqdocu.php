<?php
session_start();
require_once '../includes/connect.php';
require_once 'fetchuserdetails.php';
require_once 'functions.php';

    if (isset($_POST["id"])) {
        $id = $_POST['id'];
        $sid= $_POST['sid'];
        $fullname = ucwords(htmlspecialchars(trim($_POST['fullname'])));
        $email = htmlspecialchars(trim($_POST['email']));
        $reqdoc_ID=$_POST['reqdoc_ID']
;       
        //Clear Clearance
        $statement = $con->prepare("UPDATE clearance set status=? WHERE clr_ID=?");
        $data = array('Cleared',$id);
        $result = $statement->execute($data);

        //Retun Request to Registrar as Cleared
        $statement2 = $con->prepare("UPDATE tbldocureq set status=? where reqdoc_ID=?");
        $data2 = array("Cleared",$reqdoc_ID);
        $result2 = $statement2->execute($data2);

    }




