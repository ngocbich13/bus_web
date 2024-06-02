<!-- home.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Route Website</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
<div class="container">
    <div class="left-column">
        <h2>Tuyến Xe</h2>
        <?php
            include 'includes/pagination.php';

            if (count($routes) > 0) {
                foreach ($routes as $row) {
                    $imageId = $row['id'];
                    echo '<div class="route-card">';
                    echo '<img src="img/' . $imageId . '.jpg" alt="Bus Route Image">';
                    echo '<div>';
                    echo '<a href="?option=routes&route_id=' . $row['id'] . '"><h3>' . $row['tuyen'] . '</h3></a>';
                    echo '<p>Lộ trình: ' . $row['lo_trinh'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Không có tuyến xe nào.</p>';
            }

            // Hiển thị phân trang
            display_pagination($totalPages, $page);
        ?>
    </div>
    <div class="right-column">
        <h2>Mã Số Xe</h2>
        <ul class="grid">
            <?php
                $sql = "SELECT ma_so_xe FROM routes";
                $result = $connect->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li>' . $row['ma_so_xe'] . '</li>';
                    }
                } else {
                    echo '<li>Không có mã số xe nào.</li>';
                }
            ?>
        </ul>
    </div>
</div>
</body>
</html>
