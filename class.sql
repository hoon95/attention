-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-07 04:06
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
  `video` text NOT NULL COMMENT '강좌영상',
  `sale_end_date` tinyint(10) DEFAULT NULL COMMENT '수강기한',
  `date_val` double DEFAULT NULL,
  `regdate` datetime DEFAULT NULL COMMENT '강좌등록일',
  `status` tinyint(4) DEFAULT NULL COMMENT '활성화 상태',
  `file_table_id` varchar(50) DEFAULT NULL COMMENT '추가이미지 아이디'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `class`
--

INSERT INTO `class` (`pid`, `name`, `cate`, `content`, `thumbnail`, `price`, `price_val`, `level`, `video`, `sale_end_date`, `date_val`, `regdate`, `status`, `file_table_id`) VALUES
(141, '우디의 진짜 쓰는 일러스트레이터', '23/25/28', '<p>입문자를 위해 준비한</p><p>[그래픽 디자인, 디자인 툴] 강의입니다.</p>', '/attention/pdata/class/20230907032902148595.png', 1, 60000, 2, '', 0, 0, '2023-09-07 10:29:02', 0, '329,330,331'),
(143, '비트코인 백서의 이해', '29/30/31', '<p>입문자를 위해 준비한</p><p>[금융 · 재테크, 비트코인] 강의입니다.</p>', '/attention/pdata/class/20230907033221136584.jpeg', 1, 150000, 1, '', 0, 0, '2023-09-07 10:32:21', 0, '335,336,337'),
(144, '인프콘 2023 다시보기', '16/32/33', '<p>입문자를 위해 준비한</p><p>[개발 · 프로그래밍, 커리어] 강의입니다.</p>', '/attention/pdata/class/20230907033404181600.png', 0, 0, 1, '', 0, 0, '2023-09-07 10:34:04', 0, '338,339,340'),
(145, '[개정판] 웹 애플리케이션 개발을 위한 IntelliJ IDEA 설정', '16/32/33', '<p>증급자를 위해 준비한</p><p>[백엔드] 강의입니다.</p>', '/attention/pdata/class/20230907033525109571.png', 1, 200000, 2, '', 1, 6, '2023-09-07 10:35:25', 1, '341,342,343'),
(146, '[리뉴얼] 렛츠기릿 자바스크립트', '16//', '<p>초급자를 위해 준비한</p><p>[프로그래밍 언어] 강의입니다.</p>', '/attention/pdata/class/20230907033757187488.png', 1, 600000, 3, '', 0, 3, '2023-09-07 10:37:57', 1, '344,345,346'),
(147, '인프콘 2022 다시보기', '16/32/33', '<p>입문자를 위해 준비한</p><p>[개발 · 프로그래밍, 커리어] 강의입니다.</p>', '/attention/pdata/class/20230907033920168831.png', 1, 120000, 2, '', 0, 0, '2023-09-07 10:39:20', 1, '347,348,349'),
(148, 'Google이 인정하는 개발자 되기 [커뮤니티와 함께 성장하는 개발자]', '16/32/33', '<p>입문자를 위해 준비한</p><p>[개인 브랜딩, 개발 · 프로그래밍] 강의입니다.</p>', '/attention/pdata/class/20230907034148105186.png', 0, 0, 3, '', 1, 3, '2023-09-07 10:41:48', 1, '350,351,352'),
(149, '[백문이불여일타] 데이터 분석을 위한 SQL 실전편 (무료 미니 코스)', '16/34/35', '<p>중급자를 위해 준비한</p><p>[데이터 분석, 비즈니스 · 마케팅] 강의입니다.</p>', '/attention/pdata/class/20230907034429867615.png', 1, 150000, 2, '', 1, 6, '2023-09-07 10:44:29', 0, '353,354,355'),
(150, '핵심만 빠르게, 입문자를 위한 딥러닝(Deep Learnig)과 텐서플로(Tensorflow)', '36/37/38', '<p>상급자를 위해 준비한</p><p>[인공지능] 강의입니다.</p>', '/attention/pdata/class/20230907034648208359.png', 1, 150000, 3, '', 1, 6, '2023-09-07 10:46:48', 1, '356,357,358'),
(151, '제품부터 시작하는 인우의 반도체 CHIP 회로설계 이야기', '39/40/41', '<p>중급자를 위해 준비한</p><p>[반도체, 임베디드 · IoT] 강의입니다.</p>', '/attention/pdata/class/20230907034929305748.png', 1, 70000, 2, '', 1, 6, '2023-09-07 10:49:29', 1, '359,360,361');

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
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
