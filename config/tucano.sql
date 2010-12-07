-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2010 年 12 月 03 日 13:14
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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータをダンプしています `admin`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL,
  `c_comment` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `t_id` (`t_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- テーブルのデータをダンプしています `comments`
--

INSERT INTO `comments` VALUES(1, 2, 'test', NULL, NULL, 1);
INSERT INTO `comments` VALUES(2, 2, 'test', NULL, NULL, 1);
INSERT INTO `comments` VALUES(3, 2, 'test', NULL, NULL, 1);
INSERT INTO `comments` VALUES(4, 2, 'test', NULL, NULL, 1);
INSERT INTO `comments` VALUES(5, 2, 'da', NULL, NULL, 1);
INSERT INTO `comments` VALUES(6, 2, 'da', NULL, NULL, 1);
INSERT INTO `comments` VALUES(7, 2, 'da', NULL, NULL, 1);
INSERT INTO `comments` VALUES(8, 2, 'ddfdfda', NULL, NULL, 1);
INSERT INTO `comments` VALUES(9, 2, 'ddfdfda', NULL, NULL, 1);
INSERT INTO `comments` VALUES(10, 2, 'ddfdfda', NULL, NULL, 1);
INSERT INTO `comments` VALUES(11, 2, 'うまくいくはず', NULL, NULL, 1);
INSERT INTO `comments` VALUES(12, 2, 'うまくいくはず', NULL, NULL, 1);
INSERT INTO `comments` VALUES(13, 2, 'うまくいくはず', NULL, NULL, 1);
INSERT INTO `comments` VALUES(14, 7, 'foooo', NULL, NULL, 1);
INSERT INTO `comments` VALUES(15, 7, 'てえっっっｓ', NULL, NULL, 1);
INSERT INTO `comments` VALUES(16, 6, 'unko\r\n', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `discussions`
--

CREATE TABLE `discussions` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_title` varchar(50) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `s_id` int(11) DEFAULT '0',
  PRIMARY KEY (`d_id`),
  KEY `d_tag` (`u_id`,`p_id`),
  KEY `p_id` (`p_id`),
  KEY `s_id` (`s_id`)
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
  `f_content` longblob,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `files`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE `members` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `careated` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `u_id` (`u_id`,`p_id`),
  KEY `p_id` (`p_id`),
  KEY `u_id_2` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- テーブルのデータをダンプしています `members`
--

INSERT INTO `members` VALUES(3, 1, 1, NULL, NULL);
INSERT INTO `members` VALUES(4, 14, 1, NULL, NULL);
INSERT INTO `members` VALUES(5, 16, 1, NULL, NULL);
INSERT INTO `members` VALUES(6, 17, 1, NULL, NULL);
INSERT INTO `members` VALUES(7, 17, 1, NULL, NULL);
INSERT INTO `members` VALUES(8, 17, 1, NULL, NULL);

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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  KEY `l_id` (`u_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- テーブルのデータをダンプしています `projects`
--

INSERT INTO `projects` VALUES(1, 'つかーの', 'さわいみながわひろさわからなるグループでグループウェア制作をおこなう', 'OSCに堂々出展', 1, NULL, NULL);
INSERT INTO `projects` VALUES(4, 'テストプロ', 'プロジェクトIDがしっかり登録されているか確認する', 'ノットNULL', 6, NULL, NULL);
INSERT INTO `projects` VALUES(5, 'unchi', 'クソみたいな', 'おっきいやつ', 7, NULL, NULL);
INSERT INTO `projects` VALUES(6, 'unchi2', 'クソみたいな2', 'おっきいやつ2', 8, NULL, NULL);
INSERT INTO `projects` VALUES(7, 'unchi3', 'クソみたいな3', 'おっきいやつ3', 9, NULL, NULL);
INSERT INTO `projects` VALUES(8, 'unchi3', 'クソみたいな3', 'おっきいやつ3', 9, NULL, NULL);
INSERT INTO `projects` VALUES(9, 'unchi3', 'クソみたいな3', 'おっきいやつ3', 11, NULL, NULL);
INSERT INTO `projects` VALUES(10, 'tesssss', 'kjdlfjakljl', 'dddddfdkjf', 12, NULL, NULL);
INSERT INTO `projects` VALUES(11, 'aaa', 'aaa', 'aaa', 13, NULL, NULL);
INSERT INTO `projects` VALUES(12, 'bbb', 'bbb', 'bbb', 14, NULL, NULL);
INSERT INTO `projects` VALUES(13, 'bbb', 'bbb', 'bbb', 14, NULL, NULL);
INSERT INTO `projects` VALUES(14, 'CCC', 'CCC', 'ccc', 16, NULL, NULL);
INSERT INTO `projects` VALUES(15, 'ddd', 'ddd', 'ddd', 17, NULL, NULL);
INSERT INTO `projects` VALUES(16, 'ddd', 'ddd', 'ddd', 17, NULL, NULL);
INSERT INTO `projects` VALUES(17, 'ddd', 'ddd', 'ddd', 17, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `responses`
--

CREATE TABLE `responses` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(11) NOT NULL,
  `r_body` text NOT NULL,
  `u_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `d_id` (`d_id`,`u_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `responses`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `statuses`
--

CREATE TABLE `statuses` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_status` varchar(20) NOT NULL,
  `s_place` varchar(10) NOT NULL,
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `s_status` (`s_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- テーブルのデータをダンプしています `statuses`
--

INSERT INTO `statuses` VALUES(1, '未設定', 'make');
INSERT INTO `statuses` VALUES(2, '作業中', 'make');
INSERT INTO `statuses` VALUES(3, '終了', 'make');
INSERT INTO `statuses` VALUES(4, '待機', 'make');
INSERT INTO `statuses` VALUES(5, '未完了', 'repo');
INSERT INTO `statuses` VALUES(6, '完了', 'repo');

-- --------------------------------------------------------

--
-- テーブルの構造 `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(20) NOT NULL,
  `p_id` int(11) NOT NULL,
  `place` enum('discussions',' files','tasks') NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- テーブルのデータをダンプしています `tags`
--

INSERT INTO `tags` VALUES(1, '未設定', 1, 'tasks', NULL, NULL);
INSERT INTO `tags` VALUES(2, '開発', 1, 'tasks', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `tasks`
--

CREATE TABLE `tasks` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `t_limit` varchar(12) NOT NULL,
  `t_priority` varchar(18) DEFAULT NULL,
  `t_end` varchar(50) DEFAULT NULL,
  `t_body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `t_begin` varchar(12) DEFAULT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`t_id`),
  KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`,`u_id`),
  KEY `u_id` (`u_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- テーブルのデータをダンプしています `tasks`
--

INSERT INTO `tasks` VALUES(1, 1, 'モーニングコール', 4, '2010/11/29', '朝、頼む・・', '皆川が起き上がる', 'むくり・・むくり・・', NULL, NULL, NULL, 1);
INSERT INTO `tasks` VALUES(2, 1, 'さんぽ１００キロ', 4, '2010/11/30', '今すぐ', 'ゴール', 'フルマラソン２回半だし', NULL, NULL, NULL, 1);
INSERT INTO `tasks` VALUES(3, 1, 'github id登録', 5, '2010/11/29', 'はやく', 'tucanoをウォッチする', 'gitをインストール\r\ngithubのID登録\r\n鍵の登録\r\ntucanoをウォッチ', NULL, NULL, NULL, 2);
INSERT INTO `tasks` VALUES(6, 1, 'なまえ', 4, 'asita', 'ganba', 'nasi', 'ganbatte.', NULL, NULL, NULL, 1);
INSERT INTO `tasks` VALUES(7, 1, 'うおいるえお', 4, 'daklj', 'kjldkldkjl', 'kjllsklj', 'k;ejkdjkdl', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) NOT NULL,
  `u_mail` varchar(80) NOT NULL,
  `u_password` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_mail` (`u_mail`),
  UNIQUE KEY `u_mail_2` (`u_mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- テーブルのデータをダンプしています `users`
--

INSERT INTO `users` VALUES(1, 'みながわ', 'minagawa', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(4, 'さわい', 'sawai', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(5, 'ひろさわ', 'hirosawa', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(6, 'ワシ', 'washi', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(7, 'トイレットペッパーマン', 'wc', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(8, 'トイレットペッパーマン2', 'washlet', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(9, 'トイレットペッパーマン3', 'washlet2', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(11, 'トイレットペッパーマン5', 'washlet3', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(12, 'oreore', 'sawasawa', 'hoge', NULL, NULL);
INSERT INTO `users` VALUES(13, 'aaa', 'aaa', 'aaa', NULL, NULL);
INSERT INTO `users` VALUES(14, 'bbb', 'bbb', 'bbb', NULL, NULL);
INSERT INTO `users` VALUES(16, 'ccc', 'ccc', 'ccc', NULL, NULL);
INSERT INTO `users` VALUES(17, 'ddd', 'ddd', 'ddd', NULL, NULL);

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `tasks` (`t_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `discussions_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`);

--
-- テーブルの制約 `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `discussions` (`d_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`s_id`) REFERENCES `statuses` (`s_id`),
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
