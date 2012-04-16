/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : invictus

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-04-16 17:44:32
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game
-- ----------------------------
INSERT INTO `c_game` VALUES ('4', '12', 'Lazy Farmer', 'lazy-farmer', '2012-03-01 00:00:00', '1332930420_Icon170.png', '1332926239_hero.png', '1332925952_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '1', '1', null, '0', '3', '1', '3', '12272771881', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazyfarmer.game', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('5', '12', 'Santa Ride', 'santa-ride', '1970-01-01 00:00:00', '1332930492_Icon170.png', '1332926168_hero.png', '1332926168_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '1', '2', null, '1', '4', '1', '4', '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('6', '12', 'Froggy Jump', 'froggy-jump', '1970-01-01 00:00:00', '1332930460_Icon170.png', '1332926009_hero.png', '1332925765_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '1', '2', null, '1', '1', '1', '4', '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('7', '12', 'Greed Corp', 'greed-corp', '1970-01-01 00:00:00', '1332930505_Icon170.png', '1333548148_hero.png', '1333548148_teaser.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '1', '0', null, '1', '2', '0', '0', '1221233123', 'greed_corp', 'invictusgames', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('8', '12', 'Froggy Launcher', 'froggy-launcher', '1970-01-01 00:00:00', '1332930545_Icon170.png', null, null, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '0', '3', null, '1', '4', '0', '0', '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('9', '12', 'Fly Fu', 'fly-fu', '1970-01-01 00:00:00', '1333535537_Icon170.png', null, null, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '0', '3', null, '0', '3', '1', '1', '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('10', '12', 'Mist Bouncer', 'mist-bouncer', '1970-01-01 00:00:00', '1332930595_Icon170.png', null, null, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', null, null, null, '1', '4', '1', '2', '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('11', '12', 'Race of Champions the official game', 'race-of-champions-the-official-game', '1970-01-01 00:00:00', '1333096600_Icon170.png', null, null, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus purus. Etiam vitae ligula vitae libero tincidunt commodo.', '1', '0', '2', null, '1', '3', null, null, '1221233123', 'http://twitter.com/lazy_farmer', 'http://facebook.com/lazy.farmer', null, null, null, null, null);
INSERT INTO `c_game` VALUES ('12', '18', 'Fly Control', 'fly-control', '2012-04-01 00:00:00', '1333611363_Icon170.png', '1333611364_hero.png', '1333611364_teaser.png', 'The render tree contains rectangles with visual attributes like color and dimensions. The rectangles are in the right order to be displayed on the scr', 'After the construction of the render tree it goes through a \"layout\" process. This means giving each node the exact coordinates where it should appear on the screen. The next stage is painting - the render tree will be traversed and each node will be painted using the UI backend layer.\r\n\r\nIt\'s important to understand that this is a gradual process. For better user experience, the rendering engine will try to display contents on the screen as soon as possible. It will not wait until all HTML is parsed before starting to build and layout the render tree. Parts of the content will be parsed and displayed, while the process continues with the rest of the contents that keeps coming from the network.', '1', '1', '3', null, '1', '0', '1', '0', null, 'adobi', 'invictusgames', null, null, null, null, null);

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
  `hd_path` varchar(255) DEFAULT NULL,
  `hd_ga_category` varchar(255) DEFAULT NULL,
  `hd_ga_label` varchar(255) DEFAULT NULL,
  `hd_ga_value` int(11) DEFAULT NULL,
  `hd_ga_action` varchar(255) DEFAULT NULL,
  `hd_ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_vide_game` (`game_id`),
  CONSTRAINT `fk_game_vide_game0` FOREIGN KEY (`game_id`) REFERENCES `c_game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game_image
-- ----------------------------
INSERT INTO `c_game_image` VALUES ('6', null, '1332934989_greed-corp-20090812111453863.jpg', null, '7', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('7', null, '1332934989_greed-corp-20090812111456832.jpg', null, '7', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('16', null, '1333535788_3.png', null, '11', 'Image', 'View', 'Race of Champions - image - 1333535788_3.png', '1', null, null, null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('19', null, '1334132318_1332935171_IMG_1808.png', null, '6', 'Image', 'View', 'Froggy Jump - image - 1334132318_1332935171_IMG_1808.png', '1', null, null, null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('20', null, '1334132318_1332935171_IMG_1806.png', null, '6', 'Image', 'View', 'Froggy Jump - image - 1334132318_1332935171_IMG_1806.png', '1', null, null, null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('21', null, '1334132318_1332935171_IMG_1807.png', null, '6', 'Image', 'View', 'Froggy Jump - image - 1334132318_1332935171_IMG_1807.png', '1', null, null, null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('55', null, '1334588581_IMG_1806.png', null, '12', 'Image', 'View', 'Fly Control - image - 1334588581_IMG_1806.png', '1', null, '1334588765_IMG_1806.png', 'Image', 'Fly Control - HD image - 1334588765_IMG_1806.png', '1', 'View', null);
INSERT INTO `c_game_image` VALUES ('56', null, '1334588581_IMG_1807.png', null, '12', 'Image', 'View', 'Fly Control - image - 1334588581_IMG_1807.png', '1', null, null, null, null, null, null, null);
INSERT INTO `c_game_image` VALUES ('57', null, '1334588581_IMG_1808.png', null, '12', 'Image', 'View', 'Fly Control - image - 1334588581_IMG_1808.png', '1', null, null, null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game_platform
-- ----------------------------
INSERT INTO `c_game_platform` VALUES ('14', '7', '5', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('15', '11', '2', 'http://mzl.la/HdSycu', 'https://developer.mozilla.org/en-US/demos/detail/paperfold-css');
INSERT INTO `c_game_platform` VALUES ('16', '11', '1', 'http://mzl.la/HdSycu', 'https://developer.mozilla.org/en-US/demos/detail/paperfold-css');
INSERT INTO `c_game_platform` VALUES ('17', '11', '5', 'http://mzl.la/HdSycu', 'https://developer.mozilla.org/en-US/demos/detail/paperfold-css');
INSERT INTO `c_game_platform` VALUES ('18', '12', '2', 'http://bit.ly/GFP5iK', 'http://twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('19', '12', '1', 'http://bit.ly/GFP5iK', 'twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('20', '12', '4', 'http://bit.ly/GFP5iK', 'twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('21', '12', '3', 'http://bit.ly/GFP5iK', 'twitter.github.com/bootstrap/base-css.html#icons');
INSERT INTO `c_game_platform` VALUES ('22', '12', '5', 'http://bit.ly/GFP5iK', 'twitter.github.com/bootstrap/base-css.html#icons');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_game_video
-- ----------------------------
INSERT INTO `c_game_video` VALUES ('1', 'Video', 'VA770wpLX-Q', '7', 'Video', 'View', 'Greed Corp - Video VA770wpLX-Q - 1333465207', '1', null);
INSERT INTO `c_game_video` VALUES ('2', 'Video', 'VA770wpLX-Q', '7', 'Video', 'View', 'Greed Corp - Video VA770wpLX-Q - 1333465235', '1', null);
INSERT INTO `c_game_video` VALUES ('3', 'ROC Official trailer', 'VA770wpLX-Q', '11', 'Video', 'View', 'Race of Champions - ROC Official trailer VA770wpLX-Q - 1333536277', '1', null);
INSERT INTO `c_game_video` VALUES ('4', 'Fly Control trailer', 'VA770wpLX-Q', '12', 'Video', 'View', 'Fly Control - Fly Control trailer VA770wpLX-Q - 1333611788', '1', null);

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
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_analytics_analytics_type` (`analytics_type_id`),
  KEY `fk_analytics_games` (`game_id`),
  CONSTRAINT `fk_analytics_games` FOREIGN KEY (`game_id`) REFERENCES `c_game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_analytics_analytics_type` FOREIGN KEY (`analytics_type_id`) REFERENCES `ic_analytics_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=416 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_analytics
-- ----------------------------
INSERT INTO `ic_analytics` VALUES ('276', null, 'Banner', 'Home - Mist Bouncer - Hero - 1332531531_hero', 'Click', '1', null, '10', 'hero');
INSERT INTO `ic_analytics` VALUES ('277', null, 'Banner', 'Home - Mist Bouncer - Teaser - 1332531532_teaser', 'Click', '1', null, '10', 'teaser');
INSERT INTO `ic_analytics` VALUES ('278', null, 'Link', 'Footer - Mist Bouncer - Footer - 1333457843', 'Click', '1', null, '10', 'footer');
INSERT INTO `ic_analytics` VALUES ('279', null, 'Banner', 'More games - Mist Bouncer - Icon - 1332930595_Icon170', 'Click', '1', null, '10', 'more_games');
INSERT INTO `ic_analytics` VALUES ('280', null, 'Inbound link', 'All products - Mist Bouncer - Button - 1333457843', 'Click', '1', null, '10', 'all_games');
INSERT INTO `ic_analytics` VALUES ('286', null, 'Banner', 'Home - Froggy Launcher - Hero - 1332531531_hero', 'Click', '1', null, '8', 'hero');
INSERT INTO `ic_analytics` VALUES ('287', null, 'Banner', 'Home - Froggy Launcher - Teaser - 1332531532_teaser', 'Click', '1', null, '8', 'teaser');
INSERT INTO `ic_analytics` VALUES ('288', null, 'Link', 'Footer - Froggy Launcher - Footer - 1333457843', 'Click', '1', null, '8', 'footer');
INSERT INTO `ic_analytics` VALUES ('289', null, 'Banner', 'More games - Froggy Launcher - Icon - 1332930545_Icon170', 'Click', '1', null, '8', 'more_games');
INSERT INTO `ic_analytics` VALUES ('290', null, 'Inbound link', 'All products - Froggy Launcher - Button - 1333457843', 'Click', '1', null, '8', 'all_games');
INSERT INTO `ic_analytics` VALUES ('301', null, 'Banner', 'Home - Santa Ride - Hero - 1332926168_hero', 'Click', '1', null, '5', 'hero');
INSERT INTO `ic_analytics` VALUES ('302', null, 'Banner', 'Home - Santa Ride - Teaser - 1332926168_teaser', 'Click', '1', null, '5', 'teaser');
INSERT INTO `ic_analytics` VALUES ('303', null, 'Link', 'Footer - Santa Ride - Footer - 1333457844', 'Click', '1', null, '5', 'footer');
INSERT INTO `ic_analytics` VALUES ('304', null, 'Banner', 'More games - Santa Ride - Icon - 1332930492_Icon170', 'Click', '1', null, '5', 'more_games');
INSERT INTO `ic_analytics` VALUES ('305', null, 'Inbound link', 'All products - Santa Ride - Button - 1333457844', 'Click', '1', null, '5', 'all_games');
INSERT INTO `ic_analytics` VALUES ('306', null, 'Banner', 'Home - Lazy Farmer - Hero - 1332926239_hero', 'Click', '1', null, '4', 'hero');
INSERT INTO `ic_analytics` VALUES ('307', null, 'Banner', 'Home - Lazy Farmer - Teaser - 1332925952_teaser', 'Click', '1', null, '4', 'teaser');
INSERT INTO `ic_analytics` VALUES ('308', null, 'Link', 'Footer - Lazy Farmer - Footer - 1333457844', 'Click', '1', null, '4', 'footer');
INSERT INTO `ic_analytics` VALUES ('309', null, 'Banner', 'More games - Lazy Farmer - Icon - 1332930420_Icon170', 'Click', '1', null, '4', 'more_games');
INSERT INTO `ic_analytics` VALUES ('310', null, 'Inbound link', 'All products - Lazy Farmer - Button - 1333457844', 'Click', '1', null, '4', 'all_games');
INSERT INTO `ic_analytics` VALUES ('336', null, 'Banner', 'Home - Fly Fu - Hero - ', 'Click', '1', null, '9', 'hero');
INSERT INTO `ic_analytics` VALUES ('337', null, 'Banner', 'Home - Fly Fu - Teaser - ', 'Click', '1', null, '9', 'teaser');
INSERT INTO `ic_analytics` VALUES ('338', null, 'Link', 'Footer - Fly Fu - Footer - 1333535537', 'Click', '1', null, '9', 'footer');
INSERT INTO `ic_analytics` VALUES ('339', null, 'Banner', 'More games - Fly Fu - Icon - 1333535537_Icon170', 'Click', '1', null, '9', 'more_games');
INSERT INTO `ic_analytics` VALUES ('340', null, 'Inbound link', 'All products - Fly Fu - Button - 1333535537', 'Click', '1', null, '9', 'all_games');
INSERT INTO `ic_analytics` VALUES ('341', null, 'Banner', 'Home - Greed Corp - Hero - 1333548148_hero', 'Click', '1', null, '7', 'hero');
INSERT INTO `ic_analytics` VALUES ('342', null, 'Banner', 'Home - Greed Corp - Teaser - 1333548148_teaser', 'Click', '1', null, '7', 'teaser');
INSERT INTO `ic_analytics` VALUES ('343', null, 'Link', 'Footer - Greed Corp - Footer - 1333548149', 'Click', '1', null, '7', 'footer');
INSERT INTO `ic_analytics` VALUES ('344', null, 'Banner', 'More games - Greed Corp - Icon - 1332930505_Icon170', 'Click', '1', null, '7', 'more_games');
INSERT INTO `ic_analytics` VALUES ('345', null, 'Inbound link', 'All products - Greed Corp - Button - 1333548149', 'Click', '1', null, '7', 'all_games');
INSERT INTO `ic_analytics` VALUES ('351', null, 'Banner', 'Home - Fly Control - Hero - 1333611364_hero', 'Click', '1', null, '12', 'hero');
INSERT INTO `ic_analytics` VALUES ('352', null, 'Banner', 'Home - Fly Control - Teaser - 1333611364_teaser', 'Click', '1', null, '12', 'teaser');
INSERT INTO `ic_analytics` VALUES ('353', null, 'Link', 'Footer - Fly Control - Footer - 1333611425', 'Click', '1', null, '12', 'footer');
INSERT INTO `ic_analytics` VALUES ('354', null, 'Banner', 'More games - Fly Control - Icon - 1333611363_Icon170', 'Click', '1', null, '12', 'more_games');
INSERT INTO `ic_analytics` VALUES ('355', null, 'Inbound link', 'All products - Fly Control - Button - 1333611425', 'Click', '1', null, '12', 'all_games');
INSERT INTO `ic_analytics` VALUES ('371', null, 'Banner', 'Home - Froggy Jump - Hero - 1332926009_hero', 'Click', '1', null, '6', 'hero');
INSERT INTO `ic_analytics` VALUES ('372', null, 'Banner', 'Home - Froggy Jump - Teaser - 1332925765_teaser', 'Click', '1', null, '6', 'teaser');
INSERT INTO `ic_analytics` VALUES ('373', null, 'Link', 'Footer - Froggy Jump - Footer - 1334131621', 'Click', '1', null, '6', 'footer');
INSERT INTO `ic_analytics` VALUES ('374', null, 'Banner', 'More games - Froggy Jump - Icon - 1332930460_Icon170', 'Click', '1', null, '6', 'more_games');
INSERT INTO `ic_analytics` VALUES ('375', null, 'Inbound link', 'All products - Froggy Jump - Button - 1334131621', 'Click', '1', null, '6', 'all_games');
INSERT INTO `ic_analytics` VALUES ('411', null, 'Banner', 'Home - Race of Champions the official game - Hero - ', 'Click', '1', null, '11', 'hero');
INSERT INTO `ic_analytics` VALUES ('412', null, 'Banner', 'Home - Race of Champions the official game - Teaser - ', 'Click', '1', null, '11', 'teaser');
INSERT INTO `ic_analytics` VALUES ('413', null, 'Link', 'Footer - Race of Champions the official game - Footer - 1334217777', 'Click', '1', null, '11', 'footer');
INSERT INTO `ic_analytics` VALUES ('414', null, 'Banner', 'More games - Race of Champions the official game - Icon - 1333096600_Icon170', 'Click', '1', null, '11', 'more_games');
INSERT INTO `ic_analytics` VALUES ('415', null, 'Inbound link', 'All products - Race of Champions the official game - Button - 1334217777', 'Click', '1', null, '11', 'all_games');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_contact
-- ----------------------------
INSERT INTO `ic_contact` VALUES ('1', 'Invicts Games Ltd', 'Debrecen, Hungary', 'Kartacs street 9, 4028', '+36708808800', '+3652122112', 'hello@invictus.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
INSERT INTO `ic_contact_message` VALUES ('11', '3', 'hello', 'adobi@asd.as', 'asdasda', '2012-04-04 13:27:14', '1');
INSERT INTO `ic_contact_message` VALUES ('12', '3', 'Hello', 'hello@adobi.hu', 'Hello\r\n\r\nEz egy szep uzenete', '2012-04-05 14:29:14', '1');
INSERT INTO `ic_contact_message` VALUES ('13', '3', 'hello', 'hello@adobi.hu', 'hello', '2012-04-05 14:31:31', '1');
INSERT INTO `ic_contact_message` VALUES ('14', '3', 'hello', 'hello.attila@gmail.com', 'hello', '2012-04-05 14:33:22', '1');

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
INSERT INTO `ic_contact_type` VALUES ('1', 'Marketing', '1', 'marketing@invictus.com', 'Contact email', 'Marketing', 'Click', '1', null);
INSERT INTO `ic_contact_type` VALUES ('2', 'Support', '2', 'support@invictus.com', null, null, null, null, null);
INSERT INTO `ic_contact_type` VALUES ('3', 'General informations', '3', 'hello.attila@gmail.com', null, null, null, null, null);
INSERT INTO `ic_contact_type` VALUES ('4', 'HR', '4', 'hr@invictus.com', null, null, null, null, null);

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
  CONSTRAINT `fk_crosspromo_game_promo` FOREIGN KEY (`promo_game_id`) REFERENCES `c_game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_crosspromo_game_base` FOREIGN KEY (`base_game_id`) REFERENCES `c_game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_crosspromo
-- ----------------------------
INSERT INTO `ic_crosspromo` VALUES ('54', '5', '4', '0', 'Inbound link', 'Click', 'Santa Ride - Lazy Farmer - Crosspromo - 1332930492_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('55', '5', '10', '1', 'Inbound link', 'Click', 'Santa Ride - Mist Bouncer - Crosspromo - 1332930492_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('56', '5', '12', '2', 'Inbound link', 'Click', 'Santa Ride - Fly Control - Crosspromo - 1332930492_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('57', '5', '8', '3', 'Inbound link', 'Click', 'Santa Ride - Froggy Launcher - Crosspromo - 1332930492_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('58', '5', '9', '4', 'Inbound link', 'Click', 'Santa Ride - Fly Fu - Crosspromo - 1332930492_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('61', '7', '9', '3', 'Inbound link', 'Click', 'Greed Corp - Fly Fu - Crosspromo - 1332930505_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('62', '8', '10', '4', 'Inbound link', 'Click', 'Froggy Launcher - Mist Bouncer - Crosspromo - 1332930545_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('63', '8', '9', '3', 'Inbound link', 'Click', 'Froggy Launcher - Fly Fu - Crosspromo - 1332930545_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('64', '8', '11', '2', 'Inbound link', 'Click', 'Froggy Launcher - Race of Champions - Crosspromo - 1332930545_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('65', '6', '4', '0', 'Inbound link', 'Click', 'Froggy Jump - Lazy Farmer - Crosspromo - 1332930460_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('66', '6', '9', '1', 'Inbound link', 'Click', 'Froggy Jump - Fly Fu - Crosspromo - 1332930460_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('68', '6', '5', '3', 'Inbound link', 'Click', 'Froggy Jump - Santa Ride - Crosspromo - 1332930460_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('69', '6', '10', '4', 'Inbound link', 'Click', 'Froggy Jump - Mist Bouncer - Crosspromo - 1332930460_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('70', '7', '4', '0', 'Inbound link', 'Click', 'Greed Corp - Lazy Farmer - Crosspromo - 1332930505_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('71', '7', '5', '1', 'Inbound link', 'Click', 'Greed Corp - Santa Ride - Crosspromo - 1332930505_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('72', '7', '10', '2', 'Inbound link', 'Click', 'Greed Corp - Mist Bouncer - Crosspromo - 1332930505_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('73', '7', '11', '4', 'Inbound link', 'Click', 'Greed Corp - Race of Champions - Crosspromo - 1332930505_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('74', '8', '4', '1', 'Inbound link', 'Click', 'Froggy Launcher - Lazy Farmer - Crosspromo - 1332930545_Icon170', '1', null);
INSERT INTO `ic_crosspromo` VALUES ('75', '8', '5', '0', 'Inbound link', 'Click', 'Froggy Launcher - Santa Ride - Crosspromo - 1332930545_Icon170', '1', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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
INSERT INTO `ic_email_offer` VALUES ('8', null, 'hello@adobi.hu', null);
INSERT INTO `ic_email_offer` VALUES ('9', null, 'hello@invictus.com', null);
INSERT INTO `ic_email_offer` VALUES ('10', null, 'hello@adobi.hu', null);
INSERT INTO `ic_email_offer` VALUES ('11', null, 'dobiattila@gmail.com', null);
INSERT INTO `ic_email_offer` VALUES ('12', '5', 'dobiattila@gmail.com', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_game_platorm_analyitcs
-- ----------------------------
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('39', 'Outbound link', 'All product - iPad - button - 1333463623', '1', 'Click', null, '14', 'all_games');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('40', 'Outbound link', 'Greed Corp - iPad - button - 1333463623', '1', 'Click', null, '14', 'product_page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('41', 'Outbound link', 'All product - iPod, iPhone - button - 1333535585', '1', 'Click', null, '15', 'all_games');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('42', 'Outbound link', 'Race of Champions - iPod, iPhone - button - 1333535585', '1', 'Click', null, '15', 'product_page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('43', 'Outbound link', 'All product - iMac - button - 1333535592', '1', 'Click', null, '16', 'all_games');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('44', 'Outbound link', 'Race of Champions - iMac - button - 1333535592', '1', 'Click', null, '16', 'product_page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('45', 'Outbound link', 'All product - iPad - button - 1333535598', '1', 'Click', null, '17', 'all_games');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('46', 'Outbound link', 'Race of Champions - iPad - button - 1333535598', '1', 'Click', null, '17', 'product_page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('47', 'Outbound link', 'All product - iPod, iPhone - button - 1333611478', '1', 'Click', null, '18', 'all_games');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('48', 'Outbound link', 'Fly Control - iPod, iPhone - button - 1333611478', '1', 'Click', null, '18', 'product_page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('49', 'Outbound link', 'All product - iMac - button - 1334226023', '1', 'Click', null, '19', 'all_games');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('50', 'Outbound link', 'Fly Control - iMac - button - 1334226023', '1', 'Click', null, '19', 'product_page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('51', 'Outbound link', 'All product - Andorid Tablet - button - 1334226071', '1', 'Click', null, '20', 'all_games');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('52', 'Outbound link', 'Fly Control - Andorid Tablet - button - 1334226071', '1', 'Click', null, '20', 'product_page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('53', 'Outbound link', 'All product - Android Phone - button - 1334226081', '1', 'Click', null, '21', 'all_games');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('54', 'Outbound link', 'Fly Control - Android Phone - button - 1334226081', '1', 'Click', null, '21', 'product_page');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('55', 'Outbound link', 'All product - iPad - button - 1334226089', '1', 'Click', null, '22', 'all_games');
INSERT INTO `ic_game_platorm_analyitcs` VALUES ('56', 'Outbound link', 'Fly Control - iPad - button - 1334226089', '1', 'Click', null, '22', 'product_page');

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
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_job_category` (`category_id`),
  CONSTRAINT `fk_job_job_category` FOREIGN KEY (`category_id`) REFERENCES `ic_job_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job
-- ----------------------------
INSERT INTO `ic_job` VALUES ('16', 'Front-End Engineer', 'front-end-engineer', 'Debrecen, Hungary', '1', '17', 'Twitter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.  \r\n \r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.  \r\n \r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', null, '2012-04-12 09:08:12', '2012-03-31 00:00:00', 'Job application', 'Send', 'Front-End Engineer - button - 1334221692', '1', null, 'Job application', 'Apply', 'Front-End Engineer - button - 1334221692', '1', null, '1', '1');
INSERT INTO `ic_job` VALUES ('17', 'Graphic Master for Game design', 'graphic-master-for-game-design', 'Debrecen, Hungary', '1', '18', 'witter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.  \r\n \r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.  \r\n \r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', null, '2012-04-04 08:30:33', '2012-03-31 00:00:00', 'Job application', 'Send', 'Graphic Master for Game design - button - 1333528234', '1', null, 'Job application', 'Apply', 'Graphic Master for Game design - button - 1333528234', '1', null, null, '1');
INSERT INTO `ic_job` VALUES ('18', 'Software Engineer - Back-End', 'software-engineer-back-end', 'San Francisco, USA', '1', '17', 'Twitter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.  \r\n \r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.  \r\n \r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', null, '2012-04-04 08:30:36', '2012-03-31 00:00:00', 'Job application', 'Send', 'Software Engineer - Back-End - button - 1333528237', '1', null, 'Job application', 'Apply', 'Software Engineer - Back-End - button - 1333528237', '1', null, null, '1');

-- ----------------------------
-- Table structure for `ic_job_application`
-- ----------------------------
DROP TABLE IF EXISTS `ic_job_application`;
CREATE TABLE `ic_job_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `cv` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `portfolio` varchar(250) DEFAULT NULL,
  `called` int(11) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_application_job` (`job_id`),
  CONSTRAINT `fk_job_application_job` FOREIGN KEY (`job_id`) REFERENCES `ic_job` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_application
-- ----------------------------
INSERT INTO `ic_job_application` VALUES ('1', null, 'Alma Máter', 'hello@google.com', 'a', '+36707667788', 'a', null, null, null);
INSERT INTO `ic_job_application` VALUES ('3', null, 'Asda asdas', 'hello@google.com', 'a', '+36707667788', 'a', '1', null, null);
INSERT INTO `ic_job_application` VALUES ('4', null, 'ASdasda asdasd', 'hello@google.com', 'aa', '+36707667788', 'a', null, null, null);
INSERT INTO `ic_job_application` VALUES ('5', null, 'aASDASda', 'hello@google.com', 'a', '+36707667788', 'a', '1', null, null);
INSERT INTO `ic_job_application` VALUES ('6', null, 'ASdas', 'hello@google.com', 'a', '+36707667788', 'aa', '1', null, null);
INSERT INTO `ic_job_application` VALUES ('7', null, 'ASdasdasd asda sd', 'hello@google.com', 'a', '+36707667788', 'a', null, null, null);
INSERT INTO `ic_job_application` VALUES ('8', null, 'aASDasd', 'hello@google.com', 'a', '+36707667788', 'a', null, null, null);
INSERT INTO `ic_job_application` VALUES ('9', null, 'asdasdasda', 'fs', 'a', '+36707667788', 'a', null, null, null);
INSERT INTO `ic_job_application` VALUES ('10', null, 'errqewrwe', 'd', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('11', null, 'qwerw', 's', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('12', null, 'ere', 'df', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('13', null, 'wrw', 'fs', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('14', null, 'er', 'sd', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('15', null, 'wer', 'df', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('16', null, 'we', 'fs', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('17', null, 'r', 'sd', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('18', null, 'we', 'sdf', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('19', null, 'rw', 'sdf', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('20', null, 'er', 'asdf', 'q', '+36707667788', 'q', null, null, null);
INSERT INTO `ic_job_application` VALUES ('21', '16', 'Attila', 'hello@adobi.hu', '1333525501_!2012-04-03_1311.png', '+36708808800', null, '1', 'Dobi', null);
INSERT INTO `ic_job_application` VALUES ('22', '16', 'Attila', 'dobiattila@gmail.com', '1333525717_!2012-04-03_1311.png', '+36708808800', null, '1', 'Dobi', null);
INSERT INTO `ic_job_application` VALUES ('23', '16', 'Attila', 'dobiattila@gmail.com', '1333545864_!2012-04-03_1311.png', '06705301132', null, '1', 'Dobi', '2012-04-04 13:24:24');

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
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_offer
-- ----------------------------
INSERT INTO `ic_job_offer` VALUES ('130', '17', 'Flexible and generous vacation policy');
INSERT INTO `ic_job_offer` VALUES ('131', '17', 'Complete medical/dental benefits');
INSERT INTO `ic_job_offer` VALUES ('132', '18', 'Flexible and generous vacation policy');
INSERT INTO `ic_job_offer` VALUES ('133', '18', 'Complete medical/dental benefits');
INSERT INTO `ic_job_offer` VALUES ('134', '18', 'Paid maternity and paternity leave');
INSERT INTO `ic_job_offer` VALUES ('135', '16', 'Flexible and generous vacation policy');
INSERT INTO `ic_job_offer` VALUES ('136', '16', 'Complete medical/dental benefits');

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
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_qualification
-- ----------------------------
INSERT INTO `ic_job_qualification` VALUES ('132', '17', '2-4+ years of experience managing digital marketing programs for advertisers or their agencies');
INSERT INTO `ic_job_qualification` VALUES ('133', '17', 'Demonstrated ability to create, develop, and enhance customer relationships');
INSERT INTO `ic_job_qualification` VALUES ('134', '18', 'Demonstrable experience building world-class, consumer web application interfaces');
INSERT INTO `ic_job_qualification` VALUES ('135', '18', 'Expert Javascript/HTML/CSS/Ajax coding skills');
INSERT INTO `ic_job_qualification` VALUES ('136', '18', '2-4+ years of experience managing digital marketing programs for advertisers or their agencies');
INSERT INTO `ic_job_qualification` VALUES ('137', '18', 'Demonstrated ability to create, develop, and enhance customer relationships');
INSERT INTO `ic_job_qualification` VALUES ('138', '16', 'Demonstrable experience building world-class, consumer web application interfaces');
INSERT INTO `ic_job_qualification` VALUES ('139', '16', 'Expert Javascript/HTML/CSS/Ajax coding skills');

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
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_responsability
-- ----------------------------
INSERT INTO `ic_job_responsability` VALUES ('166', '17', 'Collaborating with Fortune 500 advertisers to understand their objectives, recommending best practices, and developing effective campaigns');
INSERT INTO `ic_job_responsability` VALUES ('167', '17', 'Educate and consult to demonstrate how to use Twitter’s advertising products, best practices, how to develop effective campaigns.');
INSERT INTO `ic_job_responsability` VALUES ('168', '18', 'Write front-end code in Ruby, HTML/CSS, and Javascript');
INSERT INTO `ic_job_responsability` VALUES ('169', '18', 'Implement new features and optimize existing ones from controller-level to UI');
INSERT INTO `ic_job_responsability` VALUES ('170', '18', 'Collaborating with Fortune 500 advertisers to understand their objectives, recommending best practices, and developing effective campaigns');
INSERT INTO `ic_job_responsability` VALUES ('171', '18', 'Educate and consult to demonstrate how to use Twitter’s advertising products, best practices, how to develop effective campaigns.');
INSERT INTO `ic_job_responsability` VALUES ('172', '16', 'Write front-end code in Ruby, HTML/CSS, and Javascript');
INSERT INTO `ic_job_responsability` VALUES ('173', '16', 'Implement new features and optimize existing ones from controller-level to UI');

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
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_job_skill
-- ----------------------------
INSERT INTO `ic_job_skill` VALUES ('148', '17', 'Excellent communication and presentation skills, attention to detail, and a bias for proactively resolving issues');
INSERT INTO `ic_job_skill` VALUES ('149', '17', 'Aptitude, creativity, and a preference for working in small, collaborative teams with minimal supervision');
INSERT INTO `ic_job_skill` VALUES ('150', '18', 'Visual-design skills');
INSERT INTO `ic_job_skill` VALUES ('151', '18', 'B.S. or higher in Computer science or equivalent');
INSERT INTO `ic_job_skill` VALUES ('152', '18', 'Aptitude, creativity, and a preference for working in small, collaborative teams with minimal supervision');
INSERT INTO `ic_job_skill` VALUES ('153', '18', 'Excellent communication and presentation skills, attention to detail, and a bias for proactively resolving issues');
INSERT INTO `ic_job_skill` VALUES ('154', '16', 'Visual-design skills');
INSERT INTO `ic_job_skill` VALUES ('155', '16', 'B.S. or higher in Computer science or equivalent');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_meta
-- ----------------------------
INSERT INTO `ic_meta` VALUES ('11', 'Home', 'Home', 'invictus games, Home', 'Home', 'http://invictus.com/pages/home', 'games', null, null, 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('12', 'Race of Champions the official game', 'Race of Champions the official game', 'invictus games, Race of Champions', 'Race of Champions', 'http://localhost/invictus.com/app/public/games/race-of-champions-the-official-game', 'game', 'http://localhost/invictus.com/app/public/uploads/original/1333535537_Icon170.png', 'Race of Champions', 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('13', 'Contact', 'Contact', 'invictus games, Contact', 'Contact', 'http://invictus.com/pages/contact', 'games', null, null, 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('14', 'Jobs', 'Jobs', 'invictus games, Jobs', 'Jobs', 'http://invictus.com/pages/jobs', 'games', null, null, 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('15', 'All Games', 'All Games', 'invictus games, All Games', 'All Games', 'http://invictus.com/pages/games', 'games', '', '', 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('16', 'More Games', 'More Games', 'invictus games, More Games', 'More Games', 'http://invictus.com/pages/more-games', 'games', '', '', 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('17', 'About invictus', 'About invictus', 'invictus games, About invictus', 'About invictus', 'http://invictus.com/pages/about', 'games', null, null, 'Invictus Games');
INSERT INTO `ic_meta` VALUES ('18', 'Fly Control', null, 'invictus games, Fly Control', 'Fly Control', 'http://localhost/invictus.com/app/public/games/fly-control', 'game', 'http://localhost/invictus.com/app/public/uploads/original/1333611363_Icon170.png', null, 'Invictus Games');

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
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_offer
-- ----------------------------
INSERT INTO `ic_offer` VALUES ('3', 'Twitter has changed the way people communicate. Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base. \r\n\r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies. \r\n\r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', '2012-03-13 00:00:00', '2012-03-19 13:03:46', null, null, null, null, null, null, null);
INSERT INTO `ic_offer` VALUES ('4', 'Twitter has changed the way people communicate.  Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.', '2012-03-19 00:00:00', '2012-03-31 00:00:00', null, null, null, null, null, null, null);
INSERT INTO `ic_offer` VALUES ('5', 'Twitter has changed the way people communicate. Now we have a substantial opportunity to change how marketers interact with our rapidly growing user base.\r\n\r\nTwitter is creating a world-class team of media professionals, and seeking an experienced Account Manager to develop our business with advertisers and their agencies.\r\n\r\nIf you’re an enthusiastic Twitter user with relevant account management experience, analytical skills, and a passion for learning, we invite you to talk to us about our advertising sales organization at Twitter, Inc.', '2012-04-01 00:00:00', '2012-05-31 00:00:00', 'Subscription', 'Subscribe', 'Home - Easter is coming - button - 1333550082', '1', null, 'Easter is coming', '1333534897_offer_pic.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_page
-- ----------------------------
INSERT INTO `ic_page` VALUES ('8', 'Home', 'home', 'Home', '', '11', null, null, null, null, null);
INSERT INTO `ic_page` VALUES ('9', 'Contact', 'contact', 'Contact', '', '13', null, null, null, null, null);
INSERT INTO `ic_page` VALUES ('10', 'Jobs', 'jobs', 'Jobs', '', '14', null, null, null, null, null);
INSERT INTO `ic_page` VALUES ('11', 'Games', 'games', 'All Games', '', '15', null, null, null, null, null);
INSERT INTO `ic_page` VALUES ('12', 'More Games', 'more-games', 'More Games', '', '16', null, null, null, null, null);
INSERT INTO `ic_page` VALUES ('13', 'About', 'about', 'About invictus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris commodo, leo ac tincidunt adipiscing, sem libero mattis dolor, in lobortis nibh mauris quis mi. \r\nProin nec libero est, a lobortis augue. \r\nPraesent pharetra metus sed tortor laoreet posuere. Ut sed dui mauris, at venenatis justo. Praesent a metus vehicula purus dignissim ultrices. \r\nVivamus nunc lorem, tincidunt eu feugiat ut, adipiscing non justo. Fusce dictum egestas erat at iaculis. Vivamus nisl ligula, scelerisque vitae gravida non, ullamcorper a nunc. Cras interdum eros sem, et pulvinar metus. Integer nulla turpis, lacinia at venenatis at, sodales at orci. Proin condimentum tempus velit, non ultrices ipsum sagittis non. Suspendisse elementum libero eu tellus sagittis suscipit. Morbi velit nisl, laoreet eu vestibulum ut, pharetra ac mauris. Fusce et ligula lacinia lectus fringilla luctus. Vestibulum vitae ante nunc, non venenatis massa.', '17', null, null, null, null, null);

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
INSERT INTO `ic_settings` VALUES ('1', '1333537678_twitter_logo_top_bar.png', '298005276910571', 'invictusgames', 'invictusgames', 'UA-27571060-1');

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
