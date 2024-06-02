<?php

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM members WHERE username = '$username' AND password = '$password'";
    $result = $connect->query($query);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu');</script>";
    } else {
        session_start();
        $_SESSION['member'] = $username;
        echo "<script>alert('Đăng nhập thành công'); location.href='?option=home';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="css/ad.css">
</head>
<body>
  <div class="login-container">
    <h2>Đăng nhập</h2>
    <form method="POST">
      <div class="form-group">
        <input type="text" id="username" name="username" required placeholder="Tên đăng nhập">
      </div>
      <div class="form-group">
        <input type="password" id="password" name="password" required placeholder="Mật khẩu">
      </div>
      <div class="options">
        <label>
            <input type="checkbox"> Lưu mật khẩu
        </label>
        <a href="#">Quên mật khẩu</a>
        <a href="?option=register">Đăng kí tài khoản</a>
        <a href="?option=admin">Đăng nhập Admin</a>
      </div>
      <div class="buttons">
        <!-- <button type="button" onclick="window.close();">Đóng</button> -->
        
        <button type="submit">Đăng nhập</button>
        
      </div>
    </form>
  </div>
</body>
</html>
