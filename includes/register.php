<?php 
if(isset($_POST['username'])){
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<script> alert('Mật khẩu và mật khẩu nhập lại không khớp. Vui lòng nhập lại.'); </script>";
    } else {
        $connect = new mysqli('localhost', 'root', '', 'bus_routes');
        if ($connect->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $connect->connect_error);
        }

        $query = "SELECT * FROM members WHERE username = '$username'"; 
        $result = $connect->query($query);
        if($result === false) {
            die("Lỗi trong quá trình thực hiện truy vấn: " . $connect->error);
        }

        if(mysqli_num_rows($result) != 0){
            echo "<script> alert('Tên đăng nhập không khả dụng, vui lòng chọn một tên đăng nhập khác'); </script>"; 
        } else {
            $query = "INSERT INTO members (username, password) VALUES ('$username', '$password')";
            if ($connect->query($query) === TRUE) {
                echo "<script> alert('Bạn đã đăng ký tài khoản thành công. Chúng tôi sẽ liên hệ sớm với bạn.'); location='?option=home';</script>";
            } else {
                echo "<script> alert('Đăng ký tài khoản thất bại. Vui lòng thử lại sau.'); </script>";
            }
        }

        $connect->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <style>
    body {
        font-family: Arial, sans-serif;
    }
    .login-container {
        width: 300px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-container h2 {
        margin-bottom: 20px;
        text-align: center;
    }
    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        align-items: center;
        
    }
    .login-container input[type="checkbox"] {
        margin-right: 5px;
    }
    .login-container .options {
        margin: 10px 0;
        text-align: left;
    }
    .login-container .options a {
        display: block;
        margin: 5px 0;
        color: #00f;
        text-decoration: none;
    }
    .login-container .buttons {
        text-align: center;
    }
    .login-container .buttons button {
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        background-color: #45a049;
        color: #fff;
        cursor: pointer;
    }
    .login-container .buttons button:first-child {
        background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Đăng kí tài khoản</h2>
    <form method="POST">
      <div class="form-group">
        <input type="text" id="username" name="username" required placeholder="Tên đăng nhập">
      </div>
      <div class="form-group">
        <input type="password" id="password" name="password" required placeholder="Mật khẩu">
      </div>
      <div class="form-group">
        <input type="password" id="password" name="confirm_password" required placeholder="Nhập lại mật khẩu">
      </div>
      <div class="options">
        <label>
            <input type="checkbox"> Lưu mật khẩu
        </label>
       
      </div>
      <div class="buttons">
        
        <button type="submit">Đăng kí </button>
      </div>
    </form>
  </div>
</body>
</html>
