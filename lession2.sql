-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 11, 2023 lúc 06:23 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lession2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(22, 'DIENTHOAI'),
(23, 'laptop'),
(24, 'mayanh'),
(25, 'camera'),
(26, 'pc'),
(27, 'loa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_name`
--

CREATE TABLE `tbl_name` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `category_name`, `images`) VALUES
(645, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(646, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(647, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(648, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(649, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(650, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(651, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(652, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(653, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(654, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(655, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(656, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(657, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(658, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(659, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(660, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(661, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(662, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(663, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(664, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(665, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(666, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(667, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(668, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(669, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(670, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(671, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(672, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(673, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(674, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(675, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(676, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(677, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(678, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(679, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(680, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(681, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(682, 'Macbook pro 2022', 0, 'laptop', '1676131395_Apple-MacBook-Pro-M2-Pro-and-M2-Max-hero-230117_Full-Bleed-Image.jpg.large.jpg'),
(683, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(684, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(685, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(686, 'Camera Sony', 0, 'camera', '1676131210_sony-zv-1-03.jpg'),
(687, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg'),
(688, 'iphone 11 pro max', 0, 'DIENTHOAI', '1676131082_OIP.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_name`
--
ALTER TABLE `tbl_name`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_name`
--
ALTER TABLE `tbl_name`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
