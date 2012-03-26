/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : invictus

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2012-03-26 18:18:04
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
  `order_on_mainpage` int(11) DEFAULT NULL,
  `is_teaser` int(11) DEFAULT NULL,
  `is_in_more_games` int(11) DEFAULT NULL,
  `order_in_more_games` int(11) DEFAULT NULL,
  `is_in_footer` int(11) DEFAULT NULL,
  `order_in_footer` int(11) DEFAULT NULL,
  `facebook_app_id` varchar(150) DEFAULT NULL,
  `twitter_page` varchar(150) DEFAULT NULL,
  `facebook_page` varchar(250) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_meta` (`meta_id`),
  CONSTRAINT `fk_game_meta` FOREIGN KEY (`meta_id`) REFERENCES `ic_meta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game
-- ----------------------------
INSERT INTO `c_game` VALUES ('4', '12', 'Lazy Farmer', 'lazy-farmer', '2012-03-01 00:00:00', '1332531531_Icon170.png', '1332531531_hero.png', '1332531532_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', null, null, null, '1', '1', null, null, '12272771881', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazyfarmer.game', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('5', '12', 'Lazy Farmer2', null, null, '1332531531_Icon170.png', null, null, null, null, '1', null, null, null, '1', '0', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `c_game` VALUES ('6', '12', 'Lazy Farmer3', null, null, '1332531531_Icon170.png', null, null, null, null, '1', null, null, null, '1', '2', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `c_game` VALUES ('7', '12', 'Lazy Farmer4', null, null, '1332531531_Icon170.png', null, null, null, null, '1', null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `c_game` VALUES ('8', '12', 'Lazy Farmer5', null, null, '1332531531_Icon170.png', null, null, null, null, '1', null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `c_game` VALUES ('9', '12', 'Lazy Farmer6', null, null, '1332531531_Icon170.png', null, null, null, null, '1', null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `c_game` VALUES ('10', '12', 'Lazy Farmer7', null, null, '1332531531_Icon170.png', null, null, null, null, '1', null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `c_game` VALUES ('11', '12', 'Lazy Farmer8', null, null, '1332531531_Icon170.png', null, null, null, null, '1', null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null);

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
  CONSTRAINT `fk_game_vide_game0` FOREIGN KEY (`game_id`) REFERENCES `c_game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `url` varchar(250) DEFAULT NULL,
  `long_url` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_platform_game` (`game_id`),
  KEY `fk_game_platform_platform` (`platform_id`),
  CONSTRAINT `fk_game_platform_game` FOREIGN KEY (`game_id`) REFERENCES `c_game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_game_platform_platform` FOREIGN KEY (`platform_id`) REFERENCES `c_platform` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk_game_vide_game` FOREIGN KEY (`game_id`) REFERENCES `c_game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
INSERT INTO `c_platform` VALUES ('3', 'Android Phone', null, '1332227844_android_market.png', null, null);
INSERT INTO `c_platform` VALUES ('4', 'Andorid Tablet', null, '1331653136_android_market.png', null, null);
INSERT INTO `c_platform` VALUES ('5', 'iPad', null, '1332228002_app_store.png', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_contact
-- ----------------------------
INSERT INTO `ic_contact` VALUES ('1', 'Invicts Games Ltd', 'Debrecen, Hungary', 'Kartacs street 9, 4028', '+36708808800', '+3652122112', 'hello@invictus.com');
INSERT INTO `ic_contact` VALUES ('2', 'Invicts Games Ltd', 'San Francisco, USA', '795 Folsom St., Suite 600', '+36708808800', '+3652122112', 'hello@invictus.com');

-- ----------------------------
-- Table structure for `ic_contact_type`
-- ----------------------------
DROP TABLE IF EXISTS `ic_contact_type`;
CREATE TABLE `ic_contact_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_contact_type
-- ----------------------------
INSERT INTO `ic_contact_type` VALUES ('1', 'Marketing', '2', 'marketing@invictus.com', 'Contact email', 'Marketing', 'Click', '1', null);
INSERT INTO `ic_contact_type` VALUES ('2', 'Support', '1', 'support@invictus.com', null, null, null, null, null);

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
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_email_offer_offer` (`offer_id`),
  CONSTRAINT `fk_email_offer_offer` FOREIGN KEY (`offer_id`) REFERENCES `ic_offer` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_email_offer
-- ----------------------------
INSERT INTO `ic_email_offer` VALUES ('1', '3', 'hello.attila@gmail.com', '2012-03-01 10:18:12');
INSERT INTO `ic_email_offer` VALUES ('2', '3', 'hello.attila@gmail.com', '2012-03-07 10:18:17');
INSERT INTO `ic_email_offer` VALUES ('3', '3', 'hello.attila@gmail.com', '2012-03-02 10:18:21');
INSERT INTO `ic_email_offer` VALUES ('4', '3', 'hello.attila@gmail.com', '2012-03-13 10:18:25');
INSERT INTO `ic_email_offer` VALUES ('5', '3', 'hello.attila@gmail.com', '2012-03-09 10:18:29');

-- ----------------------------
-- Table structure for `ic_game_platorm_analyitcs`
-- ----------------------------
DROP TABLE IF EXISTS `ic_game_platorm_analyitcs`;
CREATE TABLE `ic_game_platorm_analyitcs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ga_category` varchar(255) DEFAULT NULL,
  `ga_label` varchar(255) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_action` varchar(255) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  `game_platform_id` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_platform_analytics_game_platform` (`game_platform_id`),
  CONSTRAINT `fk_game_platform_analytics_game_platform` FOREIGN KEY (`game_platform_id`) REFERENCES `c_game_platform` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_game_platorm_analyitcs
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job
-- ----------------------------
INSERT INTO `ic_job` VALUES ('16', 'Software Engineer - Front-End', 'Debrecen, Hungary', '1', '17', 'Twitter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.  \r\n \r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.  \r\n \r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', null, '2012-03-20 07:24:09', '2012-03-31 00:00:00', null, null, null, null, null, null, null, null, null, null);

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
  `called` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_application_job` (`job_id`),
  CONSTRAINT `fk_job_application_job` FOREIGN KEY (`job_id`) REFERENCES `ic_job` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_application
-- ----------------------------
INSERT INTO `ic_job_application` VALUES ('1', null, 'Alma Máter', 'hello@google.com', 'a', '+36707667788', 'a', null);
INSERT INTO `ic_job_application` VALUES ('3', null, 'Asda asdas', 'hello@google.com', 'a', '+36707667788', 'a', '1');
INSERT INTO `ic_job_application` VALUES ('4', null, 'ASdasda asdasd', 'hello@google.com', 'aa', '+36707667788', 'a', null);
INSERT INTO `ic_job_application` VALUES ('5', null, 'aASDASda', 'hello@google.com', 'a', '+36707667788', 'a', '1');
INSERT INTO `ic_job_application` VALUES ('6', null, 'ASdas', 'hello@google.com', 'a', '+36707667788', 'aa', '1');
INSERT INTO `ic_job_application` VALUES ('7', null, 'ASdasdasd asda sd', 'hello@google.com', 'a', '+36707667788', 'a', null);
INSERT INTO `ic_job_application` VALUES ('8', null, 'aASDasd', 'hello@google.com', 'a', '+36707667788', 'a', null);
INSERT INTO `ic_job_application` VALUES ('9', null, 'asdasdasda', 'fs', 'a', '+36707667788', 'a', null);
INSERT INTO `ic_job_application` VALUES ('10', null, 'errqewrwe', 'd', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('11', null, 'qwerw', 's', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('12', null, 'ere', 'df', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('13', null, 'wrw', 'fs', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('14', null, 'er', 'sd', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('15', null, 'wer', 'df', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('16', null, 'we', 'fs', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('17', null, 'r', 'sd', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('18', null, 'we', 'sdf', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('19', null, 'rw', 'sdf', 'q', '+36707667788', 'q', null);
INSERT INTO `ic_job_application` VALUES ('20', null, 'er', 'asdf', 'q', '+36707667788', 'q', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_offer
-- ----------------------------
INSERT INTO `ic_job_offer` VALUES ('114', '16', 'Flexible and generous vacation policy');
INSERT INTO `ic_job_offer` VALUES ('115', '16', 'Complete medical/dental benefits');

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
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_qualification
-- ----------------------------
INSERT INTO `ic_job_qualification` VALUES ('114', '16', 'Demonstrable experience building world-class, consumer web application interfaces');
INSERT INTO `ic_job_qualification` VALUES ('115', '16', 'Expert Javascript/HTML/CSS/Ajax coding skills');

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
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_responsability
-- ----------------------------
INSERT INTO `ic_job_responsability` VALUES ('148', '16', 'Write front-end code in Ruby, HTML/CSS, and Javascript');
INSERT INTO `ic_job_responsability` VALUES ('149', '16', 'Implement new features and optimize existing ones from controller-level to UI');

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
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_skill
-- ----------------------------
INSERT INTO `ic_job_skill` VALUES ('130', '16', 'Visual-design skills');
INSERT INTO `ic_job_skill` VALUES ('131', '16', 'B.S. or higher in Computer science or equivalent');

-- ----------------------------
-- Table structure for `ic_meta`
-- ----------------------------
DROP TABLE IF EXISTS `ic_meta`;
CREATE TABLE `ic_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_meta
-- ----------------------------
INSERT INTO `ic_meta` VALUES ('11', 'Home', 'Home', 'invictus games, Home', 'Home', 'http://invictus.com/pages/home', 'games', null, null, 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('12', 'Lazy Farmer', 'Lazy Farmer the official game', 'invictus games, Lazy Farmer', 'Lazy Farmer', 'http://invictus.com/games/lazy-farmer', 'game', 'http://invictus.com/uploads/original/1332531531_Icon170.png', null, 'Invictus Games');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_offer
-- ----------------------------
INSERT INTO `ic_offer` VALUES ('3', 'Twitter has changed the way people communicate. Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base. \r\n\r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies. \r\n\r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', '2012-03-13 00:00:00', '2012-03-19 13:03:46', null, null, null, null, null);
INSERT INTO `ic_offer` VALUES ('4', 'Twitter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.', '2012-03-19 00:00:00', '2012-03-31 00:00:00', null, null, null, null, null);

-- ----------------------------
-- Table structure for `ic_page`
-- ----------------------------
DROP TABLE IF EXISTS `ic_page`;
CREATE TABLE `ic_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `meta_id` int(11) DEFAULT NULL,
  `ga_category` varchar(250) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_label` varchar(250) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_page_meta` (`meta_id`),
  CONSTRAINT `fk_page_meta` FOREIGN KEY (`meta_id`) REFERENCES `ic_meta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_page
-- ----------------------------
INSERT INTO `ic_page` VALUES ('8', 'Home', 'home', 'Home', '', '11', null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_settings
-- ----------------------------
INSERT INTO `ic_settings` VALUES ('1', null, '1222335526617', 'invictus.com', 'invictus_com', 'UTA111-11-111');

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
