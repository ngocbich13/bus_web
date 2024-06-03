<?php

if (!isset($_SESSION['admin'])) {
    header("Location: index.php"); // Chuyển hướng về trang login nếu chưa đăng nhập
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap');
        /* Your CSS here */
    </style>
</head>
<body>
    <div class="container">
        <aside id="sidebar">
            <input type="checkbox" id="toggler">
            <label for="toggler" class="toggle-btn">
                <i class="lni lni-grid-alt"></i>
            </label>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="controlpanel.php?option=username" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Người dùng</span>
                    </a>
                </li>
                <!-- More sidebar items -->
            </ul>
            <div class="sidebar-footer">
                <a href="option.php?option=logout" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <div class="dashboard-navbar">
                <!-- Navbar content -->
            </div>
            <div class="content">
                <h2>Bạn đang đăng nhập với tư cách Admin </h2>
                <?php
                if (isset($_GET['option'])) {
                    include 'option.php';
                } else {
                    echo "Welcome to the admin panel!";
                }
                ?>
            </div>
            <footer>
                <div class="footer-wrap">
                    <div class="copyright-text">
                        <p>© Copyright 2023 by <strong>Ngoc Bich</strong></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
