<?php 
require_once '../includes/connect.php';
require_once 'fetchcurrentsyandsem.php';
require_once 'fetchuserdetails.php';
session_start();
?>


<?php
$sql = "UPDATE login_details set last_activity=now() where login_details_id ='".$sid."'";
$stmt = $con->prepare($sql);
$stmt->execute();



// $result = $stmt->fetchall();

// $strcontacts = '';
// foreach ($result as $row) {
//     $name = $row['fromname'];
//     $from = $row['from_id'];


//     $strcontacts .= '<li class="clearfix start_chat" data-touserid="' . $from . '">';
//     $strcontacts .= '<img src="uploads/users/' . $from . '.jpg" alt="avatar">';
//     $strcontacts .= '<div class="about">';
//     $strcontacts .= '<div class="name">' . $name . '</div>';
//     $strcontacts .= '<div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>';
//     $strcontacts .= '</div>';
//     $strcontacts .= ' </li>';
// }
// echo $strcontacts;
?>
