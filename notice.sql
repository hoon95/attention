-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-01 07:11
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
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `idx` int(11) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `date` date NOT NULL COMMENT '작성날짜',
  `file` varchar(100) DEFAULT NULL COMMENT '첨부파일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`idx`, `title`, `content`, `date`, `file`) VALUES
(1, '테스트', '첫번째글', '2023-08-31', NULL),
(2, '테스트', '<p>되라되라도리ㅏ</p>', '2023-08-31', '이현정 - 레퍼런스 조사 - 코알라.pdf'),
(3, '테스트', '<p>되라되라도리ㅏ</p>', '2023-08-31', '이현정 - 레퍼런스 조사 - 코알라.pdf'),
(4, '테스트', '<p>되라되라도리ㅏ</p>', '2023-08-31', '이현정 - 레퍼런스 조사 - 코알라.pdf'),
(5, '두번째', '오류 왜 남', '2023-08-31', '문방구.png'),
(6, '6번째', '테스트', '2023-08-31', ''),
(7, '치즈고양이', '고앵쓰', '2023-08-31', ''),
(8, '코숏', '<p>고앵고앵</p>', '2023-08-31', ''),
(9, '러시안블루', '<p>고앵고앵고앵</p>', '2023-08-31', ''),
(10, '고등어태비', '<p>고애애애ㅐㅇ앵</p>', '2023-08-31', ''),
(11, '에스파', '<p>도깨비불</p>', '2023-08-31', '문방구.png'),
(12, '고먐미', '<p>치즈</p>', '2023-08-31', ''),
(13, '고먐미', '<p>고등어</p>', '2023-08-31', ''),
(14, '고먐미', '작성', '2023-08-31', ''),
(15, '고먐미', '<p>귀찮</p>', '2023-08-31', ''),
(16, 'Dr', 'Goldenrod', '0000-00-00', NULL),
(17, 'Mr', 'Fuscia', '0000-00-00', NULL),
(18, 'Mr', 'Indigo', '0000-00-00', NULL),
(19, 'Honorable', 'Green', '0000-00-00', NULL),
(20, 'Honorable', 'Pink', '0000-00-00', NULL),
(21, 'Honorable', 'Fuscia', '0000-00-00', NULL),
(22, 'Mr', 'Orange', '0000-00-00', NULL),
(23, 'Mrs', 'Red', '0000-00-00', NULL),
(24, 'Rev', 'Purple', '0000-00-00', NULL),
(25, 'Mrs', 'Pink', '0000-00-00', NULL),
(26, 'Rev', 'Violet', '0000-00-00', NULL),
(27, 'Honorable', 'Mauv', '0000-00-00', NULL),
(28, 'Mr', 'Khaki', '0000-00-00', NULL),
(29, 'Rev', 'Mauv', '0000-00-00', NULL),
(30, 'Ms', 'Yellow', '0000-00-00', NULL),
(31, 'Honorable', 'Blue', '0000-00-00', NULL),
(32, 'Rev', 'Puce', '0000-00-00', NULL),
(33, 'Rev', 'Mauv', '0000-00-00', NULL),
(34, 'Ms', 'Puce', '0000-00-00', NULL),
(35, 'Honorable', 'Goldenrod', '0000-00-00', NULL),
(36, 'Rev', 'Green', '0000-00-00', NULL),
(37, 'Mr', 'Orange', '0000-00-00', NULL),
(38, 'Rev', 'Indigo', '0000-00-00', NULL),
(39, 'Mrs', 'Khaki', '0000-00-00', NULL),
(40, 'Ms', 'Goldenrod', '0000-00-00', NULL),
(41, 'Dr', 'Fuscia', '0000-00-00', NULL),
(42, 'Honorable', 'Goldenrod', '0000-00-00', NULL),
(43, 'Ms', 'Red', '0000-00-00', NULL),
(44, 'Rev', 'Red', '0000-00-00', NULL),
(45, 'Ms', 'Mauv', '0000-00-00', NULL),
(46, 'Mrs', 'Pink', '0000-00-00', NULL),
(47, 'Mr', 'Fuscia', '0000-00-00', NULL),
(48, 'Mrs', 'Turquoise', '0000-00-00', NULL),
(49, 'Ms', 'Fuscia', '0000-00-00', NULL),
(50, 'Ms', 'Aquamarine', '0000-00-00', NULL),
(51, 'Mrs', 'Blue', '0000-00-00', NULL),
(52, 'Rev', 'Violet', '0000-00-00', NULL),
(53, 'Rev', 'Violet', '0000-00-00', NULL),
(55, 'Rev', 'Crimson', '0000-00-00', NULL),
(56, 'Honorable', 'Blue', '0000-00-00', NULL),
(57, 'Mr', 'Pink', '0000-00-00', NULL),
(58, 'Ms', 'Red', '0000-00-00', NULL),
(59, 'Rev', 'Khaki', '0000-00-00', NULL),
(60, 'Dr', 'Violet', '0000-00-00', NULL),
(61, 'Rev', 'Fuscia', '0000-00-00', NULL),
(62, 'Honorable', 'Fuscia', '0000-00-00', NULL),
(63, 'Honorable', 'Indigo', '0000-00-00', NULL),
(64, 'Honorable', 'Purple', '0000-00-00', NULL),
(66, 'Rev', 'Turquoise', '0000-00-00', NULL),
(67, 'Mrs', 'Green', '0000-00-00', NULL),
(68, 'Ms', 'Fuscia', '0000-00-00', NULL),
(69, 'Mrs', 'Goldenrod', '0000-00-00', NULL),
(70, 'Dr', 'Yellow', '0000-00-00', NULL),
(76, '고먐미', '<p>ㅇㅎㅇㄴㅁㅍ</p>', '2023-08-31', 'heart-regular.svg'),
(77, '안녕하세요. 이 글은 공지사항입니다. ', '<p>나는 심장이 없어~~</p>', '2023-08-31', ''),
(78, '텔레비전에 내가 나왔으면 정말 좋겠네에 정말 좋겠네 춤추고 노래하는 예쁜 내 얼굴', '<p>ㅇㄹㄶㅇㄶㅁㄹ</p>', '2023-08-31', ''),
(79, '결국 어떤 작업을 하기 위해서는 클래스가 있어야 하며, 이에 대한 객체가 있어야 하며, 해당 객체가 가지고 있는 메쏘드를 호출하여야 합니다.', '<p>클래스가 있어야 한대유</p>', '2023-08-31', ''),
(80, '첨부파일 OOO', '<p>dfsfd</p>', '2023-08-31', 'New Piskel.png'),
(81, '첨부파일 OOO', '<p>gfwhsgbsGSFc</p>', '2023-08-31', 'a_bc50509641ed4a3d943c23177fb88a82.png'),
(82, '첨부파일 OOO', '<p>htgtzbrsrfws</p>', '2023-08-31', 'url-yApMx8xY7ag0Ov25.png'),
(83, '첨부파일 OOO', '<p>hteghgftstzd</p>', '2023-08-31', 'Lovepik_com-400271091-travel-shoes-casual-shoes-scene-map.png'),
(84, '첨부파일 OOO', '<p>yjthdzrfhw</p>', '2023-08-31', '16T90R_00_sum.png'),
(85, '첨부파일 XXX', '<p>ㄹㅇㅎㅈㄱㅇ</p>', '2023-09-01', '');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
