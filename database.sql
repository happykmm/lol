-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 11 月 26 日 01:22
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `_posts`
--

CREATE TABLE IF NOT EXISTS `_posts` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` text NOT NULL,
  `post_content` longtext NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_category` int(10) unsigned NOT NULL DEFAULT '0',
  `post_status` int(1) NOT NULL DEFAULT '0',
  `post_parent` int(10) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_category` (`post_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `_posts`
--

INSERT INTO `_posts` (`ID`, `post_title`, `post_content`, `post_author`, `post_category`, `post_status`, `post_parent`, `post_date`, `post_modified`) VALUES
(9, '这一生只愿只要平凡快乐', '<p>要再唱这首笑忘歌</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>我们的爱我明白过了就不再回来</p>\n', '9CA549DFE1ED8B201A7AA88D15AFAD05', 0, 0, 0, '2014-11-15 13:30:56', '2014-11-15 14:06:45');

-- --------------------------------------------------------

--
-- 表的结构 `_users`
--

CREATE TABLE IF NOT EXISTS `_users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_penname` varchar(50) NOT NULL,
  `user_realname` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_nickname` varchar(50) NOT NULL,
  `user_figureurl` varchar(2083) NOT NULL,
  `user_gender` char(2) NOT NULL,
  `user_openid` varchar(100) NOT NULL,
  `user_accesstoken` varchar(100) NOT NULL,
  `user_regtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`),
  KEY `user_openid` (`user_openid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `_users`
--

INSERT INTO `_users` (`user_id`, `user_penname`, `user_realname`, `user_phone`, `user_email`, `user_nickname`, `user_figureurl`, `user_gender`, `user_openid`, `user_accesstoken`, `user_regtime`, `user_lastlogin`) VALUES
(15, '123', '123', '123', '123', '零小度Lisandro', 'http://qzapp.qlogo.cn/qzapp/101169617/9CA549DFE1ED8B201A7AA88D15AFAD05/100', '男', '9CA549DFE1ED8B201A7AA88D15AFAD05', '04601ECD6D079F4B3CF67D47337C2B6F', '2014-11-15 12:41:05', '2014-11-15 14:06:15');

-- --------------------------------------------------------

--
-- 表的结构 `_votes`
--

CREATE TABLE IF NOT EXISTS `_votes` (
  `vote_openid` varchar(100) NOT NULL,
  `vote_author` varchar(100) NOT NULL,
  KEY `vote_openid` (`vote_openid`),
  KEY `vote_author` (`vote_author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
