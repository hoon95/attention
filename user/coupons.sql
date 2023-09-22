-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-22 13:31
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
-- 테이블 구조 `coupons`
--

CREATE TABLE `coupons` (
  `cid` int(11) NOT NULL,
  `coupon_name` varchar(100) DEFAULT NULL COMMENT '쿠폰명',
  `coupon_image` varchar(100) DEFAULT NULL COMMENT '쿠폰이미지',
  `coupon_price` double DEFAULT NULL COMMENT '할인금액',
  `status` tinyint(4) DEFAULT NULL COMMENT '활성화 상태',
  `due` tinyint(4) DEFAULT NULL COMMENT '쿠폰기한'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `coupons`
--

INSERT INTO `coupons` (`cid`, `coupon_name`, `coupon_image`, `coupon_price`, `status`, `due`) VALUES
(1, '회원가입 축하쿠폰', '/attention/pdata/coupon/20230922083116693926.png', 10000, 1, 0),
(2, '[룰렛 이벤트] 10000원 쿠폰', '/attention/pdata/coupon/20230922132528173396.png', 10000, 1, 3),
(3, '[룰렛 이벤트] 5000원 쿠폰', '/attention/pdata/coupon/20230922132241141586.png', 5000, 1, 3),
(4, '[룰렛 이벤트] 15000원 쿠폰', '/attention/pdata/coupon/20230922132340181207.png', 15000, 1, 3),
(5, '[룰렛 이벤트] 12000원 쿠폰', '/attention/pdata/coupon/20230922132252201227.png', 12000, 1, 1),
(6, '[룰렛 이벤트] 15000원 쿠폰', '/attention/pdata/coupon/20230922132406172101.png', 15000, 1, 3),
(7, '[룰렛 이벤트] 20000원 쿠폰', '/attention/pdata/coupon/20230922132303566923.png', 20000, 1, 3),
(8, '[룰렛 이벤트] 5000원 쿠폰', '/attention/pdata/coupon/20230922132331158294.png', 5000, 1, 3),
(9, '[룰렛 이벤트] 10000원 쿠폰', '/attention/pdata/coupon/20230922132321180564.png', 10000, 1, 3);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`cid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
