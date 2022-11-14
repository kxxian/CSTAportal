<?php
require_once '../includes/connect.php';
require_once 'functions.php';




if (isset($_POST['gradereq_id'])) {
    $id = $_POST['gradereq_id'];

    $statement = $con->prepare('DELETE FROM gradereq where gradereq_ID=?');
    $data = array($id);
    $result = $statement->execute($data);

   
}
