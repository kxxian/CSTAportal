<?php 
//include("config.php");
$host="localhost:3307"; 
$dbase="studentportal"; 
$user="root"; 
$pwd = ""; 


require("config.php");


$dsn="mysql:host={$host};dbname={$dbase}";
try{
    $con=new PDO($dsn,$user,$pwd);
   
}catch(PDOException $e){
    echo $e->getMessage();
}
