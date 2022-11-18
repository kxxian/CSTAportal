<?php
require_once("includes/connect.php");
require_once("includes/fetchcurrentsyandsem.php");
require_once("codes/fetchuserdetails.php");

$strHeader='';
$strHeader.='<nav class="navbar navbar-expand navbar-light bg topbar mb-4 static-top shadow" style="background-color: #2e1503">';
$strHeader.='<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">';
$strHeader.='<i class="fa fa-bars"></i>';
$strHeader.='</button>';
$strHeader.='<ul class="navbar-nav">';
$strHeader.='<li class="nav-item dropdown no-arrow">';
$strHeader.='<span class="mr-2 d-none d-lg-inline text-gray-100 medium"> <strong>SY: '.$currentsyval.'</strong>  <strong>'.$currentsemval.'</strong> </span></li>';
$strHeader.='</ul>';
$strHeader.='<ul class="navbar-nav ml-auto">';
$strHeader.='<li class="nav-item dropdown no-arrow">';
$strHeader.='<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"';
$strHeader.='data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
$strHeader.='<span class="mr-2 d-none d-lg-inline text-gray-100 medium">Welcome, <strong>'.$empname.'</strong></span>';
$strHeader.=' <img class="img rounded-circle"
src="uploads/users/'.$empid.'.jpg" width="40" height="40"> ';
$strHeader.='</a>';
$strHeader.='<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"';
$strHeader.='aria-labelledby="userDropdown">';
$strHeader.='<a class="dropdown-item" href="profile.php">';
$strHeader.='<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>';
$strHeader.='Profile';
$strHeader.='</a>';
$strHeader.='<a class="dropdown-item" href="#">';
$strHeader.='<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>';
$strHeader.='Settings';
$strHeader.='</a>';
$strHeader.='<a class="dropdown-item" href="logout.php"  >';
$strHeader.='<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>';
$strHeader.='Logout';
$strHeader.='</a>';
$strHeader.='</div>';
$strHeader.='</li>';

$strHeader.='</ul>';

$strHeader.='</nav>';

echo $strHeader;
?>