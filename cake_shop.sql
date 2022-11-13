-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2022 lúc 04:31 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cake_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cake`
--

CREATE TABLE `cake` (
  `id` int(10) NOT NULL,
  `img` text NOT NULL,
  `cake` text NOT NULL,
  `detail` text DEFAULT NULL,
  `price` int(9) NOT NULL,
  `quantity_sold` int(10) NOT NULL DEFAULT 0,
  `date_entered` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cake`
--

INSERT INTO `cake` (`id`, `img`, `cake`, `detail`, `price`, `quantity_sold`, `date_entered`, `id_type`) VALUES
(1, 'banh-dui-ga.jpg', 'Bánh Đùi Gà', 'Đang cập nhật', 50000, 53, '2022-10-26 09:23:13', 20000),
(2, 'banh-kem-chien-si.jpg', 'Bánh Kem Chiến Sĩ', 'Đang cập nhật', 50000, 32, '2022-10-24 11:57:00', 30000),
(5, 'banh-kem-socola-2-tang-la-mat.jpg', 'Bánh Kem Socola', 'Đang cập nhật', 150000, 12, '2022-10-24 11:53:09', 30000),
(18, 'banh-da-lon.jpg', 'Bánh Da Lợn', 'Đang cập nhật', 15000, 7, '2022-10-26 09:30:19', 10000),
(19, 'banh-beo.jpg', 'Bánh Bèo', 'Đang cập nhật', 25000, 30, '2022-11-12 03:56:08', 20000),
(20, 'banh-Black-Forest-duc.jpg', 'Bánh Black-Forest', 'Đang cập nhật', 150000, 5, '2022-11-12 04:52:12', 30000),
(21, 'banh-bong-lan-trung-muoi.jpg', 'Bánh Bông Lan Trứng Muối', 'Đang cập nhật', 50000, 25, '2022-11-12 03:58:19', 20000),
(22, 'banh-dau-valentine.jpg', 'Bánh Dâu Valentine', 'Đang cập nhật', 120000, 10, '2022-11-12 12:45:36', 10000),
(23, 'banh-do.jpg', 'Bánh Đỏ', 'Đang cập nhật', 55000, 20, '2022-11-12 04:42:57', 10000),
(24, 'banh-in.jpg', 'Bánh In', 'Đang cập nhật', 40000, 78, '2022-11-12 04:43:27', 10000),
(25, 'banh-kem-mini.jpg', 'Bánh Kem Mini', 'Đang cập nhật', 35000, 45, '2022-11-12 04:51:37', 30000),
(26, 'banh-kem-sinh-nhat-2-tang-tao-hinh-con-ga-ma-vang-mung-thoi-noi.jpg', 'Bánh Sinh Nhật 2 tầng Con Gà Vàng ', 'Đang cập nhật', 200000, 21, '2022-11-12 04:45:19', 30000),
(27, 'banh-kem-socola-2-tang-la-mat.jpg', 'Bánh Kem Socola 2 tầng', 'Đang cập nhật', 220000, 15, '2022-11-12 04:45:57', 30000),
(28, 'banh-kem-trai-cay.jpg', 'Bánh Kem Trái Cây', 'Đang cập nhật', 170000, 26, '2022-11-12 04:46:33', 30000),
(29, 'banh-kem-Women\'sDay.jpg', 'Bánh Kem Women\'sDay', 'Đang cập nhật', 160000, 12, '2022-11-12 04:47:09', 30000),
(30, 'banh-man-bong-lua.jpg', 'Bánh Bông Lan', 'Đang cập nhật', 25000, 34, '2022-11-12 04:47:46', 20000),
(31, 'banh-man-hoa-mai.jpg', 'Bánh Hoa Mai', 'Đang Cập nhập', 28000, 52, '2022-11-12 04:48:28', 20000),
(32, 'banh-pho-mai-my.jpg', 'Bánh Pho mai', 'Đang cập nhật', 80000, 54, '2022-11-12 04:49:15', 10000),
(33, 'banh-su-kem.jpg', 'Bánh Su Kem', 'Đang cập nhật', 10000, 80, '2022-11-12 04:49:43', 10000),
(34, 'banh-Swedish-Princess-thuy-dien.jpg', 'Bánh Swedish-Princess', 'Đang cập nhật', 90000, 23, '2022-11-12 04:50:41', 10000),
(35, 'banh-Tiramisu-italy.jpg', 'Bánh Tiramisu', 'Đang cập nhật', 75000, 14, '2022-11-12 04:51:58', 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `date_entered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `status`, `hide`, `date_entered`) VALUES
(140, 4, 0, 0, '2022-11-05 09:27:01'),
(141, 13, 0, 0, '2022-11-05 15:12:56'),
(150, 15, 2, 0, '2022-11-13 05:55:51'),
(151, 15, 1, 0, '2022-11-13 05:56:05'),
(152, 15, 0, 0, '2022-11-13 11:56:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `customer` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `detail` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_entered` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `customer`, `email`, `phone`, `detail`, `status`, `date_entered`, `id_user`) VALUES
(1, 'Nguyễn Văn A', 'nguyena@gmail.com', '0987654321', 'Xin chào', 0, '2022-10-23 07:54:20', 0),
(3, 'Nguyễn Văn B', '', '0832291233', 'Xin chào', 0, '2022-11-13 15:27:24', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_cart`
--

CREATE TABLE `detail_cart` (
  `id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `cake_id` int(10) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detail_cart`
--

INSERT INTO `detail_cart` (`id`, `cart_id`, `cake_id`, `number`) VALUES
(208, 140, 22, 3),
(209, 150, 5, 1),
(210, 150, 18, 1),
(211, 151, 20, 1),
(212, 151, 1, 1),
(213, 152, 28, 1),
(215, 140, 20, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_cake`
--

CREATE TABLE `type_cake` (
  `id` int(5) NOT NULL,
  `type_cake` text NOT NULL,
  `img` text NOT NULL,
  `date_entered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type_cake`
--

INSERT INTO `type_cake` (`id`, `type_cake`, `img`, `date_entered`) VALUES
(10000, 'Bánh Ngọt', 'banh-ngot.jpg', '2022-11-11 08:21:56'),
(20000, 'Bánh Mặn', 'banh-man.jpg', '2022-10-24 06:51:59'),
(30000, 'Bánh Kem', 'banh-kem.jpg', '2022-10-24 06:52:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `id_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `phone`, `address`, `id_admin`) VALUES
(0, 'Khách  vãng lai', '', '', '', '', '', 0),
(4, 'Admin', 'admin', '$2y$10$gAKcDQSifJlJtCVww84KHOyaW1pZjzl2HEYd5bCNYXvLo2f6Zvskq', 'admin@gmail.com', '0912345678', 'An Giang', 1),
(13, 'Lưu Thanh Phong', 'luuphong', '$2y$10$Hmdi5dTzjlwXepWG8QKzmOMzPPo.5DTdqwf7dZLB3R4fwmom907ue', 'phong@gmail.com', '0909330912', 'Vĩnh Long', 0),
(15, 'Le Duong Tri', 'letri123', '$2y$10$TdysY.4D/omOg/R2.AkInOaJcMxIlsAlth4OvgqUCNwyKORE9EbYK', 'tri@gmail.com', '0901230912', 'An Giang', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cake_id` (`cake_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Chỉ mục cho bảng `type_cake`
--
ALTER TABLE `type_cake`
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
-- AUTO_INCREMENT cho bảng `cake`
--
ALTER TABLE `cake`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `detail_cart`
--
ALTER TABLE `detail_cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cake`
--
ALTER TABLE `cake`
  ADD CONSTRAINT `cake_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_cake` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD CONSTRAINT `detail_cart_ibfk_1` FOREIGN KEY (`cake_id`) REFERENCES `cake` (`id`),
  ADD CONSTRAINT `detail_cart_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
