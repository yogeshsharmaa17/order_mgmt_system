# order_mgmt_system
Order Management System


Database : 

/*
SQLyog Community v9.60 Beta3
MySQL - 5.5.5-10.1.10-MariaDB : Database - oms_db
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `oms_db_courier_company_master_tbl` */

CREATE TABLE `oms_db_courier_company_master_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(550) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_courier_company_master_tbl` */

LOCK TABLES `oms_db_courier_company_master_tbl` WRITE;

UNLOCK TABLES;

/*Table structure for table `oms_db_master_item_list_tbl` */

CREATE TABLE `oms_db_master_item_list_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `item_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `status` enum('avialable','out_of_stock') COLLATE utf8_unicode_ci NOT NULL,
  `listed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `listed_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_master_item_list_tbl` */

LOCK TABLES `oms_db_master_item_list_tbl` WRITE;

UNLOCK TABLES;

/*Table structure for table `oms_db_order_items_tbl` */

CREATE TABLE `oms_db_order_items_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(550) CHARACTER SET latin1 DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `master_list_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_order_items_tbl` */

LOCK TABLES `oms_db_order_items_tbl` WRITE;

insert  into `oms_db_order_items_tbl`(`id`,`order_id`,`name`,`price`,`quantity`,`master_list_id`,`created_at`,`updated_at`) values (7,1,'mug123','25.00',20,0,'2016-11-26 13:11:34','0000-00-00 00:00:00');

UNLOCK TABLES;

/*Table structure for table `oms_db_order_items_temp_tbl` */

CREATE TABLE `oms_db_order_items_temp_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(550) CHARACTER SET latin1 DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `master_list_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_order_items_temp_tbl` */

LOCK TABLES `oms_db_order_items_temp_tbl` WRITE;

UNLOCK TABLES;

/*Table structure for table `oms_db_order_tbl` */

CREATE TABLE `oms_db_order_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_email_id` varchar(550) CHARACTER SET latin1 NOT NULL,
  `user_mobile_no` bigint(10) DEFAULT NULL,
  `status` enum('created','processed','delivered','cancelled') CHARACTER SET latin1 DEFAULT 'created',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_order_tbl` */

LOCK TABLES `oms_db_order_tbl` WRITE;

insert  into `oms_db_order_tbl`(`id`,`user_id`,`user_email_id`,`user_mobile_no`,`status`,`created_at`,`updated_at`) values (1,2,'yo@gmail.com',8871601315,'created','2016-11-26 13:04:27','2016-11-26 13:04:27');

UNLOCK TABLES;

/*Table structure for table `oms_db_payment_data_tbl` */

CREATE TABLE `oms_db_payment_data_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type_id` int(11) NOT NULL,
  `data_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `data_type` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_payment_data_tbl` */

LOCK TABLES `oms_db_payment_data_tbl` WRITE;

UNLOCK TABLES;

/*Table structure for table `oms_db_payment_details_tbl` */

CREATE TABLE `oms_db_payment_details_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `payment_data_id` int(11) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_payment_details_tbl` */

LOCK TABLES `oms_db_payment_details_tbl` WRITE;

UNLOCK TABLES;

/*Table structure for table `oms_db_payment_type_tbl` */

CREATE TABLE `oms_db_payment_type_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_payment_type_tbl` */

LOCK TABLES `oms_db_payment_type_tbl` WRITE;

UNLOCK TABLES;

/*Table structure for table `oms_db_reverse_order_tbl` */

