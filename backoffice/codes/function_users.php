<?php

function get_total_all_records(){
    include '../includes/connect.php';
    $statement=$con->prepare("SELECT * from vwemployees");
   
    $statement->execute();
    $result=$statement->fetchAll();
    return $statement->rowCount();
}



