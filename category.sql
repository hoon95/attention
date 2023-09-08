-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-07 04:05
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
(13, NULL, '12', '엘지그램', 3),
(14, NULL, '10', '프론트엔드', 2),
(15, NULL, '10', '백엔드', 2),
(16, NULL, NULL, '프로그래밍', 1),
(17, NULL, '16', 'Front-end', 2),
(18, NULL, '16', 'Back-end', 2),
(19, NULL, '17', 'Html', 3),
(20, NULL, '17', 'Css', 3),
(21, NULL, '17', 'Jquery', 3),
(22, NULL, '17', 'Java script', 3),
(23, NULL, NULL, '디자인', 1),
(25, NULL, '23', '웹 디자인', 2),
(26, NULL, '25', '포토샵', 3),
(27, NULL, '25', 'Figma', 3),
(28, NULL, '25', '일러스트', 3),
(29, NULL, NULL, '보안 · 네트워크', 1),
(30, NULL, '29', '블록체인', 2),
(31, NULL, '30', '블록체인', 3),
(32, NULL, '16', '기타', 2),
(33, NULL, '32', '기타', 3),
(34, NULL, '16', '데이터 분석', 2),
(35, NULL, '34', '데이터 분석', 3),
(36, NULL, NULL, '인공 지능', 1),
(37, NULL, '36', '데이터 사이언스', 2),
(38, NULL, '37', '인공 지능', 3),
(39, NULL, NULL, '하드웨어', 1),
(40, NULL, '39', '반도체', 2),
(41, NULL, '40', '반도체 시스템', 3);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
