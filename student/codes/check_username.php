<?php
# database connection
require '../includes/connect.php';

if (isset($_POST['userName'])) {
    $text=$_POST['userName'];
    # check if username exist in database
    $sql = "SELECT username
            FROM   students
            WHERE  username='".$_POST['userName']."'";
    $stmt = $con->query($sql);

    if(strlen($text)>0&&strlen($text)<8){
        echo "<span style='color: red; font-weight:bold'>Username too short!</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }else if(strlen($text)>=8){
        if ($stmt->rowCount() > 0) {
            echo "<span style='color: red; font-weight:bold'>Username is already taken</span>";
            echo "<script>$('#submit').prop('disabled', true);</script>";
        }else {
            echo "<span style='color: green; font-weight:bold'>Username is available!</span>";
            echo "<script>$('#submit').prop('disabled', false);</script>";
        }
    }
      

  

  
}
?>