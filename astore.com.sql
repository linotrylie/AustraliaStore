/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost:3306
 Source Schema         : astore.com

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : 65001

 Date: 16/05/2019 20:09:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pid` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES (1, 'FrozenFood', 0);
INSERT INTO `goods` VALUES (2, 'FreshFood', 0);
INSERT INTO `goods` VALUES (3, 'Beverages', 0);
INSERT INTO `goods` VALUES (4, 'HomeHealth', 0);
INSERT INTO `goods` VALUES (5, 'PetFood', 0);
INSERT INTO `goods` VALUES (6, 'SeaFood', 1);
INSERT INTO `goods` VALUES (7, 'MilkProducts', 1);
INSERT INTO `goods` VALUES (8, 'Other', 1);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit_price` float(8, 0) NULL DEFAULT NULL,
  `unit_quantity` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `in_stock` int(10) UNSIGNED NULL DEFAULT NULL,
  `fid` int(11) UNSIGNED NULL DEFAULT NULL,
  `product_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `product_images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  `checked` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  `remove` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  `saled` int(11) UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'fish1', 1001, '1kg', 999, 6, 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26', '0', '0', 0);
INSERT INTO `products` VALUES (2, 'fish2', 1002, '1kg', 1000, 6, 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26', '0', '0', 0);
INSERT INTO `products` VALUES (3, 'fish3', 1003, '1kg', 982, 6, 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26', '0', '0', 0);
INSERT INTO `products` VALUES (4, 'fish4', 1004, '1kg', 999, 6, 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26', '0', '0', 0);
INSERT INTO `products` VALUES (5, 'fish5', 1005, '1kg', 1000, 6, 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26', '0', '0', 0);
INSERT INTO `products` VALUES (6, 'fish6', 1006, '1kg', 1000, 7, 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26', '0', '0', 0);
INSERT INTO `products` VALUES (7, 'fish7', 1007, '1kg', 1000, 7, 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26', '0', '0', 0);
INSERT INTO `products` VALUES (8, 'fish8', 1008, '1kg', 1000, 7, 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26', '0', '0', 0);
INSERT INTO `products` VALUES (9, 'fish9', 1009, '1kg', 1000, 7, 'sdfasdfasdfasdfasdf', 'https://s2.ax1x.com/2019/05/15/ETpeH0.jpg', '2019-05-15 01:23:26', '0', '0', 0);

SET FOREIGN_KEY_CHECKS = 1;
