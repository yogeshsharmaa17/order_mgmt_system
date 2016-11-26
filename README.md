# order_mgmt_system
Order Management System

Demo Link : http://demo.rcbpl.co.in/

Data Model Link : http://demo.rcbpl.co.in/media/data_model/data_model.png

Database : 


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

CREATE TABLE `oms_db_payment_data_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type_id` int(11) NOT NULL,
  `data_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `data_type` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `oms_db_payment_details_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `payment_data_id` int(11) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `oms_db_payment_type_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `oms_db_reverse_order_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `reverse_req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `oms_db_shipping_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `status` enum('shipped','delivered','reverse') CHARACTER SET latin1 NOT NULL,
  `courier_company_id` int(11) NOT NULL,
  `remark` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


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


