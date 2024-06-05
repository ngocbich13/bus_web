<?php
$connect = new mysqli('localhost', 'root', '', 'bus_routes');

if ($connect->connect_error) {
    die("Kết nối thất bại: " . $connect->connect_error);
}

// Truy vấn cơ sở dữ liệu
$query = "SELECT * FROM routes";
$routes = $connect->query($query);

if (!$routes) {
    die("Truy vấn thất bại: " . $connect->error);
}
?>

<?php
// đây là câu lệnh xóa username 
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $query = "select * from routes where id =$id";
    $result = $connect->query($query); 
//     if(mysqli_num_rows($result)!=0){
//  update trạng tháy nếu bảng a có nối với bảng x 
//  $connect->query("update members set status = 0 where id = $id");
//     }
$connect->query("delete from routes where id =$id"); 
header("Location: ?option=routes");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tuyến xe buýt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        .table-container {
            margin: 30px auto;
            width: 80%;
            overflow-x: auto;
        }

        #posts {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #posts thead tr {
            color: #FFF;
            background-color: #293b5f;
        }

        #posts th, #posts td {
            padding: 12px 15px;
            text-align: left;
        }

        #posts tbody tr:nth-child(2n) {
            background-color: #f5f5f5;
        }

        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 2px;
            display: inline-block;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        .btn-add {
            background-color: #198754;
            color: white;
        }
        .btn-add:hover {
            background-color: #198754;
        }

        .btn-danger {
            background-color: #dc3565;
            color: white;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .action-buttons {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <h2>Thông tin tuyến xe buýt</h2>
    <div class="table-container">
    <div class="action-buttons">
            <a href="?option=addroute" class="btn btn-add">Thêm</a>
        </div>
        <table id="routes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tuyến</th>
                    <th>Lộ trình</th>
                    <th>Cự ly</th>
                    <th>Giá vé lượt</th>
                    <th>Giá vé tháng người lớn</th>
                    <th>Giá vé tháng học sinh</th>
                    <th>Tần suất</th>
                    <th>Thời gian hoạt động</th>
                    <th>Mã số xe</th>
                    <!-- style="width:10%" -->
                    <th >Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($routes as $item) : ?>
                    <tr>
                        <td><?= htmlspecialchars($item['id']) ?></td>
                        <td><?= htmlspecialchars($item['tuyen']) ?></td>
                        <td><?= htmlspecialchars($item['lo_trinh']) ?></td>
                        <td><?= htmlspecialchars($item['cu_ly']) ?></td>
                        <td><?= htmlspecialchars($item['gia_ve_luot']) ?></td>
                        <td><?= htmlspecialchars($item['gia_ve_thang_nguoi_lon']) ?></td>
                        <td><?= htmlspecialchars($item['gia_ve_thang_hoc_sinh']) ?></td>
                        <td><?= htmlspecialchars($item['tan_suat']) ?></td>
                        <td><?= htmlspecialchars($item['thoi_gian_hoat_dong']) ?></td>
                        <td><?= htmlspecialchars($item['ma_so_xe']) ?></td>
                        <td class="action-buttons">
                        <a href="?option=updateroute&id=<?=$item['id'] ?>" class="btn btn-info">Update</a>
                        <a href="?option=routes&id=<?= $item['id'] ?>" onclick="return confirm('Are you sure')" class="btn btn-danger">Delete</a>

                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>
