<?php
require_once('includes/connect.php');

if(isset($_POST['delete_btn_set'])){
    $id = $_POST['delete_id'];

    try {
        $sql = "Delete from studreq where sr_ID=?";
        $data = array($id);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
