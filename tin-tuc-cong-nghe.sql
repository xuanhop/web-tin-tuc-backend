-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2019 at 04:29 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tin-tuc-cong-nghe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `created_at`, `updated_at`, `featured`, `creator`, `status`) VALUES
(1, 'artificial intelligence', 0, NULL, NULL, '2019-07-12 09:09:41', NULL, 1, 1),
(2, 'Big Data', 8, 'Big data và các bài viết liên quan', NULL, '2019-07-12 10:09:54', NULL, 1, -1),
(6, 'Smart home', 0, NULL, NULL, '2019-07-12 09:27:13', NULL, 1, 1),
(7, 'Fintech', 0, NULL, NULL, '2019-07-12 09:30:03', NULL, 1, 1),
(8, 'Block chains', 9, NULL, NULL, '2019-07-12 09:30:05', NULL, 1, 1),
(9, 'AI trong lĩnh vực sản xuất', 0, 'Ứng dụng AI trong lĩnh vực sản xuất sẽ tạo ra nhiều giá trị hơn so ...', '2019-07-03 00:00:00', '2019-07-12 09:30:05', NULL, 1, 1),
(10, 'Ứng dụng Big data trong quản lý đất đai', 9, 'Big data có thể được áp dụng trong các lĩnh vực nào?', '2019-07-03 08:59:52', '2019-07-12 09:30:05', NULL, 1, 1),
(11, 'asdasda', 0, 'asdaasd', '2019-07-09 10:05:27', '2019-07-09 10:17:46', NULL, 1, 1),
(12, 'Công cuộc tìm kiếm nguồn năng lượng mới', 0, NULL, NULL, '2019-07-10 15:35:18', NULL, 1, 1),
(13, 'Công cuộc tìm kiếm nguồn năng lượng mới', 0, 'acâc', NULL, '2019-07-12 10:00:28', NULL, 1, -1),
(14, 'Tìm kiếm năng lượng mới', 0, 'aaaaaaaaaaa', NULL, NULL, NULL, 1, 1),
(15, 'Tìm kiếm năng lượng mới', 0, 'aaaaaaaaa', NULL, '2019-07-12 10:00:22', NULL, 1, -1),
(16, 'Tìm kiếm năng lượng mới', 0, 'aaaaaaaaa', NULL, '2019-07-12 09:59:50', NULL, 1, -1),
(17, 'Tìm kiếm năng lượng mới', 0, 'aaaaaaaaa', NULL, '2019-07-12 10:00:19', NULL, 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `crawler`
--

DROP TABLE IF EXISTS `crawler`;
CREATE TABLE IF NOT EXISTS `crawler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `source` text NOT NULL,
  `content` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
CREATE TABLE IF NOT EXISTS `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

DROP TABLE IF EXISTS `meta`;
CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'content',
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `post_id`, `name`, `data`) VALUES
(1, 1, 'content', 'Big data là các tập dữ liệu có khối lượng lớn và phức tạp. Độ lớn đến mức các phần mềm xử lý dữ liệu truyền thống không có khả năng thu thập, quản lý và xử lý dữ liệu trong một khoảng thời gian hợp lý.\r\nNhững tập dữ liệu lớn này có thể bao gồm các dữ liệu có cấu trúc, không có cấu trúc và bán cấu trúc, mỗi tập có thể được khai thác để tìm hiểu insights.\r\n\r\nBao nhiêu dữ liệu để đủ gọi là ” big ” vẫn còn được tranh luận, nhưng nó có thể là các bội số của petabyte – và các dự án lớn nhất với phạm vi exabytes.'),
(2, 2, 'content', 'Facebook đang phối hợp với các tổ chức phi lợi nhuận và các đối tác nghiên cứu trong việc ứng dụng AI và dữ liệu lớn (big data) vào giải quyết những thách thức lớn trong các lĩnh vực xã hội, y tế và hạ tầng tại Châu Á nhằm đẩy nhanh việc đạt được những mục tiêu phát triển bền vững.\r\n\r\nTheo đó, Facebook áp dụng năng lực xử lý của sức mạnh tính toán, kỹ năng khoa học dữ liệu sâu rộng và chuyên môn về AI của mình để tạo ra bản đồ về dân số địa phương chi tiết và chính xác nhất thế giới. Facebook cũng hợp tác với Trung tâm Mạng thông tin Khoa học Trái đất Quốc tếcủa trường Đại học Columbia để đảm bảo tận dụng triệt để nguồn dữ liệu có sẵn của các quốc gia liên quan.'),
(3, 10, 'content', 'I. Khái niệm cơ bản về Big Data\r\nVào năm 2001, nhà phân tích Doug Laney của hãng META Group (giờ là công ty nghiên cứu Gartner) đã nói rằng những thách thức và cơ hội nằm trong việc tăng trưởng dữ liệu có thể được mô tả bằng ba chiều “3V”: tăng về số lượng lưu trữ (volume), tăng về tốc độ xử lý (velocity) và tăng về chủng loại (variety). Giờ đây, Gartner cùng với nhiều công ty và tổ chức khác trong lĩnh vực công nghệ thông tin tiếp tục sử dụng mô hình “3V” này để định nghĩa nên Big Data. Đến năm 2012, Gartner bổ sung thêm rằng Big Data ngoài ba tính chất trên thì còn phải “cần đến các dạng xử lí mới để giúp đỡ việc đưa ra quyết định, khám phá sâu vào sự vật/sự việc và tối ưu hóa các quy trình làm việc”.'),
(4, 11, 'content', 'I. Khái niệm cơ bản về Big Data\r\nVào năm 2001, nhà phân tích Doug Laney của hãng META Group (giờ là công ty nghiên cứu Gartner) đã nói rằng những thách thức và cơ hội nằm trong việc tăng trưởng dữ liệu có thể được mô tả bằng ba chiều “3V”: tăng về số lượng lưu trữ (volume), tăng về tốc độ xử lý (velocity) và tăng về chủng loại (variety). Giờ đây, Gartner cùng với nhiều công ty và tổ chức khác trong lĩnh vực công nghệ thông tin tiếp tục sử dụng mô hình “3V” này để định nghĩa nên Big Data. Đến năm 2012, Gartner bổ sung thêm rằng Big Data ngoài ba tính chất trên thì còn phải “cần đến các dạng xử lí mới để giúp đỡ việc đưa ra quyết định, khám phá sâu vào sự vật/sự việc và tối ưu hóa các quy trình làm việc”.'),
(5, 12, 'content', 'kememay'),
(6, 13, 'content', 'âjâjâjậ'),
(7, 14, 'content', 'ảdfghjkl'),
(8, 15, 'content', 'ăeáeâ'),
(9, 16, 'content', 'ssdfzdfxfgxfg'),
(10, 17, 'content', 'áđâsd'),
(11, 18, 'content', 'wsdghgjk'),
(12, 19, 'content', 'ádfghj'),
(13, 20, 'content', 'ádfghj'),
(14, 21, 'content', 'ádfghj'),
(15, 23, 'content', 'ảtghkfghj'),
(16, 24, 'content', 'ảtghkfghj'),
(17, 25, 'content', 'ảtghkfghj'),
(18, 26, 'content', 'qưẻtyui'),
(19, 27, 'content', 'qưẻtyui'),
(20, 28, 'content', 'qertyuoi'),
(21, 29, 'content', 'sdfghjk'),
(22, 41, 'content', 'sfj'),
(23, 48, 'content', 'asdasda'),
(24, 49, 'content', 'sađáád'),
(25, 58, 'content', 'akakaka'),
(26, 59, 'content', 'akakaka'),
(27, 60, 'content', 'akakaka'),
(28, 64, 'content', 'jhghjgjhg'),
(29, 65, 'content', 'Cuộc sống nhàm chán nếu không có AI'),
(30, 66, 'content', 'Ngôi nhà với những tiện nghi công nghệ được thiết kế bởi các kiến trúc sư và các lập trình viên người Lào...Cai blabla'),
(31, 67, 'content', 'Ngôi nhà với khả năng giao tiếp'),
(32, 76, 'content', 'Big data sử dụng một lượng data lớn để tiên đoán hành vi của khách hàng giúp ta có thể triển khai các dự án tương ứng'),
(33, 78, 'content', 'áđá'),
(34, 82, 'content', 'fffffffffffffff'),
(35, 83, 'content', 'fffffffffffffff'),
(36, 84, 'content', 'fffffffffffffff'),
(37, 86, 'content', 'áđấ'),
(38, 88, 'content', 'asdasdasd'),
(39, 89, 'content', 'asdasdasd'),
(40, 90, 'content', 'asdasdasd'),
(41, 91, 'content', 'asdasda'),
(42, 92, 'content', 'asdasda'),
(43, 93, 'content', 'Theo một nghiên cứu xl vừa được thực hiện tại khoa Fit Ha nu thì ....');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_25_033533_users', 1),
(2, '2019_07_06_102726_create_tag_table', 2),
(3, '2019_07_06_103040_create_relation_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `status` int(11) DEFAULT '1',
  `main_image` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `feature` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `status`, `main_image`, `views`, `feature`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Big data là gì?', -1, '20181222_154813.jpg', 1, 1, NULL, '2019-07-10 07:54:55', 2),
(11, 'BIG DATA TRONG ỨNG DỤNG VÀ CUỘC SỐNG', -1, '20181222_101810.jpg', NULL, NULL, '2019-06-26 02:52:48', '2019-07-09 02:39:52', 2),
(65, 'AI trong đời sống', -1, '20181222_154813.jpg', NULL, NULL, '2019-07-02 02:37:34', '2019-07-10 03:40:03', 1),
(66, 'Ngôi nhà thông minh được tích hợp nhiều công nghệ', -1, 'C:\\wamp64\\tmp\\phpB80D.tmp', NULL, NULL, '2019-07-02 02:47:12', '2019-07-09 08:04:58', 6),
(67, 'Ngôi nhà trong mơ', -1, 'C:\\wamp64\\tmp\\phpB055.tmp', NULL, NULL, '2019-07-02 03:05:49', '2019-07-09 08:05:00', 1),
(68, 'Big data mang lại lợi ích gì cho chúng ta', -1, '', NULL, NULL, '2019-07-06 10:30:24', '2019-07-09 01:35:51', 1),
(69, 'Big data mang lại lợi ích gì cho chúng ta', -1, '', NULL, NULL, '2019-07-06 10:30:51', '2019-07-06 10:35:16', 1),
(70, 'Big data mang lại lợi ích gì cho chúng ta', -1, '', NULL, NULL, '2019-07-06 10:32:57', '2019-07-06 10:35:20', 1),
(71, 'Big data mang lại lợi ích gì cho chúng ta', -1, '', NULL, NULL, '2019-07-06 10:33:16', '2019-07-06 10:35:36', 1),
(72, 'Big data mang lại lợi ích gì cho chúng ta', -1, '', NULL, NULL, '2019-07-06 10:33:21', '2019-07-06 10:35:22', 1),
(73, 'Big data mang lại lợi ích gì cho chúng ta', -1, '', NULL, NULL, '2019-07-06 10:34:21', '2019-07-06 10:35:35', 1),
(74, 'Big data mang lại lợi ích gì cho chúng ta', -1, '', NULL, NULL, '2019-07-06 10:34:30', '2019-07-06 10:35:32', 1),
(75, 'Big data mang lại lợi ích gì cho chúng ta', -1, '', NULL, NULL, '2019-07-06 10:34:42', '2019-07-06 10:35:30', 1),
(77, 'Sức mạnh của AI', 1, 'rose-blue-flower-rose-blooms-67636.jpeg', NULL, NULL, '2019-07-08 02:08:35', '2019-07-09 08:06:21', 1),
(78, 'Công nghệ và cuộc sống', -1, '', NULL, NULL, '2019-07-09 08:06:53', '2019-07-09 08:07:01', 6),
(79, '55555555555555', -1, '', NULL, NULL, '2019-07-09 09:12:56', '2019-07-09 09:26:33', 1),
(80, '55555555555555', -1, '', NULL, NULL, '2019-07-09 09:14:44', '2019-07-09 09:26:35', 1),
(81, '55555555555555', -1, '', NULL, NULL, '2019-07-09 09:14:57', '2019-07-09 09:26:37', 1),
(82, '55555555555555', -1, '', NULL, NULL, '2019-07-09 09:15:18', '2019-07-09 09:26:39', 1),
(83, '55555555555555', -1, '', NULL, NULL, '2019-07-09 09:15:54', '2019-07-09 10:44:57', 1),
(84, '55555555555555', -1, '', NULL, NULL, '2019-07-09 09:16:08', '2019-07-09 10:44:59', 1),
(85, 'áđâsđá', -1, '', NULL, NULL, '2019-07-09 09:19:13', '2019-07-09 10:45:00', 1),
(86, 'áđâsđá', 1, '', NULL, NULL, '2019-07-09 09:19:22', '2019-07-09 09:19:22', 1),
(87, 'asdasdasd', 1, '', NULL, NULL, '2019-07-09 09:27:44', '2019-07-09 09:27:44', 1),
(88, 'asdasdasd', 1, '', NULL, NULL, '2019-07-09 09:27:52', '2019-07-09 09:27:52', 1),
(89, 'asdasdasd', 1, 'rose-blue-flower-rose-blooms-67636.jpeg', NULL, NULL, '2019-07-09 09:28:00', '2019-07-09 09:28:00', 1),
(90, 'asdasdasd', 1, 'rose-blue-flower-rose-blooms-67636.jpeg', NULL, NULL, '2019-07-09 09:28:36', '2019-07-09 09:28:36', 1),
(91, 'TEstAP', 1, '', NULL, NULL, '2019-07-09 09:29:05', '2019-07-09 09:29:05', 1),
(92, 'TEstAP', 1, '', NULL, NULL, '2019-07-09 09:29:22', '2019-07-09 09:29:22', 1),
(93, 'Trí tuệ nhân tạo có khả năng làm chủ thế giới?', 1, 'p1_1.jpg', NULL, NULL, '2019-07-09 10:41:27', '2019-07-09 10:41:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

DROP TABLE IF EXISTS `relation`;
CREATE TABLE IF NOT EXISTS `relation` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `relation_post_id_foreign` (`post_id`),
  KEY `relation_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=198 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`post_id`, `tag_id`, `created_at`, `updated_at`, `id`) VALUES
(11, 1, NULL, NULL, 3),
(187, 1, NULL, NULL, 6),
(8, 2, NULL, NULL, 7),
(41, 5, NULL, NULL, 10),
(186, 7, NULL, NULL, 12),
(25, 8, NULL, NULL, 13),
(85, 9, NULL, NULL, 14),
(186, 10, NULL, NULL, 15),
(114, 11, NULL, NULL, 16),
(156, 12, NULL, NULL, 17),
(70, 13, NULL, NULL, 18),
(27, 14, NULL, NULL, 19),
(50, 15, NULL, NULL, 20),
(71, 16, NULL, NULL, 21),
(104, 17, NULL, NULL, 22),
(181, 18, NULL, NULL, 23),
(49, 19, NULL, NULL, 24),
(156, 20, NULL, NULL, 25),
(163, 21, NULL, NULL, 26),
(83, 22, NULL, NULL, 27),
(200, 23, NULL, NULL, 28),
(12, 24, NULL, NULL, 29),
(132, 25, NULL, NULL, 30),
(150, 26, NULL, NULL, 31),
(79, 27, NULL, NULL, 32),
(173, 28, NULL, NULL, 33),
(197, 29, NULL, NULL, 34),
(33, 30, NULL, NULL, 35),
(32, 31, NULL, NULL, 36),
(197, 32, NULL, NULL, 37),
(174, 33, NULL, NULL, 38),
(88, 34, NULL, NULL, 39),
(155, 35, NULL, NULL, 40),
(88, 36, NULL, NULL, 41),
(78, 37, NULL, NULL, 42),
(8, 38, NULL, NULL, 43),
(128, 39, NULL, NULL, 44),
(55, 40, NULL, NULL, 45),
(132, 41, NULL, NULL, 46),
(147, 42, NULL, NULL, 47),
(135, 43, NULL, NULL, 48),
(137, 44, NULL, NULL, 49),
(100, 45, NULL, NULL, 50),
(105, 46, NULL, NULL, 51),
(32, 47, NULL, NULL, 52),
(136, 48, NULL, NULL, 53),
(57, 49, NULL, NULL, 54),
(6, 50, NULL, NULL, 55),
(6, 51, NULL, NULL, 56),
(23, 52, NULL, NULL, 57),
(46, 53, NULL, NULL, 58),
(53, 54, NULL, NULL, 59),
(68, 55, NULL, NULL, 60),
(63, 56, NULL, NULL, 61),
(103, 57, NULL, NULL, 62),
(185, 58, NULL, NULL, 63),
(195, 59, NULL, NULL, 64),
(144, 60, NULL, NULL, 65),
(73, 61, NULL, NULL, 66),
(130, 62, NULL, NULL, 67),
(100, 63, NULL, NULL, 68),
(11, 64, NULL, NULL, 69),
(117, 65, NULL, NULL, 70),
(89, 66, NULL, NULL, 71),
(24, 67, NULL, NULL, 72),
(64, 68, NULL, NULL, 73),
(186, 69, NULL, NULL, 74),
(64, 70, NULL, NULL, 75),
(137, 71, NULL, NULL, 76),
(54, 72, NULL, NULL, 77),
(47, 73, NULL, NULL, 78),
(38, 74, NULL, NULL, 79),
(121, 75, NULL, NULL, 80),
(5, 76, NULL, NULL, 81),
(48, 77, NULL, NULL, 82),
(85, 78, NULL, NULL, 83),
(73, 79, NULL, NULL, 84),
(197, 80, NULL, NULL, 85),
(78, 81, NULL, NULL, 86),
(41, 82, NULL, NULL, 87),
(100, 83, NULL, NULL, 88),
(67, 84, NULL, NULL, 89),
(45, 85, NULL, NULL, 90),
(188, 86, NULL, NULL, 91),
(12, 87, NULL, NULL, 92),
(145, 88, NULL, NULL, 93),
(108, 89, NULL, NULL, 94),
(150, 90, NULL, NULL, 95),
(70, 91, NULL, NULL, 96),
(125, 92, NULL, NULL, 97),
(174, 93, NULL, NULL, 98),
(133, 94, NULL, NULL, 99),
(16, 95, NULL, NULL, 100),
(180, 96, NULL, NULL, 101),
(76, 97, NULL, NULL, 102),
(117, 98, NULL, NULL, 103),
(163, 99, NULL, NULL, 104),
(94, 100, NULL, NULL, 105),
(176, 101, NULL, NULL, 106),
(134, 102, NULL, NULL, 107),
(96, 103, NULL, NULL, 108),
(159, 104, NULL, NULL, 109),
(55, 105, NULL, NULL, 110),
(71, 106, NULL, NULL, 111),
(79, 107, NULL, NULL, 112),
(199, 108, NULL, NULL, 113),
(36, 109, NULL, NULL, 114),
(140, 110, NULL, NULL, 115),
(4, 111, NULL, NULL, 116),
(31, 112, NULL, NULL, 117),
(5, 113, NULL, NULL, 118),
(159, 114, NULL, NULL, 119),
(118, 115, NULL, NULL, 120),
(185, 116, NULL, NULL, 121),
(118, 117, NULL, NULL, 122),
(7, 118, NULL, NULL, 123),
(66, 119, NULL, NULL, 124),
(192, 120, NULL, NULL, 125),
(153, 121, NULL, NULL, 126),
(74, 122, NULL, NULL, 127),
(138, 123, NULL, NULL, 128),
(93, 124, NULL, NULL, 129),
(93, 125, NULL, NULL, 130),
(100, 126, NULL, NULL, 131),
(27, 127, NULL, NULL, 132),
(36, 128, NULL, NULL, 133),
(43, 129, NULL, NULL, 134),
(65, 130, NULL, NULL, 135),
(59, 131, NULL, NULL, 136),
(143, 132, NULL, NULL, 137),
(28, 133, NULL, NULL, 138),
(57, 134, NULL, NULL, 139),
(18, 135, NULL, NULL, 140),
(83, 136, NULL, NULL, 141),
(122, 137, NULL, NULL, 142),
(39, 138, NULL, NULL, 143),
(92, 139, NULL, NULL, 144),
(16, 140, NULL, NULL, 145),
(70, 141, NULL, NULL, 146),
(164, 142, NULL, NULL, 147),
(193, 143, NULL, NULL, 148),
(16, 144, NULL, NULL, 149),
(173, 145, NULL, NULL, 150),
(93, 146, NULL, NULL, 151),
(129, 147, NULL, NULL, 152),
(178, 148, NULL, NULL, 153),
(19, 149, NULL, NULL, 154),
(156, 150, NULL, NULL, 155),
(83, 151, NULL, NULL, 156),
(200, 152, NULL, NULL, 157),
(126, 153, NULL, NULL, 158),
(165, 154, NULL, NULL, 159),
(105, 155, NULL, NULL, 160),
(183, 156, NULL, NULL, 161),
(146, 157, NULL, NULL, 162),
(158, 158, NULL, NULL, 163),
(61, 159, NULL, NULL, 164),
(25, 160, NULL, NULL, 165),
(199, 161, NULL, NULL, 166),
(158, 162, NULL, NULL, 167),
(121, 163, NULL, NULL, 168),
(62, 164, NULL, NULL, 169),
(88, 165, NULL, NULL, 170),
(70, 166, NULL, NULL, 171),
(97, 167, NULL, NULL, 172),
(48, 168, NULL, NULL, 173),
(136, 169, NULL, NULL, 174),
(34, 170, NULL, NULL, 175),
(179, 171, NULL, NULL, 176),
(28, 172, NULL, NULL, 177),
(6, 173, NULL, NULL, 178),
(141, 174, NULL, NULL, 179),
(83, 175, NULL, NULL, 180),
(77, 176, NULL, NULL, 181),
(83, 177, NULL, NULL, 182),
(52, 178, NULL, NULL, 183),
(60, 179, NULL, NULL, 184),
(179, 180, NULL, NULL, 185),
(54, 181, NULL, NULL, 186),
(141, 182, NULL, NULL, 187),
(45, 183, NULL, NULL, 188),
(101, 184, NULL, NULL, 189),
(97, 185, NULL, NULL, 190),
(125, 186, NULL, NULL, 191),
(58, 187, NULL, NULL, 192),
(149, 188, NULL, NULL, 193),
(126, 189, NULL, NULL, 194),
(9, 190, NULL, NULL, 195),
(87, 191, NULL, NULL, 196),
(74, 192, NULL, NULL, 197);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=198 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_name`, `created_at`, `updated_at`, `id`) VALUES
('Photo analyzing', '2019-07-09 10:05:29', '2019-07-09 10:05:29', 193),
('Shipping Tech', '2019-07-08 03:01:37', '2019-07-09 03:39:59', 6),
('Universal Technology', '2019-07-08 03:20:31', '2019-07-09 03:39:40', 7),
('Counting Technology', '2019-07-08 03:20:31', '2019-07-09 03:40:19', 8),
('dolor', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 9),
('sit', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 10),
('amet', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 11),
('consectetur', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 12),
('adipiscing', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 13),
('Automatic car', '2019-07-10 07:40:56', '2019-07-10 07:40:56', 197),
('a', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 15),
('ac', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 16),
('accumsan', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 17),
('ad', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 18),
('aenean', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 19),
('aliquam', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 20),
('aliquet', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 21),
('ante', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 22),
('aptent', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 23),
('arcu', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 24),
('at', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 25),
('auctor', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 26),
('augue', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 27),
('bibendum', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 28),
('blandit', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 29),
('class', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 30),
('commodo', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 31),
('condimentum', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 32),
('congue', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 33),
('consequat', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 34),
('conubia', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 35),
('convallis', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 36),
('cras', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 37),
('cubilia', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 38),
('curabitur', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 39),
('curae', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 40),
('cursus', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 41),
('dapibus', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 42),
('diam', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 43),
('dictum', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 44),
('dictumst', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 45),
('dignissim', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 46),
('dis', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 47),
('donec', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 48),
('dui', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 49),
('duis', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 50),
('efficitur', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 51),
('egestas', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 52),
('eget', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 53),
('eleifend', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 54),
('elementum', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 55),
('enim', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 56),
('erat', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 57),
('eros', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 58),
('est', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 59),
('et', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 60),
('etiam', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 61),
('eu', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 62),
('euismod', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 63),
('ex', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 64),
('facilisi', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 65),
('facilisis', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 66),
('fames', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 67),
('faucibus', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 68),
('felis', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 69),
('fermentum', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 70),
('feugiat', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 71),
('finibus', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 72),
('fringilla', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 73),
('fusce', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 74),
('gravida', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 75),
('habitant', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 76),
('habitasse', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 77),
('hac', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 78),
('hendrerit', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 79),
('himenaeos', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 80),
('iaculis', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 81),
('id', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 82),
('imperdiet', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 83),
('in', '2019-07-08 03:20:31', '2019-07-08 04:50:21', 84),
('inceptos', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 85),
('integer', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 86),
('interdum', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 87),
('justo', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 88),
('lacinia', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 89),
('lacus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 90),
('laoreet', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 91),
('lectus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 92),
('leo', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 93),
('libero', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 94),
('ligula', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 95),
('litora', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 96),
('lobortis', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 97),
('luctus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 98),
('maecenas', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 99),
('magna', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 100),
('magnis', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 101),
('malesuada', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 102),
('massa', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 103),
('mattis', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 104),
('mauris', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 105),
('maximus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 106),
('metus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 107),
('mi', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 108),
('molestie', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 109),
('mollis', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 110),
('montes', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 111),
('morbi', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 112),
('mus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 113),
('nam', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 114),
('nascetur', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 115),
('natoque', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 116),
('nec', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 117),
('neque', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 118),
('netus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 119),
('nibh', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 120),
('nisi', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 121),
('nisl', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 122),
('non', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 123),
('nostra', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 124),
('nulla', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 125),
('nullam', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 126),
('nunc', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 127),
('odio', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 128),
('orci', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 129),
('ornare', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 130),
('parturient', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 131),
('pellentesque', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 132),
('penatibus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 133),
('per', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 134),
('pharetra', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 135),
('phasellus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 136),
('placerat', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 137),
('platea', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 138),
('porta', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 139),
('porttitor', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 140),
('posuere', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 141),
('potenti', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 142),
('praesent', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 143),
('pretium', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 144),
('primis', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 145),
('proin', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 146),
('pulvinar', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 147),
('purus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 148),
('quam', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 149),
('quis', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 150),
('quisque', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 151),
('rhoncus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 152),
('ridiculus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 153),
('risus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 154),
('rutrum', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 155),
('sagittis', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 156),
('sapien', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 157),
('scelerisque', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 158),
('sed', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 159),
('sem', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 160),
('semper', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 161),
('senectus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 162),
('sociosqu', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 163),
('sodales', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 164),
('sollicitudin', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 165),
('suscipit', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 166),
('suspendisse', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 167),
('taciti', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 168),
('tellus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 169),
('tempor', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 170),
('tempus', '2019-07-08 03:20:31', '2019-07-08 04:50:22', 171),
('tincidunt', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 172),
('torquent', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 173),
('tortor', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 174),
('tristique', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 175),
('turpis', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 176),
('ullamcorper', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 177),
('ultrices', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 178),
('ultricies', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 179),
('urna', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 180),
('ut', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 181),
('varius', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 182),
('vehicula', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 183),
('vel', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 184),
('velit', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 185),
('venenatis', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 186),
('vestibulum', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 187),
('vitae', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 188),
('vivamus', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 189),
('viverra', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 190),
('volutpat', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 191),
('vulputate', '2019-07-08 03:20:31', '2019-07-08 04:50:23', 192),
('Photo analyzing', '2019-07-09 10:06:07', '2019-07-09 10:06:07', 194);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'xuanhopdo9712', 'xuanhopdo9712@gmail.com', NULL, '$2y$10$hENfWxokluBaglG2KHBcDOuHC./fm2jGJkjYY9Y0x62xrV5MNtdOy', 'l71fY4qPHnaWtnHLyN1L3drR3ZtemsCPk9HeQdOqqIWbHfv6seAOrEaC6u4o', '2019-06-24 20:37:35', '2019-06-24 20:37:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
