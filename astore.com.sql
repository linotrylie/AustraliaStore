/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : astore.com

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-05-15 09:33:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', 'FrozenFood', '0');
INSERT INTO `goods` VALUES ('2', 'FreshFood', '0');
INSERT INTO `goods` VALUES ('3', 'Beverages', '0');
INSERT INTO `goods` VALUES ('4', 'HomeHealth', '0');
INSERT INTO `goods` VALUES ('5', 'PetFood', '0');
INSERT INTO `goods` VALUES ('6', 'SeaFood', '1');
INSERT INTO `goods` VALUES ('7', 'MilkProducts', '1');
INSERT INTO `goods` VALUES ('8', 'Other', '1');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` float(8,0) DEFAULT NULL,
  `unit_quantity` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_stock` int(10) unsigned DEFAULT NULL,
  `fid` int(11) unsigned DEFAULT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci,
  `product_images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'fish', '100', '1kg', '1000', '6', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
INSERT INTO `products` VALUES ('2', 'fish', '100', '1kg', '1000', '6', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
INSERT INTO `products` VALUES ('3', 'fish', '100', '1kg', '1000', '6', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
INSERT INTO `products` VALUES ('4', 'fish', '100', '1kg', '1000', '6', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
INSERT INTO `products` VALUES ('5', 'fish', '100', '1kg', '1000', '6', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
INSERT INTO `products` VALUES ('6', 'fish', '100', '1kg', '1000', '7', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
INSERT INTO `products` VALUES ('7', 'fish', '100', '1kg', '1000', '7', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
INSERT INTO `products` VALUES ('8', 'fish', '100', '1kg', '1000', '7', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
INSERT INTO `products` VALUES ('9', 'fish', '100', '1kg', '1000', '7', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
INSERT INTO `products` VALUES ('10', 'fish', '100', '1kg', '1000', '2', 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26');
