-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-06 09:38
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
(126, 'ㄷ', '10/12/13', '<p>ㄷ</p>', '/attention/pdata/class/20230906083352223577.png', 1, 30000, 2, '', 1, 1, '2023-09-06 15:33:52', 0, '282,283'),
(127, 'ㄷ', '10//', '<p>ㄷㄷㄱ0</p>', '/attention/pdata/class/20230906083430196577.png', 0, 30000, 0, '', 0, 1, '2023-09-06 15:34:30', 0, '286,287'),
(128, '2', '10/12/13', '<p>ㄷ</p>', '/attention/pdata/class/20230906083500112628.png', 1, 30000, 2, '', 1, 1, '2023-09-06 15:35:00', 0, '288,289'),
(129, '7', '10/12/13', '<p>7</p>', '/attention/pdata/class/20230906083526133856.png', 0, 0, 3, '', 1, 1, '2023-09-06 15:35:26', 0, '290,291'),
(130, '77', '10/12/13', '<p>7</p>', '/attention/pdata/class/20230906083550731753.png', 1, 30000, 2, '', 0, 0, '2023-09-06 15:35:50', 0, '292,293'),
(133, ';', '10/12/13', '<p>ㅇ</p>', '/attention/pdata/class/20230906084126213177.png', 1, 30000, 2, '', 1, 1, '2023-09-06 15:41:26', 0, '300,301'),
(134, '즐거운 JAVA', '10/12/13', '<p>입문자를 위해 준비한 [프로그래밍 언어, 백엔드]강의입니다.</p><p><br></p>', '/attention/pdata/class/20230906084514970491.png', 1, 50000, 2, '', 1, 3, '2023-09-06 15:45:14', 1, '302,303,304'),
(135, '인프콘 2023 다시보기', '10/11/', '<p><span style=\"box-sizing: inherit; color: rgb(52, 58, 64); font-weight: 700; font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 22px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: -0.3px;\">입문자</span><span style=\"color: rgb(52, 58, 64); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 22px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: -0.3px;\">를 위해 준비한</span><br style=\"box-sizing: inherit; color: rgb(52, 58, 64); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 22px; letter-spacing: -0.3px;\"><span style=\"box-sizing: inherit; color: rgb(52, 58, 64); font-weight: 700; font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 22px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: -0.3px;\">[개발 · 프로그래밍, 커리어] 강의입니다.</span><br></p>', '/attention/pdata/class/20230906084926172791.png', 1, 150000, 3, '', 1, 1, '2023-09-06 15:49:26', 0, '305,306,307,308,309,310'),
(136, '시작해보세요! 당신의 첫 지식공유', '10/12/13', '<p><span style=\"box-sizing: inherit; color: rgb(52, 58, 64); font-weight: 700; font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 22px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: -0.3px;\">입문자</span><span style=\"color: rgb(52, 58, 64); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 22px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: -0.3px;\">를 위해 준비한</span><br style=\"box-sizing: inherit; color: rgb(52, 58, 64); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 22px; letter-spacing: -0.3px;\"><span style=\"box-sizing: inherit; color: rgb(52, 58, 64); font-weight: 700; font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 22px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: -0.3px;\">[커리어, 교양] 강의입니다.</span><br></p>', '/attention/pdata/class/20230906090623843599.png', 0, 0, 1, '', 0, 0, '2023-09-06 16:06:23', 1, '311,312,313'),
(137, '12234', '10/12/13', '<p>124344</p>', '/attention/pdata/class/20230906091622125025.png', 0, 0, 1, '', 0, 0, '2023-09-06 16:16:22', 1, '314,315,316');

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
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
