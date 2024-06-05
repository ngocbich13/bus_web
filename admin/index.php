<?php

$connect = new mysqli('localhost', 'root', '', 'bus_routes');

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $connect->query($query);
    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu Admin ');</script>";
    } else {
        $result = mysqli_fetch_array($result);
        if ($result['status'] == 0) {
            echo "<script>alert('Tài khoản đang bị khóa');</script>";
        } else {
            $_SESSION['admin'] = $username; 
            header("Location: admin/controlpanel.php"); 
            exit;
        }
    }
}
?>

<section>
<?php 
if (isset($_SESSION['admin'])){
    header("Location: admin/controlpanel.php"); // Chuyển hướng đến controlpanel.php nếu đã đăng nhập
    exit;
} else {
    include 'login.php'; // Bao gồm login.php nếu chưa đăng nhập
}
?>
</section>
</body>
</html>
