<?php 
<<<<<<< HEAD
//include("config.php");
$host="localhost:3307"; 
$dbase="studentportal"; 
$user="root"; 
$pwd = ""; 

=======
require("config.php");
>>>>>>> 210765cb7042d613952f10a847ada5d954ef14ba

$dsn="mysql:host={$host};dbname={$dbase}";
try{
    $con=new PDO($dsn,$user,$pwd);
   
}catch(PDOException $e){
    echo $e->getMessage();
}
