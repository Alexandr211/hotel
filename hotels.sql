-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2020 г., 18:10
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hotels`
--

-- --------------------------------------------------------

--
-- Структура таблицы `room_guide`
--

CREATE TABLE `room_guide` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `room_guide`
--

INSERT INTO `room_guide` (`id`, `name`, `description`) VALUES
(3, '1 местный стандарт', 'стандартный одноместный номер с холодильником и кроватью. Есть фен.'),
(4, '1 местный люкс', 'Одноместный номер повышенной комфортности с холодильником и двухспальной кроватью. В номере есть кондиционер, туалет и душ.'),
(5, '2 местный полулюкс', 'Двухместный номер с двуспальной кроватью и диваном. Есть телевизор и кондиционер.');

-- --------------------------------------------------------

--
-- Структура таблицы `room_list`
--

CREATE TABLE `room_list` (
  `id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `client_name` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `client_phone` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `booked_days` int(10) NOT NULL,
  `cr_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `room_list`
--

INSERT INTO `room_list` (`id`, `room_id`, `client_name`, `client_phone`, `date_from`, `date_to`, `booked_days`) VALUES
(1, 4, 'Alex', '+1 (111) 111 11 11', '2020-07-04', '2020-07-04', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `room_guide`
--
ALTER TABLE `room_guide`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `room_list`
--
ALTER TABLE `room_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `room_guide`
--
ALTER TABLE `room_guide`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `room_list`
--
ALTER TABLE `room_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
