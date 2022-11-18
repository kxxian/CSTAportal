<?php 
require_once '../includes/connect.php';
require_once 'fetchcurrentsyandsem.php';
require_once 'fetchuserdetails.php';
?>



<ul class="list-unstyled chat-list mt-2 mb-0" >
                                   

<?php
$sql = "SELECT * from students";
$data = array($sid);
$stmt = $con->prepare($sql);
$stmt->execute($data);
$result = $stmt->fetchAll();


foreach ($result as $row) {
  

    if($user_last_activity>$current_timestamp){
       $status=' <div class="status"> <i class="fa fa-circle online"></i> Active Now </div>';
    }else{
        $status=' <div class="status"> <i class="fa fa-circle offline"></i> Offline </div>';
    }

    $name = $row['fname'];
    $id = $row['id'];


    $strcontacts .= '<li class="clearfix start_chat" data-touserid="' . $id . '">';
    $strcontacts .= '<img src="uploads/users/' . $id . '.jpg" alt="avatar">';
    $strcontacts .= '<div class="about">';
    $strcontacts .= '<div class="name">' . $name . '</div>';
    $strcontacts .= $status;
    $strcontacts .= '</div>';
    $strcontacts .= ' </li>';
}
echo $strcontacts;
?>
</ul>