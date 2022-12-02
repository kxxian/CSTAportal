
<?php

require_once '../includes/connect.php';
require_once 'fetchcurrentsyandsem.php';
require_once 'fetchuserdetails.php';



//count notifications
if (isset($_POST['data1'])) {

  $sql = "SELECT * from notif where sid=? AND isSeen=?";
  $data = array($sid, 0);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
  $count = $stmt->rowCount();
  echo $count;
  $con=null;
}

//fetch notifications
if (isset($_POST['param'])) {
  $sql = "SELECT * FROM vwnotif where sid=$sid order by notif_ID desc";
  $stmt = $con->query($sql);
  $count = $stmt->rowCount();
  $strheader = '';


  foreach ($stmt as $rows) {

    if ($rows['isSeen'] == 0) {
      $class = "font-weight-bold";
    } else {
      $class = "";
    }


    $strheader .= '<a class="dropdown-item d-flex align-items-center" href="' . $rows['link'] . '">';
    $strheader .= ' <div class="mr-3">';
    $strheader .= ' <div class="icon-circle '.$rows['color'].'" >';
    $strheader .= ' <i class="' . $rows['icon'] . '" ></i>';
    $strheader .= ' </div>';
    $strheader .= '</div>';
    $strheader .= '<div>';
    $strheader .= ' <div class="small text-gray-500">' . $rows['date'] . '</div>';
    $strheader .= ' <span class="' . $class . '">' . $rows['notification'] . '</span>';
    $strheader .= ' </div>';
    $strheader .= ' </a>';
  }
  if ($count == 0) {
    echo '<a class="dropdown-item d-flex align-items-center" href="#">
    <div class="dropdown-list-image mr-3">
    <div class="status-indicator bg-success" hidden></div>
            </div>
            <div class="">
                <div class="text-truncate">No Notifications Yet</div>
            </div>
        </a>';
  } else {
    echo $strheader;
  }
}

//read notifications
if (isset($_POST['id'])) {

  $sql = "Update notif set isSeen=? where sid=? AND isSeen=?";
  $data = array(1, $sid, 0);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);
}

$con=null;


?>