-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-08-20 05:26:54
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
-- 資料表結構 `rent_porduct`
--

CREATE TABLE `rent_porduct` (
  `id` int(11) NOT NULL,
  `prodcut_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(3) NOT NULL,
  `rent_price` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `status(租借狀態)` enum('on_renting','returned') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `rent_porduct`
--

INSERT INTO `rent_porduct` (`id`, `prodcut_id`, `name`, `amount`, `rent_price`, `created_at`, `status(租借狀態)`) VALUES
(1, 1, '卡卡頌', 1, 100, '2024-08-20 02:45:40', 'returned');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `rent_porduct`
--
ALTER TABLE `rent_porduct`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rent_porduct`
--
ALTER TABLE `rent_porduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
