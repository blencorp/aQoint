# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.22)
# Database: bleng3_aqoint
# Generation Time: 2018-07-14 23:30:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table apps
# ------------------------------------------------------------

DROP TABLE IF EXISTS `apps`;

CREATE TABLE `apps` (
  `app_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_fname` varchar(255) DEFAULT '',
  `app_lname` varchar(255) DEFAULT NULL,
  `app_phone` varchar(255) DEFAULT NULL,
  `app_email` varchar(255) DEFAULT NULL,
  `app_reason` text,
  `app_user` int(11) DEFAULT NULL,
  `app_create_time` int(11) DEFAULT NULL,
  `app_create_ip` varchar(255) DEFAULT NULL,
  `app_create_hostname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `contact_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contact_fname` varchar(255) DEFAULT NULL,
  `contact_mname` varchar(255) DEFAULT NULL,
  `contact_lname` varchar(255) DEFAULT NULL,
  `contact_dob` varchar(255) DEFAULT NULL,
  `contact_ssn` varchar(255) DEFAULT NULL,
  `contact_ein` varchar(255) DEFAULT NULL,
  `contact_type` varchar(255) DEFAULT NULL,
  `contact_referredby` varchar(255) DEFAULT NULL,
  `contact_street1` varchar(255) DEFAULT NULL,
  `contact_street2` varchar(255) DEFAULT NULL,
  `contact_city` varchar(255) DEFAULT NULL,
  `contact_state` varchar(255) DEFAULT NULL,
  `contact_zipcode` varchar(255) DEFAULT NULL,
  `contact_country` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_website` varchar(255) DEFAULT NULL,
  `contact_details` varchar(255) DEFAULT NULL,
  `contact_edit_user` varchar(255) DEFAULT NULL,
  `contact_edit_ip` varchar(255) DEFAULT NULL,
  `contact_edit_hostname` varchar(255) DEFAULT NULL,
  `contact_create_time` int(11) unsigned DEFAULT NULL,
  `contact_edit_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `note_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `note_type` varchar(255) DEFAULT NULL,
  `note_text` text,
  `note_user` int(11) DEFAULT NULL,
  `note_create_ip` varchar(255) DEFAULT NULL,
  `note_create_hostname` varchar(255) DEFAULT NULL,
  `note_file_name` varchar(255) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `note_create_time` int(11) unsigned DEFAULT NULL,
  `note_edit_time` int(11) unsigned DEFAULT NULL,
  `note_edit_ip` varchar(255) DEFAULT NULL,
  `note_edit_hostname` varchar(255) DEFAULT NULL,
  `note_file_type` varchar(255) DEFAULT NULL,
  `note_file_desc` text,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
