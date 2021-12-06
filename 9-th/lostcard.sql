-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-12-06 09:33:08
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
-- 表的结构 `lostcard`
--

CREATE TABLE `lostcard` (
  `id` int(11) NOT NULL,
  `number` int(12) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `qq` int(15) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `stu_number` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `lostcard`
--

INSERT INTO `lostcard` (`id`, `number`, `name`, `qq`, `phone_number`, `remarks`, `picture`, `stu_number`) VALUES
(1, 5, 'e', 5, 5, 'null', 'null', 1),
(2, 6, 'f', 5, 5, 'null', 'null', 1),
(3, 7, 'g', 5, 5, 'null', 'null', 1);

--
-- 转储表的索引
--

--
-- 表的索引 `lostcard`
--
ALTER TABLE `lostcard`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `lostcard`
--
ALTER TABLE `lostcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
