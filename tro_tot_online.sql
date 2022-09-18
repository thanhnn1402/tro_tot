-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 24, 2022 lúc 02:48 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tro_tot_online`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_baidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`id`, `username`, `id_baidang`) VALUES
(2, 'admin1234', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ten_tro` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gia_phong` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mo_ta` varchar(2000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinh_anh` varchar(300) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `link_map` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gia_tien` int(100) NOT NULL,
  `so_ngay` int(3) NOT NULL,
  `ngay_dang_tin` date NOT NULL,
  `ngay_het_han` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `username`, `ten_tro`, `dia_chi`, `gia_phong`, `mo_ta`, `hinh_anh`, `link_map`, `gia_tien`, `so_ngay`, `ngay_dang_tin`, `ngay_het_han`) VALUES
(4, 'admin1234', 'Phòng Trọ Cao Cấp, Kiểu Mini House Full Nội Thất', 'Quận Ninh Kiều | Cần Thơ', '1000000', '🏠CHO THUÊ MINI HOUSE CAO CẤP, 1 TRỆT 1 LỬNG CỰC ĐẸP, AN KHÁNH, NINH KIỀU-NHÀ FULL NỘI THẤT\n\n💰GIÁ: 4,2 triệu/căn\n\n👉 Mỗi căn đều 1 Trệt 1 Lửng 30m2 rất rộng rãi, 1 cửa chính, 2 cửa sổ, Màn cửa, 1 Tủ Bếp, 1 WC, Nhà dán gạch cao 2m, trần thạch cao rất sạch sẽ..\n\n👉 có lối đi chung 3m, xe tải nhỏ vào tới phòng..\n\n👉 Nhà Full Nội Thất: MÁY LẠNH, MÁY GIẶT, TỦ LẠNH, SOFA, NỆM, TỦ, MÁY NÓNG LẠNH, KỆ..\n👉 Wifi miễn phí\n👉 Cổng rào vân tay, ra vào tự do, có lắp camera trước sau rất an ninh\n👉 Có nhà để xe riêng\n\n📍Vị trí: Nhà nằm trục chính hẻm Tổ 4 Nguyễn Văn Linh Thông qua KDC Đại Học Y Dược, Thuộc Phường An Khánh, Ninh Kiều... Nhà nằm cách Chợ Bà Bộ 150m, Trường Đại Học Y DƯỢC 200m, nên rất thuận tiện để đi lại....\n\n🏚️Nhà nằm trục Chính Hẻm 6m\n👉 Cọc 1 tháng, Đóng tiền đầu tháng\n👉 Hợp đồng trên 6 tháng\n\n___________________________\n☎️LIÊN HỆ: *** gặp TOÀN\n\nNhấn để hiện số: 0917112811', '../pages/uploads/POSTS_admin1234JfMUX.png, ../pages/uploads/POSTS_admin1234OYDL8.png, ../pages/uploads/POSTS_admin1234mo96K.png, ../pages/uploads/POSTS_admin1234RapAE.png', '../pages/getmap.php?vung=10.030142442667987, 105.75293514232837&tieude=Cho Thuê Căn Hộ Cao Cấp, cập bên Đại Học Y Dược&mota=Nhà trọ cao cấp', 30000, 30, '2022-07-23', '2022-08-22'),
(5, 'admin1234', 'Cho Thuê Căn Hộ Cao Cấp, cập bên Đại Học Y Dược', '', '1200000', '???? Khách có việc k ở nửa..cần pass lại 1 phòng như hình\n\n????CHO THUÊ MINI HOUSE CAO CẤP, 1 TRỆT 1 LỬNG CỰC ĐẸP, AN KHÁNH, NINH KIỀU-NHÀ FULL NỘI THẤT\n\n????Giá: 4,5 triệu/căn\n\n???? Mỗi căn đều 1 Trệt 1 Lửng 50m2 rất rộng rãi, 1 cửa chính, 1 cửa sổ, 1 Tủ Bếp, 1 WC, Nhà dán gạch cao 2m, trần thạch cao rất sạch sẽ..\n\n???? 10 căn 2 dãy đối nhau có lối đi chung chính giữa 3m, xe tải nhỏ vào tới phòng..\n\n???? Nhà Full Nội Thất: MÁY LẠNH, MÁY GIẶT, TỦ LẠNH, GIƯỜNG NGỦ (CÓ NỆM), TỦ ÁO, BÀN ĂN, MÁY NÓNG LẠNH..\n\n???? Điện nước giá nhà nước, Wifi miễn phí\n\n????Vị trí: Nhà nằm trục chính hẻm Tổ 4 Nguyễn Văn Linh Thông qua KDC Đại Học Y Dược, Thuộc Phường An Khánh, Ninh Kiều... Nhà nằm cách Chợ Bà Bộ 150m nên rất thuận tiện\n\n????️Nhà nằm trục Chính Hẻm 6m\n\n???? Cọc 1 tháng, Đóng tiền đầu tháng\n???? Hợp đồng trên 6 tháng\n___________________________\n☎️LIÊN HỆ: *** gặp TOÀN\n\nNhấn để hiện số: 0917112811', '../pages/uploads/POSTS_admin1234JweWf.png, ../pages/uploads/POSTS_admin1234HYkgG.png, ../pages/uploads/POSTS_admin1234coHql.png, ../pages/uploads/POSTS_admin1234Bp4GC.png, ../pages/uploads/POSTS_admin1234CZS1e.png, ../pages/uploads/POSTS_admin1234FYnHo.png, ../pages/uploads/POSTS_admin1234Eeiuf.png,', '../pages/getmap.php?vung=10.030142442667987, 105.75293514232837&tieude=Cho Thuê Căn Hộ Cao Cấp, cập bên Đại Học Y Dược&mota=Nhà trọ cao cấp', 30000, 30, '2022-07-23', '2022-08-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tieu_de` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noi_dung` varchar(1500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `trang_thai` int(2) NOT NULL,
  `ngay_gui` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `support`
--

INSERT INTO `support` (`id`, `username`, `email`, `tieu_de`, `noi_dung`, `trang_thai`, `ngay_gui`) VALUES
(4, 'admin1234', 'tranthuongchannel07113@gmail.com', 'Giá trọ', 'Giá trọ bài viết 05 không đúng với thực tế vui lòng kiểm tra lại', 0, '2022-07-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `username` char(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` char(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sodu` int(100) NOT NULL,
  `tel` char(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `link_avt` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `level` int(3) NOT NULL,
  `date_c` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `username`, `password`, `sodu`, `tel`, `diachi`, `link_avt`, `level`, `date_c`) VALUES
(5, 'tranthuongchannel07114@gmail.com', 'Trần Thương', 'admin1234', '123456', 1000000, '0188868885555', 'Huyện Phụng Hiệp - Hậu Giang', '../pages/uploads/AVT_admin1234.png', 1, '2022-07-18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
