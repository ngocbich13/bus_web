<?php
// pagination.php


// Số tuyến xe mỗi trang
$routesPerPage = 6;

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Tính toán chỉ số bắt đầu
$from = ($page - 1) * $routesPerPage;

// Truy vấn tổng số tuyến xe
$query = "SELECT COUNT(*) AS total FROM routes";
$result = $connect->query($query);
$row = $result->fetch_assoc();
$totalRoutes = $row['total'];

// Tính tổng số trang
$totalPages = ceil($totalRoutes / $routesPerPage);

// Truy vấn các tuyến xe cho trang hiện tại
$query = "SELECT * FROM routes LIMIT $from, $routesPerPage";
$result = $connect->query($query);

$routes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $routes[] = $row;
    }
}

// Hiển thị phân trang
function display_pagination($totalPages, $currentPage)
{
    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            echo "<span class='current-page'>$i</span>";
        } else {
            echo "<a href='?page=$i'>$i</a>";
        }
    }
    echo "</div>";
}
?>

<html>
    <style>
        /* Pagination styles */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
.pagination a, .pagination .current-page {
    margin: 0 5px;
    padding: 5px 10px;
    background-color: #5ab465;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
}
.pagination a:hover {
    background-color: #3e8e41;
}
.pagination .current-page {
    background-color: #3e8e41;
    font-weight: bold;
}

    </style>
</html>