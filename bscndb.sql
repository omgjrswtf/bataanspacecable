/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.1.33-MariaDB : Database - bscndb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bscndb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bscndb`;

/*Table structure for table `ipcr_db` */

DROP TABLE IF EXISTS `ipcr_db`;

CREATE TABLE `ipcr_db` (
  `ipcrid` int(11) NOT NULL AUTO_INCREMENT,
  `ipcr_wwt` varchar(255) DEFAULT NULL,
  `ipcr_idno` int(11) DEFAULT NULL,
  `ipcr_empno` int(11) DEFAULT NULL,
  `ipcr_atcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ipcrid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ipcr_db` */

insert  into `ipcr_db`(`ipcrid`,`ipcr_wwt`,`ipcr_idno`,`ipcr_empno`,`ipcr_atcreate`) values 
(1,'asdsad',123456,123456,'2018-07-16 16:28:23'),
(2,'Illegal Parking',213217,891234,'2018-07-20 15:50:22'),
(3,'Illegal Parking',891234,213217,'2018-07-20 15:52:13'),
(4,'Speeding to Fast',891234,213217,'2018-07-20 15:56:46'),
(5,'No OR CR',891234,213217,'2018-07-20 15:58:48'),
(6,'No Plate',891234,213217,'2018-07-20 16:20:35'),
(7,'Lost Plate',891234,213217,'2018-07-26 11:38:42');

/*Table structure for table `ref_areas` */

DROP TABLE IF EXISTS `ref_areas`;

CREATE TABLE `ref_areas` (
  `areaid` int(11) NOT NULL AUTO_INCREMENT,
  `ar_codebrgy` varchar(11) NOT NULL,
  `ar_barangay` varchar(250) NOT NULL,
  `ar_codemuni` varchar(11) NOT NULL,
  `ar_municipality` varchar(250) NOT NULL,
  `ar_codeprov` varchar(11) NOT NULL,
  `ar_province` varchar(250) NOT NULL,
  `ar_zipcode` int(11) NOT NULL,
  `ar_status` int(2) NOT NULL,
  `ar_description` text NOT NULL,
  `ar_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ar_updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`areaid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ref_areas` */

insert  into `ref_areas`(`areaid`,`ar_codebrgy`,`ar_barangay`,`ar_codemuni`,`ar_municipality`,`ar_codeprov`,`ar_province`,`ar_zipcode`,`ar_status`,`ar_description`,`ar_createat`,`ar_updateat`) values 
(1,'arb01','Tenejero','arm01','Balanga','arp01','Bataan',2100,1,'Balanga Location','2019-02-07 09:03:27','2019-02-07 09:03:27'),
(5,'arb01','Cataning','arm01','Balanga','arp01','Bataan',2100,1,'Balanga Location','2019-02-19 09:06:30','2019-02-19 09:16:19'),
(6,'arb01','Cupang','arm01','Balanga','arp01','Bataan',2100,1,'Balanga Location','2019-02-19 09:10:28','2019-02-19 09:16:26');

/*Table structure for table `ref_bundles` */

DROP TABLE IF EXISTS `ref_bundles`;

CREATE TABLE `ref_bundles` (
  `bundle_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_code` varbinary(4) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_volume` int(11) NOT NULL,
  `b_price` int(255) NOT NULL,
  `b_status` int(4) NOT NULL,
  `b_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `b_updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bundle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ref_bundles` */

insert  into `ref_bundles`(`bundle_id`,`b_code`,`b_name`,`b_volume`,`b_price`,`b_status`,`b_createat`,`b_updateat`) values 
(1,'B1','5 mbps plan 1000',5,1000,1,'2019-03-04 10:56:40','2019-02-19 09:59:25'),
(2,'B2','10 mbps plan 1000',10,1250,1,'2019-03-04 10:56:43','2019-02-19 09:58:44'),
(3,'B3','20 mbps plan 1000',20,1500,1,'2019-03-04 10:56:46','2019-02-28 14:21:37'),
(4,'B4','50 mbps plan 1000',50,2500,1,'2019-03-04 10:56:49','2019-02-28 14:22:04'),
(5,'B5','100 mbps plan 1000',100,3500,1,'2019-03-04 10:56:52','2019-02-28 14:22:21');

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_firstname` varchar(100) NOT NULL,
  `a_middlename` varchar(100) NOT NULL,
  `a_lastname` varchar(100) NOT NULL,
  `a_username` varchar(100) NOT NULL,
  `a_password` varchar(100) NOT NULL,
  `a_address` text NOT NULL,
  `a_datebirth` date DEFAULT NULL,
  `a_contact` varchar(13) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_role` int(2) NOT NULL,
  `a_status` int(2) NOT NULL,
  `a_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `a_updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`admin_id`,`a_firstname`,`a_middlename`,`a_lastname`,`a_username`,`a_password`,`a_address`,`a_datebirth`,`a_contact`,`a_email`,`a_role`,`a_status`,`a_createat`,`a_updateat`) values 
