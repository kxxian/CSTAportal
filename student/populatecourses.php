<?php
require_once("includes/connect.php");

if(!empty($_POST['deptid'])){

$sql="select * from courses where deptid=".$_POST['deptid']." ";
$stmt = $con->prepare($sql);
$stmt->execute();

while($row=$stmt->fetch()){
    echo '<option value='.$row['course_ID'].'>'.$row['course'].'</option>';
}
$stmt=null;

}

?>