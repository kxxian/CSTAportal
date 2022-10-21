<?php 
require_once('config.php');

/* $host="localhost:3307"; */
/* $dbase="studentportal"; */
/* $user="root"; */
/* $pwd = ""; */

$dsn="mysql:host={$host};dbname={$dbase}";
try{
    $con=new PDO($dsn,$user,$pwd);
   
}catch(PDOException $e){
    echo $e->getMessage();
}
