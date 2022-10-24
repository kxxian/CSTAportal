<?php
   require_once("includes/connect.php");
   require_once("codes/fetchuserdetails.php");
   require_once("codes/fetchcurrentsyandsem.php");




   //check if picture is existing in uploads/users   
   $file= 'uploads/users/'.$sid.'.jpg';
   if (!file_exists($file)){
      $dp='default.jpg';
   }else{
      $dp=$sid.'.jpg';
   }
   
$strheader='<nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="background-color:#2E1503; ">'; //#261f17--old
$strheader.='<ul class="navbar-nav">';
$strheader.='<li class="nav-item dropdown no-arrow">';
$strheader.='<span class="mr-2 d-none d-lg-inline text-gray-100 medium"><strong>SY: '.$currentsyval.'</strong>  <strong>'.$currentsemval.' | Enrollment Status: <span class="enroll_status font-weight-bold"></span></strong> </span>
</li>';
$strheader.='</ul>';


#for notif, messages, profile pic
$strheader.='<ul class="navbar-nav ml-auto">';
$strheader.='<li class="nav-item dropdown no-arrow mx-0" >';
$strheader.='<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" title="Messages"';
$strheader.='    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
$strheader.='    <i class="fas fa-envelope fa-fw"></i>';
$strheader.='    <!-- Counter - Messages -->';
$strheader.='    <span class="badge badge-danger badge-counter"></span>';##badge for messages counter
$strheader.='</a>';
#messages
$strheader.='<!-- Dropdown - Messages -->';
$strheader.='<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"';
$strheader.='aria-labelledby="messagesDropdown">';
$strheader.='<h6 class="dropdown-header" style="background-color:#2E1503; border-color:#2E1503">';
$strheader.='        Messages';
$strheader.='</h6>';
$strheader.='<a class="dropdown-item d-flex align-items-center" href="#">';
$strheader.='<div class="dropdown-list-image mr-3">';
$strheader.='<img class="rounded-circle" src="img/undraw_profile_1.svg"';
$strheader.='alt="..." hidden>';
$strheader.='<div class="status-indicator bg-success" hidden></div>';
$strheader.='        </div>';
$strheader.='        <div class="">';
$strheader.='            <div class="text-truncate"><i>No Messages Yet</i></div>';
$strheader.='            <div class="small text-gray-500" hidden>Emily Fowler · 58m</div>';
$strheader.='        </div>';
$strheader.='    </a>';
$strheader.='    <a class="dropdown-item text-center small text-gray-500" href="#" hidden>Read More Messages</a>';
$strheader.='</div>';

#notifications
$strheader.='<li class="nav-item dropdown no-arrow mx-1 " >';
$strheader.='<a class="nav-link dropdown-toggle notif_button" href="#" id="'.$sid.'" role="button" ';
$strheader.='data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Notifications">';
$strheader.='<i class="fas fa-bell fa-fw"></i>';
$strheader.=' <!-- Counter - Alerts -->';
$strheader.=' <span class="badge badge-danger badge-counter ctr_notif"></span>';#counter
$strheader.='</a>';
$strheader.='<!-- Dropdown - Alerts -->';

$strheader.='<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in overflow-auto" style="max-height:400px"';
$strheader.='aria-labelledby="alertsDropdown">';
$strheader.=' <h6 class="dropdown-header " style="background-color:#2E1503; border-color:#2E1503">';
$strheader.='Notifications';
$strheader.='</h6>';

##notifications
$strheader.='<div id="notifications">';
$strheader.='<div>';




$strheader.='</div>';
$strheader.=' </li>';
$strheader.='</li>';

$strheader.='<li class="nav-item dropdown no-arrow">';
$strheader.='  <a class="nav-link dropdown-toggle" href="profile.php"  role="button"\>';    
$strheader.='        <span class="mr-2 d-none d-lg-inline text-gray-100 medium">Welcome <strong>'. $fullname.' </strong> </span>';
$strheader.='       <img class="img rounded-circle"';
$strheader.='            src="uploads/users/'.$dp.'" width="40" height="40">';
$strheader.=' </a>';
$strheader.=' </li>';






$strheader.='</ul>';
$strheader.='</nav>';
   

echo $strheader;
