<?php 
/* require_once('config.php'); */

 $host="localhost:3306"; 
 $dbase="studentportal"; 
 $user="root"; 
 $pwd = "KR@0726$"; 

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