(1,'Admin','Real','One','adminone','qwerty123','sample address','1996-11-30','2147483647','sample@sample.com',0,1,'2019-02-18 17:49:15','2019-02-18 10:49:15'),
(6,'John','Rex','Salvador','moveone','qwerty123','123 Martin St. Omboy Abucay Bataan','1996-12-30','1546548604','johnrex.salvador3013@yahoo.com',0,1,'2019-02-18 17:50:05','2019-02-18 10:50:05');

/*Table structure for table `tbl_billing` */

DROP TABLE IF EXISTS `tbl_billing`;

CREATE TABLE `tbl_billing` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_subscriptionid` int(11) NOT NULL,
  `b_userid` int(11) NOT NULL,
  `b_username` varchar(100) NOT NULL,
  `b_usercontact` int(13) NOT NULL,
  `b_adminid` int(11) NOT NULL,
  `b_adminstatus` varchar(100) NOT NULL,
  `b_adminname` varchar(100) NOT NULL,
  `b_admincontact` int(100) NOT NULL,
  `b_dueyear` int(11) NOT NULL,
  `b_duedate` int(11) NOT NULL,
  `b_address` text NOT NULL,
  `b_ycoordinates` int(100) NOT NULL,
  `b_xcoordinates` int(100) NOT NULL,
  `b_barangay` int(4) NOT NULL,
  `b_province` int(4) NOT NULL,
  `b_municipality` int(4) NOT NULL,
  `b_zipcode` int(11) NOT NULL,
  `b_active` int(2) NOT NULL,
  `b_status` int(2) NOT NULL,
  `b_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `b_updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`billing_id`),
  KEY `user_id` (`b_userid`),
  KEY `admin_id` (`b_adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_billing` */

/*Table structure for table `tbl_client` */

DROP TABLE IF EXISTS `tbl_client`;

CREATE TABLE `tbl_client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_fname` varchar(255) NOT NULL,
  `c_mname` varchar(255) NOT NULL,
  `c_lname` varchar(255) NOT NULL,
  `c_contact` varchar(13) NOT NULL,
  `c_gender` varchar(4) NOT NULL,
  `c_datebirth` date NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `c_status` int(4) NOT NULL,
  `c_activity` int(4) NOT NULL,
  `c_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `c_updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_client` */

insert  into `tbl_client`(`client_id`,`c_fname`,`c_mname`,`c_lname`,`c_contact`,`c_gender`,`c_datebirth`,`c_email`,`c_password`,`c_status`,`c_activity`,`c_createat`,`c_updateat`) values 
(1,'John Rex','Bobijes','Salvador','09153373957','M','1996-11-30','rex@helply.ph','qwerty12',1,3,'2019-02-26 13:38:17','2019-03-04 01:49:55'),
(3,'John Rex','Bobijes','Salvador','2147483647','M','1996-11-30','johnrex.salvador3013@yahoo.com','qwerty123',1,3,'2019-02-26 16:54:21','2019-02-26 09:53:51'),
(8,'John Rex','Rex','Salvador','09153373957','M','1996-11-30','sample@sample.com','qwerty123',1,0,'2019-03-10 19:56:25','2019-03-05 20:41:42'),
(9,'John Rex','Bobijes','Salvador','09153373957','John','1996-11-30','no_name@gmail.com','123456789',1,3,'2019-03-14 14:12:07','2019-03-14 14:45:26');

/*Table structure for table `tbl_clientlocation` */

DROP TABLE IF EXISTS `tbl_clientlocation`;

