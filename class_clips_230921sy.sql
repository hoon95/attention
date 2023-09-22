-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-21 08:41
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
  `ccid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `regdate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `class_clips`
--

INSERT INTO `class_clips` (`ccid`, `pid`, `video_url`, `regdate`) VALUES
(1, 71, '', '2023-09-21 04:25:30'),
(2, 71, '', '2023-09-21 04:25:30'),
(3, 72, '', '2023-09-21 04:28:32'),
(4, 72, '', '2023-09-21 04:28:32'),
(5, 73, '', '2023-09-21 05:13:46'),
(6, 73, '', '2023-09-21 05:13:46'),
(7, 73, '', '2023-09-21 05:13:46');

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
  MODIFY `ccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
