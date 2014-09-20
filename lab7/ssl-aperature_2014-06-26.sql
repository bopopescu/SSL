# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: ssl-aperature
# Generation Time: 2014-06-26 15:52:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table imageKeywords
# ------------------------------------------------------------

DROP TABLE IF EXISTS `imageKeywords`;

CREATE TABLE `imageKeywords` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `imgId` int(11) unsigned NOT NULL,
  `keywordId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `imgId` (`imgId`),
  KEY `keywordId` (`keywordId`),
  CONSTRAINT `imageKeywords_ibfk_2` FOREIGN KEY (`keywordId`) REFERENCES `keywords` (`id`),
  CONSTRAINT `imageKeywords_ibfk_1` FOREIGN KEY (`imgId`) REFERENCES `images` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `imageKeywords` WRITE;
/*!40000 ALTER TABLE `imageKeywords` DISABLE KEYS */;

INSERT INTO `imageKeywords` (`id`, `imgId`, `keywordId`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,1,3),
	(4,1,4),
	(5,2,1),
	(6,2,2),
	(7,2,3),
	(8,2,4);

/*!40000 ALTER TABLE `imageKeywords` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) unsigned NOT NULL,
  `title` varchar(250) NOT NULL DEFAULT '',
  `imgPath` varchar(250) NOT NULL DEFAULT '',
  `description` text,
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `userId`, `title`, `imgPath`, `description`, `views`)
VALUES
	(1,1,'View Out the Back of the Fueler Djibouti, Africa','./assets/images/userImages/holly_1/View Out the Back of the Fueler Djibouti, Africa.jpg','View out the back of the fueler in Djibouti, Africa while fueling a CH-53.',0),
	(2,1,'Aircrew Along for the Ride 2 Djibouti, Africa','./assets/images/userImages/holly_1/Aircrew Along for the Ride 2 Djibouti, Africa.jpg','Aircrew Along for the Ride in Djibouti, Africa',0),
	(3,1,'Geoff Weers of \"The Expendables\"','./assets/images/userImages/holly_1/_DSC5220e1.jpg','Geoff Weers of \"The Expendables\" performing at the House of Blues Downtown Disney in Orlando, FL',0),
	(4,1,'Sunrise In South Jersey','./assets/images/userImages/holly_1/_DSC1517.jpg','Sunrise in south Jersey',0),
	(5,1,'Flying over Lake Assal, Djibouti, Africa','./assets/images/userImages/holly_1/Flying over Lake Assal, Djibouti, Africa.jpg','Flying over Lake Assal, Djibouti, Africa',0),
	(6,1,'Sling Load Djibouti, Africa','./assets/images/userImages/holly_1/Sling Load Djibouti, Africa.jpg','Sling load exercise in Djibouti, Africa ',0),
	(7,1,'Wine Rack','./assets/images/userImages/holly_1/_DSC8746.JPG','A wine rack from Urban Flats in Orlando, FL',0),
	(20,1,'Cape Zanpa','./assets/images/userImages/holly_1/capeZanpa.jpg','Cape Zanpa in Okinawa, Japan',0),
	(25,1,'Portlight Bulb','./assets/images/userImages/holly_1/ebaySquare.jpg','Ligtbulb icon for Portlight, LLC.',0);

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table keywords
# ------------------------------------------------------------

DROP TABLE IF EXISTS `keywords`;

CREATE TABLE `keywords` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `keywords` WRITE;
/*!40000 ALTER TABLE `keywords` DISABLE KEYS */;

INSERT INTO `keywords` (`id`, `keyword`)
VALUES
	(1,'africa'),
	(2,'hoa'),
	(3,'usmc'),
	(4,'ch-53');

/*!40000 ALTER TABLE `keywords` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `statusName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;

INSERT INTO `status` (`id`, `statusName`)
VALUES
	(1,'Active'),
	(2,'Inactive');

/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL DEFAULT '',
  `fName` varchar(250) DEFAULT NULL,
  `lName` varchar(250) DEFAULT NULL,
  `password` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(250) DEFAULT NULL,
  `statusId` int(11) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `statusId` (`statusId`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`statusId`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `fName`, `lName`, `password`, `email`, `statusId`)
VALUES
	(1,'holly','Holly','Springsteen','pass','h@gmail.com',1),
	(3,'admin','Admin','Admin','admin','admin@email.com',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
