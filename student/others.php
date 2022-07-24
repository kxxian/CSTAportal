<?php
require_once("includes/connect.php");

if(!empty($_POST['payfor'])){

$sql="select * from others where isActive='Active' and paymentfor_ID=".$_POST['payfor']." ";
$stmt = $con->prepare($sql);
$stmt->execute();



}
?>