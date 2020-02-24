-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 24 2020 г., 15:39
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `todo_list`
--

CREATE TABLE `todo_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('success','process') NOT NULL DEFAULT 'process',
  `update_admin` enum('update','process') NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `todo_list`
--

INSERT INTO `todo_list` (`id`, `user_id`, `title`, `content`, `status`, `update_admin`) VALUES
(12, 26, 'works', 'go to work at 9 AM', 'process', 'update'),
(13, 26, 'Gym', 'go to the gym at 7 AP', 'process', 'process'),
(16, 26, 'store ', 'go to store at 9 PM', 'process', 'process'),
(17, 5, 'cinema ', 'go to the cinema', 'success', 'process'),
(18, 26, 'rrr', '123123', 'success', 'update'),
(26, 26, 'admin', 'admin', 'process', 'process'),
(28, 26, 'wdqw', 'qwdqwd', 'process', 'process');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` enum('admin','user','guest') NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `email`, `name`, `password`) VALUES
(4, 'user', 'afromipa@gmail.com', 'afrr', '$2y$10$AlV4.2mNOZiZCnCfw6IZDOi4LfwOiuXv2k7wZjraiIyU.WCYJMJc6'),
(5, 'user', 'user@gmail.com', 'user2', '$2y$10$H8YJDOVWnYiHsKGxUseiS.Pi9TT8k/I2RJV/QWYd/VCnSBGFiqTPu'),
(26, 'guest', 'guest', 'guest', '0000'),
(27, 'admin', 'admin@gmail.com', 'admin', '$2y$10$nH3HOcC6ax.k76Aq.id4guaDQutbhFCknF58ml0Bf6uUAVoseP1Eu'),
(29, 'user', 'user34@gmail.com', 'admins', '$2y$10$DxDoA7Gza8U7kpTp2KzWhOTiBR3R8QtxpaLhkfZ9dSKOonbI6l2Li'),
(30, 'user', '1234@gmail.com', 'user1', '$2y$10$gaCzo8PT/QpbNSgrTc9P.OE/vzZm7obaO11uyhit6g7jgubZFZoya');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
