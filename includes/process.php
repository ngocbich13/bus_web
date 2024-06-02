
<html>
<head>
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
    <?php
    // process.php

    // Kiểm tra nếu có dữ liệu gửi từ form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kiểm tra xem nút Tìm đường đã được nhấn chưa
        if (isset($_POST["submit"])) {
            // Lấy dữ liệu từ form
            $start = $_POST["start"];
            $end = $_POST["end"];

            // Gọi hàm tìm đường xe buýt
            findBusRoute($start, $end);
        }
    }

    // Hàm tìm đường xe buýt
    function findBusRoute($start, $end) {
        global $connect; // Using $connect inside the function

        // Thực hiện truy vấn để tìm lộ trình của tuyến xe buýt dựa trên điểm xuất phát và điểm đến
        $sql = "SELECT * FROM routes WHERE lo_trinh LIKE '%$start%' AND lo_trinh LIKE '%$end%'";

        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            // Hiển thị lộ trình nếu tìm thấy
            echo "<table class='bus'>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>Tên tuyến</td>";
                echo "<td><b>" . $row["tuyen"] . "</b></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Lộ trình </td>";
                echo "<td><b>" . $row["lo_trinh"] . "</b></td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            // Hiển thị thông báo nếu không tìm thấy
            echo "Không tìm thấy tuyến xe buýt cho đường đi này.";
        }

        // Đóng kết nối cơ sở dữ liệu
        $connect->close();
    }
    ?>
</body>
</html>
