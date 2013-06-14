

DROP TABLE IF EXISTS `complex-genie`.`acos`;
DROP TABLE IF EXISTS `complex-genie`.`aros`;
DROP TABLE IF EXISTS `complex-genie`.`aros_acos`;
DROP TABLE IF EXISTS `complex-genie`.`profile_pictures`;
DROP TABLE IF EXISTS `complex-genie`.`roles`;
DROP TABLE IF EXISTS `complex-genie`.`users`;


CREATE TABLE `complex-genie`.`acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `complex-genie`.`aros` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `complex-genie`.`aros_acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`aro_id` int(10) NOT NULL,
	`aco_id` int(10) NOT NULL,
	`_create` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' NOT NULL,
	`_read` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' NOT NULL,
	`_update` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' NOT NULL,
	`_delete` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' NOT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY `ARO_ACO_KEY` (`aro_id`, `aco_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `complex-genie`.`profile_pictures` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	`profile_picture` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`modified` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `complex-genie`.`roles` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`user_count` int(11) NOT NULL,
	`created` datetime NOT NULL,
	`modified` datetime NOT NULL,
	`user_id` int(11) NOT NULL,
	`updated_by` int(11) NOT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY `role` (`role`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `complex-genie`.`users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`is_active` tinyint(1) DEFAULT '1' NOT NULL,
	`role_id` int(11) NOT NULL,
	`first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`date_of_birth` date NOT NULL,
	`hobbies` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`profile_picture_id` int(11) NOT NULL,
	`created` datetime NOT NULL,
	`modified` datetime NOT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY `username` (`username`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

