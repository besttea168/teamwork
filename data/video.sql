-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-08-23 15:55:40
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mfee57`
--

-- --------------------------------------------------------

--
-- 資料表結構 `video`
--

CREATE TABLE `video` (
  `id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '標題',
  `product_id` int(11) NOT NULL,
  `yt_url` varchar(255) NOT NULL COMMENT '影片網址',
  `category` varchar(30) NOT NULL,
  `video_duration` varchar(30) NOT NULL COMMENT '影片長度',
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valid` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `video`
--

INSERT INTO `video` (`id`, `title`, `product_id`, `yt_url`, `category`, `video_duration`, `created_time`, `updated_time`, `valid`) VALUES
(1, 'REGENBOGEN LAND 搶救彩虹', 0, 'https://www.youtube.com/watch?v=Z7AYDBwmqwY&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=1&t=309s&pp=iAQB', '0:00', '6:21', '2024-08-20 15:36:00', '2024-08-23 14:57:29', 1),
(2, 'CATAN FAST CARD GAME 卡坦島 快速紙牌版', 0, 'https://www.youtube.com/watch?v=vIkN7zN5Peg&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=2&pp=iAQB', '333', '11:29', '2024-08-20 15:36:00', '2024-08-23 14:57:44', 1),
(3, 'SULTANS OF KARAYA 推翻蘇丹', 0, 'https://www.youtube.com/watch?v=Fkg9a4JprAs&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=3&pp=iAQB', '', '10:32', '2024-08-20 15:36:00', '2024-08-22 17:50:33', 1),
(4, 'FLUXX 浮言浪語', 0, 'https://www.youtube.com/watch?v=yF0ZFLVA_E0&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=4&t=166s&pp=iAQB', '', '4:08', '2024-08-20 15:36:00', '2024-08-21 18:18:01', 1),
(5, 'SHOGI _ YO_KAI WATCH EDITION 妖怪將棋', 0, 'https://www.youtube.com/watch?v=5zL-FBcvWFQ&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=5&pp=iAQB', '', '3:53', '2024-08-20 15:36:00', '2024-08-21 18:25:06', 1),
(6, 'LANDLORD 出租公寓', 0, 'https://www.youtube.com/watch?v=j2OHihQTsFo&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=6&pp=iAQB', '', '8:06', '2024-08-20 15:36:00', '2024-08-21 18:23:57', 1),
(7, 'SEVEN! EXPANSION SEVEN! 特別牌擴充', 0, 'https://www.youtube.com/watch?v=FKeS4Z9LV78&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=7&pp=iAQB', '', '2:51', '2024-08-20 15:36:00', '2024-08-21 18:18:01', 1),
(8, 'ELFENLAND DELUXE 精靈國度豪華版', 0, 'https://www.youtube.com/watch?v=c2EDtkHvmBM&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=8&pp=iAQB', '', '22:46', '2024-08-20 15:36:00', '2024-08-21 18:18:01', 1),
(9, 'FUJI FLUSH 富士流', 0, 'https://www.youtube.com/watch?v=YR67WCSW3iU&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=9&pp=iAQB', '', '5:09', '2024-08-20 15:36:00', '2024-08-21 18:18:01', 1),
(10, 'STONE AGE 2.0 PALEO A NEW BEGINNING EX. 石器時代2.0史前部落 新的開始擴充', 0, 'https://www.youtube.com/watch?v=aFebV4-GKG8&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=10&pp=iAQB', '', '34:41', '2024-08-20 15:36:00', '2024-08-21 18:24:53', 1),
(11, 'ROMME CLASSIC 泛亞天鵝數字牌', 0, 'https://www.youtube.com/watch?v=tWsBdyYGoF8&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=11&pp=iAQB', '', '8:41', '2024-08-20 15:36:00', '2024-08-21 18:18:01', 1),
(12, 'SKYLINERS 天際線', 0, 'https://www.youtube.com/watch?v=PnTzf1_YyFQ&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=12&pp=iAQB', '', '15:49', '2024-08-20 15:36:00', '2024-08-21 18:24:21', 1),
(13, 'ORACLE OF DELPHI 德爾斐神諭', 0, 'https://www.youtube.com/watch?v=Ls0N-uU9jxg&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=13&pp=iAQB', '', '10:49', '2024-08-20 15:36:00', '2024-08-21 18:18:01', 1),
(14, 'KUTSCHFAHRT ZUR TEUFELSBURG DARK PROPHECY 魔城馬車黑暗預言擴充', 0, 'https://www.youtube.com/watch?v=Lfb0HkrAS28&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=14&pp=iAQB', '', '4:48', '2024-08-20 15:36:00', '2024-08-21 18:18:01', 1),
(15, 'SWEET & SPICY 貓吃酸辣', 0, 'https://www.youtube.com/watch?v=Q-sAxKtX8gY&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=15&pp=iAQB', '', '6:37', '2024-08-20 15:36:00', '2024-08-21 18:18:01', 1),
(16, 'LEX IN LEMNISCATE 無限符裡的規律', 0, 'https://www.youtube.com/watch?v=3PA8G1B1y6Q&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=16&pp=iAQB', '', '3:06', '2024-08-20 15:36:00', '2024-08-21 18:18:01', 1),
(17, 'ZOOLORETTO 動物園大亨', 0, 'https://www.youtube.com/watch?v=2hU-ImpiVdQ&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=17&pp=iAQB', '', '7:01', '2024-08-20 15:36:00', '2024-08-21 18:23:01', 1),
(18, 'MY VILLAGE 我的村莊', 0, 'https://www.youtube.com/watch?v=wSclYOMXP40&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=18&pp=iAQB', '', '20:20', '2024-08-20 15:36:00', '2024-08-21 18:23:01', 1),
(19, 'TAKE 11 我是牛頭王', 0, 'https://www.youtube.com/watch?v=xzYq4yzDUC0&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=19&pp=iAQB', '', '7:58', '2024-08-20 15:36:00', '2024-08-21 18:23:01', 1),
(20, '80 DAYS 環世80天', 0, 'https://www.youtube.com/watch?v=HqpmOwd_yyQ&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=20&pp=iAQB', '', '20:56', '2024-08-20 15:36:00', '2024-08-21 18:23:01', 1),
(21, 'TRAVELIST 洲遊列國', 0, 'https://www.youtube.com/watch?v=YiJXr9XgBj0&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=21&pp=iAQB', '', '5:25', '2024-08-20 15:36:00', '2024-08-21 18:23:01', 1),
(22, 'BANG! 砰! 系列 — 兔子推薦', 0, 'https://www.youtube.com/watch?v=yYVcQ68_WEM&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=22&pp=iAQB', '', '6:53', '2024-08-20 15:36:00', '2024-08-21 18:23:01', 1),
(23, 'CATAN 卡坦島 系列 — 兔子推薦', 0, 'https://www.youtube.com/watch?v=08sPNFUaQrg&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=23&pp=iAQB', '', '10:09', '2024-08-20 15:36:00', '2024-08-21 18:23:01', 1),
(24, 'HIGH SOCIETY 上流社會', 0, 'https://www.youtube.com/watch?v=qFKwlJ3aHC8&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=24&pp=iAQB', '', '8:36', '2024-08-20 15:36:00', '2024-08-21 18:23:01', 1),
(25, 'THE LAST STRAW 最後一根稻草', 0, 'https://www.youtube.com/watch?v=IEzRVwNbRj4&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=25&pp=iAQB', '', '2:38', '2024-08-20 15:36:00', '2024-08-21 18:24:30', 1),
(26, 'SEEK THREE TIMES 找三代', 0, 'https://www.youtube.com/watch?v=EllJ1xbN9F0&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=26&pp=iAQB', '', '5:38', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(27, 'CLEVER CUBED 立方聰明', 0, 'https://www.youtube.com/watch?v=2PA8CPq-tqo&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=27&pp=iAQB', '', '11:27', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(28, 'CLEVER 4EVER 永保聰明', 0, 'https://www.youtube.com/watch?v=OvnECUS5JEY&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=28&pp=iAQB', '', '12:38', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(29, 'SABOTEUR THE DARK CAVE 矮人礦坑 礦洞逃生', 0, 'https://www.youtube.com/watch?v=58Jcp2rpfj0&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=29&t=361s&pp=iAQB', '', '19:13', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(30, 'CITY CONNECT 城市規劃師', 0, 'https://www.youtube.com/watch?v=9nT4y_9xw90&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=30&pp=iAQB', '', '9:44', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(31, 'HALLI GALLI TWIST 德國心臟病眼花手亂版', 0, 'https://www.youtube.com/watch?v=mzlj5Z5AWZE&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=31&pp=iAQB', '', '7:07', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(32, 'THE MIND SOULMATES 心靈同步 神通廣大', 0, 'https://www.youtube.com/watch?v=zBxSJkAKmxg&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=32&pp=iAQB', '', '5:16', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(33, 'TERRA MYSTICA: AGE OF INNOVATION 神秘大地：大創造時代', 0, 'https://www.youtube.com/watch?v=iBraT3xX0VA&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=33&pp=iAQB', '', '33:03', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(34, 'MYSTIC MOUNTAINS ADVENTURE 抖抖山大冒險', 0, 'https://www.youtube.com/watch?v=C9mcS-hcO4s&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=34&pp=iAQB', '', '5:38', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(35, 'LADYBUG\'S COSTUME PARTY 瓢蟲彩妝宴', 0, 'https://www.youtube.com/watch?v=5FRh9emlsCs&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=35&pp=iAQB', '', '4:55', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(36, 'MAGIC CIRCLE 仙子魔法陣', 0, 'https://www.youtube.com/watch?v=rb1yAiTUMuY&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=36&pp=iAQB', '', '9:13', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(37, 'THIEVES! 江洋大盜', 0, 'https://www.youtube.com/watch?v=8kXtzqP94aE&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=37&pp=iAQB', '', '3:56', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(38, 'WILDLIFE SAFARI CARD GAME 非洲之旅紙牌版', 0, 'https://www.youtube.com/watch?v=of9iYGUlVNc&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=38&pp=iAQB', '', '3:37', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(39, 'CARCASSONNE MAP EX. UKRAINE ', 0, 'https://www.youtube.com/watch?v=AwlXz8t8-b8&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=39&pp=iAQB', '', '9:12', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(40, 'CARCASSONNE MAP EX. NORDICS 卡卡頌地圖擴充・北歐', 0, 'https://www.youtube.com/watch?v=mLFy8v-_xWc&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=40&pp=iAQB', '', '6:38', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(41, 'CARCASSONNE: WINTER EDITION 卡卡頌 雪季版', 0, 'https://www.youtube.com/watch?v=_G4BhM3t1zA&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=41&pp=iAQB', '', '7:03', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(42, 'How to play Age of Innovation board game _ Full teach + Visuals _ Peaky Boardgamer', 0, 'https://www.youtube.com/watch?v=X21lCXS5s5Y&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=42&pp=iAQB', '', '35:38', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(43, 'CARCASSONNE 2.0 BRIDGES, CASTLES & BAZAARS EX. 卡卡頌2.0 橋樑、山城與市集擴充', 0, 'https://www.youtube.com/watch?v=lyyOxocbyf0&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=43&pp=iAQB', '', '14:19', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(44, 'MINECRAFT: PORTAL DASH 當個創世神：衝出地獄門', 0, 'https://www.youtube.com/watch?v=UtgNCzI_sMc&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=44&pp=iAQB', '', '36:35', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(45, 'CARCASSONNE 2.0 CIRCUS EX. 卡卡頌2.0 馬戲團擴充', 0, 'https://www.youtube.com/watch?v=rsRhSXBuiuY&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=45&pp=iAQB', '', '11:16', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(46, 'PICKOMINO DELUXE 蟲蟲燒烤豪門派對', 0, 'https://www.youtube.com/watch?v=Lgg46Rp-LaE&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=46&pp=iAQB', '', '7:46', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(47, 'KINGDOMS 王國', 0, 'https://www.youtube.com/watch?v=n7Z9N6WNs5s&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=47&pp=iAQB', '', '6:47', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(48, 'VIVA TOPO 起司天堂', 0, 'https://www.youtube.com/watch?v=jA5py4vlzgY&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=48&pp=iAQB', '', '5:05', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(49, 'PICK ME UP! 抓娃娃', 0, 'https://www.youtube.com/watch?v=zFzFuseTqZU&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=49&pp=iAQB', '', '4:39', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1),
(50, 'KAKERLAKEN POKER 德國蟑螂', 0, 'https://www.youtube.com/watch?v=_AMSPKZ5jFc&list=PLhFlfqquQBY8CfJ1ARhAfu_2VDuGzj5yE&index=50&pp=iAQB', '', '6:18', '2024-08-20 15:36:00', '2024-08-20 15:36:00', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `video`
--
ALTER TABLE `video`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
