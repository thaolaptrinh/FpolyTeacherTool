-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:2003
-- Generation Time: Dec 09, 2022 at 11:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpoly_teacher_tool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `access`) VALUES
(1, 'thaonvps22915@fpt.edu.vn', '');

-- --------------------------------------------------------

--
-- Table structure for table `co_so`
--

CREATE TABLE `co_so` (
  `id_coso` int(11) NOT NULL,
  `value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_coso` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `co_so`
--

INSERT INTO `co_so` (`id_coso`, `value`, `ten_coso`) VALUES
(1, 'ph', 'FPT Polytechnic Hà Nội'),
(2, 'pd', 'FPT Polytechnic Đà Nẵng'),
(3, 'ps', 'FPT Polytechnic Hồ Chí Minh'),
(4, 'pk', 'FPT Polytechnic Tây Nguyên'),
(5, 'ho', 'FPT Polytechnic HO'),
(6, 'pc', 'FPT Polytechnic Cần Thơ'),
(7, 'ht', 'FPT Polytechnic HiTech'),
(8, 'pp', 'FPT Polytechnic Hải Phòng'),
(9, 'th', 'FPT PTCĐ Hà Nội'),
(10, 'ts', 'FPT PTCĐ Hồ Chí Minh'),
(11, 'td', 'FPT PTCĐ Đà Nẵng'),
(12, 'tc', 'FPT PTCĐ Cần Thơ'),
(13, 'tk', 'FPT PTCĐ Tây Nguyên'),
(14, 'tp', 'FPT PTCĐ Hải Phòng'),
(15, 'tt', 'FPT PTCĐ Huế'),
(16, 'tb', 'FPT PTCĐ Đồng Nai'),
(17, 'tg', 'FPT PTCĐ Bắc Giang'),
(18, 'ti', 'FPT PTCĐ Bình Định'),
(19, 'tu', 'FPT PTCĐ Thái Nguyên'),
(20, 'tv', 'FPT PTCĐ Bình Dương');

-- --------------------------------------------------------

--
-- Table structure for table `diem_sv`
--

CREATE TABLE `diem_sv` (
  `id` int(11) NOT NULL,
  `mssv` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thongtin_sv` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`thongtin_sv`)),
  `id_mon` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL,
  `array_diem` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhan_xet` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phan_loai` enum('null','gioi','yeu') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoc_ky`
--

CREATE TABLE `hoc_ky` (
  `id_hocky` int(11) NOT NULL,
  `ten_hocky` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(11) NOT NULL,
  `ten_khoa` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lich_day`
--

CREATE TABLE `lich_day` (
  `id` int(11) NOT NULL,
  `id_hocky` int(11) NOT NULL,
  `id_mon` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL,
  `ca_hoc` int(11) NOT NULL,
  `ngay_hoc` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'vd: thứ 2,4,6 - 3,5,7',
  `phong_hoc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_sv` int(11) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `thu_tu` int(11) DEFAULT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lien_ket`
--

CREATE TABLE `lien_ket` (
  `id_lienket` int(11) NOT NULL,
  `ten` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_diem`
--

CREATE TABLE `loai_diem` (
  `id` int(11) NOT NULL,
  `ten_diem` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_lop`
--

CREATE TABLE `loai_lop` (
  `id_loai` int(11) NOT NULL,
  `ten_lop` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_khoa` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id_mon` int(11) NOT NULL,
  `ma_mon` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_mon` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_user` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_pass` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_server` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_port` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_protocol` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_description`, `site_keywords`, `site_logo`, `site_name`, `favicon`, `site_status`, `email`, `phone`, `smtp_user`, `smtp_pass`, `smtp_server`, `smtp_port`, `smtp_protocol`) VALUES
(1, 'Fpoly Teacher Tool', 'Fpoly Teacher Tool', 'Fpoly Teacher Tool', 'logo.png', 'Fpoly Teacher Tool', 'favicon.ico', '2', 'thaolaptrinh@gmail.com', '', 'thaolaptrinh@gmail.com', 'hgupbpyqwxumoxoa\n', 'smtp.gmail.com', '465', 'ssl');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_date` datetime DEFAULT NULL,
  `code_donate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_coso` int(11) DEFAULT NULL COMMENT 'cơ sở đang dạy',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'tất cả dữ liệu quản lý của giáo viên' CHECK (json_valid(`data`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanh_ngu`
--

CREATE TABLE `thanh_ngu` (
  `id` int(11) NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ung_ho`
--

CREATE TABLE `ung_ho` (
  `id` int(11) NOT NULL,
  `tranId` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `isAlert` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_so`
--
ALTER TABLE `co_so`
  ADD PRIMARY KEY (`id_coso`);

--
-- Indexes for table `diem_sv`
--
ALTER TABLE `diem_sv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diem_sv_ibfk_2` (`id_mon`),
  ADD KEY `diem_sv_ibfk_3` (`id_lop`),
  ADD KEY `diem_sv_ibfk_4` (`id_teacher`);

--
-- Indexes for table `hoc_ky`
--
ALTER TABLE `hoc_ky`
  ADD PRIMARY KEY (`id_hocky`),
  ADD KEY `hoc_ky_ibfk_1` (`id_teacher`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `lich_day`
--
ALTER TABLE `lich_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lich_day_ibfk_1` (`id_hocky`),
  ADD KEY `lich_day_ibfk_2` (`id_mon`),
  ADD KEY `lich_day_ibfk_3` (`id_lop`),
  ADD KEY `lich_day_ibfk_4` (`id_teacher`);

--
-- Indexes for table `lien_ket`
--
ALTER TABLE `lien_ket`
  ADD PRIMARY KEY (`id_lienket`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `loai_diem`
--
ALTER TABLE `loai_diem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `loai_lop`
--
ALTER TABLE `loai_lop`
  ADD PRIMARY KEY (`id_loai`),
  ADD KEY `loai_lop_ibfk_1` (`id_khoa`),
  ADD KEY `loai_lop_ibfk_2` (`id_teacher`);

--
-- Indexes for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id_mon`),
  ADD KEY `mon_hoc_ibfk_1` (`id_teacher`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_teacher`),
  ADD KEY `teachers_ibfk_1` (`id_coso`);

--
-- Indexes for table `thanh_ngu`
--
ALTER TABLE `thanh_ngu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thanh_ngu_ibfk_1` (`id_teacher`);

--
-- Indexes for table `ung_ho`
--
ALTER TABLE `ung_ho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teacher_donate` (`id_teacher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `co_so`
--
ALTER TABLE `co_so`
  MODIFY `id_coso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `diem_sv`
--
ALTER TABLE `diem_sv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1537;

--
-- AUTO_INCREMENT for table `hoc_ky`
--
ALTER TABLE `hoc_ky`
  MODIFY `id_hocky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `lich_day`
--
ALTER TABLE `lich_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lien_ket`
--
ALTER TABLE `lien_ket`
  MODIFY `id_lienket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `loai_diem`
--
ALTER TABLE `loai_diem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `loai_lop`
--
ALTER TABLE `loai_lop`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id_mon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `thanh_ngu`
--
ALTER TABLE `thanh_ngu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `ung_ho`
--
ALTER TABLE `ung_ho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diem_sv`
--
ALTER TABLE `diem_sv`
  ADD CONSTRAINT `diem_sv_ibfk_2` FOREIGN KEY (`id_mon`) REFERENCES `mon_hoc` (`id_mon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diem_sv_ibfk_3` FOREIGN KEY (`id_lop`) REFERENCES `loai_lop` (`id_loai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diem_sv_ibfk_4` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoc_ky`
--
ALTER TABLE `hoc_ky`
  ADD CONSTRAINT `hoc_ky_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `khoa`
--
ALTER TABLE `khoa`
  ADD CONSTRAINT `khoa_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`);

--
-- Constraints for table `lich_day`
--
ALTER TABLE `lich_day`
  ADD CONSTRAINT `lich_day_ibfk_1` FOREIGN KEY (`id_hocky`) REFERENCES `hoc_ky` (`id_hocky`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lich_day_ibfk_2` FOREIGN KEY (`id_mon`) REFERENCES `mon_hoc` (`id_mon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lich_day_ibfk_3` FOREIGN KEY (`id_lop`) REFERENCES `loai_lop` (`id_loai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lich_day_ibfk_4` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lien_ket`
--
ALTER TABLE `lien_ket`
  ADD CONSTRAINT `lien_ket_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`);

--
-- Constraints for table `loai_diem`
--
ALTER TABLE `loai_diem`
  ADD CONSTRAINT `loai_diem_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`);

--
-- Constraints for table `loai_lop`
--
ALTER TABLE `loai_lop`
  ADD CONSTRAINT `loai_lop_ibfk_1` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loai_lop_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD CONSTRAINT `mon_hoc_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`id_coso`) REFERENCES `co_so` (`id_coso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thanh_ngu`
--
ALTER TABLE `thanh_ngu`
  ADD CONSTRAINT `thanh_ngu_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ung_ho`
--
ALTER TABLE `ung_ho`
  ADD CONSTRAINT `fk_teacher_donate` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
