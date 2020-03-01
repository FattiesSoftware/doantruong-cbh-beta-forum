-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th3 01, 2020 lúc 07:07 PM
-- Phiên bản máy phục vụ: 8.0.18
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_forum`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

DROP TABLE IF EXISTS `baocao`;
CREATE TABLE IF NOT EXISTS `baocao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) COLLATE latin1_bin NOT NULL,
  `userbaocao` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `tong` int(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Đang đổ dữ liệu cho bảng `baocao`
--

INSERT INTO `baocao` (`id`, `classname`, `userbaocao`, `tong`, `date`) VALUES
(8, '9A2', 'Hoangphat', 5, '2020-03-02'),
(7, '9A1', 'Hoangphat', 15, '2020-03-02'),
(9, '9A2', 'tunganh03', 5, '2020-03-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_info`
--

DROP TABLE IF EXISTS `rating_info`;
CREATE TABLE IF NOT EXISTS `rating_info` (
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_action` varchar(20) COLLATE latin1_bin NOT NULL,
  UNIQUE KEY `topic_id` (`topic_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Đang đổ dữ liệu cho bảng `rating_info`
--

INSERT INTO `rating_info` (`topic_id`, `user_id`, `rating_action`) VALUES
(12, 9, 'like'),
(11, 9, 'dislike'),
(9, 9, 'like'),
(7, 9, 'dislike'),
(11, 8, 'like'),
(7, 8, 'like'),
(14, 9, 'dislike'),
(9, 8, 'like'),
(15, 8, 'like');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(9999) COLLATE latin1_bin NOT NULL,
  `topic_content` mediumtext COLLATE latin1_bin NOT NULL,
  `topic_creator` varchar(9999) COLLATE latin1_bin NOT NULL,
  `view` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_content`, `topic_creator`, `view`, `date`) VALUES
(13, 'Liên mít béo ú', ' hehehehhee', 'Hoangphat', '', '2020-02-29'),
(11, 'mieu ta con heo', ' con heo it long hon con cho va cho meo :(', 'Hoangphat', '1', '2020-02-27'),
(12, 'Viet Nam vo dich', ' ?', 'Hoangphat', '1', '2020-02-27'),
(14, '323232323232', ' 22', 'Hoangphat', '', '2020-02-29'),
(15, 'tung anh chim be vcl', ' dsdgsdfgfdghdfh', 'tunganh03', '', '2020-03-01'),
(9, 'mieu ta con meo', ' con meo nhin giong con cho <3', 'tunganh03', '1', '2020-02-27'),
(7, 'mieu ta con cho', ' con co co bon chan va mot dau', 'Hoangphat', '1', '2020-02-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_bin NOT NULL,
  `password` varchar(255) COLLATE latin1_bin NOT NULL,
  `email` varchar(255) COLLATE latin1_bin NOT NULL,
  `date` date NOT NULL,
  `replies` int(11) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `topics` int(11) NOT NULL DEFAULT '0',
  `profile_pic` varchar(9999) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT 'images/default_pic.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `date`, `replies`, `score`, `topics`, `profile_pic`) VALUES
(9, 'Hoangphat', 'b8fce117457ca48d98509c47a69460a58b93fbbd', 'hoangphata1k60@gmail.com', '2020-02-27', 0, 0, 0, 'images/phatdeptrai.jpg '),
(8, 'tunganh03', 'b8fce117457ca48d98509c47a69460a58b93fbbd', 'manhewq@gmail.com', '2020-02-26', 0, 0, 0, 'images/83162430_165968554816150_265956976402366464_n.jpg ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
