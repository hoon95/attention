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
(329, 141, 'admin', '20230907032858612787.jpg', '2023-09-07 10:28:58', 1),
(330, 141, 'admin', '20230907032858127060.jpg', '2023-09-07 10:28:58', 1),
(331, 141, 'admin', '20230907032858126085.jpg', '2023-09-07 10:28:58', 1),
(332, 142, 'admin', '20230907033123410492.jpg', '2023-09-07 10:31:23', 1),
(333, 142, 'admin', '20230907033123382185.jpg', '2023-09-07 10:31:23', 1),
(334, 142, 'admin', '20230907033123185837.jpg', '2023-09-07 10:31:23', 1),
(335, 143, 'admin', '20230907033220585306.jpg', '2023-09-07 10:32:20', 1),
(336, 143, 'admin', '20230907033220599644.jpg', '2023-09-07 10:32:20', 1),
(337, 143, 'admin', '20230907033220912191.jpg', '2023-09-07 10:32:20', 1),
(338, 144, 'admin', '20230907033403170490.jpg', '2023-09-07 10:34:03', 1),
(339, 144, 'admin', '20230907033403891099.jpg', '2023-09-07 10:34:03', 1),
(340, 144, 'admin', '20230907033403211020.jpg', '2023-09-07 10:34:03', 1),
(341, 145, 'admin', '20230907033524210892.jpg', '2023-09-07 10:35:24', 1),
(342, 145, 'admin', '20230907033524129440.jpg', '2023-09-07 10:35:24', 1),
(343, 145, 'admin', '20230907033524877585.jpg', '2023-09-07 10:35:24', 1),
(344, 146, 'admin', '20230907033756737636.jpg', '2023-09-07 10:37:56', 1),
(345, 146, 'admin', '20230907033756185316.jpg', '2023-09-07 10:37:56', 1),
(346, 146, 'admin', '20230907033756437638.jpg', '2023-09-07 10:37:56', 1),
(347, 147, 'admin', '20230907033920681768.jpg', '2023-09-07 10:39:20', 1),
(348, 147, 'admin', '20230907033920182788.jpg', '2023-09-07 10:39:20', 1),
(349, 147, 'admin', '20230907033920826300.jpg', '2023-09-07 10:39:20', 1),
(350, 148, 'admin', '20230907034145146597.jpg', '2023-09-07 10:41:45', 1),
(351, 148, 'admin', '20230907034145419845.jpg', '2023-09-07 10:41:45', 1),
(352, 148, 'admin', '20230907034145209807.jpg', '2023-09-07 10:41:45', 1),
(353, 149, 'admin', '20230907034429825459.jpg', '2023-09-07 10:44:29', 1),
(354, 149, 'admin', '20230907034429136721.jpg', '2023-09-07 10:44:29', 1),
(355, 149, 'admin', '20230907034429312650.jpg', '2023-09-07 10:44:29', 1),
(356, 150, 'admin', '20230907034647163041.jpg', '2023-09-07 10:46:47', 1),
(357, 150, 'admin', '20230907034647173472.jpg', '2023-09-07 10:46:47', 1),
(358, 150, 'admin', '20230907034647158204.jpg', '2023-09-07 10:46:47', 1),
(359, 151, 'admin', '20230907034925498628.jpg', '2023-09-07 10:49:25', 1),
(360, 151, 'admin', '20230907034925155734.jpg', '2023-09-07 10:49:25', 1),
(361, 151, 'admin', '20230907034925205990.jpg', '2023-09-07 10:49:25', 1);

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
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
