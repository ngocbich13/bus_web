<?php
session_start(); // Bắt đầu session

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $connect->query($query);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu Admin ');</script>";
    } else {
        $result = mysqli_fetch_array($result);
        if ($result['status']==0){
            echo "<script>alert('Tài khoản đang bị khóa');</script>";
        }
        else{
            $_SESSION['admin'] = $username;
            header("Refresh:0");
            echo "<script>alert('Đăng nhập thành công'); location.href='?option=home';</script>";
        }
        exit();
    }
}
?>

<?php
include 'database.php'; // Bao gồm tệp database.php để kết nối CSDL
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="contact-info">
            <span class="phone">Tel No. (+84) 0772568859</span>

            <?php if(isset($_SESSION['admin'])) : ?>
                <a href="#" class="login"><?= $_SESSION['admin'] ?></a>
                <a href="?option=logout" class="login">Logout</a>
            <?php elseif(isset($_SESSION['member'])) : ?>
                <a href="#" class="login"><?= $_SESSION['member'] ?></a> 
                <a href="?option=logout" class="login">Logout</a>
            <?php else : ?>
                <a href="?option=login" class="login">Đăng nhập</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="navbar">
        <img src="img/logo.png" alt="Logo">
        <div class="menu">
            <a href="?option=home" class ="home">TRANG CHỦ</a>
            <a href="?option=routes">TUYẾN XE BUÝT</a>
            <a href="?option=stop">TRẠM DỪNG</a>
            <a href="?option=findroute">TÌM ĐƯỜNG</a>
            <a href="?option=map">BẢN ĐỒ </a>
            <a href="?option=about">VỀ CHÚNG TÔI</a>
            <!-- <a href="#">LIÊN HỆ</a> -->
        </div>
    </div>
</body>
</html>
