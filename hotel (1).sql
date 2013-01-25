-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 25 日 10:39
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `brand`
--

INSERT INTO `brand` (`bid`, `title`, `status`) VALUES
(1, 'Burberry', 'on'),
(2, 'Chanel', 'on');

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
  `wid` int(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lgt` varchar(20) DEFAULT NULL,
  `status` enum('on','delete') DEFAULT NULL,
  PRIMARY KEY (`bsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `brand_store`
--

INSERT INTO `brand_store` (`bsid`, `bid`, `wid`, `name`, `lat`, `lgt`, `status`) VALUES
(1, 2, 3, 'Chanel Shanghai West Nanjing Road', '', '', 'on');

-- --------------------------------------------------------

--
-- 表的结构 `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lgt` varchar(20) DEFAULT NULL,
  `wid` int(10) DEFAULT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `hotel`
--

INSERT INTO `hotel` (`hid`, `name`, `lat`, `lgt`, `wid`) VALUES
(1, 'Four Seasons Hotel', '31.22407', '121.59', 3),
(2, 'Ritz Carlton Hotel', '', '', NULL),
(3, 'Hilton Hotel Beijing', '', '', NULL),
(4, 'Hilton Hotel Shanghai', '', '', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `lang`
--

INSERT INTO `lang` (`lid`, `locale`, `title`) VALUES
(1, 'en', 'English'),
(2, 'zh', '简体中文'),
(3, 'fr', 'French');

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
-- 表的结构 `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `request` text,
  `status` enum('pending','processed','deleted') DEFAULT 'pending',
  `created_ts` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `requests`
--

INSERT INTO `requests` (`request_id`, `request`, `status`, `created_ts`) VALUES
(1, 'return all languages in json format', 'processed', '2013-01-23 08:48:27'),
(2, '+ return all brands in json format', 'processed', '2013-01-23 08:54:55'),
(3, '192.168.1.104/api/HOTELID/brand-stores', 'pending', '2013-01-23 09:28:36'),
(4, '192.168.1.104/api/HOTELID/brands?api_key=fkasdfjlaskjdflasdlfad', 'pending', '2013-01-23 09:29:23');

-- --------------------------------------------------------

--
-- 表的结构 `taxo`
--

CREATE TABLE IF NOT EXISTS `taxo` (
  `tid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(5) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `pos` int(2) DEFAULT NULL,
  `section` enum('hotel','city','ad') DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `taxo`
--

INSERT INTO `taxo` (`tid`, `parent_id`, `name`, `pos`, `section`) VALUES
(1, 0, 'Resaurant', 0, 'hotel'),
(2, 0, 'Spa', 0, 'hotel'),
(3, 0, 'Concierge Picks', 0, 'hotel'),
(4, 0, 'Attractions', 0, 'city'),
(5, 0, 'Events', 0, 'city'),
(6, 0, 'NIGHTLIFE', 0, 'hotel'),
(7, 0, 'watches', 0, 'ad'),
(8, 0, 'auto/boats/jets', 0, 'ad'),
(9, 0, 'wine/spirits', 0, 'ad');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `translate_brand_store`
--

INSERT INTO `translate_brand_store` (`tr_bsid`, `bsid`, `locale`, `title`, `content`) VALUES
(1, 1, 'en', 'Chanel Store in West NANJING Road', '');

-- --------------------------------------------------------

--
-- 表的结构 `translate_hotel`
--

CREATE TABLE IF NOT EXISTS `translate_hotel` (
  `tr_hid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `hid` int(5) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `title` text,
  `content` text,
  `address` text,
  PRIMARY KEY (`tr_hid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `translate_hotel`
--

INSERT INTO `translate_hotel` (`tr_hid`, `hid`, `locale`, `title`, `content`, `address`) VALUES
(1, 1, 'en', 'Four Seasons Hotel', NULL, 'Shanghai Pudong, 210 Century Avenue, 200120 Pudong District, Shanghai '),
(2, 1, 'zh', '四季酒店', NULL, '上海浦东四季酒店, 中国 上海, 浦东世纪大道 210 号, 200120');

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
(1, 1, 'en', 'Resaurant'),
(2, 2, 'en', 'Spa'),
(3, 3, 'en', 'Concierge Picks'),
(4, 4, 'en', 'attractions'),
(5, 5, 'en', 'events'),
(6, 6, 'en', 'nightlife'),
(7, 7, 'en', 'watches'),
(8, 8, 'en', 'auto/boats/jets'),
(9, 9, 'en', 'wine/spirits');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `translate_world`
--

INSERT INTO `translate_world` (`tr_wid`, `wid`, `locale`, `title`) VALUES
(1, 1, 'en', 'Asia'),
(2, 2, 'en', 'China'),
(3, 3, 'zh', '上海'),
(4, 1, 'zh', '亚洲'),
(5, 2, 'zh', '中国'),
(6, 3, 'en', 'Shanghai');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `last_name`, `first_name`, `company_name`, `email`, `pwd`, `power`, `user_type`, `status`) VALUES
(1, 'Lin', 'Di', 'Global IT', 'dilin110@gmail.com', 'ac53cc5f88edb477217de9e40653c6b8', 5, NULL, 'on'),
(2, 'Li', 'Iris', '', 'iris@carburant.fr', NULL, 5, '', 'off');

-- --------------------------------------------------------

--
-- 表的结构 `world`
--

CREATE TABLE IF NOT EXISTS `world` (
  `wid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `parent_id` int(5) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lgt` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `world`
--

INSERT INTO `world` (`wid`, `name`, `parent_id`, `lat`, `lgt`) VALUES
(1, 'Asia', 0, '', ''),
(2, 'China', 1, '', ''),
(3, 'Shanghai', 2, '', ''),
(4, 'Beijing', 2, '', ''),
(5, 'Japan', 1, '', ''),
(6, 'South America', 0, '', ''),
(7, 'North America', 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
