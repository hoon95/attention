-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-03 15:18
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
  `price` double DEFAULT NULL COMMENT '강좌가격',
  `level` tinyint(4) DEFAULT NULL COMMENT '강좌난이도',
  `video` varchar(100) DEFAULT NULL COMMENT '강좌영상',
  `sale_end_date` tinyint(10) DEFAULT NULL COMMENT '수강기한',
  `reg_date` datetime DEFAULT NULL COMMENT '강좌등록일',
  `status` tinyint(4) DEFAULT 0 COMMENT '활성화 상태',
  `file_table_id` varchar(50) DEFAULT NULL COMMENT '추가이미지 아이디'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `class`
--

INSERT INTO `class` (`pid`, `name`, `cate`, `content`, `thumbnail`, `price`, `level`, `video`, `sale_end_date`, `reg_date`, `status`, `file_table_id`) VALUES
(22, 'cio', NULL, '<p><br></p>', '20230901184055189702.png', 30000, 1, 'https://www.naver.com/', 0, '2023-09-02 01:40:55', 0, NULL),
(23, 'name', NULL, '<p><br></p>', '20230901184940351558.png', 30000, 3, 'https://www.naver.com/', 1, '2023-09-02 01:49:40', 0, NULL),
(24, 'name', NULL, '<p><br></p>', '20230901185333169783.png', 30000, 3, 'https://www.naver.com/', 1, '2023-09-02 01:53:33', 0, NULL),
(26, 'cio', NULL, '\r\n\r\n\r\n', '20230902092207201987.png', 30000, 3, 'https://www.naver.com/', 1, '2023-09-02 16:23:53', 0, NULL),
(27, 'ab', NULL, '<p>a</p>', '20230903095424160277.png', 30000, 2, 'https://www.naver.com/', 1, '2023-09-03 16:54:24', 0, NULL),
(28, 'cio', NULL, '<p>w</p>', '20230903115003194865.png', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 18:50:03', 0, NULL),
(29, 'a', NULL, '<p>a</p>', '20230903123552103975.png', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 19:35:52', 0, NULL),
(30, 'A', NULL, '<p>A</p>', '20230903123740108243.png', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 19:37:40', 0, NULL),
(31, 'aaa', NULL, '<p>a</p>', '20230903130252563512.png', 30000, 1, 'https://www.naver.com/', 1, '2023-09-03 20:02:52', 0, ''),
(32, '한지희', NULL, '<p>aaa</p>', '20230903130438724551.png', 30000, 2, 'https://www.naver.com/', 1, '2023-09-03 20:04:38', 0, ''),
(33, 'cio', NULL, '<p>aa</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:25:27', 0, ''),
(34, 'cio', NULL, '<p>sa</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:26:19', 0, ''),
(35, 'cio', NULL, '<p>aa</p>', '', 30000, 2, 'https://www.naver.com/', 1, '2023-09-03 20:31:38', 0, ''),
(36, 'a', NULL, '<p>aaa</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:33:10', 0, 'undefined,undefined'),
(37, 'cio', NULL, '<p>a</p>', '', 30000, 2, 'https://www.naver.com/', 1, '2023-09-03 20:38:08', 0, 'undefined,undefined'),
(38, 'cio', NULL, '<p>a</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:38:40', 0, 'undefined,undefined'),
(39, 'cio', NULL, '<p>aa</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:39:11', 0, 'undefined,undefined'),
(40, 'cio', NULL, '<p>aa</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:40:20', 0, 'undefined,undefined'),
(41, 'a', NULL, '<p>aaa</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:42:11', 0, 'undefined,undefined'),
(42, 'a', NULL, '\r\naaa\r\n\r\n', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:42:55', 0, 'undefined,undefined'),
(43, 'aa', NULL, '<p>aa</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:45:14', 0, 'undefined,undefined'),
(44, 'ㅁ', NULL, '<p>ㅁ</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:51:45', 0, 'undefined,undefined'),
(45, 'ㅁ', NULL, '<p>ㅁㅁ</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:52:57', 0, 'undefined,undefined'),
(46, 'cio', NULL, '<p>ㅁ</p>', '', 30000, 3, 'https://www.naver.com/', 1, '2023-09-03 20:55:52', 0, 'undefined,undefined');

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
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
