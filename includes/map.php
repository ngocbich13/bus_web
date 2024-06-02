<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm đường xe buýt & Bản đồ Bình Định</title>
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
           
           .search-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        .search-container h1 {
            margin-bottom: 20px;
        }
        .search-container .form-group {
            width: 100%;
            max-width: 400px;
            margin: 3px 0;
            ;
        }
        .search-container input, .search-container select, .search-container button {
            width: 100%;
            padding: 10px 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .search-container button {
            background-color: #45a049;
            color: white;
            border: none;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #3e8e41;
        }
        h1 {
            color: red;
        }


        #map_canvas {
            height: 400px;
            width: 60%;
            margin: 20px auto;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .map-container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <h1>Tìm đường xe buýt Bình Định</h1>
        <!-- Form để nhập điểm xuất phát và điểm đến -->
        <form action="?option=process" method="post">
    <div class="form-group">
        <input type="text" id="start" name="start" placeholder="Nhập điểm xuất phát">
    </div>
    <div class="form-group">
        <input type="text" id="end" name="end" placeholder="Nhập điểm đến">
    </div>
    <div class="form-group">
        <button type="submit" name="submit">Tìm đường</button>
    </div>
</form>

    </div>

    <div class="map-container">
        <div id="map_canvas"></div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Khởi tạo bản đồ
        var map = L.map('map_canvas').setView([13.782, 109.219], 12); // Toạ độ trung tâm của Bình Định

        // Thêm layer tile
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Tùy chọn thêm marker tại Bình Định
        L.marker([13.782, 109.219]).addTo(map)
            .bindPopup('Bình Định')
            .openPopup();
    </script>
</body>
</html>


