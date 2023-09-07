-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-07 04:10
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
(39, 140, NULL, 'https://www.youtube.com/2', '2023-09-07 10:27:55', NULL),
(40, 140, NULL, 'https://www.youtube.com/3', '2023-09-07 10:27:55', NULL),
(41, 141, NULL, 'https://www.youtube.com/1', '2023-09-07 10:29:02', NULL),
(42, 141, NULL, 'https://www.youtube.com/2', '2023-09-07 10:29:02', NULL),
(43, 141, NULL, 'https://www.youtube.com/3', '2023-09-07 10:29:02', NULL),
(44, 142, NULL, 'https://www.youtube.com/1', '2023-09-07 10:31:23', NULL),
(45, 142, NULL, 'https://www.youtube.com/2', '2023-09-07 10:31:23', NULL),
(46, 142, NULL, 'https://www.youtube.com/3', '2023-09-07 10:31:23', NULL),
(47, 143, NULL, 'https://www.youtube.com/1', '2023-09-07 10:32:21', NULL),
(48, 143, NULL, 'https://www.youtube.com/2', '2023-09-07 10:32:21', NULL),
(49, 143, NULL, 'https://www.youtube.com/3', '2023-09-07 10:32:21', NULL),
(50, 144, NULL, 'https://www.youtube.com/1', '2023-09-07 10:34:04', NULL),
(51, 144, NULL, 'https://www.youtube.com/2', '2023-09-07 10:34:04', NULL),
(52, 144, NULL, 'https://www.youtube.com/3', '2023-09-07 10:34:04', NULL),
(53, 145, NULL, 'https://www.youtube.com/1', '2023-09-07 10:35:25', NULL),
(54, 145, NULL, 'https://www.youtube.com/2', '2023-09-07 10:35:25', NULL),
(55, 145, NULL, 'https://www.youtube.com/3', '2023-09-07 10:35:25', NULL),
(56, 146, NULL, 'https://www.youtube.com/1', '2023-09-07 10:37:57', NULL),
(57, 146, NULL, 'https://www.youtube.com/2', '2023-09-07 10:37:57', NULL),
(58, 146, NULL, 'https://www.youtube.com/3', '2023-09-07 10:37:57', NULL),
(59, 147, NULL, 'https://www.youtube.com/1', '2023-09-07 10:39:20', NULL),
(60, 147, NULL, 'https://www.youtube.com/2', '2023-09-07 10:39:20', NULL),
(61, 147, NULL, 'https://www.youtube.com/3', '2023-09-07 10:39:20', NULL),
(62, 148, NULL, 'https://www.youtube.com/1', '2023-09-07 10:41:48', NULL),
(63, 148, NULL, 'https://www.youtube.com/2', '2023-09-07 10:41:48', NULL),
(64, 148, NULL, 'https://www.youtube.com/3', '2023-09-07 10:41:48', NULL),
(65, 149, NULL, 'https://www.youtube.com/1', '2023-09-07 10:44:29', NULL),
(66, 149, NULL, 'https://www.youtube.com/2', '2023-09-07 10:44:29', NULL),
(67, 149, NULL, 'https://www.youtube.com/3', '2023-09-07 10:44:29', NULL),
(68, 150, NULL, 'https://www.youtube.com/1', '2023-09-07 10:46:48', NULL),
(69, 150, NULL, 'https://www.youtube.com/2', '2023-09-07 10:46:48', NULL),
(70, 150, NULL, 'https://www.youtube.com/3', '2023-09-07 10:46:48', NULL),
(71, 151, NULL, 'https://www.youtube.com/1', '2023-09-07 10:49:29', NULL),
(72, 151, NULL, 'https://www.youtube.com/2', '2023-09-07 10:49:29', NULL),
(73, 151, NULL, 'https://www.youtube.com/3', '2023-09-07 10:49:29', NULL);

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
  MODIFY `ccid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
