<?php
$connect = new mysqli('localhost', 'root', '', 'bus_routes');

// Kiểm tra kết nối
if ($connect->connect_error) {
    die("Kết nối thất bại: " . $connect->connect_error);
}

// Truy vấn cơ sở dữ liệu
$query = "SELECT * FROM members";
$result = $connect->query($query);

if (!$result) {
    die("Truy vấn thất bại: " . $connect->error);
}
?>

<?php
// đây là câu lệnh xóa username 
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $query = "select * from members where id =$id";
    $result = $connect->query($query); 
//     if(mysqli_num_rows($result)!=0){
//  update trạng tháy nếu bảng a có nối với bảng x 
//  $connect->query("update members set status = 0 where id = $id");
//     }
$connect->query("delete from members where id =$id"); 
header("Location: ?option=username");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin user</title>
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
    <!-- <h2>Thông tin user</h2> -->
    <div class="table-container">
        <div class="action-buttons">
            <a href="?option=adduser" class="btn btn-add">Thêm</a>
        </div>
        <table id="posts">
            <thead>
                <tr>
                    <th style="width:5%">STT</th>
                    <th style="width:5%">id</th>
                    <th style="width:40%">Tên</th>
                   
                    <!-- <th style="width:45%">Email</th> -->
                    <th style="width:10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($result as $item) : ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['username'] ?></td>
                        <td class="action-buttons">
                        <a href="?option=updateuser&id=<?=$item['id'] ?>" class="btn btn-info">Update</a>
                         <a href="?option=username&id=<?=$item['id']?>" onclick="return confirm('Are you sure')" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>
