-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:2003
-- Generation Time: Dec 13, 2022 at 02:46 PM
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
(17, 'tg', 'FPT PTCĐ Bắc Giang'),
(18, 'ti', 'FPT PTCĐ Bình Định'),
(19, 'tu', 'FPT PTCĐ Thái Nguyên'),
(22, '12', '12');

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
  `thongtin_sv` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `id_mon` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL,
  `array_diem` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhan_xet` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phan_loai` enum('null','gioi','yeu') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diem_sv`
--

INSERT INTO `diem_sv` (`id`, `mssv`, `ho_ten`, `sdt`, `email`, `thongtin_sv`, `id_mon`, `id_lop`, `array_diem`, `nhan_xet`, `phan_loai`, `id_teacher`) VALUES
(1537, 'PS14603', 'Trần Tiến Anh', '335702367', 'anhttps14603@fpt.edu.vn', '[1,\"PS14603\",\"Tr\\u1ea7n Ti\\u1ebfn Anh\",\"anhttps14603@fpt.edu.vn\",335702367]', 15, 38, '{\"G\\u01101\":\"1\",\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, 'yeu', 19),
(1538, 'PS14873', 'Lê Xuân Ninh', '889625585', 'ninhlxps14873@fpt.edu.vn', '[2,\"PS14873\",\"L\\u00ea Xu\\u00e2n Ninh\",\"ninhlxps14873@fpt.edu.vn\",889625585]', 15, 38, '{\"G\\u01101\":\"6\",\"G\\u01102\":\"7.6\",\"G\\u01103\":\"2\",\"THI\":null}', NULL, NULL, 19),
(1539, 'PS21179', 'Đỗ Quốc Việt', '325561916', 'vietdqps21179@fpt.edu.vn', '[3,\"PS21179\",\"\\u0110\\u1ed7 Qu\\u1ed1c Vi\\u1ec7t\",\"vietdqps21179@fpt.edu.vn\",325561916]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1540, 'PS20220', 'Võ Đức Khoa Văn', '933418277', 'vanvdkps20220@fpt.edu.vn', '[4,\"PS20220\",\"V\\u00f5 \\u0110\\u1ee9c Khoa V\\u0103n\",\"vanvdkps20220@fpt.edu.vn\",933418277]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1541, 'PS20080', 'Võ Đức Trung', '785386929', 'trungvdps20080@fpt.edu.vn', '[5,\"PS20080\",\"V\\u00f5 \\u0110\\u1ee9c Trung\",\"trungvdps20080@fpt.edu.vn\",785386929]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1542, 'PS20466', 'Nguyễn Huy Thiện', '398465508', 'thiennhps20466@fpt.edu.vn', '[6,\"PS20466\",\"Nguy\\u1ec5n Huy Thi\\u1ec7n\",\"thiennhps20466@fpt.edu.vn\",398465508]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1543, 'PK02697', 'Long Văn Thiện', '363206498', 'thienlvpk02697@fpt.edu.vn', '[7,\"PK02697\",\"Long V\\u0103n Thi\\u1ec7n\",\"thienlvpk02697@fpt.edu.vn\",363206498]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1544, 'PS21640', 'Lê Quốc Thiện', '363008204', 'thienlqps21640@fpt.edu.vn', '[8,\"PS21640\",\"L\\u00ea Qu\\u1ed1c Thi\\u1ec7n\",\"thienlqps21640@fpt.edu.vn\",363008204]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1545, 'PS22915', 'Nguyễn Văn Thảo', '345005746', 'thaonvps22915@fpt.edu.vn', '[9,\"PS22915\",\"Nguy\\u1ec5n V\\u0103n Th\\u1ea3o\",\"thaonvps22915@fpt.edu.vn\",345005746]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1546, 'PS21659', 'Nguyễn Bá Thân', '859715977', 'thannbps21659@fpt.edu.vn', '[10,\"PS21659\",\"Nguy\\u1ec5n B\\u00e1 Th\\u00e2n\",\"thannbps21659@fpt.edu.vn\",859715977]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1547, 'PS21612', 'Nguyễn Văn Thắng', '946318956', 'thangnvps21612@fpt.edu.vn', '[11,\"PS21612\",\"Nguy\\u1ec5n V\\u0103n Th\\u1eafng\",\"thangnvps21612@fpt.edu.vn\",946318956]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1548, 'PS22028', 'Đỗ Văn Quí', '829613815', 'quidvps22028@fpt.edu.vn', '[12,\"PS22028\",\"\\u0110\\u1ed7 V\\u0103n Qu\\u00ed\",\"quidvps22028@fpt.edu.vn\",829613815]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1549, 'PS20093', 'Trần Thiên Phúc', '779750024', 'phucttps20093@fpt.edu.vn', '[13,\"PS20093\",\"Tr\\u1ea7n Thi\\u00ean Ph\\u00fac\",\"phucttps20093@fpt.edu.vn\",779750024]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1550, 'PS21954', 'Lê Nguyễn Hoàng Phúc', '974887269', 'phuclnhps21954@fpt.edu.vn', '[14,\"PS21954\",\"L\\u00ea Nguy\\u1ec5n Ho\\u00e0ng Ph\\u00fac\",\"phuclnhps21954@fpt.edu.vn\",974887269]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1551, 'PS21897', 'Võ Hoàng Phong', '774574055', 'phongvhps21897@fpt.edu.vn', '[15,\"PS21897\",\"V\\u00f5 Ho\\u00e0ng Phong\",\"phongvhps21897@fpt.edu.vn\",774574055]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1552, 'PS25229', 'Phan Võ Trọng Phong', '387800862', 'phongpvtps25229@fpt.edu.vn', '[16,\"PS25229\",\"Phan V\\u00f5 Tr\\u1ecdng Phong\",\"phongpvtps25229@fpt.edu.vn\",387800862]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1553, 'PS20821', 'Trần Văn Minh', '336305149', 'minhtvps20821@fpt.edu.vn', '[17,\"PS20821\",\"Tr\\u1ea7n V\\u0103n Minh\",\"minhtvps20821@fpt.edu.vn\",336305149]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1554, 'PS20006', 'Nguyễn Ngọc Thiên Ân', '338286902', 'annntps20006@fpt.edu.vn', '[18,\"PS20006\",\"Nguy\\u1ec5n Ng\\u1ecdc Thi\\u00ean \\u00c2n\",\"annntps20006@fpt.edu.vn\",338286902]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1555, 'PS21938', 'Đoàn Huỳnh Vũ Luân', '935468857', 'luandhvps21938@fpt.edu.vn', '[19,\"PS21938\",\"\\u0110o\\u00e0n Hu\\u1ef3nh V\\u0169 Lu\\u00e2n\",\"luandhvps21938@fpt.edu.vn\",935468857]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1556, 'PS21861', 'Huỳnh Ngọc Bảo Long', '777663476', 'longhnbps21861@fpt.edu.vn', '[20,\"PS21861\",\"Hu\\u1ef3nh Ng\\u1ecdc B\\u1ea3o Long\",\"longhnbps21861@fpt.edu.vn\",777663476]', 15, 38, '{\"G\\u01101\":\"10\",\"G\\u01102\":\"2\",\"G\\u01103\":\"3\",\"THI\":\"4\"}', NULL, NULL, 19),
(1557, 'PS20777', 'Đặng Hoàng Long', '333229858', 'longdhps20777@fpt.edu.vn', '[21,\"PS20777\",\"\\u0110\\u1eb7ng Ho\\u00e0ng Long\",\"longdhps20777@fpt.edu.vn\",333229858]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1558, 'PS20770', 'Trần Đăng Khoa', '909499890', 'khoatdps20770@fpt.edu.vn', '[22,\"PS20770\",\"Tr\\u1ea7n \\u0110\\u0103ng Khoa\",\"khoatdps20770@fpt.edu.vn\",909499890]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1559, 'PS22060', 'Phan Đăng Khoa', '349660485', 'khoapdps22060@fpt.edu.vn', '[23,\"PS22060\",\"Phan \\u0110\\u0103ng Khoa\",\"khoapdps22060@fpt.edu.vn\",349660485]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1560, 'PS21693', 'Võ Đình Kha', '389838883', 'khavdps21693@fpt.edu.vn', '[24,\"PS21693\",\"V\\u00f5 \\u0110\\u00ecnh Kha\",\"khavdps21693@fpt.edu.vn\",389838883]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1561, 'PS20630', 'Nguyễn An Khang', '919792000', 'khangnaps20630@fpt.edu.vn', '[25,\"PS20630\",\"Nguy\\u1ec5n An Khang\",\"khangnaps20630@fpt.edu.vn\",919792000]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1562, 'PS20003', 'Nguyễn Văn Khải', '945268243', 'khainvps20003@fpt.edu.vn', '[26,\"PS20003\",\"Nguy\\u1ec5n V\\u0103n Kh\\u1ea3i\",\"khainvps20003@fpt.edu.vn\",945268243]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1563, 'PS21981', 'Hồ Nhất Huy', '825478781', 'huyhnps21981@fpt.edu.vn', '[27,\"PS21981\",\"H\\u1ed3 Nh\\u1ea5t Huy\",\"huyhnps21981@fpt.edu.vn\",825478781]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1564, 'PS21225', 'Nguyễn Võ Huy Hoàng', '355361930', 'hoangnvhps21225@fpt.edu.vn', '[28,\"PS21225\",\"Nguy\\u1ec5n V\\u00f5 Huy Ho\\u00e0ng\",\"hoangnvhps21225@fpt.edu.vn\",355361930]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1565, 'PS20666', 'Phạm Quốc Duy', '936901022', 'duypqps20666@fpt.edu.vn', '[29,\"PS20666\",\"Ph\\u1ea1m Qu\\u1ed1c Duy\",\"duypqps20666@fpt.edu.vn\",936901022]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1566, 'PS20254', 'Lê Quang Dự', '906769986', 'dulqps20254@fpt.edu.vn', '[30,\"PS20254\",\"L\\u00ea Quang D\\u1ef1\",\"dulqps20254@fpt.edu.vn\",906769986]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1567, 'PS19726', 'Trần Phát Đạt', '392751331', 'dattpps19726@fpt.edu.vn', '[31,\"PS19726\",\"Tr\\u00e2\\u0300n Ph\\u00e1t \\u0110\\u1ea1t\",\"dattpps19726@fpt.edu.vn\",392751331]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1568, 'PS20837', 'Võ Hoài Bảo', '911033753', 'baovhps20837@fpt.edu.vn', '[32,\"PS20837\",\"V\\u00f5 Ho\\u00e0i B\\u1ea3o\",\"baovhps20837@fpt.edu.vn\",911033753]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1569, 'PS21438', 'Trịnh Việt Long Vũ', '776924706', 'vutvlps21438@fpt.edu.vn', '[33,\"PS21438\",\"Tr\\u1ecbnh Vi\\u1ec7t Long V\\u0169\",\"vutvlps21438@fpt.edu.vn\",776924706]', 15, 38, '{\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null}', NULL, NULL, 19),
(1570, 'PS14603', 'Trần Tiến Anh', '335702367', 'anhttps14603@fpt.edu.vn', '[1,\"PS14603\",\"Tr\\u1ea7n Ti\\u1ebfn Anh\",\"anhttps14603@fpt.edu.vn\",335702367]', 16, 39, '{\"Lab1\":\"1\",\"Lab2\":null,\"Lab3\":\"2\",\"Lab4\":null,\"Lab5\":\"1\",\"Lab6\":null,\"Lab7\":\"2\",\"Lab8\":\"2\",\"G\\u01101\":\"2\",\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1571, 'PS14873', 'Lê Xuân Ninh', '889625585', 'ninhlxps14873@fpt.edu.vn', '[2,\"PS14873\",\"L\\u00ea Xu\\u00e2n Ninh\",\"ninhlxps14873@fpt.edu.vn\",889625585]', 16, 39, '{\"Lab1\":\"2\",\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1572, 'PS21179', 'Đỗ Quốc Việt', '325561916', 'vietdqps21179@fpt.edu.vn', '[3,\"PS21179\",\"\\u0110\\u1ed7 Qu\\u1ed1c Vi\\u1ec7t\",\"vietdqps21179@fpt.edu.vn\",325561916]', 16, 39, '{\"Lab1\":\"3\",\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1573, 'PS20220', 'Võ Đức Khoa Văn', '933418277', 'vanvdkps20220@fpt.edu.vn', '[4,\"PS20220\",\"V\\u00f5 \\u0110\\u1ee9c Khoa V\\u0103n\",\"vanvdkps20220@fpt.edu.vn\",933418277]', 16, 39, '{\"Lab1\":\"4\",\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1574, 'PS20080', 'Võ Đức Trung', '785386929', 'trungvdps20080@fpt.edu.vn', '[5,\"PS20080\",\"V\\u00f5 \\u0110\\u1ee9c Trung\",\"trungvdps20080@fpt.edu.vn\",785386929]', 16, 39, '{\"Lab1\":\"5\",\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1575, 'PS20466', 'Nguyễn Huy Thiện', '398465508', 'thiennhps20466@fpt.edu.vn', '[6,\"PS20466\",\"Nguy\\u1ec5n Huy Thi\\u1ec7n\",\"thiennhps20466@fpt.edu.vn\",398465508]', 16, 39, '{\"Lab1\":\"6\",\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1576, 'PK02697', 'Long Văn Thiện', '363206498', 'thienlvpk02697@fpt.edu.vn', '[7,\"PK02697\",\"Long V\\u0103n Thi\\u1ec7n\",\"thienlvpk02697@fpt.edu.vn\",363206498]', 16, 39, '{\"Lab1\":\"6\",\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1577, 'PS21640', 'Lê Quốc Thiện', '363008204', 'thienlqps21640@fpt.edu.vn', '[8,\"PS21640\",\"L\\u00ea Qu\\u1ed1c Thi\\u1ec7n\",\"thienlqps21640@fpt.edu.vn\",363008204]', 16, 39, '{\"Lab1\":\"2\",\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1578, 'PS22915', 'Nguyễn Văn Thảo', '345005746', 'thaonvps22915@fpt.edu.vn', '[9,\"PS22915\",\"Nguy\\u1ec5n V\\u0103n Th\\u1ea3o\",\"thaonvps22915@fpt.edu.vn\",345005746]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1579, 'PS21659', 'Nguyễn Bá Thân', '859715977', 'thannbps21659@fpt.edu.vn', '[10,\"PS21659\",\"Nguy\\u1ec5n B\\u00e1 Th\\u00e2n\",\"thannbps21659@fpt.edu.vn\",859715977]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1580, 'PS21612', 'Nguyễn Văn Thắng', '946318956', 'thangnvps21612@fpt.edu.vn', '[11,\"PS21612\",\"Nguy\\u1ec5n V\\u0103n Th\\u1eafng\",\"thangnvps21612@fpt.edu.vn\",946318956]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1581, 'PS22028', 'Đỗ Văn Quí', '829613815', 'quidvps22028@fpt.edu.vn', '[12,\"PS22028\",\"\\u0110\\u1ed7 V\\u0103n Qu\\u00ed\",\"quidvps22028@fpt.edu.vn\",829613815]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1582, 'PS20093', 'Trần Thiên Phúc', '779750024', 'phucttps20093@fpt.edu.vn', '[13,\"PS20093\",\"Tr\\u1ea7n Thi\\u00ean Ph\\u00fac\",\"phucttps20093@fpt.edu.vn\",779750024]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1583, 'PS21954', 'Lê Nguyễn Hoàng Phúc', '974887269', 'phuclnhps21954@fpt.edu.vn', '[14,\"PS21954\",\"L\\u00ea Nguy\\u1ec5n Ho\\u00e0ng Ph\\u00fac\",\"phuclnhps21954@fpt.edu.vn\",974887269]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1584, 'PS21897', 'Võ Hoàng Phong', '774574055', 'phongvhps21897@fpt.edu.vn', '[15,\"PS21897\",\"V\\u00f5 Ho\\u00e0ng Phong\",\"phongvhps21897@fpt.edu.vn\",774574055]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1585, 'PS25229', 'Phan Võ Trọng Phong', '387800862', 'phongpvtps25229@fpt.edu.vn', '[16,\"PS25229\",\"Phan V\\u00f5 Tr\\u1ecdng Phong\",\"phongpvtps25229@fpt.edu.vn\",387800862]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1586, 'PS20821', 'Trần Văn Minh', '336305149', 'minhtvps20821@fpt.edu.vn', '[17,\"PS20821\",\"Tr\\u1ea7n V\\u0103n Minh\",\"minhtvps20821@fpt.edu.vn\",336305149]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1587, 'PS20006', 'Nguyễn Ngọc Thiên Ân', '338286902', 'annntps20006@fpt.edu.vn', '[18,\"PS20006\",\"Nguy\\u1ec5n Ng\\u1ecdc Thi\\u00ean \\u00c2n\",\"annntps20006@fpt.edu.vn\",338286902]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1588, 'PS21938', 'Đoàn Huỳnh Vũ Luân', '935468857', 'luandhvps21938@fpt.edu.vn', '[19,\"PS21938\",\"\\u0110o\\u00e0n Hu\\u1ef3nh V\\u0169 Lu\\u00e2n\",\"luandhvps21938@fpt.edu.vn\",935468857]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1589, 'PS21861', 'Huỳnh Ngọc Bảo Long', '777663476', 'longhnbps21861@fpt.edu.vn', '[20,\"PS21861\",\"Hu\\u1ef3nh Ng\\u1ecdc B\\u1ea3o Long\",\"longhnbps21861@fpt.edu.vn\",777663476]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1590, 'PS20777', 'Đặng Hoàng Long', '333229858', 'longdhps20777@fpt.edu.vn', '[21,\"PS20777\",\"\\u0110\\u1eb7ng Ho\\u00e0ng Long\",\"longdhps20777@fpt.edu.vn\",333229858]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1591, 'PS20770', 'Trần Đăng Khoa', '909499890', 'khoatdps20770@fpt.edu.vn', '[22,\"PS20770\",\"Tr\\u1ea7n \\u0110\\u0103ng Khoa\",\"khoatdps20770@fpt.edu.vn\",909499890]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1592, 'PS22060', 'Phan Đăng Khoa', '349660485', 'khoapdps22060@fpt.edu.vn', '[23,\"PS22060\",\"Phan \\u0110\\u0103ng Khoa\",\"khoapdps22060@fpt.edu.vn\",349660485]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1593, 'PS21693', 'Võ Đình Kha', '389838883', 'khavdps21693@fpt.edu.vn', '[24,\"PS21693\",\"V\\u00f5 \\u0110\\u00ecnh Kha\",\"khavdps21693@fpt.edu.vn\",389838883]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1594, 'PS20630', 'Nguyễn An Khang', '919792000', 'khangnaps20630@fpt.edu.vn', '[25,\"PS20630\",\"Nguy\\u1ec5n An Khang\",\"khangnaps20630@fpt.edu.vn\",919792000]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1595, 'PS20003', 'Nguyễn Văn Khải', '945268243', 'khainvps20003@fpt.edu.vn', '[26,\"PS20003\",\"Nguy\\u1ec5n V\\u0103n Kh\\u1ea3i\",\"khainvps20003@fpt.edu.vn\",945268243]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1596, 'PS21981', 'Hồ Nhất Huy', '825478781', 'huyhnps21981@fpt.edu.vn', '[27,\"PS21981\",\"H\\u1ed3 Nh\\u1ea5t Huy\",\"huyhnps21981@fpt.edu.vn\",825478781]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1597, 'PS21225', 'Nguyễn Võ Huy Hoàng', '355361930', 'hoangnvhps21225@fpt.edu.vn', '[28,\"PS21225\",\"Nguy\\u1ec5n V\\u00f5 Huy Ho\\u00e0ng\",\"hoangnvhps21225@fpt.edu.vn\",355361930]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1598, 'PS20666', 'Phạm Quốc Duy', '936901022', 'duypqps20666@fpt.edu.vn', '[29,\"PS20666\",\"Ph\\u1ea1m Qu\\u1ed1c Duy\",\"duypqps20666@fpt.edu.vn\",936901022]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1599, 'PS20254', 'Lê Quang Dự', '906769986', 'dulqps20254@fpt.edu.vn', '[30,\"PS20254\",\"L\\u00ea Quang D\\u1ef1\",\"dulqps20254@fpt.edu.vn\",906769986]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1600, 'PS19726', 'Trần Phát Đạt', '392751331', 'dattpps19726@fpt.edu.vn', '[31,\"PS19726\",\"Tr\\u00e2\\u0300n Ph\\u00e1t \\u0110\\u1ea1t\",\"dattpps19726@fpt.edu.vn\",392751331]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1601, 'PS20837', 'Võ Hoài Bảo', '911033753', 'baovhps20837@fpt.edu.vn', '[32,\"PS20837\",\"V\\u00f5 Ho\\u00e0i B\\u1ea3o\",\"baovhps20837@fpt.edu.vn\",911033753]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1602, 'PS21438', 'Trịnh Việt Long Vũ', '776924706', 'vutvlps21438@fpt.edu.vn', '[33,\"PS21438\",\"Tr\\u1ecbnh Vi\\u1ec7t Long V\\u0169\",\"vutvlps21438@fpt.edu.vn\",776924706]', 16, 39, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1603, 'PS14603', 'Trần Tiến Anh', '335702367', 'anhttps14603@fpt.edu.vn', '[1,\"PS14603\",\"Tr\\u1ea7n Ti\\u1ebfn Anh\",\"anhttps14603@fpt.edu.vn\",335702367]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1604, 'PS14873', 'Lê Xuân Ninh', '889625585', 'ninhlxps14873@fpt.edu.vn', '[2,\"PS14873\",\"L\\u00ea Xu\\u00e2n Ninh\",\"ninhlxps14873@fpt.edu.vn\",889625585]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1605, 'PS21179', 'Đỗ Quốc Việt', '325561916', 'vietdqps21179@fpt.edu.vn', '[3,\"PS21179\",\"\\u0110\\u1ed7 Qu\\u1ed1c Vi\\u1ec7t\",\"vietdqps21179@fpt.edu.vn\",325561916]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1606, 'PS20220', 'Võ Đức Khoa Văn', '933418277', 'vanvdkps20220@fpt.edu.vn', '[4,\"PS20220\",\"V\\u00f5 \\u0110\\u1ee9c Khoa V\\u0103n\",\"vanvdkps20220@fpt.edu.vn\",933418277]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1607, 'PS20080', 'Võ Đức Trung', '785386929', 'trungvdps20080@fpt.edu.vn', '[5,\"PS20080\",\"V\\u00f5 \\u0110\\u1ee9c Trung\",\"trungvdps20080@fpt.edu.vn\",785386929]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1608, 'PS20466', 'Nguyễn Huy Thiện', '398465508', 'thiennhps20466@fpt.edu.vn', '[6,\"PS20466\",\"Nguy\\u1ec5n Huy Thi\\u1ec7n\",\"thiennhps20466@fpt.edu.vn\",398465508]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1609, 'PK02697', 'Long Văn Thiện', '363206498', 'thienlvpk02697@fpt.edu.vn', '[7,\"PK02697\",\"Long V\\u0103n Thi\\u1ec7n\",\"thienlvpk02697@fpt.edu.vn\",363206498]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1610, 'PS21640', 'Lê Quốc Thiện', '363008204', 'thienlqps21640@fpt.edu.vn', '[8,\"PS21640\",\"L\\u00ea Qu\\u1ed1c Thi\\u1ec7n\",\"thienlqps21640@fpt.edu.vn\",363008204]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1611, 'PS22915', 'Nguyễn Văn Thảo', '345005746', 'thaonvps22915@fpt.edu.vn', '[9,\"PS22915\",\"Nguy\\u1ec5n V\\u0103n Th\\u1ea3o\",\"thaonvps22915@fpt.edu.vn\",345005746]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1612, 'PS21659', 'Nguyễn Bá Thân', '859715977', 'thannbps21659@fpt.edu.vn', '[10,\"PS21659\",\"Nguy\\u1ec5n B\\u00e1 Th\\u00e2n\",\"thannbps21659@fpt.edu.vn\",859715977]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1613, 'PS21612', 'Nguyễn Văn Thắng', '946318956', 'thangnvps21612@fpt.edu.vn', '[11,\"PS21612\",\"Nguy\\u1ec5n V\\u0103n Th\\u1eafng\",\"thangnvps21612@fpt.edu.vn\",946318956]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1614, 'PS22028', 'Đỗ Văn Quí', '829613815', 'quidvps22028@fpt.edu.vn', '[12,\"PS22028\",\"\\u0110\\u1ed7 V\\u0103n Qu\\u00ed\",\"quidvps22028@fpt.edu.vn\",829613815]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1615, 'PS20093', 'Trần Thiên Phúc', '779750024', 'phucttps20093@fpt.edu.vn', '[13,\"PS20093\",\"Tr\\u1ea7n Thi\\u00ean Ph\\u00fac\",\"phucttps20093@fpt.edu.vn\",779750024]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1616, 'PS21954', 'Lê Nguyễn Hoàng Phúc', '974887269', 'phuclnhps21954@fpt.edu.vn', '[14,\"PS21954\",\"L\\u00ea Nguy\\u1ec5n Ho\\u00e0ng Ph\\u00fac\",\"phuclnhps21954@fpt.edu.vn\",974887269]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1617, 'PS21897', 'Võ Hoàng Phong', '774574055', 'phongvhps21897@fpt.edu.vn', '[15,\"PS21897\",\"V\\u00f5 Ho\\u00e0ng Phong\",\"phongvhps21897@fpt.edu.vn\",774574055]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1618, 'PS25229', 'Phan Võ Trọng Phong', '387800862', 'phongpvtps25229@fpt.edu.vn', '[16,\"PS25229\",\"Phan V\\u00f5 Tr\\u1ecdng Phong\",\"phongpvtps25229@fpt.edu.vn\",387800862]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1619, 'PS20821', 'Trần Văn Minh', '336305149', 'minhtvps20821@fpt.edu.vn', '[17,\"PS20821\",\"Tr\\u1ea7n V\\u0103n Minh\",\"minhtvps20821@fpt.edu.vn\",336305149]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1620, 'PS20006', 'Nguyễn Ngọc Thiên Ân', '338286902', 'annntps20006@fpt.edu.vn', '[18,\"PS20006\",\"Nguy\\u1ec5n Ng\\u1ecdc Thi\\u00ean \\u00c2n\",\"annntps20006@fpt.edu.vn\",338286902]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1621, 'PS21938', 'Đoàn Huỳnh Vũ Luân', '935468857', 'luandhvps21938@fpt.edu.vn', '[19,\"PS21938\",\"\\u0110o\\u00e0n Hu\\u1ef3nh V\\u0169 Lu\\u00e2n\",\"luandhvps21938@fpt.edu.vn\",935468857]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1622, 'PS21861', 'Huỳnh Ngọc Bảo Long', '777663476', 'longhnbps21861@fpt.edu.vn', '[20,\"PS21861\",\"Hu\\u1ef3nh Ng\\u1ecdc B\\u1ea3o Long\",\"longhnbps21861@fpt.edu.vn\",777663476]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1623, 'PS20777', 'Đặng Hoàng Long', '333229858', 'longdhps20777@fpt.edu.vn', '[21,\"PS20777\",\"\\u0110\\u1eb7ng Ho\\u00e0ng Long\",\"longdhps20777@fpt.edu.vn\",333229858]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1624, 'PS20770', 'Trần Đăng Khoa', '909499890', 'khoatdps20770@fpt.edu.vn', '[22,\"PS20770\",\"Tr\\u1ea7n \\u0110\\u0103ng Khoa\",\"khoatdps20770@fpt.edu.vn\",909499890]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1625, 'PS22060', 'Phan Đăng Khoa', '349660485', 'khoapdps22060@fpt.edu.vn', '[23,\"PS22060\",\"Phan \\u0110\\u0103ng Khoa\",\"khoapdps22060@fpt.edu.vn\",349660485]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1626, 'PS21693', 'Võ Đình Kha', '389838883', 'khavdps21693@fpt.edu.vn', '[24,\"PS21693\",\"V\\u00f5 \\u0110\\u00ecnh Kha\",\"khavdps21693@fpt.edu.vn\",389838883]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1627, 'PS20630', 'Nguyễn An Khang', '919792000', 'khangnaps20630@fpt.edu.vn', '[25,\"PS20630\",\"Nguy\\u1ec5n An Khang\",\"khangnaps20630@fpt.edu.vn\",919792000]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1628, 'PS20003', 'Nguyễn Văn Khải', '945268243', 'khainvps20003@fpt.edu.vn', '[26,\"PS20003\",\"Nguy\\u1ec5n V\\u0103n Kh\\u1ea3i\",\"khainvps20003@fpt.edu.vn\",945268243]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1629, 'PS21981', 'Hồ Nhất Huy', '825478781', 'huyhnps21981@fpt.edu.vn', '[27,\"PS21981\",\"H\\u1ed3 Nh\\u1ea5t Huy\",\"huyhnps21981@fpt.edu.vn\",825478781]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1630, 'PS21225', 'Nguyễn Võ Huy Hoàng', '355361930', 'hoangnvhps21225@fpt.edu.vn', '[28,\"PS21225\",\"Nguy\\u1ec5n V\\u00f5 Huy Ho\\u00e0ng\",\"hoangnvhps21225@fpt.edu.vn\",355361930]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1631, 'PS20666', 'Phạm Quốc Duy', '936901022', 'duypqps20666@fpt.edu.vn', '[29,\"PS20666\",\"Ph\\u1ea1m Qu\\u1ed1c Duy\",\"duypqps20666@fpt.edu.vn\",936901022]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1632, 'PS20254', 'Lê Quang Dự', '906769986', 'dulqps20254@fpt.edu.vn', '[30,\"PS20254\",\"L\\u00ea Quang D\\u1ef1\",\"dulqps20254@fpt.edu.vn\",906769986]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1633, 'PS19726', 'Trần Phát Đạt', '392751331', 'dattpps19726@fpt.edu.vn', '[31,\"PS19726\",\"Tr\\u00e2\\u0300n Ph\\u00e1t \\u0110\\u1ea1t\",\"dattpps19726@fpt.edu.vn\",392751331]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1634, 'PS20837', 'Võ Hoài Bảo', '911033753', 'baovhps20837@fpt.edu.vn', '[32,\"PS20837\",\"V\\u00f5 Ho\\u00e0i B\\u1ea3o\",\"baovhps20837@fpt.edu.vn\",911033753]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19),
(1635, 'PS21438', 'Trịnh Việt Long Vũ', '776924706', 'vutvlps21438@fpt.edu.vn', '[33,\"PS21438\",\"Tr\\u1ecbnh Vi\\u1ec7t Long V\\u0169\",\"vutvlps21438@fpt.edu.vn\",776924706]', 16, 38, '{\"Lab1\":null,\"Lab2\":null,\"Lab3\":null,\"Lab4\":null,\"Lab5\":null,\"Lab6\":null,\"Lab7\":null,\"Lab8\":null,\"G\\u01101\":null,\"G\\u01102\":null,\"G\\u01103\":null,\"THI\":null,\"Q1\":null,\"Q2\":null,\"Q3\":null,\"Q4\":null,\"Q5\":null,\"Q6\":null,\"Q7\":null,\"Q8\":null}', NULL, NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `hoc_ky`
--

CREATE TABLE `hoc_ky` (
  `id_hocky` int(11) NOT NULL,
  `ten_hocky` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoc_ky`
