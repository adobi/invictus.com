/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : invictus

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-03-08 16:06:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `c_game`
-- ----------------------------
DROP TABLE IF EXISTS `c_game`;
CREATE TABLE `c_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_id` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `released` datetime DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `hero_image` varchar(150) DEFAULT NULL,
  `teaser_image` varchar(150) DEFAULT NULL,
  `short_description` varchar(150) DEFAULT NULL,
  `long_description` text,
  `is_active` int(11) DEFAULT NULL,
  `is_on_mainpage` int(11) DEFAULT NULL,
  `is_teaser` int(11) DEFAULT NULL,
  `is_in_more_games` int(11) DEFAULT NULL,
  `is_in_footer` int(11) DEFAULT NULL,
  `facebook_app_id` varchar(150) DEFAULT NULL,
  `twitter_page` varchar(150) DEFAULT NULL,
  `facebook_page` varchar(250) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_non_intraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_meta` (`meta_id`),
  CONSTRAINT `fk_game_meta` FOREIGN KEY (`meta_id`) REFERENCES `ic_meta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game
-- ----------------------------

-- ----------------------------
-- Table structure for `c_game_image`
-- ----------------------------
DROP TABLE IF EXISTS `c_game_image`;
CREATE TABLE `c_game_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) DEFAULT NULL,
  `path` varchar(250) DEFAULT NULL,
  `thumb_path` varchar(250) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_vide_game` (`game_id`),
  CONSTRAINT `fk_game_vide_game0` FOREIGN KEY (`game_id`) REFERENCES `c_game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game_image
-- ----------------------------

-- ----------------------------
-- Table structure for `c_game_platform`
-- ----------------------------
DROP TABLE IF EXISTS `c_game_platform`;
CREATE TABLE `c_game_platform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL,
  `platform_id` int(11) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_action` varchar(250) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_platform_game` (`game_id`),
  KEY `fk_game_platform_platform` (`platform_id`),
  CONSTRAINT `fk_game_platform_game` FOREIGN KEY (`game_id`) REFERENCES `c_game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_game_platform_platform` FOREIGN KEY (`platform_id`) REFERENCES `c_platform` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game_platform
-- ----------------------------

