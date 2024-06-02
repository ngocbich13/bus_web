<!DOCTYPE html>
<html>
<head>
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        h1 {
            text-align: center;
        }
        .accordion-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80%;
            margin: 50px auto;
        }
        .accordion, .panel {
            background-color: #eee;
            color: #444;
            width: 90%;
            padding: 12px;
            border: none;
            text-align: left;
            outline: none;
            transition: 0.4s;
            cursor: pointer;
            font-size: 18px;
        }
        .accordion i {
            transition: transform 0.4s;
        }
        .accordion.active i {
            transform: rotate(90deg);
        }
        .active, .accordion:hover {
            background-color: #ccc;
        }
        .panel {
            padding: 0px;
            background-color: #eee;
            display: none;
            overflow: hidden;
        }
        .parts-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
        .part {
            flex: 1 1 auto;
            min-width: 150px;
            margin: 5px 0;
        }
        .part span {
            display: block;
            padding: 5px 0;
            font-size: 14px;
        }
        .part i {
            color: green;
            margin-right: 5px;
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var accordions = document.getElementsByClassName("accordion");
            for (var i = 0; i < accordions.length; i++) {
                accordions[i].addEventListener("click", function() {
                    var panels = document.getElementsByClassName("panel");
                    for (var j = 0; j < panels.length; j++) {
                        if (panels[j] !== this.nextElementSibling) {
                            panels[j].style.display = "none";
                            panels[j].previousElementSibling.classList.remove("active");
                        }
                    }
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        });
    </script>
</head>
<body>

<h1>Kết quả tìm kiếm: <?php echo htmlspecialchars($_GET['part']); ?></h1>

<div class="accordion-container">
<?php


// Lấy phần tử từ URL
if (isset($_GET['part'])) {
    $part = $_GET['part'];

    // Sử dụng câu lệnh chuẩn bị để tránh SQL Injection
    $stmt = $connect->prepare("SELECT tuyen, lo_trinh FROM routes WHERE lo_trinh LIKE ?");
    $param = "%$part%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Hiển thị kết quả
            $tuyen = htmlspecialchars($row["tuyen"]);
            $lo_trinh = htmlspecialchars($row["lo_trinh"]);
            $parts = explode(' - ', $row["lo_trinh"]);
            $parts = array_map('trim', $parts);
            ?>
            <button class="accordion"><i class="fas fa-chevron-right"></i> Tuyến xe: <?php echo $tuyen; ?></button>
            <div class="panel">
                <div class="parts-container">
                    <div class="part">
                        <span><strong>Lộ trình:</strong> <?php echo $lo_trinh; ?></span>
                    </div>
                    <?php foreach ($parts as $part) { ?>
                        <!-- <div class="part">
                            <span><i class="fas fa-map-marker-alt"></i><a href="?option=search_results&part=<?php echo urlencode($part); ?>"><?php echo htmlspecialchars($part); ?></a></span>
                        </div> -->
                    <?php } ?>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Không có kết quả cho '$part'";
    }

    $stmt->close();
} else {
    echo "Không có phần tử được chỉ định";
}

$connect->close();
?>
</div>

</body>
</html>
