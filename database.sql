-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Време на генериране: 20 дек 2016 в 22:43
-- Версия на сървъра: 5.5.52-cll
-- Версия на PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `gavadino_spd`
--

-- --------------------------------------------------------

--
-- Структура на таблица `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Схема на данните от таблица `items`
--

INSERT INTO `items` (`id`, `url`, `name`, `created_at`, `updated_at`) VALUES
(6, 'http://bg.sportsdirect.com/adidas-goletto-tf-football-boots-mens-263041?colcode=26304108', 'Goletto TF Football Boots Mens', '2016-12-10 21:07:07', '2016-12-10 23:15:45'),
(7, 'http://bg.sportsdirect.com/adidas-mundial-team-mens-astro-turf-trainers-263016?colcode=26301640', 'Mundial Team Mens Astro Turf Trainers', '2016-12-10 21:52:21', '2016-12-10 23:15:46'),
(8, 'http://bg.sportsdirect.com/usa-pro-lazulite-ladies-training-shoes-270142?colcode=27014226', 'USA Pro Lazulite Ladies Training Shoes', '2016-12-11 12:04:05', '2016-12-11 12:34:59'),
(9, 'http://www.sportsdirect.com/nike-tanjun-trainers-ladies-274001?colcode=27400102', 'Nike Tanjun Trainers Ladies', '2016-12-11 12:38:21', '2016-12-11 12:38:36');

-- --------------------------------------------------------

--
-- Структура на таблица `prices`
--

CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Схема на данните от таблица `prices`
--

INSERT INTO `prices` (`id`, `item_id`, `price`, `created_at`, `updated_at`) VALUES
(10, 7, '29,99 €', '2016-12-10 22:30:18', '2016-12-10 22:30:18'),
(9, 6, '25,99 €', '2016-12-10 22:30:17', '2016-12-10 22:30:17'),
(8, 7, '69,99 €', '2016-12-10 22:04:49', '2016-12-10 22:04:49'),
(7, 6, '25,99 €', '2016-12-10 22:04:49', '2016-12-10 22:04:49'),
(11, 6, '35,99 €', '2016-12-10 23:15:45', '2016-12-10 23:15:45'),
(12, 7, '89,99 €', '2016-12-10 23:15:46', '2016-12-10 23:15:46'),
(13, 8, '29,99 €', '2016-12-11 12:34:59', '2016-12-11 12:34:59'),
(14, 9, '53,99 €', '2016-12-11 12:38:36', '2016-12-11 12:38:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
