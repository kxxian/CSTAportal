<?php 
include "config.php";


$dsn="mysql:host={$host};dbname={$dbase}";
try{
    $con=new PDO($dsn,$user,$pwd);
   
}catch(PDOException $e){
    echo $e->getMessage();
}


$conn = new mysqli($host, $user, $pwd, $dbase);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}
