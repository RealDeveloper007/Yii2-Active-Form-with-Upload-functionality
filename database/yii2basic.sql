

-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base',	1516624736);

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(255) DEFAULT NULL,
  `usertype_id` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `imageFile` varchar(255) DEFAULT 'avatar.png',
  `permission` tinyint(1) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_user_usertype_idx` (`usertype_id`),
  KEY `fk_user_country1_idx` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=big5;

INSERT INTO `register` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `firstname`, `lastname`, `mobile`, `postcode`, `created_at`, `address`, `usertype_id`, `city_name`, `country_id`, `status`, `imageFile`, `permission`, `is_published`) VALUES
(7,	'test007',	'jsksncknsksnsk',	'$2y$13$DRAQp4P/xeu6ipC7RAMnAuzQnU74XKvIMdaLxZuUz7PFjy4zROmS2',	'jsksncknsksnsk',	'test@gmail.com',	'first',	'last',	'729282',	'2019',	'2018-03-01 23:33:57',	'address',	2,	'ambala',	2,	1,	'tn_user_06.jpg',	2,	2);

DROP TABLE IF EXISTS `user_images`;
CREATE TABLE `user_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_images_id` int(11) NOT NULL,
  `images` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_images_id` (`user_images_id`),
  CONSTRAINT `user_images_ibfk_4` FOREIGN KEY (`user_images_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-03-02 17:09:01
