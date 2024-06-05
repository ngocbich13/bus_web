<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/ad.css">
</head>
<body>
<div class="login-container">
        <h2>Đăng nhập Admin</h2>
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
            </div>
            <div class="buttons">
                <button type="submit">Đăng nhập</button>
            </div>
        </form>
</div>
</body>
</html>