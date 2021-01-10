-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 02:06 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `MaDonDatHang` int(11) NOT NULL,
  `NgayLap` datetime DEFAULT NULL,
  `TongThanhTien` int(11) DEFAULT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaTinhTrang` int(11) NOT NULL,
  `TenKhachHang` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChiGiaoHang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dondathang_sanpham`
--

CREATE TABLE `dondathang_sanpham` (
  `id` int(11) NOT NULL,
  `MaDonDatHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `MaSanPham` int(50) DEFAULT NULL,
  `MaNguoiDung` int(50) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id`, `MaSanPham`, `MaNguoiDung`, `SoLuong`) VALUES
(1, 4, 1, 2),
(2, 5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHangSanXuat` int(11) NOT NULL,
  `TenHangSanXuat` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LogoURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `LogoURL`, `BiXoa`) VALUES
(1, 'Revell', 'Revell.png', 0),
(2, 'Lego', 'Lego.png', 0),
(3, 'Lamaze', 'Lamaze.png', 0),
(4, 'vTech', 'vtech.png', 0),
(5, 'Rastar', 'Rastar.jpg', 0),
(6, 'Syma', 'Syma.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSanPham` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `LoaiSanPham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(1, 'Áo', 0),
(2, 'Quần', 0),
(3, 'Đồ chơi', 0),
(4, 'Đồ Vest', 0),
(5, 'Váy', 0),
(6, 'Đồ bơi', 0);
-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MaLoaiTaiKhoan` int(11) NOT NULL,
  `TenLoaiTaiKhoan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaSanPham` int(11) DEFAULT NULL,
  `NgayNhap` datetime DEFAULT NULL,
  `SoLuongTon` int(11) DEFAULT NULL,
  `SoLuongBan` int(11) DEFAULT NULL,
  `SoLuocYeuThich` int(11) DEFAULT NULL,
  `MoTa` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0,
  `MaLoaiSanPham` int(11) NOT NULL,
  `MaHangSanXuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `SanPham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `NgayNhap`, `SoLuongTon`, `SoLuongBan`, `SoLuocYeuThich`, `MoTa`, `BiXoa`, `MaLoaiSanPham`, `MaHangSanXuat`) VALUES
