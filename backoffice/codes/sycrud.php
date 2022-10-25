<?php
require_once '../includes/connect.php';
require_once 'functions.php';

if (isset($_POST['operation'])) {

    if ($_POST["operation"] == "Add") {
        $sy =htmlspecialchars(trim($_POST['sy']));
       

        $statement = $con->prepare("INSERT INTO schoolyr(schoolyr) VALUES(?)");
        $data = array($sy);
        $result = $statement->execute($data);


    }


    if ($_POST["operation"] == "Edit") {
        $id = $_POST['sy_id'];
        $sy = htmlspecialchars(trim($_POST['sy']));
       
        $statement = $con->prepare("UPDATE schoolyr set schoolyr=?  
         WHERE schoolyr_ID=?");

        $data = array($sy, $id);
        $result = $statement->execute($data);
    }
}

//fetch 
if (isset($_POST['sy_id'])) {
    $id = $_POST['sy_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM schoolyr where schoolyr_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['schoolyr_ID'];
        $output['schoolyr'] = $row['schoolyr'];
    }
    echo json_encode($output);
}


if (isset($_POST['enable_id'])) {

    $sql="SELECT * FROM schoolyr where status=?";
    $data=array(1);
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
    $active=$stmt->rowCount();

    if ($active==0){
        $id = $_POST['enable_id'];
        $statement = $con->prepare('UPDATE schoolyr set status=? where schoolyr_ID=?');
        $data = array('1', $id);
        $result = $statement->execute($data);
    }else{
        echo $active;
    }
    


 
}

if (isset($_POST['disable_id'])) {
    $id = $_POST['disable_id'];

    $statement = $con->prepare('UPDATE schoolyr set status=? where schoolyr_ID=?');
    $data = array('0', $id);
    $result = $statement->execute($data);
}