CREATE TABLE `oms_db_reverse_order_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `reverse_req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_reverse_order_tbl` */

LOCK TABLES `oms_db_reverse_order_tbl` WRITE;

UNLOCK TABLES;

/*Table structure for table `oms_db_shipping_detail` */

CREATE TABLE `oms_db_shipping_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `status` enum('shipped','delivered','reverse') CHARACTER SET latin1 NOT NULL,
  `courier_company_id` int(11) NOT NULL,
  `remark` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_shipping_detail` */

LOCK TABLES `oms_db_shipping_detail` WRITE;

UNLOCK TABLES;

/*Table structure for table `oms_db_sms_mgmt_tbl` */

CREATE TABLE `oms_db_sms_mgmt_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_stamp` datetime DEFAULT NULL,
  `status` varchar(55) CHARACTER SET latin1 DEFAULT NULL,
  `to` varchar(55) CHARACTER SET latin1 DEFAULT NULL,
  `msg` text CHARACTER SET latin1,
  `sms_type` varchar(55) CHARACTER SET latin1 DEFAULT NULL,
  `mobile_no` text CHARACTER SET latin1 NOT NULL,
  `sms` text COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_sms_mgmt_tbl` */

LOCK TABLES `oms_db_sms_mgmt_tbl` WRITE;

insert  into `oms_db_sms_mgmt_tbl`(`id`,`time_stamp`,`status`,`to`,`msg`,`sms_type`,`mobile_no`,`sms`,`client_id`) values (1,'2016-11-26 10:49:05',NULL,NULL,'FAILED','Auto','','Your Order Confirmed. Order Id : ord_',NULL),(2,'2016-11-26 10:50:13',NULL,NULL,'FAILED','Auto','','Your Order Confirmed. Order Id : ord_',NULL),(3,'2016-11-26 10:51:43',NULL,NULL,'FAILED','Auto','','Your Order Confirmed. Order Id : ord_',NULL),(4,'2016-11-26 10:52:50',NULL,NULL,'Sent.','Auto','8871601315','Your Order Confirmed. Order Id : ord_4',NULL),(5,'2016-11-26 12:17:32',NULL,NULL,'Sent.','Auto','8871601315','Your Order Confirmed. Order Id : ord_1',NULL),(6,'2016-11-26 12:20:58',NULL,NULL,'Sent.','Auto','8871601315','Your Order Confirmed. Order Id : ord_2',NULL),(7,'2016-11-26 12:39:03',NULL,NULL,'Sent.','Auto','8871601315','Your Order Confirmed. Order Id : ord_1',NULL),(8,'2016-11-26 12:43:51',NULL,NULL,'Sent.','Auto','8871601315','Your Order Confirmed. Order Id : ord_1',NULL),(9,'2016-11-26 12:48:08',NULL,NULL,'FAILED','Auto','','Your Order Updated. Order Id : ord_1',NULL),(10,'2016-11-26 12:53:17',NULL,NULL,'Sent.','Auto','8871601315','Your Order Confirmed. Order Id : ord_1',NULL),(11,'2016-11-26 12:54:32',NULL,NULL,'Sent.','Auto','2147483647','Your Order Updated. Order Id : ord_1',NULL),(12,'2016-11-26 13:04:39',NULL,NULL,'Sent.','Auto','8871601315','Your Order Confirmed. Order Id : ord_1',NULL),(13,'2016-11-26 13:06:28',NULL,NULL,'Sent.','Auto','8871601315','Your Order Updated. Order Id : ord_1',NULL),(14,'2016-11-26 13:07:25',NULL,NULL,'Sent.','Auto','8871601315','Your Order Updated. Order Id : ord_1',NULL),(15,'2016-11-26 13:09:19',NULL,NULL,'Sent.','Auto','8871601315','Your Order Updated. Order Id : ord_1',NULL),(16,'2016-11-26 13:09:34',NULL,NULL,'Sent.','Auto','8871601315','Your Order Updated. Order Id : ord_1',NULL),(17,'2016-11-26 13:11:35',NULL,NULL,'Sent.','Auto','8871601315','Your Order Updated. Order Id : ord_1',NULL);

UNLOCK TABLES;

/*Table structure for table `oms_db_user_tbl` */

CREATE TABLE `oms_db_user_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `address` text CHARACTER SET latin1,
  `user_email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `left_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oms_db_user_tbl` */

LOCK TABLES `oms_db_user_tbl` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
