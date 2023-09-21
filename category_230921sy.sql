-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-21 08:39
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
(10, NULL, NULL, '프로그래밍', 1),
(11, NULL, NULL, '퍼블리싱', 1),
(12, NULL, '10', '프론트엔드', 2),
(14, NULL, '12', 'JavaScript', 3),
(16, NULL, '12', 'TypeScript', 3),
(17, NULL, '11', 'HTML', 2),
(18, NULL, '11', 'CSS', 2),
(19, NULL, '17', 'HTML', 3),
(21, NULL, '18', 'CSS', 3),
(23, NULL, '10', '백엔드', 2),
(35, NULL, NULL, '데이터 사이언스', 1),
(42, NULL, '12', 'React', 3),
(43, NULL, '12', 'Vue.js', 3),
(44, NULL, '35', '데이터 분석', 2),
(45, NULL, '35', '인공지능', 2),
(46, NULL, '35', '데이터 시각화', 2),
(47, NULL, '23', 'Node.js', 3),
(48, NULL, '12', 'Flutter', 3),
(49, NULL, '23', 'PHP', 3),
(50, NULL, '12', 'jQuery', 3),
(51, NULL, '12', 'Angular', 3),
(52, NULL, '12', 'Next.js', 3),
(53, NULL, '12', 'Nuxt.js', 3),
(54, NULL, '23', 'Git', 3),
(55, NULL, '23', 'GitHub', 3),
(56, NULL, '12', 'REST API', 3),
(57, NULL, '23', 'JSP', 3),
(58, NULL, '23', 'ASP', 3),
(59, NULL, '23', 'ci4', 3),
(60, NULL, '23', 'Laravel', 3),
(61, NULL, '12', 'Redux', 3),
(62, NULL, '23', 'JAVA', 3),
(63, NULL, '45', '머신러닝', 3),
(64, NULL, '45', '딥러닝', 3),
(65, NULL, '46', 'Tableau', 3),
(66, NULL, '46', 'Pandas', 3),
(67, NULL, '46', 'Matplotlib', 3),
(68, NULL, '46', 'Seaborn', 3),
(69, NULL, '46', 'Plotly', 3),
(70, NULL, '45', 'ChatGPT', 3),
(71, NULL, '45', '강화학습', 3),
(72, NULL, '45', '인공신경망', 3),
(73, NULL, '45', 'Unity', 3),
(74, NULL, '44', 'Python', 3),
(75, NULL, '44', 'SQL', 3),
(76, NULL, '44', 'MySQL', 3),
(77, NULL, '44', 'DBMS/RDBMS', 3),
(78, NULL, '44', '빅데이터', 3),
(79, NULL, '44', '데이터 엔지니어링', 3),
(80, NULL, '44', '웹 크롤링', 3),
(81, NULL, '44', 'Hadoop', 3),
(82, NULL, '44', 'Apache Spark', 3),
(83, NULL, '44', '데이터 리터러시', 3),
(84, NULL, '45', 'CNN', 3),
(85, NULL, '45', '컴퓨터 비전', 3),
(86, NULL, '46', 'Google Datastudio', 3),
(87, NULL, '46', '차트분석', 3),
(88, NULL, '46', 'Scikit-Learn', 3),
(89, NULL, '46', '텍스트마이닝', 3),
(90, NULL, '46', 'Power BI', 3),
(91, NULL, '46', 'ggplot2', 3),
(92, NULL, '46', 'R', 3),
(93, NULL, '45', 'Kaggle', 3),
(94, NULL, '45', 'Keras', 3),
(95, NULL, '45', 'Tensorflow', 3),
(96, NULL, '44', 'Numpy', 3),
(97, NULL, '44', 'Elasticsearch', 3),
(98, NULL, '23', 'AWS', 3),
(99, NULL, '23', 'Spring', 3),
(100, NULL, '23', 'Spring Boot', 3),
(101, NULL, '23', 'Kotlin', 3),
(102, NULL, '23', 'Docker', 3),
(103, NULL, '23', 'Kubernetes', 3),
(104, NULL, '23', 'Kafka', 3),
(105, NULL, '23', 'Express', 3),
(106, NULL, '23', 'TDD', 3),
(107, NULL, '12', 'GraphQL', 3),
(108, NULL, '12', 'SwiftUI', 3),
(109, NULL, '18', 'Bootstrap', 3),
(110, NULL, '18', 'Sass', 3),
(111, NULL, '17', 'SEO', 3),
(112, NULL, '18', '반응형 웹', 3),
(113, NULL, '18', '포트폴리오', 3),
(114, NULL, '18', '웹 디자인', 3),
(115, NULL, '17', 'DOM', 3),
(116, NULL, '18', 'Figma', 3),
(117, NULL, '17', 'Canvas', 3),
(118, NULL, '17', 'HTML5', 3),
(119, NULL, '18', 'Flex', 3),
(120, NULL, '18', 'Grid', 3),
(121, NULL, '18', 'Transition', 3),
(122, NULL, '18', 'Transform', 3),
(123, NULL, '18', 'Box model', 3),
(124, NULL, '17', 'form', 3),
(125, NULL, '17', 'meta', 3),
(126, NULL, '17', 'Viewport', 3),
(127, NULL, '17', 'input', 3),
(128, NULL, '17', 'select', 3),
(129, NULL, '17', 'attribute', 3),
(130, NULL, '17', 'class', 3),
(131, NULL, '17', 'id', 3);

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
