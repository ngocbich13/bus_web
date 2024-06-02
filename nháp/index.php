<?php
// include 'database.php'; 

// Số sản phẩm mỗi trang
$productsperpage = 2;

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Tính toán chỉ số bắt đầu
$from = ($page - 1) * $productsperpage;

// Truy vấn tổng số sản phẩm
$query = "SELECT COUNT(*) AS total FROM products";
$result = $connect->query($query);
$row = $result->fetch_assoc();
$totalProducts = $row['total'];

// Tính tổng số trang
$totalPages = ceil($totalProducts / $productsperpage);

// Truy vấn các sản phẩm cho trang hiện tại
$query = "SELECT * FROM products LIMIT $from, $productsperpage";
$result = $connect->query($query);

echo "<h1>Danh sách sản phẩm</h1>";
while ($product = $result->fetch_assoc()) {
    echo "<div>" . $product['product_name'] . "</div>";
}

// Hiển thị phân trang
echo "<section class='pages'>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}
echo "</section>";

$connect->close();
?>
