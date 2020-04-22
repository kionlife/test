-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Квт 22 2020 р., 03:52
-- Версія сервера: 10.3.22-MariaDB-log-cll-lve
-- Версія PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `kionl667_test`
--

-- --------------------------------------------------------

--
-- Структура таблиці `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `date` date NOT NULL,
  `track_number` int(11) NOT NULL,
  `status` varchar(128) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `receipt`
--

INSERT INTO `receipt` (`id`, `number`, `date`, `track_number`, `status`, `doc`, `subscriber_id`, `subscription_id`) VALUES
(1, 333, '2020-04-20', 123, 'Внесенный', '', 0, 0),
(2, 222, '2020-04-20', 124, 'Внесенный', '', 0, 0),
(3, 444, '2020-04-20', 125, 'Внесенный', '', 0, 0),
(4, 555, '2020-04-20', 126, 'Внесенный', '', 0, 0),
(57, 0, '0000-00-00', 0, 'Новый', 'logo.png', 2, 1),
(55, 0, '0000-00-00', 0, 'Новый', 'google.jpg', 1, 1),
(54, 0, '0000-00-00', 0, 'Новый', 'gant_logo.png', 2, 3),
(53, 0, '0000-00-00', 0, 'Новый', 'apple.jpeg', 3, 2);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
