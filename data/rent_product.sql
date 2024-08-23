-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-08-23 15:44:25
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `teamwork`
--

-- --------------------------------------------------------

--
-- 資料表結構 `rent_product`
--

CREATE TABLE `rent_product` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price` int(8) NOT NULL,
  `deposit` int(3) NOT NULL COMMENT '訂金',
  `status` enum('true','false') NOT NULL COMMENT '租借狀態',
  `valid` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `rent_product`
--

INSERT INTO `rent_product` (`id`, `product_id`, `price`, `deposit`, `status`, `valid`, `created_at`, `updated_time`) VALUES
(1, 1, 199, 2000, 'true', 1, '2024-08-22 06:20:05', '2024-08-22 14:20:05'),
(2, 1, 199, 2000, 'false', 1, '2024-08-22 06:20:05', '2024-08-22 15:13:34'),
(3, 5, 20, 590, 'true', 1, '2024-08-23 03:53:30', '2024-08-23 11:53:30'),
(4, 5, 20, 590, 'true', 1, '2024-08-23 03:53:30', '2024-08-23 11:53:30'),
(5, 5, 20, 590, 'true', 1, '2024-08-23 03:53:30', '2024-08-23 11:53:30'),
(6, 5, 20, 590, 'true', 1, '2024-08-23 03:53:30', '2024-08-23 11:53:30'),
(7, 5, 20, 590, 'true', 1, '2024-08-23 03:53:30', '2024-08-23 11:53:30'),
(8, 5, 20, 590, 'true', 1, '2024-08-23 03:53:30', '2024-08-23 11:53:30'),
(9, 394, 50, 1500, 'true', 1, '2024-08-23 03:55:53', '2024-08-23 11:55:53'),
(10, 394, 50, 1500, 'true', 1, '2024-08-23 03:55:53', '2024-08-23 11:55:53'),
(11, 394, 50, 1500, 'true', 1, '2024-08-23 03:55:53', '2024-08-23 11:55:53'),
(12, 18, 30, 500, 'true', 1, '2024-08-23 04:03:22', '2024-08-23 12:03:22'),
(13, 18, 30, 500, 'true', 1, '2024-08-23 04:03:22', '2024-08-23 12:03:22'),
(14, 465, 10, 100, 'true', 1, '2024-08-23 12:04:26', '2024-08-23 12:04:26'),
(15, 465, 10, 100, 'true', 1, '2024-08-23 12:04:26', '2024-08-23 12:04:26'),
(16, 465, 10, 100, 'true', 1, '2024-08-23 12:04:26', '2024-08-23 12:04:26'),
(17, 419, 70, 2000, 'true', 1, '2024-08-23 13:29:36', '2024-08-23 13:29:36'),
(18, 419, 70, 2000, 'true', 1, '2024-08-23 13:29:36', '2024-08-23 13:29:36'),
(19, 419, 70, 2000, 'true', 1, '2024-08-23 13:29:36', '2024-08-23 13:29:36'),
(20, 419, 70, 2000, 'true', 1, '2024-08-23 13:29:36', '2024-08-23 13:29:36'),
(21, 419, 70, 2000, 'true', 1, '2024-08-23 13:29:36', '2024-08-23 13:29:36');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `rent_product`
--
ALTER TABLE `rent_product`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rent_product`
--
ALTER TABLE `rent_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
