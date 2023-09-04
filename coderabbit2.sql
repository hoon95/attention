-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-05 00:36
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
-- 테이블 구조 `admins`
--

CREATE TABLE `admins` (
  `idx` int(11) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `regdate` datetime NOT NULL,
  `level` int(4) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `end_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `admins`
--

INSERT INTO `admins` (`idx`, `userid`, `email`, `username`, `passwd`, `regdate`, `level`, `last_login`, `end_login`) VALUES
(1, 'admin', 'admin@shop.com', '관리자', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2023-01-01 17:12:32', 100, '2023-08-25 12:01:06', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `pcode` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `step` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `category`
--

INSERT INTO `category` (`cid`, `code`, `pcode`, `name`, `step`) VALUES
(1, 'A0001', NULL, '컴퓨터', 1),
(2, 'B0001', 'A0001', '노트북', 2),
(3, 'C0001', 'B0001', '게임용', 3),
(4, 'A0002', '', '핸드폰', 1),
(5, 'A0003', '', '태블릿', 1),
(6, 'A0004', '', '스마트기기', 1),
(7, 'B0002', 'A0001', '맥북', 2),
(8, 'C0002', 'B0001', '그램', 3);

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
(26, 'cio', NULL, '\r\n\r\n\r\n', '20230902092207201987.png', 127, NULL, 3, 'https://www.naver.com/', 1, NULL, '2023-09-02 16:23:53', 0, NULL),
(27, 'ab', NULL, '<p>a</p>', '20230903095424160277.png', 127, NULL, 2, 'https://www.naver.com/', 1, NULL, '2023-09-03 16:54:24', 0, NULL),
(28, 'cio', NULL, '<p>w</p>', '20230903115003194865.png', 127, NULL, 3, 'https://www.naver.com/', 1, NULL, '2023-09-03 18:50:03', 0, NULL),
(29, 'a', NULL, '<p>a</p>', '20230903123552103975.png', 127, NULL, 3, 'https://www.naver.com/', 1, NULL, '2023-09-03 19:35:52', 0, NULL),
(30, 'A', NULL, '<p>A</p>', '20230903123740108243.png', 127, NULL, 3, 'https://www.naver.com/', 1, NULL, '2023-09-03 19:37:40', 0, NULL),
(31, 'aaa', NULL, '<p>a</p>', '20230903130252563512.png', 127, NULL, 1, 'https://www.naver.com/', 1, NULL, '2023-09-03 20:02:52', 0, ''),
(33, 'cio', NULL, '<p>aa</p>', '', 127, NULL, 3, 'https://www.naver.com/', 1, NULL, '2023-09-03 20:25:27', 0, ''),
(48, 'a', NULL, '<p>ㅁ</p>', '', 127, NULL, 3, 'https://www.naver.com/', 1, NULL, NULL, 0, 'undefined,undefined'),
(50, 'a', NULL, '<p>ㅁ</p>', '', 127, NULL, 2, 'https://www.naver.com/', 1, NULL, NULL, 0, '46,47'),
(52, 'ㄴ', NULL, '<p>ㅁ</p>', '', 127, NULL, 2, 'https://www.naver.com/', 1, NULL, NULL, 0, ''),
(60, 'ㅁ', NULL, '<p>ㅁ</p>', '', 127, NULL, 3, 'https://www.youtube.com/1', 1, NULL, '2023-09-04 04:37:45', 0, '72,73'),
(66, 'ㄴ', NULL, '<p>ㄴ</p>', '/attention/pdata/20230904192113119447.png', 0, 30000, 2, '', 0, 1, '2023-09-05 02:21:13', 1, '114,115'),
(67, 'ㄴ', NULL, '<p>ㄴ</p>', '/20230904192852958846.png', 0, 30000, 2, '', 0, 1, '2023-09-05 02:28:52', 0, '117,116'),
(68, '중급 무료 무제한', NULL, '<p>ㅈ</p>', '/20230904193116182870.png', 1, 0, 2, '', 1, 0, '2023-09-05 02:31:16', 1, '118,119'),
(69, '상급 유료 제한', NULL, '<p>ㄴ</p>', '/20230904193305168059.png', 0, 30000, 3, '', 0, 1, '2023-09-05 02:33:05', 1, '120,121');

-- --------------------------------------------------------

--
-- 테이블 구조 `class_clips`
--

CREATE TABLE `class_clips` (
  `ccid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `class_clips`
--

INSERT INTO `class_clips` (`ccid`, `pid`, `userid`, `video_url`, `regdate`, `status`) VALUES
(1, 0, 'admin', 'Array', '2023-09-04 03:59:09', 1),
(2, 0, 'admin', 'Array', '2023-09-04 03:59:09', 1),
(3, 0, 'admin', 'Array', '2023-09-04 03:59:09', 1),
(4, 0, 'admin', 'Array', '2023-09-04 03:59:09', 1),
(5, 0, 'admin', 'Array', '2023-09-04 03:59:09', 1),
(6, 0, 'admin', 'Array', '2023-09-04 03:59:37', 1),
(7, 0, 'admin', 'Array', '2023-09-04 03:59:37', 1),
(8, 0, 'admin', 'Array', '2023-09-04 04:11:37', 1),
(9, 0, 'admin', 'Array', '2023-09-04 04:11:37', 1),
(10, 0, 'admin', 'Array', '2023-09-04 04:11:37', 1),
(11, 0, 'admin', 'Array', '2023-09-04 04:11:37', 1),
(12, 0, 'admin', 'Array', '2023-09-04 04:11:37', 1),
(13, 0, 'admin', 'Array', '2023-09-04 04:11:37', 1),
(14, 0, 'admin', 'Array', '2023-09-04 04:14:01', 1),
(15, 0, 'admin', 'Array', '2023-09-04 04:14:01', 1),
(16, 0, 'admin', 'Array', '2023-09-04 04:14:01', 1),
(17, 0, 'admin', 'Array', '2023-09-04 04:18:56', 1),
(18, 0, 'admin', 'Array', '2023-09-04 04:18:56', 1),
(19, 0, 'admin', 'Array', '2023-09-04 04:18:56', 1),
(20, 0, 'admin', 'Array', '2023-09-04 04:18:56', 1),
(21, 0, 'admin', 'Array', '2023-09-04 04:18:56', 1),
(22, 0, 'admin', 'Array', '2023-09-04 04:21:51', 1),
(23, 0, 'admin', 'Array', '2023-09-04 04:21:52', 1),
(24, 0, 'admin', 'Array', '2023-09-04 04:21:52', 1),
(25, 0, 'admin', 'Array', '2023-09-04 04:21:52', 1),
(26, 0, 'admin', 'Array', '2023-09-04 04:21:52', 1),
(27, 0, 'admin', 'Array', '2023-09-04 04:25:04', 1),
(28, 0, 'admin', 'Array', '2023-09-04 04:25:04', 1),
(29, 0, 'admin', 'Array', '2023-09-04 04:27:22', 1),
(30, 0, 'admin', 'Array', '2023-09-04 04:27:22', 1),
(31, 0, 'admin', 'Array', '2023-09-04 04:27:22', 1),
(32, 0, 'admin', 'Array', '2023-09-04 04:31:04', 1),
(33, 0, 'admin', 'Array', '2023-09-04 04:31:04', 1),
(34, 0, 'admin', 'Array', '2023-09-04 04:31:04', 1),
(35, 0, 'admin', 'Array', '2023-09-04 04:31:04', 1),
(36, 0, 'admin', 'Array', '2023-09-04 04:31:04', 1),
(37, 0, 'admin', 'Array', '2023-09-04 04:32:02', 1),
(38, 0, 'admin', 'Array', '2023-09-04 04:32:02', 1),
(39, 0, 'admin', 'Array', '2023-09-04 04:32:02', 1),
(40, 0, 'admin', 'Array', '2023-09-04 04:34:25', 1),
(41, 0, 'admin', 'Array', '2023-09-04 04:34:25', 1),
(42, 0, 'admin', 'Array', '2023-09-04 04:37:45', 1),
(43, 0, 'admin', 'Array', '2023-09-04 04:48:18', 1),
(44, 0, 'admin', 'Array', '2023-09-04 04:48:18', 1),
(45, 0, 'admin', 'Array', '2023-09-04 04:48:18', 1),
(46, 0, 'admin', 'Array', '2023-09-04 04:49:59', 1),
(47, 0, 'admin', 'Array', '2023-09-04 04:49:59', 1),
(48, 0, 'admin', 'Array', '2023-09-04 04:49:59', 1),
(49, 0, 'admin', 'Array', '2023-09-04 04:50:55', 1),
(50, 0, 'admin', 'Array', '2023-09-04 04:50:55', 1),
(51, 0, 'admin', 'Array', '2023-09-04 04:52:08', 1),
(52, 0, 'admin', 'Array', '2023-09-04 05:11:28', 1),
(53, 0, 'admin', 'Array', '2023-09-04 05:11:28', 1),
(54, 0, 'admin', 'Array', '2023-09-04 05:12:38', 1),
(55, 0, 'admin', 'Array', '2023-09-04 05:12:38', 1),
(56, 0, 'admin', 'Array', '2023-09-04 05:14:12', 1),
(57, 0, 'admin', 'Array', '2023-09-04 05:14:12', 1),
(58, 0, 'admin', 'Array', '2023-09-04 05:14:45', 1),
(59, 0, 'admin', 'Array', '2023-09-04 05:26:49', 1),
(60, 0, 'admin', 'Array', '2023-09-04 05:26:49', 1),
(61, 0, 'admin', 'Array', '2023-09-04 05:27:18', 1),
(62, 0, 'admin', 'Array', '2023-09-04 21:15:49', 1),
(63, 0, 'admin', 'Array', '2023-09-04 21:30:36', 1),
(64, 0, 'admin', 'Array', '2023-09-04 21:30:36', 1),
(65, 0, 'admin', 'Array', '2023-09-04 21:31:06', 1),
(66, 0, 'admin', 'Array', '2023-09-04 21:31:34', 1),
(67, 0, 'admin', 'Array', '2023-09-04 21:35:16', 1);

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
(46, 50, 'admin', '20230903195147163493.png', '2023-09-04 02:51:47', 1),
(47, 50, 'admin', '20230903195147766187.png', '2023-09-04 02:51:47', 1),
(48, 51, 'admin', '20230903195826178981.png', '2023-09-04 02:58:26', 1),
(49, 51, 'admin', '20230903195826130558.png', '2023-09-04 02:58:26', 1),
(50, NULL, '', '20230903200017502418.png', '2023-09-04 03:00:17', 1),
(51, NULL, '', '20230903200018198433.png', '2023-09-04 03:00:18', 1),
(52, 54, 'admin', '20230903205936126321.png', '2023-09-04 03:59:36', 1),
(53, 54, 'admin', '20230903205936343756.png', '2023-09-04 03:59:36', 1),
(54, 55, 'admin', '20230903211042209141.png', '2023-09-04 04:10:42', 1),
(55, 55, 'admin', '20230903211042475997.png', '2023-09-04 04:10:42', 1),
(56, 56, 'admin', '20230903211400193516.png', '2023-09-04 04:14:00', 1),
(57, 56, 'admin', '20230903211400103110.png', '2023-09-04 04:14:00', 1),
(58, 57, 'admin', '20230903211820204707.png', '2023-09-04 04:18:20', 1),
(59, 57, 'admin', '20230903211820838219.png', '2023-09-04 04:18:20', 1),
(60, NULL, 'admin', '20230903212146868332.png', '2023-09-04 04:21:46', 1),
(61, NULL, 'admin', '20230903212146803755.png', '2023-09-04 04:21:46', 1),
(62, NULL, 'admin', '20230903212503202715.png', '2023-09-04 04:25:03', 1),
(63, NULL, 'admin', '20230903212503162699.png', '2023-09-04 04:25:03', 1),
(64, 58, 'admin', '20230903212708163687.png', '2023-09-04 04:27:08', 1),
(65, 58, 'admin', '20230903212708221894.png', '2023-09-04 04:27:08', 1),
(66, NULL, 'admin', '20230903213104214481.png', '2023-09-04 04:31:04', 1),
(67, NULL, 'admin', '20230903213104182143.png', '2023-09-04 04:31:04', 1),
(68, NULL, 'admin', '20230903213139199552.png', '2023-09-04 04:31:39', 1),
(69, NULL, 'admin', '20230903213139141354.png', '2023-09-04 04:31:39', 1),
(70, 59, 'admin', '20230903213424153384.png', '2023-09-04 04:34:24', 1),
(71, 59, 'admin', '20230903213424184869.png', '2023-09-04 04:34:24', 1),
(72, 60, 'admin', '20230903213739194940.png', '2023-09-04 04:37:39', 1),
(73, 60, 'admin', '20230903213739676900.png', '2023-09-04 04:37:39', 1),
(74, NULL, 'admin', '20230903214817897678.png', '2023-09-04 04:48:17', 1),
(75, NULL, 'admin', '20230903214817104078.png', '2023-09-04 04:48:17', 1),
(76, NULL, 'admin', '20230903214955394795.png', '2023-09-04 04:49:55', 1),
(77, NULL, 'admin', '20230903214955455250.png', '2023-09-04 04:49:55', 1),
(78, NULL, 'admin', '20230903215054129926.png', '2023-09-04 04:50:54', 1),
(79, NULL, 'admin', '20230903215054186629.png', '2023-09-04 04:50:54', 1),
(80, 61, 'admin', '20230903215207148025.png', '2023-09-04 04:52:07', 1),
(81, 61, 'admin', '20230903215207151670.png', '2023-09-04 04:52:07', 1),
(82, NULL, 'admin', '20230903221126573344.png', '2023-09-04 05:11:26', 1),
(83, NULL, 'admin', '20230903221127926408.png', '2023-09-04 05:11:27', 1),
(84, NULL, 'admin', '20230903221236983978.png', '2023-09-04 05:12:36', 1),
(85, NULL, 'admin', '20230903221237175866.png', '2023-09-04 05:12:37', 1),
(86, NULL, 'admin', '20230903221411149704.png', '2023-09-04 05:14:11', 1),
(87, NULL, 'admin', '20230903221411148400.png', '2023-09-04 05:14:11', 1),
(88, 62, 'admin', '20230903221444174574.png', '2023-09-04 05:14:44', 1),
(89, NULL, 'admin', '20230903222335918724.png', '2023-09-04 05:23:35', 1),
(90, 63, 'admin', '20230903222400108555.png', '2023-09-04 05:24:00', 1),
(91, 63, 'admin', '20230903222400153163.png', '2023-09-04 05:24:00', 1),
(92, NULL, 'admin', '20230903222648612014.png', '2023-09-04 05:26:48', 1),
(93, NULL, 'admin', '20230903222648180378.png', '2023-09-04 05:26:48', 1),
(94, 64, 'admin', '20230903222717214267.png', '2023-09-04 05:27:17', 1),
(95, 64, 'admin', '20230903222717583147.png', '2023-09-04 05:27:17', 1),
(96, NULL, 'admin', '20230904043641205334.png', '2023-09-04 11:36:41', 1),
(97, NULL, 'admin', '20230904043641124506.png', '2023-09-04 11:36:41', 1),
(98, NULL, 'admin', '20230904141547121050.png', '2023-09-04 21:15:47', 1),
(99, NULL, 'admin', '20230904141547187134.png', '2023-09-04 21:15:47', 1),
(100, NULL, 'admin', '20230904142047687821.png', '2023-09-04 21:20:47', 1),
(101, NULL, 'admin', '20230904142047811772.png', '2023-09-04 21:20:47', 1),
(102, NULL, 'admin', '20230904142113175315.png', '2023-09-04 21:21:13', 1),
(103, NULL, 'admin', '20230904142113208743.png', '2023-09-04 21:21:13', 1),
(104, NULL, 'admin', '20230904143031170492.png', '2023-09-04 21:30:31', 1),
(105, NULL, 'admin', '20230904143031210625.png', '2023-09-04 21:30:31', 1),
(106, NULL, 'admin', '20230904143104207896.png', '2023-09-04 21:31:04', 1),
(107, NULL, 'admin', '20230904143104128268.png', '2023-09-04 21:31:04', 1),
(108, NULL, 'admin', '20230904143128131676.png', '2023-09-04 21:31:28', 1),
(109, NULL, 'admin', '20230904143128179524.png', '2023-09-04 21:31:28', 1),
(110, 65, 'admin', '20230904143515164464.png', '2023-09-04 21:35:15', 1),
(111, 65, 'admin', '20230904143515157312.png', '2023-09-04 21:35:15', 1),
(112, NULL, 'admin', '20230904152831192179.png', '2023-09-04 22:28:31', 1),
(113, NULL, 'admin', '20230904152831158618.png', '2023-09-04 22:28:31', 1),
(114, 66, 'admin', '20230904192111173925.png', '2023-09-05 02:21:11', 1),
(115, 66, 'admin', '20230904192111183468.png', '2023-09-05 02:21:11', 1),
(116, 67, 'admin', '20230904192851895609.png', '2023-09-05 02:28:51', 1),
(117, 67, 'admin', '20230904192851576542.png', '2023-09-05 02:28:51', 1),
(118, 68, 'admin', '20230904193052855272.png', '2023-09-05 02:30:52', 1),
(119, 68, 'admin', '20230904193052486807.png', '2023-09-05 02:30:52', 1),
(120, 69, 'admin', '20230904193303197506.png', '2023-09-05 02:33:03', 1),
(121, 69, 'admin', '20230904193303195732.png', '2023-09-05 02:33:03', 1),
(122, 70, 'admin', '20230904194256109650.png', '2023-09-05 02:42:56', 1),
(123, 70, 'admin', '20230904194256151563.png', '2023-09-05 02:42:56', 1),
(124, 71, 'admin', '20230904194501158428.png', '2023-09-05 02:45:01', 1),
(125, 71, 'admin', '20230904194501166168.png', '2023-09-05 02:45:01', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `coupons`
--

CREATE TABLE `coupons` (
  `cid` int(11) NOT NULL,
  `coupon_name` varchar(100) DEFAULT NULL COMMENT '쿠폰명',
  `coupon_image` varchar(100) DEFAULT NULL COMMENT '쿠폰이미지',
  `coupon_type` varchar(10) DEFAULT NULL COMMENT '쿠폰타입',
  `coupon_price` double DEFAULT NULL COMMENT '할인금액',
  `status` tinyint(4) DEFAULT 0 COMMENT '활성화 상태',
  `regdate` datetime DEFAULT NULL COMMENT '쿠폰기한'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `coupons`
--

INSERT INTO `coupons` (`cid`, `coupon_name`, `coupon_image`, `coupon_type`, `coupon_price`, `status`, `regdate`) VALUES
(1, '회원가입 축하쿠폰', '/abcmall/pdata/coupon/20230824024400213435.jpg', '0', 10000, 1, '2023-08-24 00:00:00'),
(3, '쿠폰테스트', '/abcmall/pdata/coupon/20230824025640848282.jpg', '0', 10000, 1, '2023-08-24 00:00:00'),
(4, '쿠폰테스트', '/abcmall/pdata/coupon/20230824030816988546.jpg', '0', 20000, 1, '2023-08-24 00:00:00'),
(5, '쿠폰테스트', '/abcmall/pdata/coupon/20230824030921181117.jpg', '0', 10000, 1, '2023-08-24 00:00:00'),
(6, '쿠폰테스트', '/abcmall/pdata/coupon/20230824031449843495.jpg', '0', 50000, 1, '2023-08-24 00:00:00'),
(7, '쿠폰테스트2', '/abcmall/pdata/coupon/20230824031521673533.jpg', '0', 0, 1, '2023-08-24 00:00:00'),
(8, '쿠폰테스트3', '/abcmall/pdata/coupon/20230824031728600373.jpg', '0', 20000, 1, '2023-08-24 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL COMMENT '회원명',
  `userid` varchar(50) NOT NULL COMMENT '회원 아이디',
  `userpw` varchar(200) NOT NULL COMMENT '회원 비밀번호',
  `useremail` varchar(200) NOT NULL COMMENT '회원 이메일',
  `regdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '가입 날짜'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`mid`, `username`, `userid`, `userpw`, `useremail`, `regdate`) VALUES
(1, '아무개', 'alikerock', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'test@test.com', '0000-00-00 00:00:00'),
(2, '홍길동', 'hong', 'f76d554626e5eb4beae9feb8ec14737644a4c8db915e66381541fe97df82e6cbc37c5e98fa8356bd1fe5be4a2d6650b4728a066999882ce90d723844e91e4242', 'hong@test.com', '2023-08-24 11:54:01'),
(3, '이도령', 'dodo', 'ac94f165c526746256350c02e01a87e0b46f787494148382383b6b491b9e41587acc83a48aeb4f5e8ff627f14466f90b61acdadc2594c60b447494f306a853b3', 'dodo@test.com', '2023-08-24 12:35:58');

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `idx` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '작성자',
  `title` varchar(100) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `date` date NOT NULL COMMENT '작성날짜',
  `file` varchar(100) DEFAULT NULL COMMENT '첨부파일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `sales`
--

CREATE TABLE `sales` (
  `sid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '강좌명',
  `userid` varchar(100) NOT NULL COMMENT '사용자명',
  `price` int(11) NOT NULL COMMENT '금액'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- 테이블의 인덱스 `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`pid`);

--
-- 테이블의 인덱스 `class_clips`
--
ALTER TABLE `class_clips`
  ADD PRIMARY KEY (`ccid`);

--
-- 테이블의 인덱스 `class_image_table`
--
ALTER TABLE `class_image_table`
  ADD PRIMARY KEY (`imgid`);

--
-- 테이블의 인덱스 `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`cid`);

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- 테이블의 인덱스 `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- 테이블의 AUTO_INCREMENT `class_clips`
--
ALTER TABLE `class_clips`
  MODIFY `ccid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- 테이블의 AUTO_INCREMENT `class_image_table`
--
ALTER TABLE `class_image_table`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `sales`
--
ALTER TABLE `sales`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