(4, 'Bill D. Beaver', '1.jpg', 160000, '2012-08-25 00:00:00', 14, 9, 25, 'Hải lý bằng bông mịn, đẹp, dễ thương', 0, 3, 3),
(5, 'Captain Calamari', '2.jpg', 180000, '2012-05-01 00:00:00', 14, 6, 4, 'Bạch tuộc biển', 0, 3, 3),
(7, 'Elephantunes', '3.jpg', 480000, '2012-09-12 00:00:00', 25, 2, 9, 'Voi bằng bông, hồng xì tin...', 0, 3, 3),
(8, 'Freddie the Firefly', '4.jpg', 300000, '2012-07-03 00:00:00', 30, 0, 8, 'Bướm nhồi bông', 0, 3, 3),
(9, 'Supper Mario', '5.jpg', 380000, '2012-01-01 00:00:00', 24, 6, 14, 'Bộ lấp áp Lego trò chơi Mario', 0, 3, 2),
(10, 'Nasa Academy Space', '6.jpg', 220000, '2012-08-15 00:00:00', 28, 7, 8, 'Tàu con thoi của Nasa', 0, 3, 1),
(11, 'Lamborghini Revention', '7.jpg', 260000, '2012-09-01 00:00:00', 38, 3, 38, 'Siêu xe Lamborghini Revention', 0, 3, 1),
(12, 'Camaro SS', '8.jpg', 260000, '2012-10-02 00:00:00', 20, 0, 0, 'Xe đua Camaro SS', 0, 3, 1),
(13, 'Pond Motion Gym', '9.jpg', 920000, '2012-10-04 00:00:00', 10, 2, 14, 'Niệm lót cho trẻ em', 0, 3, 3),
(14, 'Stacking Rings', '10.jpg', 240000, '2012-09-25 00:00:00', 5, 5, 1, 'Vòng xoay kỳ thú, kích thích sự tò mò của trẻ', 0,3, 3),
(15, 'Octivity Time', '11.jpg', 270000, '2012-08-27 00:00:00', 19, 3, 3, 'Bé mặt trời xanh', 0, 3, 3),
(16, 'Mittens the Kitten', '12.jpg', 190000, '2012-07-13 00:00:00', 50, 3, 5, 'Chú mèo ngộ nghĩnh', 0, 3, 3),
(17, 'Feel Me Fish', '13.jpg', 180000, '2012-09-15 00:00:00', 60, 3, 2, 'Chú cá vàng đa sắc', 0, 3, 3),
(18, 'Huey the Hedgehog', '14.jpg', 200000, '2012-09-14 00:00:00', 30, 30, 22, 'Nhiếm bảy màu, mang đến sự may mắn cho bé', 0, 3, 3),
(19, 'Neat-Oh!', '15.jpg', 110000, '2012-06-12 00:00:00', 19, 13, 24, 'Đồ Chơi Ghép Hình Duka Xây Dựng Thành Phố', 0, 3, 2),
(20, 'Ninjago 2172', '16.jpg', 160000, '2012-07-12 00:00:00', 20, 12, 13, 'Bộ xếp hình Lego thời Ai Cập cổ đại', 0, 3, 2),
(21, 'Mexican', '17.jpg', 140000, '2012-08-17 00:00:00', 35, 12, 12, 'Bộ xếp hình Lego nhạc công Mehico', 0, 3, 2),
(22, 'Star Wars', '18.jpg', 500000, '2012-10-05 00:00:00', 24, 28, 30, 'Bộ xếp hình Lego phi thuyền trong cuộc chiến tranh giữa các vì sao', 0, 3, 2),
(23, 'City Park Cafe 3061', '19.jpg', 950000, '2012-10-07 00:00:00', 30, 2, 24, 'Bộ xếp hình xây dựng shop cafe trong thành phố ', 0, 3, 2),
(24, 'fishing and numerical ', '20.jpg', 150000, '2012-10-08 00:00:00', 39, 2, 6, 'Bộ đồ chơi câu cá và học số thông minh 63 chi tiết', 0, 3, 4),
(25, 'Baby''s Laptop', '21.jpg', 240000, '2012-09-07 00:00:00', 38, 2, 4, 'Laptop thông tin của trẻ em, giúp trẻ phát triển tư duy trí tuệ', 0, 3, 4),
(26, 'Toot Driver Garage', '22.jpg', 620000, '2012-10-07 00:00:00', 20, 12, 30, 'Bãi đỗ xe trong thành phố, sẽ giúp bé tự điều hành việc hoạt động của một bãi đỗ xe hiện đại trong thành phố', 0, 3, 4),
(27, 'Emergency Vehicles (3-Pack)', '23.jpg', 223000, '2012-10-02 00:00:00', 20, 12, 3, 'Bộ sản phẩm 3 xe đồ chơi, đẹp, dễ thương và an toàn với trẻ', 0, 3, 4),
(28, 'Lamborghini Murcielago', '24.jpg', 300000, '2012-10-01 00:00:00', 10, 1, 2, 'Xe điều khiển từ xa Lamborghini', 0, 3, 5),
(29, 'Rover Sport HSE', '25.jpg', 320000, '2012-09-30 00:00:00', 10, 3, 2, 'Xe điều khiển Rover, vượt mọi địa hình, sức mạnh của trâu', 0, 3, 5),
(30, 'Apache Helicopter', '26.jpg', 625000, '2012-10-01 00:00:00', 4, 2, 1, 'Máy bay chiến đâu siêu đa năng Apache', 0, 3, 1),
(31, 'Micro Helicopter', '27.jpg', 560000, '2012-10-05 00:00:00', 2, 6, 5, 'Máy bay lên thẳng đa dụng điều khiển từ xa', 0, 3, 5),
(32, 'Micro Chinook', '28.jpg', 410000, '2012-10-06 00:00:00', 3, 0, 0, 'Máy bay trực thăng vận tải, đa dụng, có thể vận chuyển được xe tăng', 0, 3, 1),
(33, 'X1 - 01', '29.jpg', 600000, '2012-10-06 00:00:00', 4, 0, 15, 'Máy bay lên thẳng 4 cánh quạt, đa dụng và dễ dàng điều khiển vượt qua mọi địa hình', 0, 3, 1),
(34, 'Áo thun nam Asos màu xanh','30.jpg ',450000,'2012-10-06 00:00:00',1, 0, 10,'Áo thun nam Asos màu xanh lá mạ, cổ chữ V kết hợp dáng ôm nhẹ nam tính, chất cotton cao cấp thoáng mát',0, 1, 1 ),
(35, 'Váy Sue Wong ren đen','31.jpg',500000,'2012-10-06 00:00:00',2,1,15,'Thiết kế sang trọng, đẳng cấp đến từng chi tiết nhỏ nhất',0,5,3),
(36, 'Váy voan FRENCH CONNECTION','32.jpg',650000,'2012-10-01 00:00:00',5,1,10,'Cổ tròn, không tay, dải eo ngang màu đen tạo điểm nhấn cho cả thiết kế thêm hoàn hảo',0,5,3),
(37, 'Quần giữ nhiệt nam manhattan','33.jpg',530000, '2012-10-01 00:00:00',1,0,2,'Quần có thế mặc trong quần bò, quần âu,...giữ cho đôi chân của bạn luôn ấm áp và thoải mái',0,2,1),
(38, 'Áo Giữ Nhiệt Kim Tuyến Cổ Cao','34.jpg',120000,'2012-10-01 00:00:00',1,2,10,'Độ co giãn, đàn hồi cao mang đến sự thoải mái khi vận động',0,1,3),
(39, 'Đồ bơi một mảnh có tay khoá kéo','35.jpg',250000,'2012-10-01 00:00:00',3,1,6,' Áo có sẵn mút ngực, nên các nàng yên tâm mặc luôn mà không cần áo lót nhé',0,6,2),
(40, 'Bikini, đồ bơi 1 mảnh liền xoắn ngực xanh cổ vịt sành điệu','36.jpg',450000,'2012-10-01 00:00:00',5,4,20,'Hàng Việt Nam chất lượng cao ',0,6,2),
(41, 'Bikini 1 mảnh chéo cổ sành điệu','37.jpg',500000,'2012-10-01 00:00:00',3,1,19,'Hàng Việt Nam chất lượng cao ',0,6,2),
(42, 'Aó sơ mi trắng kẻ sọc','38.jpg',260000,'2012-10-01 00:00:00',4,2,10,'Trắng của sự sang trọng, quý phái',0,1,1),
(43, 'Aó sơ mi xanh ','39.jpg',310000,'2012-10-01 00:00:00',3,2,20,'Hàng Việt Nam chất lượng cao',0,1,2),
(44, 'Váy trắng cổ thắt nơ HSU1','40.jpg',400000,'2012-10-01 00:00:00',4,2,10,'váy chất thô mềm tay dài cổ thắt nơ,nữ 40-53 kg cao 1m63 đổ về',0,5,2),
(45, 'váy sơ mi trắng đi học, đi chơi','41.jpg',500000,'2012-10-01 00:00:00',5,2,16,'Chất vải mềm mịn, thấm hút mồ hôi, không bai, không xù, không dão',0,5,2),
(46, 'Đồ chơi trẻ em lắp ráp Biệt Đội S.W.A.T Lele Brother 8522','42.jpg',600000,'2012-10-01 00:00:00',10,6,20,'là bộ đồ chơi giáo dục phát triển tư duy trẻ em mô phỏng đội đặc nhiệm swat hiện đại với các chú lính nhân vật lego cực dễ thương trên những phương tiện tuần tra',0,3,4),
(47, 'Bộ lắp ráp Xe đua Công thức 1','43.jpg',500000, '2012-10-01 00:00:00',2,3,10,'được lấy ý tưởng từ các siêu xe trong những giải đua công thức 1',0,3,2),
(48, 'Đồ chơi Lắp Ráp Robot Sandstorm Lele Brother - Transformer Fighter 3in1 8279','44.jpg',500000,'2012-10-01 00:00:00',2,1,5,'được chế tạo hoàn toàn từ chất liệu nhựa PET cao cấp, độ bền và chống biến dạng khi va đập tốt',0,3,2),
(49, 'Bộ lắp ráp đội thi công công trình Construction Team 6in1 Lele Brother 8520','45.jpg',100000,'2012-10-01 00:00:00',1,0,2,'được lấy ý tưởng từ đội ngũ các chú kĩ sư xây dựng thành phố',0,3,1),
(50, 'THẢM TẬP YOGA TPE','46.jpg',125000,'2012-10-01 00:00:00',1,0,14,'Thảm tập yoga TPE Cao Cấp 2 lớp 6MM bền chắc','BinhLuan 46',0,3,1),
(51, 'Giày thể thao SUP','47.jpg',160000,'2012-10-01 00:00:00',1,0,10,'Giày Thể Thao Nam Ngắn Cổ - Thiết Kế Đế Nén Khí Êm Chân, Tăng Chiều Cao - Lót Giày Bằng Lưới Thoáng Khí Giúp Chân Luôn Khô Thoáng - Full Màu, Full Size - GTTN-61','BinhLuan 47',0,3,1),
(52, 'Áo sơmi NOMOUS ESSENTIALS ','48.jpg',150000,'2012-10-01 00:00:00',1,0,20,' Dòng sơmi kẻ caro với chất vải linen mặc rất thoải mái & thoáng mát. Form ôm vừa gọn. 3 màu trẻ trung.','BinhLuan 48',0,3,1),
(53, 'Áo Sơmi kaki T.MAN box bag','49.jpg',200000,'2012-10-01 00:00:00',1,0,0,'Sơmi kaki TMAN tay ngắn với chất vải mềm mịn, tông màu trẻ trung.Form slim fit','BinhLuan 49',0,3,1),
(54, 'Áo sơmi G.2OOO Slim fit','50.jpg',240000,'2012-10-01 00:00:00',1,0,0,' Sơmi G2K dòng modal fabric vừa lên kệ với chất liệu vải từ sợi modal mềm mịn, thoáng mát.','BinhLuan 50',0,3,1),
(55, 'Áo sơmi ICON DENIM slim','51.jpg',245000,'2012-10-01 00:00:00',1,0,15,'Dòng sơmi với chất vải mới nhất vừa lên kệ. Sợi vải nhuyễn, có thun co giãn nên mặc khá thoải mái.','BinhLuan 51',0,3,1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `TenDangNhap` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenHienThi` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0,
  `MaLoaiTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `TenHienThi`, `DiaChi`, `DienThoai`, `Email`, `BiXoa`, `MaLoaiTaiKhoan`) VALUES
