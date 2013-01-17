-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 17 日 13:31
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `hotel`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_type` varchar(50) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lgt` varchar(20) DEFAULT NULL,
  `stime` datetime DEFAULT NULL,
  `etime` datetime DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `mdate` datetime DEFAULT NULL,
  `status` enum('draft','publish','unpublish','delete') DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `status` enum('on','delete') DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `brand_campaign`
--

CREATE TABLE IF NOT EXISTS `brand_campaign` (
  `bcid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `bid` int(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `wid` int(5) DEFAULT NULL,
  `stime` datetime DEFAULT NULL,
  `etime` datetime DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `mdate` datetime DEFAULT NULL,
  `status` enum('on','delete') DEFAULT NULL,
  PRIMARY KEY (`bcid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `brand_campaign_video`
--

CREATE TABLE IF NOT EXISTS `brand_campaign_video` (
  `bcvid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `bcid` int(5) DEFAULT NULL,
  `status` enum('on','delete') DEFAULT NULL,
  PRIMARY KEY (`bcvid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `brand_store`
--

CREATE TABLE IF NOT EXISTS `brand_store` (
  `bsid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bid` int(10) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lgt` varchar(20) DEFAULT NULL,
  `wid` int(10) DEFAULT NULL,
  `status` enum('on','delete') DEFAULT NULL,
  PRIMARY KEY (`bsid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `lat` varchar(20) DEFAULT NULL,
  `lgt` varchar(20) DEFAULT NULL,
  `wid` int(10) DEFAULT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hotel_article_taxo`
--

CREATE TABLE IF NOT EXISTS `hotel_article_taxo` (
  `hatid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `hid` int(5) DEFAULT NULL,
  `aid` int(5) DEFAULT NULL,
  `tid` int(5) DEFAULT NULL,
  PRIMARY KEY (`hatid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hotel_campaign`
--

CREATE TABLE IF NOT EXISTS `hotel_campaign` (
  `bchid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `bcid` int(5) DEFAULT NULL,
  `hid` int(5) DEFAULT NULL,
  `bid` int(10) DEFAULT NULL,
  `stime` datetime DEFAULT NULL,
  `etime` datetime DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `mdate` datetime DEFAULT NULL,
  `status` enum('on','delete') DEFAULT NULL,
  PRIMARY KEY (`bchid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hotel_user`
--

CREATE TABLE IF NOT EXISTS `hotel_user` (
  `huid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `hid` int(5) DEFAULT NULL,
  `uid` int(5) DEFAULT NULL,
  PRIMARY KEY (`huid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `lang`
--

INSERT INTO `lang` (`lid`, `locale`, `title`) VALUES
(1, 'en', 'English'),
(2, 'ch', '简体中文'),
(3, 'fr', 'Français');

-- --------------------------------------------------------

--
-- 表的结构 `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) DEFAULT NULL,
  `tdid` int(5) DEFAULT NULL,
  `tdname` varchar(50) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `pos` int(2) DEFAULT NULL,
  `status` enum('on','delete') DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msgid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hid` int(5) DEFAULT NULL,
  `room` varchar(20) DEFAULT NULL,
  `name` text,
  `subject` text,
  `content` text,
  `cdate` datetime DEFAULT NULL,
  `mdate` datetime DEFAULT NULL,
  `status` enum('on','done') DEFAULT NULL,
  PRIMARY KEY (`msgid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `taxo`
--

CREATE TABLE IF NOT EXISTS `taxo` (
  `tid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(5) DEFAULT NULL,
  `pos` int(2) DEFAULT NULL,
  `section` enum('hotel','city','brand') DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `translate_article`
--

CREATE TABLE IF NOT EXISTS `translate_article` (
  `tr_aid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(5) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `title` text,
  `content` text,
  PRIMARY KEY (`tr_aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `translate_brand_campaign_video`
--

CREATE TABLE IF NOT EXISTS `translate_brand_campaign_video` (
  `tr_bcvid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `wid` int(5) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `title` text,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tr_bcvid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `translate_brand_store`
--

CREATE TABLE IF NOT EXISTS `translate_brand_store` (
  `tr_bsid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `bsid` int(5) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `title` text,
  `content` text,
  PRIMARY KEY (`tr_bsid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `translate_hotel`
--

CREATE TABLE IF NOT EXISTS `translate_hotel` (
  `tr_hid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `bsid` int(5) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `title` text,
  `content` text,
  `address` text,
  PRIMARY KEY (`tr_hid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `translate_taxo`
--

CREATE TABLE IF NOT EXISTS `translate_taxo` (
  `tr_tid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(5) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`tr_tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `translate_world`
--

CREATE TABLE IF NOT EXISTS `translate_world` (
  `tr_wid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `wid` int(5) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `title` text,
  PRIMARY KEY (`tr_wid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `translate_world`
--

INSERT INTO `translate_world` (`tr_wid`, `wid`, `locale`, `title`) VALUES
(1, 1, 'en', 'asia');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `power` int(2) DEFAULT NULL,
  `user_type` varchar(30) DEFAULT NULL,
  `status` enum('on','off') DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `last_name`, `first_name`, `company_name`, `email`, `pwd`, `power`, `user_type`, `status`) VALUES
(1, NULL, NULL, NULL, 'dilin110@gmail.com', 'ac53cc5f88edb477217de9e40653c6b8', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `world`
--

CREATE TABLE IF NOT EXISTS `world` (
  `wid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(5) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lgt` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `world`
--

INSERT INTO `world` (`wid`, `parent_id`, `lat`, `lgt`) VALUES
(1, 0, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
