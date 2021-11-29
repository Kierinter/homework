-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-11-29 14:22:51
-- 服务器版本： 10.4.22-MariaDB
-- PHP 版本： 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `qq` int(14) DEFAULT NULL,
  `college` varchar(30) DEFAULT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `sex` varchar(5) DEFAULT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `information`
--

INSERT INTO `information` (`id`, `username`, `phone_number`, `qq`, `college`, `profession`, `sex`, `password`) VALUES
(1, 'a', 1, 1, 'a', 'a', '1', '1'),
(2, 'b', 1, 1, 'a', 'a', '1', '1'),
(3, 'c', 1, 1, 'a', 'a', '1', '1'),
(7, 'g', 1, 1, 'a', 'a', '1', '1');

--
-- 转储表的索引
--

--
-- 表的索引 `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
