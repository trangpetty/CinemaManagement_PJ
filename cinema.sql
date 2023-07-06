-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 05, 2023 lúc 05:37 PM
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
-- Cơ sở dữ liệu: `cinema`
--


-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `doanuong`
--

INSERT INTO `doanuong` (`iddoanuong`, `ten`, `hsd`, `phanloai`, `gia`, `soluong`, `created_at`, `updated_at`) VALUES
('TP01', 'Cocacola', '2025-06-29', 'douong', 10000.00, 115, '2023-06-28 22:59:28', '2023-07-05 08:26:36'),
('TP02', 'Pepsi', '2025-06-30', 'douong', 20000.00, 52, '2023-07-02 10:38:56', '2023-07-04 05:25:13'),
('TP03', 'Popcorn', '2023-07-15', 'doan', 30000.00, 74, '2023-07-02 10:35:27', '2023-07-05 08:29:34'),
('TP04', 'Chips', '2023-07-21', 'doan', 30000.00, 144, '2023-07-05 04:56:27', '2023-07-05 08:26:14');


-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `ten`, `gioitinh`, `cccd`, `ngaybdlam`, `luong`, `thuong`, `chucvu`, `created_at`, `updated_at`) VALUES
('NV06', 'Trang', 0, '1123456789', '2023-06-29', 20000.00, 2000.00, 'Thu ngan', NULL, NULL),
('NV14', 'Hiếu', 1, '333344445555', '2023-06-14', 20000.00, 10000.00, 'Thu ngan', NULL, NULL),
('NV16', 'Tùng', 0, '666677778888', '2023-06-27', 20000.00, 2000.00, 'Lao cong', NULL, NULL),
('NV29', 'Luân', 1, '000011112222', '2023-06-26', 25000.00, 30000.00, 'Quan ly', NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `hdnhap`
--

INSERT INTO `hdnhap` (`idhdnhap`, `idnv`, `ngaylaphd`, `giolaphd`, `chuthich`, `created_at`, `updated_at`) VALUES
(1, 'NV06', '2023-06-21', '14:26:18', NULL, '2023-07-05 08:22:33', '2023-07-05 08:22:33'),
(2, 'NV06', '2023-07-05', '14:26:18', NULL, '2023-07-05 08:23:37', '2023-07-05 08:23:37'),
(3, 'NV06', '2023-05-17', '14:26:18', NULL, '2023-07-05 08:25:28', '2023-07-05 08:25:28'),
(4, 'NV06', '2023-03-02', '14:26:18', NULL, '2023-07-05 08:26:14', '2023-07-05 08:26:14'),
(5, 'NV06', '2023-02-21', '14:26:18', NULL, '2023-07-05 08:26:35', '2023-07-05 08:26:35'),
(6, 'NV06', '2023-04-01', '14:26:18', NULL, '2023-07-05 08:29:34', '2023-07-05 08:29:34');

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `cthdnhap`
--

INSERT INTO `cthdnhap` (`id`, `idhdnhap`, `iddoanuong`, `soluong`, `dongia`, `created_at`, `updated_at`) VALUES
(1, 1, 'TP03', 5, 105000.00, '2023-07-05 08:22:34', '2023-07-05 08:22:34'),
(2, 1, 'TP02', 10, 140000.00, '2023-07-05 08:22:34', '2023-07-05 08:22:34'),
(3, 2, 'TP03', 5, 105000.00, '2023-07-05 08:23:38', '2023-07-05 08:23:38'),
(4, 2, 'TP04', 3, 63000.00, '2023-07-05 08:23:38', '2023-07-05 08:23:38'),
(5, 3, 'TP03', 3, 63000.00, '2023-07-05 08:25:29', '2023-07-05 08:25:29'),
(6, 3, 'TP04', 6, 126000.00, '2023-07-05 08:25:29', '2023-07-05 08:25:29'),
(7, 4, 'TP04', 7, 147000.00, '2023-07-05 08:26:14', '2023-07-05 08:26:14'),
(8, 4, 'TP03', 33, 693000.00, '2023-07-05 08:26:14', '2023-07-05 08:26:14'),
(9, 4, 'TP01', 4, 28000.00, '2023-07-05 08:26:14', '2023-07-05 08:26:14'),
(10, 5, 'TP01', 4, 28000.00, '2023-07-05 08:26:35', '2023-07-05 08:26:35'),
(11, 5, 'TP02', 4, 56000.00, '2023-07-05 08:26:35', '2023-07-05 08:26:35'),
(12, 5, 'TP04', 7, 147000.00, '2023-07-05 08:26:35', '2023-07-05 08:26:35'),
(13, 6, 'TP03', 4, 84000.00, '2023-07-05 08:29:34', '2023-07-05 08:29:34'),
(14, 6, 'TP04', 5, 105000.00, '2023-07-05 08:29:34', '2023-07-05 08:29:34'),
(15, 6, 'TP01', 8, 56000.00, '2023-07-05 08:29:34', '2023-07-05 08:29:34'),
(16, 6, 'TP02', 4, 56000.00, '2023-07-05 08:29:34', '2023-07-05 08:29:34'),
(17, 6, 'TP02', 3, 42000.00, '2023-07-05 08:29:34', '2023-07-05 08:29:34');

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`idphong`, `soluongghe`, `amthanh`, `maychieu`, `tinhtrang`, `created_at`, `updated_at`) VALUES
('P01', 20, 'Loai A', 'Loai A', 'tot', NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `ghe`
--

INSERT INTO `ghe` (`idghe`, `idphong`, `vitri`, `loaighe`, `trangthai`, `created_at`, `updated_at`) VALUES
('G01', 'P01', 'A1', 'vip', 'tot', NULL, '2023-07-05 04:58:55'),
('G02', 'P01', 'A2', 'VIP', 'tot', NULL, NULL);


-- --------------------------------------------------------


--
-- Đang đổ dữ liệu cho bảng `hoivien`
--

INSERT INTO `hoivien` (`sothe`, `tenhv`, `ngaysinh`, `diachi`, `dienthoai`, `socccd`, `loaihv`, `diemtl`, `created_at`, `updated_at`) VALUES
('0011', '0011', '2023-06-26', '0011', '0011', '0011', 'VIP1', 0, '2023-07-05 07:57:20', '2023-07-05 07:57:20'),
('HV01', 'TRANG', '2001-07-22', 'HUNG YEN', '0358080953', '033301005121', 'VIP1', 0, '2023-07-02 04:36:07', '2023-07-02 04:53:16'),
('HV02', 'NGUYEN VAN A', '2001-01-01', 'HA NOI', '1276387126', '17631783683', 'VIP1', 0, '2023-07-02 05:12:11', '2023-07-02 05:12:11');


-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`idphim`, `ten`, `thoiluong`, `theloai`, `daodien`, `dienvienchinh`, `sovekhadung`, `created_at`, `updated_at`) VALUES
('P01', 'Avenger', 120, 'Trinh tham', 'trang', 'trang', 100, NULL, NULL),
('P02', 'Avenger 2', 100, 'Trinh tham', 'trang', 'trang', 100, NULL, NULL);



-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `sochamcong`
--

INSERT INTO `sochamcong` (`idnv`, `ngaydilam`, `calam`, `created_at`, `updated_at`) VALUES
('NV06', '2023-07-04', 'S', NULL, NULL),
('NV29', '2023-06-22', 'C', NULL, NULL),
('NV14', '2023-07-03', 'T', NULL, NULL),
('NV06', '2023-05-16', 'S', NULL, NULL),
('NV16', '2023-04-04', 'T', NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `suatchieu`
--

INSERT INTO `suatchieu` (`idsuatchieu`, `thoigianbd`, `idphim`, `idphong`, `loaichieu`, `created_at`, `updated_at`) VALUES
('SC01', '00:45:00', 'P02', 'P01', '3D', '2023-07-02 10:46:03', '2023-07-02 10:46:35');

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `ve`
--

INSERT INTO `ve` (`idve`, `sothe`, `idghe`, `idsuatchieu`, `created_at`, `updated_at`) VALUES
('01', 'HV01', 'G01', 'SC01', NULL, NULL);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