-- ----------------------------
-- Table structure for `c_game_video`
-- ----------------------------
DROP TABLE IF EXISTS `c_game_video`;
CREATE TABLE `c_game_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) DEFAULT NULL,
  `code` varchar(150) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_vide_game` (`game_id`),
  CONSTRAINT `fk_game_vide_game` FOREIGN KEY (`game_id`) REFERENCES `c_game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game_video
-- ----------------------------

-- ----------------------------
-- Table structure for `c_platform`
-- ----------------------------
DROP TABLE IF EXISTS `c_platform`;
CREATE TABLE `c_platform` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `news_image_width` int(11) DEFAULT NULL,
  `news_image_height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_platform
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_analytics`
-- ----------------------------
DROP TABLE IF EXISTS `ic_analytics`;
CREATE TABLE `ic_analytics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `analytics_type_id` int(11) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_analytics_analytics_type` (`analytics_type_id`),
  KEY `fk_analytics_games` (`game_id`),
  CONSTRAINT `fk_analytics_analytics_type` FOREIGN KEY (`analytics_type_id`) REFERENCES `ic_analytics_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_analytics_games` FOREIGN KEY (`game_id`) REFERENCES `c_game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_analytics
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_analytics_action`
-- ----------------------------
DROP TABLE IF EXISTS `ic_analytics_action`;
CREATE TABLE `ic_analytics_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_analytics_action
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_analytics_type`
-- ----------------------------
DROP TABLE IF EXISTS `ic_analytics_type`;
CREATE TABLE `ic_analytics_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_analytics_type
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_contact`
-- ----------------------------
DROP TABLE IF EXISTS `ic_contact`;
CREATE TABLE `ic_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `fax` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_contact
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_contact_type`
-- ----------------------------
DROP TABLE IF EXISTS `ic_contact_type`;
CREATE TABLE `ic_contact_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `ga_cetegory` varchar(250) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_contact_type
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_crosspromo`
-- ----------------------------
DROP TABLE IF EXISTS `ic_crosspromo`;
CREATE TABLE `ic_crosspromo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `base_game_id` int(11) DEFAULT NULL,
  `promo_game_id` int(11) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_action` varchar(250) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_crosspromo_game_base` (`base_game_id`),
  KEY `fk_crosspromo_game_promo` (`promo_game_id`),
  CONSTRAINT `fk_crosspromo_game_base` FOREIGN KEY (`base_game_id`) REFERENCES `c_game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_crosspromo_game_promo` FOREIGN KEY (`promo_game_id`) REFERENCES `c_game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_crosspromo
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_email_offer`
-- ----------------------------
DROP TABLE IF EXISTS `ic_email_offer`;
CREATE TABLE `ic_email_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_email_offer_offer` (`offer_id`),
  CONSTRAINT `fk_email_offer_offer` FOREIGN KEY (`offer_id`) REFERENCES `ic_offer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_email_offer
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_job`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job`;
CREATE TABLE `ic_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text,
  `responsabilities` text,
  `qualification` text,
  `skills` text,
  `we_offer` text,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `available` datetime DEFAULT NULL,
  `job_ga_category` varchar(250) DEFAULT NULL,
  `job_ga_action` varchar(250) DEFAULT NULL,
  `job_ga_label` varchar(250) DEFAULT NULL,
  `job_ga_value` int(11) DEFAULT NULL,
  `job_ga_noninteraction` int(11) DEFAULT NULL,
  `apply_ga_category` varchar(250) DEFAULT NULL,
  `apply_ga_action` varchar(250) DEFAULT NULL,
  `apply_ga_label` varchar(250) DEFAULT NULL,
  `apply_ga_value` int(11) DEFAULT NULL,
  `apply_ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_job_category` (`category_id`),
  CONSTRAINT `fk_job_job_category` FOREIGN KEY (`category_id`) REFERENCES `ic_job_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_job_application`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job_application`;
CREATE TABLE `ic_job_application` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `cv` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `portfolio` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_application_job` (`job_id`),
  CONSTRAINT `fk_job_application_job` FOREIGN KEY (`job_id`) REFERENCES `ic_job` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_application
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_job_category`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job_category`;
CREATE TABLE `ic_job_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `icon` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_category
-- ----------------------------
INSERT INTO `ic_job_category` VALUES ('3', 'Tester', '1331214705_glyphicons_002_dog.png');
INSERT INTO `ic_job_category` VALUES ('4', 'Gameplay Programmer', '1331217374_glyphicons_023_cogwheels.png');
INSERT INTO `ic_job_category` VALUES ('5', 'Marketing assistent', '1331217397_glyphicons_004_girl.png');

-- ----------------------------
-- Table structure for `ic_meta`
-- ----------------------------
DROP TABLE IF EXISTS `ic_meta`;
CREATE TABLE `ic_meta` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `keywords` varchar(250) DEFAULT NULL,
  `og_title` varchar(250) DEFAULT NULL,
  `og_url` varchar(250) DEFAULT NULL,
  `og_type` varchar(150) DEFAULT NULL,
  `og_image` varchar(150) DEFAULT NULL,
  `og_description` varchar(250) DEFAULT NULL,
  `og_site_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_meta
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_offer`
-- ----------------------------
DROP TABLE IF EXISTS `ic_offer`;
CREATE TABLE `ic_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `from_date` datetime DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_offer
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_page`
-- ----------------------------
DROP TABLE IF EXISTS `ic_page`;
CREATE TABLE `ic_page` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `description` text,
  `meta_id` int(11) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_page_meta` (`meta_id`),
  CONSTRAINT `fk_page_meta` FOREIGN KEY (`meta_id`) REFERENCES `ic_meta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_page
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_settings`
-- ----------------------------
DROP TABLE IF EXISTS `ic_settings`;
CREATE TABLE `ic_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(150) DEFAULT NULL,
  `facebook_app_id` varchar(150) DEFAULT NULL,
  `facebook_page` varchar(150) DEFAULT NULL,
  `twitter_id` varchar(150) DEFAULT NULL,
  `google_analytics` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_settings
-- ----------------------------

-- ----------------------------
-- Table structure for `ic_user`
-- ----------------------------
DROP TABLE IF EXISTS `ic_user`;
CREATE TABLE `ic_user` (
  `id` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_user
-- ----------------------------
