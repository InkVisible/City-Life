-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- ����: 127.0.0.1
-- ����� ��������: ��� 04 2013 �., 21:37
-- ������ �������: 5.5.25
-- ������ PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES cp1251 */;

--
-- ���� ������: `citylife`
--
CREATE DATABASE `citylife` DEFAULT CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `citylife`;

-- --------------------------------------------------------

--
-- ��������� ������� `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user1` int(6) NOT NULL,
  `user2` int(6) NOT NULL,
  `whois` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- ���� ������ ������� `friends`
--

INSERT INTO `friends` (`id`, `user1`, `user2`, `whois`) VALUES
(1, 1, 2, '����'),
(2, 2, 1, '�����������'),
(3, 2, 3, '����'),
(4, 3, 2, '����'),
(5, 2, 4, '�����������'),
(6, 4, 2, '����'),
(7, 1, 4, '�����������'),
(8, 4, 1, '�����������');

-- --------------------------------------------------------

--
-- ��������� ������� `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user1` int(6) NOT NULL,
  `user2` int(6) NOT NULL,
  `datetime` datetime NOT NULL,
  `text` varchar(300) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- ���� ������ ������� `messages`
--

INSERT INTO `messages` (`id`, `user1`, `user2`, `datetime`, `text`) VALUES
(1, 2, 1, '2013-06-03 19:20:00', 'hello'),
(2, 1, 2, '2013-06-03 20:00:00', 'citylife');

-- --------------------------------------------------------

--
-- ��������� ������� `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `parol` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(16) NOT NULL,
  `l_name` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `stat` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `info` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`,`parol`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- ���� ������ ������� `users`
--

INSERT INTO `users` (`id`, `mail`, `parol`, `name`, `l_name`, `date`, `stat`, `info`) VALUES
(1, 'slava-osadchiy@mail.ru', '1', '�����', '�������', '1993-10-12', '0000', '***********************'),
(2, 'serega@mail.ru', '2', '������', '������', '1993-10-13', '0000', '+++++++++++++++++++'),
(3, 'max@mail.ru', '3', '������', '��������', '1993-10-14', '0000', '(((((((((((((((((((((((((((((((((('),
(4, 'dima@mail.ru', '4', '����', '������', '1993-10-15', '0000', '%%%%%%%%%%%%%%%%%%%%%');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
