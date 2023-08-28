-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-08-27 16:51
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
  `price` double DEFAULT NULL COMMENT '강좌가격',
  `level` tinyint(4) DEFAULT NULL COMMENT '강좌난이도',
  `video` varchar(100) DEFAULT NULL COMMENT '강좌영상',
  `sale_end_date` datetime DEFAULT NULL COMMENT '수강기한',
  `reg_date` datetime DEFAULT NULL COMMENT '강좌등록일',
  `status` tinyint(4) DEFAULT 0 COMMENT '활성화 상태',
  `file_table_id` varchar(50) DEFAULT NULL COMMENT '추가이미지 아이디'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 테이블의 AUTO_INCREMENT `class_image_table`
--
ALTER TABLE `class_image_table`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