--

INSERT INTO `hoc_ky` (`id_hocky`, `ten_hocky`, `id_teacher`) VALUES
(27, 'Spring 2022', 19),
(29, 'Sping 2023', 19);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(11) NOT NULL,
  `ten_khoa` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `ten_khoa`, `id_teacher`) VALUES
(32, '17.3', 19),
(33, '18.3', 19);

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
  `phong_hoc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_sv` int(11) DEFAULT NULL,
  `ngay_bat_dau` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_ket_thuc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
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
  `mo_ta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lien_ket`
--

INSERT INTO `lien_ket` (`id_lienket`, `ten`, `url`, `mo_ta`, `id_teacher`) VALUES
(92, 'LMS', 'http://hcm-lms.edu.vn', 'LMS', 19),
(93, 'Điểm danh AP', 'http://gv.poly.edu.vn', 'Điểm danh AP', 19),
(94, 'Lịch trường', 'https://gv.poly.edu.vn/teacher/activity', 'Lịch trường', 19),
(95, 'Lớp của tôi', 'https://gv.poly.edu.vn/teacher/my_class', 'Lớp của tôi', 19);

-- --------------------------------------------------------

--
-- Table structure for table `loai_diem`
--

CREATE TABLE `loai_diem` (
  `id` int(11) NOT NULL,
  `ten_diem` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_diem`
--

INSERT INTO `loai_diem` (`id`, `ten_diem`, `id_teacher`) VALUES
(47, 'Lab1', 19),
(48, 'Lab2', 19),
(49, 'Lab3', 19),
(50, 'Lab4', 19),
(51, 'Lab5', 19),
(52, 'Lab6', 19),
(53, 'Lab7', 19),
(54, 'Lab8', 19),
(55, 'GĐ1', 19),
(56, 'GĐ2', 19),
(57, 'GĐ3', 19),
(58, 'THI', 19),
(59, 'Q1', 19),
(60, 'Q2', 19),
(61, 'Q3', 19),
(62, 'Q4', 19),
(63, 'Q5', 19),
(64, 'Q6', 19),
(65, 'Q7', 19),
(66, 'Q8', 19);

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

--
-- Dumping data for table `loai_lop`
--

INSERT INTO `loai_lop` (`id_loai`, `ten_lop`, `mo_ta`, `id_khoa`, `id_teacher`) VALUES
(38, 'WEB17301', '', 32, 19),
(39, 'WEB17316', 'Lớp ứng dụng phầm mềm', 33, 19);

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

--
-- Dumping data for table `mon_hoc`
--

INSERT INTO `mon_hoc` (`id_mon`, `ma_mon`, `ten_mon`, `ghi_chu`, `diem`, `id_teacher`) VALUES
(15, 'PRO1014', 'Dự án 1 (TKTW)', 'Dự án 1 (TKTW)', 'GĐ1,GĐ2,GĐ3,THI', 19),
(16, 'WEB1022', 'Quản trị website', 'Quản trị website', 'Lab1,Lab2,Lab3,Lab4,Lab5,Lab6,Lab7,Lab8,GĐ1,GĐ2,GĐ3,THI,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8', 19),
(17, 'WEB503', 'NODEJS', '', 'Lab1,Lab2,Lab3,Lab4,GĐ1,GĐ2,GĐ3', 19);

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
  `smtp_user` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_pass` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_server` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_port` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_protocol` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_description`, `site_keywords`, `site_logo`, `site_name`, `favicon`, `site_status`, `smtp_user`, `smtp_pass`, `smtp_server`, `smtp_port`, `smtp_protocol`) VALUES
