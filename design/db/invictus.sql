/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : invictus

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-03-13 16:52:29
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `news_image_width` int(11) DEFAULT NULL,
  `news_image_height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_platform
-- ----------------------------
INSERT INTO `c_platform` VALUES ('1', 'iMac', null, '1331653081_mac_store.png', null, null);
INSERT INTO `c_platform` VALUES ('2', 'iPod, iPhone', null, '1331653106_app_store.png', null, null);
INSERT INTO `c_platform` VALUES ('3', 'Android Phone', null, '1331653123_android_market.png', null, null);
INSERT INTO `c_platform` VALUES ('4', 'Andorid Tablet', null, '1331653136_android_market.png', null, null);
INSERT INTO `c_platform` VALUES ('5', 'iPad', null, '1331653150_app_store.png', null, null);

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
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text,
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
  CONSTRAINT `fk_job_job_category` FOREIGN KEY (`category_id`) REFERENCES `ic_job_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job
-- ----------------------------
INSERT INTO `ic_job` VALUES ('12', 'Software Engineer', 'Debrecen, Hungary', '1', '17', 'Twitter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.  \r\n \r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.  \r\n \r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', null, '2012-03-13 15:07:03', '2012-03-28 00:00:00', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ic_job` VALUES ('14', 'Software Engineer - Front-End', 'Debrecen, Hungary', '1', '17', 'Twitter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.  \r\n \r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.  \r\n \r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', null, '2012-03-13 15:10:31', '2012-03-29 00:00:00', null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `ic_job_application`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job_application`;
CREATE TABLE `ic_job_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `cv` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `portfolio` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_application_job` (`job_id`),
  CONSTRAINT `fk_job_application_job` FOREIGN KEY (`job_id`) REFERENCES `ic_job` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_application
-- ----------------------------
INSERT INTO `ic_job_application` VALUES ('1', '12', 'Alma Máter', 'hello@google.com', 'a', '+36707667788', 'a');
INSERT INTO `ic_job_application` VALUES ('3', '12', 'Asda asdas', 'hello@google.com', 'a', '+36707667788', 'a');
INSERT INTO `ic_job_application` VALUES ('4', '12', 'ASdasda asdasd', 'hello@google.com', 'aa', '+36707667788', 'a');
INSERT INTO `ic_job_application` VALUES ('5', '12', 'aASDASda', 'hello@google.com', 'a', '+36707667788', 'a');
INSERT INTO `ic_job_application` VALUES ('6', '12', 'ASdas', 'hello@google.com', 'a', '+36707667788', 'aa');
INSERT INTO `ic_job_application` VALUES ('7', '12', 'ASdasdasd asda sd', 'hello@google.com', 'a', '+36707667788', 'a');
INSERT INTO `ic_job_application` VALUES ('8', '12', 'aASDasd', 'hello@google.com', 'a', '+36707667788', 'a');
INSERT INTO `ic_job_application` VALUES ('9', '12', 'asdasdasda', 'fs', 'a', '+36707667788', 'a');
INSERT INTO `ic_job_application` VALUES ('10', '12', 'errqewrwe', 'd', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('11', '12', 'qwerw', 's', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('12', '12', 'ere', 'df', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('13', '12', 'wrw', 'fs', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('14', '12', 'er', 'sd', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('15', '12', 'wer', 'df', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('16', '12', 'we', 'fs', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('17', '12', 'r', 'sd', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('18', '12', 'we', 'sdf', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('19', '12', 'rw', 'sdf', 'q', '+36707667788', 'q');
INSERT INTO `ic_job_application` VALUES ('20', '12', 'er', 'asdf', 'q', '+36707667788', 'q');

-- ----------------------------
-- Table structure for `ic_job_category`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job_category`;
CREATE TABLE `ic_job_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `icon` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_category
-- ----------------------------
INSERT INTO `ic_job_category` VALUES ('17', 'Gameplay Developer', '1331651148_glyphicons_009_magic.png');

-- ----------------------------
-- Table structure for `ic_job_offer`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job_offer`;
CREATE TABLE `ic_job_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_responsability_job` (`job_id`),
  CONSTRAINT `fk_job_we_offer_job` FOREIGN KEY (`job_id`) REFERENCES `ic_job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_offer
-- ----------------------------
INSERT INTO `ic_job_offer` VALUES ('109', '12', 'Complete medical/dental benefits');
INSERT INTO `ic_job_offer` VALUES ('110', '12', 'Flexible and generous vacation policy');
INSERT INTO `ic_job_offer` VALUES ('111', '14', 'Flexible and generous vacation policy');

-- ----------------------------
-- Table structure for `ic_job_qualification`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job_qualification`;
CREATE TABLE `ic_job_qualification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_responsability_job` (`job_id`),
  CONSTRAINT `fk_job_qualification_job` FOREIGN KEY (`job_id`) REFERENCES `ic_job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_qualification
-- ----------------------------
INSERT INTO `ic_job_qualification` VALUES ('109', '12', 'Expert Javascript/HTML/CSS/Ajax coding skills');
INSERT INTO `ic_job_qualification` VALUES ('110', '12', 'Demonstrable experience building world-class, consumer web application interfaces');
INSERT INTO `ic_job_qualification` VALUES ('111', '14', 'Demonstrable experience building world-class, consumer web application interfaces');

-- ----------------------------
-- Table structure for `ic_job_responsability`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job_responsability`;
CREATE TABLE `ic_job_responsability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_responsability_job` (`job_id`),
  CONSTRAINT `fk_job_responsability_job` FOREIGN KEY (`job_id`) REFERENCES `ic_job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_responsability
-- ----------------------------
INSERT INTO `ic_job_responsability` VALUES ('143', '12', 'Write front-end code in Ruby, HTML/CSS, and Javascript');
INSERT INTO `ic_job_responsability` VALUES ('144', '12', 'Implement new features and optimize existing ones from controller-level to UI');
INSERT INTO `ic_job_responsability` VALUES ('145', '14', 'Write front-end code in Ruby, HTML/CSS, and Javascript');

-- ----------------------------
-- Table structure for `ic_job_skill`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job_skill`;
CREATE TABLE `ic_job_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_responsability_job` (`job_id`),
  CONSTRAINT `fk_job_skill_job` FOREIGN KEY (`job_id`) REFERENCES `ic_job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_skill
-- ----------------------------
INSERT INTO `ic_job_skill` VALUES ('125', '12', 'Visual-design skills');
INSERT INTO `ic_job_skill` VALUES ('126', '12', 'B.S. or higher in Computer science or equivalent');
INSERT INTO `ic_job_skill` VALUES ('127', '14', 'Visual-design skills');

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
