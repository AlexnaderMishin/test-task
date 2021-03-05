-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 05 2021 г., 15:46
-- Версия сервера: 5.6.47
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autors`
--

CREATE TABLE `autors` (
  `id` int(11) NOT NULL,
  `FIO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `autors`
--

INSERT INTO `autors` (`id`, `FIO`) VALUES
(1, 'Mishin'),
(2, 'Sokolov'),
(3, 'Procenko'),
(4, 'Makarov'),
(5, 'Harakterov'),
(6, 'Nazarova');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Pub_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `Name`, `Pub_date`) VALUES
(1, 'PHP', '2021-03-04 15:19:52'),
(2, 'javaScript', '2021-03-03 15:19:52'),
(3, 'Python', '2021-03-02 15:20:24'),
(4, 'Java', '2021-03-01 15:20:24'),
(5, 'Perl', '2021-02-28 15:20:41'),
(6, 'Assembler', '2021-03-27 15:20:41'),
(7, 'Ruby', '2021-02-26 15:21:01'),
(8, 'С++', '2021-03-25 15:21:01'),
(9, 'Swift', '2021-03-18 15:22:06'),
(10, 'Go', '2021-02-19 15:22:06'),
(11, 'HTML', '2021-02-17 15:22:20'),
(12, 'CSS', '2021-02-18 15:22:20');

-- --------------------------------------------------------

--
-- Структура таблицы `publish`
--

CREATE TABLE `publish` (
  `id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publish`
--

INSERT INTO `publish` (`id`, `books_id`, `author_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 6, 3),
(4, 5, 3),
(5, 2, 3),
(6, 4, 3),
(7, 8, 3),
(8, 3, 3),
(9, 7, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autors`
--
ALTER TABLE `autors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `publish`
--
ALTER TABLE `publish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_id` (`books_id`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autors`
--
ALTER TABLE `autors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `publish`
--
ALTER TABLE `publish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `publish`
--
ALTER TABLE `publish`
  ADD CONSTRAINT `publish_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `autors` (`id`),
  ADD CONSTRAINT `publish_ibfk_2` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
