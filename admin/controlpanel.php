<?php
session_start(); // Đảm bảo rằng phiên được khởi động
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar using CSS</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <aside id="sidebar">
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="toggle-btn">
                <i class="lni lni-grid-alt"></i>
            </label>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="?option=username" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Người dùng</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="?option=routes" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Tuyến xe</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link ">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link ">
                        <i class="lni lni-layout"></i>
                        <span>Packages</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-layout"></i>
                        <span>Page</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="?option=logout" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <div class="dashboard-navbar">
                <form action="#">
                    <div class="nav-search">
                        <input type="text" class="search-query" placeholder="Search...">
                        <button class="btn" type="button">Search</button>
                    </div>
                </form>
                <div class="navbar-content">
                    <ul class="main-nav">
                        <li class="user-link">
                            <a href="#">
                                <img src="img/logo.png" alt="Profile" class="avatar">
                            </a>
                            <div class="user-link-dropdown">
                                <a href="#" class="dropdown-item"><?=$_SESSION['admin']?></a>
                                <!-- <a href="#" class="dropdown-item">Logout</a> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
            <!-- include 'username.php';  -->
            <!-- option -->
            <?php 
// option.php


if (isset($_GET['option'])) {
  switch ($_GET['option']) {
    
    case 'username':
      include 'username.php';
      break;
    case 'adduser':
        include 'add/adduser.php';
        break;
    case 'updateuser':
            include 'update/updateuser.php';
            break;
    case 'routes'; 
        include 'routes.php';
        break; 
    case 'addroute':
        include 'add/addroute.php';
        break;
    case 'updateroute':
        include 'update/updateroute.php';
        break;
    case 'controlpanel':
        include 'controlpanel.php';
        break;
        
    case 'logout':
    
      
      unset($_SESSION['admin']); // Hủy session của admin (nếu có)
      header("Location: ."); // Chuyển hướng về trang chủ sau khi đăng xuất
      break;

    
     
  }
} 
?>
            </div>
            <footer>
                <div class="footer-wrap">
                    <div class="copyright-text">
                        <p>© Copyright 2024 by <strong>Ngoc Bich</strong></p>
                    </div>
                    
                </div>
            </footer>
        </div>

    </div>
</body>

</html>