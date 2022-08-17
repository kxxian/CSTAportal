<?php

if ($pageValue == 1) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#3d3125;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        <br><br>';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100"><strong>CSTA Admin</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item active">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-bars"></i>';
       $strSidebar .= '                <span>Dashboard</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Students -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="students.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user-plus"></i>';
       $strSidebar .= '                <span>Registrations</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="assessments.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
       $strSidebar .= '                <span>Assessment</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="reqdocu.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-folder"></i>';
       $strSidebar .= '            <span>Documents Request</span></a>';
       $strSidebar .= '     </li>';

       // <!-- Nav Item - Grades -->
       $strSidebar .= '               <li class="nav-item">';
       $strSidebar .= '               <a class="nav-link" href="reqgrades.php">';
       $strSidebar .= '                    <i class="fas fa-fw fa-award"></i>';
       $strSidebar .= '                   <span>Grades Requests</span></a>';
       $strSidebar .= '            </li>';

       //<!-- Nav Item - Payverif -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-coins"></i>';
       $strSidebar .= '           <span>Payments</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="pending-payments.php">Pending <span class="badge badge-danger badge-counter ctr_pendingpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="received-payments.php">Acknowledged <span class="badge badge-danger badge-counter ctr_rcvdpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="for-receipt-issuance.php">Verified / For Receipt <span class="badge badge-danger badge-counter"></span></a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';

       //<!-- Nav Item - Users -->
       $strSidebar .= '                <li class="nav-item">';
       $strSidebar .= '                    <a class="nav-link" href="users.php">';
       $strSidebar .= '                        <i class="fas fa-fw fa-user-tie"></i>';
       $strSidebar .= '                        <span>Admin / Users</span></a>';
       $strSidebar .= '                </li>';



       //<!-- Nav Item - Maintenance Collapse Menu -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-wrench"></i>';
       $strSidebar .= '           <span>Maintenance</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="sysetting.php">School Year</a>';
       $strSidebar .= '                    <a class="collapse-item" href="enrollmentsetting.php">Enrollment</a>';
       $strSidebar .= '                    <a class="collapse-item" href="coursesetting.php">Courses</a>';
       $strSidebar .= '                    <a class="collapse-item" href="reqsetting.php">Requirements</a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';


       $strSidebar .= '   </ul>';
       //<!-- End of Sidebar -->


} elseif ($pageValue == 2) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#3d3125;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        <br><br>';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100"><strong>CSTA Admin</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-bars"></i>';
       $strSidebar .= '                <span>Dashboard</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Students -->
       $strSidebar .= '          <li class="nav-item active">';
       $strSidebar .= '            <a class="nav-link" href="students.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user-plus"></i>';
       $strSidebar .= '                <span>Registrations</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="assessments.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
       $strSidebar .= '                <span>Assessment</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="reqdocu.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-folder"></i>';
       $strSidebar .= '            <span>Documents Request</span></a>';
       $strSidebar .= '     </li>';

       // <!-- Nav Item - Grades -->
       $strSidebar .= '               <li class="nav-item">';
       $strSidebar .= '               <a class="nav-link" href="reqgrades.php">';
       $strSidebar .= '                    <i class="fas fa-fw fa-award"></i>';
       $strSidebar .= '                   <span>Grades Requests</span></a>';
       $strSidebar .= '            </li>';

       //<!-- Nav Item - Payverif -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-coins"></i>';
       $strSidebar .= '           <span>Payments</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="pending-payments.php">Pending <span class="badge badge-danger badge-counter ctr_pendingpayment" ></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="received-payments.php">Acknowledged <span class="badge badge-danger badge-counter ctr_rcvdpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="for-receipt-issuance.php">Verified / For Receipt <span class="badge badge-danger badge-counter"></span></a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';

       //<!-- Nav Item - Users -->
       $strSidebar .= '                <li class="nav-item">';
       $strSidebar .= '                    <a class="nav-link" href="users.php">';
       $strSidebar .= '                        <i class="fas fa-fw fa-user-tie"></i>';
       $strSidebar .= '                        <span>Admin / Users</span></a>';
       $strSidebar .= '                </li>';


       //<!-- Nav Item - Maintenance Collapse Menu -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-wrench"></i>';
       $strSidebar .= '           <span>Maintenance</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="sysetting.php">School Year</a>';
       $strSidebar .= '                    <a class="collapse-item" href="enrollmentsetting.php">Enrollment</a>';
       $strSidebar .= '                    <a class="collapse-item" href="coursesetting.php">Courses</a>';
       $strSidebar .= '                    <a class="collapse-item" href="reqsetting.php">Requirements</a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';


       $strSidebar .= '   </ul>';
       //<!-- End of Sidebar -->

} elseif ($pageValue === 3) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#3d3125;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        <br><br>';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100"><strong>CSTA Admin</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item ">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-bars"></i>';
       $strSidebar .= '                <span>Dashboard</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Students -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="students.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user-plus"></i>';
       $strSidebar .= '                <span>Registrations</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item  active">';
       $strSidebar .= '            <a class="nav-link" href="assessments.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
       $strSidebar .= '                <span>Assessment</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="reqdocu.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-folder"></i>';
       $strSidebar .= '            <span>Documents Request</span></a>';
       $strSidebar .= '     </li>';

       // <!-- Nav Item - Grades -->
       $strSidebar .= '               <li class="nav-item">';
       $strSidebar .= '               <a class="nav-link" href="reqgrades.php">';
       $strSidebar .= '                    <i class="fas fa-fw fa-award"></i>';
       $strSidebar .= '                   <span>Grades Requests</span></a>';
       $strSidebar .= '            </li>';

       //<!-- Nav Item - Payverif -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-coins"></i>';
       $strSidebar .= '           <span>Payments</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="pending-payments.php">Pending <span class="badge badge-danger badge-counter ctr_pendingpayment" id="ctr_pendingpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="received-payments.php">Acknowledged <span class="badge badge-danger badge-counter ctr_rcvdpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="for-receipt-issuance.php">Verified / For Receipt <span class="badge badge-danger badge-counter"></span></a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';

       //<!-- Nav Item - Users -->
       $strSidebar .= '                <li class="nav-item">';
       $strSidebar .= '                    <a class="nav-link" href="users.php">';
       $strSidebar .= '                        <i class="fas fa-fw fa-user-tie"></i>';
       $strSidebar .= '                        <span>Admin / Users</span></a>';
       $strSidebar .= '                </li>';



       //<!-- Nav Item - Maintenance Collapse Menu -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-wrench"></i>';
       $strSidebar .= '           <span>Maintenance</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="sysetting.php">School Year</a>';
       $strSidebar .= '                    <a class="collapse-item" href="enrollmentsetting.php">Enrollment</a>';
       $strSidebar .= '                    <a class="collapse-item" href="coursesetting.php">Courses</a>';
       $strSidebar .= '                    <a class="collapse-item" href="reqsetting.php">Requirements</a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';


       $strSidebar .= '   </ul>';
       //<!-- End of Sidebar -->

} elseif ($pageValue == 4) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#3d3125;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        <br><br>';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100"><strong>CSTA Admin</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-bars"></i>';
       $strSidebar .= '                <span>Dashboard</span></a>';
       $strSidebar .= '        </li>';
       // <!-- Nav Item - Students -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="students.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user-plus"></i>';
       $strSidebar .= '                <span>Registrations</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="assessments.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
       $strSidebar .= '                <span>Assessment</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item active">';
       $strSidebar .= '         <a class="nav-link" href="reqdocu.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-folder"></i>';
       $strSidebar .= '            <span>Documents Request</span></a>';
       $strSidebar .= '     </li>';

       // <!-- Nav Item - Grades -->
       $strSidebar .= '               <li class="nav-item">';
       $strSidebar .= '               <a class="nav-link" href="reqgrades.php">';
       $strSidebar .= '                    <i class="fas fa-fw fa-award"></i>';
       $strSidebar .= '                   <span>Grades Requests</span></a>';
       $strSidebar .= '            </li>';

       //<!-- Nav Item - Payverif -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-coins"></i>';
       $strSidebar .= '           <span>Payments</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="pending-payments.php">Pending <span class="badge badge-danger badge-counter ctr_pendingpayment" id="ctr_pendingpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="received-payments.php">Acknowledged <span class="badge badge-danger badge-counter ctr_rcvdpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="for-receipt-issuance.php">Verified / For Receipt <span class="badge badge-danger badge-counter"></span></a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';

       //<!-- Nav Item - Users -->
       $strSidebar .= '                <li class="nav-item">';
       $strSidebar .= '                    <a class="nav-link" href="users.php">';
       $strSidebar .= '                        <i class="fas fa-fw fa-user-tie"></i>';
       $strSidebar .= '                        <span>Admin / Users</span></a>';
       $strSidebar .= '                </li>';

       //<!-- Nav Item - Maintenance Collapse Menu -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-wrench"></i>';
       $strSidebar .= '           <span>Maintenance</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="sysetting.php">School Year</a>';
       $strSidebar .= '                    <a class="collapse-item" href="enrollmentsetting.php">Enrollment</a>';
       $strSidebar .= '                    <a class="collapse-item" href="coursesetting.php">Courses</a>';
       $strSidebar .= '                    <a class="collapse-item" href="reqsetting.php">Requirements</a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';


       $strSidebar .= '   </ul>';
       //<!-- End of Sidebar -->

} elseif ($pageValue == 5) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#3d3125;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        <br><br>';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100"><strong>CSTA Admin</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-bars"></i>';
       $strSidebar .= '                <span>Dashboard</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Students -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="students.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user-plus"></i>';
       $strSidebar .= '                <span>Registrations</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="assessments.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
       $strSidebar .= '                <span>Assessment</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="reqdocu.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-folder"></i>';
       $strSidebar .= '            <span>Documents Request</span></a>';
       $strSidebar .= '     </li>';

       // <!-- Nav Item - Grades -->
       $strSidebar .= '               <li class="nav-item active">';
       $strSidebar .= '               <a class="nav-link" href="reqgrades.php">';
       $strSidebar .= '                    <i class="fas fa-fw fa-award"></i>';
       $strSidebar .= '                   <span>Grades Requests</span></a>';
       $strSidebar .= '            </li>';

       //<!-- Nav Item - Payverif -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-coins"></i>';
       $strSidebar .= '           <span>Payments</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="pending-payments.php">Pending <span class="badge badge-danger badge-counter ctr_pendingpayment" id="ctr_pendingpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="received-payments.php">Acknowledged <span class="badge badge-danger badge-counter ctr_rcvdpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="for-receipt-issuance.php">Verified / For Receipt <span class="badge badge-danger badge-counter"></span></a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';

       //<!-- Nav Item - Users -->
       $strSidebar .= '                <li class="nav-item">';
       $strSidebar .= '                    <a class="nav-link" href="users.php">';
       $strSidebar .= '                        <i class="fas fa-fw fa-user-tie"></i>';
       $strSidebar .= '                        <span>Admin / Users</span></a>';
       $strSidebar .= '                </li>';



       //<!-- Nav Item - Maintenance Collapse Menu -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-wrench"></i>';
       $strSidebar .= '           <span>Maintenance</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="sysetting.php">School Year</a>';
       $strSidebar .= '                    <a class="collapse-item" href="enrollmentsetting.php">Enrollment</a>';
       $strSidebar .= '                    <a class="collapse-item" href="coursesetting.php">Courses</a>';
       $strSidebar .= '                    <a class="collapse-item" href="reqsetting.php">Requirements</a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';


       $strSidebar .= '   </ul>';
       //<!-- End of Sidebar -->


} elseif ($pageValue == 6) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#3d3125;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        <br><br>';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100"><strong>CSTA Admin</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-bars"></i>';
       $strSidebar .= '                <span>Dashboard</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Students -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="students.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user-plus"></i>';
       $strSidebar .= '                <span>Registrations</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="assessments.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
       $strSidebar .= '                <span>Assessment</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="reqdocu.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-folder"></i>';
       $strSidebar .= '            <span>Documents Request</span></a>';
       $strSidebar .= '     </li>';

       // <!-- Nav Item - Grades -->
       $strSidebar .= '               <li class="nav-item">';
       $strSidebar .= '               <a class="nav-link" href="reqgrades.php">';
       $strSidebar .= '                    <i class="fas fa-fw fa-award"></i>';
       $strSidebar .= '                   <span>Grades Requests</span></a>';
       $strSidebar .= '            </li>';

       //<!-- Nav Item - Payverif -->
       $strSidebar .= '        <li class="nav-item active">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-coins"></i>';
       $strSidebar .= '           <span>Payments</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Online Payments:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="pending-payments.php">Pending <span class="badge badge-danger badge-counter ctr_pendingpayment" id=""></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="received-payments.php">Acknowledged <span class="badge badge-danger badge-counter ctr_rcvdpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="for-receipt-issuance.php">Verified / For Receipt <span class="badge badge-danger badge-counter"></span></a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';

       //<!-- Nav Item - Users -->
       $strSidebar .= '                <li class="nav-item">';
       $strSidebar .= '                    <a class="nav-link" href="users.php">';
       $strSidebar .= '                        <i class="fas fa-fw fa-user-tie"></i>';
       $strSidebar .= '                        <span>Admin / Users</span></a>';
       $strSidebar .= '                </li>';




       //<!-- Nav Item - Maintenance Collapse Menu -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-wrench"></i>';
       $strSidebar .= '           <span>Maintenance</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="sysetting.php">School Year</a>';
       $strSidebar .= '                    <a class="collapse-item" href="enrollmentsetting.php">Enrollment</a>';
       $strSidebar .= '                    <a class="collapse-item" href="coursesetting.php">Courses</a>';
       $strSidebar .= '                    <a class="collapse-item" href="reqsetting.php">Requirements</a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';


       $strSidebar .= '   </ul>';
       //<!-- End of Sidebar -->
} elseif ($pageValue == 7) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#3d3125;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        <br><br>';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100"><strong>CSTA Admin</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-bars"></i>';
       $strSidebar .= '                <span>Dashboard</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Students -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="students.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user-plus"></i>';
       $strSidebar .= '                <span>Registrations</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="assessments.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
       $strSidebar .= '                <span>Assessment</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="reqdocu.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-folder"></i>';
       $strSidebar .= '            <span>Documents Request</span></a>';
       $strSidebar .= '     </li>';

       // <!-- Nav Item - Grades -->
       $strSidebar .= '               <li class="nav-item">';
       $strSidebar .= '               <a class="nav-link" href="reqgrades.php">';
       $strSidebar .= '                    <i class="fas fa-fw fa-award"></i>';
       $strSidebar .= '                   <span>Grades Requests</span></a>';
       $strSidebar .= '            </li>';

       //<!-- Nav Item - Payverif -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-coins"></i>';
       $strSidebar .= '           <span>Payments</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="pending-payments.php">Pending <span class="badge badge-danger badge-counter ctr_pendingpayment" id="ctr_pendingpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="received-payments.php">Acknowledged <span class="badge badge-danger badge-counter ctr_rcvdpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="for-receipt-issuance.php">Verified / For Receipt <span class="badge badge-danger badge-counter"></span></a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';

       //<!-- Nav Item - Employees -->
       $strSidebar .= '                <li class="nav-item active">';
       $strSidebar .= '                    <a class="nav-link" href="users.php">';
       $strSidebar .= '                        <i class="fas fa-fw fa-user-tie"></i>';
       $strSidebar .= '                        <span>Admin / Users</span></a>';
       $strSidebar .= '                </li>';


       //<!-- Nav Item - Maintenance Collapse Menu -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-wrench"></i>';
       $strSidebar .= '           <span>Maintenance</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="sysetting.php">School Year</a>';
       $strSidebar .= '                    <a class="collapse-item" href="enrollmentsetting.php">Enrollment</a>';
       $strSidebar .= '                    <a class="collapse-item" href="coursesetting.php">Courses</a>';
       $strSidebar .= '                    <a class="collapse-item" href="reqsetting.php">Requirements</a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';


       $strSidebar .= '   </ul>';
       //<!-- End of Sidebar -->
} elseif ($pageValue == 8) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#3d3125;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        <br><br>';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100"><strong>CSTA Admin</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-bars"></i>';
       $strSidebar .= '                <span>Dashboard</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Students -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="students.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user-plus"></i>';
       $strSidebar .= '                <span>Registrations</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="assessments.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
       $strSidebar .= '                <span>Assessment</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="reqdocu.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-folder"></i>';
       $strSidebar .= '            <span>Documents Request</span></a>';
       $strSidebar .= '     </li>';

       // <!-- Nav Item - Grades -->
       $strSidebar .= '               <li class="nav-item">';
       $strSidebar .= '               <a class="nav-link" href="reqgrades.php">';
       $strSidebar .= '                    <i class="fas fa-fw fa-award"></i>';
       $strSidebar .= '                   <span>Grades Requests</span></a>';
       $strSidebar .= '            </li>';

       //<!-- Nav Item - Payverif -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-coins"></i>';
       $strSidebar .= '           <span>Payments</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="pending-payments.php">Pending <span class="badge badge-danger badge-counter ctr_pendingpayment" id="ctr_pendingpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="received-payments.php">Acknowledged <span class="badge badge-danger badge-counter ctr_rcvdpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="for-receipt-issuance.php">Verified / For Receipt <span class="badge badge-danger badge-counter"></span></a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';



       //<!-- Nav Item - Employees -->
       $strSidebar .= '                <li class="nav-item ">';
       $strSidebar .= '                    <a class="nav-link" href="users.php">';
       $strSidebar .= '                        <i class="fas fa-fw fa-user-tie"></i>';
       $strSidebar .= '                        <span>Admin / Users</span></a>';
       $strSidebar .= '                </li>';


       //<!-- Nav Item - Maintenance Collapse Menu -->
       $strSidebar .= '        <li class="nav-item active">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-wrench"></i>';
       $strSidebar .= '           <span>Maintenance</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="sysetting.php">School Year</a>';
       $strSidebar .= '                    <a class="collapse-item" href="enrollmentsetting.php">Enrollment</a>';
       $strSidebar .= '                    <a class="collapse-item" href="coursesetting.php">Courses</a>';
       $strSidebar .= '                    <a class="collapse-item" href="reqsetting.php">Requirements</a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';


       $strSidebar .= '   </ul>';
       //<!-- End of Sidebar -->

} elseif ($pageValue == 9) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#3d3125;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        <br><br>';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100"><strong>CSTA Admin</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-bars"></i>';
       $strSidebar .= '                <span>Dashboard</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Students -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="students.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user-plus"></i>';
       $strSidebar .= '                <span>Registrations</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="assessments.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-edit"></i>';
       $strSidebar .= '                <span>Assessment</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="reqdocu.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-folder"></i>';
       $strSidebar .= '            <span>Documents Request</span></a>';
       $strSidebar .= '     </li>';

       // <!-- Nav Item - Grades -->
       $strSidebar .= '               <li class="nav-item">';
       $strSidebar .= '               <a class="nav-link" href="reqgrades.php">';
       $strSidebar .= '                    <i class="fas fa-fw fa-award"></i>';
       $strSidebar .= '                   <span>Grades Requests</span></a>';
       $strSidebar .= '            </li>';

       //<!-- Nav Item - Payverif -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-coins"></i>';
       $strSidebar .= '           <span>Payments</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="pending-payments.php">Pending <span class="badge badge-danger badge-counter ctr_pendingpayment" id="ctr_pendingpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="received-payments.php">Acknowledged <span class="badge badge-danger badge-counter ctr_rcvdpayment"></span></a>';
       $strSidebar .= '                    <a class="collapse-item" href="for-receipt-issuance.php">Verified / For Receipt <span class="badge badge-danger badge-counter"></span></a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';

       //<!-- Nav Item - Employees -->
       $strSidebar .= '                <li class="nav-item ">';
       $strSidebar .= '                    <a class="nav-link" href="users.php">';
       $strSidebar .= '                        <i class="fas fa-fw fa-user-tie"></i>';
       $strSidebar .= '                        <span>Admin / Users</span></a>';
       $strSidebar .= '                </li>';

       //<!-- Nav Item - Maintenance Collapse Menu -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"';
       $strSidebar .= '                aria-expanded="true" aria-controls="collapsePages">';
       $strSidebar .= '           <i class="fas fa-fw fa-wrench"></i>';
       $strSidebar .= '           <span>Maintenance</span>';
       $strSidebar .= '    </a>';
       $strSidebar .= '            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">';
       $strSidebar .= '                <div class="bg-white py-2 collapse-inner rounded">';
       $strSidebar .= '                    <h6 class="collapse-header">Settings:</h6>';
       $strSidebar .= '                    <a class="collapse-item" href="sysetting.php">School Year</a>';
       $strSidebar .= '                    <a class="collapse-item" href="enrollmentsetting.php">Enrollment</a>';
       $strSidebar .= '                    <a class="collapse-item" href="coursesetting.php">Courses</a>';
       $strSidebar .= '                    <a class="collapse-item" href="reqsetting.php">Requirements</a>';
       $strSidebar .= '                </div>';
       $strSidebar .= '            </div>';
       $strSidebar .= '       </li>';


       $strSidebar .= '   </ul>';
       //<!-- End of Sidebar -->
}

echo $strSidebar;


