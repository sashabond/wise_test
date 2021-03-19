-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 19 2021 г., 16:19
-- Версия сервера: 5.5.53
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `activities`
--

-- --------------------------------------------------------

--
-- Структура таблицы `activ_info`
--

CREATE TABLE `activ_info` (
  `id` int(3) NOT NULL,
  `data` varchar(20) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `activ_info`
--

INSERT INTO `activ_info` (`id`, `data`, `distance`, `start_time`, `end_time`, `type`) VALUES
(20, 'March 19', 8000, '09:15:00', '12:30:00', 'Ride'),
(21, 'March 19', 4000, '12:43:00', '13:30:00', 'Run'),
(22, 'March 19', 10005, '09:15:00', '18:00:00', 'Run'),
(23, 'March 19', 6333, '16:00:00', '18:00:00', 'Run'),
(24, 'March 19', 12000, '16:00:00', '23:15:00', 'Run'),
(29, 'March 19', 7455, '16:00:00', '22:00:00', 'Ride'),
(30, 'March 19', 4567, '09:15:00', '12:30:00', 'Run'),
(31, 'March 19', 4567, '09:15:00', '18:00:00', 'Run'),
(32, 'March 19', 4000, '09:15:00', '18:00:00', 'Run'),
(33, 'March 19', 4000, '09:15:00', '18:00:00', 'Ride');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `activ_info`
--
ALTER TABLE `activ_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `activ_info`
--
ALTER TABLE `activ_info`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
