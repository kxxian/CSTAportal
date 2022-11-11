<?php
require_once("includes/connect.php");

if(!empty($_POST['deptid'])){

$sql="select * from courses where deptid=? and visible=? ";
$stmt = $con->prepare($sql);
$data=array($_POST['deptid'],'VISIBLE');
$stmt->execute($data);

while($row=$stmt->fetch()){
    echo '<option value='.$row['course_ID'].'>'.$row['course'].'</option>';
}
$stmt=null;

}

?>