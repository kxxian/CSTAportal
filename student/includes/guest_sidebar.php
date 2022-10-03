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
    $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100" style="margin-top:50px;"><strong>CSTA Portal</strong></div>';
    $strSidebar .= '        <br>';
    // <!-- Nav Item - Dashboard -->
    $strSidebar .= '        <li class="nav-item">'; 
    $strSidebar .= '            <a class="nav-link" href="guest_index.php">';
    $strSidebar .= '                <i class="fas fa-fw fa-home"></i>';
    $strSidebar .= '                <span>Home</span></a>';
    $strSidebar .= '        </li>';

    $strSidebar .= '        <li class="nav-item">'; 
    $strSidebar .= '            <a class="nav-link" href="login.php">';
    $strSidebar .= '               <i class="fas fa-sign-in-alt"></i>';
    $strSidebar .= '                <span>Login</span></a>';
    $strSidebar .= '        </li>';
    $strSidebar.= '</ul>';

echo $strSidebar;
