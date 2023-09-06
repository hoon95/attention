-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-05 07:45
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
(125, 71, 'admin', '20230904194501166168.png', '2023-09-05 02:45:01', 1),
(126, NULL, 'admin', '20230905073515843871.png', '2023-09-05 14:35:15', 1),
(127, NULL, 'admin', '20230905073515130039.png', '2023-09-05 14:35:15', 1),
(128, NULL, 'admin', '20230905073732508742.png', '2023-09-05 14:37:32', 1),
(129, NULL, 'admin', '20230905073732139729.png', '2023-09-05 14:37:32', 1),
(130, NULL, 'admin', '20230905073817208991.png', '2023-09-05 14:38:17', 1),
(131, NULL, 'admin', '20230905073817142297.png', '2023-09-05 14:38:17', 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `class_image_table`
--
ALTER TABLE `class_image_table`
  ADD PRIMARY KEY (`imgid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `class_image_table`
--
ALTER TABLE `class_image_table`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;