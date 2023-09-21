-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-21 08:42
-- 서버 버전: 10.4.28-MariaDB
-- PHP 버전: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `coderabbit`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `class_image_table`
--

CREATE TABLE `class_image_table` (
  `imgid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `class_image_table`
--

INSERT INTO `class_image_table` (`imgid`, `pid`, `userid`, `filename`, `regdate`, `status`) VALUES
(15, 8, 'admin', '20230917223459206076.jpeg', '2023-09-17 22:34:59', 1),
(16, 14, 'admin', '20230919041151626460.png', '2023-09-19 04:11:51', 1),
(17, 14, 'admin', '20230919041151177004.png', '2023-09-19 04:11:51', 1),
(20, 15, 'admin', '20230919053257170581.png', '2023-09-19 05:32:57', 1),
(21, 15, 'admin', '20230919053257862906.png', '2023-09-19 05:32:57', 1),
(22, 16, 'admin', '20230919070648910371.png', '2023-09-19 07:06:48', 1),
(23, 16, 'admin', '20230919070649117522.jpg', '2023-09-19 07:06:49', 1),
(24, 16, 'admin', '20230919070649173980.jpg', '2023-09-19 07:06:49', 1),
(27, 17, 'admin', '20230919080745327938.png', '2023-09-19 08:07:45', 1),
(28, 20, 'admin', '20230920120852283098.jpg', '2023-09-20 12:08:52', 1),
(29, 18, 'admin', '20230920120927672288.jpg', '2023-09-20 12:09:27', 1),
(30, 22, 'admin', '20230920121331875327.jpg', '2023-09-20 12:13:31', 1),
(31, 25, 'admin', '20230920121543633501.jpg', '2023-09-20 12:15:43', 1),
(32, 25, 'admin', '20230920121719171242.jpg', '2023-09-20 12:17:19', 1),
(33, 24, 'admin', '20230920121955161632.jpg', '2023-09-20 12:19:55', 1),
(34, 26, 'admin', '20230920122237213828.png', '2023-09-20 12:22:37', 1),
(35, 27, 'admin', '20230920122738187158.png', '2023-09-20 12:27:38', 1),
(36, 28, 'admin', '20230920122940143738.png', '2023-09-20 12:29:40', 1),
(37, 29, 'admin', '20230920123457913848.png', '2023-09-20 12:34:57', 1),
(38, 30, 'admin', '20230920123702154270.png', '2023-09-20 12:37:02', 1),
(39, 31, 'admin', '20230920124045141061.png', '2023-09-20 12:40:45', 0),
(40, 32, 'admin', '20230920172806175550.png', '2023-09-21 00:28:06', 1),
(41, NULL, 'admin', '20230920205041146068.png', '2023-09-21 03:50:41', 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `class_image_table`
--
ALTER TABLE `class_image_table`
  ADD PRIMARY KEY (`imgid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `class_image_table`
--
ALTER TABLE `class_image_table`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
