-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2023 lúc 05:42 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

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
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `password`, `role`) VALUES
('admin', '1234567', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthdnhap`
--

CREATE TABLE `cthdnhap` (
  `idhd` char(25) NOT NULL,
  `iddoanuong` char(25) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthdxuat`
--

CREATE TABLE `cthdxuat` (
  `idhd` char(25) NOT NULL,
  `iddoanuong` char(25) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanuong`
--

CREATE TABLE `doanuong` (
  `iddo` char(25) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `hsd` date DEFAULT NULL,
  `phanloai` char(25) NOT NULL,
  `gia` float NOT NULL,
  `soluong` int(11) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghe`
--

CREATE TABLE `ghe` (
  `idghe` char(25) NOT NULL,
  `idphong` char(25) NOT NULL,
  `loaighe` char(25) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hdnhap`
--

CREATE TABLE `hdnhap` (
  `idhd` char(25) NOT NULL,
  `idnhanvien` char(25) DEFAULT NULL,
  `ngaylaphd` date DEFAULT curdate(),
  `giolaphd` time DEFAULT curtime(),
  `chuthich` varchar(255) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hdxuat`
--

CREATE TABLE `hdxuat` (
  `idhd` char(25) NOT NULL,
  `idnhanvien` char(25) DEFAULT NULL,
  `makh` char(10) DEFAULT NULL,
  `giamgia` float DEFAULT NULL,
  `ngaylaphd` date DEFAULT curdate(),
  `giolaphd` time DEFAULT curtime(),
  `chuthich` varchar(255) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoivien`
--

CREATE TABLE `hoivien` (
  `sothe` char(10) NOT NULL,
  `tenhv` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `dienthoai` char(15) DEFAULT NULL,
  `socccd` char(15) DEFAULT NULL,
  `diemtl` int(11) DEFAULT NULL,
  `loaihv` char(10) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` varchar(255) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `gioitinh` bit(1) NOT NULL,
  `cccd` varchar(255) NOT NULL,
  `ngaybdlam` date NOT NULL DEFAULT curdate(),
  `luong` float DEFAULT NULL CHECK (`luong` >= 0),
  `thuong` float DEFAULT NULL,
  `chucvu` varchar(255) NOT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `ten`, `gioitinh`, `cccd`, `ngaybdlam`, `luong`, `thuong`, `chucvu`) VALUES
('NV01', 'DINH TRUONG LUAN', b'1', '0123456789', '2023-05-04', 20000, 2000, 'Boi ban'),
('NV02', 'NGUYEN DINH TUNG', b'1', '2237551375', '2023-05-09', 25000, 1000, 'Thu ngan'),
('NV03', 'MAC VAN HIEU', b'1', '99245315', '2023-05-05', 30000, 5000, 'Boi ban'),
('NV04', 'NGUY DINH ANH TUAN', b'1', '1123456789', '2023-05-04', 20000, 2000, 'Thu ngan'),
('NV05', 'LE THI THUY TRANG', b'0', '033301005121', '2023-05-02', 25000, 30000, 'Boi ban');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `idphim` char(25) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `thoiluong` time DEFAULT NULL,
  `theloai` varchar(255) DEFAULT NULL,
  `daodien` varchar(255) DEFAULT NULL,
  `dienvienchinh` varchar(255) DEFAULT NULL,
  `sovekhadung` int(11) NOT NULL DEFAULT 0
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `idphong` char(25) NOT NULL,
  `soluongghe` int(11) NOT NULL,
  `amthanh` char(10) NOT NULL DEFAULT 'Loai C',
  `maychieu` char(10) NOT NULL DEFAULT 'Loai C',
  `tinhtrang` char(25) NOT NULL DEFAULT 'kha'
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sochamcong`
--

CREATE TABLE `sochamcong` (
  `idnhanvien` char(25) NOT NULL,
  `ngaydilam` date NOT NULL,
  `calam` char(1) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suatchieu`
--

CREATE TABLE `suatchieu` (
  `idsuatchieu` char(25) NOT NULL,
  `thoigianbd` time DEFAULT NULL,
  `idphim` char(25) NOT NULL,
  `idphong` char(25) NOT NULL,
  `loaichieu` char(25) NOT NULL DEFAULT '2D'
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `password`, `role`) VALUES
('admin', '1234567', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve`
--

CREATE TABLE `ve` (
  `idve` char(25) NOT NULL,
  `makh` char(10) DEFAULT NULL,
  `idghe` char(25) NOT NULL,
  `idsuatchieu` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `cthdnhap`
--
ALTER TABLE `cthdnhap`
  ADD KEY `idhd` (`idhd`),
  ADD KEY `iddoanuong` (`iddoanuong`);

--
-- Chỉ mục cho bảng `cthdxuat`
--
ALTER TABLE `cthdxuat`
  ADD KEY `idhd` (`idhd`),
  ADD KEY `iddoanuong` (`iddoanuong`);

--
-- Chỉ mục cho bảng `doanuong`
--
ALTER TABLE `doanuong`
  ADD PRIMARY KEY (`iddo`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `ghe`
--
ALTER TABLE `ghe`
  ADD PRIMARY KEY (`idghe`),
  ADD KEY `idphong` (`idphong`);

--
-- Chỉ mục cho bảng `hdnhap`
--
ALTER TABLE `hdnhap`
  ADD PRIMARY KEY (`idhd`),
  ADD KEY `idnhanvien` (`idnhanvien`);

--
-- Chỉ mục cho bảng `hdxuat`
--
ALTER TABLE `hdxuat`
  ADD PRIMARY KEY (`idhd`),
  ADD KEY `idnhanvien` (`idnhanvien`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `hoivien`
--
ALTER TABLE `hoivien`
  ADD PRIMARY KEY (`sothe`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`idphim`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`idphong`);

--
-- Chỉ mục cho bảng `sochamcong`
--
ALTER TABLE `sochamcong`
  ADD PRIMARY KEY (`idnhanvien`,`ngaydilam`,`calam`);

--
-- Chỉ mục cho bảng `suatchieu`
--
ALTER TABLE `suatchieu`
  ADD PRIMARY KEY (`idsuatchieu`),
  ADD KEY `idphim` (`idphim`),
  ADD KEY `idphong` (`idphong`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `ve`
--
ALTER TABLE `ve`
  ADD PRIMARY KEY (`idve`),
  ADD KEY `idghe` (`idghe`),
  ADD KEY `idsuatchieu` (`idsuatchieu`),
  ADD KEY `makh` (`makh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthdnhap`
--
ALTER TABLE `cthdnhap`
  ADD CONSTRAINT `cthdnhap_ibfk_1` FOREIGN KEY (`idhd`) REFERENCES `hdnhap` (`idhd`),
  ADD CONSTRAINT `cthdnhap_ibfk_2` FOREIGN KEY (`iddoanuong`) REFERENCES `doanuong` (`iddo`);

--
-- Các ràng buộc cho bảng `cthdxuat`
--
ALTER TABLE `cthdxuat`
  ADD CONSTRAINT `cthdxuat_ibfk_1` FOREIGN KEY (`idhd`) REFERENCES `hdxuat` (`idhd`),
  ADD CONSTRAINT `cthdxuat_ibfk_2` FOREIGN KEY (`iddoanuong`) REFERENCES `doanuong` (`iddo`);

--
-- Các ràng buộc cho bảng `ghe`
--
ALTER TABLE `ghe`
  ADD CONSTRAINT `ghe_ibfk_1` FOREIGN KEY (`idphong`) REFERENCES `phong` (`idphong`);

--
-- Các ràng buộc cho bảng `hdnhap`
--
ALTER TABLE `hdnhap`
  ADD CONSTRAINT `hdnhap_ibfk_1` FOREIGN KEY (`idnhanvien`) REFERENCES `nhanvien` (`idnv`);

--
-- Các ràng buộc cho bảng `hdxuat`
--
ALTER TABLE `hdxuat`
  ADD CONSTRAINT `hdxuat_ibfk_1` FOREIGN KEY (`idnhanvien`) REFERENCES `nhanvien` (`idnv`),
  ADD CONSTRAINT `hdxuat_ibfk_2` FOREIGN KEY (`makh`) REFERENCES `hoivien` (`sothe`);

--
-- Các ràng buộc cho bảng `sochamcong`
--
ALTER TABLE `sochamcong`
  ADD CONSTRAINT `sochamcong_ibfk_1` FOREIGN KEY (`idnhanvien`) REFERENCES `nhanvien` (`idnv`);

--
-- Các ràng buộc cho bảng `suatchieu`
--
ALTER TABLE `suatchieu`
  ADD CONSTRAINT `suatchieu_ibfk_1` FOREIGN KEY (`idphim`) REFERENCES `phim` (`idphim`),
  ADD CONSTRAINT `suatchieu_ibfk_2` FOREIGN KEY (`idphong`) REFERENCES `phong` (`idphong`);

--
-- Các ràng buộc cho bảng `ve`
--
ALTER TABLE `ve`
  ADD CONSTRAINT `ve_ibfk_1` FOREIGN KEY (`idghe`) REFERENCES `ghe` (`idghe`),
  ADD CONSTRAINT `ve_ibfk_2` FOREIGN KEY (`idsuatchieu`) REFERENCES `suatchieu` (`idsuatchieu`),
  ADD CONSTRAINT `ve_ibfk_3` FOREIGN KEY (`makh`) REFERENCES `hoivien` (`sothe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