CREATE TABLE `tbl_clientlocation` (
  `clientloc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_userid` int(11) NOT NULL,
  `cl_unit` int(11) NOT NULL,
  `cl_block` int(11) NOT NULL,
  `cl_barangay` varchar(250) NOT NULL,
  `cl_municipality` varchar(250) NOT NULL,
  `cl_province` varchar(250) NOT NULL,
  `cl_zipcode` int(11) NOT NULL,
  `cl_description` text NOT NULL,
  `cl_status` int(4) NOT NULL,
  `cl_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cl_updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`clientloc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_clientlocation` */

insert  into `tbl_clientlocation`(`clientloc_id`,`cl_userid`,`cl_unit`,`cl_block`,`cl_barangay`,`cl_municipality`,`cl_province`,`cl_zipcode`,`cl_description`,`cl_status`,`cl_createat`,`cl_updateat`) values 
(1,1,123,2134,'Omboy','Abucay','Bataan',2114,'123 Martin St. Omboy Abucay Bataan 2114',1,'2019-02-28 21:04:29','2019-03-04 02:58:30'),
(5,8,1234,0,'Cataning','Balanga','Bataan',2114,'asdasdsa asdas sa1234 asd ',1,'2019-03-05 21:24:15','2019-03-05 21:26:34'),
(6,8,123,0,'Cataning','Balanga','Bataan',2114,'asdasdsa asdas sa1234 asd ',1,'2019-03-05 21:24:34','2019-03-05 21:24:34'),
(7,9,123,0,'Omboy','Abucay','Bataan',2114,'123 Martin St. Omboy Abucay Bataan',1,'2019-03-14 14:28:00','2019-03-14 14:30:58'),
(8,9,123,0,'Omboy','Abucay','Bataan',2114,'123 Martin St. Omboy Abucay Bataan',1,'2019-03-14 14:28:15','2019-03-14 14:28:15'),
(9,9,123,0,'Omboy','Abucay','Bataan',2114,'123 Martin St. Omboy Abucay Bataan',1,'2019-03-14 14:28:42','2019-03-14 14:28:42'),
(10,9,123,0,'Omboy','Abucay','Bataan',2114,'123 Martin St. Omboy Abucay Bataan',1,'2019-03-14 14:29:26','2019-03-14 14:29:26');

/*Table structure for table `tbl_sms` */

DROP TABLE IF EXISTS `tbl_sms`;

CREATE TABLE `tbl_sms` (
  `send_id` int(11) NOT NULL AUTO_INCREMENT,
  `snd_userid` int(11) NOT NULL,
  `snd_message` text NOT NULL,
  `snd_contact` varchar(13) DEFAULT NULL,
  `snd_transactionid` int(11) DEFAULT NULL,
  `snd_status` int(4) DEFAULT NULL,
  `snd_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `snd_updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`send_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sms` */

insert  into `tbl_sms`(`send_id`,`snd_userid`,`snd_message`,`snd_contact`,`snd_transactionid`,`snd_status`,`snd_createat`,`snd_updateat`) values 
(3,8,'Your schedule of your verification was already pending to the system. Thank You','09153373957',0,1,'2019-03-11 01:25:13','2019-03-11 01:25:13'),
(4,8,'Scheduling your request for verifying is already accepeted please visit at the site on this schedule thank()','09153373957',0,1,'2019-03-11 09:24:56','2019-03-11 09:24:56'),
(5,8,'Reminder for tommorow please visit at the site on this schedule thank()','09153373957',0,1,'2019-03-11 09:40:29','2019-03-11 09:40:29'),
(6,9,'Your schedule of your verification was already pending to the system. Thank You','09153373957',0,1,'2019-03-14 14:40:34','2019-03-14 14:40:34'),
(7,9,'Scheduling your request for verifying is already accepeted please visit at the site on this schedule thank()','09153373957',0,1,'2019-03-14 14:42:21','2019-03-14 14:42:21'),
(8,9,'Reminder for tommorow please visit at the site on this schedule thank16 - 03 - 2019','09153373957',0,1,'2019-03-14 14:44:55','2019-03-14 14:44:55'),
(9,9,'Reminder for tommorow please visit at the site on this schedule thank16 - 03 - 2019','09153373957',0,1,'2019-03-14 14:45:26','2019-03-14 14:45:26');

/*Table structure for table `tbl_subcription` */

DROP TABLE IF EXISTS `tbl_subcription`;

CREATE TABLE `tbl_subcription` (
  `subcription_id` int(11) NOT NULL AUTO_INCREMENT,
  `sb_userid` int(11) NOT NULL,
  `sb_username` varchar(255) NOT NULL,
  `sb_usercontact` varchar(255) NOT NULL,
  `sb_dueyear` int(11) NOT NULL,
  `sb_duedate` int(11) NOT NULL,
  `sb_xcoordinates` int(100) NOT NULL,
  `sb_ycoordinates` int(100) NOT NULL,
  `sb_types` varchar(4) NOT NULL,
  `sb_status` int(4) NOT NULL,
  `sb_active` int(4) NOT NULL,
  `sb_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sb_updateat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`subcription_id`),
  KEY `user_id` (`sb_userid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subcription` */

insert  into `tbl_subcription`(`subcription_id`,`sb_userid`,`sb_username`,`sb_usercontact`,`sb_dueyear`,`sb_duedate`,`sb_xcoordinates`,`sb_ycoordinates`,`sb_types`,`sb_status`,`sb_active`,`sb_createat`,`sb_updateat`) values 
(1,1,'John Rex Bobijes Salvador','09153373957',2019,65,15,121,'B1',1,1,'2019-03-04 10:59:35','2019-03-04 10:23:16'),
(2,8,'John Rex Rex Salvador','09153373957',2019,72,15,121,'B1',1,1,'2019-03-11 17:31:22','2019-03-11 17:31:22'),
(3,9,'John Rex Bobijes Salvador','09153373957',2019,75,15,121,'B1',1,1,'2019-03-14 21:47:00','2019-03-14 21:47:00');

/*Table structure for table `tbl_verifyschedule` */

DROP TABLE IF EXISTS `tbl_verifyschedule`;

CREATE TABLE `tbl_verifyschedule` (
  `verifysched_id` int(11) NOT NULL AUTO_INCREMENT,
  `vshcd_userid` int(11) NOT NULL,
  `vschd_billing` varchar(255) NOT NULL,
  `vsch_id` varchar(255) NOT NULL,
  `vsch_date` int(4) NOT NULL,
  `vsch_year` int(4) NOT NULL,
  `vsch_stage` int(4) NOT NULL,
  `vsch_status` int(4) NOT NULL,
  `vsch_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vsch_updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`verifysched_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_verifyschedule` */

insert  into `tbl_verifyschedule`(`verifysched_id`,`vshcd_userid`,`vschd_billing`,`vsch_id`,`vsch_date`,`vsch_year`,`vsch_stage`,`vsch_status`,`vsch_createat`,`vsch_updateat`) values 
(4,8,'electricty','passport',71,2019,4,1,'2019-03-11 01:25:13','2019-03-11 09:50:06'),
(5,9,'water','tin',74,2019,4,1,'2019-03-14 14:40:34','2019-03-14 14:45:26');

/*Table structure for table `tbl_veriyrequirement` */

DROP TABLE IF EXISTS `tbl_veriyrequirement`;

CREATE TABLE `tbl_veriyrequirement` (
  `verify_id` int(11) NOT NULL AUTO_INCREMENT,
  `ver_userid` int(11) NOT NULL,
  `ver_profbilling` text,
  `ver_id` text,
  `ver_xcoordinates` varchar(255) DEFAULT NULL,
  `ver_ycoordinates` varchar(255) DEFAULT NULL,
  `ver_stage` int(4) NOT NULL,
  `ver_status` int(4) NOT NULL,
  `ver_createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ver_updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`verify_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_veriyrequirement` */

insert  into `tbl_veriyrequirement`(`verify_id`,`ver_userid`,`ver_profbilling`,`ver_id`,`ver_xcoordinates`,`ver_ycoordinates`,`ver_stage`,`ver_status`,`ver_createat`,`ver_updateat`) values 
(1,1,NULL,NULL,' 14.719871800000002 ',' 120.53694279999999 ',1,1,'2019-03-04 09:42:28','2019-03-04 09:42:30'),
(4,8,'electricty','passport',' 14.719851 ',' 120.5369514 ',3,1,'2019-03-05 21:24:15','2019-03-05 21:24:15'),
(5,9,'water','tin',' 14.676376999999999 ',' 120.53255139999999 ',3,1,'2019-03-14 14:30:58','2019-03-14 14:30:58');

/*Table structure for table `user_db` */

DROP TABLE IF EXISTS `user_db`;

CREATE TABLE `user_db` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) DEFAULT NULL,
  `u_position` varchar(255) DEFAULT NULL,
  `u_employee` varchar(255) DEFAULT NULL,
  `u_ipcrNo` varchar(255) DEFAULT NULL,
  `u_password` varchar(255) DEFAULT NULL,
  `u_active` int(1) DEFAULT NULL,
  `u_status` int(1) DEFAULT NULL,
  `u_atcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_atupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `user_db` */

insert  into `user_db`(`user_id`,`u_name`,`u_position`,`u_employee`,`u_ipcrNo`,`u_password`,`u_active`,`u_status`,`u_atcreate`,`u_atupdate`) values 
(1,'omgjrswtf','admin','123456','123456','123456',0,1,'2018-07-15 15:11:59','2018-07-16 14:19:41'),
(2,'omgjrswtf','admin','123456','123456','123456',1,1,'2018-07-15 15:12:16','2018-07-15 15:12:16'),
(3,'omgjrswtf','admin','123456','123456','123456',1,1,'2018-07-15 15:15:54','2018-07-15 15:15:54'),
(4,'johnrx',NULL,'091234','0981234','qwe123',1,2,'2018-07-15 15:48:59','2018-07-15 18:21:48'),
(5,'darius',NULL,'891234','213217','qwerty',1,3,'2018-07-15 16:48:59','2018-07-16 04:21:29'),
(6,'admin',NULL,'5412323','321312','admin',1,1,'2018-07-15 18:45:21','2018-07-15 18:45:21'),
(7,'asdsadsa',NULL,'1231908','09534','dasad213',0,2,'2018-07-16 14:29:11','2018-07-16 14:29:11'),
(8,'asdsadsa',NULL,'1231908','09534','dasad213',0,2,'2018-07-16 14:29:28','2018-07-16 14:29:28'),
(9,'shaward',NULL,'213987','876311','estricojs',1,1,'2018-07-16 14:29:52','2018-07-16 14:30:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
