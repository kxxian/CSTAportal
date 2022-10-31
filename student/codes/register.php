<?php
require_once("../includes/connect.php");

if(!empty($_POST['regCode'])){

$sql="select * from refprovince where regCode=".$_POST['regCode']." order by provDesc asc";
$stmt = $con->prepare($sql);
$stmt->execute();

while($row=$stmt->fetch()){
    echo '<option value='.$row['provCode'].'>'.$row['provDesc'].'</option>';
}
$stmt=null;

}elseif(!empty($_POST['provCode'])){

    $sql="select * from refcitymun where provCode=".$_POST['provCode']." order by citymunDesc asc";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    
    
    while($row=$stmt->fetch()){

        echo '<option value='.$row['citymunCode'].'>'.$row['citymunDesc'].'</option>';
    }
    $stmt=null;

}elseif(!empty($_POST['citymunCode'])){

    $sql="select * from refbrgy where citymunCode=".$_POST['citymunCode']." order by brgyDesc asc";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    
    
    while($row=$stmt->fetch()){
        echo '<option value='.$row['brgyCode'].'>'.$row['brgyDesc'].'</option>';
    }
    $stmt=null;
}



if(!empty($_POST['dept_ID'])){

    $sql="select * from courses where deptid=".$_POST['dept_ID']." and visible='VISIBLE' order by course asc";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    
    while($row=$stmt->fetch()){
        echo '<option value='.$row['course_ID'].'>'.$row['course'].'</option>';
    }
    $stmt=null;
    
    }







?>