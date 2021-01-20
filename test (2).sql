-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2021 г., 14:58
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `level_2`
--

CREATE TABLE `level_2` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vk_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `level_2`
--

INSERT INTO `level_2` (`id`, `email`, `password`, `username`, `job_place`, `phone_number`, `address`, `image`, `status`, `vk_login`, `telegram`, `instagram`, `is_admin`) VALUES
(20, 'huzurbek@yahoo.com', '$2y$10$swl.2Mq8RRfc5wqJshpWO.OeW8vaWQGExw1aKxDatchpSIqIeGTIi', 'Huzurbek Kurbanov', 'Project Manager', '+998997573814', 'New York USA', '60081a9c12925.png', 'success', 'vk_huzurbek', 'teg/huzurbek', 'huzurbek77', '1'),
(37, 'jony@yahoo.com', '$2y$10$wPozYsFX0NUQA.n4l7YElu0Jpeao2dnTzX2Li6D6AerWwIx3oVivu', 'Tom Jony', 'Actor', '+1996728888', 'New York USA', '6007d8699781d.png', 'success', 'omon', 'Omon', 'omon', ''),
(39, 'ezoza@yahoo.com', '$2y$10$6SAMFzrGiMnlu8/FrTN9X.Opg8wBmhJCBGwmaFmZ5yZ0fLptmNdOq', 'Ezoza Kurbanova', 'Housewife', '+998997573814', 'Tashkent city', '6007de7c4e2ee.png', 'danger', 'vk/ezoza', 'tg/ezoza', 'ezoza', ''),
(40, 'jahon@yahoo.com', '$2y$10$h30KZqSRNQ7LJngMHsZNfe22tppYoi50M3pcnNgAvFbGwytEH57l.', 'Jahon', 'company', '+998997573814', 'Tashkent city', '600815663475d.png', 'warning', 'vk/shahzod', 'tg/alisher', 'alisher63', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `level_2`
--
ALTER TABLE `level_2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `level_2`
--
ALTER TABLE `level_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
