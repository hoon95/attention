-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-05 07:46
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
-- 테이블 구조 `class`
--

CREATE TABLE `class` (
  `pid` int(11) NOT NULL,
  `name` varchar(500) NOT NULL COMMENT '강좌명',
  `cate` varchar(100) DEFAULT NULL COMMENT '카테고리',
  `content` text DEFAULT NULL COMMENT '강좌소개',
  `thumbnail` varchar(100) DEFAULT NULL COMMENT '썸네일',
  `price` tinyint(10) DEFAULT NULL COMMENT '강좌가격',
  `price_val` double DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL COMMENT '강좌난이도',
  `video` varchar(100) DEFAULT NULL COMMENT '강좌영상',
  `sale_end_date` tinyint(10) DEFAULT NULL COMMENT '수강기한',
  `date_val` double DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL COMMENT '강좌등록일',
  `status` tinyint(4) DEFAULT NULL COMMENT '활성화 상태',
  `file_table_id` varchar(50) DEFAULT NULL COMMENT '추가이미지 아이디'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `class`
--

INSERT INTO `class` (`pid`, `name`, `cate`, `content`, `thumbnail`, `price`, `price_val`, `level`, `video`, `sale_end_date`, `date_val`, `reg_date`, `status`, `file_table_id`) VALUES
(67, 'ㄴ', NULL, '<p>ㄴ</p>', '/20230904192852958846.png', 0, 30000, 2, '', 0, 1, '2023-09-05 02:28:52', 0, '117,116'),
(68, '중급 무료 무제한', NULL, '<p>ㅈ</p>', '/20230904193116182870.png', 1, 0, 2, '', 1, 0, '2023-09-05 02:31:16', 1, '118,119'),
(69, '상급 유료 제한', NULL, '<p>ㄴ</p>', '/20230904193305168059.png', 0, 30000, 3, '', 0, 1, '2023-09-05 02:33:05', 1, '120,121'),
(72, 'a', NULL, '<p>e</p>', '/20230905073547300051.png', 1, 30000, 2, '', 1, 1, '2023-09-05 14:35:47', 1, '126,127'),
(73, 'a', NULL, '<p>s</p>', '/20230905073557122148.png', 1, 30000, 2, '', 1, 1, '2023-09-05 14:35:57', 0, ''),
(74, 'a', NULL, '<p>s</p>', '/20230905073607784076.png', 1, 30000, 3, '', 1, 1, '2023-09-05 14:36:07', 0, ''),
(75, 'e', NULL, '<p>e</p>', '/20230905073734151182.png', 1, 30000, 3, NULL, 1, 1, '2023-09-05 14:37:34', 0, '128,129'),
(76, '강좌명', NULL, '강좌소개', '/20230905073818138447.png', 1, 30000, 3, NULL, 1, 1, '2023-09-05 14:38:18', 0, '130,131');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`pid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
