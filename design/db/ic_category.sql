/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : invictus

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-06-13 09:45:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ic_category`
-- ----------------------------
DROP TABLE IF EXISTS `ic_category`;
CREATE TABLE `ic_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ic_category
-- ----------------------------
INSERT INTO `ic_category` VALUES ('1', 'Casual');
INSERT INTO `ic_category` VALUES ('2', 'Car');
INSERT INTO `ic_category` VALUES ('3', 'Jump');
