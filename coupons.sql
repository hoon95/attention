-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-07 03:38
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
  `status` text DEFAULT '0' COMMENT '활성화 상태',
  `regdate` varchar(24) DEFAULT NULL COMMENT '쿠폰기한'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `coupons`
--

INSERT INTO `coupons` (`cid`, `coupon_name`, `coupon_image`, `coupon_price`, `status`, `regdate`) VALUES
(16, '비전공자의 전공자 따라잡기 - 자료PDF', '/attention/pdata/coupon/20230905075807102463.png', 30000, '비활성화', '1'),
(18, '[신규가입] 웰컴팩 패키지 할인', '/attention/pdata/coupon/20230904090714142128.png', 7000, '활성화', '무제한'),
(19, '부트캠프에서 만든 고농축 백엔드 코스', '/attention/pdata/coupon/20230904090840131470.png', 10000, '활성화', '3'),
(33, '데이터베이스 교재 할인', '/attention/pdata/coupon/20230905045050102631.jpg', 8000, '비활성화', '3'),
(36, '비전공자의 전공자 따라잡기 - 자료PDF', '/attention/pdata/coupon/20230905075807102463.png', 30000, '비활성화', '1'),
(37, '기초부터 꼼꼼, Javascript 강의', '/attention/pdata/coupon/20230904090506484676.png', 20000, '비활성화', '4'),
(38, '[신규가입] 웰컴팩 패키지 할인', '/attention/pdata/coupon/20230904090714142128.png', 7000, '활성화', '무제한'),
(39, '부트캠프에서 만든 고농축 백엔드 코스', '/attention/pdata/coupon/20230904090840131470.png', 10000, '활성화', '3'),
(40, '데이터베이스 교재 할인', '/attention/pdata/coupon/20230905045050102631.jpg', 8000, '비활성화', '3'),
(42, '대학생이면 추가 5만원 할인', '/attention/pdata/coupon/20230906025138190647.jpg', 50000, '활성화', '3'),
(43, '비전공자의 전공자 따라잡기 - 자료PDF', '/attention/pdata/coupon/20230905075807102463.png', 30000, '비활성화', '1'),
(44, '기초부터 꼼꼼, Javascript 강의', '/attention/pdata/coupon/20230904090506484676.png', 20000, '비활성화', '4'),
(45, '[신규가입] 웰컴팩 패키지 할인', '/attention/pdata/coupon/20230904090714142128.png', 7000, '활성화', '무제한'),
(46, '부트캠프에서 만든 고농축 백엔드 코스', '/attention/pdata/coupon/20230904090840131470.png', 10000, '활성화', '3'),
(47, '데이터베이스 교재 할인', '/attention/pdata/coupon/20230905045050102631.jpg', 8000, '비활성화', '3'),
(49, '대학생이면 추가 5만원 할인', '/attention/pdata/coupon/20230906025138190647.jpg', 50000, '활성화', '3'),
(50, '비전공자의 전공자 따라잡기 - 자료PDF', '/attention/pdata/coupon/20230905075807102463.png', 30000, '비활성화', '1'),
(51, '기초부터 꼼꼼, Javascript 강의', '/attention/pdata/coupon/20230904090506484676.png', 20000, '비활성화', '4'),
(52, '[신규가입] 웰컴팩 패키지 할인', '/attention/pdata/coupon/20230904090714142128.png', 7000, '활성화', ''),
(53, '부트캠프에서 만든 고농축 백엔드 코스123', '/attention/pdata/coupon/20230906095323212291.png', 10000, '활성화', '3'),
(54, '데이터베이스 교재 할인', '/attention/pdata/coupon/20230907030604113149.png', 8000, '비활성화', '3'),
(55, '크리스마스 이브 특별 행사!ㅇㅇ124', '/attention/pdata/coupon/20230906095305128620.png', 6000, '비활성화', '3'),
(59, '할인', '/attention/pdata/coupon/20230906095243317002.png', 7000, '비활성화', '3'),
(60, '할인', '/attention/pdata/coupon/20230906095232172331.jpg', 7000, '비활성화', '2');

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
