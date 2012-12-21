-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 12 月 21 日 08:07
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `hoteldb`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `hotel`
--

INSERT INTO `hotel` (`hid`, `lat`, `lgt`, `wid`) VALUES
(1, NULL, NULL, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `lang`
--

INSERT INTO `lang` (`lid`, `locale`, `title`) VALUES
(1, 'zh', '简体中文'),
(2, 'en', 'English'),
(3, 'jp', '日文');

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
  `cdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mdate` datetime DEFAULT NULL,
  `status` enum('on','done') DEFAULT NULL,
  PRIMARY KEY (`msgid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`msgid`, `hid`, `room`, `name`, `subject`, `content`, `cdate`, `mdate`, `status`) VALUES
(1, 1, '', '', '', 'new spa package available', '2012-12-20 14:46:33', NULL, 'on'),
(2, 1, NULL, NULL, NULL, 'restaurant under renovation', '2012-12-21 08:03:15', NULL, 'on');

-- --------------------------------------------------------

--
-- 表的结构 `taxo`
--

CREATE TABLE IF NOT EXISTS `taxo` (
  `tid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(5) DEFAULT NULL,
  `pos` int(2) DEFAULT NULL,
  `section` enum('hotel','city','ad') DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `taxo`
--

INSERT INTO `taxo` (`tid`, `parent_id`, `pos`, `section`) VALUES
(1, 0, 1, 'hotel'),
(2, 0, 2, 'city'),
(3, 0, 3, 'ad');

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
  `hid` int(5) DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `translate_taxo`
--

INSERT INTO `translate_taxo` (`tr_tid`, `tid`, `locale`, `content`) VALUES
(1, 1, 'en', 'restaurant_bar'),
(2, 1, 'en', 'spa_pool'),
(3, 1, 'en', 'concierge picks'),
(4, 2, 'en', 'attractions'),
(5, 2, 'en', 'hot event in town'),
(6, 2, 'en', 'nightlight'),
(7, 3, 'en ', 'watches_jewellery'),
(8, 3, 'en', 'auto_boats_jets'),
(9, 3, 'en', 'wine_spirits');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `translate_world`
--

INSERT INTO `translate_world` (`tr_wid`, `wid`, `locale`, `title`) VALUES
(1, 1, 'en', 'asia'),
(2, 1, 'zh', '亚洲'),
(3, 2, 'en', 'china'),
(4, 2, 'zh', '中国'),
(5, 3, 'en', 'shanghai'),
(6, 3, 'zh', '上海'),
(7, 4, 'en', 'beijing'),
(8, 4, 'zh', '北京'),
(9, 5, 'en', 'Japan'),
(10, 6, 'en', 'Tokyo'),
(11, 7, 'en', 'north america'),
(12, 8, 'en', 'usa'),
(13, 8, 'fr', 'usa');

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
  `create_ts` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login_ts` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `last_name`, `first_name`, `company_name`, `email`, `pwd`, `power`, `user_type`, `status`, `create_ts`, `last_login_ts`) VALUES
(1, NULL, NULL, NULL, 'dilin110@gmail.com', 'ac53cc5f88edb477217de9e40653c6b8', 5, NULL, 'on', NULL, '2012-12-20 04:25:34'),
(2, '', NULL, NULL, 'irisbabecat@gmail.com', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(3, NULL, NULL, NULL, 'admin', 'admin', NULL, NULL, NULL, '2012-12-19 09:31:47', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `world`
--

INSERT INTO `world` (`wid`, `parent_id`, `lat`, `lgt`) VALUES
(1, 0, NULL, NULL),
(2, 1, NULL, NULL),
(3, 2, NULL, NULL),
(4, 2, NULL, NULL),
(5, 1, NULL, NULL),
(6, 5, NULL, NULL),
(7, 0, NULL, NULL),
(8, 7, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
