/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : invictus

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-03-30 12:24:13
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
INSERT INTO `c_game` VALUES ('4', '12', 'Lazy Farmer', 'lazy-farmer', '2012-03-01 00:00:00', '1332930420_Icon170.png', '1332926239_hero.png', '1332925952_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '1', '0', null, '0', '3', null, null, '12272771881', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazyfarmer.game', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('5', '12', 'Santa Ride', 'santa-ride', '1970-01-01 00:00:00', '1332930492_Icon170.png', '1332926168_hero.png', '1332926168_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '1', '1', null, '0', '1', null, null, '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('6', '12', 'Froggy Jump', 'froggy-jump', '1970-01-01 00:00:00', '1332930460_Icon170.png', '1332926009_hero.png', '1332925765_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '1', '2', null, '1', '1', null, null, '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('7', '12', 'Greed Corp', 'greed-corp', '1970-01-01 00:00:00', '1332930505_Icon170.png', '1332926031_hero.png', '1332925809_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '1', '3', null, '1', '0', '0', '0', '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('8', '12', 'Froggy Launcher', 'froggy-launcher', '1970-01-01 00:00:00', '1332930545_Icon170.png', '1332531531_hero.png', '1332531532_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '0', '3', null, '1', '3', '0', '0', '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('9', '12', 'Fly Fu', 'fly-fu', '1970-01-01 00:00:00', '1332930570_Icon170.png', '1332531531_hero.png', '1332531532_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '0', '3', null, '0', '3', '1', '0', '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('10', '12', 'Mist Bouncer', 'mist-bouncer', '1970-01-01 00:00:00', '1332930595_Icon170.png', '1332531531_hero.png', '1332531532_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', null, null, null, '1', '4', null, null, '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('11', '12', 'Race of Champions', 'race-of-champions', '1970-01-01 00:00:00', '1333096600_Icon170.png', '1332531531_hero.png', '1332531532_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '0', '2', null, '1', '2', null, null, '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game_image
-- ----------------------------
INSERT INTO `c_game_image` VALUES ('6', null, '1332934989_greed-corp-20090812111453863.jpg', null, '7', null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('7', null, '1332934989_greed-corp-20090812111456832.jpg', null, '7', null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('8', null, '1332935171_IMG_1806.png', null, '6', null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('9', null, '1332935171_IMG_1807.png', null, '6', null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('10', null, '1332935171_IMG_1808.png', null, '6', null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game_platform
-- ----------------------------
INSERT INTO `c_game_platform` VALUES ('1', '11', '5', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('2', '10', '4', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('3', '10', '5', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('4', '9', '5', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('5', '8', '2', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('6', '7', '2', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('7', '4', '5', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('8', '4', '4', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('9', '4', '3', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('10', '4', '2', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('11', '4', '1', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('12', '6', '2', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('13', '6', '3', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game_video
-- ----------------------------
INSERT INTO `c_game_video` VALUES ('1', 'Video', 'VA770wpLX-Q', '7', 'Video', 'watch', 'Greed Corp - Video', '1', null);
INSERT INTO `c_game_video` VALUES ('2', 'Video', 'VA770wpLX-Q', '7', 'Video', 'watch', 'Greed Corp - Video', '1', null);

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
-- Table structure for `ic_contact_message`
-- ----------------------------
DROP TABLE IF EXISTS `ic_contact_message`;
CREATE TABLE `ic_contact_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` int(11) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `message` text,
  `created` datetime DEFAULT NULL,
  `is_read` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contact_message_contact_type` (`email_id`),
  CONSTRAINT `fk_contact_message_contact_type` FOREIGN KEY (`email_id`) REFERENCES `ic_contact_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_contact_message
-- ----------------------------
INSERT INTO `ic_contact_message` VALUES ('1', '3', 'Built as a sprite', 'hello@adobi.hu', 'Instead of making every icon an extra request, we\'ve compiled them into a sprite—a bunch of images in one file that uses CSS to position the images with background-position. This is the same method we use on Twitter.com and it has worked well for us.', '2012-03-30 12:02:55', '1');
INSERT INTO `ic_contact_message` VALUES ('2', '3', 'How to use', 'hello@adobi.hu', 'All icons classes are prefixed with .icon- for proper namespacing and scoping, much like our other components. This will help avoid conflicts with other tools.\r\n\r\nGlyphicons has granted us use of the Halflings set in our open-source toolkit so long as we provide a link and credit here in the docs. Please consider doing the same in your projects.', '2012-03-14 12:02:59', '1');
INSERT INTO `ic_contact_message` VALUES ('3', '2', 'Use cases', 'hello@adobi.hu', 'Icons are great, but where would one use them? Here are a few ideas:\r\n\r\n    As visuals for your sidebar navigation\r\n    For a purely icon-driven navigation\r\n    For buttons to help convey the meaning of an action\r\n    With links to share context on a user\'s destination\r\n', '2012-03-17 12:03:04', '1');
INSERT INTO `ic_contact_message` VALUES ('4', '3', 'Built as a sprite', 'hello@adobi.hu', 'Icons are great, but where would one use them? Here are a few ideas:\r\n\r\n    As visuals for your sidebar navigation\r\n    For a purely icon-driven navigation\r\n    For buttons to help convey the meaning of an action\r\n    With links to share context on a user\'s destination\r\n', '2012-03-17 12:03:04', '1');
INSERT INTO `ic_contact_message` VALUES ('5', '3', 'Built as a sprite', 'hello@adobi.hu', 'Icons are great, but where would one use them? Here are a few ideas:\r\n\r\n    As visuals for your sidebar navigation\r\n    For a purely icon-driven navigation\r\n    For buttons to help convey the meaning of an action\r\n    With links to share context on a user\'s destination\r\n', '2012-03-17 12:03:04', '1');
INSERT INTO `ic_contact_message` VALUES ('6', '3', 'Built as a sprite', 'hello@adobi.hu', 'Icons are great, but where would one use them? Here are a few ideas:\r\n\r\n    As visuals for your sidebar navigation\r\n    For a purely icon-driven navigation\r\n    For buttons to help convey the meaning of an action\r\n    With links to share context on a user\'s destination\r\n', '2012-03-17 12:03:04', '1');
INSERT INTO `ic_contact_message` VALUES ('7', '3', 'Built as a sprite', 'hello@adobi.hu', 'Icons are great, but where would one use them? Here are a few ideas:\r\n\r\n    As visuals for your sidebar navigation\r\n    For a purely icon-driven navigation\r\n    For buttons to help convey the meaning of an action\r\n    With links to share context on a user\'s destination\r\n', '2012-03-17 12:03:04', '1');
INSERT INTO `ic_contact_message` VALUES ('8', '3', 'Built as a sprite', 'hello@adobi.hu', 'Icons are great, but where would one use them? Here are a few ideas:\r\n\r\n    As visuals for your sidebar navigation\r\n    For a purely icon-driven navigation\r\n    For buttons to help convey the meaning of an action\r\n    With links to share context on a user\'s destination\r\n', '2012-03-17 12:03:04', '1');
INSERT INTO `ic_contact_message` VALUES ('9', '3', 'Built as a sprite', 'hello@adobi.hu', 'Icons are great, but where would one use them? Here are a few ideas:\r\n\r\n    As visuals for your sidebar navigation\r\n    For a purely icon-driven navigation\r\n    For buttons to help convey the meaning of an action\r\n    With links to share context on a user\'s destination\r\n', '2012-03-17 12:03:04', '1');
INSERT INTO `ic_contact_message` VALUES ('10', '3', 'Built as a sprite', 'hello@adobi.hu', 'Icons are great, but where would one use them? Here are a few ideas:\r\n\r\n    As visuals for your sidebar navigation\r\n    For a purely icon-driven navigation\r\n    For buttons to help convey the meaning of an action\r\n    With links to share context on a user\'s destination\r\n', '2012-03-17 12:03:04', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_contact_type
-- ----------------------------
INSERT INTO `ic_contact_type` VALUES ('1', 'Marketing', '4', 'marketing@invictus.com', 'Contact email', 'Marketing', 'Click', '1', null);
INSERT INTO `ic_contact_type` VALUES ('2', 'Support', '2', 'support@invictus.com', null, null, null, null, null);
INSERT INTO `ic_contact_type` VALUES ('3', 'General informations', '1', 'info@invictus.com', null, null, null, null, null);
INSERT INTO `ic_contact_type` VALUES ('4', 'HR', '3', 'hr@invictus.com', null, null, null, null, null);

-- ----------------------------
-- Table structure for `ic_crosspromo`
-- ----------------------------
DROP TABLE IF EXISTS `ic_crosspromo`;
CREATE TABLE `ic_crosspromo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `base_game_id` int(11) DEFAULT NULL,
  `promo_game_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_crosspromo
-- ----------------------------
INSERT INTO `ic_crosspromo` VALUES ('1', '4', '6', '4', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('19', '8', '4', '4', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('20', '8', '5', '3', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('21', '8', '9', '2', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('22', '8', '10', '1', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('23', '8', '11', '0', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('24', '6', '4', '0', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('25', '6', '5', '2', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('26', '6', '9', '1', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('27', '6', '10', '3', null, null, null, null, null);
INSERT INTO `ic_crosspromo` VALUES ('28', '6', '7', '4', null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_email_offer
-- ----------------------------
INSERT INTO `ic_email_offer` VALUES ('1', '3', 'hello.attila@gmail.com', '2012-03-01 10:18:12');
INSERT INTO `ic_email_offer` VALUES ('2', '3', 'hello.attila@gmail.com', '2012-03-07 10:18:17');
INSERT INTO `ic_email_offer` VALUES ('3', '3', 'hello.attila@gmail.com', '2012-03-02 10:18:21');
INSERT INTO `ic_email_offer` VALUES ('4', '3', 'hello.attila@gmail.com', '2012-03-13 10:18:25');
INSERT INTO `ic_email_offer` VALUES ('5', '3', 'hello.attila@gmail.com', '2012-03-09 10:18:29');
INSERT INTO `ic_email_offer` VALUES ('6', '4', 'hello@adobi.hu', null);
INSERT INTO `ic_email_offer` VALUES ('7', '4', 'dobiattila@gmail.com', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_game_platorm_analyitcs
-- ----------------------------
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('1', 'Outbound link', 'Lazy Farmer8 - iPad - all games page', '1', 'Click', null, '1', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('2', 'Outbound link', 'Lazy Farmer8 - iPad - product page', '1', 'Click', null, '1', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('3', 'Outbound link', 'Lazy Farmer7 - Andorid Tablet - all games page', '1', 'Click', null, '2', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('4', 'Outbound link', 'Lazy Farmer7 - Andorid Tablet - product page', '1', 'Click', null, '2', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('5', 'Outbound link', 'Lazy Farmer7 - iPad - all games page', '1', 'Click', null, '3', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('6', 'Outbound link', 'Lazy Farmer7 - iPad - product page', '1', 'Click', null, '3', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('7', 'Outbound link', 'Lazy Farmer6 - iPad - all games page', '1', 'Click', null, '4', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('8', 'Outbound link', 'Lazy Farmer6 - iPad - product page', '1', 'Click', null, '4', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('9', 'Outbound link', 'Lazy Farmer5 - iPod, iPhone - all games page', '1', 'Click', null, '5', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('10', 'Outbound link', 'Lazy Farmer5 - iPod, iPhone - product page', '1', 'Click', null, '5', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('11', 'Outbound link', 'Lazy Farmer4 - iPod, iPhone - all games page', '1', 'Click', null, '6', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('12', 'Outbound link', 'Lazy Farmer4 - iPod, iPhone - product page', '1', 'Click', null, '6', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('13', 'Outbound link', 'Lazy Farmer - iPad - all games page', '1', 'Click', null, '7', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('14', 'Outbound link', 'Lazy Farmer - iPad - product page', '1', 'Click', null, '7', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('15', 'Outbound link', 'Lazy Farmer - Andorid Tablet - all games page', '1', 'Click', null, '8', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('16', 'Outbound link', 'Lazy Farmer - Andorid Tablet - product page', '1', 'Click', null, '8', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('17', 'Outbound link', 'Lazy Farmer - Android Phone - all games page', '1', 'Click', null, '9', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('18', 'Outbound link', 'Lazy Farmer - Android Phone - product page', '1', 'Click', null, '9', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('19', 'Outbound link', 'Lazy Farmer - iPod, iPhone - all games page', '1', 'Click', null, '10', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('20', 'Outbound link', 'Lazy Farmer - iPod, iPhone - product page', '1', 'Click', null, '10', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('21', 'Outbound link', 'Lazy Farmer - iMac - all games page', '1', 'Click', null, '11', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('22', 'Outbound link', 'Lazy Farmer - iMac - product page', '1', 'Click', null, '11', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('23', 'Outbound link', 'Froggy Jump - iPod, iPhone - all games page', '1', 'Click', null, '12', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('24', 'Outbound link', 'Froggy Jump - iPod, iPhone - product page', '1', 'Click', null, '12', 'product page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('25', 'Outbound link', 'Froggy Jump - Android Phone - all games page', '1', 'Click', null, '13', 'all games page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('26', 'Outbound link', 'Froggy Jump - Android Phone - product page', '1', 'Click', null, '13', 'product page');

-- ----------------------------
-- Table structure for `ic_job`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job`;
CREATE TABLE `ic_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
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
  `is_first` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_job_category` (`category_id`),
  CONSTRAINT `fk_job_job_category` FOREIGN KEY (`category_id`) REFERENCES `ic_job_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job
-- ----------------------------
INSERT INTO `ic_job` VALUES ('16', 'Software Engineer - Front-End', 'software-engineer-front-end', 'Debrecen, Hungary', '1', '17', 'Twitter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.  \r\n \r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.  \r\n \r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', null, '2012-03-30 08:58:00', '2012-03-31 00:00:00', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ic_job` VALUES ('17', 'Graphic Master for Game design', 'graphic-master-for-game-design', 'Debrecen, Hungary', '1', '18', 'witter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.  \r\n \r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.  \r\n \r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', null, '2012-03-30 08:58:12', '2012-03-31 00:00:00', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ic_job` VALUES ('18', 'Software Engineer - Back-End', 'software-engineer-back-end', 'San Francisco, USA', '1', '17', 'Twitter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.  \r\n \r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.  \r\n \r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', null, '2012-03-30 08:58:16', '2012-03-31 00:00:00', null, null, null, null, null, null, null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_category
-- ----------------------------
INSERT INTO `ic_job_category` VALUES ('17', 'Developer', '1331651148_glyphicons_009_magic.png');
INSERT INTO `ic_job_category` VALUES ('18', 'Graphic Designer', '1332919844_glyphicons_093_crop.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_offer
-- ----------------------------
INSERT INTO `ic_job_offer` VALUES ('121', '16', 'Flexible and generous vacation policy');
INSERT INTO `ic_job_offer` VALUES ('122', '16', 'Complete medical/dental benefits');
INSERT INTO `ic_job_offer` VALUES ('123', '17', 'Flexible and generous vacation policy');
INSERT INTO `ic_job_offer` VALUES ('124', '17', 'Complete medical/dental benefits');
INSERT INTO `ic_job_offer` VALUES ('125', '18', 'Flexible and generous vacation policy');
INSERT INTO `ic_job_offer` VALUES ('126', '18', 'Complete medical/dental benefits');
INSERT INTO `ic_job_offer` VALUES ('127', '18', 'Paid maternity and paternity leave');

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
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_qualification
-- ----------------------------
INSERT INTO `ic_job_qualification` VALUES ('122', '16', 'Demonstrable experience building world-class, consumer web application interfaces');
INSERT INTO `ic_job_qualification` VALUES ('123', '16', 'Expert Javascript/HTML/CSS/Ajax coding skills');
INSERT INTO `ic_job_qualification` VALUES ('124', '17', '2-4+ years of experience managing digital marketing programs for advertisers or their agencies');
INSERT INTO `ic_job_qualification` VALUES ('125', '17', 'Demonstrated ability to create, develop, and enhance customer relationships');
INSERT INTO `ic_job_qualification` VALUES ('126', '18', 'Demonstrable experience building world-class, consumer web application interfaces');
INSERT INTO `ic_job_qualification` VALUES ('127', '18', 'Expert Javascript/HTML/CSS/Ajax coding skills');
INSERT INTO `ic_job_qualification` VALUES ('128', '18', '2-4+ years of experience managing digital marketing programs for advertisers or their agencies');
INSERT INTO `ic_job_qualification` VALUES ('129', '18', 'Demonstrated ability to create, develop, and enhance customer relationships');

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
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_responsability
-- ----------------------------
INSERT INTO `ic_job_responsability` VALUES ('156', '16', 'Write front-end code in Ruby, HTML/CSS, and Javascript');
INSERT INTO `ic_job_responsability` VALUES ('157', '16', 'Implement new features and optimize existing ones from controller-level to UI');
INSERT INTO `ic_job_responsability` VALUES ('158', '17', 'Collaborating with Fortune 500 advertisers to understand their objectives, recommending best practices, and developing effective campaigns');
INSERT INTO `ic_job_responsability` VALUES ('159', '17', 'Educate and consult to demonstrate how to use Twitter’s advertising products, best practices, how to develop effective campaigns.');
INSERT INTO `ic_job_responsability` VALUES ('160', '18', 'Write front-end code in Ruby, HTML/CSS, and Javascript');
INSERT INTO `ic_job_responsability` VALUES ('161', '18', 'Implement new features and optimize existing ones from controller-level to UI');
INSERT INTO `ic_job_responsability` VALUES ('162', '18', 'Collaborating with Fortune 500 advertisers to understand their objectives, recommending best practices, and developing effective campaigns');
INSERT INTO `ic_job_responsability` VALUES ('163', '18', 'Educate and consult to demonstrate how to use Twitter’s advertising products, best practices, how to develop effective campaigns.');

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
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_skill
-- ----------------------------
INSERT INTO `ic_job_skill` VALUES ('138', '16', 'Visual-design skills');
INSERT INTO `ic_job_skill` VALUES ('139', '16', 'B.S. or higher in Computer science or equivalent');
INSERT INTO `ic_job_skill` VALUES ('140', '17', 'Excellent communication and presentation skills, attention to detail, and a bias for proactively resolving issues');
INSERT INTO `ic_job_skill` VALUES ('141', '17', 'Aptitude, creativity, and a preference for working in small, collaborative teams with minimal supervision');
INSERT INTO `ic_job_skill` VALUES ('142', '18', 'Visual-design skills');
INSERT INTO `ic_job_skill` VALUES ('143', '18', 'B.S. or higher in Computer science or equivalent');
INSERT INTO `ic_job_skill` VALUES ('144', '18', 'Aptitude, creativity, and a preference for working in small, collaborative teams with minimal supervision');
INSERT INTO `ic_job_skill` VALUES ('145', '18', 'Excellent communication and presentation skills, attention to detail, and a bias for proactively resolving issues');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_meta
-- ----------------------------
INSERT INTO `ic_meta` VALUES ('11', 'Home', 'Home', 'invictus games, Home', 'Home', 'http://invictus.com/pages/home', 'games', null, null, 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('12', 'Race of Champions', 'Race of Champions the official game', 'invictus games, Race of Champions', 'Race of Champions', 'http://localhost/invictus.com/app/public/games/race-of-champions', 'game', 'http://localhost/invictus.com/app/public/uploads/original/1333096600_Icon170.png', 'Race of Champions', 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('13', 'Contact', 'Contact', 'invictus games, Contact', 'Contact', 'http://invictus.com/pages/contact', 'games', null, null, 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('14', 'Jobs', 'Jobs', 'invictus games, Jobs', 'Jobs', 'http://invictus.com/pages/jobs', 'games', null, null, 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('15', 'All Games', 'All Games', 'invictus games, All Games', 'All Games', 'http://invictus.com/pages/games', 'games', '', '', 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('16', 'More Games', 'More Games', 'invictus games, More Games', 'More Games', 'http://invictus.com/pages/more-games', 'games', null, null, 'Invictus Games');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_page
-- ----------------------------
INSERT INTO `ic_page` VALUES ('8', 'Home', 'home', 'Home', '', '11', null, null, null, null, null);
INSERT INTO `ic_page` VALUES ('9', 'Contact', 'contact', 'Contact', '', '13', null, null, null, null, null);
INSERT INTO `ic_page` VALUES ('10', 'Jobs', 'jobs', 'Jobs', '', '14', null, null, null, null, null);
INSERT INTO `ic_page` VALUES ('11', 'Games', 'games', 'All Games', '', '15', null, null, null, null, null);
INSERT INTO `ic_page` VALUES ('12', 'More Games', 'more-games', 'More Games', '', '16', null, null, null, null, null);

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
INSERT INTO `ic_settings` VALUES ('1', '1333097304_twitter_logo_top_bar.png', '298005276910571', 'invictusgames', 'invictusgames', 'UTA111-11-111');

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
