<?php 
// option.php

if (isset($_GET['option'])) {
  switch ($_GET['option']) {
    case 'home':
      include 'home.php';
      break;
    case 'about':
      include 'includes/about.php';
      break;
    case 'routes':
      include 'includes/routes.php';
      break;
    case 'stop':
      include 'includes/stop.php';
      break;
    case 'findroute':
      include 'includes/findroute.php';
      break;
    case 'map':
      include 'includes/map.php';
      break;
    case 'login':
      include 'includes/login.php';
      break;
    case 'register':
      include 'includes/register.php';
      break;
    case 'process':
        include 'includes/process.php';
        break;
    case 'logout':
      unset($_SESSION['member']); // Hủy session của thành viên
      unset($_SESSION['admin']); // Hủy session của admin (nếu có)
      header("location:?option=home"); // Chuyển hướng về trang chủ sau khi đăng xuất
      break;
    case 'search_results': // Thêm tùy chọn cho search_results.php
      include 'includes/search_results.php';
    case 'admin':
        include 'admin/login.php';
      break;
    default:
      include 'home.php';
     
  }
} else {
  include 'home.php';
}
?>