(1, 'ndhuy', 'ndhuy', 'Đức Huy1234', '227 - Nguyễn Văn Cừ - Q.5', '01234567890', 'ndhuy@gmail.com', 0, 1),
(5, 'admin', 'admin', 'Admin website', 'Baby Shop', '0909123456', 'admin@babyshop.vn', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `MaTinhTrang` int(11) NOT NULL,
  `TenTinhTrang` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinhtrang`
--

INSERT INTO `tinhtrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(1, 'Chờ xử lý'),
(2, 'Đang giao hàng'),
(3, 'Đang xử lý'),
(4, 'Hoàn thành'),
(5, 'Huỷ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`MaDonDatHang`),
  ADD KEY `fk_DonDatHang_TaiKhoan1_idx` (`MaTaiKhoan`),
  ADD KEY `fk_DonDatHang_TinhTrang1_idx` (`MaTinhTrang`);

--
-- Indexes for table `dondathang_sanpham`
--
ALTER TABLE `dondathang_sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abc` (`MaDonDatHang`),
  ADD KEY `bcd` (`MaSanPham`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_giohang_SanPham` (`MaSanPham`),
  ADD KEY `FK_giohang_taikhoan` (`MaNguoiDung`);

--
-- Indexes for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHangSanXuat`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSanPham`);

--
-- Indexes for table `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MaLoaiTaiKhoan`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `fk_SanPham_LoaiSanPham1_idx` (`MaLoaiSanPham`),
  ADD KEY `fk_SanPham_HangSanXuat1_idx` (`MaHangSanXuat`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`),
  ADD KEY `fk_TaiKhoan_LoaiTaiKhoan_idx` (`MaLoaiTaiKhoan`);

--
-- Indexes for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`MaTinhTrang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `MaDonDatHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131212003;

--
-- AUTO_INCREMENT for table `dondathang_sanpham`
--
ALTER TABLE `dondathang_sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `MaLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `MaTinhTrang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `fk_DonDatHang_TaiKhoan1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DonDatHang_TinhTrang1` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dondathang_sanpham`
--
ALTER TABLE `dondathang_sanpham`
  ADD CONSTRAINT `abc` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`) ON DELETE NO ACTION,
  ADD CONSTRAINT `bcd` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE NO ACTION;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_giohang_SanPham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_giohang_taikhoan` FOREIGN KEY (`MaNguoiDung`) REFERENCES `taikhoan` (`MaTaiKhoan`) ON DELETE SET NULL;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_SanPham_HangSanXuat1` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SanPham_LoaiSanPham1` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_TaiKhoan_LoaiTaiKhoan` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaLoaiTaiKhoan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
