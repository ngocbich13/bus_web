<?php

if (isset($_GET['route_id'])) {
    $route_id = intval($_GET['route_id']);
    $query = "SELECT * FROM routes WHERE id = $route_id";
    $result = $connect->query($query);

    if ($result->num_rows > 0) {
        $route = $result->fetch_assoc();
    } else {
        echo "<p>Không tìm thấy tuyến xe.</p>";
        exit();
    }
} else {
    echo "<p>Không tìm thấy tuyến xe.</p>";
    exit();
}

$connect->close();
?>
<!DOCTYPE html>
        <html lang="vi">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thông tin tuyến xe buýt</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
            <link rel="stylesheet" href="css/styles.css">
            <style>
                body { font-family: Arial, sans-serif; }
                .bus { width: 80%; margin: 50px auto; border-collapse: collapse; }
                .bus tbody tr td { padding: 10px; border: 1px solid #ddd; }
                .bus tbody tr td strong, .bus tbody tr td b { font-weight: bold; }
                .bus tbody tr td:first-child { font-weight: bold; background-color: #f4f4f4; }
                /* Center align and uppercase the header text */
                .bus tbody tr.header td { 
                 text-align: center; 
                 text-transform: uppercase; 
        }
                
            </style>
        </head>
        <body>
        <div class="route-info">
            <table class="bus">
                <tbody>
                    <tr class="header">
                        <td colspan="2">Thông tin chi tiết tuyến xe : <?php echo substr($route['tuyen'], 4); ?></td>
                    </tr>
                    <tr>
                        <td>Mã số tuyến</td>
                        <td><strong><?php echo substr($route['tuyen'], 0, 3); ?></strong></td> 
                    </tr>
                    <tr>
                        <td>Tên tuyến</td>
                        <td><b><?php echo substr($route['tuyen'], 4); ?></b></td>
                    </tr>
                    <tr>
                        <td>Mã số xe</td>
                        <td> <b><?php echo $route['ma_so_xe']; ?></b></td>
                    </tr>
                    <tr>
                        <td>Giá vé theo lượt</td>
                        <td><b><?php echo number_format($route['gia_ve_luot'],0,',','.'); ?> VND/lượt</b></td>
                    </tr>
                    <tr>
                        <td>Giá vé người lớn theo tháng</td>
                        <td><b><?php echo number_format($route['gia_ve_thang_nguoi_lon'],0,',','.'); ?> VND/tháng/người</b></td>
                    </tr>
                    <tr>
                        <td>Giá vé học sinh theo tháng</td>
                        <td><b><?php echo number_format($route['gia_ve_thang_hoc_sinh'],0,',','.'); ?> VND/tháng/người</b></td>
                    </tr>
                    <tr>
                        <td>Lượt đi - về</td>
                        <td><b><?php echo $route['lo_trinh']; ?> và ngược lại.</b></td>
                    </tr>
                    <tr>
                        <td>Quãng đường</td>
                        <td> <b><?php echo $route['cu_ly']; ?> Km</b></td>
                    </tr>
                    <tr>
                        <td>Thời gian đi</td>
                        <td><b><?php echo $route['thoi_gian_hoat_dong'] ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </body>
        </html>
     