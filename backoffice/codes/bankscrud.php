<?php
require_once '../includes/connect.php';
require_once 'functions.php';



if (isset($_POST['operation'])) {

    if ($_POST["operation"] == "Add") {
        $bank = ucwords(htmlspecialchars(trim($_POST['bank'])));
        $accname = ucwords(htmlspecialchars(trim($_POST['accname'])));
        $accnumber = ucwords(htmlspecialchars(trim($_POST['accnumber'])));
        

        $statement = $con->prepare("INSERT INTO payoptions (`provider`, accname, accnumber) VALUES(?,?,?)");

        $data = array($bank, $accname, $accnumber);
        $result = $statement->execute($data);


    
    } 

    if ($_POST["operation"] == "Edit") {
        $id = $_POST['po_id'];
        $bank = ucwords(htmlspecialchars(trim($_POST['bank'])));
        $accname = ucwords(htmlspecialchars(trim($_POST['accname'])));
        $accnumber = ucwords(htmlspecialchars(trim($_POST['accnumber'])));
     

        $statement = $con->prepare("UPDATE payoptions set `provider`=?, accname=?, accnumber=? WHERE po_ID=?");

        $data = array($bank, $accname, $accnumber, $id);
        $result = $statement->execute($data);
    }
}

//fetch 
if (isset($_POST['po_id'])) {
    $id = $_POST['po_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM payoptions where po_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['po_id'] = $row['po_ID'];
        $output['bank'] = $row['provider'];
        $output['accname'] = $row['accname'];
        $output['accnumber'] = $row['accnumber'];
       
        
    }
    echo json_encode($output);
}

//delete
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    $statement = $con->prepare('DELETE from `payoptions` where po_ID=?');
    $data = array($id);
    $result = $statement->execute($data);
}