(1, 'Fpoly Teacher Tool', 'Fpoly Teacher Tool', 'Fpoly Teacher Tool', 'logo.png', 'Fpoly Teacher Tool', 'favicon.ico', '2', 'thaolaptrinh@gmail.com', 'nzqykqiypjbdbxdm\n', 'smtp.gmail.com', '465', 'ssl');

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
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'tất cả dữ liệu quản lý của giáo viên'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id_teacher`, `name`, `email`, `password`, `register_date`, `code_donate`, `id_coso`, `status`, `data`) VALUES
(19, '', 'fpoly@gmail.com', 'YzQyZGNjNDQwZDg2MWU1ZDU3ZTk1ZTMzMGJmNjBmNGI=', NULL, 'ungho19', 3, '2', NULL),
(22, '', 'thaolaptrinh@gmail.com', 'ZTRhNTEzYzFkODU4ZGU2YmM0MTM0ZDg2ZTEwNDFkMTE=', NULL, 'ungho22', 3, '2', NULL);

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

--
-- Dumping data for table `thanh_ngu`
--

INSERT INTO `thanh_ngu` (`id`, `noi_dung`, `status`, `id_teacher`) VALUES
(59, 'Đừng sợ phí công', '2', 19),
(60, 'Dỡ học cho giỏi', '1', 19),
(61, 'Học cho thêm giỏi', '1', 19);

-- --------------------------------------------------------

--
-- Table structure for table `ung_ho`
--

CREATE TABLE `ung_ho` (
  `id` int(11) NOT NULL,
  `tranId` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
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
  MODIFY `id_coso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `diem_sv`
--
ALTER TABLE `diem_sv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1669;

--
-- AUTO_INCREMENT for table `hoc_ky`
--
ALTER TABLE `hoc_ky`
  MODIFY `id_hocky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `lich_day`
--
ALTER TABLE `lich_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lien_ket`
--
ALTER TABLE `lien_ket`
  MODIFY `id_lienket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `loai_diem`
--
ALTER TABLE `loai_diem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `loai_lop`
--
ALTER TABLE `loai_lop`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id_mon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `thanh_ngu`
--
ALTER TABLE `thanh_ngu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
