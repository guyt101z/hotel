-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 02 月 07 日 09:14
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
  `title` text,
  `lat` varchar(20) DEFAULT NULL,
  `lgt` varchar(20) DEFAULT NULL,
  `stime` datetime DEFAULT NULL,
  `etime` datetime DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `mdate` datetime DEFAULT NULL,
  `status` enum('draft','published','unpublished','deleted') DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`aid`, `article_type`, `title`, `lat`, `lgt`, `stime`, `etime`, `cdate`, `mdate`, `status`) VALUES
(1, '', 'JACOB&CO - FALL COLLECTION', '', '', '2013-01-16 00:00:00', '2013-01-17 00:00:00', '0000-00-00 00:00:00', NULL, 'published'),
(2, '', 'J12 BY CHANEL', '', '', '2013-01-28 00:00:00', '0000-00-00 00:00:00', '2013-01-28 16:33:35', NULL, 'published'),
(3, '', 'RESTAURANT/BAR', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-01-28 17:35:33', NULL, 'published'),
(4, '', 'example', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-01-28 17:43:08', NULL, 'draft'),
(5, '', 'example 2', '', '', '1970-01-01 01:00:01', '1970-01-01 01:00:01', '2013-01-28 17:44:22', NULL, 'draft'),
(6, '', 'example example', '', '', '2013-01-09 00:00:00', '0000-00-00 00:00:00', '2013-01-28 17:55:51', NULL, 'draft'),
(7, '', 'dddddd', '', '', '2013-01-01 00:00:00', '2013-02-20 00:00:00', '2013-01-28 17:58:32', NULL, 'draft'),
(9, '', 'RESTAURANT/BAR', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-01-29 14:51:16', NULL, 'published'),
(10, '', 'NEW CHEF - WEIMAR GOMEZ', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-01-29 15:19:10', NULL, 'draft'),
(11, '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-02-07 14:13:04', NULL, 'draft');

-- --------------------------------------------------------

--
-- 表的结构 `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `status` enum('on','delete') DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `brand`
--

INSERT INTO `brand` (`bid`, `title`, `status`) VALUES
(1, 'Burberry', 'on'),
(2, 'Chanel', 'on'),
(3, 'BMW', 'on');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `hotel_article_taxo`
--

INSERT INTO `hotel_article_taxo` (`hatid`, `hid`, `aid`, `tid`) VALUES
(1, 1, 9, 1),
(2, 1, 10, 3),
(3, NULL, 11, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `hotel_user`
--

INSERT INTO `hotel_user` (`huid`, `hid`, `uid`) VALUES
(1, 1, 1);

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
(2, 'zh', '简体中文'),
(3, 'fr', 'French'),
(4, 'zh-TW', '‪繁體中文‬');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `taxo`
--

INSERT INTO `taxo` (`tid`, `parent_id`, `name`, `pos`, `section`) VALUES
(1, 0, 'RESAURANT/BAR', 1, 'hotel'),
(2, 0, 'SPA/POOL', 2, 'hotel'),
(3, 0, 'CONCIERGE PICKS', 3, 'hotel'),
(4, 0, 'ATTRACTIONS', 1, 'city'),
(5, 0, 'HOT EVENTS IN TOWN', 2, 'city'),
(6, 0, 'NIGHTLIFE', 3, 'city'),
(7, 0, 'WATCHES/JEWELRY', 1, 'ad'),
(8, 0, 'AUTO/BOATS/JETS', 2, 'ad'),
(9, 0, 'WINE/SPIRITS', 3, 'ad'),
(11, 0, 'FASHION', 10, 'ad'),
(12, 0, 'PROPERTIES', 0, 'ad'),
(13, 0, 'FRAGRANCES', 0, 'ad'),
(16, 0, 'AD', 1, 'ad');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `translate_article`
--

INSERT INTO `translate_article` (`tr_aid`, `aid`, `locale`, `title`, `content`) VALUES
(1, 1, 'en', 'JACOB&CO - FALL COLLECTION', 'Proin est sem, faucibus et rutrum eget, faucibus viverra metus.'),
(2, 1, 'zh', 'JACOB&CO - 秋季系列', '<p>\r\n	PROIN是周和faucibus rutrum eget，faucibus灵猫metus。PROIN是周和faucibus rutrum eget，faucibus灵猫metus。</p>\r\n'),
(3, 1, 'fr', 'test', '<p>\r\n	test test test</p>\r\n'),
(5, 1, 'zh-TW', 'zh-tw test tile', '<p>\r\n	content</p>\r\n<p>\r\n	content</p>\r\n<p>\r\n	content</p>\r\n');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `translate_brand_store`
--

INSERT INTO `translate_brand_store` (`tr_bsid`, `bsid`, `locale`, `title`, `content`) VALUES
(1, 1, 'zh', '香奈儿南京西路店sss', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;">创始人Gabrielle Chanel香奈儿于1913年在</span><a href="http://baike.baidu.com/view/64741.htm" style="color: rgb(19, 110, 194); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;" target="_blank">法国</a><span style="color: rgb(0, 0, 0); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;">巴黎创立香奈儿品牌。香奈儿的产品种类繁多，有</span><a href="http://baike.baidu.com/view/9738.htm" style="color: rgb(19, 110, 194); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;" target="_blank">服装</a><span style="color: rgb(0, 0, 0); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;">、</span><a href="http://baike.baidu.com/view/214383.htm" style="color: rgb(19, 110, 194); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;" target="_blank">珠宝</a><span style="color: rgb(0, 0, 0); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;">饰品及其配件、</span><a href="http://baike.baidu.com/view/3332.htm" style="color: rgb(19, 110, 194); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;" target="_blank">化妆品</a><span style="color: rgb(0, 0, 0); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;">、</span><a href="http://baike.baidu.com/view/22484.htm" style="color: rgb(19, 110, 194); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;" target="_blank">香水</a><span style="color: rgb(0, 0, 0); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;">，每一种产品都闻名遐迩，特别是她的香水与</span><a href="http://baike.baidu.com/view/219862.htm" style="color: rgb(19, 110, 194); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;" target="_blank">时装</a><span style="color: rgb(0, 0, 0); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;">。 香奈儿(CHANEL)是一个有80多年经历的著名品牌，香奈儿时装永远有着高雅、简洁、精美的风格，她善于突破传统，早20世纪40年代就成功地将&ldquo;五花大绑&rdquo;的</span><a href="http://baike.baidu.com/view/1375642.htm" style="color: rgb(19, 110, 194); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;" target="_blank">女装</a><span style="color: rgb(0, 0, 0); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;">推向简单、舒适，这也许就是最早的现代</span><a href="http://baike.baidu.com/view/88816.htm" style="color: rgb(19, 110, 194); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;" target="_blank">休闲服</a><span style="color: rgb(0, 0, 0); font-family: arial, 宋体, sans-serif; font-size: 14.399999618530273px; line-height: 20px;">。</span></p>\r\n'),
(3, 1, 'en', 'CHANEL SH W NANJING ROAD', '<p>\r\n	<b style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">Chanel S.A.</b><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;&nbsp;is the&nbsp;</span><a href="http://en.wikipedia.org/wiki/France" style="font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px; text-decoration: initial; color: rgb(11, 0, 128); background-image: none;" title="France">French</a><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;house under the high fashion brands that specializes in&nbsp;</span><i style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;"><a href="http://en.wikipedia.org/wiki/Haute_couture" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Haute couture">haute couture</a></i><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;and&nbsp;</span><a href="http://en.wikipedia.org/wiki/Ready-to-wear" style="font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px; text-decoration: initial; color: rgb(11, 0, 128); background-image: none;" title="Ready-to-wear">ready-to-wear</a><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;clothes,&nbsp;</span><a href="http://en.wikipedia.org/wiki/Luxury_goods" style="font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px; text-decoration: initial; color: rgb(11, 0, 128); background-image: none;" title="Luxury goods">luxury goods</a><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">, and fashion accessories.</span><sup class="reference" id="cite_ref-1" style="color: rgb(0, 0, 0); font-family: sans-serif; line-height: 1em;"><a href="http://en.wikipedia.org/wiki/Chanel#cite_note-1" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; white-space: nowrap; background-position: initial initial; background-repeat: initial initial;">[1]</a></sup><sup class="reference" id="cite_ref-directory_2-0" style="color: rgb(0, 0, 0); font-family: sans-serif; line-height: 1em;"><a href="http://en.wikipedia.org/wiki/Chanel#cite_note-directory-2" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; white-space: nowrap; background-position: initial initial; background-repeat: initial initial;">[2]</a></sup><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;In her youth, the&nbsp;</span><i style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;"><a href="http://en.wikipedia.org/wiki/Couturier" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Couturier">couturi&egrave;re</a></i><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;</span><a href="http://en.wikipedia.org/wiki/Coco_Chanel" style="font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px; text-decoration: initial; color: rgb(11, 0, 128); background-image: none;" title="Coco Chanel">Gabrielle Bonheur Chanel</a><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;gained the soubriquet &ldquo;Coco&rdquo; while a&nbsp;</span><i style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">chanteuse de caf&eacute;</i><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;in provincial France. As a fashion designer,&nbsp;</span><a href="http://en.wikipedia.org/wiki/Coco_Chanel" style="font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px; text-decoration: initial; color: rgb(11, 0, 128); background-image: none;" title="Coco Chanel">Coco Chanel</a><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;catered to women&rsquo;s taste for elegance in dress, with blouses and suits, trousers and dresses, and jewellry (gemstone and&nbsp;</span><i style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">bijouterie</i><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">) of simple design, that replaced the opulent, over-designed, and constrictive clothes and accessories of 19th-century fashion. Historically, the</span><b style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">House of Chanel</b><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;is most famous for the stylistically versatile &ldquo;</span><a href="http://en.wikipedia.org/wiki/Little_black_dress" style="font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px; text-decoration: initial; color: rgb(11, 0, 128); background-image: none;" title="Little black dress">little black dress</a><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&rdquo;, the&nbsp;</span><a href="http://en.wikipedia.org/wiki/Perfume" style="font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px; text-decoration: initial; color: rgb(11, 0, 128); background-image: none;" title="Perfume">perfume</a><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;</span><a href="http://en.wikipedia.org/wiki/Chanel_No._5" style="font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px; text-decoration: initial; color: rgb(11, 0, 128); background-image: none;" title="Chanel No. 5">No. 5 de Chanel</a><span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px; line-height: 19.200000762939453px;">&nbsp;and the Chanel Suit.</span></p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 12.800000190734863px;">\r\n	As a business enterprise, Chanel S.A. is a&nbsp;<a href="http://en.wikipedia.org/wiki/Privately_held_company" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Privately held company">privately held company</a>&nbsp;owned by&nbsp;<a href="http://en.wikipedia.org/wiki/Alain_Wertheimer" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Alain Wertheimer">Alain Wertheimer</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/Gerard_Wertheimer" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Gerard Wertheimer">Gerard Wertheimer</a>, grandsons of&nbsp;<a href="http://en.wikipedia.org/wiki/Pierre_Wertheimer" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Pierre Wertheimer">Pierre Wertheimer</a>, an early business partner of Coco Chanel. Commercially, the brands of the House of Chanel have been personified by fashion models and actresses, by women such as&nbsp;<a class="mw-redirect" href="http://en.wikipedia.org/wiki/In%C3%A8s_de_la_Fressange" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Inès de la Fressange">In&egrave;s de la Fressange</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Catherine_Deneuve" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Catherine Deneuve">Catherine Deneuve</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Carole_Bouquet" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Carole Bouquet">Carole Bouquet</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Vanessa_Paradis" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Vanessa Paradis">Vanessa Paradis</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Nicole_Kidman" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Nicole Kidman">Nicole Kidman</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Anna_Mouglalis" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Anna Mouglalis">Anna Mouglalis</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Luc%C3%ADa_Hiriart" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Lucía Hiriart">Luc&iacute;a Hiriart</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Audrey_Tautou" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Audrey Tautou">Audrey Tautou</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Keira_Knightley" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Keira Knightley">Keira Knightley</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/Marilyn_Monroe" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Marilyn Monroe">Marilyn Monroe</a>, who epitomise the independent, self-confident&nbsp;<b>Chanel Girl</b>.<sup class="reference" id="cite_ref-autogenerated1_3-0" style="line-height: 1em;"><a href="http://en.wikipedia.org/wiki/Chanel#cite_note-autogenerated1-3" style="text-decoration: initial; color: rgb(11, 0, 128); background-image: none; white-space: nowrap; background-position: initial initial; background-repeat: initial initial;">[3]</a></sup>&nbsp;At the height of her stardom in 1952, Marilyn Monroe once said she wore just a few drops of Chanel No. 5 to bed.</p>\r\n'),
(4, 1, 'fr', 'chanel', '<p>\r\n	content of chanel brand store in fr</p>\r\n'),
(5, 1, 'zh-TW', 'chanel', '<p>\r\n	zh-tw chanel&nbsp;</p>\r\n');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `translate_hotel`
--

INSERT INTO `translate_hotel` (`tr_hid`, `hid`, `locale`, `title`, `content`, `address`) VALUES
(1, 1, 'en', 'Four Seasons Hotel', NULL, 'Shanghai Pudong, 210 Century Avenue, 200120 Pudong District, Shanghai '),
(2, 1, 'zh', '四季酒店', '<p>\r\n	content of ....&nbsp;<span style="font-size: 12px;">content of ....&nbsp;</span></p>\r\n<div>\r\n	&nbsp;</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '上海浦东四季酒店, 中国 上海, 浦东世纪大道 210 号, 200120'),
(3, 2, 'en', 'ritz carlton hotel ', '<p>\r\n	ritz carlton hotel&nbsp;ritz carlton hotel&nbsp;</p>\r\n', NULL),
(4, 2, 'zh', '丽思卡尔顿酒店', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: tahoma, arial, sans-serif; font-size: 11.199999809265137px; background-color: rgb(204, 204, 204);">丽思卡尔顿酒店公司奠定全球豪华酒店的金牌标准</span></p>\r\n', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `translate_taxo`
--

INSERT INTO `translate_taxo` (`tr_tid`, `tid`, `locale`, `content`) VALUES
(1, 1, 'zh', '餐饮'),
(2, 2, 'en', 'Spa'),
(3, 3, 'en', 'Concierge Picks'),
(4, 4, 'en', 'attractions'),
(5, 5, 'en', 'HOT EVENTS IN TOWN'),
(6, 6, 'en', 'NIGHTLIFE'),
(7, 7, 'en', 'watches'),
(8, 8, 'en', 'AUTO/BOATS/JETS'),
(9, 9, 'en', 'WINE/SPIRITS'),
(10, 1, 'en', 'RESAURANT'),
(11, 4, 'zh', '景点');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `translate_world`
--

INSERT INTO `translate_world` (`tr_wid`, `wid`, `locale`, `title`) VALUES
(1, 1, 'en', 'Asia'),
(2, 2, 'en', 'China'),
(3, 3, 'zh', '上海'),
(4, 1, 'zh', '亚洲'),
(5, 2, 'zh', '中国'),
(6, 3, 'en', 'Shanghai'),
(8, 4, 'en', 'Beijing'),
(9, 4, 'zh', '北京'),
(10, 4, 'zh-TW', '北京');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `last_name`, `first_name`, `company_name`, `email`, `pwd`, `power`, `user_type`, `status`) VALUES
(1, 'Lin', 'Di', 'Global IT', 'dilin110@gmail.com', 'ac53cc5f88edb477217de9e40653c6b8', 5, NULL, 'on'),
(2, 'Li', 'Iris', 'Global IT', 'iris@carburant.fr', NULL, 5, '', 'on'),
(3, '', 'Christophe', '', 'christophe@carburant.fr', NULL, 5, '', 'on');

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
(3, 'Shanghai, China', 2, '', ''),
(4, 'Beijing', 2, '111.55555', '222.2222'),
(5, 'Japan', 1, '', ''),
(6, 'South America', 0, '', ''),
(7, 'North America', 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
