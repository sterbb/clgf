<?php
if(isset($_SESSION["name"])){
  if($_SESSION["access"] == "user"){
     echo"<style>.account{display:none;}</style>";
  }
}
?>

<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        <img class="wd-30 ht-30 rounded-circle" src="views/img/logo_circle.png" alt="">
          CL<span>GF</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
         <li class="nav-item nav-category">Members</li>
          <li class="nav-item">
            <a href="members" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Members Information</span>
            </a>
          </li>

            <li class="nav-item nav-category">Attendance</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#fellowship" role="button" aria-expanded="false" aria-controls="attendance">
                <i class="link-icon" data-feather="check-square"></i>
                <span class="link-title">Take Attendance</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="fellowship">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="checkattendance"  class="nav-link">Sunday Fellowship</a>
                    </li>
                    <li class="nav-item">
                    <a href="eventattendance"  class="nav-link">Events</a>
                    </li>
                </ul>
                </div>
            </li>

            <li class="nav-item">
            <a href="viewattendance" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">View Attendance</span>
            </a>
           </li>

           <li class="nav-item nav-category">Payment Log</li>
            <li class="nav-item">
            <a href="registration" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Registration</span>
            </a>
           </li>

           <li class="report nav-item nav-category" id="account">Report</li>
            <li class="report nav-item">
              <a href="report" class="nav-link">
                <i class="link-icon" data-feather="shield"></i>
                <span class="link-title">Attendance Report</span>
              </a>
            </li>
    


            <li class="account nav-item nav-category" id="account">Accounts</li>
            <li class="account nav-item">
              <a href="accounts" class="nav-link">
                <i class="link-icon" data-feather="shield"></i>
                <span class="link-title">Manage Accounts</span>
              </a>
            </li>
        </ul>
      </div>
    </nav>