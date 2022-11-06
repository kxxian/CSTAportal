<?php


$strSidebar = '';
// <!-- Sidebar -->
$strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#432616;">';

// <!-- Sidebar - Brand -->
$strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="guest_index.php">';
$strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
$strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
$strSidebar .= '            </div>';
$strSidebar .= '        </a>';
$strSidebar .= '        ';
$strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100" style="margin-top:50px;"><strong>CSTA Student Portal</strong></div>';
$strSidebar .= '        <br>';
// <!-- Nav Item - Dashboard -->
$strSidebar .= '        <li class="nav-item">';
$strSidebar .= '            <a class="nav-link" href="guest_index.php">';
$strSidebar .= '                <i class="fas fa-fw fa-home"></i>';
$strSidebar .= '                <span> Home</span></a>';
$strSidebar .= '        </li>';
//<!-- Nav Item - Enrollment -->
$strSidebar .= '        <li class="nav-item">';
$strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
$strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
$strSidebar .= '           <i class="fas fa-fw fa-search"></i>';
$strSidebar .= '           <span class="">Track Requests <div class="badge badge-danger"></div> </span>';
$strSidebar .= '    </a>';
$strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
$strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
//$strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
$strSidebar .= '                    <a class="collapse-item" href="trackenrollment.php">Enrollment <span class="badge badge-danger badge-counter"></span></a>';
$strSidebar .= '                    <a class="collapse-item" href="#">Request of Documents <span class="badge badge-danger badge-counter"></span></a>';
$strSidebar .= '                    <a class="collapse-item" href="#">Payment <span class="badge badge-danger badge-counter"></span></a>';

$strSidebar .= '                </div>';
$strSidebar .= '            </div>';
$strSidebar .= '       </li>';

// <!-- Nav Item - Enrollment -->
$strSidebar .= '        <li class="nav-item">';
$strSidebar .= '            <a class="nav-link" href="guest_enrollment.php">';
$strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
$strSidebar .= '                <span> Enrollment</span></a>';
$strSidebar .= '        </li>';

// <!-- Nav Item - Enrollment -->
$strSidebar .= '        <li class="nav-item">';
$strSidebar .= '            <a class="nav-link" href="guest_requestdocu.php">';
$strSidebar .= '                <i class="fas fa-fw fa-folder"></i>';
$strSidebar .= '                <span> Request of Documents</span></a>';
$strSidebar .= '        </li>';

// <!-- Nav Item - Payment Verification -->
$strSidebar .= '        <li class="nav-item">';
$strSidebar .= '            <a class="nav-link" href="guest_payverif.php">';
$strSidebar .= '                <i class="fas fa-fw fa-credit-card"></i>';
$strSidebar .= '                <span> Payment Verification</span></a>';
$strSidebar .= '        </li>';


$strSidebar .= '        <li class="nav-item">';
$strSidebar .= '            <a class="nav-link" href="login.php">';
$strSidebar .= '               <i class="fas fa-fw fa-arrow-left"></i>';
$strSidebar .= '                <span> Login Page</span></a>';
$strSidebar .= '        </li>';
$strSidebar .= '</ul>';

echo $strSidebar;
