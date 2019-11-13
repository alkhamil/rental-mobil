/*
 Navicat Premium Data Transfer

 Source Server         : Mysql
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : rental_mobil

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 14/11/2019 00:14:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `number` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (21, 'Alpard', 'alp.jpeg', 'mobil paling enak di pakai empuk', 'Toyota', 'F 1234 KS', 2, 400000, 1572547580);
INSERT INTO `products` VALUES (22, 'Jazz', 'jaz.jpg', 'mobil lucu mudah di kendarai', 'Honda', 'L 2456 KS', 2, 490008, 1572535111);
INSERT INTO `products` VALUES (23, 'Ertiga', 'ertiga.jpg', 'mobil yang irit , cocok buat hunting', 'Suzuki', 'L 2456 KS', 2, 1000000, 1572541850);
INSERT INTO `products` VALUES (24, 'Avanza', 'avanza.png', 'Mobil yang sangat cocok buat main dengan keluarga', 'Toyota', 'F 2302 LS', 1, 1000000, 1572547205);
INSERT INTO `products` VALUES (25, 'Mini Cooper', 'bill.jpg', 'a', 'Honda', 'L 2456 KS', 2, 1000000, 1573478674);

-- ----------------------------
-- Table structure for rent
-- ----------------------------
DROP TABLE IF EXISTS `rent`;
CREATE TABLE `rent`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sim` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rent
-- ----------------------------
INSERT INTO `rent` VALUES (25, 24, 9, 'Bangsat', '78', '2019-11-13', '2019-11-14');
INSERT INTO `rent` VALUES (26, 22, 9, 'Chandra', '7878788', '2019-11-13', '2019-11-15');
INSERT INTO `rent` VALUES (27, 24, 9, 'aan abdullah', '123456789', '2019-11-14', '2019-11-20');
INSERT INTO `rent` VALUES (28, 22, 12, 'alkhamil', '121212', '2019-11-14', '2019-11-21');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (9, 'aan', 'aan', 'user', 1572454524);
INSERT INTO `users` VALUES (10, 'admin', 'admin', 'admin', 1572535235);
INSERT INTO `users` VALUES (12, 'alkhamil', 'alkhamil', 'user', 1572544642);
INSERT INTO `users` VALUES (13, 'nazmudin', 'nazmudin', 'admin', 1573478788);
INSERT INTO `users` VALUES (14, 'runika', 'runika', 'user', 1573484576);

SET FOREIGN_KEY_CHECKS = 1;
