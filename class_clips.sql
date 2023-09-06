-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-06 09:38
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
-- 테이블 구조 `class_clips`
--

CREATE TABLE `class_clips` (
  `ccid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `video_url` varchar(255) NOT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `class_clips`
--

INSERT INTO `class_clips` (`ccid`, `pid`, `userid`, `video_url`, `regdate`, `status`) VALUES
(1, 112, NULL, '', '2023-09-06 13:02:06', NULL),
(2, 112, NULL, '', '2023-09-06 13:02:06', NULL),
(3, 113, NULL, 'https://www.youtube.com/premium', '2023-09-06 13:04:20', NULL),
(4, 113, NULL, 'https://www.youtube.com/premium', '2023-09-06 13:04:20', NULL),
(5, 114, NULL, 'https://www.youtube.com/premium', '2023-09-06 13:16:40', NULL),
(6, 116, NULL, 'https://www.youtube.com/premium', '2023-09-06 13:18:13', NULL),
(7, 117, NULL, 'https://www.youtube.com/premium', '2023-09-06 13:19:06', NULL),
(8, 118, NULL, 'https://www.youtube.com/premium', '2023-09-06 13:21:44', NULL),
(9, 118, NULL, '', '2023-09-06 13:21:44', NULL),
(10, 119, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 14:24:49', NULL),
(11, 120, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 14:28:25', NULL),
(12, 120, NULL, 'https://www.youtube.com/premium', '2023-09-06 14:28:25', NULL),
(13, 121, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 14:31:36', NULL),
(14, 121, NULL, 'https://www.youtube.com/premium', '2023-09-06 14:31:36', NULL),
(15, 122, NULL, 'https://www.youtube.com/premium', '2023-09-06 14:39:24', NULL),
(16, 122, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 14:39:24', NULL),
(17, 123, NULL, 'https://www.youtube.com/premium', '2023-09-06 14:40:30', NULL),
(18, 123, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 14:40:30', NULL),
(19, 124, NULL, '', '2023-09-06 15:08:26', NULL),
(20, 125, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 15:22:55', NULL),
(21, 125, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 15:22:55', NULL),
(22, 126, NULL, 'ㄷ', '2023-09-06 15:33:52', NULL),
(23, 127, NULL, 'a', '2023-09-06 15:34:30', NULL),
(24, 128, NULL, 'https://www.youtube.com/premium', '2023-09-06 15:35:00', NULL),
(25, 129, NULL, 'a', '2023-09-06 15:35:26', NULL),
(26, 130, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 15:35:50', NULL),
(27, 131, NULL, 'https://www.youtube.com/premium', '2023-09-06 15:36:24', NULL),
(28, 132, NULL, 'https://www.youtube.com/premium', '2023-09-06 15:36:47', NULL),
(29, 132, NULL, 'https://www.youtube.com/premium', '2023-09-06 15:36:47', NULL),
(30, 133, NULL, 'https://www.youtube.com/premium', '2023-09-06 15:41:26', NULL),
(31, 134, NULL, 'https://www.youtube.com/1234', '2023-09-06 15:45:14', NULL),
(32, 134, NULL, 'https://www.youtube.com/365', '2023-09-06 15:45:14', NULL),
(33, 135, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 15:49:26', NULL),
(34, 136, NULL, 'http://localhost/abcmall/admin/coupon/coupon_up.php', '2023-09-06 16:06:23', NULL),
(35, 137, NULL, 'https://www.youtube.com/12234', '2023-09-06 16:16:22', NULL);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `class_clips`
--
ALTER TABLE `class_clips`
  ADD PRIMARY KEY (`ccid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `class_clips`
--
ALTER TABLE `class_clips`
  MODIFY `ccid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
