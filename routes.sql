-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2024 lúc 07:05 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bus_routes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `tuyen` varchar(255) NOT NULL,
  `lo_trinh` text NOT NULL,
  `cu_ly` float NOT NULL,
  `gia_ve_luot` float NOT NULL,
  `gia_ve_thang_nguoi_lon` float DEFAULT NULL,
  `gia_ve_thang_hoc_sinh` float DEFAULT NULL,
  `tan_suat` varchar(255) DEFAULT NULL,
  `thoi_gian_hoat_dong` varchar(255) DEFAULT NULL,
  `ma_so_xe` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `routes`
--

INSERT INTO `routes` (`id`, `tuyen`, `lo_trinh`, `cu_ly`, `gia_ve_luot`, `gia_ve_thang_nguoi_lon`, `gia_ve_thang_hoc_sinh`, `tan_suat`, `thoi_gian_hoat_dong`, `ma_so_xe`) VALUES
(1, 'T1A:\nTrần Quý Cáp - Suối Mơ', 'Trần Quý Cáp (Chợ Lớn) - ĐH Quang Trung - Trần Hưng Đạo - CĐ Bình Định - Hùng Vương - Ngã 3 Phú Tài - Ngã 3 Hầm Dầu - Khu CN Phú Tài - Trường Lâm Nghiệp - Suối Mơ', 21, 8000, 215000, 185000, '30 phút', '5h40 - 18h40', 'A01'),
(2, 'T1B:\nChợ Lớn - Trường Lâm nghiệp', 'Chợ Lớn - Trường chính trị Tỉnh - Lê Hồng Phong - Sân Vận Động Quy Nhơn - CV Quang Trung - Lý Thường Kiệt - Nguyễn Thái Học - An Dương Vương - ĐH Quy Nhơn - BV Quân Y 13 - Bến Xe Trung Tâm - Tây Sơn - Trường dạy lái xe - Ngã 3 Phú Tài - QL 1A - Trường Lâm Nghiệp', 23, 8000, 215000, 185000, '30 - 35 phút', '5h30 - 19h05', 'B02'),
(3, 'T26:\nĐường 31.3-Trường Lâm Nghiệp', 'Chợ Lớn - Lê Thánh Tôn - BV Đa Khoa Tỉnh - Nguyễn Tất Thnh - Siêu Thị Quy Nhơn - CV Quang Trung - Phan Đình Phùng - Đống Đa - Trần Hưng Đạo - Ngã 3 Ông Thọ - QL 19 - Ngã 4 Tuy Phước - Tỉnh lộ 640 - Cầu Ông Đô - Ga Diêu Trì - Phú Tài - Trường Lâm Nghiệp', 27, 8000, 215000, 185000, '35 phút', '5h25 - 19h05', 'C03'),
(4, 'T34:\nCảng Thị Nại - Gò Găng', 'Cảng Thị Nại - Trần Hưng Đạo - BV Đa khoa TP Quy Nhơn - ĐH Quang Trung - Lê Lợi - Nguyễn Huệ - BV Đa Khoa Tỉnh - Nguyễn Tất Thành - Siêu Thị Quy Nhơn - Hội chợ triển lãm - Lý Thường Kiệt - CV Quang Trung - Ỷ Lan - Đống Đa - Trần Hưng Đạo - Cao Đẳng Bình Định - Hùng Vương - Ngã 3 Phú Tài - Ngã 3 Diêu Trì - Ga Diêu Trì - Ngã 4 Cầu Bà Di - Bình Định - Đập Đá - Gò Găng', 35, 18000, 450000, 420000, '30 - 35 phút', '5h00 - 19h00', 'D04'),
(5, 'T4A:\nCụm TTCN Quang Trung (tuyến chạy nội thành)', 'Chợ Xóm Tiêu - Thành Thái - Hoàng Văn Thụ - Tây Sơn - Bến Xe Trung Tâm - An Dương Vương - ĐH Quy Nhơn - Lê Duẩn - Siêu Thị Quy Nhơn - BV Đa Khoa Tỉnh - Lê Lợi - Trần Hưng Đạo - ĐH Quang Trung - BV Đa Khoa Thành Phố - Khu 1', 9.5, 5000, 130000, 100000, '15 - 20 phút', '(tạm dừng hoạt động)', 'E05'),
(6, 'T18:\nQuy Nhơn - Đồng Phó (Tây Sơn)', 'Chợ Lớn - Lê Thánh Tôn - Chợ Cháo - BV Đa Khoa Tỉnh - Siêu Thị - CV Quang Trung - Ỷ Lan - Đống Đa - Trần Hưng Đạo - Ngã 3 Ông Thọ - QL 19 - Ngã 4 Tuy Phước - Cầu Bà Di - Phú Phong - Đồng Phó - Cầu 16', 63.5, 26000, 680000, 650000, '30 - 35 phút', '4h50 - 19h50', 'F06'),
(7, 'T01:\nCầu 16-Vĩnh Hảo (Vĩnh Thạnh)', 'Cầu 16 - Tỉnh lộ 637 - Định Bình - Vĩnh Thạnh - Vĩnh Hảo', 20, 16000, 400000, 370000, '1h30 phút', '5h40 - 19h10', 'G07'),
(8, 'T2A:\nQuy Nhơn - Gò Bồi (Tuy Phước) - Cát Tiến (Phù Cát)', 'Chợ Lớn - ĐH Quang Trung - Lê Lợi - BV Đa Khoa Tỉnh - Siêu Thị Quy Nhơn - An Dương Vương - ĐH Quy Nhơn - BV Quân Y 13 - BX Trung Tâm Quy Nhơn - Tây Sơn - Trường Dạy Lái Xe - Ngã 3 Phú Tài - Diêu Trì - Ga Diêu Trì - Cầu Ông Đô - Ngã 4 Tuy Phước - Gò Bồi - Chùa Ông Núi - Cát Tiến', 40, 18000, 450000, 420000, '50 - 60 phút', '5h30 - 19h00', 'H08'),
(9, 'T10: Quy Nhơn - Bến xe Bùi Thị Xuân', 'Ngã 4 Phan Bội Châu và Lê Thánh Tôn - Nguyễn Huệ - BV Đa khoa Tỉnh - Siêu thị Quy Nhơn - Lý Thường Kiệt - CV Quang Trung - Phan Đình Phùng - Ngã 3 Đống Đa - Trần Hưng Đạo - Tháp Đôi - QL19 - ĐH Quang Trung (mới) - Tỉnh lộ 640 - Ngã 3 cầu Ông Đô - QL1A - Ga Diêu Trì - Ngã 3 Phú Tài - Ngã 3 Hầm Dầu - Dốc Ông Phật - Trường Lâm Nghiệp - Bến Bùi Thị Xuân', 35, 8000, 215000, 185000, '35 phút', '5h25 - 19h05', 'I09'),
(10, 'T24: Quy Nhơn - Đập Đá - Gò Găng', 'Cảng Thị Nại - Trần Hưng Đạo - BV Đa khoa TP - Trần Cao Vân - Chùa Long Khánh - BV Đa Khoa Tỉnh - Nguyễn Tất Thành - Siêu Thị Quy Nhơn - Lý Thường Kiệt - CV Quang Trung - Ỷ Lan - Ngã 3 Đống Đa - Tháp Đôi - Trần Hưng Đạo - Cầu Đôi - Hùng Vương - Cao Đẳng Bình Định - Ngã 3 Long Vân - Ngã 3 Phú Tài - QL1A - Ga Diêu Trì - Ngã 4 Cầu Bà Di - Đập Đá - Ngã 4 Gò Găng ', 35, 16000, 400000, 370000, '30 - 35 phút', '5h00 - 19h00', 'J10'),
(11, 'T15: Chợ Xóm Tiêu - BV đa Khoa TP', 'Chợ Xóm Tiêu - Thành Thái - Hoàng Văn Thụ - Tây Sơn - Bến Xe Trung Tâm - An Dương Vương - BV Quân y 13 - ĐH Quy Nhơn - Lê Duẩn - Nguyễn Tất Thành - Siêu Thị Quy Nhơn - Nguyễn Huệ - BV đa khoa Tỉnh - Khách sạn Lê Lợi - Lê Lợi - Trần Hưng Đạo - BV Đa Khoa TP - Khu 1 ', 15, 5000, 130000, 100000, '15 - 20 phút', '(tạm dừng hoạt động)', 'K11'),
(12, 'T27: Quy Nhơn – Gò Bồi – Phù Cát', 'Chợ Lớn - ĐH Quang Trung - Lê Lợi - KS Lê Lợi - Tòa án Tỉnh Bình Định - Nguyễn Huệ - BV Đa Khoa Tỉnh - Nguyễn Tất Thành - Siêu Thị Quy Nhơn - Lê Duẩn - Ngã 5 Ngô Mây - ĐH Quy Nhơn - BX Trung Tâm Quy Nhơn - Tây Sơn - Trường dạy lái xe - Hùng Vương - Ngã 3 Phú Tài - Ga Diêu Trì - Tỉnh lộ 640 - Ngã 4 Tuy Phước - Gò Bồi - Chùa Ông Núi - Cát Tiến', 50, 18000, 450000, 420000, '50 - 60 phút', '5h30 - 19h00', 'L12'),
(13, 'T9A: Quy Nhơn - Diêu Trì - Vân Canh', 'Ngã 4 Phạm Hùng và Đô Đốc Bảo - Nguyễn Tất Thành - Siêu Thị Quy Nhơn - An Dương Vương - ĐH Quy Nhơn - BV Quân Y 13 - Tây Sơn - BX Trung Tâm Quy Nhơn - Trường Dạy Lái Xe - Hùng Vương - Ngã 3 Phú Tài - Ngã 3 Diêu Trì - Phước An - Canh Vinh - thị trấn Vân Canh', 50, 20000, 550000, 520000, '50 - 60 phút', '5h15 - 18h50', 'M13'),
(14, 'T11: Quy Nhơn - Sông Cầu - Chí Thạnh (tỉnh Phú Yên)', 'Ngã 4 Trần Thị Kỷ và Lê Duẩn - Trần Thị Kỷ - Nguyễn Tất Thành - An Dương Vương - ĐH Quy Nhơn - Bệnh viện Quân Y 13 - Bến xe Quy Nhơn - Siêu thị Metro Quy Nhơn - QL1D - Bãi Bàu - Bãi Dại - Bãi Xép - Cầu Bình Phú - xã Xuân Hải (huyện Sông Cầu) - xã Xuân Cảnh - Thị xã Sông Cầu - Thị trấn Chí Thạnh (tỉnh Phú Yên', 50, 28000, 850000, 820000, '50 - 60 phút', '5h30 - 19h05', 'N14'),
(15, 'T12: Quy Nhơn – Tam Quan', 'Ngã 4 Trần Thị Kỷ và Lê Duẩn - Lê Duẩn - An Dương Vương - ĐH Quy Nhơn - Bệnh viện Quân Y 13 - Tây Sơn - Bến xe Quy Nhơn - Hùng Vương - Ngã 3 Phú Tài - Ngã 3 Diêu Trì - Huyện An Nhơn - Huyện Phù Cát - Ngã 3 Chợ Gồm - Phù Ly - thị trấn Phù Mỹ - thị trấn Bình Dương - Ngã 3 Tam Tượng - Bồng Sơn - Tam Quan', 30, 14000, 400000, 370000, '30 - 35 phút', '4h30 - 20h35', 'O15'),
(16, 'T13: Bệnh viện Bồng Sơn - Thị Trấn An Lão', 'Bệnh viện Hoài Nhơn - Chợ Bồng Sơn - UBND Xã Ân Mỹ - Trường tiểu học Ân Hảo - Chợ Bình Hòa - Hạt Kiểm lâm An Hòa - Chợ Xuân Phong - Ngã 3 Long Hòa - UBND TT An lão - Huyện Đội An Lão', 60, 17000, 480000, 450000, '60 - 70 phút', '6h00 - 18h10', 'P16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
