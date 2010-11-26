-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2010 年 11 月 26 日 13:13
-- サーバのバージョン: 5.1.37
-- PHP のバージョン: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `tucano`
--
CREATE DATABASE `tucano` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tucano`;

-- --------------------------------------------------------

--
-- テーブルの構造 `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_password` varchar(30) NOT NULL,
  `a_mail` varchar(60) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータをダンプしています `admin`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `discussions`
--

CREATE TABLE `discussions` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_title` varchar(50) NOT NULL,
  `u_id` int(11) NOT NULL,
  `d_body` text NOT NULL,
  `p_id` int(11) NOT NULL,
  `created` varchar(12) DEFAULT NULL,
  `modified` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`d_id`),
  KEY `d_tag` (`u_id`,`p_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `discussions`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `files`
--

CREATE TABLE `files` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `f_size` varchar(20) DEFAULT NULL,
  `f_content` varchar(1000) DEFAULT NULL,
  `created` varchar(12) DEFAULT NULL,
  `modified` varchar(12) NOT NULL,
  PRIMARY KEY (`f_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `files`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `projects`
--

CREATE TABLE `projects` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(60) NOT NULL,
  `p_content` text,
  `p_goal` varchar(200) DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `created` varchar(12) DEFAULT NULL,
  `modified` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  KEY `l_id` (`u_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- テーブルのデータをダンプしています `projects`
--

INSERT INTO `projects` VALUES(1, 'つかーの', 'さわいみながわひろさわからなるグループでグループウェア制作をおこなう', 'OSCに堂々出展', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(20) NOT NULL,
  `p_id` int(11) NOT NULL,
  `table` enum('discussions',' files','tasks') NOT NULL,
  PRIMARY KEY (`tag_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `tags`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `tasks`
--

CREATE TABLE `tasks` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `u_id` int(11) NOT NULL,
  `t_status` varchar(20) NOT NULL,
  `t_limit` varchar(12) NOT NULL,
  `t_priority` varchar(18) DEFAULT NULL,
  `t_end` varchar(50) DEFAULT NULL,
  `t_body` varchar(2000) DEFAULT NULL,
  `created` varchar(12) DEFAULT NULL,
  `modified` varchar(12) DEFAULT NULL,
  `t_begin` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`t_id`),
  KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`,`u_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `tasks`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_project` int(11) DEFAULT NULL,
  `u_name` varchar(20) NOT NULL,
  `u_mail` varchar(80) NOT NULL,
  `u_password` varchar(30) NOT NULL,
  `created` varchar(12) DEFAULT NULL,
  `modified` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_mail` (`u_mail`),
  UNIQUE KEY `u_mail_2` (`u_mail`),
  KEY `u_project` (`u_project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- テーブルのデータをダンプしています `users`
--

INSERT INTO `users` VALUES(1, 1, 'みながわ', 'minagawa', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(4, 1, 'さわい', 'sawai', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(5, 1, 'ひろさわ', 'hirosawa', 'hoge', NULL, NULL);

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`u_project`) REFERENCES `projects` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
