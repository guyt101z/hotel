--
-- HOTEL DATABASE v1 --
-- 

DROP DATABASE hoteldb;

CREATE DATABASE hoteldb;

USE hoteldb;

--
-- Table structure for table WORLD
--

CREATE TABLE world (
			 wid int(5)  unsigned NOT NULL auto_increment,
			 parent_id int(5),
			 lat varchar(20),
			 lgt varchar(20),
			 primary key(wid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



--
-- Table structure for table TRANSLATE WORLD
--

CREATE TABLE translate_world (
			 tr_wid int(5)  unsigned NOT NULL auto_increment,
			 wid int(5),
			 locale varchar(10),
			 title text,
			 primary key(tr_wid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



--
-- Table structure for table HOTEL
--

CREATE TABLE hotel (
			 hid int(5)  unsigned NOT NULL auto_increment,
			 lat varchar(20),
			 lgt varchar(20),
			 wid int(10),
			 primary key(hid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



--
-- Table structure for table TRANSLATE HOTEL
--

CREATE TABLE translate_hotel (
			 tr_hid int(5)  unsigned NOT NULL auto_increment,
			 bsid int(5),
			 locale varchar(10),
			 title text,
			 content text,
			 address text,
			 primary key(tr_hid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



--
-- Table structure for table HOTEL USERS
--

CREATE TABLE hotel_user (
			 huid int(5)  unsigned NOT NULL auto_increment,
			 hid int(5),
			 uid int(5),
			 primary key(huid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table USER
--

CREATE TABLE user (
			 uid int(5)  unsigned NOT NULL auto_increment,
			 last_name varchar(255),
			 first_name varchar(255),
			 company_name varchar(255),
			 email varchar(255),
			 pwd varchar(255),
			 power int(2),
			 user_type varchar(30),
			 status enum('on','off'),
			 primary key(uid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



--
-- Table structure for table TAXONOMY
--

CREATE TABLE taxo (
			 tid int(5)  unsigned NOT NULL auto_increment,
			 parent_id int(5),
			 pos int(2),
			 section enum('hotel','city','brand),
			 primary key(tid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table TAXONOMY TRANSLATION
--

CREATE TABLE translate_taxo (
			 tr_tid int(5)  unsigned NOT NULL auto_increment,
			 tid int(5),
			 locale varchar(10),
			 content text,
			 primary key(tr_tid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table RELATION TABLE : HOTEL / ARTICLE / TAXONOMY
--

CREATE TABLE hotel_article_taxo (
			 hatid int(5)  unsigned NOT NULL auto_increment,
			 hid int(5),
			 aid int(5),
			 tid int(5),
			 primary key(hatid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table ARTICLE
--

CREATE TABLE article (
			 aid int(10)  unsigned NOT NULL auto_increment,
			 article_type varchar(50),
			 lat varchar(20),
			 lgt varchar(20),
			 stime datetime,
			 etime datetime,
			 cdate datetime,
			 mdate datetime,
			 status enum('draft','publish','unpublish','delete'),
			 primary key(aid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table TAXONOMY ARTICLE
--

CREATE TABLE translate_article (
			 tr_aid int(5)  unsigned NOT NULL auto_increment,
			 aid int(5),
			 locale varchar(10),
			 title text,
			 content text,
			 primary key(tr_aid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table MEDIA
--

CREATE TABLE media (
			 mid int(10)  unsigned NOT NULL auto_increment,
			 locale varchar(10),
			 tdid int(5),
			 tdname varchar(50),
			 filename varchar(255),
			 pos int(2),
			 status enum('on','delete'),
			 primary key(mid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table BRANDS
--

CREATE TABLE brand (
			 bid int(10)  unsigned NOT NULL auto_increment,
			 title varchar(255),
			 status enum('on','delete'),
			 primary key(bid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table BRANDS CAMPAIGN
--


CREATE TABLE brand_campaign (
			 bcid int(5)  unsigned NOT NULL auto_increment,
			 bid int(10),
			 title varchar(255),
			 wid int(5),
			 stime datetime,
			 etime datetime,
			 cdate datetime,
			 mdate datetime,			 
			 status enum('on','delete'),
			 primary key(bcid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table BRANDS CAMPAIGN HOTELS
--

CREATE TABLE hotel_campaign (
			 bchid int(5)  unsigned NOT NULL auto_increment,
			 bcid int(5),
			 hid int(5),
			 bid int(10),
			 stime datetime,
			 etime datetime,
			 cdate datetime,
			 mdate datetime,			 
			 status enum('on','delete'),
			 primary key(bchid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table BRANDS CAMPAIGN VIDEO
--

CREATE TABLE brand_campaign_video (
			 bcvid int(5)  unsigned NOT NULL auto_increment,
			 bcid int(5),
			 status enum('on','delete'),
			 primary key(bcvid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table TRANSLATE BRANDS CAMPAIGN VIDEO
--

CREATE TABLE translate_brand_campaign_video (
			 tr_bcvid int(5)  unsigned NOT NULL auto_increment,
			 wid int(5),
			 locale varchar(10),
			 title text,
			 filename varchar(255),
			 primary key(tr_bcvid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table BRANDS STORES
--

CREATE TABLE brand_store (
			 bsid int(10)  unsigned NOT NULL auto_increment,
			 bid int(10),
			 lat varchar(20),
			 lgt varchar(20),
			 wid int(10),
			 status enum('on','delete'),
			 primary key(bsid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table TRANSLATE BRAND STORE
--

CREATE TABLE translate_brand_store (
			 tr_bsid int(5)  unsigned NOT NULL auto_increment,
			 bsid int(5),
			 locale varchar(10),
			 title text,
			 content text,
			 primary key(tr_bsid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table MESSAGE FROM HOTELS CONCIERGE
--

CREATE TABLE message (
			 msgid int(10)  unsigned NOT NULL auto_increment,
			 hid int(5),
			 room varchar(20),
			 name text,
			 subject text,
			 content text,
			 cdate datetime,
			 mdate datetime,
			 status enum('on','done'),
			 primary key(msgid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table LANGUAGE
--

CREATE TABLE lang (
			 lid int(10)  unsigned NOT NULL auto_increment,
			 local  varchar(10),
			 title varchar(100),
			 primary key(lid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
